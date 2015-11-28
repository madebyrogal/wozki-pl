<?php 

require_once dirname(__FILE__).'/../lib/attribute_valueGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/attribute_valueGeneratorHelper.class.php';

/**
 * attribute_value actions.
 *
 * @package    tnt
 * @subpackage attribute_value
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class attribute_valueActions extends autoAttribute_valueActions
{
  public function preExecute() {
    parent::preExecute();
    if( $this->getRequestParameter('product_id') ) {
      $this->getUser()->setAttribute('productId', $this->getRequestParameter('product_id') );
      $this->product = productTable::getInstance()->findOneBy('id', $this->getRequestParameter('product_id') );
      //Tworzenie atrybutów produktu
      $this->makeProductAttribute( $this->product );
    }
    
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
    $query->where( 'product_id = ?', $this->getRequestParameter('product_id') );

    return $query;
  }
  
  private function makeProductAttribute( $product ){
    //Pobranie wszystkich parentów(kategorii) produktu
    $categorieIds = product_categoriesTable::getParentsCategoryProduct( $product );
    //Pobranie id wszystkich attrybutów przypisanych do kategorii
    $attributeIds = attribute_defTable::getCategoriesAttributesIds( $categorieIds );
    //Pobranie id atrybutów zainicjowanych jako wartości do produktu
    $attributeValueIds = attribute_valueTable::getProductAttributes( $product );
    //Uzyskanie id attrybutów które trzeba dodać (diff)
    $attributeIdsToAdd = array_diff( $attributeIds, $attributeValueIds );
    //Zainicjownaie tablicy z attrybutami (puste wartości)
    if( count( $attributeIdsToAdd ) ){
      if(! attribute_valueTable::createNewAttribute( $attributeIdsToAdd, $product ) ){
        throw new Exception("Can't create attributes for product.");
      }
    }
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $attribute_value = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $attribute_value)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@attribute_value_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        //$this->redirect(array('sf_route' => 'attribute_value_edit', 'sf_subject' => $attribute_value));
        $this->redirect('@attribute_value_list' . '?product_id=' . $this->getUser()->getAttribute('productId') );
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
