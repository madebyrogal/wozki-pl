<div class="box">
  <?= include_component('page', 'menuOnFooter');?>
</div>
<div class="box">
  <ul>
    <li><?= __("Skontaktuj się z nami")?></li>
    <li>+48 602 725 994</li>
    <li>+48 666 843 578</li>
    <li><a title="mailto:biuro@wozki-pl.com" href="">biuro@wozki-pl.com</a></li>
  </ul>
</div>
<div class="box">
  <a href="<?include_component('page', 'getUrl', array('routeHash'=>'contact'))?>" title=""><?= __("Lokalizacja zobacz mapę")?></a><br/>
  Babin Olędry 10<br/>
  62-420 Strzałkowo<br/>
  woj. wielkopolskie - Polska 
</div>
<div id="newsletter" class="box">
  <?php include_component('newsletter', 'showForm') ?>
</div>
<div class="clear"></div>
<div class="copyright"><img alt="Wózki widłowe" src="/images/logo_small.png"/><p>&copy; Widlaki <?= date('Y')?></p></div>
<div class="clear"></div>