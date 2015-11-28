<?php

/**
 * attribute_def form base class.
 *
 * @method attribute_def getObject() Returns the current form's model object
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Baseattribute_defForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'module'    => new sfWidgetFormInputText(),
      'parent_id' => new sfWidgetFormInputText(),
      'type_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_type'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'module'    => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'parent_id' => new sfValidatorInteger(array('required' => false)),
      'type_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('attribute_type'))),
    ));

    $this->widgetSchema->setNameFormat('attribute_def[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'attribute_def';
  }

}
