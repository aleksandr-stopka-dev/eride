<section class="values">
    <div class="container">
        <div class="values__inner">
            <?php if ( $title = get_field('title_values') ): ?>
            <h3 class="values__title">
                <?= esc_html($title); ?>
            </h3>
            <?php endif; ?>

            <?php if ( have_rows('items_values') ) : ?>
            <ul class="values__items">
                <?php while ( have_rows('items_values') ) : the_row(); ?>
                    <li class="values__item">
                        <?php if ( $icon = get_sub_field('icon') ): ?>
                        <?= get_wp_srcset_img($icon, 'values__item-icon', '42px'); ?>
                        <?php endif; ?>

                        <?php if ( $title = get_sub_field('text') ): ?>
                        <h4 class="values__item-title">
                            <?= esc_html($title); ?>
                        </h4>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</section>