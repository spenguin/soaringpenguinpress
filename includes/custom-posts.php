<?php

namespace CustomPosts;

use WP_Query;

\CustomPosts\initialize();

function initialize()
{
    add_action( 'init', '\CustomPosts\custom_post_type', 0 );
    add_action( 'init', '\CustomPosts\custom_taxonomy_type', 0 );
    add_action( 'admin_init', '\CustomPosts\admin_init' );
    //add_action( 'save_post','\CustomPosts\save_release_date' );
    add_action( 'save_post','\CustomPosts\save_featured_creator' );
    add_action( 'save_post', '\CustomPosts\save_competition_dates' );
}

function custom_post_type() {
    
	
	// Set UI labels for Custom Post Type Blogs
	$labels = array(
		'name'                => _x( 'Blogs', 'Post Type General Name', 'sppress' ),
		'singular_name'       => _x( 'Blog', 'Post Type Singular Name', 'sppress' ),
		'menu_name'           => __( 'Blogs', 'sppress' ),
		'parent_item_colon'   => __( 'Parent Blog', 'sppress' ),
		'all_items'           => __( 'All Blogs', 'sppress' ),
		'view_item'           => __( 'View Blog', 'sppress' ),
		'add_new_item'        => __( 'Add New Blog', 'sppress' ),
		'add_new'             => __( 'Add New', 'sppress' ),
		'edit_item'           => __( 'Edit Blog', 'sppress' ),
		'update_item'         => __( 'Update Blog', 'sppress' ),
		'search_items'        => __( 'Search Blog', 'sppress' ),
		'not_found'           => __( 'Not Found', 'sppress' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'sppress' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'blog', 'sppress' ),
		'description'         => __( 'Blogs listings', 'sppress' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
//		'taxonomies'          => array( 'collections' ),
		'rewrite' => array('slug' => 'blog','with_front' => false),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering Custom Post Type Blogs
	register_post_type( 'blog', $args );
    
	// Set UI labels for Custom Post Type Competitions
	$labels = array(
		'name'                => _x( 'Competitions', 'Post Type General Name', 'sppress' ),
		'singular_name'       => _x( 'Competition', 'Post Type Singular Name', 'sppress' ),
		'menu_name'           => __( 'Competitions', 'sppress' ),
		'parent_item_colon'   => __( 'Parent Competition', 'sppress' ),
		'all_items'           => __( 'All Competitions', 'sppress' ),
		'view_item'           => __( 'View Competition', 'sppress' ),
		'add_new_item'        => __( 'Add New Competition', 'sppress' ),
		'add_new'             => __( 'Add New', 'sppress' ),
		'edit_item'           => __( 'Edit Competition', 'sppress' ),
		'update_item'         => __( 'Update Competition', 'sppress' ),
		'search_items'        => __( 'Search Competition', 'sppress' ),
		'not_found'           => __( 'Not Found', 'sppress' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'sppress' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'competition', 'sppress' ),
		'description'         => __( 'Competitions listings', 'sppress' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
//		'taxonomies'          => array( 'collections' ),
		'rewrite' => array('slug' => 'competition','with_front' => false),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering Custom Post Type Competitions
	register_post_type( 'competition', $args );
    
	    
	// Set UI labels for Custom Post Type Creators
	$labels = array(
		'name'                => _x( 'Creators', 'Post Type General Name', 'sppress' ),
		'singular_name'       => _x( 'Creator', 'Post Type Singular Name', 'sppress' ),
		'menu_name'           => __( 'Creators', 'sppress' ),
		'parent_item_colon'   => __( 'Parent Creator', 'sppress' ),
		'all_items'           => __( 'All Creators', 'sppress' ),
		'view_item'           => __( 'View Creator', 'sppress' ),
		'add_new_item'        => __( 'Add New Creator', 'sppress' ),
		'add_new'             => __( 'Add New', 'sppress' ),
		'edit_item'           => __( 'Edit Creator', 'sppress' ),
		'update_item'         => __( 'Update Creator', 'sppress' ),
		'search_items'        => __( 'Search Creator', 'sppress' ),
		'not_found'           => __( 'Not Found', 'sppress' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'sppress' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'creator', 'sppress' ),
		'description'         => __( 'Creators listings', 'sppress' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
//		'taxonomies'          => array( 'collections' ),
		'rewrite' => array('slug' => 'creator','with_front' => false),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering Custom Post Type Creators
	register_post_type( 'creator', $args );   
	
	// Set UI labels for Custom Post Type Banner
	$labels = array(
		'name'                => _x( 'Banners', 'Post Type General Name', 'sppress' ),
		'singular_name'       => _x( 'Banner', 'Post Type Singular Name', 'sppress' ),
		'menu_name'           => __( 'Banners', 'sppress' ),
		'parent_item_colon'   => __( 'Parent Banner', 'sppress' ),
		'all_items'           => __( 'All Banners', 'sppress' ),
		'view_item'           => __( 'View Banner', 'sppress' ),
		'add_new_item'        => __( 'Add New Banner', 'sppress' ),
		'add_new'             => __( 'Add New', 'sppress' ),
		'edit_item'           => __( 'Edit Banner', 'sppress' ),
		'update_item'         => __( 'Update Banner', 'sppress' ),
		'search_items'        => __( 'Search Banner', 'sppress' ),
		'not_found'           => __( 'Not Found', 'sppress' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'sppress' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'banner', 'sppress' ),
		'description'         => __( 'Banners listings', 'sppress' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
//		'taxonomies'          => array( 'collections' ),
		'rewrite' => array('slug' => 'banner','with_front' => false),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering Custom Post Type Creators
	register_post_type( 'banner', $args ); 	
	
}

function custom_taxonomy_type()
{
    register_taxonomy(
        'competition_admin',
        'competition',
        array(
            'labels'    => array(
                'name'  => 'Competition Administration',
                'add_new_item'  => 'Add New Competition Administration',
                'new_item_name' => 'New Competition Administration'
            ),
            'show_ui'   => TRUE,
            'show_tagcloud' => FALSE,
            'hierarchical'  => TRUE
        )
    );
    register_taxonomy(
        'creator_talent',
        'creator',
        array(
            'labels'    => array(
                'name'  => 'Creator Talent',
                'add_new_item'  => 'Add New Creator Talent',
                'new_item_name' => 'New Creator Talent'
            ),
            'show_ui'   => TRUE,
            'show_tagcloud' => FALSE,
            'hierarchical'  => TRUE
        )
    );
}

/**
 *   Custom Fields in Posts
 */

function admin_init()
{
    //add_meta_box( 'release_date_meta', 'Release Date', '\CustomPosts\release_date', 'product', 'side', 'high' );
    //add_meta_box( 'featured_meta', 'Featured Title', '\CustomPosts\featured', 'product', 'side', 'high' );
    add_meta_box( 'competition_dates_meta', 'Competition Dates', '\CustomPosts\competition_dates', 'competition', 'side', 'high' );
    add_meta_box( 'featured_creator_meta', 'Featured Creator', '\CustomPosts\featured_creator', 'creator', 'side', 'high' );
}

/*function release_date()
{
    global $post;
    $custom = get_post_custom( $post->ID );
    $release_date   = ( $custom['release_date'][0] ) ? $custom['release_date'][0] : '';
    ?>
    <label for="release_date">Release Date:</label>
    <input type="date" name="release_date" value="<?php echo ( empty( $release_date ) ? date( 'd/m/Y' ) : date( 'd/m/Y', $release_date ) ); ?>" >
    
    <?php
}

function save_release_date()
{
    global $post;
    $release_date   = str_replace('/', '-', $_POST['release_date'] );
    update_post_meta( $post->ID, 'release_date', strtotime( $release_date ) );
}*/

function featured_creator()
{
    global $post;
    $custom = get_post_custom( $post->ID );
    $featured   = ( $custom['featured_creator'][0] ) ? $custom['featured_creator'][0] : 0;
    ?>
    <label for="featured_creator">Featured Creator:</label>
    <input type="checkbox" name="featured_creator" value="1" <?php echo ( $featured ) ? 'checked' : ''; ?> />
    
    <?php
}
function save_featured_creator()
{
    global $post;
    $featured   = $_POST['featured_creator'];
    update_post_meta( $post->ID, 'featured_creator', $featured );
}

function competition_dates()
{
    global $post;
    $custom = get_post_custom( $post->ID );
    $start_date = ( $custom['start_date'][0] ) ? $custom['start_date'][0] : '';
    $end_date   = ( $custom['end_date'][0] ) ? $custom['end_date'][0] : '';
    ?>
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" value="<?php echo ( empty( $start_date ) ? date( 'd/m/Y' ) : date( 'd/m/Y', $start_date ) ); ?>" ><br />
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" value="<?php echo ( empty( $end_date ) ? date( 'd/m/Y' ) : date( 'd/m/Y', $end_date ) ); ?>" >
    
    <?php
}
function save_competition_dates()
{
    global $post;
    $start_date = str_replace( '/', '-', $_POST['start_date'] );
    update_post_meta( $post->ID, 'start_date', strtotime( $start_date ) );
    $end_date = str_replace( '/', '-', $_POST['end_date'] );
    update_post_meta( $post->ID, 'end_date', strtotime( $end_date ) );
}

/**
 * Bespoke Custom Post functions
 */


/*
function admin_init()
{
	add_meta_box( 'event_data_meta', 'Event data', '\CustomPosts\event_data', 'event', 'advanced', 'high' );
}

function event_data()
{
    global $post;
    $custom		= get_post_custom($post->ID);
    $start_date = ( $custom['start_date'][0] ) ? $custom['start_date'][0] : '';
    $end_date   = ( $custom['end_date'][0] ) ? $custom['end_date'][0] : '';
    $location   = ( $custom['location'][0] ) ? $custom['location'][0] : '';
    $website    = ( $custom['website'][0] ) ? $custom['website'][0] : '';
	?>
	<label for="start_date">Start Date:</label>
    <input type="text" name="start_date" value="<?php echo $start_date; ?>" /><br />
	<label for="end_date">End Date:</label>
    <input type="text" name="end_date" value="<?php echo $end_date; ?>" /><br />
	<label for="location">Location:</label>
    <textarea name="location"><?php echo $location; ?></textarea><br />
	<label for=website">Website:</label>
    <input type="text" name="website" value="<?php echo $website; ?>" /><br />    

	<?php
}

function save_event_data()
{
	global $post;
	update_post_meta( $post->ID, 'start_date', $_POST['start_date'] );
	update_post_meta( $post->ID, 'end_date', $_POST['end_date'] );
	update_post_meta( $post->ID, 'location', $_POST['location'] );
	update_post_meta( $post->ID, 'website', $_POST['website'] );    
    
}*/