<?php
/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since MyTheme 1.0
 */



namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;



/**
 * Add postMessage support
 */
function customize_register($wp_customize) {

	$wp_customize->get_setting('blogname')->transport = 'postMessage';

// remove defaults
  
  $wp_customize->remove_section( 'static_front_page' );


/**
 * Removes the core 'Widgets' panel from the Customizer.
 *
 * @param array $components Core Customizer components list.
 * @return array (Maybe) modified components list.
 */
function wpdocs_remove_widgets_panel( $components ) {
    $i = array_search( 'widgets', $components );
    if ( false !== $i ) {
        unset( $components[ $i ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'wpdocs_remove_widgets_panel' );
// Create a new class text control


//1. Define a new section (if desired) to the Theme Customizer
	  


	$wp_customize->add_section( 'my_contact', 
	   array(
	      'title' => __( 'My contact options', 'sage' ), //Visible title of section
	      'priority' => 31, //Determines what order this appears in
	      'capability' => 'edit_theme_options', //Capability needed to tweak
	      'description' => __('Allows you to display your contact informations in your site', 'sage'), //Descriptive tooltip
	   ) 
	);
	
	$wp_customize->add_section( 'edito', array(
	      'title' => __( 'Edito', 'sage' ), //Visible title of section
	      'priority' => 32, //Determines what order this appears in
	      'capability' => 'edit_theme_options', //Capability needed to tweak
	      'description' => __('Allows you to display an edito section in the front page of your site', 'sage'), //Descriptive tooltip
	   ) 
	);

	$wp_customize->add_section( 'slideshow', array(
	      'title' => __( 'Slideshow', 'sage' ), //Visible title of section
	      'priority' => 33, //Determines what order this appears in
	      'capability' => 'edit_theme_options', //Capability needed to tweak
	      'description' => __('Allows you to choose the pages you want to include in the slideshow', 'sage'), //Descriptive tooltip
	   ) 
	);




//2. Register new settings to the WP database...
	

	$wp_customize->add_setting('logo_small', array(
		'default' => __('Your name', 'sage'),
		'sanitize_callback' => 'wp_kses_post'
		)
	); 
		$wp_customize->add_setting('logo_mini', array(
		'default' => __('Your name', 'sage'),
		'sanitize_callback' => 'wp_kses_post'
		)
	);

	$wp_customize->add_setting('contact_name', array(
		'default' => __('Your name', 'sage'),
		'sanitize_callback' => 'wp_kses_post'
		)
	); 
	$wp_customize->add_setting('contact_address', array(
		'default' =>__('Your contact address', 'sage'),
		'sanitize_callback' => 'wp_kses_post'
		)
		
	); 
	$wp_customize->add_setting('contact_cp', array(
		'default' => __('Your postal code', 'sage'),
		'sanitize_callback' => 'wp_kses_post'
		)
	); 
	$wp_customize->add_setting('contact_city', array(
		'default' => __('Your city', 'sage'),
		'sanitize_callback' => 'wp_kses_post'
		)
	);   
	$wp_customize->add_setting('contact_phone', array(
		'default' => __('Your phone number', 'sage'),
		'sanitize_callback' => 'wp_kses_post'
		)
	); 
	$wp_customize->add_setting('contact_mail', array(
		'default' => __('Your mail address', 'sage'),
		'sanitize_callback' => 'wp_kses_post'
		)
	);
	$wp_customize->add_setting('contact_fb', array(
		
		'sanitize_callback' => 'wp_kses_post'
		)
	); 

	$wp_customize->add_setting('contact_li', array(
		
		'sanitize_callback' => 'wp_kses_post'
		)
	); 
	$wp_customize->add_setting('contact_tw', array(
		
		'sanitize_callback' => 'wp_kses_post'
		)
	); 
	$wp_customize->add_setting('contact_git', array(
		
		'sanitize_callback' => 'wp_kses_post'
		)
	); 


	$wp_customize->add_setting('edito_img', array(
		
		'sanitize_callback' => 'wp_kses_post'
		)
	); 
	$wp_customize->add_setting( 'edito_title', array(
	    'default' => '',
	    'sanitize_callback' => 'wp_kses_post'
		)
	);
	
	$wp_customize->add_setting( 'edito_text', array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'wp_kses_post'
		)
	);
		$wp_customize->add_setting( 'edito_sign', array(
	    'default' => '',
	    'sanitize_callback' => 'wp_kses_post'
		)
	);	
	$wp_customize->add_setting('edito_bg', array(
		'sanitize_callback' => 'wp_kses_post'
		)
	); 
	$wp_customize->add_setting('slideshow_page_1', array(
		'sanitize_callback' => 'wp_kses_post'
		)
	);
	$wp_customize->add_setting('slideshow_page_2', array(
		'sanitize_callback' => 'wp_kses_post'
		)
	);
	$wp_customize->add_setting('slideshow_page_3', array(
		'sanitize_callback' => 'wp_kses_post'
		)
	); 




//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
   
		$wp_customize->add_control(
		new \WP_Customize_Image_Control(
           $wp_customize,
           'logo_small',
			array(
				'label'      => __( 'The small version of your logo', 'sage' ),
				'descrition'      => __( 'upload edito\'s background image', 'sage' ),
				'section'    => 'title_tagline',
				'settings'   => 'logo_small'
           )));
		$wp_customize->add_control(
		new \WP_Customize_Image_Control(
           $wp_customize,
           'logo_mini',
			array(
				'label'      => __( 'The mini version of your logo', 'sage' ),
				'descrition'      => __( 'upload edito\'s background image', 'sage' ),
				'section'    => 'title_tagline',
				'settings'   => 'logo_mini'
           )));

		$wp_customize->add_control('contact_name',array(
			'label'		=> __( 'name', 'sage' ),
			'section'	=> 'my_contact',
			'type'		=> 'text'
		));
		$wp_customize->add_control('contact_address',array( 
			'label'		=> __( 'contact address', 'sage' ),
			'section'	=> 'my_contact',
			'type'		=> 'textarea'
		));

		$wp_customize->add_control('contact_cp',array( 
			'label'		=> __( 'postal code', 'sage' ),
			'section'	=> 'my_contact',
			'type'		=> 'text'
		));

		$wp_customize->add_control('contact_city',array( 
			'label'		=> __( 'city', 'sage' ),
			'section'	=> 'my_contact',
			'type'		=> 'text'
		));

		$wp_customize->add_control('contact_phone',array( 
			'label'		=> __( 'phone', 'sage' ),
			'section'	=> 'my_contact',
			'type'		=> 'text'
		));

		$wp_customize->add_control('contact_mail',array( 
			'label'		=> __( 'mail', 'sage' ),
			'section'	=> 'my_contact',
			'type'		=> 'text'
		));

		$wp_customize->add_control('contact_fb',array( 
			'label'		=> __( 'facebook', 'sage' ),
			'description'=> __('your facebook page or profile id', 'sage'),
			'section'	=> 'my_contact',
			'type'		=>'text'
		));

		$wp_customize->add_control('contact_tw',array( 
			'label'		=> __( 'twitter', 'sage' ),
			'description'		=> __('your twitter account (@...)', 'sage'),
			'section'	=> 'my_contact',
			'type'		=> 'text'
		));
 		
		$wp_customize->add_control('contact_li',array( 
			'label'		=> __( 'linkedin', 'sage' ),
			'description'=> __('your Linkedin profile id', 'sage'),
			'section'	=> 'my_contact',
			'type'		=>'text'
		));
		$wp_customize->add_control('contact_git',array( 
			'label'		=> __( 'Github', 'sage' ),
			'description'=> __('your Github profile id', 'sage'),
			'section'	=> 'my_contact',
			'type'		=>'text'
		));
		$wp_customize->add_control('edito_title',array( 
			'label' => __( 'Edito title', 'sage' ),
			'section' => 'edito',
			'type' => 'text'
		));

		$wp_customize->add_control('edito_text',array( 
			'label' => __( 'Edito text', 'sage' ),
			'section' => 'edito',
			'type' => 'textarea'
		));
		
		$wp_customize->add_control(
		new \WP_Customize_Media_Control(
           $wp_customize,
           'edito_img',
           array(
           	'label'      => __( 'Author\'s photo', 'sage' ),
            'description'=> __( 'Upload the picture of the author', 'sage' ),
            'section'    => 'edito',
            'settings'   => 'edito_img',
            'mime_type' => 'image'
           )));
		
		$wp_customize->add_control('edito_sign',array( 
			'label'		=> __( 'signature', 'sage' ),
			'section'	=> 'edito',
			'type'		=> 'text'
		));

		$wp_customize->add_control(
		new \WP_Customize_Image_Control(
           $wp_customize,
           'edito_bg',
			array(
				'label'      => __( 'Edito\'s background image', 'sage' ),
				'descrition'      => __( 'upload edito\'s background image', 'sage' ),
				'section'    => 'edito',
				'settings'   => 'edito_bg'
           )));

		$wp_customize->add_control( 'slideshow_page_1', array(
		  'type' => 'dropdown-pages',
		  'section' => 'slideshow', // Add a default or your own section
		  'label' => __( 'Page 1' ),
		  'description' => __( 'Choose the page you want to include in the slideshow' ),
		) );

		$wp_customize->add_control( 'slideshow_page_2', array(
		  'type' => 'dropdown-pages',
		  'section' => 'slideshow', // Add a default or your own section
		  'label' => __( 'Page 2' ),
		  'description' => __( 'Choose the page you want to include in the slideshow' ),
		) );

		$wp_customize->add_control( 'slideshow_page_3', array(
		  'type' => 'dropdown-pages',
		  'section' => 'slideshow', // Add a default or your own section
		  'label' => __( 'Page 3' ),
		  'description' => __( 'Choose the page you want to include in the slideshow' ),
		) );

}

add_action('customize_register', __NAMESPACE__ .'\\customize_register');




/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');