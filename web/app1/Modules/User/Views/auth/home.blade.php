<!--Created by GLB-269 on 23-06-2016.--><!DOCTYPE html>
<html>
<head>
    <title>Instaffic</title>
    <meta charset="UTF-8">
    <meta name="description" content="Get real Instagram likes and followers">
    <meta name="keywords"
          content="get instagram followers, get instagram likes, instagram, istagram real likes, instgram real followers">
    <meta name="author" content="instaffic, Rajesh kumar sah,Fron-tend developer">
    <!-- CSS Files-->
    <meta name="theme-color" content="#B42F4B">
    <link rel="icon" href="/assets/user/images/fav.ico" type="image/x-icon"/>

    <link href="/assets/user/css/main.css" rel="styleSheet">
    <link href="/assets/user/css/reset.css" rel="styleSheet">
    <link href="/assets/user/css/font-ions.css" rel="styleSheet">
    <link href="/assets/user/user-panel/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/user/user-panel/global/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">
    <style>
        .thumb-container .thumb-unit i {
            color: #fff;

            opacity: 0.6;
            position: absolute;

            top: 0;
        }

        #quote-carousel {
            padding: 0 10px 30px 10px;
            margin-top: 30px;
        }

        /* Control buttons  */
        #quote-carousel .carousel-control {
            background: none;
            color: #222;
            font-size: 2.3em;
            text-shadow: none;
            margin-top: 30px;
        }

        /* Previous button  */
        #quote-carousel .carousel-control.left {
            left: -12px;
        }

        /* Next button  */
        #quote-carousel .carousel-control.right {
            right: -12px !important;
        }

        /* Changes the position of the indicators */
        #quote-carousel .carousel-indicators {
            right: 50%;
            top: auto;
            bottom: 0px;
            margin-right: -19px;
        }

        /* Changes the color of the indicators */
        #quote-carousel .carousel-indicators li {
            background: #c0c0c0;
        }

        #quote-carousel .carousel-indicators .active {
            background: #333333;
        }

        #quote-carousel img {
            width: 250px;
            height: 100px
        }

        /*Carousel-2*/
        #quote-carousel-2 {
            padding: 0 10px 30px 10px;
            margin-top: 30px;
        }

        /* Control buttons  */
        #quote-carousel-2 .carousel-control {
            background: none;
            color: #222;
            font-size: 2.3em;
            text-shadow: none;
            margin-top: 30px;
        }

        /* Previous button  */
        #quote-carousel-2 .carousel-control.left {
            left: -12px;
        }

        /* Next button  */
        #quote-carousel-2 .carousel-control.right {
            right: -12px !important;
        }

        /* Changes the position of the indicators */
        #quote-carousel-2 .carousel-indicators {
            right: 50%;
            top: auto;
            bottom: 0px;
            margin-right: -19px;
        }

        /* Changes the color of the indicators */
        #quote-carousel-2 .carousel-indicators li {
            background: #c0c0c0;
        }

        #quote-carousel-2 .carousel-indicators .active {
            background: #333333;
        }

        #quote-carousel-2 img {
            width: 250px;
            height: 100px
        }

        /*Carousel-2*/
        #quote-carousel-3 {
            padding: 0 10px 30px 10px;
            margin-top: 30px;
        }

        /* Control buttons  */
        #quote-carousel-3 .carousel-control {
            background: none;
            color: #222;
            font-size: 2.3em;
            text-shadow: none;
            margin-top: 30px;
        }

        /* Previous button  */
        #quote-carousel-3 .carousel-control.left {
            left: -12px;
        }

        /* Next button  */
        #quote-carousel-3 .carousel-control.right {
            right: -12px !important;
        }

        /* Changes the position of the indicators */
        #quote-carousel-3 .carousel-indicators {
            right: 50%;
            top: auto;
            bottom: 0px;
            margin-right: -19px;
        }

        /* Changes the color of the indicators */
        #quote-carousel-3 .carousel-indicators li {
            background: #c0c0c0;
        }

        #quote-carousel-3 .carousel-indicators .active {
            background: #333333;
        }

        #quote-carousel-3 img {
            width: 250px;
            height: 100px
        }

        .carousel-inner ul {
            list-style: circle
        }

        /* End carousel */

        .item blockquote {
            border-left: none;
            margin: 0;
        }

        .item blockquote img {
            margin-bottom: 10px;
        }

        .item blockquote p:before {
            content: "\f10d";
            font-family: 'Fontawesome';
            float: left;
            margin-right: 10px;
        }

        blockquote {
            padding: 10px 40px !important;
        }

        /**
          MEDIA QUERIES
        */

        /* Small devices (tablets, 768px and up) */
        @media (min-width: 768px) {
            #quote-carousel {
                margin-bottom: 0;
                padding: 0 40px 30px 40px;
            }

        }

        /* Small devices (tablets, up to 768px) */
        @media (max-width: 768px) {

            /* Make the indicators larger for easier clicking with fingers/thumb on mobile */
            #quote-carousel .carousel-indicators {
                bottom: -20px !important;
            }

            #quote-carousel .carousel-indicators li {
                display: inline-block;
                margin: 0px 5px;
                width: 15px;
                height: 15px;
            }

            #quote-carousel .carousel-indicators li.active {
                margin: 0px 5px;
                width: 20px;
                height: 20px;
            }
        }

        .ticker-headline {
            overflow: hidden;
            text-overflow: ellipsis;
            /*white-space: nowrap;*/
            /*padding: 15px 0;*/
            margin: 0;
            font-size: 18px;
        }

        .carousel.vertical .carousel-inner {
            height: 100%;
            width: 100%;
        }

        .carousel.vertical .carousel-inner > .item {
            width: auto;
            padding: 35px;
            -webkit-transition: 0.6s ease-in-out top;
            transition: 0.6s ease-in-out top;
        }

        @media all and (transform-3d), (-webkit-transform-3d) {
            .carousel.vertical .carousel-inner > .item {
                -webkit-transition: 0.6s ease-in-out;
                transition: 0.6s ease-in-out;
            }

            .carousel.vertical .carousel-inner > .item.next, .carousel.vertical .carousel-inner > .item.active.right {
                -webkit-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0);
                top: 0;
            }

            .carousel.vertical .carousel-inner > .item.prev, .carousel.vertical .carousel-inner > .item.active.left {
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
                top: 0;
            }

            .carousel.vertical .carousel-inner > .item.next.left, .carousel.vertical .carousel-inner > .item.prev.right, .carousel.vertical .carousel-inner > .item.active {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                top: 0;
            }
        }

        .carousel.vertical .carousel-inner > .active,
        .carousel.vertical .carousel-inner > .next,
        .carousel.vertical .carousel-inner > .prev {
            display: block;
        }

        .carousel.vertical .carousel-inner > .active {
            top: 0;
        }

        .carousel.vertical .carousel-inner > .next,
        .carousel.vertical .carousel-inner > .prev {
            position: absolute;
            top: 0;
            width: 100%;
        }

        .carousel.vertical .carousel-inner > .next {
            top: 100%;
        }

        .carousel.vertical .carousel-inner > .prev {
            top: -100%;
        }

        .carousel.vertical .carousel-inner > .next.left,
        .carousel.vertical .carousel-inner > .prev.right {
            top: 0;
        }

        .carousel.vertical .carousel-inner > .active.left {
            top: -100%;
        }

        .carousel.vertical .carousel-inner > .active.right {
            top: 100%;
        }

        .carousel.vertical .carousel-control {
            left: auto;
            width: 50px;
        }

        .carousel.vertical .carousel-control.up {
            /*top: 0;*/
            /*right: 0;*/
            bottom: 50%;
            position: fixed;
        }

        .carousel.vertical .carousel-control.down {
            top: 80%;
            position: fixed;
            /*right: 0;*/
            /*bottom: 0;*/
        }

        .carousel.vertical .carousel-control .icon-prev,
        .carousel.vertical .carousel-control .icon-next,
        .carousel.vertical .carousel-control .glyphicon-chevron-up,
        .carousel.vertical .carousel-control .glyphicon-chevron-down {
            position: absolute;
            top: 50%;
            z-index: 5;
            display: inline-block;
        }

        .carousel.vertical .carousel-control .icon-prev,
        .carousel.vertical .carousel-control .glyphicon-chevron-up {
            left: 50%;
            margin-left: -10px;
            top: 50%;
            margin-top: -10px;
        }

        .carousel.vertical .carousel-control .icon-next,
        .carousel.vertical .carousel-control .glyphicon-chevron-down {
            left: 50%;
            margin-left: -10px;
            top: 50%;
            margin-top: -10px;
        }

        .carousel.vertical .carousel-control .icon-up,
        .carousel.vertical .carousel-control .icon-down {
            width: 20px;
            height: 20px;
            line-height: 1;
            font-family: serif;
        }

        .carousel.vertical .carousel-control .icon-prev:before {
            content: '\2039';
        }

        .carousel.vertical .carousel-control .icon-next:before {
            content: '\203a';
        }

    </style>
</head>
<body>
<div class="body">


    <!--Header section-->
    <div class="mobile-navbar">
        <ul class="navbar-list" >
            <li><a href="/about/us">About</a></li>
            <li><a href="#system">System Services</a></li>
            <li><a href="#price">Prices</a></li>
            <li><a href="#blog">Blog</a></li>
            <li><a href="#support">Support</a></li>
            <li><a href="/user/dashboard">Dashboard</a></li>
            <li ><a href="/user/dashboard" class="login" style="text-transform: none;"><?php echo \Illuminate\Support\Facades\Session::get('instaffic_user')['email']?></a></li>
            <li><a href="/user/logout">Log out</a>
        </ul>
    </div>
    <header>
        <nav class="navbar-menu">
            <div class="container">
               <div class="logo" style="margin-top: 6px;"><a href="/user/dashboard"><img src="/assets/user/images/instaffic_logo.png" width="250"></a></div>
                <div class="flags pull-right">
                    <ul>
                        <li><a href="#"><img src="/assets/user/images/flags/israel.svg" title="Israel" alt="Israel"></a>
                        </li>
                        <li><a href="#"><img src="/assets/user/images/flags/us.svg" alt="USA" title="English"></a></li>
                        <li><a href="#"><img src="/assets/user/images/flags/arabia.svg" alt="Arabic" title="Arabic"></a>
                        </li>
                    </ul>
                </div>

                <ul class="navbar-list pull-right"  style="margin-bottom: 0;">
                    <li><a href="/about/us">About</a></li>
                    <li><a href="#system">System Services</a></li>
                    <li><a href="#price">Prices</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#support">Support</a></li>
                    <li><a href="/user/dashboard">Dashboard</a></li>
                </ul>
                {{--<ul class="right-navbar-list  pull-right" style="margin-bottom: 0;">--}}
                    {{--<li ></li>--}}
                    {{--<li>--}}
                {{--</ul>--}}
                <div class="col-md-12" style="text-align: right; padding: 0px 0px 6px;">
                    <div class="pull-right">
                        <a href="/user/dashboard"  style="text-decoration: none; color:#fff;" class="dropdown-toggle dropdown pull-right"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo \Illuminate\Support\Facades\Session::get('instaffic_user')['email']?> <i style="color: rgb(255, 255, 255); font-size: 18px; padding: 0px 13px; cursor: pointer;" class="ion-android-arrow-dropdown"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a href="/user/logout"  class="pull-left"  style="background: #fff; color:#4B097D;padding: 6px 15px 3px;border-radius: 3px; margin-right:5px;">Log out</a>
                        </div>
                    </div>
                </div>




            </div>
        </nav>
        <div class="mobile-navbar-menu"><span></span></div>
    </header>



    <!--Introduction Section-->
    <div class="introduction" id="about">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="text-center col-8 hero-content">
                    <h2> online system that works 24/7 </h2>

                    <p>on your instagram profile
                        to increase real<br> followers, likes & comments </p>
                    <a href="/user/dashboard" class="btn-black">Account Activation</a>
                    <a href="#" class="btn-border play-video">View Demo</a>
                    <hr class="horizontal-divider">
                </div>
                <div class="col-12 text-center"><a href="" class="play-video square-100"><i
                                class="ion-ios-play-outline"></i></a></div>
            </div>
        </div>
    </div>
    <!--Introduction Video Modal-->
    <div class="modal-overlay">
        <div class="modal-content">
            <div class="close-btn"><i class="ion-close-round"></i></div>
            <div class="modal-body">
                <iframe src="https://www.youtube.com/embed/bd0AZJrY5tU" autoplay="false"></iframe>
            </div>
        </div>
    </div>
    <!--Services section-->
    <div id="system" class="alt-section section-service">
        <div class="text-center">
            <h2>System Services</h2>
            <hr>
            <p>Our system has super power to change your life and make you rich</p>
        </div>
        <div class="work-belt">
            <div class="thumb-wrap">
                <div class="thumb-container">

                    <div class="thumb-unit unit-1">
                        <div class="col-md-12 text-center"><h4>Profile Management</h4></div>
                        <i class="ion-person"></i>


                        <div class='row'>

                            <div id="carousel-example-vertical" class="carousel vertical slide text-center">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <p class="ticker-headline">
                                        <ul class="col-md-offset-3" style="text-align: left; width: 200px;">
                                            <li><strong>Who didnt follow me back</strong></li>
                                            <li><strong>My top 20 admire</strong></li>
                                            <li><strong>Alert about favorite users</strong></li>
                                        </ul>
                                        </p>
                                    </div>
                                    <div class="item">
                                        <p class="ticker-headline">
                                        <ul class="col-md-offset-3" style="text-align: left; width: 200px;">
                                            <li><strong>Who nearbye me</strong></li>
                                            <li><strong>Uploading pictures by timer</strong></li>
                                            <li><strong>Direct messages</strong></li>
                                            <li><strong>Catching pictures</strong></li>
                                        </ul>

                                        </p>
                                    </div>
                                    <div class="item">
                                        <p class="ticker-headline">
                                        <ul class="col-md-offset-3" style="text-align: left; width: 200px;">
                                            <li><strong>Instagram campaign</strong></li>
                                            <li><strong>Automatic comments</strong></li>
                                            <li><strong>Tags automaticalls</strong></li>
                                        </ul>
                                        </p>
                                    </div>


                                </div>
                                <a class="up carousel-control" href="#carousel-example-vertical" role="button"
                                   data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="down carousel-control" href="#carousel-example-vertical" role="button"
                                   data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>

                    </div>
                    <div class="thumb-unit unit-2">

                        <div class="col-md-12 text-center"><h4>Promotion Management</h4></div>
                        <i class="ion-arrow-graph-up-right"></i>


                        <div class='row'>
                            <div id="carousel-example-vertical2" class="carousel vertical slide text-center">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <p class="ticker-headline">
                                        <h3 style="margin-top: -3px;text-align:center;">Default Promotion</h3>
                                        <ul>
                                            <li><strong>AInstaffic will promote your profile 24/7 and expose it up to
                                                    15,000 people</strong></li>
                                        </ul>

                                        </p>
                                    </div>
                                    <div class="item">
                                        <p class="ticker-headline">
                                        <h3 style="margin-top: -3px;text-align:center;">Filter Promotion</h3>
                                        <ul class="text-left">
                                            <li><strong> Hashtags</strong></li>
                                            <li><strong>Geographical Location</strong></li>
                                            <li><strong>Username</strong></li>
                                            <li><strong>Gender</strong></li>
                                            <li><strong>Media Age</strong></li>
                                            <li><strong>Media Type</strong></li>
                                        </ul>
                                        </p>
                                    </div>
                                    <div class="item">
                                        <p class="ticker-headline">
                                        <h3 style="margin-top: -3px;text-align:center;">Statistics</h3>
                                        <ul class="text-left">
                                            <li><strong> How many people followed him back since he
                                                    started.</strong></li>
                                            <li><strong> Who are the people that followed him back.</strong></li>
                                            <li><strong>How many likes he got since he started.</strong></li>
                                            <li><strong>Who are the people who did like and to which
                                                    picture.</strong>
                                            </li>
                                        </ul>
                                        </p>
                                    </div>


                                </div>


                                <a class="up carousel-control" href="#carousel-example-vertical2" role="button"
                                   data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="down carousel-control" href="#carousel-example-vertical2" role="button"
                                   data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            {{--<div class="carousel slide" data-ride="carousel" id="quote-carousel-2">--}}
                            {{--<!-- Bottom Carousel Indicators -->--}}
                            {{--<ol class="carousel-indicators">--}}
                            {{--<li data-target="#quote-carousel-2" data-slide-to="0" class="active"></li>--}}
                            {{--<li data-target="#quote-carousel-2" data-slide-to="1"></li>--}}
                            {{--<li data-target="#quote-carousel-2" data-slide-to="2"></li>--}}
                            {{--<li data-target="#quote-carousel-2" data-slide-to="3"></li>--}}
                            {{--</ol>--}}

                            {{--<!-- Carousel Slides / Quotes -->--}}
                            {{--<div class="carousel-inner">--}}

                            {{--<!-- Quote 1 -->--}}
                            {{--<div class="item active">--}}
                            {{--<blockquote>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-12">--}}
                            {{--<h3 style="margin-top: -3px;">Default Promotion</h3>--}}
                            {{--<ul>--}}
                            {{--<li> Instaffic will promote your profile 24/7 and expose it up to 15,000 people</li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</blockquote>--}}
                            {{--</div>--}}
                            {{--<!-- Quote 2 -->--}}
                            {{--<div class="item">--}}
                            {{--<blockquote>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-12">--}}
                            {{--<h3 style="margin-top: -3px;">Filter Promotion</h3>--}}
                            {{--<ul>--}}
                            {{--<li> Hashtags </li>--}}
                            {{--<li> Geographical Location </li>--}}
                            {{--<li> Username</li>--}}
                            {{--<li> Gender </li>--}}
                            {{--<li> Media Age </li>--}}
                            {{--<li> Media Type </li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</blockquote>--}}
                            {{--</div>--}}
                            {{--<!-- Quote 3 -->--}}
                            {{--<div class="item">--}}
                            {{--<blockquote>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-12">--}}
                            {{--<h3 style="margin-top: -3px;">Statistics</h3>--}}
                            {{--<ul>--}}
                            {{--<li> How many people followed him back since he started. </li>--}}
                            {{--<li> Who are the people that followed him back. </li>--}}
                            {{--<li> How many likes he got since he started.</li>--}}
                            {{--<li> Who are the people who did like and to which picture. </li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</blockquote>--}}
                            {{--</div>--}}

                            {{--<!-- Quote 4 -->--}}
                            {{--<div class="item">--}}
                            {{--<blockquote>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-12">--}}
                            {{--<h3 style="margin-top: -3px;">Statistics</h3>--}}
                            {{--<ul>--}}
                            {{--<li> Who are the people who comment u and to which picture. </li>--}}
                            {{--<li> From witch hash tags / users I got the most followers. </li>--}}

                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</blockquote>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<!-- Carousel Buttons Next/Prev -->--}}
                            {{--<a data-slide="prev" href="#quote-carousel-2" class="left carousel-control"><i--}}
                            {{--class="fa fa-chevron-left"--}}
                            {{--style="font-size: 55px; right: -7px; margin-top: 52px;"></i></a>--}}
                            {{--<a data-slide="next" href="#quote-carousel-2" class="right carousel-control"><i--}}
                            {{--class="fa fa-chevron-right"--}}
                            {{--style="font-size: 55px; right: 42px;margin-top: 52px;"></i></a>--}}
                            {{--</div>--}}

                        </div>


                    </div>
                    <div class="thumb-unit unit-3">

                        <div class="col-md-12 text-center"><h4>Affiliate Program</h4></div>
                        <i class="ion-speedometer"></i>


                        <div class='row'>
                            <div id="carousel-example-vertical3" class="carousel vertical slide text-center">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <p class="ticker-headline">
                                        <ul class="col-md-offset-2" style="text-align: left; width: 235px;">
                                            <li><strong> Generate Affiliate Link</strong></li>
                                            <li><strong> Share Link with Facebook Friends</strong></li>
                                            <li><strong>Share Link with Instagram Followers</strong></li>
                                            <li><strong>Affiliate Statistics</strong></li>
                                        </ul>
                                        </p>
                                    </div>
                                    <div class="item">
                                        <p class="ticker-headline">

                                        <ul class="col-md-offset-2" style="text-align: left; width: 260px;">
                                            <li><strong>Who are those friends / followers that subscribe</strong></li>
                                            <li><strong>How much money I deserve to get for the moment (Balance Check)</strong></li>
                                        </ul>

                                        </p>
                                    </div>
                                </div>


                                <a class="up carousel-control" href="#carousel-example-vertical3" role="button"
                                   data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="down carousel-control" href="#carousel-example-vertical3" role="button"
                                   data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            {{--<div class="carousel slide" data-ride="carousel" id="quote-carousel-3">--}}
                            {{--<!-- Bottom Carousel Indicators -->--}}
                            {{--<ol class="carousel-indicators">--}}
                            {{--<li data-target="#quote-carousel-3" data-slide-to="0" class="active"></li>--}}
                            {{--<li data-target="#quote-carousel-3" data-slide-to="1"></li>--}}
                            {{--</ol>--}}

                            {{--<!-- Carousel Slides / Quotes -->--}}
                            {{--<div class="carousel-inner">--}}

                            {{--<!-- Quote 1 -->--}}
                            {{--<div class="item active">--}}
                            {{--<blockquote>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-12">--}}
                            {{--<ul >--}}
                            {{--<li> Generate Affiliate Link</li>--}}
                            {{--<li> Share Link with Facebook Friends</li>--}}
                            {{--<li> Share Link with Instagram Followers</li>--}}
                            {{--<li> Affiliate Statistics</li>--}}


                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</blockquote>--}}
                            {{--</div>--}}
                            {{--<!-- Quote 2 -->--}}
                            {{--<div class="item">--}}
                            {{--<blockquote>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-12">--}}
                            {{--<ul>--}}
                            {{--<li> Who are those friends / followers that subscribe.</li>--}}
                            {{--<li> How much money I deserve to get for the moment (Balance Check).</li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</blockquote>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<!-- Carousel Buttons Next/Prev -->--}}
                            {{--<a data-slide="prev" href="#quote-carousel-3" class="left carousel-control"><i--}}
                            {{--class="fa fa-chevron-left"--}}
                            {{--style="font-size: 55px; right: -7px; margin-top: 52px;"></i></a>--}}
                            {{--<a data-slide="next" href="#quote-carousel-3" class="right carousel-control"><i--}}
                            {{--class="fa fa-chevron-right"--}}
                            {{--style="font-size: 55px; right: 42px;margin-top: 52px;"></i></a>--}}
                            {{--</div>--}}

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-benefits-link link2"><a href="/user/dashboard" class="btn btn-success btn-lg">Account Activation</a></div>

    <!--Our Benefits Section-->
    <div class="our-benefits">
        <div class="text-center">
            <h2>Our Benefits</h2>
            <hr>
            <p>Why Instaffic is the best service for Instagram automation?</p>
        </div>
        <div class="benefits-container">
            <div class="benefits-unit">
                <i class="ion-android-download"></i>

                <div class="benefits-content">
                    <h3>No Downloads</h3>

                    <p>You can use instaffic services through any browser without downloading or installing
                        anything.</p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-stats-bars"></i>

                <div class="benefits-content">
                    <h3>Statistics Management</h3>

                    <p>
                        Instaffic gives you full information about her performances for your profile. All the
                        information you desire to know but instagram doesn't let you.
                    </p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-android-lock"></i>

                <div class="benefits-content">
                    <h3>Safe to Use</h3>

                    <p>You can use Instaffic straight from the web on all browsers. You don't need to download or
                        install anything to enjoy our service, which is why Instaffic is the safest Instagram bot
                        available</p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-headphone"></i>

                <div class="benefits-content">
                    <h3>Customer Support</h3>

                    <p>We guarantee that you will receive technical assistance whenever you need it. Feel free to
                        contact us with your questions and our friendly team will get back to you within 24 hours</p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-android-chat"></i>

                <div class="benefits-content">
                    <h3>Online System 24x7</h3>

                    <p>Instaffic is an online system that works 24/7 to promote your instagram profile, even when you
                        are not connected to internet. Our system gives u online updates you will know any second which
                        notification accrued on your instagram profile.</p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-android-globe"></i>

                <div class="benefits-content">
                    <h3>Global Expose</h3>

                    <p>Instaffic provides you global traffic (worldwide) to your profile in instagram or to target
                        audience as you choose. As long as more people will expose to you more people will start follow
                        you. Most amazing way to explore new people and get new friends.</p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-android-calendar"></i>

                <div class="benefits-content">
                    <h3>5 Days Free Trail</h3>

                    <p>We are so sure about our amazing system, so we are willing to give you 5 days free of use without
                        any charge or obligation. Let us worn you we gonna change your life and get you the attention
                        you deserve.</p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-ios-game-controller-b"></i>

                <div class="benefits-content">
                    <h3>Target Audience</h3>

                    <p>Instaffic will promote your instagram profile to the people that being followed by the people you
                        follow same interests and same lifestyle. You can also target and choose the audience that your
                        profile will be expose to, by unique and smart filtration system.</p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-pricetag"></i>

                <div class="benefits-content">
                    <h3>Making Money</h3>

                    <p>We offer you to be our partner by an amazing and effective program. Our system will send a link
                        to all your friends on facebook and followers on instagram you will get 30% of the subscribe
                        payment, each month, from those who will subscribe.</p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-thumbsup"></i>

                <div class="benefits-content">
                    <h3>Real Followers and Likes</h3>

                    <p>Our impressive and unique system guarantee 100% real comments/likes/follows within automated
                        process. Every action being done forward your profile by being exposed to it by our promotion,
                        is because somebody loved you.</p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-briefcase"></i>

                <div class="benefits-content">
                    <h3>Business Promotion</h3>

                    <p>Instaffic provides you ultimate system to promote your business to target audience and potential
                        customers by filtration system that gives you control to whom be exposed.</p>
                </div>
            </div>
            <div class="benefits-unit">
                <i class="ion-social-usd"></i>

                <div class="benefits-content">
                    <h3>Money to Value</h3>

                    <p>you will see the results from the first day massive increase of followers and likes. Within small
                        invest every month you can become a public opinion leader, famous and even make money of that.
                        we are the most worthwhile marketing.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="our-benefits-link link2"><a href="/user/dashboard" class="btn btn-success btn-lg">Account Activation</a></div>
    <!--For Whom Section-->
    <div class="for-whom">
        <div class="overlay"></div>
        <div class="text-center">
            <h2>For whom</h2>
            <hr>
            <p>Get started in easiest way</p>
        </div>
        <div class="for-whom-conent">
            <div class="personal-profile">
                <i class="ion-ios-person-outline"></i>

                <h3>Private Profile</h3>

                <p>Instagram gives you a unique opportunity to share your life with people all around the world. With
                    the help of our service you can interact with potential followers 24/7, day in, day out. Turn on
                    your activity while you're sleeping or at work and your flow of followers and likes will never
                    end.</p>
                <i class="ion-ios-briefcase-outline"></i>

                <h3>Business Profile</h3>

                <p>If you're using Instagram daily to engage with your fans or customers, then you know how much time it
                    takes especially if you're a social media agency managing hundreds of accounts. Instagress will not
                    only save your time, but will help you to maximize your engagement with Instagram users. The
                    attention your business receives will be neverending</p>
            </div>
        </div>
    </div>
    <!--How It Works Section-->
    <div class="how-it-works">
        <div class="text-center">
            <h2>How It Works</h2>
            <hr>
            <p>Everybody loves tech gadgets, But our<sup>'</sup>s is different. Here is how it works. Its should be
                simple. Add how easy is to install your product</p>
        </div>
        <div class="how-it-works-container">
            <div class="how-it-works-unit works-unit">
                <div class="work-icon"><img src="/assets/user/images/signup.png"></div>
                <h3>Sign up</h3>

                <p>Signing up for Instaffic is quick and takes less than a minute. Sign up now to receive your first 3
                    days for free!</p>
            </div>
            <div class="how-it-works-unit works-unit">
                <div class="work-icon"><img src="/assets/user/images/add-account.png"></div>
                <h3> Add Account</h3>

                <p>Next, add your Instagram accounts using your credentials. Don't worry, we take your privacy and
                    security very seriously.</p>
            </div>
            <div class="how-it-works-unit works-unit">
                <div class="work-icon"><img src="/assets/user/images/setting.png"></div>
                <h3> Adjust Settings</h3>

                <p>There are tons of settings that you can customize to specifically target the Instagram accounts that
                    matter to you.</p>
            </div>
            <div class="how-it-works-unit">
                <div class="work-icon"><img src="/assets/user/images/yay-done.png"></div>
                <h3> Yay! Done</h3>

                <p>You'll be pleasantly surprised by how easy and effective it is. Just push the red button to get
                    started and watch the new followers roll in!</p>
            </div>
        </div>
    </div>
    <!--Package Options-->
    <div id="price" style="height:50px;float: left;width: 100%;"></div>
    <div class="package-options">
        <div class="overlay"></div>
        <div class="package-container">
            <div class="text-center">
                <h2>CHOOSE YOUR PLAN</h2>
                <hr>
                <p>Choose the plan which is convenient to you</p>
            </div>
            <div class="package-unit">
                <div class="text-center price-option">
                    <i class="ion-android-person"></i>

                    <h3>PRIVATE</h3>

                    <div class="price-container">
                        <p style="color: #ffffff;font-size: 15px;font-weight: 500;">
                            People who didn't follow back<br>
                            Top 20 Admirers<br>
                            Notifications of Favourite users<br>
                            Chat with nearby users - Instaffic App<br>
                            Instagram Promotions<br>
                            Affiliate Programs<br>
                        </p>
                    </div>
                    <div class="hidden-content">
                        <p style="font-size: 16px; color:#fff; line-height:3;">
                            1  Month  - NIS 150<br>
                            3  Months - NIS 420<br>
                            6  Months - NIS 780<br>
                            12 Months - NIS 1440<br>
                        </p>
                        <a href="#" class="btn btn-success login">BUY NOW</a>
                    </div>
                </div>
            </div>
            <div class="package-unit">
                <div class="text-center price-option">
                    <i class="ion-android-playstore"></i>

                    <h3>BUSINESS</h3>

                    <div class="price-container">
                        <p style="color: #ffffff;font-size: 15px;font-weight: 500;">
                            Scheduled Post Uploading<br>
                            Instagram Direct Messaging<br>
                            Track hashtags and users<br>
                            Auto-Commenting in New Posts<br>
                            Tagging Automatically in New Posts<br>
                            {Private package functionalities included}
                        </p>
                    </div>
                    <div class="hidden-content">
                        <p style="font-size: 16px; color:#fff; line-height:3;">
                            1  Month  - NIS 300<br>
                            3  Months - NIS 850<br>
                            6  Months - NIS 1600<br>
                            12 Months - NIS 3000<br>
                        </p>
                        <a href="#" class="btn btn-success login">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section-->
    <div id="blog" style="height:50px;float: left;width: 100%;"></div>
    <div  class="blog">
        <div class="blog-container">
            <div class="text-center">
                <h2>Latest Blog updates</h2>
                <hr>
                <p>Connecting ideas and people how talk can change our lives..</p>
            </div>
            <div class="blog-post-container">
                <div class="blog-post">
                    <div class="blog-post-unit">
                        <a href="#"><img src="/assets/user/images/Dashboard.png" height="300"></a>

                        <div class="single-post">
                            <h2>Dashboard for Instagram Accounts</h2>

                            {{--<div class="blog-view"><i class="posted-date">JAN 23</i><i class="comments">3 COMMENTS</i>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="blog-post-unit">
                        <a href="#"><img src="/assets/user/images/Filter_Promotion_Final.png" height="300"></a>

                        <div class="single-post">
                            <h2>Filter Promotion </h2>

                            {{--<div class="blog-view"><i class="posted-date">JAN 23</i><i class="comments">3 COMMENTS</i>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="blog-post-unit">
                        <a href="#"><img src="/assets/user/images/Default_Promo_Stats.png" height="300"></a>

                        <div class="single-post">
                            <h2>Default Promotion Statistics</h2>

                            {{--<div class="blog-view"><i class="posted-date">JAN 23</i><i class="comments">3 COMMENTS</i>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="blog-post-unit">
                        <a href="#"><img src="/assets/user/images/Affiliate_Statistics.png" height="300"></a>

                        <div class="single-post">
                            <h2>Affiliate Program Statistics</h2>

                            {{--<div class="blog-view"><i class="posted-date">JAN 23</i><i class="comments">3 COMMENTS</i>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--App Download section-->
    <div class="download-app">
        <div class="download-app-container">
            <div class="download-app-wrapper">
                <div class="col-6 left"><img src="/assets/user/images/app-download1.png" class="img-responsive"></div>
                <div class="col-6 right">
                    <h2>Mobile App for Instagram Lovers</h2>
                    <p>Coming Soon... </p>
                    <div class="download-buttons"><a href="#" class="download-link"><img
                                    src="/assets/user/images/app-store.png"></a><a href="#" class="download-link"><img
                                    src="/assets/user/images/google-play.png"></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-divide"></div>
    <!--Subscribe our News letter-->
    <div class="subscription" id="support" >
        <div class="subscription-container">
            <div class="subscription-wrapper" style="padding-top: 15px;">
                <h2>SUPPORT</h2>


                <p style="color:#0c0c0c">Need Technical Assistance regarding the system? </p>
                <p style="color:#0c0c0c">Email us or join us on skype.</p>
                <p>
                    <b>Email ID:</b> &nbsp;&nbsp;<a href="mailto:support@instaffic.com" style="margin-right:60px">support@instaffic.com</a>
                    <b>Skype ID:</b> &nbsp;&nbsp;<a href="skype:live:globaltrafficinsta?add">live:globaltrafficinsta</a>
                </p>
            </div>


            {{--<form class="subscription-form">--}}
            {{--<div class="form-group">--}}
            {{--<input type="email" placeholder="Enter email address"><span class="subscription-button"><button--}}
            {{--type="submit"><img src="/assets/user/images/right-arrow-white.png"></button></span>--}}

            {{--<div class="error-message">--}}
            {{--<p><i></i>No Spam. We Promise. Unsubscribe anytime.</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</form>--}}
        </div>
    </div>
    <!--Footer Section-->
    <div class="footer">
        <div class="footer-container">
            <div class="footer-wrapper">
                <div class="desktop-footer">
                    <div class="col-3">
                        {{--<a href="/user/dashboard" class="logo"><img src="/assets/user/images/instaffic_logo.png" width="150"></a>--}}

                        <div class="copyright" style="padding-top:13px">&copy 2017 Instaffic, All Right Reserved </div>
                    </div>
                    <div class="col-6">
                        <ul class="footer-navoigation-list">
                            <li><a href="/about/us">About</a></li>
                            <li><a href="#price">Prices</a></li>
                            <li><a href="#blog">Blog</a></li>
                            <li><a href="/terms/condition">Terms of Use</a></li>
                            <li><a href="/privacy/policy">Privacy Policy</a></li>
                        </ul>
                        {{--<ul class="social-list" style="margin-bottom: 0;">--}}
                        {{--<li><a href="#" target="_blank"><i class="twitter"></i></a></li>--}}
                        {{--<li><a href="#" target="_blank"><i class="facebook"></i></a></li>--}}
                        {{--<li><a href="#" target="_blank"><i class="google"></i></a></li>--}}
                        {{--</ul>--}}
                    </div>
                    <div class="col-3" style="padding-top:5px"><a href="mailto:support@instaffic.com" class="support">support@instaffic.com</a>
                    </div>
                </div>
                <div class="mobile-footer">
                    <div class="col-10 text-center">
                        <a href="mailto:support@instaffic.com" class="support">support@instaffic.com</a>
                        <ul class="footer-navoigation-list">
                            <li><a href="/about/us">About</a></li>
                            <li><a href="#price">Prices</a></li>
                            <li><a href="#blog">Blog</a></li>
                            <li><a href="/terms/condition">Terms of Use</a></li>
                            <li><a href="/privacy/policy">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-10 text-center">
                        <div class="copyright">© 2017 Instaffic, All Right Reserved</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!--Coded by Vijay Kolar--><!--Javascript Files-->
<script src="/assets/user/js/jquery.js"></script>
<script src="/assets/user/user-panel/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/user/js/function.js"></script>


<script src="/assets/user/js/validate.min.js"></script>
<script src="/assets/user/js/jstz.min.js"></script>

<script type="text/javascript">
    /* Slider */
    $(document).ready(function () {
        //Set the carousel options
        $('#quote-carousel').carousel({
            pause: true,
            interval: 4000,
        });
        $('#quote-carousel-2').carousel({
            pause: true,
            interval: 4000,
        });
        $('#quote-carousel-3').carousel({
            pause: true,
            interval: 4000,
        });
    });

</script>

<script type="text/javascript">
    //errorMessageModal modal

    $('.close-btn-1').click(function () {
        $('.forgotPassword-overlay').removeClass("signup-modal-is-open ");
        return false;
    });

</script>

<script>
    $(document).ready(function () {

        $("#ProfileManagement").click(function () {
            console.log(" came inside ProfileManagement");
            $('#ProfileManagementview').show();
            $('#ProfilePromotionview').hide();
            $('#AffiliateProgramview').hide();


        })
        $("#ProfilePromotion").click(function () {
            console.log(" came inside ProfilePromotion");
            $('#ProfileManagementview').hide();
            $('#ProfilePromotionview').show();
            $('#AffiliateProgramview').hide();
        })
        $("#AffiliateProgram").click(function () {
            console.log(" came inside ProfileManagement");
            $('#ProfileManagementview').hide();
            $('#ProfilePromotionview').hide();
            $('#AffiliateProgramview').show();
        })
        var showPageType='{{$showPageType}}';
        console.log('showPageType====>',showPageType)
        var webUrl='{{env('WEB_URL')}}';
        $('header .navbar-menu').addClass('header-is-active');
        if(showPageType.length>0){
            switch (showPageType){
                case 'login': $('.login').click(); break;
                case 'signup': $('.login').click(); break;
//                case 'about':location.href=webUrl+"/home#about";break;
                case 'system':location.href=webUrl+"/home#system";break;
                case 'blog':location.href=webUrl+"/home#blog";break;
                case 'price':location.href=webUrl+"/home#price";break;
                case 'support':location.href=webUrl+"/home#support";break;
                case 'instaffic':location.href=webUrl+"/home#instaffic";break;
            }
        }

    })
</script>



</body>
</html>