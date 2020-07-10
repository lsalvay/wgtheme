<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php wp_head(); ?>

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container-fluid bg-dark">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                    <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top bg-light" alt="" loading="lazy">
                    Bootstrap
                </a>
                <?php 
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu (array (
                            'theme_location' => 'primary',
                            'container' => 'div',
                            'container_class' => 'colapse navbar-colapse',
                            'container_id' => 'navbarSupportedContent',
                            'items_wrap' => '<ul class="navbar-nav text-center">%3$s</ul>',
                            'menu_class' => 'nav-item'
                        )); 
                    }
                ?>
                
                </div>
            </nav>
      </div>
    