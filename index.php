<?php
/**
 * This is the root of the website, all requests will redirect to this file.
 */

/** Include the functions */
require_once __DIR__ . '/functions.php';

/** Get the website header */
require_once __DIR__ . '/header.php';

/** Get the website main content */
require_once __DIR__ . '/main.php';

/** Get the website footer */
require_once __DIR__ . '/footer.php';