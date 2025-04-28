<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Box_Shadow;
Use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Member_Slider extends BDevs_El_Widget {

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
        return 'member_slider';
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
        return __( 'Member Slider', 'bdevselement' );
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
        return 'eicon-lock-user';
    }

    public function get_keywords() {
        return [ 'slider', 'memeber', 'gallery', 'carousel' ];
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );  

        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevselement' ),
                    'style_2' => __( 'Style 2', 'bdevselement' ),
                    'style_3' => __( 'Style 3: Single Team Member', 'bdevselement' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        ); 

        $this->add_control(
            'shape_switch',
            [
                'label' => __('Shape Show/Hide', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();   

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'       => __( 'Sub Title', 'bdevselement' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Heading Sub Title',
                'placeholder' => __( 'Heading Sub Text', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_9'],
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 4,
                'default'     => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'bdevselement' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Description Text', 'bdevselement' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'sec_title_tag',
            [
                'label'   => __( 'Title HTML Tag', 'bdevselement' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __( 'H1', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h1',
                    ],
                    'h2' => [
                        'title' => __( 'H2', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h2',
                    ],
                    'h3' => [
                        'title' => __( 'H3', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h3',
                    ],
                    'h4' => [
                        'title' => __( 'H4', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h4',
                    ],
                    'h5' => [
                        'title' => __( 'H5', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h5',
                    ],
                    'h6' => [
                        'title' => __( 'H6', 'bdevselement' ),
                        'icon'  => 'eicon-editor-h6',
                    ],
                ],
                'default' => 'h1',
                'toggle'  => false,
            ]
        );

        $this->add_responsive_control(
            'sec_align',
            [
                'label'     => __( 'Alignment', 'bdevselement' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevselement' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_button_style',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_9'],
                ],
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



        // member list
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Members List', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs(
            '_tab_style_member_box_slider'
        );

        $repeater->start_controls_tab(
            '_tab_member_info',
            [
                'label' => __( 'Information', 'bdevselement' ),
            ]
        );

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
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'bdevselement' ),
                'default' => __( 'BDevs Member Title', 'bdevselement' ),
                'placeholder' => __( 'Type title here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Job Title', 'bdevselement' ),
                'default' => __( 'BDevs Officer', 'bdevselement' ),
                'placeholder' => __( 'Type designation here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );   

        $repeater->add_control(
            'slide_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __( 'Type link here', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_member_links',
            [
                'label' => __( 'Links', 'bdevselement' ),
            ]
        );

        $repeater->add_control(
            'show_social',
            [
                'label' => __( 'Show Options?', 'bdevselement' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'bdevselement' ),
                'label_off' => __( 'No', 'bdevselement' ),
                'return_value' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'web_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Website Address', 'bdevselement' ),
                'placeholder' => __( 'Add your profile link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'email_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Email', 'bdevselement' ),
                'placeholder' => __( 'Add your email link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );           

        $repeater->add_control(
            'phone_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Phone', 'bdevselement' ),
                'placeholder' => __( 'Add your phone link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'facebook_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Facebook', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your facebook link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );                

        $repeater->add_control(
            'twitter_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Twitter', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your twitter link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'instagram_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Instagram', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your instagram link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );       

        $repeater->add_control(
            'linkedin_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'LinkedIn', 'bdevselement' ),
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Add your linkedin link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'youtube_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Youtube', 'bdevselement' ),
                'placeholder' => __( 'Add your youtube link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'googleplus_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Google Plus', 'bdevselement' ),
                'placeholder' => __( 'Add your Google Plus link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'flickr_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Flickr', 'bdevselement' ),
                'placeholder' => __( 'Add your flickr link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'vimeo_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Vimeo', 'bdevselement' ),
                'placeholder' => __( 'Add your vimeo link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'behance_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Behance', 'bdevselement' ),
                'placeholder' => __( 'Add your hehance link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'dribble_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Dribbble', 'bdevselement' ),
                'placeholder' => __( 'Add your dribbble link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'pinterest_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Pinterest', 'bdevselement' ),
                'placeholder' => __( 'Add your pinterest link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'gitub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Github', 'bdevselement' ),
                'placeholder' => __( 'Add your github link', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        // REPEATER
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

        $this->add_responsive_control(
            'align',
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
                'selectors' => [
                    '{{WRAPPER}} .single-carousel-item' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();


    }

    protected function register_style_controls() {

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Team Content', 'bdevselement' ),
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
                    '{{WRAPPER}} .zt-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .team-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .team-title',
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
                    '{{WRAPPER}} .team__info span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__info span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .team__info span',
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

    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'team-title' );
        $this->add_render_attribute( 'name', 'class', 'name' );

        $this->add_inline_editing_attributes( 'description', 'intermediate' );
        $this->add_render_attribute( 'description', 'class', 'bdevs-card-text' );

        if (!empty($title)) {
            $title = bdevs_element_kses_basic( $settings['title' ] );
        }
        
        if ( empty( $settings['slides'] ) ) {
            return;
        }
        ?>

    <?php if ( $settings['design_style'] === 'style_1' ): 

        // bg_image
        if (!empty($settings['bg_shape_image']['id'])) {
            $bg_shape_image = wp_get_attachment_image_url( $settings['bg_shape_image']['id'], $settings['shape_size'] );
            if ( ! $bg_shape_image ) {
                $bg_shape_image = $settings['bg_shape_image']['url'];
            }  
        }  

        $slider_active = !empty($settings['slider_active']) ? 'team1__carousel owl-carousel' : '';

        $this->add_inline_editing_attributes( 'title_slider', 'basic' );
        $this->add_render_attribute( 'title_slider', 'class', 'team__title' );

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'section__title section__title-2' );

        $this->add_inline_editing_attributes( 'designation', 'basic' );
        $this->add_render_attribute( 'designation', 'class', 'team__position' );
        $title = bdevs_element_kses_basic( $settings['title'] );
    ?>

        <div class="team-area pb-90 pos-relative">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <div class="shape sp1 bounce-animate"><img src="img/shape/sp2.png" alt=""></div>
            <div class="shape sp2 bounce-animate"><img src="img/shape/sp1.png" alt=""></div>
            <div class="shape sp3 bounce-animate"><img src="img/shape/sp3.png" alt=""></div>
            <div class="shape sp4 bounce-animate"><img src="img/shape/sp4.png" alt=""></div>
            <?php endif;?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                        <div class="section-title text-center section-circle mb-70">
                            <div class="section-img">
                                <img src="img/shape/1.png" alt="" />
                            </div>
                        <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['sec_title_tag'] ),
                            $this->get_render_attribute_string( 'title' ),
                            $title
                            )
                        ?>

                        <?php if ( $settings['description'] ): ?>
                            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                        <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ( $settings['slides'] as $slide ) :
                        $title = bdevs_element_kses_basic( $slide['title' ] );
                        $slide_url = esc_url($slide['slide_url']);
                        
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                            if ( ! $image ) {
                                $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '' ;
                            }  
                        }          
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="team-wrapper text-center mb-30">
                            <?php if( !empty( $image ) ) : ?>
                            <div class="team-img">
                                <img src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','zomata'); ?>"/>
                                <div class="team-icon">
                                        <?php if( !empty($slide['web_title'] ) ) : ?>
                                            <a href="<?php echo esc_url( $slide['web_title'] ); ?>">
                                                <i class="far fa-globe"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['email_title'] ) ) : ?> 
                                            <a href="mailto:<?php echo esc_url( $slide['email_title'] ); ?>">
                                                <i class="fal fa-envelope"></i>
                                            </a>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['phone_title'] ) ) : ?>
                                            <a href="tell:<?php echo esc_url( $slide['phone_title'] ); ?>">
                                                <i class="fas fa-phone"></i>
                                            </a>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['facebook_title'] ) ) : ?>
                                            <a href="<?php echo esc_url( $slide['facebook_title'] ); ?>">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['twitter_title'] ) ) : ?>
                                            <a href="<?php echo esc_url( $slide['twitter_title'] ); ?>">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['instagram_title'] ) ) : ?> 
                                            <a href="<?php echo esc_url( $slide['instagram_title'] ); ?>">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['linkedin_title'] ) ) : ?>   
                                            <a href="<?php echo esc_url( $slide['linkedin_title'] ); ?>">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['youtube_title'] ) ) : ?>  
                                            <a href="<?php echo esc_url( $slide['youtube_title'] ); ?>">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['googleplus_title'] ) ) : ?> 
                                            <a href="<?php echo esc_url( $slide['googleplus_title'] ); ?>">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['flickr_title'] ) ) : ?>  
                                            <a href="<?php echo esc_url( $slide['flickr_title'] ); ?>">
                                                <i class="fab fa-flickr"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['vimeo_title'] ) ) : ?>  
                                            <a href="<?php echo esc_url( $slide['vimeo_title'] ); ?>">
                                                <i class="fab fa-vimeo-v"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['behance_title'] ) ) : ?>   
                                            <a href="<?php echo esc_url( $slide['behance_title'] ); ?>">
                                                <i class="fab fa-behance"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['dribble_title'] ) ) : ?>  
                                            <a href="<?php echo esc_url( $slide['dribble_title'] ); ?>">
                                                <i class="fab fa-dribbble"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['pinterest_title'] ) ) : ?>  
                                            <a href="<?php echo esc_url( $slide['pinterest_title'] ); ?>">
                                                <i class="fab fa-pinterest-p"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['gitub_title'] ) ) : ?>
                                            <a href="<?php echo esc_url( $slide['gitub_title'] ); ?>">
                                                <i class="fab fa-github"></i>
                                            </a>
                                        <?php endif; ?>
                               </div>
                            </div>
                            <?php endif; ?>
                            <div class="team-text">
                            <?php printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title_slider' ),
                                $title,
                                $slide_url
                                ); 
                            ?>

                            <?php if( !empty( $slide['designation'] ) ) : ?>
                                <span><?php echo bdevs_element_kses_basic( $slide['designation'] ); ?></span>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


    <!-- style 2 -->
    <?php elseif ( $settings['design_style'] === 'style_2' ): 


        // bg_image
        if (!empty($settings['bg_shape_image']['id'])) {
            $bg_shape_image = wp_get_attachment_image_url( $settings['bg_shape_image']['id'], $settings['shape_size'] );
            if ( ! $bg_shape_image ) {
                $bg_shape_image = $settings['bg_shape_image']['url'];
            }  
        }  

        $slider_active = !empty($settings['slider_active']) ? 'team1__carousel owl-carousel' : '';

        $this->add_inline_editing_attributes( 'title_slider', 'basic' );
        $this->add_render_attribute( 'title_slider', 'class', 'team__title' );

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', '' );

        $this->add_inline_editing_attributes( 'designation', 'basic' );
        $this->add_render_attribute( 'designation', 'class', 'team__position' );

        $title = bdevs_element_kses_basic( $settings['title'] );

    ?>

        <div class="services-area">
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $slide ) :
                        $title = bdevs_element_kses_basic( $slide['title' ] );
                        $slide_url = esc_url($slide['slide_url']);

                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = $slide['image']['url'];
                        }            

                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-team text-center mb-30">
                            <div class="team2-img">
                                <img src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','zomata'); ?>"/>
                                <div class="team-content">
                                    <?php printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                        tag_escape( $settings['title_tag'] ),
                                        $this->get_render_attribute_string( 'title_slider' ),
                                        $title,
                                        $slide_url
                                        ); 
                                    ?>

                                    <?php if( !empty( $slide['designation'] ) ) : ?>
                                        <span><?php echo bdevs_element_kses_basic( $slide['designation'] ); ?></span>
                                    <?php endif; ?>
                                    <div class="team2-icon">
                                        <?php if( !empty($slide['web_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['web_title'] ); ?>"><i class="far fa-globe"></i></a>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['email_title'] ) ) : ?>
                                        <a href="mailto:<?php echo esc_url( $slide['email_title'] ); ?>"><i class="fal fa-envelope"></i></a>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['phone_title'] ) ) : ?>
                                        <a href="tell:<?php echo esc_url( $slide['phone_title'] ); ?>"><i class="fas fa-phone"></i></a>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['facebook_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['facebook_title'] ); ?>"><i class="fab fa-facebook-f"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['twitter_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['twitter_title'] ); ?>"><i class="fab fa-twitter"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['instagram_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['instagram_title'] ); ?>"><i class="fab fa-instagram"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['linkedin_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['linkedin_title'] ); ?>"><i class="fab fa-linkedin-in"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['youtube_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['youtube_title'] ); ?>"><i class="fab fa-youtube"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['googleplus_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['googleplus_title'] ); ?>"><i class="fab fa-google-plus-g"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['flickr_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['flickr_title'] ); ?>"><i class="fab fa-flickr"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['vimeo_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['vimeo_title'] ); ?>"><i class="fab fa-vimeo-v"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['behance_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['behance_title'] ); ?>"><i class="fab fa-behance"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['dribble_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['dribble_title'] ); ?>"><i class="fab fa-dribbble"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['pinterest_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['pinterest_title'] ); ?>"><i class="fab fa-pinterest-p"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['gitub_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $slide['gitub_title'] ); ?>"><i class="fab fa-github"></i></a>
                                        <?php endif; ?>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


    <!-- style 3 -->
    <?php elseif ( $settings['design_style'] === 'style_3' ): ?>
    	<div class="team-area pb-90 pos-relative">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <div class="shape sp1 bounce-animate"><img src="img/shape/sp2.png" alt=""></div>
            <div class="shape sp2 bounce-animate"><img src="img/shape/sp1.png" alt=""></div>
            <div class="shape sp3 bounce-animate"><img src="img/shape/sp3.png" alt=""></div>
            <div class="shape sp4 bounce-animate"><img src="img/shape/sp4.png" alt=""></div>
            <?php endif;?>
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $slide ) :
                        $title = bdevs_element_kses_basic( $slide['title' ] );
                        $slide_url = esc_url($slide['slide_url']);
                        
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                            if ( ! $image ) {
                                $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '' ;
                            }  
                        }          
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="team-wrapper text-center mb-30">
                            <?php if( !empty( $image ) ) : ?>
                            <div class="team-img">
                                <img src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','zomata'); ?>"/>
                                <div class="team-icon">
                                        <?php if( !empty($slide['web_title'] ) ) : ?>
                                            <a href="<?php echo esc_url( $slide['web_title'] ); ?>">
                                                <i class="far fa-globe"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['email_title'] ) ) : ?> 
                                            <a href="mailto:<?php echo esc_url( $slide['email_title'] ); ?>">
                                                <i class="fal fa-envelope"></i>
                                            </a>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['phone_title'] ) ) : ?>
                                            <a href="tell:<?php echo esc_url( $slide['phone_title'] ); ?>">
                                                <i class="fas fa-phone"></i>
                                            </a>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['facebook_title'] ) ) : ?>
                                            <a href="<?php echo esc_url( $slide['facebook_title'] ); ?>">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['twitter_title'] ) ) : ?>
                                            <a href="<?php echo esc_url( $slide['twitter_title'] ); ?>">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['instagram_title'] ) ) : ?> 
                                            <a href="<?php echo esc_url( $slide['instagram_title'] ); ?>">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['linkedin_title'] ) ) : ?>   
                                            <a href="<?php echo esc_url( $slide['linkedin_title'] ); ?>">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['youtube_title'] ) ) : ?>  
                                            <a href="<?php echo esc_url( $slide['youtube_title'] ); ?>">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['googleplus_title'] ) ) : ?> 
                                            <a href="<?php echo esc_url( $slide['googleplus_title'] ); ?>">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['flickr_title'] ) ) : ?>  
                                            <a href="<?php echo esc_url( $slide['flickr_title'] ); ?>">
                                                <i class="fab fa-flickr"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['vimeo_title'] ) ) : ?>  
                                            <a href="<?php echo esc_url( $slide['vimeo_title'] ); ?>">
                                                <i class="fab fa-vimeo-v"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['behance_title'] ) ) : ?>   
                                            <a href="<?php echo esc_url( $slide['behance_title'] ); ?>">
                                                <i class="fab fa-behance"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['dribble_title'] ) ) : ?>  
                                            <a href="<?php echo esc_url( $slide['dribble_title'] ); ?>">
                                                <i class="fab fa-dribbble"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['pinterest_title'] ) ) : ?>  
                                            <a href="<?php echo esc_url( $slide['pinterest_title'] ); ?>">
                                                <i class="fab fa-pinterest-p"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['gitub_title'] ) ) : ?>
                                            <a href="<?php echo esc_url( $slide['gitub_title'] ); ?>">
                                                <i class="fab fa-github"></i>
                                            </a>
                                        <?php endif; ?>
                               </div>
                            </div>
                            <?php endif; ?>
                            <div class="team-text">
                            <?php printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title_slider' ),
                                $title,
                                $slide_url
                                ); 
                            ?>

                            <?php if( !empty( $slide['designation'] ) ) : ?>
                                <span><?php echo bdevs_element_kses_basic( $slide['designation'] ); ?></span>
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
