<?php

require_once dirname(__FILE__).'/../lib/attribute_defGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/attribute_defGeneratorHelper.class.php';

/**
 * attribute_def actions.
 *
 * @package    tnt
 * @subpackage attribute_def
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class attribute_defActions extends autoAttribute_defActions
{
  public function executeIndex(sfWebRequest $request) {
    if($request->getParameter('moduleName') != ''){
      $this->getUser()->setAttribute('attributeDefModule', $request->getParameter('moduleName'));
      $moduleName = $request->getParameter('moduleName');
    }
    else{
      $this->getUser()->getAttributeHolder()->remove('attributeDefModule');
    }
    if($request->getParameter('parent_id') > 0){
      $this->getUser()->setAttribute('attributeDefParent', $request->getParameter('parent_id'));
      $parentId = $request->getParameter('parent_id');
    }
    else{
      $this->getUser()->getAttributeHolder()->remove('attributeDefParent');
    }
    
    //Odczyt nazwy modułu
    if( isset($moduleName) && isset($parentId) ){
      switch ($moduleName){
        case 'product_categories':
          $parent = product_categoriesTable::getInstance()->findOneBy('id', $parentId);
          $this->parentName = $parent->getName();
          break;
      }
    }
    
    parent::executeIndex($request);
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    if ($this->getRoute()->getObject()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }
    if($this->getUser()->getAttribute('attributeDefModule') && $this->getUser()->getAttribute('attributeDefParent')){
      $this->redirect('@attribute_def_list?moduleName=' . $this->getUser()->getAttribute('attributeDefModule') . '&parent_id=' . $this->getUser()->getAttribute('attributeDefParent'));
    }
  }
  
  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      if($this->getUser()->getAttribute('attributeDefModule') && $this->getUser()->getAttribute('attributeDefParent')){
        $this->redirect('@attribute_def_list?moduleName=' . $this->getUser()->getAttribute('attributeDefModule') . '&parent_id=' . $this->getUser()->getAttribute('attributeDefParent'));
      }
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      if($this->getUser()->getAttribute('attributeDefModule') && $this->getUser()->getAttribute('attributeDefParent')){
        $this->redirect('@attribute_def_list?moduleName=' . $this->getUser()->getAttribute('attributeDefModule') . '&parent_id=' . $this->getUser()->getAttribute('attributeDefParent'));
      }
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'media'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    if($this->getUser()->getAttribute('attributeDefModule') && $this->getUser()->getAttribute('attributeDefParent')){
      $this->redirect('@attribute_def_list?moduleName=' . $this->getUser()->getAttribute('attributeDefModule') . '&parent_id=' . $this->getUser()->getAttribute('attributeDefParent'));
    }
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('media')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));

      $record->delete();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    if($this->getUser()->getAttribute('attributeDefModule') && $this->getUser()->getAttribute('attributeDefParent')){
      $this->redirect('@attribute_def_list?moduleName=' . $this->getUser()->getAttribute('attributeDefModule') . '&parent_id=' . $this->getUser()->getAttribute('attributeDefParent'));
    }
  }
  
  public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      if($this->getUser()->getAttribute('attributeDefModule') && $this->getUser()->getAttribute('attributeDefParent')){
        $this->redirect('@attribute_def_list?moduleName=' . $this->getUser()->getAttribute('attributeDefModule') . '&parent_id=' . $this->getUser()->getAttribute('attributeDefParent'));
      }
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      if($this->getUser()->getAttribute('attributeDefModule') && $this->getUser()->getAttribute('attributeDefParent')){
        $this->redirect('@attribute_def_list?moduleName=' . $this->getUser()->getAttribute('attributeDefModule') . '&parent_id=' . $this->getUser()->getAttribute('attributeDefParent'));
      }
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }
  
  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());
    
    
    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();
    
    if($this->getUser()->getAttribute('attributeDefModule') && $this->getUser()->getAttribute('attributeDefParent')){
      $query->andWhere('module = ?', $this->getUser()->getAttribute('attributeDefModule'));
      $query->andWhere('parent_id = ?', $this->getUser()->getAttribute('attributeDefParent'));
    }
    
    return $query;
  }
}
