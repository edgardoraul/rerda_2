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
		if($rd_lumenes){ echo'<li>L繳mens: '.$rd_lumenes.'</li>'; }
		if($rd_zoom){ echo'<li>Zoom: '.$rd_zoom.'</li>'; }
		if($rd_recargable){ echo'<li>Recargable: '.$rd_recargable.'</li>'; }
		if($rd_usb){ echo'<li>USB: '.$rd_usb.'</li>'; }
		if($rd_diametro){ echo'<li>Diametro: '.$rd_diametro.'</li>'; }
		if($rd_capacidad){ echo'<li>Capacidad: '.$rd_capacidad.'</li>'; }
		if($rd_arma){ echo'<li>Arma: '.$rd_arma.'</li>'; }

		echo '</ul>';

}


// Habilitar la compresión de imágenes
add_filter('jpeg_quality', function() { return 50; } );


// Desactivar anchos de imágenes en temas con soporte para WooCommerce.
add_action( 'after_setup_theme', 'ap_modify_theme_support', 11 );
function ap_modify_theme_support()
{
	$theme_support = get_theme_support( 'woocommerce' );
	$theme_support = is_array( $theme_support ) ? $theme_support[0] : array();
	
	unset( $theme_support['single_image_width'], $theme_support['thumbnail_image_width'] );
	
	remove_theme_support( 'woocommerce' );
	add_theme_support( 'woocommerce', $theme_support );
}


/**

 * Añade el campo NIF a la página de checkout de WooCommerce

 */

add_action( 'woocommerce_after_order_notes', 'agrega_mi_campo_personalizado' );
function agrega_mi_campo_personalizado( $checkout )
{
	echo '<div id="additional_checkout_field"><h2>' . __('Información adicional') . '</h2>';
	woocommerce_form_field( 'nif', array(
		'type'          => 'text',
		'class'         => array('my-field-class form-row-wide'),
		'label'         => __('DNI-CUIT-CUIL'),
		'required'      => true,
		'placeholder'   => __('Introduzca el Nº DNI o CUIT/CUIL'),
		), $checkout->get_value( 'nif' ));
   echo '</div>';
}

/**

 * Comprueba que el campo NIF no esté vacío

 */
add_action('woocommerce_checkout_process', 'comprobar_campo_nif');
function comprobar_campo_nif()
{
	// Comprueba si se ha introducido un valor y si está vacío se muestra un error.
	if ( ! $_POST['nif'] )
	{
		wc_add_notice( __( 'DNI o CUIT/CUIL, es un campo requerido. Debe de introducir su DNI o CUIT/CUIL para finalizar la compra.' ), 'error' );
	}
}


/**
 * Actualiza la información del pedido con el nuevo campo
 */
add_action( 'woocommerce_checkout_update_order_meta', 'actualizar_info_pedido_con_nuevo_campo' );
function actualizar_info_pedido_con_nuevo_campo( $order_id )
{
	if ( ! empty( $_POST['nif'] ) )
	{
		update_post_meta( $order_id, 'NIF', sanitize_text_field( $_POST['nif'] ) );
	}
}

/**
 * Muestra el valor del nuevo campo NIF en la página de edición del pedido
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'mostrar_campo_personalizado_en_admin_pedido', 10, 1 );
function mostrar_campo_personalizado_en_admin_pedido($order)
{
	echo '<p><strong>'.__('DNI-CUIT/CUIL').':</strong> ' . get_post_meta( $order->id, 'NIF', true ) . '</p>';
}

/**
 * Incluye el campo NIF en el email de notificación del cliente
 */
add_filter('woocommerce_email_order_meta_keys', 'muestra_campo_personalizado_email');
function muestra_campo_personalizado_email( $keys )
{
	$keys[] = 'NIF';
	return $keys;
}

/**
* Incluir NIF en la factura (necesario el plugin WooCommerce PDF Invoices & Packing Slips)
*/
add_filter( 'wpo_wcpdf_billing_address', 'incluir_nif_en_factura' );
function incluir_nif_en_factura( $address )
{
  global $wpo_wcpdf;
  echo $address . '<p>';
  $wpo_wcpdf->custom_field( 'NIF', 'DNI-CUIT/CUIL: ' );
  echo '</p>';
}

/**
* Incluir SKU en la página de los productos
*/
// add_filter( 'wc_product_sku_enabled', '__return_true' );
add_action( 'woocommerce_after_shop_loop_item_title', 'display_sku', 20, 1);
function display_sku( $template )
{
	global $product;
	$sku = $product->get_sku();
	// Le quito los 2 últimos caracteres para que no muestre ##
	echo "<small>Código:&nbsp; " . substr($sku, 0, -2) . "</small>";
}


// Remover versiones de los scripts y css innecesarios
function remove_script_version($src)
{
	$parts = explode('?', $src); return $parts[0];
};
add_filter('script_loader_src','remove_script_version',15,1);
add_filter('style_loader_src','remove_script_version',15,1);


// Remover clases automáticas del the_post_thumbnail
function the_post_thumbnail_remove_class( $output )
{
	$output = preg_replace( '/class=".*?"/', '', $output );
	return $output;
}
add_filter( 'post_thumbnail_html', 'the_post_thumbnail_remove_class'  );

// Remover clases e ids automáticos de los menúes
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var)
{
	return is_array($var) ? array_intersect($var, array('current-menu-item', 'current_page_item')) : '';
};

// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );
 
// Don't filter oEmbed results.
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
 
// Remove oEmbed discovery links.
remove_action('wp_head', 'wp_oembed_add_discovery_links');
 
// Remove oEmbed JavaScript from the front-end and back-end.
remove_action('wp_head', 'wp_oembed_add_host_js');

// Desactivar el script de embebidos
function my_deregister_scripts()
{
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

//Eliminar css y scripts de comentarios cuando no hagan falta
function clean_header()
{
	wp_deregister_script('comment-reply');
};
add_action('init','clean_header');

// Eliminar el atributo rel="category tag".
function remove_category_list_rel($output)
{
	return str_replace(' rel="category tag"','',$output);
};
add_filter('wp_list_categories','remove_category_list_rel');
add_filter('the_category','remove_category_list_rel');

// Removes some links from the header
function remove_headlinks_and_emojis() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'start_post_rel_link' );
    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action( 'wp_head', 'parent_post_rel_link' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'remove_headlinks_and_emojis' );

// Removiendo el panel de bienvenida del wordpress
remove_action('welcome_panel', 'wp_welcome_panel');

// Detén las adivinanzas de URLs de WordPress
add_filter('redirect_canonical','stop_guessing');
function stop_guessing($url)
{
	if(is_404())
	{
		return false;
	}
	return $url;
}

// Agregar nofollow a los enlaces externos
function auto_nofollow( $content )
{
    return preg_replace_callback( '/<a>]+/', 'auto_nofollow_callback', $content );
}
function auto_nofollow_callback( $matches )
{
    $link = $matches[0];
    $site_link = get_bloginfo('url'); 
    if (strpos($link, 'rel') === false)
    {
        $link = preg_replace("%(href=S(?!$site_link))%i", 'rel="nofollow" $1', $link);
    }
    elseif (preg_match("%href=S(?!$site_link)%i", $link))
    {
        $link = preg_replace('/rel=S(?!nofollow)S*/i', 'rel="nofollow"', $link);
    }
    return $link;
}
add_filter('comment_text', 'auto_nofollow');

// Habilitar svg en imagenes
function add_file_types_to_uploads($file_types)
{
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


//REMOVE GUTENBERG BLOCK LIBRARY CSS FROM LOADING ON FRONTEND
function remove_wp_block_library_css()
{
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' ); // REMOVE WOOCOMMERCE BLOCK CSS
	wp_dequeue_style( 'global-styles' ); // REMOVE THEME.JSON
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

//Función para Minificar el HTML
class WP_HTML_Compression
{
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = true;
	protected $remove_comments = true;
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function bottomComment($raw, $compressed)
	{
		$raw = strlen($raw);
		$compressed = strlen($compressed);		
		$savings = ($raw-$compressed) / $raw * 100;		
		$savings = round($savings, 2);		
		return '<!-- HTML Minify | Se ha reducido el tamaño de la web un '.$savings.'% | De '.$raw.' Bytes a '.$compressed.' Bytes -->';
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
			$content = $token[0];
			if (is_null($tag))
			{
				if ( !empty($token['script']) )
				{
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) )
				{
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->')
				{
					$overriding = !$overriding;
					continue;
				}
				else if ($this->remove_comments)
				{
					if (!$overriding && $raw_tag != 'textarea')
					{
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
						$content = str_replace(' />', '/>', $content);
					}
				}
			}
			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}
			$html .= $content;
		}
		return $html;
	}
	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);
		if ($this->info_comment)
		{
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}
	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);
		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}
		return $str;
	}
}

function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}

function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');

/**
 * Minify HTML Output in WordPress
 *
 * @author: Pablo López Mestre - https://desarrollowp.com
 */
class HtmlCompression {
    public function __construct() {
        add_action( 'wp_loaded', self::html_compression_start() );
    }

    public static function html_compression_start() {
        ob_start( array( __CLASS__, 'html_compression_finish' ) );
    }

    public static function html_compression_finish( $html ) {
        $pattern = '/(?<js><script.*?<\/script\s*>)|(?<css><style.*?<\/style\s*>)|(?<html>(?:[^!\/\w.:-])?[^<]*)/ms';

        preg_match_all( $pattern, $html, $matches, PREG_SET_ORDER );

        // Variable reused for output
        $output = '';

        foreach ( $matches as $token ) {
            if ( ! empty( $token['js'] ) ) {
                $output .= self::minify_js( $token['js'] );
            } elseif ( ! empty( $token['css'] ) ) {
                $output .= self::minify_css( $token['css'] );
            } else {
                $output .= self::minify_html( $token['html'] );
            }
        }

        return $output ?: $html;
    }

    /**
     * Minify inline JS
     *
     * @param string $content All JS captured by regex.
     *
     * @return string
     */
    private static function minify_js( string $content = '' ): string {
        $pattern = array(
            '/(?<!ftp:|http:|https:|"|\')\s*\/\/[^\n\r]*/ms',
            // Remove JavaScript Inline comments (Don't remove if it's a URL)
            '/\/\*.*?\*\//ms',
            // Remove JavaScript Block comments
            '/[\n\r\t\v\e\f]/',
            // Remove all new lines, carriage returns, tabs, vertical whitespaces, esc & form feeds characters
            '/\s{2,}/s',
            // Remove all spaces (when there are 2 or more)
        );

        $replacement = array(
            '',
            '',
            '',
            ' ',
        );

        return preg_replace( $pattern, $replacement, $content );
    }

    /**
     * Minify inline CSS
     *
     * @param string $content All CSS captured by regex.
     *
     * @return string
     */
    private static function minify_css( string $content = '' ): string {
        $pattern = array(
            '/\/\*.*?\*\//ms',
            // Remove CSS Block comments
            '/[\n\r\t\v\e\f]/',
            // Remove all new lines, carriage returns, tabs, vertical whitespaces, esc & form feeds characters
            '/\s{2,}/s',
            // Remove all spaces (when there are 2 or more)
        );

        $replacement = array(
            '',
            '',
            '',
        );

        return preg_replace( $pattern, $replacement, $content );
    }

    /**
     * Minify rest of HTML
     *
     * @param string $content All HTML captured by regex.
     *
     * @return string
     */
    private static function minify_html( string $content = '' ): string {
        $pattern = array(
            '/<!--\s.*?-->/',
            // Remove all HTML comments
            '/[\n\r\t\v\e\f]/',
            // Remove all new lines, carriage returns, tabs, vertical whitespaces, esc & form feeds characters
            '/\s{2,}/',
            // Remove all spaces (when there are 2 or more)
        );

        $replacement = array(
            '',
            '',
            ' ',
        );

        return preg_replace( $pattern, $replacement, $content );
    }
}
//$minify_html = new HtmlCompression();

?>