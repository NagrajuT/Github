<!--Created by GLB-269 on 23-06-2016.-->

<!DOCTYPE html>
<html>
<style>

    .trail {
        background:#4B097D;
        transition: all 300ms ease-in-out;
        border: 2px solid #fff;
        color: #000;
        font-size: 20px;
    }

    .trail:hover{
        color:white !important;
        background-color: #171616 !important;
    }

    .trail, .btn-border {
        text-decoration: none;
        text-transform: uppercase;
        color: #fff;
        margin: 0 3px;
        letter-spacing: 0.4px;
        font-size: 12px;
        padding: 10px 30px;
        line-height: 1.4;
        white-space: nowrap;
        vertical-align: middle;
        font-family: Poppins-Light;
        /* font-weight: bold; */
    }
    .btn {
        box-sizing: border-box;
        display: inline-block;
        text-align: left;
        white-space: nowrap;
        text-decoration: none;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid #ddd;
        padding: 4px 8px;
        margin: 5px auto;
        border-radius: 4px;
        color: #fff;
        fill: #fff;
        background: #000;
        line-height: 1em;
        min-width: 190px;
        height: 45px;
        -webkit-transition: 0.2s ease-out;
        transition: 0.2s ease-out;
        box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        -webkit-tap-highlight-color: rgba(0,0,0,0);
        font-family: $btn-font;
        font-weight: 500;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -moz-font-feature-settings: 'liga', 'kern';
    }
    .btn:hover,
    .btn:focus {
        background: #111;
        color: #fff;
        fill: #fff;
        border-color: #fff;
        -webkit-transform: scale(1.01) translate3d(0, -1px, 0);
        transform: scale(1.01) translate3d(0, -1px, 0);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    .btn:active {
        outline: 0;
        background: #353535;
        -webkit-transition: none;
        transition: none;
    }
    .btn__icon,
    .btn__text,
    .btn__storename {
        display: inline-block;
        vertical-align: top;
    }
    .btn__icon {
        width: 30px;
        height: 30px;
        margin-right: 5px;
        margin-top: 2px;
    }
    .btn__icon--amazon {
        -webkit-transform: scale(0.85);
        transform: scale(0.85);
    }
    .btn__text {
        letter-spacing: 0.08em;
        margin-top: -0.1em;
        font-size: 10px;
    }
    .btn__storename {
        display: block;
        margin-left: 38px;
        margin-top: -17px;
        font-size: 22px;
        letter-spacing: -0.03em;
    }
    .btn--small {
        padding: 2px 8px;
        min-width: 118.75px;
        height: 24px;
        border-radius: 3px;
    }
    .btn--small .btn__icon {
        width: 16px;
        height: 16px;
        margin: 1px 2px 0 0;
    }
    .btn--small .btn__text {
        display: none;
    }
    .btn--small .btn__storename {
        font-size: 12px;
        display: inline-block;
        margin: 0;
        vertical-align: middle;
    }
    .btn--tiny {
        padding: 3px;
        width: 22px;
        height: 22px;
        min-width: 0;
        border-radius: 3px;
    }
    .btn--tiny .btn__icon {
        width: 14px;
        height: 14px;
        margin: 0;
    }
    .btn--tiny .btn__text,
    .btn--tiny .btn__storename {
        display: none;
    }

    .stage > h1 {
        margin-top: -5%;
        margin-bottom: 5%;
        font-family: Avenir, Trebuchet, 'Trebuchet MS', sans-serif;
        font-size: 7vw;
        font-weight: 400;
        color: #c67d0c;
    }
    @media (min-width: 50em) {
        .stage > h1 {
            font-size: 5vw;
        }
    }
    @font-face {
        font-family: "San Francisco";
        font-weight: 500;
        src: url("https://applesocial.s3.amazonaws.com/assets/styles/fonts/sanfrancisco/sanfranciscodisplay-semibold-webfont.woff2"), url("https://applesocial.s3.amazonaws.com/assets/styles/fonts/sanfrancisco/sanfranciscodisplay-semibold-webfont.woff") format('woff'), url("https://applesocial.s3.amazonaws.com/assets/styles/fonts/sanfrancisco/sanfranciscodisplay-semibold-webfont.ttf") format('truetype');
    }

</style>
<head>
    <title>Smartffic</title>
    <meta charset="UTF-8">
    <meta name="description" content="Get real Instagram likes and followers">
    <meta name="keywords" content="get instagram followers, get instagram likes, instagram, istagram real likes, instgram real followers">
    <meta name="author" content="Smartffic, Rajesh kumar sah,Fron-tend developer">
    <!-- CSS Files-->
    <meta name="theme-color" content="#B42F4B">
    {{--<link href="assets/css/main.css" rel="styleSheet">--}}
    {{--<link href="assets/css/reset.css" rel="styleSheet">--}}
    {{--<link href="assets/css/font-ions.css" rel="styleSheet">--}}
    {{--<link href="assets/css/custom.css" rel="styleSheet">--}}

    <link href="/assets/user/css/main.css" rel="stylesheet" type="text/css">
    <link href="/assets/user/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/assets/user/css/font-ions.css" rel="stylesheet" type="text/css">
    <link href="/assets/user/user-panel/css/custom.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="body">
    <!--Header section-->
    <header>
        <nav class="navbar-menu" style="padding:5px 0px;">
            <div class="container">
                <div class="logo"><a href="#"><img src="/assets/user/images/instaffic_logo.png" width="250"></a></div>


            </div>
        </nav>
    </header>

    <!--Introduction Section-->
    <div class="introduction" id="about">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="text-center col-8 hero-content">
                    <h2> online system that works 24/7 </h2>
                    <p>on your instagram profile to increase real
                        <br> followers, likes & comments </p>
                </div>
            </div>
        </div>
    </div>

    <!--Services section-->
    <div id="system" class="alt-section section-service">
        <div class="text-center">
            <h2>Mobile App for Instagram Lovers</h2>
            <p>
                Smartffic Application is Currently Supported in all Android devices and coming soon for iPhone Devices.
            </p>
            <hr>
            <h2>Android</h2>
            <hr>
            <p>Android Mobile phone owners click the Button Below to download the App. <br><br>
                Note: Compatible With all Android Phones including Tablet. <br><br></p>
            <p> <a href="https://play.google.com/store/apps/details?id=com.instaffic" rel="nofollow">
                    <img src="http://instaffic.com/assets/user/images/google-play.png" style="width: 350px;">
                </a>
            </p>
            <br>

            <h2>iPhone</h2>
            <hr>
            <p>IPhone App for Smartffic will be Launched Soon.</p>
            <!--
                            <p> <a rel="nofollow" rel="noreferrer"class="btn btn--mac" href="#">
                        <svg class="btn__icon btn__icon--apple" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        preserveAspectRatio="xMidYMid"
                        viewBox="0 0 20 20">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5640259,13.8623047
                    c-0.4133301,0.9155273-0.6115723,1.3251343-1.1437988,2.1346436c-0.7424927,1.1303711-1.7894897,2.5380249-3.086853,2.5500488
                    c-1.1524048,0.0109253-1.4483032-0.749939-3.0129395-0.741333c-1.5640259,0.008606-1.8909302,0.755127-3.0438843,0.7442017
                    c-1.296814-0.0120239-2.2891235-1.2833252-3.0321655-2.4136963c-2.0770874-3.1607666-2.2941895-6.8709106-1.0131836-8.8428955
                    c0.9106445-1.4013062,2.3466187-2.2217407,3.6970215-2.2217407c1.375,0,2.239502,0.7539673,3.3761597,0.7539673
                    c1.1028442,0,1.7749023-0.755127,3.3641357-0.755127c1.201416,0,2.4744263,0.6542969,3.3816528,1.7846069
                    C14.0778809,8.4837646,14.5608521,12.7279663,17.5640259,13.8623047z M12.4625244,3.8076782
                    c0.5775146-0.741333,1.0163574-1.7880859,0.8571167-2.857666c-0.9436035,0.0653076-2.0470581,0.6651611-2.6912842,1.4477539	C10.0437012,3.107605,9.56073,4.1605835,9.7486572,5.1849365C10.7787476,5.2164917,11.8443604,4.6011963,12.4625244,3.8076782z"/>
                        </svg>
                        <span class="btn__text">Download on the</span>
                        <span class="btn__storename">Mac App Store</span>
                    </a></p>
            -->
        </div>
    </div>
    <!--Footer Section-->
    <div id="support" class="footer">
        <div class="footer-container">
            <div class="footer-wrapper">

                <div class="mobile-footer">
                    <div class="col-10">
                        <div class="col-2">
                            <a href="#" class="logo"><img src="assets/images/web_logo.png" width="120"></a>
                            <div class="copyright">&copy 2017</div>
                        </div>
                        <div class="col-80">
                            <ul class="social-list">
                                <li><a href="#" target="_blank"><i class="twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="google"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Coded by Vijay Kolar-->
<!--Javascript Files-->
{{--<script src="assets/js/jquery.js"></script>--}}
<script src="/assets/user/user-panel/global/plugins/jquery.min.js" type="text/javascript"></script>
{{--<script src="assets/js/function.js"></script>--}}
<script src="/assets/user/js/function.js"></script>
</body>

</html>