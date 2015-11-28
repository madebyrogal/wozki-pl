<?php

/**
 * page filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasepageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'layout'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'route_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'route_hash'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'parent_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('parent'), 'add_empty' => true)),
      'hidden'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'not_in_menu' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'position'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'layout'      => new sfValidatorPass(array('required' => false)),
      'route_name'  => new sfValidatorPass(array('required' => false)),
      'route_hash'  => new sfValidatorPass(array('required' => false)),
      'parent_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('parent'), 'column' => 'id')),
      'hidden'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'not_in_menu' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'position'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'page';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'layout'      => 'Text',
      'route_name'  => 'Text',
      'route_hash'  => 'Text',
      'parent_id'   => 'ForeignKey',
      'hidden'      => 'Boolean',
      'not_in_menu' => 'Boolean',
      'position'    => 'Number',
    );
  }
}
