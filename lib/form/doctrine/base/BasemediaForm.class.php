<?php

/**
 * media form base class.
 *
 * @method media getObject() Returns the current form's model object
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemediaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'module'    => new sfWidgetFormInputText(),
      'parent_id' => new sfWidgetFormInputText(),
      'main'      => new sfWidgetFormInputCheckbox(),
      'file'      => new sfWidgetFormTextarea(),
      'file_min1' => new sfWidgetFormTextarea(),
      'file_min2' => new sfWidgetFormTextarea(),
      'file_min3' => new sfWidgetFormTextarea(),
      'position'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'module'    => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'parent_id' => new sfValidatorInteger(array('required' => false)),
      'main'      => new sfValidatorBoolean(array('required' => false)),
      'file'      => new sfValidatorString(),
      'file_min1' => new sfValidatorString(array('required' => false)),
      'file_min2' => new sfValidatorString(array('required' => false)),
      'file_min3' => new sfValidatorString(array('required' => false)),
      'position'  => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'media', 'column' => array('position', 'parent_id')))
    );

    $this->widgetSchema->setNameFormat('media[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'media';
  }

}
