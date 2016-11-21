<?php
   /**
    * The template used for displaying aside content
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cLang;
?>

<!-- Begin Aside Content Template -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">','</h1>'); ?>
    </header>
    <div class="entry-meta">
        <?php
            echo '<span>';
                echo '<img src="'.esc_url(get_template_directory_uri()).'/theme-files/icon_date.png">';
                echo ($cLang == 'no' ? get_the_date('j. F Y') : get_the_date('F j, Y'));
            echo '</span>';

            echo '<span>';
                echo '<img src="'.esc_url(get_template_directory_uri()).'/theme-files/icon_category.png">';
                echo fRipleyGetCategoryList(get_the_ID());
            echo '</span>';

            echo '<span>';
                echo '<img src="'.esc_url(get_template_directory_uri()).'/theme-files/icon_comment.png">';
                if(is_single()) {
                    if($cLang == 'no') {
                        echo comments_number('ingen kommentarer','én kommentar','% kommentarer');
                    } else {
                        echo comments_number('no comments','one comment','% comments');
                    }
                } else {
                    echo comments_number('0','1','%');
                }
            echo '</span>';
        ?>
    </div>
    <div class="entry-content"><?php the_content(); ?></div>
    <?php
        if($cLang == 'no') {
            echo get_the_tag_list('<footer class="entry-footer">Stikkord: ',', ','</footer>');
        } else {
            echo get_the_tag_list('<footer class="entry-footer">Tags: ',', ','</footer>');
        }
    ?>
    <div class="entry-spacer"></div>

</article>
<!-- End Aside Content Template -->
