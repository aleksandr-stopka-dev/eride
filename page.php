<?php get_header(); ?>

<main>
    <section class="page section-padding pt-0">
        <?php eride_breadcrumbs(); ?>

        <div class="container">
            <div class="page__inner">
                <h1 class="h2-text mb-spacing-70">
                    <?= esc_html(get_the_title()); ?>
                </h1>

                <?php if ( get_the_content() ): ?>
                <div class="dscr-section dscr-section-text-opacity dscr-section-gap-big">
                    <?php the_content(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>