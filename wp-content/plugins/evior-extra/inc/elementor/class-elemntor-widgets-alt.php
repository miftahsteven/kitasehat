<?php 

/**
 * All Elementor widget init
 * @package Evior
 * @since 1.0.0
 */

function evior_elementor_custom_widgets( $widgets_manager ) {


	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-block-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-block-list-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-block-tab-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-block-tab-two-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-grid-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-grid-five-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-grid-four-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-grid-slider-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-grid-three-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-grid-two-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-latest-list-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-medium-list-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-medium-load-more-list-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-news-block-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-recent-list-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-trending-list-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-video-block-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-video-grid-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-post-video-list-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-slider-full-elementor-widget.php' );
	require_once( EVIOR_EXTRA_ELEMENTOR . '/widgets/class-slider-main-elementor-widget.php' );



	$widgets_manager->register( new \evior_post_block() );
	$widgets_manager->register( new \evior_post_block_list() );
	$widgets_manager->register( new \evior_post_tab() );
	$widgets_manager->register( new \evior_post_tab_two() );
	$widgets_manager->register( new \evior_post_grid() );
	$widgets_manager->register( new \evior_post_grid_five() );

	$widgets_manager->register( new \evior_post_grid_four() );
	$widgets_manager->register( new \evior_post_grid_slider() );
	$widgets_manager->register( new \evior_post_grid_three() );
	$widgets_manager->register( new \evior_post_grid_two() );
	$widgets_manager->register( new \evior_post_latest_list() );
	$widgets_manager->register( new \evior_post_medium_list() );

	$widgets_manager->register( new \evior_post_medium_list_load() );
	$widgets_manager->register( new \evior_post_news_blockk() );
	$widgets_manager->register( new \evior_post_recent_list() );
	$widgets_manager->register( new \evior_post_trending_list() );
	$widgets_manager->register( new \evior_post_block_video() );
	$widgets_manager->register( new \evior_post_grid_video() );

	$widgets_manager->register( new \evior_post_videos_list() );
	$widgets_manager->register( new \evior_post_slider_full() );
	$widgets_manager->register( new \evior_post_slider_main() );






}
add_action( 'elementor/widgets/register', 'evior_elementor_custom_widgets' );



/**
 * Evior Elementor _widget_categories()
 * @since 1.0.0
 * */


function evior_elementor_widget_categories($elements_manager) {

    $elements_manager->add_category(
        'evior_widgets',
        [
            'title' => __('Evior Widgets', 'evior-extra'),
        ]
    );

}

add_action('elementor/elements/categories_registered', 'evior_elementor_widget_categories');