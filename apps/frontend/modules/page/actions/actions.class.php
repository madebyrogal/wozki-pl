<?php

/**
 * page actions.
 *
 * @package    tnt
 * @subpackage page
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->page = pageTable::getFirstPage();
    $this->pageContext = textTable::getPageContext( $this->page->getId() );
    $this->setLayout($this->page->getLayout());
    $this->setTemplate($this->page->getTemplate());
    $this->setMeta($this->page);
  }
  
  public function executeShowPage(sfWebRequest $request){
    $this->page = $this->getRoute()->getObject();
    $this->pageContext = textTable::getPageContext( $this->page->getId() );
    $this->setLayout($this->page->getLayout());
    $this->setTemplate($this->page->getTemplate());
    $this->setMeta($this->page);
  }
}
