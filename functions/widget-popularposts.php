<?php
/*-----------------------------------------------------------------------------------

	Plugin Name: Hassium Popular Posts
	Description: A widget that displays popular posts.
	Version: 1.0

-----------------------------------------------------------------------------------*/

class hassium_popular_posts_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'hassium_popular_posts_widget',
			__('Hassium: Popular Posts','hassium'),
			array( 'description' => __( 'Displays most Popular Posts with Thumbnail.','hassium' ) )
		);
	}

 	public function form( $instance ) {
		$defaults = array(
			'comments' => 1,
			'date' => 1,
			'days' => 30,
			'show_thumb' => 1,
		);
		$instance = wp_parse_args((array) $instance, $defaults);
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Popular Posts','hassium' );
		$qty = isset( $instance[ 'qty' ] ) ? intval( $instance[ 'qty' ] ) : 5;
		$comments = isset( $instance[ 'comments' ] ) ? intval( $instance[ 'comments' ] ) : 1;
		$date = isset( $instance[ 'date' ] ) ? intval( $instance[ 'date' ] ) : 1;
		$days = isset( $instance[ 'days' ] ) ? intval( $instance[ 'days' ] ) : 0;
		$show_thumb = isset( $instance[ 'show_thumb' ] ) ? intval( $instance[ 'show_thumb' ] ) : 1;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','hassium' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
	       <label for="<?php echo $this->get_field_id( 'days' ); ?>"><?php _e( 'Popular limit (days), 0 for No-limit', 'hassium' ); ?>
	       <input id="<?php echo $this->get_field_id( 'days' ); ?>" name="<?php echo $this->get_field_name( 'days' ); ?>" type="number" min="1" step="1" value="<?php echo $days; ?>" />
	       </label>
       </p>
	   
		<p>
			<label for="<?php echo $this->get_field_id( 'qty' ); ?>"><?php _e( 'Number of Posts to show','hassium' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'qty' ); ?>" name="<?php echo $this->get_field_name( 'qty' ); ?>" type="number" min="1" step="1" value="<?php echo $qty; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("show_thumb"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_thumb"); ?>" name="<?php echo $this->get_field_name("show_thumb"); ?>" value="1" <?php if (isset($instance['show_thumb'])) { checked( 1, $instance['show_thumb'], true ); } ?> />
				<?php _e( 'Show Thumbnails', 'hassium'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("date"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date"); ?>" name="<?php echo $this->get_field_name("date"); ?>" value="1" <?php if (isset($instance['date'])) { checked( 1, $instance['date'], true ); } ?> />
				<?php _e( 'Show post date', 'hassium'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("comments"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("comments"); ?>" name="<?php echo $this->get_field_name("comments"); ?>" value="1" <?php checked( 1, $instance['comments'], true ); ?> />
				<?php _e( 'Show comments number', 'hassium'); ?>
			</label>
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['qty'] = intval( $new_instance['qty'] );
		$instance['comments'] = intval( $new_instance['comments'] );
		$instance['date'] = intval( $new_instance['date'] );
		$instance['days'] = intval( $new_instance['days'] );
		$instance['show_thumb'] = intval( $new_instance['show_thumb'] );
		return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$comments = $instance['comments'];
		$date = $instance['date'];
		$days = $instance['days'];
		$qty = (int) $instance['qty'];
		$show_thumb = (int) $instance['show_thumb'];

		echo $before_widget;
		if ( ! empty( $title ) ) echo $before_title . $title . $after_title;
		echo self::get_popular_posts( $qty, $comments, $date, $days, $show_thumb );
		echo $after_widget;
	}

	public function get_popular_posts( $qty, $comments, $date, $days, $show_thumb ) {

		global $post;
 	        $popular_days = array();
		if ( $days ) {
			$popular_days = array(
        		//set date ranges
        		'after' => "$days day ago",
        		'before' => 'today',
        		//allow exact matches to be returned
        		'inclusive' => true,
        	);
		}
		
		$popular = get_posts( array( 
    	   	     'suppress_filters' => false, 
      		     'ignore_sticky_posts' => 1, 
      		     'orderby' => 'comment_count', 
       		     'numberposts' => $qty,
       		     'date_query' => $popular_days) );

		echo '<div class="widget-container recent-posts-wrap"><ul>';
		foreach($popular as $post) :
			setup_postdata($post);
		?>
			<?php echo '<li class="post-box horizontal-container">'; ?>
				<?php if ( $show_thumb == 1 ) : ?>
				<div class="widget-post-img">
					<a rel="nofollow" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<img width="70" height="70" src="<?php echo hassium_get_thumbnail( 'tiny' ); ?>" class="attachment-featured wp-post-image" alt="<?php the_title_attribute(); ?>">				
						<?php $format = get_post_format( $post->ID );
						hassium_post_format_icon( $format ); ?>
					</a>
				</div>
				<?php endif; ?>
					<div class="widget-post-data">
						<h4><a rel="nofollow" href="<?php the_permalink()?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<?php if ( $date == 1 || $comments == 1 ) : ?>
							<div class="widget-post-info">
								<?php if ( $date == 1 ) :
									echo '<span class="posted">'. hassium_posted() .'</span>';
								endif; ?>
								<?php if ( $comments == 1 ) :
									echo '<span class="comments"><i class="icon icon-comment"></i>'. hassium_entry_comments() .' comments</span>';
								endif; ?>
							</div> <!--end .post-info-->
						<?php endif; ?>
					</div>
			<?php endforeach; 
		wp_reset_postdata();
		echo '</ul></div>'."\r\n";
	}

}
add_action( 'widgets_init', create_function( '', 'register_widget( "hassium_popular_posts_widget" );' ) );