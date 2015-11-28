<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($attribute_def, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($attribute_def, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <?php if($attribute_def->attribute_type->getName() !== 'value' ):?>
    <li class="sf_admin_action_show">
      <?= link_to('Wartości(def)', '@attribute_def_value_list?&parent_id=' . $attribute_def->getId());?>
    </li>
    <?php endif?>
  </ul>
</td>
