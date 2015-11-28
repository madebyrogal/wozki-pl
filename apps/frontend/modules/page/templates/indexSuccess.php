<div id="sHeader">
  <div class="sHeaderTop">
    <h1><?= $page->getTitle()?></h1>
    <?= include_component('page', 'subpage', array('page'=>$page))?>
    <?php include_component('search', 'showForm') ?>
    <div class="clear"></div>
  </div>
</div>
<div id="content">
  <h2><?= $pageContext[0]->getTitle() ?></h2>
  <?= $pageContext[0]->getContext(ESC_RAW) ?>
</div>
