<?php
    wp_nav_menu( array(
        'menu'              => 'main-menu',
        'menu_class'        => 'navbar-nav me-auto mb-2 mb-lg-0',
        'container'         => '',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'navbarsExample05',
        'menu_id'           => false,
        'fallback_cb'       => false,
        'depth'             => 2,
        'theme_location'    => 'main-menu',
        'item_spacing'      => 'preserve',
        'add_li_class'      => 'nav-item',
    ) );