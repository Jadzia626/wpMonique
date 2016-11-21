<?php
   /**
    * The template for displaying a "No posts found" message
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cLang;
?>

<!-- Begin No Content Template (404) -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="page-header">
        <h1 class="page-title">Error 404</h1>
    </header>

    <div class="entry-content">
        <?php
            if(is_search()) {
                if($cLang == 'no') {
                    echo '<p>Beklager, men søket ditt gav ingen resulater. Vennligst prøv igjen med andre søkeord.</p>';
                } else {
                    echo '<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>';
                }
            } else {
                if($cLang == 'no') {
                    echo '<p>Fant ikke innlegget eller siden du leter etter.</p>';
                } else {
                    echo '<p>Cannot find the post or page you were looking for.</p>';
                }
            }

            get_search_form();

            echo '<p><img class="size-full" src="'.esc_url(get_template_directory_uri()).'/theme-files/404_moss_fire.gif"></p>';
        ?>
    </div>
</article>
<!-- End No Content Template (404) -->
