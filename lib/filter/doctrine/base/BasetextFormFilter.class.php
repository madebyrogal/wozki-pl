<?php

/**
 * text filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasetextFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'module'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'parent_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hidden'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'module'    => new sfValidatorPass(array('required' => false)),
      'parent_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hidden'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('text_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'text';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'module'    => 'Text',
      'parent_id' => 'Number',
      'hidden'    => 'Boolean',
    );
  }
}
