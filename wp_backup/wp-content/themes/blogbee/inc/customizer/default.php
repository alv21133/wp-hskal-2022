<?php
/**
 * Default theme options.
 *
 * @package BlogBee
 */

if ( ! function_exists( 'blogbee_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function blogbee_get_default_theme_options() {

	$theme_data = wp_get_theme();
	$defaults = array();
	
	$defaults['disable_homepage_content_section']	= true;

	// Featured Slider Section
	$defaults['disable_featured_slider_section']	= false;
	$defaults['disable_white_overlay']	= false;



	// Popular Section
	$defaults['disable_popular_section']	= false;
	$defaults['popular_title']	   	 		= esc_html__( 'Popular Posts', 'blogbee' );

	// Author Section
	$defaults['disable_message_section']	= false;

	// Latest Posts Section
	$defaults['latest_posts_title']	   	 	= esc_html__( 'Latest Posts', 'blogbee' );
	$defaults['pagination_type']		= 'default';

	// About Section
	$defaults['disable_about_section']	= false;
	$defaults['number_of_about_items']			= 3;


	$defaults['excerpt_length']				= 20;
	$defaults['layout_options_blog']			= 'no-sidebar';
	$defaults['layout_options_archive']			= 'right-sidebar';
	$defaults['layout_options_page']			= 'right-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'blogbee' );
	// Pass through filter.
	$defaults = apply_filters( 'blogbee_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'blogbee_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function blogbee_get_option( $key ) {

		$default_options = blogbee_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;