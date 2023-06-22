<?php 

  // setup theme
  if(!function_exists('wp_theme_init')){
      function wp_theme_init(){
          wp_custom_debug_log('CUSTOM_DEBUG: wp_theme_init()');

          //add theme support
          add_theme_support('title-tag');
          add_theme_support('post-thumbnails');
          add_theme_support('custom-logo');
          add_theme_support('custom-header');
          add_theme_support('custom-background');
          add_theme_support('html5', array('search-form', 'comment-list'));
          add_theme_support('block-styles');
          add_theme_support('align-wide');
          add_theme_support('responsive-embeds');
          add_theme_support('editor-styles');
          add_theme_support('wp-block-styles');
          add_theme_support('template-parts');
        add_theme_support('shortcodes');
          //shortcode 
      }

  }
  add_action('after_setup_theme', 'wp_theme_init');

  if(!function_exists('wp_custom_debug_log')){

      function wp_custom_debug_log($message) {
          if (WP_DEBUG === true) {
              if (is_array($message) || is_object($message)) {
                  error_log(print_r($message, true));
              } else {
                  error_log($message);
              }
          }
      }
  }

    function wp_add_post_meta_data_obj_shortcode(){
      $ID = get_the_ID();
      $permalink = get_permalink($ID);
      $title = get_the_title($ID);
      $date = get_the_date('Y-m-d', $ID);
      $author = get_the_author_meta('display_name', $ID);
      $excerpt = get_the_excerpt($ID);
      $thumbnail = get_the_post_thumbnail_url($ID);

      $htmlReturn = '<object id="post-meta class="phase-6-prepartions-because-selipsky-is-simply-meta-retaliatory">' .
        '<span style="display:none;" class="ID">'. $ID . '</span>'
        . '<span style="display:none;" class="permalink">'. $permalink . '</span>'
        . '<span style="display:none;" class="title">'. $title . '</span>'
          . '<span style="display:none;" class="date">'. $date . '</span>'
          . '<span style="display:none;" class="author">'. $author . '</span>'
          . '<span style="display:none;" class="excerpt">'. $excerpt . '</span>'
          . '<span style="display:none;" class="thumbnail">'. $thumbnail . '</span>'
          . '</object>';


      wp_custom_debug_log("CUSTOM DEBUG: I AM NOW DOING A SHORT CODE: " . $htmlReturn);

      return  do_shortcode($htmlReturn);

    }

    add_shortcode('post-meta-shortcode', 'wp_add_post_meta_data_obj_shortcode');



    function  wp_custom_enqueue_scripts(){

    
      
      $theme = wp_get_theme();

      
      wp_register_script('wp-liu-trends-js', get_theme_file_uri('assets/js/liu-trending-statistics-observer.js'), [], $theme->get('Version'), true);

      //only register liu-trends if posts is single 
      if(is_single()){
        wp_enqueue_script('wp-liu-trends-js');
      }
    }
  

    add_action("wp_enqueue_scripts", "wp_custom_enqueue_scripts");
?>