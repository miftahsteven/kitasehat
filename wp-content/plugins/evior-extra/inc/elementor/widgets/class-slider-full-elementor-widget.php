<?php

/**
 * Elementor Widget
 * @package Evior
 * @since 1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class evior_post_slider_full extends \Elementor\Widget_Base {

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
		return 'posts-slider-full';
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
		return esc_html__( 'Full Width Slider ', 'evior-extra' );
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
			
			
        $('.featured-slider-2-items').slick({
            fade: true,
            asNavFor: '.featured-slider-2-nav',
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="ri-arrow-left-line"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="ri-arrow-right-line"></i></button>',
			rtl: rtl_slick(),
            appendArrows: '.arrow-cover',
        });
		
		$('.featured-slider-2-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.featured-slider-2-items',
            dots: false,
            arrows: false,
            centerMode: true,
            focusOnSelect: true,
            centerPadding: 0,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });
		

		});
    </script> 
	
		
		
		
		<?php if ( $query->have_posts() ) : ?>
		
		<div class="theme-featured-slider-wrapper">
		
		
		<div class="featured-slider-2-items">
		
        <?php while ($query->have_posts()) : $query->the_post(); ?>
			
			
			<div class="slider-single">
				<div class="post-thumb-img position-relative">
					<div class="thumb-overlay position-relative" style="background-image: url(<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>)">
						<div class="post-content-overlay">
							<div class="container">
							
							
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
								
								<div class="slider-overlay-meta-content">
									
									
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
						</div>
					</div>
				</div>
			</div>
			

		<?php endwhile; ?>
		
		</div>
		
		
		
<div class="container position-relative">	
<div class="arrow-cover color-white"></div>
<div class="featured-slider-2-nav-cover">
<div class="featured-slider-2-nav">
		
		
	<?php 
	
		while ( $query->have_posts() ) :
            $query->the_post();

        ?>
				
			<div class="slider-post-thumb position-relative">
				<img class="featured-slide-img" src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="">
			</div>
		
		<?php endwhile; ?>
		
		</div>
		</div>
		</div>
			
			
		</div>	
			
			
        <?php endif; ?>
		
		
		
		<?php wp_reset_postdata(); ?>
		
		
	
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

