<?php

/*
 * Theme Customize Options
 * @package evior
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if (class_exists('CSF') ){
	$prefix = 'evior';

	CSF::createCustomizeOptions($prefix.'_customize_options');


	/*-------------------------------------
     ** Color Settings
     -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
		'id' => 'theme_settings', // Set a unique slug-like ID
        'title' => esc_html__('Evior Color Settings', 'evior') ,
        'priority' => 10,
        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Choose Theme Color', 'evior') . '</h3>',
            ) ,

            array(
                'id' => 'theme_main_color',
                'type' => 'color',
                'title' => esc_html__('Theme Main Color', 'evior') ,
                'default' => '#FF3524',
            ) ,

            array(
                'id' => 'theme_body_bg',
                'type' => 'color',
                'title' => esc_html__('Body Background Color', 'evior') ,
                'default' => '#fff',
				'output'      => 'body',
				'output_mode' => 'background-color'
				
            ) ,

            array(
                'id' => 'theme_body_text',
                'type' => 'color',
                'title' => esc_html__('Body Text Color', 'evior') ,
                'default' => '#555555',
				'output'      => 'body',
				'output_mode' => 'color'
            ) ,
			
			array(
                'id' => 'preloader_bg',
                'type' => 'color',
                'title' => esc_html__('Preloader Background Color', 'evior') ,
                'default' => '#FF3524',
				'output'      => '#preloader',
				'output_mode' => 'background',
				'output_important' => true,
            ) ,
			
			array(
                'id' => 'back_btn_bg',
                'type' => 'color',
                'title' => esc_html__('Back To Top Button Background Color', 'evior') ,
                'default' => '#FF3524',
				'output'      => '.backto',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,


            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer', 'evior') . '</h3>'
            ) ,

            array(
                'id' => 'footer_bg',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'evior') ,
                'default' => '#F5F5F5',
				'output'      => '.theme_footer_Widegts',
            ) ,

			

        )

    ));






}//endif