<?php
/**
 * Template Name: Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>


<?php
$slider = get_field('slider');
if( $slider ): ?>

<section id="home-slider" class="d-none d-md-flex align-items-center">
    <?php

        if( have_rows('slider') ): ?>

        <div class="swiper sl-homemain">
            <div class="swiper-wrapper">

                <?php 
                while( have_rows('slider') ) : the_row();

                    $titulo = get_sub_field('titulo');
                    $descripcion = get_sub_field('descripcion');
                    $descripcion_corta = get_sub_field('descripcion_corta');
                    $texto_boton = get_sub_field('texto_boton');
                    $link = get_sub_field('link');
                    $escritorio = get_sub_field('imagen_fondo_escritorio'); ?>

                    <div class="sli-home swiper-slide d-none d-md-flex" style="background-image: url(<?php echo $escritorio; ?>)">
                        <div class="container">
                            <div class="row">
                                <div class="col-7 white">
                                    <h1 class="primary"><?php echo $titulo; ?></h1>
                                    <p class="d-none d-md-block"><?php echo $descripcion; ?></p>
                                    <ul class="d-none d-md-block">
                                        <li><?php echo $descripcion_corta; ?></li>
                                    </ul>
                                    <a href="<?php echo $link; ?>" class="main-cta mt-5"><?php echo $texto_boton; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
            
            <div class="swiper-pagination"></div>

            <?php endif; ?>
        </div>


</section>

<section id="home-slider" class="d-flex d-md-none align-items-center">
    <?php

        // Check rows exists.
        if( have_rows('slider') ): ?>

        <div class="swiper sl-homemain">
            <div class="swiper-wrapper">

                <?php 
                while( have_rows('slider') ) : the_row();

                    $titulo = get_sub_field('titulo');
                    $texto_boton = get_sub_field('texto_boton');
                    $link = get_sub_field('link');
                    $mobile = get_sub_field('imagen_fondo_mobile');
                     ?>

                    <div class="sli-home swiper-slide d-flex d-md-none" style="background-image: url(<?php echo $mobile; ?>)">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 white">
                                    <h1 class="primary"><?php echo $titulo; ?></h1>
                                    <a href="<?php echo $link; ?>" class="main-cta mt-5"><?php echo $texto_boton; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
            
            <div class="swiper-pagination"></div>

            <?php endif; ?>
        </div>


</section>


<?php endif; ?>

<section id="home-ofertas" class="py-6 yb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Nuestras <b>Ofertas</b></h2>
                <p class="d-none d-md-block">Encontrá tus productos preferidos a precios increíbles.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-0 px-md-auto">
                <?php get_template_part( 'loop-templates/content', 'ofertas' ); ?>
            </div>
        </div>
    </div>
</section>


<?php
$cat_home = get_field('cat_home');
if( $cat_home ): ?>

<section id="home-categorias" class="py-5 yb">
    <div class="container">
        <div class="row">
            <div class="col-12 pb-4">
                <h2><?php echo $cat_home["titulo"]; ?></h2>
                <p class="d-none d-md-block"><?php echo $cat_home["bajada"]; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                 <?php get_template_part( 'loop-templates/content', 'categorias' ); ?>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>


<section id="home-destacados" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 pb-4">
                <h2>Productos Destacados</h2>
                <p class="d-none d-md-block">Una selección de los mejores productos para vos</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php get_template_part( 'loop-templates/content', 'destacados' ); ?>
            </div>
        </div>
    </div>
</section>

<section id="home-redes" class="py-3 py-md-5">
    <div class="container">
        <div class="row pb-4">
            <div class="col col-12 col-md-11">
                <h2>Nuestras Redes</h2>
                <p>Seguinos y enterate primero de las últimas novedades.</p>
            </div>
            <div class="col col-12 col-md-1">
                <div class="rrss-icons">
                    <a href="https://www.facebook.com/RerdaMendoza" target="_blank"><?php $path = get_template_directory_uri().'/images/facebook.svg'; echo file_get_contents($path); ?></a>
                    <a href="https://www.instagram.com/rerda.uniformes/" target="_blank"><?php $path = get_template_directory_uri().'/images/instagram.svg'; echo file_get_contents($path); ?></a>
                </div>
            </div>
        </div>
        <div class="row d-none d-md-block">
            <div class="col-12">
                <ul class="d-flex justify-content-between">
                    <li>
                        <div class="sli-cont">
                            <img src="https://picsum.photos/374/417?random=1" alt="">
                        </div>
                    </li>

                    <li>
                        <div class="sli-cont">
                            <img src="https://picsum.photos/374/417?random=2" alt="">
                        </div>
                    </li>

                    <li>
                        <div class="sli-cont">
                            <img src="https://picsum.photos/374/417?random=3" alt="">
                        </div>
                    </li>
                </ul>    
                
            </div>
        </div>
    </div>
</section>



<?php
get_footer();
