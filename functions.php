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

add_action( 'init', 'genfinplan_remove_contact_editor' );
function genfinplan_remove_contact_editor() {
    
    if ( is_admin() && isset( $_REQUEST['post'] ) && ( 'template-contact.php' == get_post_meta( $_REQUEST['post'], '_wp_page_template', true ) ) ) {
        remove_post_type_support( 'page', 'editor' );
    }
    
}

add_action( 'add_meta_boxes', 'genfinplan_add_contact_metaboxes' );
function genfinplan_add_contact_metaboxes() {
    
    global $post;
    if ( 'template-contact.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
    
        add_meta_box(
            'genfinplan-contact-left',
            __( 'Contact - Left', 'genfinplan' ),
            'genfinplan_contact_left',
            'page',
            'normal',
            'high'
        );
        
        add_meta_box(
            'genfinplan-contact-right',
            __( 'Contact - Right', 'genfinplan' ),
            'genfinplan_contact_right',
            'page',
            'normal',
            'high'
        );
        
        add_meta_box(
            'genfinplan-contact-below',
            __( 'Contact - Below', 'genfinplan' ),
            'genfinplan_contact_below',
            'page',
            'normal',
            'high'
        );
        
    }

}

function genfinplan_contact_left() {
    genfinplan_create_contact_meta( 'left' );
}

function genfinplan_contact_right() {
    genfinplan_create_contact_meta( 'right' );
}

function genfinplan_create_contact_meta( $key ) {
    
    $slider_query = get_posts( array(
        'post_type' => 'soliloquy',
        'posts_per_page' => -1,
    ) );
    
    $sliders = wp_list_pluck( $slider_query, 'post_title', 'ID' );
    
    rbm_do_field_select(
        'contact_' . $key . '_slider',
        __( 'Slider', 'genfinplan' ),
        false,
        array(
            'options' => $sliders,
        )
    );
    
    rbm_do_field_text(
        'contact_' . $key . '_title',
        __( 'Location Name', 'genfinplan' ),
        false,
        array(
        )
    );
    
    rbm_do_field_text(
        'contact_' . $key . '_street_address',
        __( 'Street Address', 'genfinplan' ),
        false,
        array(
        )
    );
    
    rbm_do_field_text(
        'contact_' . $key . '_city',
        __( 'City', 'genfinplan' ),
        false,
        array(
        )
    );
    
    rbm_do_field_text(
        'contact_' . $key . '_state',
        __( 'State', 'genfinplan' ),
        false,
        array(
        )
    );
    
    rbm_do_field_text(
        'contact_' . $key . '_zip',
        __( 'ZIP Code', 'genfinplan' ),
        false,
        array(
        )
    );
    
    rbm_do_field_text(
        'contact_' . $key . '_phone',
        __( 'Phone Number', 'genfinplan' ),
        false,
        array(
        )
    );
    
    rbm_do_field_text(
        'contact_' . $key . '_fax',
        __( 'Fax Number', 'genfinplan' ),
        false,
        array(
        )
    );
    
}

function genfinplan_contact_below() {
    
    rbm_do_field_wysiwyg(
        'contact_content',
        __( 'Content', 'Home About Content', 'genfinplan' ),
        false,
        array(
        )
    );
    
}