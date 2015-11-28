<?php

/**
 * gallery_1 form.
 *
 * @package    tnt
 * @subpackage form
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gallery_1Form extends Basegallery_1Form
{
  public function configure()
  {
      if($this->isNew()){
          $this->setDefault('hidden', false);
      }
  }
}
