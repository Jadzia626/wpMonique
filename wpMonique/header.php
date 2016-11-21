<?php
   /**
    * Site Header
    *
    * @package WordPress
    * @subpackage wpMonique
    * @since wpMonique 0.1
    */

    global $cLang;

    $dirTheme = esc_url(get_template_directory_uri());

?><!DOCTYPE html>

<html>

<head>
    <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="stylesheet" href="<?php echo $dirTheme; ?>/normalize.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courgette" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine" type="text/css" media="all">
    <link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>" type="text/css" media="all">
    <link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $dirTheme; ?>/mobile.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="sidebar">
    <header id="header">
        <img src="<?php echo $dirTheme; ?>/theme-files/veronica.png" width="240px">
    </header>
    <div id="navbar" class="navbar">
        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
            <?php wp_nav_menu(array("theme_location"=>"primary","menu_class"=>"nav-menu")); ?>
        </nav>
    </div>
    <div id="so-me">
        <a href="https://twitter.com/VeronicaInPink"><img src="<?php echo $dirTheme; ?>/theme-files/icon_twitter.png"></a>
        <a href="https://www.facebook.com/jadzia626"><img src="<?php echo $dirTheme; ?>/theme-files/icon_facebook.png"></a>
        <a href="https://plus.google.com/+VeronicaKBerglydOlsen"><img src="<?php echo $dirTheme; ?>/theme-files/icon_googleplus.png"></a>
        <a href="https://linkedin.com/in/veronicakbolsen"><img src="<?php echo $dirTheme; ?>/theme-files/icon_linkedin.png"></a>
        <a href="https://github.com/Jadzia626"><img src="<?php echo $dirTheme; ?>/theme-files/icon_github.png"></a>
    </div>
    <div id="side-footer">
        &copy; 2014&ndash;<?php echo date("Y",time()); ?> Veronica Berglyd Olsen<br>
        Design by Veronica Berglyd Olsen<br>
        Photo by Amy Davis Roth, &copy;2014<br>
    </div>
</div>

