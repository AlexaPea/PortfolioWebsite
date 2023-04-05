<?php
/*
 * The main template file.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */
get_header();
$noneed_testimonial_post = cs_get_option('noneed_testimonial_post');
$noneed_team_post = cs_get_option('noneed_team_post');
$noneed_portfolio_post = cs_get_option('noneed_portfolio_post');

if(function_exists( 'segovia_core_plugin_status' ) && (segovia_is_post_type('testimonial') && !$noneed_testimonial_post)){

  $testimonial_style = cs_get_option('testimonial_style');
  $testimonial_limit = cs_get_option('testimonial_limit');
  $testimonial_items = cs_get_option('testimonial_items');
  $testimonial_orderby = cs_get_option('testimonial_orderby');
  $testimonial_order = cs_get_option('testimonial_order');
  $testimonial_limit = $testimonial_limit ? $testimonial_limit : '-1';
  $short_content = cs_get_option('theme_testi_excerpt');

  $short_content = $short_content ? $short_content : esc_html__( '35', 'segovia' );

  $testimonial_items = $testimonial_items ? ' data-items='. $testimonial_items .'' : ' data-items=1';

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
    'post_type' => 'testimonial',
    'posts_per_page' => (int)$testimonial_limit,
    'orderby' => $testimonial_orderby,
    'order' => $testimonial_order,
  );

  // Testimonial Style
  if($testimonial_style === 'style-three') {
    $style_class = ' testi-style-three';
  } elseif($testimonial_style === 'style-two') {
    $style_class = ' testi-style-two';
  } else {
    $style_class = ' testi-style-one';
  }
  // RTL
  if ( is_rtl() ) {
    $switch_rtl = ' data-rtl="true"';
  } else {
    $switch_rtl = ' data-rtl="false"';
  }

  $segovia_testi = new WP_Query( $args );
  if ($segovia_testi->have_posts()) :
  ?>

  <div class="segva-testimonials testi-global-wrap <?php echo esc_attr($style_class); ?>">
      <div class="container">
        <div class="owl-carousel" data-nav="true" data-loop="true" data-dots="false" <?php echo esc_attr($testimonial_items); ?>>
        
        <?php while ($segovia_testi->have_posts()) : $segovia_testi->the_post();

        // Get Meta Box Options - segovia_framework_active()
        $testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
        $testi_job = $testimonial_options['testi_pro'];
        $testi_logo = $testimonial_options['testi_logo'];
        $testi_link = $testimonial_options['testi_link'];

        $testi_logo_img = wp_get_attachment_image_url( $testimonial_options['testi_logo'], 'fullsize', true );

        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $segovia_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
        $large_image = $large_image[0];

        if($testi_link) {
          $testi_link_actual = $testi_link;
        } else {
          $testi_link_actual = get_permalink();
        }

        if($testimonial_style === 'style-three') {?>
          <div class="item">
            <div class="testimonial-item">
              <div class="testi-infos">
                <p><?php segovia_excerpt($short_content); ?></p>
                <h4 class="author-name"><a href="<?php echo esc_url($testi_link_actual); ?>"><?php echo esc_html(get_the_title()); ?></a>
                  <?php if ($testi_job) { ?>
                    <span class="segva-separator"></span> 
                    <span class="author-designation"><?php echo esc_html($testi_job); ?></span>
                  <?php } ?>
                </h4>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="item">
            <div class="testimonial-item">
              <?php if($large_image) { ?>
              <div class="segva-image"><div class="testi-border"></div><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($segovia_alt); ?>"></div>
              <?php } if($testimonial_style === 'style-two' && $testi_logo) { ?>
                <div class="segva-icon"><img src="<?php echo esc_url($testi_logo_img); ?>" width="103" alt="<?php the_title_attribute(); ?>"></div>
              <?php } ?>
              <div class="testi-infos">
                <p><?php segovia_excerpt($short_content); ?></p>
                <h4 class="author-name"><a href="<?php echo esc_url($testi_link_actual); ?>"><?php echo esc_html(get_the_title()); ?></a><?php if ($testi_job) {
                if($testimonial_style != 'style-two') { ?>
                  <span class="segva-separator"></span> 
                <?php } ?>
                <span class="author-designation"><?php echo esc_html($testi_job); ?></span><?php } ?></h4>
              </div>
            </div>
          </div>          
        <?php }
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
      <?php  ?>
    </div>
    </div>

  <?php
    endif;

} elseif(function_exists( 'segovia_core_plugin_status' ) && (segovia_is_post_type('portfolio') && !$noneed_portfolio_post)){

	$portfolio_style = cs_get_option('portfolio_style');
	$portfolio_column = cs_get_option('portfolio_column');
	$portfolio_limit = cs_get_option('portfolio_limit');
	$portfolio_title = cs_get_option('portfolio_title');
  $portfolio_sec_title = cs_get_option('portfolio_sec_title');
	$portfolio_order = cs_get_option('portfolio_order');
	$portfolio_orderby = cs_get_option('portfolio_orderby');
	$portfolio_pagination = cs_get_option('portfolio_pagination');
	$portfolio_filter = cs_get_option('portfolio_filter');
	$portfolio_single_pagination = cs_get_option('portfolio_single_pagination');
  $readmore_title = cs_get_option('readmore_title');
  $read_more_link = cs_get_option('readmore_link');

  // Turn output buffer on
  ob_start();

    $readmore = $read_more_link ? '<div class="segva-link-wrap"><a href="'.esc_url($read_more_link).'" class="segva-link">'. $readmore_title.'</a></div>' : '';
    $portfolio_title = $portfolio_title ? $portfolio_title : esc_html__( 'Wo', 'segovia' );
    $portfolio_sec_title = $portfolio_sec_title ? $portfolio_sec_title : esc_html__( 'rks', 'segovia' );

  if( $portfolio_style === 'bpw-style-two' ) { ?>
    <div class="segva-projects projects-style-two port-global">
      <div class="container">
  <?php }
  if( $portfolio_style === 'bpw-style-three' ) { ?>
      <div class="segva-projects style-three-hover port-global">
      <div class="containerr"> 
  <?php } else {?>
    <div class="segva-projects projects-style-one port-global">
    <div class="container">
  <?php }

if($portfolio_style === 'bpw-style-two') { ?>
    <div class="row">
      <div class="col-lg-3">
        <div class="section-title-wrap hav-sep hav-icon hav-animation">
          <div class="sec-title">
            <h2 class="section-title"><?php echo esc_html($portfolio_title); ?></h2>
            <h2 class="section-title section-title-two"><?php echo esc_html($portfolio_sec_title); ?></h2>
          </div>
        </div>
      
    <?php
    if ($portfolio_filter) {
      echo segovia_portfolio_filter();
    } ?>
  </div> 
  <?php }

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
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'portfolio',
      'posts_per_page' => (int)$portfolio_limit,
      'orderby' => $portfolio_orderby,
      'order' => $portfolio_order
    );

    $segva_port = new \WP_Query( $args ); 

      if($portfolio_column === 'bpw-col-3') {
        $items = '3';
      } elseif($portfolio_column === 'bpw-col-4') {
        $items = '4';
      } else {
        $items = '2';
      }

// Portfolio Start

if($portfolio_style === 'bpw-style-two')  { ?>
  <div class="segva-projects projects-style-two col-lg-9">
    <div class="containerRR">
     <div class="segva-masonry" data-items="<?php echo esc_attr($items); ?>" data-space="50"> <?php } 

  elseif ($portfolio_style === 'bpw-style-three') { ?>
    <div class="segva-projects projects-style-three">
      <div class="containeddr">
        <div class="segva-masonry" data-items="<?php echo esc_attr($items); ?>" data-space="70">  <?php } else { ?>

  <div class="segva-full-wrap gallery-style-two <?php echo esc_attr($portfolio_style); ?> ">
      <div class="segva-masonry" data-items="<?php echo esc_attr($items); ?>" data-space="30"> <?php }
        if ($portfolio_style === 'bpw-style-one') { 
          if($portfolio_title) { ?>
        <div class="masonry-item">
          <div class="section-title-wrap hav-sep hav-icon hav-animation">
            <div class="sec-title">
              <h2 class="section-title"><?php echo esc_html($portfolio_title); ?></h2>
              <h2 class="section-title section-title-two"><?php echo esc_html($portfolio_sec_title); ?></h2>
            </div>
          </div>
        </div>
        <?php } }
  
        if ($segva_port->have_posts()) : while ($segva_port->have_posts()) : $segva_port->the_post();

        // Category
        global $post;
        $terms = wp_get_post_terms($post->ID,'portfolio_category');
        foreach ($terms as $term) {
          $cat_class = '' . $term->slug.'-item';
        }
        $count = count($terms);
        $i=0;
        $cat_class = '';
        if ($count > 0) {
          foreach ($terms as $term) {
            $i++;
            $cat_class .= ''. $term->slug .'-item ';
            if ($count != $i) {
              $cat_class .= '';
            } else {
              $cat_class .= '';
            }
          }
        }

        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
      
      // Style two
      if($portfolio_style === 'bpw-style-two')  { 
        if($large_image) { 
          $large_image = $large_image;
        } else {
          $large_image  = SEGOVIA_IMAGES.'/masonry-featured.png';
        } ?>
       <div class="masonry-item  <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
        <div class="project-item">
          <?php  if($large_image) { ?>
          <div class="segva-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php the_title_attribute(); ?>"></div> <?php } ?>
          <div class="project-info">
            <div class="project-info-wrap">
              <h4 class="project-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
              <span class="segva-separator"></span>
              <h5 class="project-category">
                <?php
                  $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                  $i=1;
                  foreach ($category_list as $term) {
                    $term_link = get_term_link( $term );
                    echo '<span><a href="'. esc_url($term_link) .'" class="">'. $term->name .'</a></span> ';
                    if($i++==2) break;
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
      </div>  <?php } elseif($portfolio_style === 'bpw-style-three') { 

         if($large_image) { 
          $large_image = $large_image;
        }else {
          $large_image  = SEGOVIA_IMAGES.'/masonry-featured.png';
        } ?>

        <div class="masonry-item flip-box  <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
          <div class="masonry-item-wrap">
            <div class="project-item flip-box-inner">
              <div class="segva-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php the_title_attribute(); ?>"></div>
            </div>
            <div class="project-info">
              <div class="project-info-wrap">
                <h4 class="project-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
                <span class="segva-separator"></span>
                <h5 class="project-category">
                   <?php
                    $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                    $i=1;
                    foreach ($category_list as $term) {
                      $term_link = get_term_link( $term );
                      echo '<span><a href="'. esc_url($term_link) .'" class="">'. $term->name .'</a></span> ';
                      if($i++==2) break;
                    }
                    ?>
                </h5>
              </div>
            </div>
          </div>
        </div>

        <?php  } else { ?>

          <div class="masonry-item  <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
            <div class="project-item "> <?php
              if($large_image) { 
              $large_image = $large_image;
            } else {
              $large_image  = SEGOVIA_IMAGES.'/grid-featured.png';
              
            }  if($large_image) { ?>
              <div class="segva-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php the_title_attribute(); ?>"></div> <?php } ?>
              <div class="project-info">
                <div class="segva-table-wrap">
                  <div class="segva-align-wrap">
                    <div class="project-info-wrap">
                      <h4 class="project-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
                      <h5 class="project-category">
                        <?php
                          $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                          $i=1;
                          foreach ($category_list as $term) {
                            $term_link = get_term_link( $term );
                            echo '<span><a href="'. esc_url($term_link) .'" class="">'. $term->name .'</a></span> ';
                            if($i++==2) break;
                          }
                          ?>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        <?php }
       
      endwhile;
      endif;
      wp_reset_postdata();
      if ($portfolio_style === 'bpw-style-one') { ?>
      <div class="masonry-item">
        <div class="project-more-info-wrap">
          <div class="segva-table-wrap">
            <div class="segva-align-wrap">
              <?php
              if($read_more_link) {
                echo '<div class="segva-link-wrap"><a href="'.esc_url($read_more_link).'" class="segva-link">'. $readmore_title.'</a></div>';
              } elseif($readmore_title) {
                echo '<div class="segva-link-wrap"><span class="segva-link">'. $readmore_title.'</span></div>';
              } else { echo ''; } ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      </div>
    </div> 
          
    <?php

    if ($portfolio_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $segva_port ) );
        wp_reset_postdata();  // avoid errors further down the page
      }
    }
  if($portfolio_style === 'bpw-style-two') { ?>
        </div>
      </div> 
    </div> 
  <?php }
  if($portfolio_style === 'bpw-style-three') {?>
  </div>
  <?php }  ?>
  </div>
  </div>
  <?php 
    // Return outbut buffer
    echo ob_get_clean();

} elseif(function_exists( 'segovia_core_plugin_status' ) && (segovia_is_post_type('team') && !$noneed_team_post)){
  $team_limit = cs_get_option('team_limit');
  $team_orderby = cs_get_option('team_orderby');
  $team_order = cs_get_option('team_order');

  $team_limit = $team_limit ? $team_limit : '8';
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
    );

    $segovia_team_qury = new WP_Query( $args );

    if ($segovia_team_qury->have_posts()) :
    ?>
    <div class="segva-mates globe segva-team-mates"> <!-- Team Starts -->
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
          if(class_exists('Aq_Resize')) {
            $team_img = aq_resize( $large_image, '433', '503', true );
          } else {$team_img = $large_image;}
          $team_featured_img = ( $team_img ) ? $team_img : SEGOVIA_IMAGES . '/holders/433x503.png';
          $abt_title = get_the_title();
          ?>
          <div class="segva-item mate-item">
            <?php if ($large_image) { ?>
            <div class="segva-image"><a href="<?php echo esc_url($team_url); ?>"><img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>"></a>
           </div>
            <?php } ?>
              
            <div class="mate-info">
              <span class="name-first-letter"><?php echo esc_html($abt_title[0]); ?></span>
              <div class="mate-inner-wrap">
                <h5 class="mate-name"><a href="<?php echo esc_url($team_url); ?>"><?php echo esc_html($abt_title); ?></a></h5>
                <p><?php echo esc_html($team_job_position); ?></p>
                  <?php if($team_socials) { ?>
                  <div class="segva-social">
                    <div class="segva-table-wrapp">
                      <div class="segva-align-wrpap">
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
            </div>
         
          </div>
        <?php endwhile; ?>
      </div>
    </div> <!-- Team End -->

  <?php
  endif;
} else {

// Metabox
$segovia_id    = ( isset( $post ) ) ? $post->ID : 0;
$segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
$segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
$segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );

if ($segovia_meta) {
  $segovia_content_padding = $segovia_meta['content_spacings'];
} else { $segovia_content_padding = ''; }
// Padding - Metabox
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
  $segovia_custom_padding = '';
}

// Theme Options
$segovia_blog_style = cs_get_option('blog_listing_style');
$segovia_blog_columns = cs_get_option('blog_listing_columns');
$segovia_sidebar_position = cs_get_option('blog_sidebar_position');
$blog_widget = cs_get_option('blog_widget');

if ($blog_widget) {
  $widget_select = $blog_widget;
} else {
  if (is_active_sidebar('sidebar-1')) {
    $widget_select = 'sidebar-1';
  } else {
    $widget_select = '';
  }
}

// Style
if ($segovia_blog_style === 'style-two') {
  $segovia_blog_class = '';
} elseif ($segovia_blog_style === 'style-three') {
  $segovia_blog_class = '';
} elseif ($segovia_blog_style === 'style-four') {
  $segovia_blog_class = ' blog-style-four';
} else {
  $segovia_blog_class = ' blogs-style-two ';
}

// Sidebar Position
if ($widget_select && is_active_sidebar( $widget_select )) {
  if ($segovia_sidebar_position === 'sidebar-hide') {
    $layout_class = 'col-md-12';
    $segovia_sidebar_class = 'segva-hide-sidebar';
  } elseif ($segovia_sidebar_position === 'sidebar-left') {
    $layout_class = 'segva-primary';
    $segovia_sidebar_class = 'segva-left-sidebar';
  } else {
    $layout_class = 'segva-primary';
    $segovia_sidebar_class = 'segva-right-sidebar';
  }
} else {
  $segovia_sidebar_position = 'sidebar-hide';
  $layout_class = 'col-md-12';
  $segovia_sidebar_class = 'hide-sidebar';
}

// Blog Masonry Column Option
  if($segovia_blog_columns === 'segva-blog-col-2') {
    $blg_items = '2';
  } elseif($segovia_blog_columns === 'segva-blog-col-4') {
    $blg_items = '4';
  }  else {
    $blg_items = '3';
  }

?>
  <div class="segva-mid-wrap <?php echo esc_attr($segovia_content_padding .' '. $segovia_sidebar_class); ?>" style="<?php echo esc_attr($segovia_custom_padding); ?>">
    <div class="container">
      <div class="blogs-wrap">
        <div class="row">
        <?php   if ($segovia_sidebar_position === 'sidebar-left' && $segovia_sidebar_position !== 'sidebar-hide') {
          get_sidebar(); // Sidebar
        } ?>
          <div class="segva-primary <?php echo esc_attr($layout_class.$segovia_blog_class); ?>">
            <?php   if($segovia_blog_style === 'style-three') { ?>
              <div class="row">
                <?php }
                if($segovia_blog_style === 'style-two') { ?>
                  <div class="segva-masonry" data-items="<?php echo esc_attr($blg_items); ?>">
                <?php } if($segovia_blog_style === 'style-four') { ?>
                    <div class="segva-blog-items-wrap <?php echo esc_attr($segovia_blog_class); ?>">
                <?php }
                  if ( have_posts() ) :
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                      get_template_part( 'layouts/post/content' );
                    endwhile;
                  else :
                    get_template_part( 'layouts/post/content', 'none' );
                  endif;
                if($segovia_blog_style === 'style-two' || $segovia_blog_style === 'style-four') { ?>
                  </div>
                <?php } if($segovia_blog_style === 'style-three') { ?>
              </div>
              <?php }
              // Pagination
              segovia_default_paging_nav(); ?>
          </div><!-- Blog Div -->
          <?php
          if ($segovia_sidebar_position !== 'sidebar-hide') {
            get_sidebar(); // Sidebar
          }
          wp_reset_postdata();  // avoid errors further down the page
          ?>
        </div><!-- Content Area -->
      </div>
    </div>
  </div>
<?php }
get_footer();
