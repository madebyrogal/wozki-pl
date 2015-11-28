<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
  <head>
    <meta name="google-site-verification" content="O0JlWfTlVSSThkdxAZ9oro1D2rG6WvcsNzu-eWqtYR4" />
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <!--<link rel="shortcut icon" href="/favicon.ico" />-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body class="sHome">
    <?php include_partial('main/cookieAlert')?>
    <div id="sTop">      
      <div class="sWrapper">
        <a id="logo" title="wózki widłowe" href="<?= url_for('@homepage')?>"></a>
        <?php include_component('lang', 'showLangs')?>
        <?php include_partial('main/menuHeader') ?>
      </div>
      <div class="clear"></div>
    </div>
    <?php echo $sf_content ?>
    <div id="foot">
      <?php include_partial('main/footer') ?>
    </div>
  </body>
</html>
