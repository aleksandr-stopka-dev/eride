<?php
/*
Template Name: About page
*/
get_header();
?>

<main>
    <section class="about content-media-bg-wrapper h-screen section-padding pt-0">
        <?php eride_breadcrumbs(); ?>

        <div class="container">
            <div class="about__inner">
                <div class="about__body body-content-wrapper">
                    <?php if ( $title = get_field('title_about') ): ?>
                    <h1 class="about__title h2-text mb-spacing-70">
                        <?= wp_kses($title, ['br' => []]); ?>
                    </h1>
                    <?php endif; ?>
    
                    <?php if ( $dscr = get_field('description_about') ): ?>
                    <div class="dscr-section">
                        <?= wp_kses_post($dscr); ?>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if ( have_rows('strengths_about') ) : ?>
                <div class="features-bottom section-padding pb-0">
                    <?php if ( $title = get_field('title_strengths_about') ): ?>
                    <h3 class="features-bottom__title">
                        <?= esc_html($title); ?>
                    </h3>
                    <?php endif; ?>
                    
                    <ul class="features-bottom__items">
                        <?php while ( have_rows('strengths_about') ) : the_row(); ?>
                            <li class="features-bottom__item">
                                <?php if ( $icon = get_sub_field('icon') ): ?>
                                <?= get_wp_srcset_img($icon, 'features-bottom__item-icon', '32px'); ?>
                                <?php endif; ?>

                                <div class="features-bottom__item-body">
                                    <?php if ( $dscr = get_sub_field('text') ): ?>
                                    <?= wp_kses_post($dscr); ?>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

            <?php if ( $media_data = get_field('media_about') ): ?>
            <?php get_template_part('modules/content-media', null, $media_data); ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="philosophy content-media-bg-wrapper">
        <div class="container">
            <div class="philosophy__inner section-screen section-padding">
                <div class="section-screen__inner">
                    <div class="philosophy__body body-content-wrapper">
                        <?php if ( $title = get_field('title_philosophy') ): ?>
                        <h2 class="h2-text mb-spacing-70">
                            <?= wp_kses($title, ['br' => []]); ?>
                        </h2>
                        <?php endif; ?>
    
                        <?php if ( $dscr = get_field('description_philosophy') ): ?>
                        <div class="dscr-section">
                            <?= wp_kses_post($dscr); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ( have_rows('principles_philosophy') ) : ?>
                <div class="features-bottom black-color section-padding pb-0">
                    <?php if ( $title = get_field('title_principles_philosophy') ): ?>
                    <h3 class="features-bottom__title">
                        <?= esc_html($title); ?>
                    </h3>
                    <?php endif; ?>
                    
                    <ul class="features-bottom__items">
                        <?php while ( have_rows('principles_philosophy') ) : the_row(); ?>
                            <li class="features-bottom__item">
                                <?php if ( $icon = get_sub_field('icon') ): ?>
                                <?= get_wp_srcset_img($icon, 'features-bottom__item-icon', '32px'); ?>
                                <?php endif; ?>

                                <div class="features-bottom__item-body">
                                    <?php if ( $dscr = get_sub_field('text') ): ?>
                                    <?= wp_kses_post($dscr); ?>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

            <?php if ( $media_data = get_field('media_philosophy') ): ?>
            <?php get_template_part('modules/content-media', null, $media_data); ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="mission content-media-bg-wrapper">
        <div class="container">
            <div class="mission__inner section-screen section-padding">
                <div class="section-screen__inner">
                    <div class="mission__body body-content-wrapper">
                        <?php if ( $title = get_field('title_mission') ): ?>
                        <h2 class="h2-text mb-spacing-70">
                            <?= wp_kses($title, ['br' => []]); ?>
                        </h2>
                        <?php endif; ?>
    
                        <?php if ( $dscr = get_field('description_mission') ): ?>
                        <div class="dscr-section">
                            <?= wp_kses_post($dscr); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ( have_rows('focus_mission') ) : ?>
                <div class="features-bottom section-padding pb-0">
                    <?php if ( $title = get_field('title_focus_mission') ): ?>
                    <h3 class="features-bottom__title">
                        <?= esc_html($title); ?>
                    </h3>
                    <?php endif; ?>
                    
                    <ul class="features-bottom__items">
                        <?php while ( have_rows('focus_mission') ) : the_row(); ?>
                            <li class="features-bottom__item">
                                <?php if ( $icon = get_sub_field('icon') ): ?>
                                <?= get_wp_srcset_img($icon, 'features-bottom__item-icon', '32px'); ?>
                                <?php endif; ?>

                                <div class="features-bottom__item-body">
                                    <?php if ( $dscr = get_sub_field('text') ): ?>
                                    <?= wp_kses_post($dscr); ?>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

            <?php if ( $media_data = get_field('media_mission') ): ?>
            <?php get_template_part('modules/content-media', null, $media_data); ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="governance content-media-bg-wrapper">
        <div class="container">
            <div class="governance__inner section-screen section-padding">
                <div class="section-screen__inner">
                    <div class="governance__body body-content-wrapper">
                        <?php if ( $title = get_field('title_governance') ): ?>
                        <h2 class="h2-text mb-spacing-70">
                            <?= wp_kses($title, ['br' => []]); ?>
                        </h2>
                        <?php endif; ?>
    
                        <?php if ( $dscr = get_field('description_governance') ): ?>
                        <div class="dscr-section">
                            <?= wp_kses_post($dscr); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ( have_rows('principles_governance') ) : ?>
                <div class="features-bottom black-color section-padding pb-0">
                    <?php if ( $title = get_field('title_principles_governance') ): ?>
                    <h3 class="features-bottom__title">
                        <?= esc_html($title); ?>
                    </h3>
                    <?php endif; ?>
                    
                    <ul class="features-bottom__items">
                        <?php while ( have_rows('principles_governance') ) : the_row(); ?>
                            <li class="features-bottom__item">
                                <?php if ( $icon = get_sub_field('icon') ): ?>
                                <?= get_wp_srcset_img($icon, 'features-bottom__item-icon', '32px'); ?>
                                <?php endif; ?>

                                <div class="features-bottom__item-body">
                                    <?php if ( $dscr = get_sub_field('text') ): ?>
                                    <?= wp_kses_post($dscr); ?>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

            <?php if ( $media_data = get_field('media_governance') ): ?>
            <?php get_template_part('modules/content-media', null, $media_data); ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="compliance content-media-bg-wrapper">
        <div class="container">
            <div class="compliance__inner section-screen section-padding">
                <div class="section-screen__inner">
                    <div class="compliance__body body-content-wrapper">
                        <?php if ( $title = get_field('title_compliance') ): ?>
                        <h2 class="h2-text mb-spacing-70">
                            <?= wp_kses($title, ['br' => []]); ?>
                        </h2>
                        <?php endif; ?>
    
                        <?php if ( $dscr = get_field('description_compliance') ): ?>
                        <div class="dscr-section">
                            <?= wp_kses_post($dscr); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if ( $media_data = get_field('media_compliance') ): ?>
            <?php get_template_part('modules/content-media', null, $media_data); ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="infrastructure content-media-bg-wrapper">
        <div class="container">
            <div class="infrastructure__inner section-screen section-padding">
                <div class="section-screen__inner">
                    <div class="infrastructure__body body-content-wrapper">
                        <?php if ( $title = get_field('title_infrastructure') ): ?>
                        <h2 class="h2-text mb-spacing-70">
                            <?= wp_kses($title, ['br' => []]); ?>
                        </h2>
                        <?php endif; ?>
    
                        <?php if ( $dscr = get_field('description_infrastructure') ): ?>
                        <div class="dscr-section">
                            <?= wp_kses_post($dscr); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ( $media_data = get_field('media_infrastructure') ): ?>
                <?php get_template_part('modules/content-media', null, $media_data); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>