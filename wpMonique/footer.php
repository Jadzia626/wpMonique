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

    <!-- Begin Site Bottom -->
    <div id="site-bottom">
        <div id="copyright-text">
            <?php if($cLang == 'no') { ?>
                Copyright &copy;<?php echo $cStart."&ndash;".date("Y",time()); ?> <?php echo $cCopy; ?>
                &ndash;
                Drevet av <a href="http://wordpress.org">Wordpress</a>
                &ndash;
                Tema wpMonique av <a href="http://vkbo.net">Veronica K. Berglyd Olsen</a>
            <?php } else { ?>
                Copyright &copy;<?php echo $cStart."&ndash;".date("Y",time()); ?> <?php echo $cCopy; ?>
                &ndash;
                Powered by <a href="http://wordpress.org">Wordpress</a>
                &ndash;
                Theme wpMonique by <a href="http://vkbo.net">Veronica K. Berglyd Olsen</a>
            <?php } ?>
        </div>
    </div>
    <!-- End Site Bottom -->

    </div>
    <!-- End Content -->

    <?php wp_footer(); ?>

</body>

</html>
