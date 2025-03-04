<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package evior
 */
 
get_header();

?>

	<section id="main-container" class="blog main-container">
		<div class="container">
			<div class="row">
			   <div class="col-lg-12">
				  <div class="error-page text-left">
					 <div class="error-code">
						<strong><i><?php esc_html_e('404', 'evior'); ?></i></strong>
					 </div>
					 <div class="error-message">
						<h3><?php esc_html_e('Sorry!...Page Not Found!', 'evior'); ?></h3>
					 </div>
					 <div class="error-body">
						<a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary solid blank"><i class="icofont-home"></i> <?php esc_html_e('Go Home Page', 'evior'); ?></a>
					 </div>
				  </div>
			   </div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
