<table class="parametrs">
    <tr>
        <td width="20%">
            <?= $productAttributes[1]->getValue() ?>
        </td>
        <td width="15%">
            <?= $productAttributes[0]->getValue() ?>
        </td>
        <td width="15%">
            <?= $productAttributes[5]->getValue() ?>
        </td>
        <td width="10%">
            <?php if ($productAttributes[3]->attribute_def_value->getValue()): ?>
                <?= $productAttributes[3]->attribute_def_value->getValue() ?>
            <?php else: ?>
                <?= $productAttributes[3]->getValue() ?>
            <?php endif ?>
        </td>
        <td width="10%">
            <?= $productAttributes[8]->getValue() ?>
        </td>
        <td width="10%">
            <?= $productAttributes[7]->getValue() ?>
        </td>
        <td width="15%">
            <?php if ($product->getPrice() > 0): ?><b><?= number_format($product->getPrice(), 0, ',', '.') ?> <?= __("PLN") ?></b><?php else: ?><?= __("cena na zapytanie") ?><?php endif; ?>
        </td>
    </tr>
</table>
