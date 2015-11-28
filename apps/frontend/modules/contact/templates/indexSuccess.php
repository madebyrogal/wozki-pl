<?php use_javascript('https://maps.googleapis.com/maps/api/js?key=AIzaSyCmB5RS-ifiF8COx9SEQ_3Uc2n5gUKiAVo&sensor=true') ?>
<?php use_javascript('map.js') ?>
<div id="sHeader">
    <div class="sHeaderTop">
        <h1>Kontakt</h1>
        <?php include_component('search', 'showForm') ?>
        <div class="clear"></div>
    </div>
</div>
<div id="content">
    <div id="maps" style="width: 890px; height: 448px">
      <!--<img src="/images/mapa.jpg" />-->
    </div>
    <ul class="mContact">
        <li class="logo"></li>
        <li><?= $pageContext[0]->getContext(ESC_RAW) ?></li>
        <li><?= $pageContext[1]->getContext(ESC_RAW) ?></li>
        <li><?= $pageContext[2]->getContext(ESC_RAW) ?></li>
    </ul>
    <div class="clear"></div>
</div>