<ul class="menu">
  <?php foreach($menu as $item):?>
  <li>
    <a id="m<?= $item['page']->getId()?>" title="<?= $item['title']?>" 
       href="
        <?php if($item['page']->getRouteName() == 'staticPage'):?>
          <?= url_for('staticPage', $item['page'])?>
        <?php else:?>
          <?= url_for('@' . $item['page']->getRouteName())?>
        <?php endif;?>
       ">
       <?= $item['title']?>
    </a>
  </li>
  <?php endforeach?>
</ul>
