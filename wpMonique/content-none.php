<?php
   /**
    * The template for displaying a "No posts found" message
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cLang;

    $dirTheme = esc_url(get_template_directory_uri());
?>

<!-- Begin No Content Template (404) -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header id="content-header">
        <h1>Error</h1>
    </header>

    <div class="entry-feature-page">
            <img src="<?php echo $dirTheme; ?>/theme-files/white-noise.gif">
    </div>

    <div class="entry-content">
        <h1>404 – Page not found</h1>
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
        ?>
    </div>
</article>
<!-- End No Content Template (404) -->
