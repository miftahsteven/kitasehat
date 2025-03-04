<?php

/**
 * Elementor Widget
 * @package Evior
 * @since 1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class evior_post_slider_main extends \Elementor\Widget_Base {

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
		return 'posts-slider-main';
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
		return esc_html__( 'Theme Slider', 'evior-extra' );
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
				'label' =>esc_html__( 'Set Post Image Height', 'evior-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 490,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 350,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 490,
				],
				
				'selectors' => [
					'{{WRAPPER}} .theme_post_grid__Slider .blog-post-grid-wrapper .news-post-grid-thumbnail img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);		
		
		$this->add_responsive_control(
			'grid_padding',
			[
				'label' => esc_html__( 'Set Post Grid Item Padding', 'evior' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%'],
				'selectors' => [
					'{{WRAPPER}} .theme_post_grid__Slider .blog-post-grid-wrapper .news-post-grid-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'default'       => '2',
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
              'selector' => '{{WRAPPER}} .theme_post_grid__Slider .blog-post-grid-wrapper .news-post-grid-content h3.post-title',
           ]
        );		
		
		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'excerpt_typography',
              'label' => esc_html__( 'Post Excerpt Typography', 'evior-extra' ),
              'selector' => '{{WRAPPER}} .theme_post_grid__Slider .blog-post-grid-wrapper .post-excerpt-box p',
           ]
        );	
		
		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'meta_typography',
              'label' => esc_html__( 'Post Meta Typography', 'evior-extra' ),
              'selector' => '{{WRAPPER}} .theme_post_grid__Slider .blog-post-grid-wrapper .post-meta-items div',
           ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
			   'name' => 'author_box_typography',
			   'label' => esc_html__( 'Author Box Typography', 'evior-extra' ),
			   'selector' => '{{WRAPPER}} .theme_post_grid__Slider .blog-post-grid-wrapper .post_grid_author_img',
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

		
		$display_read_time = $settings['display_read_time'];

		
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

		// Query
        $query = new \WP_Query( $args ); ?>
		
		
	<script type="text/javascript">
	
		jQuery(document).ready(function ($) {
			
			function rtl_slick(){
				if ($('body').hasClass("rtl")) {
				   return true;
				} else {
				   return false;
			}}
			

			/* Main Slider */
			$('.theme-main-slider').slick({
				
				infinite: true,
				fade: true,
				dots: false,
				arrows: true,
				autoplay: false,
				speed: 800,
				slidesToShow: 1,
				rtl: rtl_slick(),

				prevArrow: '<div class="slide-arrow-left"><i class="fas fa-long-arrow-alt-left"></i></div>',
				nextArrow: '<div class="slide-arrow-right"><i class="fas fa-long-arrow-alt-right"></i></div>',
				
				

			 });

		});
    </script> 
	
		
		
		
		<?php if ( $query->have_posts() ) : ?>
		
		<div class="theme_post_grid__Slider theme-main-slider">
		
        <?php while ($query->have_posts()) : $query->the_post(); ?>

			<div class="news_post_grid_design blog-post-grid-wrapper">
        		<div class="news-post-grid-thumbnail">
        			<a href="<?php the_permalink(); ?>" class="news-post-grid-thumbnail-wrap">
						<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
					</a>
				</div>
				
				<div class="news-post-grid-content">
				
					<?php if($display_blog_author=='yes'): ?>

					<div class="author-name">
						<?php printf('<div class="post_grid_author_img">%1$s<a href="%2$s">%3$s</a></div>',
						get_avatar( get_the_author_meta( 'ID' ), 21 ), 
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
						get_the_author()
						); ?>
					</div>
					<?php endif; ?>	

					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words(get_the_title(), $title_limit,'') ); ?></a>
					</h3>

					<?php if($display_blog_excerpt =='yes'): ?> 
					<div class="post-excerpt-box">
						<p><?php echo esc_html( wp_trim_words(get_the_excerpt(), $content_limit ,'') );?></p>
					</div>
					<?php endif; ?>		


					<div class="post-meta-items">

					<?php if($display_blog_cat=='yes'): ?>	
						<div class="category-box">
						<?php require EVIOR_THEME_DIR . '/template-parts/cat-color.php'; ?>
						</div>
					<?php endif; ?>	


					<?php if($display_blog_date=='yes'): ?>
						<div class="date-box">
						<?php echo esc_html(get_the_date( 'F j, Y' )); ?>
						</div>
					<?php endif; ?>	
					
				
					<?php if($display_read_time=='yes'): ?>
						<div class="read-time-box">
						<?php echo evior_reading_time(); ?>
						</div>
					<?php endif; ?>	
					
					</div>

        		</div>
				
				<div class="theme-post-bookmark">
					<?php $pid = get_the_ID(); ?>
					<?php echo do_shortcode('[ccc_my_favorite_select_button post_id="' . $pid . '"]'); ?>
				</div>
				

        	</div>

		<?php endwhile; ?>
		
		</div>
		
		<?php wp_reset_postdata(); ?>
		
		<?php endif; ?>
		
	
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

