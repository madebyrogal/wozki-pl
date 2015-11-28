<?php

/**
 * attribute_value form base class.
 *
 * @method attribute_value getObject() Returns the current form's model object
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Baseattribute_valueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'attribute_def_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_def'), 'add_empty' => false)),
      'attribute_def_value_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_def_value'), 'add_empty' => true)),
      'attribute_type_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_type'), 'add_empty' => false)),
      'product_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('product'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'attribute_def_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_def'))),
      'attribute_def_value_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_def_value'), 'required' => false)),
      'attribute_type_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_type'))),
      'product_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('product'))),
    ));

    $this->widgetSchema->setNameFormat('attribute_value[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'attribute_value';
  }

}
