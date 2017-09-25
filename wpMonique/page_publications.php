<?php
   /**
    * Template Name: Publications Page
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */
    
    get_header();
?>

    <!-- Publications Page Template -->

    <!-- Begin Site Content -->
    <div id="site-content">
        <div class="entry-loop">
            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('content','page');
                    }
                }

                include_once(getcwd()."/publications/publications.php");
                $dirTheme = esc_url(get_template_directory_uri());

                $aTypeTranslate = array(
                    "Book"        => "Book",
                    "Article"     => "Journal Article",
                    "Thesis"      => "Thesis",
                    "Proceedings" => "Proceedings",
                    "Report"      => "Report",
                    "Talk"        => "Conference Talk",
                );

                $sPrev = "";
                foreach($pubEntries as $bibTex=>$pubEntry) {
                    echo '<div class="publication-entry">';
                        $sYear = date("Y",strtotime($pubEntry["Date"]));
                        $sDate = date("M j, Y",strtotime($pubEntry["Date"]));
                        if($sYear != $sPrev) {
                            echo '<h2>'.$sYear.'</h2>';
                            $sPrev = $sYear;
                        }
                        echo '<div class="publication-type">'.$aTypeTranslate[$pubEntry["Type"]].'</div>';
                        echo '<div class="publication-title"><a href="'.$pubEntry["URL"].'">'.$pubEntry["Title"].'</a></div>';
                        echo '<div class="publication-journal">'.$sDate.' &ndash; '.$pubEntry["Journal"].'</div>';
                        echo '<div class="publication-details"><b>Authors:</b> '.$pubEntry["Authors"].'</div>';
                        echo '<div class="publication-meta">';
                            if($pubEntry["Slides"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_slides.png" height="16px">';
                                    echo '<a href="'.$pubEntry["Slides"].'">Slides</a>';
                                echo '</span>';
                            }
                            if($pubEntry["PrePrint"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_pdf.png" height="16px">';
                                    echo '<a href="'.$pubEntry["PrePrint"].'">PrePrint</a>';
                                echo '</span>';
                            }
                            if($pubEntry["PDF"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_pdf.png" height="16px">';
                                    echo '<a href="'.$pubEntry["PDF"].'">PDF</a>';
                                echo '</span>';
                            }
                            if($pubEntry["DOI"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_doi.png" height="16px">';
                                    echo '<a href="http://dx.doi.org/'.$pubEntry["DOI"].'">'.$pubEntry["DOI"].'</a>';
                                echo '</span>';
                            }
                            echo '<span>';
                                echo '<img src="'.$dirTheme.'/theme-files/icon_tex.png" height="16px">';
                                echo '<a href="/publications/getbibtex.php?Key='.$bibTex.'")">BibTeX</a>';
                            echo '</span>';
                        echo "</div>";
                    echo '</div>';
                }
            ?>
            <?php if (have_posts()) { ?>
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
            <?php } ?>
        </div>
    </div>
    <!-- End Site Content -->

<?php
    get_footer();
?>
