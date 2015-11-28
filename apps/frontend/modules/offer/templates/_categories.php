<ul class="menu">
  <?php foreach($categories as $category):?>
  <li>
    <a title="<?= $category->getName()?>" 
       href="<?= url_for('offer_category', $category)?>" 
         <?php if(isset($activeCategoryId) && $activeCategoryId == $category->getId()):?>class="active<?php endif?>">
       <?= $category->getName()?>
    </a>
  </li>
  <?php endforeach?>
  <li>
    <span class="special"></span>
    <a href="<?= include_component('page', 'getUrl', array('routeHash'=>'offer_promotion'))?>"
       title="<?= $promoPage->getTitle()?>"
       <?php if(isset($activeCategoryId) && $activeCategoryId == 'offer_promotion'):?>class="active<?php endif?>">
       <?= $promoPage->getTitle()?>
    </a> 
    <span>(<?= __("gorące oferty")?>)</span>
  </li>
</ul>
