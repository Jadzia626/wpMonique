<?php
    /**
     * Archive template file
     *
     * @package WordPress
     * @subpackage wpMonique
     * @since wpMonique 0.1
     */

    global $cLang;

    if($cLang == 'no') {
        $sArchive  = 'Arkiv';
        $sDate     = 'Dato: ';
        $sCategory = 'Kategori: ';
        $sTag      = 'Stikkord: ';
    } else {
        $sArchive  = 'Archive ';
        $sDate     = 'Date: ';
        $sCategory = 'Category: ';
        $sTag      = 'Tag: ';
    }

    get_header();
?>

    <!-- Archive Template -->

    <!-- Begin Site Content -->
    <div id="site-content">
        <div class="entry-loop">
        <?php
            if(have_posts()) {

                echo '<header id="content-header">';
                echo '<h1>'.$sArchive.'</hi>';
                echo '</header>';
                echo '<div class="entry-content"><h2>';
                    if(is_day()) {
                        echo $sDate.get_the_date();
                    } elseif(is_month()) {
                        echo $sDate.get_the_date('F Y');
                    } elseif(is_year()) {
                        echo $sDate.get_the_date('Y');
                    } elseif(is_category()) {
                        echo single_cat_title($sCategory);
                    } elseif(is_tag()) {
                        echo single_cat_title($sTag);
                    }
                echo '</h2></div>';

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
