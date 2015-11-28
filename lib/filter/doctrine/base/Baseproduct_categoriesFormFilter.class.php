<?php

/**
 * product_categories filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Baseproduct_categoriesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('parent'), 'add_empty' => true)),
      'hidden'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'position'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'parent_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('parent'), 'column' => 'id')),
      'hidden'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'position'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('product_categories_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'product_categories';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'parent_id' => 'ForeignKey',
      'hidden'    => 'Boolean',
      'position'  => 'Number',
    );
  }
}
