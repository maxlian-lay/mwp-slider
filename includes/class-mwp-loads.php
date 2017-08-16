<?php
	/*
		 ____________________
		|
		| --- This class is used to load necessary data. (Eg: Categories, Sub-categories, etc..)
		|____________________
  */
	class Mwp_Loads{

	  function __construct(){
	  	add_action( 'admin_enqueue_scripts', array( $this, 'mwp_load_admin_scripts' ) );
	  	add_action( 'wp_enqueue_scripts', array( $this, 'mwp_load_scripts' ) );
	  	add_action('init', array($this, 'mwp_register_custom_post_type'));
	  	// add_action( 'add_meta_boxes', array($this, 'mwp_add_metaboxes') );
	  }

	  public function mwp_load_admin_scripts($hook_suffix){
	  	$cpt = 'mwp_slider';

	    if( in_array($hook_suffix, array('post.php', 'post-new.php') ) ){
        $screen = get_current_screen();
        if( is_object( $screen ) && $cpt == $screen->post_type ){
			    wp_register_style('font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
		    	wp_enqueue_style( 'font_awesome' );
		    	wp_register_style( 'mwp_admin_css', plugin_dir_url(__FILE__).'mwp-css/mwp-admin-style.css');
					wp_enqueue_style( 'mwp_admin_css' );

					wp_register_script('mwp_admin_scripts', plugin_dir_url(__FILE__).'mwp-js/mwp-admin.js', $deps = array(), $ver = false, $in_footer = true);
    			wp_enqueue_script('mwp_admin_scripts');

					wp_enqueue_script('media-upload');
    			wp_enqueue_script('thickbox');
    			wp_enqueue_script('my-upload');
    			wp_enqueue_style('thickbox');
        }
	    }
	  }

	  public function mwp_load_scripts(){
	  	wp_register_style( 'mwp_css', plugin_dir_url(__FILE__).'mwp-css/mwp-style.css');
					wp_enqueue_style( 'mwp_css' );
	  	wp_register_script('jQuery_js', 'https://code.jquery.com/jquery-2.2.4.min.js', $deps = array(), $ver = false, $in_footer = true);
      wp_enqueue_script('jQuery_js');
			wp_register_script('mwp_scripts', plugin_dir_url(__FILE__).'mwp-js/mwp-slider.js', $deps = array(), $ver = false, $in_footer = true);
    	wp_enqueue_script('mwp_scripts');
      wp_register_style( 'materialize_css', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css');
			wp_enqueue_style( 'materialize_css' );
			wp_register_script('materialize_scripts', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js', $deps = array(), $ver = false, $in_footer = true);
	    wp_enqueue_script('materialize_scripts');
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
	new Mwp_Loads;
