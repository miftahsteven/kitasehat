<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evior
 */
 
$evior_preloader = evior_get_option('preloader_enable', true);
 
 
?>
<!DOCTYPE html>
  <html <?php language_attributes(); ?>> 
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php wp_head(); ?>
    </head>
	
	
    <body <?php body_class(); ?> >
		
		<?php wp_body_open(); ?>

		<!-- Theme Preloader -->
		<?php if($evior_preloader == true) :?>
		<div id="preloader">
			<div class="loader loader-1">
			  <div class="loader-outter"></div>
			  <div class="loader-inner"></div>
			</div>
		</div>
		<?php endif; ?>

		<!-- Post Progressbar -->
		<div class="evior-progress-container">
			<div class="evior-progress-bar" id="eviorBar"></div>
		</div>



		<div class="body-inner-content">
      
		<?php
		
		// Select Header Style
		
		$evior_nav_global = evior_get_option( 'nav_menu' ); // Global
		$evior_nav_style =  get_post_meta( get_the_ID(), 'evior_post_meta', true ); // Post Metabox

		if( is_page() && !empty( $evior_nav_style  ) ) {
		 
			get_template_part( 'template-parts/headers/'.$evior_nav_style['nav_menu'].'' ); 
		
		} elseif ( class_exists( 'CSF' ) && !empty( $evior_nav_global ) ) {
			
			get_template_part( 'template-parts/headers/'.$evior_nav_global.'' ); 
			
		} else {
			
			get_template_part( 'template-parts/headers/nav-style-three' ); 
			
		}
	
		?>
		