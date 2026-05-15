<?php
defined('ABSPATH') || exit;

function eride_breadcrumbs() {
    if (is_front_page()) return;

    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<div class="container">';
    echo '<ul class="breadcrumbs__list">';

    echo '<li class="breadcrumbs__item">';
    echo '<a href="' . home_url('/') . '" class="breadcrumbs__home">';
    echo '<svg width="25" height="9" viewBox="0 0 25 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.175345 3.99412C-0.0589693 4.22843 -0.0589693 4.60833 0.175345 4.84264L3.99372 8.66102C4.22804 8.89534 4.60794 8.89534 4.84225 8.66102C5.07656 8.42671 5.07656 8.04681 4.84225 7.81249L1.44814 4.41838L4.84225 1.02427C5.07656 0.789953 5.07656 0.410055 4.84225 0.17574C4.60794 -0.0585747 4.22804 -0.0585747 3.99372 0.17574L0.175345 3.99412ZM24.5996 4.41838V3.81838H0.599609V4.41838V5.01838H24.5996V4.41838Z" fill="white"/>
          </svg>';
    echo '<span>Home</span>';
    echo '</a>';
    echo '</li>';

    $items = [];

    if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
        $items[] = '<span class="breadcrumbs__current">' . post_type_archive_title('', false) . '</span>';
    } 
    elseif (is_tax() || is_category() || is_tag()) {
        $queried_object = get_queried_object();
        $taxonomy = $queried_object->taxonomy;

        $tax_obj = get_taxonomy($taxonomy);
        if (!empty($tax_obj->object_type)) {
            $cpt_name = is_array($tax_obj->object_type) ? $tax_obj->object_type[0] : $tax_obj->object_type;
            $post_type_obj = get_post_type_object($cpt_name);
            
            if ($post_type_obj && $post_type_obj->has_archive && $cpt_name !== 'post') {
                $archive_title = $post_type_obj->labels->name ?: $post_type_obj->labels->menu_name;
                $items[] = '<a href="' . get_post_type_archive_link($cpt_name) . '" class="breadcrumbs__link">' . $archive_title . '</a>';
            }
        }

        if (is_taxonomy_hierarchical($taxonomy)) {
            $parents = get_term_parents_list($queried_object->term_id, $taxonomy, ['link' => true, 'separator' => '###', 'inclusive' => false]);
            if ($parents) {
                $parents_array = explode('###', rtrim($parents, '###'));
                foreach ($parents_array as $parent) {
                    if ( preg_match('/href="([^"]+)"/', $parent, $matches) ) {
                        $term_url = $matches[1];
                        if ( $url_path = parse_url($term_url, PHP_URL_PATH) ) {
                            $path_slugs = array_filter(explode('/', $url_path));
                            $last_slug = end($path_slugs);
                            $term_obj = get_term_by('slug', $last_slug, $taxonomy);
                            if ( $term_obj ) {
                                $full_path = get_term_parents_list($term_obj->term_id, $taxonomy, ['link' => false, 'separator' => '/', 'inclusive' => true, 'format' => 'slug']);
                                $full_path = trim($full_path, '/');
                                $correct_url = home_url( '/our-platforms/' . $full_path . '/' );
                                $parent = preg_replace('/href="[^"]+"/', 'href="' . $correct_url . '"', $parent);
                            }
                        }
                    }
                    $items[] = str_replace('<a', '<a class="breadcrumbs__link"', $parent);
                }
            }
        }
        $items[] = '<span class="breadcrumbs__current">' . single_term_title('', false) . '</span>';
    }
    elseif (is_page()) {
        global $post;
        if ($post->post_parent) {
            $parent_id = $post->post_parent;
            $parent_items = [];
            while ($parent_id) {
                $page = get_post($parent_id);
                $parent_items[] = '<a href="' . get_permalink($page->ID) . '" class="breadcrumbs__link">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $items = array_merge($items, array_reverse($parent_items));
        }
        $items[] = '<span class="breadcrumbs__current">' . get_the_title() . '</span>';
    }
    elseif (is_single()) {
        $post_type = get_post_type();
        $post_name = get_post_field('post_name', get_the_ID());

        if ($post_type !== 'post') {
            $post_type_obj = get_post_type_object($post_type);
            $archive_title = $post_type_obj->labels->name ?: $post_type_obj->labels->menu_name;
            $items[] = '<a href="' . get_post_type_archive_link($post_type) . '" class="breadcrumbs__link">' . $archive_title . '</a>';
        }

        $taxonomies = get_object_taxonomies($post_type, 'objects');
        $hierarchical_tax = '';
        foreach ($taxonomies as $tax) { if ($tax->hierarchical) { $hierarchical_tax = $tax->name; break; } }

        if ($hierarchical_tax) {
            $terms = wp_get_object_terms(get_the_ID(), $hierarchical_tax);
            if ($terms && !is_wp_error($terms)) {
                $main_term = $terms[0];
                foreach ($terms as $term) { if ($term->parent > 0) { $main_term = $term; break; } }

                $inclusive = ($post_name === $main_term->slug) ? false : true;

                $parents = get_term_parents_list($main_term->term_id, $hierarchical_tax, ['link' => true, 'separator' => '###', 'inclusive' => $inclusive]);
                $parents_array = explode('###', rtrim($parents, '###'));
                
                foreach ($parents_array as $parent) {
                    if (empty($parent)) continue;

                    if (preg_match('/href="([^"]+)"/', $parent, $url_matches)) {
                        $wrong_url = $url_matches[1];
                        
                        $url_path = parse_url($wrong_url, PHP_URL_PATH);
                        $url_slugs = array_filter(explode('/', $url_path));
                        $current_term_slug = end($url_slugs);
                        $current_term = get_term_by('slug', $current_term_slug, $hierarchical_tax);

                        if ($current_term) {
                            $full_path = get_term_parents_list($current_term->term_id, $hierarchical_tax, [
                                'link'      => false,
                                'separator' => '/',
                                'inclusive' => true,
                                'format'    => 'slug'
                            ]);
                            $full_path = trim($full_path, '/');
                            
                            $correct_url = home_url('/our-platforms/' . $full_path . '/');
                            $parent = str_replace($wrong_url, $correct_url, $parent);
                        }
                    }

                    $items[] = str_replace('<a', '<a class="breadcrumbs__link"', $parent);
                }
            }
        }
        $items[] = '<span class="breadcrumbs__current">' . get_the_title() . '</span>';
    }
    elseif (is_search()) {
        $items[] = '<span class="breadcrumbs__current">Search results for: ' . get_search_query() . '</span>';
    }
    elseif (is_404()) {
        $items[] = '<span class="breadcrumbs__current">Error 404</span>';
    }

    foreach ($items as $item) {
        if (!empty($item)) {
            echo '<li class="breadcrumbs__item">' . $item . '</li>';
        }
    }

    echo '</ul>';
    echo '</div>';
    echo '</nav>';
}