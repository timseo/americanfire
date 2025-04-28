<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Slider extends BDevs_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.1
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'slider';
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
        return __( 'Slider', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/slider/';
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
        return 'eicon-slider-full-screen';
    }

    public function get_keywords() {
        return [ 'slider', 'image', 'gallery', 'carousel' ];
    }

    protected function register_content_controls() {


        // Background Overlay
        $this->start_controls_section(
            '_section_background_overlay',
            [
                'label' => __( 'Background Overlay', 'elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1','style_2'],
                ], 
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'bdevselement' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .elementor-background-overlay,{{WRAPPER}} .slider__content-2::before',
            ]
        );

        $this->add_control(
            'background_overlay_opacity',
            [
                'label' => __( 'Opacity', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => .5,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .elementor-background-overlay,{{WRAPPER}} .slider__content-2::before' => 'opacity: {{SIZE}};',
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Slides', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1: Left Aligned Content', 'bdevselement' ),
                    'style_2' => __( 'Style 2: Center Aligned Content', 'bdevselement' ),
                    'style_3' => __( 'Style 3: Center Aligned Content with bold title', 'bdevselement' ),
                    'style_4' => __( 'Style 4: Left Aligned with Subtitle', 'bdevselement' ),
                    'style_5' => __( 'Style 5: Left Aligned with Bold Subtitle', 'bdevselement' ),
                    'style_6' => __( 'Style 6: for home 02', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );


        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image', 'bdevselement' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );  

        $repeater->add_control(
            'sub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Sub Title', 'bdevselement' ),
                'default' => __( 'The Most Powerful Lotion For You', 'bdevselement' ),
                'placeholder' => __( 'Type Sub-title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condintion' => [
                	'design_style' => ['style_4', 'style_5']
                ]
            ]
        ); 
                       

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'bdevselement' ),
                'default' => __( 'Organic Food Is Good for Health', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'desc',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __( 'Description', 'bdevselement' ),
                'default' => __( 'Slider content leave here, please', 'bdevselement' ),
                'placeholder' => __( 'Type Slider content here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Our Services',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        //button two
        $repeater->add_control(
            'button_text_2',
            [
                'label' => __( '2nd Button Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Hello World',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/', 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link_2',
            [
                'label' => __( '2nd Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/', 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'button_icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon!' => ''];
        } else {
            $repeater->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'button_icon_2',
                [
                    'label' => __( '2nd Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon_2!' => ''];
        } else {
            $repeater->add_control(
                'button_selected_icon_2',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon_2[value]!' => ''];
        }

        $repeater->add_control(
            'button_icon_position',
            [
                'label' => __( 'Icon Position', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );


        $repeater->add_control(
            'button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_control(
            'button_icon_position_2',
            [
                'label' => __( 'Icon Position for 2nd', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );



        $repeater->add_control(
            'button_icon_spacing_2',
            [
                'label' => __( 'Icon Spacing for 2nd', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before-2 .bdevs-btn-icon_2' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after-2 .bdevs-btn-icon_2' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
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
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => __( 'Animation Speed', 'bdevselement' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 10,
                'max' => 10000,
                'default' => 300,
                'description' => __( 'Slide speed in milliseconds', 'bdevselement' ),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay?', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'bdevselement' ),
                'label_off' => __( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __( 'Autoplay Speed', 'bdevselement' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 100,
                'max' => 10000,
                'default' => 3000,
                'description' => __( 'Autoplay speed in milliseconds', 'bdevselement' ),
                'condition' => [
                    'autoplay' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );        

        $this->add_control(
            'slidetoshow',
            [
                'label' => __( 'Slide to Show', 'bdevselement' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'step' => 1,
                'max' => 12,
                'default' => 1,
                'description' => __( 'How many item you want to show?', 'bdevselement' ),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __( 'Infinite Loop?', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'bdevselement' ),
                'label_off' => __( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'vertical',
            [
                'label' => __( 'Vertical Mode?', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'bdevselement' ),
                'label_off' => __( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'navigation',
            [
                'label' => __( 'Navigation', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __( 'None', 'bdevselement' ),
                    'arrow' => __( 'Arrow', 'bdevselement' ),
                    'dots' => __( 'Dots', 'bdevselement' ),
                    'both' => __( 'Arrow & Dots', 'bdevselement' ),
                ],
                'default' => 'arrow',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'slide_button',
            [
                'label' => __( 'Button ON/OFF', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'bdevselement' ),
                'label_off' => __( 'No', 'bdevselement' ),
                'default' => 'yes',
                'return_value' => 'yes',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();


    }

    protected function register_style_controls() {
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
                'label' => __( 'Content Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .single-slide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .single-slide-content',
                'exclude' => [
                    'image'
                ]
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
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Subtitle', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .sub-title',
                'scheme' => Typography::TYPOGRAPHY_3,
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
                'label' => __( 'Position', 'bdevselement' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'bdevselement' ),
                'label_on' => __( 'Custom', 'bdevselement' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => __( 'Vertical', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => __( 'Horizontal', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
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
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
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
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
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
                'label' => __( 'Vertical Position', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label' => __( 'Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}'
                ]
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
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button' => 'color: {{VALUE}};',
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
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:hover' => 'color: {{VALUE}};',
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
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots .slick-active button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $slider_autoplay = ( $settings['autoplay'] == 'yes' ) ? true : false;
        $slider_playspeed =  $settings['autoplay_speed'] ? $settings['autoplay_speed'] : '3000';
        $animation_speed =  $settings['animation_speed'] ? $settings['animation_speed'] : '300';
        $slider_slideshow =  $settings['slidetoshow'] ? $settings['slidetoshow'] : '1';
        $slider_infinite = ( $settings['loop'] == 'yes' ) ? true : false;

        switch ( $settings['navigation'] ) {
            case 'none':
                $slider_arrows = false;
                $slider_dots = false;
                break;
            case 'arrow':
                $slider_arrows = true;
                $slider_dots = false;
                break;
            case 'dots':
                $slider_arrows = false;
                $slider_dots = true;
                break;
            case 'both':
                $slider_arrows = true;
                $slider_dots = true;
                break;
        }


        $slider_settings = array( 
            'autoplay' =>  $slider_autoplay, 
            'arrows' => $slider_arrows, 
            'speed' => $animation_speed, 
            'dots' => $slider_dots,  
            'playspeed' => $slider_playspeed,  
            'slideshow' => $slider_slideshow, 
            'infinite' => $slider_infinite,  
        );


        if ( empty( $settings['slides'] ) ) {
            return;
        }

        $this->add_render_attribute( 'button_no_icon', 'class', 'custom_btn bg_default_orange btn-no-icon wow fadeInUp2' );

        ?>
        <?php if ( $settings['design_style'] === 'style_6' ): ?>

        <div class="slider-area">
            <div class="slider-active">
                <?php foreach ( $settings['slides'] as $key => $slide ) :
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }
                    $this->add_render_attribute( 'button_'. $key, 'class', 'btn' );
                    $this->add_render_attribute( 'button_'. $key, 'data-animation', 'fadeInLeft' );
                    $this->add_render_attribute( 'button_'. $key, 'data-delay', '.8s' );
                    $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );

                    $this->add_render_attribute( 'button_2_'. $key, 'class', 'btn active' );
                    $this->add_render_attribute( 'button_2_'. $key, 'data-animation', 'fadeInRight' );
                    $this->add_render_attribute( 'button_2_'. $key, 'data-delay', '.8s' );
                    $this->add_render_attribute( 'button_2_'. $key, 'href', $slide['button_link_2']['url'] );
                ?>
                <div class="single-slider slider-height-2  d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
                   <div class="container">
                       <div class="row ">
                           <div class="col-xl-12">
                                <div class="slider-content mt-85">
                                    <?php if ( !empty($slide['title']) ) : ?>
                                    <h1 data-animation="fadeInUp" data-delay=".6s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h1>
                                    <?php endif; ?>
                                    <?php if ( !empty($slide['desc']) ) : ?>
                                    <p data-animation="fadeInUp" data-delay=".8s"><?php echo bdevs_element_kses_intermediate( $slide['desc'] ); ?></p>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($settings['slide_button']) && !empty($slide['button_text']) || !empty($slide['button_text_2'])) : ?>
                                        <div class="slider-button">
                                        <?php
                                        //Button One
                                         if( !empty($slide['button_text']) ) : ?>
                                                <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_'. $key ),
                                                    esc_html( $slide['button_text'] )
                                                    );
                                            elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                if ( $slide['button_icon_position'] === 'before' ): ?>
                                                    <span class="bdevs-btn--icon-before"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                    <span class="bdevs-btn--icon-after"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        endif; ?> 
                                        <?php endif; ?>


                                        <?php
                                        //Button Two
                                         if( !empty($slide['button_text_2']) ) : ?>

                                            <?php if ( $slide['button_text_2'] && ( ( empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) && empty( $slide['button_icon_2'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_2_'. $key ),
                                                    esc_html( $slide['button_text_2'] )
                                                    );
                                            elseif ( empty( $slide['button_text_2'] ) && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty( $slide['button_icon_2'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2' ); ?></a>
                                            <?php elseif ( $slide['button_text_2'] && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty($slide['button_icon_2']) ) ) :
                                                if ( $slide['button_icon_position_2'] === 'before' ): ?>
                                                    <span class="bdevs-btn--icon-before-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span> <?php echo esc_html($slide['button_text_2']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                    <span class="bdevs-btn--icon-after-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php echo esc_html($slide['button_text_2']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                            endif; ?>

                                        <?php endif; ?>

                                    </div>
                                    <?php endif; ?>

                                </div>
                           </div>
                       </div>
                   </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php elseif ( $settings['design_style'] === 'style_5' ): ?>

		<div class="slider-area">
			<div class="slider-active">

				<?php foreach ( $settings['slides'] as $key => $slide ) :
                $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                if ( ! $image ) {
                    $image = $slide['image']['url'];
                }
                $this->add_render_attribute( 'button_'. $key, 'class', 'btn' );
                $this->add_render_attribute( 'button_'. $key, 'data-animation', 'fadeInLeft' );
                $this->add_render_attribute( 'button_'. $key, 'data-delay', '.8s' );
                $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );

                $this->add_render_attribute( 'button_2_'. $key, 'class', 'btn active' );
                $this->add_render_attribute( 'button_2_'. $key, 'data-animation', 'fadeInRight' );
                $this->add_render_attribute( 'button_2_'. $key, 'data-delay', '.8s' );
                $this->add_render_attribute( 'button_2_'. $key, 'href', $slide['button_link_2']['url'] );
            	?>
            	<div class="single-slider slider-style-6 slider-height  d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
				   <div class="container-fluid">
					   <div class="row ">
						   <div class="col-xl-12">
								<div class="slider-content">
									<?php if ( !empty($slide['sub_title']) ) : ?>
									<h4 data-animation="fadeInUp" data-delay=".4s"><?php echo bdevs_element_kses_basic( $slide['sub_title'] ); ?></h4>
									<?php endif; ?>

									<?php if ( !empty($slide['title']) ) : ?>
									<h1 data-animation="fadeInUp" data-delay=".6s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h1>
									<?php endif; ?>

									<?php if( !empty($slide['desc']) ) : ?>
									<p data-animation="fadeInUp" data-delay=".8s"><?php echo bdevs_element_kses_intermediate( $slide['desc'] ); ?></p>
									<?php endif; ?>

									<?php if(!empty($settings['slide_button']) && !empty($slide['button_text']) || !empty($slide['button_text_2'])) : ?>
										<div class="slider-button">

										<?php
										//Button One
										 if( !empty($slide['button_text']) ) : ?>
												<?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_'. $key ),
                                                    esc_html( $slide['button_text'] )
                                                    );
                                            elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                if ( $slide['button_icon_position'] === 'before' ): ?>
                                                	<span class="bdevs-btn--icon-before"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                	<span class="bdevs-btn--icon-after"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        endif; ?> 
										<?php endif; ?>


										<?php
										//Button Two
										 if( !empty($slide['button_text_2']) ) : ?>

										    <?php if ( $slide['button_text_2'] && ( ( empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) && empty( $slide['button_icon_2'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_2_'. $key ),
                                                    esc_html( $slide['button_text_2'] )
                                                    );
                                            elseif ( empty( $slide['button_text_2'] ) && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty( $slide['button_icon_2'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2' ); ?></a>
                                            <?php elseif ( $slide['button_text_2'] && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty($slide['button_icon_2']) ) ) :
                                                if ( $slide['button_icon_position_2'] === 'before' ): ?>
                                                	<span class="bdevs-btn--icon-before-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span> <?php echo esc_html($slide['button_text_2']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                	<span class="bdevs-btn--icon-after-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php echo esc_html($slide['button_text_2']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        	endif; ?>

										<?php endif; ?>

									</div>
									<?php endif; ?>

								</div>
						   </div>
					   </div>
				   </div>
				</div>
				<?php endforeach; ?>

			</div>
		</div>

        <?php elseif ( $settings['design_style'] === 'style_4' ): ?>

		<div class="slider-area">
			<div class="slider-active">

				<?php foreach ( $settings['slides'] as $key => $slide ) :
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }
                    $this->add_render_attribute( 'button_'. $key, 'class', 'btn' );
                    $this->add_render_attribute( 'button_'. $key, 'data-animation', 'fadeInLeft' );
                    $this->add_render_attribute( 'button_'. $key, 'data-delay', '.8s' );
                    $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );

                    $this->add_render_attribute( 'button_2_'. $key, 'class', 'btn active' );
                    $this->add_render_attribute( 'button_2_'. $key, 'data-animation', 'fadeInRight' );
                    $this->add_render_attribute( 'button_2_'. $key, 'data-delay', '.8s' );
                    $this->add_render_attribute( 'button_2_'. $key, 'href', $slide['button_link_2']['url'] );
                ?>
			    <div class="single-slider slider-style-5 slider-height  d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
				   <div class="container">
					   <div class="row ">
						   <div class="col-xl-12">
								<div class="slider-content mt-85">
									<?php if ( !empty($slide['sub_title']) ) : ?>
									<h4 data-animation="fadeInUp" data-delay=".4s"><?php echo bdevs_element_kses_basic( $slide['sub_title'] ); ?></h4>
									<?php endif; ?>

									<?php if ( !empty($slide['title']) ) : ?>
									<h1 data-animation="fadeInUp" data-delay=".6s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h1>
									<?php endif; ?>

									<?php if( !empty($slide['desc']) ) : ?>
									<p data-animation="fadeInUp" data-delay=".8s"><?php echo bdevs_element_kses_intermediate( $slide['desc'] ); ?></p>
									<?php endif; ?>

									<?php if(!empty($settings['slide_button']) && !empty($slide['button_text']) || !empty($slide['button_text_2'])) : ?>
										<div class="slider-button">
										<?php
										//Button One
										 if( !empty($slide['button_text']) ) : ?>
												<?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_'. $key ),
                                                    esc_html( $slide['button_text'] )
                                                    );
                                            elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                if ( $slide['button_icon_position'] === 'before' ): ?>
                                                	<span class="bdevs-btn--icon-before"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                	<span class="bdevs-btn--icon-after"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        endif; ?> 
										<?php endif; ?>


										<?php
										//Button Two
										 if( !empty($slide['button_text_2']) ) : ?>

										    <?php if ( $slide['button_text_2'] && ( ( empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) && empty( $slide['button_icon_2'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_2_'. $key ),
                                                    esc_html( $slide['button_text_2'] )
                                                    );
                                            elseif ( empty( $slide['button_text_2'] ) && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty( $slide['button_icon_2'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2' ); ?></a>
                                            <?php elseif ( $slide['button_text_2'] && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty($slide['button_icon_2']) ) ) :
                                                if ( $slide['button_icon_position_2'] === 'before' ): ?>
                                                	<span class="bdevs-btn--icon-before-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span> <?php echo esc_html($slide['button_text_2']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                	<span class="bdevs-btn--icon-after-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php echo esc_html($slide['button_text_2']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        	endif; ?>

										<?php endif; ?>

									</div>
									<?php endif; ?>

								</div>
						   </div>
					   </div>
				   </div>
				</div>
				<?php endforeach; ?>

			</div>
		</div>

		<?php elseif ( $settings['design_style'] === 'style_3' ): ?>

        <div class="slider-area">
			<div class="slider-active">
				<?php foreach ( $settings['slides'] as $key => $slide ) :
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }
                    $this->add_render_attribute( 'button_'. $key, 'class', 'btn' );
                    $this->add_render_attribute( 'button_'. $key, 'data-animation', 'fadeInLeft' );
                    $this->add_render_attribute( 'button_'. $key, 'data-delay', '.6s' );
                    $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );

                    $this->add_render_attribute( 'button_2_'. $key, 'class', 'btn active' );
                    $this->add_render_attribute( 'button_2_'. $key, 'data-animation', 'fadeInRight' );
                    $this->add_render_attribute( 'button_2_'. $key, 'data-delay', '1s' );
                    $this->add_render_attribute( 'button_2_'. $key, 'href', $slide['button_link_2']['url'] );
                ?>
				<div class="single-slider slider-height slider-style-4 d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
				   <div class="container">
					   <div class="row ">
						   <div class="col-xl-12">
								<div class="slider-content slider-content-3 text-center slider-content-4">
									<?php if ( !empty($slide['title']) ) : ?>
                                    <h1 data-animation="fadeInUp" data-delay=".6s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h1>
                                    <?php endif; ?>
                                    <?php if ( !empty($slide['desc']) ) : ?>
                                    <p data-animation="fadeInUp" data-delay=".8s"><?php echo bdevs_element_kses_intermediate( $slide['desc'] ); ?></p>
                                    <?php endif; ?>

									<?php if(!empty($settings['slide_button']) && !empty($slide['button_text']) || !empty($slide['button_text_2'])) : ?>
										<div class="slider-button">
										<?php
										//Button One
										 if( !empty($slide['button_text']) ) : ?>
												<?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_'. $key ),
                                                    esc_html( $slide['button_text'] )
                                                    );
                                            elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                if ( $slide['button_icon_position'] === 'before' ): ?>
                                                	<span class="bdevs-btn--icon-before"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                	<span class="bdevs-btn--icon-after"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        endif; ?> 
										<?php endif; ?>


										<?php
										//Button Two
										 if( !empty($slide['button_text_2']) ) : ?>

										    <?php if ( $slide['button_text_2'] && ( ( empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) && empty( $slide['button_icon_2'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_2_'. $key ),
                                                    esc_html( $slide['button_text_2'] )
                                                    );
                                            elseif ( empty( $slide['button_text_2'] ) && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty( $slide['button_icon_2'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2' ); ?></a>
                                            <?php elseif ( $slide['button_text_2'] && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty($slide['button_icon_2']) ) ) :
                                                if ( $slide['button_icon_position_2'] === 'before' ): ?>
                                                	<span class="bdevs-btn--icon-before-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span> <?php echo esc_html($slide['button_text_2']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                	<span class="bdevs-btn--icon-after-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php echo esc_html($slide['button_text_2']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        	endif; ?>

										<?php endif; ?>

									</div>
									<?php endif; ?>

								</div>
						   </div>
					   </div>
				   </div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

        <?php elseif ( $settings['design_style'] === 'style_2' ): ?>

        <div class="slider-area">
			<div class="slider-active">
				<?php foreach ( $settings['slides'] as $key => $slide ) :
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }
                    $this->add_render_attribute( 'button_'. $key, 'class', 'btn' );
                    $this->add_render_attribute( 'button_'. $key, 'data-animation', 'fadeInLeft' );
                    $this->add_render_attribute( 'button_'. $key, 'data-delay', '.6s' );
                    $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );

                    $this->add_render_attribute( 'button_2_'. $key, 'class', 'btn active' );
                    $this->add_render_attribute( 'button_2_'. $key, 'data-animation', 'fadeInRight' );
                    $this->add_render_attribute( 'button_2_'. $key, 'data-delay', '1s' );
                    $this->add_render_attribute( 'button_2_'. $key, 'href', $slide['button_link_2']['url'] );
                ?>
				<div class="single-slider slider-height  d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
				   <div class="container">
					   <div class="row ">
						   <div class="col-xl-12">
								<div class="slider-content slider-content-3 text-center mt-40">
									<?php if ( !empty($slide['title']) ) : ?>
                                    <h1 data-animation="fadeInUp" data-delay=".6s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h1>
                                    <?php endif; ?>
                                    <?php if ( !empty($slide['desc']) ) : ?>
                                    <p data-animation="fadeInUp" data-delay=".8s"><?php echo bdevs_element_kses_intermediate( $slide['desc'] ); ?></p>
                                    <?php endif; ?> 


									<?php if(!empty($settings['slide_button']) && !empty($slide['button_text']) || !empty($slide['button_text_2'])) : ?>
										<div class="slider-button">
										<?php
										//Button One
										 if( !empty($slide['button_text']) ) : ?>
												<?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_'. $key ),
                                                    esc_html( $slide['button_text'] )
                                                    );
                                            elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                if ( $slide['button_icon_position'] === 'before' ): ?>
                                                	<span class="bdevs-btn--icon-before"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                	<span class="bdevs-btn--icon-after"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        endif; ?> 
										<?php endif; ?>


										<?php
										//Button Two
										 if( !empty($slide['button_text_2']) ) : ?>

										    <?php if ( $slide['button_text_2'] && ( ( empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) && empty( $slide['button_icon_2'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_2_'. $key ),
                                                    esc_html( $slide['button_text_2'] )
                                                    );
                                            elseif ( empty( $slide['button_text_2'] ) && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty( $slide['button_icon_2'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2' ); ?></a>
                                            <?php elseif ( $slide['button_text_2'] && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty($slide['button_icon_2']) ) ) :
                                                if ( $slide['button_icon_position_2'] === 'before' ): ?>
                                                	<span class="bdevs-btn--icon-before-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span> <?php echo esc_html($slide['button_text_2']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                	<span class="bdevs-btn--icon-after-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php echo esc_html($slide['button_text_2']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        	endif; ?>

										<?php endif; ?>

									</div>
									<?php endif; ?>

								</div>
						   </div>
					   </div>
				   </div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>


        <?php else: 
        ?>

		<div class="slider-area">
			<div class="slider-active">
			    <?php foreach ( $settings['slides'] as $key => $slide ) :
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }
                    $this->add_render_attribute( 'button_'. $key, 'class', 'btn' );
                    $this->add_render_attribute( 'button_'. $key, 'data-animation', 'fadeInLeft' );
                    $this->add_render_attribute( 'button_'. $key, 'data-delay', '.8s' );
                    $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );

                    $this->add_render_attribute( 'button_2_'. $key, 'class', 'btn active' );
                    $this->add_render_attribute( 'button_2_'. $key, 'data-animation', 'fadeInRight' );
                    $this->add_render_attribute( 'button_2_'. $key, 'data-delay', '.8s' );
                    $this->add_render_attribute( 'button_2_'. $key, 'href', $slide['button_link_2']['url'] );
                ?>
				<div class="single-slider slider-height  d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
				   <div class="container">
					   <div class="row ">
						   <div class="col-xl-12">
								<div class="slider-content mt-85">
									<?php if ( !empty($slide['title']) ) : ?>
                                    <h1 data-animation="fadeInUp" data-delay=".6s"><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h1>
                                    <?php endif; ?>
                                    <?php if ( !empty($slide['desc']) ) : ?>
                                    <p data-animation="fadeInUp" data-delay=".8s"><?php echo bdevs_element_kses_intermediate( $slide['desc'] ); ?></p>
                                    <?php endif; ?>
                                    
									<?php if(!empty($settings['slide_button']) && !empty($slide['button_text']) || !empty($slide['button_text_2'])) : ?>
										<div class="slider-button">
										<?php
										//Button One
										 if( !empty($slide['button_text']) ) : ?>
												<?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_'. $key ),
                                                    esc_html( $slide['button_text'] )
                                                    );
                                            elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                            <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                if ( $slide['button_icon_position'] === 'before' ): ?>
                                                	<span class="bdevs-btn--icon-before"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                	<span class="bdevs-btn--icon-after"><a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        endif; ?> 
										<?php endif; ?>


										<?php
										//Button Two
										 if( !empty($slide['button_text_2']) ) : ?>

										    <?php if ( $slide['button_text_2'] && ( ( empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) && empty( $slide['button_icon_2'] ) ) ) :
                                                printf( '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string( 'button_2_'. $key ),
                                                    esc_html( $slide['button_text_2'] )
                                                    );
                                            elseif ( empty( $slide['button_text_2'] ) && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty( $slide['button_icon_2'] ) ) ) : ?>
                                                <a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2' ); ?></a>
                                            <?php elseif ( $slide['button_text_2'] && ( ( !empty( $slide['button_selected_icon_2'] ) || empty( $slide['button_selected_icon_2']['value'] ) ) || !empty($slide['button_icon_2']) ) ) :
                                                if ( $slide['button_icon_position_2'] === 'before' ): ?>
                                                	<span class="bdevs-btn--icon-before-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span> <?php echo esc_html($slide['button_text_2']); ?></a></span>
                                                    <?php
                                                else: ?>
                                                	<span class="bdevs-btn--icon-after-2"><a <?php $this->print_render_attribute_string( 'button_2_'. $key ); ?>><?php echo esc_html($slide['button_text_2']); ?> <span><?php bdevs_element_render_icon( $slide, 'button_icon_2', 'button_selected_icon_2', ['class' => 'bdevs-btn-icon_2'] ); ?></span></a></span>
                                                <?php
                                                endif;
                                        	endif; ?>

										<?php endif; ?>

									</div>
									<?php endif; ?>

								</div>
						   </div>
					   </div>
				   </div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

        <?php endif; ?>

    <?php
    }
}
