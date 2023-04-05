<?php
/**
 * Single Post.
 */
$segovia_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$segovia_large_image = $segovia_large_image[0];

$segovia_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$segovia_blog_style = cs_get_option('blog_listing_style');
if($segovia_post_type){
	$video_post = $segovia_post_type['video_post'];
	$gallery_post_format = $segovia_post_type['gallery_post_format'];
	$gallery_type = $segovia_post_type['gallery_type'];
} else {
	$video_post = '';
	$gallery_post_format = '';
	$gallery_type = '';
}

// Single Theme Option
$segovia_single_featured_image = cs_get_option('single_featured_image');
$segovia_single_author_info = cs_get_option('single_author_info');
$segovia_single_share_option = cs_get_option('single_share_option');

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('segva-blog-post'); ?>>
	<?php if(get_post_format() === 'gallery')  { 
	 if($gallery_post_format) { ?>
    <div class="owl-carousel" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true">
			<?php
				$ids = explode( ',', $gallery_post_format );
				foreach ( $ids as $id ) {
				  $attachment = wp_get_attachment_image_src( $id, 'fullsize' );
				  $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
				  $g_img = $attachment[0];
			      $post_img = $g_img;
				  echo '<div class="item">
				          <div class="segva-image segva-popup">
				            <a href="'. $post_img .'"><img src="'. esc_url($post_img) .'" alt="'. esc_attr($alt) .'" /></a>
				          </div>
				        </div>';
				}	?>
		</div>
		<?php } else { 
			if ($segovia_large_image) { ?>
			<div class="segva-image segva-popup">
				<img src="<?php echo esc_url($segovia_large_image); ?>" alt="<?php the_title_attribute(); ?>">
			</div>
			<?php } 
		} 
	} elseif(get_post_format() === 'video') { ?> 
			<?php if($video_post) { ?>
				<div class="segva-iframe">
					<iframe src="<?php echo esc_url($video_post); ?>" width="640" height="360" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div> 
			<?php } 	
		} else {
		  if ($segovia_large_image) { ?>
				<div class="blog-image segva-popup">
			    <a href="<?php echo esc_url($segovia_large_image); ?>"><img src="<?php echo esc_url($segovia_large_image); ?>" alt="<?php  the_title_attribute(); ?>"></a>
			  </div>
			<?php } 
		} ?>
       
	<div class="blog-detail-wrap">
	  <?php echo segovia_post_metas(); ?>
	  <h4 class="blog-title"><?php echo get_the_title(); ?></h4>
	  <?php the_content();
		echo segovia_wp_link_pages();

		if($segovia_single_share_option) {
			$tag_width = '';
		}
		else {
			$tag_width = 'full-width';
		}
		$tag_list = get_the_tags();
		if($segovia_single_share_option || $tag_list) {?>
		  <div class="segva-blog-meta <?php echo esc_attr($tag_width); ?>">
				<?php
				if($tag_list) { ?>
					<div class="segva-blog-tags "><i class="fa fa-tags" aria-hidden="true"></i>
						<?php echo the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
					</div>
				<?php }
				if($segovia_single_share_option) {
					if ( function_exists( 'segovia_wp_share_option' ) ) {
		      echo segovia_wp_share_option(); 
		      }
		    }
		 		?>
		  </div>
	  <?php } ?>
	</div>
	<?php
	// Author Info 
	if($segovia_single_author_info) {
		echo segovia_author_info();
	}
	// Navigation
	segovia_blog_next_prev();

	segovia_related_post (); ?>     
         
</div><!-- #post-## -->
<?php 
