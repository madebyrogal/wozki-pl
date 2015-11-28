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
class offerComponents extends sfComponents{
  
  public function executeCategories(sfWebRequest $request){
    $this->categories = product_categoriesTable::getCategories();
    $this->promoPage = pageTable::getPageByRouteHash('offer_promotion');
  }
  
  public function executeProductListImage(){
    $this->media = mediaTable::getMainMedia('product', $this->product->getId());
  }
  
  public function executeProductListDetails(){
    $this->productAttributes = attribute_valueTable::getProductAttributesFrontEnd($this->product);
  }
  
  public function executeEquipmentListDetails(){
    $this->productAttributes = attribute_valueTable::getProductAttributesFrontEnd($this->product);
  }
  
  public function executeTiresListDetails(){
    $this->productAttributes = attribute_valueTable::getProductAttributesFrontEnd($this->product);
  }
  
  public function executeShowAttributes(){
    $this->attributes = attribute_valueTable::getProductAttributesFrontEnd($this->product);
  }
  
  public function executeShowGallery(){
    $this->media = mediaTable::getMainMedia('product', $this->product->getId());
    $this->gallery = mediaTable::getGallery('product', $this->product->getId());
  }
}

?>
