<?php

namespace Shortcodes;


\Shortcodes\initialize();

function initialize()
{
    add_shortcode( 'sp_featured_creator', '\Shortcodes\sp_featured_creator' );
    add_shortcode( 'sp_event_banner', '\Shortcodes\sp_event_banner' );
    add_shortcode( 'sp_event_list', '\Shortcodes\sp_event_list' );
}

function sp_featured_creator()
{
    //global $wpdb, $blog_id,$wp_query,$eshopoptions;

    $args   = array(
        'post_type'     => 'creator',
        'meta_key'      => 'featured_creator',
        'meta_value'    => '1',
        'posts_per_page'=> 1
    );
    $query  = new \WP_Query( $args );
    if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post();
        $titles = \Post2Post\getBooksByCreator( get_the_ID() );
        ob_start();
?>
<div class="wpb_column vc_column_container vc_col-sm-4">
    <div class="vc_column-inner ">
        <div class="wpb_wrapper">
            <?php the_post_thumbnail(); ?><!--<img width="520" height="780" src="https://sppresswoo.loc/wp-content/uploads/2018/09/lisaphoto1.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="https://sppresswoo.loc/wp-content/uploads/2018/09/lisaphoto1.jpg 520w, https://sppresswoo.loc/wp-content/uploads/2018/09/lisaphoto1-200x300.jpg 200w" sizes="(max-width: 520px) 100vw, 520px" />-->
            <div class="wpb_text_column wpb_content_element " >
                <div class="wpb_wrapper">
                    <div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wpb_column vc_column_container vc_col-sm-8">
    <div class="vc_column-inner ">
        <div class="wpb_wrapper">		
            <div class="lab_vc_pagetitle wpb_content_element  vc_custom_1537916084362 text-aligned-left font-size-medium">
			    <div class="row">
				    <div class="col-sm-12">
					    <h2><?php the_title(); ?></h2>
						<span class="dash"></span>
					</div>
				</div>
		    </div>
	        <div class="wpb_text_column wpb_content_element  vc_custom_1537891687016" >
		        <div class="wpb_wrapper">
			        <?php the_excerpt(); ?>
		        </div>
	        </div>
            <div class="lab_wpb_products laborator-woocommerce woocommerce wpb_content_element ">
                <div class="woocommerce columns-4 ">
                    <ul class="products columns-4">
                        <?php foreach( $titles as $title ):
                            $cats   = getProductCategories( $title->ID );
                            $custom = get_post_custom( $title->ID ); 
                            ?>
                            <li class="shop-item hover-effect-1 post-<?php echo $title->ID; ?> product type-product status-publish has-post-thumbnail product_cat-history product_cat-nobel-books instock taxable shipping-taxable purchasable product-type-simple">
                                <div class="item-image">
                                    <a href="<?php echo get_permalink( $title->ID ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                        <span class="image-placeholder" style="padding-bottom:100.000000%" >
                                            <?php //echo get_the_post_thumbnail( $title->ID, array( 330, 330 ) ); ?><img width="330" height="330" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazyload" alt="" srcset="
                                            <?php echo get_the_post_thumbnail_url( $title->ID, array( 330, 330 ) ); ?> 330w, 
                                            <?php echo get_the_post_thumbnail_url( $title->ID, array( 150, 150 ) ); ?> 150w, 
                                            <?php echo get_the_post_thumbnail_url( $title->ID, array( 100, 100 ) ); ?> 100w" sizes="(max-width: 330px) 100vw, 330px" data-src="<?php echo get_the_post_thumbnail_url( $title->ID, array( 330, 330 ) ); ?>" />
                                        </span>
                                    </a>	
                                    <div class="bounce-loader">
                                        <div class="loading loading-0"></div>
                                        <div class="loading loading-1"></div>
                                        <div class="loading loading-2"></div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <h3>
                                        <a href="<?php get_permalink( $title->ID ); ?>"><?php echo $title->post_title; ?></a>
                                    </h3>
                                    <span class="product-terms">
                                        <?php foreach( $cats as $cat ): ?>
                                            <a href="<?php echo $cat['link']; ?>" rel="tag"><?php echo $cat['name']; ?></a>
                                        <?php endforeach; ?>
                                    </span>
                                    <a  href="/?add-to-cart=<?php echo $title->ID; ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart  product-type-simple" data-product_id="<?php echo $title->ID; ?>" data-product_sku="" aria-label="Add &ldquo;<?php echo $title->post_title; ?>&rdquo; to your basket" rel="nofollow" data-toggle="tooltip"data-placement="left"data-title="Add to basket"data-title-loaded="Product added to cart!"></a>
                                    <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&pound;</span><?php echo $custom['_regular_price'][0]; ?></span></span>
                                </div>	
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        $o  = ob_get_clean();
    endwhile; endif;    
    return $o;
}

function getProductCategories( $prodId )
{
    $cats   = get_the_terms( $prodId, 'product_cat' );
    $o      = [];
    foreach( $cats as $cat )
    {
        $o[$cat->term_id]   = [
            'name'      => $cat->name,
            'slug'      => $cat->slug,
            'link'      => get_category_link( $cat->term_id )
        ];
    }
    return $o;
}

/**
 * Generate an event banner if one hasn't been set
 */
function sp_event_banner()
{   
    // Is there a feature banner?
    $args   = [
        'post_type' => 'banner',
        'status'    => 'publish',
        'posts_per_page'    => 1
    ];
    $query  = new \WP_Query( $args );
    if( $query->post_count > 0 )
    {
        $query->the_post();
        ob_start(); ?>
            <div class="spp-banner-feature">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
        <?php return ob_get_clean();
    }

    // Otherwise, is there a featured event?

    // Else get the most recent event
    
    $query  = \Calendar\get_events( 1 );
    $query->the_post(); 
    $start  = substr( get_post_meta( get_the_ID(), '_EventStartDate',TRUE ), 0, 10 );
    $end    = substr( get_post_meta( get_the_ID(), '_EventEndDate',TRUE ), 0, 10 );
    ob_start();
    ?>
    <a href="<?php the_permalink(); ?>">
        <div class="spp-banner">
            <h2><?php the_title(); ?></h2>
            <h3><?php echo \Calendar\dateStr( $start, $end ); ?>
        </div>
    </a>
    <?php
    return ob_get_clean();
}

/**
 * Generate a list of upcoming events
 */
function sp_event_list()
{
    ob_start();
    $query  = \Calendar\get_events( 4 ); ?>
    <div class="sp_event_list">
        <?php
        if( $query->have_posts() ): ?>
            <h3>Upcoming Events</h3>
            <?php
                while( $query->have_posts() ): $query->the_post();
                    $start  = substr( get_post_meta( get_the_ID(), '_EventStartDate',TRUE ), 0, 10 );
                    $end    = substr( get_post_meta( get_the_ID(), '_EventEndDate',TRUE ), 0, 10 );
                    ?>
                    <div class="sp_event_list-event">
                        <div class="sp_event_list-event-date">
                            <?php echo \Calendar\dateStr( $start, $end ); ?>
                        </div>
                        <div class="sp_event_list-event-text">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                    </div>
            <?php endwhile;
        endif; ?>
        <a href="<?php echo site_url(); ?>/events" class="cta">View the Event Calendar</a>
    </div>
    <?php wp_reset_postdata();
    return ob_get_clean();
}