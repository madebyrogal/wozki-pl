<?php use_helper('I18N', 'Date') ?>
<?php include_partial('text/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Teksty', array(), 'messages') ?><?php if( isset( $parentName ) ):?>: <?= $parentName?><?php endif?></h1>

  <?php include_partial('text/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('text/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('text/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('text/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('text/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('text/list_actions', array('helper' => $helper)) ?>
      <?php if(sfContext::getInstance()->getUser()->getAttribute('textModule') && sfContext::getInstance()->getUser()->getAttribute('textParent')): ?>
        <li class="sf_admin_action_list">
        <?php echo link_to('Powrót do listy nadrzędnej', '@'.sfContext::getInstance()->getUser()->getAttribute('textModule') ) ?>
        </li>
      <?php endif?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('text/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
