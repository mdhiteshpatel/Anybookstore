<?php
	function bookstore_files() {
		wp_enqueue_style('bookstore_main_styles', get_theme_file_uri('css/main.css'));
		wp_enqueue_style('bookstore_slide_styles', get_theme_file_uri('css/jquery.bxslider.css'));
		wp_enqueue_style('bookstore_all_styles', get_theme_file_uri('css/all.min.css'));
		wp_enqueue_style('bookstore_ui_styles', get_theme_file_uri('css/jquery-ui.min.css'));
		wp_enqueue_style('bookstore_font_style', get_theme_file_uri('css/all.min.css'));
		wp_enqueue_script('bookslider_js', get_theme_file_uri('js/bookslider.js'), array('jquery'), '1.0', true);
		wp_enqueue_script('j_min', get_theme_file_uri('js/jquery-ui.min.js'), array('jquery'), '1.0', true);
		wp_enqueue_script('bix_min', get_theme_file_uri('js/jquery.bxslider.js'), array('jquery'), '1.0', true);
		wp_enqueue_script('range_js', get_theme_file_uri('js/range.js'), array('jquery'), '1.0', true);
		wp_enqueue_script('collapse_js', get_theme_file_uri('js/collapse.js'), array('jquery'), '1.0', true);
		wp_enqueue_script('testimonial_js', get_theme_file_uri('js/testimonialslider.js'), array('jquery'), '1.0', true);
		wp_enqueue_script('email_js', get_theme_file_uri('js/emailvalidation.js'), array('jquery'), '1.0', true);
	} 
	add_action('wp_enqueue_scripts', 'bookstore_files');

	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo', [
		'header-text' => ['site-title', 'site-description'],
		'height' => 100,
		'width' => 400,
		'flex-height' => true,
		'flex-width' => true,
		
	]);

	add_action('customize_register', 'cd_footer_settings');
    function cd_footer_settings($wp_customize) {
        $wp_customize->add_section('cd_footer', array(
            'title' => 'Footer',
            'priority' => 20
        ));
        $wp_customize->add_setting('footer_text');
        $wp_customize->add_control('footer_text', array(
            'label' => 'Footer',
            'section' => 'cd_footer',
            'type' => 'textarea'
        ));}
?>
