<?php
/**
 * Template Name: Sucursales
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<section id="top-suc" class="no-head bg-light-gray">
    <div class="container-md">
        <div class="row">
            <div class="col-12 px-0">
                <button class="suc-btn open">Ver sucursales</button>
                <div class="menu-suc">
                <?php
                    if ( $post->post_parent ) {
                        $children = wp_list_pages( array(
                            'title_li' => '',
                            'child_of' => $post->post_parent,
                            'sort_column'  => 'menu_order',
                            'echo'     => 0
                        ) );
                    } else {
                        $children = wp_list_pages( array(
                            'title_li' => '',
                            'child_of' => $post->ID,
                            'sort_column'  => 'menu_order',
                            'echo'     => 0
                        ) );
                    }
                    
                    if ( $children ) : ?>
                        <ul class="menuer">
                            <?php echo $children; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</section>

<section id="main-suc" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-1 empty"></div>
            <div class="col-12 col-md-5">
                <h1><strong><?php the_title();?></strong><?php if (get_field('extra_nombre')) { echo ' <span>'.get_field('extra_nombre').'</span>'; } ?></h1>
                <ul class="i-list pt-3">
                    <?php if(get_field('direccion')): ?>
                        <li class="id-dir"><?php $path = get_template_directory_uri().'/images/i-home-gray.svg'; echo file_get_contents($path); ?><?php the_field('direccion'); ?></li>
                    <?php endif; ?>

                    <?php if(get_field('telefono')): ?>
                        <li class="id-tel"><?php $path = get_template_directory_uri().'/images/i-phone-gray.svg'; echo file_get_contents($path); ?><?php the_field('telefono'); ?></li>
                    <?php endif; ?>

                    <?php if(get_field('whatsapp')): ?>
                    <li class="id-what"><a href="https://wa.me/<?php
                            $string = get_field('whatsapp');
                            $string = str_replace(' ', '', $string);
                            $string = preg_replace('/\s+/', '', $string);
                            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
                            echo $string;                          
                            
                            ?>"><?php $path = get_template_directory_uri().'/images/i-what-gray.svg'; echo file_get_contents($path); ?><?php the_field('whatsapp'); ?></a></li>
                    <?php endif; ?>  

                    <?php if(get_field('email')): ?>
                        <li class="id-mail"><a href="mailto:<?php the_field('email'); ?>"><?php $path = get_template_directory_uri().'/images/i-mail-gray.svg'; echo file_get_contents($path); ?><?php the_field('email'); ?></a></li>
                    <?php endif; ?>    
                </ul>
            </div>
            <div class="col-1 empty"></div>
            <div class="col-12 col-md-4">
                <?php 
                $images = get_field('galeria');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if( $images ): ?>
                    <div class="swiper sl-sucursales">
                        <div class="swiper-wrapper">
                            <?php foreach( $images as $image_id ): ?>
                                <li class="swiper-slide">
                                    <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                                </li>
                            <?php endforeach; ?>
                        </div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-1 empty"></div>
        </div>
    </div>

</section>

<section id="suc-cont" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-1 empty"></div>
            <div class="col-12 col-md-10 col-move">
                <h3 class="mb-4">Contactános</h3>
                <?php echo do_shortcode('[contact-form-7 id="297" title="Sucursales"]'); ?>
            </div>
            <div class="col-1 empty"></div>
        </div>
    </div>
</section>


<section id="cont-map">
<?php the_field('embed_google_maps'); ?>
</section>




<?php
get_footer();
