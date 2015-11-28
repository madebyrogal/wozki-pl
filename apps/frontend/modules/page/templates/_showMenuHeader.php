<ul id="menu">
  <?php foreach ($menu as $item): ?>
    <li class="<?php if ($item['page']->getId() == $activePageId): ?>active <?php endif ?><?php if (isset($item['subpage'])): ?>moreSite<?php endif ?>">
      <a id="m<?= $item['page']->getId() ?>" title="<?= $item['page']->getTitle() ?>" 
         href="
         <?php if ($item['page']->getRouteName() == 'staticPage'): ?>
           <?= url_for('staticPage', $item['page']) ?>
         <?php else: ?>
           <?= url_for('@' . $item['page']->getRouteName()) ?>
         <?php endif; ?>
         ">
           <?= $item['page']->getTitle(ESC_RAW) ?>
      </a>
      <?php if (isset($item['subpage'])): ?>
        <ul>
          <?php foreach ($item['subpage'] as $page): ?>
            <li>
              <a id="m<?= $page->getId() ?>" title="<?= $page->getTitle() ?>" 
                 href="
                 <?php if ($page->getRouteName() == 'staticPage'): ?>
                   <?= url_for('staticPage', $page) ?>
                 <?php else: ?>
                   <?= url_for('@' . $page->getRouteName()) ?>
                 <?php endif; ?>
                 ">
                   <?= $page->getTitle(ESC_RAW) ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif ?>
    </li>
  <?php endforeach ?>
</ul>
