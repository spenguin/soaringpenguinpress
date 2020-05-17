<?php
/**
 * Plugin Name:   Related Creators List Widget Plugin
 * Plugin URI:    https://www.soaringpenguin.com
 * Description:   Creates a list of related Creators (Custom Post Type); requires Post2Post plugin
 * Version:       1.0
 * Author:        John Anderson
 * Author URI:    https://www.soaringpenguin.com
 */

class sp_Related_Creators_List extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'related-creators-list', 'description' => 'A list of Related Creators' );
    parent::__construct( 'related_creators_list', 'Related Creators List', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    global $wpdb;
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );

    $creator_slug   = basename( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
    $creator_post   = get_page_by_path($creator_slug, OBJECT, 'creator' );
    $books          = \Post2Post\getBooksByCreator( $cId[] = $creator_post->ID );
    $related        = array_diff( array_keys( \Post2Post\getCreatorsByBook( array_keys( $books ) ) ), $cId );

    if( !empty( $related ) )
    {
    
      $params           = [
                'post__in'  => $related,
                'post_type' => 'creator' 
      ];

      $query  = new WP_Query( $params );

      
      if( $query->have_posts() ): 
        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
      ?>
          <ul class="creator_list_widget">
              <?php 
                  while( $query->have_posts() ): $query->the_post(); 

                  ?>
                      <li><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?><?php the_title(); ?></a></li>
              <?php endwhile; ?>
          </ul>
        <?php echo $args['after_widget'];
      endif;
    }
    
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
function register_related_creator_list_widget() { 
  register_widget( 'sp_Related_Creators_List' );
}
add_action( 'widgets_init', 'register_related_creator_list_widget' );

?>