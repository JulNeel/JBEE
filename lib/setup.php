<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  // add_theme_support('soil-clean-up');
  // add_theme_support('soil-nav-walker');
  // add_theme_support('soil-nice-search');
  // add_theme_support('soil-jquery-cdn');
  // add_theme_support('soil-relative-urls');
  

  // Enalbe custom logo
  add_theme_support( 'custom-logo', array(
  'height'      => 100,
  'width'       => 400,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => array( 'site-title', 'site-description' ),
) );


  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'header_navigation' => __('Header Navigation', 'sage'),
    'header_home_navigation' => __('Header Home Navigation', 'sage'),
    'secondary_navigation' => __('Secondary Navigation', 'sage')

  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  add_image_size( 'slideshow_img', 1140, 500, true ); 
  add_image_size( 'porfolio_img', 600, 600, true );  /* Taille perso  3 */ //300 pixels wide (and unlimited height) /* Taille perso  3 */ //300 pixels wide (and unlimited height)
  add_filter( 'slide', 'roots_insert_custom_image_sizes' );

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable automatic feed links
  add_theme_support( 'automatic-feed-links' );

  // Set up content width
  if ( ! isset( $content_width ) ) $content_width = 1140;

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');


 
/**
 * Add new image sizes to Media Manager Selection
 */
function roots_insert_custom_image_sizes( $image_sizes ) {
  // get the custom image sizes
  global $_wp_additional_image_sizes;
  // if there are none, just return the built-in sizes
  if ( empty( $_wp_additional_image_sizes ) )
    return $image_sizes;

  // add all the custom sizes to the built-in sizes
  foreach ( $_wp_additional_image_sizes as $id => $data ) {
    // take the size ID (e.g., 'my-name'), replace hyphens with spaces,
    // and capitalise the first letter of each word
    if ( !isset($image_sizes[$id]) )
      $image_sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
    }

  return $image_sizes;
}


  // Add theme support for Custom Header
  $header_args = array(
    
  
    'flex-width'             => true,
    'flex-height'            => true,
    'uploads'                => true,
    'random-default'         => true,
    'header-text'            => true,
    'video'                  => true,
    'video-active-callback'  => '',
  );
  add_theme_support( 'custom-header', $header_args );

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget  mb-3 p-3 %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widgettitle h3">',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<div class="widget p-2 %1$s %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle center h3">',
    'after_title'   => '</h3>'
  ]);


  register_sidebar([
    'name'          => __('Home Section 1', 'sage'),
    'id'            => 'sidebar-home',
    'class'         => 'section-1',
    'before_widget' => '<div class="col-12 col-sm-6 col-lg-4 d-flex pb-3 pb-md-5"><div class="widget widget-prestations  center shadow p-3 %1$s %2$s">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h3 class="widgettitle center h3 ">',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Home Section 2', 'sage'),
    'id'            => 'sidebar-home-2',
    'class'         => 'section-2',
    'before_widget' => '<div class="col-12 col-sm-6 col-lg-4 d-flex pb-3 pb-md-5"><div class="widget widget-process  center p-3 %1$s %2$s">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h3 class="widgettitle center h3">',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');




/**
 * Determine which pages should display the LOADER
 */
function display_loader() {
  static $display;

  isset($display) || $display = !in_array(true, [

   
  ]);
  return apply_filters('sage/display_loader', $display);
}

/**
 * Determine which pages should display the FEED-BOXES
 */
function display_feed() {
  static $display;

  isset($display) || $display = in_array(true, [
    // The FEED-BOXES will NOT be displayed if ANY of the following return true.
    
   
  ]);
  return apply_filters('sage/display_feed', $display);
}

/**
 * Determine which pages should display the SLIDESHOW
 */
function display_slideshow() {
  static $display;

  isset($display) || $display = in_array(true, [
    // The slideshow will be displayed if ANY of the following return true.
   
   
  ]);
  return apply_filters('sage/display_slideshow', $display);
}


/**
 * Determine which pages should display the agenda
 **/
function display_agenda() {
  static $display;

  isset($display) || $display = in_array(true, [
    // The agenda will be displayed if ANY of the following return true.
  
   
  ]);
  return apply_filters('sage/display_agenda', $display);
}
/**
 * Determine which pages should display the edito
 */
function display_presentation() {
  static $display;

  isset($display) || $display = in_array(true, [
    // The edito will be displayed if ANY of the following return true.
    
   
  ]);
  return apply_filters('sage/display_edito', $display);
}
/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_home(),
    is_page_template('template-custom.php'),
    is_page()
  ]);
  return apply_filters('sage/display_sidebar', $display);
}

/**https://fonts.googleapis.com/css?family=Oswald:300,400,700
 * Theme assets
 */
function assets() {
  wp_enqueue_style( 'google_fonts', '//fonts.googleapis.com/css?family=Oswald:300,400,700&amp;subset=latin-ext', false, null );
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);