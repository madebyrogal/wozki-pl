<div class="sort">
  <span><?= $attribute->getName() ?>:</span>
  <ul>
    <?php foreach ($attributeDefValues as $val): ?>
    <li <?php if(isset($driveId) && $driveId == $val->getId()):?>class="active"<?php endif;?>><a title="" href="<?= url_for('offer_category', $category) . '/' . $val->getValue() . '/' . $val->getId() ?>"><?= $val->getValue() ?></a></li>
    <?php endforeach ?>
  </ul>
  <table>
    <tr>
      <td width="15%">&nbsp;</td>
      <td width="20%"><?= __("MARKA") ?></td>
      <td width="10%"><?= __("TYP") ?></td>
      <td width="10%"><?= __("UDŹWIG") ?></td>
      <td width="10%"><?= __("NAPĘD") ?></td>
      <td width="10%"><?= __("WYS. PODNOSZEN") ?></td>
      <!--<td width="10%"><?= __("PRZEBIEG") ?></td>-->
      <td width="10%"><?= __("ROK PRODUKCJI") ?></td>
      <td width="10%"><?= __("CENA") ?></td>
    </tr>
  </table>
  <div class="clear"></div>
</div>