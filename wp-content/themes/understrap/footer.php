<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-main-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row main-footer">
			<div class="col-12 col-md-3 pr-4 or-5">
				<div class="mb-4 fot-lo"><?php $path = get_template_directory_uri().'/images/logo-footer.svg'; echo file_get_contents($path); ?></div>
				<ul class="i-footer">
					<li class="i-dir"><?php $path = get_template_directory_uri().'/images/home-footer.svg'; echo file_get_contents($path); ?><?php the_field('direccion_principal', 'option'); ?></li>
					<li class="i-tel"><?php $path = get_template_directory_uri().'/images/phone-footer.svg'; echo file_get_contents($path); ?><a target="_blank" href="tel:<?php the_field('telefono', 'option'); ?>">
					<?php the_field('telefono', 'option'); ?></a></li>
					<?php 
						$ws = get_field('whatsapp', 'option');
						$wss = preg_replace("/[^A-Za-z0-9]/", "", $ws);
					?>
					<li class="i-what"><?php $path = get_template_directory_uri().'/images/ws-footer.svg'; echo file_get_contents($path); ?><a target="_blank" href="https://wa.me/<?php echo $wss; ?>">
					<?php the_field('whatsapp', 'option'); ?></a></li>
					<li class="i-mail"><?php $path = get_template_directory_uri().'/images/mail-footer.svg'; echo file_get_contents($path); ?><a target="_blank" href="mailto:<?php the_field('email_ventas', 'option'); ?>">
					<?php the_field('email_ventas', 'option'); ?></a></li>
				</ul>
			</div>

			<div class="col-6 col-md-2">
				<div class="fot-title"><a href="<?php echo esc_url( get_page_link( 107 ) ); ?>">Mi cuenta</a></div>
				<ul>
					<li>
					<li><a href="<?php echo esc_url( get_page_link( 107 ) ); ?>">Registrarme</a></li>
					<li><a href="<?php echo esc_url( get_page_link( 107 ) ); ?>">Mis pedidos</a></li>
					<li><a href="<?php echo esc_url( get_page_link( 107 ) ); ?>">Mis direcciones</a></li>
					<li><a href="<?php echo esc_url( get_page_link( 107 ) ); ?>">Mis datos personales</a></li>
				</ul>
				<div class="fot-title d-none d-md-flex"><a href="<?php echo esc_url( get_page_link( 65 ) ); ?>">Nosotros</a></div>
			</div>

			<div class="col-6 d-flex d-md-none">
				<div class="fot-title"><a href="<?php echo esc_url( get_page_link( 65 ) ); ?>">Nosotros</a></div>
			</div>



			<div class="col-6 col-md-2">
				<div class="fot-title"><a href="<?php echo esc_url( get_page_link( 104 ) ); ?>">Productos</a></div>
				<ul>
					<?php 
					$terms = get_field('categorias_footer', 'option');
					if( $terms ): ?>
						<?php foreach( $terms as $term ): ?>
							<li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term_name = get_term( $term )->name; ?></a></li> 
						<?php endforeach; ?>
						<li class="ofertas"><a href="/tienda/?swoof=1&onsales=salesonly&paged=1#with-side">Ofertas!</a></li>
					<?php endif; ?>
				</ul>
			</div>

			<div class="col-6 col-md-3">
				<div class="fot-title"><a href="<?php echo esc_url( get_page_link( 67 ) ); ?>">Sucursales</a></div>
					<?php
						$children = wp_list_pages( array(
							'title_li' => '',
							'child_of' => 67,
							'echo'     => 0
						) );

						
						if ( $children ) : ?>
							<ul class="menuer">
								<?php echo $children; ?>
							</ul>
						<?php endif; ?>
	
			</div>

			<div class="col-6 d-flex d-md-none">
				<div class="fot-title ofertas"><a href="/tienda/?swoof=1&onsales=salesonly&paged=1">Ofertas!</a></div>
			</div>

			<div class="col-6 d-flex d-md-none">
				<div class="rrss-mob">
					<a class="i-rrss d-flex d-md-none" target="_blank" href="<?php the_field('instagram', 'option'); ?>"><?php $path = get_template_directory_uri().'/images/instagram-footer.svg'; echo file_get_contents($path); ?></a>
					<a class="i-rrss d-flex d-md-none" target="_blank" href="<?php the_field('facebook', 'option'); ?>"><?php $path = get_template_directory_uri().'/images/facebook-footer.svg'; echo file_get_contents($path); ?></a>
				</div>	
			</div>

			<div class="col-12 col-md-2 or-6">
				<a class="afip" target="_blank" href="<?php the_field('link_afip', 'option'); ?>" alt="Data Fiscal">
					<?php $afip = get_field('afip', 'option'); echo wp_get_attachment_image( $afip, 'full' ); ?>
				</a>
				<a class="i-rrss d-none d-md-flex" target="_blank" href="<?php the_field('instagram', 'option'); ?>"><?php $path = get_template_directory_uri().'/images/instagram-footer.svg'; echo file_get_contents($path); ?>Instagram</a>
				<a class="i-rrss d-none d-md-flex" target="_blank" href="<?php the_field('facebook', 'option'); ?>"><?php $path = get_template_directory_uri().'/images/facebook-footer.svg'; echo file_get_contents($path); ?>Facebook</a>
			</div>

		</div>

	</div><!-- container end -->

</div><!-- wrapper end -->

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						© 2021 RERDA - Todos los derechos reservados // Surco Creative Agency

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<script>
	jQuery( document ).ajaxComplete( function() {
    if ( jQuery( 'body' ).hasClass( 'woocommerce-checkout' ) || jQuery( 'body' ).hasClass( 'woocommerce-cart' ) ) {
        jQuery( 'html, body' ).stop();
    }
} );

</body>

</html>

