<?php
// This is now handled via the Customizer. Easier (and more maintainable) to give the Client control over a single section of the Customizer than part of WooTheme's Theme Options Panel
?>
<section id="intro-message">
    <div class="col-full">
        <div class="left-section">
            <?php echo wp_get_attachment_image( get_theme_mod( 'genfinplan_cta_image', 160 ), 'intro-img' ); ?>
            <h2><?php echo get_theme_mod( 'genfinplan_cta_heading', 'Helping a Select Group of Families Achieve their Life Goals' ); ?></h2>

            <p><?php echo get_theme_mod( 'genfinplan_cta_copy', 'Servicing Southwest Michigan and clients nationwide, helping you make the right choices. We understand that the complexities of the Markets and Financial Vehicles can be daunting. Our combined experience of 19 years can help you plan and prepare for your life’s goals.' ); ?></p>
        </div>
        <div class="right-section">
            <a class="button"
               href="<?php echo get_theme_mod( 'genfinplan_cta_button_url', '/wealth-management-services/financial-planning/' ); ?>"><?php echo get_theme_mod( 'genfinplan_cta_button_text', 'Plan for my future' ); ?></a>
        </div>
    </div>
</section><!--/#intro-message-->