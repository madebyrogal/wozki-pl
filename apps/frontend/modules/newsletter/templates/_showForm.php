<form name="newsletter" action="<?= url_for('@newsletter') ?>" method="POST">
  <?= $form->renderHiddenFields()?>
  <h3><?= __("Newsletter") ?></h3>
  <?= $form['email']->render()?>
  <button id="newsletterButton" type="sumbit"></button>
  <?= $form['action']->render()?>
</form>