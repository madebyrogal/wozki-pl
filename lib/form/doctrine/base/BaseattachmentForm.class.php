<?php

/**
 * attachment form base class.
 *
 * @method attachment getObject() Returns the current form's model object
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseattachmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'module'     => new sfWidgetFormInputText(),
      'parent_id'  => new sfWidgetFormInputText(),
      'file'       => new sfWidgetFormTextarea(),
      'extenstion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'module'     => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'parent_id'  => new sfValidatorInteger(array('required' => false)),
      'file'       => new sfValidatorString(),
      'extenstion' => new sfValidatorString(array('max_length' => 8)),
    ));

    $this->widgetSchema->setNameFormat('attachment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'attachment';
  }

}
