<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($product, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($product, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <li class="sf_admin_action_media">
      <?= link_to('Media', '@media_list?moduleName=' . sfContext::getInstance()->getModuleName() . '&parent_id=' . $product->getId() );?>
    </li>
    <li class="sf_admin_action_show">
      <?= link_to('Atrybuty(war)', '@attribute_value_list?product_id=' . $product->getId() );?>
    </li>
  </ul>
</td>
