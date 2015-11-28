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
class pageComponents extends sfComponents {

    public function executeShowMenuHeader(sfWebRequest $request) {
        $pages = pageTable::getMenuHeader();
        $menu = array();
        foreach ($pages as $key => $page) {
            $menu[$key]['page'] = $page;
            $subPage = pageTable::getSubPage($page);
            if ($subPage->count()) {
                $menu[$key]['subpage'] = $subPage;
            }
        }
        $this->menu = $menu;
        switch ($request->getParameter('module')) {
            case 'main':
                $page = pageTable::getFirstPage();
                $this->activePageId = $page->getId();
                break;
            case 'offer':
                $page = pageTable::getPageByRouteHash('offer');
                $this->activePageId = $page->getId();
                break;
            case 'contact':
                $page = pageTable::getPageByRouteHash('contact');
                $this->activePageId = $page->getId();
                break;
            case 'news':
            case 'article':
                $page = pageTable::getPageByRouteHash('about');
                $this->activePageId = $page->getId();
                break;
            default:
                $this->activePageId = $request->getParameter('id');
                break;
        }
    }

    public function executeSubpage(sfWebRequest $request) {
        $this->subPage = pageTable::getSubPage($this->page);
    }

    public function executeGetUrl(sfWebRequest $request) {
        $this->page = pageTable::getPageByRouteHash($this->routeHash);
    }

    public function executeOfferOnHome() {
        $this->page = pageTable::getPageByRouteHash('offer');
        $this->subPage = pageTable::getSubPage($this->page);
    }

    public function executeNewsOnHome() {
        $this->news = newsTable::getLastNews();
        $this->page = pageTable::getPageByRouteHash('news');
    }

    public function executeMenuOnFooter() {
        $menu = pageTable::getMenuFooter();
        $seoMenu = array();
        //Seo linki wewnętrzne
        $about = array('Wózki widłowe Strzałkowo');
        $offer = array('Wózek boczny', 'Wózki boczne', 'Wózki widłowe boczne', 'Wózek widłowy boczny', 'Wózki widłowe spalinowe', 'Wózek widłowy elektryczny', 'Wózki widłowe elektryczne', 'Wózek widłowy na gaz', 'Wózki widłowe na gaz', 'Oferta wózków widłowych');
        $equipment = array('Osprzęt do wózków widłowych');
        foreach ($menu as $key => $item) {
            switch ($item->getRouteHash()) {
                case 'about':
                    $seoMenu[$key]['title'] = $about[array_rand($about, 1)];
                    $seoMenu[$key]['page'] = $item;
                    break;
                case 'offer':
                    $seoMenu[$key]['title'] = $offer[array_rand($offer, 1)];
                    $seoMenu[$key]['page'] = $item;
                    break;
                case 'offer_equipment':
                    $seoMenu[$key]['title'] = $equipment[array_rand($equipment, 1)];
                    $seoMenu[$key]['page'] = $item;
                    break;
                default :
                    $seoMenu[$key]['title'] = $item->getTitle();
                    $seoMenu[$key]['page'] = $item;
                    break;
            }
        }

        $this->menu = $seoMenu;
    }

}

?>
