<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preload" href="<?= get_template_directory_uri(); ?>/assets/images/hero-poster.webp" as="image">

    <link rel="preload" href="<?= get_template_directory_uri() ?>/assets/fonts/Archivo/Archivo_Expanded-Light.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?= get_template_directory_uri() ?>/assets/fonts/Archivo/Archivo-VariableFont_wdth,wght.woff2" as="font" type="font/woff2" crossorigin>

    <?php 
        $critical_file = get_template_directory() . '/assets/css/critical.min.css';
        if (file_exists($critical_file)) {
            $critical_content = file_get_contents($critical_file);
            
            $theme_url = get_template_directory_uri() . '/assets/';
            $critical_content = str_replace('../', $theme_url, $critical_content);
            
            echo '<style id="critical-css">' . $critical_content . '</style>';
        }
    ?>

    <?php 
        $style_rel_path = '/assets/css/style.min.css';
        $style_full_path = get_template_directory() . $style_rel_path;

        $style_ver = file_exists($style_full_path) ? filemtime($style_full_path) : '1.0';
        $style_url = get_template_directory_uri() . $style_rel_path . '?ver=' . $style_ver;
    ?>

    <link rel="preload" href="<?= esc_url($style_url); ?>" as="style">
    <link rel="stylesheet" href="<?= esc_url($style_url); ?>" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="<?= esc_url($style_url); ?>"></noscript>

    <?php wp_head(); ?>
</head>
<body>
    <?php 
        $header_class = '';

        if (is_singular('platforms')) {
            global $post;
            $terms = get_the_terms($post->ID, 'platform_cat');
            $is_common_template = false;

            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    if ($term->parent > 0 && $term->slug !== $post->post_name) {
                        $is_common_template = true;
                        break;
                    }
                }
            }

            if (!$is_common_template) {
                $header_class = 'is-platforms-single';
            }
        }
    ?>

	<header class="header <?= esc_attr($header_class) ?>">
		<div class="container">
			<div class="header__inner">
				<div class="header__logo">
					<?php if ( !is_front_page() ) : ?>
						<a href="<?php echo esc_url( home_url('/') ); ?>">
					<?php endif; ?>
                        <?php if ( $logo = get_field('logo', 'options') ): ?>
                            <?= get_wp_srcset_img($logo, '', '170px', false); ?>
                        <?php endif; ?>
					<?php if ( !is_front_page() ) : ?>
						</a>
					<?php endif; ?>
				</div>

                <nav class="header__menu">
                    <ul>
                        <li>
                            <a href="<?= home_url('our-platforms') ?>">
                                Our Platforms
                            </a>

                            <div class="sub-menu-wrapper">
                                <div class="container">
                                    <ul class="sub-menu">
                                        <li>
                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/immigration-mobility.svg" alt="">
    
                                            <strong>
                                                <a href="<?= esc_url(home_url('our-platforms/immigration-mobility')); ?>">
                                                    Immigration & Mobility
                                                </a>
                                            </strong>
    
                                            <p>
                                                Cross border compliance and case visibility.
                                            </p>
                                        </li>

                                        <li>
                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/financial-services.svg" alt="">
    
                                            <strong>
                                                <a href="<?= esc_url(home_url('our-platforms/financial-community-lending')); ?>">
                                                    Financial Services
                                                </a>
                                            </strong>
    
                                            <p>
                                                Inclusive and structured lending ecosystems.
                                            </p>
                                        </li>

                                        <li>
                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/public-sector.svg" alt="">
    
                                            <strong>
                                                <a href="<?= esc_url(home_url('our-platforms/public-sector-tender-intelligence')); ?>">
                                                    Public Sector & Procurement
                                                </a>
                                            </strong>
    
                                            <p>
                                                Transparent tender access and management.
                                            </p>
                                        </li>

                                        <li>
                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/beauty-services.svg" alt="">
    
                                            <strong>
                                                <a href="<?= esc_url(home_url('our-platforms/lifestyle-beauty-services')); ?>">
                                                    Lifestyle & Beauty Services
                                                </a>
                                            </strong>
    
                                            <p>
                                                Digital platform for booking, discovery, and service management.
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a href="<?= esc_url(home_url('innovation-research-development')); ?>">
                                Innovation and R&D
                            </a>

                            <div class="sub-menu-wrapper">
                                <div class="container">
                                    <ul class="sub-menu">
                                        <li>
                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/architecture.svg" alt="">
    
                                            <strong>
                                                <a href="<?= esc_url(home_url('innovation-research-development/architecture')); ?>">
                                                    Architecture
                                                </a>
                                            </strong>
    
                                            <p>
                                                How we build secure, scalable digital platforms.
                                            </p>
                                        </li>

                                        <li>
                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/automation-ai.svg" alt="">
    
                                            <strong>
                                                <a href="<?= esc_url(home_url('innovation-research-development/automation-ai')); ?>">
                                                    Automation & AI
                                                </a>
                                            </strong>
    
                                            <p>
                                                How we use automation and AI to streamline workflows.
                                            </p>
                                        </li>

                                        <li>
                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/compliance-design.svg" alt="">
    
                                            <strong>
                                                <a href="<?= esc_url(home_url('innovation-research-development/compliance-by-design')); ?>">
                                                    Compliance by Design
                                                </a>
                                            </strong>
    
                                            <p>
                                                How we build compliance into platforms from the start.
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a href="<?= esc_url(home_url('about')); ?>">
                                About
                            </a>
                        </li>

                        <li>
                            <a href="<?= esc_url(home_url('partner-with-us')); ?>">
                                Partner With Us
                            </a>
                        </li>

                        <li>
                            <a href="<?= esc_url(home_url('contacts')); ?>">
                                Contacts

                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.30304 14.7775L8.86936 15.5102C8.4828 16.1633 7.5172 16.1633 7.13064 15.5102L6.69696 14.7775C6.36058 14.2092 6.19239 13.9251 5.92223 13.7679C5.65207 13.6108 5.31194 13.6049 4.63166 13.5933C3.62738 13.5759 2.99751 13.5144 2.46926 13.2956C1.48915 12.8896 0.710456 12.1109 0.30448 11.1308C-2.28882e-08 10.3957 0 9.4638 0 7.60003V6.80003C0 4.18127 -4.57764e-08 2.87189 0.58944 1.91001C0.919264 1.37179 1.37178 0.919267 1.91001 0.589442C2.87188 -4.57765e-08 4.18126 0 6.8 0H9.2C11.8187 0 13.1281 -4.57765e-08 14.09 0.589442C14.6282 0.919267 15.0807 1.37179 15.4106 1.91001C16 2.87189 16 4.18127 16 6.80003V7.60003C16 9.4638 16 10.3957 15.6955 11.1308C15.2895 12.1109 14.5109 12.8896 13.5307 13.2956C13.0025 13.5144 12.3726 13.5759 11.3683 13.5933C10.688 13.6049 10.3479 13.6108 10.0778 13.7679C9.8076 13.925 9.63936 14.2092 9.30304 14.7775Z" fill="currentColor"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>

                <button type="button" class="header__menu-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 18C20.2549 18.0003 20.5 18.0979 20.6854 18.2728C20.8707 18.4478 20.9822 18.687 20.9972 18.9414C21.0121 19.1958 20.9293 19.4464 20.7657 19.6418C20.6021 19.8373 20.3701 19.9629 20.117 19.993L20 20H4C3.74512 19.9997 3.49997 19.9021 3.31463 19.7272C3.1293 19.5522 3.01777 19.313 3.00283 19.0586C2.98789 18.8042 3.07067 18.5536 3.23426 18.3582C3.39786 18.1627 3.6299 18.0371 3.883 18.007L4 18H20ZM20 11C20.2652 11 20.5196 11.1054 20.7071 11.2929C20.8946 11.4804 21 11.7348 21 12C21 12.2652 20.8946 12.5196 20.7071 12.7071C20.5196 12.8946 20.2652 13 20 13H4C3.73478 13 3.48043 12.8946 3.29289 12.7071C3.10536 12.5196 3 12.2652 3 12C3 11.7348 3.10536 11.4804 3.29289 11.2929C3.48043 11.1054 3.73478 11 4 11H20ZM20 4C20.2652 4 20.5196 4.10536 20.7071 4.29289C20.8946 4.48043 21 4.73478 21 5C21 5.26522 20.8946 5.51957 20.7071 5.70711C20.5196 5.89464 20.2652 6 20 6H4C3.73478 6 3.48043 5.89464 3.29289 5.70711C3.10536 5.51957 3 5.26522 3 5C3 4.73478 3.10536 4.48043 3.29289 4.29289C3.48043 4.10536 3.73478 4 4 4H20Z" fill="currentColor"/>
                    </svg>
                </button>
			</div>
		</div>
	</header>