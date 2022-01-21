<?php
/**
 * Slider options.
 *
 * @package BlogBee
 */

$default = blogbee_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Featured Slider Section', 'blogbee' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_featured_slider_section]',
	array(
		'default'           => $default['disable_featured_slider_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogbee_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogBee_Switch_Control( $wp_customize, 'theme_options[disable_featured_slider_section]',
    array(
		'label' 			=> __('Disable slider Section', 'blogbee'),
		'section'    		=> 'section_featured_slider',		
		'on_off_label' 		=> blogbee_switch_options(),
    )
) );

$wp_customize->add_setting( 'theme_options[disable_white_overlay]',
	array(
		'default'           => $default['disable_white_overlay'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogbee_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogBee_Switch_Control( $wp_customize, 'theme_options[disable_white_overlay]',
    array(
		'label' 	=> __('Disable White overlay and enable image overlay', 'blogbee'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> blogbee_switch_options(),
		'active_callback' => 'blogbee_slider_active',
    )
) );


// Setting  Slider Category.
$wp_customize->add_setting( 'theme_options[slider_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new blogbee_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[slider_category]',
		array(
		'label'    => __( 'Select Category', 'blogbee' ),
		'section'  => 'section_featured_slider',
		'settings' => 'theme_options[slider_category]',	
		'active_callback' => 'blogbee_slider_active',		
		)
	)
);

for( $i=1; $i<=3; $i++ ){
	// Cta Button Text
	$wp_customize->add_setting('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(
		'label'       => sprintf( __('Button Label %d', 'blogbee'),$i ),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custom_btn_text_' . $i . ']',	
		'active_callback' => 'blogbee_slider_active',	
		'type'        => 'text',
		)
	);

	// slider hr setting and control
	$wp_customize->add_setting( 'theme_options[slider_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new BlogBee_Customize_Horizontal_Line( $wp_customize, 'theme_options[slider_hr_'. $i .']',
		array(
			'section'         => 'section_featured_slider',
			'active_callback' => 'blogbee_slider_active',
			'type'			  => 'hr',
	) ) );
}

