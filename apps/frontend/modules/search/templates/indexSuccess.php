<div id="sHeader">
  <div class="sHeaderTop">
    <h1><?= __('Wyniki wyszukiwania') ?></h1>
    <?php include_component('search', 'showForm') ?>
    <div class="clear"></div>
  </div>
</div>
<div id="content">
  <h2><?= __('Wyniki dla: ') ?><?= $formSearch->getValue('search') ?></h2>
  <?php if (isset($result)): ?>
    <?php if (isset($result['products']) && $result['products']->count() ): ?>
      <ul class="products">
        <?php foreach ($result['products'] as $product): ?>
          <li>
            <a title="" href="<?= url_for('offer_product', $product) ?>">
              <div class="imgWrapper">
                <?= include_component('offer', 'productListImage', array('product' => $product)) ?>
              </div>
              <div class="productDetails">
                <?= include_component('offer', 'productListDetails', array('product' => $product)) ?>
                <div class="description"><?= strip_tags($product->getInfo(ESC_RAW)) ?></div>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if (isset($result['articles']) && $result['articles']->count()): ?>
      <ul class="news">
        <?php foreach ($result['articles'] as $new): ?>
          <li>
            <p class="date"><?= date('d-m-Y', strtotime($new->getDateFrom())) ?></p>
            <p class="title"><?= $new->getTitle() ?></p>
            <p><?= $new->getSneakPeak() ?> <a class="more" title="" href="<?= url_for('article_show', $new) ?>"><?= __("więcej") ?></a></p>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if (isset($result['news']) && $result['news']->count()): ?>
      <ul class="news">
        <?php foreach ($result['news'] as $new): ?>
          <li>
            <p class="date"><?= date('d-m-Y', strtotime($new->getDateFrom())) ?></p>
            <p class="title"><?= $new->getTitle() ?></p>
            <p><?= $new->getSneakPeak() ?> <a class="more" title="" href="<?= url_for('news_show', $new) ?>"><?= __("więcej") ?></a></p>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  <?php else: ?>
    <?= $notice ?>
  <?php endif; ?>
  <div class="clear"></div>
</div>