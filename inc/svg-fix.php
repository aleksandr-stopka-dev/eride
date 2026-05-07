<?php
defined('ABSPATH') || exit;

add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

add_filter('wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

add_filter('wp_handle_upload_prefilter', function($file) {
    if ($file['type'] === 'image/svg+xml' && empty($file['error'])) {
        $svg_content = file_get_contents($file['tmp_name']);
        
        $forbidden = [
            '/<script/i',
            '/on[a-z]+\s*=/i',
            '/<\?php/i',
            '/<!ENTITY/i',
            '/<iframe/i',
            '/<object/i'
        ];

        foreach ($forbidden as $pattern) {
            if (preg_match($pattern, $svg_content)) {
                $file['error'] = 'Security: The SVG file contains suspicious code and has been rejected.';
                break;
            }
        }
    }
    return $file;
});

add_filter('manage_media_columns', function($columns) {
    $columns['svg_preview'] = 'SVG Preview';
    return $columns;
});

add_action('manage_media_custom_column', function($column_name, $id) {
    if ($column_name === 'svg_preview') {
        $url = wp_get_attachment_url($id);
        if ($url && strpos($url, '.svg') !== false) {
            echo '<img src="' . esc_url($url) . '" style="width:40px; height:40px; background:#f0f0f0; border:1px solid #ddd; object-fit:contain; padding:2px;">';
        }
    }
}, 10, 2);

add_action('admin_head', function() {
    echo '<style>
        .attachment-266x266, .thumbnail img[src$=".svg"], .media-icon img[src$=".svg"] { 
            width: 100% !important; 
            height: auto !important; 
        }
        .column-svg_preview img { max-width: 100%; }
    </style>';
});