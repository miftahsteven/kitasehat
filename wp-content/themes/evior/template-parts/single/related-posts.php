<?php 

    global $post;

    $relatedposts = get_posts( array( 
	
	'category__in' => wp_get_post_categories($post->ID), 
	'numberposts' => 3,
	'order'       => 'ASC',
	'post__not_in' => array($post->ID) ) 
	
	);
	
    if( $relatedposts ) : 

    echo '<div class="theme_related_post_Grid">';
    echo '<h2>'.esc_html__( 'Related Posts', 'evior' ).'</h2>';
	
    echo '<div class="theme_post_grid__Slider_Wrapperr">';
	echo '<div class="theme_post_grid__Slider related-posts-slider row">';
	
	
    foreach( $relatedposts as $post ) {
		
    setup_postdata($post); ?>
    
	
<div class="col-md-4">	
	
<div class="news_post_grid_design blog-post-grid-wrapper blog-post-grid-wrapper-four post-block-item">
        				
	<div class="news-post-grid-thumbnail">
		<a href="<?php the_permalink(); ?>" class="news-post-grid-thumbnail-wrap">
			<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
		</a>
	</div>
	
	<div class="news-post-grid-content grid-content-bottom">


		<div class="author-name">
			<?php printf('<div class="post_grid_author_img">%1$s<a href="%2$s">%3$s</a></div>',
			get_avatar( get_the_author_meta( 'ID' ), 21 ), 
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
			get_the_author()
			); ?>
		</div>

		<h3 class="post-title">
			<a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 12 ,'') ); ?></a>
		</h3>

		<div class="post-excerpt-box">
			<p><?php echo esc_html( wp_trim_words(get_the_excerpt(), 15 ,'') );?></p>
		</div>	


		<div class="post-meta-items">

			<div class="category-box">
				<?php require EVIOR_THEME_DIR . '/template-parts/cat-color.php'; ?>
			</div>

			<div class="date-box">
			<?php echo esc_html(get_the_date( 'F j' )); ?>
			</div>

			<div class="read-time-box">
				<?php echo evior_reading_time(); ?>
			</div>

		
		</div>

	</div>
	
</div>
	
</div>	
	
    <?php } 
	
	wp_reset_postdata();

    echo '</div>'; 
	echo '</div>';
    echo '</div>';

    endif;