<?php

/**
 * attribute_def filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Baseattribute_defFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'module'    => new sfWidgetFormFilterInput(),
      'parent_id' => new sfWidgetFormFilterInput(),
      'type_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_type'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'module'    => new sfValidatorPass(array('required' => false)),
      'parent_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('attribute_type'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('attribute_def_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'attribute_def';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'module'    => 'Text',
      'parent_id' => 'Number',
      'type_id'   => 'ForeignKey',
    );
  }
}
