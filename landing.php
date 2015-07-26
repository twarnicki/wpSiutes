<?php
/**
/**
 * Template Name: Landing Page
 *
 * @package Siutes
 */

get_header(); ?>
        <div class="jumbotron">
            <div class="container">
                <div class="widget-area widget-jumbo">
                    <?php dynamic_sidebar('widget-jumbo'); ?>
                </div>
                
            </div>
        </div>
	<div id="primary" class="content-area">
            <div class="container">
		<main id="main" class="" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
            </div>
	</div><!-- #primary -->


<?php get_footer(); ?>
