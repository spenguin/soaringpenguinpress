<?php

namespace WCExtension;

\WCExtension\initialise();

function initialise()
{
    /*remove_action( 'woocommerce_shop_loop_item_title', 'aurum_shop_loop_item_title', 5 );
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
    add_action( 'woocommerce_shop_loop_item_title', '\WCExtension\sp_aurum_shop_loop_item_title', 5 );*/
    add_action( 'woocommerce_single_product_summary', '\WCExtension\woocommerce_template_single_creators', 5 );
    add_action( 'sp_after_single_creator', '\WCExtension\sp_woocommerce_single_creator_wrapper_end', 1000 );
    add_action( 'widgets_init', '\WCExtension\sp_single_creator_sidebar_init' );
}


function wcGetBestsellerIds()
{
    /*$args   = [
        'post_type'     => 'product',
        'tax_query'     => [
            'taxonomy'  => 'product_cat',

        ]
        ];*/
    
    return [ 372, 350, 354 ];
}


/**
 * Show Product Title (Loop)
 */
	
function sp_aurum_shop_loop_item_title() 
{
    global $product;
    
    $id = $product->get_ID();
    ?>
    <div class="item-info">
        <?php do_action( 'aurum_before_shop_loop_item_title' ); ?>
        
        <h3<?php echo ! get_data('shop_add_to_cart_listing') ? ' class="no-right-margin"' : ''; ?>>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <?php 
            if( count( $creators = \Post2Post\getCreatorsByBook( get_the_ID() ) ) > 0  ):
                $count =0; ?>
                <span class="product-creators">
                    <?php foreach( $creators as $creator ):
                        if( 'draft' == $creator->post_status ): ?>
                            <span><?php echo $creator->post_title; ?></span>&nbsp;
                        <?php else: ?>
                            <a href="<?php echo get_permalink( $creator->ID ); ?>"><?php echo $creator->post_title; ?></a>&nbsp;
                        <?php endif; ?>
                    <?php 
                        if( 3 == $count++ )
                        {
                            echo '<span>And others</span>';
                            break;
                        }
                    endforeach; ?>
                </span>
        <?php endif; ?>

        <?php if(get_data('shop_product_category_listing')): ?>
        <span class="product-terms">
            <?php the_terms($id, 'product_cat'); ?>
        </span>
        <?php endif; ?>

        
        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
    </div>	
    <?php
}

/**
 * Output the product creator(s).
 */
function woocommerce_template_single_creators() {

    $creators   = \Post2Post\getCreatorsByBook( get_the_ID() );
    $count      = 0;
    foreach( $creators as $c ): ?>
        <h2 class="entry-summary--creator">
            <?php if( 'draft' == $c->post_status ): ?>
                <span class="entry-summary--creator--draft"><?php echo $c->post_title; ?></span>
            <?php else: ?>
                <a href="<?php echo site_url(); ?>/creator/<?php echo $c->post_name; ?>"><?php echo $c->post_title; ?></a></h2>
            <?php endif; ?>
        <?php if( $count++ > 3 ): ?>
            <h2 class="entry-summary--creator">And more...</h2>
        <?php break; endif;  ?>
    <?php endforeach;
}

/**
 *  Sidebar for single Creator page
 */
function sp_woocommerce_single_creator_wrapper_end() {
		
    ?>
        <div class="single-creator--sidebar">
            <?php 
                // Show widgets
                $sidebar = is_active_sidebar( 'single_creator_sidebar' ) ? 'single_creator_sidebar' : 'shop_sidebar';
                dynamic_sidebar( $sidebar );
            ?>
            
        </div>
    <?php
}

/**
 * Add Creator Sidebar
 */

function sp_single_creator_sidebar_init() {
    register_sidebar( array(
        'name' => __( 'Single Creator Sidebar', 'aurum' ),
        'id' => 'single_creator_sidebar',
        'description' => __( 'Widgets will be seen on Single Creator page sidebar', 'aurum' ),
    ) );
}