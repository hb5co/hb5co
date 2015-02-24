<?php
/**
 * @file
 * Theme hooks for hb5.
 */


/**
 * Implements template_preprocess_page().
 */
function hb5_preprocess_page(&$variables) {
  // Add apple-touch-icon links.
  // <link rel="apple-touch-icon" sizes="57x57" href="/path-to-theme/favicons/apple-touch-icon-57x57.png">
  $apple_icon_sizes = array(57,60,72,76,114,120,144,152,180);
  foreach($apple_icon_sizes as $size){
    $apple_icon = array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'apple-touch-icon',
        'sizes' => $size . 'x' . $size,
        'href' => '/favicons/apple-touch-icon-' . $size . 'x' . $size . '.png',
      ),
    );
    backdrop_add_html_head($apple_icon, 'apple-touch-icon_' . $size);
  }

  // Add Favicon links.
  $favicon_sizes = array(16,32,96,194);
  foreach($favicon_sizes as $size){
    $favicon = array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'icon',
        'type' => 'image/png',
        'sizes' => $size . 'x' . $size,
        'href' => '/favicons/favicon-' . $size . 'x' . $size . '.png',
      ),
    );
    drupal_add_html_head($favicon, 'favicon_' . $size);
  }

  // Add android manifest file
  $android_manifest = array(
    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'manifest',
      'href' => '/favicons/android-chrome-manifest.json',
    ),
  );
  drupal_add_html_head($android_manifest, 'android_manifest');

  // Add config to point to all microsoft icons
  $ms_app_config = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'msapplication-config',
      'content' => '/favicons/browserconfig.xml',
    ),
  );
  drupal_add_html_head($ms_app_config, 'ms_app_config');

  // Set tile of color in metro layout on windows
  $ms_tile_color = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'msapplication-TileColor',
      'content' => '#3bd0aa',
    ),
  );
  drupal_add_html_head($ms_tile_color, 'ms_tile_color');

  // Specify the ms tile image
  $ms_tile_image = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'msapplication-TileImage',
      'content' => '/favicons/mstile-144x144.png',
    ),
  );
  drupal_add_html_head($ms_tile_image, 'ms_tile_image');

  // Changes color of header bar on > Android 5.0
  $header_bar_theme_color = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'theme-color',
      'content' => '#3bd0aa',
    ),
  );
  drupal_add_html_head($header_bar_theme_color, 'header_bar_theme_color');

  // Add Google Analytics code
  $google_analytics = "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59396163-1', 'auto');
  ga('send', 'pageview');";

  drupal_add_js ($google_analytics,array('type' => 'inline','scope' => 'header','weight' =>5));
}

/**
 * Implements hook_preprocess_node(&$variables).
 */
function hb5_preprocess_node(&$variables) {
  $variables['submitted'] = t('Posted by !username - !datetime', array(
    '!username' => $variables['name'],
    '!datetime' => date('F j, Y', $variables['node']->created),
  ));
}

