<?php use_helper('I18N', 'Date') ?>
<?php include_partial('media/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Lista mediów', array(), 'messages') ?><?php if( isset( $parentName ) ):?>: <?= $parentName?><?php endif?></h1>

  <?php include_partial('media/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('media/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('media/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('media_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('media/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('media/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('media/list_actions', array('helper' => $helper)) ?>
      <?php if(sfContext::getInstance()->getUser()->getAttribute('mediaModule') ): ?>
        <li class="sf_admin_action_list">
        <?php echo link_to('Powrót do listy nadrzędnej', '@'.sfContext::getInstance()->getUser()->getAttribute('mediaModule') ) ?>
        </li>
      <?php endif?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('media/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
