<?php

  /**
  * SCRIPTS & STYLES
  */
   add_action("wp_enqueue_scripts", "vagap_load_assets");
   function vagap_load_assets(){
      wp_enqueue_style('main-style', get_template_directory_uri() . '/main.css' );
      wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/bootstrap-3.3.7/css/bootstrap.min.css', false, true );
      wp_dequeue_script('jquery');
      wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/jquery-3.2.0.min.js');
      wp_enqueue_script('boot-js', get_template_directory_uri() . '/assets/bootstrap-3.3.7/js/bootstrap.min.js', false, true);
   }


   /**
   * THEME SUPPORT
   */
   add_theme_support( 'post-thumbnails' );
   add_theme_support('html5', array(
     'search-form'
   ));




   /**
   * CUSTOMIZER
   */
   add_action('after_setup_theme', 'vagap_setup');
   function vagap_setup() {
     add_image_size('vagap-logo', 160, 90);
     add_theme_support('custom-logo', array(
         'size' => 'vagap-logo'
     ));
   }


   /**
   * NAVIGATION MENU
   */
   add_action( 'init', 'vagap_menu');
   function vagap_menu() {
     register_nav_menu('header-nav',__( 'Header Navigation' ));
   }


   /**
   * SIDEBARS
   */
   add_action("widgets_init", "vagap_sidebars");
   function vagap_sidebars(){
     register_sidebar(array(
       'name' => 'Homepage Sidebar',
       'id' => 'sidebar-homepage',
       'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget' => "</li>n",
       'before_title' => '<h2 class="widgettitle">',
       'after_title' => "</h2>n"
     ));
  }
