<?php
/*-----------------------------------------------------------------------------------

	Plugin Name: Hassium Recent Posts
	Description: A widget that displays your recent posts.
	Version: 1.0

-----------------------------------------------------------------------------------*/

class hassium_recent_posts_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'hassium_recent_posts_widget',
			__('Hassium: Recent Posts', 'hassium'),
			array( 'description' => __( 'Display the most recent posts from all categories.', 'hassium' ) )
		);
	}

 	public function form( $instance ) {
		$defaults = array(
			'comments' => 1,
			'date' => 1,
			'show_thumb' => 1,
		);
		$instance = wp_parse_args((array) $instance, $defaults);
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Recent Posts', 'hassium' );
		$qty = isset( $instance[ 'qty' ] ) ? intval( $instance[ 'qty' ] ) : 5;
		$comments = isset( $instance[ 'comments' ] ) ? esc_attr( $instance[ 'comments' ] ) : 1;
		$date = isset( $instance[ 'date' ] ) ? esc_attr( $instance[ 'date' ] ) : 1;
		$show_thumb = isset( $instance[ 'show_thumb' ] ) ? esc_attr( $instance[ 'show_thumb' ] ) : 1;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','hassium' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'qty' ); ?>"><?php _e( 'Number of Posts to show','hassium' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'qty' ); ?>" name="<?php echo $this->get_field_name( 'qty' ); ?>" type="number" min="1" max="10" step="1" value="<?php echo $qty; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("show_thumb"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_thumb"); ?>" name="<?php echo $this->get_field_name("show_thumb"); ?>" value="1" <?php if (isset($instance['show_thumb'])) { checked( 1, $instance['show_thumb'], true ); } ?> />
				<?php _e( 'Show Thumbnails', 'hassium'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("date"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date"); ?>" name="<?php echo $this->get_field_name("date"); ?>" value="1" <?php checked( 1, $instance['date'], true ); ?> />
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
		$instance['show_thumb'] = intval( $new_instance['show_thumb'] );
		return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$comments = $instance['comments'];
		$date = $instance['date'];
		$qty = (int) $instance['qty'];
		$show_thumb = (int) $instance['show_thumb'];

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts','hassium' );
		
		echo $before_widget;
		if ( ! empty( $title ) ) echo $before_title . $title . $after_title;
		echo self::get_cat_posts( $qty, $comments, $date, $show_thumb);
		echo $after_widget;
	}

	public function get_cat_posts( $qty, $comments, $date, $show_thumb) {

		global $post;
		$posts = new WP_Query(
			"orderby=date&order=DESC&posts_per_page=". ($qty - 1)
		);

		echo '<div class="widget-container recent-posts-wrap"><ul>';
		
		while ( $posts->have_posts() ) { $posts->the_post(); ?>
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
							</div><!--end .widget-post-info-->
						<?php endif; ?>
					</div>
			<?php echo '</li>'; ?>
		<?php }
		wp_reset_postdata();
		echo '</ul></div>'."\r\n";
	}
}
add_action( 'widgets_init', create_function( '', 'register_widget( "hassium_recent_posts_widget" );' ) );