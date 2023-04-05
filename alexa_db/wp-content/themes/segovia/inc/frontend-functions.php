<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/* Exclude category from blog */
if( ! function_exists( 'segovia_vt_excludeCat' ) ) {
  function segovia_vt_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'segovia_vt_excludeCat');
}

/* Tag Cloud Widget - Remove Inline Font Size */
add_filter( 'widget_tag_cloud_args', 'segovia_change_tag_cloud_font_sizes');

/**
 * Change the Tag Cloud's Font Sizes.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function segovia_change_tag_cloud_font_sizes( array $args ) {
  $args['smallest'] = '13';
  $args['largest'] = '13';

  return $args;
}

/* Excerpt Length */
class SegoviaExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: segovia_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    SegoviaExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'SegoviaExcerpt::new_length');
    SegoviaExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(SegoviaExcerpt::$types[SegoviaExcerpt::$length]) )
      return SegoviaExcerpt::$types[SegoviaExcerpt::$length];
    else
      return SegoviaExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'segovia_excerpt' ) ) {
  function segovia_excerpt($length = 55) {
    SegoviaExcerpt::length($length);
  }
}

if ( ! function_exists( 'segovia_new_excerpt_more' ) ) {
  function segovia_new_excerpt_more( $more ) {
    return '...';
  }
  add_filter('excerpt_more', 'segovia_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'segovia_vt_tag_cloud' ) ) {
  function segovia_vt_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'segovia_vt_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'segovia_vt_password_form' ) ) {
  function segovia_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'segovia_vt_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'segovia_vt_maintenance_mode' ) ) {
  function segovia_vt_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );

    if ( ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'segovia_vt_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'segovia_vt_footer_widgets' ) ) {
  function segovia_vt_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4 col-sm-12'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-lg-3 col-md-6 col-sm-6'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        case 10: $widget = array('piece' => 4, 'class' => 'col-xl-3 col-md-6', 'layout' => 'col-xl-2 col-md-6 third-widget-item', 'queue' => 4, 'layout_two' => 'col-xl-4 col-md-6 first-widget-item', 'queue_two' => 1); break;
        default : $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {
        if(isset( $widget["queue_two"] ) && $widget["queue_two"] == $i ){
          $widget_cls = ( isset( $widget["queue_two"] ) && $widget["queue_two"] == $i ) ? $widget["layout_two"] : '';
          $widget_class = '';
        } else {
          $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];
          $widget_cls = '';
        }
        $output .= '<div class="'. $widget_class .' segva-item '.$widget_cls.'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';
      }
    }

    return $output;

  }
}

if( ! function_exists( 'segovia_vt_top_bar' ) ) {
  function segovia_vt_top_bar() {

    $out     = '';

    if ( ( cs_get_option( 'top_left' ) || cs_get_option( 'top_right' ) ) ) {
      $out .= '<div class="segva-topbar"><div class="container"><div class="row">';
      $out .= segovia_vt_top_bar_modules( 'left' );
      $out .= segovia_vt_top_bar_modules( 'right' );
      $out .= '</div></div></div>';
    }

    return $out;
  }
}


/* WP Link Pages */
if ( ! function_exists( 'segovia_wp_link_pages' ) ) {
  function segovia_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'segovia' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => '',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas */
if ( ! function_exists( 'segovia_post_metas' ) ) {
  function segovia_post_metas() {
  $metas_hide = (array) cs_get_option( 'single_metas_hide' );

  $by_text = cs_get_option('author_by_text');
  $by_text = $by_text ? $by_text : esc_html__( 'By', 'segovia' );
  ?>
  <h6 class="blog-meta">
    <?php
   // Date Hides
    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
      printf(
        '<span><i class="fa fa-user" aria-hidden="true"></i>'. esc_html($by_text) .' <a href="%1$s" rel="author">%2$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
       }
        
     if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ', ' );
        if ( $category_list ) {
          echo '<span><i class="fa fa-bookmark" aria-hidden="true"></i>'. $category_list .' </span>'; 
        }
      }
    } // Category Hides ?>
  </h6>
  <?php if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
    ?>
    <div class="blog-date">
      <span class="blog-item-month"><?php echo get_the_date('M'); ?></span>
      <span class="blog-item-date"><?php echo get_the_date('d'); ?></span>
    </div>
  <?php }

  }
}

// single pagination portfolio
if ( ! function_exists( 'segovia_portfolio_next_prev' ) ) {
function segovia_portfolio_next_prev() {
  global $post;
    $p_home_url = cs_get_option('portfolio_home_url');
    $next_port = cs_get_option('next_port');
    $prev_port = cs_get_option('prev_port');
    $previous_project = $prev_port ? $prev_port : esc_html__( 'PREV', 'segovia' );
    $next_project = $next_port ? $next_port : esc_html__( 'NEXT', 'segovia' );
    ?>

     <div class="segva-controls-links qw">
        <div class="row">
          <div class="col-md-5 col-sm-5 segva-item">
            <div class="segva-table-wrap">
              <div class="segva-align-wrap">
                <?php $prev_post = get_adjacent_post(false, '', true);
              if(!empty($prev_post)) {
                echo '<a href="' . esc_url(get_permalink($prev_post->ID)) . '" class="control-link previous">
                    <span class="control-link-title"><span class="control-link-text">' . esc_html($previous_project) . '</span></span>
                  </a>';
                } ?>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-2 segva-item text-center">
            <div class="segva-table-wrap">
              <div class="segva-align-wrap">
                <a href="<?php echo esc_url( $p_home_url ); ?>" class="grid-view-link">
                  <span class="grid-view-square"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-sm-5 segva-item text-right">
            <div class="segva-table-wrap">
              <div class="segva-align-wrap">
                <?php $next_post = get_adjacent_post(false, '', false);
            if(!empty($next_post)) {
                echo '<a href="' . esc_url(get_permalink($next_post->ID)) . '" class="control-link next">
                  <span class="control-link-title"><span class="control-link-text">'. esc_html($next_project) .'</span></span>
                </a>'; }
                ?>
              </div>
            </div>
          </div>

        </div>
      </div>
<?php
}
}

/* Password Form */
function segovia_password_form() {
  // global $post;
  global $post;
  $password_title = cs_get_option('password_title');
  $password_content = cs_get_option('password_content');
  $password_title = ( $password_title ) ? $password_title : esc_html__( 'PASSWORD PROTECTED', 'segovia' );
  $password_proof_bg = cs_get_option('password_proof_bg');
  $password_proof_icon = cs_get_option('password_proof_icon');
  $password_proof_bg = ( $password_proof_bg ) ? wp_get_attachment_url( $password_proof_bg )  :'';
  $password_proof_icon = ( $password_proof_icon ) ? wp_get_attachment_url( $password_proof_icon )  :get_template_directory_uri().'/assets/images/icons/lock-icon.png';
  $pass_content = $password_content ? '<p>'.$password_content.'</p>' : '';

  $pass = '<div class="segva-full-wrap">
    <div class="segva-full-background" style="background-image:url('.$password_proof_bg.');">
      <div class="full-background-wrap">
        <div class="vertical-scroll">
          <div class="segva-table-wrap">
            <div class="segva-align-wrap">
              <div class="container">
                <div class="segva-password-protected">
                  <div class="segva-icon">
                    <img src="'.esc_url($password_proof_icon).'" alt="'.esc_attr( $password_title ).'" width="70">
                  </div>
                  <h3 class="protected-title">'.esc_html( $password_title ).'</h3>
                  '.$pass_content.'
                  <form action="'.esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ).'" method="post"><p><input name="post_password" placeholder="'. esc_attr__( 'Password', 'segovia' ) .'" type="password"/><input type="submit" value="" name="'. esc_attr__( 'Submit', 'segovia' ) .'" /></p></form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>';
  return $pass;
}
add_filter('the_password_form' , 'segovia_password_form');

// Related Post
function segovia_related_post() {
 // get the custom post type's taxonomy terms
 global $post;
 $related_post_title = cs_get_option('related_post_title');
 $related_post_limit = cs_get_option('related_post_limit');
 $related_post_order = cs_get_option('related_post_order');
 $related_post_orderby = cs_get_option('related_post_orderby');
$custom_taxterms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );
$metas_hide = (array) cs_get_option( 'theme_metas_hide' );

$title = $related_post_title ? $related_post_title : esc_html__( 'Related Posts', 'segovia' );
$related_post_limit = $related_post_limit ? $related_post_limit : '2';

// arguments
$args = array(
'post_type' => 'post',
'post_status' => 'publish',
'posts_per_page' => (int)$related_post_limit,
'orderby' => $related_post_orderby,
'order' => $related_post_order,
'tax_query' => array(
  array(
    'taxonomy' => 'category',
    'field' => 'id',
    'terms' => $custom_taxterms
  )
),
'post__not_in' => array ($post->ID),
);
$related_items = new WP_Query( $args );

?>
  <?php if ($related_items->have_posts()) : ?>
   <div class="segva-related-posts">
      <h4 class="related-post-title"><?php echo esc_html($title); ?></h4>
      <div class="row">
  <?php while ( $related_items->have_posts() ) : $related_items->the_post();

  // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $large_image = $large_image[0];
    if(class_exists('Aq_Resize')) {
      $project_img = aq_resize( $large_image, '395', '280', true );
    } else {$project_img = $large_image;}
    ?>
      <div class="col-md-6 col-sm-6">
        <div class="segva-item blog-item">
           <?php if($project_img){ ?>
          <div class="segva-image"><a href="<?php esc_url(the_permalink()); ?>"><img src="<?php echo esc_url($project_img); ?>" alt="<?php the_title_attribute(); ?>"></a></div>
           <?php } ?>
          <div class="blog-info">
             <h6 class="blog-meta">
                <?php
               // Date Hides
                if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
                ?>
                  <span> <?php echo esc_html(get_the_date('M d, Y')); ?></span>

                <?php }
                 if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
                  if ( get_post_type() === 'post') {
                    $category_list = get_the_category_list( ', ' );
                    if ( $category_list ) {
                      echo '<span>'. $category_list .' </span>'; 
                    }
                  }
                } // Category Hides ?>
              </h6>
            <h4 class="blog-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
         
          </div>
        </div>
      </div>
<?php
endwhile;
echo '</div></div>';
endif;
// Reset Post Data
wp_reset_postdata();
}

/* Author Info */
if ( ! function_exists( 'segovia_author_info' ) ) {
  function segovia_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

    // variables
    $author_text = cs_get_option('author_text');
    $author_text = $author_text ? $author_text : esc_html__( 'Author: ', 'segovia' );
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="segva-author-info">
      <div class="author-avatar">
        <a href="<?php echo esc_url($website_url); ?>"  <?php echo esc_attr($target); ?>><?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?></a>
      </div>
      <div class="author-content">
        <div class="author-pro">
        <h3 class="author-info-title">
          <?php echo esc_html($author_text); ?>
          <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo esc_html(get_the_author_meta('first_name')).' '.get_the_author_meta('last_name'); ?></a>
        </h3>
        </div>
        <p><?php echo esc_html(get_the_author_meta( 'description' )); ?></p>
        <?php
        $facebook = get_the_author_meta('facebook');
        $twitter  = get_the_author_meta('twitter');
        $vine = get_the_author_meta('vine');
        $pinterest = get_the_author_meta('pinterest');
        $instagram = get_the_author_meta('instagram');
        if(!empty($facebook)||!empty($twitter)||!empty($vine)||!empty($pinterest)||!empty($instagram)) {?>
        <div class="segva-social">
           <?php
          if(!empty($facebook)) {
          echo '<a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook"></i></a>';
          }
           if(!empty($twitter)) {
          echo '<a href="'.$twitter.'" target="_blank"><i class="fa fa-twitter"></i></a>';
          }
          if(!empty($vine)) {
          echo '<a href="'.$vine.'" target="_blank"><i class="fa fa-vine"></i></a>';
          }
          if(!empty($pinterest)) {
          echo '<a href="'.$pinterest.'" target="_blank"><i class="fa fa-pinterest"></i></a>';
          }
          if(!empty($instagram)) {
          echo '<a href="'.$instagram.'" target="_blank"><i class="fa fa-instagram"></i></a>';
          }
         ?>
        </div>
        <?php } ?>
      </div>
    </div>
<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'segovia_comment_modification' ) ) {
  function segovia_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-item">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 100 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="segva-comments-meta">
        <h4><?php printf( '%s', get_comment_author() ); ?>
        <span class="comments-date">
          <?php echo get_comment_date('M d Y'); echo ' - '; ?>
          <span class="caps"><?php echo get_comment_time(); ?></span>
        </span>
        </h4>
      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'segovia' ); ?></em>
      <?php endif; ?>
      <div class="comment-area">
        <?php comment_text(); ?>
        <div class="comments-reply segva-link-wrap">
          <?php
            comment_reply_link( array_merge( $args, array(
            'reply_text' => '<span class="comment-reply-link segva-link">'. esc_html__( 'Reply', 'segovia' ) .'</span>',
            'before' => '',
            'class'  => '',
            'depth' => $depth,
            'max_depth' => $args['max_depth']
            ) ) );
          ?>
        </div>
      </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Comments Form - Textarea next to Normal Fields */
if( ! function_exists( 'segovia_move_comment_field' ) ) {
  add_filter( 'comment_form_fields', 'segovia_move_comment_field' );
  function segovia_move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
  }
}

/* Title Area */
if ( ! function_exists( 'segovia_title_area' ) ) {
  function segovia_title_area() {

    global $post, $wp_query;

    // Get post meta in all type of WP pages
    $segovia_id    = ( isset( $post ) ) ? $post->ID : 0;
    $segovia_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $segovia_id;
    $segovia_id    = ( segovia_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $segovia_id;
    $segovia_meta  = get_post_meta( $segovia_id, 'page_type_metabox', true );
    if ($segovia_meta && (!is_archive() || segovia_is_woocommerce_shop())) {
      $custom_title = $segovia_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } elseif(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    /**
     * For strings with necessary HTML, use the following:
     * Note that I'm only including the actual allowed HTML for this specific string.
     * More info: https://codex.wordpress.org/Function_Reference/wp_kses
     */
    $allowed_title_area_tags = array(
        'a' => array(
          'href' => array(),
        ),
        'span' => array(
          'class' => array(),
        )
    );

    if( $custom_title ) {
      echo esc_html($custom_title);
    } elseif ( is_home() ) {
      bloginfo('description');
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'segovia' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__( 'Posts Tagged: ', 'segovia' ));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'segovia' ), $allowed_title_area_tags ), get_the_date());
      } elseif ( is_month() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'segovia' ), $allowed_title_area_tags ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'segovia' ), $allowed_title_area_tags ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( wp_kses( __( 'Posts by: <span>%s</span>', 'segovia' ), $allowed_title_area_tags ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( segovia_is_woocommerce_shop() ) {
        echo esc_html($custom_title);
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'segovia' );
      }
    } elseif( is_404() ) {
      esc_html_e( '404', 'segovia' );
    } else {
      the_title();
    }

  }
}

// Blog Single

if ( ! function_exists( 'segovia_blog_next_prev' ) ) {
function segovia_blog_next_prev() {
  global $post;
    $next_blog = cs_get_option('next_blog');
    $prev_blog = cs_get_option('prev_blog');
    $previous_project = $prev_blog ? $prev_blog : esc_html__( 'Prev Post', 'segovia' );
    $next_project = $next_blog ? $next_blog : esc_html__( 'Next Post', 'segovia' );

    $theme_blog_home = cs_get_option('theme_blog_home');
    if($theme_blog_home) {
      $blog_link = $theme_blog_home;
    } else {
      $blog_link = get_permalink( get_option( 'page_for_posts' ) );
    }

    ?>
   <div class="segva-controls-links">
        <div class="row">
          <div class="col-md-5 col-sm-5 segva-item">
            <div class="segva-table-wrap">
              <div class="segva-align-wrap">
              <?php $prev_post = get_adjacent_post(false, '', true);
                if(!empty($prev_post)) {
                  $segovia_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id($prev_post->ID), 'fullsize', false, '' );
                  $segovia_large_image = $segovia_large_image[0];
                  echo '<a href="' . esc_url(get_permalink($prev_post->ID)) . '" class="control-link previous">';
                  
                  echo '<span class="control-link-title"><span class="control-link-text">' . esc_html($previous_project) . '</span></span>';
                    ?>
                  </a>
              <?php } ?>
              </div>
            </div>
          </div>

          <div class="col-md-2 col-sm-2 text-center">
              <a href="<?php echo esc_url($blog_link); ?>" class="post-grid-view">
                <span class="grid-icon"></span>
                <span class="grid-icon"></span>
              </a>
            </div>
          
          <div class="col-md-5 col-sm-5 segva-item text-right">
            <div class="segva-table-wrap">
              <div class="segva-align-wrap">
                <?php $next_post = get_adjacent_post(false, '', false);
                if(!empty($next_post)) {
                  $segovia_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id($next_post->ID), 'fullsize', false, '' );
                  $segovia_large_image = $segovia_large_image[0];
                    echo '<a href="' . esc_url(get_permalink($next_post->ID)) . '" class="control-link next">';
                    echo '<span class="control-link-title"><span class="control-link-text">'. esc_html($next_project) .'</span></span>';
                    
                  ?>
                </a>
                 <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php
}
}

// Default Pagination
if ( ! function_exists( 'segovia_default_paging_nav' ) ) {
  function segovia_default_paging_nav($nav_query = NULL) {
    if ( function_exists('wp_pagenavi')) {
      echo '<div class="pagination-wrap"><div class="segva-pagination"><div class="segva-pagenavi">';
      wp_pagenavi();
      echo '</div></div></div>';
    } else {
      global $wp_query;
      $big = 999999999;
      $current = max( 1, get_query_var('paged') );
      $total = ($nav_query != NULL) ? $nav_query->max_num_pages : $wp_query->max_num_pages;

      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo '<div class="pagination-wrap"><div class="segva-pagination"><div class="segva-pagenavi">';
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => '<i class="fa fa-angle-left"></i>',
        'next_text' => ' <i class="fa fa-angle-right"></i>',
        'current' => $current,
        'total' => $total,
        'type' => 'list'
      ));
      echo '</div></div></div>';
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}

if ( ! function_exists( 'segovia_paging_nav' ) ) {
  function segovia_paging_nav($numpages = '', $pagerange = '', $paged='') {
    if (empty($pagerange)) {
      $pagerange = 2;
    }
    if (empty($paged)) {
      $paged = 1;
    } else {
      $paged = $paged;
    }
    if ($numpages == '') {
      global $wp_query;
      $numpages = $wp_query->max_num_pages;
      if(!$numpages) {
        $numpages = 1;
      }
    }
    $big = 999999999; ?>
    <div class="segva-pagination">
      <?php echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?page=%#%',
        'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        'current' => $paged,
        'total' => $numpages,
        'type' => 'list'
      )); ?>
  </div>
<?php
  }
}

// To Remove the WP-Widget Deprecated Method error
add_filter('deprecated_constructor_trigger_error', '__return_false');

/**
 * Filter the categories archive widget to add a span around post count
 */
function segovia_cat_count_span( $links ) {
  $links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
}
add_filter( 'wp_list_categories', 'segovia_cat_count_span' );

/**
 * Filter the archives widget to add a span around post count
 */
function segovia_archive_count_span( $links ) {
  $links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
}
add_filter( 'get_archives_link', 'segovia_archive_count_span' );