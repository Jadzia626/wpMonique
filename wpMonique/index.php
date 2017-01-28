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
            if(have_posts()) {

                if(is_search()) {
                    echo '<header id="content-header">';
                        if($cLang == 'no') {
                            echo '<h1>Søkeresultat</hi>';
                        } else {
                            echo '<h1>Search Result</h1>';
                        }
                    echo '</header>';
                    echo '<div class="entry-content">';
                        if($cLang == 'no') {
                            echo '<h2>Søker etter: "'.get_search_query().'"</h2>';
                        } else {
                            echo '<h2>Searching for: "'.get_search_query().'"</h2>';
                        }
                    echo '</div>';
                } else {
                    if(!is_single()) {
                        echo '<header id="content-header">';
                            if($cLang == 'no') {
                                echo '<h1>Blogginnlegg</h1>';
                            } else {
                                echo '<h1>Blog Posts</h1>';
                            }
                        echo '</header>';
                    }
                }

                echo '<div class="entry-outer">';
                    while (have_posts()) {
                        the_post();
                        get_template_part('content',get_post_format());
                    }
                echo '</div>';
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
