<?php
/**
 * Hassium functions and definitions
 *
 * @package Hassium
 */

	/*-----------------------------------------------------------------------------------*/
	/* Sets up theme defaults and registers support for various WordPress features.
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'material_setup' ) ) {
		function material_setup() {

			// Make theme available for translation.
			load_theme_textdomain( 'hassium', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Let WordPress manage the document title.
			add_theme_support( 'title-tag' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'hassium' ),
			'mobile-menu' => __( 'Mobile Menu', 'hassium' )
			) );

			// Switch default core markup for search form, comment form, and comments to output valid HTML5.
			add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
			) );

			// Enable support for Post Formats.
			add_theme_support( 'post-formats', array(
			'video',
			) );

			// Add support for Jetpack's infinite scroll
			add_theme_support( 'infinite-scroll', array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => true,
				'render'         => false,
				'posts_per_page' => false
			) );
		}
	}
	add_action( 'after_setup_theme', 'material_setup' );

	/*-----------------------------------------------------------------------------------*/
	/*  Set the content width based on the theme's design and stylesheet.
	/*-----------------------------------------------------------------------------------*/
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*-----------------------------------------------------------------------------------*/
	/*  Register Sidebar & Widget-areas
	/*-----------------------------------------------------------------------------------*/

	function material_widgets_init() {

		register_sidebar( array(
			'name'          => __( 'Main Sidebar', 'hassium' ),
			'id'            => 'sidebar',
			'description'   => 'Main Sidebar widget area.',
			'before_widget' => '<aside id="%1$s" class="widget sidebar-widget mdl-card mdl-shadow--2dp mdl-grid mdl-cell mdl-cell--12-col %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3><div class="thin-bar"></div></div>',
		) );
	}
	add_action( 'widgets_init', 'material_widgets_init' );

	/*-----------------------------------------------------------------------------------*/
	/*  Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/

	function hassium_scripts() {

		// Loading jQuery
		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'material-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
		wp_enqueue_script( 'material-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Loading Google's font "Roboto"
    wp_enqueue_style( 'roboto_google_font', '//fonts.googleapis.com/css?family=Roboto:400italic,300,700,400', false, null, 'all' );

		// Loading MDL JS
		wp_enqueue_script( 'materialjs', get_template_directory_uri() . '/js/material.min.js' );

		// Loading Custom Scripts
		wp_enqueue_script( 'custom_scripts', get_template_directory_uri() . '/js/custom_scripts.js', array( 'jquery' ), '1.0.0', true );

    //Materialize
	 wp_enqueue_script( 'materializejs', get_template_directory_uri() . '/js/materialize.min.js' );

	 wp_enqueue_script( 'initjs', get_template_directory_uri() . '/js/init.js' );

	 wp_enqueue_script( 'matchheightjs', get_template_directory_uri() . '/js/jquery.matchHeight-min.js' );

   wp_enqueue_script( 'highchartjs', get_template_directory_uri() . '/js/highchart.js' );
	 //<script src="https://code.highcharts.com/highcharts.js"></script>
   //<script src="https://code.highcharts.com/modules/exporting.js"></script>

		// Loading MDL CSS ( based on selected Color Scheme )
		$theme_color = get_theme_mod( 'theme_color', 'indigo-pink' );
		if ( $theme_color == 'indigo-pink' ) {
			wp_enqueue_style('materialcss', get_template_directory_uri().'/css/material.indigo-pink.min.css');
		} elseif ( $theme_color == 'blue-indigo' ) {
			wp_enqueue_style('materialcss', get_template_directory_uri().'/css/material.blue-indigo.min.css');
		} elseif ( $theme_color == 'bluegrey-teal' ) {
			wp_enqueue_style('materialcss', get_template_directory_uri().'/css/material.bluegrey-teal.min.css');
		} elseif ( $theme_color == 'red-deeporange' ) {
			wp_enqueue_style('materialcss', get_template_directory_uri().'/css/material.red-deeporange.min.css');
		} elseif ( $theme_color == 'purple-blue' ) {
			wp_enqueue_style('materialcss', get_template_directory_uri().'/css/material.purple-blue.min.css');
		} elseif ( $theme_color == 'green-lightgreen' ) {
			wp_enqueue_style('materialcss', get_template_directory_uri().'/css/material.green-lightgreen.min.css');
		}

		// Loading Material icons
     wp_enqueue_style( 'materialicons', '//fonts.googleapis.com/icon?family=Material+Icons', false, null, 'all' );

		// Loading the Stylesheet
		wp_enqueue_style( 'material-style', get_stylesheet_uri() );

		// Loading Custom font icons
		wp_enqueue_style( 'fonticons', get_template_directory_uri().'/css/fontello.css' );

		wp_enqueue_style( 'materializecss', get_template_directory_uri().'/css/materialize.css' );

   wp_enqueue_style( 'stylecss', get_template_directory_uri().'/css/style.css' );

   // wp_enqueue_style( 'stylecss', get_template_directory_uri().'/css/animate.css' );

	}
	add_action( 'wp_enqueue_scripts', 'hassium_scripts' );

	/*-----------------------------------------------------------------------------------*/
	/*  Custom template tags for this theme.
	/*-----------------------------------------------------------------------------------*/
	require get_template_directory() . '/inc/template-tags.php';

	/*-----------------------------------------------------------------------------------*/
	/*  Custom functions that act independently of the theme templates.
	/*-----------------------------------------------------------------------------------*/
	require get_template_directory() . '/inc/extras.php';

	/*-----------------------------------------------------------------------------------*/
	/*  Load Jetpack compatibility file.
	/*-----------------------------------------------------------------------------------*/
	require get_template_directory() . '/inc/jetpack.php';

	/*-----------------------------------------------------------------------------------*/
	/*  Add Post Thumbnail Support
	/*-----------------------------------------------------------------------------------*/
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'featured', 218, 181, true ); 	//featured image
		add_image_size( 'small', 120, 120, true ); 		//small thumb
		add_image_size( 'tiny', 70, 70, true ); 		//tiny thumb
	}

	/*-----------------------------------------------------------------------------------*/
	/*  Loading theme widgets.
	/*-----------------------------------------------------------------------------------*/

	// Add the Social Widget
	include("functions/widget-socialicons.php");

	// Add Recent Posts Widget
	include("functions/widget-recentposts.php");

	// Add Popular Posts Widget
	include("functions/widget-popularposts.php");

	// Add the Login Widget
	include("functions/widget-login.php");


	/*-----------------------------------------------------------------------------------*/
	/*  adding MDL classes to some HTML elements
	/*-----------------------------------------------------------------------------------*/

	function material_add_mdl_classes() { ?>
		<script type="text/javascript">
		jQuery(document).ready(function() {

			// Buttons
			jQuery('button, html input[type="button"], input[type="reset"], input[type="submit"], .next_prev_post a').addClass('mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored');
			jQuery('.search-submit, .post-actions').removeClass('mdl-button--raised mdl-js-ripple-effect mdl-button--colored');

			//Textfields
			jQuery('input[type="text"], input[type="password"],textarea').addClass('mdl-textfield__input');

			// Extracting main & accent colors & dynamically set the background-color/color style for some elements.
			var mainColor = jQuery('header').css( "background-color" );
			jQuery(".featured").css("background-color", mainColor );
			jQuery(".widget .thin-bar").css("border-color", mainColor );

			jQuery(".main-navigation li ul li").mouseenter(function() {
				jQuery(this).css("background-color", mainColor );
			}).mouseleave(function() {
				 jQuery(this).css("background-color", "transparent" );
			});

			// Adding MDL buttons classes to nav-links and its links.
			jQuery('.nav-links a').addClass('mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect');
			jQuery('.page-numbers.dots').addClass('mdl-button mdl-js-button mdl-button--raised');
			jQuery('.nav-links .current').addClass('mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect');
		});
		</script>
	<?php }
	add_action('wp_head', 'material_add_mdl_classes');

	/*-----------------------------------------------------------------------------------*/
	/*  Common Functions
	/*-----------------------------------------------------------------------------------*/

	// Print Thumbnail/Featured image
	if (!function_exists('hassium_get_thumbnail')) {
		function hassium_get_thumbnail( $size = 'featured' ) {
			global $post;

			// This variable will be used only if the post has no featured image already set.
			$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
			if ( $size == 'featured' ) {

				if (has_post_thumbnail( $post->ID ) ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
					$image = $image[0];
				}
				// use first attached image if no featured image was already set.
				elseif ( !empty($images) ) {
					$image = reset($images);
					$image = wp_get_attachment_image_src( $image->ID, $size );
					$image = $image[0];
				} else {
					$image = get_template_directory_uri() . '/images/nothumb-218x181.png';
				}

			} elseif ( $size == 'small' ) {

				if (has_post_thumbnail( $post->ID ) ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
					$image = $image[0];
				}
				// use first attached image if no featured image was already set.
				elseif ( !empty($images) ) {
					$image = reset($images);
					$image = wp_get_attachment_image_src( $image->ID, $size );
					$image = $image[0];
				} else {
					$image = get_template_directory_uri() . '/images/nothumb-120x120.png';
				}

			} else {

				if (has_post_thumbnail( $post->ID ) ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
					$image = $image[0];
				}
				// use first attached image if no featured image was already set.
				elseif ( !empty($images) ) {
					$image = reset($images);
					$image = wp_get_attachment_image_src( $image->ID, $size );
					$image = $image[0];
				} else {
					$image = get_template_directory_uri() . '/images/nothumb-70x70.png';
				}

			}
			return $image;
		}
	}

	// Get first Video from Video Posts
	if (!function_exists('hassium_get_first_embed_video')) {
		function hassium_get_first_embed_video( $post_id ) {
			$post = get_post( $post_id );
			$content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
			$embeds = get_media_embedded_in_content( $content );
			if( !empty( $embeds ) ) {
				//check what is the first embed containg video tag, youtube or vimeo
				foreach( $embeds as $embed ) {
					if ( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) || strpos( $embed, 'dailymotion' ) || strpos( $embed, 'vine' ) || strpos( $embed, 'wordPress.tv' ) || strpos( $embed, 'hulu' )) {
						return $embed;
					}
				}
			} else {
				//No video embedded found
				return ;
			}
		}
	}

	// Truncate string to x letters/words.
	function hassium_truncate( $str, $length = 40, $units = 'letters', $ellipsis = '&nbsp;&hellip;' ) {
		if ( $units == 'letters' ) {
			if ( mb_strlen( $str ) > $length ) {
				return mb_substr( $str, 0, $length ) . $ellipsis;
				} else {
				return $str;
			}
			} else {
			$words = explode( ' ', $str );
			if ( count( $words ) > $length ) {
				return implode( " ", array_slice( $words, 0, $length ) ) . $ellipsis;
				} else {
				return $str;
			}
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*  Post Format Icon
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'hassium_post_format_icon' ) ) {
		function hassium_post_format_icon( $format = 'format' ) {
			if ( $format == 'video' ) {
				$icon = '<i class="material-icons">play_circle_filled</i>';
			} else {
				$icon = '<i class="material-icons">description</i>';
			}
			echo '<div class="post-format">' . $icon . '</div>';
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*  Breadcrumbs
	/*-----------------------------------------------------------------------------------*/
	if (!function_exists('hassium_breadcrumb')) {
		function hassium_breadcrumb() {
			echo '<div typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="';
			echo home_url();
			echo '">'.sprintf( __( "Home","hassium"));
			echo '</a></div><div>></div>';
			if (is_category() || is_single()) {
				$categories = get_the_category();
				$output = '';
				if($categories){
					echo '<div typeof="v:Breadcrumb"><a href="'.get_category_link( $categories[0]->term_id ).'" rel="v:url" property="v:title">'.$categories[0]->cat_name.'</a></div><div>></div>';
				}
				if (is_single()) {
					echo "<div typeof='v:Breadcrumb'><span property='v:title'>";
					the_title();
					echo "</span></div>";
				}
				} elseif (is_page()) {
				echo "<div typeof='v:Breadcrumb'><span property='v:title'>";
				the_title();
				echo "</span></div>";
			}
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*  Excerpt
	/*-----------------------------------------------------------------------------------*/

	// Remove [...] & shortcodes.
	function hassium_custom_excerpt( $output ) {
		return preg_replace( '/\[[^\]]*]/', '', $output );
	}
	add_filter( 'get_the_excerpt', 'hassium_custom_excerpt' );
	remove_filter('the_excerpt', 'wpautop');

	if ( ! function_exists( 'hassium_excerpt' ) ) {
		function hassium_excerpt( $limit = 30 ) {
			return hassium_truncate( get_the_excerpt(), $limit, 'words' );
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*   Header Area
	/*-----------------------------------------------------------------------------------*/

	// Display logo.
	if ( ! function_exists( 'hassium_logo' ) ) {
		function hassium_logo() {
			$logo_image = get_theme_mod( 'logo_image' );
			if ($logo_image) { ?>
				<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" rel="nofollow">
					<img src="<?php echo esc_url( $logo_image ); ?>" alt="<?php bloginfo('name'); echo ' - '; bloginfo('description'); ?>" />
				</a>
			<?php } else { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php }
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*  Homepage & Archives Settings
	/*-----------------------------------------------------------------------------------*/

	//Display meta info if enabled.
	if ( ! function_exists( 'hassium_archives_meta' ) ) {
		function hassium_archives_meta( $post_id ) {
			$archives_meta = get_theme_mod( 'archives_post_meta', '1' );
			if ( $archives_meta ) { ?>
				<div class="entry-meta post-info">
				<?php
					echo '<span class="theauthor"><i class="icon icon-user"></i>'. hassium_entry_author() .'</span>';
					echo '<span class="posted">'. hassium_posted() .'</span>';
					echo '<span class="comments"><i class="icon icon-comment"></i>'. hassium_entry_comments() .'</span>';
					_e(' in ', 'hassium');
					$category = get_the_category( $post_id );
					if( !empty( $category[0] ) ) {
						echo '<span class="category"><a class="chip" href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "hassium" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a></span>';
					} ?>
				</div><!-- .entry-meta -->
			<?php }
		}
	}

	//Display the Excerpt.
	if ( ! function_exists( 'archives_excerpt' ) ) {
		function archives_excerpt() {
			$length = get_theme_mod( 'excerpt_length', 20 );
			if ( $length && intval( $length ) >= 5 && intval( $length ) <= 120  ) {
			echo hassium_excerpt( $length );
			}
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*  Single Post Settings
	/*-----------------------------------------------------------------------------------*/

	//Display meta info if enabled.
	if ( ! function_exists( 'hassium_post_meta' ) ) {
		function hassium_post_meta() {
			$post_meta = get_theme_mod( 'post_meta', '1' );
			if ( $post_meta ) { ?>
				<div class="entry-meta post-info">
				<?php
					echo '<span class="theauthor"><i class="icon icon-user"></i>'. hassium_entry_author() .'</span>';
					echo '<span class="posted">'. hassium_posted() .'</span>';
					echo '<span class="comments"><i class="icon icon-comment"></i>'. hassium_entry_comments() .' comments</span>';
					echo hassium_entry_tags();
				?>
				</div><!-- .entry-meta -->
			<?php }
		}
	}

	//Display related posts if enabled.
	if ( ! function_exists( 'hassium_related_posts' ) ) {
		function hassium_related_posts() {
			$related_posts = get_theme_mod( 'related_posts', '1' );
			$related_posts_number = get_theme_mod( 'related_posts_number', '4' );
			$related_posts_query = get_theme_mod( 'related_posts_query', 'tags' );

			if ( $related_posts && intval( $related_posts_number ) > 0 && intval( $related_posts_number ) <= 6 ) {
				if ( $related_posts_query && $related_posts_query == 'tags') {
					// Query type: Tags
					global $post;
					$orig_post = $post;
					$tags = wp_get_post_tags($post->ID);
					if ($tags) {
						$tag_ids = array();
						foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
						$args=array(
						'tag__in' => $tag_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page'=> $related_posts_number, // Number of related posts that will be displayed.
						'ignore_sticky_posts'=>1,
						'orderby'=>'rand' // Randomize the posts
						);
						$my_query = new wp_query( $args );
						if( $my_query->have_posts() ) { ?>
							<h3 class="section-title margin-8"><?php _e("Related Posts", "hassium") ?></h3>
							<div id="related_posts" class="related-posts mdl-grid mdl-cell mdl-cell--12-col">
								<?php while( $my_query->have_posts() ) {
								$my_query->the_post(); ?>
								<div class="related-item mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
										<div class="relatedthumb">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<img width="120" height="120" src="<?php echo hassium_get_thumbnail( 'small' ); ?>" class="attachment-featured wp-post-image" alt="<?php the_title_attribute(); ?>">
												<?php $format = get_post_format( $post->ID );
												hassium_post_format_icon( $format ); ?>
											</a>
										</div>
										<div class="post-data-container">
											<h4>
												<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
											</h4>
											<div class="post-info">
												<div class="meta-info">
													<?php echo '<span class="posted">'. hassium_posted() .'</span>';
													echo '<span class="comments"><i class="icon icon-comment"></i>'. hassium_entry_comments() .'</span>'; ?>
												</div>
											</div>
										</div>
								</div>
							<?php }
							echo '</div>';
						}
					}

					$post = $orig_post;
					wp_reset_query();

				} else {
					// Query type: Categories
					global $post;
					$orig_post = $post;
					$categories = get_the_category($post->ID);
					if ($categories) {
						$category_ids = array();
						foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
						$args=array(
						'category__in' => $category_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page'=> $related_posts_number, // Number of related posts that will be displayed.
						'ignore_sticky_posts'=>1,
						'orderby'=>'rand' // Randomize the posts
						);
						$my_query = new wp_query( $args );
						if( $my_query->have_posts() ) { ?>
							<h3 class="section-title margin-8"><?php _e("Related Posts", "hassium") ?></h3>
							<div id="related_posts" class="related-posts mdl-grid mdl-cell mdl-cell--12-col">
								<?php while( $my_query->have_posts() ) {
								$my_query->the_post(); ?>
								<div class="related-item mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone">
										<div class="relatedthumb">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<img width="120" height="120" src="<?php echo hassium_get_thumbnail( 'small' ); ?>" class="attachment-featured wp-post-image" alt="<?php the_title_attribute(); ?>">
												<?php $format = get_post_format( $post->ID );
												hassium_post_format_icon( $format ); ?>
											</a>
										</div>
										<div class="post-data-container">
											<h4>
												<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
											</h4>
											<div class="post-info">
												<div class="meta-info">
													<?php echo '<span class="posted">'. hassium_posted() .'</span>';
													echo '<span class="comments"><i class="icon icon-comment"></i>'. hassium_entry_comments() .'</span>'; ?>
												</div>
											</div>
										</div>
								</div>
							<?php }
							echo '</div>';
						}
					}
					$post = $orig_post;
					wp_reset_query();
				}
			}
		}
	}

	//Display Post Next/Prev buttons if enabled.
	if ( ! function_exists( 'hassium_next_prev_post' ) ) {
		function hassium_next_prev_post() {
			$next_prev_post = get_theme_mod( 'next_prev_post', '1' );
			if ( $next_prev_post ) {  ?>
				<div class="next_prev_post mdl-grid mdl-cell mdl-cell--12-col">
					<?php previous_post_link( '<div class="left-button">'.__('%link','hassium').'</div>', __('Previous Post','hassium') );
					echo '<div class="mdl-layout-spacer"></div>';
					next_post_link( '<div class="right-button">'.__('%link','hassium').'</div>', __('Next Post','hassium') ); ?>
				</div><!-- .next_prev_post -->
			<?php }
		}
	}

	//Display Author box if enabled.
	if ( ! function_exists( 'hassium_author_box' ) ) {
		function hassium_author_box() {
			$author_box = get_theme_mod( 'author_box', '1' );
			if ( $author_box ) { ?>
				<div class="author-box mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
					<div class="author-box-wrap mdl-grid">
						<div class="author-box-avatar mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--2-col-phone">
						<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '120' );  } ?>
						</div>
						<div class="author-box-content mdl-cell--9-col-desktop mdl-cell--5-col-tablet mdl-cell--2-col-phone">
							<div class="author">
								<?php _e('Written By:', 'hassium'); ?>
								<div class="vcard clearfix">
									<?php if( get_the_author_link() ) { ?>
										<a href="<?php echo get_the_author_meta( 'user_url' ); ?>" rel="nofollow" class="fn"><strong><?php the_author_meta( 'nickname' ); ?></strong></a>
									<?php } else { ?>
										<strong><?php the_author_meta( 'nickname' ); ?></strong>
									<?php }?>
								</div>
							</div>
							<?php if( get_the_author_meta( 'description' ) ) { ?>
								<p><?php the_author_meta('description') ?></p>
							<?php }?>
						</div>
					</div>
					<div class="mdl-card__actions mdl-card--border">
						<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">View Posts</a>
						<?php if( get_the_author_meta( 'facebook' ) ) { ?>
							<ul class="author-btns">
								<?php if( get_the_author_meta( 'facebook' ) ) { ?>
									<li>
										<a class="facebook" title="Facebook" href="<?php the_author_meta('facebook') ?>" target="_blank"><i class="icon icon-facebook"></i></a>
									</li>
								<?php }?>

								<?php if( get_the_author_meta( 'twitter' ) ) { ?>
									<li>
										<a class="twitter" title="Twitter" href="<?php the_author_meta('twitter') ?>" target="_blank"><i class="icon icon-twitter-1"></i></a>
									</li>
								<?php }?>

								<?php if( get_the_author_meta( 'googleplus' ) ) { ?>
									<li>
										<a class="gplus" title="Google+" href="<?php the_author_meta('googleplus') ?>" target="_blank"><i class="icon icon-gplus-1"></i></a>
									</li>
								<?php }?>
							</ul>
						<?php }?>
					</div>
				</div>
			<?php }
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*  Custom Comments template
	/*-----------------------------------------------------------------------------------*/

	function hassium_custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-box mdl-shadow--2dp">
            <div class="comment-author vcard clearfix">
                <?php echo get_avatar( $comment->comment_author_email, 80 ); ?>
				<?php global $post;
				if( $comment->user_id === $post->post_author ) {
					printf(__('<span class="fn">%s</span><span class="commenter_is_author">Author</span>', 'hassium'), get_comment_author_link());
				} else {
					printf(__('<span class="fn">%s</span>', 'hassium'), get_comment_author_link());
				} ?>

				<span class="ago"><?php comment_date(get_option( 'date_format' )); ?></span>

                <span class="comment-meta">
                    <?php edit_comment_link(__('(Edit)', 'hassium'),'  ',''); ?>
                    <?php
						$args['reply_text'] = '<i class="fa fa-mail-forward"></i> '. __('Reply', 'hassium');
						comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
					?>
				</span>
			</div>
            <?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.', 'hassium') ?></em>
			<br />
            <?php endif; ?>
            <div class="commentmetadata">
                <?php comment_text() ?>
			</div>
		</div>
	</li>
	<?php }

	/*-----------------------------------------------------------------------------------*/
	/*  Footer Area
	/*-----------------------------------------------------------------------------------*/

	if ( ! function_exists( 'hassium_copyrights' ) ) {
		function hassium_copyrights() { ?>
				<div id="copyright-note">
					<div class="left">
						<?php $footer_left = get_theme_mod( 'footer_left', 'Proudly powered by <a href="http://wordpress.org/" rel="generator">WordPress</a>' );
						echo $footer_left; ?>
					</div>
					<div class="right">
						<?php _e( 'Hassium theme by <a href="http://hiteshsahu.com">Hitesh Sahu</a>', 'hassium' );?>
					</div>
				</div>
			<?php
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/*  Load WP Customizer
	/*-----------------------------------------------------------------------------------*/
	require get_template_directory() . '/inc/customizer.php';

	/*-----------------------------------------------------------------------------------*/
	/*  That's All, Bye!
	/*-----------------------------------------------------------------------------------*/
