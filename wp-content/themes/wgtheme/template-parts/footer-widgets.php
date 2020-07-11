<?php

$has_footer_1 = is_active_sidebar( 'footer1' );
$has_footer_2 = is_active_sidebar( 'footer2' );
$has_footer_3 = is_active_sidebar( 'footer3' );
$has_footer_4 = is_active_sidebar( 'footer4' );

if ( $has_footer_1 || $has_footer_2 || $has_footer_3 || $has_footer_4 ) { ?>

<aside class="footer-widgets mt-4 py-4">
<div class="container">
    <div class="row">

        <?php if ( $has_footer_1 ) { ?>

            <div class="col widget-col-1 text-center">
                <?php dynamic_sidebar( 'footer1' ); ?>
            </div>

        <?php } ?>

        <?php if ( $has_footer_2 ) { ?>

            <div class="col widget-col-2 text-center">
                <?php dynamic_sidebar( 'footer2' ); ?>
            </div>

        <?php } ?>

        <?php if ( $has_footer_3 ) { ?>

            <div class="col widget-col-3 text-center">
                <?php dynamic_sidebar( 'footer3' ); ?>
            </div>

        <?php } ?>

        <?php if ( $has_footer_4 ) { ?>

            <div class="col widget-col-4 text-center">
                <?php dynamic_sidebar( 'footer4' ); ?>
            </div>

        <?php } ?>


    </div><!-- .row -->
        </div>
</aside><!-- .footer-widgets-->

<?php } ?>

