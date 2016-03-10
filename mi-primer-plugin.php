<?php
/**
 * Plugin Name: Mi Primer Plugin
 * Plugin URI: http://github.com/raulabarca/mi-primer-plugin
 * Description: Plugin para crear un shortcode.
 * Version: 1.0.0
 * Author: Raúl Abarca
 * Author URI: http://raulabarca.com
 * License: GPL2
 */

 // Options page
 add_action('admin_menu', 'my_plugin_menu');

 function my_plugin_menu() {
 	add_menu_page('Mi Primer Plugin', 'Opciones Shortcode', 'administrator', 'my-plugin-settings', 'my_plugin_settings_page', 'dashicons-admin-generic');
 }

 function my_plugin_settings_page() {?>
   <div class="wrap">
<h2>Opciones del Plugin</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'my-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-plugin-settings-group' ); ?>
    <table class="form-table">
        <p>Añadir el texto que sustituirá el shortcode</p>
        <textarea rows="4" cols="40" name="shortcode_name"><?php echo esc_attr( get_option('shortcode_name') ); ?></textarea>
    </table>

    <?php submit_button(); ?>

</form>
<p>Añade [data] donde quieres que aparezca el texto dentro de tus posts.</p>
</div><?php
 }

 // Habilitar registro de date_offset_get
add_action( 'admin_init', 'my_plugin_settings' );

function my_plugin_settings() {
	register_setting( 'my-plugin-settings-group', 'shortcode_name' );
}

// Creamos el shortcode

function shortcode() {
	  return get_option('shortcode_name');
}
add_shortcode('data', 'shortcode');
?>
