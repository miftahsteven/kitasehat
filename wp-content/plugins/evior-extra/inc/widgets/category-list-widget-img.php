<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init','evior_category_widget_new');


function evior_category_widget_new(){
		register_widget("evior_category_list_widget_imgg");
}

class evior_category_list_widget_imgg extends WP_Widget {


	function __construct() {
        $widget_opt = array(
            'classname'		 => 'evior-category-list',
            'description'	 => esc_html__('Theme Category List','evior-extra')
        );

        parent::__construct( 'evior_category_list_widget_imgg', esc_html__( 'Evior Category List', 'evior-extra' ), $widget_opt );
    }

	
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$theme_cat_markup ='<div class="category_image_wrapper"><div class="theme_cat_custom_list">';
		if ( ! empty( $instance['evior_title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['evior_title'] ) . $args['after_title'];
		}
		
		if(isset($instance['evior_taxonomy_itemm'])){
			$theme_cat_markup .='<ul class="theme-custom-category-lists theme_img_cat_Itemlist">';
				$args_val = array( 'hide_empty=0' );				
				$excludeCat= $instance['evior_selected_categories'] ? $instance['evior_selected_categories'] : '';
				$evior_select_cat_item= $instance['evior_select_cat_item'] ? $instance['evior_select_cat_item'] : '';
				if($excludeCat && $evior_select_cat_item!='')
				$args_val[$evior_select_cat_item] = $excludeCat;
				
				$terms = get_terms( $instance['evior_taxonomy_itemm'], $args_val );
				
				if ( !empty($terms) ) {	

					foreach ( $terms as $term ) {
						$term_link = get_term_link( $term );
						
						if ( is_wp_error( $term_link ) ) {
						continue;
						}
						
					$active_cat_class='';	
					$category_image = '';
					if($term->taxonomy=='category' && is_category())
					{
                 $thisCat = get_category(get_query_var('cat'),false);
              
                
					  if($thisCat->term_id == $term->term_id)
						$active_cat_class='class="active-cat img_cat_item_list_Single"';
				    }
					 
					if(is_tax())
					{
					    $currentTermType = get_query_var( 'taxonomy' );
					    $termId= get_queried_object()->term_id;
						 if(is_tax($currentTermType) && $termId==$term->term_id)
                    $active_cat_class='class="active-cat img_cat_item_list_Single"';
                    
					}
                  
				$category_featured_thumbnail = get_term_meta($term->term_id, 'evior', true);
				$catImg = !empty( $category_featured_thumbnail['cat-bg'] )? $category_featured_thumbnail['cat-bg'] : '';
				$category_image = 'style="background-image:url('.esc_url( $catImg ).');"';
				 
						$theme_cat_markup .='<li '.$active_cat_class.'><a '.wp_kses_post($category_image).' href="' . esc_url( $term_link ) . '" class="category_image_single"><div class="cat-inner-list cat-list-inner-content"><span class="cat-name-single">' . $term->name ;

						$theme_cat_markup .='</span><span class="category-number">'.$term->count.' Posts</span></div>';
						
						$theme_cat_markup .='<span class="category-btnn">View All</span>';
						
						$theme_cat_markup .='</a></li>';
					}
				}
			$theme_cat_markup .='</ul>';
			
			}	
		$theme_cat_markup .='</div></div>';

		echo wp_kses_post($theme_cat_markup);
		echo $args['after_widget'];
	}


	public function form( $instance ) {
		$evior_title 				= ! empty( $instance['evior_title'] ) ? $instance['evior_title'] : esc_html__( 'Theme Categories List', 'evior-extra' );

		$evior_taxonomy_itemm 			= ! empty( $instance['evior_taxonomy_itemm'] ) ? $instance['evior_taxonomy_itemm'] : esc_html__( 'category', 'evior-extra' );
		$evior_selected_categories 	= (! empty( $instance['evior_selected_categories'] ) && ! empty( $instance['evior_select_cat_item'] ) ) ? $instance['evior_selected_categories'] : array();
		$evior_select_cat_item 			= ! empty( $instance['evior_select_cat_item'] ) ? $instance['evior_select_cat_item'] : '';
		?>
		
		
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'evior_title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" width="100%" id="<?php echo esc_attr( $this->get_field_id( 'evior_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'evior_title' ) ); ?>" type="text" value="<?php echo esc_attr( $evior_title ); ?>">
		</p>
		
		
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'evior_taxonomy_itemm' ) ); ?>"><?php _e( esc_attr( 'Select Taxonomy Type:' ) ); ?></label> 
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'evior_taxonomy_itemm' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'evior_taxonomy_itemm' ) ); ?>">
					<?php 
					$args = array(
					  'public'   => true,
					  '_builtin' => false
					  
					); 
					$output = 'names'; 
					$operator = 'and';
					$taxonomies = get_taxonomies( $args, $output, $operator ); 
					array_push($taxonomies,'category');
					if ( !empty($taxonomies) ) {
					foreach ( $taxonomies as $taxonomy ) {

						echo '<option value="'.$taxonomy.'" '.selected($taxonomy,$evior_taxonomy_itemm).'>'.$taxonomy.'</option>';
					}
					}

				?>    
		</select>
		</p>
		
		<p>
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'evior_select_cat_item' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'evior_select_cat_item' ) ); ?>">
           <option value="" <?php selected($evior_select_cat_item,'' )?> > <?php echo esc_html__('Show All Category','evior-extra').' :'; ?> </option>       
           <option value="include" <?php selected($evior_select_cat_item,'include' )?> > <?php echo esc_html__("Choose Category:","evior-extra"); ?> </option>       
           <option value="exclude" <?php selected($evior_select_cat_item,'exclude' )?> > <?php echo esc_html__("Exclude Category","evior-extra").' :'; ?> </option>
		</select> 
		<select class="widefat evior-category-widget" id="<?php echo esc_attr( $this->get_field_id( 'evior_selected_categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'evior_selected_categories' ) ); ?>[]" multiple>
					<?php 			
					if($evior_taxonomy_itemm){
					$args = array( 'hide_empty=0' );
					$terms = get_terms( $evior_taxonomy_itemm, $args );
			        echo '<option value="" '.selected(true, in_array('',$evior_selected_categories), false).'>'.esc_html('None ','evior-extra').'</option>';
					if ( !empty($terms) ) {
					foreach ( $terms as $term ) {
						echo '<option value="'.$term->term_id.'" '.selected(true, in_array($term->term_id,$evior_selected_categories), false).'>'.$term->name.'</option>';
					}
				    	
					}
				}

				?>    
		</select>
		</p>
		
		
		<?php 
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['evior_title'] 					= ( ! empty( $new_instance['evior_title'] ) ) ? strip_tags( $new_instance['evior_title'] ) : '';

		$instance['evior_taxonomy_itemm'] 			= ( ! empty( $new_instance['evior_taxonomy_itemm'] ) ) ? strip_tags( $new_instance['evior_taxonomy_itemm'] ) : '';
		$instance['evior_selected_categories'] 	= ( ! empty( $new_instance['evior_selected_categories'] ) ) ? $new_instance['evior_selected_categories'] : '';
		$instance['evior_select_cat_item'] 			= ( ! empty( $new_instance['evior_select_cat_item'] ) ) ? $new_instance['evior_select_cat_item'] : '';
		
		
		return $instance;
		
		
	}
}





