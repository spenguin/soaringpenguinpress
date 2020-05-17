<?php
/**
 * Hooks to extend provided code
 */
namespace Hooks;

initialise();

function initialise()
{
    add_filter( 'display_title', '\Hooks\display_title_creators', 20, 2 );
}

function display_title_creators( $title_str, $postId )
{
    return $title_str;
}