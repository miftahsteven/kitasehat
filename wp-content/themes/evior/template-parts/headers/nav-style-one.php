<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$evior_logo = evior_get_option( 'theme_logo' );
$evior_logo_id = isset($evior_logo['id']) && !empty($evior_logo['id']) ? $evior_logo['id'] : '';
$evior_logo_url = isset( $evior_logo[ 'url' ] ) ? $evior_logo[ 'url' ] : '';
$evior_logo_alt = get_post_meta($evior_logo_id,'_wp_attachment_image_alt',true);

$header_top_promo = evior_get_option('header_top_promo');
$promo_title = evior_get_option('promo_title');
$promo_text = evior_get_option('promo_text');
$promo_text_btn = evior_get_option('promo_text_btn');
$promo_btn_link = evior_get_option('promo_btn_link');

$evior_header_top = evior_get_option('header_top_enable');
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


?>

<header id="theme-header" class="theme_header__Top header-area breaking_header_Top">
	
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
				<div class="col-md-6 col-sm-6">
				
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
	
	<div class="logo-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-3">
				
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
				
				<div class="col-md-9">
					<div class="header-right-content text-right <?php if( $login_btn_enable && $register_btn_enable == false ) { echo "search-width-normal"; } else { echo "full-width-search"; } ?>">
					
						<?php if($evior_header_search == true) :?>
						
						<div class="search_box__Wrap header-search-box">
							<div class="theme-top-search">
								<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" class="search-input" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Search ...','evior'); ?>" required />
									<button type="submit" id="searchsubmit" class="search-button"><i class="icofont-search-1"></i></button>
								</form>
							</div>
						</div>
						<?php endif; ?>
						
						
						<?php if($login_btn_enable == true) :?>
						<div class="header-login-btn">
							<a href="#"><?php esc_html_e( 'Login', 'evior' ); ?></a>
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
	
	<div class="site-navigation theme_header_design__gradient theme_header_design__One header_search_alt">
		<div class="nav-wrapper">
			<div class="container nav-wrapp">
				<div class="evior-responsive-menu"></div>
				<div class="mainmenu">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</div>
			</div>
		</div>
	</div>	
	
</header>