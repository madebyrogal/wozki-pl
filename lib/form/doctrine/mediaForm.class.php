<?php

/**
 * media form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mediaForm extends BasemediaForm {

  public function configure() {
    $this->embedI18n(sfConfig::get('app_langs'));
    $this->widgetSchema->setLabel('pl', 'Polski');
    $this->widgetSchema->setLabel('de', 'Niemiecki');
    $this->widgetSchema->setLabel('en', 'Angielski');
    $this->widgetSchema->setLabel('ru', 'Rosyjski');
    $this->widgetSchema['module'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['parent_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['file'] = new sfWidgetFormPopUpImageBrowser(array('id' => 'file'));
    $this->widgetSchema['position'] = new sfWidgetFormInputHidden();

    $module = sfContext::getInstance()->getUser()->getAttribute('mediaModule');
    if (!empty($module)) {
      switch ($module) {
        case 'product':
          $this->widgetSchema['file_min1'] = new sfWidgetFormPopUpImageBrowser(array('id' => 'file_min1'));
          $this->widgetSchema['file_min2'] = new sfWidgetFormPopUpImageBrowser(array('id' => 'file_min2'));
          $this->widgetSchema['file_min3'] = new sfWidgetFormPopUpImageBrowser(array('id' => 'file_min3'));
          $this->widgetSchema['pl']['link'] = new sfWidgetFormInputHidden();
          $this->widgetSchema['de']['link'] = new sfWidgetFormInputHidden();
          $this->widgetSchema['en']['link'] = new sfWidgetFormInputHidden();
          $this->widgetSchema['ru']['link'] = new sfWidgetFormInputHidden();
          break;
      }
    } else {
      $this->widgetSchema['file_min1'] = new sfWidgetFormPopUpImageBrowser(array('id' => 'file_min1'));
      $this->widgetSchema['file_min2'] = new sfWidgetFormPopUpImageBrowser(array('id' => 'file_min2'));
      $this->widgetSchema['file_min3'] = new sfWidgetFormPopUpImageBrowser(array('id' => 'file_min3'));
      $this->widgetSchema['pl']['link'] = new sfWidgetFormInput();
      $this->widgetSchema['de']['link'] = new sfWidgetFormInput();
      $this->widgetSchema['en']['link'] = new sfWidgetFormInput();
      $this->widgetSchema['ru']['link'] = new sfWidgetFormInput();
    }



    if ($this->isNew()) {
      $this->setDefault('module', sfContext::getInstance()->getUser()->getAttribute('mediaModule'));
      $this->setDefault('parent_id', sfContext::getInstance()->getUser()->getAttribute('mediaParent'));
      $this->setDefault('main', false);
    }
  }
  
  public function setValue($name, $value){
    $this->values[$name] = $value;
  }

}
