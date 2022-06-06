<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upview | Instagram</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .device {
            width: 100%;
            max-width: 360px;
            height: 100vh;
            max-height: 640px;
            margin: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, .2);
        }

        .instagram {
            width: 100%;
            height: 100%;
            background-color: #fff;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-direction: column;
            font-family: 'Roboto', sans-serif;
        }

        /* layout principal */
        .instagram .top,
        .instagram .bottom {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 44px;
            padding: .4em;
        }

        .instagram .scroll {
            width: 100%;
            flex-grow: 1;
            overflow: auto;
            overflow-x: hidden;
        }

        .instagram .top {
            box-shadow: 0 2px 2px rgba(0, 0, 0, .1);
        }

        .instagram .bottom {
            box-shadow: 0 -2px 2px rgba(0, 0, 0, .1);
        }

        /* layout header */
        .instagram .top .head-btn {
            min-width: 40px;
            text-align: center;
        }

        .instagram .top .head-logo {
            flex-grow: 1;
            text-align: center;
        }

        .instagram .top .head-logo .logo {
            width: 103px;
            height: 29px;
            display: inline-block;
            background-size: 270px 235px;
            background-position: 0 -73px;
            background-image: url(https://storage.googleapis.com/mkts/insta-sprite.png);
        }

        .instagram .top .head-btn .photo {
            width: 24px;
            height: 24px;
            display: inline-block;
            background-size: 270px 235px;
            background-position: -196px -50px;
            background-image: url(https://storage.googleapis.com/mkts/insta-sprite.png);
        }

        .instagram .top .head-btn .people {
            width: 24px;
            height: 24px;
            display: inline-block;
            background-size: 270px 235px;
            background-position: -171px -75px;
            background-image: url(https://storage.googleapis.com/mkts/insta-sprite.png);
        }

        /* layout footer */
        .instagram .bottom .footer-btn {
            width: 20%;
            text-align: center;
        }

        .instagram .bottom .footer-btn span {
            background-image: url(https://storage.googleapis.com/mkts/insta-sprite.png);
            width: 24px;
            height: 24px;
            display: inline-block;
        }

        .instagram .bottom .footer-btn .home {
            background-size: 270px 235px;
            background-position: -50px -161px;
        }

        .instagram .bottom .footer-btn .search {
            background-size: 270px 235px;
            background-position: 0 -211px;
        }

        .instagram .bottom .footer-btn .add {
            background-size: 270px 235px;
            background-position: -75px -186px;
        }

        .instagram .bottom .footer-btn .like {
            background-size: 270px 235px;
            background-position: -25px -161px;
        }

        .instagram .bottom .footer-btn .profile {
            background-size: 270px 235px;
            background-position: -196px 0;
        }

        /* stories layout */
        .instagram .stories {
            min-height: 103px;
            width: 100%;
            padding: .4em 0;
            background-color: #f8f8f8;
            border-bottom: 1px solid #e9e9e9;
            overflow: hidden;
        }

        .instagram .stories .scroll-stories {
            width: 100%;
            overflow: auto;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: nowrap;
        }

        .instagram .stories .scroll-stories::-webkit-scrollbar {
            width: 0;
        }

        .instagram .stories .scroll-stories .storie {
            margin: 0 0 0 1em;
            text-align: center;
            width: 66px;
        }

        .instagram .stories .scroll-stories .storie .photo {
            width: 66px;
            height: 66px;
            border-radius: 50%;
            border: 2px solid deeppink;
            display: inline-block;
        }

        .instagram .stories .scroll-stories .storie .photo img {
            width: calc(66px - 4px);
            height: calc(66px - 4px);
            border-radius: 50%;
            border: 2px solid #fff;
            background-color: #e9e9e9;
        }

        .instagram .stories .scroll-stories .storie .name {
            font-size: .75em;
            color: #000;
        }

        /* post layout */
        .instagram .content .post {
            width: 100%;
            margin-bottom: 1em;
        }

        .instagram .content .post .post-header {
            width: 100%;
            min-height: 60px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: .4em;
        }

        .instagram .content .post .post-header .user-thumb {
            width: 30px;
            min-width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid deeppink;
        }

        .instagram .content .post .post-header .user-details {
            font-size: .95em;
            line-height: 1em;
            flex-grow: 1;
            padding: 0 .5em;
        }

        .instagram .content .post .post-header .user-details strong,
        .instagram .content .post .post-header .user-details span {
            display: block;
        }

        .instagram .content .post .post-header .post-menu {
            min-width: 40px;
        }

        .instagram .content .post .post-header .post-menu .menu {
            display: inline-block;
            width: 24px;
            height: 24px;
            background-size: 270px 235px;
            background-position: -50px -186px;
            background-image: url(https://storage.googleapis.com/mkts/insta-sprite.png);
        }

        .instagram .content .post .post-photo {
            width: 100%;
        }

        .instagram .content .post .post-footer .buttons {
            width: 100%;
            padding: .4em 1em;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .instagram .content .post .post-footer .buttons .spacer {
            flex-grow: 1;
        }

        .instagram .content .post .post-footer .buttons .post-btn {
            text-align: center;
            min-width: 40px;
        }

        .instagram .content .post .post-footer .buttons .post-btn span {
            display: inline-block;
            width: 24px;
            height: 24px;
            background-image: url(https://storage.googleapis.com/mkts/insta-sprite.png);
        }

        .instagram .content .post .post-footer .buttons .post-btn .like {
            background-size: 270px 235px;
            background-position: -25px -161px;
        }

        .instagram .content .post .post-footer .buttons .post-btn .comn {
            background-size: 270px 235px;
            background-position: -142px -103px;
        }

        .instagram .content .post .post-footer .buttons .post-btn .save {
            background-size: 270px 235px;
            background-position: -221px -150px;
        }

        .instagram .content .post .post-footer .likes {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: .4em 1em;
            font-size: .95em;
        }

        .instagram .content .post .post-footer .likes .user-like {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: .5em;
        }

        .instagram .content .post .post-footer .likes strong {
            margin: 0 .3em;
        }

        .instagram .content .post .post-footer .comments {
            width: 100%;
            padding: .4em 1em;
            font-size: .95em;
        }

        .instagram .content .post .post-footer .comments p {
            margin: 0;
        }

        .instagram .content .post .post-footer .time {
            text-transform: uppercase;
            display: block;
            padding: 0 1em;
            color: #c0c0c0;
            font-size: .75em;
        }
    </style>

</head>

<body>
    <!-- partial:index.partial.html -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <div class="device">
        <div class="instagram">
            <div>
                <main class="content">
                    <div class="post">
                        <div class="post-header">
                            <img class="user-thumb" src="https://storage.googleapis.com/mkts/walter.jpg" alt="Walter">
                            <div class="user-details">
                                <strong class="name">Prince Suman</strong>
                                <span class="location">Mumbai, IN</span>
                            </div>
                            <div class="post-menu">
                                <span class="menu">&nbsp;</span>
                            </div>
                        </div>
                        <img src="https://image.freepik.com/psd-gratuitas/instagram-post-mockup_15879-4.jpg" alt="post" class="post-photo">
                        <div class="post-footer">

                            <div class="buttons">
                                <div class="post-btn"><span class="like">&nbsp;</span></div>
                                <div class="post-btn"><span class="comn">&nbsp;</span></div>
                                <div class="spacer">&nbsp;</div>
                                <div class="post-btn"><span class="save">&nbsp;</span></div>
                            </div>

                            <div class="likes">
                                <img src="https://storage.googleapis.com/mkts/walter.jpg" alt="user" class="user-like">
                                Liked by <strong>Prince Suman</strong> and <strong>500 others</strong>
                            </div>

                            <div class="comments">
                                <p>
                                    <strong>Jimmy</strong> Looking Nice.
                                </p>
                                <p>
                                    <strong>Maverick</strong> Nice Look.
                                </p>
                            </div>

                            <span class="time">Uploaded just now</span>

                        </div>
                    </div>
                </main>
            </div>

            <footer class="bottom">
                <a class="footer-btn">
                    <span class="home">&nbsp;</span>
                </a>
                <a class="footer-btn">
                    <span class="search">&nbsp;</span>
                </a>
                <a class="footer-btn">
                    <span class="add">&nbsp;</span>
                </a>
                <a class="footer-btn">
                    <span class="like">&nbsp;</span>
                </a>
                <a class="footer-btn">
                    <span class="profile">&nbsp;</span>
                </a>
            </footer>

        </div>
    </div>
    <!-- partial -->

</body>

</html>