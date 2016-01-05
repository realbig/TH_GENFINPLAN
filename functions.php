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

// Change capability needed to change options in the Customizer for things in WP Core
add_action( 'customize_register', 'add_site_identity_for_non_admins' );
function add_site_identity_for_non_admins( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->capability = 'edit_theme_options';
    $wp_customize->get_setting( 'blogdescription' )->capability = 'edit_theme_options';
}

// Add Customizer Controls
add_action( 'customize_register', 'genfinplan_customize_register' );
function genfinplan_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'genfinplan_cta' , array(
            'title'      => __( 'CTA Settings', 'genfinplan' ),
            'priority'   => 30,
            'active_callback' => 'is_front_page',
        ) 
    );
    
    $wp_customize->add_setting( 'genfinplan_cta_heading' , array(
            'default'     => 'Helping a Select Group of Families Achieve their Life Goals',
            'transport'   => 'refresh',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'genfinplan_cta_heading', array(
        'label'        => __( 'CTA Heading', 'genfinplan' ),
        'section'    => 'genfinplan_cta',
        'settings'   => 'genfinplan_cta_heading',
    ) ) );

    // WP_Customize_Media_Control returns an Attachment ID instead of an Attachment URL, this way we can get whatever size we want
    $wp_customize->add_setting( 'genfinplan_cta_image' , array(
            'default'     => 160,
            'transport'   => 'refresh',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'genfinplan_cta_image', array(
        'label'        => __( 'CTA Image', 'genfinplan' ),
        'section'    => 'genfinplan_cta',
        'mime_type' => 'image',
    ) ) );
    
    $wp_customize->add_setting( 'genfinplan_cta_copy' , array(
            'default'     => 'Servicing Southwest Michigan and clients nationwide, helping you make the right choices. We understand that the complexities of the Markets and Financial Vehicles can be daunting. Our combined experience of 19 years can help you plan and prepare for your life’s goals.',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'genfinplan_cta_copy', array(
        'type' => 'textarea',
        'label'        => __( 'CTA Body Copy', 'genfinplan' ),
        'section'    => 'genfinplan_cta',
        'settings'   => 'genfinplan_cta_copy',
    ) ) );
    
    $wp_customize->add_setting( 'genfinplan_cta_button_text' , array(
            'default'     => 'Plan for my future',
            'transport'   => 'refresh',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'genfinplagenfinplan_cta_button_textn_cta_heading', array(
        'label'        => __( 'CTA Button Text', 'genfinplan' ),
        'section'    => 'genfinplan_cta',
        'settings'   => 'genfinplan_cta_button_text',
    ) ) );
    
    $wp_customize->add_setting( 'genfinplan_cta_button_url' , array(
            'default'     => '/wealth-management-services/financial-planning/',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'genfinplan_cta_button_url', array(
        'label'        => __( 'CTA Button Link', 'genfinplan' ),
        'section'    => 'genfinplan_cta',
        'settings'   => 'genfinplan_cta_button_url',
    ) ) );
    

}

?>