<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogBee
 */
/**
* Hook - blogbee_action_doctype.
*
* @hooked blogbee_doctype -  10
*/
do_action( 'blogbee_action_doctype' );
?>
<head>
<?php
/**
* Hook - blogbee_action_head.
*
* @hooked blogbee_head -  10
*/
do_action( 'blogbee_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php

/**
* Hook - blogbee_action_before.
*
* @hooked blogbee_page_start - 10
*/
do_action( 'blogbee_action_before' );

/**
*
* @hooked blogbee_header_start - 10
*/
do_action( 'blogbee_action_before_header' );

/**
*
*@hooked blogbee_site_branding - 10
*@hooked blogbee_header_end - 15 
*/
do_action('blogbee_action_header');

/**
*
* @hooked blogbee_content_start - 10
*/
do_action( 'blogbee_action_before_content' );

/**
 * Banner start
 * 
 * @hooked blogbee_banner_header - 10
*/
do_action( 'blogbee_banner_header' );  
