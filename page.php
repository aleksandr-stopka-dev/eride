<?php get_header(); ?>

<main>
	<section class="page section-padding">
		<div class="container">
			<div class="page__inner">
                <?php if ( $title = get_the_title() ): ?>
				<h1 class="title-section">
					<?= $title; ?>
				</h1>
                <?php endif; ?>

				<div class="page__body">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>