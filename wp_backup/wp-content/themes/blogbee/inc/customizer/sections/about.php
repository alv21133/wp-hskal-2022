<?php
/**
 * About options.
 *
 * @package BlogBee
 */

$default = blogbee_get_default_theme_options();

// About Author Section
$wp_customize->add_section( 'section_home_about',
	array(
		'title'      => __( 'About', 'blogbee' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_about_section]',
	array(
		'default'           => $default['disable_about_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogbee_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogBee_Switch_Control( $wp_customize, 'theme_options[disable_about_section]',
    array(
		'label' 			=> __('Enable/Disable About Section', 'blogbee'),
		'section'    		=> 'section_home_about',
		 'settings'  		=> 'theme_options[disable_about_section]',
		'on_off_label' 		=> blogbee_switch_options(),
    )
) );


// Number of items
$wp_customize->add_setting('theme_options[number_of_about_items]', 
	array(
	'default' 			=> $default['number_of_about_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'blogbee_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_about_items]', 
	array(
	'label'       => __('Number of Items', 'blogbee'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 6.', 'blogbee'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[number_of_about_items]',		
	'type'        => 'number',
	'active_callback' => 'blogbee_about_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

$number_of_about_items = blogbee_get_option( 'number_of_about_items' );

for( $i=1; $i<=$number_of_about_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[about_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'blogbee_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[about_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'blogbee'), $i),
		'section'     => 'section_home_about',   
		'settings'    => 'theme_options[about_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'blogbee_about_active',
		)
	);
}