<?php

/**
 * lang filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaselangFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'flag'     => new sfWidgetFormFilterInput(),
      'slug'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hidden'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'position' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'flag'     => new sfValidatorPass(array('required' => false)),
      'slug'     => new sfValidatorPass(array('required' => false)),
      'hidden'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'position' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('lang_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'lang';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'flag'     => 'Text',
      'slug'     => 'Text',
      'hidden'   => 'Boolean',
      'position' => 'Number',
    );
  }
}
