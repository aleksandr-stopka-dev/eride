<?php 
get_header(); 

$title  = $is_tax ? single_term_title('', false) : 'Innovation and R&D';
?>

<main>
    <?php eride_breadcrumbs(); ?>

    <section class="platforms-archive section-padding pt-0">
        <div class="container">
            <div class="platforms-archive__inner">     
                <h2 class="h2-text mb-spacing-70">
                    <?= esc_html($title); ?>
                </h2>

                <div class="platforms-archive__items">
                    <?php 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post();
                            set_query_var('platform_term', false);
                            get_template_part('modules/platform-item');
                        endwhile;
                    endif; 
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>