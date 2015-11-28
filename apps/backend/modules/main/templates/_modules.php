<? if (isset($modules)): ?>
  <?php foreach ($modules as $groupName => $items): ?>
    <ul
    <?php if ($items[0]->count()): ?>
      <?php foreach ($items[0] as $module): ?>
          <?php if ($sf_request->getParameter('module') == $module->getRouteName() || $sf_user->getAttribute('textModule') == $module->getRouteName() || $sf_user->getAttribute('mediaModule') == $module->getRouteName() || $sf_user->getAttribute('attributeDefModule') == $module->getRouteName()): ?>class="active"<?php endif; ?>
        <?php endforeach; ?>
      <?php endif ?>
      >

      <b class="groupName <?= $groupName ?>"><?= $groupName ?></b>
      <?php if ($items[0]->count()): ?>
        <?php foreach ($items[0] as $module): ?>
      <li><a class="menuIcon <?= $module->getRouteName() ?> <?php if ( $sf_request->getParameter('module') == $module->getRouteName() || $sf_user->getAttribute('textModule') == $module->getRouteName() || $sf_user->getAttribute('mediaModule') == $module->getRouteName() || $sf_user->getAttribute('attributeDefModule') == $module->getRouteName()): ?>active<?php endif; ?>" href="<?= url_for('@' . $module->getRouteName()) ?>"><?= $module->getName(); ?></a></li>
        <?php endforeach; ?>
      <?php endif ?>
    </ul>
  <?php endforeach; ?>
<? endif; ?>