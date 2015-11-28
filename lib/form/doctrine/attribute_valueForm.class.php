<?php

/**
 * attribute_value form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class attribute_valueForm extends Baseattribute_valueForm
{
  public function configure()
  {
    $this->embedI18n(sfConfig::get('app_langs'));
    $this->widgetSchema->setLabel('pl', 'Polski');
    $this->widgetSchema->setLabel('de', 'Niemiecki');
    $this->widgetSchema->setLabel('en', 'Angielski');
    $this->widgetSchema->setLabel('ru', 'Rosyjski');
    
    $attributeDefineValue = attribute_def_valueTable::getInstance()->findBy( 'attribute_def_id', $this->getObject()->getAttributeDefId() );
    $attrDefValue = array();
    foreach($attributeDefineValue as $val){
      $attrDefValue[$val->getId()] = $val->getValue();
    }
    if( count( $attrDefValue ) ){
      $this->widgetSchema['pl']['value'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['de']['value'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['en']['value'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['ru']['value'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['attribute_def_value_id'] = new sfWidgetFormChoice( array( 'choices' => $attrDefValue ) );
    }
    else{
      $this->widgetSchema['attribute_def_value_id'] = new sfWidgetFormInputHidden();
    }
    
    $this->widgetSchema['attribute_def_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['product_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['attribute_type_id'] = new sfWidgetFormInputHidden();
    
  }
}
