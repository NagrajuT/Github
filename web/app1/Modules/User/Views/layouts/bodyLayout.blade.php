<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">

<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    @include('User::layouts.header')
    @yield('headcontent')

    <style>
        .dropdown-menu .divider {
            margin: 0px !important;
        }

        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(/assets/user/images/ajax-loader.gif) center no-repeat #fff;
        }


        textarea, select, input[type="text"],input[type="checkbox"],input[type="radio"],input[type="password"],input[type="email"] {
            border-radius: 5px !important;
        }

        textarea:focus, textarea:hover, select:focus, select:hover,
        input[type="text"]:focus, input[type="text"]:hover,input[type="checkbox"]:hover
        ,input[type="radio"]:hover,input[type="password"]:hover,input[type="email"]:hover
        {
            border: skyblue 1px solid !important;
            box-shadow: 0 0px 5px skyblue !important;
            border-radius: 5px;
        }
    </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<div class="se-pre-con"></div>

<!-- BEGIN HEADER -->
<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container" style="padding: 0">
            <!-- BEGIN LOGO -->
            {{--<div class="page-logo" style="margin-top: -36px;">--}}
            <a href="/home"><img src="/assets/user/images/logo_smartffic_dashboard.png" alt="logo"
                                 class="logo-default" width="250" style="margin: 13px 0 0;"></a>
            {{--</div>--}}
                    <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">

                    <!-- BEGIN NOTIFICATION DROPDOWN  SAURABH -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a id="newNotify" href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                           data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-bell"></i>
                        </a>
                        <ul class="dropdown-menu notification_bg">
                            <li class="external" id="countNotify">

                            </li>
                            <li>
                                <ul id="notify" class="dropdown-menu-list scroller"
                                    style="height: 250px; overflow-y: scroll"
                                    data-handle-color="#637283">
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN SAURABH-->


                    <!-- END TODO DROPDOWN -->
                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <span class="username username-hide-mobile">@if(Session::get('instaffic_user')){{Session::get('instaffic_user')['email']}}@endif</span>
                            <img alt="" class="img-circle profile_picture"
                                 src="@if(Session::has('instaffic_user')){{Session::get('instaffic_user')['profile_pic_url']}}@endif" style="height:45px;width:45px">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            {{--<li>--}}
                            {{--<a href="extra_profile.html">--}}
                            {{--<i class="icon-user"></i> My Profile </a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="page_calendar.html">--}}
                            {{--<i class="icon-calendar"></i> My Calendar </a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="inbox.html">--}}
                            {{--<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">--}}
                            {{--3 </span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="javascript:;">--}}
                            {{--<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">--}}
                            {{--7 </span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="divider">--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="extra_lock.html">--}}
                            {{--<i class="icon-lock"></i> Lock Screen </a>--}}
                            {{--</li>--}}
                            <li>
                                <a href="/user/logout">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER TOP -->

    <!-- BEGIN HEADER MENU -->
    <div class="page-header-menu">
        <div class="container" style="padding: 0">
            <!-- BEGIN MEGA MENU -->
            <div class="hor-menu ">
                <ul class="nav navbar-nav">
                    <li class="@yield('active_dashboard')">
                        <a href="/user/dashboard">Account Activation</a>
                    </li>

                    <li class="menu-dropdown classic-menu-dropdown @yield('active_profileManagement') ">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown"
                           href="javascript:;">
                            Profile Management <i class="fa fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu pull-left" style="width: 120%;">
                            <li style="width:100%;">
                                <a href="/get/manual/follow">
                                    <img src="/assets/user/user-panel/img/unfollow.png" class="img-responsive"
                                         style="float:left;"/> &nbsp;Who didn't follow me back
                                </a>
                            </li>

                            <li style="width:100%;">
                                <a href="/top/admire/">
                                    <img src="/assets/user/user-panel/img/admirer.png" class="img-responsive"
                                         style="float:left;"> &nbsp;My Top 20 Admire
                                </a>
                            </li>

                            <li style="width:100%;">
                                <a href="/alert/about/favorite/users">
                                    <img src="/assets/user/user-panel/img/alert.png" class="img-responsive"
                                         style="float:left;"/> &nbsp;Alert about favourite users
                                </a>
                            </li>

                            <li class="disabled" style="width:100%;">
                                <a href="#">
                                    <img src="/assets/user/user-panel/img/nearby.png" class="img-responsive"
                                         style="float:left;"/> &nbsp;Who nearby me
                                    <span style="font-size:10px;">
                                        <br>(* Only available for mobile users)
                                    </span>
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li class="dropdown-header" style="color:#abacab !important;">
                                <a href="/user/packageLists" style="font-size:12px;">
                                    These
                                    functionalities are available for<br> business package. <br>Please suscribe now for 300
                                    nis</a>
                            </li>

                            {{--<li style="width:100%;">--}}
                            {{--<a href="/upload/post/by/timer" style="float:left;">--}}
                            {{--<img src="/assets/user/user-panel/img/upload.png" class="img-responsive"--}}
                            {{--style="float:left;"> &nbsp;Uploading pictures by Timer--}}
                            {{--</a>--}}
                            {{--</li>--}}

                            <li style="width:100%;">
                                <a href="/upload/post">
                                    <img src="/assets/user/user-panel/img/upload.png" class="img-responsive"
                                         style="float:left;"> &nbsp;Upload Picture By Timer
                                </a>
                            </li>

                            <li style="width:100%;">
                                <a href="/direct/messages">
                                    <img src="/assets/user/user-panel/img/direct-msg.png" class="img-responsive"
                                         style="float:left;"> &nbsp;Direct Messages
                                </a>
                            </li>

                            <li style="width:100%;">
                                <a href="/catching/pictures">
                                    <img src="/assets/user/user-panel/img/catch-pic.png" class="img-responsive"
                                         style="float:left;"> &nbsp;Catching Pictures
                                </a>
                            </li>

                            {{--<li style="width:100%;">--}}
                            {{--<a href="/profileManagement/catchingPicture" style="float:left;">--}}
                            {{--<img src="/assets/user/user-panel/img/catch-pic.png" class="img-responsive"--}}
                            {{--style="float:left;"> &nbsp;Catching Pictures--}}
                            {{--</a>--}}
                            {{--</li>--}}





                            {{--<li class="disabled" style="width:100%;">--}}
                            {{--<a href="#" style="float:left;">--}}
                            {{--<img src="/assets/user/user-panel/img/campaign.png" class="img-responsive"--}}
                            {{--style="float:left;"> &nbsp;Instagram Campaign--}}
                            {{--</a>--}}
                            {{--</li>--}}

                            <li style="width:100%;">
                                <a href="/automatic/comments">
                                    <img src="/assets/user/user-panel/img/auto.png" class="img-responsive"
                                         style="float:left;"> &nbsp;Automatic Comments
                                </a>
                            </li>

                            <li style="width:100%;">
                                <a href="/automatic/tags">
                                    <img src="/assets/user/user-panel/img/tag.png" class="img-responsive"
                                         style="float:left;"> &nbsp;Tags Automatically
                                </a>
                            </li>
                        </ul>

                        {{--<li class="divider" style="margin:246px 0px!important;"></li>--}}
                        {{----}}
                        {{--<li>--}}
                        {{--<a href="/user/getFavoriteList">--}}
                        {{--<i class="fa fa-user" aria-hidden="true"></i> &nbsp;Favourite users--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="/user/DistributionNotice"><i class="fa fa-envelope" aria-hidden="true"></i>--}}
                        {{--&nbsp;Distribution Notice</a></li>--}}
                        {{------}}
                        {{--<li class="">--}}
                        {{--<a href="/postOnInstagram">--}}
                        {{--<i class="fa fa-upload" aria-hidden="true"></i>--}}
                        {{--Post on Instagram </a>--}}
                        {{--</li>--}}
                        {{--<li class="">--}}
                        {{--<a href="/show/scheduled/posts">--}}
                        {{--<i class="fa fa-clock-o" aria-hidden="true"></i>--}}
                        {{--Scheduled Posts </a>--}}
                        {{--</li>--}}
                        {{--<li class="">--}}
                        {{--<a href="/show/bookmarked/posts">--}}
                        {{--<i class="fa fa-bookmark" aria-hidden="true"></i>--}}
                        {{--Bookmarks </a>--}}
                        {{--</li>--}}
                        {{--<li class="">--}}
                        {{--<a href="/user/getFavoriteList">--}}
                        {{--<i class="fa fa-user" aria-hidden="true"></i>--}}
                        {{--Favorite Users </a>--}}
                        {{--</li>--}}

                        {{--<li class="dropdown-submenu">--}}
                        {{--<a class="test" href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Messaging</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                        {{--<li><a tabindex="-1" href="/user/DirectmessageSend"><i class="fa fa-share" aria-hidden="true"></i> DirectMessage</a></li>--}}
                        {{--<li><a tabindex="-1" href="/user/DistributionNotice"><i class="fa fa-share-alt" aria-hidden="true"></i>--}}
                        {{--Distribution Notice</a></li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}



                        {{--<ul class="dropdown-menu pull-left">--}}
                        {{------}}
                        {{--<li style="width:100%;"><a href="#" style="float:left;"><img--}}
                        {{--src="/assets/user/user-panel/img/unfollow.png" class="img-responsive"--}}
                        {{--style="float:left;"/> &nbsp;Who didn't follow me back</a></li>--}}
                        {{--<li style="width:100%;"><a href="#" style="float:left;"><img--}}
                        {{--src="/assets/user/user-panel/img/admirer.png" class="img-responsive"--}}
                        {{--style="float:left;"> &nbsp;My Top 20 Admire</a></li>--}}
                        {{--<li style="width:100%;"><a href="#" style="float:left;"><img--}}
                        {{--src="/assets/user/user-panel/img/alert.png" class="img-responsive"--}}
                        {{--style="float:left;"/> &nbsp;Alert about favourite users</a></li>--}}
                        {{--<li style="width:100%;"><a href="#" style="float:left;"><img--}}
                        {{--src="/assets/user/user-panel/img/nearby.png" class="img-responsive"--}}
                        {{--style="float:left;"/> &nbsp;Who nearby me <span style="font-size:10px;"><br>(* Only available for mobile users)</span></a>--}}
                        {{--</li>--}}
                        {{--<li class="divider" style="margin:173px 0px!important;"></li>--}}
                        {{--<li class="dropdown-header" style="color:#abacab !important;margin-top: -169px;">These--}}
                        {{--functionalities are available<br/> for business package.<br/> Please suscribe now for--}}
                        {{--300 nis--}}
                        {{--</li>--}}
                        {{--<li style="width:100%;"><a href="/postOnInstagram" style="float:left;"><img--}}
                        {{--src="/assets/user/user-panel/img/upload.png" class="img-responsive"--}}
                        {{--style="float:left;"> &nbsp;Uploading pictures by Timer</a></li>--}}
                        {{--<li style="width:100%;"><a href="/user/DirectmessageSend" style="float:left;"><img--}}
                        {{--src="/assets/user/user-panel/img/direct-msg.png" class="img-responsive"--}}
                        {{--style="float:left;"> &nbsp;Direct Messages</a></li>--}}
                        {{--<li style="width:100%;"><a href="#" style="float:left;"><img--}}
                        {{--src="/assets/user/user-panel/img/catch-pic.png" class="img-responsive"--}}
                        {{--style="float:left;"> &nbsp;Catching Pictures</a></li>--}}
                        {{--<li style="width:100%;"><a href="#" style="float:left;"><img--}}
                        {{--src="/assets/user/user-panel/img/campaign.png" class="img-responsive"--}}
                        {{--style="float:left;"> &nbsp;Instagram Campaign </a></li>--}}
                        {{--<li style="width:100%;"><a href="#" style="float:left;"><img--}}
                        {{--src="/assets/user/user-panel/img/auto.png" class="img-responsive"--}}
                        {{--style="float:left;"> &nbsp;Automatic Comments</a></li>--}}
                        {{--<li style="width:100%;"><a href="#" style="float:left;"><img--}}
                        {{--src="/assets/user/user-panel/img/tag.png" class="img-responsive"--}}
                        {{--style="float:left;"> &nbsp;Tags Automatically</a></li>--}}
                        {{--<li class="divider" style="margin:246px 0px!important;"></li>--}}
                        {{--<li><a href="/scheduledPosts" style="margin-top: -241px;"><i class="fa fa-clock-o"--}}
                        {{--aria-hidden="true"></i> &nbsp;Scheduled--}}
                        {{--Posts</a></li>--}}
                        {{--<li><a href="/showBookmarkPost"><i class="fa fa-bookmark" aria-hidden="true"></i> &nbsp;Bookmarks</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="/user/getFavoriteList"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;Favourite--}}
                        {{--users</a></li>--}}
                        {{--<li><a href="/user/DistributionNotice"><i class="fa fa-envelope" aria-hidden="true"></i>--}}
                        {{--&nbsp;Distribution Notice</a></li>--}}
                        {{------}}
                        {{--<li class="">--}}
                        {{--<a href="/postOnInstagram">--}}
                        {{--<i class="fa fa-upload" aria-hidden="true"></i>--}}
                        {{--Post on Instagram </a>--}}
                        {{--</li>--}}
                        {{--<li class="">--}}
                        {{--<a href="/show/scheduled/posts">--}}
                        {{--<i class="fa fa-clock-o" aria-hidden="true"></i>--}}
                        {{--Scheduled Posts </a>--}}
                        {{--</li>--}}
                        {{--<li class="">--}}
                        {{--<a href="/show/bookmarked/posts">--}}
                        {{--<i class="fa fa-bookmark" aria-hidden="true"></i>--}}
                        {{--Bookmarks </a>--}}
                        {{--</li>--}}
                        {{--<li class="">--}}
                        {{--<a href="/user/getFavoriteList">--}}
                        {{--<i class="fa fa-user" aria-hidden="true"></i>--}}
                        {{--Favorite Users </a>--}}
                        {{--</li>--}}

                        {{--<li class="dropdown-submenu">--}}
                        {{--<a class="test" href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Messaging</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                        {{--<li><a tabindex="-1" href="/user/DirectmessageSend"><i class="fa fa-share" aria-hidden="true"></i> DirectMessage</a></li>--}}
                        {{--<li><a tabindex="-1" href="/user/DistributionNotice"><i class="fa fa-share-alt" aria-hidden="true"></i>--}}
                        {{--Distribution Notice</a></li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}

                        {{--</ul>--}}
                    </li>

                    <li class="menu-dropdown classic-menu-dropdown @yield('active_profilePromotion') ">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown"
                           href="javascript:;">
                            Promotion Management <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li class="">
                                <a href="/default/promotion">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                    Default </a>
                            </li>
                            <li class="">
                                <a href="/filter/promotion">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                    Filter </a>
                            </li>
                            <li class="">
                                <a href="/instagramFinder">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                    Instagram Finder </a>
                            </li>
                        </ul>


                    </li>

                    <li class="menu-dropdown classic-menu-dropdown @yield('active_affiliateProgram') ">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown"
                           href="javascript:;">
                            Affiliate Program <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            {{--<li class="">--}}
                            {{--<a href="/getRefferedUsers">--}}
                            {{--<i class="fa fa-info-circle" aria-hidden="true"></i>--}}
                            {{--Affiliate Statistics </a>--}}
                            {{--</li>--}}
                            <li class="">
                                <a href="/affiliate">
                                    <i class="fa fa-link" aria-hidden="true"></i>
                                    Refer a friend </a>
                                {{--<i class="fa fa-link" aria-hidden="true"></i>--}}
                                {{--Making Easy Money </a>--}}
                            </li>
                            <li class="">
                                <a href="/affiliateStatistics">
                                    <i class="fa fa-area-chart" aria-hidden="true"></i>
                                    Affiliate Statistics </a>
                            </li>
                            <li class="">
                                <a href="/affiliatePayments">
                                    <i class="fa fa-link" aria-hidden="true"></i>
                                    Affiliate Payments </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-dropdown classic-menu-dropdown @yield('active_myAccount') ">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown"
                           href="javascript:;">
                            My Account <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-left">

                            {{--<li class="">--}}
                            {{--<a href="/instaDetails">--}}
                            {{--<i class="fa fa-cogs" aria-hidden="true"></i>--}}
                            {{--Account Settings_old </a>--}}
                            {{--</li>--}}
                            <li class="">
                                <a href="/profileDetails">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    Account Settings </a>
                            </li>


                            <li class="">
                                <a href="/user/packageLists">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    Subscription Packages </a>
                            </li>
                            <li class="">
                                <a href="/paymentHistory">
                                    <i class="fa fa-history" aria-hidden="true"></i>
                                    Payment History </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- END MEGA MENU -->
        </div>
    </div>
    <!-- END HEADER MENU -->

</div>

<!-- END HEADER -->


<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">

    <!-- BEGIN PAGE CONTENT -->

    @yield('content')

            <!-- END PAGE CONTENT -->

</div>
<!-- END PAGE CONTAINER -->


<!-- BEGIN PRE-FOOTER -->
<div class="page-prefooter" style="padding: 30px; padding-bottom: 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                <h2>About</h2>
                <p>
                    Instaffic from global traffic is one of the only companies in the world that has development
                    &nbsp;<a href="/about/us">more..</a>
                </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs12 footer-block pull-left">
                {{--<a href="/privacy/policy"><h2>Privacy Policy</h2></a>--}}
                <h2>Privacy Policy</h2>
                <p>This policy set covers how Instaffic uses and protects any kind of information you share
                     &nbsp;<a href="/privacy/policy">more..</a>
                </p>

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 footer-block">

                    <h2>Terms of Use</h2>
                    <p>
                        This resembles the latest terms of the service agreement as of (dd/mm/yy).If you desire
                        &nbsp;<a href="/terms/condition">more..</a>
                    </p>

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                <h2>Contacts</h2>
                <address class="margin-bottom-40">
                    Skype: <a href="skype:live:globaltrafficinsta">live:globaltrafficinsta</a><br>
                    Email: <a href="mailto:support@instaffic.com">support@instaffic.com</a>
                </address>
            </div>
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="container">
        2017 &copy; Instaffic. All Rights Reserved.
    </div>
</div>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>

<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->

@include('User::layouts.footer')
@yield('pagejavascripts')

<script>
    $(function () {
        function notifyMe() {
            $.ajax({
                url: '/user/getNotifications',
                dataType: 'json',
                type: 'post',
                success: function (response) {
                    if (response.status == 200) {
                        var notification = '', newNotificationCount = 0;
                        $.each(response.data, function (i, o) {
                            var created_at = o.created_at;
                            if (o.notification_status == "N")
                                ++newNotificationCount;
                            var style = 'label-success';
                            if (o.notification_type == 1)
                                var cls = 'fa-shopping-cart';
                            else if (o.notification_type == 2)
                                var cls = 'fa-money';
                            else if (o.notification_type == 3)
                                var cls = 'fa-bolt';
                            else if (o.notification_type == 4)
                                var cls = 'fa-bell-o';
                            else if (o.notification_type == 5)
                                var cls = 'fa-user';
                            else if (o.notification_type == 6) {
                                var cls = 'fa-money';
                                var style = 'label-danger';
                            }
                            else
                                var cls = 'fa-files-o';

                            notification += '<li><a href="javascript:;"> <span class="time">' + created_at + '</span> <span class="details"> <span class="label label-sm label-icon ' + style + '"> <i class="fa ' + cls + '"></i> </span>' + o.notification_message + '</span> </a></li>';
                        });
                        $('#newNotify').html((newNotificationCount != 0 ? '<i class="icon-bell"></i> <span class="badge badge-default">' + newNotificationCount + '</span>' : '<i class="icon-bell"></i>'));
                        $('#countNotify').html('<h3><span class="bold">' + newNotificationCount + '  new</span> notifications</h3><a href="/user/showNotifications">view all</a>');
                        $('#notify').html(notification);
                    } else if (response.status == 400) {
//                    var notification = '';
                        $('#countNotify').html('<h3><span class="bold">No any</span> notification found</h3><a href="/user/showNotifications">view all</a>');
                        $('#notify').hide();
                    }
                }
            });
            setTimeout(notifyMe, 40000);
        }
        notifyMe();
        $('#newNotify').mouseleave(function () {

            if ($('#newNotify').find('.badge-default').val() == "") {
                $.ajax({
                    url: '/user/updateViewedNotification',
                    dataType: 'json',
                    type: 'post',
                    success: function (response) {
                        if (response.status == 200) {
                            $('#newNotify').find('.badge-default').hide();
//                        $('#countNotify').html('<h3><span class="bold">' + newNotificationCount + '  new</span> notifications</h3>');
                        } else if (response.status == 400) {
                            console.log("error in updating seen notifications");
                        }
                    }
                });
            } else {
                console.log("no any new notification");
            }
        });
    });
</script>


<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>