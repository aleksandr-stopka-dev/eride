<section class="platform section-padding">
    <div class="container">
        <div class="platform__inner">
            <div class="platform__body">
                <?php if ( $title = get_field('title_platform') ): ?>
                <h2 class="h2-text">
                    <?= wp_kses($title, ['br' => []]); ?>
                </h2>
                <?php endif; ?>

                <?php if ( $dscr = get_field('description_platform') ): ?>
                <div class="dscr-section dscr-section-min">
                    <?= wp_kses_post($dscr); ?>
                </div>
                <?php endif; ?>
            </div>

            <?php if ( have_rows('slides_platform') ) : ?>
            <div class="platform__slider">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php while ( have_rows('slides_platform') ) : the_row(); ?>

                        <div class="swiper-slide">
                            <div class="platform__slide">
                                <?php if ( $logo = get_sub_field('logo') ): ?>
                                <?= get_wp_srcset_img($logo, 'platform__slide-logo', '200px'); ?>
                                <?php endif; ?>

                                <div class="platform__slide-body">
                                    <?php if ( $title = get_sub_field('title') ): ?>
                                    <h3 class="platform__slide-title">
                                       <?php 
                                        $link = get_sub_field('link');
                                        if ( $link ): $target = $link['target'] ? ' target="' . esc_attr($link['target']) . '" rel="noopener"' : ''; ?>
                                        <a href="<?= esc_url($link['url']); ?>" <?= $target; ?> class="platform__slide-link-main">
                                        <?php endif; ?>
                                            <?= wp_kses($title, ['br' => []]); ?>
                                        <?php if ( $link ): ?>
                                        </a>
                                        <?php endif; ?>
                                    </h3>
                                    <?php endif; ?>
    
                                    <?php if ( $dscr = get_sub_field('description') ): ?>
                                    <div class="platform__slide-dscr">
                                        <?= wp_kses_post($dscr); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <button type="button" class="platform__slide-open">
                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="80" height="80" rx="40" fill="white" fill-opacity="0.1" />
                                        <path d="M32.2923 46.4346C31.9408 46.7861 31.9408 47.356 32.2923 47.7074C32.6438 48.0589 33.2136 48.0589 33.5651 47.7074L32.9287 47.071L32.2923 46.4346ZM47.9708 32.9289C47.9708 32.4319 47.5679 32.0289 47.0708 32.0289L38.9708 32.0289C38.4738 32.0289 38.0708 32.4319 38.0708 32.9289C38.0708 33.426 38.4738 33.8289 38.9708 33.8289L46.1708 33.8289L46.1708 41.0289C46.1708 41.526 46.5738 41.9289 47.0708 41.9289C47.5679 41.9289 47.9708 41.526 47.9708 41.0289L47.9708 32.9289ZM32.9287 47.071L33.5651 47.7074L47.7072 33.5653L47.0708 32.9289L46.4345 32.2925L32.2923 46.4346L32.9287 47.071Z" fill="white" />
                                    </svg>
                                </button>

                                <?php
                                    $media  = get_sub_field('media');
                                    $poster = $media['poster'] ?? '';
                                    $video  = $media['video']['url'] ?? '';
                                ?>

                                <?php if ( $video ) : ?>
                                <video autoplay loop muted playsinline poster="<?= esc_url($poster['url'] ?? ''); ?>" preload="metadata" class="platform__slide-media">
                                    <source src="<?= esc_url($video); ?>">
                                </video>
                                <?php elseif ( $poster['url'] ) : ?>
                                <?= get_wp_srcset_img($poster, 'platform__slide-media', '(max-width: 768px) 200px, 900px'); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php endwhile; ?>
                    </div>
                </div>

                <div class="platform__slider-nav">
                    <button type="button" class="swiper-button-next">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M37.9996 25.8579L51.4346 39.2929C51.8251 39.6834 51.8251 40.3166 51.4346 40.7071L37.9996 54.1421" stroke="black" stroke-width="2.6" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="swiper-pagination"></div>
            <?php endif; ?>
        </div>
    </div>
</section>