<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Duck Diver Custom
 */

?>

        </div><!-- #content -->
    
        <footer id="colophon" class="site-footer" role="contentinfo">
             <div class="container">
                <div class="row footer-widgets">
                  <div class="col-sm-4" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-1">
                    <?php dynamic_sidebar("footer-sidebar-1"); ?>
                  </div>
                  <div class="col-sm-4" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-2">
                    <?php dynamic_sidebar("footer-sidebar-2"); ?>
                  </div>
                  <div class="col-sm-4" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-3">
                    <?php dynamic_sidebar("footer-sidebar-3"); ?>
                  </div>
                </div>
                <div id="footer-text" class="footer-text">
                  <?php $myfooter_text = get_theme_mod('footer_text'); ?>
                  <?php if($myfooter_text){?>
                  <?php echo get_theme_mod('footer_text'); ?>
                  <?php } else { ?>
                  <span class="footer-logo">
                  <?php bloginfo('name'); ?>
                  </span> &copy; <?php echo date('Y'); ?>
                  <?php } ?>
                  &bull; Website Created by <a href="https://www.duckdiverllc.com" target="_blank" class="duck"><i class="dd-duck-icon" style="vertical-align:middle"></i>Duck Diver Marketing</a> </div>
  </div>
        </footer><!-- #colophon -->
	</div> <!-- Outer Row -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
