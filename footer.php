	<footer class="footer section-padding">
		<div class="container">
			<div class="footer__inner">
                <div class="footer__body">
                    <div class="footer__top">
                        <?php if ( $logo = get_field('logo_black', 'options') ): ?>
                        <div class="footer__logo">
                            <?= get_wp_srcset_img($logo, '', '170px'); ?>
                        </div>
                        <?php endif; ?>
    
                        <nav class="footer__menu">
                            <ul>
                                <li>
                                    <a href="<?= esc_url(home_url('our-platforms')); ?>">
                                        Our Platforms
                                    </a>
                                </li>
    
                                <li>
                                    <a href="<?= esc_url(home_url('innovation-research-development')); ?>">
                                        Innovation R&D
                                    </a>
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
                    </div>

                    <?php
                        $address = get_field('address', 'options');
                        $phone = get_field('phone', 'options');
                        $email = get_field('email', 'options')
                    ?>
                    <?php if ( $address || $phone || $email ): ?>
                    <div class="footer__info">
                        <ul>
                            <?php if ( $address ): ?>
                            <li>
                                <?= esc_html($address); ?>
                            </li>
                            <?php endif; ?>
                            
                            <?php if ( $phone ): ?>
                            <li>
                                Call:
                                
                                <?php $cleanPhone = preg_replace('/[^0-9]/', '', $phone); ?>
                                <a href="tel:<?= esc_attr($cleanPhone); ?>">
                                    <?= esc_html($phone); ?>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if ( $email ): ?>
                            <li>
                                <a href="mailto:<?= esc_attr($email); ?>">
                                    <?= esc_html($email); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <div class="footer__copy">
                        © <?php echo date('Y'); ?> All Rights Reserved By eridetech.africa
                    </div>
                </div>

                <nav class="footer__menu-document">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer_menu_document',
                                'container' => false,
                                'menu_class' => 'menu-list',
                            )
                        );
                    ?>
                </nav>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>
</body>
</html>