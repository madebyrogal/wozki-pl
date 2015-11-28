<h2><?= $page->getTitle()?></h2>
<ul>
  <?php foreach ($subPage as $item):?>
  <li>
    <a title="<?= $item->getTitle()?>" 
       href="
        <?php if($item->getRouteName() == 'staticPage'):?>
          <?= url_for('staticPage', $item)?>
        <?php else:?>
          <?= url_for('@' . $item->getRouteName())?>
        <?php endif;?>
       ">
       <?= $item->getSubtitle()?>
    </a>
  </li>
  <?php endforeach?>
</ul>
