<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Opciones Admin',
		'menu_title'	=> 'Opciones Admin',
		'menu_slug' 	=> 'opciones-admin',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Opciones Footer',
		'menu_slug' 	=> 'opciones-footer',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Info General',
		'menu_title'	=> 'Info General',
		'menu_slug' 	=> 'info-general',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Noticias header',
		'menu_title'	=> 'Noticias header',
		'menu_slug' 	=> 'noticias-header',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

if ( ! function_exists( 'custom_theme_options' ) ) {
	function custom_theme_options() {


		if (!empty( get_field('main_font', 'option') ) ) {
			$value = get_field('main_font', 'option');
			echo '<link href="https://fonts.googleapis.com/css2?family='.$value.':wght@300;400;500;600;700&display=swap" rel="stylesheet">';
		}

		echo "<style type=\"text/css\">\r\n";

			if (!empty( get_field('main_font', 'option') ) ) {
				$value = get_field('main_font', 'option');
				echo "a, body, button, div, h1, h2, h3, h4, h5, h6, html, input, label, p, span { font-family: '".$value."', sans-serif; }\r\n";
			}

			if (!empty( get_field('color_de_menu', 'option') ) ) {
				$value = get_field('color_de_menu', 'option');
				echo "#main-nav { background-color: " . $value . "!important; }\r\n";
			}

			if (!empty( get_field('menu_burger_icon', 'option') ) ) {
				$value = get_field('menu_burger_icon', 'option');
				echo ".navbar-toggler-custom-icon:after, .navbar-toggler-custom-icon:before { background-color: " . $value . "!important; }\r\n";
			}

			if (!empty( get_field('menu_burger_background', 'option') ) ) {
				$value = get_field('menu_burger_background', 'option');
				echo ".navbar-collapse { background-color: " . $value . "!important; }\r\n";
			}

			if (!empty( get_field('texto_color', 'option') ) ) {
				$value = get_field('texto_color', 'option');
				echo "body { color: " . $value . "; }\r\n";
			}

			if (!empty( get_field('menu_font_color', 'option') ) ) {
				$value = get_field('menu_font_color', 'option');
				echo ".navbar-dark .navbar-nav .nav-link { color: " . $value . "; }\r\n";
			}

			if (!empty( get_field('footer_background_color', 'option') ) ) {
				$value = get_field('footer_background_color', 'option');
				echo "#wrapper-main-footer { background-color: " . $value . "; }\r\n";
			}

			if (!empty( get_field('footer_text_color', 'option') ) ) {
				$value = get_field('footer_text_color', 'option');
				echo "#wrapper-main-footer p, #wrapper-main-footer a, #wrapper-main-footer span, #wrapper-main-footer  { color: " . $value . "; }\r\n";
			}

			if (!empty( get_field('copyright_background_color', 'option') ) ) {
				$value = get_field('copyright_background_color', 'option');
				echo "#wrapper-footer { background-color: " . $value . "; }\r\n";
			}

			if (!empty( get_field('copyright_text_color', 'option') ) ) {
				$value = get_field('copyright_text_color', 'option');
				echo "#wrapper-footer p, #wrapper-footer a, #wrapper-footer span, #wrapper-footer  { color: " . $value . "; }\r\n";
			}

			if (!empty( get_field('primary_color', 'option') ) ) {
				$value = get_field('primary_color', 'option');
				echo "a { color: " . $value . "; }\r\n";
				echo "*[class*='primary'] { color: " . $value . "; border-color: " . $value . "; }\r\n";
				echo ".nav-link:hover { color: " . $value . "!important; }\r\n";
				echo ".active .nav-link { color: " . $value . "!important; }\r\n";
				echo "#wrapper-main-footer a:hover  { color: " . $value . "!important; }\r\n";
				echo "#wrapper-footer a:hover  { color: " . $value . "!important; }\r\n";
			}

			if (!empty( get_field('secondary_color', 'option') ) ) {
				$value = get_field('secondary_color', 'option');
				echo "a { color: " . $value . "; }\r\n";
				echo "*[class*='secondary'] { color: " . $value . "; border-color: " . $value . "; }\r\n";
			}

			if (!empty( get_field('default_font_size', 'option') ) ) {
				$value = get_field('default_font_size', 'option');
				echo "body { font-size: " . $value . "px; }\r\n";
			}

			if (!empty( get_field('default_h1', 'option') ) ) {
				$value = get_field('default_h1', 'option');
				echo "h1, .h1 { font-size: " . $value . "px; line-height:" . ($value + 10) . "px; }\r\n";
			}

			if (!empty( get_field('default_h2', 'option') ) ) {
				$value = get_field('default_h2', 'option');
				echo "h2, .h2 { font-size: " . $value . "px; line-height:" . ($value + 10) . "px; }\r\n";
			}

			if (!empty( get_field('default_h3', 'option') ) ) {
				$value = get_field('default_h3', 'option');
				echo "h3, .h3 { font-size: " . $value . "px; line-height:" . ($value + 10) . "px; }\r\n";
			}

			if (!empty( get_field('default_h4', 'option') ) ) {
				$value = get_field('default_h4', 'option');
				echo "h4, .h4 { font-size: " . $value . "px; line-height:" . ($value + 10) . "px; }\r\n";
			}

			if (!empty( get_field('default_h5', 'option') ) ) {
				$value = get_field('default_h5', 'option');
				echo "h5, .h5 { font-size: " . $value . "px; line-height:" . ($value + 10) . "px; }\r\n";
			}

			if (!empty( get_field('default_h6', 'option') ) ) {
				$value = get_field('default_h6', 'option');
				echo "h6, .h6 { font-size: " . $value . "px; line-height:" . ($value + 10) . "px; }\r\n";
			}


		echo "</style>\r\n";


		
	}
}

add_action( 'wp_head', 'custom_theme_options'); 


add_theme_support( 'woocommerce', array(
	'thumbnail_image_width' => 273,
	'gallery_thumbnail_image_width' => 100,
	'single_image_width' => 500,
	) );


add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
	
	register_nav_menu( 'cart', __( 'Cart Menu', 'understrap' ) );

}	


/* MODIFICAR THUMBNAIL EN ARCHIVE PRODUCT */

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
 
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10 );
function custom_loop_product_thumbnail() {
    global $product;
	$id = $product->get_id();

	$product_image = '<div class="product-image">';

  	$colores = get_the_terms( $id, 'pa_color' );
	$talles = get_the_terms( $id, 'pa_talle' );

	if ($colores) {
		$product_image .= '<div class="pa_colores">';   
		foreach ($colores as $color) {
			$ids = get_term_meta($color->term_id);
			$product_image .= '<span style="background-color:'.$ids['product_attribute_color'][0].'"></span>';
		}
		$product_image .= '</div>';
		}

		if ($talles) {
			$product_image .= '<div class="pa_talles">';     
		foreach ($talles as $talle) {
			$product_image .= '<span>'.$talle->name.'</span>';
			}
			$product_image .= '</div>';
		}

		if($product->is_type( 'variable' ) && $product->is_on_sale()) {

			$product_image .= '<span class="p-oferta p-sale">OFERTA</span>';

		}

		elseif ($product->is_type( 'simple' ) && $product->is_on_sale()) {

			$precio = get_post_meta( $id, '_regular_price', true );
			$sale = get_post_meta( $id, '_sale_price', true );

			$descuento = ($sale * 100) / $precio;

			$product_image .= '<span class="p-oferta">- '.ceil($descuento).'%</span>';
		} 

		$product_image .= '<div class="product-images">';
		$product_image .= '<div class="p-image">';
		$product_image .= '<img src="'.get_the_post_thumbnail_url($product->get_id).'" class="img-responsive" alt=""/></div>';

		$attachment_ids = $product->get_gallery_image_ids();

			if($attachment_ids):

			$product_image .= '<div class="p-hover">'.wp_get_attachment_image($attachment_ids[0], 'full').'</div>';

			endif;
			$product_image .= '</div></div>';

			echo $product_image;
}

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 4,
        ),
    ) );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = ' &ndash; ';
	return $defaults;
}



// add core markup to woocommerce pages
add_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');

// overwrite existing output content wrapper function
function woocommerce_output_content_wrapper() {
	echo '<div class="main-bg no-top-banner">
			<div class="container-fluid">
				<div id="content" class="row justify-content-center" >
					<div id="main" class="col-md-10 clearfix" >';
}

add_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');

function woocommerce_output_content_wrapper_end() {
		echo '</div><!-- Close Main -->
			</div><!-- Close Row -->
		</div><!-- Close Container -->
	</div><!-- Close Main-BG -->';
}


// Remove productos relacionados 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_filter( 'woocommerce_get_breadcrumb', function($crumbs, $Breadcrumb){
	$shop_page_id = wc_get_page_id('shop'); //Get the shop page ID
	if($shop_page_id > 0 && !is_shop()) { //Check we got an ID (shop page is set). Added check for is_shop to prevent Home / Shop / Shop as suggested in comments
		$new_breadcrumb = [
			_x( 'Productos', 'breadcrumb', 'woocommerce' ), //Title
			get_permalink(wc_get_page_id('shop')) // URL
		];
		array_splice($crumbs, 1, 0, [$new_breadcrumb]); //Insert a new breadcrumb after the 'Home' crumb
	}
	return $crumbs;
}, 10, 2 );


add_action('woocommerce_share', 'woocommerce_share_rerda');

function woocommerce_share_rerda() {
		echo do_shortcode('[Sassy_Social_Share][print-me target="#woocommerce-wrapper"]');
}

add_filter('ai1wm_exclude_content_from_export', function($exclude_filters) {

	$exclude_filters[] = 'themes\understrap\node_modules';
  
	return $exclude_filters;
  
  });




/**
 * Adds notice at single product page above add to cart
 */
 
add_action( 'woocommerce_single_product_summary', 'bbloomer_show_return_policy', 20 );
 
function bbloomer_show_return_policy() {
	$prod_id = get_the_ID();
	$jerarquia = get_post_meta($prod_id,'rd_jerarquia',true);
	$rd_material = get_post_meta($prod_id,'rd_material',true);
	$rd_modelo = get_post_meta($prod_id,'rd_modelo',true);
	$rd_altura = get_post_meta($prod_id,'rd_altura',true);
	$rd_ancho = get_post_meta($prod_id,'rd_ancho',true);
	$rd_espesor = get_post_meta($prod_id,'rd_espesor',true);
	$rd_peso = get_post_meta($prod_id,'rd_peso',true);
	$rd_longitud_extendido = get_post_meta($prod_id,'rd_longitud_extendido',true);
	$rd_longitud_plegado = get_post_meta($prod_id,'rd_longitud_plegado',true);
	$rd_voltage_entrada = get_post_meta($prod_id,'rd_voltage_entrada',true);
	$rd_voltage_salida = get_post_meta($prod_id,'rd_voltage_salida',true);
	$rd_tipo_cuello = get_post_meta($prod_id,'rd_tipo_cuello',true);
	$rd_medidas_exteriores = get_post_meta($prod_id,'rd_medidas_exteriores',true);
	$rd_medidas_interiores = get_post_meta($prod_id,'rd_medidas_interiores',true);
	$rd_lumenes = get_post_meta($prod_id,'rd_lumenes',true);
	$rd_zoom = get_post_meta($prod_id,'rd_zoom',true);
	$rd_recargable = get_post_meta($prod_id,'rd_recargable',true);
	$rd_usb = get_post_meta($prod_id,'rd_usb',true);
	$rd_diametro = get_post_meta($prod_id,'rd_diametro',true);
	$rd_capacidad = get_post_meta($prod_id,'rd_capacidad',true);
	$rd_arma = get_post_meta($prod_id,'rd_arma',true);






		echo '<ul class="list-atts my-4">';

		if($jerarquia){ echo'<li>Jerarquia: '.$jerarquia.'</li>'; }
		if($rd_material){ echo'<li>Material: '.$rd_material.'</li>'; }
		if($rd_modelo){ echo'<li>Modelo: '.$rd_modelo.'</li>'; }
		if($rd_altura){ echo'<li>Altura: '.$rd_altura.'</li>'; }
		if($rd_ancho){ echo'<li>Ancho: '.$rd_ancho.'</li>'; }
		if($rd_espesor){ echo'<li>Espesor: '.$rd_espesor.'</li>'; }
		if($rd_peso){ echo'<li>Peso: '.$rd_peso.'</li>'; }
		if($rd_longitud_extendido){ echo'<li>Longitud extendido: '.$rd_longitud_extendido.'</li>'; }
		if($rd_longitud_plegado){ echo'<li>Longitud plegado: '.$rd_longitud_plegado.'</li>'; }
		if($rd_voltage_entrada){ echo'<li>Voltage entrada: '.$rd_voltage_entrada.'</li>'; }
		if($rd_voltage_salida){ echo'<li>Voltage salida: '.$rd_voltage_salida.'</li>'; }
		if($rd_tipo_cuello){ echo'<li>Tipo de cuello: '.$rd_tipo_cuello.'</li>'; }
		if($rd_medidas_exteriores){ echo'<li>Medidas de exterior: '.$rd_medidas_exteriores.'</li>'; }
		if($rd_medidas_interiores){ echo'<li>Medidas de interior: '.$rd_medidas_interiores.'</li>'; }
		if($rd_lumenes){ echo'<li>Lúmens: '.$rd_lumenes.'</li>'; }
		if($rd_zoom){ echo'<li>Zoom: '.$rd_zoom.'</li>'; }
		if($rd_recargable){ echo'<li>Recargable: '.$rd_recargable.'</li>'; }
		if($rd_usb){ echo'<li>USB: '.$rd_usb.'</li>'; }
		if($rd_diametro){ echo'<li>Diametro: '.$rd_diametro.'</li>'; }
		if($rd_capacidad){ echo'<li>Capacidad: '.$rd_capacidad.'</li>'; }
		if($rd_arma){ echo'<li>Arma: '.$rd_arma.'</li>'; }

		echo '</ul>';

}

