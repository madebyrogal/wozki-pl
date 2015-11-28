<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($page, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
    <?php if ($sf_user->hasCredential('admin')): ?>
      <?php echo $helper->linkToDelete($page, array('credentials' => 'admin', 'params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
      <li class="sf_admin_action_promote">
        <?php echo link_to(__('Góra', array(), 'messages'), 'page/promote?id=' . $page->getId(), array()) ?>
      </li>
      <li class="sf_admin_action_demote">
        <?php echo link_to(__('Dół', array(), 'messages'), 'page/demote?id=' . $page->getId(), array()) ?>
      </li>
    <?php endif; ?>
    <li class="sf_admin_action_show">
      <?= link_to('Teksty', '@text_list?moduleName=' . sfContext::getInstance()->getModuleName() . '&parent_id=' . $page->getId()); ?>
    </li>
  </ul>
</td>
