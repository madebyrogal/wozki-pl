<?php

/**
 * news actions.
 *
 * @package    tnt
 * @subpackage news
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions
{
  public function preExecute(){
    parent::preExecute();
    $this->page = pageTable::getPageByRouteHash('news');
    $this->about = pageTable::getPageByRouteHash('about');
    $this->setMeta($this->page);
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('news', sfConfig::get('app_max_news_on_page'));
    $this->pager->setQuery(newsTable::getNewsForPager());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeShow(sfWebRequest $request){
    $this->new = $this->getRoute()->getObject();
    $this->pager = $request->getParameter('page');
  }
}
