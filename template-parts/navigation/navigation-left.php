<?php
wp_nav_menu(array(
    'theme_location' => 'top',
    'menu_id' => 'top-menu',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'container-fluid',
    'container_id'      => 'navbar',
    'menu_class'        => 'nav navbar-nav navbar-fied-side',
    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
    'walker'            => new WP_Bootstrap_Navwalker(),
));
?>