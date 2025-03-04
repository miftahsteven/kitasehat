<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evior
 */
 
$scroll_top = evior_get_option('back_top_enable', true);
$footer_nav = evior_get_option('footer_nav');
$footer_copyright_text = evior_get_option('copyright_text');
$footer_copyright_text_allowed_tags = array(
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
	'img' => array(
        'alt' => array(),
        'src' => array()
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
);

?>

	<!-- footer area start -->
    <footer class="theme-footer-wrapper theme_footer_Widegts <?php if(is_active_sidebar('footer-widget-1')) { echo "hav-footer-topp"; } else { echo "no-footer-top";}?>">
		<?php if( is_active_sidebar( 'footer-widget-1' ) ) : ?>
        <div class="footer-top">
            <div class="container">
                <div class="row custom-gutter">
				
					<?php if ( is_active_sidebar( 'footer-widget-1' ) ): ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 footer_one_Widget">
                        <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                    </div>
					<?php endif; ?> 
					
					<?php if ( is_active_sidebar( 'footer-widget-2' ) ): ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 footer_two_Widget">
						<?php dynamic_sidebar( 'footer-widget-2' ); ?>
                    </div>
					<?php endif; ?> 
					
					<?php if ( is_active_sidebar( 'footer-widget-3' ) ): ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 footer_three_Widget">
						<?php dynamic_sidebar( 'footer-widget-3' ); ?>
                    </div>
					<?php endif; ?> 
					
					<?php if ( is_active_sidebar( 'footer-widget-4' ) ): ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 footer_four_Widget">
						<?php dynamic_sidebar( 'footer-widget-4' ); ?>
                    </div>
					<?php endif; ?>
					
					<?php if ( is_active_sidebar( 'footer-widget-5' ) ): ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 footer_five_Widget">
						<?php dynamic_sidebar( 'footer-widget-5' ); ?>
                    </div>
					<?php endif; ?> 
					
                </div>
            </div>
        </div>
		<?php endif; ?>
		<div class="footer-bottom">
            <div class="container">
                <div class="row">
				
					<div class="<?php if( $footer_nav == true ) { echo "col-lg-6 col-md-6 text-left"; } else { echo "col-lg-12 col-md-12 text-center"; } ?>">
                        <p class="copyright-text">
							<?php if( !empty($footer_copyright_text) ){
								echo wp_kses($footer_copyright_text, $footer_copyright_text_allowed_tags);
							} else {
								esc_html_e('Copyright &copy; Evior 2022. All rights reserved', 'evior');
							}?>
						</p>
                    </div>
					
					<?php if($footer_nav == true) :?>
                    <div class="col-lg-6 col-md-6 text-right">
						
						<?php
                           if ( has_nav_menu( 'footermenu' ) ) {
                           
                              wp_nav_menu( array( 
                                 'theme_location' => 'footermenu', 
								 'theme_location' => 'footermenu',
                                 'menu_class' => 'footer-nav', 
                                 'container' => '' 
                              ) );
                           }

                        ?>
					</div>
					<?php endif; ?>
                    
                </div>
            </div>
        </div>
	</footer>
    <!-- footer area end -->
	
	</div>
	
	<?php if($scroll_top == true) :?>
	<div class="backto"> 
		<a href="#" class="icofont-long-arrow-up" aria-hidden="true"></a>
	</div>
	<?php endif; ?>

   <?php wp_footer(); ?>

   </body>
</html>

