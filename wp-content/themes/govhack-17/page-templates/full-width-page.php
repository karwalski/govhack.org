<?php
/**
 * Template Name: Full-Width Page
 *
 * @package Sequential
 */
 
get_header(); ?>

    <?php // gh_simple_breadcrumb([ "wrapped" => true ]); ?> 

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">
            <div class="wrapper">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						// if ( comments_open() || '0' != get_comments_number() ) :
							// comments_template();
						// endif;
					?>

				<?php endwhile; // end of the loop. ?>

            </div><!-- .wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>