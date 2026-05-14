<?php get_header(); ?>

<main>
    <section class="hero-single-common content-media-bg-wrapper h-screen section-padding pt-0">
        <?php eride_breadcrumbs(); ?>

        <div class="container">
            <div class="hero-single-common__inner">
                <div class="hero-single-common__body body-content-wrapper">
                    <?php if ( $title = get_field('title_hero-single-common') ?: get_the_title() ): ?>
                    <h1 class="h2-text mb-spacing-70">
                        <?= wp_kses($title, ['br' => []]); ?>
                    </h1>
                    <?php endif; ?>
    
                    <?php if ( $dscr = get_field('description_hero-single-common') ): ?>
                    <div class="dscr-section dscr-section-min">
                        <?= wp_kses_post($dscr); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ( $media_data = get_field('media_hero-single-common') ): ?>
            <?php get_template_part('modules/content-media', null, $media_data); ?>
            <?php endif; ?>
        </div>
    </section>

    <?php if ( have_rows('flexible_content') ) : ?>
        <?php while ( have_rows('flexible_content') ) : the_row(); ?>

            <?php if ( get_row_layout() === 'section' ) : ?>
                <section class="section-single-common <?= get_sub_field('gray_section_section-single-common') ? 'gray-bg' : '' ?> content-media-bg-wrapper">
                    <div class="container">
                        <div class="section-single-common__inner section-screen section-padding">
                            <div class="section-single-common__body body-content-wrapper">
                                <?php if ( $title = get_sub_field('title_section-single-common') ): ?>
                                <h2 class="h2-text mb-spacing-70">
                                    <?= wp_kses($title, ['br' => []]); ?>
                                </h2>
                                <?php endif; ?>

                                <?php if ( $dscr = get_sub_field('description_section-single-common') ): ?>
                                <div class="dscr-section">
                                    <?= wp_kses_post($dscr); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if ( $media_data = get_sub_field('media_section-single-common') ): ?>
                        <?php get_template_part('modules/content-media', null, $media_data); ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>