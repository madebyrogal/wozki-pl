<?php

require_once dirname(__FILE__) . '/../lib/mediaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/mediaGeneratorHelper.class.php';

/**
 * media actions.
 *
 * @package    solarisnew
 * @subpackage media
 * @author     Tomasz ROGALSKI tomasz.rogalski@huevo.pl
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mediaActions extends autoMediaActions {

  public function executeIndex(sfWebRequest $request) {
    if ($request->getParameter('moduleName') != '') {
      $this->getUser()->setAttribute('mediaModule', $request->getParameter('moduleName'));
      $moduleName = $request->getParameter('moduleName');
    } else {
      $this->getUser()->getAttributeHolder()->remove('mediaModule');
    }
    if ($request->getParameter('parent_id') > 0) {
      $this->getUser()->setAttribute('mediaParent', $request->getParameter('parent_id'));
      $parentId = $request->getParameter('parent_id');
    } else {
      $this->getUser()->getAttributeHolder()->remove('mediaParent');
    }
    parent::executeIndex($request);

    //Odczyt nazwy modułu
    if (isset($moduleName) && isset($parentId)) {
      switch ($moduleName) {
        case 'product':
          $parent = productTable::getInstance()->findOneBy('id', $parentId);
          $this->parentName = $parent->getName();
          break;
        case 'gallery_1':
          $parent = gallery_1Table::getInstance()->findOneBy('id', $parentId);
          $this->parentName = $parent->getName();
          break;
      }
    }
  }

  public function executeDelete(sfWebRequest $request) {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    if ($this->getRoute()->getObject()->delete()) {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }
    if ($this->getUser()->getAttribute('mediaModule') && $this->getUser()->getAttribute('mediaParent')) {
      $this->redirect('@media_list?moduleName=' . $this->getUser()->getAttribute('mediaModule') . '&parent_id=' . $this->getUser()->getAttribute('mediaParent'));
    }
  }

  public function executeBatch(sfWebRequest $request) {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids')) {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      if ($this->getUser()->getAttribute('mediaModule') && $this->getUser()->getAttribute('mediaParent')) {
        $this->redirect('@media_list?moduleName=' . $this->getUser()->getAttribute('mediaModule') . '&parent_id=' . $this->getUser()->getAttribute('mediaParent'));
      }
    }

    if (!$action = $request->getParameter('batch_action')) {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      if ($this->getUser()->getAttribute('mediaModule') && $this->getUser()->getAttribute('mediaParent')) {
        $this->redirect('@media_list?moduleName=' . $this->getUser()->getAttribute('mediaModule') . '&parent_id=' . $this->getUser()->getAttribute('mediaParent'));
      }
    }

    if (!method_exists($this, $method = 'execute' . ucfirst($action))) {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action))) {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'media'));
    try {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    } catch (sfValidatorError $e) {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    if ($this->getUser()->getAttribute('mediaModule') && $this->getUser()->getAttribute('mediaParent')) {
      $this->redirect('@media_list?moduleName=' . $this->getUser()->getAttribute('mediaModule') . '&parent_id=' . $this->getUser()->getAttribute('mediaParent'));
    }
  }

  protected function executeBatchDelete(sfWebRequest $request) {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
            ->from('media')
            ->whereIn('id', $ids)
            ->execute();

    foreach ($records as $record) {
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));

      $record->delete();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    if ($this->getUser()->getAttribute('mediaModule') && $this->getUser()->getAttribute('mediaParent')) {
      $this->redirect('@media_list?moduleName=' . $this->getUser()->getAttribute('mediaModule') . '&parent_id=' . $this->getUser()->getAttribute('mediaParent'));
    }
  }

  public function executeFilter(sfWebRequest $request) {
    $this->setPage(1);

    if ($request->hasParameter('_reset')) {
      $this->setFilters($this->configuration->getFilterDefaults());

      if ($this->getUser()->getAttribute('mediaModule') && $this->getUser()->getAttribute('mediaParent')) {
        $this->redirect('@media_list?moduleName=' . $this->getUser()->getAttribute('mediaModule') . '&parent_id=' . $this->getUser()->getAttribute('mediaParent'));
      }
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid()) {
      $this->setFilters($this->filters->getValues());

      if ($this->getUser()->getAttribute('mediaModule') && $this->getUser()->getAttribute('mediaParent')) {
        $this->redirect('@media_list?moduleName=' . $this->getUser()->getAttribute('mediaModule') . '&parent_id=' . $this->getUser()->getAttribute('mediaParent'));
      }
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }

  protected function buildQuery() {
    $tableMethod = $this->configuration->getTableMethod();
    if (null === $this->filters) {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());


    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    if ($this->getUser()->getAttribute('mediaModule') && $this->getUser()->getAttribute('mediaParent')) {
      $query->andWhere('module = ?', $this->getUser()->getAttribute('mediaModule'));
      $query->andWhere('parent_id = ?', $this->getUser()->getAttribute('mediaParent'));
    }

    return $query;
  }

  protected function processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        //Sprawdzenie czy jest główny obrazek zeby robic z nego miniaturki
        $file = $form->getValue('file');
        if ($file) {
          if ($this->getUser()->getAttribute('mediaModule')) {
            //Pobranie rozmarow dla danego modulu
            $mediaSize = media_sizeTable::getSizeOfModule($this->getUser()->getAttribute('mediaModule'));
            //Sprawdzanie które miniatury nalezy wygenerowac
            $min1 = $form->getValue('file_min1');
            $min2 = $form->getValue('file_min2');
            $min3 = $form->getValue('file_min3');
            if (empty($min1) && $mediaSize->getMin1()) {
              $this->createThumbnail($file, $mediaSize->getMin1(), 1, $form);
            }
            if (empty($min2) && $mediaSize->getMin2()) {
              $this->createThumbnail($file, $mediaSize->getMin2(), 2, $form);
            }
            if (empty($min3) && $mediaSize->getMin3()) {
              $this->createThumbnail($file, $mediaSize->getMin3(), 3, $form);
            }
          }
        }
        $media = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
          $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $media)));

      if ($request->hasParameter('_save_and_add')) {
        $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

        $this->redirect('@media_new');
      } else {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'media_edit', 'sf_subject' => $media));
      }
    } else {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  private function createThumbnail($file, $size, $nr, sfForm $form) {
    $pathInfo = pathinfo($file);
    $size = explode('x', $size );
    $thumnail = new sfThumbnail($size[0], $size[1]);
    $thumnail->loadFile( sfConfig::get('sf_web_dir') . '/' . $file);
    //Sprawdzenie czy istnieje katalog thumbs
    if (!file_exists( sfConfig::get('sf_web_dir') . '/' . $pathInfo['dirname'] . '/thumbs')) {
      mkdir( sfConfig::get('sf_web_dir') . '/' . $pathInfo['dirname'] . '/thumbs');
    }
    $fileDes = $pathInfo['dirname'] . '/thumbs/min'.$nr.'_' . $pathInfo['basename'];
    $thumnail->save(sfConfig::get('sf_web_dir') . '/' . $fileDes);
    $form->setValue('file_min' . $nr, $fileDes);
  }

}
