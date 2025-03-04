<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package evior
 */

get_header();

?>


	<?php 

	//Single Blog Template
	
	$evior_singleb_global = evior_get_option( 'evior_single_blog_layout' ); //for globally	
	$evior_single_post_style = get_post_meta( get_the_ID(),'evior_blog_post_meta', true );

	$theme_post_meta_single = isset($evior_single_post_style['evior_single_blog_layout']) && !empty($evior_single_post_style['evior_single_blog_layout']) ? $evior_single_post_style['evior_single_blog_layout'] : '';
	
	if( is_single() && !empty( $evior_single_post_style  ) ) {
	 
		get_template_part( 'template-parts/single/'.$theme_post_meta_single.'' ); 
	
	} elseif ( class_exists( 'CSF' ) && !empty( $evior_singleb_global ) ) {
		
		get_template_part( 'template-parts/single/'.$evior_singleb_global.'' );  
		
	} else {
		
		get_template_part( 'template-parts/single/single-one' );  
	}
		
	?>


<?php get_footer(); ?>
