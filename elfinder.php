<?php

// get correct id for plugin
define('ELF_ID', basename(__FILE__, '.php'));

// register plugin
register_plugin(
  ELF_ID,
  'elFinder File Manager',
  '0.1',
  'Lawrence Okoth-Odida',
  'http://github.com/lokothodida/',
  'Provides the elFinder File Manager',
  'files',
  'elfinder_admin'
);

// add sidebar link
add_action('files-sidebar', 'createSideMenu', array(ELF_ID, 'elFinder'));

// admin function
function elfinder_admin() {
  $url = $GLOBALS['SITEURL'] . '/plugins/' . ELF_ID . '/';

  // elFinder configuration
  $elfinder = array(
    'url' => $url . 'php/allow/connector.minimal.php',
  );
  ?>
  <h3>elFinder File Manager</h3>

  <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/elfinder.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/theme.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
  <script src="<?php echo $url; ?>js/elfinder.full.js"></script>

  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      var config = <?php echo json_encode($elfinder); ?>;
      $('#elfinder').elfinder(config);
    });
  </script>

  <div id="elfinder"></div>
  <?php
}
