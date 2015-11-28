<?php

/**
 * media_size filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basemedia_sizeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'module_cms_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('module_cms'), 'add_empty' => true)),
      'min1'          => new sfWidgetFormFilterInput(),
      'min2'          => new sfWidgetFormFilterInput(),
      'min3'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'module_cms_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('module_cms'), 'column' => 'id')),
      'min1'          => new sfValidatorPass(array('required' => false)),
      'min2'          => new sfValidatorPass(array('required' => false)),
      'min3'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('media_size_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'media_size';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'module_cms_id' => 'ForeignKey',
      'min1'          => 'Text',
      'min2'          => 'Text',
      'min3'          => 'Text',
    );
  }
}
