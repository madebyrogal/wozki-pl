<?php

/**
 * textTranslation filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasetextTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'   => new sfWidgetFormFilterInput(),
      'context' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'title'   => new sfValidatorPass(array('required' => false)),
      'context' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('text_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'textTranslation';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'title'   => 'Text',
      'context' => 'Text',
      'lang'    => 'Text',
    );
  }
}
