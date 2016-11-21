<?php
   /**
    * Site Footer
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cLang;
    global $cCopy;
    global $cStart;
?>

    </div>
    <!-- End Site Center -->

    <!-- Begin Site Bottom -->
    <div id="site-bottom">

    <!-- Begin Site Footer -->
    <div id="site-footer">
        <?php get_sidebar('footer'); ?>
        <div id="copyright-text">
            <?php if($cLang == 'no') { ?>
                Copyright &copy;<?php echo $cStart."&ndash;".date("Y",time()); ?> <?php echo $cCopy; ?>
                &ndash;
                Drevet av <a href="http://wordpress.org">Wordpress</a>
                &ndash;
                Tema «Ripley» av <a href="http://vkbo.net">Veronica K. Berglyd Olsen</a>
            <?php } else { ?>
                Copyright &copy;<?php echo $cStart."&ndash;".date("Y",time()); ?> <?php echo $cCopy; ?>
                &ndash;
                Powered by <a href="http://wordpress.org">Wordpress</a>
                &ndash;
                Theme «Ripley» by <a href="http://vkbo.net">Veronica K. Berglyd Olsen</a>
            <?php } ?>
        </div>
    </div>
    <!-- End Site Footer -->

    </div>
    <!-- End Site Bottom -->

    <?php wp_footer(); ?>

</body>

</html>
