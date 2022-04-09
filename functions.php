<?php
/**
 * This file contains various functions used by the website.
 */

/** Copy the config sample if config.php doesn't exist, then load the config file */
if (!file_exists('config.php'))
  copy('config-sample.php', 'config.php');
require_once __DIR__ . '/config.php';

/**
 * Head Style Includes
 */
function get_stylesheet() {
  $stylesheet = '';

  /** Bootstrap 5.1.3 */
  $stylesheet .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
  
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