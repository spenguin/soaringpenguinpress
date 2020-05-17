<?php
/**
 *	Aurum WordPress Theme
 *
 *	Laborator.co
 *	www.laborator.co
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">	
	<?php wp_head(); ?>
</head>
	<body <?php body_class(); ?>>
		
		<?php
			/**
			 * Hooks before header
			 */
			do_action( 'aurum_body_start' );
				
			/**
			 * Site header
			 */
			if ( ! defined( 'LAB_HEADERLESS' ) ) {
				get_template_part( 'tpls/header' );
			}
		?>

