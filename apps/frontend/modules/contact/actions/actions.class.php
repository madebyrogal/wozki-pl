<?php

/**
 * contact actions.
 *
 * @package    tnt
 * @subpackage contact
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactActions extends sfActions {

  public function preExecute(){
    parent::preExecute();
    $this->page = pageTable::getPageByRouteHash('contact');
    $this->setMeta($this->page);
  }
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request) {
    $this->pageContext = textTable::getPageContext( $this->page->getId() );
  }

}
