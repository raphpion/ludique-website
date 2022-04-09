<?php
/**
 * This file contains various functions used by the website.
 */

/** Copy the config sample if config.php doesn't exist, then load the config file */
if (!file_exists('config.php'))
  copy('config-sample.php', 'config.php');
require_once __DIR__ . '/config.php';
