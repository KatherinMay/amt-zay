<?php

function auto_motors_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'automobile_hub_color_option' );
    $wp_customize->remove_section( 'automobile_hub_documentation' );
    $wp_customize->remove_setting( 'automobile_hub_mail_text' );
    $wp_customize->remove_control( 'automobile_hub_mail_text' );
    $wp_customize->remove_setting( 'automobile_hub_call_text' );
    $wp_customize->remove_control( 'automobile_hub_call_text' );
}
add_action( 'customize_register', 'auto_motors_remove_customize_register', 11 );

function auto_motors_customize_register( $wp_customize ) {

	$wp_customize->add_setting('automobile_hub_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'		
	));	
	$wp_customize->add_control('automobile_hub_location',array(
		'label'	=> __('Add Location','auto-motors'),
		'section'	=> 'automobile_hub_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_section( 'auto_motors_featured_car_section' , array(
    	'title'      => __( 'Featured Car Settings', 'auto-motors' ),
		'panel' => 'automobile_hub_panel_id'
	) );

	$wp_customize->add_setting('auto_motors_featured_car_section_tittle',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('auto_motors_featured_car_section_tittle',array(
		'label'	=> __('Section Title','auto-motors'),
		'section'	=> 'auto_motors_featured_car_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$offer_cat[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$offer_cat[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('auto_motors_featured_car_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'automobile_hub_sanitize_choices',
	));
	$wp_customize->add_control('auto_motors_featured_car_section_category',array(
		'type'    => 'select',
		'choices' => $offer_cat,
		'label' => __('Select Category','auto-motors'),
		'section' => 'auto_motors_featured_car_section',
	));

}
add_action( 'customize_register', 'auto_motors_customize_register' );