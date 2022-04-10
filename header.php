<?php
/**
 * This is the website header. It contains the HTML opening as well as the metadata
 */
?>
<!DOCTYPE html>
<html lang="<?php echo WEBSITE_LOCALE ?>">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- TODO: the metadata -->
  <?php get_stylesheet() ?>
  <?php get_header_scripts() ?>
  <title><?php the_title() ?></title>
</head>
<body>
  <header>
    <!-- TODO: Include header content here -->
  </header>
  