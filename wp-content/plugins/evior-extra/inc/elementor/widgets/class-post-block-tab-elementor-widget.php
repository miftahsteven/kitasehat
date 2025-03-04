<?php

/**
 * Elementor Widget
 * @package Evior
 * @since 1.0.0
 */



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class evior_post_tab extends \Elementor\Widget_Base {

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
		return 'posts-tab';
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
		return esc_html__( 'Evior Posts Tab', 'evior-extra' );
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
		return 'fa fa-picture-o';
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
		$this->tab_options();		
		$this->post_query_options();	
		$this->meta_options();	
		$this->design_options();
	}
	
	/**
    * Tab Item Options
    */
    private function tab_options() {
	
	
		$this->start_controls_section(
            'tab_option',
            [
                'label' => __( 'Tab Item and Content', 'evior-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		
		$this->add_control(
         'tabs',
         [
             'label' => esc_html__('Tab Items', 'evior-extra'),
             'type' => \Elementor\Controls_Manager::REPEATER,
             'default' => [
                 [
                     'tab_title' => esc_html__('Add Tab Item Menu', 'evior-extra'),
                 ],
             ],
			 
             'fields' => [
			 
                [   'name' => 'post_categories',
                     'label' =>esc_html__('Select Categories', 'evior-extra'),
                     'type'      => \Elementor\Controls_Manager::SELECT2,
                     'options'   => $this->posts_cat_list(),
                     'label_block' => true,
                     'multiple'  => true,
					 'placeholder' => __( 'All Categories', 'evior-extra' ),
                ],
				 
                [   'name' => 'tab_menu_name',
                     'label'         => esc_html__( 'Tab Menu Name', 'evior-extra' ),
                     'type'          => \Elementor\Controls_Manager::TEXT,
                     'default'       => 'Add Tab Menu',
                ],
			   
                [   
                  'name' => 'enable_offset_post',
                  'label'         => esc_html__( 'Enable Skip Post', 'evior-extra' ),
                  'type' => \Elementor\Controls_Manager::SWITCHER,
                  'label_on' => esc_html__('Yes', 'evior-extra'),
                  'label_off' => esc_html__('No', 'evior-extra'),
				  'default' => 'no',
                ],
			   
                [  
                   'name' => 'post_offset_count',
                   'label'         => esc_html__( 'Skip Post Count', 'evior-extra' ),
                   'type'          => \Elementor\Controls_Manager::NUMBER,
                   'default'       => '1',
                   'condition' => [ 'enable_offset_post' => 'yes' ]
                ],
			   
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
		
		// Post Items
		
        $this->add_control(
            'post_number',
			[
				'label'         => esc_html__( 'Number Of Posts', 'evior-extra' ),
				'type'          => \Elementor\Controls_Manager::NUMBER,
				'default'       => '1',
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
                'label' => __( 'Design Options', 'evior-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
		$this->add_control(
			'tab_title_text',
				[
					'label' => esc_html__('Section Title', 'evior-extra'),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Featured News', 'evior-extra' ),
				]
		);
				
		
			$this->add_responsive_control(
			'tab_grid_img_height',
			[
				'label' =>esc_html__( 'Set Top Big Post Image height', 'evior-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 300,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 400,
				],
				
				'selectors' => [
					'{{WRAPPER}} .theme_post_Tab__content.theme_post_Tabone__content .theme_post_Tab__block.block-tab-item .blog-post-grid-wrapper .news-post-grid-thumbnail img' => 'height: {{SIZE}}{{UNIT}}!important;',
				],
			]
		);	


		$this->add_responsive_control(
			'tab_list_img_width',
			[
				'label' =>esc_html__( 'Set Top List Post Image Width', 'evior-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 165,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 165,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 165,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 165,
				],
				
				'selectors' => [
					'{{WRAPPER}} .theme_post_Tab__content.theme_post_Tabone__content .post-gridstyle-two.tab-bottom-grid-style .post-grid-wrapper-two-inner .grid-thumbnail-two-wrap' => 'min-width: {{SIZE}}{{UNIT}}!important;',
				],
			]
		);	

		$this->add_responsive_control(
			'tab_list_img_height',
			[
				'label' =>esc_html__( 'Set Top List Post Image Height', 'evior-extra' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 110,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 110,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 110,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 110,
				],
				
				'selectors' => [
					'{{WRAPPER}} .theme_post_Tab__content.theme_post_Tabone__content .post-gridstyle-two.tab-bottom-grid-style .post-grid-wrapper-two-inner .grid-thumbnail-two-wrap img' => 'height: {{SIZE}}{{UNIT}}!important;',
				],
			]
		);


		
		$this->add_control(
          'title_length',
          [
            'label'         => esc_html__( 'Big Block Post Title Length', 'evior-extra' ),
            'type'          => \Elementor\Controls_Manager::NUMBER,
            'default'       => '10',
          ]
        );
		
		$this->add_control(
          'content_length',
          [
            'label'         => esc_html__( 'Post Excerpt Length', 'ennlil-extra' ),
            'type'          => \Elementor\Controls_Manager::NUMBER,
            'default'       => '15',
          ]
        );
		
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tabbedbig_title_typography',
				'label' => __( 'Featured Title Typography', 'evior-extra' ),
				'selector' => '{{WRAPPER}} .theme_post_Tab__content.theme_post_Tabone__content .post-block-item .news-post-grid-content h3.post-title',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tabbedsmall_title_typography',
				'label' => __( 'Small Title Typography', 'evior-extra' ),
				'selector' => '{{WRAPPER}} .theme_post_Tab__content.theme_post_Tabone__content .post-gridstyle-two.tab-bottom-grid-style .post-grid-content-two h3.post-title',
			]
		);
		

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tabbedsmallp_content_typography',
				'label' => __( 'Small Paragraph Typography', 'evior-extra' ),
				'selector' => '{{WRAPPER}} .theme_post_Tab__content.theme_post_Tabone__content .post-block-item .news-post-grid-content .post-excerpt-box p',
			]
		);


		$this->end_controls_section();
	
	}	
		


	protected function render() {
		
		
		$settings = $this->get_settings_for_display();
		
		$tab_title_text   = $settings['tab_title_text'];
		
		$title_limit = $settings['title_length'];
		$content_limit = $settings['content_length'];
		
		$post_number        = $settings['post_number'];
		$post_order         = $settings['post_ordering'];
        $post_sortby        = $settings['post_sorting'];

        $display_blog_excerpt = $settings['display_excerpt'];
		
		$display_blog_cat = $settings['display_cat'];
		$display_blog_author = $settings['display_author'];
		$display_blog_date = $settings['display_date'];

		$display_read_time = $settings['display_read_time'];
		
		$tabs               = $settings['tabs'];
        $post_count         = count($tabs);

	?>


	    <div class="theme_post_Tab__wrapper news_tab__Wrapper">
            <div class="post-block-element news_tab_Block">
				
					<h2 class="tab-item-title">
						<?php echo esc_html($tab_title_text); ?>
					</h2>
				
					
					
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
                              foreach ( $tabs as $tab_Menu_key=>$value ) {
                                       
                                    if( $tab_Menu_key == 0 ){
                                          echo '<li class="nav-item"><a class="nav-link active" href="#'.$this->get_id().$value['_id'].'" data-toggle="tab"><span class="tab_menu_Item">'.$value['tab_menu_name'].'</span></a></li>';
                                    } else {
                                          echo '<li class="nav-item"><a class="nav-link" href="#'.$this->get_id().$value['_id'].'" data-toggle="tab"><span class="tab_menu_Item">'.$value['tab_menu_name'].'</span></a></li>';
                                    }
                                 
                              }
                        ?>
                    </ul>

                    <div class="theme_post_Tab__content theme_post_Tabone__content tab-content">

                     <?php
                     
                     foreach ($tabs as $tab_Content_key=>$value) {
                      
                        if( $tab_Content_key == 0){
                           echo '<div role="tabpanel" class="tab-pane fade active show" id="'.$this->get_id().$value['_id'].'">';
                        } else {
                           echo '<div role="tabpanel" class="tab-pane fade" id="'.$this->get_id().$value['_id'].'">';
                        }
                        
                        $args = array(
                           'post_type'   =>  'post',
                           'post_status' => 'publish',
                           'posts_per_page' => $post_number,
                           'order' => $post_order,
                           'orderby' => $post_sortby,
                           'ignore_sticky_posts' => 1,
                        );
						
						
						// Category
						
						if ( ! empty( $value['post_categories'] ) ) {
							$args['category_name'] = implode(',', $value['post_categories']);
						}
		
						// Post Offset
						
						if($value['enable_offset_post'] == 'yes') {
							$args['offset'] = $value['post_offset_count'];
						}
                   
                   
                       $Tabquery = new \WP_Query( $args );
                     
                     ?>

                     <?php if ( $Tabquery->have_posts() ) : ?>
					 
                        <div class="theme_post_Tab__block block-tab-item">
                            <div class="row">
							  
								<?php while ($Tabquery->have_posts()) : $Tabquery->the_post();?>
								
                                <?php if ( $Tabquery->current_post == 0 ): ?>
								
								<div class="col-lg-6 col-sm-12">
									
								<div class="news_post_grid_design blog-post-grid-wrapper blog-post-grid-wrapper-four post-block-item">
					        		
									
									<div class="news-post-grid-thumbnail">
					        			<a href="<?php the_permalink(); ?>" class="news-post-grid-thumbnail-wrap">
											<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
										</a>
									</div>
									
									<div class="news-post-grid-content grid-content-bottom">
									
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
											<?php echo esc_html(get_the_date( 'F j' )); ?>
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
								
                                <?php else: ?>
                                	
                                <?php if ( $Tabquery->current_post == 1 ): ?>
									
                                <div class="col-lg-6 col-sm-12">

                                   <?php endif; ?> 

								<div class="post-gridstyle-two tab-bottom-grid-style">

				                <div class="post-grid-wrapper-two-inner">
								
									<div class="grid-thumbnail-two-wrap">
										<a href="<?php the_permalink(); ?>" class="post-grid-thumbnail-two">
											<img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>" alt="<?php the_title_attribute(); ?>">
										</a>
									</div>
								
									<div class="post-grid-content-two">
									
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
					


										<div class="post-meta-items">

										<?php if($display_blog_cat=='yes'): ?>	
											<div class="category-box">
											<?php require EVIOR_THEME_DIR . '/template-parts/cat-color.php'; ?>
											</div>
										<?php endif; ?>	


										<?php if($display_blog_date=='yes'): ?>
											<div class="date-box">
											<?php echo esc_html(get_the_date( 'F j' )); ?>
											</div>
										<?php endif; ?>	
										
										
										</div>

									</div>
									

								</div>

								</div>
											
                                    <?php if (($Tabquery->current_post + 1) == ($Tabquery->post_count)) { ?>
                           
                                </div>

                                <?php } ?> 
                                <?php endif ?>

                                <?php 
                                endwhile; ?>
								
                              </div>
                           </div>
                        <?php wp_reset_postdata(); ?>
                     <?php endif; ?>
					 
                     </div>
                     <?php } ?>
                </div>
          </div>
      </div>


		
	
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

