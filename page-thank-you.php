<?php
/*
Template Name: Thank you page
*/
get_header();
?>

<main>
    <section class="thank-you h-screen section-padding">
        <div class="container">
            <div class="thank-you__inner">
                <h1 class="h2-text">
                    <?= esc_html(get_the_title()); ?>
                </h1>

                <div class="thank-you__dscr">
                    <h2>
                        Your message has been received.
                    </h2>

                    <p>
                        A member of our team will review your enquiry and get back to you shortly.<br> 
                        In the meantime, you can continue exploring our platforms and approach.
                    </p>
                </div>

                <div class="thank-you__btns">
                    <a href="<?= esc_url(home_url('our-platforms')); ?>" class="btn">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6817 6.81664L13.3086 10.9361C12.3404 13.8406 11.8563 15.2929 11.1464 15.7055C10.4711 16.0982 9.63705 16.0982 8.96177 15.7055C8.25185 15.2929 7.76777 13.8406 6.79961 10.9361C6.64417 10.4698 6.56641 10.2366 6.43593 10.0417C6.3095 9.8528 6.14724 9.69048 5.95835 9.56408C5.76345 9.4336 5.53026 9.35584 5.0639 9.2004C2.15939 8.23224 0.707139 7.74816 0.29445 7.03824C-0.0981501 6.36295 -0.0981501 5.52889 0.29445 4.85358C0.707139 4.14371 2.15939 3.65962 5.0639 2.69145L9.18337 1.3183C12.7821 0.118734 14.5815 -0.48105 15.5312 0.468758C16.4811 1.41857 15.8813 3.21793 14.6817 6.81664Z" fill="white" />
                        </svg>

                        Explore Our Platforms
                    </a>

                    <a href="<?= esc_url(home_url()); ?>" class="btn">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.41536 4.65819C4.57764e-08 5.41702 0 6.33239 0 8.16312V9.38C0 12.5006 9.15527e-08 14.061 0.937256 15.0305C1.87452 16 3.38301 16 6.4 16H9.6C12.617 16 14.1255 16 15.0627 15.0305C16 14.061 16 12.5006 16 9.38V8.16312C16 6.33239 16 5.41702 15.5846 4.65819C15.1693 3.89937 14.4105 3.42841 12.8928 2.4865L11.2928 1.4935C9.68848 0.497832 8.88632 0 8 0C7.11368 0 6.31151 0.497832 4.70722 1.4935L3.10722 2.4865C1.58956 3.42841 0.83072 3.89937 0.41536 4.65819Z" fill="black" />
                        </svg>
                        
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>