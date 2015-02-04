<?php
/**
 * @file
 * Theme hooks for hb5.
 */

/**
 * Implements template_preprocess_html().
 */
function hb5_preprocess_html(&$variables) {

}

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
}

