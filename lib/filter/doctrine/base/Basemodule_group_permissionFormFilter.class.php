<?php

/**
 * module_group_permission filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basemodule_group_permissionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'module_group_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('module_group'), 'add_empty' => true)),
      'permission_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('permission'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'module_group_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('module_group'), 'column' => 'id')),
      'permission_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('permission'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('module_group_permission_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'module_group_permission';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'module_group_id' => 'ForeignKey',
      'permission_id'   => 'ForeignKey',
    );
  }
}
