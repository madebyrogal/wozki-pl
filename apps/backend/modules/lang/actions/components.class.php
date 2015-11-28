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
  
  public function executeShowLang(sfWebRequest $request){
    $this->langs = langTable::getAllVisibleLang();
  }
}

?>
