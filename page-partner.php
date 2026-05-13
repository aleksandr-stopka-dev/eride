<?php
/*
Template Name: Partner Page
*/
get_header();
?>

<main>
    <section class="partner content-media-bg-wrapper h-screen section-padding pt-0">
        <?php eride_breadcrumbs(); ?>
        
        <div class="container">
            <div class="partner__inner">
                <div class="partner__body body-content-wrapper">
                    <?php if ( $title = get_field('title_partner') ): ?>
                    <h1 class="about__title h2-text mb-spacing-70">
                        <?= wp_kses($title, ['br' => []]); ?>
                    </h1>
                    <?php endif; ?>
    
                    <?php if ( $dscr = get_field('description_partner') ): ?>
                    <div class="dscr-section">
                        <?= wp_kses_post($dscr); ?>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if ( have_rows('opportunities_partner') ) : ?>
                <div class="features-bottom section-padding pb-0">
                    <?php if ( $title = get_field('title_opportunities_partner') ): ?>
                    <h3 class="features-bottom__title">
                        <?= esc_html($title); ?>
                    </h3>
                    <?php endif; ?>
                    
                    <ul class="features-bottom__items">
                        <?php while ( have_rows('opportunities_partner') ) : the_row(); ?>
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

            <?php if ( $media_data = get_field('media_partner') ): ?>
            <?php get_template_part('modules/content-media', null, $media_data); ?>
            <?php endif; ?>
        </div>
    </section>

	<?php get_template_part('pages/front/partnership'); ?>
</main>

<?php get_footer(); ?>