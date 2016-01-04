<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */

global $woo_options, $woocommerce;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<title><?php woo_title( '' ); ?></title>
	<?php woo_meta(); ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>"/>
	<?php
	wp_head();
	woo_head();
	?>
</head>
<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="wrapper">
	<!--<div class='col-full top-login'>-->
	<?php woo_header_before(); ?>
	<!--</div>-->
	<header id="header">

		<div id="fixed-header" class="fixed">

			<div class="col-full">

				<?php woo_header_inside(); ?>

				<a id="logo-mobile" href="http://genfinplan.com/" title="Financial Planning and Wealth Management services for Battle Creek, MI.">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Generations-Financial-Planning-Logo-small.png" alt="Generations Financial Planning &amp; Wealth Management">
				</a>

				<hgroup>
					<span class="nav-toggle"><a
							href="#navigation"><span><?php _e( 'Navigation', 'woothemes' ); ?></span></a></span>

					<h1 class="site-title"><a
							href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</hgroup>

				<?php woo_nav_before(); ?>

				<nav id="navigation" role="navigation">

					<?php
					if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
						wp_nav_menu( array( 'depth'          => 6,
						                    'sort_column'    => 'menu_order',
						                    'container'      => 'ul',
						                    'menu_id'        => 'main-nav',
						                    'menu_class'     => 'nav fl',
						                    'theme_location' => 'primary-menu'
							) );
					} else {
						?>
						<ul id="main-nav" class="nav fl">
							<?php if ( is_page() ) {
								$highlight = 'page_item';
							} else {
								$highlight = 'page_item current_page_item';
							} ?>
							<li class="<?php echo $highlight; ?>"><a
									href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a>
							</li>
							<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
						</ul><!-- /#nav -->
					<?php } ?>

				</nav>
				<!-- /#navigation -->

				<?php woo_nav_after(); ?>

			</div>
			<!-- /.col-full -->

		</div>
		<!-- /#fixed-header -->

	</header>
	<!-- /#header -->

<?php woo_content_before(); ?>