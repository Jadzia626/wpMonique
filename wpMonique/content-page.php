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

<!-- Begin Page Content Template -->
<header id="content-header">
    <?php the_title('<h1>','</h1>'); ?>
</header>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-feature-page">
    <?php
        if(has_post_thumbnail()) the_post_thumbnail(array(700));
        $sFCaption = get_post(get_post_thumbnail_id())->post_excerpt;
        if(!empty($sFCaption)) {
            echo '<span class="feature-caption">'.$sFCaption.'</span>';
        }
    ?>
    </div>
    <div class="entry-content">
        <?php
            the_content();

            // Statistics
            if(!is_user_logged_in()) {
                fSetPostViews(get_the_ID());
            }
        ?>
    </div>
    <div class="entry-footer">
        <?php if($cLang == 'no') { ?>
            Oppdatert den <?php the_modified_date('j. F Y'); ?>
            &bull;
            <?php echo fPostViews(get_the_ID()); ?> visninger
        <?php } else { ?>
            Updated on <?php the_modified_date('F j, Y'); ?>
            &bull;
            <?php echo fPostViews(get_the_ID()); ?> views
        <?php } ?>
    </div>
</article>
<!-- End Page Content Template -->
