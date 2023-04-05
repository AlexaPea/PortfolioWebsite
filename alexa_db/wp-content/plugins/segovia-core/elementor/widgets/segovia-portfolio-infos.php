<?php
/*
 * Elementor Segovia Portfolio Infos Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Portfolio_Infos extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_portfolio_infos';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Portfolio Infos', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-info-circle';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Portfolio Infos widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-segovia_portfolio_infos'];
	}
	
	/**
	 * Register Segovia Portfolio Infos widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_portfolio_info',
			[
				'label' => esc_html__( 'Portfolio Infos Options', 'segovia-core' ),
			]
		);
		
		$repeater = new Repeater();
		$repeater->add_control(
			'info_title',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'portfolio_info_option',
			[
				'label' => __( 'Portfolio Information Options', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'info' => esc_html__('Default Info', 'segovia'),
          'category' => esc_html__('Portfolio Category', 'segovia'),
          'tags' => esc_html__('Portfolio Tags', 'segovia'),
				],
				'default' => 'info',
				'description' => esc_html__( 'Select your portfolio info option.', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'info_text',
			[
				'label' => esc_html__( 'Content', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'condition' => [
					'portfolio_info_option' => array('info'),
				],
				'placeholder' => __( 'Type multiple information text by separting "Enter"', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'info_text_link',
			[
				'label' => esc_html__( 'Content Link', 'segovia-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'condition' => [
					'portfolio_info_option' => array('info'),
				],
				'placeholder' => __( 'Type multiple information link by separting "Enter" (Make equality of link and link)', 'segovia-core' ),
			]
		);
	
		$this->add_control(
			'infos_groups',
			[
				'label' => esc_html__( 'Portfolio Infos Items', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'info_title' => esc_html__( 'Item #1', 'segovia-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ info_title }}}',
			]
		);
		$this->add_control(
			'social_title',
			[
				'label' => esc_html__( 'Social Icons Title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Type your social icons title', 'segovia-core' ),
			]
		);
		$repeater = new Repeater();
		
		$repeater->add_control(
			'select_icon',
			[
				'label' => esc_html__( 'Select Icon', 'segovia-core' ),
				'type' => Controls_Manager::ICON,
				'frontend_available' => true,
				'options' => Controls_Helper_Output::get_include_icons(),
				'default' => 'fa fa-facebook',
			]
		);
		$repeater->add_control(
			'icon_link',
			[
				'label' => esc_html__( 'Icon Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'segovia-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		
		$this->add_control(
			'listItems_groups',
			[
				'label' => esc_html__( 'Social Icons', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ select_icon }}}',
			]
		);
		$this->end_controls_section();// end: Section
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_item_style',
			[
				'label' => esc_html__( 'Gereral', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'item_padding',
			[
				'label' => __( 'Padding', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .project-short-detail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Title Style
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'info_title_typography',				
				'selector' => '{{WRAPPER}} .project-short-detail h4.portfolio-wrap-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-short-detail h4.portfolio-wrap-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_bottom',
			[
				'label' => esc_html__( 'Bottom Space', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .project-short-detail h4.portfolio-wrap-title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Content Style
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Text', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'info_content_typography',
				'selector' => '{{WRAPPER}} .dl-horizontal dd',
			]
		);

		$this->start_controls_tabs( 'content_style' );
			$this->start_controls_tab(
				'title_normal',
				[
					'label' => esc_html__( 'Normal', 'segovia-core' ),
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .dl-horizontal dd, {{WRAPPER}} .dl-horizontal dd a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'content_hover',
				[
					'label' => esc_html__( 'Hover', 'segovia-core' ),
				]
			);
			$this->add_control(
				'content_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .dl-horizontal dd a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'icon_style' );
			$this->start_controls_tab(
					'icon_normal',
					[
						'label' => esc_html__( 'Normal', 'segovia-core' ),
					]
				);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-social a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'icon_hover',
					[
						'label' => esc_html__( 'Hover', 'segovia-core' ),
					]
				);
			$this->add_control(
				'icon_hover_color',
				[
					'label' => esc_html__( 'Color', 'segovia-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .segva-social a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs		
		
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .segva-social a' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'Width', 'segovia-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .segva-social a' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};line-height:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_margin',
			[
				'label' => __( 'Margin', 'segovia-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .segva-social a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section


	}

	/**
	 * Render Portfolio Infos widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$infos_groups = !empty( $settings['infos_groups'] ) ? $settings['infos_groups'] : [];
		$social_title = !empty($settings['social_title']) ? $settings['social_title'] : '';
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];
		// Turn output buffer on
		ob_start(); ?>
		<div class="project-short-detail">
    <?php
		// Group Param Output
		if( is_array( $infos_groups ) && !empty( $infos_groups ) ){
			foreach ( $infos_groups as $each_item ) {
				global $post;
				$info_title = !empty( $each_item['info_title'] ) ? $each_item['info_title'] : '';
				$info_option = !empty( $each_item['portfolio_info_option'] ) ? $each_item['portfolio_info_option'] : '';
				$info_text = !empty( $each_item['info_text'] ) ? $each_item['info_text'] : '';
				$info_text_link = !empty( $each_item['info_text_link'] ) ? $each_item['info_text_link'] : '';

        $title = $info_title ? '<span class="portfolio-wrap-title">'.$info_title.'</span>' : '';

        if ($info_text) {
		      $infos = $info_text;
		    } else {
		      $infos = array();
		    } ?>
		      <?php
		      // foreach ( $infos as $key => $information ) {
		        $meta_info = explode('<br>', nl2br($info_text, false));
		        $meta_url = explode('<br>', nl2br($info_text_link, false));

		        if($info_option === 'category' ) { ?>

            <dl class="dl-horizontal">
                <dt><?php echo esc_html($each_item['info_title']); ?></dt>
                <dd>
                  <?php
                      $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                      foreach ($category_list as $term) {
                        $term_link = get_term_link( $term );
                        echo '<span class="project-category"><a href="'. esc_url($term_link) .'"  class="category-name">'. esc_html($term->name) .'</a></span>';                   
                           }
                    ?>

                </dd>
              </dl>

          <?php } elseif($info_option === 'tags' ) { ?>
               <dl class="dl-horizontal">
                <dt><?php echo esc_html($each_item['info_title']); ?></dt>
                <dd>
                  <?php
                      $tag_list = wp_get_post_terms($post->ID, 'portfolio_tag');
                      foreach ($tag_list as $term) {
                        $term_link = get_term_link( $term );
                        echo '<span class="project-category"><a href="'. esc_url($term_link) .'"  class="category-name">'. esc_html($term->name) .'</a></span>';
                      }
                    ?>

                </dd>
              </dl>

            <?php  } else {
          if(!empty($info_text_link)) {
		          $meta_i = count($meta_info);
		          $meta_u = count($meta_url);
		          if ($meta_i > $meta_u) {
		            $meta_info = array_slice($meta_info, 0, count($meta_url));
		          } elseif($meta_u > $meta_i) {
		            $meta_url = array_slice($meta_url, 0, count($meta_info));
		          } else {
		            $meta_info = $meta_info;
		            $meta_url = $meta_url;
		          }
		          $totlal_info = array_combine($meta_info, $meta_url);
		          ?>
		            <dl class="dl-horizontal">
		            <dt><?php echo $title; ?></dt>
		            <dd>
		                <?php foreach ($totlal_info as $info => $url) {  ?>
                     <a href="<?php echo trim($url);?>"><?php echo trim($info); ?></a>
		                <?php } ?>
		            </dd>
		            </dl>
		        <?php
		        } else {
		             ?>
		            <dl class="dl-horizontal">
		            <dt><?php echo $title; ?></dt>
		            <dd>
	                <?php foreach ($meta_info as $key => $info) { ?>
                   <?php echo trim($info); ?>
	                <?php } ?>
		            </dd>
		            </dl>
		        <?php
		        } 
        }
		  }
		} if($social_title){ ?>
					<dl class="dl-horizontal">
		        <?php
		        $social_title = $social_title ? '<h4 class="portfolio-wrap-title">'.$social_title.'</h4>' : '';
			      // Group Param Output
		        echo $social_title;
							if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
		        echo '<div class="segva-social">';
							  foreach ( $listItems_groups as $each_list ) {

							  $icon_link = !empty( $each_list['icon_link'] ) ? $each_list['icon_link'] : '';
								$link_url = !empty( $icon_link['url'] ) ? esc_url($icon_link['url']) : '';
								$link_external = !empty( $icon_link['is_external'] ) ? 'target="_blank"' : '';
								$link_nofollow = !empty( $icon_link['nofollow'] ) ? 'rel="nofollow"' : '';
								$link_attr = !empty( $icon_link['url'] ) ?  $link_external.' '.$link_nofollow : '';
					   		$social_icon = ( $each_list['select_icon'] ) ? $each_list['select_icon'] : '';
							
							  echo '<a  href="'.$link_url.'" '.$link_attr.' class="'. str_replace('fa ', 'icon-', $social_icon) .'"><i class="'. $social_icon .'"></i></a>';


							  }
							echo '</div>'; 
							}
							?>
					</dl>
			<?php } ?>
		</div>
	<?php
	// Return outbut buffer
	echo ob_get_clean();
		
	}

	/**
	 * Render Portfolio Infos widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Portfolio_Infos() );
