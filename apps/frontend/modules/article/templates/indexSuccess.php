<div id="sHeader">
  <div class="sHeaderTop">
    <h1><?= $about->getTitle() ?></h1>
    <?= include_component('page', 'subpage', array('page' => $about, 'activePageId'=>$page->getId())) ?>
    <?php include_component('search', 'showForm') ?>
    <div class="clear"></div>
  </div>
</div>
<div id="content">  
  <div class="sTollbar">
    <a href="<?= url_for('staticPage', $about)?>" title="" class="back"><?= __("Powrót")?></a>
    <?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
      <a class="backPage" title="" href="<?= url_for('article') . '?page=' . $pager->getPreviousPage()?>"></a>
      <?php foreach($pager->getLinks() as $link):?>
      <a class="<?php if($link == $pager->getPage()):?>active<?php endif;?>" title="" href="<?= url_for('article') . '?page=' . $link?>"><?= $link?></a>
      <?php endforeach;?>
      <a class="nextPage" title="" href="<?= url_for('article') . '?page=' . $pager->getNextPage()?>"></a>
    </div>
    <?php endif;?>
  </div>  
  <ul class="news">
    <?php foreach($pager->getResults() as $new): ?>
    <li>
      <p class="date"><?= date('d-m-Y', strtotime($new->getDateFrom()))?></p>
      <p class="title"><?= $new->getTitle()?></p>
      <p><?= $new->getSneakPeak()?> <a class="more" title="" href="<?= url_for('article_show', $new) . '?page=' . $pager->getPage()?>"><?= __("więcej")?></a></p>
    </li>
    <?php endforeach;?>
  </ul>
  <div class="clear"></div>
  <div class="sTollbar">
    <a href="<?= url_for('staticPage', $about)?>" title="" class="back"><?= __("Powrót")?></a>
    <?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
      <a class="backPage" title="" href="<?= url_for('article') . '?page=' . $pager->getPreviousPage()?>"></a>
      <?php foreach($pager->getLinks() as $link):?>
      <a class="<?php if($link == $pager->getPage()):?>active<?php endif;?>" title="" href="<?= url_for('article') . '?page=' . $link?>"><?= $link?></a>
      <?php endforeach;?>
      <a class="nextPage" title="" href="<?= url_for('article') . '?page=' . $pager->getNextPage()?>"></a>
    </div>
    <?php endif;?>
  </div>
</div>