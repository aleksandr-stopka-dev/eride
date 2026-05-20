<?php
defined('ABSPATH') || exit;

add_action( 'wp_enqueue_scripts', function() {
    $theme_uri  = get_template_directory_uri();
    $theme_path = get_template_directory();

    $style_file = '/assets/css/style.min.css';
    wp_register_style( 'main-style', $theme_uri . $style_file, [], filemtime( $theme_path . $style_file ), 'all' );

    $js_file = '/assets/js/swiper-bundle.min.js';
    wp_enqueue_script( 'swiper', $theme_uri . $js_file, [], filemtime( $theme_path . $js_file ), ['strategy'  => 'defer', 'in_footer' => true] );

    $js_file = '/assets/js/app.js';
    wp_enqueue_script( 'main-app', $theme_uri . $js_file, ['swiper'], filemtime( $theme_path . $js_file ), ['strategy'  => 'defer', 'in_footer' => true] );

    wp_localize_script('main-app', 'wp_data', [
		'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('eride_nonce'),
	]);
});