<?php

/**
 * attribute_def_value filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Baseattribute_def_valueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'attribute_def_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_def'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'attribute_def_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('attribute_def'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('attribute_def_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'attribute_def_value';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'attribute_def_id' => 'ForeignKey',
    );
  }
}
