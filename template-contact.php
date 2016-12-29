<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Contact Form
 *
 * The contact form page template displays the a
 * simple contact form in your website's content area.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options;
get_header();

?>

    <div id="content" class="col-full">
    	
    	<?php woo_main_before(); ?>
    
		<section id="main" class="col-left">

            <article id="contact-page" class="post page">

            	<div class="inner">

                    <?php if ( have_posts() ) { ?>

                        <?php while ( have_posts() ) { the_post(); ?>

                            <header>
                                <h1><?php the_title(); ?></h1>
                            </header>

                            <section class="entry">
                                <?php the_content(); ?>

                                <div class="location-twitter">
                                    
                                    <h3><?php echo esc_html( $woo_options['woo_contact_title'] ); ?></h3>
                                    
                                    <div class="col-left col-half">
                                        
                                        <?php echo do_shortcode( '[soliloquy id="' . rbm_get_field( 'contact_left_slider' ) . '"]' ); ?>
                                        
                                        <ul>
                                            <li><?php echo rbm_get_field( 'contact_left_title' ); ?></li>
                                            <li>
                                                <?php printf( '<div class="address">%s<br> %s, %s %s</div>', rbm_get_field( 'contact_left_street_address' ), rbm_get_field( 'contact_left_city' ), rbm_get_field( 'contact_left_state' ), rbm_get_field( 'contact_left_zip' ) ); ?>
                                            </li>
                                            <li><?php _e('Tel:','woothemes'); ?> <?php echo esc_html( rbm_get_field( 'contact_left_phone' ) ); ?></li>
                                            <li><?php _e('Fax:','woothemes'); ?> <?php echo esc_html( rbm_get_field( 'contact_left_fax' ) ); ?>
                                        </ul>
                                    </div>
                                    
                                    <div class="col-right col-half">
                                        
                                        <?php echo do_shortcode( '[soliloquy id="' . rbm_get_field( 'contact_right_slider' ) . '"]' ); ?>
                                        
                                        <ul>
                                            <li><?php echo rbm_get_field( 'contact_right_title' ); ?></li>
                                            <li>
                                                <?php printf( '<div class="address">%s<br> %s, %s %s</div>', rbm_get_field( 'contact_right_street_address' ), rbm_get_field( 'contact_right_city' ), rbm_get_field( 'contact_right_state' ), rbm_get_field( 'contact_right_zip' ) ); ?>
                                            </li>
                                            <li><?php _e('Tel:','woothemes'); ?> <?php echo esc_html( rbm_get_field( 'contact_right_phone' ) ); ?></li>
                                            <li><?php _e('Fax:','woothemes'); ?> <?php echo esc_html( rbm_get_field( 'contact_right_fax' ) ); ?>
                                        </ul>
                                    </div>

                                </div><!-- /.location-twitter -->
                                
                                <?php echo do_shortcode( '[hr]' ); ?>
                                
                                <div class="col-full contact-below">
                                    <?php echo apply_filters( 'the_content', rbm_get_field( 'contact_content' ) ); ?>
                                </div>

                            </section>

                        <?php
                        } // End WHILE Loop
                    }
                ?>

            	</div><!-- /.inner -->
            </article><!-- /#contact-page -->
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#content -->

<?php get_footer(); ?>