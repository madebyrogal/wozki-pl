<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($gallery_1, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($gallery_1, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
      <li class="sf_admin_action_media">
      <?= link_to('Media', '@media_list?moduleName=' . sfContext::getInstance()->getModuleName() . '&parent_id=' . $gallery_1->getId() );?>
    </li>
  </ul>
</td>
