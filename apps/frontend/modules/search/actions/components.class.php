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
class searchComponents extends sfComponents{
  public function executeShowForm(){
    $this->formSearch = new searchForm();
  }
}

?>
