<?php

/**
 * module_permission form base class.
 *
 * @method module_permission getObject() Returns the current form's model object
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basemodule_permissionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'module_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('module_cms'), 'add_empty' => false)),
      'permission_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('permission'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'module_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('module_cms'))),
      'permission_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('permission'))),
    ));

    $this->widgetSchema->setNameFormat('module_permission[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'module_permission';
  }

}
