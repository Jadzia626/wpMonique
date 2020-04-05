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

    $dirTheme = esc_url(get_template_directory_uri());

?><!DOCTYPE html>

<html>

<head>
    <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="stylesheet" href="<?php echo $dirTheme; ?>/normalize.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courgette" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" type="text/css" media="all">
    <link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>" type="text/css" media="all">
    <link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $dirTheme; ?>/script/mobile.js"></script>
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
        <a href="https://twitter.com/DrBerglyd" title="Twitter"><img src="<?php echo $dirTheme."/theme-files/icon_twitter.png"; ?>"></a>
        <a href="https://www.facebook.com/vkbolsen" title="Facebook"><img src="<?php echo $dirTheme."/theme-files/icon_facebook.png"; ?>"></a>
        <a href="https://linkedin.com/in/veronicakbolsen" title="LinekdIn"><img src="<?php echo $dirTheme."/theme-files/icon_linkedin.png"; ?>"></a>
        <a href="https://www.goodreads.com/user/show/46372019-veronica-olsen" title="GoodReads"><img src="<?php echo $dirTheme."/theme-files/icon_goodreads.png"; ?>"></a>
        <a href="https://github.com/vkbo" title="GitHub"><img src="<?php echo $dirTheme."/theme-files/icon_github.png"; ?>"></a>
    </div>
    <div id="side-footer">
        <?php if($cLang == 'no') { ?>
            &copy;<?php echo $cStart."&ndash;".date("Y",time()); ?> <?php echo $cCopy; ?><br>
            Foto ved Amy Davis Roth &copy;2014<br>
            Wordpress-tema <a href="https://github.com/vkbo/wpMonique">wpMonique</a><br>
            Drevet med <a href="http://wordpress.org">Wordpress</a><br>
        <?php } else { ?>
            &copy;<?php echo $cStart."&ndash;".date("Y",time()); ?> <?php echo $cCopy; ?><br>
            Photo by Amy Davis Roth &copy;2014<br>
            Wordpress theme <a href="https://github.com/vkbo/wpMonique">wpMonique</a><br>
            Powered by <a href="http://wordpress.org">Wordpress</a><br>
        <?php } ?>
    </div>
</div>
<!-- End Sidebar -->

<!-- Begin Mobile Bar -->
<div id="mobile-top">
    <a rel="external" href="#navmenu" id="menu-btn">
        <img src="<?php echo $dirTheme; ?>/theme-files/icon_menu_b.png">
    </a>
</div>
<!-- End Mobile Bar -->

<!-- Begin Content -->
<div id="content">
