<?php if( $attribute_value->attribute_def_value->getValue() ):?>
  <?= $attribute_value->attribute_def_value->getValue() ?>
<?php else:?>
  <?= $attribute_value->getValue() ?>
<?php endif?>
