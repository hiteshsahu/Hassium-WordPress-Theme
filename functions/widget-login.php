<?php
/*-----------------------------------------------------------------------------------

	Plugin Name: Hassium Login
	Description: A widget that displays a login form.
	Version: 1.0

-----------------------------------------------------------------------------------*/


class hassium_login_widget extends WP_Widget{
	
	public function __construct() {
		parent::__construct(
	 		'hassium_login_widget',
			__( 'Hassium: Login Widget','hassium' ),
			array( 'description' => __( 'Display a login/register form on the sidebar.','hassium' ) )
		);
	}

	public function form( $instance ){

		$defaults = array(
			'title' => 'Login',
			'show_avatar' => 1,
			'show_user' => 1,
			'show_remember' => 1,
			'show_register' => 1,
			'show_forgot' => 1,
			'show_dash' => 1,
			'show_profile' => 1
		);
		$instance = wp_parse_args((array) $instance, $defaults);
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Login','hassium' );
		$show_avatar = isset( $instance[ 'show_avatar' ] ) ? esc_attr( $instance[ 'show_avatar' ] ) : 1;
		$show_user = isset( $instance[ 'show_user' ] ) ? esc_attr( $instance[ 'show_user' ] ) : 1;
		$show_remember = isset( $instance[ 'show_remember' ] ) ? esc_attr( $instance[ 'show_remember' ] ) : 1;
		$show_register = isset( $instance[ 'show_register' ] ) ? esc_attr( $instance[ 'show_register' ] ) : 1;
		$show_forgot = isset( $instance[ 'show_forgot' ] ) ? esc_attr( $instance[ 'show_forgot' ] ) : 1;
		$show_dash = isset( $instance[ 'show_dash' ] ) ? esc_attr( $instance[ 'show_dash' ] ) : 1;
		$show_profile = isset( $instance[ 'show_profile' ] ) ? esc_attr( $instance[ 'show_profile' ] ) : 1; ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','hassium' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("show_avatar"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_avatar"); ?>" name="<?php echo $this->get_field_name("show_avatar"); ?>" value="1" <?php if (isset($instance['show_avatar'])) { checked( 1, $instance['show_avatar'], true ); } ?> />
				<?php _e( 'Show Avatar', 'hassium'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("show_user"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_user"); ?>" name="<?php echo $this->get_field_name("show_user"); ?>" value="1" <?php if (isset($instance['show_user'])) { checked( 1, $instance['show_user'], true ); } ?> />
				<?php _e( 'Show Logged in User name', 'hassium'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("show_dash"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_dash"); ?>" name="<?php echo $this->get_field_name("show_dash"); ?>" value="1" <?php if (isset($instance['show_dash'])) { checked( 1, $instance['show_dash'], true ); } ?> />
				<?php _e( 'Show Dashboard Link', 'hassium'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("show_profile"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_profile"); ?>" name="<?php echo $this->get_field_name("show_profile"); ?>" value="1" <?php if (isset($instance['show_profile'])) { checked( 1, $instance['show_profile'], true ); } ?> />
				<?php _e( 'Show Profile Link', 'hassium'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("show_remember"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_remember"); ?>" name="<?php echo $this->get_field_name("show_remember"); ?>" value="1" <?php if (isset($instance['show_remember'])) { checked( 1, $instance['show_remember'], true ); } ?> />
				<?php _e( 'Show Remember me', 'hassium'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("show_register"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_register"); ?>" name="<?php echo $this->get_field_name("show_register"); ?>" value="1" <?php if (isset($instance['show_register'])) { checked( 1, $instance['show_register'], true ); } ?> />
				<?php _e( 'Show Register Link', 'hassium'); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("show_forgot"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_forgot"); ?>" name="<?php echo $this->get_field_name("show_forgot"); ?>" value="1" <?php if (isset($instance['show_forgot'])) { checked( 1, $instance['show_forgot'], true ); } ?> />
				<?php _e( 'Show Forgotten Password Link', 'hassium'); ?>
			</label>
		</p>

	<?php }

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_avatar'] = intval( $new_instance['show_avatar'] );
		$instance['show_user'] = intval( $new_instance['show_user'] );
		$instance['show_remember'] = intval( $new_instance['show_remember'] );
		$instance['show_register'] = intval( $new_instance['show_register'] );
		$instance['show_forgot'] = intval( $new_instance['show_forgot'] );
		$instance['show_dash'] = intval( $new_instance['show_dash']);
		$instance['show_profile'] = intval( $new_instance['show_profile'] );
		return $instance;
	}

	public function widget( $args, $instance ){
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );	
		$show_avatar = (int) $instance['show_avatar'];		
		$show_user = (int) $instance['show_user'];		
		$show_remember = (int) $instance['show_remember'];		
		$show_register = (int) $instance['show_register'];		
		$show_forgot = (int) $instance['show_forgot'];		
		$show_dash = (int) $instance['show_dash'];
		$show_profile = (int) $instance['show_profile'];

		global $user_login;

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Login','hassium' );

		if( is_user_logged_in() ){
			$user_info = get_user_by( 'login', $user_login );

			$title = ( !empty( $user_info->first_name ) || !empty( $user_info->last_name) )? __('Welcome','hassium')." ".$user_info->first_name." ".$user_info->last_name : __('Welcome','hassium')." ".$user_login;
		}

		echo $before_widget;
			echo $before_title;
				echo $title;
			echo $after_title;
			
			echo '<div class="widget-container login-wrap mdl-cell mdl-cell--12-col">';
				$redirect = site_url();
				if ( isset( $_GET['login'] ) ) {
					
					$login = $_GET['login']; // This variable is used when login failure occurs
					$current_error = $_GET['errcode']; // This variable is used to display the type of error during login
					
					if ( $login == 'failed' ){
						
						if ( $current_error == "empty_username" || $current_error == "empty_password" ){
							$error_msg = __( 'Enter both Username and Password', 'hassium' );
						}
						elseif( $current_error == 'invalid_username' ){
							$error_msg = __( 'Username is not registered', 'hassium' );
						}
						elseif( $current_error == 'incorrect_password' ){
							$error_msg = __( 'Incorrect Password', 'hassium' );
						}
							
						echo "<div id='message' class='error fade'><p><strong>".$error_msg."</strong></p></div>";
					
					}
				
				}

				// Check if user is logged in then show user information and logout,dashboard and profile link
				if ( is_user_logged_in() ) {

					if ( $show_avatar == 1 ) {
						echo '<div class="avatar">' . get_avatar( $user_info->ID, apply_filters( 'login_widget_avatar_size', 80 ) ) . '</div>';
					}

					echo '<div class="login-info">';
					if( $show_user == 1 ){	
						_e( 'Logged in as ', 'hassium' );
						echo '<strong>' . ucfirst( implode(', ', $user_info->roles)) . '</strong> <br>';
					} ?>
						
					<ul id="<?php if( $show_avatar == 1 ) echo 'sidebar-login-links'; else echo 'sidebar-login-links-left'; ?>">
						<?php if( $show_dash == 1 ) { ?>
							<li><a href="<?php echo admin_url() ?>"><?php _e( 'Dashboard' , 'hassium' ) ?> </a>|</li>
						<?php }
						if( $show_profile == 1 ) { ?>
							<li><a href="<?php echo admin_url() ?>profile.php"><?php _e( 'Profile' , 'hassium' ) ?> </a>|</li>
						<?php } ?>	
							<li><a href="<?php echo wp_logout_url($redirect); ?>"><?php _e( 'Logout' , 'hassium' ) ?> </a></li>
					</ul>
					<?php echo "</div>";					
						
				}
				// If user is not logged in then show login form
				else {
					$remember_val = ( $show_remember == 1 ) ? true : false; 
					
					wp_login_form(array( 'value_remember' => 0,
								 'redirect' => $redirect,
								 'label_username' 	=> __( 'Username', 'hassium' ),
								 'label_password' 	=> __( 'Password', 'hassium' ),
								 'remember' 	=> $remember_val
								));
					?>
					<p id="reglostpass" class="reglostpass">
						<?php
						if ( $show_register == 1 ) echo '<a href="' . wp_registration_url() . '" title="Register">'.__('Register', 'hassium').'</a>';
						if ( $show_register == 1 && $show_forgot == 1 )echo " |  ";
						if ( $show_forgot == 1 ) echo '<a href="' . wp_lostpassword_url($redirect) . '?sli=lost" rel="nofollow" title="Forgot Password">' . __('Forgot Password?','hassium') . '</a>';
						?>
					</p>
					<?php
				}

		echo '</div>';
		echo $after_widget;		
	}
}
add_action( 'widgets_init', create_function( '', 'register_widget( "hassium_login_widget" );' ) );

add_action('wp_login_failed', 'handle_login_failure');

// This method will handle the login failure process. 
function handle_login_failure($username){
	// check what page the login attempt is coming from
  	global $current_error;
	$referrer = $_SERVER['HTTP_REFERER'];
	 
	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
		wp_redirect(home_url() . '/?login=failed&errcode='.$current_error );
		exit;
	}
}

if ( !function_exists('wp_authenticate') ) {
	function wp_authenticate($username, $password) {
		global $current_error;
		$username = sanitize_user($username);
		$password = trim($password);
		$user = apply_filters('authenticate', null, $username, $password);
		if ( $user == null ) {
			$user = new WP_Error('authentication_failed', __('<strong>ERROR</strong>: Invalid username or incorrect password.', 'hassium' ));
		}
		$ignore_codes = array('empty_username', 'empty_password', 'invalid_username', 'incorrect_password');
		
		if (is_wp_error($user) && in_array($user->get_error_code(), $ignore_codes) ) {
			$current_error = $user->get_error_code();
			do_action('wp_login_failed', $username);
		}

		return $user;
	}
}
?>