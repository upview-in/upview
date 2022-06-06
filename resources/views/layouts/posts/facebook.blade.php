<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upview | Facebook</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #E9EBEE;
            font-family: San Francisco, -apple-system, BlinkMacSystemFont, ".SFNSText-Regular", sans-serif;
        }

        .frame__container {
            margin: 10px;
            width: 500px;
            border: 1px solid #ced0d4;
            border-radius: 5px;
            background-color: #fff;
            box-sizing: border-box;
        }


        .frame__headline {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 12px 12px 0;
            margin-bottom: 11px;
        }

        .headline__image {
            height: 40px;
            width: 40px;
            margin-right: 8px;
        }

        .headline__subtitle {
            color: #90949c;
            font-size: 12px;
            letter-spacing: -0.24px;
            line-height: 16.08px;
            margin: 0;
        }

        .headline__title {
            color: #365899;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: -0.24px;
            line-height: 19.32px;
            word-wrap: break-word;
            margin: 0 0 2px;
        }

        .headline__world {
            height: 12px;
            width: 12px;
        }

        .frame__content {
            margin: 7px 12px;
        }

        .frame__text {
            margin: 0;
        }

        .frame__text--large {
            margin: 0;
            font-size: 24px;
            line-height: 28px;
        }

        .frame__text--small {
            margin: 0;
            font-size: 14px;
            line-height: 19.32px;
        }

        .frame__footer {
            display: flex;
            border-top: 1px solid #e1e2e3;
            padding: 4px 12px;
        }

        .text__social {
            color: #7f7f7f;
            font-size: 12px;
            font-weight: bold;
            line-height: 14px;
            margin: 0;
        }

        .footer__likes,
        .footer__comments,
        .footer__share,
        .footer__post-as {
            display: flex;
            padding: 4px 0 4px;
            margin-right: 20px;
        }

        .footer__image {
            height: 14px;
            margin: 0 6px -3px 0;
        }

        .footer__image--not-first {
            margin-left: 9px;
        }

        .footer__post-as-image {
            height: 16px;
        }

    </style>

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="frame__container">
        <div class="frame__headline">
            <img alt="" class="headline__image" src="via.placeholder.com/40x40">
            <div class="frame__column">
                <p class="headline__title">
                    Prince Suman
                </p>
                <p class="headline__subtitle">
                    Published by Upview · Jan 30, 2022 · <img alt="" class="headline__world" src="https://www.facebook.com/rsrc.php/v3/yD/r/-ZGO_vK2ube.png">
            </div>
        </div>
        <div class="frame__content">
            <p class="frame__text--small">This is Content</p>
        </div>
        <div class="frame__content">
            <img class="frame__image" src="http://via.placeholder.com/476x476">
        </div>
        <div class="frame__footer">
            <div class="footer__likes">
                <em class="fa-regular fa-heart"></em>&nbsp;
                <p class="text__social">Like</p>
            </div>
            <div class="footer__comments">
                <em class="fa-regular fa-message"></em>&nbsp;
                <p class="text__social">Comment</p>
            </div>
            <div class="footer__dropdown"></div>
        </div>
    </div>
    <!-- partial -->
</body>

</html>