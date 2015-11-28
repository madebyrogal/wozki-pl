<?php

/**
 * lang form base class.
 *
 * @method lang getObject() Returns the current form's model object
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaselangForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInputText(),
      'flag'     => new sfWidgetFormTextarea(),
      'slug'     => new sfWidgetFormInputText(),
      'hidden'   => new sfWidgetFormInputCheckbox(),
      'position' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 32)),
      'flag'     => new sfValidatorString(array('required' => false)),
      'slug'     => new sfValidatorString(array('max_length' => 5)),
      'hidden'   => new sfValidatorBoolean(array('required' => false)),
      'position' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'lang', 'column' => array('position')))
    );

    $this->widgetSchema->setNameFormat('lang[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'lang';
  }

}
