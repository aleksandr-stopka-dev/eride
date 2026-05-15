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
                    <?php if ( $title = get_field('title_contacts') ): ?>
                    <h1 class="h2-text">
                        <?= wp_kses($title, ['br' => []]); ?>
                    </h1>
                    <?php endif; ?>
    
                    <?php if ( $address = get_field('address_contacts') ): ?>
                    <div class="contacts__address">
                        <?= wp_kses($address, ['br' => []]); ?>
                    </div>
                    <?php endif; ?>
    
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.671083216458!2d28.04277424366172!3d-26.14226539546302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e950ced250cd561%3A0x74414ef2ebf5609!2zT3hmb3JkIENvcm5lciwgMzJBIEplbGxpY29lIEF2ZSwgUm9zZWJhbmssIEpvaGFubmVzYnVyZywgMjE5Niwg0K7QttC90LDRjyDQkNGE0YDQuNC60LA!5e0!3m2!1sen!2sen!4v1778746013904!5m2!1sen!2sen" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="partnership contacts-form section-padding">
        <div class="container">
            <div class="partnership__inner section-padding pt-0">
                <div class="partnership__body">
                    <?php if ( $title = get_field('title_contacts-form') ): ?>
                    <h2 class="h2-text">
                        <?= wp_kses($title, ['br' => []]); ?>
                    </h2>
                    <?php endif; ?>

                    <?php if ( $dscr = get_field('description_contacts-form') ): ?>
                    <div class="dscr-section dscr-section-text-opacity dscr-section-min">
                        <?= wp_kses_post($dscr); ?>
                    </div>
                    <?php endif; ?>

                    <a href="<?= esc_url(home_url('partner-with-us/')); ?>" class="btn">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6817 6.81664L13.3086 10.9361C12.3404 13.8406 11.8563 15.2929 11.1464 15.7055C10.4711 16.0982 9.63705 16.0982 8.96177 15.7055C8.25185 15.2929 7.76777 13.8406 6.79961 10.9361C6.64417 10.4698 6.56641 10.2366 6.43593 10.0417C6.3095 9.8528 6.14724 9.69048 5.95835 9.56408C5.76345 9.4336 5.53026 9.35584 5.0639 9.2004C2.15939 8.23224 0.707139 7.74816 0.29445 7.03824C-0.0981501 6.36295 -0.0981501 5.52889 0.29445 4.85358C0.707139 4.14371 2.15939 3.65962 5.0639 2.69145L9.18337 1.3183C12.7821 0.118734 14.5815 -0.48105 15.5312 0.468758C16.4811 1.41857 15.8813 3.21793 14.6817 6.81664Z" fill="white"/>
                        </svg>

                        Partner with Eride
                    </a>
                </div>

                <div class="partnership__form">
                    <?php get_template_part('modules/form-contacts'); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>