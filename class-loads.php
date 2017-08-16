<?php
	/*
		 ____________________
		|
		| --- This class is used to load necessary data. (Eg: Categories, Sub-categories, etc..)
		|____________________
  */
	class Loads{

	  function __construct(){
	  	add_action( 'admin_enqueue_scripts', array( $this, 'mwp_load_scripts' ) );
	  	add_action('init', array($this, 'mwp_register_custom_post_type'));
	  }

	  public function mwp_load_scripts(){
	  	if ( is_active_widget( false, false, 'mwp_slider_', true ) ) {
		  	// wp_register_script('mwp_scripts', plugin_dir_url(__FILE__).'includes/js/product-banner.js', $deps = array(), $ver = false, $in_footer = true);
		    wp_enqueue_script('mwp_scripts');
		    wp_register_style( 'materialize_css', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css');
				wp_enqueue_style( 'materialize_css' );
				wp_register_script('materialize_scripts', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js', $deps = array(), $ver = false, $in_footer = true);
		    wp_enqueue_script('materialize_scripts');
	  	}
	  }

	  public function mwp_register_custom_post_type(){
	  	$labels = array(
			"name" => "MWP Slider",
			"singular_name" => "MWP Slider",
			);

			$args = array(
				"labels" => $labels,
				"description" => "",
				"public" => true,
				"show_ui" => true,
				"has_archive" => false,
				"show_in_menu" => true,
				"exclude_from_search" => false,
				"capability_type" => "post",
				'supports' => array('title'),
				"map_meta_cap" => true,
				"hierarchical" => false,
				"rewrite" => array( "slug" => "mwp_slider", "with_front" => true ),
				"query_var" => true,
			);
			register_post_type( "mwp_slider", $args );
	  }
	  
	}
	new Loads;
