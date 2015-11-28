<?php

/**
 * lang form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI tomasz.rogalski@huevo.pl
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class langForm extends BaselangForm
{
  public function configure()
  {
    $this->widgetSchema['flag'] = new sfWidgetFormPopUpImageBrowser( array('id' => 'flag', 'folder' => '/useruploads/images/flagi/' ) );
    $this->widgetSchema['position'] = new sfWidgetFormInputHidden();
    if( $this->isNew() ){
      $this->setDefault('hidden', false);
    }
  }
}
