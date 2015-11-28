<?php

/**
 * mail_data filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basemail_dataFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email_from' => new sfWidgetFormFilterInput(),
      'name_from'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'email_from' => new sfValidatorPass(array('required' => false)),
      'name_from'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mail_data_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mail_data';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'email_from' => 'Text',
      'name_from'  => 'Text',
    );
  }
}
