<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$evior_logo = evior_get_option( 'theme_logo' );
$evior_logo_id = isset($evior_logo['id']) && !empty($evior_logo['id']) ? $evior_logo['id'] : '';
$evior_logo_url = isset( $evior_logo[ 'url' ] ) ? $evior_logo[ 'url' ] : '';
$evior_logo_alt = get_post_meta($evior_logo_id,'_wp_attachment_image_alt',true);


$header_top_promo = evior_get_option('header_top_promo', false);
$promo_title = evior_get_option('promo_title');
$promo_text = evior_get_option('promo_text');
$promo_text_btn = evior_get_option('promo_text_btn');
$promo_btn_link = evior_get_option('promo_btn_link');


$evior_header_top = evior_get_option('header_top_enable', false);
$header_date = evior_get_option('header_top_calender');
$header_weather = evior_get_option('header_top_weather');
$waether_text = evior_get_option('waether_text');

$evior_header_search = evior_get_option('search_bar_enable', true);
$login_btn_enable = evior_get_option('login_btn_enable');
$register_btn_enable = evior_get_option('register_btn_enable');


$evior_header_social = evior_get_option('header_social_enable');
$evior_social_icon = evior_get_option( 'social-icon' );

$top_text_btn_enable = evior_get_option('top_text_btn_enable');
$top_text_btn = evior_get_option('top_text_btn');
$top_text_btn_link = evior_get_option('top_text_btn_link');

$theme_header_sticky = evior_get_option('theme_header_sticky');

?>


<header id="theme-header-three" class="theme_header__Top header-area breaking_header_Top header-three-wrapperr <?php if( $theme_header_sticky == true ) { echo "stick-top"; } else { echo "stick-disable"; } ?>">
	
	<?php if($header_top_promo == true) :?>
	<div class="top-promo-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="promo-text"><span><?php echo esc_html($promo_title); ?></span><?php echo esc_html($promo_text); ?><a href="<?php echo esc_url($promo_btn_link); ?>"><?php echo esc_html($promo_text_btn); ?></a></div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if($evior_header_top == true) :?>
	<div class="top-header-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-sm-6 header-topleft-box">
				
					<?php if($header_weather == true) :?>
					<div class="header-weather">
						<?php echo esc_html($waether_text); ?>
					</div>
					<?php endif; ?>
					
					<?php if($header_date == true) :?>
					<div class="header-date">
						<?php echo date(get_option('date_format')); ?>
					</div>
					<?php endif; ?>
					
				</div>
				<div class="col-md-6 col-sm-6 text-right header-top-right-box">
					
					<?php if($top_text_btn_enable == true) :?>
					<div class="header-top-btn">
						<a href="<?php echo esc_url($top_text_btn_link); ?>"><?php echo esc_html($top_text_btn); ?></a>
					</div>
					<?php endif; ?>
					
					<?php if($evior_header_social == true) : ?>
					
					<div class="htop_social">
					
					<?php 
						if ( ! empty( $evior_social_icon ) ) : 
						foreach( $evior_social_icon as $item ) :
					?>
					
					
						<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank" class="social-list__link"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></a>
						
						
					<?php 
						endforeach; 
						endif; 
					?>

					
					</div>
					
					<?php endif; ?>
					
					
				</div>
			</div>
		</div>	
	</div>



	
	<?php endif; ?>
	
	<div class="header-divider-three <?php if($evior_header_top == false ) { echo "divider-extra-wrap"; } else { echo "divider-hidden"; } ?>"></div> 
	
	<div class="theme-header-wrap-main logo-area">
		<div class="container">
			<div class="row align-items-center" style="margin-top: -20px;">
				<div class="header-tag col-1 bg-white"></div> 
				<div class="header-tag col-4 bg-info h-25 mx-25">
					&nbsp;
				</div>
				<div class="header-tag col-7 bg-white"></div> 
			</div>		
			<div class="row align-items-center">
				<div class="col-lg-2 col-md-12">								
					<div class="logo theme-logo">
					<?php  
					if ( has_custom_logo() || !empty( $evior_logo_url ) ) {
						if( isset( $evior_logo['url'] ) && !empty( $evior_logo_url ) ) { 
							?>
								<a href="<?php echo esc_url( site_url('/')) ?>" class="logo">
									<img class="img-fluid" src="<?php echo esc_url( $evior_logo_url ); ?>" alt="<?php echo esc_attr( $evior_logo_alt  ) ?>"> 								
								</a>
						    <?php 
						} else {
							 the_custom_logo();
						}

					} else {
						printf('<h1 class="text-logo"><a href="%1$s">%2$s</a></h1>',esc_url(site_url('/')),esc_html(get_bloginfo('name')));
					}
					?>
					</div>

				</div>
				
				<div class="<?php if($register_btn_enable == false ) { echo "col-lg-9"; } else { echo "col-lg-8"; } ?> col-md-12 nav-design-twoo megamenu-col-wrapper">
					<div class="nav-menu-wrapper">
						<div class="container nav-wrapp-two nav_wrap_two nav_wrap_three">
							<div class="evior-responsive-menu"></div>
							<div class="mainmenu">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'container' => 'nav',
										'container_class' => 'nav-main-wrap',
										'menu_class' => 'theme-main-menu',
										'menu_id'        => 'primary-menu',
										'fallback_cb' => false,
										'walker' => new EviorNavWalker(),
									) );
								?>
							</div>
						</div>
					</div>	
				</div>
				
				
				<div class="<?php if($register_btn_enable == false ) { echo "col-lg-1"; } else { echo "col-lg-2"; } ?>">
					<div class="header-right-content text-right">
						<!-- 
						<?php //if ( class_exists( 'woocommerce' ) ) : ?>

						<div class="header-custom-cart">
						<?php
							/*if ( function_exists( 'evior_woocommerce_header_cart' ) ) {
								evior_woocommerce_header_cart();
							}*/
						?>
						</div>

						<?php //endif; ?>
						-->
					
						<?php if($evior_header_search == true) :?>

						<div class="header_search_wrap">
							<div class="search_main">
								<i class="icofont-search-1" style=""></i>
								<span style="display: none;"><i class="icofont-close-line"></i></span>
							</div>
							<div class="search_form_main">
								<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" class="hsearch-input" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_attr_e('Search ...','evior'); ?>" required />
									<button type="submit" id="searchsubmitt" class="hsearch-button"><i class="icofont-search-1"></i></button>
								</form>
							</div>
						</div>

						<?php endif; ?>
						
						<?php if($register_btn_enable == true) :?>
						<div class="header-subscribe-btn">
							<a href="<?php echo esc_url( wp_registration_url() ); ?>" target="_blank"><?php esc_html_e( 'Register Now', 'evior' ); ?></a>
						</div>
						
						<?php endif; ?>
						

						
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
</header>




