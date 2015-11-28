<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($product_categories, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
    <?php if ($sf_user->hasCredential('admin')): ?>
      <?php echo $helper->linkToDelete($product_categories, array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
    <?php endif; ?>
    <li class="sf_admin_action_show">
      <?= link_to('Atrybuty(def)', '@attribute_def_list?moduleName=' . sfContext::getInstance()->getModuleName() . '&parent_id=' . $product_categories->getId()); ?>
    </li>
  </ul>
</td>
