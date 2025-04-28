<?php 
namespace BdevsElement;

class Helper {

    /** 
    * Get widgets list
    */
    public static function get_widgets() {

        return [
        	
            'hero' => [
                'title' => __( 'Hero', 'bdevselement' ),
                'icon' => 'eicon-tabs',
                'ispro' =>true
            ],



            'cta' => [
                'title' => __( 'CTA', 'bdevselement' ),
                'icon' => 'fa fa-time',
                'ispro' =>true
            ],



            'faq' => [
                'title' => __( 'FAQ', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ],



            'about' => [
                'title' => __( 'About', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ],


            'about-tab' => [
                'title' => __( 'About Tab', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ],



            'brand' => [
                'title' => __( 'Brand', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ],

   
            'service' => [
                'title' => __( 'Service', 'bdevselement' ),
                'icon' => 'fa fa-card',
                'ispro' =>true
            ],


            'slider' => [
                'title' => __( 'Slider', 'bdevselement' ),
                'icon' => 'fa fa-image-slider',
                'ispro' =>true
            ], 

    

            'cf7' => [
                'title' => __( 'Contact Form 7', 'bdevselement' ),
                'icon' => 'fa fa-form',
            ],

            'contact-info' => [
                'title' => __( 'Contact Info', 'bdevselement' ),
                'icon' => 'fa fa-icon-box',
            ],

            'heading' => [
                'title' => __( 'Heading Title', 'bdevselement' ),
                'icon' => 'fa fa-icon-box',
            ],

            'icon-box' => [
                'title' => __( 'Icon box', 'bdevselement' ),
                'icon' => 'fa fa-blog-content',
            ], 

            'video-info' => [
                'title' => __( 'Video Info', 'bdevselement' ),
                'icon' => 'fa fa-blog-content',
            ],

            'infobox' => [
                'title' => __( 'Info Box', 'bdevselement' ),
                'icon' => 'fa fa-blog-content',
            ],            

            'member-slider' => [
                'title' => __( 'Team Member Slider', 'bdevselement' ),
                'icon' => 'fa fa-team-member',
            ],             

            'member-details' => [
                'title' => __( 'Member Details', 'bdevselement' ),
                'icon' => 'fa fa-team-member',
            ], 


            'fact' => [
                'title' => __( 'Fact', 'bdevselement' ),
                'icon' => 'fa fa-team-member',
            ],

            'pricing-table' => [
                'title' => __( 'Pricing Table', 'bdevselement' ),
                'icon' => 'fa fa-file-cabinet',
            ],           

            'post-list' => [
                'title' => __( 'Post List', 'bdevselement' ),
                'icon' => 'fa fa-post-list',
            ],

            'post-tab' => [
                'title' => __( 'Post Tab', 'bdevselement' ),
                'icon' => 'fa fa-post-tab',
            ],         

            'testimonial-slider' => [
                'title' => __( 'Testimonial Slider', 'bdevselement' ),
                'icon' => 'fa fa-testimonial',
                'css' => ['testimonial'],
                'js' => [],
                'vendor' => [
                    'css' => [],
                    'js' => [],
                ],
            ],


        ];
    }

    /**
    *  Get WooCommerce widgets list   
    **/
    public static function get_woo_widgets() { 

        return [
            'woo-product' => [
                'title' => __( 'Woo Product', 'bdevselement' ),
                'icon' => 'fa fa-card'
            ],
            'woo-product-tab' => [
                'title' => __( 'Woo Product Tab', 'bdevselement' ),
                'icon' => 'fa fa-card'
            ]

        ];
    }
}


