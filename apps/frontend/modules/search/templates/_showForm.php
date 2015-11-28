<div id="sSearch">
  <form id="searchForm" action="<?= url_for('@search')?>" method="GET">
    <?= $formSearch->renderHiddenFields()?>
    <?= $formSearch['search']->render()?>
  </form>
</div>