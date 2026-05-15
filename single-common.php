<?php get_header(); ?>

<?php get_template_part('modules/single-common-body'); ?>

<?php
    $terms = get_the_terms( get_the_ID(), 'platform_cat' );
    $has_subcategory = false;

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
            if ( $term->parent != 0 ) {
                $has_subcategory = true;
                break;
            }
        }
    }
?>

<?php if ( is_singular( 'platforms' ) && $has_subcategory ): ?>
    <section class="partnership contacts-form section-padding">
        <div class="container">
            <div class="partnership__inner section-padding pt-0">
                <div class="partnership__body">
                    <h2 class="h2-text">
                        Talk to Us
                    </h2>

                    <div class="dscr-section dscr-section-text-opacity dscr-section-min">
                        <p><strong>Eride Technologies</strong></p>

                        <p>Eride Technologies is an African digital company focused on helping people move across borders with less stress.</p>
                        <p>We build tools that make immigration easier to understand and easier to complete.</p>
                        <p>Our work is shaped by real challenges people face every day when travelling or applying for permits.</p>

                        <?php if ( 0 ): ?>
                        <p>
                            Eride Technologies is an African digital company focused on helping people move across borders with less stress.
                            We build tools that make immigration easier to understand and easier to complete.
                            Our work is shaped by real challenges people face every day when travelling or applying for permits.
                        </p>

                        <p>
                            <strong>Our Location</strong><br>
                            <?php if ( $address = get_field('address', 'options') ): ?>
                            <span><?= esc_html($address); ?></span>
                            <?php endif; ?>
                        </p>

                        <div>
                            <?php if ( $phone = get_field('phone', 'options') ): ?>
                            <p>
                                <strong>Phone:</strong>
    
                                <?php $cleanPhone = preg_replace('/[^0-9]/', '', $phone); ?>
                                <a href="tel:<?= esc_attr($cleanPhone); ?>">
                                    <?= esc_html($phone); ?>
                                </a>
                            </p>
                            <?php endif; ?>
    
                            <?php if ( $email = get_field('email', 'options') ): ?>
                            <p>
                                <strong>Email:</strong>
    
                                <a href="mailto:<?= esc_attr($email); ?>">
                                    <?= esc_html($email); ?>
                                </a>
                            </p>
                            <?php endif; ?>
    
                            <p>
                                <strong>Web</strong>
    
                                <a href="<?= esc_url(home_url()); ?>">
                                    <?= esc_html(home_url()); ?>
                                </a>
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="partnership__form">
                    <?php get_template_part('modules/form-contacts'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>