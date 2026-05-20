<?php get_header(); ?>

<main>
    <section class="platforms-single h-screen section-padding pt-0">
        <?php eride_breadcrumbs(); ?>

        <div class="container">
            <div class="platforms-single__inner">
                <div class="platforms-single__body">
                    <h1 class="h2-text">
                        <?= esc_html(get_the_title()); ?>
                    </h1>
    
                    <?php if ( get_the_content() ): ?>
                    <div class="platforms-single__dscr dscr-section dscr-section-text-opacity dscr-section-min">
                        <?php the_content(); ?>
                    </div>
                    <?php endif; ?>

                    <?php if ( $link = get_field('visit_website_link') ): ?>
                    <div class="hero__btns">
                        <a href="<?= esc_url($link['url']); ?>" class="hero__btn btn">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6817 6.81664L13.3086 10.9361C12.3404 13.8406 11.8563 15.2929 11.1464 15.7055C10.4711 16.0982 9.63705 16.0982 8.96177 15.7055C8.25185 15.2929 7.76777 13.8406 6.79961 10.9361C6.64417 10.4698 6.56641 10.2366 6.43593 10.0417C6.3095 9.8528 6.14724 9.69048 5.95835 9.56408C5.76345 9.4336 5.53026 9.35584 5.0639 9.2004C2.15939 8.23224 0.707139 7.74816 0.29445 7.03824C-0.0981501 6.36295 -0.0981501 5.52889 0.29445 4.85358C0.707139 4.14371 2.15939 3.65962 5.0639 2.69145L9.18337 1.3183C12.7821 0.118734 14.5815 -0.48105 15.5312 0.468758C16.4811 1.41857 15.8813 3.21793 14.6817 6.81664Z" fill="white"/>
                            </svg>

                            <?= $link['title'] ? esc_html($link['title']) : 'Visit Website' ?>
                        </a>

                        <a href="https://emigration-assist.com/assessment" target="_blank" class="hero__btn btn">
                            Check your Eligibility
                        </a>
                    </div>
                    <?php endif; ?>
                   
                </div>

                <?php the_post_thumbnail('full', ['alt' => get_the_title(), 'class' => 'platforms-single__img']); ?>
            </div>
        </div>
    </section>

    <?php if ( have_rows('flexible_content') ) : ?>
        <?php while ( have_rows('flexible_content') ) : the_row(); ?>

            <?php if ( get_row_layout() === 'section' ) : ?>
                <?php 
                    $is_gray_bg = get_sub_field('gray_section_section-single-common');
                    $media_data = get_sub_field('media_section-single-common');
                ?>

                <section class="section-single-common <?= $is_gray_bg ? 'gray-bg' : '' ?> content-media-bg-wrapper">
                    <div class="container">
                        <div class="section-single-common__inner <?= !empty(array_filter($media_data)) ? 'section-screen' : '' ?> section-padding">
                            <div class="section-single-common__body body-content-wrapper <?= empty(array_filter($media_data)) ? 'body-content-wrapper-full' : '' ?>">
                                <?php if ( $title = get_sub_field('title_section-single-common') ): ?>
                                <h2 class="h2-text mb-spacing-70">
                                    <?= wp_kses($title, ['br' => []]); ?>
                                </h2>
                                <?php endif; ?>

                                <?php if ( $dscr = get_sub_field('description_section-single-common') ): ?>
                                <div class="dscr-section <?= !$is_gray_bg ? 'dscr-section-text-opacity' : '' ?> dscr-section-min dscr-section-gap-big">
                                    <?= wp_kses_post($dscr); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if ( is_array($media_data) && array_filter($media_data) ): ?>
                        <?php get_template_part('modules/content-media', null, $media_data); ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>

    <?php
        $post_name = get_post_field('post_name', get_the_ID());

        $matching_term = get_term_by('slug', $post_name, 'platform_cat');

        $services_query = false;

        if ($matching_term && $matching_term->parent > 0) {
            $services_query = new WP_Query([
                'post_type'      => 'platforms',
                'posts_per_page' => -1,
                'post__not_in'   => [get_the_ID()],
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
                'tax_query'      => [
                    [
                        'taxonomy'         => 'platform_cat',
                        'field'            => 'term_id',
                        'terms'            => $matching_term->term_id,
                        'include_children' => false,
                    ]
                ],
            ]);
        }
    ?>

    <?php if ( $services_query && $services_query->have_posts() ): ?>
        <section class="platforms-service-single section-padding">
            <div class="container">
                <div class="platforms-service-single__inner">
                    <h2 class="h2-text mb-spacing-70">
                        Choose a Service
                    </h2>

                    <div class="platforms-service-single__items">
                        <?php while ($services_query->have_posts()) : $services_query->the_post(); ?>
                            <?php
                                $service_title   = get_the_title();
                                $service_link    = get_permalink();
                                $service_excerpt = get_the_excerpt();
                            ?>

                            <div class="platforms-service-single__item">
                                <h3 class="platforms-service-single__item-title">
                                    <?php if ($service_link) : ?>
                                        <a href="<?= esc_url($service_link); ?>" class="platforms-service-single__item-link">
                                    <?php endif; ?>
                                        <?= wp_kses($service_title, ['br' => []]); ?>
                                    <?php if ($service_link) : ?>
                                        </a>
                                    <?php endif; ?>
                                </h3>

                                <?php if ($service_excerpt) : ?>
                                    <div class="platforms-service-single__item-dscr">
                                        <?= wp_kses($service_excerpt, ['br' => []]); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($service_link) : ?>
                                    <button type="button" class="platforms-service-single__item-open">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="60" height="60" rx="30" fill="white" fill-opacity="0.05" />
                                            <path d="M22.6464 36.6464C22.4512 36.8417 22.4512 37.1583 22.6464 37.3536C22.8417 37.5488 23.1583 37.5488 23.3536 37.3536L22.6464 36.6464ZM37.5 23V22.5H37H30.5V23.5H36.2929L22.6464 37.1464L23.3536 37.8536L37 24.2071V30H38V23.5V23H37.5ZM23.3536 37.3536L37.3536 23.3536L36.6464 22.6464L22.6464 36.6464L23.3536 37.3536Z" fill="white" />
                                        </svg>
                                    </button>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php 
        wp_reset_postdata(); 
    endif; ?>
</main>

<?php get_footer(); ?>