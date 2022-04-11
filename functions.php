<?php
/**
 * This file contains various functions used by the website.
 */

/** Copy the config sample if config.php doesn't exist, then load the config file */
if (!file_exists( 'config.php' ))
  copy( 'config-sample.php', 'config.php' );
require_once __DIR__ . '/config.php';

/** Include services */
require_once __DIR__ . '/services/router.php';

/**
 * Head Style Includes
 */
function get_stylesheet() {
  $stylesheet = '';

  /** Bootstrap 5.1.3 */
  $stylesheet .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
  
  /** Fontawesome Free 5.15.4 */
  $stylesheet .= '<script src="https://kit.fontawesome.com/' . FONTAWESOME_KIT . '.js" crossorigin="anonymous"></script>';

  /** style.css */
  $stylesheet .= '<link rel="stylesheet" href="style.css">';

  //* Add your stylesheet here
  echo $stylesheet;
}

/**
 * Head Script Includes
 */
function get_header_scripts() {
  $scripts = '';
  //* Add your scripts here */
  echo $scripts;
}

/**
 * Bottom of body Script Includes
 */
function get_footer_scripts() {
  $scripts = '';

  /** Bootstrap bundle with Popper */
  $scripts .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
  
  //* Add your scripts here */
  echo $scripts;
}

/**
 * Check if the homepage is being rendered
 * 
 * @return Boolean if the homepage is being rendered
 */
function is_homepage() {
  return Router::is_home_route();
}

/**
 * Echo the website home URL
 */
function the_home_url() {
  echo WEBSITE_URL;
}

/**
 * Echo the content of the 'title' tag
 */
function the_title() {
  $title = '';
  $title .= Router::get_the_title();
  if ( defined( 'WEBSITE_TITLE' ) ) $title .= ' | ' . WEBSITE_TITLE;
  echo $title;
}

/**
 * Display the current view
 */
function the_view() {
  Router::the_view();
}

/**
 * Insert a component
 */
function get_component( $name ) {
  require __DIR__ . '/components/' . $name . '.php';
}

/**
 * Get all the navbar links
 */
function get_navbar_links() {
  $arr = array();
  foreach ( Router::get_routes() as $route )
    if ( $route->in_navbar() ) array_push( $arr, $route );
  return $arr;
}

/**
 * Echo the active class if the link corresponds to the current page
 */
function the_active_class( $slug ) {
  if ( Router::get_route()->get_slug() == $slug ) echo ' active';
}