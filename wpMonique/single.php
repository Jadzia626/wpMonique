<?php
   /**
    * Default Single Post Template
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    get_header();
?>

    <!-- Single Template -->

    <!-- Begin Site Content -->
    <div id="site-content">
        <div class="entry-loop">
            <?php
                // WP-Loop

                while(have_posts()) {
                    the_post();
                    get_template_part('content',get_post_format());
                    if(comments_open() || get_comments_number()) {
                        comments_template();
                    }
                }
            ?>
        </div>
    </div>
    <!-- End Site Content -->

<?php
    get_footer();
?>
