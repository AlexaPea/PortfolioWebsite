<?php
/*
 * The template for displaying all single team.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */
get_header();

// Metabox
$segovia_id    = ( isset( $post ) ) ? $post->ID : 0;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );

$segovia_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$segovia_large_image = $segovia_large_image[0];

if ($segovia_meta) {
	$segovia_content_padding = $segovia_meta['content_spacings'];
} else { $segovia_content_padding = ''; }
// Padding - Theme Options
if ($segovia_content_padding && $segovia_content_padding !== 'padding-none') {
	$segovia_content_top_spacings = $segovia_meta['content_top_spacings'];
	$segovia_content_bottom_spacings = $segovia_meta['content_bottom_spacings'];
	if ($segovia_content_padding === 'padding-custom') {
		$segovia_content_top_spacings = $segovia_content_top_spacings ? 'padding-top:'. segovia_check_px($segovia_content_top_spacings) .';' : '';
		$segovia_content_bottom_spacings = $segovia_content_bottom_spacings ? 'padding-bottom:'. segovia_check_px($segovia_content_bottom_spacings) .';' : '';
		$segovia_custom_padding = $segovia_content_top_spacings . $segovia_content_bottom_spacings;
	} else {
		$segovia_custom_padding = '';
	}
} else {
	$segovia_top_spacing = cs_get_option('team_top_spacing');
	$segovia_bottom_spacing = cs_get_option('team_bottom_spacing');
	if ($segovia_top_spacing || $segovia_bottom_spacing) {
		$segovia_top_spacing = $segovia_top_spacing ? 'padding-top:'. segovia_check_px($segovia_top_spacing) .';' : '';
		$segovia_bottom_spacing = $segovia_bottom_spacing ? 'padding-bottom:'. segovia_check_px($segovia_bottom_spacing) .';' : '';
		$segovia_custom_padding = $segovia_top_spacing . $segovia_bottom_spacing;
	} else {
		$segovia_custom_padding = '';
	}
}

// Sidebar Position
$segovia_layout_class = 'col-lg-12 no-padding';
?>

<div class="segva-team-single-section ">
  <div class="container segva-content-area team-singl-wrap <?php echo esc_attr($segovia_content_padding); ?>" style="<?php echo esc_attr($segovia_custom_padding); ?>">
  		<div class="<?php echo esc_attr($segovia_layout_class); ?> sngl-team-cnt">
  			<div class="segva-blog-one segva-blog-list segva-blog-col-1 segva-mate-sngl segva-team-single">
  			<?php
  				if (have_posts()) : while (have_posts()) : the_post();
  					$team_options = get_post_meta( get_the_ID(), 'team_options', true );
            if($team_options) {
              $team_job_position = $team_options['team_job_position'];
              $team_socials = $team_options['social_icons'];
              $social_text = $team_options['social_text'];
              $team_link = $team_options['team_custom_link'];
              $team_contact = $team_options['contact_details'];
              $single_team_img = $segovia_large_image;
            } else {
              $team_job_position = '';
              $team_socials = '';
              $social_text = '';
              $team_link = '';
              $team_contact = '';
              $single_team_img = $segovia_large_image;
            }
            if ($team_link) {
              $team_url = $team_link;
            } else {
              $team_url = get_the_permalink();
            } ?>
            <div class="row">
    					<?php if ($single_team_img) {?>
                <div class="col-lg-5 col-md-6">
    						  <div class="blog-image">
    						    <img src="<?php echo esc_url($single_team_img); ?>" alt="<?php the_title_attribute(); ?>">
    						  </div>
    						</div>
              <?php } ?>
  						<div class="col-lg-7 col-md-12 team-total-content">
  					    <div class="member-info">
                  <h4 class="member-name"><?php echo esc_html(get_the_title()); ?></h4>
                  <?php
                  if ($team_job_position) {
                    echo '<h5 class="member-designation">'.esc_html($team_job_position).'</h5>';
                  } ?>
                </div>
                <div class="team-content">
                  <p>
                    <?php esc_html(the_excerpt()); ?>
                  </p>
                </div>
                <div class="team-single-detail">
                <?php 
                  if ( ! empty( $team_contact ) ) {
                    foreach ( $team_contact as $contact ) {
                    if($contact['contact_text'] || $contact['contact_link']) {
                      if($contact['contact_link']) { ?>
                        <div class="team-single-email"><h5 class="detail-text"><i class="<?php echo esc_attr($contact['contact_icon']); ?>"></i><span><?php echo esc_html($contact['contact_title']); ?></span><a href="<?php echo esc_url($contact['contact_link']); ?>" target="_blank"><?php echo esc_html($contact['contact_text']); ?></a></h5></div>
                      <?php } else { ?>
                        <div class="team-single-email"><h5 class="detail-text"><i class="<?php echo esc_attr($contact['contact_icon']); ?>"></i><span><?php echo esc_html($contact['contact_title']); ?></span><?php echo esc_html($contact['contact_text']); ?></h5></div>
                      <?php } } 
                    }
                   }
                  ?>
                  <div class="segva-social">
                    <?php if($team_socials) { ?>
                      <div class="segva-table-wrap">
                        <div class="segva-align-wrap bottom social-connect">
                         <h5 class="detail-text"><i class="fa fa-share-alt"></i><span><?php echo esc_html($social_text) ?></span></h5>
													<div class="team-single-socials">
	                          <?php foreach ($team_socials as $key => $icon) : ?>
	                            <a href="<?php echo esc_url($icon['icon_link']); ?>">
	                              <i class="<?php echo esc_attr($icon['icon']); ?>"></i>
	                            </a>
	                          <?php endforeach; ?>
	                        </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
        </div><!-- Blog Div -->
        <div class="col-md-12 bottom-content">
          <span class="team-large-content">
				  <?php the_content(); ?> </span>
        </div>
				<?php endwhile;
				endif;
	    	  wp_reset_postdata();  // avoid errors further down the page
			  ?>
		</div><!-- Content Area -->
  </div>
</div>
<?php
get_footer();
