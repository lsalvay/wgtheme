<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php wp_head(); ?>

    <title><?php echo get_option( 'blogname' ); ?></title>
  </head>
  <body>
    <div class="top-bar py-2">
        <div class="row">
            <div class="col">
                <?php echo get_option( 'top_phone' ); ?>
            </div>
            <div class="col">
                <?php echo get_option( 'top_email' ); ?>
            </div>
            <div class="col">
                <a href="<?php echo get_option( 'top_facebook' ); ?>"><i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="col">
                <a href="<?php echo get_option( 'top_instagram' ); ?>"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="col">
                <a href="<?php echo get_option( 'top_youtube' ); ?>"><i class="fab fa-youtube"></i></a>
                
            </div>
            <div class="col">
                <a href="<?php echo get_option( 'top_linkedin' ); ?>"><i class="fab fa-linkedin-in"></i></a>
                
            </div>
        </div>
    
    </div>
        <div class="container-fluid bg-menu-nav py-2">
            <nav class="navbar navbar-expand-md navbar-dark" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#">Navbar</a>
                    <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'navbar-nav ml-auto',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                    ?>
                </div>
            </nav>
        </div>
    