<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <?php if ($sf_user->isAuthenticated() && ( $sf_user->hasCredential('admin') || $sf_user->hasCredential('user') )): ?>
      <div class="page">
        <div id="menuLeft">
          <?php include_component('main', 'modules') ?>
          <ul <?php if ($sf_request->getParameter('module') == 'module_cms' || $sf_request->getParameter('module') == 'module_group'): ?>class="active"<?php endif; ?>>
            <?php if ($sf_user->getGuardUser()->getIsSuperAdmin()) : ?>
              <b class="groupName Administracja">Administracja</b>
              <li><a class="menuIcon module_cms <?php if ($sf_request->getParameter('module') == 'module_cms'): ?>active<?php endif; ?>" href="<?= url_for('@module_cms') ?>">Moduły</a></li>
              <li><a class="menuIcon module_group <?php if ($sf_request->getParameter('module') == 'module_group'): ?>active<?php endif; ?>" href="<?= url_for('@module_group') ?>">Grupy modułów</a></li>
            <?php endif; ?>
          </ul>
        </div>
        <div id="contentWrapper">
          <?php include_component('main', 'header') ?>
          <div id="content">
            <div id="filterIcon"></div>
            <?php echo $sf_content ?>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="foot">
        <div class="left">CMS - MadeByRogal on Symfony 1.4</div>
        <div class="right">
          Problems? Call us in Poland:
          <ul class="contacts">
            <li class="phone">+48608651322</li>
            <li class="mail">rogalski.tomaszek@gmail.com</li>
          </ul></div>
        <div class="clear"></div>
      </div>
    <?php else: ?>
      <div id="loginForm">
        <?php echo $sf_content ?>
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#loginForm table th:eq(0)').css({'padding-top': '20px'});
          $('#loginForm table td:eq(0)').css({'padding-top': '20px'});
        });
      </script>
    <?php endif; ?>    
  </body>
</html>
