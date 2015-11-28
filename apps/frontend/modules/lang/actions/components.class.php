<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author Rogal
 */
class langComponents extends sfComponents{
  
  public function executeShowLangs(){
    $this->langs = langTable::getAllVisibleLang();
    $this->actLang = langTable::getInstance()->findOneBy('slug', sfContext::getInstance()->getUser()->getCulture());
  }
}

?>
