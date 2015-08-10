<?php
/**
/**
 * Template Name: Landing Page
 *
 * @package Siutes
 */

get_header(); ?>
        <?php if ( get_theme_mod( 'siutes_jumbotron_bg' ) ) : ?>
            <style>
                .jumbotron{
                    display: block;
                    position: relative;
                }
                .jumbotron::after {
                    content: "";
                    /*background: url(image.jpg);*/
                    background: url('<?php echo esc_url( get_theme_mod( 'siutes_jumbotron_bg' ) ); ?>');
                    background-position: center; 
                    background-size:cover;
                    opacity: 0.1;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    position: absolute;
                    z-index: -1;   
                  }
            </style>
        <?php endif; ?>

        <div class="jumbotron">
            <div class="container">
                <div class="widget-area widget-jumbo">
                    <?php dynamic_sidebar('widget-jumbo'); ?>
                </div>
            </div>
        </div>
	<!--<div id="primary" class="content-area">-->
        <div class="content-area">
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
