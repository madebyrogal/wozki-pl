<ul class="langBox">
<?php foreach($langs as $lang):?>
  <li><img src="<?= $lang->getFlag()?>" <?php if($lang->getSlug() == $sf_user->getCulture()):?>class="active"<?php endif;?>/></li>
<?php endforeach?>  
</ul>
<div class="clear"></div>