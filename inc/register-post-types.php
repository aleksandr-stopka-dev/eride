<?php
defined('ABSPATH') || exit;

add_action('init', function() {
    register_taxonomy('platform_cat', ['platforms'], [
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'labels' => ['name' => 'Platform Categories', 'singular_name' => 'Category'],
        'rewrite'           => ['slug' => 'our-platforms', 'with_front' => false], 
    ]);

    register_post_type('platforms', [
        'public'             => true,
        'show_in_nav_menus'  => true,
        'has_archive'        => 'our-platforms',
        'menu_icon'          => 'dashicons-networking',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'hierarchical'       => true,
        'taxonomies'         => ['platform_cat'],
        'show_in_rest'       => true,
        'labels'             => ['name' => 'Our Platforms', 'menu_name' => 'Platforms'],
        'rewrite'            => ['slug' => 'our-platforms/%platform_cat%', 'with_front' => false],
    ]);
});

add_filter('post_type_link', function($post_link, $post) {
    if ($post->post_type === 'platforms') {
        $terms = wp_get_object_terms($post->ID, 'platform_cat');

        if (!empty($terms) && !is_wp_error($terms)) {
            $main_term = $terms[0];
            foreach ($terms as $term) {
                if ($term->parent > 0) {
                    $main_term = $term;
                    break;
                }
            }

            $category_path = get_term_parents_list($main_term->term_id, 'platform_cat', [
                'separator' => '/',
                'link'      => false,
                'format'    => 'slug',
            ]);
            $category_path = trim($category_path, '/');

            $path_parts = explode('/', $category_path);
            $last_cat_slug = end($path_parts);

            if ($post->post_name === $last_cat_slug) {
                $parent_path = str_replace($last_cat_slug, '', $category_path);
                $parent_path = trim($parent_path, '/');
                
                if (!empty($parent_path)) {
                    return str_replace('%platform_cat%', $parent_path, $post_link);
                } else {
                    return str_replace('/%platform_cat%', '', $post_link);
                }
            }

            return str_replace('%platform_cat%', $category_path, $post_link);
        } else {
            return str_replace('/%platform_cat%', '', $post_link);
        }
    }
    return $post_link;
}, 10, 2);