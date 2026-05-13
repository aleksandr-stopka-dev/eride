<?php
$img = isset($args['image']) ? $args['image'] : null;
$video = isset($args['video']) ? $args['video'] : null;

if ( empty($img) && empty($video) ) return;
?>

<div class="content-media-bg">
<?php if ( !empty($video) ): ?>
    <video autoplay loop muted playsinline <?php echo !empty($img) ? 'poster="' . esc_attr($img['url']) . '"' : ''; ?> preload="metadata">
        <source src="<?= esc_url($video['url']); ?>" type="video/mp4">
    </video>
<?php elseif ( !empty($img) ): ?>
    <?= get_wp_srcset_img($img, '', '(max-width: 1920px) 60vw, 1040px'); ?>
<?php endif; ?>
</div>