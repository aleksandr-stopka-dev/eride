<?php
defined('ABSPATH') || exit;

if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page([
        'page_title' => 'Site options',
        'menu_title' => 'Site options',
        'menu_slug'  => 'site-options',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}