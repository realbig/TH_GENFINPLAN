<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options;

?>

<div id="footer-wrapper">

	<?php

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	?>

	<?php woo_footer_before(); ?>

	<?php

	if ( ( woo_active_sidebar( 'footer-1' ) ||
	       woo_active_sidebar( 'footer-2' ) ||
	       woo_active_sidebar( 'footer-3' ) ||
	       woo_active_sidebar( 'footer-4' ) ) && $total > 0
	) {

		?>

		<section id="footer-widgets" class="col-full col-<?php echo $total; ?> fix">

			<?php $i = 0;
			while ( $i < $total ) {
				$i ++; ?>
				<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

					<div class="block footer-widget-<?php echo $i; ?>">
						<?php woo_sidebar( 'footer-' . $i ); ?>
					</div>

				<?php } ?>
			<?php } // End WHILE Loop ?>

		</section><!-- /#footer-widgets  -->
	<?php } // End IF Statement ?>

	<footer id="footer" class="col-full">


		<div id="credit" class="col-right">

			<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'footer-menu' ) ) {
				wp_nav_menu( array( 'depth'          => 1,
				                    'sort_column'    => 'menu_order',
				                    'container'      => 'ul',
				                    'menu_id'        => 'footer-nav',
				                    'menu_class'     => 'nav',
				                    'theme_location' => 'footer-menu'
					) );
			} elseif ( isset( $woo_options['woo_footer_right'] ) && $woo_options['woo_footer_right'] == 'true' ) {

				echo stripslashes( $woo_options['woo_footer_right_text'] );

			} else {
				?>
				<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'footer-menu' ) ) {
					wp_nav_menu( array( 'depth'          => 1,
					                    'sort_column'    => 'menu_order',
					                    'container'      => 'ul',
					                    'menu_id'        => 'footer-nav',
					                    'menu_class'     => 'nav',
					                    'theme_location' => 'footer-menu'
						) );
				} ?><?php
			} ?>
		</div>

		<div id="copyright" class="col-left">
			<?php if ( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {
				echo stripslashes( $woo_options['woo_footer_left_text'] );
			} else {
				?>
				<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>
					. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
				<p><?php rbw_credit(); ?></p>
			<?php } ?>
		</div>

	</footer>
	<!-- /#footer  -->

</div><!-- /#footer-wrapper -->

</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>