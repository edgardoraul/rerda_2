<?php
/**
 * Template Name: Nosotros
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<style>
    @media all and (min-width: 501px) {
  #cat-head {
    background: url(<?php the_field('imgdesktop'); ?>) no-repeat 0 0;
  }
}
@media all and (max-width: 500px) {
  #cat-head {
    background: url(<?php the_field('imgmobile'); ?>) no-repeat 0 0;
  }
}
</style>

<section id="cat-head">
    <div class="container">
        <div class="row">
            <div class="col-1 empty"></div>
            <div class="col-10">
                <?php if (is_tax()): ?>
                    <h1><?php single_term_title(); ?></h1>
                <?php else: ?>
                    <h1><?php echo get_the_title(); ?></h1>
                <?php endif; ?>
            </div>
            <div class="col-1 empty"></div>
        </div>
    </div>
</section>

<section id="main-nosotros" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-1 empty"></div>
            <div class="col-12 col-md-5 my-auto">
                <h3 class="mb-4"><?php the_field('titulo_1'); ?></h3>
                <div class="wysing"><?php the_field('parrafo_1'); ?></div>
            </div>
            <div class="col-1 empty"></div>
            <div class="col-12 col-md-4 my-auto">
                <?php echo wp_get_attachment_image( get_field('imagen_1'), "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="col-1 empty"></div>
        </div>
    </div>
</section>

<section id="main-nosotros" class="py-5 bg-ligth-gray">
    <div class="container">
        <div class="row">
            <div class="col-1 empty"></div>
            <div class="col-12 col-md-4 my-auto">
                <?php echo wp_get_attachment_image( get_field('imagen_2'), "", array( "class" => "img-responsive" ) );  ?>
            </div>
            <div class="col-1 empty"></div>
            <div class="col-12 col-md-5 mt-5 mt-md-auto">
            <h3 class="mb-4"><?php the_field('titulo_2'); ?></h3>
                <div class="wysing"><?php the_field('parrafo_2'); ?></div>
            </div>
            <div class="col-1 empty"></div>
        </div>
    </div>
</section>


<?php
get_footer();
