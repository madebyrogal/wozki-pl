<?php use_helper('I18N', 'Date') ?>
<?php include_partial('attribute_def/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Lista Atrybutów', array(), 'messages') ?><?php if( isset( $parentName ) ):?>: <?= $parentName?><?php endif?></h1>

  <?php include_partial('attribute_def/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('attribute_def/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('attribute_def/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('attribute_def_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('attribute_def/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('attribute_def/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('attribute_def/list_actions', array('helper' => $helper)) ?>
      <?php if(sfContext::getInstance()->getUser()->getAttribute('attributeDefModule') && sfContext::getInstance()->getUser()->getAttribute('attributeDefParent')): ?>
        <li class="sf_admin_action_list">
        <?php echo link_to('Powrót do listy nadrzędnej', '@'.sfContext::getInstance()->getUser()->getAttribute('attributeDefModule') ) ?>
        </li>
      <?php endif?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('attribute_def/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
