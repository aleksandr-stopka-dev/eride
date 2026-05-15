<section class="partnership section-padding">
    <div class="container">
        <div class="partnership__inner section-padding pt-0">
            <div class="partnership__body">
                <?php if ( $title = get_field('title_partnership', get_option('page_on_front')) ): ?>
                <h2 class="h2-text">
                    <?= wp_kses($title, ['br' => []]); ?>
                </h2>
                <?php endif; ?>

                <?php if ( $dscr = get_field('description_partnership', get_option('page_on_front')) ): ?>
                <div class="dscr-section dscr-section-text-opacity dscr-section-min">
                    <?= wp_kses_post($dscr); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="partnership__form">
                <?php get_template_part('modules/form-partnership'); ?>
            </div>
        </div>
    </div>
</section>