<?php
/*
 * Theme Options
 * @package Evior
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
    exit(); // exit if access directly
}

if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'evior';

  //
  // Create options
  CSF::createOptions( $prefix.'_theme_options', array(
    'menu_title' => esc_html__('Theme Option','evior'),
    'menu_slug'  => 'evior-theme-option',
    'menu_type' => 'menu',
    'enqueue_webfont'         => true,
    'show_footer' => false,
    'framework_title'      => esc_html__('Evior Theme Options','evior'),
  ) );

  //
  // Create a section
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('General','evior'),
    'icon'  => 'fa fa-wrench',
    'fields' => array(

		array(
			'type' => 'subheading',
			'content' => '<h3>' . esc_html__('Site Logo', 'evior') . '</h3>',
		) ,
			
		array(
			'id' => 'theme_logo',
			'title' => esc_html__('Main Logo','evior'),
			'type' => 'media',
			'library' => 'image',
			'desc' => esc_html__('Upload Your Static Logo Image on Header Static', 'evior')
		), 
		
		
		array(
			'id' => 'logo_width',
			'type' => 'slider',
			'title' => esc_html__('Set Logo Width','evior'),
			'min' => 0,
			'max' => 300,
			'step' => 1,
			'unit' => 'px',
			'default' => 102,
			'desc' => esc_html__('Set Logo Width in px. Default Width 184px.', 'evior') ,
		) ,
		
	  
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Preloader','evior').'</h3>'
      ),
	  
	  
      array(
        'id' => 'preloader_enable',
        'title' => esc_html__('Enable Preloader','evior'),
        'type' => 'switcher',
        'desc' => esc_html__('Enable or Disable Preloader', 'evior') ,
        'default' => true,
      ),
	  
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Back Top Options','evior').'</h3>'
      ),
	  
	  
      array(
        'id' => 'back_top_enable',
        'title' => esc_html__('Scroll Top Button','evior'),
        'type' => 'switcher',
        'desc' => esc_html__('Enable or Disable scroll button', 'evior') ,
        'default' => true,
      ),
	  
	array(
		'type' => 'subheading',
		'content' =>'<h3>'.esc_html__('Theme Layout Options','evior').'</h3>'
	),


	array(
	  'id'          => 'theme_border_type',
	  'type'        => 'select',
	  'title'       => 'Select Theme Border Style Type for Blocks',
	  'options'     => array(
		'rounded'  => 'Rounded Design',
		'solid'  => 'Flat Design',
	  ),
	  'default'     => 'rounded'
	),
		

    )
  ) );

  /*-------------------------------------------------------
     ** Entire Site Header  Options
   --------------------------------------------------------*/
  
    CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Header','evior'),
    'id' => 'header_options',
    'icon' => 'fa fa-header',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Header Layout','evior').'</h3>'
      ),
        //
        // nav select
       array(
            'id' => 'nav_menu',
            'type' => 'image_select',
            'title' => esc_html__('Select Header Navigation Style','evior'),
            'options' => array(
                'nav-style-one' => EVIOR_IMG . '/admin/header-style/style1.png',
                'nav-style-two' => EVIOR_IMG . '/admin/header-style/style2.png',
				'nav-style-three' => EVIOR_IMG . '/admin/header-style/style2.png',
            ),
			
            'default' => 'nav-style-three'
        ),
	
	
     array(
            'id' => 'theme_header_sticky',
            'title' => esc_html__('Sticky Header', 'evior') ,
            'type' => 'switcher',
            'desc' => esc_html__('Enable Sticky Header', 'evior') ,
            'default' => true,
    ) ,

 
	array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Header Top Bar','evior').'</h3>'
      ),


   array(
        'id' => 'header_bg_enable',
        'title' => esc_html__('Enable Header Top Background','evior'),
        'type' => 'switcher',
        'desc' => esc_html__('Enable or Disable Top bar background', 'evior') ,
        'default' => false,
    ),


    array(
        'id' => 'topbar_bg_img',
        'title' => esc_html__('Set Top bar Background Image', 'evior'),
        'type' => 'background',
        'desc' => esc_html__('Set Hedaer top bar background image.', 'evior') ,
        'default' => array(
            'background-size' => 'cover',
            'background-position' => 'center center',
            'background-repeat' => 'no-repeat',
        ),
        'background_color' => false,
        'dependency' => array('header_bg_enable', '==', 'true')
    ),
    
    array(
        'id' => 'topbar_bg_color',
        'title' => esc_html__('Set Background Color', 'evior'),
        'type' => 'color',
        'default' => 'rgba(255,53,36,1)',
        'desc' => esc_html__('Set color for Top bar background.', 'evior') ,
        'dependency' => array('header_bg_enable', '==', 'true')
    ),


	  
	array(
        'id' => 'header_top_promo',
        'title' => esc_html__('Show Header Top Promotion Text','evior'),
        'type' => 'switcher',
        'default' => true,
		'desc' => esc_html__('Enable Header Promotion', 'evior') ,
    ),

	array(
		'id'         => 'promo_title',
		'type'       => 'text',
		'title'      => esc_html__('Promo Highlighted Title','evior'),
		'default'    => esc_html__('New','evior'),
		'desc'       => esc_html__('Type Title','evior'),
		'dependency' => array( 'header_top_promo', '==', 'true' ),
	),
	
	array(
		'id'         => 'promo_text',
		'type'       => 'text',
		'title'      => esc_html__('Promo Text','evior'),
		'default'    => esc_html__('Incredible offer for our exclusive subscribers!','evior'),
		'desc'       => esc_html__('Type Promotion offer text','evior'),
		'dependency' => array( 'header_top_promo', '==', 'true' ),
	),
	
	array(
		'id'         => 'promo_text_btn',
		'type'       => 'text',
		'title'      => esc_html__('Promo Button Text','evior'),
		'default'    => esc_html__('Read More','evior'),
		'desc'       => esc_html__('Type Promotion Button text','evior'),
		'dependency' => array( 'header_top_promo', '==', 'true' ),
	),
	
	array(
		'id'         => 'promo_btn_link',
		'type'       => 'text',
		'title'      => esc_html__('Promo Button Link','evior'),
		'default'    => esc_html__('#','evior'),
		'desc'       => esc_html__('Type Promotion Button Link','evior'),
		'dependency' => array( 'header_top_promo', '==', 'true' ),
	),
	  
	  
	array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Header Top Bar','evior').'</h3>'
      ),
	  
      array(
        'id' => 'header_top_enable',
        'title' => esc_html__('Show Header Top','evior'),
        'type' => 'switcher',
        'default' => true,
		'desc' => esc_html__('Enable Header Top', 'evior') ,
      ),

		
		array(
			'id' => 'header_top_weather',
			'title' => esc_html__('Show weather box', 'evior') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Header weather box', 'evior') ,
			'dependency' => array(
				'header_top_enable',
				'==',
				'true'
			) ,
			'default' => true,
		) ,
		
		array(
		'id'         => 'waether_text',
		'type'       => 'text',
		'title'      => esc_html__('Header Weather Text','evior'),
		'default'    => esc_html__('38°C','evior'),
		'desc'       => esc_html__('Type Header Weather Text','evior'),
		'dependency' => array( 'header_top_enable', '==', 'true' ),
	),
		
		
		array(
			'id' => 'header_top_calender',
			'title' => esc_html__('Show Current Date', 'evior') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Header Current Date', 'evior') ,
			'dependency' => array(
				'header_top_enable',
				'==',
				'true'
			) ,
			'default' => true,
		) ,
		
		array(
			'id' => 'top_text_btn_enable',
			'title' => esc_html__('Show Header Top Button', 'evior') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Header Top Button', 'evior') ,
			'dependency' => array(
				'header_top_enable',
				'==',
				'true'
			) ,
			'default' => true,
		) ,
		
	
		array(
			'id'         => 'top_text_btn',
			'type'       => 'text',
			'title'      => esc_html__('Top Button Text', 'evior') ,
			'default'    => esc_html__('Buy Theme', 'evior') ,
			'desc'       => esc_html__('Type text', 'evior') ,
			'dependency' => array( 'header_top_enable', '==', 'true' ),
		),
			
		array(
		'id'         => 'top_text_btn_link',
		'type'       => 'text',
		'title'      => esc_html__('Top Button Link', 'evior') ,
		'default'    => esc_html__('#', 'evior') ,
		'desc'       => esc_html__('Type Button Link', 'evior') ,
		'dependency' => array( 'header_top_enable', '==', 'true' ),
	),
	
	
	array(
		'id' => 'top_bar_nav',
		'title' => esc_html__('Top Bar Menu','evior'),
		'type' => 'switcher',
		'desc' => esc_html__('You can set menu on Top bar in Header Style 4','evior'),
		'default' => false,
	),

	  
	       	
		
	array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Search Bar & Login Option','evior').'</h3>'
      ),
	  
      array(
        'id' => 'search_bar_enable',
        'title' => esc_html__('Search Bar Display In Header','evior'),
        'type' => 'switcher',
		'desc' => esc_html__('Enable or Disable Search Bar', 'evior') ,
        'default' => true,
      ),
	  
	  array(
        'id' => 'login_btn_enable',
        'title' => esc_html__('Show Login Button','evior'),
        'type' => 'switcher',
		'desc' => esc_html__('Enable or Disable Login Button', 'evior') ,
        'default' => true,
      ), 
	  
	  array(
        'id' => 'register_btn_enable',
        'title' => esc_html__('Show Register Button','evior'),
        'type' => 'switcher',
		'desc' => esc_html__('Enable or Disable Register Button', 'evior') ,
        'default' => true,
      ),
	  
	  
		
	array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Social Options','evior').'</h3>'
     ),	
	
      array(
        'id' => 'header_social_enable',
        'title' => esc_html__('Do You want to Show Header Social Icons','evior'),
        'type' => 'switcher',
		'desc' => esc_html__('Enable or Disable Social Bar', 'evior') ,
        'default' => false,
      ),
	  
		
	array(
        'id'     => 'social-icon',
        'type'   => 'repeater',
        'title'  => esc_html__('Repeater','evior'),
        'dependency' => array('header_social_enable','==','true'),
        'fields' => array(
          array(
            'id'    => 'icon',
            'type'  => 'icon',
            'title' => esc_html__('Pick Up Your Social Icon','evior'),
          ),
          array(
            'id'    => 'link',
            'type'  => 'text',
            'title' => esc_html__('Inter Social Url','evior'),
          ),

        ),
      ),	
		
		

    )
  ));
  
   
    /*-------------------------------------
     ** Typography Options
     -------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Typography', 'evior') ,
		'id' => 'typography_options',
		'icon' => 'fa fa-font',
        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Body', 'evior') . '</h3>'
            ) ,

            array(
                'id' => 'body-typography',
                'type' => 'typography',
                'output' => 'body',
                'default' => array(
					'color' => '#555555',
                    'font-family' => 'Red Hat Display',
                    'font-weight' => '500',
                    'font-size' => '17',
                    'line-height' => '26',
					'letter-spacing' => false,
                    'subset' => 'latin-ext',
                    'type' => 'google',
                    'unit' => 'px',
                ) ,

            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h1', 'evior') . '</h3>'
            ) ,

            array(
                'id' => 'heading-one-typo',
                'type' => 'typography',

                'output' => 'h1',
                'default' => array(
                    'color' => '#272727',
                    'font-family' => 'Red Hat Display',
                    'font-weight' => '700',
					'font-size' => '42',
                    'line-height' => '50',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h2', 'evior') . '</h3>'
            ) ,

            array(
                'id' => 'heading-two-typo',
                'type' => 'typography',

                'output' => 'h2',
                'default' => array(
                    'color' => '#272727',
                    'font-family' => 'Red Hat Display',
                    'font-weight' => '700',
					'font-size' => '28',
                    'line-height' => '36',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h3', 'evior') . '</h3>'
            ) ,

            array(
                'id' => 'heading-three-typo',
                'type' => 'typography',

                'output' => 'h3',
                'default' => array(
                    'color' => '#272727',
                    'font-family' => 'Red Hat Display',
                    'font-weight' => '700',
					'font-size' => '24',
                    'line-height' => '28',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h4', 'evior') . '</h3>'
            ) ,

            array(
                'id' => 'heading-four-typo',
                'type' => 'typography',

                'output' => 'h4',
                'default' => array(
                    'color' => '#272727',
                    'font-family' => 'Red Hat Display',
                    'font-weight' => '700',
					'font-size' => '18',
                    'line-height' => '28',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h5', 'evior') . '</h3>'
            ) ,

            array(
                'id' => 'heading-five-typo',
                'type' => 'typography',

                'output' => 'h5',
                'default' => array(
                    'color' => '#272727',
                    'font-family' => 'Red Hat Display',
                    'font-weight' => '700',
					'font-size' => '14',
                    'line-height' => '24',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h6', 'evior') . '</h3>'
            ) ,

            array(
                'id' => 'heading-six-typo',
                'type' => 'typography',
                'output' => 'h6',
                'default' => array(
                    'color' => '#272727',
                    'font-family' => 'Red Hat Display',
                    'font-weight' => '700',
					'font-size' => '14',
                    'line-height' => '28',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

        )
    ));
  
  
  
  

  /*-------------------------------------------------------
     ** Pages and Template
   --------------------------------------------------------*/

   // blog optoins
    CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Blog','evior'),
    'id' => 'blog_page',
    'icon' => 'fa fa-bookmark',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Blog Options','evior').'</h3>'
      ),
	  
	  	array(
			'id'         => 'blog_title',
			'type'       => 'text',
			'title'      => esc_html__('Blog Page Title','evior'),
			'default'    => esc_html__('Blog Page','evior'),
			'desc'       => esc_html__('Type Blog Page Title','evior'),
		),
		
		array(
			'id' => 'page-spacing-blog',
			'type' => 'spacing',
			'title' => esc_html__('Blog Page Spacing','evior'),
			'output' => '.main-container.blog-spacing',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '80',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,
		
		array(
			'id' => 'blog_breadcrumb_enable',
			'title' => esc_html__('Breadcrumb', 'evior') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Breadcrumb', 'evior') ,
			'default' => true,
		) ,
			
		

	 
    )
  ));
  
  
    // category 
	
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Category','evior'),
    'id' => 'cat_page',
    'icon' => 'fa fa-list-ul',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' => '<h3>' . esc_html__('Theme Category Options. You can Customize Each Catgeory by Editing Individually.', 'evior') . '</h3>'
      ),
       array(
			'id' => 'evior_cat_layout',
            'type' => 'image_select',
            'title' => esc_html__('Select Category Layout','evior'),
            'options' => array(
                'catt-one' => EVIOR_IMG . '/admin/page/style1.png',
                'catt-two' => EVIOR_IMG . '/admin/page/style2.png',
            ),
            'default' => 'catt-one'
        ),
		
		array(
			'id' => 'page-spacing-category',
			'type' => 'spacing',
			'title' => esc_html__('Category Page Spacing','evior'),
			'output' => '.main-container.cat-page-spacing',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '80',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,


    )
  ));
  
  

  // blog single optoins
    CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Single','evior'),
    'id' => 'single_page',
    'icon' => 'fa fa-pencil-square-o',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Blog Single Page Option','evior').'</h3>'
      ),
	  
       array(
            'id' => 'evior_single_blog_layout',
            'type' => 'image_select',
            'title' => esc_html__('Select Single Blog Style','evior'),
            'options' => array(
                'single-one' => EVIOR_IMG . '/admin/page/blog-1.png',
                'single-two' => EVIOR_IMG . '/admin/page/blog-2.png',
            ),
            'default' => 'single-one'
        ),
		
		array(
			'id' => 'page-spacing-single',
			'type' => 'spacing',
			'title' => esc_html__('Single Blog Spacing','evior'),
			'output' => '.single-one-bwrap',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '40',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,
		
		array(
			'id'         => 'blog_prev_title',
			'type'       => 'text',
			'title'      => esc_html__('Previous Post Text','evior'),
			'default'    => esc_html__('Previous Post','evior'),
			'desc'       => esc_html__('Type Previous Post Link Title','evior'),
		),
		
		array(
			'id'         => 'blog_next_title',
			'type'       => 'text',
			'title'      => esc_html__('Next Post Text','evior'),
			'default'    => esc_html__('Next Post','evior'),
			'desc'       => esc_html__('Type Next Post Link Title','evior'),
		),
			
		array(
			'id' => 'blog_single_cat',
			'title' => esc_html__('Show Catgeory','evior'),
			'type' => 'switcher',
			'desc' => esc_html__('Show Category Name','evior'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_single_author',
			'title' => esc_html__('Show Author','evior'),
			'type' => 'switcher',
			'desc' => esc_html__('Single Post Author','evior'),
			'default' => true,
		),

		array(
			'id' => 'blog_nav',
			'title' => esc_html__('Show Navigation','evior'),
			'type' => 'switcher',
			'desc' => esc_html__('Post Navigation','evior'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_tags',
			'title' => esc_html__('Show Tags','evior'),
			'type' => 'switcher',
			'desc' => esc_html__('Show Post Tags','evior'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_related',
			'title' => esc_html__('Show Related Posts','evior'),
			'type' => 'switcher',
			'desc' => esc_html__('Related Posts','evior'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_views',
			'title' => esc_html__('Show Post Views','evior'),
			'type' => 'switcher',
			'desc' => esc_html__('Post views','evior'),
			'default' => false,
		),


    )
  ));


  /*-------------------------------------------------------
       ** Woocommerce  Options
  --------------------------------------------------------*/
    
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Shop','evior'),
    'id' => 'cat_page',
    'icon' => 'fa fa-pencil-square-o',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' => '<h3>' . esc_html__('Shop Layout', 'evior') . '</h3>'
      ),
      
      
        array(
            'id' => 'shop_layout',
            'type' => 'image_select',
            'title' => esc_html__('Shop Layout','evior'),
            'options' => array(
             
                'right-sidebar' => EVIOR_IMG . '/admin/header-style/right-sidebar.png',
                'left-sidebar' => EVIOR_IMG . '/admin/header-style/left-sidebar.png',
                'no-sidebar' => EVIOR_IMG . '/admin/header-style/default.png',
            ),
            
            'default' => 'right-sidebar'
        ),
        
        
        array(
            'id' => 'single_shop_layout',
            'type' => 'image_select',
            'title' => esc_html__('Single Product Layout','evior'),
            'options' => array(
             
                'right-sidebar' => EVIOR_IMG . '/admin/header-style/right-sidebar.png',
                'left-sidebar' => EVIOR_IMG . '/admin/header-style/left-sidebar.png',
                'no-sidebar' => EVIOR_IMG . '/admin/header-style/default.png',
            ),
            
            'default' => 'right-sidebar'
        ),

        array(
            'id'         => 'product_page_title',
            'type'       => 'text',
            'title'      => esc_html__('Poduct Page Title Text','evior'),
            'default'    => esc_html__('Product Details','evior'),
            'desc'       => esc_html__('Give Product Page Title Text','evior'),
        ),


        array(
            'id' => 'related_product_show',
            'title' => esc_html__('Show or Hide Related Products', 'evior') ,
            'type' => 'switcher',
            'desc' => esc_html__('Related Product Show or Hide', 'evior') ,
            'default' => true,
        ) ,




    )
  )); 



  /*-------------------------------------------------------
       ** Footer  Options
  --------------------------------------------------------*/
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Footer','evior'),
    'id' => 'footer_options',
    'icon' => 'fa fa-copyright',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Footer Options','evior').'</h3>'
      ),
	  
	array(
        'id' => 'footer_nav',
        'title' => esc_html__('Footer Right Menu','evior'),
        'type' => 'switcher',
		'desc' => esc_html__('You can set Yes or No to show Footer menu','evior'),
        'default' => false,
      ),
	  
	  
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Footer Copyright Area Options','evior').'</h3>'
      ),

      array(
        'id' => 'copyright_text',
        'title' => esc_html__('Copyright Area Text','evior'),
        'type' => 'textarea',
        'desc' => esc_html__('Footer Copyright Text','evior'),
      ),


	  
    )
  ));


  // Backup section
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Backup','evior'),
    'id'    => 'backup_options',
    'icon'  => 'fa fa-window-restore',
    'fields' => array(
        array(
            'type' => 'backup',
        ),   
    )
  ) );
  

}