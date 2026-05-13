<?php
/*
Template Name: Contacts page
*/
get_header();
?>

<main>
    <section class="contacts section-padding pt-0">
        <?php eride_breadcrumbs(); ?>

        <div class="container">
            <div class="contacts__inner">
                <div class="contacts__body">
                    <h1 class="h2-text">
                        <?= esc_html(get_the_title()); ?>
                    </h1>
    
                    <div class="dscr-section">
                        <?= wp_kses_post(get_the_content()); ?>
                    </div>
    
                    <?php if ( $phone = get_field('phone', 'options') ): ?>
                    <div class="contacts__info-item contacts__call">
                        <span class="contacts__info-item-label">
                            Phone:
                        </span>
    
                        <?php $cleanPhone = preg_replace('/[^0-9]/', '', $phone); ?>
                        <a href="tel:<?= esc_attr($cleanPhone); ?>">
                        <?= esc_html($phone); ?>
                        </a>
                    </div>
                    <?php endif; ?>
    
                    <?php if ( $email = get_field('email', 'options') ): ?>
                    <div class="contacts__info-item">
                        <span class="contacts__info-item-label">
                            Email::
                        </span>
    
                        <a href="mailto:<?= esc_attr($email); ?>">
                        <?= esc_html($email); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="contacts__map">
                    
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>