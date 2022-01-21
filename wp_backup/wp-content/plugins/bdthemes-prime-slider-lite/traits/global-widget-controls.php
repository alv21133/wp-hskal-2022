<?php
	namespace PrimeSlider\Traits;
	
	use Elementor\Controls_Manager;
	use Elementor\Group_Control_Background;
	use Elementor\Group_Control_Border;
	use Elementor\Group_Control_Typography;
	use PrimeSlider\Modules\QueryControl\Controls\Group_Control_Posts;
	
	defined( 'ABSPATH' ) || die();
	
	trait Global_Widget_Controls {
		
		protected function register_pagination_controls() {

			$this->start_controls_tabs( 'tabs_pagination_style' );

			$this->start_controls_tab(
				'tab_pagination_normal',
				[
					'label' => esc_html__( 'Normal', 'bdthemes-prime-slider' ),
				]
			);

			$this->add_control(
				'pagination_color',
				[
					'label'     => esc_html__( 'Color', 'bdthemes-prime-slider' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} ul.bdt-pagination li a, {{WRAPPER}} ul.bdt-pagination li span' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name'      => 'pagination_background',
					'types'     => [ 'classic', 'gradient' ],
					'selector'  => '{{WRAPPER}} ul.bdt-pagination li a',
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name'        => 'pagination_border',
					'label'       => esc_html__( 'Border', 'bdthemes-prime-slider' ),
					'selector'    => '{{WRAPPER}} ul.bdt-pagination li a',
				]
			);

			$this->add_responsive_control(
				'pagination_offset',
				[
					'label'     => esc_html__( 'Offset', 'bdthemes-prime-slider' ),
					'type'      => Controls_Manager::SLIDER,
					'selectors' => [
						'{{WRAPPER}} .bdt-pagination' => 'margin-top: {{SIZE}}px;',
					],
				]
			);

			$this->add_responsive_control(
				'pagination_space',
				[
					'label'     => esc_html__( 'Spacing', 'bdthemes-prime-slider' ),
					'type'      => Controls_Manager::SLIDER,
					'selectors' => [
						'{{WRAPPER}} .bdt-pagination' => 'margin-left: {{SIZE}}px;',
						'{{WRAPPER}} .bdt-pagination > *' => 'padding-left: {{SIZE}}px;',
					],
				]
			);

			$this->add_responsive_control(
				'pagination_padding',
				[
					'label'     => esc_html__( 'Padding', 'bdthemes-prime-slider' ),
					'type'      => Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} ul.bdt-pagination li a' => 'padding: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
					],
				]
			);

			$this->add_responsive_control(
				'pagination_radius',
				[
					'label'     => esc_html__( 'Radius', 'bdthemes-prime-slider' ),
					'type'      => Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} ul.bdt-pagination li a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
					],
				]
			);

			$this->add_responsive_control(
				'pagination_arrow_size',
				[
					'label'     => esc_html__( 'Arrow Size', 'bdthemes-prime-slider' ),
					'type'      => Controls_Manager::SLIDER,
					'selectors' => [
						'{{WRAPPER}} ul.bdt-pagination li a svg' => 'height: {{SIZE}}px; width: auto;',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'pagination_typography',
					'label'    => esc_html__( 'Typography', 'bdthemes-prime-slider' ),
					'selector' => '{{WRAPPER}} ul.bdt-pagination li a, {{WRAPPER}} ul.bdt-pagination li span',
				]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'tab_pagination_hover',
				[
					'label' => esc_html__( 'Hover', 'bdthemes-prime-slider' ),
				]
			);

			$this->add_control(
				'pagination_hover_color',
				[
					'label'     => esc_html__( 'Color', 'bdthemes-prime-slider' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} ul.bdt-pagination li a:hover, {{WRAPPER}} ul.bdt-pagination li a:hover span' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'pagination_hover_border_color',
				[
					'label'     => esc_html__( 'Border Color', 'bdthemes-prime-slider' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} ul.bdt-pagination li a:hover' => 'border-color: {{VALUE}};',
					],
					'condition' => [
						'pagination_border_border!' => ''
					]
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name'      => 'pagination_hover_background',
					'types'     => [ 'classic', 'gradient' ],
					'selector'  => '{{WRAPPER}} ul.bdt-pagination li a:hover',
				]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'tab_pagination_active',
				[
					'label' => esc_html__( 'Active', 'bdthemes-prime-slider' ),
				]
			);

			$this->add_control(
				'pagination_active_color',
				[
					'label'     => esc_html__( 'Color', 'bdthemes-prime-slider' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} ul.bdt-pagination li.bdt-active a, {{WRAPPER}} ul.bdt-pagination li.bdt-active span' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'pagination_active_border_color',
				[
					'label'     => esc_html__( 'Border Color', 'bdthemes-prime-slider' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} ul.bdt-pagination li.bdt-active a' => 'border-color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name'     => 'pagination_active_background',
					'selector' => '{{WRAPPER}} ul.bdt-pagination li.bdt-active a',
				]
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();	

		}
		protected function register_query_controls() {
			
            $this->add_control(
                'post_source',
                [
                    'label'       => _x( 'Source', 'Posts Query Control', 'bdthemes-prime-slider' ),
                    'type'        => Controls_Manager::SELECT,
                    'options'     => [
                        ''        => esc_html__( 'Show All', 'bdthemes-prime-slider' ),
                        'by_name' => esc_html__( 'Manual Selection', 'bdthemes-prime-slider' ),
                    ],
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'post_categories',
                [
                    'label'       => esc_html__( 'Categories', 'bdthemes-prime-slider' ),
                    'type'        => Controls_Manager::SELECT2,
                    'options'     => prime_slider_get_category( 'category' ),
                    'default'     => [],
                    'label_block' => true,
                    'multiple'    => true,
                    'condition'   => [
                        'post_source' => 'by_name',
                    ],
                ]
            );
            
            $this->add_control(
                'limit',
                [
                    'label'     => esc_html__( 'Limit', 'bdthemes-prime-slider' ),
                    'type'      => Controls_Manager::NUMBER,
                    'default'   => 3,
                ]
            );
            
            $this->add_control(
                'orderby',
                [
                    'label'   => esc_html__( 'Order by', 'bdthemes-prime-slider' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'date',
                    'options' => [
                        'date'     => esc_html__( 'Date', 'bdthemes-prime-slider' ),
                        'title'    => esc_html__( 'Title', 'bdthemes-prime-slider' ),
                        'category' => esc_html__( 'Category', 'bdthemes-prime-slider' ),
                        'rand'     => esc_html__( 'Random', 'bdthemes-prime-slider' ),
                    ],
                ]
            );
            
            $this->add_control(
                'order',
                [
                    'label'   => esc_html__( 'Order', 'bdthemes-prime-slider' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'DESC' => esc_html__( 'Descending', 'bdthemes-prime-slider' ),
                        'ASC'  => esc_html__( 'Ascending', 'bdthemes-prime-slider' ),
                    ],
                ]
            );
			
		}
	}