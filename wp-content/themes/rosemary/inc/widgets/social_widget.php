<?php
/**
 * Plugin Name: Social Widget
 */

add_action( 'widgets_init', 'solopine_social_load_widget' );

function solopine_social_load_widget() {
	register_widget( 'solopine_social_widget' );
}

class solopine_social_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function solopine_social_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'solopine_social_widget', 'description' => __('A widget that displays your social icons', 'solopine_social_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'solopine_social_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'solopine_social_widget', __('Rosemary: Social Icons', 'solopine_social_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$googleplus = $instance['googleplus'];
		$instagram = $instance['instagram'];
		$bloglovin = $instance['bloglovin'];
		$youtube = $instance['youtube'];
		$tumblr = $instance['tumblr'];
		$pinterest = $instance['pinterest'];
		$dribbble = $instance['dribbble'];
		$soundcloud = $instance['soundcloud'];
		$vimeo = $instance['vimeo'];
		$linkedin = $instance['linkedin'];
		$rss = $instance['rss'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
		
			<div class="social-widget">
				<?php if($facebook) : ?><a href="http://facebook.com/<?php echo get_theme_mod('sp_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if($twitter) : ?><a href="http://twitter.com/<?php echo get_theme_mod('sp_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if($instagram) : ?><a href="http://instagram.com/<?php echo get_theme_mod('sp_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if($pinterest) : ?><a href="http://pinterest.com/<?php echo get_theme_mod('sp_pinterest'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if($bloglovin) : ?><a href="http://bloglovin.com/<?php echo get_theme_mod('sp_bloglovin'); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
				<?php if($googleplus) : ?><a href="http://plus.google.com/<?php echo get_theme_mod('sp_google'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
				<?php if($tumblr) : ?><a href="http://<?php echo get_theme_mod('sp_tumblr'); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if($youtube) : ?><a href="http://youtube.com/<?php echo get_theme_mod('sp_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				<?php if($dribbble) : ?><a href="http://dribbble.com/<?php echo get_theme_mod('sp_dribbble'); ?>" target="_blank"><i class="fa fa-dribbble"></i></a><?php endif; ?>
				<?php if($soundcloud) : ?><a href="http://soundcloud.com/<?php echo get_theme_mod('sp_soundcloud'); ?>" target="_blank"><i class="fa fa-soundcloud"></i></a><?php endif; ?>
				<?php if($vimeo) : ?><a href="http://vimeo.com/<?php echo get_theme_mod('sp_vimeo'); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a><?php endif; ?>
				<?php if($linkedin) : ?><a href="<?php echo get_theme_mod('sp_linkedin'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
				<?php if($rss) : ?><a href="<?php echo get_theme_mod('sp_rss'); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php endif; ?>
        <link rel='stylesheet' type='text/css' href='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/css/signup-form.css'>
<div class="ctct-embed-signup" style="font: 13px Helvetica Neue, Arial, sans-serif; font: 1rem Helvetica Neue, Arial, sans-serif; line-height: 1.5; -webkit-font-smoothing: antialiased;">
   <div style="color:#5b5b5b; background-color:#e8e8e8; border-radius:5px;">
       <span id="success_message" style="display:none;">
           <div style="text-align:center;">Thanks for signing up!</div>
       </span>
       <form data-id="embedded_signup:form" class="ctct-custom-form Form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup">
           <h2 style="margin:0;">Subscribe to Unfiltered Wit Newsletter</h2>
           <p></p>
           <!-- The following code must be included to ensure your sign-up form works properly. -->
           <input data-id="ca:input" type="hidden" name="ca" value="c127debf-b161-4b7b-a114-39104d258c13">
           <input data-id="list:input" type="hidden" name="list" value="1">
           <input data-id="source:input" type="hidden" name="source" value="EFD">
           <input data-id="required:input" type="hidden" name="required" value="list,email">
           <input data-id="url:input" type="hidden" name="url" value="">
           <p data-id="Email Address:p" ><label data-id="Email Address:label" data-name="email" class="ctct-form-required">Email Address</label> <input data-id="Email Address:input" type="text" name="email" value="" maxlength="80"></p>
           <button type="submit" class="Button ctct-button Button--block Button-secondary" data-enabled="enabled">Sign Up</button>
       	<div><p class="ctct-form-footer">By submitting this form, you are granting: 1000ThingsToSayBeforeIDie.com, 2243 Ibis Isle Road East, Palm Beach, Florida, 33480, United States, http://www.1000thingstosaybeforeidie.com permission to email you. You may unsubscribe via the link found at the bottom of every email.  (See our <a href="http://www.constantcontact.com/legal/privacy-statement" target="_blank">Email Privacy Policy</a> for details.) Emails are serviced by Constant Contact.</p></div>
       </form>
   </div>
</div>
<script type='text/javascript'>
                                                                       var localizedErrMap = {};
                                                                       localizedErrMap['required'] = 'This field is required.';
                                                                       localizedErrMap['ca'] = 'An unexpected error occurred while attempting to send email.';
                                                                       localizedErrMap['email'] = 'Please enter your email address in name@email.com format.';
                                                                       localizedErrMap['birthday'] = 'Please enter birthday in MM/DD format.';
                                                                       localizedErrMap['anniversary'] = 'Please enter anniversary in MM/DD/YYYY format.';
                                                                       localizedErrMap['custom_date'] = 'Please enter this date in MM/DD/YYYY format.';
                                                                       localizedErrMap['list'] = 'Please select at least one email list.';
                                                                       localizedErrMap['generic'] = 'This field is invalid.';
                                                                       localizedErrMap['shared'] = 'Sorry, we could not complete your sign-up. Please contact us to resolve this.';
                                                                       localizedErrMap['state_mismatch'] = 'Mismatched State/Province and Country.';
                                                                       localizedErrMap['state_province'] = 'Select a state/province';
                                                                       localizedErrMap['selectcountry'] = 'Select a country';
                                                                       var postURL = 'https://visitor2.constantcontact.com/api/signup';
</script>
<script type='text/javascript' src='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/js/signup-form.js'></script>

			</div>
			
			
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
		$instance['instagram'] = strip_tags( $new_instance['instagram'] );
		$instance['bloglovin'] = strip_tags( $new_instance['bloglovin'] );
		$instance['youtube'] = strip_tags( $new_instance['youtube'] );
		$instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
		$instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
		$instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
		$instance['soundcloud'] = strip_tags( $new_instance['soundcloud'] );
		$instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
		$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
		$instance['rss'] = strip_tags( $new_instance['rss'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Subscribe & Follow', 'facebook' => 'on', 'twitter' => 'on', 'instagram' => 'on', );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>
		
		<p>Note: Set your social links in the Customizer</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Show Facebook:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" <?php checked( (bool) $instance['facebook'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Show Twitter:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" <?php checked( (bool) $instance['twitter'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>">Show Instagram:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" <?php checked( (bool) $instance['instagram'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>">Show Pinterest:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" <?php checked( (bool) $instance['pinterest'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'bloglovin' ); ?>">Show Bloglovin:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'bloglovin' ); ?>" name="<?php echo $this->get_field_name( 'bloglovin' ); ?>" <?php checked( (bool) $instance['bloglovin'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>">Show Google Plus:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" <?php checked( (bool) $instance['googleplus'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>">Show Tumblr:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" <?php checked( (bool) $instance['tumblr'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>">Show Youtube:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" <?php checked( (bool) $instance['youtube'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>">Show Dribbble:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" <?php checked( (bool) $instance['dribbble'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'soundcloud' ); ?>">Show Soundcloud:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'soundcloud' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud' ); ?>" <?php checked( (bool) $instance['soundcloud'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>">Show Vimeo:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" <?php checked( (bool) $instance['vimeo'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>">Show Linkedin:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" <?php checked( (bool) $instance['linkedin'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>">Show RSS:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" <?php checked( (bool) $instance['rss'], true ); ?> />
		</p>


	<?php
	}
}

?>