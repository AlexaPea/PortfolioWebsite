<?php
/*
 * Elementor Segovia Blog Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Blog extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_blog';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Blog', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-newspaper-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Blog widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-segovia_blog'];
	}
	 */
	
	/**
	 * Register Segovia Blog widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$posts = get_posts( 'post_type="post"&numberposts=-1' );
    $PostID = array();
    if ( $posts ) {
      foreach ( $posts as $post ) {
        $PostID[ $post->ID ] = $post->ID;
      }
    } else {
      $PostID[ __( 'No ID\'s found', 'segovia' ) ] = 0;
    }
		
		$this->start_controls_section(
			'section_blog',
			[
				'label' => __( 'Blog Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'blog_style',
			[
				'label' => __( 'Blog Style', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One(List)', 'segovia-core' ),
					'style-two' => esc_html__( 'Style Two(Masonry)', 'segovia-core' ),
					'style-three' => esc_html__( 'Style Three(Grid)', 'segovia-core' ),
					'style-four' => esc_html__( 'Style Four(List Two)', 'segovia-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your blog style.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'blog_column',
			[
				'label' => __( 'Columns', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'blog_style' => array('style-two','style-three'),
				],
				'frontend_available' => true,
				'options' => [
					'segva-blog-col-2' => esc_html__( 'Column Two', 'segovia-core' ),
					'segva-blog-col-3' => esc_html__( 'Column Three', 'segovia-core' ),
					'segva-blog-col-4' => esc_html__( 'Column Four', 'segovia-core' ),
				],
				'default' => 'segva-blog-col-4',
				'description' => esc_html__( 'Select your blog column.', 'segovia-core' ),
			]
		);		
		$this->end_controls_section();// end: Section

		
		$this->start_controls_section(
			'section_blog_metas',
			[
				'label' => esc_html__( 'Meta\'s Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'blog_image',
			[
				'label' => esc_html__( 'Image', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'segovia-core' ),
				'label_off' => esc_html__( 'Hide', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_category',
			[
				'label' => esc_html__( 'Category', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'segovia-core' ),
				'label_off' => esc_html__( 'Hide', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => [
					'blog_style!' => 'style-four',
				],
			]
		);
		$this->add_control(
			'blog_date',
			[
				'label' => esc_html__( 'Date', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'segovia-core' ),
				'label_off' => esc_html__( 'Hide', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_author',
			[
				'label' => esc_html__( 'Author', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'segovia-core' ),
				'label_off' => esc_html__( 'Hide', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => [
					'blog_style!' => 'style-four',
				],
			]
		);
		$this->add_control(
			'read_more_txt',
			[
				'label' => esc_html__( 'Read More Text', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Continue Reading', 'segovia-core' ),
				'placeholder' => esc_html__( 'Type readmore text here', 'segovia-core' ),
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_blog_listing',
			[
				'label' => esc_html__( 'Listing Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'blog_limit',
			[
				'label' => esc_html__( 'Blog Limit', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__( 'Enter the number of items to show.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'blog_order',
			[
				'label' => __( 'Order', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => esc_html__( 'Asending', 'segovia-core' ),
					'DESC' => esc_html__( 'Desending', 'segovia-core' ),
				],
				'default' => 'DESC',
			]
		);
		$this->add_control(
			'blog_orderby',
			[
				'label' => __( 'Order By', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'segovia-core' ),
					'ID' => esc_html__( 'ID', 'segovia-core' ),
					'author' => esc_html__( 'Author', 'segovia-core' ),
					'title' => esc_html__( 'Title', 'segovia-core' ),
					'date' => esc_html__( 'Date', 'segovia-core' ),
				],
				'default' => 'date',
			]
		);
		$this->add_control(
			'blog_show_category',
			[
				'label' => __( 'Certain Categories?', 'segovia-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'blog_show_id',
			[
				'label' => __( 'Certain ID\'s?', 'segovia-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => $PostID,
				'multiple' => true,
			]
		);
		$this->add_control(
			'short_content',
			[
				'label' => esc_html__( 'Excerpt Length', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 55,
				'description' => esc_html__( 'How many words you want in short content paragraph.', 'segovia-core' ),
			]
		);
		$this->add_control(
			'blog_aqr',
			[
				'label' => esc_html__( 'Disable Image Resize?', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'false',
				'condition' => [
					'blog_style' => 'style-three',
				],
			]
		);
		$this->add_control(
			'blog_pagination',
			[
				'label' => esc_html__( 'Pagination', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'segovia-core' ),
				'label_off' => esc_html__( 'Hide', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_section_style',
			[
				'label' => esc_html__( 'Section', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-item' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_border',
				'label' => esc_html__( 'Border', 'segovia-core' ),
				'selector' => '{{WRAPPER}} .blog-item',
			]
		);
		$this->add_control(
			'section_border_radius',
			[
				'label' => __( 'Border Radius', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .blog-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sasblo_section_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'segovia-core' ),
				'selector' => '{{WRAPPER}} .blog-item',
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_banner_style',
			[
				'label' => esc_html__( 'Image', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'blog_style!' => 'style-four',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'banner_border',
				'label' => esc_html__( 'Border', 'segovia-core' ),
				'selector' => '{{WRAPPER}} .blog-item .segva-image img',
			]
		);
		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .blog-item .segva-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sasblo_image_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'segovia-core' ),
				'selector' => '{{WRAPPER}} .blog-item .segva-image img',
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'blog_style!' => 'style-four',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasblo_title_typography',				
				'selector' => '{{WRAPPER}} .blog-info h4',
			]
		);
		$this->start_controls_tabs( 'blog_title_style' );
			$this->start_controls_tab(
				'title_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info h4, {{WRAPPER}} .blog-info h4 a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'title_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'title_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info h4 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'selector' => '{{WRAPPER}} .blog-info p',
			]
		);
		$this->add_control(
			'excerpt_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Read More Styles
		$this->start_controls_section(
			'section_readmore_style',
			[
				'label' => esc_html__( 'Read More', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasblo_readmore_typography',
				'selector' => '{{WRAPPER}} .blog-item .segva-link a',
			]
		);
		$this->add_responsive_control(
			'readmore_icon_size',
			[
				'label' => esc_html__( 'Read More Icon Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 150,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'condition' => [
					'blog_style!' => 'style-four',
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .blog-item .segva-link a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'blog_readmore_style' );
			$this->start_controls_tab(
				'readmore_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'readmore_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-item .segva-link a, {{WRAPPER}} .blog-item .segva-link a i, {{WRAPPER}} .segva-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'readmore_brdr_color',
				[
					'label' => esc_html__( 'Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-style-four .segva-link:after' => 'background: {{VALUE}};',
					],
					'condition' => [
						'blog_style' => 'style-four',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'readmore_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'readmore_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-item .segva-link a:hover, {{WRAPPER}} .blog-item .segva-link a:hover i, {{WRAPPER}} .segva-link:hover ' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'readmore_hover_border_color',
				[
					'label' => esc_html__( 'Hover Border Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-item .segva-link a:after, {{WRAPPER}} .blog-style-four .segva-link:hover:after' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section
		
		// Meta's Section
		$this->start_controls_section(
			'section_metas_style',
			[
				'label' => esc_html__( 'Meta\'s', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'blog_style!' => 'style-four',
				],
			]
		);
		$this->add_control(
			'metas_options',
			[
				'label' => __( 'Meta\'s Options', 'segovia-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'metas_typography',
				'selector' => '{{WRAPPER}} .blog-meta span, {{WRAPPER}} .blog-meta span a',
			]
		);
		$this->add_responsive_control(
			'meta_icon_size',
			[
				'label' => esc_html__( 'Meta Icon Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 150,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .blog-item .blog-meta span i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'metas_style' );
			$this->start_controls_tab(
				'metas_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'metas_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-item .blog-meta span, {{WRAPPER}} .blog-item .blog-meta span a ' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'metas_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'metas_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-item .blog-meta span a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

		// Month
		$this->start_controls_section(
			'section_date_month_style',
			[
				'label' => esc_html__( 'Month', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'blog_style' => 'style-four',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'month_typography',
				'selector' => '{{WRAPPER}} .blog-style-four span.blog-item-month',
			]
		);
		$this->add_control(
			'month_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-style-four span.blog-item-month' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Date
		$this->start_controls_section(
			'section_date_style',
			[
				'label' => esc_html__( 'Date', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'blog_style' => 'style-four',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'selector' => '{{WRAPPER}} .blog-style-four span.blog-item-date',
			]
		);
		$this->add_control(
			'date_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-style-four span.blog-item-date' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$blog_style = !empty( $settings['blog_style'] ) ? $settings['blog_style'] : '';
		$blog_column = !empty( $settings['blog_column'] ) ? $settings['blog_column'] : '';
		$blog_limit = !empty( $settings['blog_limit'] ) ? $settings['blog_limit'] : '';
		$blog_image  = ( isset( $settings['blog_image'] ) && ( 'true' == $settings['blog_image'] ) ) ? true : false;
		$blog_category  = ( isset( $settings['blog_category'] ) && ( 'true' == $settings['blog_category'] ) ) ? true : false;
		$blog_tag  = ( isset( $settings['blog_tag'] ) && ( 'true' == $settings['blog_tag'] ) ) ? true : false;
		$blog_date  = ( isset( $settings['blog_date'] ) && ( 'true' == $settings['blog_date'] ) ) ? true : false;
		$blog_author  = ( isset( $settings['blog_author'] ) && ( 'true' == $settings['blog_author'] ) ) ? true : false;
		$blog_order = !empty( $settings['blog_order'] ) ? $settings['blog_order'] : '';
		$blog_orderby = !empty( $settings['blog_orderby'] ) ? $settings['blog_orderby'] : '';
		$blog_show_category = !empty( $settings['blog_show_category'] ) ? $settings['blog_show_category'] : [];
		$blog_show_id = !empty( $settings['blog_show_id'] ) ? $settings['blog_show_id'] : [];
		$short_content = !empty( $settings['short_content'] ) ? $settings['short_content'] : '';
		$blog_pagination  = ( isset( $settings['blog_pagination'] ) && ( 'true' == $settings['blog_pagination'] ) ) ? true : false;
		$blog_aqr  = ( isset( $settings['blog_aqr'] ) && ( 'true' == $settings['blog_aqr'] ) ) ? true : false;
		$read_more_txt = !empty( $settings['read_more_txt'] ) ? $settings['read_more_txt'] : '';
		
		// Column
		if($blog_column === 'segva-blog-col-2') {
    $blog_items = '2';
	  } elseif($blog_column === 'segva-blog-col-4') {
	    $blog_items = '4';
	  }  else {
	    $blog_items = '3';
	  }

		// Meta's to hide
		$metas_hide = (array) cs_get_option( 'theme_metas_hide' );

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
		if (segovia_framework_active()) {
			$by_text = cs_get_option('author_by_text');
			$by_text = $by_text ? $by_text : esc_html__('By', 'segovia');
		} else {
			$by_text = esc_html__('By', 'segovia');
		}

		// Style
		if ($blog_style === 'style-four') {
			$blog_style_cls = ' blog-style-four';
		} else {
			$blog_style_cls = '';
		}

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

    if ($blog_show_id) {
			$blog_show_id = json_encode( $blog_show_id );
			$blog_show_id = str_replace(array( '[', ']' ), '', $blog_show_id);
			$blog_show_id = str_replace(array( '"', '"' ), '', $blog_show_id);
      $blog_show_id = explode(',',$blog_show_id);
    } else {
      $blog_show_id = '';
    }

		$args = array(
		  // other query params here,
		  'paged' => $my_page,
		  'post_type' => 'post',
		  'posts_per_page' => (int)$blog_limit,
		  'category_name' => implode(',', $blog_show_category),
		  'orderby' => $blog_orderby,
		  'order' => $blog_order,
      'post__in' => $blog_show_id,
		);

		$segva_post = new \WP_Query( $args ); 

		 if($blog_style === 'style-two') { ?>
        <div class="segva-masonry" data-items="<?php echo esc_attr($blog_items); ?>">   
    	<?php } elseif($blog_style === 'style-three'){ ?> 
    			<div class="row">
    	  <?php } elseif($blog_style === 'style-four') { ?>
    	  <div class="segva-blog-items-wrap <?php echo esc_attr($blog_style_cls); ?>">
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
          $grid_items = 'col-lg-6 col-md-6 col-sm-12';
          if(!$blog_aqr) {
            if(class_exists('Aq_Resize')) {
                      $large_image= aq_resize( $large_image, '548', '394', true );
            } else {$large_image= $large_image;}
          } else {
            	$large_image= $large_image;
          }
          }  elseif($blog_column === 'segva-blog-col-4') {
            $grid_items = 'col-lg-3 col-md-3 col-sm-12';
            if(!$blog_aqr) {
             if(class_exists('Aq_Resize')) {
                      $large_image= aq_resize( $large_image, '270', '183', true );
            } else {$large_image= $large_image;}
           } else {
          	$large_image= $large_image;
          } }
           else {
            $grid_items = 'col-lg-4 col-md-6 col-sm-12';
           	if(!$blog_aqr) {
             if(class_exists('Aq_Resize')) {
                      $large_image= aq_resize( $large_image, '370', '250', true );
            	} else {$large_image= $large_image;}
            } else {$large_image= $large_image;}
          }
        
       } else {
          $large_image= $large_image;
       } ?>

        <?php if($blog_style === 'style-three'){ ?> <div class="<?php echo esc_attr($grid_items); ?>"> <?php } ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class('segva-blog-post'); ?>>

         <?php if($blog_style === 'style-two' || $blog_style === 'style-three') {
            if($blog_style === 'style-two') { ?>
          <div class="masonry-item branding-item" data-category="branding-item">
            <div class="blog-item"><?php } else { ?>
              <div class="segva-item blog-item"> <?php } if($blog_image) { ?>
				
              <div class="segva-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a></div> <?php } ?>
              <div class="blog-info">
              		<h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
								  <h6 class="blog-meta">
								    <?php
								   // Date Hides
								    if ( $blog_author ) { // Author Hide
								      printf(
								        '<span><i class="fa fa-user" aria-hidden="true"></i>'. esc_html__(' By', 'segovia') .' <a href="%1$s" rel="author">%2$s</a></span>',
								        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
								        get_the_author()
								      );
								       }
								         if ( $blog_date) { // Date Hide
								    ?>
								      <span><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html(get_the_date('M d, Y')); ?></span>

								    <?php }
								     if ($blog_category ) { // Category Hide
								      if ( get_post_type() === 'post') {
								        $category_list = get_the_category_list( ', ' );
								        if ( $category_list ) {
								          echo '<span><i class="fa fa-th" aria-hidden="true"></i>'. $category_list .' </span>'; //SegoviaWP
								        }
								      }
								    } // Category Hides ?>
								  </h6>
                	
					        <div class="blog-globe-content grid-blog">
										<?php
											segovia_excerpt($short_content);
										?> 
									</div>
			           <div class="segva-link">
					      	<a href="<?php echo esc_url( get_permalink() ); ?>"> <?php echo esc_html($read_more_txt); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					      </div>
              </div>
             <?php if($blog_style === 'style-two') { ?> 
            </div>
          </div>
          <?php } else { ?>
        		</div> 
        	<?php } ?>

      <?php } elseif($blog_style === 'style-four'){ ?>
      <div class="blog-item blog-default"> 
      	<?php
	        if(class_exists('Aq_Resize')) {
            $segovia_default_image= aq_resize( $large_image, '420', '400', true );
		      } else {$segovia_default_image= $large_image;} 

        if ($large_image) { if($blog_image) { ?>
        <div class="segva-image  ">
        <a href="<?php echo esc_url( get_permalink() ); ?>">
          <img src="<?php echo esc_url($segovia_default_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
        </a>
        </div>
        <?php } } // Featured Image ?>
        <div class="blog-info">
          <p>
	          <?php
		          segovia_excerpt($short_content);
		          echo segovia_wp_link_pages();
	          ?>
          </p>
          <a href="<?php echo esc_url( get_permalink() ); ?>" class="segva-link"><?php echo esc_attr($read_more_txt); ?></a>
        </div>
        <?php if($blog_date) { ?>
          <div class="blog-date">
          	<span class="blog-item-month"><?php echo get_the_date('M'); ?></span>
          	<span class="blog-item-date"><?php echo get_the_date('d'); ?></span>
          </div> 
        <?php } ?>
      </div>
      <?php } else { ?>
      <div class="blog-item blog-default"> <?php
       if(!$blog_aqr) {
        if(class_exists('Aq_Resize')) {
                $segovia_default_image= aq_resize( $large_image, '820', '540', true );
      } else {$segovia_default_image= $large_image;} 
    } else{$segovia_default_image= $large_image;} ?>
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
          if ($segovia_default_image) { if($blog_image) { ?>
          <div class="segva-image segva-popup">
	          <a href="<?php echo esc_url( get_permalink() ); ?>">
	            <img src="<?php echo esc_url($segovia_default_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
	          </a>
          </div>
        <?php } } 
      } ?>
            
      <?php
        } elseif(get_post_format() === 'video') {
            
            echo'<div class="segva-iframe">
              <iframe src="'.esc_url($video_post).'" width="640" height="360" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>';

           } else {

       ?>
        <?php if ($large_image) { if($blog_image) { ?>
        <div class="segva-image  ">
	        <a href="<?php echo esc_url( get_permalink() ); ?>">
	          <img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
	        </a>
        </div>
        <?php } } } // Featured Image ?>
        <div class="blog-info">
        	 <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
          <h6 class="blog-meta">
          	<?php if($blog_author) { ?>
            <span> <i class="fa fa-user" aria-hidden="true"></i><?php echo esc_html($by_text); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_attr(get_the_author()); ?> </a></span>
            <?php } if($blog_date) { ?>
            <span><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo get_the_date('M d, Y'); ?></span> <?php } ?>
            <?php if($blog_category) { ?>
             <span class="blog-category">
                  <?php
                  if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
                    if ( get_post_type() === 'post') {
                      $category_list = get_the_category_list( ', ' );
                      if ( $category_list ) {
                        echo '<span><i class="fa fa-th" aria-hidden="true"></i>'. $category_list .' </span>';
                      }
                    }
                  } // Category Hides ?> 
                </span> <?php } ?>
          </h6>
         
          <p><?php
       
          segovia_excerpt($short_content);
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
    <?php } elseif($blog_style === 'style-three'){ ?> 
			</div>
	  <?php } elseif($blog_style === 'style-four'){
    ?>
    </div>
    <?php }
    // Blog End

    if ($blog_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $segva_post ) );  
      } else {
      	segovia_paging_nav($segva_post->max_num_pages,"",$paged);
      }
    }
    wp_reset_postdata();  // avoid errors further down the page
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Blog() );