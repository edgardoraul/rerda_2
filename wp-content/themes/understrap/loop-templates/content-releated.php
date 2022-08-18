<?php
/**
 * Partial template for content products ofertas
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


    <?php 
    // WP_Query arguments

    global $post;

    // get categories
    $terms = wp_get_post_terms( $post->ID, 'product_cat' );
    foreach ( $terms as $term ) $cats_array[] = $term->term_id;

    $args = array(
        'post__not_in' => array( $post->ID ),
        'posts_per_page' => 10,
        'no_found_rows' => 1,
        'post_status' => 'publish',
        'post_type' => 'product',
        'tax_query' => array( 
        array(
          'taxonomy' => 'product_cat',
          'field' => 'id',
          'terms' => $cats_array
        )));
    
    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ): ?>

<section id="home-ofertas" class="py-6 yb bg-ligth-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Productos <b>Relacionados</b></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-0">
                
                <!-- Slider main container -->
                <div class="swiper sl-releated">

                <div class="swiper-nav">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                <!-- Slides -->



    <?php while ( $query->have_posts() ):
        $query->the_post();
        
        $product = wc_get_product( $query->post->ID );
    ?>


    <div class="swiper-slide">
        <div class="product-loop">
            <a href="<?php echo get_the_permalink(); ?>" alt="">
                <div class="product-image">
                
                <?php
         
                    $colores = get_the_terms( $product->get_id(), 'pa_color' );
                    $talles = get_the_terms( $product->get_id(), 'pa_talle' );

                    if ($colores) {
                    echo '<div class="pa_colores">';   
                    foreach ($colores as $color) {
                        $ids = get_term_meta($color->term_id);
                        // echo '<span style="background-color:'.$ids['product_attribute_color'][0].'"></span>';
                    }
                    echo '</div>';
                    }

                    if ($talles) {
                    echo '<div class="pa_talles">';     
                    foreach ($talles as $talle) {
                        echo '<span>'.$talle->name.'</span>';
                        }
                    echo '</div>';
                    }

                    if($product->is_type( 'variable' ) && $product->is_on_sale()) {

                        echo '<span class="p-oferta p-sale">OFERTA</span>';

                    }

                    elseif ($product->is_type( 'simple' ) && $product->is_on_sale()) {

                        $precio = get_post_meta( get_the_ID(), '_regular_price', true );
                        $sale = get_post_meta( get_the_ID(), '_sale_price', true );

                        $descuento = ($sale * 100) / $precio;

                        echo '<span class="p-oferta">- '.ceil($descuento).'%</span>';
                    } 

                    ?>
                    <div class="product-images">
                        <div class="p-image">
                            <img src="<?php echo get_the_post_thumbnail_url($product->post->ID); ?>" class="img-responsive" alt=""/>
                        </div>
                        <?php

                        $attachment_ids = $product->get_gallery_image_ids();

                        if($attachment_ids): ?>

                            <div class="p-hover">
                                <?php echo wp_get_attachment_image($attachment_ids[0], 'full'); ?>
                            </div>

                        <?php endif; ?>
                    </div>



                </div>
                <div class="product-meta">
                    <h3><?php echo get_the_title(); ?></h3>
                    <?php
                        echo $product->get_price_html();
                        $sku = $product->get_sku();
                        echo "<br /><small>Código:&nbsp; " . substr($sku, 0, -2) . "</small>";
                    ?>
                </div>
            </a>
        </div>
    </div>

    <?php endwhile; ?>
    
        </div>
            </div>
        </div>
    </section>
       
    
    <?php endif;
    
    wp_reset_postdata(); ?>
  </div>


</div>

