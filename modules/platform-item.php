<?php 
$term = get_query_var('platform_term');

if ( $term ) {
    $title       = $term->name;
    $link        = get_term_link($term);
    $excerpt     = $term->description;
    $image       = get_field('poster', $term);
} else {
    $title       = get_the_title();
    $link        = get_permalink();
    $excerpt     = get_the_excerpt();
    $image       = get_field('poster');
}
?>

<div class="platform-item">
    <div class="platform-item__body">
        <?php if ( $title ): ?>
        <h3 class="platform-item__title">
            <?php if ( $link ): ?>
            <a href="<?= esc_url($link); ?>" class="platform-item__link-main">
            <?php endif; ?>
                <?= wp_kses($title, ['br' => []]); ?>
            <?php if ( $link ): ?>
            </a>
            <?php endif; ?>
        </h3>
        <?php endif; ?>

        <?php if ( $excerpt ): ?>
        <div class="platform-item__dscr">
            <?= wp_kses($excerpt, ['br' => []]); ?>
        </div>
        <?php endif; ?>
    </div>

    <?php if ( $link ): ?>
    <button type="button" class="platform-item__open">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="80" height="80" rx="40" fill="white" fill-opacity="0.1" />
            <path d="M32.2923 46.4346C31.9408 46.7861 31.9408 47.356 32.2923 47.7074C32.6438 48.0589 33.2136 48.0589 33.5651 47.7074L32.9287 47.071L32.2923 46.4346ZM47.9708 32.9289C47.9708 32.4319 47.5679 32.0289 47.0708 32.0289L38.9708 32.0289C38.4738 32.0289 38.0708 32.4319 38.0708 32.9289C38.0708 33.426 38.4738 33.8289 38.9708 33.8289L46.1708 33.8289L46.1708 41.0289C46.1708 41.526 46.5738 41.9289 47.0708 41.9289C47.5679 41.9289 47.9708 41.526 47.9708 41.0289L47.9708 32.9289ZM32.9287 47.071L33.5651 47.7074L47.7072 33.5653L47.0708 32.9289L46.4345 32.2925L32.2923 46.4346L32.9287 47.071Z" fill="white" />
        </svg>
    </button>
    <?php endif; ?>

    <?php if ( $image ) : ?>
    <?= get_wp_srcset_img($image, 'platform-item__img', '(max-width: 768px) 200px, 300px'); ?>
    <?php endif; ?>
</div>