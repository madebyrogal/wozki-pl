<div id="sHeader">
    <?php include_partial('main/headerHP') ?>
</div>
<div id="content">
    <div class="boxNewsletter">
        <?php if (isset($form) && $form->hasErrors()): ?>
            <h2><?= $pageContext[1]->getTitle() ?></h2>
            <?= $pageContext[1]->getContext(ESC_RAW); ?>
            <?= $form['email']->renderError();?>
        <?php else: ?>
            <?php if ($action === 'sign'): ?>
                <h2><?= $pageContext[0]->getTitle() ?></h2>
                <?= $pageContext[0]->getContext(ESC_RAW); ?>
            <?php else: ?>
                
                <?php if(isset($errorSignOut)): ?>
                    <h2><?= $pageContext[1]->getTitle() ?></h2>
                    <span style="color: red"><?= $errorSignOut;?></span>
                <?php else:?>
                    <h2><?= $pageContext[2]->getTitle() ?></h2>
                    <?= $pageContext[2]->getContext(ESC_RAW); ?>
                <?php endif;?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="box">
        <?= include_component('page', 'offerOnHome'); ?>
    </div>
    <div class="clear"></div>
    <div id="specialOffer">
        <a title="" href="<?php include_component('page', 'getUrl', array('routeHash' => 'offer_promotion')) ?>"><?= __("Zobacz ofertę") ?></a>
        <p id="top"><?= __("Gorące oferty!") ?></p>
        <p><?= __("Sprawdź ofertę specjalną na nasze wózki widłowe") ?></p>
    </div>
    <div id="brands">
        <a class="linde" title="linde"></a>
        <a class="nissan" title="nissan"></a>
        <a class="toyota" title="toyota" ></a>
        <a class="still" title="still" ></a>
        <a class="jungheinrich" title="jungheinrich" ></a>
        <a class="cat" title="cat" ></a>
    </div>
</div>
