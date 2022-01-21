<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogBee
 */
/**
 *
 * @hooked blogbee_footer_start
 */
do_action( 'blogbee_action_before_footer' );

/**
 * Hooked - blogbee_footer_top_section -10
 * Hooked - blogbee_footer_section -20
 */
do_action( 'blogbee_action_footer' );

/**
 * Hooked - blogbee_footer_end. 
 */
do_action( 'blogbee_action_after_footer' );

wp_footer(); ?>

</body>  
</html>