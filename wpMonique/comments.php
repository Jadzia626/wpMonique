<?php
   /**
    * The template for comments
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cLang;
?>

<!-- Begin Comments -->
<div id="comments" class="comments-area">

    <?php if(have_comments()) { ?>
        <?php if($cLang == 'no') { ?>
            <h2 class="comments-title">Kommentarer</h2>
        <?php } else { ?>
            <h2 class="comments-title">Comments</h2>
        <?php } ?>
        <ol class="comment-list">
        <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 34,
                'max_depth'   => 4,
            ));
        ?>
        </ol>

        <?php if(!comments_open()) { ?>
            <?php if($cLang == 'no') { ?>
                <p class="no-comments">Kommentarfeltet er stengt.</p>
            <?php } else { ?>
                <p class="no-comments">Comments are closed.</p>
            <?php } ?>
        <?php } ?>
    <?php } ?>
    <?php comment_form(); ?>
</div>
<!-- End Comments -->
