<h3><?= __("Dane techniczne") ?></h3>

<table>
  <?php if(isset($attributes) && count($attributes)):?>
  <?php foreach ($attributes as $attr):?>
  <tr>
    <td><?= $attr->attribute_def->getName()?></td>
    <td>
      <?php if($attr->getAttributeDefValueId()):?>
      <?= $attr->attribute_def_value->getValue()?>
      <?php else:?>
      <?= $attr->getValue()?>
      <?php endif;?>
    </td>
  </tr>
  <?php endforeach;?>
  <tr>
    <td><?= __("Cena")?></td>
    <td>
      <?php if( $product->getPrice() > 0 ):?><b><?= number_format($product->getPrice(), 0, ',', '.') ?> <?= __("PLN") ?><? else: ?><?= __("cena na zapytanie")?></b><?php endif;?>
    </td>
  </tr>
  <?else:?>
  <tr>
    <td><?= __("Przykro nam, brak danych")?></td>
    <td></td>
  </tr>
  <?php endif;?>
</table>


