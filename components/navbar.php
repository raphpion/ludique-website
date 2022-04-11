<?php
$links = get_navbar_links();
?>

<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?php the_home_url() ?>">Ludique Gaming</a>
    <?php if ( !empty( $links ) ): ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <?php foreach ( $links as $link ): ?>
            <li class="nav-item">
              <a class="nav-link<?php the_active_class( $link->get_slug() ) ?>" href="<?php $link->the_permalink() ?>"><?php echo $link->the_title() ?></a>
            </li>
          <?php endforeach ?>
      </div>
    <?php endif ?>
  </div>
</nav>