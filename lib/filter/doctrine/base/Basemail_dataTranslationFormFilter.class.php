<?php

/**
 * mail_dataTranslation filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basemail_dataTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'subject' => new sfWidgetFormFilterInput(),
      'body'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'subject' => new sfValidatorPass(array('required' => false)),
      'body'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mail_data_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mail_dataTranslation';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'subject' => 'Text',
      'body'    => 'Text',
      'lang'    => 'Text',
    );
  }
}
