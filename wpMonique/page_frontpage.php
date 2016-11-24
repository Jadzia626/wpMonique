<?php
   /**
    * Template Name: Front Page
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    get_header();
?>

    <!-- Front Page Template -->

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

                echo '<h2>Latest Posts</h2>';

                $aGet = array(
                    'posts_per_page'   => 3,
                    'offset'           => 0,
                    'page'             => 1,
                    'orderby'          => 'date',
                    'order'            => 'DESC',
                    'post_type'        => 'post',
                    'post_status'      => 'publish',
                    'suppress_filters' => true
                );

                query_posts($aGet);
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('content',get_post_format());
                    }
                }
            ?>
        </div>
    </div>
    <!-- End Site Content -->

<?php
    get_footer();
?>
