<?php

# get correct id for plugin
define('ELF_ID', basename(__FILE__, '.php'));

# register plugin
register_plugin(
  ELF_ID, //Plugin id
  'elfinder',   //Plugin name
  '1.0',     //Plugin version
  'Lawrence Okoth-Odida',  //Plugin author
  'http://github.com/lokothodida/', //author website
  'Provides elFinder File Manager', //Plugin description
  'files', //page type - on which admin tab to display
  'elfinder_admin'  //main function (administration)
);

# add a link in the admin tab 'theme'
add_action('files-sidebar', 'createSideMenu', array(ELF_ID, 'elFinder'));

# functions
function elfinder_admin() {
  $url = $GLOBALS['SITEURL'] . '/plugins/' . ELF_ID . '/';

  // elFinder configuration
  $elfinder = array(
    'url' => $url . 'php/allow/connector.minimal.php',
  );
  ?>
  <h3>elFinder File Manager</h3>

  <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/elfinder.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/theme.css">

  <script src="<?php echo $url; ?>js/elfinder.full.js"></script>

  <script type="text/javascript" charset="utf-8">
    // Documentation for client options:
    // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
    $(document).ready(function() {
      var config = <?php echo json_encode($elfinder); ?>;
      $('#elfinder').elfinder(config);
    });
  </script>

  <div id="elfinder"></div>
  <?php
}
