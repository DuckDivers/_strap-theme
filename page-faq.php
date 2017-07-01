<?php
/**
* Template Name: FAQ Page
*/


get_header(); ?>

	<div id="full-width-container" class="content-area">
		<main id="main" class="site-main container" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'faq' ); ?>


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div>

<?php get_footer(); ?>
