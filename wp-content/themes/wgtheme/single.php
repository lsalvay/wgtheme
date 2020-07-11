<?php get_header(); ?>
    
<div class="container">
    <div class="contenido">
    <?php

        if ( have_posts() ) {
            
            while ( have_posts() ) {
                the_post();
            ?>
                <div class="content-page my-2">
                    <h2 class="title"><?php the_title(); ?></h2>
                    <p class="content">
                        <?php the_content(); ?>
                    </p>
            
                </div> 
            <?php        
            }  //fin while           
        } //fin have_post

    ?>
    </div>
</div>
<?php get_template_part( 'template-parts/footer-widgets' ); ?>
    
<?php get_footer(); ?>