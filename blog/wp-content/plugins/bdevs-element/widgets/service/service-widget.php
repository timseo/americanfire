<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Text_Shadow;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Service extends BDevs_El_Widget {

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
        return 'service';
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
        return __( 'Service', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/icon-box/';
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
        return 'eicon-preview-medium';
    }

    public function get_keywords() {
        return [ 'service', 'list', 'icon' ];
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
                    'style_1' => __( 'Style 1: White Feature with top sm-img', 'bdevselement' ),
                    'style_2' => __( 'Style 2: Feature with top sm-img', 'bdevselement' ),
                    'style_3' => __( 'Style 3: White Feature with top lg-img', 'bdevselement' ),
                    'style_4' => __( 'Style 4: Feature with top lg-img', 'bdevselement' ),
                    'style_5' => __( 'Style 5: Feature Bg with white text', 'bdevselement' ),
                    'style_6' => __( 'Style 6: Special Feature with list item', 'bdevselement' ),
                ],

                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );


        $this->end_controls_section();
  

        // section title
        $this->start_controls_section(
            '_service_settings',
            [
                'label' => __( 'Service Settings', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Section Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .wrapper-aligned' => 'text-align: {{VALUE}};'
                ]
            ]
        );



        $this->add_control(
            'section_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wrapper-aligned .services-text' => 'background-color: {{VALUE}};',
                ],

                'condition' => [
                	'design_style' => ['style_3']
                ],
            ]
        );


        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Natarul Food', 'bdevselement' ),
                'placeholder' => __( 'Type Feature Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );


         $this->add_control(
            'description',
            [
                'label' => __( 'Desccription', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born', 'bdevselement' ),
                'placeholder' => __( 'Type Feature Desccription', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'bdevselement' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'bdevselement' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'bdevselement' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'bdevselement' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'bdevselement' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'bdevselement' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h4',
                'toggle' => false,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_3', 'style_4'],
                ]
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', 'bdevselement'),
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('http://elementor.bdevs.net/', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'button_icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon!' => ''];
        } else {
            $this->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
            'button_icon_position',
            [
                'label' => __('Icon Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'after',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __('Icon Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .btn--icon-before .btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn--icon-after .btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

	   // Services list Repeater
		 $this->start_controls_section(
            '_section_icon',
            [
                'label' => __( 'Service List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                'design_style' => ['style_6']
                ]
            ]
        );

        $repeater = new Repeater();  

        $repeater->add_control(
            'type',
            [
                'label' => __( 'Media Type', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'bdevselement' ),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'bdevselement' ),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image_sm',
            [
                'label' => __( 'Small Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'thumbnail',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image'
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        } 
        else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Features Title', 'bdevselement' ),
                'placeholder' => __( 'Type Icon Box Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevselement' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'Sed ut perspiciatis unomnis iste natus error oluptatem', 'bdevselement' ),
                'placeholder' => __( 'Icon Description', 'bdevselement' ), 
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
                ]
            ]
        );


        $this->add_responsive_control(
            'align_slide',
            [
                'label' => __( 'Alignment', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_h_section_style_title',
            [
                'label' => __( 'Section Title & Desccription', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_h_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_heading_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_heading_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'htitle',
                'selector' => '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'htitle',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title',
            ]
        );

        $this->add_control(
            'h_heading_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'h_blend_mode',
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
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'mix-blend-mode: {{VALUE}};',
                ],
                'separator' => 'none',
            ]
        );

        $this->add_control(
            '_h_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_subheading_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_subheading_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subhtitle',
                'selector' => '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'subhtitle',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span',
            ]
        );

        $this->add_control(
            'h_subheading_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            '_h_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Content', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_heading_desc_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-left p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_heading_desc_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-left p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h_desccription',
                'selector' => '{{WRAPPER}} .features__content-left p',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'h_desccription',
                'label' => __( 'Text Shadow', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .features__content-left p',
            ]
        );

        $this->add_control(
            'h_heading_desc_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .features__content-left p' => 'color: {{VALUE}};',
                ],
            ]
        );        

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_icon',
            [
                'label' => __( 'Icon', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon' => 'padding: {{SIZE}}{{UNIT}}',
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 150,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typ',
                'selector' => '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'selector' => '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i'
            ]
        );

        $this->add_responsive_control(
            'icon_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i'
            ]
        );

        $this->start_controls_tabs( '_tabs_icon' );

        $this->start_controls_tab(
            '_tab_icon_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_rotate',
            [
                'label' => __( 'Rotate Icon Box', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'default' => [
                    'unit' => 'deg',
                ],
                'range' => [
                    'deg' => [
                        'min' => 0,
                        'max' => 360,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'icon_bg_color!' => '',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => __( 'Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_border_border!' => '',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_bg_rotate',
            [
                'label' => __( 'Rotate Icon Box', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'default' => [
                    'unit' => 'deg',
                ],
                'range' => [
                    'deg' => [
                        'min' => 0,
                        'max' => 360,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover .icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'icon_bg_color!' => '',
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .features__content-2 h3, {{WRAPPER}} .services__content h3',
                'scheme' => Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .features__content-2 h3, {{WRAPPER}} .services__content h3',
            ]
        );

        $this->start_controls_tabs( '_tabs_title' );

        $this->start_controls_tab(
            '_tab_title_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 h3 a, {{WRAPPER}} .services__content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_title_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 h3 a:hover, {{WRAPPER}} .services__content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_badge',
            [
                'label' => __( 'Content', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Typography', 'bdevselement' ),
                'exclude' => [
                    'font_family',
                    'line_height'
                ],
                'default' => [
                    'font_size' => ['']
                ],
                'selector' => '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();



        // Button style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'button_margin',
            [
                'label' => __( 'Margin', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevs-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdevs-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-btn',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_service_button_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn:hover, {{WRAPPER}} .bdevs-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'description', 'none' );
        $this->add_render_attribute( 'description', 'class', '' );

        $this->add_inline_editing_attributes( 'button_text', 'none' );

        ?>


        <?php if ( $settings['design_style'] === 'style_6' ): 
            
        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title' );

        if ( !empty($settings['image']['id']) ) {
            $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
        }

        ?>
		<div class="features-area features-area-6">
	        <div class="container">
	            <div class="row">
	                <div class="col-xl-5 col-lg-5">
	                    <div class="feature-image mb-30">
	                        <img src="<?php print esc_url($image); ?>" alt="img">
	                    </div>

	                </div>    
	                <div class="col-xl-7 col-lg-7">
	                    <div class="section-title mb-70">
	                    	<?php if(!empty($settings['title'])) : ?>
	                        <h1><?php echo bdevs_element_kses_basic( $settings['title'] ); ?></h1>
	                    	<?php endif; ?>

			                <?php if(!empty($settings['description'])) : ?>
				            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
				        	<?php endif; ?>
	                    </div>

	                    <div class="row">
	                        <?php foreach ( $settings['slides'] as $slide ):
	                            if ( !empty($slide['image_sm']['id']) ) {
	                                $image_sm = wp_get_attachment_image_url( $slide['image_sm']['id'], $settings['thumbnail_size'] );
	                            }
	                        ?>
	                        <div class="col-lg-6 col-md-6">
	                            <div class="special-feature mb-30">
	                                <div class="s-feature-thumb">
	                                    <img src="<?php print esc_url($image_sm); ?>" alt="img">
	                                </div>
	                                <div class="s-feature-text">
	                                	<?php if(!empty( $slide['title'] )) : ?>
	                                    <h4><?php echo bdevs_element_kses_basic( $slide['title'] ); ?></h4>
	                                	<?php endif; ?>
	                                	<?php if(!empty( $slide['description'] )) : ?>
	                                    <p><?php echo bdevs_element_kses_basic( $slide['description'] ); ?></p>
	                                	<?php endif; ?>
	                                </div>
	                            </div>
	                        </div>
	                    	<?php endforeach; ?>

	                    </div>
	                </div>
	            </div>    
	        </div>
	    </div>



        <?php elseif ( $settings['design_style'] === 'style_5' ): 
            
        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title' );

        if ( !empty($settings['image']['id']) ) {
            $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
        }

        ?>

        <div class="single-organic-food wrapper-aligned">
            <div class="organic-food-thumb">
                <img src="<?php print esc_url($image); ?>" alt="img">
            </div>
            <div class="organic-food-text">

                <?php if(!empty($settings['title'])) : ?>
				<h4><?php echo bdevs_element_kses_basic( $settings['title'] ); ?></h4>
				<?php endif; ?>
                
                <?php if(!empty($settings['description'])) : ?>
	            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
	        	<?php endif; ?>

            </div>
        </div>

        <?php elseif ( $settings['design_style'] === 'style_4' ): 
            
        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title' );

        $this->add_render_attribute( 'button', 'class', 'bdevs-btn btn' );
        $this->add_link_attributes('button', $settings['button_link']);

        if ( !empty($settings['image']['id']) ) {
            $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
        }

        ?>

        <div class="choose3-content wrapper-aligned">
			<div class="choose3-icon-img">
				<img src="<?php print esc_url($image); ?>" alt="img">
			</div>
			<div class="choose3-text pt-20">
                <?php if(!empty($settings['title'])) : ?>
				<h4><?php echo bdevs_element_kses_basic( $settings['title'] ); ?></h4>
				<?php endif; ?>
                
                <?php if(!empty($settings['description'])) : ?>
	            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
	        	<?php endif; ?>

	        	<?php if( !empty($settings['button_text']) ) : ?>
				<div class="choose-button zomata_button">
		            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
		                    printf('<a %1$s>%2$s</a>',
		                        $this->get_render_attribute_string('button'),
		                        esc_html($settings['button_text'])
		                    );
		                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
		                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
		                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
		                    if ($settings['button_icon_position'] === 'before'): ?>
		                    	<span class="bdevs-btn--icon-before"><a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
		                            <span><?php echo esc_html($settings['button_text']); ?></span></a></span>
		                    <?php
		                    else: ?>
		                    	<span class="bdevs-btn--icon-after"><a <?php $this->print_render_attribute_string('button'); ?>>
		                            <span><?php echo esc_html($settings['button_text']); ?></span>
		                            <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
		                        </a></span>
		                    <?php
		                    endif;
		            endif; ?>
				</div>
				<?php endif; ?>

			</div>
		</div>


        <?php elseif ( $settings['design_style'] === 'style_3' ): 

        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title' );

        $this->add_render_attribute( 'button', 'class', 'bdevs-btn' );
        $this->add_link_attributes('button', $settings['button_link']);

        if ( !empty($settings['image']['id']) ) {
            $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
        }

        ?>

        <div class="services-wrapper wrapper-aligned">
			<div class="services-img">
				<a href="<?php echo get_the_permalink(); ?>"><img src="<?php print esc_url($image); ?>"></a>
			</div>
			<div class="services-text">
				<?php if(!empty($settings['title'])) : ?>
				<h3><a href="<?php echo get_the_permalink(); ?>"><?php echo bdevs_element_kses_basic( $settings['title'] ); ?></a></h3>
				<?php endif; ?>
	        	<?php if(!empty($settings['description'])) : ?>
	            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
	        	<?php endif; ?>

	            
	        	<?php if( !empty($settings['button_text']) ) : ?>
	        		<div class="zomata_button"> 
		            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
		                    printf('<a %1$s>%2$s</a>',
		                        $this->get_render_attribute_string('button'),
		                        esc_html($settings['button_text'])
		                    );
		                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
		                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
		                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
		                    if ($settings['button_icon_position'] === 'before'): ?>
		                    	<span class="bdevs-btn--icon-before"><a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
		                            <span><?php echo esc_html($settings['button_text']); ?></span></a></span>
		                    <?php
		                    else: ?>
		                    	<span class="bdevs-btn--icon-after"><a <?php $this->print_render_attribute_string('button'); ?>>
		                            <span><?php echo esc_html($settings['button_text']); ?></span>
		                            <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
		                        </a></span>
		                    <?php
		                    endif;
		            endif; ?>
	        		</div>
	        	<?php endif; ?>


				</div>
		</div>


        <?php elseif ( $settings['design_style'] === 'style_2' ):

        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title' );

        $this->add_render_attribute( 'button', 'class', 'bdevs-btn' );
        $this->add_link_attributes('button', $settings['button_link']);

        if ( !empty($settings['image']['id']) ) {
            $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
        }

        ?>


        <div class="we-do-wrapper wrapper-aligned">
	        <div class="we-do-img">
	            <img src="<?php print esc_url($image); ?>" alt="img">
	        </div>
	        <div class="we-do-text">
	            <?php if(!empty($settings['title'])) : ?>
	            <h4><?php echo bdevs_element_kses_basic( $settings['title'] ); ?></h4>
	        	<?php endif; ?>
	            <?php if(!empty($settings['description'])) : ?>
	            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
	        	<?php endif; ?>
	            
	        	<?php if( !empty($settings['button_text']) ) : ?>
	        		<div class="zomata_button"> 
		            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
		                    printf('<a %1$s>%2$s</a>',
		                        $this->get_render_attribute_string('button'),
		                        esc_html($settings['button_text'])
		                    );
		                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
		                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
		                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
		                    if ($settings['button_icon_position'] === 'before'): ?>
		                    	<span class="bdevs-btn--icon-before"><a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
		                            <span><?php echo esc_html($settings['button_text']); ?></span></a></span>
		                    <?php
		                    else: ?>
		                    	<span class="bdevs-btn--icon-after"><a <?php $this->print_render_attribute_string('button'); ?>>
		                            <span><?php echo esc_html($settings['button_text']); ?></span>
		                            <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
		                        </a></span>
		                    <?php
		                    endif;
		            endif; ?>
	        		</div>
	        	<?php endif; ?>

	        </div>
	    </div>



        <?php else: 

        $title = bdevs_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title' );

        $this->add_render_attribute( 'button', 'class', 'bdevs-btn' );
        $this->add_link_attributes('button', $settings['button_link']);

        if ( !empty($settings['image']['id']) ) {
            $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
        }

        ?>


        <div class="features-wrapper single-features wrapper-aligned">

	        <div class="features-img">
	            <img src="<?php print esc_url($image); ?>" alt="img">
	        </div>

	        <div class="features-text">
	        	<?php if(!empty($settings['title'])) : ?>
	            <h4><?php echo bdevs_element_kses_basic( $settings['title'] ); ?></h4>
	        	<?php endif; ?>
	            <?php if(!empty($settings['description'])) : ?>
	            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
	        	<?php endif; ?>

	        	<?php if( !empty($settings['button_text']) ) : ?>
	        		<div class="zomata_button"> 
		            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
		                    printf('<a %1$s>%2$s</a>',
		                        $this->get_render_attribute_string('button'),
		                        esc_html($settings['button_text'])
		                    );
		                elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
		                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
		                <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
		                    if ($settings['button_icon_position'] === 'before'): ?>
		                    	<span class="bdevs-btn--icon-before"><a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
		                            <span><?php echo esc_html($settings['button_text']); ?></span></a></span>
		                    <?php
		                    else: ?>
		                    	<span class="bdevs-btn--icon-after"><a <?php $this->print_render_attribute_string('button'); ?>>
		                            <span><?php echo esc_html($settings['button_text']); ?></span>
		                            <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
		                        </a></span>
		                    <?php
		                    endif;
		            endif; ?>
	        		</div>
	        	<?php endif; ?>

	        </div>

	    </div>

        <?php endif; ?>
        
        <?php
    }

}