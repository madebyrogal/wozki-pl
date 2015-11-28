<?php

/**
 * module_group form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class module_groupForm extends Basemodule_groupForm
{
  public function configure()
  {
    if( $this->isNew() ){
      $this->setDefault('hidden', false);
    }
  }
}
