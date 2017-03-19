<?php

/**
 * offer actions.
 *
 * @package    tnt
 * @subpackage offer
 * @author     Tomasz ROGALSKI rogalski.tomaszek@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class offerActions extends sfActions
{

    public function preExecute()
    {

        parent::preExecute();
        $this->offer = pageTable::getPageByRouteHash('offer');
        $this->setMeta($this->offer);
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {

        $category = product_categoriesTable::getFirstCategory();
        $this->offer = pageTable::getPageByRouteHash('offer_use');
        $this->pageContext = textTable::getPageContext($this->offer->getId());

        $this->setMeta($this->offer);
        $this->productList($category, $request->getParameter('page', 1));
        if ($request->getParameter('page'))
            $this->getResponse()->setTitle($this->getResponse()->getTitle() . ' | Strona ' . $request->getParameter('page'));
    }

    public function executeProductList(sfWebRequest $request)
    {

        if ($request->getParameter('drive') && !$request->getParameter('driveId') || !is_numeric($request->getParameter('driveId'))) {
            $this->forward404();
            die();
        }
        $productIds = array();
        $this->category = $this->getRoute()->getObject();
        $cateogryAttr = attribute_defTable::getCategoriesAttributesIds($this->category->getId());

        if ($cateogryAttr) {
            $this->categoryHasAttribute = true;
            if ($this->category->getId() == 1) {
                //Pobranie napędu dla używanych
                $this->attribute = attribute_defTable::getAttributeById(4);
                $this->attributeDefValues = attribute_def_valueTable::getAttributeDefValues(4);
            } elseif ($this->category->getId() == 5) {
                //Pobranie napędu dla nowych
                $this->attribute = attribute_defTable::getAttributeById(20);
                $this->attributeDefValues = attribute_def_valueTable::getAttributeDefValues(20);
            }
            $values = array();
            $A = $this->attributeDefValues->toArray();
            foreach ($A as $value)
                $values[] = $value['id'];

            $this->driveId = 0;
            //Sprawdzanie napędu i odpowiednie filtrowanie
            if ($request->getParameter('driveId')) {
                $this->driveId = $request->getParameter('driveId');
                if (!in_array($this->driveId, $values)) {
                    $this->forward404();
                    die();
                }
                if ($this->category->getId() == 1) {
                    //Pobranie wozków używanych

                    $productIds = attribute_valueTable::getProductWithAttributeValue(4, $this->driveId);
                } elseif ($this->category->getId() == 5) {


                    //Pobranie wozków nowych
                    $productIds = attribute_valueTable::getProductWithAttributeValue(20, $this->driveId);
                }
            }
        } else {
            $this->categoryHasAttribute = false;
        }

        $this->pager = new sfDoctrinePager('product', sfConfig::get('app_max_product_on_page'));
        $this->pager->setQuery(productTable::getProductForPager($this->category->getId(), $productIds));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    //Spaw żeby nie robić 302 przekierowania
    public function productList($category, $page, $template = 'productList')
    {
        $productIds = array();
        $this->category = $category;
        $cateogryAttr = attribute_defTable::getCategoriesAttributesIds($this->category->getId());
        if ($cateogryAttr) {
            $this->categoryHasAttribute = true;
            if ($this->category->getId() == 1) {
                //Pobranie napędu dla używanych
                $this->attribute = attribute_defTable::getAttributeById(4);
                $this->attributeDefValues = attribute_def_valueTable::getAttributeDefValues(4);
            } elseif ($this->category->getId() == 5) {
                //Pobranie napędu dla nowych
                $this->attribute = attribute_defTable::getAttributeById(20);
                $this->attributeDefValues = attribute_def_valueTable::getAttributeDefValues(20);
            } elseif($this->category->getId() == 7) {
                //Pobranie napędu dla nowych nabytych
                $this->attribute = attribute_defTable::getAttributeById(30);
                $this->attributeDefValues = attribute_def_valueTable::getAttributeDefValues(30);
            }
            $this->driveId = 0;
        } else {
            $this->categoryHasAttribute = false;
        }
        $this->pager = new sfDoctrinePager('product', sfConfig::get('app_max_product_on_page'));
        $this->pager->setQuery(productTable::getProductForPager($this->category->getId(), $productIds));
        $this->pager->setPage($page);
        $this->pager->init();
        $this->setTemplate($template);
    }

    public function executeUse(sfWebRequest $request)
    {
        $category = product_categoriesTable::getInstance()->findOneBy('id', 1);
        $this->productList($category, $request->getParameter('page', 1));
    }

    public function executeNew(sfWebRequest $request)
    {

        $category = product_categoriesTable::getInstance()->findOneBy('id', 5);
        $this->productList($category, $request->getParameter('page', 1));
    }

    public function executeParts(sfWebRequest $request)
    {
        $category = product_categoriesTable::getInstance()->findOneBy('id', 6);
        $this->offer = pageTable::getPageByRouteHash('offer_parts');
        $this->pageContext = textTable::getPageContext($this->offer->getId());
        $this->setMeta($this->offer);
        $this->productList($category, $request->getParameter('page', 1));
    }

    public function executeEquipment(sfWebRequest $request)
    {
        $category = product_categoriesTable::getInstance()->findOneBy('id', 3);
        $this->offer = pageTable::getPageByRouteHash('offer_equipment');
        $this->pageContext = textTable::getPageContext($this->offer->getId());
        $this->setMeta($this->offer);
        $this->productList($category, $request->getParameter('page', 1), 'equipmentList');
    }

    public function executeTires(sfWebRequest $request)
    {
        $category = product_categoriesTable::getInstance()->findOneBy('id', 2);
        $this->offer = pageTable::getPageByRouteHash('offer_tires');
        $this->pageContext = textTable::getPageContext($this->offer->getId());
        $this->setMeta($this->offer);
        $this->productList($category, $request->getParameter('page', 1), 'tiresList');
    }

    public function executePromotion(sfWebRequest $request)
    {
        $this->pagePromo = pageTable::getPageByRouteHash('offer_promotion');
        $this->pager = new sfDoctrinePager('product', sfConfig::get('app_max_product_on_page'));
        $this->pager->setQuery(productTable::getProductPromoForPager());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        $this->setTemplate('productList');
    }

    public function executeProductDetails(sfWebRequest $request)
    {
        $this->product = $this->getRoute()->getObject();
        $this->category = $this->product->category;
        /* 	ob_start();
          var_dump( ($this->product));
          $foo = ob_get_clean(); */
        //	file_put_contents("log",$foo);
        $T = $this->product->Translation->toArray();

        $this->getResponse()->setTitle($T["pl"]["name"]);
    }
    
    public function executeNewBuy(sfWebRequest $request)
    {
        $category = product_categoriesTable::getInstance()->findOneBy('id', 7);
        $this->productList($category, $request->getParameter('page', 1), 'productListWithoutPicture');
    }

}
