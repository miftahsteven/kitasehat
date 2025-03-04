<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init','evior_category_widget');


function evior_category_widget(){
		register_widget("evior_category_list_widget_register");
}

class evior_category_list_widget_register extends WP_widget{

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		$widget_ops = array( 
		
		'classname' => 'theme-category-img-list', 
		'description' => esc_html__( 'Dispaly Category With Image' , 'evior') 
		
		);
		
		parent::__construct('evior_category_list_widget_register', esc_html__('Evior: Category List With Image', 'evior'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget($args,$instance){
	extract($args);		
		
		$title = isset($instance['title']) ? $instance['title']: "Display Category With image";
		$number_of_cat = isset($instance['number_of_cat']) ? $instance['number_of_cat']: "";
		
		?>

	<div class="wrapper_category_image">
    <?php 
			$args = array(
		    'hide_empty'    => true, 
		    'number'        => $number_of_cat
		    );
			
			$categories = get_terms('category', $args);
			

			if ($categories) {
				
            echo '<div class="category_image_wrapper_main theme_cat_img_List">';
			echo '<h3>Categories</h3>';
			echo '<ul class="category_image_bg_image theme_img_cat_item_List">';
			
            foreach( $categories as $tag) {
				
              $tag_link = get_category_link($tag->term_id);
			  
              $cat_bg_Color = get_term_meta($tag->term_id, 'evior', true);
			  
			  $catColor = !empty( $cat_bg_Color['cat-color'] )? $cat_bg_Color['cat-color'] : '#ffbc00';
			  
              $category_image_main = get_term_meta($tag->term_id, 'evior', true);
			  
			  $catImg = !empty( $category_image_main['cat-bg'] )? $category_image_main['cat-bg'] : '';

	
            echo '<li class="img_cat_item_list_Single"><a style= "background-image: url('.$catImg.');" class="category_image_link" id="category_color_'.$tag->term_id.'" href="'.esc_url($tag_link).'">
			
			<span class="cat-name">'.$tag->name.'</span>
			<span style="background-color: '.$catColor.';" class="category-count">'.$tag->count.'</span>
			
			</a></li>';

            }
			
			echo '</ul>';
            echo "</div>";
			
            }

			?>

    <?php echo "</div>";
	
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['number_of_cat'] = $new_instance['number_of_cat'];
		
		return $instance;
	}



	function form($instance){
		?>
    <?php
			$defaults = array( 'title' => esc_html__( 'Categories' , 'evior'), 'number_of_cat' => '');
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            <?php esc_html_e( 'Title:', 'evior'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('number_of_cat')); ?>">
            <?php esc_html_e( 'Number Of Category:', 'evior'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('number_of_cat')); ?>" name="<?php echo esc_attr($this->get_field_name('number_of_cat')); ?>" type="text" value="<?php echo esc_attr($instance['number_of_cat']); ?>" />
    </p>


    <?php

	}
}
?>