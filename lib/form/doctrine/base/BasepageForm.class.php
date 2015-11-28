<?php

/**
 * page form base class.
 *
 * @method page getObject() Returns the current form's model object
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasepageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'layout'      => new sfWidgetFormInputText(),
      'route_name'  => new sfWidgetFormInputText(),
      'route_hash'  => new sfWidgetFormInputText(),
      'parent_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('parent'), 'add_empty' => true)),
      'hidden'      => new sfWidgetFormInputCheckbox(),
      'not_in_menu' => new sfWidgetFormInputCheckbox(),
      'position'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'layout'      => new sfValidatorString(array('max_length' => 64)),
      'route_name'  => new sfValidatorString(array('max_length' => 64)),
      'route_hash'  => new sfValidatorString(array('max_length' => 64)),
      'parent_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('parent'), 'required' => false)),
      'hidden'      => new sfValidatorBoolean(array('required' => false)),
      'not_in_menu' => new sfValidatorBoolean(array('required' => false)),
      'position'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'page', 'column' => array('route_hash'))),
        new sfValidatorDoctrineUnique(array('model' => 'page', 'column' => array('position', 'parent_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'page';
  }

}
