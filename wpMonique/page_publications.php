<?php
   /**
    * Template Name: Publications Page
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cDBUser;
    global $cDBPass;
    global $cDBHost;
    global $cDBData;

    $oDB1 = new mysqli($cDBHost,$cDBUser,$cDBPass,$cDBData);
    $oDB1->set_charset("utf8");

    $SQL  = "SELECT * ";
    $SQL .= "FROM publications ";
    $SQL .= "ORDER BY Date DESC";
    $RS1  = $oDB1->query($SQL);

    $aTypeTranslate = array(
        "Book"        => "Book",
        "Paper"       => "Journal Article",
        "Thesis"      => "Thesis",
        "Proceedings" => "Proceedings",
        "Report"      => "Report",
        "Talk"        => "Conference Talk",
    );

    $aPublication = array(
        "Book"        => true,
        "Paper"       => true,
        "Thesis"      => true,
        "Proceedings" => true,
        "Report"      => true,
        "Talk"        => false,
    );

    $dirTheme  = esc_url(get_template_directory_uri());
    $dirBibTeX = "http://stuff.vkbo.net/scripts/bibtex/";

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

                $sPrev = "";
                while($aRow = $RS1->fetch_assoc()) {
                    echo '<div class="publication-entry">';
                        $sYear = date("Y",strtotime($aRow["Date"]));
                        $sDate = date("M j, Y",strtotime($aRow["Date"]));
                        if($sYear != $sPrev) {
                            echo '<h2>'.$sYear.'</h2>';
                            $sPrev = $sYear;
                        }
                        echo '<div class="publication-type">'.$aTypeTranslate[$aRow["Type"]].'</div>';
                        echo '<div class="publication-title"><a href="'.$aRow["URL"].'">'.$aRow["Title"].'</a></div>';
                        echo '<div class="publication-journal">'.$sDate.' &ndash; '.$aRow["Journal"].'</div>';
                        echo '<div class="publication-details"><b>Authors:</b> '.$aRow["Authors"].'</div>';
                        echo '<div class="publication-meta">';
                            if($aRow["Slides"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_slides.png" height="16px">';
                                    echo '<a href="'.$aRow["Slides"].'">Slides</a>';
                                echo '</span>';
                            }
                            if($aRow["PrePrint"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_pdf.png" height="16px">';
                                    echo '<a href="'.$aRow["PrePrint"].'">PrePrint</a>';
                                echo '</span>';
                            }
                            if($aRow["PDF"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_pdf.png" height="16px">';
                                    echo '<a href="'.$aRow["PDF"].'">PDF</a>';
                                echo '</span>';
                            }
                            if($aRow["DOI"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_doi.png" height="16px">';
                                    echo '<a href="http://dx.doi.org/'.$aRow["DOI"].'">'.$aRow["DOI"].'</a>';
                                echo '</span>';
                            }
                            if($aRow["BibTeX"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_tex.png" height="16px">';
                                    echo '<a href="'.$dirBibTeX.'getbibtex.php?S=Pub&ID='.$aRow["ID"].'")">BibTeX</a>';
                                echo '</span>';
                            }
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
