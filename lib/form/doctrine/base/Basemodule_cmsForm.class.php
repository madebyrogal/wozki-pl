<?php

/**
 * module_cms form base class.
 *
 * @method module_cms getObject() Returns the current form's model object
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basemodule_cmsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'route_name'      => new sfWidgetFormInputText(),
      'module_group_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('module_group'), 'add_empty' => false)),
      'hidden'          => new sfWidgetFormInputCheckbox(),
      'position'        => new sfWidgetFormInputText(),
      'permission_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 128)),
      'route_name'      => new sfValidatorString(array('max_length' => 128)),
      'module_group_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('module_group'))),
      'hidden'          => new sfValidatorBoolean(array('required' => false)),
      'position'        => new sfValidatorInteger(array('required' => false)),
      'permission_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'module_cms', 'column' => array('position')))
    );

    $this->widgetSchema->setNameFormat('module_cms[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'module_cms';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['permission_list']))
    {
      $this->setDefault('permission_list', $this->object->permission->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savepermissionList($con);

    parent::doSave($con);
  }

  public function savepermissionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['permission_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->permission->getPrimaryKeys();
    $values = $this->getValue('permission_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('permission', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('permission', array_values($link));
    }
  }

}
