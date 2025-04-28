<?php
namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Core\Schemes;
use \Elementor\Group_Control_Background;
use \BdevsElement\BDevs_El_Select2;
use Elementor\Utils;

defined('ABSPATH') || die();

class Woo_Product extends BDevs_El_Widget
{

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
    public function get_name()
    {
        return 'woo_product';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __('Woo Product', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/post-list/';
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-product-images';
    }

    public function get_keywords()
    {
        return ['posts', 'post', 'post-list', 'list', 'product'];
    }

    /**
     * Get a list of All Post Types
     *
     * @return array
     */
    public function get_post_types()
    {
        $post_types = bdevs_element_get_post_types([], ['elementor_library', 'attachment']);
        return $post_types;
    }

    protected function register_content_controls()
    {

        $this->start_controls_section(
            '_section_post_list',
            [
                'label' => __('List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label' => __('Source', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => $this->get_post_types(),
                'default' => key($this->get_post_types()),
            ]
        );

        $this->add_control(
            'show_post_by',
            [
                'label' => __('Show post by:', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'default' => 'recent',
                'options' => [
                    'recent' => __('Recent Post', 'bdevselement'),
                    'selected' => __('Selected Post', 'bdevselement'),
                ],

            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Item Limit', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'dynamic' => ['active' => true],
                'condition' => [
                    'show_post_by' => ['recent']
                ]
            ]
        );

        $repeater = [];

        foreach ($this->get_post_types() as $key => $value) {

            $repeater[$key] = new Repeater();

            $repeater[$key]->add_control(
                'title',
                [
                    'label' => __('Title', 'bdevselement'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => __('Customize Title', 'bdevselement'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );


            $repeater[$key]->add_control(
                'post_id',
                [
                    'label' => __('Select ', 'bdevselement') . $value,
                    'label_block' => true,
                    'type' => BDevs_El_Select2::TYPE,
                    'multiple' => false,
                    'placeholder' => 'Search ' . $value,
                    'data_options' => [
                        'post_type' => $key,
                        'action' => 'bdevs_element_post_list_query'
                    ],
                ]
            );


            $this->add_control(
                'selected_list_' . $key,
                [
                    'label' => '',
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater[$key]->get_controls(),
                    'title_field' => '{{ title }}',
                    'condition' => [
                        'show_post_by' => 'selected',
                        'post_type' => $key
                    ],
                ]
            );
        }

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Heading Title',
                'placeholder' => __('Heading Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                    'span' => 'span',
                    'p' => 'p',
                ],
                'default' => 'h2',
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
  

        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevselement'),
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls()
    {

        $this->start_controls_section(
            '_section_post_list_style',
            [
                'label' => __('List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'list_item_common',
            [
                'label' => __('Common', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_responsive_control(
            'list_item_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'list_item_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'list_item_background',
                'label' => __('Background', 'bdevselement'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'list_item_box_shadow',
                'label' => __('Box Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'list_item_border',
                'label' => __('Border', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item',
            ]
        );

        $this->add_responsive_control(
            'list_item_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'advance_style',
            [
                'label' => __('Advance Style', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'bdevselement'),
                'label_off' => __('Off', 'bdevselement'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_responsive_control(
            'list_item_first',
            [
                'label' => __('First Item', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'list_item_first_child_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:first-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'list_item_first_child_border',
                'label' => __('Border', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:first-child',
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'list_item_last',
            [
                'label' => __('Last Item', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'list_item_last_child_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'list_item_last_child_border',
                'label' => __('Border', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item:last-child',
                'condition' => [
                    'advance_style' => 'yes',
                ]
            ]
        );

        $this->end_controls_section();
        //Title Style
        $this->start_controls_section(
            '_section_post_list_title_style',
            [
                'label' => __('Title', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'scheme' => Schemes\Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .bdevselement-post-list-title',
            ]
        );

        $this->start_controls_tabs('title_tabs');
        $this->start_controls_tab(
            'title_normal_tab',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_hover_tab',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'title_hvr_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list .bdevselement-post-list-item a:hover .bdevselement-post-list-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        //List Meta Style
        $this->start_controls_section(
            '_section_list_meta_style',
            [
                'label' => __('Meta', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'meta' => 'yes',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'label' => __('Typography', 'bdevselement'),
                'scheme' => Schemes\Typography::TYPOGRAPHY_3,
                'selector' => '{{WRAPPER}} .bdevselement-post-list-meta-wrap span',
            ]
        );

        $this->add_control(
            'meta_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'meta_space',
            [
                'label' => __('Space Between', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap span' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap span:last-child' => 'margin-right: 0;',
                ],
            ]
        );

        $this->add_responsive_control(
            'meta_box_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'meta_icon_heading',
            [
                'label' => __('Meta Icon', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'meta_icon_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap span i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'meta_icon_space',
            [
                'label' => __('Space Between', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .bdevselement-post-list-meta-wrap span i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if (!$settings['post_type']) return;
        $args = [
            'post_status' => 'publish',
            'post_type' => $settings['post_type'],
        ];
        if ('recent' === $settings['show_post_by']) {
            $args['posts_per_page'] = $settings['posts_per_page'];
        }

        $customize_title = [];
        $ids = [];
        if ('selected' === $settings['show_post_by']) {
            $args['posts_per_page'] = -1;
            $lists = $settings['selected_list_' . $settings['post_type']];
            if (!empty($lists)) {
                foreach ($lists as $index => $value) {
                    $ids[] = $value['post_id'];
                    if ($value['title']) $customize_title[$value['post_id']] = $value['title'];
                }
            }
            $args['post__in'] = (array)$ids;
            $args['orderby'] = 'post__in';
        }

        if ('selected' === $settings['show_post_by'] && empty($ids)) {
            $posts = [];
        } else {
            $posts = get_posts($args);
        }

        ?>

        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_5'):
        if (count($posts) !== 0) :
            ?>
            <section class="product-h-two">
                <div class="container">
                    <div class="row product-active common-arrows">
                        <?php foreach ($posts as $post): ?>
                            <div class="col-lg-3 col-sm-6 custom-width-20">
                                <div class="product-wrapper mb-40">
                                    <div class="pro-img mb-20">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                            <?php echo get_the_post_thumbnail($post->ID, 'large', ['class' => 'img-fluid']); ?>
                                        </a>
                                        <div class="product-action text-center">
                                            <?php echo \BdevsElement\BDevs_El_Woocommerce::add_to_cart_button($post->ID); ?>

                                            <?php echo \BdevsElement\BDevs_El_Woocommerce::quick_view_button($post->ID); ?>

                                            <?php echo \BdevsElement\BDevs_El_Woocommerce::yith_wishlist($post->ID); ?>
                                        </div>
                                    </div>
                                    <div class="pro-text">
                                        <div class="pro-title">
                                            <h6>
                                                <?php
                                                $title = $post->post_title;
                                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                                    $title = $customize_title[$post->ID];
                                                }

                                                printf('<a href="%2$s">%1$s</a>',
                                                    esc_html($title),
                                                    esc_url(get_the_permalink($post->ID))
                                                );
                                                ?>
                                            </h6>
                                            <h5 class="pro-price">
                                                <?php echo \BdevsElement\BDevs_El_Woocommerce::product_price($post->ID, true); ?>
                                            </h5>
                                        </div>
                                        <div class="cart-icon">
                                            <a href="<?php print esc_url(get_the_permalink($post->ID)); ?>">
                                                <i class="fal fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php
        else:
            printf('%1$s %2$s %3$s',
                __('No ', 'bdevselement'),
                esc_html($settings['post_type']),
                __('Found', 'bdevselement')
            );
        endif;
        ?>

    <?php elseif (!empty($settings['design_style']) and $settings['design_style'] == 'style_4'):
        if (count($posts) !== 0) :
            ?>
            <section class="product-h-three">
                <div class="container">
                    <div class="row custom-row-10">
                        <?php foreach ($posts as $post): ?>
                            <div class="col-lg-3 col-sm-6 custom-col-10 custom-width-20">
                                <div class="product-wrapper mb-40">
                                    <div class="pro-img mb-10">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                            <?php echo get_the_post_thumbnail($post->ID, 'large', ['class' => 'img-fluid']); ?>
                                        </a>
                                        <div class="product-action text-center">
                                            <?php echo \BdevsElement\BDevs_El_Woocommerce::add_to_cart_button($post->ID); ?>

                                            <?php echo \BdevsElement\BDevs_El_Woocommerce::quick_view_button($post->ID); ?>

                                            <?php echo \BdevsElement\BDevs_El_Woocommerce::yith_wishlist($post->ID); ?>
                                        </div>
                                    </div>
                                    <?php echo \BdevsElement\BDevs_El_Woocommerce::product_rating($post->ID); ?>
                                    <div class="pro-text">
                                        <div class="pro-title pro-title-three">
                                            <h6>
                                                <?php
                                                $title = $post->post_title;
                                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                                    $title = $customize_title[$post->ID];
                                                }

                                                printf('<a href="%2$s">%1$s</a>',
                                                    esc_html($title),
                                                    esc_url(get_the_permalink($post->ID))
                                                );
                                                ?>
                                            </h6>
                                            <h5 class="pro-price">
                                                <?php echo \BdevsElement\BDevs_El_Woocommerce::product_price($post->ID, true); ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php
        else:
            printf('%1$s %2$s %3$s',
                __('No ', 'bdevselement'),
                esc_html($settings['post_type']),
                __('Found', 'bdevselement')
            );
        endif;
        ?>
    <?php elseif (!empty($settings['design_style']) and $settings['design_style'] == 'style_3'):
        if (count($posts) !== 0) :
            ?>
            <section class="product-h-three">
                <div class="container">
                    <div class="row custom-row-10 product-active common-arrows">
                        <?php foreach ($posts as $post): ?>
                            <div class="col-lg-3 col-sm-6 custom-col-10">
                                <div class="product-wrapper mb-40">
                                    <div class="pro-img mb-10">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                            <?php print get_the_post_thumbnail($post->ID, 'full', ['class' => 'img-fluid']); ?>
                                        </a>
                                        <div class="product-action text-center">
                                            <?php echo \BdevsElement\BDevs_El_Woocommerce::add_to_cart_button($post->ID); ?>

                                            
                                            <?php echo \BdevsElement\BDevs_El_Woocommerce::quick_view_button($post->ID); ?>

                                            <?php echo \BdevsElement\BDevs_El_Woocommerce::yith_wishlist($post->ID); ?>
                                        </div>
                                    </div>
                                    <?php echo \BdevsElement\BDevs_El_Woocommerce::product_rating($post->ID); ?>
                                    <div class="pro-text">
                                        <div class="pro-title pro-title-three">
                                            <h6>
                                                <?php
                                                $title = $post->post_title;
                                                if ('selected' === $settings['show_post_by'] && array_key_exists($post->ID, $customize_title)) {
                                                    $title = $customize_title[$post->ID];
                                                }

                                                printf('<a href="%2$s">%1$s</a>',
                                                    esc_html($title),
                                                    esc_url(get_the_permalink($post->ID))
                                                );
                                                ?>
                                            </h6>
                                            <h5 class="pro-price">
                                                <?php echo \BdevsElement\BDevs_El_Woocommerce::product_price($post->ID, true); ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php
        else:
            printf('%1$s %2$s %3$s',
                __('No ', 'bdevselement'),
                esc_html($settings['post_type']),
                __('Found', 'bdevselement')
            );
        endif;
        ?>

    <?php elseif (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): ?>
        <?php if (count($posts) !== 0) : ?>
            <div class="best-product-heading">
            <?php if ($settings['title']): ?>
                <h2><?php echo bdevs_element_kses_intermediate($settings['title']); ?></h2>
            <?php endif; ?>
            </div>
            <div class="custom-sel-pro">
                <?php foreach ($posts as $post): ?>
                    <div class="product-select-item">
                        <div class="best-product-wrapper">
                            <div class="best-product-img">
                            <?php if (has_post_thumbnail($post->ID)): ?>
                            <?php echo get_the_post_thumbnail($post->ID, array(90,90), ['class' => 'img-fluid']); ?>
                            <?php endif; ?>
                            </div>
                            <div class="best-product-text">
                                <h4><a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                        <?php echo esc_html($post->post_title); ?>
                                    </a></h4>
                                <div class="best-pro-price">
                                     <?php echo \BdevsElement\BDevs_El_Woocommerce::product_price($post->ID, true); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php
        else:
            printf('%1$s %2$s %3$s',
                __('No ', 'bdevselement'),
                esc_html($settings['post_type']),
                __('Found', 'bdevselement')
            );
        endif;
        ?>
    <?php else: ?>
        <?php if (count($posts) !== 0) : ?>

            


    <div class="product-area pos-relative fix">
        <div class="container">  
            <div class="row">
                <?php foreach ($posts as $post): ?>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="product-wrapper text-center mb-30 <?php print esc_attr( $item_classes ); ?>">
                        <div class="product-img">
                            <?php if (has_post_thumbnail($post->ID)): ?>
                            <?php echo get_the_post_thumbnail($post->ID, 'full', ['class' => 'img-fluid']); ?>
                            <?php endif; ?>

                            <div class="product-action">
                                <?php echo \BdevsElement\BDevs_El_Woocommerce::add_to_cart_button($post->ID); ?>

                                <?php echo \BdevsElement\BDevs_El_Woocommerce::yith_wishlist($post->ID); ?>

                                <a href="<?php print get_the_permalink(); ?>"><i class="fal fa-search"></i></a>
                            </div>
                        </div>

                        <div class="product-text">
                            <h4>
                                <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                        <?php echo esc_html($post->post_title); ?>
                                    </a>
                            </h4>

                            <div class="pro-price">
                                <?php echo \BdevsElement\BDevs_El_Woocommerce::product_price($post->ID, true); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
        <?php
        else:
            printf('%1$s %2$s %3$s',
                __('No ', 'bdevselement'),
                esc_html($settings['post_type']),
                __('Found', 'bdevselement')
            );
        endif;
        ?>
    <?php endif;
    }
}
