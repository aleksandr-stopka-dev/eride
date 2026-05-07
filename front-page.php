<?php
	/*
	Template Name: Main page
	*/
	get_header();
?>

<main>
	<?php get_template_part('pages/front/hero'); ?>
    
	<?php get_template_part('pages/front/principles'); ?>

	<?php get_template_part('pages/front/industries'); ?>

	<?php get_template_part('pages/front/platform'); ?>

	<?php get_template_part('pages/front/partnership'); ?>

	<?php get_template_part('pages/front/values'); ?>
</main>

<?php get_footer(); ?>