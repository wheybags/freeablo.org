<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package WordPress
 * @subpackage freeablo
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<?php

$facss = '<link rel="stylesheet" type="text/css" media="all" href="/fa/style.css" />';
    if(!isset($notwp))
    {
echo '<html lang="en-US">
<head>
<meta charset="UTF-8" />
<title>';

        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";

        // Add a page number if necessary:
        if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
            echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

echo '   </title>
<link rel="profile" href="http://gmpg.org/xfn/11" />';
echo $facss;

        echo '<link rel="pingback" href="'; bloginfo('pingback_url'); echo '" />';

        /*
         * We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );

        /*
         * Always have wp_head() just before the closing </head>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to add elements to <head> such
         * as styles, scripts, and meta tags.
         */
        wp_head();
echo '</head>
<body '; body_class(); echo '>';
    }
$faheader = '
        <div id="masthead">
            <div id="branding" role="banner">
                    <span>
                        <div id="logodiv"></div>
                    </span>
                <br/>
                <br/>
                <br/>
                <i style="float: right; margin-right: 60px;">A FOSS Reimplementation of the Diablo 1 engine</i>
            </div><!-- #branding -->
            <br/>
            <br/>
            <br/>

            <div id="access" role="navigation">
                <div class="menu-header">
                    <ul id="menu-menu-1" class="menu">
                        <li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-17"><a href="http://freeablo.org/">News</a></li>
                        <li id="menu-item-50" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-50"><a href="http://freeablo.org/?page_id=49">About</a></li>
                        <li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52"><a href="https://github.com/wheybags/freeablo/releases">Downloads</a></li>
                        <li id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-19"><a href="http://github.com/wheybags/freeablo">GitHub</a></li>
                        <li id="menu-item-42" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42"><a href="http://freeablo.org/?page_id=39">Media</a></li>
                        <li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20"><a href="http://freeablo.org/forum">Forum</a></li>
                        <li id="menu-item-43" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-43"><a href="https://webchat.freenode.net/?channels=freeablo">IRC (freenode/#freeablo)</a></li>
                    </ul>
                </div>
            </div><!-- #access -->
        </div><!-- #masthead -->';


    if(!isset($notwp))
    {
        echo '<div id="wrapper" class="hfeed">';
        echo '<div id="header">';
        echo $faheader;
        echo '</div><!-- #header -->';
        echo '<div id="main">';
    }
?>
