<?php

/**
 * article actions.
 *
 * @package    tnt
 * @subpackage article
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends sfActions
{
  public function preExecute(){
    parent::preExecute();
    $this->page = pageTable::getPageByRouteHash('article');
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
    $this->pager = new sfDoctrinePager('article', sfConfig::get('app_max_article_on_page'));
    $this->pager->setQuery(articleTable::getArticleForPager());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeShow(sfWebRequest $request){
    $this->article = $this->getRoute()->getObject();
    $this->pager = $request->getParameter('page');
  }
}
