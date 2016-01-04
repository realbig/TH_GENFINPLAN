<?php
// add login link up top
add_action( 'woo_header_inside', 'gfp_login', 9 );
function gfp_login() {
	?>
	<div class='col-full top-login'>
		<div class="login-contact">
			<?php woo_add_header_phone_number(); ?>
			<a href='<?php echo get_permalink( 141 ); ?>' class='woo-sc-button aqua'>
				<span class='woo-'>Customer Login</span>
			</a>
		</div>
	</div>
<?php
}

// Move phone number above nav
add_action( 'woo_nav_before', 'gfp_ditch_phone' );
function gfp_ditch_phone() {
	remove_all_actions( 'woo_nav_after' );
}

// Staff links
function gfp_staff_links() {
	global $post;
	$gfp_staff = get_post( $post )->post_name;
	$gfp_id    = get_the_id();
	if ( $gfp_id === 13 OR $gfp_id === 6 OR $gfp_id === 14 ) : {
		?>
		<div class="widget staff-menu">
			<div class="inner">
				<?php wp_nav_menu( array( 'menu' => $gfp_staff ) ); ?>
			</div>
		</div>
	<?php
	}
	endif;
}

add_action( 'woo_sidebar_inside_before', 'gfp_staff_links' );

// Custom image size
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'intro-img', 180, 120, false );
}
// Financial Planning shortcode
function financial_planning() {
	?>
	<span class="LimelightEmbeddedPlayer">
	<script src="https://video.limelight.com/player/embed.js"></script>
	<object type="application/x-shockwave-flash" id="limelight_player_746472" name="limelight_player_746472"
	        class="LimelightEmbeddedPlayerFlash" width="360" height="203"
	        data="https://video.limelight.com/player/loader.swf">
		<param name="movie" value="https://video.limelight.com/player/loader.swf">
		<param name="wmode" value="window"/>
		<param name="allowScriptAccess" value="always"/>
		<param name="allowFullScreen" value="true"/>
		<param name="flashVars"
		       value="mediaId=7edab8048c5a4d59a6cc53c60497e9e8&amp;deepLink=true&amp;playerForm=74a4584427884e2da78ac8b3f8ecdd0b"/>
	</object>
	<script>LimelightPlayerUtil.initEmbed('limelight_player_746472');</script>
</span><br>©2014 Broadridge Investor Solutions, Inc.
<?php
}

add_shortcode( 'fp', 'financial_planning' );
// Rising rates shortcode
function rising_rates() {
	?>
	<span class="LimelightEmbeddedPlayer">
	<script src="https://video.limelight.com/player/embed.js">
	</script>
	<object type="application/x-shockwave-flash" id="limelight_player_746472" name="limelight_player_746472"
	        class="LimelightEmbeddedPlayerFlash" width="360" height="203"
	        data="https://video.limelight.com/player/loader.swf">
		<param name="movie" value="https://video.limelight.com/player/loader.swf">
		<param name="wmode" value="window"/>
		<param name="allowScriptAccess" value="always"/>
		<param name="allowFullScreen" value="true"/>
		<param name="flashVars"
		       value="mediaId=5281c6cc33624fd98f0ecbf27f0cfd4a&amp;deepLink=true&amp;playerForm=74a4584427884e2da78ac8b3f8ecdd0b"/>
	</object>
		<script>LimelightPlayerUtil.initEmbed('limelight_player_746472');</script>
</span><br>©2014 Broadridge Investor Solutions, Inc.
<?php
}

add_shortcode( 'rr', 'rising_rates' );

// Woo phone number
function woo_phone_number() {
	global $woo_options;
	$phone = esc_html( $woo_options['woo_contact_number'] );

	return $phone;
}

// Woo phone number shortcode
add_shortcode( 'woo_phone', 'woo_phone_number' );
?>