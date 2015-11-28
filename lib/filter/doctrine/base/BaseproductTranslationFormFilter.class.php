<?php

/**
 * productTranslation filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseproductTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'info'  => new sfWidgetFormFilterInput(),
      'price' => new sfWidgetFormFilterInput(),
      'slug'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'  => new sfValidatorPass(array('required' => false)),
      'info'  => new sfValidatorPass(array('required' => false)),
      'price' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'slug'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'productTranslation';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'name'  => 'Text',
      'info'  => 'Text',
      'price' => 'Number',
      'lang'  => 'Text',
      'slug'  => 'Text',
    );
  }
}
