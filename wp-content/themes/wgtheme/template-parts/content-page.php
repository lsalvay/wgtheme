<div class="content-page">
    <?php
        the_post_thumbnail( 'post-thumbnails', array( 'class' => 'page-img' ) );
    ?>
    <div class="container">
        <h2 class="title"><?php the_title(); ?></h2>
        <p class="content">
            <?php the_content(); ?>
        </p>
    </div>
    
</div>