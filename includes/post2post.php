<?php

namespace Post2Post;

initialise();

function initialise()
{
    add_action( 'p2p_init', '\Post2Post\my_connection_types' );
}

function my_connection_types()
{
/*    p2p_register_connection_type( array(
        'name' => 'event_to_creator',
        'from' => 'tribe_events',
        'to' => 'creator'
    ) );*/
    p2p_register_connection_type( array(
        'name' => 'product_to_creator',
        'from' => 'product',
        'to' => 'creator'
    ) );  
    p2p_register_connection_type( array(
        'name'  => 'flipbook_to_creator',
        'from'  => 'flipbook',
        'to'    => 'creator'
    ) );  
}

function getBooksByCreator( $postId, $type='' )
{   
    global $wpdb;
    $_sql   = "SELECT * FROM spp_posts WHERE ID in (SELECT p2p_from FROM spp_p2p WHERE p2p_to = {$postId})"; 
    $_res   = $wpdb->get_results( $_sql, OBJECT );
    $o      = array();
    foreach( $_res as $r )
    {
        $o[$r->ID]    = $r;
    }
    return $o;
}

function getCreatorsByBook( $postId )
{   
    global $wpdb;
    $postId = (array) $postId;

    $_sql   = "SELECT * FROM spp_posts WHERE ID in (SELECT p2p_to FROM spp_p2p WHERE p2p_from in (" . join( ',', $postId ) . "))";
    $_res   = $wpdb->get_results( $_sql, OBJECT );
    $o      = array();
    foreach( $_res as $r )
    {
        $o[$r->ID]    = $r;
    }
    return $o;    
}