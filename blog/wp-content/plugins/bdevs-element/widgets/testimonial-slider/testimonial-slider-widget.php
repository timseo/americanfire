<?php

namespace BdevsElement\Widget;

use Elementor\Core\Schemes\Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Testimonial_Slider extends BDevs_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name() {
        return 'testimonial_slider';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title() {
        return __( 'Testimonial Slider', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/slider/';
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'eicon-blockquote';
    }

    public function get_keywords() {
        return ['slider', 'testimonial', 'gallery', 'carousel'];
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label'              => __( 'Design Style', 'bdevselement' ),
                'type'               => Controls_Manager::SELECT,
                'options'            => [
                    'style_1' => __( 'Style 1: Testimonial with 3 item', 'bdevselement' ),
                    'style_2' => __( 'Style 2: Full width Testimonial for One Side', 'bdevselement' ),
                    'style_3' => __( 'Style 3: Full width Testimonial left author', 'bdevselement' ),
                    'style_4' => __( 'Style 4: Full width Testimonial bottom author', 'bdevselement' ),
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Slides', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'type'    => Controls_Manager::MEDIA,
                'label'   => __( 'profile Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ], 
            ]
        );

        $repeater->add_control(
            'message',
            [
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label'  => false,
                'placeholder' => __( 'Message', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis similique vitae, molestias deleniti', 'bdevselement' ),
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label'  => false,
                'placeholder' => __( 'Client Name', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( 'Tom Holand', 'bdevselement' ),
            ]
        );

        $repeater->add_control(
            'designation_name',
            [
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label'  => false,
                'placeholder' => __( 'Designation Name', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( 'CEO', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(client_name || "Carousel Item"); #>',
                'default'     => [
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
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'thumbnail',
                'default'   => 'medium_large',
                'separator' => 'before',
                'exclude'   => [
                    'custom',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __( 'Slider Item', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'item_border',
                'selector' => '{{WRAPPER}} .bdevs-slick-item',
            ]
        );

        $this->add_responsive_control(
            'item_border_radius',
            [
                'label'      => __( 'Border Radius', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .bdevs-slick-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Slide Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label'      => __( 'Content Padding', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .bdevs-slick-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-slick-content',
                'exclude'  => [
                    'image',
                ],
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Title', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .bdevs-slick-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title',
                'selector' => '{{WRAPPER}} .bdevs-slick-title',
                'scheme'   => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_subtitle',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Subtitle', 'bdevselement' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-slick-subtitle',
                'scheme'   => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __( 'Navigation - Arrow', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label'        => __( 'Position', 'bdevselement' ),
                'type'         => Controls_Manager::POPOVER_TOGGLE,
                'label_off'    => __( 'None', 'bdevselement' ),
                'label_on'     => __( 'Custom', 'bdevselement' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label'      => __( 'Vertical', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition'  => [
                    'arrow_position_toggle' => 'yes',
                ],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label'      => __( 'Horizontal', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition'  => [
                    'arrow_position_toggle' => 'yes',
                ],
                'range'      => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'arrow_border',
                'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label'      => __( 'Border Radius', 'bdevselement' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_arrow' );

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label'     => __( 'Background Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label'     => __( 'Text Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label'     => __( 'Background Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label'     => __( 'Border Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => __( 'Navigation - Dots', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label'      => __( 'Vertical Position', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label'      => __( 'Spacing', 'bdevselement' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .slick-dots li' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label'       => __( 'Alignment', 'bdevselement' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options'     => [
                    'left'   => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon'  => 'eicon-h-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'toggle'      => true,
                'selectors'   => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_dots' );
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label'     => __( 'Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label'     => __( 'Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:hover:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __( 'Active', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label'     => __( 'Color', 'bdevselement' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots .slick-active button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( empty( $settings['slides'] ) ) {
            return;
        } ?>


    <?php if ( $settings['design_style'] == 'style_4' ): ?>

        <div class="testimonial4-active owl-carousel">
			<?php foreach ( $settings['slides'] as $slide ):
                if ( !empty( $slide['image']['id'] ) ) {
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                }
            ?>
            <div class="col-xl-12">
                <div class="testimonial2-wrapper mb-30">
                    <div class="testimonial-text">
                    <?php if(!empty($slide['message'])) : ?>
					<p><?php echo bdevs_element_kses_basic( $slide['message'] ); ?></p>
					<?php endif; ?>

                        <div class="testimonial-content">
                        	<?php if(!empty( $image )) : ?>
                            <div class="testimonial2-img">
                                <img src="<?php print esc_url( $image );?>" alt="<?php echo esc_attr('img', 'zomata'); ?>" />
                            </div>
                        	<?php endif; ?>
                            <div class="testimonial-name">
								<?php if(!empty($slide['client_name'])) : ?>
                                <h4><?php echo bdevs_element_kses_basic( $slide['client_name'] ); ?></h4>
                                <span><?php echo bdevs_element_kses_basic( $slide['designation_name'] ); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>



    <?php elseif ( $settings['design_style'] == 'style_3' ): ?>

        <div class="testimonial4-active owl-carousel">
			<?php foreach ( $settings['slides'] as $slide ):
                if ( !empty( $slide['image']['id'] ) ) {
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                }
            ?>
            <div class="col-xl-12">
                <div class="testimonial2-wrapper ztestimonial2-wrapper mb-30">
                	<?php if(!empty( $image )) : ?>
                    <div class="testimonial2-img ztestimonial2-img">
                        <img src="<?php print esc_url( $image );?>" alt="img" />
                    </div>
                	<?php endif; ?>
                    <div class="testimonial-text">
                        <div class="testimonial-content z_mt0">
	                        <?php if(!empty($slide['message'])) : ?>
							<p><?php echo bdevs_element_kses_basic( $slide['message'] ); ?></p>
							<?php endif; ?>
                            <div class="testimonial-name">
                            	<?php if(!empty($slide['client_name'])) : ?>
                                <h4><?php echo bdevs_element_kses_basic( $slide['client_name'] ); ?></h4>
                                <span><?php echo bdevs_element_kses_basic( $slide['designation_name'] ); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	<?php endforeach; ?>
        </div>

     <?php elseif ( $settings['design_style'] == 'style_2' ): ?>

			<div class="testimonial-active owl-carousel">
				<?php foreach ( $settings['slides'] as $slide ):
	                if ( !empty( $slide['image']['id'] ) ) {
	                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
	                }
	            ?>
				<div class="testimonial-wrapper mb-30">
					<div class="testimonial-text">
						<?php if(!empty($slide['message'])) : ?>
						<p><?php echo bdevs_element_kses_basic( $slide['message'] ); ?></p>
						<?php endif; ?>
						<div class="testimonial-content ztestimonial-content">
							<?php 
							if(!empty( $image )) : ?>
							<div class="testimonial2-img ztestimonial2-img">
								<img src="<?php print esc_url( $image );?>" alt="img" />
							</div>
							<?php endif; ?>
							<div class="testimonial-name ztestimonial-name">
								<?php if(!empty($slide['client_name'])) : ?>
								<h4><?php echo bdevs_element_kses_basic( $slide['client_name'] ); ?></h4>
								<span><?php echo bdevs_element_kses_basic( $slide['designation_name'] ); ?></span>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>         

        <?php else: ?>

		<div class="client-active owl-carousel">
            <?php foreach ( $settings['slides'] as $slide ):
                if ( !empty( $slide['image']['id'] ) ) {
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                }
            ?>
			<div class="client-wrapper">
				<div class="client-content">
					<?php if(!empty($slide['message'])) : ?>
					<p><?php echo bdevs_element_kses_basic( $slide['message'] ); ?></p>
					<?php endif; ?>
					<div class="client-name left_zauthor">
						<?php if(!empty( $image )) : ?>
						<div class="client-img w_55">
							<img src="<?php print esc_url($image);?>" alt="img" />
						</div>
						<?php endif; ?>
						<div class="client-text zclient_text">
							<?php if(!empty($slide['client_name'])) : ?>
							<h4><?php echo bdevs_element_kses_basic( $slide['client_name'] ); ?></h4>
							<span><?php echo bdevs_element_kses_basic( $slide['designation_name'] ); ?></span>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

		</div>    

    <?php endif;?>
        <?php
	}
}
