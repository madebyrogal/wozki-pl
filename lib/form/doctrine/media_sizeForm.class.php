<?php

/**
 * media_size form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class media_sizeForm extends Basemedia_sizeForm
{
  public function configure()
  {
    $this->widgetSchema['module_cms_id'] = new sfWidgetFormDoctrineChoice( array( 'model' => $this->getRelatedModelName('module_cms'), 'add_empty' => false, 'table_method' => 'getModuleCMS' ) );
  }
}
