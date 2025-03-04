<?php
if (!defined('ABSPATH'))
{
	exit; // Exit if accessed directly
	
}

if (!function_exists('evior_theme_inline_style')):

	function evior_theme_inline_style()
	{

		wp_enqueue_style('evior-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');
		
		
		$theme_main_color = evior_get_customize_option('theme_main_color');
		
		$theme_border_type = evior_get_option('theme_border_type');


		$topbar_bg_img = evior_get_option('topbar_bg_img');
		$topbar_bg_img_image = isset($topbar_bg_img['background-image']['url']) && !empty($topbar_bg_img['background-image']['url']) ? $topbar_bg_img['background-image']['url'] : '';
		$topbar_bg_img_image_size = isset($topbar_bg_img['background-size']) && !empty($topbar_bg_img['background-size']) ? $topbar_bg_img['background-size'] : 'cover';
		$topbar_bg_img_image_position = isset($topbar_bg_img['background-position']) && !empty($topbar_bg_img['background-position']) ? $topbar_bg_img['background-position'] : 'center center';
		$topbar_bg_img_image_repeat = isset($topbar_bg_img['background-repeat']) && !empty($topbar_bg_img['background-repeat']) ? $topbar_bg_img['background-repeat'] : 'no-repeat';
		$topbar_bg_img_image_attachment = isset($topbar_bg_img['background-attachment']) && !empty($topbar_bg_img['background-attachment']) ? $topbar_bg_img['background-attachment'] : 'scroll';
		$topbar_bg_img_color = evior_get_option('topbar_bg_color');	
		

		$custom_css = '';
		
		
		$custom_css .= '.top-promo-area {
			
			background-image   : url(' . esc_attr($topbar_bg_img_image) . ');
			background-position: ' . esc_attr($topbar_bg_img_image_position) . ';
			background-repeat  : ' . esc_attr($topbar_bg_img_image_repeat) . ';
			background-size    : ' . esc_attr($topbar_bg_img_image_size) . ';
			background-attachment  : ' . esc_attr($topbar_bg_img_image_attachment) .';
			
			
			background-color  : ' . esc_attr($topbar_bg_img_color) . ';
			
			
			
			
		}';


		if (!empty($theme_main_color))
		{


			$custom_css .= ' .theme_img_cat_Itemlist span.category-btnn:hover, .subscribe-form input[type="submit"], .header-subscribe-btn a, .search_form_main button, .header_search_wrap .search_main:hover, .home-tag-widgett .tagcloud a:hover, .blog-post-comment .comment-respond .comment-form .btn-comments, .theme_author_Socials a, .blog-post-cat.sblog_catt_design a:hover, .fsubmitt, a.slicknav_btn, a.cart-contents .count {background: ' . esc_attr($theme_main_color) . '!important;}';
			
			$custom_css .= ' .blog-sidebar .widget_search form button, .cutsom-post-block-list-inner .recent-postlist-wrap-inner:hover .recent-post-number-wrap, .category-box.news-cat-boxone a, button.evior-load-more-btn, .main-container .theme-pagination-style ul.page-numbers li span.current, .main-container .theme-pagination-style ul.page-numbers li a.page-numbers:hover {background-color: ' . esc_attr($theme_main_color) . '!important;}';
				
			$custom_css .= '.post-grid-content-two h3.post-title a:hover, .blog-post-grid-wrapper.blog-post-grid-wrapper-four .news-post-grid-content h3.post-title a:hover, .blog-post-grid-wrapper.blog-post-grid-wrapper-four .news-post-grid-content h3.post-title a:hover, .video-post-block-content h3.post-title a:hover, .post-wrapper.cat-layout-main-list .post-list-medium-content h3.post-title a:hover, #theme-header-three .mainmenu ul li a:hover, .header-top-btn a:hover, .htop_social a:hover, .category-box a:hover, .grid-content-bottom .category-box a:hover, .slide-arrow-left.slick-arrow, .slide-arrow-right.slick-arrow, .theme_footer_Widegts .footer-widget ul li a:hover, .cat-read-more-btn a.read_more_Btutton, .theme_blog_nav_Title a:hover, .blog-details-content ul li::marker, .blog-post-cat.sblog_catt_design a, ul.footer-nav li a:hover, .main-container .theme-pagination-style ul.page-numbers li i {color: ' . esc_attr($theme_main_color) . '!important;}';
				
				
			$custom_css .= '.home-tag-widgett .tagcloud a:hover, .featured-slider-2-nav .slider-post-thumb.slick-current img, .news-one-read-btn a:hover, .main-container .theme-pagination-style ul.page-numbers li span.current, .main-container .theme-pagination-style ul.page-numbers li a.page-numbers:hover {border-color: ' . esc_attr($theme_main_color) . '!important;}';
			

		}



		if($theme_border_type == 'solid' ) {
			
		$custom_css .= '.post-grid-wrapper-two-inner .grid-thumbnail-two-wrap a, .post-grid-wrapper-two-inner .grid-thumbnail-two-wrap img, .blog-post-grid-wrapper .news-post-grid-thumbnail img, .theme_post_grid__Slider .blog-post-grid-wrapper .news-post-grid-thumbnail img, .blog-post-grid-wrapper .news-post-grid-thumbnail a, .post-trending-list-wrap .post-grid-wrapper-two-inner .grid-thumbnail-two-wrap img, .blog-post-grid-wrapper-four .news-post-grid-thumbnail a, .blog-post-grid-wrapper.blog-post-grid-wrapper-four .news-post-grid-thumbnail img, .post-grid-five, .blog-post-grid-wrapper::after, .post-wrapper.cat-layout-main-list .post-thumbnail a img, .post-wrapper.cat-layout-main-list .post-thumbnail a img, .recent-postthumb, .recent-postthumb a, .recent-postthumb img, .video-play-icon-wrap a, .buy-now-sec .elementor-container, .theme_cat_custom_list .theme_img_cat_Itemlist li a, .theme_img_cat_Itemlist span.category-btnn, .blog-post-cat.sblog_catt_design a, .blog-sidebar .widget, .theme-blog-details .post-featured-image img, .blog-sidebar .widget_search form .form-control, .blog-sidebar .widget_search form button, .bottom-zero-article-thumb img, .blog-details-content figure.wp-block-image.size-large img, .single-blog-content blockquote, .blog-details-content figure.wp-block-image.size-large img, .author_bio__Wrapper, .theme_blog_navigation__Wrap, #comments, .post-wrapper.cat-layout-main-list .post-list-medium-content, .post-wrapper.cat-layout-main-list .post-thumbnail a, .post-wrapper.cat-layout-main-list .post-thumbnail, .prev_nav_left_Img img, .prev_nav_Right_Img img, .author-thumb img, .theme_author_Socials a, .blog-post-comment .comment-respond .comment-form .form-control, .blog-post-comment .comment-respond .comment-form .btn-comments, .promo-text span, .main-container .theme-pagination-style ul.page-numbers li a.page-numbers, .main-container .theme-pagination-style ul.page-numbers li span.page-numbers, .header-subscribe-btn a, .theme-top-search form input, .header_search_wrap .search_main, .search_form_main button, .header_search_wrap .search_form_main, input.hsearch-input, .theme-breadcrumb__Wrapper.theme-breacrumb-area .container, .video-block-post-image, .post-trending-list-wrap, .subscribe-form input[type="email"], .subscribe-form input[type="submit"], .subscribe-box .icon, .subscribe-box, .apsc-theme-4 .apsc-each-profile a, .fsubmitt, .custom-theme-contactt .fnamee, .fmessage, nav.nav-main-wrap ul.theme-main-menu li ul.evior-submenu, a.slicknav_btn {border-radius: 0!important;}';
		}
		

		

		// Get Category Color for List Widget
		
		$categories_widget_color = get_terms('category');
		
        if ($categories_widget_color) {
            foreach( $categories_widget_color as $tag) {
				$tag_link = get_category_link($tag->term_id);
				$title_bg_Color = get_term_meta($tag->term_id, 'evior', true);
				$catColor = !empty( $title_bg_Color['cat-color'] )? $title_bg_Color['cat-color'] : '#FFFFFF';
				$custom_css .= '
					.cat-item-'.$tag->term_id.' span.post_count {background-color : '.$catColor.' !important;} 
				';
			}
        }	
		
		
	
				


		wp_add_inline_style('evior-custom-style', $custom_css);
	}
	add_action('wp_enqueue_scripts', 'evior_theme_inline_style');

endif;

