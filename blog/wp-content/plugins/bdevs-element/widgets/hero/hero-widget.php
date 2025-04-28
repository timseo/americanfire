<?php
namespace BdevsElement\Widget;

use \Elementor\Group_Control_Css_Filter;
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

class Hero extends BDevs_El_Widget {

    
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
        return 'hero';
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
        return __( 'Hero', 'bdevselement' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net/bdevselement/hero/';
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
        return 'eicon-elementor';
    }

    public function get_keywords() {
        return [ 'hero', 'blurb', 'infobox', 'content', 'block', 'box' ];
    }

    protected function register_content_controls() {
        $this->start_controls_section(
            '_section_design',
            [
                'label' => __( 'Design Style', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevselement'),
                    'style_2' => __('Style 2', 'bdevselement'),
                    'style_3' => __('Style 3', 'bdevselement'),
                    'style_4' => __('Style 4', 'bdevselement'),
                    'style_5' => __('Style 5', 'bdevselement'),
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

        // App Button
        $this->start_controls_section(
            'App Button',
            [
                'label' => __( 'App Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_3'],
                ],
            ]
        );

        $this->add_control(
            'app_sub_title',
            [
                'label' => __( 'App Sub Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'App Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Enter App Sub Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'app_title',
            [
                'label' => __( 'App Title', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'App Title', 'bdevselement' ),
                'placeholder' => __( 'App Title Here', 'bdevselement' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'app_button_link',
            [
                'label' => __( 'App Button Link', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'App Link Here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();


         // Apple Button
        $this->start_controls_section(
            'Apple Button',
            [
                'label' => __( 'Apple Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_3'],
                ],
            ]
        );

        $this->add_control(
            'apple_sub_title',
            [
                'label' => __( 'Apple Sub Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Apple Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Enter Apple Sub Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'apple_title',
            [
                'label' => __( 'Apple Title', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Apple Title', 'bdevselement' ),
                'placeholder' => __( 'Apple Title Here', 'bdevselement' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $this->add_control(
            'apple_button_link',
            [
                'label' => __( 'Apple Button Link', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( '#', 'bdevselement' ),
                'placeholder' => __( 'Apple Link Here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->end_controls_section();


        // image
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
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
                'condition' => [
                    'design_style' => ['style_3','style_4','style_5'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control (
            'image_position',
            [
                'label' => __( 'Image Position', 'bdevselement' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevselement' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => __( 'Top', 'bdevselement' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevselement' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'top',
                'prefix_class' => 'bdevs-card--',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __( 'Background Image', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_3','style_5'],
                ],
            ]
        );

        $this->add_control(
            'hero_circle_one',
            [
                'label' => __( 'Hero Circle One', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_3'],
                ],
            ]
        );

        $this->add_control(
            'hero_shape_one',
            [
                'label' => __( 'Hero Shape One', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2','style_4','style_5'],
                ],
            ]
        );

        $this->add_control(
            'hero_shape_two',
            [
                'label' => __( 'Hero Shape Two', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2'],
                ],
            ]
        );

        $this->add_control(
            'hero_shape_three',
            [
                'label' => __( 'Hero Shape Three', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2'],
                ],
            ]
        );


        $this->add_control(
            'hero_shape_four',
            [
                'label' => __( 'Hero Shape Four', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2'],
                ],
            ]
        ); 

        $this->add_control(
            'hero_shape_five',
            [
                'label' => __( 'Hero Shape Five', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2'],
                ],
            ]
        );

        $this->add_control(
            'hero_shape_six',
            [
                'label' => __( 'Hero Shape Six', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );

        $this->add_control(
            'hero_shape_seven',
            [
                'label' => __( 'Hero Shape Seven', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );

        $this->add_control(
            'hero_shape_eight',
            [
                'label' => __( 'Hero Shape Eight', 'bdevselement' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'bg_thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );


        $this->end_controls_section();

        // Title & Description
        $this->start_controls_section (
            '_section_title',
            [
                'label' => __( 'Title & Description', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Card Title', 'bdevselement' ),
                'placeholder' => __( 'Enter Card Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Sub Title', 'bdevselement' ),
                'placeholder' => __( 'Enter Sub Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1','style_2','style_3'],
                ],
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __( 'Video URL', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'bdevs video url goes here', 'bdevselement' ),
                'placeholder' => __( 'Set Video URL', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_5'],
                ],
            ]
        );

        $this->add_control(
            'video_title',
            [
                'label' => __( 'Video Title', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Video Title', 'bdevselement' ),
                'placeholder' => __( 'Enter Video Title', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_5'],
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevselement' ),
                'description' => bdevs_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Card description goes here', 'bdevselement' ),
                'placeholder' => __( 'Enter card description', 'bdevselement' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'hero__search_info',
            [
                'label' => __( 'Hero Search Info', 'bdevselement' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Hero Search Info', 'bdevselement' ),
                'placeholder' => __( 'Hero Search Info here', 'bdevselement' ),
                'dynamic' => [
                    'active' => true,
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
                'default' => 'h2',
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
                    '{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Contact Form 7
        $this->start_controls_section(
            '_section_cf7',
            [
                'label' => bdevs_element_is_cf7_activated() ? __('Contact Form 7', 'bdevselement') : __('Missing Notice', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        if (!bdevs_element_is_cf7_activated()) {
            $this->add_control(
                '_cf7_missing_notice',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => sprintf(
                        __('Hello %2$s, looks like %1$s is missing in your site. Please click on the link below and install/activate %1$s. Make sure to refresh this page after installation or activation.', 'bdevselement'),
                        '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term'))
                        . '" target="_blank" rel="noopener">Contact Form 7</a>',
                        bdevs_element_get_current_user_display_name()
                    ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

            $this->add_control(
                '_cf7_install',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term')) . '" target="_blank" rel="noopener">Click to install or activate Contact Form 7</a>',
                ]
            );
            $this->end_controls_section();
            return;
        }

        $this->add_control(
            'form_id',
            [
                'label' => __('Select Your Form', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => ['' => __('', 'bdevselement')] + \bdevs_element_get_cf7_forms(),
            ]
        );

        $this->add_control(
            'html_class',
            [
                'label' => __('HTML Class', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => __('Add CSS custom class to the form.', 'bdevselement'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2','style_4','style_5']
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
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

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $this->add_control(
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

        $this->add_control(
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

        $this->add_control(
            'button2_text',
            [
                'label' => __( 'Text', 'bdevselement' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button 2 Text',
                'placeholder' => __( 'Type button 2 text here', 'bdevselement' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button2_link',
            [
                'label' => __( 'Link', 'bdevselement' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( bdevs_element_is_elementor_version( '<', '2.6.0' ) ) {
            $this->add_control(
                'button2_icon',
                [
                    'label' => __( 'Icon', 'bdevselement' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button2_icon!' => ''];
        } else {
            $this->add_control(
                'button2_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button2_selected_icon[value]!' => ''];
        }

        $this->add_control(
            'button2_icon_position',
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

        $this->add_control(
            'button2_icon_spacing',
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

        $this->end_controls_section();

        // brand
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Brand Item', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2']
                ],
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


        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__( 'Brand Item', 'bdevs-elementor' ),
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
            '_section_style_image',
            [
                'label' => __( 'Image', 'bdevselement' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'offset_toggle',
            [
                'label' => __( 'Offset', 'bdevselement' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'bdevselement' ),
                'label_on' => __( 'Custom', 'bdevselement' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'image_offset_x',
            [
                'label' => __( 'Offset Left', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'render_type' => 'ui'
            ]
        );

        $this->add_responsive_control(
            'image_offset_y',
            [
                'label' => __( 'Offset Top', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    // Left image position styles
                    '(desktop){{WRAPPER}}.bdevs-card--left .hero-ilustration-shape img' => 'margin-left: {{image_offset_x.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + (-1 * {{image_offset_x.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + (-1 * {{image_offset_x.SIZE || 0}}{{UNIT}}));',
                    '(tablet){{WRAPPER}}.bdevs-card--left .hero-ilustration-shape img' => 'margin-left: {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + (-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + (-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}));',
                    '(mobile){{WRAPPER}}.bdevs-card--left .hero-ilustration-shape img' => 'margin-left: {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + (-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + (-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}));',
                    // Image right position styles
                    '(desktop){{WRAPPER}}.bdevs-card--right .hero-ilustration-shape img' => 'margin-right: calc(-1 * {{image_offset_x.SIZE || 0}}{{UNIT}}); flex: 0 0 calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + {{image_offset_x.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width.SIZE || 50}}{{image_width.UNIT}}) + {{image_offset_x.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}}.bdevs-card--right .hero-ilustration-shape img' => 'margin-right: calc(-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}); flex: 0 0 calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width_tablet.SIZE || 50}}{{image_width_tablet.UNIT}}) + {{image_offset_x_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}}.bdevs-card--right .hero-ilustration-shape img' => 'margin-right: calc(-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}); flex: 0 0 calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width_mobile.SIZE || 50}}{{image_width_mobile.UNIT}}) + {{image_offset_x_mobile.SIZE || 0}}{{UNIT}});',
                    // Image translate styles
                    '(desktop){{WRAPPER}} .hero-ilustration-shape img' => '-ms-transform: translate({{image_offset_x.SIZE || 0}}{{UNIT}}, {{image_offset_y.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{image_offset_x.SIZE || 0}}{{UNIT}}, {{image_offset_y.SIZE || 0}}{{UNIT}}); transform: translate({{image_offset_x.SIZE || 0}}{{UNIT}}, {{image_offset_y.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}} .hero-ilustration-shape img' => '-ms-transform: translate({{image_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{image_offset_y_tablet.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{image_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{image_offset_y_tablet.SIZE || 0}}{{UNIT}}); transform: translate({{image_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{image_offset_y_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}} .hero-ilustration-shape img' => '-ms-transform: translate({{image_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{image_offset_y_mobile.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{image_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{image_offset_y_mobile.SIZE || 0}}{{UNIT}}); transform: translate({{image_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{image_offset_y_mobile.SIZE || 0}}{{UNIT}});',
                    // Card body styles
                    '{{WRAPPER}}.bdevs-card--top .hero-ilustration-shape img' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_popover();

        $this->add_responsive_control(
            'image_padding',
            [
                'label' => __( 'Padding', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .hero-ilustration-shape img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .hero-ilustration-shape img',
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevselement' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .hero-ilustration-shape img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .hero-ilustration-shape img',
                'separator' => 'after'
            ]
        );

        $this->start_controls_tabs(
            '_tabs_image_effects',
            [
                'separator' => 'before'
            ]
        );

        $this->start_controls_tab(
            '_tab_image_effects_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'image_opacity',
            [
                'label' => __( 'Opacity', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-ilustration-shape img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'image_css_filters',
                'selector' => '{{WRAPPER}} .hero-ilustration-shape img',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab( 'hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'image_opacity_hover',
            [
                'label' => __( 'Opacity', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-ilustration-shape img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'image_css_filters_hover',
                'selector' => '{{WRAPPER}} .hero-ilustration-shape:hover img',
            ]
        );

        $this->add_control(
            'image_background_hover_transition',
            [
                'label' => __( 'Transition Duration', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-ilustration-shape img' => 'transition-duration: {{SIZE}}s;',
                ],
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => __( 'Hover Animation', 'bdevselement' ),
                'type' => Controls_Manager::HOVER_ANIMATION,
                'label_block' => true,
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Title & Description', 'bdevselement' ),
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
                    '{{WRAPPER}} .hero-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'name' => 'title_typography',
                'label' => __( 'Typography', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Description', 'bdevselement' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevselement' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-card-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-card-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Typography', 'bdevselement' ),
                'selector' => '{{WRAPPER}} .bdevs-card-text',
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
            '_tab_button_hover',
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

        /** button 2 **/
        $this->start_controls_section(
            '_section_style_button2',
            [
                'label' => __( 'Button 2', 'bdevselement' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button2_padding',
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
                'name' => 'button2_typography',
                'selector' => '{{WRAPPER}} .bdevs-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button2_border',
                'selector' => '{{WRAPPER}} .bdevs-btn',
            ]
        );

        $this->add_control(
            'button2_border_radius',
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
                'name' => 'button2_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-btn',
            ]
        );

        $this->add_control(
            'hr2',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button2' );

        $this->start_controls_tab(
            '_tab_button2_normal',
            [
                'label' => __( 'Normal', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button2_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn.red' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn.red' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button2_hover',
            [
                'label' => __( 'Hover', 'bdevselement' ),
            ]
        );

        $this->add_control(
            'button2_hover_color',
            [
                'label' => __( 'Text Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn.red:hover, {{WRAPPER}} .bdevs-btn.red:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn.red:hover, {{WRAPPER}} .bdevs-btn.red:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevselement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn.red:hover, {{WRAPPER}} .bdevs-btn.red:focus' => 'border-color: {{VALUE}};',
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
        $this->add_render_attribute( 'title', 'class', 'hero__title wow fadeInUp' );

        $this->add_inline_editing_attributes( 'description', 'intermediate' );
        $this->add_render_attribute( 'description', 'class', 'bdevs-card-text' );

        $this->add_inline_editing_attributes( 'button_text', 'none' );
        $this->add_render_attribute( 'button_text', 'class', 'bdevs-btn-text' );
        $this->add_render_attribute( 'button', 'class', 'bdevs-btn' );

        if( !empty($settings['button_link']) ) 
            $this->add_link_attributes( 'button', $settings['button_link'] );

        $this->add_inline_editing_attributes( 'button2_text', 'none' );
        $this->add_render_attribute( 'button2_text', 'class', 'bdevs-btn-text' );
        $this->add_render_attribute( 'button2', 'class', 'bdevs-btn' );

        if ( !empty($settings['button2_link']) )
            $this->add_link_attributes( 'button2', $settings['button2_link'] );
        
        ?>

        <?php if ($settings['design_style'] === 'style_5'):

            if ( !empty($settings['bg_image']['id']) ){
                $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['bg_thumbnail_size'] );
            }

            if ( !empty($settings['image']['id']) ){
                $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['bg_thumbnail_size'] );
            }

            if ( !empty($settings['hero_shape_one']['id']) ){
                $hero_shape_one = wp_get_attachment_image_url( $settings['hero_shape_one']['id'], $settings['bg_thumbnail_size'] );
            }

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'hero__title-5 wow fadeInUp' );
            $this->add_render_attribute( 'title', 'data-wow-delay', '.3s' );

            $this->add_render_attribute('button', 'class', 'w-btn w-btn-6 w-btn-white w-btn-white-4 mr-30 wow fadeInUp bdevs-btn');
            $this->add_render_attribute('button', 'data-wow-delay', '.7s');  

            if( !empty($settings['button_link']) ) 
            $this->add_link_attributes('button', $settings['button_link']);            
        ?>

        <section class="hero__area hero__height-5 hero__bg p-relative d-flex align-items-center" data-background="<?php print esc_url($bg_image); ?>">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <div class="hero__shape-5">
               <img class="hero-5-triangle-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-5/hero-5-triangle.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-5-triangle-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-5/hero-5-triangle-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-5-line" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-5/hero-line.png" alt="<?php print esc_attr__('image','wetland'); ?>">
            </div>
            <?php endif;?>  

            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-6 col-xl-6 col-lg-6">
                     <div class="hero__content-5">
                        <?php if ( $settings['title' ] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    bdevs_element_kses_basic( $settings['title' ] )
                                    );
                            endif;
                        ?>
                        <?php if ( $settings['description'] ) : ?>
                            <p class="wow fadeInUp" data-wow-delay=".5s"><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                        <?php endif; ?>
                        <div class="hero__btn d-sm-flex align-items-center">

                           <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>

                           <a href="<?php echo esc_url( $settings['video_url'] ); ?>" data-fancybox="" class="play-btn d-flex align-items-center wow fadeInUp" data-wow-delay=".9s"> <span> <i class="arrow_triangle-right "></i></span><?php echo bdevs_element_kses_intermediate( $settings['video_title'] ); ?></a>

                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-5 col-xl-6 col-lg-6">
                     <div class="hero__thumb-5 p-relative wow fadeInRight" data-wow-delay=".5s">
                        <?php if ( !empty($image) ) : ?>
                            <img class="hero-5-thumb" src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>
                        <?php if ( !empty($hero_shape_one) ) : ?>
                        <img class="hero-5-shape" src="<?php print esc_url($hero_shape_one); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
        </section>

        <?php elseif ($settings['design_style'] === 'style_4'):

            if ( !empty($settings['image']['id']) ){
                $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['bg_thumbnail_size'] );
            }

            if ( !empty($settings['hero_shape_one']['id']) ){
                $hero_shape_one = wp_get_attachment_image_url( $settings['hero_shape_one']['id'], $settings['bg_thumbnail_size'] );
            }

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'hero__title-4 wow fadeInUp' );
            $this->add_render_attribute( 'title', 'data-wow-delay', '.3s' );

            $this->add_render_attribute('button', 'class', 'w-btn-round mr-25 wow fadeInUp bdevs-btn');
            $this->add_render_attribute('button', 'data-wow-delay', '.7s');  

            $this->add_render_attribute('button2', 'class', 'w-btn-round w-btn-round-2 wow fadeInUp bdevs-btn');
            $this->add_render_attribute('button2', 'data-wow-delay', '1.2s');
            if( !empty($settings['button_link']) ) 
            $this->add_link_attributes('button', $settings['button_link']);            
        ?>

        <section class="hero__area hero__height-4 grey-bg-9 p-relative d-flex align-items-center">
            <?php if ( !empty($settings['shape_switch']) ): ?>
             <div class="hero__shape-4">
                <img class="smile" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-4/smile.png" alt="<?php print esc_attr__('image','wetland'); ?>">
                <img class="smile-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-4/smile-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
                <img class="cross-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-4/cross-1.png" alt="<?php print esc_attr__('image','wetland'); ?>">
                <img class="cross-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-4/cross-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
                <img class="cross-3" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-4/cross-3.png" alt="<?php print esc_attr__('image','wetland'); ?>">
                <img class="dot-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-4/dot-1.png" alt="<?php print esc_attr__('image','wetland'); ?>">
                <img class="dot-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-4/dot-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
                <img class="dot-3" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-4/dot-3.png" alt="<?php print esc_attr__('image','wetland'); ?>">
             </div>
            <?php endif;?> 

             <div class="container">
                <div class="row align-items-center">
                   <div class="col-xxl-7 col-xl-7 col-lg-6">
                      <div class="hero__content-4 pr-70">
                          <?php
                            if ( $settings['title' ] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    bdevs_element_kses_basic( $settings['title' ] )
                                    );
                                endif;
                            ?>
                        <?php if ( $settings['description'] ) : ?>
                            <p class="wow fadeInUp" data-wow-delay=".5s"><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                        <?php endif; ?>

                         <div class="hero__features d-sm-flex mb-25 wow fadeInUp" data-wow-delay=".7s">
                            <?php if ( $settings['hero__search_info'] ) : ?>
                                <div class="hero__features-item hero__features-item-list">
                                    <?php echo bdevs_element_kses_intermediate( $settings['hero__search_info'] ); ?>
                                </div>
                            <?php endif; ?>
                         </div>

                         <div class="hero__btn-4">
                            <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>

                            <!-- Button 2 -->

                            <?php if ($settings['button2_text'] && ((empty($settings['button2_selected_icon']) || empty($settings['button2_selected_icon']['value'])) && empty($settings['button2_link']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button2'),
                                    esc_html($settings['button2_text'])
                                );
                            elseif (empty($settings['button2_text']) && ((!empty($settings['button2_selected_icon']) || empty($settings['button2_selected_icon']['value'])) || !empty($settings['button2_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button2'); ?>><?php bdevs_element_render_icon($settings, 'button2_icon', 'button2_selected_icon'); ?></a>
                            <?php elseif ($settings['button2_text'] && ((!empty($settings['button2_selected_icon']) || empty($settings['button2_selected_icon']['value'])) || !empty($settings['button2_icon']))) :
                                if ($settings['button2_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button2'); ?>><?php bdevs_element_render_icon($settings, 'button2_icon', 'button2_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button2_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button2'); ?>>
                                        <span><?php echo esc_html($settings['button2_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button2_icon', 'button2_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                            endif; ?>

                         </div>

                      </div>
                   </div>
                   <div class="col-xxl-5 col-xl-5 col-lg-6">
                      <div class="hero__thumb-4-wrapper">
                         <div class="hero__thumb-4 p-relative">
                            <?php if ( !empty($image) ) : ?>
                                <img class="girl" src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                            <?php endif; ?>

                            <?php if ( !empty($hero_shape_one) ) : ?>
                                <img class="flower" src="<?php print esc_url($hero_shape_one); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                             <?php endif; ?>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
        </section>

        <?php elseif ($settings['design_style'] === 'style_3'):

            if ( !empty($settings['bg_image']['id']) ){
                $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['bg_thumbnail_size'] );
            }

            if ( !empty($settings['image']['id']) ){
                $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['bg_thumbnail_size'] );
            }

            if ( !empty($settings['hero_circle_one']['id']) ) {
                $hero_circle_one = wp_get_attachment_image_url( $settings['hero_circle_one']['id'], $settings['bg_thumbnail_size'] );
            }

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'hero__title-3 wow fadeInUp' );

            $this->add_render_attribute('button', 'class', 'w-btn w-btn-blue w-btn-7 w-btn-6 bdevs-btn');
            if( !empty($settings['button_link']) ) 
            $this->add_link_attributes('button', $settings['button_link']);            

        ?>

        <section class="hero__area hero__height-3 hero__bg p-relative d-flex align-items-center" data-background="<?php print esc_url($bg_image); ?>">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <div class="hero__shape-3">
               <img class="hero-3-circle-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-3/hero-circle.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-3-dot" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-3/hero-dot.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-3-dot-3" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-3/hero-dot-3.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-3-dot-4" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-3/hero-dot-4.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-3-triangle" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-3/hero-triangle.png" alt="<?php print esc_attr__('image','wetland'); ?>">
            </div>
            <?php endif; ?>

            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
                     <div class="hero__thumb-3 ">
                        <?php if ( !empty($image) ) : ?>
                        <img class="hero-phone wow fadeInLeft" data-wow-delay=".3s" src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>

                        <?php if ( !empty($hero_circle_one) ) : ?>
                        <img class="hero-3-gradient" src="<?php print esc_url($hero_circle_one); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>

                        <img class="hero-3-dot-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-3/hero-dot-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
                     </div>
                  </div>
                  <div class="col-xxl-7 col-xl-7 col-lg-6 col-md-6">

                     <div class="hero__content-3 mb-100 pl-70">
                        <?php
                            if ( $settings['title' ] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    bdevs_element_kses_basic( $settings['title' ] )
                                    );
                            endif;
                        ?>
                        <?php if ( $settings['description'] ) : ?>
                        <p class="wow fadeInUp" data-wow-delay=".5s"><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                        <?php endif; ?>

                        <div class="hero__app wow fadeInUp" data-wow-delay=".7s">
                           <ul>
                            <?php if ( $settings['app_sub_title'] ) : ?>    
                              <li>
                                 <a href="<?php echo esc_url( $settings['app_button_link'] ); ?>" class="d-flex align-items-center active">
                                    <div class="hero__app-icon">
                                       <i class="fab fa-google-play"></i>
                                    </div>
                                    <div class="hero__app-content">
                                        <?php if ( $settings['app_sub_title'] ) : ?>
                                        <h5><?php echo bdevs_element_kses_intermediate( $settings['app_sub_title'] ); ?></h5>
                                        <?php endif; ?>

                                        <?php if ( $settings['app_title'] ) : ?>
                                            <span><?php echo bdevs_element_kses_intermediate( $settings['app_title'] ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                 </a>
                              </li>
                            <?php endif; ?>

                            <?php if ( $settings['apple_sub_title'] ) : ?>
                              <li>
                                 <a href="<?php echo esc_url($settings['apple_button_link']); ?>" class="d-flex align-items-center">
                                    <div class="hero__app-icon">
                                       <i class="fab fa-apple"></i>
                                    </div>
                                    <div class="hero__app-content">

                                        <?php if ( $settings['apple_sub_title'] ) : ?>
                                        <h5><?php echo bdevs_element_kses_intermediate( $settings['apple_sub_title'] ); ?></h5>
                                        <?php endif; ?>

                                        <?php if ( $settings['apple_title'] ) : ?>
                                            <span><?php echo bdevs_element_kses_intermediate( $settings['apple_title'] ); ?></span>
                                        <?php endif; ?>

                                    </div>
                                 </a>
                              </li>
                            <?php endif; ?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

        <?php elseif ($settings['design_style'] === 'style_2'): 
            if ( !empty($settings['bg_image']['id']) ){
                $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['bg_thumbnail_size'] );
            }

            if ( !empty($settings['hero_circle_one']['id']) ) {
                $hero_circle_one = wp_get_attachment_image_url( $settings['hero_circle_one']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_shape_one']['id']) ) {
                $hero_shape_one = wp_get_attachment_image_url( $settings['hero_shape_one']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_shape_two']['id']) ) {
                $hero_shape_two = wp_get_attachment_image_url( $settings['hero_shape_two']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_shape_three']['id']) ) {
                $hero_shape_three = wp_get_attachment_image_url( $settings['hero_shape_three']['id'], $settings['bg_thumbnail_size'] );
            } 
            if ( !empty($settings['hero_shape_four']['id']) ) {
                $hero_shape_four = wp_get_attachment_image_url( $settings['hero_shape_four']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_shape_five']['id']) ) {
                $hero_shape_five = wp_get_attachment_image_url( $settings['hero_shape_five']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_shape_six']['id']) ) {
                $hero_shape_six = wp_get_attachment_image_url( $settings['hero_shape_six']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_shape_seven']['id']) ) {
                $hero_shape_seven = wp_get_attachment_image_url( $settings['hero_shape_seven']['id'], $settings['bg_thumbnail_size'] );
            } 
            if ( !empty($settings['hero_shape_eight']['id']) ) {
                $hero_shape_eight = wp_get_attachment_image_url( $settings['hero_shape_eight']['id'], $settings['bg_thumbnail_size'] );
            }

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'hero__title-2' );

            $this->add_render_attribute('button', 'class', 'w-btn w-btn-blue w-btn-7 w-btn-6 bdevs-btn');
            $this->add_link_attributes('button', $settings['button_link']);


        ?>

        <section class="hero__area hero__height-2 p-relative d-flex align-items-center">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <div class="hero__shape-2">
               <img class="hero-2-dot" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-2/hero-2-dot.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-2-dot-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-2/hero-2-dot-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-2-flower" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-2/hero-2-flower.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-2-triangle" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-2/hero-2-triangle.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-2-triangle-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-2/hero-2-triangle-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
            </div>
            <?php endif; ?>
            <div class="container">
               <div class="row">

                  <div class="col-xxl-5 col-xl-6 col-lg-8">
                     <div class="hero__content-2 mt-55">
                        <?php if ( $settings['sub_title'] ) : ?>
                            <span class="hero__pre-title"><?php echo bdevs_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                        <?php endif; ?>

                        <?php
                            if ( $settings['title' ] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    bdevs_element_kses_basic( $settings['title' ] )
                                    );
                            endif;
                        ?>

                        <?php if ( $settings['description'] ) : ?>
                            <p><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                        <?php endif; ?>


                        <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                printf('<a %1$s>%2$s</a>',
                                    $this->get_render_attribute_string('button'),
                                    esc_html($settings['button_text'])
                                );
                            elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                if ($settings['button_icon_position'] === 'before'): ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                        <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    </a>
                                <?php
                                endif;
                        endif; ?>

                        <div class="hero__client mt-60">
                           <ul>
                            <?php 
                                foreach ( $settings['slides'] as $slide ) :
                                $image = wp_get_attachment_image_url( $slide['image']['id'], 'full' );
                                
                            ?>
                            <li><img src="<?php print esc_url($image); ?>" alt="<?php print esc_attr__('image','wetland'); ?>"></li>
                            <?php endforeach; ?>

                           </ul>
                        </div>
                     </div>
                  </div>

                  <div class="col-xxl-6 offset-xxl-1 col-xl-6">
                     <div class="hero__thumb-2 mt-80">

                        <div class="hero__thumb-inner p-relative ml-90">


                        <?php if ( !empty($hero_shape_one) ) : ?>
                           <img class="hero-2-thumb" src="<?php print esc_url($hero_shape_one); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>

                        <?php if ( !empty($hero_shape_two) ) : ?>
                           <img class="hero-2-girl" src="<?php print esc_url($hero_shape_two); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>

                        <?php if ( !empty($hero_shape_three) ) : ?>
                           <img class="hero-2-thumb-sm" src="<?php print esc_url($hero_shape_three); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>

                        <?php if ( !empty($hero_shape_four) ) : ?>
                           <img class="hero-2-thumb-sm-2" src="<?php print esc_url($hero_shape_four); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>

                        <?php if ( !empty($hero_shape_five) ) : ?>
                           <img class="hero-2-thumb-sm-3" src="<?php print esc_url($hero_shape_five); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>

                        <?php if ( !empty($hero_shape_six) ) : ?>
                           <img class="hero-2-circle" src="<?php print esc_url($hero_shape_six); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>

                        <?php if ( !empty($hero_shape_seven) ) : ?>
                           <img class="hero-2-circle-2" src="<?php print esc_url($hero_shape_seven); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>

                        <?php if ( !empty($hero_shape_eight) ) : ?>
                           <img class="hero-2-leaf" src="<?php print esc_url($hero_shape_eight); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                        <?php endif; ?>

                        </div>

                     </div>
                  </div>
               </div>
            </div>
        </section>

    ?>

     <?php else: 
            if ( !empty($settings['bg_image']['id']) ){
                $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_circle_one']['id']) ) {
                $hero_circle_one = wp_get_attachment_image_url( $settings['hero_circle_one']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_shape_one']['id']) ) {
                $hero_shape_one = wp_get_attachment_image_url( $settings['hero_shape_one']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_shape_two']['id']) ) {
                $hero_shape_two = wp_get_attachment_image_url( $settings['hero_shape_two']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_shape_three']['id']) ) {
                $hero_shape_three = wp_get_attachment_image_url( $settings['hero_shape_three']['id'], $settings['bg_thumbnail_size'] );
            } 
            if ( !empty($settings['hero_shape_four']['id']) ) {
                $hero_shape_four = wp_get_attachment_image_url( $settings['hero_shape_four']['id'], $settings['bg_thumbnail_size'] );
            }
            if ( !empty($settings['hero_shape_five']['id']) ) {
                $hero_shape_five = wp_get_attachment_image_url( $settings['hero_shape_five']['id'], $settings['bg_thumbnail_size'] );
            } 
        ?>

        <section class="hero__area hero__height p-relative d-flex align-items-center" data-background="<?php print esc_url($bg_image); ?>">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <div class="hero__shape">
               <img class="hero-circle-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-1/circle-1.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-circle-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-1/circle-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-triangle-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-1/triangle-1.png" alt="<?php print esc_attr__('image','wetland'); ?>">
               <img class="hero-triangle-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/hero/home-1/triangle-2.png" alt="<?php print esc_attr__('image','wetland'); ?>">
            </div>
            <?php endif;?>  

            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-7 col-xl-6 col-lg-6">

                     <div class="hero__content pr-80">

                        <?php
                            if ( $settings['title' ] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    bdevs_element_kses_basic( $settings['title' ] )
                                    );
                            endif;
                        ?>
                        <?php if ( $settings['description'] ) : ?>
                        <p class="wow fadeInUp" data-wow-delay=".5s"><?php echo bdevs_element_kses_intermediate( $settings['description'] ); ?></p>
                        <?php endif; ?>


                        <div class="hero__search wow fadeInUp" data-wow-delay=".7s">

                            <?php
                                if (!empty($settings['form_id'])) {
                                    echo bdevs_element_do_shortcode('contact-form-7', [
                                        'id' => $settings['form_id'],
                                        'html_class' => 'bdevs-cf7-form ' . bdevs_element_sanitize_html_class_param($settings['html_class']),
                                    ]);
                                }
                            ?>
                           
                           <?php if ( $settings['hero__search_info'] ) : ?>
                           <div class="hero__search-info">
                              <?php echo bdevs_element_kses_intermediate( $settings['hero__search_info'] ); ?>
                           </div>
                           <?php endif; ?>
                        </div>

                     </div>

                  </div>
                  <div class="col-xxl-5 col-xl-6 col-lg-6">
                     <div class="hero__thumb text-end ml-220">
                        <div class="hero__thumb-wrapper p-relative ">

                            <?php if ( !empty($hero_circle_one) ) : ?>
                                <img class="hero-circle" src="<?php print esc_url($hero_circle_one); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                            <?php endif; ?>
       
                            <?php if ( !empty($hero_shape_one) ) : ?>
                               <div class="hero__thumb-shape shape-1">
                                  <img src="<?php print esc_url($hero_shape_one); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                               </div>
                            <?php endif; ?>

                            <?php if ( !empty($hero_shape_two) ) : ?>
                               <div class="hero__thumb-shape shape-2">
                                  <img src="<?php print esc_url($hero_shape_two); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                               </div>
                            <?php endif; ?>

                            <?php if ( !empty($hero_shape_three) ) : ?>
                               <div class="hero__thumb-shape shape-3">
                                  <img src="<?php print esc_url($hero_shape_three); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                               </div>
                            <?php endif; ?>

                            <?php if ( !empty($hero_shape_four) ) : ?>
                               <div class="hero__thumb-shape shape-4">
                                  <img src="<?php print esc_url($hero_shape_four); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                               </div>
                            <?php endif; ?>

                            <?php if ( !empty($hero_shape_five) ) : ?>
                               <div class="hero__thumb-shape shape-5">
                                  <img src="<?php print esc_url($hero_shape_five); ?>" alt="<?php print esc_attr__('image','wetland'); ?>">
                               </div>
                            <?php endif; ?>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </section>

    <?php endif; ?>  

     <?php
    }

}