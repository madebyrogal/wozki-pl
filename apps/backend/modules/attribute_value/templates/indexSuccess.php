<?php use_helper('I18N', 'Date') ?>
<?php include_partial('attribute_value/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Wartości atrybutów produktu', array(), 'messages') ?><?php if( isset($product) && $product):?>: <?= $product->getName()?><?php endif?></h1>

  <?php include_partial('attribute_value/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('attribute_value/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('attribute_value/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('attribute_value_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('attribute_value/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('attribute_value/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('attribute_value/list_actions', array('helper' => $helper)) ?>
      <?php if( isset($product) && $product): ?>
        <li class="sf_admin_action_list">
        <?php echo link_to('Powrót do listy nadrzędnej', '@product' ) ?>
        </li>
      <?php endif?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('attribute_value/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
