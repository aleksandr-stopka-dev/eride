<?php
defined('ABSPATH') || exit;

add_image_size('size_350', 350, 9999, false);
add_image_size('size_500', 500, 9999, false);
add_image_size('size_650', 650, 9999, false);
add_image_size('size_900', 900, 9999, false);
add_image_size('size_1300', 1300, 9999, false);

add_filter('wp_editor_set_quality', function($quality) { return 65; });
add_filter('wp_image_editor_args', function($args) {
    $args['quality'] = 65;
    return $args;
}, 10, 1);
add_filter('webp_uploads_update_quality', function($quality) { return 65; });

function get_wp_srcset_img($img, $class = '', $size_attr = '800px', $is_lazy = true) {
    if (empty($img) || !is_array($img)) return '';

    $alt = esc_attr($img['alt']);
    $class_output = !empty($class) ? sprintf(' class="%s"', esc_attr($class)) : '';
    $loading_attr = $is_lazy ? 'loading="lazy"' : 'fetchpriority="high" loading="eager"';
    $is_svg = pathinfo($img['url'], PATHINFO_EXTENSION) === 'svg';

    preg_match('/(\d+)/', $size_attr, $matches);
    $target_width = isset($matches[1]) ? (int)$matches[1] : 800;

    if ($is_svg) {
        $w = ($img['width'] > 0) ? $img['width'] : $target_width;
        $h = ($img['height'] > 0) ? $img['height'] : null;

        $width_attr = $w ? " width=\"$w\"" : "";
        $height_attr = $h ? " height=\"$h\"" : "";

        return sprintf(
            '<img src="%s" alt="%s"%s %s decoding="async"%s%s>',
            esc_url($img['url']),
            $alt,
            $class_output,
            $loading_attr,
            $width_attr,
            $height_attr
        );
    }

    $display_width = $target_width;
    $display_height = ($img['width'] > 0) ? floor($target_width / ($img['width'] / $img['height'])) : $target_width;

    $srcset = [];
    if (isset($img['sizes']) && is_array($img['sizes'])) {
        foreach ($img['sizes'] as $key => $value) {
            if (!str_contains($key, '-width') && !str_contains($key, '-height') && is_string($value) && str_starts_with($value, 'http')) {
                $w_val = $img['sizes'][$key . '-width'] ?? null;
                if ($w_val) $srcset[$w_val] = $value . ' ' . $w_val . 'w';
            }
        }
    }
    if (!isset($srcset[$img['width']])) {
        $srcset[$img['width']] = $img['url'] . ' ' . $img['width'] . 'w';
    }
    ksort($srcset); 
    $srcset_str = implode(', ', $srcset);

    $src = $img['sizes']['medium_large'] ?? $img['url'];

    return sprintf(
        '<img src="%s" srcset="%s" sizes="%s" alt="%s"%s width="%s" height="%s" style="aspect-ratio: %s/%s; height: auto;" %s decoding="async">',
        esc_url($src),
        esc_attr($srcset_str),
        esc_attr($size_attr),
        $alt,
        $class_output,
        $display_width,
        $display_height,
        $img['width'],
        $img['height'],
        $loading_attr
    );
}

add_action('pre_get_posts', function($query) {
    if (!is_admin() && $query->is_main_query() && (is_post_type_archive('platforms') || is_tax('platform_cat'))) {
        
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');

        if (is_tax('platform_cat')) {
            $tax_query = $query->get('tax_query') ?: [];
            
            $tax_query[] = [
                'taxonomy'         => 'platform_cat',
                'field'            => 'term_id',
                'terms'            => get_queried_object_id(),
                'include_children' => false,
            ];

            $query->set('tax_query', $tax_query);
        }
    }
});