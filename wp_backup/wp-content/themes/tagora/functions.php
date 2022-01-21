<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( ! function_exists( 'tagora_enqueue_styles' ) ) :
    /**
     * Load assets.
     *
     * @since 1.0.0
     */
    function tagora_enqueue_styles() {
        wp_enqueue_style( 'tagora-style-parent', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'tagora-style', get_stylesheet_directory_uri() . '/style.css', array( 'tagora-style-parent' ), '1.0.0' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'tagora_enqueue_styles', 99 );


/**
 * Register custom fonts.
 */
function tagora_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Bad Script, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Bad Script font: on or off', 'tagora' ) ) {
		$fonts[] = 'Bad Script';
	}


	/* translators: If there are characters in your language that are not supported by Ubuntu, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Ubuntu font: on or off', 'tagora' ) ) {
		$fonts[] = 'Ubuntu';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

if ( ! function_exists( 'tagora_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
	function tagora_get_default_theme_options() {

	    $theme_data = wp_get_theme();
	    $defaults = array();

	    $defaults['disable_homepage_content_section']	= true;

		// Featured Slider Section
		$defaults['disable_featured_slider_section']	= false;
		$defaults['disable_white_overlay']	= true;



		// Popular Section
		$defaults['disable_popular_section']	= false;
		$defaults['popular_title']	   	 		= esc_html__( 'Popular Posts', 'tagora' );

		// Author Section
		$defaults['disable_message_section']	= false;

		// Latest Posts Section
		$defaults['latest_posts_title']	   	 	= esc_html__( 'Recent New More Stories', 'tagora' );
		$defaults['pagination_type']		= 'default';

		// About Section
		$defaults['disable_about_section']	= false;
		$defaults['number_of_about_items']			= 3;


		$defaults['excerpt_length']				= 50;
		$defaults['layout_options_blog']			= 'right-sidebar';
		$defaults['layout_options_archive']			= 'right-sidebar';
		$defaults['layout_options_page']			= 'right-sidebar';	
		$defaults['layout_options_single']			= 'right-sidebar';	

		//Footer section 		
		$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'tagora' );
		// Pass through filter.

	    return $defaults;
	}
endif;
add_filter( 'blogbee_filter_default_theme_options', 'tagora_get_default_theme_options', 99 );