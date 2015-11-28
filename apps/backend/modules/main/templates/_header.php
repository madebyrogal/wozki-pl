<div id="top">
    <div id="menuTop">

    </div>
    <div id="user">
        <span class="user_name">Witaj, <?=
            $sf_user->getGuardUser()->getFirst_name();
            echo ' ' . $sf_user->getGuardUser()->getLast_name();
            ?></span>
        <span class="user_params">
            <a href="<?= url_for('@sf_guard_signout') ?>" title="Wyloguj">Wyloguj</a>
        </span>
    </div>
    <div id="public_box" <?php if($publicationFlag):?>class="active"<?php endif;?> >
        <a href="<?= url_for('@publicChange')?>" title="Publikuj zmiany">Publikuj zmiany</a>
    </div>
    <div class="clear"></div>
</div>

