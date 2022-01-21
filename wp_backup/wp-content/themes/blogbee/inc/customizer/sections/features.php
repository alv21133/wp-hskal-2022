<?php
/**
 * Features options.
 *
 * @package BlogBee
 */

$default = blogbee_get_default_theme_options();

// Features Section
$wp_customize->add_section( 'section_home_popular',
	array(
		'title'      => __( 'Popular Posts ', 'blogbee' ),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_popular_section]',
	array(
		'default'           => $default['disable_popular_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogbee_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogBee_Switch_Control( $wp_customize, 'theme_options[disable_popular_section]',
    array(
		'label' 			=> __('Enable/Disable Features Section', 'blogbee'),
		'section'    		=> 'section_home_popular',
		 'settings'  		=> 'theme_options[disable_popular_section]',
		'on_off_label' 		=> blogbee_switch_options(),
    )
) );

//Features Section title
$wp_customize->add_setting('theme_options[popular_title]', 
	array(
	'default'           => $default['popular_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[popular_title]', 
	array(
	'label'       => __('Section Title', 'blogbee'),
	'section'     => 'section_home_popular',   
	'settings'    => 'theme_options[popular_title]',
	'active_callback' => 'blogbee_popular_active',		
	'type'        => 'text'
	)
);

// Setting  Blog Category.
$wp_customize->add_setting( 'theme_options[popular_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new blogbee_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[popular_category]',
		array(
		'label'    => __( 'Select Category', 'blogbee' ),
		'section'  => 'section_home_popular',
		'settings' => 'theme_options[popular_category]',	
		'active_callback' => 'blogbee_popular_active',		
		'priority' => 100,
		)
	)
);

