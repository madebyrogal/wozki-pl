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
    <?php if (isset($pageContext)): ?>
        <div class="offer_text">
            <?= $pageContext[0]->getContext(ESC_RAW); ?>
        </div>
        <div class="clear"></div>
    <?php endif; ?>
    <?php if ($pager->haveToPaginate()): ?>
        <div class="sTollbar">
            <div class="pagination">
                <a class="backPage" title="" href="<?= url_for('offer_category', $category) . '?page=' . $pager->getPreviousPage() ?>"></a>
                <?php foreach ($pager->getLinks() as $link): ?>
                    <a class="<?php if ($link == $pager->getPage()): ?>active<?php endif; ?>" title="" href="<?= url_for('offer_category', $category) . '?page=' . $link ?>"><?= $link ?></a>
                <?php endforeach; ?>
                <a class="nextPage" title="" href="<?= url_for('offer_category', $category) . '?page=' . $pager->getNextPage() ?>"></a>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($pager->getNbResults()): ?>
        <?php if ($categoryHasAttribute): ?>
            <?= include_partial('offer/productListHeaderWithoutPicture', array('category' => $category, 'attribute' => $attribute, 'attributeDefValues' => $attributeDefValues, 'driveId' => $driveId)); ?>
        <?php endif; ?>
        <ul class="products">
            <?php foreach ($pager->getResults() as $product): ?>
                <li>
                    <a title="" href="<?= url_for('offer_product', $product) ?>">
                        <div class="productDetails">
                            <?= include_component('offer', 'productListDetailsWithoutPicture', array('product' => $product)) ?>
                            <div class="description"><?= strip_tags($product->getInfo(ESC_RAW)) ?></div>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <!--<p><?= __("Brak produktów w danej kategorii") ?></p>-->
    <?php endif; ?>
    <div class="clear"></div>
    <?php if ($pager->haveToPaginate()): ?>
        <div class="sTollbar">
            <div class="pagination">
                <a class="backPage" title="" href="<?= url_for('offer_category', $category) . '?page=' . $pager->getPreviousPage() ?>"></a>
                <?php foreach ($pager->getLinks() as $link): ?>
                    <a class="<?php if ($link == $pager->getPage()): ?>active<?php endif; ?>" title="" href="<?= url_for('offer_category', $category) . '?page=' . $link ?>"><?= $link ?></a>
                <?php endforeach; ?>
                <a class="nextPage" title="" href="<?= url_for('offer_category', $category) . '?page=' . $pager->getNextPage() ?>"></a>
            </div>
        </div>
    <?php endif; ?>
</div>