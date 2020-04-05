<?php
   /**
    * Site Footer
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $sBlobTitle;
    global $sBlobText;
    global $cLang;
?>

    </div>
    <!-- End Content -->

    <!-- Begin Footer -->
    <footer id="footer">
        <div id="site-footer">
            <div class="footer-left">
                <h2><?php echo $sBlobTitle; ?></h2>
                <?php echo $sBlobText; ?>
            </div>
            <div class="footer-right">
                <h2><?php echo "&nbsp;" ?></h2>
                <?php wp_nav_menu(array("theme_location"=>"footer","menu_class"=>"footer-menu")); ?>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    </div>
    <!-- End Wrapper -->

    <?php wp_footer(); ?>

</body>

</html>
