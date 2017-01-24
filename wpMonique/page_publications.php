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

    $SQL  = "SELECT ID, Date, Type, Title, Journal, Authors, URL, DOI, PrePrint, PDF, BibTeX ";
    $SQL .= "FROM publications ";
    $SQL .= "ORDER BY FIELD(Type,'Book','Paper','Talk','Proceedings','Thesis','Report'), Date DESC";
    $RS1  = $oDB1->query($SQL);

    $aTypeTranslate = array(
        "Book"        => "Books",
        "Paper"       => "Papers",
        "Thesis"      => "Theses",
        "Proceedings" => "Proceedings",
        "Report"      => "Reports",
        "Talk"        => "Conference Talks",
    );

    $aPublication = array(
        "Book"        => true,
        "Paper"       => true,
        "Thesis"      => true,
        "Proceedings" => true,
        "Report"      => true,
        "Talk"        => false,
    );

    $dirTheme = esc_url(get_template_directory_uri());

    get_header();
?>

    <!-- Publications Page Template -->

    <!-- Begin Site Content -->
    <script>
        function toggleBibTeX(elementID) {
            var textArea = document.getElementById(elementID).style.display;
            if(textArea == "block") {
                document.getElementById(elementID).style.display = "none";
            } else {
                document.getElementById(elementID).style.display = "block";
            }
        }
    </script>
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
                        if($aRow["Type"] != $sPrev) {
                            echo '<h2>'.$aTypeTranslate[$aRow["Type"]].'</h2>';
                            $sPrev = $aRow["Type"];
                        }
                        echo '<h5><a href="'.$aRow["URL"].'">'.$aRow["Title"].'</a></h5>';
                        echo '<div class="publication-journal"><b>'.date("M j, Y",strtotime($aRow["Date"])).'</b>';
                        echo ' &ndash; '.$aRow["Journal"].'</div>';
                        if($aPublication[$aRow["Type"]]) {
                            echo '<div class="publication-details"><b>Authors:</b> '.$aRow["Authors"].'</div>';
                        } else {
                            echo '<div class="publication-details"><b>Presented by:</b> '.$aRow["Authors"].'</div>';
                        }
                        echo '<div class="publication-meta">';
                            if($aRow["PrePrint"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_pdf.png" height="16px">';
                                    echo '<a href="'.$aRow["PrePrint"].'">PrePrint</a>';
                                echo '</span>';
                            }
                            if($aRow["PDF"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_pdf.png" height="16px">';
                                    if($aPublication[$aRow["Type"]]) {
                                        echo '<a href="'.$aRow["PDF"].'">PDF</a>';
                                    } else {
                                        echo '<a href="'.$aRow["PDF"].'">Slides</a>';
                                    }
                                echo '</span>';
                            }
                            if($aRow["DOI"] != "") {
                                echo '<span>';
                                    echo '<b>DOI:</b> ';
                                    echo '<a href="http://dx.doi.org/'.$aRow["DOI"].'">'.$aRow["DOI"].'</a>';
                                echo '</span>';
                            }
                            if($aRow["BibTeX"] != "") {
                                echo '<span>';
                                    echo '<img src="'.$dirTheme.'/theme-files/icon_tex.png" height="16px">';
                                    echo '<a onClick="toggleBibTeX('.chr(39).'bibtex-'.$aRow["ID"].chr(39).')">BibTeX</a>';
                                echo '</span>';
                            }
                        echo "</div>";
                        echo '<textarea id="bibtex-'.$aRow["ID"].'" style="display: none;" readOnly=1>'.$aRow["BibTeX"].'</textarea>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
    <!-- End Site Content -->

<?php
    get_footer();
?>
