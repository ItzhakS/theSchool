<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://127.0.0.1/theschool/views/styling.css">
        <title>The School</title>
    </head>
    <body>
        <header class="banner-wrapper">
            <div class="banner">
                <div class="bannerLeft">
                    <div class="schoolLogo"></div>
                    <?php if (Session::get('loggedIn')): ?>
                        <div class="schoolLink"><a href='<?php echo Config::URL ?>theSchool/index' target='_self'>The School</a></div>
                    <?php endif;?>
                    <?php if (Session::get('role') == 'Admin'):?>
                        <div class="adminLink"><a href='<?php echo Config::URL ?>administrators/index/infos' target='_self'>Administration</a></div>
                    <?php endif;?>
                </div>
                <?php if (Session::get('loggedIn')): ?>
            <div class="bannerRight">
                <div class="loggedIn">
                    <div class="currentUser">
                        <div class="userName"></div>
                        <a class="logout" href='<?php echo Config::URL ?>login/logout' target='_self'>Logout</a>
                        <div class="userImage"></div>
                    </div>
                </div>
            </div>
                <?php endif;?>
            </div>
        </header>
        <div class="mainContent">