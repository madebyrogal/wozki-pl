<?php

/**
 * module_cms filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basemodule_cmsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'route_name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'module_group_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('module_group'), 'add_empty' => true)),
      'hidden'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'position'        => new sfWidgetFormFilterInput(),
      'permission_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'route_name'      => new sfValidatorPass(array('required' => false)),
      'module_group_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('module_group'), 'column' => 'id')),
      'hidden'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'position'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'permission_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('module_cms_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addPermissionListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.module_permission module_permission')
      ->andWhereIn('module_permission.permission_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'module_cms';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'route_name'      => 'Text',
      'module_group_id' => 'ForeignKey',
      'hidden'          => 'Boolean',
      'position'        => 'Number',
      'permission_list' => 'ManyKey',
    );
  }
}
