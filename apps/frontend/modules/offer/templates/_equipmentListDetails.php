<table class="parametrs">
  <tr>
    <td width="20%">
      <?= $productAttributes[0]->getValue() ?>
    </td>
    <td width="10%">
      <?= $productAttributes[1]->getValue() ?>
    </td>
    <td width="10%">
      <?php if ($product->getPrice() > 0): ?><b><?= number_format($product->getPrice(), 0, ',', '.') ?> <?= __("PLN") ?></b><?php endif; ?>
    </td>
  </tr>
</table>
