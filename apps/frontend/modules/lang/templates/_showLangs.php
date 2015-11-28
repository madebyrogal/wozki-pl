<ul class="langBar">
    <li class="moreSite">
        <img src="<?= $actLang->getFlag()?>" alt="<?= $actLang->getName()?>"/>
        <ul>
            <?php foreach ($langs as $lang): ?>
                <li><a title="<?= $lang->getSlug() ?>" href="<?= url_for('changeLang', $lang) ?>"><img src="<?= $lang->getFlag() ?>" alt="<?= $lang->getName() ?>" /></a></li>
            <?php endforeach ?>
        </ul>
    </li>
</ul>
