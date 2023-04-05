<?php
/* ==========================================================
  Portfolio
=========================================================== */
if ( !function_exists('segovia_portfolio_function')) {
  function segovia_portfolio_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'portfolio_style'  => '',
      'portfolio_limit'  => '',
      'portfolio_column'  => '',
      'portfolio_title' =>'',
      'readmore_title' =>'',
      // Enable & Disable
      'portfolio_filter'  => '',
      'portfolio_pagination'  => '',
      // Listing
      'portfolio_order'  => '',
      'portfolio_orderby'  => '',
      'portfolio_show_category'  => '',
      'class'  => '',
      // Style - Filter
      'filter_color'  => '',
      'filter_active_color'  => '',
      'filter_line_color'  => '',
      'filter_size'  => '',
      // Style - Colors And Sizes
      'image_overlay_color'  => '',
      'portfolio_title_size'  => '',
      'portfolio_title_color'  => '',
      'portfolio_title_hover_color'  => '',
      'portfolio_cat_color'  => '',
      'portfolio_cat_hover_color'  => '',
      'portfolio_cat_size'  => '',
      'portfolio_readmore_size' =>'',
      'portfolio_readmore_color' =>'',
      'portfolio_readmoreborder_color' =>'',
      'portfolio_readmorehover_color' =>'',
      'banner_info_size' =>'',
      'banner_info_color' =>'',

    ), $atts));



    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Image Overlay Color
    if ( $image_overlay_color ) {
      $inline_style .= '.gallery-style-two .segva-portfolio-'. $e_uniqid .' .project-info, .style-three-hover .segva-portfolio-'. $e_uniqid .' .project-info ,
      .projects-style-two .segva-portfolio-'. $e_uniqid .' .project-item .segva-image:before {';
      $inline_style .= ( $image_overlay_color ) ? 'background:'. $image_overlay_color .';' : '';
      $inline_style .= '}';
    }
    // Title Color 
    if ( $portfolio_title_size || $portfolio_title_color  || $portfolio_title_hover_color ) {
      $inline_style .= '.segva-portfolio-'. $e_uniqid .' .project-title a, .projects-style-two .segva-portfolio-'. $e_uniqid .' .project-title a, .segva-portfolio-'. $e_uniqid .' .segva-slider-caption h2,  .segva-big-banner .segva-portfolio-'. $e_uniqid .' .banner-wrap h2 {';
      $inline_style .= ( $portfolio_title_color ) ? 'color:'. $portfolio_title_color .';' : '';
      $inline_style .= ( $portfolio_title_size ) ? 'font-size:'. $portfolio_title_size .';' : '';
      $inline_style .= '}';
      $inline_style .= '.segva-portfolio-'. $e_uniqid .' .project-title a:hover, .projects-style-two .segva-portfolio-'. $e_uniqid .' .project-title a:hover {';
      $inline_style .= ( $portfolio_title_hover_color ) ? 'color:'. $portfolio_title_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Category
    if ( $portfolio_cat_color || $portfolio_cat_size ) {
      $inline_style .= '.segva-portfolio-'. $e_uniqid .' .project-category a {';
      $inline_style .= ( $portfolio_cat_color ) ? 'color:'. $portfolio_cat_color .';' : '';
      $inline_style .= ( $portfolio_cat_size ) ? 'font-size:'. $portfolio_cat_size .';' : '';
      $inline_style .= '}';
    }
    if ( $portfolio_cat_hover_color ) {
      $inline_style .= '.segva-portfolio-'. $e_uniqid .' .project-category a:hover {';
      $inline_style .= ( $portfolio_cat_hover_color ) ? 'color:'. $portfolio_cat_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Filter
    if ( $filter_color || $filter_size ) {
      $inline_style .= '.segva-portfolio-'. $e_uniqid .'.masonry-filters a {';
      $inline_style .= ( $filter_color ) ? 'color:'. $filter_color .';' : '';
      $inline_style .= ( $filter_size ) ? 'font-size:'. segovia_core_check_px($filter_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $filter_active_color ) {
      $inline_style .= '.segva-portfolio-'. $e_uniqid .'.masonry-filters .active {';
      $inline_style .= ( $filter_active_color ) ? 'color:'. $filter_active_color .';' : '';
      $inline_style .= '}';
    }
    // Read More
    if ( $portfolio_readmore_color || $portfolio_readmore_size ) {
      $inline_style .= '.segva-portfolio-'. $e_uniqid .' .caption-wrap .segva-border-link a, .segva-big-banner .segva-portfolio-'. $e_uniqid .' .banner-wrap .segva-link a {';
      $inline_style .= ( $portfolio_readmore_color ) ? 'color:'. $portfolio_readmore_color .';' : '';
      $inline_style .= ( $portfolio_readmore_size ) ? 'font-size:'. $portfolio_readmore_size .';' : '';
      $inline_style .= '}';
    }
    if ( $portfolio_readmoreborder_color) {
      $inline_style .= '.segva-portfolio-'. $e_uniqid .' .caption-wrap .segva-border-link a:after, .segva-big-banner .segva-portfolio-'. $e_uniqid .' .banner-wrap .segva-link a:after {';
      $inline_style .= ( $portfolio_readmoreborder_color ) ? 'background:'. $portfolio_readmoreborder_color .';' : '';
      
      $inline_style .= '}';
    }
    if ( $portfolio_readmorehover_color ) {
      $inline_style .= '.segva-portfolio-'. $e_uniqid .' .caption-wrap .segva-border-link a:hover, .segva-portfolio-'. $e_uniqid .' .segva-big-banner .segva-link a {';
      $inline_style .= ( $portfolio_readmorehover_color ) ? 'color:'. $portfolio_readmorehover_color .';' : '';
      $inline_style .= '}';
    }
    // banner Info
    if ( $banner_info_color || $banner_info_size ) {
      $inline_style .= '.segva-big-banner .segva-portfolio-'. $e_uniqid .' .banner-info p {';
      $inline_style .= ( $banner_info_color ) ? 'color:'. $banner_info_color .';' : '';
      $inline_style .= ( $banner_info_size ) ? 'font-size:'. $banner_info_size .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segva-portfolio-'. $e_uniqid;

    // View Details Button
    // if (segovia_framework_active()) {
    //   $view_more_text = cs_get_option('view_more_text');
    //   if ($btn_text) {
    //     $btn_text = $btn_text;
    //   } elseif($view_more_text) {
    //     $btn_text = $view_more_text;
    //   } else {
    //     $btn_text = __('View Details', 'segovia-core');
    //   }
    // } else {
    //   $btn_text = $btn_text ? $btn_text : __('View Details', 'segovia-core');
    // }

    // Portfolio No Space
    // $portfolio_no_space = $portfolio_no_space ? 'bpw-no-gutter' : '';

    // Turn output buffer on
    ob_start();

  if( $portfolio_style === 'bpw-style-two' ) { ?>
    <div class="segva-projects projects-style-two">
      <div class="containerRR">
  <?php   }
  if( $portfolio_style === 'bpw-style-three' ) { ?>
      <div class="segva-projects style-three-hover">
      <div class="contajiner"> 
        <?php }

if($portfolio_style === 'bpw-style-two' || $portfolio_style === 'bpw-style-three') {
  if( $portfolio_style === 'bpw-style-three' ) { ?>
      <div class="section-title-wrap">
        <h2 class="section-title"><?php echo esc_attr($portfolio_title); ?></h2> <?php } 

    if ($portfolio_filter) {
    ?>
    <div class="masonry-filters <?php echo esc_html($styled_class); ?>">
    <ul>
			<li><a href="javascript:void(0);" data-filter="*" class="active"><?php esc_html_e('Show all', 'segovia-core'); ?></a></li>
      <?php
        if ($portfolio_show_category) {
          $cat_name = explode(',', $portfolio_show_category);
          $terms = $cat_name;
          $count = count($terms);
          if ($count > 0) {
            foreach ($terms as $term) {
              echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term)) .'"><a href="#0" class="filter cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" data-filter=".'. preg_replace('/\s+/', "", strtolower($term)) .',-item" title="' . str_replace('-', " ", strtolower($term)) . '">' . str_replace('-', " ", strtolower($term)) . '</a></li>';
             }
          }
        } else {
          $terms = get_terms('portfolio_category');
          $count = count($terms);
          $i=0;
          $term_list = '';
          if ($count > 0) {
            foreach ($terms as $term) {
              $i++;
              $term_list .= '<li><a href="#0" class="filter cat-'. $term->slug .'" data-filter=".'. $term->slug .'-item" title="' . esc_attr($term->name) . '">' . $term->name . '</a></li>';
              if ($count != $i) {
                $term_list .= '';
              } else {
                $term_list .= '';
              }
            }
            echo $term_list;
          }
        }
      ?>
		</ul>
  </div> <?php
  if( $portfolio_style === 'bpw-style-three' ) { ?>
    </div> <?php } 
    } }

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
      'portfolio_category' => esc_attr($portfolio_show_category),
      'orderby' => $portfolio_orderby,
      'order' => $portfolio_order
    );

    $segva_port = new WP_Query( $args ); 

      if($portfolio_column === 'bpw-col-3') {
        $items = '3';
      } elseif($portfolio_column === 'bpw-col-4') {
        $items = '4';
      } else {
        $items = '2';
      }
    ?>

<!-- Portfolio Start -->

<?php 
if($portfolio_style === 'bpw-style-two')  { ?>
  <div class="segva-projects projects-style-two">
    <div class="containerRR">
     <div class="segva-masonry"> <?php } 

  elseif ($portfolio_style === 'bpw-style-three') { ?>
    <div class="segva-projects">
      <div class="containeddr">
        <div class="segva-masonry">  <?php }

        elseif($portfolio_style === 'bpw-style-four') { 
          ?>
          <div class="swiper-container horizontalslides keyboard windowheight">
            <div class="swiper-wrapper">


       <?php }
       elseif($portfolio_style === 'bpw-style-five') { 
          ?>
          <div class="segva-big-banner">
           
       <?php }

       else { ?>

  <div class="segva-full-wrap gallery-style-two <?php echo esc_attr($portfolio_style); ?>  <?php echo esc_attr($class); ?>">
    <a href="javascript:void(0);" class="toggle-link"><span class="toggle-separator"></span></a>
    <div class="segva-full-gallery">
      <div class="segva-masonry" data-items="<?php echo esc_attr($items); ?>" data-space="40"> <?php }

  
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

        ?>
      
      <!-- Style two -->
    <?php 
      if($portfolio_style === 'bpw-style-two')  { 
        if($large_image) { 
          $large_image = $large_image;
        } else {
          $large_image  = SEGOVIA_IMAGES.'/masonry-featured.png';
          
        } ?>
       <div class="masonry-item <?php echo esc_attr($styled_class); ?> <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
        <div class="project-item">
          <?php  if($large_image) { ?>
          <div class="segva-image"><img src="<?php echo $large_image; ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div> <?php } ?>
          <div class="project-info">
            <div class="project-info-wrap">
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
              <h4 class="project-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
            </div>
          </div>
        </div>
      </div>  <?php } elseif($portfolio_style === 'bpw-style-three') { 

         if($large_image) { 
          $large_image = $large_image;
        }else {
          $large_image  = SEGOVIA_IMAGES.'/masonry-featured.png';
          
        }   // Double Width Image Section
          $segovia_meta  = get_post_meta( get_the_ID(), 'portfolio_options', true );
          if($segovia_meta) {
            $double_width = $segovia_meta['double_header'];
          } else {
            $double_width = '';
          }

          if($double_width) {
            $width_class = 'one-block';
             if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '1170', '600', true );
            } else {$portfolio_img = $large_image;}
              $featured_img = ( $portfolio_img ) ? $portfolio_img : SEGOVIA_PLUGIN_ASTS . '/images/holders/1170x600.png';
          } else {
            $width_class = '';
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '570', '500', true );
            } else {$portfolio_img = $large_image;}
              $featured_img = ( $portfolio_img ) ? $portfolio_img : SEGOVIA_PLUGIN_ASTS . '/images/holders/570x500.png';
          }

           ?>
         <div class="masonry-item <?php echo esc_attr($width_class); ?> <?php echo esc_attr($styled_class); ?> <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
          <div class="project-item">
            <div class="segva-image"><img src="<?php echo $featured_img; ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
            <div class="project-info">
              <div class="project-info-wrap">
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
                <h4 class="project-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h4>
              </div>
              <div class="project-link"><a href="<?php esc_url(the_permalink()); ?>"></a></div>
            </div>
          </div>
        </div>
        <?php  } elseif ($portfolio_style === 'bpw-style-four') { 

          $readlink = $readmore_title ? $readmore_title : esc_html__( 'Read More', 'segovia');


         

           $portfolio_featured_image = get_post_meta( get_the_ID(), 'portfolio_featured_image', true );
            if ($portfolio_featured_image) {
              if($portfolio_featured_image['featured_image_vertical']) {
                $portfolio_vertical_img = wp_get_attachment_image_url( $portfolio_featured_image['featured_image_vertical'], 'fullsize', true );
              } else {
                $portfolio_vertical_img = $large_image;
                      } }  if($portfolio_vertical_img) { 
                  $portfolio_vertical_img = $portfolio_vertical_img;
                }else {
                  $portfolio_vertical_img  = SEGOVIA_IMAGES.'/horizontal-featured.png';
                } 
                ?>
               <div class="swiper-slide <?php echo esc_html($styled_class); ?>" style="background-image: url(<?php echo $portfolio_vertical_img; ?>);">
                  <div class="segva-slider-caption">
                    <div class="segva-table-wrap">
                      <div class="segva-align-wrap">
                        <div class="caption-wrap">
                          <h2 class="slider-caption-title animated" data-animation="flipInX"><?php esc_html(the_title()); ?></h2>
                          <div class="segva-border-link animated" data-animation="flipInX"><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> 
                            <?php echo esc_attr($readlink) ?>

                          </a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               

          <?php   } elseif ($portfolio_style === 'bpw-style-five') { 
             $readlink = $readmore_title ? $readmore_title : esc_html__( 'Read More', 'segovia');

           $portfolio_featured_image = get_post_meta( get_the_ID(), 'portfolio_featured_image', true );
            if ($portfolio_featured_image) {
              if($portfolio_featured_image['featured_image_horizontal']) {
                $portfolio_horizontal_img = wp_get_attachment_image_url( $portfolio_featured_image['featured_image_horizontal'], 'fullsize', true );
              } else {
                $portfolio_horizontal_img = $large_image;
              } } 
              if($portfolio_horizontal_img) { 
                  $portfolio_horizontal_img = $portfolio_horizontal_img;
                }else {
                  $portfolio_horizontal_img  = SEGOVIA_IMAGES.'/wide-featured.png';
                } 

             ?>
              <div class="segva-banner segva-parallax <?php echo esc_html($styled_class); ?>" style="background-image: url(<?php echo $portfolio_horizontal_img; ?>);">
                <div class="banner-wrap">
                  <div class="segva-table-wrap">
                    <div class="segva-align-wrap">
                      <div class="banner-caption">
                        <h2 class="banner-title"><?php esc_html(the_title()); ?></h2>
                        <div class="banner-info">
                         <p><?php the_excerpt(); ?></p>
                        </div>
                        <div class="segva-link"><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo esc_attr($readlink) ?> </a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

        <?php   }

        else { ?>

      <div class="masonry-item <?php echo esc_attr($styled_class); ?> <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
        <div class="project-item "> <?php
          if($large_image) { 
          $large_image = $large_image;
        } else {
          $large_image  = SEGOVIA_IMAGES.'/grid-featured.png';
          
        }  if($large_image) { ?>
          <div class="segva-image"><img src="<?php echo $large_image; ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div> <?php } ?>
          <div class="project-info">
            <div class="project-info-wrap">
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
              <h4 class="project-title"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h4>
            </div>
            <div class="project-link"><a href="<?php esc_url(the_permalink()); ?>"></a></div>
          </div>
        </div>
      </div> <?php }
       
      endwhile;
      endif;
      wp_reset_postdata(); ?>

          <?php if($portfolio_style === 'bpw-style-four') { ?>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
              </div>
        <?php  } elseif ($portfolio_style === 'bpw-style-five') { ?>
            </div>
       <?php }
         else { ?>
                </div>
              </div>
            </div> 
          
      <?php }

    if ($portfolio_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $segva_port ) );
        wp_reset_postdata();  // avoid errors further down the page
      }
    }
  if($portfolio_style === 'bpw-style-two' || $portfolio_style === 'bpw-style-three') { ?>
        </div>
      </div> <?php
    }
    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'segva_portfolio', 'segovia_portfolio_function' );
