<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;


/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');




/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');



/*********************
      SHORTCODES
*********************/


// CONTACT shortcode
function contact_shortcode( ) {
  
   $myname=get_theme_mod('contact_name','');
   $myaddress=get_theme_mod('contact_address','');
   $mycp=get_theme_mod('contact_cp','');
   $mycity=get_theme_mod('contact_city','');
   $mymail=get_theme_mod('contact_mail','');
   $myphone=get_theme_mod('contact_phone','');
  echo "<div class='contact-box'><address>";
  if($myname)   echo '<span class="contact-name py-1 h5">'.$myname.'</span></br>';
  if($myaddress)  echo '<div class="py-1"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i><span class="contact-address">'.$myaddress.' </span></div>' ;
  if($mycp)  echo '<span class="contact-cp">'.$mycp.'</span>&nbsp;' ;
  if($mycity)  echo '<span class="contact-city">'.$mycity.'</span></br>'  ;
  if($mymail)  echo '<i class="fa fa-envelope-o mr-1" aria-hidden="true"></i><span class="contact-mail">'.$mymail.' </span></br>'  ;
  if($myphone)  echo '<i class="fa fa-phone mr-1" aria-hidden="true"></i><span class="contact-phone">'.$myphone.' </span></br>' ;
  echo "</address></div>";
}

add_shortcode( 'contactshortcode',  __NAMESPACE__ .'\\contact_shortcode' );

// CONTACT-ICON shortcode
function contact_icon_shortcode( ) {
  
   $myfb=get_theme_mod('contact_fb','');
   $mytw=get_theme_mod('contact_tw','');
   $myrss=get_bloginfo('rss2_url');
  echo "<div class='contact-icon py-2'>";
  if($myfb)  echo '<a class="btn btn-fb mr-2 my-0" href="https://www.facebook.com/'. $myfb .'" aria-label="Facebook"> <i class="fa fa-facebook" aria-hidden="false"></i> </a>' ;
  if($mytw)  echo '<a class="btn btn-tw mr-2 my-0" href="https://www.twitter.com/'. $mytw .'" aria-label="Twitter"> <i class="fa fa-twitter" aria-hidden="false"></i> </a>' ;
  echo '<a class="btn btn-rss mr-2 my-0" href="'. $myrss .'" aria-label="rss"><i class="fa fa-rss" aria-hidden="true"></i>
</a>';
  echo "</div>";
}

add_shortcode( 'contacticonshortcode', __NAMESPACE__ . '\\contact_icon_shortcode' );

// FOLLOWBOX shortcode
function followbox_shortcode( ) {
  
echo '
    <div class="wrap follow-box cf">

        <div><span>Recevez directement sur votre boite mail toutes les actualités du site en vous abonnant à notre newsletter ou en suivant l\'UPL sur Twitter et Facebook</span></div>
        
      <div class="follow-inner">
        <div class="follow-mail my-2">
          
<!-- Begin MailChimp Signup Form -->
  <div id="mc_embed_signup">
    <form action="//groupesocialiste35.us14.list-manage.com/subscribe/post?u=795cf5c360ea001270b820d6e&amp;id=fc5c98d1ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <div id="mc_embed_signup_scroll form-inline">
        <div class="mc-field-group">
          <input type="email" value="" name="EMAIL" class="required email form-control" id="mce-EMAIL" placeholder="'. __("Votre adresse mail","sage") .'">
        </div>
        <div class="clear"><input type="submit" value="'. __("S'abonner","sage") .'" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-primary">
        </div>
        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none">
          </div>
          <div class="response" id="mce-success-response" style="display:none">
          </div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_795cf5c360ea001270b820d6e_fc5c98d1ef" tabindex="-1" value="">
        </div>

      </div>
</form>
</div>

<!--End mc_embed_signup-->
          
        </div>  

          
        
         </div>';
         echo do_shortcode('[contacticonshortcode]'); 
      echo '

    </div>  <?php /* end follow-box */ ?>
';
}

add_shortcode( 'followboxshortcode', __NAMESPACE__ . '\\followbox_shortcode' );
// BREADCRUMB shortcode
function breadcrumb_shortcode( ) {
  echo "<div id='breadcrumb'>";
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
}
  echo "</div>";
}

add_shortcode( 'breadcrumbshortcode', __NAMESPACE__ . '\\breadcrumb_shortcode' );


// LAST GALLERY POSTS shortcode
function gallery_posts_shortcode( ) {
    $args = array(
    'post_format' => 'post-format-gallery',
    'showposts' => 2
        );
          
          
          
// The Query

$the_query = new \WP_Query($args);

// The Loop
if ( $the_query->have_posts() ) {
  echo '<ul>';
  while ( $the_query->have_posts() ) {
    $the_query->the_post();
    echo '<li><a class="post-thumbnail-link" href="' . get_permalink().'">';
    echo the_post_thumbnail('medium'). '</a>';
    echo '<a class="gallerytitle" href="' . get_permalink() .'">' ; 
    echo  '<h5>' . get_the_title().'</h5></a>';
    echo '</a></li>';
    
  }
  echo '</ul>';
} else {
  // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
}



add_shortcode( 'gallerypostsshortcode', __NAMESPACE__ . '\\gallery_posts_shortcode' );


/*********************
      WIDGETS
*********************/
// CONTACT WIDGET


class Contact extends \WP_Widget {
  function __construct() {
    $widget_ops = array( 
      'classname' => 'contact',
      'description' => __( 'Display your contact informations', 'sage' ),
    );
    parent::__construct( 'contact', 'Contact', $widget_ops );
  }
    function widget($args, $instance){
    // Extraction des paramètres du widget
    extract( $args );
    // Récupération de chaque paramètre
    $title = apply_filters('widget_title', $instance['title']);
    // Voir le détail sur ces variables plus bas
    echo $before_widget;
    // On affiche un titre si le paramètre est rempli
    if($title)
      echo $before_title . $title . $after_title;
    /* Début de notre script */
     echo do_shortcode('[contactshortcode]'); 
     
     echo $after_widget;    
    }
    function update($new_instance, $old_instance) {
        // Modification des paramètres du widget
        $instance = $old_instance;
    /* Récupération des paramètres envoyés */
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
    }
    function form($instance){
   
    $title = isset( $instance['title'] ) ? esc_attr($instance['title']) : '';
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Title:'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
    <?php
    }
}

add_action('widgets_init', create_function('', 'return register_widget("'. __NAMESPACE__ .'\\Contact");'));


// FOLLOWBOX WIDGET

class Followbox extends \WP_Widget {

    function __construct() {
    parent::__construct(
      'followbox', // Base ID
      esc_html__( 'Follow Box', 'sage' ), // Name
      array( 'description' => esc_html__( 'un formulaire d\'abonnement à la newsletter et les liens vers votre page Facebook, votre compte Twitter et le flux RSS', 'sage' ), ) // Args
    );
  }


    function widget($args, $instance){
    // Extraction des paramètres du widget
    extract( $args );
    // Récupération de chaque paramètre
    $title = apply_filters('widget_title', $instance['title']);
    // Voir le détail sur ces variables plus bas
    echo $before_widget;
    // On affiche un titre si le paramètre est rempli
    if($title)
      echo $before_title . $title . $after_title;
    /* Début de notre script */
     echo do_shortcode('[followboxshortcode]'); 
        
     echo $after_widget;    
    }
    function update($new_instance, $old_instance) {
        // Modification des paramètres du widget
        $instance = $old_instance;
    /* Récupération des paramètres envoyés */
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
    }
    function form($instance){
    $title = isset( $instance['title'] ) ? esc_attr($instance['title']) : '';
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Title:'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
    <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("'. __NAMESPACE__ .'\\Followbox");'));


// GALLERY POSTS WIDGET

class Gallery extends \WP_Widget {

    function __construct() {
    parent::__construct(
      'gallery', // Base ID
      esc_html__( 'Gallery', 'sage' ), // Name
      array( 'description' => esc_html__( 'Display your last gallery posts', 'sage' ), ) // Args
    );
  }

    function widget($args, $instance){
    // Extraction des paramètres du widget
    extract( $args );
    // Récupération de chaque paramètre
    $title = apply_filters('widget_title', $instance['title']);
    // Voir le détail sur ces variables plus bas
    echo $before_widget;
    // On affiche un titre si le paramètre est rempli
    if($title)
      echo $before_title . $title . $after_title;
    /* Début de notre script */
     echo do_shortcode('[gallerypostsshortcode]'); 
      
     echo $after_widget;    
    }
    function update($new_instance, $old_instance) {
        // Modification des paramètres du widget
        $instance = $old_instance;
    /* Récupération des paramètres envoyés */
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
    }
    function form($instance){
    $title = isset( $instance['title'] ) ? esc_attr($instance['title']) : '';
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Title:'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
    <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("'. __NAMESPACE__ .'\\Gallery");'));


// BREADCRUMB WIDGET

class Breadcrumb extends \WP_Widget {
    function __construct() {
    parent::__construct(
      'breadcrumb', // Base ID
      esc_html__( 'Breadcrumb', 'sage' ), // Name
      array( 'description' => esc_html__( 'Display a Breadcrumb', 'sage' ), ) // Args
    );
  }

    function widget($args, $instance){
    // Extraction des paramètres du widget
    extract( $args );
    // Récupération de chaque paramètre
    $title = apply_filters('widget_title', $instance['title']);
    // Voir le détail sur ces variables plus bas
    echo $before_widget;
    // On affiche un titre si le paramètre est rempli
    if($title)
      echo $before_title . $title . $after_title;
    /* Début de notre script */
     echo do_shortcode('[breadcrumbshortcode]'); 
      
     echo $after_widget;    
    }
    function update($new_instance, $old_instance) {
        // Modification des paramètres du widget
        $instance = $old_instance;
    /* Récupération des paramètres envoyés */
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
    }
    function form($instance){
    $title = isset( $instance['title'] ) ? esc_attr($instance['title']) : '';
    ?>
       
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Title:'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        
    <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("'. __NAMESPACE__ .'\\Breadcrumb");'));