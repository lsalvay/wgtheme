<?php get_header(); ?>
    
<div class="container">
    <div class="contenido">
    <?php

        if ( have_posts() ) {
            if ( get_post_type( get_the_ID() ) == 'post' ) {
            ?>
                <div class="content-blog my-2">
                    <div class="row row-cols-1 row-cols-md-2">
            <?php  
                while ( have_posts() ) {
                    the_post();
                
                    get_template_part( 'template-parts/content', get_post_type() );
                }
            ?>
                    </div>
                </div>
            <?php    
            } // fin if post "en caso que sean tipo post se pintan en dos columnas y content-post.php"
            else{

                if ( get_post_type( get_the_ID() ) == 'page' ) {
                    while ( have_posts() ) {
                        the_post();
                    
                        get_template_part( 'template-parts/content', get_post_type() );
                    }
        
                } // fin if page "si es una página se carga content-page.php"
                else{
                    get_template_part( 'template-parts/content', get_post_type() );
                } //fin else page
                
            } // fin else post  
        } //fin have_post

    ?>
    </div>
</div>
<?php get_template_part( 'template-parts/footer-widgets' ); ?>
    
<?php get_footer(); ?>