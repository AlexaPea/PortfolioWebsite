<?php
/* Team */
if ( !function_exists('segovia_team_function')) {
  function segovia_team_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'team_column'  => '',
      'class'  => '',
      // Listing
      'team_limit'  => '',
      'team_id'  => '',
      'team_order'  => '',
      'team_orderby'  => '',
      'team_pagination'  => '',
      // Color & Style
      'name_color'  => '',
      'profession_color'  => '',
      'overlay_color'    => '',
      'name_hover_color'  => '',
      'name_size'  => '',
      'profession_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.segva-mates.segovia-team-'. $e_uniqid .' .mate-title a, .segva-mates.segovia-team-'. $e_uniqid .' .mate-info h4 {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. $name_size .';' : '';
      $inline_style .= '}';
    }
    // Name Hover color
    if ( $name_hover_color ) {
      $inline_style .= '.segva-mates.segovia-team-'. $e_uniqid .' .mate-title a:hover {';
      $inline_style .= ( $name_hover_color ) ? 'color:'. $name_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.segva-mates.segovia-team-'. $e_uniqid .' .mate-designation {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. $profession_size .';' : '';
      $inline_style .= '}';
    }
    // Overlay color
    if ( $overlay_color ) {
      $inline_style .= '.segva-mates.segovia-team-'. $e_uniqid .' .mate-item .segva-image .segva-social {';
      $inline_style .= ( $overlay_color ) ? 'background:'. $overlay_color .';' : '';
      $inline_style .= '}';
    }

    // Add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segovia-team-'. $e_uniqid;

    // Team Column
    $team_column = $team_column ? $team_column : 'col-lg-3 col-md-6 col-sm-12';

    // Turn output buffer on
    ob_start();

    // Show ID
    if ($team_id) {
      $team_id = explode(',',$team_id);
    } else {
      $team_id = '';
    }

    // Query Starts Here
    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      'paged' => $my_page,
      'post_type' => 'team',
      'posts_per_page' => (int)$team_limit,
      'orderby' => $team_orderby,
      'order' => $team_order,
      'post__in' => $team_id,
    );

    $segovia_team_qury = new WP_Query( $args );

    if ($segovia_team_qury->have_posts()) :
    ?>

    <div class="segva-mates <?php echo $styled_class .' '. $class; ?>"> <!-- Team Starts -->
      <div class="row">
   

    <?php
    while ($segovia_team_qury->have_posts()) : $segovia_team_qury->the_post();

    // Link
    $team_options = get_post_meta( get_the_ID(), 'team_options', true );

       if($team_options) {
                $team_job_position = $team_options['team_job_position'];
                $team_link = $team_options['team_custom_link'];
                $team_socials = $team_options['social_icons'];
              } else {
                $team_job_position = '';
                $team_link = '';
                $team_socials = '';
              }

              if ($team_link) {
                $team_url = $team_link;
              } else {
                $team_url = get_the_permalink();
              }

    // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $large_image = $large_image[0];
    $abt_title = get_the_title();
    ?>

       <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="segva-item mate-item">
            <div class="segva-image">
               <?php if ($large_image) {
                echo '<img src="'. esc_url($large_image) .'" alt="'. esc_attr($abt_title).'">';
                } ?>
                 <?php if($team_socials) { ?>
              <div class="segva-social">
                <div class="segva-table-wrap">
                  <div class="segva-align-wrap">
                       <?php
                        if ( ! empty( $team_socials ) ) {
                        foreach ( $team_socials as $social ) {
                      ?>
                    <a href="<?php echo esc_url($social['icon_link']); ?>" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
                     <?php } } ?>
                  </div>
                </div>
              </div>
                <?php } ?>
            </div>
            <div class="mate-info">
              <h4 class="mate-title"><a href="<?php echo esc_url($team_url); ?>"><?php echo esc_attr($abt_title); ?></a></h4>
                <?php if ($team_job_position) {
              echo '<h5 class="mate-designation">'.esc_attr($team_job_position).'</h5>';
               } ?>
            </div>
          </div>
        </div>

    <?php endwhile; ?>
    </div>
  </div> <!-- Team End -->

<?php
  endif;

  if ($team_pagination) {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi(array( 'query' => $segovia_team_qury ) );
    }
  }
  wp_reset_postdata(); // avoid errors further down the page

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'segovia_team', 'segovia_team_function' );
