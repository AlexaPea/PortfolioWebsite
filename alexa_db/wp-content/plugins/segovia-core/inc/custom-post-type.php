<?php

/**
 * Initialize Custom Post Type - Segovia Theme
 */

function segovia_custom_post_type() {

	$portfolio_cpt = (segovia_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	$portfolio_slug = (segovia_framework_active()) ? cs_get_option('theme_portfolio_slug') : '';
	$portfolio_cpt_slug = (segovia_framework_active()) ? cs_get_option('theme_portfolio_cat_slug') : '';

	$base = (isset($portfolio_cpt_slug) && $portfolio_cpt_slug !== '') ? sanitize_title_with_dashes($portfolio_cpt_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
	$base_slug = (isset($portfolio_slug) && $portfolio_slug !== '') ? sanitize_title_with_dashes($portfolio_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
	$label = ucfirst((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');

$noneed_portfolio_post = (segovia_framework_active()) ? cs_get_option('noneed_portfolio_post') : '';
if (!$noneed_portfolio_post) {
	// Register custom post type - Portfolio
	register_post_type('portfolio',
		array(
			'labels' => array(
				'name' => $label,
				'singular_name' => sprintf(esc_html__('%s Post', 'segovia-core' ), $label),
				'all_items' => sprintf(esc_html__('All %s', 'segovia-core' ), $label),
				'add_new' => esc_html__('Add New', 'segovia-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'segovia-core' ), $label),
				'edit' => esc_html__('Edit', 'segovia-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'segovia-core' ), $label),
				'new_item' => sprintf(esc_html__('New %s', 'segovia-core' ), $label),
				'view_item' => sprintf(esc_html__('View %s', 'segovia-core' ), $label),
				'search_items' => sprintf(esc_html__('Search %s', 'segovia-core' ), $label),
				'not_found' => esc_html__('Nothing found in the Database.', 'segovia-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'segovia-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10,
			'menu_icon' => 'dashicons-portfolio',
			'rewrite' => array(
				'slug' => $base_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'sticky',
				'page-attributes'
			)
		)
	);
	// Registered

	// Add Category Taxonomy for our Custom Post Type - Portfolio
	register_taxonomy(
		'portfolio_category',
		'portfolio',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Categories', 'segovia-core' ), $label),
				'singular_name' => sprintf(esc_html__('%s Category', 'segovia-core'), $label),
				'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'segovia-core'), $label),
				'all_items' => sprintf(esc_html__( 'All %s Categories', 'segovia-core'), $label),
				'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'segovia-core'), $label),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'segovia-core'), $label),
				'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'segovia-core'), $label),
				'update_item' => sprintf(esc_html__( 'Update %s Category', 'segovia-core'), $label),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'segovia-core'), $label),
				'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'segovia-core'), $label)
			),
			'rewrite' => array( 'slug' => $base . '_cat' ),
		)
	);

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	);

	// Add Tags Taxonomy for our Custom Post Type - Portfolio
	 register_taxonomy( 
    'portfolio_tag', 
    'portfolio', 
    array( 
        'hierarchical'  => false, 
        'labels' => array(
     'name' => sprintf(esc_html__( '%s Tags', 'segovia-core' ), $label),
     'singular_name' => sprintf(esc_html__('%s Tag', 'segovia-core'), $label),
     'search_items' =>  sprintf(esc_html__( 'Search %s Tags', 'segovia-core'), $label),
     'all_items' => sprintf(esc_html__( 'All %s Tags', 'segovia-core'), $label),
     'parent_item' => sprintf(esc_html__( 'Parent %s Tag', 'segovia-core'), $label),
     'parent_item_colon' => sprintf(esc_html__( 'Parent %s Tag:', 'segovia-core'), $label),
     'edit_item' => sprintf(esc_html__( 'Edit %s Tag', 'segovia-core'), $label),
     'update_item' => sprintf(esc_html__( 'Update %s Tag', 'segovia-core'), $label),
     'add_new_item' => sprintf(esc_html__( 'Add New %s Tag', 'segovia-core'), $label),
     'new_item_name' => sprintf(esc_html__( 'New %s Tag Name', 'segovia-core'), $label)
    ),
        'rewrite'       => true, 
        'query_var'     => true 
    )  
 );
}
	// Team - Start
  $noneed_team_post = (segovia_framework_active()) ? cs_get_option('noneed_team_post') : '';
  if (!$noneed_team_post) {
		$team_cpt  = (segovia_framework_active()) ? cs_get_option('theme_team_name') : '';
		$team_slug = (segovia_framework_active()) ? cs_get_option('theme_team_slug') : '';

		$team_base_slug = (isset($team_slug) && $team_slug !== '') ? sanitize_title_with_dashes($team_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
		$team_label     = ucfirst((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');

		// Register custom post type - Team
		register_post_type('team',
			array(
				'labels' => array(
					'name' => $team_label,
					'singular_name' => sprintf(esc_html__('%s Post', 'segovia-core' ), $team_label),
					'all_items' => sprintf(esc_html__('%s', 'segovia-core' ), $team_label),
					'add_new' => esc_html__('Add New', 'segovia-core') ,
					'add_new_item' => sprintf(esc_html__('Add New %s', 'segovia-core' ), $team_label),
					'edit' => esc_html__('Edit', 'segovia-core') ,
					'edit_item' => sprintf(esc_html__('Edit %s', 'segovia-core' ), $team_label),
					'new_item' => sprintf(esc_html__('New %s', 'segovia-core' ), $team_label),
					'view_item' => sprintf(esc_html__('View %s', 'segovia-core' ), $team_label),
					'search_items' => sprintf(esc_html__('Search %s', 'segovia-core' ), $team_label),
					'not_found' => esc_html__('Nothing found in the Database.', 'segovia-core') ,
					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'segovia-core') ,
					'parent_item_colon' => ''
				) ,
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 11,
				'menu_icon' => 'dashicons-businessman',
				'rewrite' => array(
					'slug' => $team_slug,
					'with_front' => false
				),
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'revisions',
					'sticky',
				)
			)
		);
		// Team - End
	}

// Template - Start
	$template_slug = 'template';
	$template = __('Template', 'segovia-core');

	// Register custom post type - template
	register_post_type('template',
		array(
			'labels' => array(
				'name' => $template,
				'singular_name' => sprintf(esc_html__('%s Post', 'segovia-core' ), $template),
				'all_items' => sprintf(esc_html__('%s', 'segovia-core' ), $template),
				'add_new' => esc_html__('Add New', 'segovia-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'segovia-core' ), $template),
				'edit' => esc_html__('Edit', 'segovia-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'segovia-core' ), $template),
				'new_item' => sprintf(esc_html__('New %s', 'segovia-core' ), $template),
				'view_item' => sprintf(esc_html__('View %s', 'segovia-core' ), $template),
				'search_items' => sprintf(esc_html__('Search %s', 'segovia-core' ), $template),
				'not_found' => esc_html__('Nothing found in the Database.', 'segovia-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'segovia-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon' => 'dashicons-welcome-write-blog',
			'rewrite' => array(
				'slug' => $template_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
				'sticky',
			)
		)
	);
	// Template - End

	$noneed_testimonial_post = (segovia_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
	if (!$noneed_testimonial_post) {
		// Testimonials - Start
		$testimonial_cpt = (segovia_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
		$testimonial_slug = (segovia_framework_active()) ? cs_get_option('theme_testimonial_slug') : '';
		$testimonial_cpt_slug = (segovia_framework_active()) ? cs_get_option('theme_testimonial_cat_slug') : '';

		$testi_base = (isset($testimonial_cpt_slug) && $testimonial_cpt_slug !== '') ? sanitize_title_with_dashes($testimonial_cpt_slug) : ((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');
		$testi_base_slug = (isset($testimonial_slug) && $testimonial_slug !== '') ? sanitize_title_with_dashes($testimonial_slug) : ((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');
		$testi_label = ucfirst((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');

		// Register custom post type - Testimonials
		register_post_type('testimonial',
			array(
				'labels' => array(
					'name' => $testi_label,
					'singular_name' => sprintf(esc_html__('%s Post', 'segovia-core' ), $testi_label),
					'all_items' => sprintf(esc_html__('%s', 'segovia-core' ), $testi_label),
					'add_new' => esc_html__('Add New', 'segovia-core') ,
					'add_new_item' => sprintf(esc_html__('Add New %s', 'segovia-core' ), $testi_label),
					'edit' => esc_html__('Edit', 'segovia-core') ,
					'edit_item' => sprintf(esc_html__('Edit %s', 'segovia-core' ), $testi_label),
					'new_item' => sprintf(esc_html__('New %s', 'segovia-core' ), $testi_label),
					'view_item' => sprintf(esc_html__('View %s', 'segovia-core' ), $testi_label),
					'search_items' => sprintf(esc_html__('Search %s', 'segovia-core' ), $testi_label),
					'not_found' => esc_html__('Nothing found in the Database.', 'segovia-core'),
					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'segovia-core'),
					'parent_item_colon' => ''
				) ,
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 23,
				'menu_icon' => 'dashicons-groups',
				'rewrite' => array(
					'slug' => $testi_base_slug,
					'with_front' => false
				),
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail',
					'revisions',
					'sticky',
					'page-attributes'
				)
			)
		);

		// Testimonials - End
	}

}

// Portfolio Slug
function segovia_custom_portfolio_slug() {
	$portfolio_cpt = (segovia_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	$noneed_testimonial_post = (segovia_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
	$noneed_portfolio_post = (segovia_framework_active()) ? cs_get_option('noneed_portfolio_post') : '';

	if (!$noneed_portfolio_post) {
		if ($portfolio_cpt === '') $portfolio_cp = 'portfolio';
	  $rules = get_option( 'rewrite_rules' );
	  if ( ! isset( $rules['('.$portfolio_cpt.')/(\d*)$'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
	  }
	}
  if (!$noneed_testimonial_post) {
	  // Testimonial Post
	  $testimonial_cpt = (segovia_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
		if ($testimonial_cpt === '') $testimonial_cp = 'testimonial';
	  $rules = get_option( 'rewrite_rules' );
	  if ( ! isset( $rules['('.$testimonial_cpt.')/(\d*)$'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
	  }
	}
}
add_action( 'cs_validate_save_after','segovia_custom_portfolio_slug' );

// After Theme Setup
function segovia_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	segovia_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'segovia_custom_flush_rules');
add_action('init', 'segovia_custom_post_type');

// Avoid portfolio post type as 404 page while it change
function vt_cpt_avoid_error_portfolio() {
	$portfolio_cpt = (segovia_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	$noneed_testimonial_post = (segovia_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
	$noneed_portfolio_post = (segovia_framework_active()) ? cs_get_option('noneed_portfolio_post') : '';

	if (!$noneed_portfolio_post) {
		if ($portfolio_cpt === '') $portfolio_cp = 'portfolio';
		$set = get_option('post_type_rules_flased_' . $portfolio_cpt);
		if ($set !== true){
			flush_rewrite_rules(false);
			update_option('post_type_rules_flased_' . $portfolio_cpt,true);
		}
	}
	if (!$noneed_testimonial_post) {
		// Testimonial Post
		$testimonial_cpt = (segovia_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
		if ($testimonial_cpt === '') $testimonial_cp = 'testimonial';
		$set = get_option('post_type_rules_flased_' . $testimonial_cpt);
		if ($set !== true){
			flush_rewrite_rules(false);
			update_option('post_type_rules_flased_' . $testimonial_cpt,true);
		}
	}

}
add_action('init', 'vt_cpt_avoid_error_portfolio');

$noneed_testimonial_post = (segovia_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';

if (!$noneed_testimonial_post) {

	/* ---------------------------------------------------------------------------
	 * Custom columns - Testimonial
	 * --------------------------------------------------------------------------- */
	add_filter("manage_edit-testimonial_columns", "segovia_testimonial_edit_columns");
	function segovia_testimonial_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'segovia-core' );
	  $new_columns['thumbnail'] = __('Image', 'segovia-core' );
	  $new_columns['id'] = __('Testimonial ID', 'segovia-core' );
	  $new_columns['testimonial_order'] = __('Order', 'segovia-core' );
	  $new_columns['date'] = __('Date', 'segovia-core' );

	  return $new_columns;
	}

	add_action('manage_testimonial_posts_custom_column', 'segovia_manage_testimonial_columns', 10, 2);
	function segovia_manage_testimonial_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Image' column. */
	    case 'thumbnail':
	      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
	    break;

	    /* If displaying the 'ID' column. */
	    case 'id':
	      echo '<input type="text" onfocus="this.select();" readonly="readonly" value="'. esc_attr( $post->ID ) .'">';
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}

}

// Add Filter by Category in Portfolio Type
$noneed_portfolio_post = (segovia_framework_active()) ? cs_get_option('noneed_portfolio_post') : '';
if (!$noneed_portfolio_post) {
	add_action('restrict_manage_posts', 'segovia_filter_portfolio_categories');
	function segovia_filter_portfolio_categories() {
		global $typenow;
		$post_type = 'portfolio'; // Portfolio post type
		$taxonomy  = 'portfolio_category'; // Portfolio category taxonomy
		if ($typenow == $post_type) {
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' => sprintf(esc_html__("Show All %s", 'segovia-core'), $info_taxonomy->label),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			));
		};
	}

	// Portfolio Search => ID to Term
	add_filter('parse_query', 'segovia_portfolio_id_term_search');
	function segovia_portfolio_id_term_search($query) {
		global $pagenow;
		$post_type = 'portfolio'; // Portfolio post type
		$taxonomy  = 'portfolio_category'; // Portfolio category taxonomy
		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}
}
/* ---------------------------------------------------------------------------
 * Custom columns - Portfolio
 * --------------------------------------------------------------------------- */
$noneed_portfolio_post = (segovia_framework_active()) ? cs_get_option('noneed_portfolio_post') : '';
if (!$noneed_portfolio_post) {
	add_filter("manage_edit-portfolio_columns", "segovia_portfolio_edit_columns");
	function segovia_portfolio_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'segovia-core' );
	  $new_columns['thumbnail'] = __('Image', 'segovia-core' );
	  $new_columns['portfolio_category'] = __('Categories', 'segovia-core' );
	  $new_columns['portfolio_order'] = __('Order', 'segovia-core' );
	  $new_columns['date'] = __('Date', 'segovia-core' );

	  return $new_columns;
	}
	add_action('manage_portfolio_posts_custom_column', 'segovia_manage_portfolio_columns', 10, 2);
	function segovia_manage_portfolio_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Image' column. */
	    case 'thumbnail':
	      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
	    break;

	    /* If displaying the 'Categories' column. */
	    case 'portfolio_category' :

	      $terms = get_the_terms( $post->ID, 'portfolio_category' );

	      if ( !empty( $terms ) ) {

	        $out = array();
	        foreach ( $terms as $term ) {
	            $out[] = sprintf( '<a href="%s">%s</a>',
	            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'portfolio_category' => $term->slug ), 'edit.php' ) ),
	            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'portfolio_category', 'display' ) )
	            );
	        }
	        /* Join the terms, separating them with a comma. */
	        echo join( ', ', $out );
	      }

	      /* If no terms were found, output a default message. */
	      else {
	        echo '&macr;';
	      }

	    break;

	    case "portfolio_order":
	      echo $post->menu_order;
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}
}


/* ---------------------------------------------------------------------------
 * Custom columns - Team
 * --------------------------------------------------------------------------- */
$noneed_team_post = (segovia_framework_active()) ? cs_get_option('noneed_team_post') : '';
if (!$noneed_team_post) {
	add_filter("manage_edit-team_columns", "segovia_team_edit_columns");
	function segovia_team_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'segovia-core' );
	  $new_columns['thumbnail'] = __('Image', 'segovia-core' );
	  $new_columns['name'] = __('Job Position', 'segovia-core' );
	  $new_columns['date'] = __('Date', 'segovia-core' );

	  return $new_columns;
	}

	add_action('manage_team_posts_custom_column', 'segovia_manage_team_columns', 10, 2);
	function segovia_manage_team_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Image' column. */
	    case 'thumbnail':
	      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
	    break;

	    case "name":
	    	$team_options = get_post_meta( get_the_ID(), 'team_options', true );
	      echo $team_options['team_job_position'];
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}
}
