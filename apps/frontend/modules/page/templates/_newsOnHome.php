<h2><?= $page->getTitle()?></h2>
<div class="boxNews">
  <p class="date"><?= $news->getDateFrom()?></p>
  <p class="title"><?= $news->getTitle();?></p>
  <p class="text"><?= $news->getSneakPeak();?></p>
  <a class="more" title="<?= $page->getTitle()?>" href="<?= url_for('@news')?>"><?= __("więcej")?></a>
</div>