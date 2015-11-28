<?php

/**
 * media_size form base class.
 *
 * @method media_size getObject() Returns the current form's model object
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basemedia_sizeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'module_cms_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('module_cms'), 'add_empty' => false)),
      'min1'          => new sfWidgetFormInputText(),
      'min2'          => new sfWidgetFormInputText(),
      'min3'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'module_cms_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('module_cms'))),
      'min1'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'min2'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'min3'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('media_size[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'media_size';
  }

}
