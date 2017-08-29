<?php

/*
*	Plugin Name: MWP Slider
*	Description: Simple Wordpress plugin for creating a Slider with indicator
*	Version: 1.0.0
*	Author: Maxlian Lay
*	Author URI: Contact at maxlian.lay@gmail.com
*	Tested up to: 4.8.1
*/

if ( !defined('ABSPATH') ) die('-1');

require_once __DIR__ . '/includes/class-mwp-loads.php';
require_once __DIR__ . '/includes/class-mwp-metabox.php';

class Mwp_Slider extends WP_Widget {

  function __construct() {
    parent::__construct( 'mwp_slider_', __('MWP Slider', 'Maxlian Lay'),
      array(
        'description' => __( 'Simple Wordpress plugin for creating a Slider with indicator' )
      ));
  }

	function get_slider(){
		$posts_args= array(
								'numberposts' => 1,
								'title' => 'website',
								'post_type' => 'mwp_slider',
	              'post_status' => 'publish',
								'orderby' => 'date',
								'order' => 'DESC'
								);
		$posts_list = get_posts($posts_args);


    $mobile_args= array(
    							'numberposts' => 1,
									'title' => 'mobile',
									'post_type' => 'mwp_slider',
									'post_status' => 'publish',
									'order' => 'DESC'
									);
    $mobile_posts = get_posts($mobile_args);
		?>

	  <div class="content">
	    <div id="slideshow">
	      <?php
	      	$post_meta = get_post_meta($posts_list[0]->ID, 'mwpSliderDetails', true);
	      	$mobile_meta = get_post_meta($mobile_posts[0]->ID, 'mwpSliderDetails', true);
	      ?>

	      <div class="slider hidden-xs">
			    <ul class="slides">
			    	<?php
			    		foreach ($post_meta as $key) {
			    		?>
								<li>
					        <img src="<?php echo $key['imageUrl'] ?>">
					        <div class="caption center-align mwp-center-caption">
					          <?php echo $key['sliderCaptionCenter']; ?>
					        </div>
					        <div class="caption center-align mwp-left-caption">
					          <?php echo $key['sliderCaptionLeft']; ?>
					        </div>
					        <div class="caption center-align mwp-right-caption">
					          <?php echo $key['sliderCaptionRight']; ?>
					        </div>
					      </li>
			    		<?php	
			    		}
			    	?>
			    </ul>
			  </div>

			  <div class="slider visible-xs-block">
			    <ul class="slides">
			    	<?php
			    		foreach ($mobile_meta as $key) {
			    		?>
								<li>
					        <img src="<?php echo $key['imageUrl'] ?>">
					        <div class="caption center-align mwp-center-caption">
					          <?php echo $key['sliderCaptionCenter']; ?>
					        </div>
					        <div class="caption center-align mwp-left-caption">
					          <?php echo $key['sliderCaptionLeft']; ?>
					        </div>
					        <div class="caption center-align mwp-right-caption">
					          <?php echo $key['sliderCaptionRight']; ?>
					        </div>
					      </li>
			    		<?php	
			    		}
			    	?>
			    </ul>
			  </div>
	    </div>
	  </div>

		<?php
	}

  /*
		 ____________________
		|
		| --- Create Widget interface for Backend
		|____________________
  */

	public function form( $instance ){
	}

	public function widget( $args, $instance ){
	}

} //Closing bracket for the class
new Mwp_Slider;

add_action( 'widgets_init', function(){
	register_widget( 'mwp_slider' );
});
