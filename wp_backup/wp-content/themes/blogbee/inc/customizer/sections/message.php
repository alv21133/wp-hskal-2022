<?php
/**
 * Author options.
 *
 * @package BlogBee
 */

$default = blogbee_get_default_theme_options();

// Author Section
$wp_customize->add_section( 'section_home_message',
	array(
		'title'      => __( 'Author Introduction Section', 'blogbee' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_message_section]',
	array(
		'default'           => $default['disable_message_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogbee_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogBee_Switch_Control( $wp_customize, 'theme_options[disable_message_section]',
    array(
		'label' 			=> __('Enable/Disable Author Section', 'blogbee'),
		'section'    		=> 'section_home_message',
		'settings'  		=> 'theme_options[disable_message_section]',
		'on_off_label' 		=> blogbee_switch_options(),
    )
) );


// Additional Information First Page
	$wp_customize->add_setting('theme_options[message_page]', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'blogbee_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[message_page]', 
		array(
		'label'       => __('Select Page', 'blogbee'),
		'section'     => 'section_home_message',   
		'settings'    => 'theme_options[message_page]',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'blogbee_message_active',
		)
	);

