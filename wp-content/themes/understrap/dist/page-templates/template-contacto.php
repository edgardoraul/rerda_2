<?php
/**
 * Template Name: Contacto
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
            <div class="col-12 col-md-10">
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

<section id="main-cont" class="pt-0 pt-md-5 bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-1 empty"></div>
            <div class="col-12 col-md-3 col-moves">
                <div class="d-none d-md-block"><?php $path = get_template_directory_uri().'/images/logo-full.svg'; echo file_get_contents($path); ?></div>
                <ul class="i-list pt-3">
                    <li class="id-dir"><?php $path = get_template_directory_uri().'/images/i-home-gray.svg'; echo file_get_contents($path); ?><?php the_field('direccion'); ?></li>
                    <li class="id-tel"><?php $path = get_template_directory_uri().'/images/i-phone-gray.svg'; echo file_get_contents($path); ?><?php the_field('telefono'); ?></li>
                    <li class="id-what"><a href="https://wa.me/<?php
                            $string = get_field('whatsapp');
                            $string = str_replace(' ', '', $string);
                            $string = preg_replace('/\s+/', '', $string);
                            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
                            echo $string;
                            
                            
                            ?>"><?php $path = get_template_directory_uri().'/images/i-what-gray.svg'; echo file_get_contents($path); ?><?php the_field('whatsapp'); ?></a></li>
                    <li class="id-mail"><a href="mailto:<?php the_field('email'); ?>"><?php $path = get_template_directory_uri().'/images/i-mail-gray.svg'; echo file_get_contents($path); ?><?php the_field('email'); ?></a></li>
                    <li class="sep"></li>
                    <li class="i-face">
                        <a href="https://www.facebook.com/<?php the_field('facebook'); ?>">
                            <?php $path = get_template_directory_uri().'/images/i-face-gray.svg'; echo file_get_contents($path); ?><?php the_field('facebook'); ?>
                        </a>
                    </li>
                    <li class="i-insta">
                        <a href="https://www.instagram.com/<?php the_field('instagram'); ?>">
                            <?php $path = get_template_directory_uri().'/images/i-insta-gray.svg'; echo file_get_contents($path); ?><?php the_field('instagram'); ?>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-2 empty"></div>
            <div class="col-12 col-md-5 col-move">
                <?php echo do_shortcode('[contact-form-7 id="282" title="Formulario de contacto"]'); ?>
            </div>
            <div class="col-1 empty"></div>
        </div>
    </div>
</section>

<section id="cont-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5589134.405141534!2d-64.88844112208119!3d-34.928075157610074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1624857000458!5m2!1ses!2sar"
    width="100%" height="490" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>




<?php
get_footer();
