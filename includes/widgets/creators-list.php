<?php
/**
 * Plugin Name:   Creators List Widget Plugin
 * Plugin URI:    https://www.soaringpenguin.com
 * Description:   Creates a list of Creators (Custom Post Type)
 * Version:       1.0
 * Author:        John Anderson
 * Author URI:    https://www.soaringpenguin.com
 */

class sp_Creators_List extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'creators-list', 'description' => 'A list of Creators' );
    parent::__construct( 'creators_list', 'Creators List', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
      global $wpdb;
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $blog_title = get_bloginfo( 'name' );
    $tagline = get_bloginfo( 'description' );
    // Get array of creators
    $params   = [
        'post_type'         => 'creator',
        'posts_per_page'    => -1,
        'orderby'           => 'title',
        'order'             => 'ASC'
    ];
    $query  = new WP_Query( $params );

    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
    if( $query->have_posts() ): ?>
        <ul class="product_list_widget">
            <?php 
                while( $query->have_posts() ): $query->the_post(); 

                ?>
                    <li><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

    <?php echo $args['after_widget'];
  }

  
  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p><?php
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    return $instance;
  }

}

// Register the widget.
function register_creator_list_widget() { 
  register_widget( 'sp_Creators_List' );
}
add_action( 'widgets_init', 'register_creator_list_widget' );

?>