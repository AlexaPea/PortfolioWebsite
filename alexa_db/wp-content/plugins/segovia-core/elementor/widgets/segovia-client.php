<?php
/*
 * Elementor Segovia Client Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Segovia_Client extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-segovia_client';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Client', 'segovia-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-shield';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Segovia Client widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-segovia_client'];
	}
	
	/**
	 * Register Segovia Client widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_client',
			[
				'label' => esc_html__( 'Client Options', 'segovia-core' ),
			]
		);
		$this->add_control(
			'client_column',
			[
				'label' => __( 'Columns', 'segovia-core' ),
				'type' => Controls_Manager::SELECT,
				'frontend_available' => true,
				'options' => [
					'col-3' => esc_html__( 'Column Three', 'segovia-core' ),
					'col-4' => esc_html__( 'Column Four', 'segovia-core' ),
				],
				'default' => 'segva-client-col-4',
				'description' => esc_html__( 'Select your client column.', 'segovia-core' ),
			]
		);
		$this->add_responsive_control(
			'section_alignment',
			[
				'label' => esc_html__( 'Alignment', 'segovia-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'segovia-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'segovia-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'segovia-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .client-item' => 'text-align: {{VALUE}};',
				],
			]
		);


		$repeater = new Repeater();
		$repeater->add_control(
			'client_logo_title',
			[
				'label' => esc_html__( 'Logo title', 'segovia-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'segovia-core' ),
			]
		);
		$repeater->add_control(
			'client_logo',
			[
				'label' => esc_html__( 'Logo Image', 'segovia-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				
			]
		);
		$repeater->add_control(
			'client_link',
			[
				'label' => esc_html__( 'Link', 'segovia-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'segovia-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'clientLogos_groups',
			[
				'label' => esc_html__( 'Client Logos', 'segovia-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'client_logo_title' => esc_html__( 'Client', 'segovia-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ client_logo_title }}}',
			]
		);
		$this->add_control(
			'retina_img',
			[
				'label' => esc_html__( 'Retina Image?', 'ceremony-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'ceremony-core' ),
				'label_off' => esc_html__( 'No', 'ceremony-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to resize your retina image, enable it.', 'ceremony-core' ),
			]
		);
		$this->end_controls_section();// end: Section

		
	}

	/**
	 * Render Client widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$client_style = !empty( $settings['client_style'] ) ? $settings['client_style'] : '';
		$retina_img = !empty( $settings['retina_img'] ) ? $settings['retina_img'] : '';
		$client_column = !empty( $settings['client_column'] ) ? $settings['client_column'] : '';
		$clientLogos_groups = !empty( $settings['clientLogos_groups'] ) ? $settings['clientLogos_groups'] : [];

		if($client_column === 'col-4') {
			$column_cls = ' four-column';
		} else {
			$column_cls = ' three-column';
		}

		$output = '<div class="segva-clients '.$column_cls.'">';
	
		// Group Param Output
		if( is_array( $clientLogos_groups ) && !empty( $clientLogos_groups ) ){
			foreach ( $clientLogos_groups as $each_logo ) {
				$client_logo_title = !empty( $each_logo['client_logo_title'] ) ? $each_logo['client_logo_title'] : '';
				$image_url = wp_get_attachment_url( $each_logo['client_logo']['id'] );
				$image_link = !empty( $each_logo['client_link']['url'] ) ? $each_logo['client_link']['url'] : '';
				$image_link_external = !empty( $each_logo['client_link']['is_external'] ) ? 'target="_blank"' : '';
				$image_link_nofollow = !empty( $each_logo['client_link']['nofollow'] ) ? 'rel="nofollow"' : '';
				$image_link_attr = !empty( $image_link ) ?  $image_link_external.' '.$image_link_nofollow : '';
				if($image_url){
          list($width, $height, $type, $attr) = getimagesize($image_url);
        } else {
          $width = '';
          $height = '';
        }
				if($retina_img) {
          $logo_width = $width/2;
          $logo_height = $height/2;
        } else {
          $logo_width = '';
          $logo_height = '';
        }
        $logo_width = $logo_width ? 'width: '.segovia_core_check_px($logo_width).';' : '';
  			$logo_height = $logo_height ? 'height: '.segovia_core_check_px($logo_height).';' : '';

			  if (!empty($each_logo['client_link']['url'])) {
				$output .= '<div class="client-item segva-item"><div class="segva-image"><a href="'. $each_logo['client_link']['url'] .'" '. $image_link_attr .'><img src="'. $image_url .'" alt="'.esc_attr($client_logo_title).'" style="'.esc_attr($logo_width).' '.esc_attr($logo_height).'"></a></div></div>';
			  } else {
				$output .= '<div class="segva-item client-item"><div class="segva-image"><img src="'. $image_url .'" alt="'.esc_attr($client_logo_title).'" style="'.esc_attr($logo_width).' '.esc_attr($logo_height).'"></div></div>';
			  }
			}
		}
		$output .= '</div>';

		echo $output;
		
		
	}

	/**
	 * Render Client widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Segovia_Client() );