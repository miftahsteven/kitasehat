<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$evior_logo = evior_get_option( 'theme_logo' );
$evior_logo_id = isset($evior_logo['id']) && !empty($evior_logo['id']) ? $evior_logo['id'] : '';
$evior_logo_url = isset( $evior_logo[ 'url' ] ) ? $evior_logo[ 'url' ] : '';
$evior_logo_alt = get_post_meta($evior_logo_id,'_wp_attachment_image_alt',true);
$evior_header_top = evior_get_option('header_top_enable');
$evior_header_search = evior_get_option('search_bar_enable');
$evior_header_social = evior_get_option('header_social_enable');
$evior_social_icon = evior_get_option( 'social-icon' );
$header_date = evior_get_option('header_top_calender');
$top_nav = evior_get_option('top_bar_nav');
$header_btn_text = evior_get_option('header_btn_text');

?>

<header id="common-theme-header-two" class="header-area header-three-layout theme_header_design__two">
	<div class="top-header-area top-bar-three top-bar-two">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="htop_menu">
						<?php
						   if ( has_nav_menu( 'topmenu' ) ) {
						   
							  wp_nav_menu( array( 
								 'theme_location' => 'topmenu', 
								 'menu_class' => 'top-navv', 
								 'container' => '' 
							  ) );
						   }

						?>
					</div>
				</div>
				<div class="col-md-4 text-right top-right-box">
				
					<?php if($evior_header_social == true) :?>
					<div class="htop_social">
						<ul>
							
						<?php 
							if ( ! empty( $evior_social_icon ) ) : 
							foreach( $evior_social_icon as $item ) :
						?>
				
						<li class="social-list__item">
							<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank" class="social-list__link"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></a>
						</li>
						<?php 
							endforeach; 
							endif; 
						?>
						</ul>
						
						
					</div>
					<?php endif; ?>
					
					<?php if($header_date == true) :?>
					<div class="header-date">
						<?php echo date(get_option('date_format')); ?>
					</div>
					<?php endif; ?>
					
				</div>
			</div>	
		</div>
	</div> 


	<div class="main-nav-area header-three-area header-two-area">
		<div class="container">
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
				
				<div class="col-lg-8 col-md-12 nav-design-twoo">
					<div class="nav-menu-wrapper">
						<div class="container nav-wrapp-two nav_wrap_two">
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
				
				<!-- Social Links -->
				<div class="col-lg-2 text-right header-two-right">
					
					<div class="search_box__Wrap header-search-box">
						<div class="theme-top-search">
							<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<input type="text" class="search-input" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Search ...','evior'); ?>" required />
								<button type="submit" id="searchsubmit" class="search-button"><i class="icofont-search-1"></i></button>
							</form>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>	
</header>

