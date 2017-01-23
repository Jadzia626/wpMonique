<?php
   /**
    * The template used for displaying page content
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cLang;

    $dirTheme = esc_url(get_template_directory_uri());
?>

<!-- Begin Standard Content Template -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php

        if(is_single()) {

            echo '<div class="entry-feature">';

                if(has_post_thumbnail()) the_post_thumbnail(array(816,425));
                $sFCaption = get_post(get_post_thumbnail_id())->post_excerpt;
                if(!empty($sFCaption)) {
                    echo '<span class="feature-caption">'.$sFCaption.'</span>';
                }

            echo '</div>';

            echo '<header class="entry-header">';
                the_title('<h1 class="entry-title">','</h1>');
            echo '</header>';

            echo '<div class="entry-meta">';

                echo ($cLang == 'no' ? get_the_date('j. F Y') : get_the_date('F j, Y'));
                echo '&nbsp;&bull;&nbsp;';
                echo wpMoniqueGetCategoryList(get_the_ID());
                echo '&nbsp;&bull;&nbsp;';
                if($cLang == 'no') {
                    echo comments_number('ingen kommentarer','én kommentar','% kommentarer');
                } else {
                    echo comments_number('no comments','one comment','% comments');
                }
                echo '&nbsp;&bull;&nbsp;';
                echo fPostViews(get_the_ID());
                echo ($cLang == 'no' ? ' visninger' : ' views');
                //~ echo '<b>'.($cLang == 'no' ? get_the_date('j. F Y') : get_the_date('F j, Y')).'</b>';
                //~ echo '<br>';
                //~ echo wpMoniqueGetCategoryList(get_the_ID());
                //~ echo '<br>';
                //~ if($cLang == 'no') {
                    //~ echo comments_number('ingen kommentarer','én kommentar','% kommentarer');
                //~ } else {
                    //~ echo comments_number('no comments','one comment','% comments');
                //~ }
                //~ echo '<br>';
                //~ echo fPostViews(get_the_ID());
                //~ echo ($cLang == 'no' ? ' visninger' : ' views');

            echo '</div>';

            echo '<div class="entry-content">';
                the_content();
            echo '</div>';

            if($cLang == 'no') {
                echo get_the_tag_list('<footer class="entry-footer">Stikkord: ',', ','</footer>');
            } else {
                echo get_the_tag_list('<footer class="entry-footer">Tags: ',', ','</footer>');
            }

            // Show Featured and Related Posts
            echo '<div class="entry-related">';
                $sExclude = fRelatedPosts('featured',3,get_the_ID());

                $sCustom = implode(',',get_post_custom_values('Related'));
                if(!empty($sCustom)) {
                    fRelatedPosts($sCustom,3,$sExclude);
                }
            echo '</div>';

            // Statistics
            if(!is_user_logged_in()) {
                fSetPostViews(get_the_ID());
            }

        } else {

            echo '<div class="entry-list-feature">';
                echo '<a href="'.esc_url(get_permalink()).'">';
                if(has_post_thumbnail()) {
                    the_post_thumbnail(array(336,175));
                } else {
                    echo '<img src="'.$dirTheme.'/theme-files/no-feature.png" class="wp-post-image">';
                }
                echo '</a>';
            echo '</div>';
            echo '<header class="entry-list-header">';
                the_title('<a href="'.esc_url(get_permalink()).'">','</a>');
            echo '</header>';
            echo '<div class="entry-list-meta">';
                echo ($cLang == 'no' ? get_the_date('j. F Y') : get_the_date('F j, Y'));
                echo '&nbsp;&bull;&nbsp;';
                if($cLang == 'no') {
                    echo comments_number('ingen kommentarer','én kommentar','% kommentarer');
                } else {
                    echo comments_number('no comments','one comment','% comments');
                }
                echo '&nbsp;&bull;&nbsp;';
                echo fPostViews(get_the_ID());
                echo ($cLang == 'no' ? ' visninger' : ' views');
                echo '<br>';
                echo wpMoniqueGetCategoryList(get_the_ID());
            echo '</div>';
            echo '<div class="entry-list-excerpt">';
                the_excerpt();
            echo '</div>';
            echo '<footer class="entry-list-footer">';
                if($cLang == 'no') {
                    echo get_the_tag_list('Stikkord: ',', ','');
                } else {
                    echo get_the_tag_list('Tags: ',', ','');
                }
            echo '</footer>';

        }

    ?>
</article>
<!-- End Standard Content Template -->
