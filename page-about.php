<?php
/*
Template Name: About page
*/
get_header();
?>

<main>
    <section class="about">
        <div class="container">
            <div class="about__inner">
                <div class="about__body">
                    <h1 class="about__title h2-text">
    
                    </h1>
    
                    <div class="dscr-section">
                        
                    </div>
                </div>

                <div class="about__media">
                    <video autoplay loop muted playsinline poster="<?= get_template_directory_uri(); ?>/assets/images/about-poster.webp" preload="metadata" class="about__video">
                        <source src="<?= get_template_directory_uri(); ?>/assets/video/about.webm" type="video/webm">
                        <source src="<?= get_template_directory_uri(); ?>/assets/video/about.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

            <div class="about__strengths">
                <h2 class="about__strengths-title">

                </h2>

                <ul class="about__strengths-items">
                    <li class="about__strengths-item">
                        
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="philosophy">
        <div class="container">
            <div class="philosophy__inner">
                <div class="philosophy__body">
                    <h2 class="h2-text">

                    </h2>

                    <div class="dscr-section">

                    </div>
                </div>

                <div class="philosophy__principles">
                    <h3 class="philosophy__principles-title">

                    </h3>

                    <ul class="philosophy__principles-items">
                        <li class="philosophy__principles-item">

                        </li>
                    </ul>
                </div>
            </div>

            <video autoplay loop muted playsinline poster="<?= get_template_directory_uri(); ?>/assets/images/philosophy-poster.webp" preload="metadata" class="philosophy__video">
                <source src="<?= get_template_directory_uri(); ?>/assets/video/philosophy.webm" type="video/webm">
                <source src="<?= get_template_directory_uri(); ?>/assets/video/philosophy.mp4" type="video/mp4">
            </video>
        </div>
    </section>

    <section class="mission">
        <div class="container">
            <div class="mission__inner">
                <div class="mission__body">
                    <h2 class="h2-text">

                    </h2>

                    <div class="dscr-section">

                    </div>
                </div>

                <div class="mission__focus">
                    <h3 class="mission__focus-title">

                    </h3>

                    <ul class="mission__focus-items">
                        <li class="mission__focus-item">

                        </li>
                    </ul>
                </div>
            </div>

            <video autoplay loop muted playsinline poster="<?= get_template_directory_uri(); ?>/assets/images/mission-poster.webp" preload="metadata" class="mission__video">
                <source src="<?= get_template_directory_uri(); ?>/assets/video/mission.webm" type="video/webm">
                <source src="<?= get_template_directory_uri(); ?>/assets/video/mission.mp4" type="video/mp4">
            </video>
        </div>
    </section>

    <section class="governance">
        <div class="container">
            <div class="governance__inner">
                <div class="governance__body">
                    <h2 class="h2-text">

                    </h2>

                    <div class="dscr-section">

                    </div>
                </div>

                <div class="governance__principles">
                    <h3 class="governance__principles-title">

                    </h3>

                    <ul class="governance__principles-items">
                        <li class="governance__principles-item">
                            <div class="governance__principles-item-body">
                                <strong class="governance__principles-item-title">

                                </strong>

                                <span class="governance__principles-item-dscr">

                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="compliance">
        <div class="container">
            <div class="compliance__inner">
                <div class="compliance__body">
                    <h2 class="h2-text">

                    </h2>

                    <div class="dscr-section">

                    </div>
                </div>

                <video autoplay loop muted playsinline poster="<?= get_template_directory_uri(); ?>/assets/images/compliance-poster.webp" preload="metadata" class="compliance__video">
                    <source src="<?= get_template_directory_uri(); ?>/assets/video/compliance.webm" type="video/webm">
                    <source src="<?= get_template_directory_uri(); ?>/assets/video/compliance.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </section>

    <section class="infrastructure">
        <div class="container">
            <div class="infrastructure__inner">
                <div class="infrastructure__body">
                    <h2 class="h2-text">

                    </h2>

                    <div class="dscr-section">

                    </div>
                </div>

                <video autoplay loop muted playsinline poster="<?= get_template_directory_uri(); ?>/assets/images/infrastructure-poster.webp" preload="metadata" class="infrastructure__video">
                    <source src="<?= get_template_directory_uri(); ?>/assets/video/infrastructure.webm" type="video/webm">
                    <source src="<?= get_template_directory_uri(); ?>/assets/video/infrastructure.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>