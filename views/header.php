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
                    <div class="schoolLink"><a href='<?php echo Config::URL ?>theSchool/index' target='_self'>The School</a></div>
                    <div class="adminLink"><a href='<?php echo Config::URL ?>administrators/GetAll' target='_self'>Administration</a></div>
            </div>
            <div class="bannerRight">
                <div class="loggedIn">
                    <div class="currentUser">
                        <div class="userName"></div>
                        <a class="logout">logout</a>
                        <div class="userImage"></div>
                    </div>
                </div>
            </div>
            </div>
        </header>
        <div class="mainContent">