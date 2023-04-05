<?php
/*
 * Elementor Segovia Team Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$noneed_team_post = (segovia_framework_active()) ? cs_get_option('noneed_team_post') : '';

if (!$noneed_team_post) {
class Segovia_Team extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_team';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Team', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-users';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Team widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	
	public function get_script_depends() {
		return ['vt-segovia_team'];
	}
	
	/**
	 * Register Segovia Team widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_team_settings',
			[
				'label' => esc_html__( 'Team Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'team_list_heading',
			[
				'label' => __( 'Listing', 'segovia-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'team_aqr',
			[
				'label' => esc_html__( 'Disable Image Resize?', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'team_limit',
			[
				'label' => esc_html__( 'Limit', 'segovia-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => -1,
				'step' => 1,
			]
		);
		$this->add_control(
			'team_order',
			[
				'label' => esc_html__( 'Order', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__('DESC', 'segovia-core'),
					'ASC' => esc_html__('ASC', 'segovia-core'),
				],
			]
		);
		$this->add_control(
			'team_orderby',
			[
				'label' => esc_html__( 'Order By', 'segovia-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => '',
				'options' => [
					'none' => esc_html__('None', 'segovia-core'),
					'ID' => esc_html__('ID', 'segovia-core'),
					'author' => esc_html__('Author', 'segovia-core'),
					'title' => esc_html__('Name', 'segovia-core'),
					'date' => esc_html__('Date', 'segovia-core'),
					'rand' => esc_html__('Rand', 'segovia-core'),
					'menu_order' => esc_html__('Menu Order', 'segovia-core'),
				],
			]
		);
		$this->add_control(
			'overly_color',
			[
				'label' => esc_html__( 'Image Overley Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mate-info' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'overlay_text',
			[
				'label' => esc_html__( 'Hide Overlay Letter?', 'segovia-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'segovia-core' ),
				'label_off' => esc_html__( 'No', 'segovia-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->end_controls_section();// end: Section

	
		
		$this->start_controls_section(
			'section_name_style',
			[
				'label' => esc_html__( 'Name', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',				
				'selector' => '{{WRAPPER}} .mate-info h5',
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mate-info h5, {{WRAPPER}} .mate-info h5 a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'name_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mate-info h5, {{WRAPPER}} .mate-info h5 a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_profession_style',
			[
				'label' => esc_html__( 'Profession', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'profession_typography',
				'selector' => '{{WRAPPER}} .mate-info p',
			]
		);
		$this->add_control(
			'profession_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mate-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Social Icons
		$this->start_controls_section(
			'section_social_style',
			[
				'label' => esc_html__( 'Social Icons', 'segovia-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'social_style' );
		$this->start_controls_tab(
			'social_normal',
			[
				'label' => esc_html__( 'Normal', 'segovia-core' ),
			]
		);
		$this->add_control(
			'social_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mate-item .segva-social a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
			'social_hover',
			[
				'label' => esc_html__( 'Hover', 'segovia-core' ),
			]
		);
		$this->add_control(
			'social_hover_color',
			[
				'label' => esc_html__( 'Color', 'segovia-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mate-item .segva-social a:hover ' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
	}

	/**
	 * Render Team widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		// Team query
		$team_limit = !empty( $settings['team_limit'] ) ? $settings['team_limit'] : '';
		$team_order = !empty( $settings['team_order'] ) ? $settings['team_order'] : '';
		$team_orderby = !empty( $settings['team_orderby'] ) ? $settings['team_orderby'] : '';
	
		$team_aqr  = ( isset( $settings['team_aqr'] ) && ( 'true' == $settings['team_aqr'] ) ) ? true : false;
		$overlay_text  = ( isset( $settings['overlay_text'] ) && ( 'true' == $settings['overlay_text'] ) ) ? true : false;

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
		$team_limit = $team_limit ? $team_limit : '-1';
		$args = array(
		  'paged' => $my_page,
		  'post_type' => 'team',
		  'posts_per_page' => (int) $team_limit,
		 
		  'orderby' => $team_orderby,
		  'order' => $team_order,
		);
		$count = 0;
		$segovia_team = new \WP_Query( $args );
		if ($segovia_team->have_posts()) : ?>
    	<div class="segva-team-mates">
    		<div class="row">
			<?php
			  while ($segovia_team->have_posts()) : $segovia_team->the_post();
				$count++;
				$team_options = get_post_meta( get_the_ID(), 'team_options', true );
				if($team_options) {
				  $team_job_position = $team_options['team_job_position'];
			   	$team_link = $team_options['team_custom_link'];
				} else {
				  $team_job_position = '';
				  $team_link = '';
				}
				$team_socials = $team_options['social_icons'];
		  	if ($team_link) {
          $team_url = $team_link;
        } else {
          $team_url = get_the_permalink();
        }

        if($overlay_text) {
        	$overlay_txt = ' hide-overlay-text';
        } else {
        	$overlay_txt = '';
        }

				// Featured Image
				$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
				$large_image = $large_image[0];
				$abt_title = get_the_title();
				if ($team_aqr) {
					$team_featured_img = $large_image;
				} else {
					if(class_exists('Aq_Resize')) {
						$team_img = aq_resize( $large_image, '433', '503', true );
					} else {$team_img = $large_image;}
					$team_featured_img = ( $team_img ) ? $team_img : SEGOVIA_PLUGIN_ASTS . '/images/holders/433x503.png';
				}
				?>
		      <div class="segva-item mate-item <?php echo esc_attr($overlay_txt); ?>">
		        <?php if ($large_image) { ?>
		        <div class="segva-image"><a href="<?php echo esc_url($team_url); ?>"><img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_html($abt_title); ?>"></a>
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
				<?php
			  endwhile;
				?>
		</div></div>
		<!-- team End -->
		<?php
		endif;

		wp_reset_postdata();
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Team widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Team() );
}

