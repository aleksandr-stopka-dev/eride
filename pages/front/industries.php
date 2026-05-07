<section class="industries section-padding">
    <div class="container">
        <div class="industries__inner">
            <div class="industries__body">
                <?php if ($title = get_field('title_industries') ): ?>
                <h2 class="h2-text">
                    <?= wp_kses($title, ['br' => []]); ?>
                </h2>
                <?php endif; ?>

                <?php if ( have_rows('items_industries') ) : ?>
                <ul class="industries__items">
                    <?php while ( have_rows('items_industries') ) : the_row(); ?>

                        <li class="industries__item">
                            <?php if ( $title = get_sub_field('title') ): ?>
                            <h5 class="industries__item-title">
                                <?= esc_html($title); ?>
                            </h5>
                            <?php endif; ?>

                            <?php if ( $caption = get_sub_field('caption') ): ?>
                            <div class="industries__item-caption">
                                <?= wp_kses($caption, ['br' => []]); ?>
                            </div>
                            <?php endif; ?>
                        </li>
                        
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>

            <video autoplay loop muted playsinline poster="<?= get_template_directory_uri(); ?>/assets/images/industries-poster.webp" preload="metadata" class="industries__video">
                <source src="<?= get_template_directory_uri(); ?>/assets/video/industries.webm" type="video/webm">
                <source src="<?= get_template_directory_uri(); ?>/assets/video/industries.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</section>