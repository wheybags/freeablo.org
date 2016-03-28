<!doctype html>
<html>
<head>
    <title>Freeablo</title>
    <link href='https://fonts.googleapis.com/css?family=Vollkorn:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php bloginfo('template_directory');?>/css/foundation.min.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory');?>/css/foundation-icons.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_directory');?>/style.css" rel="stylesheet" type="text/css">
    <script src="<?php bloginfo('template_directory');?>/js/vendor/modernizr.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/vendor/jquery.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/foundation.min.js"></script>

    <?php wp_head(); ?>
</head>

<body>
    <div id="top">
        <div class="row">
            <div class="small-12 medium-9 columns">
                <div id="logodiv"></div>
                <p>A work-in-progress free and open-source replacement for the Diablo I engine. Simply import the Diablo assets, and enjoy the same old game with faster performance and modern resolutions, and first class support for mods.</p>
            </div>
            <div class="small-12 medium-3 columns" id="downloads">
                <a href="https://github.com/wheybags/freeablo/releases" class="button expand download"><i class="fi-social-windows"></i> Windows</a>
                <a href="https://github.com/wheybags/freeablo/releases" class="button expand download"><i class="fi-archive"></i> Linux</a>
                <a href="https://github.com/wheybags/freeablo/releases" class="button expand download"><i class="fi-social-apple"></i> Mac OS</a>
            </div>

        </div>
    </div>
    <div id="nav" class="contain-to-grid sticky">
        
        <div class="top-bar" data-topbar>
            <ul class="title-area">
                <li class="name"><h1><a href="/">Freeablo</a></h1></li>
            </ul>
            <div class="top-bar-section">
                <ul class="right">
                    <?php include 'navbar.php'; ?>
                </ul>
            </div>
            
        </div>
    </div>

    <?php
        if(!array_key_exists("fa_is_front_page", $GLOBALS))
        {
            $GLOBALS["fa_is_front_page"] = false;
        }

        if($GLOBALS["fa_is_front_page"])
        {
    ?>
            <div id="about">
                <div class="row">
                    <div class="small-12 medium-6 columns">
                        <h2>What's this all about?</h2>
                        <p>We love Blizzard's popular game, Diablo. We love it so much, in fact, that we're willing to spend our precious time developing a free and open source solution for those wanting to play it on a modern computer.</p>
                        <p> <a href="/?page_id=49">Read more...</a></p>
                    </div>
                    <div class="small-12 medium-6 columns">
                        <h2>Is that legal?!</h2>
                        <p>Short answer, yes. We don't distribute any copyrighted game assets, which means you'll need to have a copy of Diablo to be able to play.</p>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>

