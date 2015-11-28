<?php

/**
 * media filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemediaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'module'    => new sfWidgetFormFilterInput(),
      'parent_id' => new sfWidgetFormFilterInput(),
      'main'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'file'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'file_min1' => new sfWidgetFormFilterInput(),
      'file_min2' => new sfWidgetFormFilterInput(),
      'file_min3' => new sfWidgetFormFilterInput(),
      'position'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'module'    => new sfValidatorPass(array('required' => false)),
      'parent_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'main'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'file'      => new sfValidatorPass(array('required' => false)),
      'file_min1' => new sfValidatorPass(array('required' => false)),
      'file_min2' => new sfValidatorPass(array('required' => false)),
      'file_min3' => new sfValidatorPass(array('required' => false)),
      'position'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('media_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'media';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'module'    => 'Text',
      'parent_id' => 'Number',
      'main'      => 'Boolean',
      'file'      => 'Text',
      'file_min1' => 'Text',
      'file_min2' => 'Text',
      'file_min3' => 'Text',
      'position'  => 'Number',
    );
  }
}
