<div id="sHeader">
  <div class="sHeaderTop">
    <h1><?= $about->getTitle() ?></h1>
    <?= include_component('page', 'subpage', array('page' => $about, 'activePageId' => $page->getId())) ?>
    <?php include_component('search', 'showForm') ?>
    <div class="clear"></div>
  </div>
</div>
<div id="content">
  <div class="sTollbar">
    <a class="back" title="" href="<?= url_for('news', $page) . '?page=' . $pager?>">Powrót do listy</a>
    <?= include_component('news', 'generateNaviPage', array('object'=>$new))?>               
  </div>
  <h2><?= $new->getTitle() ?></h2>
  <?= $new->getBody(ESC_RAW) ?>
</div>