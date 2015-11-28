<?php

/**
 * search actions.
 *
 * @package    tnt
 * @subpackage search
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if($request->isMethod(sfRequest::GET)){
      $formSearch = new searchForm();
      $formSearch->bind($request->getParameter($formSearch->getName()));
      if($formSearch->isValid()){
        $result = array();
        $this->search($formSearch->getValue('search'), $result);
        $this->result = $result;
      }
      else {
        $this->notice = sfContext::getInstance()->getI18N()->__('Przykro nam ale nic nie wpisałeś w formularz wyszukiwania');
      }
      $this->formSearch = $formSearch;
    }
  }
  
  private function search($search, &$result){
    $result['products'] = searchTable::getProduct($search);
    $result['news'] = searchTable::getNews($search);
    $result['articles'] = searchTable::getArticle($search);
  }
}
