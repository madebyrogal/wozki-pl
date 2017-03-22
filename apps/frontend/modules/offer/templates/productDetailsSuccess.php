<div id="sHeader">
    <div class="sHeaderTop">
        <h1><?= $offer->getTitle() ?></h1>
        <?php if (isset($category)): ?>
            <?= include_component('offer', 'categories', array('activeCategoryId' => $category->getId())) ?>
        <?php else: ?>
            <?= include_component('offer', 'categories', array('activeCategoryId' => 'offer_promotion')) ?>
        <?php endif; ?>
        <?php include_component('search', 'showForm') ?>
        <div class="clear"></div>
    </div>
</div>
<div id="content">  
    <div class="sTollbar">
        <a class="back" title="<?= __("Powrót do listy") ?>" href="javascript:history.back()"><?= __("Powrót do listy") ?></a>
    </div>
    <div class="left">
        <h2><?= $product->getName() ?></h2>
        <?= include_component('offer', 'showAttributes', array('product' => $product)) ?>
        <?php if($category->getId() != 7): //new buy?>
            <h3><?= __("Informacje dodatkowe") ?></h3>
            <?= $product->getInfo(ESC_RAW) ?>
        <?php endif; ?>
    </div>
    <?php if($category->getId() == 7): //new buy?>
        <div class='left'>
        <h3><?= __("Informacje dodatkowe") ?></h3>
        <?= $product->getInfo(ESC_RAW) ?>
        </div>
    <?php else:?>
        <?= include_component('offer', 'showGallery', array('product' => $product)) ?>
    <?php endif; ?>
    <div class="clear"></div>
    <div class="sTollbar">
        <a class="back" title="<?= __("Powrót do listy") ?>" href="javascript:history.back()"><?= __("Powrót do listy") ?></a>               
    </div>
</div>