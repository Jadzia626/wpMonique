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

    <!-- Index Template -->

    <!-- Begin Site Content -->
    <div id="site-content">
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
                    } else {
                        if(!is_single()) {
                            echo '<h2 class="page-title">Latest Posts</h2>';
                        }
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
    </div>
    <!-- End Site Content -->

<?php
    get_footer();
?>
