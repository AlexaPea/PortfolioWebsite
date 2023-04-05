<?php
/*
 * The template for portfolio category pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */
get_header();
if( 'portfolio' == get_post_type() ) {
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
  <?php   }
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

    $category = get_queried_object();

    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'portfolio',
      'posts_per_page' => (int)$portfolio_limit,
      'orderby' => $portfolio_orderby,
      'portfolio_category' => $category->name,
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
      if ($portfolio_style === 'bpw-style-one') { ?>
      <div class="masonry-item">
        <div class="section-title-wrap hav-sep hav-icon hav-animation">
          <div class="sec-title">
            <h2 class="section-title"><?php echo esc_html($portfolio_title); ?></h2>
            <h2 class="section-title section-title-two"><?php echo esc_html($portfolio_sec_title); ?></h2>
          </div>
        </div>
      </div>
      <?php }
  
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
        } else {
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
        } if($large_image) { ?>
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
      </div> <?php }
       
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
              } else { echo '';} ?>
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
  <?php } if($portfolio_style != 'bpw-style-two' && $portfolio_style != 'bpw-style-three') { ?>
  </div>
  </div>
  <?php } 
    // Return outbut buffer
    echo ob_get_clean();
}

get_footer();
