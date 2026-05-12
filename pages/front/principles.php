<section class="principles">
    <div class="container">
        <div class="principles__main">
            <div class="principles__inner section-padding">
                <div class="principles__body">
                    <?php if ( $title = get_field('title_principles') ): ?>
                    <h2 class="h2-text">
                        <?= wp_kses($title, ['br' => []]); ?>
                    </h2>
                    <?php endif; ?>
    
                    <?php if ( $dscr = get_field('description_principles') ): ?>
                    <div class="principles__dscr">
                        <?= wp_kses_post($dscr); ?>
                    </div>
                    <?php endif; ?>
    
                    <?php if ( $link = get_field('button_principles') ): ?>
                    <a href="<?= esc_url($link['url']); ?>" class="principles__more btn">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6817 6.81664L13.3086 10.9361C12.3404 13.8406 11.8563 15.2929 11.1464 15.7055C10.4711 16.0982 9.63705 16.0982 8.96177 15.7055C8.25185 15.2929 7.76777 13.8406 6.79961 10.9361C6.64417 10.4698 6.56641 10.2366 6.43593 10.0417C6.3095 9.8528 6.14724 9.69048 5.95835 9.56408C5.76345 9.4336 5.53026 9.35584 5.0639 9.2004C2.15939 8.23224 0.707139 7.74816 0.29445 7.03824C-0.0981501 6.36295 -0.0981501 5.52889 0.29445 4.85358C0.707139 4.14371 2.15939 3.65962 5.0639 2.69145L9.18337 1.3183C12.7821 0.118734 14.5815 -0.48105 15.5312 0.468758C16.4811 1.41857 15.8813 3.21793 14.6817 6.81664Z" fill="white"/>
                        </svg>
                        <?= esc_html($link['title']); ?>
                    </a>
                    <?php endif; ?>
                </div>
    
                <?php if ( have_rows('slides_principles') ) : ?>
                <div class="principles__slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php while ( have_rows('slides_principles') ) : the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="principles__slide">
                                        <?php if ( $img = get_sub_field('icon') ): ?>
                                        <?= get_wp_srcset_img($img, 'principles__slide-img', '250px'); ?>
                                        <?php endif; ?>
    
                                        <div class="principles__slide-body">
                                            <?php if ( $title = get_sub_field('title') ): ?>
                                            <h4 class="principles__slide-title">
                                                <?= esc_html($title); ?>
                                            </h4>
                                            <?php endif; ?>
        
                                            <?php if ( $dscr = get_sub_field('description') ): ?>
                                            <div class="principles__slide-dscr">
                                                <?= wp_kses($dscr, ['br' => []]); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
    
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ( ($link = get_field('button_principles')) && wp_is_mobile() ): ?>
                    <a href="<?= esc_url($link['url']); ?>" class="principles__more principles__more-mobile btn">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6817 6.81664L13.3086 10.9361C12.3404 13.8406 11.8563 15.2929 11.1464 15.7055C10.4711 16.0982 9.63705 16.0982 8.96177 15.7055C8.25185 15.2929 7.76777 13.8406 6.79961 10.9361C6.64417 10.4698 6.56641 10.2366 6.43593 10.0417C6.3095 9.8528 6.14724 9.69048 5.95835 9.56408C5.76345 9.4336 5.53026 9.35584 5.0639 9.2004C2.15939 8.23224 0.707139 7.74816 0.29445 7.03824C-0.0981501 6.36295 -0.0981501 5.52889 0.29445 4.85358C0.707139 4.14371 2.15939 3.65962 5.0639 2.69145L9.18337 1.3183C12.7821 0.118734 14.5815 -0.48105 15.5312 0.468758C16.4811 1.41857 15.8813 3.21793 14.6817 6.81664Z" fill="white"/>
                        </svg>
                        <?= esc_html($link['title']); ?>
                    </a>
                <?php endif; ?>
            </div>

            <video autoplay loop muted playsinline poster="<?= get_template_directory_uri(); ?>/assets/images/principles-poster.webp" preload="metadata" class="principles__video">
                <source src="<?= get_template_directory_uri(); ?>/assets/video/principles.webm" type="video/webm">
                <source src="<?= get_template_directory_uri(); ?>/assets/video/principles.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</section>