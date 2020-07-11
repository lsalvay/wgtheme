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
 * Register Custom Navigation Walker
 */
function register_navwalker(){

  if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
  } else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
  }
}
add_action( 'after_setup_theme', 'register_navwalker' );


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
  


// Add custom options

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
    .content-blog a:link {
      color: <?php echo get_theme_mod('wg_link_color'); ?>;
    }
  
  </style>
  <?php
}
add_action('wp_head', 'wg_customize_css');


// Add Our Widget Locations

add_action( 'widgets_init', 'wg_register_sidebars' );
function wg_register_sidebars() {
  
  register_sidebar(
        array(
            'id'            => 'blog',
            'name'          => __( 'Blog Sidebar' ),
            'description'   => __( 'Este Sidebar aparece en la pagina de blog.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
  );

  register_sidebar(
      array(
          'id'            => 'footer1',
          'name'          => __( 'Footer 1' ),
          'description'   => __( 'Este Sidebar aparece en la primera posicion del footer.' ),
          'before_widget' => '<div id="%1$s" class="widget %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="widget-title">',
          'after_title'   => '</h3>',
      )
  );
    
  register_sidebar(
      array(
          'id'            => 'footer2',
          'name'          => __( 'Footer 2' ),
          'description'   => __( 'Este Sidebar aparece en la segunda posicion del footer.' ),
          'before_widget' => '<div id="%1$s" class="widget %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="widget-title">',
          'after_title'   => '</h3>',
      )
  );
    
  register_sidebar(
      array(
          'id'            => 'footer3',
          'name'          => __( 'Footer 3' ),
          'description'   => __( 'Este Sidebar aparece en la tercera posicion del footer.' ),
          'before_widget' => '<div id="%1$s" class="widget %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="widget-title">',
          'after_title'   => '</h3>',
      )
  );

  register_sidebar(
      array(
          'id'            => 'footer4',
          'name'          => __( 'Footer 4' ),
          'description'   => __( 'Este Sidebar aparece en la cuarta posicion del footer.' ),
          'before_widget' => '<div id="%1$s" class="widget %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="widget-title">',
          'after_title'   => '</h3>',
      )
  );

}

// Add image thumbnail

if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );

  // additional image sizes
  add_image_size( 'post-thumb', 538, 250, true ); // 300 pixels wide (and unlimited height)
}


//--------------theme options ----------------

add_action("admin_menu", "wgtheme_options");

function wgtheme_options(){
  add_menu_page(
    "theme-options",    // page title
    "WG Options",    // Menu title
    "manage_options",   // capability
    "theme-options",    // menu slug
    "wgtheme_options_show", // callback function
    "dashicons-sticky"  // icon
  );
}

//this function show the options
function wgtheme_options_show(){
  ?>
    <div>
      <form action="options.php" method="post">
         <?php
          settings_fields("section");
          do_settings_sections("theme-options");
          submit_button();
         ?>
      </form>
    </div>  
  <?php
}

function wgtheme_options_setting() {

  //Step 1
  add_settings_section(
    "section",  // id of settings
    "Primera Sección", // title
    null,         // callback function
    "theme-options", // page
  );

  //Step 2
  add_settings_field(
    "creator_name",         //id
    "Nombre de Creador",    //title
    "display_creator_name", //callback
    "theme-options",        //page
    "section"               //section
  );

  add_settings_field(
    "creator_url",         //id
    "URL de Creador",    //title
    "display_creator_url", //callback
    "theme-options",        //page
    "section"               //section
  );

  add_settings_field(
    "creator_phone",         //id
    "Teléfono de Creador",    //title
    "display_creator_phone", //callback
    "theme-options",        //page
    "section"               //section
  );

  //Step 3
  register_setting("section", "creator_name");
  register_setting("section", "creator_url");
  register_setting("section", "creator_phone");

}

add_action("admin_init", "wgtheme_options_setting");

function display_creator_name() {
  ?>
    <input type="text" name="creator_name" value="<?php echo get_option('creator_name'); ?>" id="creator_name" />
  <?php
}

function display_creator_url() {
  ?>
    <input type="text" name="creator_url" value="<?php echo get_option('creator_url'); ?>" id="creator_name" />
  <?php
}

function display_creator_phone() {
  ?>
    <input type="text" name="creator_phone" value="<?php echo get_option('creator_phone'); ?>" id="creator_name" />
  <?php
}


?>

