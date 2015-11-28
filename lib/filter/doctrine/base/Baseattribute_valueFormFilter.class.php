<?php

/**
 * attribute_value filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Baseattribute_valueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'attribute_def_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_def'), 'add_empty' => true)),
      'attribute_def_value_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_def_value'), 'add_empty' => true)),
      'attribute_type_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_type'), 'add_empty' => true)),
      'product_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('product'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'attribute_def_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('attribute_def'), 'column' => 'id')),
      'attribute_def_value_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('attribute_def_value'), 'column' => 'id')),
      'attribute_type_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('attribute_type'), 'column' => 'id')),
      'product_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('product'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('attribute_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'attribute_value';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'attribute_def_id'       => 'ForeignKey',
      'attribute_def_value_id' => 'ForeignKey',
      'attribute_type_id'      => 'ForeignKey',
      'product_id'             => 'ForeignKey',
    );
  }
}
