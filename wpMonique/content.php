<?php
   /**
    * The template used for displaying page content
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cLang;
?>

<!-- Begin Standard Content Template -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php
            if(is_single()) {
                if(has_post_thumbnail()) the_post_thumbnail(array(768,400));
                $sFCaption = get_post(get_post_thumbnail_id())->post_excerpt;
                if(!empty($sFCaption)) {
                    echo '<span class="feature-caption">'.$sFCaption.'</span>';
                }
                the_title('<h1 class="entry-title">','</h1>');
            } else {
                if(has_post_thumbnail()) {
                    echo '<a href="'.esc_url(get_permalink()).'">';
                    the_post_thumbnail(array(536,279));
                    echo '</a>';
                }
                the_title('<h1 class="entry-title"><a href="'.esc_url(get_permalink()).'">','</a></h1>');
            }
        ?>
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

            echo '<span>';
                echo '<img src="'.esc_url(get_template_directory_uri()).'/theme-files/icon_view.png">';
                echo fPostViews(get_the_ID());
                if(is_single()) {
                    echo ($cLang == 'no' ? ' visninger' : ' views');
                }
            echo '</span>';
        ?>
    </div>
    <?php if(is_single()) { ?>
        <div class="entry-content"><?php the_content(); ?></div>
    <?php } else { ?>
        <div class="entry-excerpt"><?php the_excerpt(); ?></div>
    <?php } ?>
    <?php
        if($cLang == 'no') {
            echo get_the_tag_list('<footer class="entry-footer">Stikkord: ',', ','</footer>');
        } else {
            echo get_the_tag_list('<footer class="entry-footer">Tags: ',', ','</footer>');
        }
    ?>
    <?php
        if(is_single()) {

            // Ads
            $sAd = get_template_directory().'/ads/PostFooter.txt';
            if(file_exists($sAd)) {
                echo '<div class="ad-post-footer">';
                if($cLang == 'no') {
                    echo '<label>Reklame</label>';
                } else {
                    echo '<label>Advertisement</label>';
                }
                echo file_get_contents($sAd).'</div>';
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
        }
    ?>
    <div class="entry-spacer"></div>

</article>
<!-- End Standard Content Template -->
