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

add_action( 'widgets_init', function(){
	register_widget( 'mwp_slider' );
});
