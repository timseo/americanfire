<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kormo
 */

$copyright_column = is_active_sidebar( 'footer-menu' ) ? 6 : 12 ;
$text_lg_left = is_active_sidebar( 'footer-menu' ) ? 'text-lg-left' : '' ;

?>

<!-- footer start -->
    <footer class="black-bg">
        <?php if ( is_active_sidebar('footer-widget-one') ||  is_active_sidebar('footer-widget-two') || is_active_sidebar('footer-widget-three') || is_active_sidebar('footer-widget-four') ): ?>
        <div class="widget-area pt-70 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                        <?php dynamic_sidebar( 'footer-widget-one' ); ?>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-30 footer-usefull-link">
                        <?php dynamic_sidebar( 'footer-widget-two' ); ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-30 d-lg-none d-xl-block">
                        <?php dynamic_sidebar( 'footer-widget-three' ); ?>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                        <?php dynamic_sidebar( 'footer-widget-four' ); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
        <div class="copyright-area pt-25 pb-25">
            <div class="container">
                <div class="row">
    
                    <div class="col-lg-<?php print esc_attr($copyright_column); ?> col-md-12">
                        <div class="copyright-text text-center <?php print esc_attr($text_lg_left); ?>">          
                            <p><?php print get_theme_mod('kormo_copyright', 'Copyright ©2018 Kormo. All Rights Reserved');; ?></p>
                        </div>
                    </div>

                    <?php if ( is_active_sidebar( 'footer-menu' ) ) { ?>
                    <div class="col-lg-6 col-md-12">
                        <div class="footer-menu text-center text-lg-right">
                            <?php dynamic_sidebar( 'footer-menu' ); ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
</div>
    <!-- wrapper-box end -->

<?php wp_footer(); ?>

              <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-22265132-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>
