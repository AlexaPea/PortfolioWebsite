<?php
/*
 * Recent Post Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

class segovia_recent_posts extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'segva-recent-blog',
      VTHEME_NAME_P . __( ': Recent Posts', 'segovia' ),
      array(
        'classname'   => 'widget-recent-post',
        'description' => VTHEME_NAME_P . __( ' widget that displays recent posts.', 'segovia' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => __( 'Recent Posts', 'segovia' ),
      'ptypes'   => 'post',
      'limit'    => '3',
      'date'     => true,
      'category' => '',
      'order' => '',
      'orderby' => '',
    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'segovia' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $title_field, $title_value );

    // Post Type
    $ptypes_value = esc_attr( $instance['ptypes'] );
    $ptypes_field = array(
      'id'    => $this->get_field_name('ptypes'),
      'name'  => $this->get_field_name('ptypes'),
      'type' => 'select',
      'options' => 'post_types',
      'default_option' => __( 'Select Post Type', 'segovia' ),
      'title' => __( 'Post Type :', 'segovia' ),
    );
    echo cs_add_element( $ptypes_field, $ptypes_value );

    // Limit
    $limit_value = esc_attr( $instance['limit'] );
    $limit_field = array(
      'id'    => $this->get_field_name('limit'),
      'name'  => $this->get_field_name('limit'),
      'type'  => 'text',
      'title' => __( 'Limit :', 'segovia' ),
      'help' => __( 'How many posts want to show?', 'segovia' ),
    );
    echo cs_add_element( $limit_field, $limit_value );

    // Date
    $date_value = esc_attr( $instance['date'] );
    $date_field = array(
      'id'    => $this->get_field_name('date'),
      'name'  => $this->get_field_name('date'),
      'type'  => 'switcher',
      'on_text'  => __( 'Yes', 'segovia' ),
      'off_text'  => __( 'No', 'segovia' ),
      'title' => __( 'Display Date :', 'segovia' ),
    );
    echo cs_add_element( $date_field, $date_value );

    // Category
    $category_value = esc_attr( $instance['category'] );
    $category_field = array(
      'id'    => $this->get_field_name('category'),
      'name'  => $this->get_field_name('category'),
      'type'  => 'text',
      'title' => __( 'Category :', 'segovia' ),
      'help' => __( 'Enter category slugs with comma(,) for multiple items', 'segovia' ),
    );
    echo cs_add_element( $category_field, $category_value );

    // Order
    $order_value = esc_attr( $instance['order'] );
    $order_field = array(
      'id'    => $this->get_field_name('order'),
      'name'  => $this->get_field_name('order'),
      'type' => 'select',
      'options'   => array(
        'ASC' => 'Ascending',
        'DESC' => 'Descending',
      ),
      'default_option' => __( 'Select Order', 'segovia' ),
      'title' => __( 'Order :', 'segovia' ),
    );
    echo cs_add_element( $order_field, $order_value );

    // Orderby
    $orderby_value = esc_attr( $instance['orderby'] );
    $orderby_field = array(
      'id'    => $this->get_field_name('orderby'),
      'name'  => $this->get_field_name('orderby'),
      'type' => 'select',
      'options'   => array(
        'none' => __('None', 'segovia'),
        'ID' => __('ID', 'segovia'),
        'author' => __('Author', 'segovia'),
        'title' => __('Title', 'segovia'),
        'name' => __('Name', 'segovia'),
        'type' => __('Type', 'segovia'),
        'date' => __('Date', 'segovia'),
        'modified' => __('Modified', 'segovia'),
        'rand' => __('Random', 'segovia'),
      ),
      'default_option' => __( 'Select OrderBy', 'segovia' ),
      'title' => __( 'OrderBy :', 'segovia' ),
    );
    echo cs_add_element( $orderby_field, $orderby_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']        = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['ptypes']       = strip_tags( stripslashes( $new_instance['ptypes'] ) );
    $instance['limit']        = strip_tags( stripslashes( $new_instance['limit'] ) );
    $instance['date']         = strip_tags( stripslashes( $new_instance['date'] ) );
    $instance['category']     = strip_tags( stripslashes( $new_instance['category'] ) );
    $instance['order']        = strip_tags( stripslashes( $new_instance['order'] ) );
    $instance['orderby']      = strip_tags( stripslashes( $new_instance['orderby'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title          = apply_filters( 'widget_title', $instance['title'] );
    $ptypes         = $instance['ptypes'];
    $limit          = $instance['limit'];
    $display_date   = $instance['date'];
    $category       = $instance['category'];
    $order          = $instance['order'];
    $orderby        = $instance['orderby'];

    $args = array(
      // other query params here,
      'post_type' => esc_attr($ptypes),
      'posts_per_page' => (int)$limit,
      'orderby' => esc_attr($orderby),
      'order' => esc_attr($order),
      'category_name' => esc_attr($category),
      'ignore_sticky_posts' => 1,
     );

     $segovia_rpw = new WP_Query( $args );
     global $post;

    // Display the markup before the widget
    echo $before_widget;

    if ( $title ) {
      echo $before_title . $title . $after_title;
    }

   
    if ($segovia_rpw->have_posts()) : while ($segovia_rpw->have_posts()) : $segovia_rpw->the_post();
    $segovia_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $segovia_large_image = $segovia_large_image[0];
    if(class_exists('Aq_Resize')) {
      $blog_img = aq_resize( $segovia_large_image, '85', '80', true );
    } else {$blog_img = $segovia_large_image;}
  ?>
    <div class="recent-post">
      <div class="segva-image">
        <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($blog_img); ?>" alt="<?php the_title_attribute(); ?>"></a>
      </div>
    <h5 class="post-title"><a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a></h5>
    <?php if ($display_date === '1') { ?>
    <h5 class="post-time">
    <?php
      echo get_the_date('F'); esc_html_e( ' ', 'segovia' );
      echo get_the_date('d,'). ' ' .get_the_date('Y');
    ?>
    </h5>
   </div>
    <?php } ?>
 

  <?php
    endwhile; endif;

    wp_reset_postdata();
    // Display the markup after the widget
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
function segovia_recent_posts_function() {
  register_widget( "segovia_recent_posts" );
}
add_action( 'widgets_init', 'segovia_recent_posts_function' );