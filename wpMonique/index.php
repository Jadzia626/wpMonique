<?php
   /**
    * Main template file
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cLang;

    get_header();
?>


    <!-- Begin Site Content -->
    <!-- Index Template -->
    <div id="site-content">
        <?php //get_sidebar(); ?>
        <div class="entry-loop">
            <?php
                // WP-Loop

                if(have_posts()) {

                    if(is_search()) {
                        echo '<header class="page-header">';
                        if($cLang == 'no') {
                            echo 'Søkeresultat';
                        } else {
                            echo 'Search Result';
                        }
                        echo '<h1 class="page-title">'.get_search_query().'</h1>';
                        echo '</header>';
                    }

                    while (have_posts()) {
                        the_post();
                        get_template_part('content',get_post_format());
                    }
                    the_posts_pagination(array('mid_size' => 2));
                } else {
                    get_template_part('content','none');
                }
            ?>
        </div>
        <?php
            if(!is_single()) {
                get_sidebar('content');
            }
        ?>
    </div>
    <!-- End Site Content -->

<?php
    get_footer();
?>
