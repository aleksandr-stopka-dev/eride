<?php
defined('ABSPATH') || exit;

add_action('wp_footer', function () {
    wp_dequeue_style('core-block-supports');
});

add_action('init', function() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'wp_resource_hints', 2);
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_head', 'wp_enqueue_stored_styles', 1);
    
    add_filter('xmlrpc_enabled', '__return_false');
    add_filter('wp_img_auto_sizes_enabled', '__return_false');
});

add_action('init', function() {
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    add_filter('tiny_mce_plugins', function($plugins) {
        return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
    });
});

add_action('init', function() {
    wp_deregister_script('heartbeat');
}, 1);

add_action('admin_enqueue_scripts', function() {
    wp_dequeue_script('autosave');
});

add_filter('wp_revisions_to_keep', function($num, $post) {
    return 3; 
}, 10, 2);

add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('global-styles');

    wp_dequeue_style('wp-img-auto-sizes-contain');
    wp_dequeue_style('wp-img-auto-sizes-cover');

    wp_styles()->done[] = 'global-styles';
    wp_styles()->done[] = 'wp-img-auto-sizes-contain';
    wp_styles()->done[] = 'wp-img-auto-sizes-cover';

    wp_dequeue_style('contact-form-7');
}, 10000);

add_action('enqueue_block_assets', function() {
    wp_dequeue_style('global-styles');
}, 10000);

function remove_wp_ver_str($src) {
    if (strpos($src, 'ver=' . get_bloginfo('version'))) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('script_loader_src', 'remove_wp_ver_str', 15);
add_filter('style_loader_src', 'remove_wp_ver_str', 15);

add_filter('get_avatar', '__return_false');

add_action('pre_ping', function(&$links) {
    $home = get_option('home');
    foreach ($links as $l => $link) {
        if (0 === strpos($link, $home)) unset($links[$l]);
    }
});

if ( is_admin() ) {
    add_action( 'admin_bar_menu', function ( $wp_adminbar ) {
        $wp_adminbar->remove_node( 'updates' );
    }, 999 );

    add_action( 'admin_menu', function () {
        remove_submenu_page( 'index.php', 'update-core.php' );

        $GLOBALS['menu'][65][0] = __( 'Plugins' );
        
        $GLOBALS['menu'][60][0] = __( 'Appearance' );
    }, 999 );

    add_action( 'admin_head', function () {
        remove_action( 'admin_notices', 'update_nag', 3 );
        remove_action( 'network_admin_notices', 'update_nag', 3 );
        
        echo '<style>.update-plugins, .plugin-update-tr, .update-message, .notice-warning.inline { display: none !important; }</style>';
    });

    add_action( 'admin_init', function() {
        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            return;
        }

        remove_action( 'admin_init', '_maybe_update_core' );
        remove_action( 'admin_init', '_maybe_update_plugins' );
        remove_action( 'admin_init', '_maybe_update_themes' );
        remove_action( 'admin_init', 'wp_check_php_version' );
        remove_action( 'admin_init', 'wp_check_browser_version' );
    }, 1 );

    add_action('wp_dashboard_setup', function() {
        remove_meta_box('dashboard_primary', 'dashboard', 'side');
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
        remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
        remove_meta_box('dashboard_activity', 'dashboard', 'normal');
        remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    });

    add_filter('acf/settings/remove_wp_meta', '__return_true');

    remove_action('welcome_panel', 'wp_welcome_panel');

    add_filter('use_block_editor_for_post', '__return_false', 100);

    add_filter('use_block_editor_for_post_type', '__return_false', 100);

    add_filter('use_widgets_block_editor', '__return_false');

    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

    remove_action('in_admin_header', 'wp_global_styles_render_svg_filters');
}

add_filter('wpcf7_autop_or_not', '__return_false');

add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, array('jquery-migrate'));
    }
});