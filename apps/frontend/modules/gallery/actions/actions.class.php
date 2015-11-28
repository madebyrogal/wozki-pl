<?php

/**
 * gallery actions.
 *
 * @package    tnt
 * @subpackage gallery
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class galleryActions extends sfActions {

    public function preExecute() {
        parent::preExecute();
        $this->gallery = pageTable::getPageByRouteHash('gallery');
        $this->setMeta($this->gallery);
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->gallery = pageTable::getPageByRouteHash('gallery');
        $this->pageContext = textTable::getPageContext($this->gallery->getId());
        $this->setMeta($this->gallery);
        $gallery = gallery_1Table::getInstance()->findAll()->getFirst();
        
        $mediaIds = array();
        $media = mediaTable::getGallery('gallery_1', $gallery->getId());
        foreach ($media as $m) {
          $mediaIds[] = $m->getId();
        }
        $this->pager = new sfDoctrinePager('gallery', sfConfig::get('app_max_media_on_page'));
        $this->pager->setQuery(mediaTable::getMediaForPager($mediaIds));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

}
