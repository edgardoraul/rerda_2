<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
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

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

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

<section id="cart-body" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-12">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

</article><!-- #post-## -->
