<?php
/**
 * The Template for displaying all single creators
 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( '' ); ?>
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
	<main id="creator-main" class="site-main" role="main">
		<div class="single-creator single-creator--has-sidebar">
			<div class="single-creator--creator-details">
				<!-- creator content -->
				<?php while ( have_posts() ) : the_post(); 
				
				?>
					<div class="creator-details has-post-thumbnail">
						<div class="creator-image-thumbnail">
							<?php the_post_thumbnail( [622,640] ); ?>
						</div>
					</div>

					<div class="summary entry-summary">
						<h1 itemprop="name" class="product_title entry-title">
							<?php the_title(); ?>
						</h1>
						<div class="creator-content"><?php the_content(); ?></div>

						<div class="clear"></div>
					</div>	

					<section class="related products">
						<h2>Publications and related items</h2>
						<ul class="products columns-4">
							<?php $products = \Post2Post\getBooksByCreator( get_the_ID() ); 
								foreach( $products as $p ): 
									$custom	= get_post_custom( $p->ID );
									?>
									<li>
										<div class="item-image">	
											<a href="<?php echo get_permalink( $p->ID ); ?>">
												<span class="" style="padding-bottom:100.000000%" ><?php echo get_the_post_thumbnail( $p->ID ); ?></span>
											</a>
										</div>
										<div class="item-info">
											<h3><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo $p->post_title; ?></a></h3>
											<span class="product-creators">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>&nbsp;
											</span>
											<?php $terms = get_the_terms( $p->ID, 'product_cat' ); 
												if( count( $terms ) > 0 ): 
													foreach( $terms as $term ): ?>
														<span class="product-terms">
															<a href="<?php site_url(); ?>/product-category/<?php echo $term->slug; ?>" rel="tag"><?php echo $term->name; ?></a>
														</span>	
												<?php endforeach; ?>
											<?php endif; ?>
											<a  href="/product/breaks-volume-one?add-to-cart=<?php echo $p->ID; ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart  product-type-simple" data-product_id="<?php echo $p->ID; ?>" data-product_sku="<?php echo $custom['_sku'][0]; ?>" aria-label="Add &ldquo;<?php echo $p->name; ?>&rdquo; to your basket" rel="nofollow" data-toggle="tooltip"data-placement="left"data-title="Add to basket"data-title-loaded="Product added to cart!"></a>
											<span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&pound;</span><?php echo $custom['_regular_price'][0]; ?></span></span>																					
										</div>
										</li>
							<?php endforeach; ?>
						</ul>
					</section>									
					
				<?php endwhile; // end of the loop. ?>
				<!-- end creator content -->

			</div>
			<!-- code pending -->
			<?php do_action( 'sp_after_single_creator' ); ?>
						
		</div>
	</main>
</div>

<!-- end primary content -->

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
