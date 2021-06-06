<?php

function hazedrops_theme_support() {
  // Adds title in the html dynamically
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'hazedrops_theme_support');

function hazedrops_menus() {
  
  $locations = array(
    'primary' => "Desktop Primary Left Sidebar",
    'footer' => "Footer Menu Items"
  );

  register_nav_menus($locations);
}

add_action('init', 'hazedrops_menus');

function hazedrops_register_styles() {

  $version = wp_get_theme() -> get( 'Version' );
  wp_enqueue_style('hazedrops-style', get_template_directory_uri()."/style.css", array('hazedrops-bootstrap'), $version, 'all');
  wp_enqueue_style('hazedrops-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
  wp_enqueue_style('hazedrops-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

}

// When the WP runs this hook(wp_enqueue_scripts), also run my function - hazedrops_register_styles()
add_action('wp_enqueue_scripts', 'hazedrops_register_styles');

function hazedrops_register_scripts() {

  // The last param 'true' will put the script in the end of the body
  wp_enqueue_script('hazedrops-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
  wp_enqueue_script('hazedrops-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
  wp_enqueue_script('hazedrops-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
  wp_enqueue_script('hazedrops-main', get_template_directory_uri()."/assets/js/main.js", array(), '1.0', true);  

}

// When the WP runs this hook(wp_enqueue_scripts), also run my function - hazedrops_register_styles()
add_action('wp_enqueue_scripts', 'hazedrops_register_scripts');

function hazedrops_widget_areas() {
  register_sidebar(
    array(
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
      'after_widget' => '</ul>',
      'name' => 'Sidebar Area',
      'id' => 'sidebar-1',
      'description' => 'Sidebar Widget Area'
    )
  );

  register_sidebar(
    array(
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
      'after_widget' => '</ul>',
      'name' => 'Footer Area',
      'id' => 'footer-1',
      'description' => 'Footer Widget Area'
    )
  );
}

add_action('widgets_init', 'hazedrops_widget_areas');

?>