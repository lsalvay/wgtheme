<?php

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function wgtheme_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'wgtheme' ),
		'expanded' => __( 'Desktop Expanded Menu', 'wgtheme' ),
		'mobile'   => __( 'Mobile Menu', 'wgtheme' ),
		'footer'   => __( 'Footer Menu', 'wgtheme' ),
		'social'   => __( 'Social Menu', 'wgtheme' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'wgtheme_menus' );


/**
 * Register scripts and styles
 */

function add_theme_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
   
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/includes/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all');
   
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/includes/popper/popper.min.js', array (), 1.1, true);
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/includes/bootstrap/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
   
      if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
      }
  }
  add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
  

// add class to <a> menu  bootstrap

add_filter('nav_menu_link_attributes', 'clase_menu_invento', 10, 3);

function clase_menu_invento ($atts, $item, $args) {
    $class = 'nav-link';
    $atts['class'] = $class;
    return $atts;
}


function customize_wgtheme ( $wp_customize ) {

  $wp_customize -> add_setting('wg_link_color', array(
    'default' => '#000',
    'transport' => 'refresh',
  ));

  $wp_customize -> add_section('wg_standard_colors', array(

    'title' => __('Standard Colors', 'wgtheme'),
    'priority' => 30,
  ));

  $wp_customize -> add_control(new WP_Customize_Color_Control( $wp_customize, 'wg_link_color_control', array(

    'label' => __('Link Color', 'wgtheme'),
    'section' => 'wg_standard_colors',
    'settings' => 'wg_link_color',

  )));
  

} 
add_action('customize_register', 'customize_wgtheme');

// Output Customize CSS
function wg_customize_css(){
  ?>
  <style type="text/css">
    .btn-primary {
      background-color: <?php echo get_theme_mod('wg_link_color'); ?>;
    }
  
  </style>
  <?php
}
add_action('wp_head', 'wg_customize_css');

?>

