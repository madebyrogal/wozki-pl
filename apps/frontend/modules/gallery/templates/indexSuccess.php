<div id="sHeader">
    <div class="sHeaderTop">
        <h1>Galeria</h1>
        <?php include_component('search', 'showForm') ?>
        <div class="clear"></div>
    </div>
</div>
<div id="content">
    <h2><?= $pageContext[0]->getTitle() ?></h2>
    <p>
        <?= $pageContext[0]->getContext(ESC_RAW) ?>
    </p>
    <?php if ($pager->haveToPaginate()): ?>
    <div class="sTollbar">
        <div class="pagination">
            <a class="backPage" title="" href="<?= url_for('@gallery') . '?page=' . $pager->getPreviousPage() ?>"></a>
            <?php foreach ($pager->getLinks() as $link): ?>
                <a class="<?php if ($link == $pager->getPage()): ?>active<?php endif; ?>" title="" href="<?= url_for('@gallery') . '?page=' . $link ?>"><?= $link ?></a>
            <?php endforeach; ?>
            <a class="nextPage" title="" href="<?= url_for('@gallery') . '?page=' . $pager->getNextPage() ?>"></a>
        </div>
    </div>
    <?php endif;?>
    <?php if ($pager->getNbResults()): ?>
    <div id="gallery">
        <table class="thumb">
            <?php foreach ($pager->getResults() as $key => $picture): ?>
                <?php if($key === 0 || ($key % 6) === 0):?>
                    <?php $endTr = $key+6;?>
                    <?php $stop = false?>
                    <tr>
                <?php endif?>
                <td><a <?php if($key === 0 || ($key % 6) === 0):?>class="first"<?php endif?> title="" href="#" onclick="$.prettyPhoto.open(api_gallery);
                    return false"><img alt="<?= $picture->getAlternative()?>" src="<?= $picture->getFileMin1()?>"/></a></td>
                <?php if(($endTr === $key+1)):?>
                   <?php $stop = true?> 
                   </tr>
                <?php endif?>
            <?php endforeach;?>
            <?php if(!$stop):?>
                <?php for($i=0; $i<6-(($key+1)%6); $i++):?>
                       <td></td>
                <?php endfor;?>
            </tr>
            <?php endif?>
        </table>
    </div>
    <?php endif;?>
    <div class="clear"></div>
    <?php if ($pager->haveToPaginate()): ?>
    <div class="sTollbar">
        <div class="pagination">
            <a class="backPage" title="" href="<?= url_for('@gallery') . '?page=' . $pager->getPreviousPage() ?>"></a>
            <?php foreach ($pager->getLinks() as $link): ?>
                <a class="<?php if ($link == $pager->getPage()): ?>active<?php endif; ?>" title="" href="<?= url_for('@gallery') . '?page=' . $link ?>"><?= $link ?></a>
            <?php endforeach; ?>
            <a class="nextPage" title="" href="<?= url_for('@gallery') . '?page=' . $pager->getNextPage() ?>"></a>
        </div>
    </div>
    <?php endif?>
</div>
<?php if ($pager->getNbResults()): ?>
<script type="text/javascript" charset="utf-8">
    api_gallery = [
        <?php foreach ($pager->getResults() as $picture): ?>
        '<?= $picture->getFile()?>',
        <?php endforeach;?>
    ];
</script>
<?php endif;?>