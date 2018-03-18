<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Duck Diver Custom
 */
$featured_size = (get_theme_mod('dd_featured_blog_image')) ? get_theme_mod('dd_featured_blog_image') : 'large' ;
$featured_class = ($featured_size === 'large') ? 'col-12' : 'col-md-4';
$post_class = ($featured_size === 'large') ? 'col-12' : 'col-md-8';
get_header(); ?>

<div class="row">
     <main id="main" class="site-main col-md-9" role="main">
          
          <?php if ( have_posts() ) : ?>
          
          <header class="page-header">
               <?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
             </header><!-- .page-header -->
          
          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>
          
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'post__holder'); ?>>		
                <?php if(!is_singular()) : ?>
				 <div class="row">
                      <div class="col-12">
                           <header class="post-header">
                                <?php if(is_sticky()) : ?>
                                <h5 class="post-label"><?php _e("featured");?></h5>
                                <?php endif; ?>
                                <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                           </header>
                      </div>
		         </div>
                 <div class="row">
                      <div class="<?php echo $featured_class;?>">
                           <?php endif; 
					if (has_post_thumbnail()){
						echo '<figure class="featured-thumbnail thumbnail">'.get_the_post_thumbnail().'</figure>';
					   }
                        else $post_class = 'col-12';
				    ?>
                      </div>
                      
                      <?php if ( !is_singular() ) : ?>
                      <!-- Post Content -->
                      <div class="<?php echo $post_class;?>">
                           <div class="post_content">
                                <div class="excerpt">
                                     <?php
                            
                        $excerpt_length = (get_theme_mod('dd_blog_excerpt_length')) ? get_theme_mod('dd_blog_excerpt_length') : 55 ;
                        
							if (has_excerpt()) {
								the_excerpt();
							} else {
								$theContent = get_the_content();
								$theContent = strip_shortcodes($theContent);
								echo wp_trim_words( $theContent, $excerpt_length, '...' );
							} ?>
                                   </div>
                                <?php $button_text = (get_theme_mod('dd_read_more_text')) ? get_theme_mod('dd_read_more_text') : 'Read More' ;?>
                                <a href="<?php the_permalink() ?>" class="btn btn-primary read-more-button"><?php echo $button_text; ?></a>
                                <div class="clear"></div>
                           </div>
                      </div>
                    <?php else :?>
                      <!-- Post Content -->
                      <div class="post_content">
                           <?php the_content(''); ?>
                           <div class="clear"></div>
                      </div>
                 </div>
				<!-- //Post Content -->
				<?php endif; ?>

			</article>          
          <?php endwhile; ?>
          
          <?php the_posts_navigation(); ?>
          
          <?php else : ?>
          
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
          
          <?php endif; ?>
          
          </main>
     <!-- #main -->
     <aside class="col-md-3" id="sidebar">
          <?php get_sidebar(); ?>
     </aside>    
</div>
<?php get_footer(); ?>
