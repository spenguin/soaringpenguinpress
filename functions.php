<?php
/**
 *	Aurum WordPress Theme
 *
 *	Laborator.co
 *	www.laborator.co
 */

namespace Core;

// Useful global constants

define( 'CORE_URL', get_stylesheet_directory_uri() );
define( 'CORE_TEMPLATE_URL', get_template_directory_uri() . '-child' );
define( 'CORE_PATH', dirname( __FILE__ ). '/' ); 
define( 'CORE_INC', CORE_PATH . 'includes/' );
define( 'CORE_PLUGINS_PATH', plugins_url() );
define( 'CORE_WIDGET', CORE_INC . 'widgets/' );

require_once CORE_INC . 'enqueue.php';
require_once CORE_INC . 'custom-posts.php';
require_once CORE_INC . 'shortcodes.php';
require_once CORE_INC . 'post2post.php';
require_once CORE_INC . 'wcextension.php';
require_once CORE_INC . 'calendar-functions.php';
require_once CORE_INC . 'widgets.php';
require_once CORE_INC . 'hooks.php';


if( isset( $_GET['nobar'] ) )
{
	?>
	<style>
		#wpadminbar { display: none; }
	</style>
	<?php 
}