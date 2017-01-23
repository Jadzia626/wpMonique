<?php
   /**
    * Site Header
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cLang;
    global $cCopy;
    global $cStart;
    global $sThemeCol;

    $dirTheme = esc_url(get_template_directory_uri());

?><!DOCTYPE html>

<html>

<head>
    <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="stylesheet" href="<?php echo $dirTheme; ?>/normalize.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courgette" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" type="text/css" media="all">
    <link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>" type="text/css" media="all">
    <?php if($sThemeCol != "") { ?>
        <link rel="stylesheet" href="<?php echo $dirTheme."/style".$sThemeCol.".css"; ?>" type="text/css" media="all">
    <?php } ?>
    <link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $dirTheme; ?>/mobile.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Begin Wrapper -->
<div id="site-wrapper">

<!-- Begin Sidebar -->
<div id="sidebar">
    <div id="sidebar-img">
        <img src="<?php echo $dirTheme; ?>/theme-files/veronica-photo.png">
    </div>
    <div id="navbar" class="navbar">
        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
            <?php wp_nav_menu(array("theme_location"=>"primary","menu_class"=>"nav-menu")); ?>
        </nav>
    </div>
    <div id="so-me">
        <a href="https://twitter.com/VeronicaInPink"><img src="<?php echo $dirTheme."/theme-files/icon_twitter".$sThemeCol.".png"; ?>"></a>
        <a href="https://www.facebook.com/jadzia626"><img src="<?php echo $dirTheme."/theme-files/icon_facebook".$sThemeCol.".png"; ?>"></a>
        <a href="https://plus.google.com/+VeronicaKBerglydOlsen"><img src="<?php echo $dirTheme."/theme-files/icon_googleplus".$sThemeCol.".png"; ?>"></a>
        <a href="https://linkedin.com/in/veronicakbolsen"><img src="<?php echo $dirTheme."/theme-files/icon_linkedin".$sThemeCol.".png"; ?>"></a>
        <a href="https://github.com/Jadzia626"><img src="<?php echo $dirTheme."/theme-files/icon_github".$sThemeCol.".png"; ?>"></a>
    </div>
    <div id="side-footer">
        <?php if($cLang == 'no') { ?>
            &copy;<?php echo $cStart."&ndash;".date("Y",time()); ?> <?php echo $cCopy; ?><br>
            Design av <a href="http://vkbo.net">Veronica Berglyd Olsen</a><br>
            Photo by Amy Davis Roth &copy;2014<br>
            Drevet med <a href="http://wordpress.org">Wordpress</a><br>
        <?php } else { ?>
            &copy;<?php echo $cStart."&ndash;".date("Y",time()); ?> <?php echo $cCopy; ?><br>
            Design by <a href="http://vkbo.net">Veronica Berglyd Olsen</a><br>
            Photo by Amy Davis Roth &copy;2014<br>
            Powered by <a href="http://wordpress.org">Wordpress</a><br>
        <?php } ?>
    </div>
</div>
<!-- End Sidebar -->

<!-- Begin Content -->
<div id="content">
