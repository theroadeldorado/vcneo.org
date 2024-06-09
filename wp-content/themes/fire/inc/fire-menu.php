<?php

  // EXAMPLE MENU
  // wp_nav_menu([
  //   'container' => false,
  //   'depth' => 2,
  //   'theme_location' => 'primary',
  //   'menu_class' => 'menu_class',
  //   'item_0' => 'item_class',
  //   'link_0' => 'list_item_class',
  //   'submenu_0' => 'hidden',
  //   'alpine_link_0' => '$store.navOpen ?? `opacity-0 -translate-y-1/2`',
  // ]);

  /**
   * Register additional menus
   */
  function fire_register_nav_menu(){
    register_nav_menus( array(
      'primary' => __( 'Primary', 'fire' ),
      'footer'  => __( 'Footer', 'fire' )
    ) );
  }
  add_action( 'after_setup_theme', 'fire_register_nav_menu', 0 );

  add_filter('nav_menu_css_class', function($classes, $menu_item, $args, $depth) {
    if (property_exists($args, 'item_'. $depth)) {
      $classes[] = $args->{'item_' . $depth};
    }
    return $classes;
  }, 10, 4);

  add_filter('nav_menu_link_attributes', function($atts, $item, $args, $depth) {
    if (property_exists($args, 'link_' . $depth)) {
      $atts['class'] = $args->{'link_' . $depth};
    }
    if (property_exists($args, 'alpine_link_' . $depth)) {
      $atts[':class'] = $args->{'alpine_link_' . $depth};
    }
    return $atts;
  }, 10, 4);


  add_filter('nav_menu_submenu_css_class', function($classes, $args, $depth) {
    if (property_exists($args, 'submenu_' . $depth)) {
      $classes[] = $args->{'submenu_' . $depth};
    }
    return $classes;
  }, 10, 3);

?>