<?php
/**
 * Template Name: FAQ
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

<section id="main-faq" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 mx-auto">

            <?php if( have_rows('seccion_cont') ): ?>
					<?php $faq = 1; while( have_rows('seccion_cont') ): the_row(); ?>

						<?php if( get_row_layout() == 'seccion_faq' ):
							$titulo = get_sub_field('titulo');
							$pregunta = get_sub_field('pregunta'); ?>

                            <h3 class="mb-4"><?php echo $titulo; ?></h3>

                            <div id="accordion-<?php echo $faq;?>" class="mb-6">

                            <?php
                            // check if the nested repeater field has rows of data
                            if( have_rows('pregunta') ):

                                // loop through the rows of data
                                $count = 1;
                                while ( have_rows('pregunta') ) : the_row();

                                    $pregunta = get_sub_field('pregunta');
                                    $respuesta = get_sub_field('respuesta');

                                    ?>

                                    <div class="card">
                                        <div class="card-header" id="heading<?php echo $count; ?>">
                                        
                                            <button class="collapsed" data-toggle="collapse" data-target="#collapse<?php echo $faq;?>-<?php echo $count; ?>" aria-expanded="false" aria-controls="collapse<?php echo $faq;?>-<?php echo $count; ?>">
                                            <?php echo $count; ?>. <?php echo $pregunta; ?>
                                            <div class="faq-arrow"><?php $path = get_template_directory_uri().'/images/faq-arrow.svg'; echo file_get_contents($path); ?></div>
                                            </button>
                                        </div>

                                        <div id="collapse<?php echo $faq;?>-<?php echo $count; ?>" class="collapse closer" aria-labelledby="heading<?php echo $faq;?>-<?php echo $count; ?>" data-parent="#accordion-<?php echo $faq;?>">
                                        <div class="card-body">
                                                <?php echo $respuesta; ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php $count++; endwhile;

                            endif; ?>

                            </div>


						<?php endif; ?>
					<?php $faq++; endwhile; ?>
				<?php endif; ?>

            </div>
        </div>
    </div>
</section>




<?php
get_footer();
