<?php
/**
 * Template Name: Shop
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
    background: url(<?php the_field('imgdesktop', 104); ?>) no-repeat 0 0;
  }
}
@media all and (max-width: 500px) {
  #cat-head {
    background: url(<?php the_field('imgmobile', 104); ?>) no-repeat 0 0;
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
                    <h1><?php echo get_the_title( get_option( 'woocommerce_shop_page_id' ) ); ?></h1>
                <?php endif; ?>
            </div>
            <div class="col-1 empty"></div>
        </div>
    </div>
</section>

<section id="with-side" class="py-3 py-md-8">

    <div class="container">
        <div class="row">

            <button class="filter closed">Filtros</button>
            <div class="col-md-2 col-12 sidebar closed">
                <aside id="cat-side">
                <?php echo do_shortcode('[woof_text_filter placeholder="Buscar productos..."]'); ?>
                    <?php
                        if (is_tax()) {
                            $tax_id = get_queried_object()->term_id;
                            echo do_shortcode('[woof taxonomies=product_cat:'.$tax_id.' is_ajax=1]');
                        }
                        else {
                            echo do_shortcode('[woof is_ajax=1]');
                        }
                        ?>
                </aside>
            </div>

            <div class="col-md-10 col-12">

            <?php
            if (is_tax()) {
                $tax_id = get_queried_object()->term_id;
                echo do_shortcode('[woof_products taxonomies=product_cat:'.$tax_id.' is_ajax=1]');
            }
            else {
                echo do_shortcode('[woof_products is_ajax=1]');
            }
            ?>

            </div>

        </div>
    </div>
</section>


<section id="home-ofertas" class="py-6 yb bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Nuestras <b>Ofertas</b></h2>
                <p class="d-none d-md-block">Encontrá tus productos preferidos a precios increíbles.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php get_template_part( 'loop-templates/content', 'ofertas' ); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
