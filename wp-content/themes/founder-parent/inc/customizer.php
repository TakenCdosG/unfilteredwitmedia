<?php
/**
 * Founder Theme Customizer
 *
 * @package Founder Parent
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'jetpack_testimonials' ) ) :
endif;


function founder_parent_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control( 'background_image'  )->section  = 'founder_parent_homepage';
	
	if ( $wp_customize->get_section( 'jetpack_testimonials' ) ) { 
	$wp_customize->get_section( 'jetpack_testimonials' )->panel = 'homepage_panel';
	} else { 
	$wp_customize->remove_control('background_repeat');
	$wp_customize->remove_control('background_position_x');
	$wp_customize->remove_control('background_attachment');
	$wp_customize->remove_control('background_color');
	}

	/**
     * Testimonials tweaks, but only if Jetpack is active and the Testimonials class exists
     *
     * @uses function get_section
     *
     * @since Theme Name 1.0
     */

    /*
	 * Add Theme Settings Section
	 */

    $wp_customize->add_panel( 'homepage_panel', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Homepage',
    'description'    => 'Homepage',
    'active_callback' => 'is_front_page'
) );

 	 /*
	 * Add Theme Settings Section
	 */

 	 $wp_customize->add_section( 'founder_parent_homepage' , array(
		'title'      => __( 'Hero Section', 'founder-parent' ),
		'priority'   => 25,
		'active_callback' => 'is_front_page',
		'panel'  		 => 'homepage_panel'
	) );

    // Add setting for homepage intro text
	$wp_customize->add_setting( 'homepage_intro_text', array( 
		'default' => '',
		'sanitize_callback' => 'homepage_sanitize_intro_text'
	) );

	function homepage_sanitize_intro_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}

	// Add setting for homepage intro text
	$wp_customize->add_setting( 'homepage_text', array( 
		'default' => '',
		'sanitize_callback' => 'homepage_sanitize_text'
	) );

	function homepage_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}

	// Add setting for full screen video
	$wp_customize->add_setting( 'fullscreen_video_url', array( 
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	
	// Add control for full screen video
	$wp_customize->add_control( 'fullscreen_video_url', array(
		'label'     => __( 'Add Video URL', 'founder-parent' ),
		'description' => __('Add the full url address to your video file', 'founder-parent'),
		'section'   => 'founder_parent_homepage',
		'priority'  => 10,
		'type'      => 'text'
	) );

	// Add setting for full screen video
	$wp_customize->add_setting( 'fullscreen_video_image', array( 
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	
	// Add control for full screen video
	$wp_customize->add_control( 'fullscreen_video_image', array(
		'label'     => __( 'Add Video Fallback Image', 'founder-parent' ),
		'description' => __('Add the fallback background image for mobile devices', 'founder-parent'),
		'section'   => 'founder_parent_homepage',
		'priority'  => 10,
		'type'      => 'text'
	) );
	
	// Add control for homepage intro text
	$wp_customize->add_control( 'homepage_intro_text', array(
		'label'     => __( 'Hero Tagline', 'founder-parent' ),
		'section'   => 'founder_parent_homepage',
		'priority'  => 10,
		'type'      => 'textarea'
	) );

	// Add control for homepage intro text
	$wp_customize->add_control( 'homepage_text', array(
		'label'     => __( 'Hero Text', 'founder-parent' ),
		'section'   => 'founder_parent_homepage',
		'priority'  => 10,
		'type'      => 'textarea'
	) );


	// Add section for Podcasts intro text
	$wp_customize->add_section( 'podcast_section', array( 
		'title'      => __( 'Podcast Section', 'founder-parent' ),
		'priority'   => 25,
		'active_callback' => 'is_front_page',
		'panel'  		 => 'homepage_panel'
	) );

	 // Add setting for homepage intro text
	$wp_customize->add_setting( 'podcast_title', array( 
		'default' => '',
		'sanitize_callback' => 'podcast_sanitize_title'
	) );


	function podcast_sanitize_title( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	// Add control for homepage intro text
	$wp_customize->add_control( 'podcast_title', array(
		'label'     => __( 'Podcast Title', 'founder-parent' ),
		'section'   => 'podcast_section',
		'priority'  => 10,
		'type'      => 'textarea'
	) );

	 // Add setting for homepage intro text
	$wp_customize->add_setting( 'podcast_content', array( 
		'default' => '',
		'sanitize_callback' => 'podcast_sanitize_content'
	) );


	function podcast_sanitize_content( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	// Add control for homepage intro text
	$wp_customize->add_control( 'podcast_content', array(
		'label'     => __( 'Podcast Content', 'founder-parent' ),
		'section'   => 'podcast_section',
		'priority'  => 10,
		'type'      => 'textarea'
	) );

	$wp_customize->add_setting(
    'homepage-tagline-font-color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
 
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'homepage-tagline-font-color',
	        array(
	            'label' => 'Tagline Font Color',
	            'section' => 'founder_parent_homepage',
	            'settings' => 'homepage-tagline-font-color'
	        )
	    )
	);


	// Add section for Sidebar
	$wp_customize->add_section( 'hidden_sidebar', array( 
		'title'      => __( 'Hidden Sidebar', 'founder-parent' ),
		'priority'   => 30,
	) );

	// Add setting for background image upload
	$wp_customize->add_setting( 'sidebar_background_image', array( 
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'sidebar_background_image', array(
		'label' => 'Add Sidebar Background Image',
        'section' => 'hidden_sidebar',
        'priority' => 30,
    ) ) );

	// Add control for sidebar background color
    $wp_customize->add_setting( 'founder_parent_sidebar_color', array(
        'default'           => 'dark',
        'type'              => 'option',
        'sanitize_callback' => 'sidebar_sanitize_color'
    ));

	// Add section for Footer
	$wp_customize->add_section( 'footer_section', array( 
		'title'      => __( 'Footer Section', 'founder-parent' ),
		'priority'   => 45,
	) );

	// Add setting for footer text
	$wp_customize->add_setting( 'footer_text', array( 
		'default' => '',
		'sanitize_callback' => 'footer_sanitize_text'
	) );

	function footer_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	// Add control for footer text
	$wp_customize->add_control( 'footer_text', array(
		'label'     => __( 'Add Footer Text', 'founder-parent' ),
		'section'   => 'footer_section',
		'priority'  => 50,
		'type'      => 'textarea'
	) );

	// Add setting for background image upload
	$wp_customize->add_setting( 'footer_background_image', array( 
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'footer_background_image', array(
		'label' => 'Add Footer Background Image',
        'section' => 'footer_section',
        'priority' => 10,
    ) ) );


	// Fonts  
    $wp_customize->add_section(
        'founder_parent_typography',
        array(
            'title' => __('Google Fonts', 'founder-parent' ),   
            'priority' => 45,
    ));
	
    $font_choices = 
        array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
    
    $wp_customize->add_setting(
        'headings_fonts',
        array(
            'sanitize_callback' => 'founder_parent_sanitize_fonts',
    ));
    
    $wp_customize->add_control(
        'headings_fonts',
        array(
            'type' => 'select',
            'description' => __('Select your desired font for the headings. Open Sans is the default Heading font.', 'founder-parent'),
            'section' => 'founder_parent_typography',
            'choices' => $font_choices
    ));
    
    $wp_customize->add_setting(
        'body_fonts',
        array(
            'sanitize_callback' => 'founder_parent_sanitize_fonts',
    ));
    
    $wp_customize->add_control(
        'body_fonts',
        array(
            'type' => 'select',
            'description' => __( 'Select your desired font for the body. Droid Sans is the default Body font.', 'founder-parent' ), 
            'section' => 'founder_parent_typography',   
            'choices' => $font_choices
    ));


	/*
	 * Add Color Section
	 */

	$wp_customize->add_setting(
    'hero_background_color',
    array(
        'default' => '#282e34',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
 
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'hero_background_color',
	        array(
	            'label' => 'Hero Background Color',
	            'section' => 'colors',
	            'settings' => 'hero_background_color'
	        )
	    )
	);


	$wp_customize->add_setting(
	    'body-font-color',
	    array(
	        'default' => '#444444',
	        'sanitize_callback' => 'sanitize_hex_color'
	    ) );
	 
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'body_font_color',
		        array(
		            'label' => 'Body Font Color',
		            'section' => 'colors',
		            'settings' => 'body-font-color'
		        )
		    )
		);

	$wp_customize->add_setting(
    'heading-font-color',
    array(
        'default' => '#444444',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
 
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'heading_font_color',
	        array(
	            'label' => 'Heading Font Color',
	            'section' => 'colors',
	            'settings' => 'heading-font-color'
	        )
	    )
	);

	$wp_customize->add_setting(
    'page-heading-font-color',
    array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
 
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'page-heading_font_color',
	        array(
	            'label' => 'Page Heading & Excerpt Font Color',
	            'section' => 'colors',
	            'settings' => 'page-heading-font-color'
	        )
	    )
	);

	$wp_customize->add_setting(
    'accent-color',
    array(
        'default' => '#444444',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
 
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'accent-color',
	        array(
	            'label' => 'Accent Color',
	            'section' => 'colors',
	            'settings' => 'accent-color'
	        )
	    )
	);

	$wp_customize->add_setting(
    'hover-color',
    array(
        'default' => '#222222',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
 
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'hover-color',
	        array(
	            'label' => 'Hover Color',
	            'section' => 'colors',
	            'settings' => 'hover-color'
	        )
	    )
	);


	$wp_customize->add_setting(
    'button-color',
    array(
        'default' => '#2abb9b',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
 
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'button-color',
	        array(
	            'label' => 'Button Color',
	            'section' => 'colors',
	            'settings' => 'button-color'
	        )
	    )
	);

	$wp_customize->add_setting(
    'button-hover-color',
    array(
        'default' => '#2abb9b',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
 
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'button-hover-color',
	        array(
	            'label' => 'Button Hover Color',
	            'section' => 'colors',
	            'settings' => 'button-hover-color'
	        )
	    )
	);

}

//Sanitizes Fonts 
function founder_parent_sanitize_fonts( $input ) {  
    $valid = array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
            'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',    
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt', 
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function founder_parent_customize_css() {
    ?>
         <style type="text/css">

         /*
         * Hero Background Overlay
         */

         .site-header, .sub-header, .site-footer { background:<?php echo get_theme_mod('hero_background_color', '#282e34'); ?>; } 


          /*
		  * General Colors
		  */

		  body, button, input, select, textarea, p, li, i, .meta-content, .meta-content span .meta-page-content .textwidget, .meta-page-content .rssSummary, .meta-page-content .rss-date, .meta-page-content a.rsswidget, .meta-page-content .textwidget strong, .meta-page-content .textwidget p { color:<?php echo get_theme_mod('body-font-color', '#444444'); ?>; }

          /*
		  * Homepage Tagline/Heading Colors
		  */

		  h1.hero-title { color:<?php echo get_theme_mod('homepage-tagline-font-color', '#ffffff'); ?>; }

          /*
		  * Heading Colors
		  */

		  .meta-content, .meta-content span, .meta-page-content h4.widget-title, header#masthead ul li a, .blog-left h2 a, .blog-right h3 a, .post-content h2 a, h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color:<?php echo get_theme_mod('heading-font-color', '#444444'); ?>; }
		  
		  /*
		  * Page & Sub Heading Colors
		  */

		  .site-title a { color:<?php echo get_theme_mod('page-heading-font-color', '#ffffff'); ?>; }
		  h1.site-title a { color:<?php echo get_theme_mod('page-heading-font-color', '#ffffff'); ?>; }
		  p.site-description { color:<?php echo get_theme_mod('page-heading-font-color', '#ffffff'); ?>; }
		  header#masthead ul li a { color:<?php echo get_theme_mod('page-heading-font-color', '#ffffff'); ?>; }
		  h1.entry-title { color:<?php echo get_theme_mod('page-heading-font-color', '#ffffff'); ?>; }
		  .tagline { color:<?php echo get_theme_mod('page-heading-font-color', '#ffffff'); ?>; }
		  .tagline p { color:<?php echo get_theme_mod('page-heading-font-color', '#ffffff'); ?>; }


		  /*
	      * Accent Colors
		  */

		  a, a:visited, p a, p a:visited, a.button, .tagcloud a, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color:<?php echo get_theme_mod('accent-color', '#444444'); ?>; }
		  .meta a { color:<?php echo get_theme_mod('accent-color', '#444444'); ?>; }
		  .meta-page-content .widget li a { color:<?php echo get_theme_mod('accent-color', '#444444'); ?>; }
		  a.edd_cart_remove_item_btn { color:<?php echo get_theme_mod('accent-color', '#444444'); ?>; }
		  .more-link { border-bottom-color:<?php echo get_theme_mod('accent-color', '#444444'); ?>; }

		  /*
	      * Hover Colors
		  */

		  a:hover, a:focus, p a:hover, p a:focus, .meta a:hover  { color:<?php echo get_theme_mod('hover-color', '#222222'); ?>; }
		  
		  /*
	      * Button Colors
		  */

		  .button, .edd-submit.button, .tagcloud a, .edd-submit.button.white, .edd-submit.button.gray, .edd-submit.button.blue, .edd-submit.button.red, .edd-submit.button.green, .edd-submit.button.yellow, .edd-submit.button.orange, .edd-submit.button.dark-gray, #edd-purchase-button, .edd-submit, input[type=submit].edd-submit { background:<?php echo get_theme_mod('button-color', '#2abb9b'); ?>; }
		  #commentform #submit, input.wpcf7-submit { background:<?php echo get_theme_mod('button-color', '#2abb9b'); ?>; }

		  /*
		  * Button Hover Colors
		  */

		  #commentform #submit:hover, input.wpcf7-submit:hover, .submit-contact:hover, .button:hover, .edd-submit.button:hover, .tagcloud a:hover, .edd-submit.button.white:hover, .edd-submit.button.gray:hover, .edd-submit.button.blue:hover, .edd-submit.button.red:hover, .edd-submit.button.green:hover, .edd-submit.button.yellow:hover, .edd-submit.button.orange:hover, .edd-submit.button.dark-gray:hover, #edd-purchase-button:hover, .edd-submit:hover, input[type=submit].edd-submit:hover { background:<?php echo get_theme_mod('button-hover-color', '#2abb9b'); ?>; } 
        
        </style>

    <?php
}

add_action( 'wp_head', 'founder_parent_customize_css');

add_action( 'customize_register', 'founder_parent_customize_register', 11 );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function founder_parent_customize_preview_js() {
	wp_enqueue_script( 'founder_parent_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'founder_parent_customize_preview_js' );
