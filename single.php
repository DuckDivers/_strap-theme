<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Duck Diver Custom
 */

get_header(); ?>

<main id="main" class="site-main col-md-9" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
            
            <?php $type = get_post_type( get_the_ID() ); 
                if ($type !== 'post') {
                    get_template_part ('template-parts/content-single', $type);
                } else {
                    get_template_part( 'template-parts/content', 'single' ); 
                }
            
                ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
    <aside class="col-md-3">
         <?php get_sidebar(); ?>
    </aside>
    </div><!-- #primary -->
</div>
<?php get_footer(); ?>
