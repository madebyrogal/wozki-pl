<?php

/**
 * productTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class productTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object productTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('product');
    }
    
    public static function getProductForPager($categoryId, $productIds = null){
      $products =  Doctrine_Query::create()
              ->from('product p')
              ->leftJoin('p.Translation pt')
              ->leftJoin('p.attribute_value av ON p.id = av.product_id')
              ->leftJoin('av.Translation avt')
              ->where('p.hidden = ?', 0)
              ->andWhere('p.category_id = ?', $categoryId);
      if( count($productIds)){
        $products->whereIn('p.id', $productIds);
      }
      if($categoryId == 3){
          //13 - To id Marki
          $products->andWhere('av.attribute_def_id = ?', 13);
          $products->orderBy('avt.value ASC');
      }
      else{
          $products->orderBy('pt.name ASC');
      }
      return $products;
    }
    
    public static function getProductPromoForPager(){
      return Doctrine_Query::create()
              ->from('product')
              ->where('hidden = ?', 0)
              ->andWhere('promotion = ?', 1)
              ->orderBy('position ASC');
    }
}