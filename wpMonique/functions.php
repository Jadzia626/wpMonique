<?php

   /**
    *  wpMonique Functions
    * =====================
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    require_once('theme-config.php');
    require_once('common-functions.php');

    // Completely Remove jQuery From WordPress
    function moniqueInit() {
        if (!is_admin()) {
            wp_deregister_script('jquery');
            wp_register_script('jquery', false);
        }
    }
    add_action('init', 'moniqueInit');

    if (!function_exists('wpMoniqueSetup')) {

        function wpMoniqueSetup() {

            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size(336,175,array('center','center'));

            register_nav_menus(array(
                "primary" => __("Left Menu","wpMonique"),
                "footer"  => __("Footer Menu","wpMonique"),
            ));

            /* Enable support for Post Formats */

            add_theme_support('post-formats', array(
                #'aside',
                #'image', 'video', 'audio', 'quote', 'link', 'gallery',
            ));

            /* Content Width */

            if(!isset($content_width)) {
                $content_width = 700;
            }
        }
    }
    add_action('after_setup_theme','wpMoniqueSetup');

    // Register sidebar areas
    function wpMoniqueSidebar() {

        register_sidebar(array(
            'name'          => __('Blog Sidebar','wpMonique'),
            'id'            => 'primary-sidebar',
            'description'   => __('Right sidebar for blog pages','wpMonique'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
    }
    add_action('widgets_init','wpMoniqueSidebar');

    // Callback function to insert 'styleselect' into the $buttons array
    function fMCEButtons2($aButtons) {
        array_unshift($aButtons,'styleselect');
        return $aButtons;
    }
    add_filter('mce_buttons_2','fMCEButtons2');

    // Callback function to filter the MCE settings
    function fMCEInsertFormats($aInit) {

        $aStyleFormats = array(
            array(
                'title'   => 'Post Info',
                'inline'  => 'span',
                'classes' => 'post-info',
                'wrapper' => true,
            ),
            array(
                'title'   => 'Dropcap',
                'inline'  => 'span',
                'classes' => 'dropcap',
                'wrapper' => true,
            ),
            array(
                'title'   => 'Text Red',
                'inline'  => 'span',
                'classes' => 'text-red',
                'wrapper' => true,
            ),
            array(
                'title'   => 'Text Orange',
                'inline'  => 'span',
                'classes' => 'text-orange',
                'wrapper' => true,
            ),
            array(
                'title'   => 'Text Yellow',
                'inline'  => 'span',
                'classes' => 'text-yellow',
                'wrapper' => true,
            ),
            array(
                'title'   => 'Text Green',
                'inline'  => 'span',
                'classes' => 'text-green',
                'wrapper' => true,
            ),
            array(
                'title'   => 'Text Blue',
                'inline'  => 'span',
                'classes' => 'text-blue',
                'wrapper' => true,
            ),
            array(
                'title'   => 'Text Purple',
                'inline'  => 'span',
                'classes' => 'text-purple',
                'wrapper' => true,
            ),
        );

        $aInit['style_formats'] = json_encode($aStyleFormats);

        return $aInit;
    }
    add_filter('tiny_mce_before_init','fMCEInsertFormats');

    // Editor Stylesheet
    function fEditorStyles() {
        add_editor_style();
    }
    add_action('admin_init','fEditorStyles');

    // Add Featured Images to RSS
    function fFeaturedToRSS($sContent) {

        global $post;

        if(has_post_thumbnail($post->ID)) {
            $sContent = '<div>'.get_the_post_thumbnail($post->ID,'medium',array('style'=>'margin-bottom: 15px;')).'</div>'.$sContent;
        }

        return $sContent;
    }
    add_filter('the_excerpt_rss','fFeaturedToRSS');
    add_filter('the_content_feed','fFeaturedToRSS');

    // Additional Admin CSS
    function fAdminStyles() {
        echo '<style>';
            echo '.column-post_views {width: 50px;}';
        echo '</style>';
    }
    add_action('admin_head','fAdminStyles');

/* ================================================================================================================== */

   /**
    *  Content Functions
    * ===================
    */

    // Get related posts in category
    function fRelatedPosts($sCategories, $iCount=3, $sExclude='') {

        global $wpdb;
        global $cLang;

        $aGet = array(
            'posts_per_page'   => $iCount,
            'offset'           => 0,
            'category_name'    => $sCategories,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'exclude'          => $sExclude,
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => true
        );
        $aPosts = get_posts($aGet);

        if($sCategories != "featured") {

            $aTemp = explode(',',$sCategories);
            $aCats = array();
            foreach($aTemp as $sTemp) {
                $oCat = get_category_by_slug($sTemp);
                if(!empty($oCat->name)) {
                    $aCats[] = $oCat->name;
                }
            }

            $sTitle = implode(', ', $aCats);

            if($cLang == 'no') {
                echo '<h2>Siste fra '.fLReplace(',',' og', $sTitle).'</h2>';
            } else {
                echo '<h2>Latest from '.fLReplace(',',' and', $sTitle).'</h2>';
            }

        } else {

            if($cLang == 'no') {
                echo '<h2>Fremhevede innlegg</h2>';
            } else {
                echo '<h2>Featured Posts</h2>';
            }

        }

        echo '<ul class="wpmonique-relatedsingle';
        if(count($aPosts) < 3) {
            echo ' wpmonique-relatedleft';
        } else {
            echo ' flex-box';
        }
        echo '">';

        if(empty($sExclude)) {
            $sIDs = '';
        } else {
            $sIDs = $sExclude.",";
        }

        foreach($aPosts as $oPost) {
            echo '<li>';
                if(has_post_thumbnail($oPost->ID)) {
                    $aImage = wp_get_attachment_image_src(get_post_thumbnail_id($oPost->ID),'medium');
                    echo '<a href="'.esc_url(get_permalink($oPost->ID)).'">';
                    echo '<img src="'.$aImage[0].'" width="196">';
                    echo '</a>';
                }
                echo '<h4><a href="'.esc_url(get_permalink($oPost->ID)).'">'.$oPost->post_title.'</a></h4>';
                echo '<div>Published: '.date(get_option("date_format"),strtotime($oPost->post_date)).'</div>';
            echo '</li>';
            $sIDs .= $oPost->ID.",";
        }
        wp_reset_postdata();

        echo '</ul>';

        return substr($sIDs,0,-1);
    }

    // Ripley List Categories
    function wpMoniqueGetCategoryList($iPostID) {

        $aCat = get_the_category($iPostID);
        $aReturn = '';

        foreach($aCat as $oCat) {
            if($oCat->slug != 'featured') {
                $aReturn .= '<a href="'.esc_url(get_site_url()).'/category/'.$oCat->slug.'/" rel="category tag">';
                $aReturn .= $oCat->name.'</a>, ';
            }
        }
        return substr($aReturn,0,-2);
    }

    // Get post view count
    function fGetPostViews($iID) {

        $iCount = get_post_meta($iID,"PostViewCount",true);
        if($iCount == "") {
            delete_post_meta($iID,"PostViewCount");
            add_post_meta($iID,"PostViewCount","0");
            return "0";
        }
        return $iCount;
    }

    // Display post view count
    function fPostViews($iID) {

        $iCount = fGetPostViews($iID);
        // if($iCount > 999) {
        //     $dCount = round($iCount / 1000, 1);
        //     return number_format($dCount,1,'.',' ').'k';
        // }

        return number_format($iCount,0,'.',' ');
    }

    // Count views
    function fSetPostViews($iID) {

        $iCount = get_post_meta($iID,"PostViewCount",true);
        if($iCount == "") {
            $iCount = 0;
            delete_post_meta($iID,"PostViewCount");
            add_post_meta($iID,"PostViewCount","0");
        } else {
            $iCount++;
            update_post_meta($iID,"PostViewCount",$iCount);
        }
    }

    // Add posts view column in WP-Admin
    add_filter('manage_posts_columns','fColumnPostViews');
    add_action('manage_posts_custom_column','fCustomColumnPostViews',5,2);
    function fColumnPostViews($sDefaults) {
        $sDefaults['post_views'] = __('Views');
        return $sDefaults;
    }
    function fCustomColumnPostViews($sColumnName, $iID) {
        if($sColumnName === 'post_views') {
            echo fGetPostViews(get_the_ID());
        }
    }

/* ================================================================================================================== */

?>
