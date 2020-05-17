<?php
/**
 * The Template for displaying all single creators
 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'creators' ); ?>
<!-- header -->



<div class="container page-heading-container">
	<div class="page-heading">
        <div class="col">
			<div class="right-aligned">
				<?php echo aurum_breadcrumb(); ?>
            </div>					
        </div>
	</div>
</div>
<!-- end header -->

<!-- primary content -->

<div id="primary" class="content-area">
	<main id="creators-main" class="site-main" role="main">
		<div class="archive-creator archive-creator--has-sidebar">
			<div class="archive-creator--creator-list">	
				<?php
					$args	= [
						'post_type'			=> 'creator',
						'posts_per_page'	=> -1,
						'orderby'			=> 'title',
						'order'				=> 'asc'
					];
					$query	= new WP_Query( $args );
					if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); 
						$talents	= get_the_terms( get_the_ID(), 'creator_talent' ); 
					?>
						<div class="archive-creator--creator-detail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( [300, 300] ); ?></a>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php if( count( $talents ) > 0 ): ?>
								<h3>
									<?php 
										foreach( $talents as $talent )
										{
											echo $talent->name . ' ';
										}
									?>
								</h3>
									<?php endif; ?>
						</div>
					<?php endwhile; endif; ?>
			</div>
			<?php //do_action( 'sp_after_archive_creator' ); ?>
		</div>
	</main>
</div>

<!-- end primary content -->

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
