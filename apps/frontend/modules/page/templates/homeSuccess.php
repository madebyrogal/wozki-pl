<div id="sHeader">
  <?php include_partial('main/headerHP') ?>
</div>
<div id="content">
  <div id="news">
    <?= include_component('page', 'newsOnHome');?>
  </div>
  <div class="box">
    <?= include_component('page', 'offerOnHome');?>
  </div>
  <div class="box">
    <h2><?= $pageContext[0]->getTitle()?></h2>
    <?= $pageContext[0]->getContext(ESC_RAW);?>
    <a class="more" title="" href="<? include_component('page', 'getUrl', array('routeHash'=>'leasing'))?>">zobacz ofertę</a>
  </div>
  <div class="clear"></div>
  <div class="offer_text">
    <h2><?= $pageContext[1]->getTitle()?></h2>
    <?= $pageContext[1]->getContext(ESC_RAW);?>
  </div>
  <div id="specialOffer">
    <a title="" href="<?php include_component('page', 'getUrl', array('routeHash'=>'offer'))?>"><?= __("Zobacz ofertę")?></a>
    <p id="top"><?= __("Gorące oferty!")?></p>
    <p><?= __("Sprawdź ofertę specjalną na nasze wózki widłowe")?></p>
  </div>
  <div id="brands">
    <a class="linde" title="linde"></a>
    <a class="nissan" title="nissan"></a>
    <a class="toyota" title="toyota" ></a>
    <a class="still" title="still" ></a>
    <a class="jungheinrich" title="jungheinrich" ></a>
    <a class="cat" title="cat" ></a>
  </div>
</div>
