<div class="main-content-inner category-layout-one">
  
	<?php while ( have_posts() ) : the_post(); ?>
	
	<div <?php post_class('post-wrapper cat-layout-main-list'); ?>>
		
		<?php if(has_post_thumbnail()): ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" class="post-grid-thumbnail-two">
				<img class="img-fluid" src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
			</a>
		</div>
		<?php endif; ?>
	
		<div class="post-list-medium-content">
		
			<div class="category-box">
				<?php require EVIOR_THEME_DIR . '/template-parts/cat-color.php'; ?>
			</div>
	
			<h3 class="post-title">
				<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a>
			</h3>

			<div class="post-meta-items">
				<div class="author-name">
					<?php printf('<a href="%1$s">%2$s</a>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
					get_the_author()
					); ?>
				</div>
				
				<div class="date-box">
					<?php echo esc_html(get_the_date( 'F j' )); ?>
				</div>
				
				<div class="post_number__Comment">
					<a class="evior-comment" href="<?php echo esc_url( get_comments_link() ); ?>">
						<?php printf( esc_html( _nx( 'Comments (%1$s)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'evior' ) ), '<span class="comment">'.number_format_i18n( get_comments_number() ).'</span>','<span>' . get_the_title() . '</span>' ); ?>
					</a>
				</div>
			</div>
			
			<div class="cat-read-more-btn">
				<?php echo '<div style="clear:both"></div><a href="' . esc_url( get_permalink() ) . '" class="read_more_Btutton">'.esc_html__('Read More', 'evior').'<i class="icofont-long-arrow-right"></i></a>'; ?>
			</div>
		</div>
		
	</div>
	
	<?php endwhile; ?>

</div>