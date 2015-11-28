<ul class="articlePage">
  <?php if($objectPrev):?><li><a class="back" title="" href="<?= url_for('article_show', $objectPrev)?>">Poprzednia</a></li><?php endif;?>
  <?php if($objectNext):?><li><a class="more" title="" href="<?= url_for('article_show', $objectNext)?>">Następna</a></li><?php endif;?>
</ul>
