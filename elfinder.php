<?php

# get correct id for plugin
$thisfile=basename(__FILE__, ".php");
 
# register plugin
register_plugin(
  $thisfile, //Plugin id
  'elfinder',   //Plugin name
  '1.0',     //Plugin version
  'Chris Cagle',  //Plugin author
  'http://www.cagintranet.com/', //author website
  'Finds email addresses in content and components and "hides" them', //Plugin description
  'files', //page type - on which admin tab to display
  'elfinder_admin'  //main function (administration)
);

# add a link in the admin tab 'theme'
add_action('files-sidebar','createSideMenu',array($thisfile,'elfinder'));

# functions

 
function elfinder_admin() {
  $id = basename(__FILE__, ".php");
  $url = $GLOBALS['SITEURL'] . '/plugins/' . $id . '/';
?>

<h3>elFinder File Manager</h3>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/elfinder.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/theme.css">

    <!-- elFinder JS (REQUIRED) -->
    <script src="<?php echo $url; ?>js/elfinder.full.js"></script>

    <!-- elFinder initialization (REQUIRED) -->
    
    <script type="text/javascript" charset="utf-8">
      // Documentation for client options:
      // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
      $(document).ready(function() {
        $('#elfinder').elfinder({
          url : <?php echo json_encode($url); ?> + 'php/allow/connector.minimal.php',
        });
      });
    </script>
    
    
    <script type="text/javascript" src="../../elfinder-2.0-rc1/js/init.js"></script>
  </head>
  <body>

    <!-- Element where elFinder will be created (REQUIRED) -->
    <div id="elfinder"></div>
<?php
}
