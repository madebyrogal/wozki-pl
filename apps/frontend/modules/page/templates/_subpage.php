<ul class="menu">
  <?php foreach($subPage as $item):?>
  <li>
    <a title="<?= $item->getTitle()?>" 
       href="
        <?php if($item->getRouteName() == 'staticPage'):?>
          <?= url_for('staticPage', $item)?>
        <?php else:?>
          <?= url_for('@' . $item->getRouteName())?>
        <?php endif;?>
       " <?php if(isset($activePageId) && $activePageId == $item->getId()):?>class="active<?php endif?>">
       <?= $item->getTitle(ESC_RAW)?>
    </a>
  </li>
  <?php endforeach?>
</ul>
