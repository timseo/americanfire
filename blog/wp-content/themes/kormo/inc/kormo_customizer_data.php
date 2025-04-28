<?php
/** 
 * Kormo Customizer data
 */
function kormo_customizer( $data ) {
	return array(
		'panel' => array ( 
			'id' => 'kormo',
			'name' => esc_html__('Kormo Customizer','kormo'),
			'priority' => 10,
			'section' => array(
				'topbar_setting' => array(
					'name' => esc_html__( 'Topbar Swticher', 'kormo' ),
					'priority' => 10,
					'fields' => array(
						array(
							'name' => esc_html__( 'Topbar Swicher', 'kormo' ),
							'id' => 'topbar_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Language Swicher', 'kormo' ),
							'id' => 'lang_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),						
						array(
							'name' => esc_html__( 'Phone Number', 'kormo' ),
							'id' => 'phone_number',
							'default' => '+00 (123) 2456 88',
							'type' => 'text',
							'transport'	=> 'refresh'
						),						
						array(
							'name' => esc_html__( 'Phone Number', 'kormo' ),
							'id' => 'welcome_text',
							'default' => 'Welcome to kormo. We are always with you to make your project.',
							'type' => 'text',
							'transport'	=> 'refresh'
						)

					) 
				),
				'topbar_social_profiles_setting' => array(
					'name' => esc_html__( 'Topbar Social Profiles', 'kormo' ),
					'priority' => 10,
					'fields' => array(				
						array(
							'name' => esc_html__( 'Facebook Url', 'kormo' ),
							'id' => 'topbar_fb_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'kormo' ),
							'id' => 'topbar_twitter_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Google Plus Url', 'kormo' ),
							'id' => 'topbar_google_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'kormo' ),
							'id' => 'topbar_instagram_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

					) 
				),
				'header_setting' => array(
					'name' => esc_html__( 'Header Setting', 'kormo' ),
					'priority' => 11,
					'fields' => array(
						array(
							'name' => esc_html__( 'Header Logo', 'kormo' ),
							'id' => 'logo',
							'default' => get_template_directory_uri() . '/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header White Logo', 'kormo' ),
							'id' => 'seconday_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo-white.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header Retina Logo', 'kormo' ),
							'id' => 'retina_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo@2x.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header Retina White Logo', 'kormo' ),
							'id' => 'retina_secondary_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo-white@2x.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Favicon', 'kormo' ),
							'id' => 'favicon_url',
							'default' => get_template_directory_uri() . '/img/logo/favicon.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Sticky Menu Swicher', 'kormo' ),
							'id' => 'sticky_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),

					) 
				),
				'quote_setting' => array(
					'name' => esc_html__( 'Quote Setting', 'kormo' ),
					'priority' => 11,
					'fields' => array(
						array(
							'name' => esc_html__( 'Quote Button', 'kormo' ),
							'id' => 'get_a_quote',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Quote Button Text', 'kormo' ),
							'id' => 'get_a_quote_text',
							'default' => esc_html__('Get a Quote','kormo'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Quote Button Link', 'kormo' ),
							'id' => 'get_a_quote_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

					) 
				),
				'blog_setting'=> array(
					'name'=> esc_html__('Blog Setting','kormo'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name'=>esc_html__('Read More Text','kormo'),
							'id'=>'kormo_blog_read_more_text',
							'default'=> esc_html__('Read More', 'kormo'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Read More Icon','kormo'),
							'id'=>'kormo_blog_read_more_text_icon',
							'default'=> '&rarr;',
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name' => esc_html__( 'Blog Button Show', 'kormo' ),
							'id' => 'kormo_blog_btn_show',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),	
					)
				),	
				'breadcrumb_setting'=> array(
					'name'=> esc_html__('Breadcrumb Setting','kormo'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Breadcrumb Background Image', 'kormo' ),
							'id' => 'breadcrumb_bg_img',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name'=>esc_html__('Breadcrumb Padding Top : PX','kormo'),
							'id'=>'kormo_breadcrumb_top',
							'default'=> '160px',
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Breadcrumb Padding Bottom : PX','kormo'),
							'id'=>'kormo_breadcrumb_bottom',
							'default'=> '170px',
							'type'=>'text',
							'transport'	=> 'refresh'  
						),	
					)
				),
				'color_setting'=> array(
					'name'=> esc_html__('Color Setting','kormo'),
					'priority'=> 14,
					'fields'=> array(
					
						array(
							'name'=>esc_html__('Theme Color','kormo'),
							'id'=>'kormo_color_option',
							'default'=> esc_html__('#2154CF','kormo'),
							'transport'	=> 'refresh'  
						),
						
					)
				),
				'rtl_setting'=> array(
					'name'=> esc_html__('RTL Setting','kormo'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name'=>esc_html__('Switch RTL','kormo'),
							'id'=>'rtl_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						
					)
				),
				'google_map_setting'=> array(
					'name'=> esc_html__('Google Map Setting','kormo'),
					'priority'=> 19,
					'fields'=> array(
						array(
							'name'=>esc_html__('Map Api Key','kormo'),
							'id'=>'kormo_map_api',
							'default'=> esc_html__('','kormo'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						
					)
				),
				'footer_setting'=> array(
					'name'=> esc_html__('Footer Setting','kormo'),
					'priority'=> 15,
					'fields'=> array(
						array(
							'name'=>esc_html__('Copy Right','kormo'),
							'id'=>'kormo_copyright',
							'default'=> esc_html__('Copyright &copy;2018 NilArtStudio. All Rights Reserved Copyright','kormo'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						
					)
				),
			),
		)
	);

}

add_filter('kormo_customizer_data', 'kormo_customizer');


