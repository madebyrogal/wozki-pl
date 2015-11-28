<?php if ($page): ?>
  <?php if ($page->getRouteName() == 'staticPage'): ?>
    <?= url_for('staticPage', $page) ?>
  <?php else: ?>
    <?= url_for('@' . $page->getRouteName()) ?>
  <?php endif; ?>
<?php endif; ?>

