<?php
/**
 * Partial template for content categorías
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- Slider main container -->
<div class="swiper sl-categorias">

        <div class="swiper-nav">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

  <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->

        <?php 
        $cat_home = get_field('cat_home');
        $terms = $cat_home["cats_list"];
        if( $terms ): ?>

            <?php foreach( $terms as $term ): ?>

                <div class="swiper-slide">
                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"> 
                        <div class="image-cat">
                            
                                <?php
                                    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                                    $image = wp_get_attachment_url( $thumbnail_id );
                                    echo '<img src="'.$image.'">';
                                ?>
                                <h4><?php echo esc_html( $term->name ); ?></h4>
                        </div>
                    </a>   
                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>


</div>

