<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Fact extends BDevs_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'fact';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Fact', 'bdevselement' );
    }

	public function get_custom_help_url() {
		return 'http://elementor.bdevs.net//widgets/fact/';
	}

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-save-o';
    }

    public function get_keywords() {
        return [ 'fact', 'image', 'counter' ];
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1: Fullwidth Counter with white text', 'bdevselement' ),
                    'style_2' => __( 'Style 2: Fullwidth Counter with white text', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );
        $this->end_controls_section(); 


        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Desccription', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'section_number',
            [
                'label' => __('Section Number', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => '25',
                'placeholder' => __('Place Section Number', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                	'design_style' => ['style_2']
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Section Title', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'We Are Startup Company. <br> Experts In Field Organic Startup Movement.',
                'placeholder' => __('Place Section Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Section Desccription', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.',
                'placeholder' => __('Place section description', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                	'design_style' => ['style_2']
                ], 
            ]
        );


        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'bdevselement'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => __('H2', 'bdevselement'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => __('H3', 'bdevselement'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => __('H4', 'bdevselement'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => __('H5', 'bdevselement'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => __('H6', 'bdevselement'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevselement'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();
 

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Fact List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater(); 

        $repeater->add_control(
            'fact_text_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#FEC931',
                'frontend_available' => true,
                'selectors' => [
                     '{{WRAPPER}}  {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                ],
                'style_transfer' => true,
                'frontend_available' => true,
            ]
        );  

        $repeater->add_control(
            'number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Fact Number', 'bdevselement' ),
                'default' => __( '25', 'bdevselement' ),
                'placeholder' => __( 'Type Fact Number', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );                

        $repeater->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Counter Title', 'bdevselement' ),
                'default' => __( 'Years Experience', 'bdevselement' ),
                'placeholder' => __( 'Type Sub Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(subtitle || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->end_controls_section();     

    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Title & Desccription', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item .counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item .counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .counter__item .counter',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .counter__item .counter',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .counter__item .counter' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blend_mode',
            [
                'label' => __( 'Blend Mode', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => __( 'Normal', 'bdevselement' ),
                    'multiply' => 'Multiply',
                    'screen' => 'Screen',
                    'overlay' => 'Overlay',
                    'darken' => 'Darken',
                    'lighten' => 'Lighten',
                    'color-dodge' => 'Color Dodge',
                    'saturation' => 'Saturation',
                    'color' => 'Color',
                    'difference' => 'Difference',
                    'exclusion' => 'Exclusion',
                    'hue' => 'Hue',
                    'luminosity' => 'Luminosity',
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item .counter' => 'mix-blend-mode: {{VALUE}};',
                ],
                'separator' => 'none',
            ]
        );

        // subtitle
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Sub Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item .cta__content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item .cta__content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .counter__item .cta__content span',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'subtitle',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .counter__item .cta__content span',
            ]
        );

        $this->add_control(
            'heading_subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .counter__item .cta__content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // content

        $this->add_control(
            '_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Content', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_desc_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_desc_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .counter__item span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desccription',
                'selector' => '{{WRAPPER}} .counter__item span',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'desccription',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .counter__item span',
            ]
        );

        $this->add_control(
            'heading_desc_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .counter__item span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section__title section__title-3' );

        // button
        if (!empty($settings['button_link'])) {
            $this->add_inline_editing_attributes( 'button_text', 'none' );
            $this->add_render_attribute( 'button_text', 'class', 'bdevs-btn-text' );
            $this->add_render_attribute( 'button', 'class', 'w-btn w-btn-purple w-100 bdevs-btn' );
            $this->add_link_attributes( 'button', $settings['button_link'] );
        }

        $this->add_inline_editing_attributes( 'description', 'intermediate' );
        $this->add_render_attribute( 'description', 'class', 'bdevs-card-text' );

        if ( empty( $settings['slides'] ) ) {
            return;
        }
        ?>

        <?php if ( $settings['design_style'] === 'style_2' ): ?>


        <div class="counter-area">
            <div class="container">
                <div class="counter-bg mb-60">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="counter-section mb-30">
                            	<?php if(!empty( $settings['section_number'] )) : ?>
                                <h1><?php echo bdevs_element_kses_intermediate( $settings['section_number'] ); ?></h1>
                            	<?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <div class="counter-info mb-30">
                                <?php if ( $settings['title'] ) : ?>
                                <h1><?php echo bdevs_element_kses_intermediate( $settings['title'] ); ?></h1>
                                <?php endif; ?>

                                <?php if(!empty( $settings['description'] )) : ?>
                                <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                            	<?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                 
                 	<?php foreach ( $settings['slides'] as $key => $slide ) : ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-wrapper mb-30">
                            <div class="counter-text">
                                <h1 class="elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>"><span class="counter elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>"><?php echo bdevs_element_kses_basic( $slide['number'] ); ?></span>+</h1>
                                <?php if(!empty($slide['subtitle'])) : ?>
                                <span><?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></span>
                            	<?php endif; ?>
                            </div>
                        </div>
                    </div>
                	<?php endforeach; ?>
                     
                </div>
            </div>
        </div>

        <?php else : ?>

		    <div class="counter-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-12">
							<div class="counter-title text-center mb-60">
								<?php if ( $settings['title'] ) : ?>
                                <h1><?php echo bdevs_element_kses_intermediate( $settings['title'] ); ?></h1>
                                <?php endif; ?>
							</div>
						</div>
		             
		             	<?php foreach ( $settings['slides'] as $key => $slide ) : ?>
	    				<div class="col-xl-3 col-lg-3 col-md-6">
	    					<div class="counter-wrapper mb-30">
	    						<div class="counter-text">
	    							<h1 class="elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>"><span class="counter elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>"><?php echo bdevs_element_kses_basic( $slide['number'] ); ?></span>+</h1>
	    							<?php if ( !empty( $slide['subtitle'] ) ) : ?>
	    							<span><?php echo bdevs_element_kses_basic( $slide['subtitle'] ); ?></span>
	    							<?php endif; ?>
	    						</div>
	    					</div>
	    				</div>
	    				<?php endforeach; ?>
		    				
		            </div>
				</div>
			</div>   

         <?php endif; ?>   

        <?php
    }
}
