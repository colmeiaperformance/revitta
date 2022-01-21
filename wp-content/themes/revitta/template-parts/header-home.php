<nav class="navbar navbar-expand-lg navbar-dark fixed-top" aria-label="Main navigation">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="<?php echo get_template_directory_uri() . '/images/logo-topo.svg' ?>" alt="Logo">
    </a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <svg width="28" height="20" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="28" height="4" rx="2" fill="white"/>
          <rect y="8" width="28" height="4" rx="2" fill="white"/>
          <rect y="16" width="28" height="4" rx="2" fill="white"/>
      </svg>
    </button>
    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
           <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
    </div>
  </div>
</nav>