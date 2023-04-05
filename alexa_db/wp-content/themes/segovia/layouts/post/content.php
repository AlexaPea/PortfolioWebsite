<?php
/**
 * Template part for displaying posts.
 */
$segovia_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$segovia_large_image = $segovia_large_image[0];

$segovia_read_more_text = cs_get_option('read_more_text');
$segovia_read_text = $segovia_read_more_text ? $segovia_read_more_text : esc_html__( 'Read More', 'segovia' );
$segovia_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$segovia_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$blog_listing_style = cs_get_option('blog_listing_style');
$metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$segovia_blog_columns = cs_get_option('blog_listing_columns');
$by_text = cs_get_option('author_by_text');
$by_text = $by_text ? $by_text : esc_html__('By', 'segovia');

$img_resizer = cs_get_option('blog_img_resizer');

if($segovia_post_type){
	$video_post = $segovia_post_type['video_post'];
	$gallery_post_format = $segovia_post_type['gallery_post_format'];
	$gallery_type = $segovia_post_type['gallery_type'];
} else {
	$video_post = '';
	$gallery_post_format = '';
	$gallery_type = '';
}
 // Style Two & Style Three variation
if(!$img_resizer) {
 if($blog_listing_style === 'style-three') { 
 		  if($segovia_blog_columns === 'segva-blog-col-2') {
    $grid_items = 'col-md-6 col-sm-6';
	    if(class_exists('Aq_Resize')) {
        $segovia_large_image_grid= aq_resize( $segovia_large_image, '548', '394', true );
	    } else {$segovia_large_image_grid= $segovia_large_image;}

	  } elseif($segovia_blog_columns === 'segva-blog-col-4') {
	    $grid_items = 'col-md-3 col-sm-6';
	    if(class_exists('Aq_Resize')) {
        $segovia_large_image_grid= aq_resize( $segovia_large_image, '270', '183', true );
	    } else {$segovia_large_image_grid= $segovia_large_image;}
	  }  else {
	    $grid_items = 'col-md-4 col-sm-6';
	    if(class_exists('Aq_Resize')) {
        $segovia_large_image_grid= aq_resize( $segovia_large_image, '370', '250', true );
	    } else {$segovia_large_image_grid = $segovia_large_image;}
	  }
	   $segovia_large_image_grid = $segovia_large_image_grid ? $segovia_large_image_grid : $segovia_large_image; 
 } else {
 		$segovia_large_image_grid= $segovia_large_image;
 }
} else {
	$segovia_large_image_grid= $segovia_large_image;
}

// Is Sticky
if (is_sticky(get_the_ID())) {
  $sclass = ' sticky';
} else {
  $sclass = '';
} 

if($segovia_large_image) {
  $img_class = ' hav-img';
} else {
  $img_class = ' no-img';
}

if($blog_listing_style === 'style-three') { ?>
<div class="<?php echo esc_attr($grid_items); ?>">
	<?php } ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('segva-blog-post'.$sclass.$img_class); ?>>
	  <?php if($blog_listing_style === 'style-two' || $blog_listing_style === 'style-three') {
	      if($blog_listing_style === 'style-two') { ?>
	      <div class="masonry-item branding-item" data-category="branding-item">
	        <div class="blog-item"> 
	        <?php } else { ?>
	        	 <div class="segva-item blog-item"> 
	      	<?php } ?>
	          <div class="segva-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($segovia_large_image_grid); ?>" alt="<?php the_title_attribute(); ?>"></a></div>
	          <div class="blog-info">
	            <h5 class="blog-category">
								<?php
								if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
									if ( get_post_type() === 'post') {
										$category_list = get_the_category_list( ' ' );
										if ( $category_list ) {
											echo '<span><i class="fa fa-bookmark" aria-hidden="true"></i>'. $category_list .' </span>';
										}
									}
								} // Category Hides ?> 
							</h5> 
	            <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h4>
	            <h6 class="blog-meta">
	              <span><i class="fa fa-user" aria-hidden="true"></i><?php echo esc_html($by_text); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a></span>
	              <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date('M d, Y'); ?></span>
	            </h6>
	          </div>
	        <?php if($blog_listing_style === 'style-two') { ?>  
	        </div>
	      </div> <?php } else { ?>
	      	</div>
	 
	     <?php }
	  } elseif($blog_listing_style === 'style-four'){ ?>
      <div class="blog-item blog-default"> 
      	<?php
      	if(!$img_resizer) {
	        if(class_exists('Aq_Resize')) {
            $segovia_default_image = aq_resize( $segovia_large_image, '420', '400', true );
		      } else {$segovia_default_image = $segovia_large_image;} 
		    } else {
		    	$segovia_default_image = $segovia_large_image;
		    }

        if ($segovia_large_image) { ?>
        <div class="segva-image">
	        <a href="<?php echo esc_url( get_permalink() ); ?>">
	          <img src="<?php echo esc_url($segovia_default_image); ?>" alt="<?php the_title_attribute(); ?>">
	        </a>
        </div>
        <?php } // Featured Image ?>
        <div class="blog-info">
          <?php
						$blog_excerpt = cs_get_option('theme_blog_excerpt');
						if ($blog_excerpt) {
							$blog_excerpt = $blog_excerpt;
						} else {
							$blog_excerpt = '20';
						} 
					?>
          <div class="blog-globe-content">
						<?php
							segovia_excerpt($blog_excerpt);
							echo segovia_wp_link_pages();
						?> 
					</div>
          <a href="<?php echo esc_url( get_permalink() ); ?>" class="segva-link"><?php echo esc_html($segovia_read_text); ?></a>
        </div>
        <?php if ( !in_array( 'date', $metas_hide ) ) { ?>
          <div class="blog-date">
          	<span class="blog-item-month"><?php echo get_the_date('M'); ?></span>
          	<span class="blog-item-date"><?php echo get_the_date('d'); ?></span>
          </div> 
        <?php } ?>
      </div>
      <?php } else { ?>
	  <div class="blog-item blog-default"> 
      	<?php
      	if(!$img_resizer) {
	        if(class_exists('Aq_Resize')) {
            $segovia_default_image= aq_resize( $segovia_large_image, '850', '570', true );
		      } else {$segovia_default_image= $segovia_large_image;} 
		    } else {
		    	$segovia_default_image= $segovia_large_image;
		    }

        if ($segovia_large_image) { ?>
        <div class="segva-image">
	        <a href="<?php echo esc_url( get_permalink() ); ?>">
	          <img src="<?php echo esc_url($segovia_default_image); ?>" alt="<?php the_title_attribute(); ?>">
	        </a>
        </div>
        <?php } // Featured Image ?>
        <div class="blog-info">
        <div class="blog-info-inner">
        <?php
					if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
						echo '<h6 class="blog-meta">';
						if ( get_post_type() === 'post') {
							$category_list = get_the_category_list( ', ' );
							if ( $category_list ) {
								echo '<span><i class="fa fa-bookmark"></i>'. $category_list .' </span>';
							}
						}
						echo '</span>';
					} // Category Hides 
				?> 
        <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h4>
          <?php
						$blog_excerpt = cs_get_option('theme_blog_excerpt');
						if ($blog_excerpt) {
							$blog_excerpt = $blog_excerpt;
						} else {
							$blog_excerpt = '20';
						} 
					?>
          <div class="blog-globe-content">
						<?php
							segovia_excerpt($blog_excerpt);
							echo segovia_wp_link_pages();
						?> 
					</div>
          <div class="segva-link-wrap"><a href="<?php echo esc_url( get_permalink() ); ?>" class="segva-link"><?php echo esc_html($segovia_read_text); ?></a></div>
					</div>
        <?php if ( !in_array( 'date', $metas_hide ) ) { ?>
          <div class="blog-date">
          	<span class="blog-item-month"><?php echo get_the_date('M'); ?></span>
          	<span class="blog-item-date"><?php echo get_the_date('d'); ?></span>
          </div> 
        <?php } ?>
        </div>
      </div>
  <?php }
	if($blog_listing_style === 'style-three') { ?> 
		</div> 
	<?php } ?>
</div><!-- #post-## -->
<?php
