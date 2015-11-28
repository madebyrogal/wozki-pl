<?php

/**
 * attribute_def_value form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class attribute_def_valueForm extends Baseattribute_def_valueForm
{
  public function configure()
  {
    $this->embedI18n(sfConfig::get('app_langs'));
    $this->widgetSchema->setLabel('pl', 'Polski');
    $this->widgetSchema->setLabel('de', 'Niemiecki');
    $this->widgetSchema->setLabel('en', 'Angielski');
    $this->widgetSchema->setLabel('ru', 'Rosyjski');
    
    $this->widgetSchema['attribute_def_id'] = new sfWidgetFormInputHidden();
    if( $this->isNew() ){
      $this->setDefault( 'attribute_def_id', sfContext::getInstance()->getUser()->getAttribute('attributeDefValueParent') );
    }
  }
}
