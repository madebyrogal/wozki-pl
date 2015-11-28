<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php if(sfContext::getInstance()->getUser()->getAttribute('attachmentModule') && sfContext::getInstance()->getUser()->getAttribute('attachmentParent')): ?>
    <li class="sf_admin_action_list">
    <?php echo link_to('Powrót do listy', '@attachment_list?moduleName='.sfContext::getInstance()->getUser()->getAttribute('attachmentModule').'&parent_id='.sfContext::getInstance()->getUser()->getAttribute('attachmentParent')) ?>
    </li>
  <?php else:?>
    <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <?php endif;?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Save and add',)) ?>
<?php else: ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php if(sfContext::getInstance()->getUser()->getAttribute('attachmentModule') && sfContext::getInstance()->getUser()->getAttribute('attachmentParent')): ?>
    <li class="sf_admin_action_list">
    <?php echo link_to('Powrót do listy', '@attachment_list?moduleName='.sfContext::getInstance()->getUser()->getAttribute('attachmentModule').'&parent_id='.sfContext::getInstance()->getUser()->getAttribute('attachmentParent')) ?>
    </li>
  <?php else:?>
    <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <?php endif;?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Save and add',)) ?>
<?php endif; ?>
</ul>
