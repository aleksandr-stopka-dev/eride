<?php get_header(); ?>

<main>
    <section class="platforms-single section-padding pt-0">
        <?php eride_breadcrumbs(); ?>

        <div class="container">
            <div class="platforms-single__inner">
                <div class="platforms-single__body">
                    <h1 class="h2-text">
                        <?= esc_html(get_the_title()); ?>
                    </h1>
    
                    <?php if ( get_the_content() ): ?>
                    <div class="platforms-single__dscr dscr-section dscr-section-min">
                        <?= the_content(); ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ( $link = get_field('visit_website_link') ): ?>
                    <a href="<?= esc_url($link['url']); ?>" class="platforms-single__link btn">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6817 6.81664L13.3086 10.9361C12.3404 13.8406 11.8563 15.2929 11.1464 15.7055C10.4711 16.0982 9.63705 16.0982 8.96177 15.7055C8.25185 15.2929 7.76777 13.8406 6.79961 10.9361C6.64417 10.4698 6.56641 10.2366 6.43593 10.0417C6.3095 9.8528 6.14724 9.69048 5.95835 9.56408C5.76345 9.4336 5.53026 9.35584 5.0639 9.2004C2.15939 8.23224 0.707139 7.74816 0.29445 7.03824C-0.0981501 6.36295 -0.0981501 5.52889 0.29445 4.85358C0.707139 4.14371 2.15939 3.65962 5.0639 2.69145L9.18337 1.3183C12.7821 0.118734 14.5815 -0.48105 15.5312 0.468758C16.4811 1.41857 15.8813 3.21793 14.6817 6.81664Z" fill="black"/>
                        </svg>
    
                        Visit Website
                    </a>
                    <?php endif; ?>
                </div>

                <?php the_post_thumbnail('full', ['alt' => get_the_title(), 'class' => 'platforms-single__img']); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>