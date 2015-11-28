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
    <a class="back" title="" href="<?= url_for('article', $page) . '?page=' . $pager?>">Powrót do listy</a>
    <?= include_component('article', 'generateNaviPage', array('object'=>$article))?>                
  </div>
  <h2><?= $article->getTitle() ?></h2>
  <p class="date"><?= date('d-m-Y', strtotime($article->getDateFrom()))?></p>
  <p class="date"><?= __("Autor")?>: <?= $article->getAuthor()?></p>
  <?= $article->getBody(ESC_RAW) ?>
</div>