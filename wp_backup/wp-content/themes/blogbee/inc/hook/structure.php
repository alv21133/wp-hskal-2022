<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package BlogBee
 */

if ( ! function_exists( 'blogbee_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function blogbee_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'blogbee_action_doctype', 'blogbee_doctype', 10 );


if ( ! function_exists( 'blogbee_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function blogbee_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
}
endif;
add_action( 'blogbee_action_head', 'blogbee_head', 10 );

if ( ! function_exists( 'blogbee_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function blogbee_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogbee' ); ?></a><?php
	}
endif;

add_action( 'blogbee_action_before', 'blogbee_page_start', 10 );

if ( ! function_exists( 'blogbee_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function blogbee_header_start() {

        ?>
		<header id="masthead" class="site-header nav-shrink" role="banner"><?php
	}
endif;
add_action( 'blogbee_action_before_header', 'blogbee_header_start' );

if ( ! function_exists( 'blogbee_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function blogbee_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'blogbee_action_header', 'blogbee_header_end', 15 );

if ( ! function_exists( 'blogbee_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function blogbee_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'blogbee_action_before_content', 'blogbee_content_start', 10 );

if ( ! function_exists( 'blogbee_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function blogbee_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo"><?php
		if ( true === blogbee_get_option('scroll_top_visible') ) : ?>
			<div class="backtotop"><i class="fa fa-chevron-up"></i></div>
		<?php endif;
	} 
endif;
add_action( 'blogbee_action_before_footer', 'blogbee_footer_start' );


if ( ! function_exists( 'blogbee_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function blogbee_footer_end() {?>
		</footer><?php
	}
endif;
add_action( 'blogbee_action_after_footer', 'blogbee_footer_end', 100 );

