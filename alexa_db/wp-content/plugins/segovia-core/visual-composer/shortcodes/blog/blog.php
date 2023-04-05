<?php
/* ==========================================================
  Blog
=========================================================== */
if ( !function_exists('segovia_blog_function')) {
  function segovia_blog_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'blog_style'  => '',
      'blog_column'  => '',
      'blog_limit'  => '',
      // Enable & Disable
      'blog_category'  => '',
      'blog_date'  => '',
      'blog_author'  => '',
      'blog_comments'  => '',
      'blog_pagination'  => '',
      // Listing
      'blog_order'  => '',
      'blog_orderby'  => '',
      'blog_show_category'  => '',
      'short_content'  => '',
      'class'  => '',
      // Read More Text
      'read_more_txt'  => '',
      // Miss Align
      'miss_align_height'  => '',
    ), $atts));

    // Column
    // if ($blog_style === 'style-two') {
    //   $blog_column_class = $blog_column ? $blog_column : 'segva-blog-col-2';
    // } elseif ($blog_style === 'style-three') {
    //   $blog_column_class = $blog_column ? $blog_column : 'segva-blog-col-3';
    // } else {
    //   $blog_column_class = 'segva-blog-col-1';
    // }
    $segovia_metas_hide = (segovia_framework_active()) ? (array) cs_get_option( 'theme_metas_hide' ) : '';
    $metas_hide = (segovia_framework_active()) ? (array) cs_get_option( 'theme_metas_hide' ) : '';

    // Excerpt
    if (segovia_framework_active()) {
      $excerpt_length = cs_get_option('theme_blog_excerpt');
      $excerpt_length = $excerpt_length ? $excerpt_length : '55';
      if ($short_content) {
        $short_content = $short_content;
      } else {
        $short_content = $excerpt_length;
      }
    } else {
      $short_content = '55';
    }
// Blog Masonry Column Option
  if($blog_column === 'segva-blog-col-2') {
    $blog_items = '2';
  } elseif($blog_column === 'segva-blog-col-4') {
    $blog_items = '4';
  }  else {
    $blog_items = '3';
  }

    // Style
    // if ($blog_style === 'segva-blog-two') {
    //   $blog_style_class = 'segva-blog-one';
    // } elseif ($blog_style === 'segva-blog-three') {
    //   $blog_style_class = 'segva-blog-one segva-blog-two';
    // } else {
    //   $blog_style_class = 'segva-blog-one segva-blog-list';
    // }

    // Read More Text
    if (segovia_framework_active()) {
      $read_more_to = cs_get_option('read_more_text');
      if ($read_more_txt) {
        $read_more_txt = $read_more_txt;
      } elseif($read_more_to) {
        $read_more_txt = $read_more_to;
      } else {
        $read_more_txt = esc_html__( 'Read More', 'segovia-core' );
      }
    } else {
      $read_more_txt = $read_more_txt ? $read_more_txt : esc_html__( 'Read More', 'segovia-core' );
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Miss-Aligned
    if ( $miss_align_height ) {
      $inline_style .= '.segva-post-'. $e_uniqid .' .segva-blog-post {';
      $inline_style .= ( $miss_align_height ) ? 'min-height:'. segovia_core_check_px($miss_align_height) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' segva-post-'. $e_uniqid;

    // Turn output buffer on
    ob_start();

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
    $blog_limit = $blog_limit ? $blog_limit : '-1';
    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'post',
      'posts_per_page' => (int)$blog_limit,
      'category_name' => esc_attr($blog_show_category),
      'orderby' => $blog_orderby,
      'order' => $blog_order
    );

    $segva_post = new WP_Query( $args ); 
  
      if($blog_style === 'style-two') { ?>
              <div class="segva-masonry" data-items="<?php echo esc_attr($blog_items); ?>">   
    <?php }
      if($blog_style === 'style-three'){ ?> 
          <div class="row">
        <?php }

    if ($segva_post->have_posts()) : while ($segva_post->have_posts()) : $segva_post->the_post();
      $segovia_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
      if($segovia_post_type){
        $video_post = $segovia_post_type['video_post'];
        $gallery_post_format = $segovia_post_type['gallery_post_format'];
        $gallery_type = $segovia_post_type['gallery_type'];
      } else {
        $video_post = '';
        $gallery_post_format = '';
        $gallery_type = '';
      }
      
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];    
      // Style Two & Style Three variation
       if($blog_style === 'style-three') { 
            if($blog_column === 'segva-blog-col-2') {
          $grid_items = 'col-md-6 col-sm-6';
            if(class_exists('Aq_Resize')) {
                      $large_image= aq_resize( $large_image, '548', '394', true );
            } else {$large_image= $large_image;}

          } elseif($blog_column === 'segva-blog-col-4') {
            $grid_items = 'col-md-3 col-sm-6';
             if(class_exists('Aq_Resize')) {
                      $large_image= aq_resize( $large_image, '270', '183', true );
            } else {$large_image= $large_image;}
          }  else {
            $grid_items = 'col-md-4 col-sm-6';
             if(class_exists('Aq_Resize')) {
                      $large_image= aq_resize( $large_image, '370', '250', true );
            } else {$large_image= $large_image;}
          }
       } else {
          $large_image= $large_image;
       } ?>

         <?php if($blog_style === 'style-three'){ ?> <div class="<?php echo esc_attr($grid_items); ?>"> <?php } ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class('segva-blog-post'); ?>>

         <?php if($blog_style === 'style-two' || $blog_style === 'style-three')
          { ?>
             <?php if($blog_style === 'style-two') { ?>
          <div class="masonry-item branding-item" data-category="branding-item">
            <div class="blog-item"><?php }  else { ?>
              
              <div class="segva-item blog-item"> <?php } ?>

              <div class="segva-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a></div>
              <div class="blog-info">
                <h5 class="blog-category">
                  <?php
                  if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
                    if ( get_post_type() === 'post') {
                      $category_list = get_the_category_list( ' ' );
                      if ( $category_list ) {
                        echo '<span>'. $category_list .' </span>';
                      }
                    }
                  } // Category Hides ?> 
                </h5> 
                <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
                <h6 class="blog-meta">
                  <span><i class="fa fa-user" aria-hidden="true"></i> by <a href="#0"><?php echo esc_attr(get_the_author()); ?></a></span>
                  <span><i class="fa fa-calendar-o" aria-hidden="true"></i>  <?php echo get_the_date('M d, Y'); ?></span>
                </h6>
              </div>
             <?php if($blog_style === 'style-two') { ?> 
            </div>
          </div> <?php } else { ?>
            </div> <?php } ?>

      <?php } else { ?>
      <div class="blog-item"> <?php
        if(class_exists('Aq_Resize')) {
                $segovia_default_image= aq_resize( $large_image, '820', '540', true );
      } else {$segovia_default_image= $large_image;} ?>
        <?php if(get_post_format() === 'gallery')  { ?>
            <?php if($gallery_post_format) { ?>
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
                    <a href="'. $post_img .'"><img src="'. $post_img .'" alt="'. esc_attr($alt) .'" /></a>
                  </div>
                </div>';
            } ?>
          </div>
        <?php } else { 
          if ($segovia_default_image) { ?>
          <div class="segva-image segva-popup">
            <img src="<?php echo esc_url($segovia_default_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
          </div>
        <?php } 
      } ?>
            
      <?php
        } elseif(get_post_format() === 'video') { ?> 
            
            <div class="segva-iframe">
              <iframe src="<?php echo esc_url($video_post); ?>" width="640" height="360" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>

        <?php   } else {

       ?>
        <?php if ($large_image) { ?>
        <div class="segva-image ">
          <img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
        </div>
        <?php } } // Featured Image ?>
        <div class="blog-info">
          <h6 class="blog-meta">
            <span><i class="fa fa-user" aria-hidden="true"></i> by <a href="#0"><?php echo esc_attr(get_the_author()); ?> </a></span>
            <span><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo get_the_date('M d, Y'); ?></span>
          </h6>
          <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
          <p><?php
          $blog_excerpt = (segovia_framework_active()) ? cs_get_option('theme_blog_excerpt') : '';
          if ($blog_excerpt) {
            $blog_excerpt = $blog_excerpt;
          } else {
            $blog_excerpt = '20';
          }
          segovia_excerpt($blog_excerpt);
          echo segovia_wp_link_pages();
          ?></p>
          <div class="segva-link"><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo esc_attr($read_more_txt); ?></a></div>
        </div>
      </div>
      <?php } ?>

    </div>
    <?php if($blog_style === 'style-three'){ ?> </div> <?php } ?>
    <?php endwhile;
    endif; 
    if($blog_style === 'style-two') { ?>
              </div>   
    <?php }
      if($blog_style === 'style-three'){ ?> 
          </div>
        <?php }
    ?>
    <!-- Blog End -->

    <?php
    if ($blog_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $segva_post ) );  
      }
    }
    wp_reset_postdata();  // avoid errors further down the page
    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'segva_blog', 'segovia_blog_function' );