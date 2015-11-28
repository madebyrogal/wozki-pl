<?php

/**
 * module_cms form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class module_cmsForm extends Basemodule_cmsForm
{
  public function configure()
  {
    $this->widgetSchema['module_group_id'] = new sfWidgetFormDoctrineChoice( array( 'model' => $this->getRelatedModelName( 'module_group' ), 'add_empty' => false, 'table_method' => 'getModuleGroups' ));
    if( $this->isNew() ){
      $this->setDefault('hidden', false);
    }
  }
}
