<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://developer.wordpress.org/themes/basics/template-hierarchy/}
 *
 * @package WordPress
 * @subpackage Aurum Child
 * @since Aurum Child
 */

get_header(); 
if ( get_post()->post_content ) :
?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="single-page-title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>

<?php

endif;

?>	

<?php get_footer(); ?>
