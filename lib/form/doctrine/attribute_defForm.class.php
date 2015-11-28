<?php

/**
 * attribute_def form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class attribute_defForm extends Baseattribute_defForm
{
  public function configure()
  {
    $this->embedI18n(sfConfig::get('app_langs'));
    $this->widgetSchema->setLabel('pl', 'Polski');
    $this->widgetSchema->setLabel('de', 'Niemiecki');
    $this->widgetSchema->setLabel('en', 'Angielski');
    $this->widgetSchema->setLabel('ru', 'Rosyjski');
    
    $this->widgetSchema['module'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['parent_id'] = new sfWidgetFormInputHidden();
    
    if( $this->isNew() ){
      $this->setDefault('module', sfContext::getInstance()->getUser()->getAttribute('attributeDefModule') );
      $this->setDefault('parent_id', sfContext::getInstance()->getUser()->getAttribute('attributeDefParent') );
    }
  }
}
