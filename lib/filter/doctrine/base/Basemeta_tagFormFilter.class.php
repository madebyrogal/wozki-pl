<?php

/**
 * meta_tag filter form base class.
 *
 * @package    tnt
 * @subpackage filter
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basemeta_tagFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'module'    => new sfWidgetFormFilterInput(),
      'parent_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'module'    => new sfValidatorPass(array('required' => false)),
      'parent_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('meta_tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'meta_tag';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'module'    => 'Text',
      'parent_id' => 'Number',
    );
  }
}
