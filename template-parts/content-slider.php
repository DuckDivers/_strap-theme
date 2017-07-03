<?php
$slides = array(); 
$args = array( 'post_type' => 'slider');
$slider_query = new WP_Query( $args );
if ( $slider_query->have_posts() ) {
    while ( $slider_query->have_posts() ) {
        $slider_query->the_post();
        if(has_post_thumbnail()){
            $temp = array();
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'slider-post-thumbnail', true);
            $thumb_url = $thumb_url_array[0];
            $temp['title'] = get_the_title();
            $temp['excerpt'] = 	get_post_meta( $post->ID, 'slider_caption', true );
            $temp['image'] = $thumb_url;
			$temp['link'] = get_post_meta( $post->ID, 'slider_link', true );
            $slides[] = $temp;
        }
    }
} 
wp_reset_postdata();
?>
<?php if(count($slides) > 0) { ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <div id="dd-carousel" class="carousel slide" data-ride="carousel">
        <?php if (get_theme_mod('slider_navs')) :?>
        <ol class="carousel-indicators">
          <?php for($i=0;$i<count($slides);$i++) { ?>
          <li data-target="#dd-carousel" data-slide-to="<?php echo $i ?>" <?php if($i==0) { ?>class="active"<?php } ?>></li>
          <?php } ?>
        </ol>
        <?php endif; ?>
        <div class="carousel-inner" role="listbox">
          <?php $i=0; foreach($slides as $slide) { extract($slide); ?>
          <div class="item <?php if($i == 0) { ?>active<?php } ?>"> <a href="<?php echo $link; ?>"><img src="<?php echo $image ?>" alt="<?php echo esc_attr($title); ?>"></a>
            <div class="carousel-caption">
              <p><?php echo $excerpt; ?></p>
            </div>
          </div>
          <?php $i++; } ?>
        </div>
        <a class="left carousel-control" href="#dd-carousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#dd-carousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a> </div>
    </div>
  </div>
</div>
<?php } ?>
