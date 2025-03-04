<?php

/**
 * Elementor Widget
 * @package Evior
 * @since 1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class evior_post_medium_list_load extends \Elementor\Widget_Base {

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
		return 'posts-medium-list-load';
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
		return esc_html__( 'Posts List with Load More', 'evior-extra' );
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
			'grid_img_width',
			[
				'label' =>esc_html__( 'Set Post Image Width', 'evior-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 215,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 215,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 215,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 215,
				],
				
				'selectors' => [
					'{{WRAPPER}} .post-medium-style-loadmore .post-grid-wrapper-two-inner .grid-thumbnail-two-wrap' => 'min-width: {{SIZE}}{{UNIT}}!important;',
				],
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
					'size' => 150,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 150,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 150,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 150,
				],
				
				'selectors' => [
					'{{WRAPPER}} .post-medium-style-loadmore .post-grid-wrapper-two-inner .grid-thumbnail-two-wrap img' => 'height: {{SIZE}}{{UNIT}}!important;',
				],
			]
		);		
		
		$this->add_control(
         'show_loadmore',
         [
            'label' => esc_html__('Show loadmore', 'evior-extra'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'evior-extra'),
            'label_off' => esc_html__('No', 'evior-extra'),
            'default' => 'yes',

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
         'post_sortby',
         [
            'label'     => esc_html__('Post sort by', 'evior-extra'),
            'type'      => \Elementor\Controls_Manager::SELECT,
            'default'   => 'latestpost',
            'options'   => [
               'latestpost'      => esc_html__('Latest posts', 'evior-extra'),
               //'popularposts'    => esc_html__('Popular posts', 'evior-extra'),
               'mostdiscussed'    => esc_html__('Most discussed', 'evior-extra'),
               'title'       => esc_html__('Title', 'evior-extra'),
               'name'       => esc_html__('Name', 'evior-extra'),
               'rand'       => esc_html__('Random', 'evior-extra'),
               'ID'       => esc_html__('ID', 'evior-extra'),
            ],
         ]
      );	
		
		// Post Order
		
        $this->add_control(
            'post_order',
            [
                'type'    => \Elementor\Controls_Manager::SELECT,
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
            'post_cats',
            [
                'type'      => \Elementor\Controls_Manager::SELECT2,
				'label' =>esc_html__('Select Categories', 'evior-extra'),
                'options'   => $this->posts_cat_list(),
                'label_block' => true,
                'multiple'  => true,
            ]
        );
	
		$this->add_control(
         'post_tags',
			 [
				'label' => esc_html__('Select tags', 'evior-extra'),
				'type'      => \Elementor\Controls_Manager::SELECT2,
				'options'   => evior_post_tags(),
				'label_block' => true,
				'multiple'  => true,
			 ]
		);
		
		// Post Items.
		
        $this->add_control(
            'post_count',
			[
				'label'         => esc_html__( 'Number Of Posts', 'evior-extra' ),
				'type'          => \Elementor\Controls_Manager::NUMBER,
				'default'       => '3',
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
            'show_desc',
            [
                'label' => esc_html__('Display Post Excerpt', 'ennlil-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'ennlil-extra'),
                'label_off' => esc_html__('No', 'ennlil-extra'),
                'default' => 'yes',
            ]
        );

		$this->add_control(
         	'show_author',
         	[
				 'label' => esc_html__('Display Author', 'evior-extra'),
				 'type' => \Elementor\Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'evior-extra'),
				 'label_off' => esc_html__('No', 'evior-extra'),
				 'default' => 'yes',
         	]
     	);

     	$this->add_control(
            'show_cat',
            [
                'label' => esc_html__('Display Category Name', 'evior-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'evior-extra'),
                'label_off' => esc_html__('No', 'evior-extra'),
                'default' => 'yes',
            ]
        );
		
		$this->add_control(
         'show_gradient',
         [
            'label' => esc_html__('Show gradient color', 'evior-extra'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'evior-extra'),
            'label_off' => esc_html__('No', 'evior-extra'),
            'default' => 'yes',
         ]
      );
	  
		$this->add_control(
            'show_date',
            [
                'label' => esc_html__('Display Date', 'evior-extra'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'evior-extra'),
                'label_off' => esc_html__('No', 'evior-extra'),
                'default' => 'yes',
            ]
        );
	
		
		$this->add_control(
            'show_read_time',
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
              'selector' => '{{WRAPPER}} .post-medium-style-loadmore .post-grid-content-two h3.post-title',
           ]
        );
		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'excerpt_typography',
              'label' => esc_html__( 'Post Excerpt Typography', 'evior-extra' ),
              'selector' => '{{WRAPPER}} .post-medium-style-loadmore .post-grid-content-two .post-excerpt-box p',
           ]
        );		
		
		$this->add_group_control(
           \Elementor\Group_Control_Typography::get_type(),
           [
              'name' => 'meta_typography',
              'label' => esc_html__( 'Post Meta Typography', 'evior-extra' ),
              'selector' => '{{WRAPPER}} .post-medium-style-loadmore .post-grid-content-two .post-meta-items div',
           ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
			   'name' => 'author_box_typography',
			   'label' => esc_html__( 'Author Box Typography', 'evior-extra' ),
			   'selector' => '{{WRAPPER}} .post-medium-style-loadmore .post-grid-content-two .post_grid_author_img',
			]
		 );


		
		$this->add_control(
          'post_title_crop',
          [
            'label'         => esc_html__( 'Post Title Length', 'evior-extra' ),
            'type'          => \Elementor\Controls_Manager::NUMBER,
            'default'       => '20',
          ]
        );

        $this->add_control(
          'desc_limit',
          [
            'label'         => esc_html__( 'Post Excerpt Length', 'ennlil-extra' ),
            'type'          => \Elementor\Controls_Manager::NUMBER,
            'default'       => '35',
          ]
        );
		

		
		$this->end_controls_section();
	
	}	
		


	protected function render() {
		
		
		$settings = $this->get_settings_for_display();
		//$settings = $this->get_settings();
		$show_gradient = $settings['show_gradient'];
		
		$arg = [
         'post_type'   =>  'post',
         'post_status' => 'publish',
         'order' => $settings['post_order'],
         'posts_per_page' => $settings['post_count'],
         'tag__in' => $settings['post_tags'],
         'suppress_filters' => false,

		];
		
		if ($settings['post_cats'] != '' && !empty($settings['post_cats'])) {
			
         $arg['tax_query'] = array(
            array(
               'taxonomy' => 'category',
               'terms'    => $settings['post_cats'],
               'field' => 'id',
               'include_children' => true,
               'operator' => 'IN'
            ),
         );
		 
		}
	  
		switch ($settings['post_sortby']) {
         case 'mostdiscussed':
            $arg['orderby'] = 'comment_count';
            break;
         case 'title':
            $arg['orderby'] = 'title';
            break;
         case 'ID':
            $arg['orderby'] = 'ID';
            break;
         case 'rand':
            $arg['orderby'] = 'rand';
            break;
         case 'name':
            $arg['orderby'] = 'name';
            break;
         default:
            $arg['orderby'] = 'date';
            break;
      }
	  
	$query = new \WP_Query($arg);
	 
	$ajax_json_data = [
         'order' => $settings['post_order'],
         'posts_per_page' => $settings['post_count'],
         'terms'          => $settings['post_cats'],
         'tags'           => $settings['post_tags'],
         'post_sortby'    => $settings['post_sortby'],
         'total_post'     => $query->found_posts,
         //'grid_style'     => $settings['grid_style'],
         'show_read_time'    => $settings['show_read_time'],
         'show_cat'       => $settings['show_cat'],
         'show_author'    => $settings['show_author'],
         'show_date'      => $settings['show_date'],
         'show_desc'      =>  $settings['show_desc'],
         'desc_limit'     => $settings['desc_limit'],
         'post_title_crop'    => $settings['post_title_crop'],
         //'show_gradient'      => $settings['show_gradient'],
         //'show_author_avator' => $show_author_avator,

    ];

    $ajax_json_data = json_encode($ajax_json_data);
    $loadmore_class = 'post-grid-loadmore';
	 
?>
		
		

		<?php if ($query->have_posts()) { ?>
		
		
		<div class="grid-loadmore-content news_post_trending_list post-trending-list-wrap post-list-medium-wrap post-list-medium-style post-medium-style-loadmore">
		
        <?php while ($query->have_posts()) : $query->the_post(); ?>
		
				
				<div class="grid-item post-grid-wrapper-two-inner post-list-inner">
					<div class="post-grid-content-two post-list-medium-content">
					
						<?php if($settings['show_author'] == 'yes'): ?>

						<div class="author-name">
							<?php printf('<div class="post_grid_author_img">%1$s<a href="%2$s">%3$s</a></div>',
							get_avatar( get_the_author_meta( 'ID' ), 21 ), 
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
							get_the_author()
							); ?>
						</div>
						<?php endif; ?>	

						<h3 class="post-title">
							<a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words(get_the_title(), $settings['post_title_crop'],'') ); ?></a>
						</h3>

						<?php if($settings['show_desc'] == 'yes'): ?> 
						<div class="post-excerpt-box">
							<p><?php echo esc_html( wp_trim_words(get_the_excerpt(), $settings['desc_limit'] ,'') );?></p>
						</div>
						<?php endif; ?>		


						<div class="post-meta-items">

						<?php if($settings['show_cat'] == 'yes'): ?>	
							<div class="category-box">
							<?php require EVIOR_THEME_DIR . '/template-parts/cat-color.php'; ?>
							</div>
						<?php endif; ?>	


						<?php if($settings['show_date'] == 'yes'): ?>
							<div class="date-box">
							<?php echo esc_html(get_the_date( 'F j' )); ?>
							</div>
						<?php endif; ?>	
						
					
						<?php if($settings['show_read_time'] == 'yes'): ?>
							<div class="read-time-box">
							<?php echo evior_reading_time(); ?>
							</div>
						<?php endif; ?>	
						
						</div>

					</div>
					
					<div class="grid-thumbnail-two-wrap">
						<a href="<?php the_permalink(); ?>" class="post-grid-thumbnail-two">
							<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
						</a>
					</div>
				</div>
			
		<?php endwhile; ?>
		
		</div>
		
		<?php if ($settings['show_loadmore'] == 'yes') { ?>
            <?php if ($query->max_num_pages > 1) { ?>

               <div class="evior_load_more_custom_Wrapper load-more-btn">
                  <button class="evior-load-more-btn" data-json_grid_meta="<?php echo esc_attr($ajax_json_data); ?>">

                     <?php echo esc_html__('Load More', 'evior-extra'); ?>

                  </button>
               </div>
            <?php } ?>

        <?php } ?>
		
		<?php } ?>
		
	
<?php }
		
   protected function content_template() {}
   
   	public function posts_cat_list() {
		
		$terms = get_terms(array(
			'taxonomy'    => 'category',
			'hide_empty'  => false,
			'posts_per_page' => -1,
		));

      $cat_list = [];
      foreach ($terms as $post) {
         $cat_list[$post->term_id]  = [$post->name];
      }
      return $cat_list;
	  
	}		
	
}

