<?php
/**
 * @package evior
 */
if( !class_exists('theme_Recent_Posts') ){
    class theme_Recent_Posts extends WP_Widget{

        function __construct(){

            $widget_options = array(
                'description'                   => esc_html__('Recent post here', 'evior'),
                'customize_selective_refresh'   => true,
            );

            parent:: __construct('theme_Recent_Posts', esc_html__( 'Theme Recent Posts', 'evior'), $widget_options );

        }

        public function widget($args, $instance){

            if ( ! isset( $args['widget_id'] ) ) {

            $args['widget_id'] = $this->id;

        }
        
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts','evior' );
        
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $show_item = ( ! empty( $instance['show_item'] ) ) ? absint( $instance['show_item'] ) : 3;
		
        $num_title_word = ( ! empty( $instance['num_title_word'] ) ) ? absint( $instance['num_title_word'] ) : 7;
		
		$num_excerpt_word = ( ! empty( $instance['num_excerpt_word'] ) ) ? absint( $instance['num_excerpt_word'] ) : 15;
		

    
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : true;
        $show_read_time = isset( $instance['show_read_time'] ) ? $instance['show_read_time'] : true;

            echo $args['before_widget']; 
            if( $title ): 
            echo $args['before_title'];  
            echo esc_html( $title );  
            echo $args['after_title']; 
            endif;
                $posts = new WP_Query(array(
                    'post_type'      => 'post',
                    'ignore_sticky_posts' => 1,
                    'posts_per_page' => $show_item,
                ));
                while($posts->have_posts()) : $posts->the_post();  ?>
				
                    <div class="recent-post-blog-item">
                        <?php if ( has_post_thumbnail()): ?>
                            <div class="recent-postthumb">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
                            </div>
                        <?php endif ?>
                        <div class="recent-post-list-inner recent_post_Content">
                            <h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $num_title_word,' '); ?></a></h3>
							
							<p><?php echo wp_trim_words( get_the_excerpt(), $num_excerpt_word,' '); ?></p>
							
							<div class="recent-post-meta">
								<ul class="recent-posts-meta-list">
									<?php if ($show_date): ?>
										<li><?php echo get_the_time(get_option('date_format')); ?></li>
									<?php endif ?>
									<?php if ($show_read_time): ?>
											<li>10 Min Read</li>
									<?php endif ?>
								</ul>
							</div>
                       
                        </div>
                    </div>
					
					
                <?php endwhile; ?>
            <?php echo $args['after_widget']; ?>
            
            <?php wp_reset_postdata();
        }

        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            $instance['show_item'] = (int) $new_instance['show_item'];
            $instance['num_title_word'] = (int) $new_instance['num_title_word'];
			
			$instance['num_excerpt_word'] = (int) $new_instance['num_excerpt_word'];
			
            $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
            return $instance;
        }


        public function form( $instance ) {
        $title              = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $show_item          = isset( $instance['show_item'] ) ? absint( $instance['show_item'] ) : 3;
        $num_title_word     = isset( $instance['num_title_word'] ) ? absint( $instance['num_title_word'] ) : 7;
		
		$num_excerpt_word     = isset( $instance['num_excerpt_word'] ) ? absint( $instance['num_excerpt_word'] ) : 15;
		
		
        $show_date          = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
        $show_read_time          = isset( $instance['show_read_time'] ) ? (bool) $instance['show_read_time'] : true;
    ?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:','evior' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'show_item' )); ?>"><?php echo esc_html__( 'No. of Item of posts to show:','evior' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr(esc_attr($this->get_field_id( 'show_item' ))); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_item' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($show_item); ?>" size="3" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'num_title_word' )); ?>"><?php echo esc_html__( 'Title Word','evior' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr(esc_attr($this->get_field_id( 'num_title_word' ))); ?>" name="<?php echo esc_attr($this->get_field_name( 'num_title_word' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($num_title_word); ?>" size="3">
        </p>
		
		<p>
            <label for="<?php echo esc_attr($this->get_field_id( 'num_excerpt_word' )); ?>"><?php echo esc_html__( 'Excerpt Word','evior' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr(esc_attr($this->get_field_id( 'num_excerpt_word' ))); ?>" name="<?php echo esc_attr($this->get_field_name( 'num_excerpt_word' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($num_excerpt_word); ?>" size="3">
        </p>
        
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php echo esc_html__( 'Display post date?','evior' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_read_time ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_read_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_read_time' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'show_read_time' )); ?>"><?php echo esc_html__( 'Display Read Time?','evior' ); ?></label>
        </p>
    <?php
        }
    }
}

// register 
function theme_Recent_Posts(){
    register_widget('theme_Recent_Posts');
}
add_action('widgets_init','theme_Recent_Posts');
