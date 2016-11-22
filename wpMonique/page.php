<?php
   /**
    * Default Page Template
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    get_header();
?>

    <!-- Default Page Template -->

    <!-- Begin Site Content -->
    <div id="site-content">
        <div class="entry-loop">
            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('content','page');
                    }
                }
            ?>
        </div>
    </div>
    <!-- End Site Content -->

<?php
    get_footer();
?>
