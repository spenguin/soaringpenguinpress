<?php

namespace Enqueue;

\Enqueue\initialise();

function initialise()
{
    add_action( 'wp_enqueue_scripts', '\Enqueue\aurum_enqueue_child_theme_scripts', 100 );
    add_action('wp_enqueue_scripts', '\Enqueue\customCss');
}


// This function will enqueue style.css of child theme, feel free to add yours
function aurum_enqueue_child_theme_scripts() {
	wp_enqueue_style( 'aurum-child', get_stylesheet_directory_uri() . '/style.css' );
}

function customCss()
{
    wp_enqueue_style( 'sppress-styles', get_stylesheet_directory_uri() . '/sppress.css' );
}
