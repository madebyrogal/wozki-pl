<?php

/**
 * attachment filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseattachmentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'module'     => new sfWidgetFormFilterInput(),
      'parent_id'  => new sfWidgetFormFilterInput(),
      'file'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'extenstion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'module'     => new sfValidatorPass(array('required' => false)),
      'parent_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'file'       => new sfValidatorPass(array('required' => false)),
      'extenstion' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('attachment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'attachment';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'module'     => 'Text',
      'parent_id'  => 'Number',
      'file'       => 'Text',
      'extenstion' => 'Text',
    );
  }
}
