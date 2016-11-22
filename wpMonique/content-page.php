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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_title('<header class="page-header"><h1 class="page-title">','</h1></header>'); ?>
    <div class="entry-meta">
        <?php if($cLang == 'no') { ?>
            Oppdatert den <?php the_modified_date('j. F Y'); ?>
        <?php } else { ?>
            Updated on <?php the_modified_date('F j, Y'); ?>
        <?php } ?>
    </div>

    <div class="entry-content">
        <?php
            the_content();
        ?>
    </div>
</article>
<!-- End Page Content Template -->
