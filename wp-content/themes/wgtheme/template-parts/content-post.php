
        <a href="<?php the_permalink(); ?>">
            <div class="col mb-4">
                <div class="card">
                <?php
                    the_post_thumbnail('post-thumb', array( 'class' => 'text-center' ) );
                ?>
                <div class="card-body">
                    <h5 class="card-title"> <?php the_title(); ?></h5>
                    <p class="card-text"><?php the_content(); ?></p>
                </div>
                </div>
            </div>
        </a>
