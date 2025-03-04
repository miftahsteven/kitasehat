<?php if (!defined('ABSPATH')) die('Direct access forbidden.');

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package evior
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
 

/** Echo Variable **/

function evior_return( $s ) {
   return $s;
}


/** Get Tag List **/

if( !function_exists('evior_post_tags')){
	
	function evior_post_tags() {
		$terms = get_terms( array(
			'taxonomy'    => 'post_tag',
			'hide_empty'  => false,
			'posts_per_page' => -1, 
		) );
		$cat_list = [];
		foreach($terms as $post) {
		$cat_list[$post->term_id]  = [$post->name];
		}
		return $cat_list;
	}
}

/** Post Read Time **/

function evior_reading_time() {
	
	global $post;
	
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);
	if ($readingtime == 1) {
	$timer = " min read";
	} else {
	$timer = " min read";
	}
	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}



/** Post View **/
 
function evior_get_post_view() {

	$count = get_post_meta( get_the_ID(), 'post_views_count', true );
	return "$count";
}


function evior_set_post_view() {

	$key = 'post_views_count';
	$post_id = get_the_ID();
	$count = (int) get_post_meta( $post_id, $key, true );
	$count++;

	update_post_meta( $post_id, $key, $count );

}


// return embed code video url
// ----------------------------------------------------------------------------------------
function evior_video_embed($url){
    //This is a general function for generating an embed link of an FB/Vimeo/Youtube Video.
	$embed_url = '';
    if(strpos($url, 'facebook.com/') !== false) {
		
        //it is FB video
        $embed_url = esc_url('https://www.facebook.com/plugins/video.php?href='.rawurlencode($url).'&show_text=1&width=200');
		
    }else if(strpos($url, 'vimeo.com/') !== false) {
        //it is Vimeo video
        $video_id = explode("vimeo.com/",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
		
        $embed_url = esc_url('https://player.vimeo.com/video/'.$video_id);
			
    }else if(strpos($url, 'youtube.com/') !== false) {
        //it is Youtube video
        $video_id = explode("v=",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
		$embed_url =esc_url('https://www.youtube.com/embed/'.$video_id);
		
    }else if(strpos($url, 'youtu.be/') !== false){
        //it is Youtube video
        $video_id = explode("youtu.be/",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
        $embed_url =esc_url('https://www.youtube.com/embed/'.$video_id);
    }
	
	else{
        //for new valid video URL
    }
    return $embed_url;
}  


//*** Prev Next Post ***//

if(!function_exists('evior_theme_post_navigation')) {
  function evior_theme_post_navigation() { 

    $previous_post       = get_previous_post();
    $prev_thumbnail      = (is_object($previous_post) && !empty($previous_post)) ? get_the_post_thumbnail($previous_post->ID):'';
    $next_post           = get_next_post();
    $next_post_thumbnail = (is_object($next_post) && !empty($next_post)) ? get_the_post_thumbnail($next_post->ID):'';
    $col_class           = ($previous_post && $next_post) ? 'col-sm-6':'col-sm-12';
    if($previous_post || $next_post):
  ?>
    
	<div class="theme_blog_navigation__Wrap">
    <div class="row">

      <?php if ($previous_post): ?>
      <div class="<?php echo esc_attr($col_class); ?>">
        <div class="theme_blog_Nav post_nav_Left <?php echo (empty($prev_thumbnail)) ? 'no-thumb':''; ?>">
          <?php if(!empty($prev_thumbnail)): ?>
            <div class="theme_blog_nav_Img prev_nav_left_Img">
              <?php echo wp_kses_post($prev_thumbnail); ?>
            </div>
          <?php endif; ?>
          <div class="theme_blog_nav_Inner">
            <div class="theme_blog_nav_Label">
			
				<?php $blog_prev_title = evior_get_option('blog_prev_title');  ?>
				<?php echo esc_html($blog_prev_title); ?>
			
			</div>
            <h3 class="theme_blog_nav_Title"><?php previous_post_link('%link', '%title'); ?></h3>
          </div>
        </div>

      </div>
	  
      <?php endif; ?>
      <?php if ($next_post): ?>
	  
      <div class="<?php echo esc_attr($col_class); ?>">
	  
        <div class="theme_blog_Nav post_nav_Right <?php echo (empty($next_post_thumbnail)) ? 'no-thumb':''; ?>">
          <?php if(!empty($next_post_thumbnail)): ?>
            <div class="theme_blog_nav_Img prev_nav_Right_Img">
             <?php echo wp_kses_post($next_post_thumbnail); ?>
            </div>
          <?php endif; ?>
          <div class="theme_blog_Inner">
            <div class="theme_blog_nav_Label">
			
			<?php $blog_next_title = evior_get_option('blog_next_title');  ?>
			<?php echo esc_html($blog_next_title); ?>
			
			</div>
            <h3 class="theme_blog_nav_Title"><?php next_post_link('%link', '%title'); ?></h3>
          </div>
        </div>
      </div>
      <?php endif; ?>


    </div>
    </div>

  <?php endif;
  }
}

//*** Categories Count custom markup ***//

function evior_categories_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post_count"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','evior_categories_postcount_filter');


/** Add Contact Methods in the User Profile **/
function evior_user_contact_methods( $user_contact ) {
	
    $user_contact['facebook']   = esc_html__( 'Facebook Profile Link', 'evior' );
    $user_contact['twitter']    = esc_html__( 'Twitter Profile', 'evior' );
    $user_contact['instagram']  = esc_html__( 'Instagram', 'evior' ); 
	$user_contact['pinterest']  = esc_html__( 'Pinterest', 'evior' );
	$user_contact['youtube']    = esc_html__( 'Youtube Profile', 'evior' );
	
    return $user_contact; 
};
add_filter( 'user_contactmethods', 'evior_user_contact_methods' );

function evior_theme_author_box() {

    global $post;

    $theme_author_markup = '';
    // Get author's display name - NB! changed display_name to first_name. Error in code.
    $display_name = get_the_author_meta( 'display_name', $post->post_author );

    // If display name is not available then use nickname as display name
    if ( empty( $display_name ) )
    $display_name = get_the_author_meta( 'nickname', $post->post_author );

    // Get author's biographical information or description
    $user_description   = get_the_author_meta( 'user_description', $post->post_author );
    
    $user_facebook      = get_the_author_meta('facebook', $post->post_author);
    $user_twitter       = get_the_author_meta('twitter', $post->post_author);
    $user_instagram     = get_the_author_meta('instagram', $post->post_author);
	$user_pinterest     = get_the_author_meta('pinterest', $post->post_author);
	$user_youtube       = get_the_author_meta('youtube', $post->post_author);

    // Get link to the author archive page
    $user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
    if ( ! empty( $display_name ) )
    // Author avatar - - the number 90 is the px size of the image.
    $theme_author_markup .= '<div class="author-thumb">' . get_avatar( get_the_author_meta('ID') , 200 ) . '</div>';
    $theme_author_markup .= '<div class="theme_author_Info">';
    $theme_author_markup .= '<h6 class="theme_author_Title">' . esc_html__('About Author', 'evior'). '</h6>';
    $theme_author_markup .= '<h4 class="theme_author__Name">' . $display_name . '</h4>';
    $theme_author_markup .= '<p class="theme_author__Description">' . get_the_author_meta( 'description' ). '</p>';
    $theme_author_markup .= '<div class="theme_author_Socials">';


	// Check if author has Twitter in their profile
	
    if ( ! empty( $user_facebook ) ) {
        $theme_author_markup .= ' <a href="' . $user_facebook .'" target="_blank" rel="nofollow" title="Facebook"><i class="fa fa-facebook-f"></i> </a>';
    }
	
	    
    if ( ! empty( $user_twitter ) ) {
        $theme_author_markup .= ' <a href="' . $user_twitter .'" target="_blank" rel="nofollow" title="Twitter"><i class="fa fa-twitter"></i> </a>';
    }
	
	if ( ! empty( $user_instagram ) ) {
        $theme_author_markup .= ' <a href="' . $user_instagram .'" target="_blank" rel="nofollow" title="Instagram"><i class="fa fa-instagram"></i> </a>';
    }
	
	if ( ! empty( $user_pinterest ) ) {
        $theme_author_markup .= ' <a href="' . $user_pinterest .'" target="_blank" rel="nofollow" title="Pinterest"><i class="fa fa-pinterest"></i> </a>';
    }

    if ( ! empty( $user_youtube ) ) {
        $theme_author_markup .= ' <a href="' . $user_youtube .'" target="_blank" rel="nofollow" title="Youtube"><i class="fa fa-youtube"></i> </a>';
    }

    $theme_author_markup .= '</div></div>';

    // Pass all this info to post content 
    echo '<div class="author_bio__Wrapper" >' . $theme_author_markup . '</div>';
}







