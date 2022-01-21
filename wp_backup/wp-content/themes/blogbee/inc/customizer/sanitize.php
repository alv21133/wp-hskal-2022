<?php
/**
 * Sanitization functions.
 *
 * @package BlogBee
 */

if ( ! function_exists( 'blogbee_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *	
	 */
	function blogbee_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;

function blogbee_sanitize_switch_control( $input ) {
	$input = sanitize_text_field( $input );
	if ( 'false' === $input ) {
		return false;
	} else {
		return true;
	}
}

if ( ! function_exists( 'blogbee_dropdown_pages' ) ) :
	function blogbee_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	  
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
endif;

if ( ! function_exists( 'blogbee_dropdown_posts' ) ) :
	function blogbee_dropdown_posts( $post_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $post_id = absint( $post_id );
	  
	  // If $post_id is an ID of a published post, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $post_id ) ? $post_id : $setting->default );
	}
endif;

if( ! function_exists( 'blogbee_sanitize_single_category' ) ) :
	function blogbee_sanitize_single_category( $input ) {
		if ( $input != '' ) {
			$args = array(
							'type'			=> 'post',
							'child_of'      => 0,
							'parent'        => '',
							'orderby'       => 'name',
							'order'         => 'ASC',
							'hide_empty'    => 0,
							'hiertourablecal'  => 0,
							'taxonomy'      => 'category',
						);

			$categories = get_categories( $args );

			foreach ( $categories as $category )
				$category_ids[] 	= $category->term_id;

			if ( in_array( $input, $category_ids ) ) {
		    	return $input;
		    }
		    else {
	    		return '';
	   		}
	    }
	    else {
	    	return '';
	    }
	}
endif;


if ( ! function_exists( 'blogbee_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *	
	 */
	function blogbee_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'blogbee_sanitize_number_range' ) ) :

	/**
	 * Sanitize number range.
	 *	
	 */
	function blogbee_sanitize_number_range( $input, $setting ) {

		// Ensure input is an absolute integer.
		$input = absint( $input );

		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;

		// Get min.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $input );

		// Get max.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $input );

		// Get Step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

		// If the input is within the valid range, return it; otherwise, return the default.
		return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'blogbee_sanitize_textarea_content' ) ) :

	/**
	 * Sanitize textarea content.
	 *
	 * @since 1.0.0
	 *
	 */
	function blogbee_sanitize_textarea_content( $input, $setting ) {

		return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

	}
endif;

if ( ! function_exists( 'blogbee_sanitize_positive_integer' ) ) :

	/**
	 * Sanitize positive integer.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $input Number to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int Sanitized number; otherwise, the setting default.
	 */
	function blogbee_sanitize_positive_integer( $input, $setting ) {

		$input = absint( $input );

		// If the input is an positive integer, return it.
		// otherwise, return the default.
		return ( $input ? $input : $setting->default );
	}

endif;

/**
 * Image sanitization callback example.
 *
 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
 * send back the filename, otherwise, return the setting default.
 *
 * - Sanitization: image file extension
 * - Control: text, WP_Customize_Image_Control
 * 
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 *
 * @param string               $image   Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
function blogbee_sanitize_image( $image, $setting ) {
    /*
     * Array of valid image file types.
     *
     * The array includes image mime types that are included in wp_get_mime_types()
     */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
    // Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
    // If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}