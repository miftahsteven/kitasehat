<?php

/**
 * Elementor Widget
 * @package Evior
 * @since 1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class evior_post_block_list extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'posts-blocklist';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Posts Block List', 'evior-extra' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-th-large'; 
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'evior_widgets' ];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	 
	
	protected function register_controls() {
		$this->layout_options();		
		$this->post_query_options();	
		$this->meta_options();	
		$this->design_options();
	}
	
	/**
    * Layout Options
    */
    private function layout_options() {
	
	
		$this->start_controls_section(
            'layout_option',
            [
                'label' => __( 'Layout Options', 'evior-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
		$this->add_responsive_control(
			'grid_img_height',
			[
				'label' =>esc_html__( 'Set Top Post Image Height', 'evior-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 305,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 270,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 250,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 305,
				],
				
				'selectors' => [
					'{{WRAPPER}} .cutsom-post-block-list-wrapper .post-block-item.post-block-listwrap .news-post-grid-thumbnail img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);		
		
		
		$this->end_controls_section();
	
	}
	
	/**
    * Post Query Options
    */
    private function post_query_options() {
	
	
		$this->start_controls_section(
            'post_query_option',
            [
                'label' => __( 'Post Options', 'evior-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
		// Post Sort
		
        $this->add_control(
            'post_sorting',
            [
                'type'    => \Elementor\Controls_Manager::SELECT2,
                'label' => esc_html__('Post Sorting', 'evior-extra'),
                'default' => 'date',
                'options' => [
					'date' => esc_html__('Recent Post', 'evior-extra'),
                    'rand' => esc_html__('Random Post', 'evior-extra'),
					'title'         => __( 'Title Sorting Post', 'evior-extra' ),
                    'modified' => esc_html__('Last Modified Post', 'evior-extra'),
                    'comment_count' => esc_html__('Most Commented Post', 'evior-extra'),
					
                ],
            ]
        );		
		
		// Post Order
		
        $this->add_control(
            'post_ordering',
            [
                'type'    => \Elementor\Controls_Manager::SELECT2,
                'label' => esc_html__('Post Ordering', 'evior-extra'),
                'default' => 'DESC',
                'options' => [
					'DESC' => esc_html__('Desecending', 'evior-extra'),
                    'ASC' => esc_html__('Ascending', 'evior-extra'),
                ],
            ]
        );
		
		
		// Post Categories
		
		$this->add_control(
            'post_categories',
            [
                'type'      => \Elementor\Controls_Manager::SELECT2,
				'label' =>esc_html__('Select Categories', 'evior-extra'),
                'options'   => $this->posts_cat_list(),
                'label_block' => true,
                'multiple'  => true,
            ]
        );
	
		
		
		// Post Items.
		
        $this->add_control(
            'post_number',
			[
				'label'         => esc_html__( 'Number Of Posts', 'evior-extra' ),
				'type'          => \Elementor\Controls_Manager::NUMBER,
				'default'       => '1',
			]
        );
		

		// Specific Posts by ID.
        $this->add_control(
            'post_ids',
            [
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label'       => __( 'Show specific posts by ID', 'deo-elementor' ),
                'placeholder' => __( 'ex.: 256, 54, 78', 'deo-elementor' ),
                'description'   => __( 'Paste post ID\'s separated by commas. To find ID, click edit post and you\'ll find it in the browser address bar', 'deo-elementor' ),
                'default'     => '',
                'separator'     => 'before',
                'label_block' => true,
            ]
        );


		$this->add_control(
            'enable_offset_post',
            [
               'label' => esc_html__('Enable Skip Post', 'evior-extra'),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'evior-extra'),
               'label_off' => esc_html__('No', 'evior-extra'),
               'default' => 'no',
               
            ]
        );
      
        $this->add_control(
			'post_offset_count',
			  [
			   'label'         => esc_html__( 'Skip Post Count', 'evior-extra' ),
			   'type'          => \Elementor\Controls_Manager::NUMBER,
			   'default'       => '1',
			   'condition' => [ 'enable_offset_post' => 'yes' ]

			  ]
        );
		
		
		$this->end_controls_section();
	
	}	
	
	/**
    * Meta Options
    */
    private function meta_options() {
	
	
		$this->start_controls_section(
            'meta_option',
            [
                'label' => __( 'Meta Options', 'evior-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		
		$this->add_control(
            'display_excerpt',
            [
                'label' => esc_html__('Display Post Excerpt', 'ennlil-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'ennlil-extra'),
                'label_off' => esc_html__('No', 'ennlil-extra'),
                'default' => 'yes',
            ]
        );

		$this->add_control(
         	'display_author',
         	[
				 'label' => esc_html__('Display Author', 'evior-extra'),
				 'type' => \Elementor\Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'evior-extra'),
				 'label_off' => esc_html__('No', 'evior-extra'),
				 'default' => 'yes',
         	]
     	);

     	$this->add_control(
            'display_cat',
            [
                'label' => esc_html__('Display Category Name', 'evior-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'evior-extra'),
                'label_off' => esc_html__('No', 'evior-extra'),
                'default' => 'yes',
            ]
        );
		
		$this->add_control(
            'display_date',
            [
                'label' => esc_html__('Display Date', 'evior-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'evior-extra'),
                'label_off' => esc_html__('No', 'evior-extra'),
                'default' => 'yes',
            ]
        );
		
		$this->add_control(
            'blog_comment',
            [
                'label' => esc_html__('Display Post Comment Number', 'evior-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'evior-extra'),
                'label_off' => esc_html__('No', 'evior-extra'),
                'default' => 'yes',
            ]
        );
		
		$this->add_control(
            'display_read_time',
            [
                'label' => esc_html__('Display Post Read Time', 'evior-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'evior-extra'),
                'label_off' => esc_html__('No', 'evior-extra'),
                'default' => 'no',
            ]
        );

 
		
	
		$this->end_controls_section();
	
	}	
	
	/**
    * Design Options
    */
    private function design_options() {
	
	
		$this->start_controls_section(
            'design_option',
            [
                'label' => __( 'Slider Typography', 'evior-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'title_typography',
              'label' => esc_html__( 'Post Title Typography', 'evior-extra' ),
              'selector' => '{{WRAPPER}} .cutsom-post-block-list-wrapper .post-block-listwrap .news-post-grid-content h3.post-title',
           ]
        );		
		

		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'post_list_title_typography',
              'label' => esc_html__( 'Post List Title Typography', 'evior-extra' ),
              'selector' => '{{WRAPPER}} .cutsom-post-block-list-wrapper .recent-postlist-wrap-inner .post-grid-content-two h3.post-title',
           ]
        );	

		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'meta_typography',
              'label' => esc_html__( 'Post Meta Typography', 'evior-extra' ),
              'selector' => '{{WRAPPER}} .cutsom-post-block-list-wrapper .post-meta-items div',
           ]
        );

		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'excerpt_typography',
              'label' => esc_html__( 'Post Excerpt Typography', 'evior-extra' ),
              'selector' => '{{WRAPPER}} .post-block-item .post-excerpt-box p',
           ]
        );	

		
		$this->add_control(
          'title_length',
          [
            'label'         => esc_html__( 'Post Title Length', 'evior-extra' ),
            'type'          => \Elementor\Controls_Manager::NUMBER,
            'default'       => '10',
          ]
        );

        $this->add_control(
          'content_length',
          [
            'label'         => esc_html__( 'Post Excerpt Length', 'ennlil-extra' ),
            'type'          => \Elementor\Controls_Manager::NUMBER,
            'default'       => '20',
          ]
        );
		

		
		$this->end_controls_section();
	
	}	
		


	protected function render() {
		
		
		$settings = $this->get_settings_for_display();

		$title_limit = $settings['title_length'];
		$content_limit = $settings['content_length'];
		$post_count = $settings['post_number'];
		$post_order  = $settings['post_ordering'];
		$post_sortby = $settings['post_sorting']; 
		$display_blog_excerpt = $settings['display_excerpt'];
		$display_blog_cat = $settings['display_cat'];
		$display_blog_author = $settings['display_author'];
		$display_blog_date = $settings['display_date'];
		$display_blog_comment = $settings['blog_comment'];
		$display_read_time = $settings['display_read_time'];

		$string_ID = $settings['post_ids'];
        $post_ID = ( ! empty( $string_ID ) ) ? array_map( 'intval', explode( ',', $string_ID ) ) : '';

		
		$args = [
            'post_type' => 'post',
            'post_status' => 'publish',
			'order' => $settings['post_ordering'],
			'posts_per_page' => $settings['post_number'],
			'ignore_sticky_posts' => 1,
        ];
		
		// Category
        if ( ! empty( $settings['post_categories'] ) ) {
            $args['category_name'] = implode(',', $settings['post_categories']);
        }
		
		// Post Sorting
        if ( ! empty( $settings['post_sorting'] ) ) {
            $args['orderby'] = $settings['post_sorting'];
        }	
		
		// Post Offset		
		if($settings['enable_offset_post'] == 'yes') {
			$args['offset'] = $settings['post_offset_count'];
		}

		//Specific Posts by ID's
        if ( ! empty( $settings['post_ids'] ) ) {
            $args['post__in'] = $post_ID;
        }


		echo '<section class="cutsom-post-block-list-wrapper">';


		echo '<div class="custom-post-list-heading">';

		echo '<h2 class="postlist-title">Popular Stories</h2>';	

		echo '</div>';




		// Query
        $query = new \WP_Query( $args ); 


        if ( $query->have_posts() ) :

            echo '<div class="cutsom-post-block-list-inner">';

            $i = 1;
            $count = 0;
            

            while ( $query->have_posts() ) :
                $query->the_post();


  			$count++;

            if ( $i == 1 || $i < 2 ) { ?>

            <article <?php post_class( 'post-list-top' ); ?>>
                <div class="blog-post-grid-wrapper blog-post-grid-wrapper-four post-block-item post-block-listwrap">
        		
				
				<div class="news-post-grid-thumbnail">
        			<a href="<?php the_permalink(); ?>" class="news-post-grid-thumbnail-wrap">
						<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
					</a>
				</div>
				
				<div class="news-post-grid-content grid-content-bottom">
				
					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
					</h3>


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

					<div class="recent-post-number-right">
						<span class="recent-post-right-counter"><?php echo esc_html('0'); ?><?php echo esc_attr( $count ); ?></span>
					</div>

        		</div>
				

        	</div>
            </article>


                <?php } else { ?>


                <article <?php post_class( 'post-list-bottom-block' ); ?>>
                    

				<div class="post-grid-wrapper-two-inner recent-postlist-wrap-inner">
				
					<div class="recent-post-number-wrap">
						<span class="recent-post-number"><?php echo esc_html('0'); ?><?php echo esc_attr( $count ); ?></span>
					</div>
				
					<div class="post-grid-content-two">
					
						<h3 class="post-title">
							<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
						</h3>


						<div class="post-meta-items">


							<div class="category-box">
							<?php require EVIOR_THEME_DIR . '/template-parts/cat-color.php'; ?>
							</div>


							<div class="date-box">
							<?php echo esc_html(get_the_date( 'F j' )); ?>
							</div>
						
						
						</div>

					</div>
					

				</div>


                </article>



                <?php }

                $i++;

            endwhile;

            echo '</div>';
        endif;

        wp_reset_postdata();

        echo '</section>';

}
    protected function largepostcolumns() { ?>

            <article <?php post_class( 'post-list-top' ); ?>>
                <div class="blog-post-grid-wrapper blog-post-grid-wrapper-four post-block-item post-block-listwrap">
        		
				
				<div class="news-post-grid-thumbnail">
        			<a href="<?php the_permalink(); ?>" class="news-post-grid-thumbnail-wrap">
						<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
					</a>
				</div>
				
				<div class="news-post-grid-content grid-content-bottom">
				
					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
					</h3>


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

					<div class="recent-post-number-right">
						<span class="recent-post-right-counter"><?php echo esc_html('01'); ?></span>
					</div>

        		</div>
				

        	</div>
            </article>

        <?php
    }

    protected function smallpostcolumns() { ?>


                <article <?php post_class( 'post-list-bottom-block' ); ?>>
                    

				<div class="post-grid-wrapper-two-inner recent-postlist-wrap-inner">
				
					<div class="recent-post-number-wrap">
						<span class="recent-post-number"><?php echo esc_html('02'); ?></span>
					</div>
				
					<div class="post-grid-content-two">
					
						<h3 class="post-title">
							<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
						</h3>


						<div class="post-meta-items">


							<div class="category-box">
							<?php require EVIOR_THEME_DIR . '/template-parts/cat-color.php'; ?>
							</div>


							<div class="date-box">
							<?php echo esc_html(get_the_date( 'F j' )); ?>
							</div>
						
						
						</div>

					</div>
					

				</div>


                </article>


 

        <?php

    }


   
   	public function posts_cat_list() {
		
		$terms = get_terms( array(
			'taxonomy'    => 'category',
			'hide_empty'  => true
		) );

		$cat_list = [];
		foreach($terms as $post) {
		$cat_list[$post->slug]  = [$post->name];
		}
		return $cat_list;
	  
	}		
	
}

