@extends('User::layouts.bodyLayout')

@section('headcontent')

    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/user/css/sweetalert.css">
    <style>
        .truncate {

            min-width: auto !important;
            max-width: 215px;

            /*width: 250px;*/
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #fff;
        }

        .set.truncate a {
            color: #fff;
            text-decoration: none;
        }

        .parentDiv {
            padding-bottom: 15px;
        }

        .dateselecter label,
        .dateselecter input,
        .dateselecter i {
            display: inline-block;
        }

        .removehover a:hover {
            background-color: white !important;
            color: #33CAC2 !important;
        }

        .dropdown > .dropdown-menu,
        .dropdown-toggle > .dropdown-menu,
        .btn-group > .dropdown-menu {
            margin-top: 0px !important;
        }

        .unit-tag {
            background: #666665 none repeat scroll 0 0 !important;
            border-radius: 4px !important;
            color: #fff !important;
            display: inline-block !important;
            line-height: 34px !important;
            margin: 0 26px 20px 0 !important;
            padding: 0 22px 0 12px !important;
            position: relative !important;
            text-decoration: none !important;
            vertical-align: middle !important;
        }

        .unit-btn-x {
            cursor: pointer !important;
            display: inline-block !important;
            font-family: Verdana !important;
            font-size: 14px !important;
            height: 34px !important;
            margin-left: 10px !important;
            right: 0 !important;
            text-align: center !important;
            top: 0 !important;
            width: 15px !important;
        }

        button.accordion {
            background-color: #fff;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        button.accordion.active,
        button.accordion:hover {
            background-color: #ddd;
        }

        button.accordion:after {
            content: '+';
            font-size: 20px;
            color: red;
            float: right;
            margin-left: 5px;
        }

        button.accordion.active:after {
            content: "-";
        }

        div.panel.show {
            opacity: 1;
            max-height: 1500px;
        }

        /*
    button.close {
        font-size: 40px !important;
    }
*/

        .close {
            padding-bottom: 8px;
            padding-top: 12px;
        }

        /*
    .closebtn {
        margin-left: 250px !important;
        background-color: #444D58 !important;
        color: white !important;
    }
*/

        .btnspace {
            margin-bottom: 10px;
        }

        .btncolor {
            background-color: #666665 !important;
            color: white !important;
            border-right: none !important;
        }

        .unit-tag img {
            border-radius: 15px !important;
            padding-right: 5px;
        }

        /*checks*/
        /*CSS Reset*/

        body {
            line-height: 1;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: normal;
        }

        ol, ul {
            list-style: none;
        }

        blockquote, q {
            quotes: none;
        }

        blockquote:before, blockquote:after,
        *:before, *:after {
            content: '';
            content: none;
        }

        :focus {
            outline: 0;
        }

        ins {
            text-decoration: none;
        }

        del {
            text-decoration: line-through;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        address, caption, cite, code, dfn, em, strong, var {
            font-weight: normal;
            font-style: normal;
        }

        caption, th {
            text-align: left;
            font-weight: normal;
            font-style: normal;
        }

        #warp {
            margin: 0 auto;
            width: 400px;
            text-align: center;
        }

        /* contour */
        div.push {
            position: relative;
            margin: 5px auto;
            padding: 6px 8px;
            width: 172px;
            height: 60px;
            border-radius: 25px;
            background-image: linear-gradient(bottom, rgba(255, 255, 255, .17) 0%, rgba(15, 16, 16, .17) 100%);
            background-clip: padding-box;
        }

        div.minimal {
            position: relative;
            margin: 10px auto -56px;
            padding: 6px 8px;
            width: 172px;
            height: 60px;
            background-image: none;
        }

        /* contour arriere du bouton */
        div.push:after {
            position: absolute;
            top: 6px;
            left: 4px;
            padding: 4px;
            width: 170px;
            height: 54px;
            border-radius: 17px;
            background-color: #4b5461;
            background-clip: padding-box;
            box-shadow: 0 4px 6px 2px rgba(15, 16, 16, .49);
            content: "";
        }

        div.minimal:after {
            display: none;
        }

        /* Bouton */
        label.check {
            position: relative;
            z-index: 20;
            display: block;
            margin: 0px 0 0;
            padding: 14px 0px;
            width: 134px;
            height: 28px;
            border-radius: 14px;
            background-color: #b3bbc5;
            background-image: linear-gradient(bottom, rgba(0, 0, 0, .24) -2.65%, rgba(255, 255, 255, .24) 97.35%);
            background-clip: padding-box;
            box-shadow: 0 2px 6px 2px rgba(15, 16, 16, .49), inset 0 3px rgba(255, 255, 255, 0.75);
            color: #464950;
            text-align: left;
            text-indent: 34px;
            font-size: 14px;
            line-height: 0px;
            cursor: pointer;
            user-select: none;
        }

        div.push label.check:hover {
            background-color: #bbc4cf;
        }

        div.minimal label.check:hover {
            background-color: #959ca7;
        }

        div.push label.check:active {
            background-image: linear-gradient(bottom, rgba(0, 0, 0, .34) -2.65%, rgba(255, 255, 255, .14) 97.35%);
            transform: scale(0.95);
        }

        div.push label.check:active ~ div.push:after { /* no work */
            transform: scale(0.95);
        }

        div.minimal label.check {
            background-color: #959ca7;
            background-image: none;
            box-shadow: none;
            color: #d5dadf;
            cursor: default;
        }

        div.minimal label.check:active {
            margin: 2px 0 0;
            background-image: none;
            transform: scale(0.99);
        }

        /* reflet du bouton */
        label.check:after {
            position: absolute;
            top: 2px;
            left: 0px;
            width: 170px;
            height: 28px;
            border-radius: 14px 14px 0px 0px / 14px 14px 0px 0px;
            background-color: rgba(255, 255, 255, .21);
            background-clip: padding-box;
            content: "";
        }

        label.check:hover:after {
            background-color: rgba(255, 255, 255, .32);
        }

        div.minimal label.check:after {
            display: none;
        }

        /* checkbox */
        input[type="checkbox"].push-btn {
            position: absolute;
            left: 0px;
            z-index: 20;
            display: inline-block;
            float: left;
            margin: -6px 20px 0 0;
            width: 33px;

            border-radius: 4px;
            background-color: rgba(69, 75, 88, 1.000);
            background-image: linear-gradient(bottom, rgba(235, 235, 235, .27) 0%, rgba(17, 17, 18, .27) 100%);
            background-clip: padding-box;
            box-shadow: 0 0 6px rgba(245, 245, 245, .2), inset 0 0 8px rgba(15, 16, 16, .75);
            appearance: none;
        }

        div.minimal input[type="checkbox"].push-btn {
            background-color: #d5dadf;
            background-image: none;
            box-shadow: none;
        }

        /* case coché */
        input[type="checkbox"].push-btn:checked:after {
            position: absolute;
            top: -2px;
            left: 4px;
            display: block;
            color: white;
            content: "✓";
            text-shadow: 0px 1px 2px black;
            font-weight: 300;
            font-family: "Charcoal CY";
        }

        div.minimal input[type="checkbox"].push-btn:checked:after {
            position: absolute;
            top: -2px;
            left: 4px;
            display: block;
            color: #959ca7;
            content: "✓";
            text-shadow: none;
        }

        /* codepen add */
        .remarque {
            font-size: 10px;
        }

        a {
            color: gray;
            text-decoration: none;
        }

        button.accordion::after {
            content: "+";
            margin-top: -50px;
            line-height: 2;
        }

        .hgt-fx {
            position: absolute;
            width: 960px; /* Change to your needs */
            top: 40%;
            left: 50%;
            margin-left: -480px;
        }

        .blur {
            opacity: 0;
        }

        .cuadro_intro_hover:hover .blur {
            opacity: 0.7;
        }

        .tooltip.top > .tooltip-inner {
            background-color: #ddd;
            color: black;
        }

        .stat {
            margin-left: 0px;
            margin-right: 0px;
        }

        .programme-log-card .h3, h3 {
            text-transform: none;
        }

        .row.promotion-filter-button {
            margin-bottom: -25px;
            padding: 0px 15px;
        }

        .disable {
            background: #fff !important;
            color: #5d6b7a !important;
            border: 1px solid #ccc !important;
            cursor: not-allowed !important;
        }

    </style>



@endsection
@section('active_profilePromotion','active')
@section('content')

    <!-- END HEADER -->
    <!-- BEGIN PAGE CONTAINER -->

    <div class="page-content">
        <div class="container">

            <div class="row">

                <!-- Begin: life time stats -->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs fa-2x font-green-sharp" aria-hidden="true"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Filter Promotion Management</span>
                            <span class="caption-helper"> </span>
                        </div>
                    </div>

                    <div class="portlet-body">

                        @if(!(isset($code) && $code===422))

                            @if($status==='failed')
                                <div class="alert alert-danger display-hide" style="display: block;">
                                    <button class="close" data-close="alert"></button>
                                    <p>Error in API service due to this reasion</p>
                                    {{$message}}</div>
                            @endif

                            @if($status=='failed1')
                                <div class="alert alert-success display-hide" style="display: block;">
                                    <button class="close" data-close="alert"></button>
                                    {{$message}}</div>
                            @endif


                            <div id="promotionStatusMessage">

                                @if(isset($data['selectedInstaDetails']))
                                    @if($data['selectedInstaDetails']['has_account_locked']=='T' || $data['selectedInstaDetails']['is_user_disconnected']=='Y' || $data['selectedInstaDetails']['is_logged_in']=='N')
                                        <div class="alert alert-danger display-hide" style="display: block;">
                                            <button class="close" data-close="alert"></button>
                                            <p>Your Account has been disconnected from Instaffic System. </p>
                                            <span>Go to Account Activation  and Re-Connect your Account</span>
                                        </div>
                                    @elseif($data['selectedInstaDetails']['subscribe_type']=='DU' && $data['selectedInstaDetails']['time_period_left']==0)
                                        <div class="alert alert-warning display-hide" style="display: block;">
                                            <button class="close" data-close="alert"></button>
                                            <p>Your Demo subscription period has been expired. </p>
                                            <span>Click <a href='/user/packageList'>here</a> to Upgrade your subscription period.</span>
                                        </div>
                                    @elseif($data['selectedInstaDetails']['subscribe_type']=='BU' && $data['selectedInstaDetails']['time_period_left']==0)
                                        <div class="alert alert-warning display-hide" style="display: block;">
                                            <button class="close" data-close="alert"></button>
                                            <p>Your Bussiness subscription period has been expired. </p>
                                            <span>Click <a href='/user/packageList'>here</a> to Upgrade your subscription period.</span>
                                        </div>
                                    @elseif($data['selectedInstaDetails']['subscribe_type']=='PU' && $data['selectedInstaDetails']['time_period_left']==0)
                                        <div class="alert alert-warning display-hide" style="display: block;">
                                            <button class="close" data-close="alert"></button>
                                            <p>Your Private subscription period has been expired. </p>
                                            <span>Click <a href='/user/packageList'>here</a> to Upgrade your subscription period.</span>
                                        </div>

                                    @elseif($data['selectedInstaDetails']['status']=='I')
                                        <div class="alert alert-warning display-hide" style="display: block;">
                                            <button class="close" data-close="alert"></button>
                                            <p>Your Account is Inactive!!!</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <!--Instagram User List-->
                            <div class="row stat">
                                <div class="col-md-6">
                                    <div class="col-md-4" style="padding-top: 5px; color: rgb(255, 255, 255);">User Name
                                    </div>
                                    <div class=" col-md-8">

                                        <select name="instaUserId" id="instaUserId"
                                                data-ins_user_id="@if(isset($data['selectedInstaDetails'])){{$data['selectedInstaDetails']['ins_user_id']}}@endif"
                                                data-config_filter_id="@if(isset($data['activityData']['config_filter_id'])){{$data['activityData']['config_filter_id']}}@endif"
                                                class="form-control"
                                                style="border:1px solid #7d888e; border-radius:5px;">
                                            @if(isset($data['instaUserList']) && !empty($data['instaUserList']))
                                                @foreach($data['instaUserList'] as $key=>$value)
                                                    <option <?php if ($data['selectedInstaDetails']['ins_user_id'] == $value['ins_user_id']) echo "selected"; ?>
                                                            value="{{$value['ins_user_id']}}"
                                                            data-is_logged_in="{{$value['is_logged_in']}}"
                                                            data-is_user_disconnected="{{$value['is_user_disconnected']}}"
                                                            data-has_account_locked="{{$value['has_account_locked']}}"
                                                            data-time_period_left="{{$value['time_period_left']}}"
                                                            data-subscribe_type="{{$value['subscribe_type']}}"
                                                            data-username="{{$value['username']}}"
                                                            data-status="{{$value['status']}}">
                                                        <div>
                                                            <img src="{{$value['profile_pic_url']}}" alt="Profile Pic">
                                                            {{$value['username']}}
                                                        </div>

                                                    </option>
                                                @endforeach

                                            @else
                                                <option>-- No Account Found --</option>
                                            @endif

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4" style="padding-top: 5px; color: rgb(255, 255, 255);">Promotion
                                        Type
                                    </div>
                                    <div class=" col-md-8">
                                        <select class="form-control"
                                                style="border:1px solid #7d888e; border-radius:5px;"
                                                id="promotionType">
                                            <option value="D" <?php if (isset($data['selectedPromotionType']) && $data['selectedPromotionType'] == 'D') echo "selected"; ?> >
                                                Default
                                            </option>
                                            <option value="F" <?php if (isset($data['selectedPromotionType']) && $data['selectedPromotionType'] == 'F') echo "selected"; ?> >
                                                Filteration
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>


                            <!--Profile Management Activity Details-->
                            <div class="activity-log-stat-profile">
                                <!--Username and Promotion Details-->
                                <div class="row stat">
                                    <div class="col-sm-5" style="padding: 0px;">
                                        <a href="https://www.instagram.com/{{$data['selectedInstaDetails']['username']}}"
                                           target="_blank">
                                            <img src="{{$data['selectedInstaDetails']['profile_pic_url']}}"
                                                 class="img-circle brdsld">&nbsp;
                                            <span class="u_name">{{$data['selectedInstaDetails']['username']}}</span>
                                        </a>
                                    </div>
                                    <div class="col-sm-5 pull-right" style="margin-top: 32px;">
                                        <ul class="act-log-stat-pro">
                                            <li><a class="navigate-tab active" id="activityPromotion"
                                                   href="javascript:;"><span>Activity</span></a>
                                            </li>
                                            <li><a class="navigate-tab" id="logPromotion"
                                                   href="javascript:;"><span>Log</span></a></li>
                                            <li><a class="navigate-tab" id="statPromotion"
                                                   href="javascript:;"><span>Statistics</span></a>
                                            </li>
                                            <li><a class="navigate-tab" id="profilePromotion"
                                                   href="javascript:;"><span>Profile</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <br>

                                <div id="activity_toggle">
                                    {{--Filter promotion start/stop--}}
                                    <div class="row promotion-filter-button">
                                        <div class="panel panel-body"
                                             style="opacity:1; max-height: auto; padding: 9px 15px; overflow: visible; min-height: 55px;">
                                                <span class="uppercase bold start_stop">Promotion -
                                                    @if($data['activityData']['filter_promotion_status']==1)
                                                        <a href="javascript:;" class="btn btn-success disable"
                                                           style="width: 135px;">Running <i
                                                                    class="fa fa-refresh fa-spin"></i> </a>
                                                        <span style="padding: 10px" class="filter_timer"
                                                              data-id="{{time()-$data['activityData']['filter_promotion_start_time']}}">00:00:00:00

                                                        </span>
                                                        <a href="javascript:;" title="click to stop activity"
                                                           class="btn btn-danger filter_status_button"
                                                           style="width: 135px" data-id="1">Stop <i aria-hidden="true"
                                                                                                    class="glyphicon glyphicon-stop"></i></a>

                                                    @else
                                                        <a href="javascript:;" title="click to start activity"
                                                           class="btn btn-success filter_status_button"
                                                           style="width: 135px" data-id="0">Start <i
                                                                    class="fa fa-play"></i> </a>
                                                        <span style="padding: 10px" class="filter_timer"
                                                              data-id=" {{$data['activityData']['filter_promotion_stop_time']-$data['activityData']['filter_promotion_start_time']}}">
                                                        </span>
                                                        <a href="javascript:;" class="btn btn-danger disable"
                                                           style="width: 135px;">Stopped<i aria-hidden="true"
                                                                                           class="glyphicon glyphicon-stop"></i></a>
                                                    @endif
                                                </span>

                                        </div>
                                    </div>

                                    <!--Activity Head Details-->
                                    <div id="Top-Part-Activity" class="row  col-sm-12 switch-on-off pm-activity"
                                         style="margin:30px 0;">

                                        <div class="col-md-4"
                                             style="border: 1px solid #ddd; padding:0 20px 20px;margin:5px 0">
                                            <h3><b>Activity Setting</b></h3>
                                            <div class="col-md-12">
                                                <div class="col-md-5" style="padding-top: 9px;">Likes</div>
                                                <div class="col-md-7 onoffswitch1" style="padding:0">
                                                    <input type="checkbox" id="likesOption"
                                                           class="onoffswitch1-checkbox"
                                                           @if(isset($data['activityData']['like']) && $data['activityData']['like']==1) checked @endif>
                                                    <label class="onoffswitch1-label" for="likesOption">
                                                        <span class="onoffswitch1-inner"></span>
                                                        <span class="onoffswitch1-switch">
                                                    <i class="fa fa-heart" aria-hidden="true"
                                                       style="color: rgb(70, 165, 151); font-size: 17px; margin: 9px 10px 10px 6px;"></i>
                                                </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="col-md-5" style="padding-top: 9px;">Follows</div>
                                                <div class="col-md-7 onoffswitch1" style="padding:0">
                                                    <input type="checkbox" id="followsOption"
                                                           class="onoffswitch1-checkbox"
                                                           @if(isset($data['activityData']['follow']) && $data['activityData']['follow']==1) checked @endif>
                                                    <label class="onoffswitch1-label" for="followsOption">
                                                        <span class="onoffswitch1-inner"></span>
                                                        <span class="onoffswitch1-switch">
                                    <i class="fa fa-user" aria-hidden="true"
                                       style="color: rgb(70, 165, 151); font-size: 17px; margin: 7px 10px 10px 7px;"></i>

                                </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">

                                                <div class="col-md-5" style="padding-top:10px;">UnFollows <a href="#"
                                                                                                             style="padding-top:8px;margin-left: 5px;">
                                                        <i
                                                                class="fa fa-question-circle"
                                                                title="instaffic will cancel follows he/she did after you got followed back -option 1(after 2 days) or option 2(after 1000 follow)"
                                                                style="color:#000;" data-toggle="tooltip"
                                                                data-placement="top"></i>
                                                    </a></div>
                                                <div class="col-md-7 onoffswitch1" style="padding:0">
                                                    <input type="checkbox" id="unFollowsOption"
                                                           class="onoffswitch1-checkbox"
                                                           @if(isset($data['activityData']['unfollow']) && $data['activityData']['unfollow']==1) checked @endif>
                                                    <label class="onoffswitch1-label" for="unFollowsOption">
                                                        <span class="onoffswitch1-inner"></span>
                                                        <span class="onoffswitch1-switch">
                        <i class="fa fa-times" aria-hidden="true"
                           style="color: rgb(70, 165, 151); font-size: 17px; margin: 8px 10px 10px 8px;"></i>

                        </span>
                                                    </label>
                                                </div>

                                                <div class="col-md-12" id="unFollowsSubOptionDisplay"
                                                     style="padding:0; @if(isset($data['activityData']['unfollow']) && $data['activityData']['unfollow']==0) display:none @else display:block @endif">
                                                    <div class="" id="">
                                                        <label class="checkbox-inline">
                                                            <input type="radio" name="unFollowsSubOption"
                                                                   class="unFollowsSubOption"
                                                                   value="1"
                                                                   @if(isset($data['activityData']['unfollow_option']) && $data['activityData']['unfollow_option']==1) checked @endif>After
                                                            2 Days
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="radio" name="unFollowsSubOption"
                                                                   class="unFollowsSubOption"
                                                                   value="2"
                                                                   @if(isset($data['activityData']['unfollow_option']) && $data['activityData']['unfollow_option']==2) checked @endif>After
                                                            1000 Follows
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4" style="margin:5px 0">
                                            <ul class="list-group" style="text-align:left;">
                                                <li class="list-group-item justify-content-between"
                                                    style="display:inherit;">
                                                    <h3 style="margin: 5px 0;"><b>Overview Stats</b></h3>
                                                </li>
                                                <li class="list-group-item justify-content-between"
                                                    style="display:inherit;">
                                                    Likes
                                                    <span class="badge badge-default badge-pill"
                                                          id="overviewLikesCount">
                                                     <?php if (isset($data['statData']['likes_count']) && $data['statData']['likes_count'] > 0) echo($data['statData']['likes_count']); else echo('0'); ?>
                                                    </span>

                                                </li>
                                                <li class="list-group-item justify-content-between"
                                                    style="display:inherit;">
                                                    Follows
                                                    <span class="badge badge-default badge-pill"
                                                          id="overviewFollowsCount">
                                                      <?php if (isset($data['statData']['followed_count']) && $data['statData']['followed_count'] > 0) echo($data['statData']['followed_count']); else echo('0'); ?>
                                                    </span>
                                                </li>
                                                <li class="list-group-item justify-content-between"
                                                    style="display:inherit;">
                                                    Unfollows
                                                    <span class="badge badge-default badge-pill"
                                                          id="overviewUnfollowsCount">
                                                         <?php if (isset($data['statData']['unfollowed_count']) && $data['statData']['unfollowed_count'] > 0) echo($data['statData']['unfollowed_count']); else echo('0'); ?>
                                                    </span>
                                                </li>

                                                <li class="list-group-item justify-content-between"
                                                    style="display:inherit;">
                                                    Followers
                                                    <span class="badge badge-default badge-pill"
                                                          id="overviewFollowersCount">
                                                         <?php if (isset($data['statData']['followers_count']) && $data['statData']['followers_count'] > 0) echo($data['statData']['followers_count']); else echo('0'); ?>
                                                    </span>
                                                </li>
                                                <li class="list-group-item justify-content-between"
                                                    style="display:inherit;">
                                                    Account Status
                                                    <span class="badge badge-default badge-pill"
                                                          id="overviewAccountStatus">
                                                        <?php if (isset($data['selectedInstaDetails']['status']) && $data['selectedInstaDetails']['status'] == 'A') echo('Activated'); else echo('Inactivated'); ?>
                                                    </span>
                                                </li>
                                            </ul>

                                        </div>

                                        <div class="col-md-4"
                                             style="border: 1px solid #ddd; padding:15px 20px 0px 20px;margin:5px 0">

                                            <div class="col-md-12 button-account-detail">
                                                <h3 style="margin: 5px 0;"><b>Buy time package</b></h3>
                                                <div class="col-md-12" style="padding: 0;">
                                                    <a href="/user/packageLists" class="btn btn-success"
                                                       style="background-color:#5cb85c;margin-bottom: 10px;width:100%">Buy
                                                        subscription
                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-12 button-account-detail">

                                                <h3 style="margin: 0;"><b>Save / Load Filters Settings</b></h3>

                                                <div class="col-md-5  col-sm-5" style="padding: 0; width:100%">
                                                    <a href="#" class="btn btn-success" id="saveActivitySettingsBtn"
                                                       style="margin-bottom: 10px;width:100%" data-toggle="modal"
                                                    >Save Activity Settings
                                                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-5 col-sm-5" style="padding: 0; width:100%">
                                                    <a href="#" class="btn btn-success" id="loadPresetSettingsBtn"
                                                       style="margin-bottom: 10px; width:100%" data-toggle="modal"
                                                    >Load Activity Settings
                                                        <i class="fa fa-cogs" aria-hidden="true"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <!--Activity Body Details-->
                                    <div id="Main-Part-Activity" class="profilePromotion-actity pm-activity">
                                        <div class="">
                                            <button class="accordion" style="height: 75px;">
                                                <img class="img-responsive;" width="38"
                                                     src="/assets/user/user-panel/img/add-label-button.png"/>
                                                <b style="margin-left:8px;">HASH TAGS</b>
                                                <h5 style="margin-left: 50px; margin-top: -8px;color:#767676;">
                                                    Expose me to all people
                                                    that upload picture / video to those hashtags</h5>
                                            </button>
                                            <div class="panel pnl_bg">
                                                <div class="col-md-12 col-sm-12" style="padding:10px 10px 30px 10px;">
                                                    <div id="mainHashTag">
                                                        <div class="btn-group" style="margin-bottom: 10px;">
                                                            <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#myModal" id="addHashtagsBtn">ADD
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btncolor dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                   style="margin-bottom: 10px;"
                                                                   id="delete-all-hashtags" href="javascript:;">Delete
                                                                    all
                                                                    hashtags</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="color:red"
                                                      id="hashTagData_error">{{$errors->first('hashTagData')}}</span>
                                            </div>


                                            <button class="accordion" style="height: 75px;">
                                                <img class="img-responsive;" width="38"
                                                     src="/assets/user/user-panel/img/placeholder-for-map.png">
                                                <b style="margin-left:8px;">GEOGRAPHICAL LOCATIONS</b>
                                                <h5 style="margin-left: 50px; margin-top: -8px;color:#767676;">Expose me
                                                    to
                                                    all
                                                    people that did check in at those places</h5>
                                            </button>
                                            <div class="panel pnl_bg">
                                                <div class="col-md-12 col-sm-12" style="padding:10px 10px 30px 10px;">
                                                    <div id="mainLocation">
                                                        <div class="btn-group" style="margin-bottom: 10px;">
                                                            <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#myModal1" id="addLocationBtn">ADD
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btncolor dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                   style="margin-bottom: 10px;"
                                                                   id="delete-all-locations" href="javascript:;">Delete
                                                                    all
                                                                    Locations</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="color:red"
                                                      id="locationData_error">{{$errors->first('locationData')}}</span>
                                            </div>


                                            <button class="accordion" style="height: 75px;">
                                                <img class="img-responsive;" width="38"
                                                     src="/assets/user/user-panel/img/black-male-user-symbol.png">
                                                <b style="margin-left:8px;">USER NAMES</b>
                                                <h5 style="margin-left: 50px; margin-top: -8px;color:#767676;">Expose me
                                                    to
                                                    all people that follow those accounts</h5>
                                            </button>
                                            <div class="panel pnl_bg">
                                                <div class="col-md-12 col-sm-12" style="padding: 10px 10px 30px 10px;">
                                                    <div id="mainUsername">
                                                        <div class="btn-group" style="margin-bottom: 10px;">
                                                            <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#myModal2" id="addUsernamesBtn">ADD
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btncolor dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                   style="margin-bottom: 10px;"
                                                                   id="delete-all-usernames" href="javascript:;">Delete
                                                                    all
                                                                    Users</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="color:red"
                                                      id="usernameData_error">{{$errors->first('usernameData')}}</span>
                                            </div>


                                            <button class="accordion" style="height: 75px;">
                                                <img class="img-responsive;" width="38"
                                                     src="/assets/user/user-panel/img/genders(1).png">
                                                <b style="margin-left:8px;">GENDER</b>
                                                <h5 style="margin-left: 50px; margin-top: -8px;color:#767676;">Expose me
                                                    only to men/women</h5>
                                            </button>
                                            <div class="panel pnl_bg">
                                                <div class="row" style="padding: 10px 10px 30px 10px;">
                                                    <div class="col-md-4">
                                                        <div class="pull-right" style="padding: 10px;">Gender Filter
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class=" col-md-8" align="center">
                                                            <select id="selectGender" class="form-control"
                                                                    style="border:1px solid #7d888e; border-radius:5px;">
                                                                <option value="1"
                                                                        @if(isset($data['activityData']) && ($data['activityData']['gender'] == 1)) selected @endif >
                                                                    MALE
                                                                </option>

                                                                <option value="2"
                                                                        @if(isset($data['activityData']) && ($data['activityData']['gender'] == 2)) selected @endif >
                                                                    FEMALE
                                                                </option>

                                                                <option value="3"
                                                                        @if(isset($data['activityData']) && ($data['activityData']['gender'] == 3)) selected @endif>
                                                                    BOTH
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="accordion" style="height: 75px;">
                                                <img class="img-responsive;"
                                                     src="/assets/user/user-panel/img/social-media.png">
                                                <b style="margin-left:14px;">DO LIKES TO POSTS BY DATE MODIFIED</b>
                                                <h5 style="margin-left: 50px; margin-top: -8px;color:#767676;">Expose me
                                                    to
                                                    people
                                                    who
                                                    upload pics based on specific time</h5>
                                            </button>
                                            <div class="panel pnl_bg">
                                                <div class="row" style="padding: 10px 10px 30px 10px;">

                                                    <div class="col-md-4">
                                                        <div class="pull-right" style="padding: 10px;"> Do likes to
                                                            posts by
                                                            date modified
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class=" col-md-8" align="center">
                                                            <select class="form-control" id="mediaAge"
                                                                    style="border:1px solid #7d888e; border-radius:5px;">
                                                                <option value="new" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == 'new') echo "selected"; ?>>
                                                                    Newest
                                                                </option>
                                                                <option value="1hr" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == '1hr') echo "selected"; ?>>
                                                                    1 Hour Ago
                                                                </option>
                                                                <option value="3hr" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == '3hr') echo "selected"; ?>>
                                                                    3 Hours Ago
                                                                </option>
                                                                <option value="today" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == 'today') echo "selected"; ?>>
                                                                    Today
                                                                </option>
                                                                <option value="yesterday" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == 'yesterday') echo "selected"; ?>>
                                                                    Yesterday
                                                                </option>
                                                                <option value="3d" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == '3d') echo "selected"; ?>>
                                                                    3 Days Ago
                                                                </option>
                                                                <option value="1w" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == '1w') echo "selected"; ?>>
                                                                    1 Week Ago
                                                                </option>
                                                                <option value="2w" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == '2w') echo "selected"; ?>>
                                                                    2 Weeks Ago
                                                                </option>
                                                                <option value="1m" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == '1m') echo "selected"; ?>>
                                                                    1 Month Ago
                                                                </option>
                                                                <option value="2m" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == '2m') echo "selected"; ?>>
                                                                    2 Months Ago
                                                                </option>
                                                                <option value="randomly" <?php if (isset($data['activityData']['media_age']) && $data['activityData']['media_age'] == 'randomly') echo "selected"; ?>>
                                                                    Randomly
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="accordion" style="height: 75px;">
                                                <img class="img-responsive;" width="38"
                                                     src="/assets/user/user-panel/img/windows_media_player.png">
                                                <b style="margin-left:8px;">MEDIA TYPE</b>
                                                <h5 style="margin-left: 50px; margin-top: -8px;color:#767676;">Expose me
                                                    to
                                                    people who uploaded Images/Videos</h5>
                                            </button>
                                            <div class="panel pnl_bg">
                                                <div class="row" style="padding: 10px 10px 30px 10px;">
                                                    <div class="col-md-4">
                                                        <div class="pull-right" style="padding: 10px;"> Do likes to
                                                            posts by
                                                            date modified
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class=" col-md-8" align="center">
                                                            <select class="form-control" id="mediaType"
                                                                    style="border:1px solid #7d888e; border-radius:5px;">
                                                                <option value="A"
                                                                        @if ( isset($data['activityData']['media_type']) && ($data['activityData']['media_type'] == 'A')) selected @endif >
                                                                    Any
                                                                </option>
                                                                <option value="I"
                                                                        @if ( isset($data['activityData']['media_type']) && ($data['activityData']['media_type'] == 'I')) selected @endif>
                                                                    Photos
                                                                </option>
                                                                <option value="V"
                                                                        @if (isset($data['activityData']['media_type']) && ($data['activityData']['media_type'] == 'V')) selected @endif>
                                                                    Videos
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div id="logs_toggle" hidden>
                                {{--hidden--}}
                                <!--Logs Head Details-->
                                    <div id="Top-Part-log" class="row switch-on-off">

                                        <ul class="">
                                            <li class="active mleft displayLogType" data-logId="0" id="allCount"
                                                style="margin-left:0px;">
                                                <a href="#tab1" data-toggle="tab"><span>All &nbsp;(<span
                                                                id="logAllCount">0</span>)</span> </a>
                                            </li>

                                            <li class="mleft displayLogType" data-logId="1" id="likesCount">
                                                <a href="#tab2" data-toggle="tab"
                                                   title="who are the people who did like and to which picture">
                                                    <span>Likes &nbsp;(<span id="logLikesCount">0</span>)</span>
                                                </a>
                                            </li>

                                            <li class="mleft displayLogType" data-logId="2" id="followedCount">
                                                <a href="#tab3" data-toggle="tab"
                                                   title="who are peeple followed you since the Beginning">
                                                    <span>Follow &nbsp;(<span id="logFollowsCount">0</span>)</span>
                                                </a>
                                            </li>

                                            <li class="mleft displayLogType" data-logId="3" id="unfollowedCount">
                                                <a href="#tab4" data-toggle="tab"
                                                   title="who are peeple Unfollowed since the Beginning">
                                                    <span>Unfollow &nbsp;(<span id="logUnfollowsCount">0</span>)</span>
                                                </a>
                                            </li>

                                            <li class="mleft displayLogType" data-logId="4" id="folowersCount">
                                                <a href="#tab5" data-toggle="tab"
                                                   title="who are the people the people that followed back">
                                                    <span>Follower &nbsp;(<span id="logFollowersCount">0</span>)</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <!--Logs Body Details-->
                                    <div id="Main-Part-Log" class="row profilePromotion-log">
                                        <div class="programme-log-settings">
                                            <div class="col-lg-12">

                                                <div class="tab-content">
                                                    <!-- All Log details -->
                                                    <div class="tab-pane fade in active" id="tab1" animated bounceIn>
                                                        <div class="" id="showAllLogs"></div>
                                                        <div class="col-md-12"
                                                             style="text-align: center;margin-top: 30px">
                                                            <input type="button" style="display: none;"
                                                                   class="btn btn-success"
                                                                   id="loadMoreBtnForAllLogs" value="Load More">

                                                            <div id='loadMoreBtnLoaderForAllLogs'
                                                                 style='display: none; position:unset'>
                                                                <img src='/assets/user/images/ajax-loader.gif'
                                                                     width='85px'
                                                                     height='85px'>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Liks Log details -->
                                                    <div class="tab-pane fade in" id="tab2" animated bounceIn>
                                                        <div class="" id="showLikesLogs"></div>
                                                        <div class="col-md-12"
                                                             style="text-align: center;margin-top: 30px">
                                                            <input type="button" style="display: none;"
                                                                   class="btn btn-success"
                                                                   id="loadMoreBtnForLikeLogs" value="Load More">

                                                            <div id='loadMoreBtnLoaderForLikeLogs'
                                                                 style='display: none; position:unset'>
                                                                <img src='/assets/user/images/ajax-loader.gif'
                                                                     width='85px'
                                                                     height='85px'>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Follow Log details -->
                                                    <div class="tab-pane fade in" id="tab3" animated bounceIn>
                                                        <div class="" id="showFollowsLogs"></div>
                                                        <div class="col-md-12"
                                                             style="text-align: center;margin-top: 30px">
                                                            <input type="button" style="display: none;"
                                                                   class="btn btn-success"
                                                                   id="loadMoreBtnForFollowLogs" value="Load More">

                                                            <div id='loadMoreBtnLoaderForFollowLogs'
                                                                 style='display: none; position:unset'>
                                                                <img src='/assets/user/images/ajax-loader.gif'
                                                                     width='85px'
                                                                     height='85px'>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Unfollow Log details -->
                                                    <div class="tab-pane fade in" data-logId="3" id="tab4" animated
                                                         bounceIn>
                                                        <div class="" id="showUnfollowsLogs"></div>

                                                        <div class="col-md-12"
                                                             style="text-align: center;margin-top: 30px">
                                                            <input type="button" style="display: none;"
                                                                   class="btn btn-success"
                                                                   id="loadMoreBtnForUnFollowLogs" value="Load More">

                                                            <div id='loadMoreBtnLoaderForUnFollowLogs'
                                                                 style='display: none; position:unset'>
                                                                <img src='/assets/user/images/ajax-loader.gif'
                                                                     width='85px'
                                                                     height='85px'>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Followers Log details -->
                                                    <div class="tab-pane fade in" id="tab5" animated bounceIn>
                                                        <div class="" id="showFollowersLogs"></div>

                                                        <div class="col-md-12"
                                                             style="text-align: center;margin-top: 30px">
                                                            <input type="button" style="display: none;"
                                                                   class="btn btn-success"
                                                                   id="loadMoreBtnForFollowerLogs" value="Load More">

                                                            <div id='loadMoreBtnLoaderForFollowerLogs'
                                                                 style='display: none; position:unset'>
                                                                <img src='/assets/user/images/ajax-loader.gif'
                                                                     width='85px'
                                                                     height='85px'>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>


                                <div id="stats_toggle" hidden>
                                    <!--stats Head Details-->
                                    <div id="Top-Part-Stat" class="row">

                                        <h4><br><br></h4>

                                    </div>

                                    <div id="Main-Part-Stat" class="row profilePromotion-stat">

                                        <div class="Programme-stat">

                                            {{--likes--}}
                                            <div class="col-md-2 smpadng">
                                                <div class="card-base">
                                                    <div class="card-icon">
                                                        <a href="javascript:;" title="Likers" id="widgetCardIcon"
                                                           class="imagecard" style="cursor:default;">
                                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="card-data1 widgetCardData">
                                                            <h2 class="box-title">
                                                                <span id="totalLikedCount">@if(isset($data['statData']['filter_likes_count'])) {{$data['statData']['filter_likes_count']}} @endif</span>
                                                            </h2>
                                                            <p class="card-block text-center">
                                                                How many likes we did since the Beginning</p>
                                                            <a href="javascript:;" id="viewMoreLikers"
                                                               class="anchor btn btn-default">
                                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                                View likers
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="space"></div>
                                                </div>
                                            </div>

                                            {{--comments--}}
                                            {{--<div class="col-md-2 smpadng">--}}
                                            {{--<div class="card-base">--}}
                                            {{--<div class="card-icon">--}}
                                            {{--<a href="javascript:;" title="Comment" id="widgetCardIcon"--}}
                                            {{--class="imagecard" style="cursor:default;">--}}
                                            {{--<i class="fa fa-comments" aria-hidden="true"></i>--}}
                                            {{--</a>--}}
                                            {{--<div class="card-data1 widgetCardData">--}}
                                            {{--<h2 class="box-title">{{//$data['statData']['totalCommented']}}</h2>--}}
                                            {{--<p class="card-block text-center">--}}
                                            {{--How many Comments we got since the Beginning</p>--}}
                                            {{--<a href="javascript:;" class="anchor btn btn-default">--}}
                                            {{--<i class="fa fa-paper-plane" aria-hidden="true"></i>--}}
                                            {{--View Comments--}}
                                            {{--</a>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="space"></div>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}


                                            {{--follow--}}
                                            <div class="col-md-2 smpadng">
                                                <div class="card-base">
                                                    <div class="card-icon">
                                                        <a href="javascript:;" title="Comment" id="widgetCardIcon"
                                                           class="imagecard" style="cursor:default;">
                                                            <i class="fa fa-users" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="card-data1 widgetCardData">
                                                            <h2 class="box-title">
                                                                <span id="totalFollowedCount">@if(isset($data['statData']['filter_follows_count'])) {{$data['statData']['filter_follows_count']}} @endif </span>
                                                            </h2>
                                                            <p class="card-block text-center">
                                                                How many People we followed since the Beginning</p>
                                                            <a href="javascript:;" id="viewMoreFollowings"
                                                               class="anchor btn btn-default">
                                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                                View Following
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="space"></div>
                                                </div>
                                            </div>

                                            {{--unfollow---}}
                                            <div class="col-md-2 smpadng">
                                                <div class="card-base">
                                                    <div class="card-icon">
                                                        <a href="javascript:;" title="unfollow" id="widgetCardIcon"
                                                           class="imagecard" style="cursor:default;">
                                                            <i class="fa fa-user-times" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="card-data1 widgetCardData">
                                                            <h2 class="box-title">
                                                                <span id="totalUnfollowedCount">@if(isset($data['statData']['filter_unfollows_count'])) {{$data['statData']['filter_unfollows_count']}} @endif </span>
                                                            </h2>
                                                            <p class="card-block text-center">
                                                                How many people Being Unfollowed since the Beginning</p>
                                                            <a href="javascript:;" id="viewMoreUnFollowers"
                                                               class="anchor btn btn-default">
                                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                                View UnFollowers
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="space"></div>
                                                </div>
                                            </div>

                                            {{--followers--}}
                                            <div class="col-md-2 smpadng">
                                                <div class="card-base">
                                                    <div class="card-icon">
                                                        <a href="javascript:;" title="Follow" id="widgetCardIcon"
                                                           class="imagecard" style="cursor:default;">
                                                            <i class="fa fa-users" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="card-data1 widgetCardData">
                                                            <h2 class="box-title">
                                                                <span id="totalFollowersCount">@if(isset($data['statData']['filter_followers_count'])) {{$data['statData']['filter_followers_count']}} @endif </span>
                                                            </h2>
                                                            <p class="card-block text-center">
                                                                How many people followed back since the Beginning</p>
                                                            <a href="javascript:;" id="viewMoreFollowers"
                                                               class="anchor btn btn-default">
                                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                                View Followers
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="space"></div>
                                                </div>
                                            </div>


                                            {{--Total Time Used---}}
                                            <div class="col-md-2 smpadng">
                                                <div class="card-base">
                                                    <div class="card-icon">
                                                        <a href="javascript:;" title="Total Time used"
                                                           id="widgetCardIcon"
                                                           class="imagecard" style="cursor:default;">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="card-data1 widgetCardData">
                                                            <h2 class="box-title">
                                                                <span id="totalTimeUsed"> @if(isset($data['statData']['total_time_used'])) {{$data['statData']['total_time_used']}} @endif </span>
                                                            </h2>
                                                            <p class="card-block text-center"
                                                               style="padding-bottom: 40px;">
                                                                Total time Spent by the Account
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="space"></div>
                                                </div>
                                            </div>

                                            {{--Time Peroid Left--}}
                                            <div class="col-md-2 smpadng">
                                                <div class="card-base">
                                                    <div class="card-icon">
                                                        <a href="javascript:;" title="Time period left"
                                                           id="widgetCardIcon"
                                                           class="imagecard" style="cursor:default;">
                                                            <i class="fa fa-stack-overflow" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="card-data1 widgetCardData">
                                                            <h2 class="box-title">
                                                                <span  id="totalTimeLeft"> @if(isset($data['statData']['time_period_left'])) {{$data['statData']['time_period_left']}} @endif </span>
                                                            </h2>
                                                            <p class="card-block text-center"
                                                               style="padding-bottom: 40px;">
                                                                Time left for Subscription Renewal
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="space"></div>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>

                                <div id="profiles_toggle" hidden>
                                    <!--stats Head Details-->
                                    <div id="Top-Part-Profile" class="row">
                                        <br>
                                        <div class="row switch-on-off">
                                            <ul class="likes">
                                                <li style="margin-left: 0px;">
                                                <span>Post ( <?php if (isset($data['profileData']['user'])) echo($data['profileData']['user'][0]['media_count']); else echo('0'); ?>
                                                    )</span>
                                                </li>

                                                <li>
                                                <span>Followers ( <?php if (isset($data['profileData']['user'])) echo($data['profileData']['user'][0]['followers_count']); else echo('0'); ?>
                                                    )</span>
                                                </li>

                                                <li>
                                                <span>Following ( <?php if (isset($data['profileData']['user'])) echo($data['profileData']['user'][0]['following_count']); else echo('0'); ?>
                                                    )</span>
                                                </li>
                                            </ul>
                                            <hr>
                                        </div>
                                        <br>
                                    </div>

                                    <div id="Main-Part-Profile" class="row">
                                        <div class="container programme-log-card">
                                            <br>
                                            <div class="row includePagination">
                                                @if(isset($data['profileData']['media']))
                                                    @foreach($data['profileData']['media'] as $key)
                                                        <div class="col-lg-3" style="margin-bottom: 20px;">
                                                            <div class="cuadro_intro_hover "
                                                                 style="background-color:#cccccc;">
                                                                <p style="text-align:center;">
                                                                    <img src="{{$key['display_src'] or 'http://static.tumblr.com/166ab215c9a0bb3ba1b98e810652c3db/pjmcbps/OHEmr2kqz/tumblr_static_dsc_0298lol.jpg'}}"
                                                                         class="img-responsive" alt=""
                                                                         style="width:100%;">
                                                                </p>
                                                                <div class="caption">
                                                                    <div class="blur"></div>
                                                                    <div class="caption-text">
                                                                        <h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">
                                                                            Details</h3>
                                                                        <a href="https://www.instagram.com/p/{{$key['code']}}"
                                                                           target="_blank" class="btn btn-default"
                                                                           style="background-color: #33CAC2;color: white;"><span
                                                                                    class=""> View more</span></a><br><br>
                                                                        <a class=" btn btn-default"
                                                                           style="cursor: default"><span
                                                                                    class="glyphicon glyphicon-heart"> {{$key['likes_count'] or 0}}</span></a>
                                                                        <a class=" btn btn-default"
                                                                           style="cursor: default"><span
                                                                                    class="glyphicon glyphicon-comment"> {{$key['comments_count'] or 0}}</span></a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div><h3 style="margin-left: 40%">No Media Post Found</h3></div>
                                                @endif
                                                <br><br>
                                            </div>

                                            <div class="col-md-12" style="text-align: center;margin-top: 30px">
                                                <input style="" class="btn btn-success" id="ProfileLoadMoreBtn"
                                                       value="Load More" type="button">

                                                <div id="profile_loader" style="display: none; position:unset">
                                                    <img src="/assets/user/images/ajax-loader.gif" width="85px"
                                                         height="85px">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row text-center">
                                <img src="/assets/user/images/warning_error.png" alt="" width="100">
                                <br><br>
                                <div style="padding:12px; color: red">
                                    <p>Error in API service due to this reasion</p>
                                    {{$message}}
                                </div>
                                <br><br>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT -->


            <!-- -------------Modals For Add Hashtags-------------------->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#444D58;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:center; color:white;">Add Hashtags</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="padding: 10px 0px;">
                                <div class="col-md-8 col-md-offset-2">

                                    <!-- Search Field -->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" id="searchHashtag" type="text"
                                                       placeholder="Search Hashatag" required/>

                                                <div class="input-group-btn">
                                                    <div class="btn btn-success" id="searchHashtagBtn">
                                                        <span id="hashtag-search-icon"><i class="fa fa-search"
                                                                                          aria-hidden="true"></i></span>
                                                        <span id="hashtag-loading-icon" hidden><i
                                                                    class="fa fa-refresh fa-spin"
                                                                    aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row" id="hashTagId" hidden
                                 style="margin: 5px 0px 15px 5px; min-height: auto; max-height:260px; overflow-y:auto; overflow-x: hidden;">

                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                            <button type="button" class="btn btn-info" id="addHashTagsModalBtn">Add</button>
                        </div>

                    </div>

                </div>
            </div>

            <!-- -------------Modals For Add Locations-------------------->
            <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#444D58;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:center; color:white;">Add Location</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row" style="padding: 10px 0px;">
                                <div class="col-md-8 col-md-offset-2">
                                    <!-- Search Field -->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" id="searchLocation" type="text"
                                                       name="search" placeholder="Search Location" required/>
                                                <div class="input-group-btn">
                                                    <div class="btn btn-success" id="searchLocationBtn">
                                                        <span id="location-search-icon"><i class="fa fa-search"
                                                                                           aria-hidden="true"></i></span>
                                                        <span id="location-loading-icon" hidden><i
                                                                    class="fa fa-refresh fa-spin"
                                                                    aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="hidden" id="displayMapArea"
                                     style="height: 250px; margin: 0px 20px 0px 20px;">
                                </div>
                            </div>


                            <div class="row hidden" id="locationDetails"
                                 style="margin: 25px 0px 15px 5px; min-height: auto; max-height:260px; overflow-y:auto; overflow-x: hidden;">

                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                            <button type="button" class="btn btn-info" id="addLocationsModalBtn">
                                Add
                            </button>
                        </div>

                    </div>

                </div>
            </div>


            <!-- -------------Modals For Add Username-------------------->
            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#444D58;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:center; color:white;">Add People</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="padding: 0px 10px;">
                                <div class="col-md-8 col-md-offset-2">

                                    <!-- Search Field -->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="input-group" id="search5">
                                                <input class="form-control" id="searchUsername" type="text"
                                                       name="searchUsername" placeholder="Search people" required/>
                                                <div class="input-group-btn">
                                                    <div class="btn btn-success" id="searchUsernameBtn">
                                                        <span id="user-search-icon"><i class="fa fa-search"
                                                                                       aria-hidden="true"></i></span>
                                                        <span id="user-loading-icon" hidden><i
                                                                    class="fa fa-refresh fa-spin"
                                                                    aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="userNameId"
                                     style="margin: 60px 0px 15px 5px; min-height: auto; max-height:260px; overflow-y:auto; overflow-x: hidden;">
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                            <button type="button" class="btn btn-info" id="addUsernamesModalBtn">Add</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- -------------Modals For Display Success or error message------------------->
            <div class="modal fade bs-modal-md" id="customModal" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-body" style="text-align: center;">
                            <div id="customModelData">

                            </div>

                            <div class="modal-footer modal-footer-bookmarks" style="margin-top: 10px;">
                                {{--<button type="button" class="btn btn-default pull-right" style="color: #ffffff; background-color: #0c212b; border-color: #0c212b;" data-dismiss="modal">Close</button>--}}
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal"><!-- this is for loading image --></div>
    </div>


    <!---------------Modals For Save Activity Settings-------------------->
    <div class="modal fade" id="saveActivitySettingsModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:white;">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Your Activity Settings</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding: 10px 0px;">
                        <div class="col-md-12">
                            <form role="form">
                                <div class="form-group">
                                    <input class="form-control" id="presetName" type="text" name="presetName"
                                           placeholder="New Preset Name" required/>
                                    <p class="grey" style="padding:5px 0 10px;">Enter preset name to save current
                                        Filters settings </p>
                                </div>

                                <div class="text-center"><span style="color:red" id="presetNameError">ery</span></div>
                                <div class="text-center"><span style="color:green" id="presetNameSuccess">ery</span>
                                </div>

                            </form>
                            <div style="display: none;position: unset;" class="text-center" id="presetNameLoader">
                                <img src="/assets/user/images/ajax-loader.gif" height="35px" width="40px">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Cancel</button>
                    <button type="button" class="btn btn-info" id="saveActivitySettings"> Save</button>
                </div>

            </div>

        </div>
    </div>

    <!---------------Modals For Load and Delete Activity Settings----------->
    <div class="modal fade" id="loadActivitySettingsModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:white;">
                        <i class="fa fa-cogs" aria-hidden="true"></i> Load or Delete Your Preset Activity Settings</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding: 10px 0px;">
                        <div class="col-md-12">
                            <form role="form">
                                <div class="form-group">
                                    <select class="form-control" id="selectOptionPreset" required>
                                        <option value=""> select Preset Name</option>
                                    </select>
                                    <br>
                                    <p class="grey" style="padding:5px 0 10px;">Select saved preset to delete it or to
                                        load and apply to current activity settings </p>
                                </div>

                                <div class="text-center"><span style="color:red"
                                                               id="loadActivitySettingsError">ery</span></div>
                                <div class="text-center"><span style="color:green"
                                                               id="loadActivitySettingsSuccess">ery</span>
                                </div>

                            </form>
                            <div style="display: none;position: unset;" class="text-center"
                                 id="loadActivitySettingsLoader">
                                <img src="/assets/user/images/ajax-loader.gif" height="35px" width="40px">
                            </div>
                        </div>
                    </div>
                    <div class="pull-left"><a href="javascript:;" style="color:royalblue;" id="resetPresetSettings"><u>Click
                                here to reset your current acitiy to default settings</u></a></div>
                </div>

                <div class="modal-footer" id="loadActSetModalFooter">
                    <div class="col-md-6" style="text-align:left !important">
                        <a href="/settings/manager" class="btn btn-default">
                            <i class="fa fa-cogs" aria-hidden="true"></i> Setting Manager
                        </a>
                    </div>

                    <div class="col-md-6" style="text-align:right">
                        <button type="button" class="btn btn-info" id="loadPresetSettings">
                            <i class="fa fa-cogs" aria-hidden="true"></i> Load
                        </button>
                        <button type="button" class="btn btn-danger" id="deletePresetSettings">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                        </button>

                        {{--<button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Cancel</button>--}}
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection


@section('pagejavascripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs"></script>
    <script src="/assets/user/js/bootbox.min.js"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>
    <script src="/assets/user/js/moment.js"></script>


    <!--modal collapsible script-->
    <script type="text/javascript">
        $(document).on('click', '.panel-heading span.clickable', function (e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
            }
        })
    </script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        (function ($) {
            jQuery.fn.checkEmpty = function () {
                return !$.trim(this.html()).length;
            };
        }(jQuery));

        $(document).ready(function () {

            toastr.options = {
                timeOut: 2000,
                fadeOut: 10,
                positionClass: "toast-top-right",
                hideEasing: 'swing',
                preventDuplicates: true,
            };
            var i, acc = document.getElementsByClassName("accordion");
            for (i = 0; i < acc.length; i++) {
                acc[i].onclick = function () {
                    this.classList.toggle("active");
                    this.nextElementSibling.classList.toggle("show");
                }
            }

            $(document.body).on('click', '.close', function () {
                $(this).parent().hide();
            });

            $('[data-toggle="tooltip"]').tooltip();

        });

    </script>



    <!-- DISPLAY LOG DETAILS -->
    <script>


        var prefix = function (value) {
            return (value > 1) ? 's' : '';
        }
        function convertShortDateTimeFormat1(sec) {

            var daysInMonth = 30;
            var fm = [
                Math.floor(sec / 60 / 60 / 24 / daysInMonth), // MONTHS
                Math.floor(sec / 60 / 60 / 24), // DAYS
                Math.floor(sec / 60 / 60) % 24, // HOURS
                Math.floor(sec / 60) % 60, // MINUTES
                sec % 60 // SECONDS
            ];

            var resultTimeFormat = '';

            if (fm[0] > 0) {
                resultTimeFormat += fm[0] + ' Month' + prefix(fm[0]);
                if (fm[1] > 0) {
                    var days = Math.floor(fm[1] % daysInMonth);
                    if (days > 0) {
                        resultTimeFormat += ', ' + days + ' Day' + prefix(fm[1]);
                    }
                }
            } else {
                if (fm[1] > 0) {
                    resultTimeFormat += fm[1] + ' Day' + prefix(fm[1]) + ', ' + fm[2] + ' Hour' + prefix(fm[2]);
                } else {
                    if (fm[2] > 0) {
                        resultTimeFormat += fm[2] + ' Hour' + prefix(fm[2]) + ', ' + fm[3] + ' Minute' + prefix(fm[3]);
                    } else {
                        if (fm[3] > 0) {
                            resultTimeFormat += fm[3] + ' Minute' + prefix(fm[3]) + ', ' + fm[4] + ' Second' + prefix(fm[4]);
                        } else {
                            resultTimeFormat += fm[4] + ' Second' + prefix(fm[4]);
                        }
                    }
                }
            }

            return resultTimeFormat;
        }
        function convertShortDateTimeFormat(sec) {

            var daysInMonth = 30;


            var $fm = [
                Math.floor(sec / 60 / 60 / 24 / daysInMonth / 12), // YEARS
                Math.floor(sec / 60 / 60 / 24 / daysInMonth)% 12, // MONTHS
                Math.floor(sec / 60 / 60 / 24)% daysInMonth, // DAYS
                Math.floor(sec / 60 / 60) % 24, // HOURS
                Math.floor(sec / 60) % 60, // MINUTES
                sec % 60 // SECONDS
            ];

            var $resultTimeFormat = '';


            if ($fm[0] > 0) {
                $resultTimeFormat += $fm[0] + ' Year' + prefix($fm[0]);
                if ($fm[1] > 0) {
                    $resultTimeFormat += ', ' + $fm[1] + ' Month' + prefix($fm[1]);
                }
            } else {
                if ($fm[1] > 0) {
                    $resultTimeFormat += $fm[1] + ' Month' + prefix($fm[1]);
                    if ($fm[2] > 0) {
                        $resultTimeFormat += ', ' + $fm[2] + ' Day' + prefix($fm[2]);
                    }
                } else {
                    if ($fm[2] > 0) {
                        $resultTimeFormat += $fm[2] + ' Day' + prefix($fm[2]);
                        if ($fm[3] > 0) {
                            $resultTimeFormat += ', ' + $fm[3] + ' Hour' + prefix($fm[3]);
                        }
                    } else {
                        if ($fm[3] > 0) {
                            $resultTimeFormat += $fm[3] + ' Hour' + prefix($fm[3]);
                            if ($fm[4] > 0) {
                                $resultTimeFormat += ', ' + $fm[4] + ' Minute' + prefix($fm[4]);
                            }
                        } else {
                            if ($fm[4] > 0) {
                                $resultTimeFormat += $fm[4] + ' Minute' + prefix($fm[4]);
                                if ($fm[5] > 0) {
                                    $resultTimeFormat += ', ' + $fm[5] + ' Second' + prefix($fm[5]);
                                }
                            } else {
                                $resultTimeFormat += $fm[5] + ' Second' + prefix($fm[5]);
                            }
                        }
                    }
                }
            }


            return $resultTimeFormat;
        }

        function convertDateTimeFormat(unixTimeStamp, postfix) {
            var sec = moment().unix() - unixTimeStamp;
            var daysInMonth = 30;

            var fm = [
                Math.floor(sec / 60 / 60 / 24 / daysInMonth / 12),
                Math.floor(sec / 60 / 60 / 24 / daysInMonth) % 12,// MONTHS
                Math.floor(sec / 60 / 60 / 24) % daysInMonth, // DAYS
                Math.floor(sec / 60 / 60) % 24,// HOURS
                Math.floor(sec / 60) % 60, // MINUTES
                sec % 60 // SECONDS
            ];

            if (fm[0] > 0)  return fm[0] + ' Year' + prefix(fm[0]) + ((postfix || false) ? ' Ago' : '');
            else if (fm[1] > 0)  return fm[1] + ' Month' + prefix(fm[0]) + ( (postfix || false) ? ' Ago' : '');
            else if (fm[2] > 0)  return fm[2] + ' Day' + prefix(fm[2]) + ((postfix || false) ? ' Ago' : '');
            else if (fm[3] > 0)  return fm[3] + ' Hour' + prefix(fm[3]) + ((postfix || false) ? ' Ago' : '');
            else if (fm[4] > 0)  return fm[4] + ' Minute' + prefix(fm[4]) + ((postfix || false) ? ' Ago' : '');
            else if (fm[5] > 0)  return fm[5] + ' Second' + prefix(fm[5]) + ( (postfix || false) ? ' Ago' : '');

        }



        var instaUserId = $('#instaUserId').val();

        var Pagination = {
            'ALL': {
                hasMoreData: false,
                limit: 20,
                prev_max_id: null,
                next_max_id: null,
                loadMore: false,
                processingAjax: false
            },
            'LIKE': {
                hasMoreData: false,
                limit: 20,
                prev_max_id: null,
                next_max_id: null,
                loadMore: false,
                processingAjax: false
            },
            'FOLLOW': {
                hasMoreData: false,
                limit: 20,
                prev_max_id: null,
                next_max_id: null,
                loadMore: false,
                processingAjax: false
            },
            'UNFOLLOW': {
                hasMoreData: false,
                limit: 20,
                prev_max_id: null,
                next_max_id: null,
                loadMore: false,
                processingAjax: false
            },
            'FOLLOWER': {
                hasMoreData: false,
                limit: 20,
                prev_max_id: null,
                next_max_id: null,
                loadMore: false,
                processingAjax: false
            }
        }

        var currentActiveLogTypeId = 0;


        $(document).ready(function () {
            instaUserId = $('#instaUserId').val();
            var refreshLogDetailsHandler = null, isViewMoreStatsButtonClicked = false;

            $(document.body).on('click', '#viewMoreLikers', function (e) {
                e.preventDefault();
                isViewMoreStatsButtonClicked = true;
                $("#logPromotion").trigger("click");
                $('mleft').removeClass('active');
                isViewMoreStatsButtonClicked = false;
                $('#likesCount').find('a').trigger("click");
            });
            $(document.body).on('click', '#viewMoreFollowings', function (e) {
                e.preventDefault();
                isViewMoreStatsButtonClicked = true;
                $("#logPromotion").trigger("click");
                $('mleft').removeClass('active');
                isViewMoreStatsButtonClicked = false;
                $('#followedCount').find('a').trigger("click");

            });
            $(document.body).on('click', '#viewMoreFollowers', function (e) {
                e.preventDefault();
                isViewMoreStatsButtonClicked = true;
                $("#logPromotion").trigger("click");
                $('mleft').removeClass('active');
                isViewMoreStatsButtonClicked = false;
                $('#folowersCount').find('a').trigger("click");
            });
            $(document.body).on('click', '#viewMoreUnFollowers', function (e) {
                e.preventDefault();
                isViewMoreStatsButtonClicked = true;
                $("#logPromotion").trigger("click");
                $('mleft').removeClass('active');
                isViewMoreStatsButtonClicked = false;
                $('#unfollowedCount').find('a').trigger("click");
            });


            var refreshProcessingAjax = false;

            var loadRecentAllLogDetails = function () {
                refreshProcessingAjax = true;
                $.ajax({
                    url: '/filter/promotion/get/recent/log/details',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        logTypeId: currentActiveLogTypeId,
                        pagination: {prev_max_id: Pagination.ALL.prev_max_id}
                    },

//                    beforeSend: function () {
//                        $("#loadMoreBtnLoaderForAllLogs").show();
//                    },
//                    complete: function () {
//                        $('#loadMoreBtnLoaderForAllLogs').hide();
//                    },
                    success: function (response) {
                        if (response.status == 'success') {

                            if (response.data != null) {
                                var logAllHtml = '';
                                var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                                var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                                var logFollowersCount = response.data.log_stat.followers_count;

                                if (response.data.pagination.result_size > 0) {
                                    $.each(response.data.logs, function (key, value) {

                                        if (value['service_type'] == 1) { //likes
                                            logAllHtml += '<div class="col-md-3"> ' +
                                                    '<figure style="height: 200px" class="snip1174  red col-md-4 imgpad" > <img src="' + value['picture_url'] + '"  class="img-responsive" width="100%"/>' +
                                                    '<figcaption><p class="fs"><b>Media liked &nbsp;&nbsp;&nbsp;<i class="fa fa-heart-o fa-2x"  aria-hidden="true"></i></b></p>' +
                                                    '<h2 class="brkword"><b>' + value['media_code'] + '</b></h2> ' +
                                                    '<p>  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/p/' + value['media_code'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                        }
                                        else if (value['service_type'] == 2) {//follows
                                            logAllHtml += '<div class="col-md-3"> ' +
                                                    '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"  class="img-responsive" width="100%"/>' +
                                                    '<figcaption><p class="fs"><b>Followed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user fa-2x"  aria-hidden="true"></i></b></p>' +
                                                    '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                                    '<p>  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';
                                        }
                                        else if (value['service_type'] == 3) { //unfollows

                                            logAllHtml += '<div class="col-md-3"> ' +
                                                    '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"   class="img-responsive" width="100%"/>' +
                                                    '<figcaption><p class="fs"><b>Unfollowed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user-times fa-2x"  aria-hidden="true"></i></b></p>' +
                                                    '<h2 class="brkword" ><b>@' + value['username'] + '</b></h2> ' +
                                                    '<p>  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';


                                        }
                                        else if (value['service_type'] == 4) {//followers
                                            logAllHtml += '<div class="col-md-3"> ' +
                                                    '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"    class="img-responsive" width="100%"/>' +
                                                    '<figcaption><p class="fs"><b>Followers &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus fa-2x"  aria-hidden="true"></i></b></p>' +
                                                    '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                                    '<p> <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                        }

                                    });
                                    Pagination.ALL.prev_max_id = response.data.pagination.prev_max_id;
                                }

                                $('#showAllLogs').prepend(logAllHtml);

                                $('#logAllCount').text(logAllCount);
                                $('#logLikesCount').text(logLikesCount);
                                $('#logFollowsCount').text(logFollowsCount);
                                $('#logUnfollowsCount').text(logUnfollowsCount);
                                $('#logFollowersCount').text(logFollowersCount);
                            }

                        }
                        refreshProcessingAjax = false;
                    }
                });
            };
            var loadRecentLikeLogDetails = function () {
                refreshProcessingAjax = false;
                $.ajax({
                    url: '/filter/promotion/get/recent/log/details',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        logTypeId: currentActiveLogTypeId,
                        pagination: {prev_max_id: Pagination.LIKE.prev_max_id}
                    },

//                    beforeSend: function () {
//                        $("#loadMoreBtnLoaderForLikeLogs").show();
//                    },
//                    complete: function () {
//                        $('#loadMoreBtnLoaderForLikeLogs').hide();
//                    },
                    success: function (response) {
                        if (response.status == 'success') {

                            var logLikesHtml = '';
                            var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                            var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                            var logFollowersCount = response.data.log_stat.followers_count;


                            if (response.data.pagination.result_size > 0) {
                                $.each(response.data.logs, function (key, value) {
                                    logLikesHtml += '<div class="col-md-3"> ' +
                                            '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"    class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Media liked &nbsp;&nbsp;&nbsp;<i class="fa fa-heart-o fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>' + value['media_code'] + '</b></h2> ' +
                                            '<p> <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/p/' + value['media_code'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                });
                                Pagination.LIKE.prev_max_id = response.data.pagination.prev_max_id;
                            }

                            $('#showLikesLogs').append(logLikesHtml);


                            $('#logAllCount').text(logAllCount);
                            $('#logLikesCount').text(logLikesCount);
                            $('#logFollowsCount').text(logFollowsCount);
                            $('#logUnfollowsCount').text(logUnfollowsCount);
                            $('#logFollowersCount').text(logFollowersCount);


                        }
                        refreshProcessingAjax = false;
                    }
                });
            };
            var loadRecentFollowLogDetails = function () {
                refreshProcessingAjax = true;
                $.ajax({
                    url: '/filter/promotion/get/recent/log/details',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        logTypeId: currentActiveLogTypeId,
                        pagination: {prev_max_id: Pagination.FOLLOW.prev_max_id}
                    },

//                    beforeSend: function () {
//                        $("#loadMoreBtnLoaderForLikeLogs").show();
//                    },
//                    complete: function () {
//                        $('#loadMoreBtnLoaderForLikeLogs').hide();
//                    },
                    success: function (response) {
                        if (response.status == 'success') {

                            var logFollowsHtml = '';
                            var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                            var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                            var logFollowersCount = response.data.log_stat.followers_count;

                            if (response.data.pagination.result_size > 0) {
                                $.each(response.data.logs, function (key, value) {
                                    logFollowsHtml += '<div class="col-md-3"> ' +
                                            '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"    class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                });
                                Pagination.FOLLOW.prev_max_id = response.data.pagination.prev_max_id;
                                $('#showFollowsLogs').append(logFollowsHtml);
                            }

                            $('#logAllCount').text(logAllCount);
                            $('#logLikesCount').text(logLikesCount);
                            $('#logFollowsCount').text(logFollowsCount);
                            $('#logUnfollowsCount').text(logUnfollowsCount);
                            $('#logFollowersCount').text(logFollowersCount);

                        }
                        refreshProcessingAjax = false;
                    }
                });
            };
            var loadRecentUnFollowLogDetails = function () {
                refreshProcessingAjax = true;
                $.ajax({
                    url: '/filter/promotion/get/recent/log/details',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        logTypeId: currentActiveLogTypeId,
                        pagination: {prev_max_id: Pagination.UNFOLLOW.prev_max_id}
                    },

//                    beforeSend: function () {
//                        $("#loadMoreBtnLoaderForUnFollowLikeLogs").show();
//                    },
//                    complete: function () {
//                        $('#loadMoreBtnLoaderForUnFollowLogs').hide();
//                    },
                    success: function (response) {
                        if (response.status == 'success') {

                            var logUnfollowsHtml = '';
                            var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                            var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                            var logFollowersCount = response.data.log_stat.followers_count;

                            if (response.data.pagination.result_size > 0) {
                                $.each(response.data.logs, function (key, value) {
                                    logUnfollowsHtml += '<div class="col-md-3"> ' +
                                            '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"    class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Unfollowed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user-times fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p >  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                });
                                Pagination.UNFOLLOW.prev_max_id = response.data.pagination.prev_max_id;
                                $('#showUnfollowsLogs').append(logUnfollowsHtml);
                            }


                            $('#logAllCount').text(logAllCount);
                            $('#logLikesCount').text(logLikesCount);
                            $('#logFollowsCount').text(logFollowsCount);
                            $('#logUnfollowsCount').text(logUnfollowsCount);
                            $('#logFollowersCount').text(logFollowersCount);

                        }
                        refreshProcessingAjax = false;
                    }
                });
            };
            var loadRecentFollowerLogDetails = function () {
                refreshProcessingAjax = true;
                $.ajax({
                    url: '/filter/promotion/get/recent/log/details',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        logTypeId: currentActiveLogTypeId,
                        pagination: {prev_max_id: Pagination.FOLLOWER.prev_max_id}
                    },

//                    beforeSend: function () {
//                        $("#loadMoreBtnLoaderForFollowerLogs").show();
//                    },
//                    complete: function () {
//                        $('#loadMoreBtnLoaderForFollowerLogs').hide();
//                    },
                    success: function (response) {
                        if (response.status == 'success') {

                            var logFollowersHtml = '';
                            var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                            var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                            var logFollowersCount = response.data.log_stat.followers_count;

                            if (response.data.pagination.result_size > 0) {
                                $.each(response.data.logs, function (key, value) {
                                    logFollowersHtml += '<div class="col-md-3"> ' +
                                            '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"    class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followers &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                });
                                Pagination.FOLLOWER.prev_max_id = response.data.pagination.prev_max_id;
                                $('#showFollowersLogs').append(logFollowersHtml);
                            }


                            $('#logAllCount').text(logAllCount);
                            $('#logLikesCount').text(logLikesCount);
                            $('#logFollowsCount').text(logFollowsCount);
                            $('#logUnfollowsCount').text(logUnfollowsCount);
                            $('#logFollowersCount').text(logFollowersCount);

                        }
                        refreshProcessingAjax = false;
                    }
                });
            };


            var refreshLogDetails = function () {

                if($('#logPromotion').hasClass('active')){
                    switch (parseInt(currentActiveLogTypeId)) {
                        case 0:
                            loadRecentAllLogDetails();
                            break;
                        case 1:
                            loadRecentLikeLogDetails();
                            break;
                        case 2:
                            loadRecentFollowLogDetails();
                            break;
                        case 3:
                            loadRecentUnFollowLogDetails();
                            break;
                        case 4:
                            loadRecentFollowerLogDetails();
                            break;
                        default:
                            break;
                    }
                }

            };
            setInterval(refreshLogDetails, 45000);


            var loadAllLogDetails = function () {
                Pagination.ALL.processingAjax = true;
                $.ajax({
                    url: '/filter/promotion/get/log/details',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        logTypeId: currentActiveLogTypeId,
                        pagination: {
                            next_max_id: Pagination.ALL.next_max_id,
                            limit: Pagination.ALL.limit
                        }
                    },

                    beforeSend: function () {
                        $("#loadMoreBtnLoaderForAllLogs").show();
                    },
                    complete: function () {
                        $('#loadMoreBtnLoaderForAllLogs').hide();
                    },
                    success: function (response) {
                        if (response.status == 'success') {

                            var logAllHtml = '';
                            var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                            var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                            var logFollowersCount = response.data.log_stat.followers_count;

                            if (logAllCount > 0) {
                                $.each(response.data.logs, function (key, value) {
                                    if (value['service_type'] == 1) { //likes
                                        logAllHtml += '<div class="col-md-3"> ' +
                                                '<figure style="height: 200px" class="snip1174  red col-md-4 imgpad" > <img src="' + value['picture_url'] + '"   class="img-responsive" width="100%"/>' +
                                                '<figcaption><p class="fs"><b>Media liked &nbsp;&nbsp;&nbsp;<i class="fa fa-heart-o fa-2x"  aria-hidden="true"></i></b></p>' +
                                                '<h2 class="brkword"><b>' + value['media_code'] + '</b></h2> ' +
                                                '<p>  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/p/' + value['media_code'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                    }
                                    else if (value['service_type'] == 2) {//follows
                                        logAllHtml += '<div class="col-md-3"> ' +
                                                '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"   class="img-responsive" width="100%"/>' +
                                                '<figcaption><p class="fs"><b>Followed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user fa-2x"  aria-hidden="true"></i></b></p>' +
                                                '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                                '<p>  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';
                                    }
                                    else if (value['service_type'] == 3) { //unfollows

                                        logAllHtml += '<div class="col-md-3"> ' +
                                                '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"    class="img-responsive" width="100%"/>' +
                                                '<figcaption><p class="fs"><b>Unfollowed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user-times fa-2x"  aria-hidden="true"></i></b></p>' +
                                                '<h2 class="brkword" ><b>@' + value['username'] + '</b></h2> ' +
                                                '<p>  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';


                                    }
                                    else if (value['service_type'] == 4) {//followers
                                        logAllHtml += '<div class="col-md-3"> ' +
                                                '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"   class="img-responsive" width="100%"/>' +
                                                '<figcaption><p class="fs"><b>Followers &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus fa-2x"  aria-hidden="true"></i></b></p>' +
                                                '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                                '<p> <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                    }

                                });
                            } else {
                                logAllHtml = '<div class="col-md-12 text-center"><h3>No Recent Activity Found !!!</h3></div>';
                            }
                            $('#showAllLogs').append(logAllHtml);


                            if (Pagination.ALL.prev_max_id == null) {
                                Pagination.ALL.prev_max_id = response.data.pagination.prev_max_id;
                            }


                            if (response.data.pagination.has_more_data) {
                                Pagination.ALL.hasMoreData = true;
                                Pagination.ALL.next_max_id = response.data.pagination.next_max_id;

                                if (Pagination.ALL.loadMore) {
                                    $('#loadMoreBtnForAllLogs').hide();
                                } else {
                                    $('#loadMoreBtnForAllLogs').show();
                                }

                            } else {
                                Pagination.ALL.hasMoreData = false;
                                Pagination.ALL.next_max_id = null;
                                $('#loadMoreBtnForAllLogs').hide();
                                $('#loadMoreBtnLoaderForAllLogs').hide();
                            }


                            $('#logAllCount').text(logAllCount);
                            $('#logLikesCount').text(logLikesCount);
                            $('#logFollowsCount').text(logFollowsCount);
                            $('#logUnfollowsCount').text(logUnfollowsCount);
                            $('#logFollowersCount').text(logFollowersCount);

                        } else {
//                            toastr.error('Error in serive!!! Please try again after sometime')
                        }

                        Pagination.ALL.processingAjax = false;
                    },
                    error: function (error) {
                        console.log(error);
                        toastr.error('Error in Network!!! Please try again after sometime');
                        Pagination.ALL.processingAjax = false;
                    }
                });
            };
            var loadLikeLogDetails = function () {
                Pagination.LIKE.processingAjax = true;
                $.ajax({
                    url: '/filter/promotion/get/log/details',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        logTypeId: currentActiveLogTypeId,
                        pagination: {
                            next_max_id: Pagination.LIKE.next_max_id,
                            limit: Pagination.LIKE.limit
                        }
                    },

                    beforeSend: function () {
                        $("#loadMoreBtnLoaderForLikeLogs").show();
                    },
                    complete: function () {
                        $('#loadMoreBtnLoaderForLikeLogs').hide();
                    },
                    success: function (response) {
                        if (response.status == 'success') {

                            var logLikesHtml = '';
                            var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                            var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                            var logFollowersCount = response.data.log_stat.followers_count;

                            if (logLikesCount > 0) {
                                $.each(response.data.logs, function (key, value) {

                                    logLikesHtml += '<div class="col-md-3"> ' +
                                            '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"    class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Media liked &nbsp;&nbsp;&nbsp;<i class="fa fa-heart-o fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>' + value['media_code'] + '</b></h2> ' +
                                            '<p> <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/p/' + value['media_code'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                });
                            } else {
                                logLikesHtml = '<div class="col-md-12 text-center"><h3>No Recent Activity Found !!!</h3></div>';
                            }
                            $('#showLikesLogs').append(logLikesHtml);

                            if (Pagination.LIKE.prev_max_id == null) {
                                Pagination.LIKE.prev_max_id = response.data.pagination.prev_max_id;
                            }


                            if (response.data.pagination.has_more_data) {
                                Pagination.LIKE.hasMoreData = true;
                                Pagination.LIKE.next_max_id = response.data.pagination.next_max_id;

                                if (Pagination.LIKE.loadMore) {
                                    $('#loadMoreBtnForLikeLogs').hide();
                                } else {
                                    $('#loadMoreBtnForLikeLogs').show();
                                }

                            } else {
                                Pagination.LIKE.hasMoreData = false;
                                Pagination.LIKE.next_max_id = null;
                                $('#loadMoreBtnForLikeLogs').hide();
                                $('#loadMoreBtnLoaderForLikeLogs').hide();
                            }


                            $('#logAllCount').text(logAllCount);
                            $('#logLikesCount').text(logLikesCount);
                            $('#logFollowsCount').text(logFollowsCount);
                            $('#logUnfollowsCount').text(logUnfollowsCount);
                            $('#logFollowersCount').text(logFollowersCount);


                        } else {
                            toastr.error('Error in serive!!! Please try again after sometime')
                        }

                        Pagination.LIKE.processingAjax = false;
                    },
                    error: function (error) {
                        console.log(error);
                        toastr.error('Error in Network!!! Please try again after sometime');
                        Pagination.LIKE.processingAjax = false;
                    }
                });
            };
            var loadFollowLogDetails = function () {
                Pagination.FOLLOW.processingAjax = true;
                $.ajax({
                    url: '/filter/promotion/get/log/details',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        logTypeId: currentActiveLogTypeId,
                        pagination: {
                            next_max_id: Pagination.FOLLOW.next_max_id,
                            limit: Pagination.FOLLOW.limit
                        }
                    },

                    beforeSend: function () {
                        $("#loadMoreBtnLoaderForFollowLogs").show();
                    },
                    complete: function () {
                        $('#loadMoreBtnLoaderForFollowLogs').hide();
                    },
                    success: function (response) {
                        if (response.status == 'success') {

                            var logFollowsHtml = '';
                            var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                            var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                            var logFollowersCount = response.data.log_stat.followers_count;

                            if (logFollowsCount > 0) {
                                $.each(response.data.logs, function (key, value) {
                                    logFollowsHtml += '<div class="col-md-3"> ' +
                                            '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"   class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                });
                            } else {
                                logFollowsHtml = '<div class="col-md-12 text-center"><h3>No Recent Activity Found !!!</h3></div>';
                            }
                            $('#showFollowsLogs').append(logFollowsHtml);


                            if (Pagination.FOLLOW.prev_max_id == null) {
                                Pagination.FOLLOW.prev_max_id = response.data.pagination.prev_max_id;
                            }

                            if (response.data.pagination.has_more_data) {
                                Pagination.FOLLOW.hasMoreData = true;
                                Pagination.FOLLOW.next_max_id = response.data.pagination.next_max_id;

                                if (Pagination.FOLLOW.loadMore) {
                                    $('#loadMoreBtnForFollowLogs').hide();
                                } else {
                                    $('#loadMoreBtnForFollowLogs').show();
                                }

                            } else {
                                Pagination.FOLLOW.hasMoreData = false;
                                Pagination.FOLLOW.next_max_id = null;
                                $('#loadMoreBtnForFollowLogs').hide();
                                $('#loadMoreBtnLoaderForFollowLogs').hide();
                            }


                            $('#logAllCount').text(logAllCount);
                            $('#logLikesCount').text(logLikesCount);
                            $('#logFollowsCount').text(logFollowsCount);
                            $('#logUnfollowsCount').text(logUnfollowsCount);
                            $('#logFollowersCount').text(logFollowersCount);

                        } else {
                            toastr.error('Error in serive!!! Please try again after sometime')
                        }

                        Pagination.FOLLOW.processingAjax = false;
                    },
                    error: function (error) {
                        console.log(error);
                        toastr.error('Error in Network!!! Please try again after sometime');
                        Pagination.FOLLOW.processingAjax = false;
                    }
                });
            };
            var loadUnFollowLogDetails = function () {
                Pagination.UNFOLLOW.processingAjax = true;
                $.ajax({
                    url: '/filter/promotion/get/log/details',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        logTypeId: currentActiveLogTypeId,
                        pagination: {
                            next_max_id: Pagination.UNFOLLOW.next_max_id,
                            limit: Pagination.UNFOLLOW.limit
                        }
                    },

                    beforeSend: function () {
                        $("#loadMoreBtnLoaderForUnFollowLogs").show();
                    },
                    complete: function () {
                        $('#loadMoreBtnLoaderForUnFollowLogs').hide();
                    },
                    success: function (response) {
                        if (response.status == 'success') {

                            var logUnfollowsHtml = '';
                            var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                            var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                            var logFollowersCount = response.data.log_stat.followers_count;

                            if (logUnfollowsCount > 0) {
                                $.each(response.data.logs, function (key, value) {

                                    logUnfollowsHtml += '<div class="col-md-3"> ' +
                                            '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"   class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Unfollowed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user-times fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p >  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                });
                            } else {
                                logUnfollowsHtml = '<div class="col-md-12 text-center"><h3>No Recent Unfollows Activity Found !!!</h3></div>';
                            }
                            $('#showUnfollowsLogs').append(logUnfollowsHtml);

                            if (Pagination.UNFOLLOW.prev_max_id == null) {
                                Pagination.UNFOLLOW.prev_max_id = response.data.pagination.prev_max_id;
                            }

                            if (response.data.pagination.has_more_data) {
                                Pagination.UNFOLLOW.hasMoreData = true;
                                Pagination.UNFOLLOW.next_max_id = response.data.pagination.next_max_id;

                                if (Pagination.UNFOLLOW.loadMore) {
                                    $('#loadMoreBtnForUnFollowLogs').hide();
                                } else {
                                    $('#loadMoreBtnForUnFollowLogs').show();
                                }

                            } else {
                                Pagination.UNFOLLOW.hasMoreData = false;
                                Pagination.UNFOLLOW.next_max_id = null;
                                $('#loadMoreBtnForUnFollowLogs').hide();
                                $('#loadMoreBtnLoaderForUnFollowLogs').hide();
                            }


                            $('#logAllCount').text(logAllCount);
                            $('#logLikesCount').text(logLikesCount);
                            $('#logFollowsCount').text(logFollowsCount);
                            $('#logUnfollowsCount').text(logUnfollowsCount);
                            $('#logFollowersCount').text(logFollowersCount);

                        } else {
                            toastr.error('Error in serive!!! Please try again after sometime')
                        }

                        Pagination.UNFOLLOW.processingAjax = false;
                    },
                    error: function (error) {
                        console.log(error);
                        toastr.error('Error in Network!!! Please try again after sometime');
                        Pagination.UNFOLLOW.processingAjax = false;
                    }
                });
            };
            var loadFollowerLogDetails = function () {
                Pagination.FOLLOWER.processingAjax = true;
                $.ajax({
                    url: '/filter/promotion/get/log/details',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        logTypeId: currentActiveLogTypeId,
                        pagination: {
                            next_max_id: Pagination.FOLLOWER.next_max_id,
                            limit: Pagination.FOLLOWER.limit
                        }
                    },

                    beforeSend: function () {
                        $("#loadMoreBtnLoaderForFollowerLogs").show();
                    },
                    complete: function () {
                        $('#loadMoreBtnLoaderForFollowerLogs').hide();
                    },
                    success: function (response) {
                        if (response.status == 'success') {

                            var logFollowersHtml = '';
                            var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                            var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                            var logFollowersCount = response.data.log_stat.followers_count;

                            if (logFollowersCount > 0) {
                                $.each(response.data.logs, function (key, value) {

                                    logFollowersHtml += '<div class="col-md-3"> ' +
                                            '<figure style="height: 200px" class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"   class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followers &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at'], true) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';
                                });
                            } else {
                                logFollowersHtml = '<div class="col-md-12 text-center"><h3>No Recent Followers Activity Found !!!</h3></div>';
                            }
                            $('#showFollowersLogs').append(logFollowersHtml);


                            if (Pagination.FOLLOWER.prev_max_id == null) {
                                Pagination.FOLLOWER.prev_max_id = response.data.pagination.prev_max_id;
                            }
                            if (response.data.pagination.has_more_data) {
                                Pagination.FOLLOWER.hasMoreData = true;
                                Pagination.FOLLOWER.next_max_id = response.data.pagination.next_max_id;

                                if (Pagination.FOLLOWER.loadMore) {
                                    $('#loadMoreBtnForFollowerLogs').hide();
                                } else {
                                    $('#loadMoreBtnForFollowerLogs').show();
                                }

                            } else {
                                Pagination.FOLLOWER.hasMoreData = false;
                                Pagination.FOLLOWER.next_max_id = null;
                                $('#loadMoreBtnForFollowerLogs').hide();
                                $('#loadMoreBtnLoaderForFollowerLogs').hide();
                            }


                            $('#logAllCount').text(logAllCount);
                            $('#logLikesCount').text(logLikesCount);
                            $('#logFollowsCount').text(logFollowsCount);
                            $('#logUnfollowsCount').text(logUnfollowsCount);
                            $('#logFollowersCount').text(logFollowersCount);


                        } else {
                            toastr.error('Error in serive!!! Please try again after sometime')
                        }

                        Pagination.FOLLOWER.processingAjax = false;
                    },
                    error: function (error) {
                        console.log(error);
                        toastr.error('Error in Network!!! Please try again after sometime');
                        Pagination.FOLLOWER.processingAjax = false;
                    }
                });
            };


            var refreshAndLoadLogDetails = function () {
//                if (refreshLogDetailsHandler == null) {
//                    refreshLogDetailsHandler = setInterval(refreshLogDetails, 45000);
//                }

                switch (parseInt(currentActiveLogTypeId)) {
                    case 0:
                        Pagination.ALL.prev_max_id = null;
                        loadAllLogDetails();
                        break;
                    case 1:
                        Pagination.LIKE.prev_max_id = null;
                        loadLikeLogDetails();
                        break;
                    case 2:
                        Pagination.FOLLOW.prev_max_id = null;
                        loadFollowLogDetails();
                        break;
                    case 3:
                        Pagination.UNFOLLOW.prev_max_id = null;
                        loadUnFollowLogDetails();
                        break;
                    case 4:
                        Pagination.FOLLOWER.prev_max_id = null;
                        loadFollowerLogDetails();
                        break;
                    default:
                        break;
                }

            };
            var resetLogDetailsPagination = function () {
//                if (refreshLogDetailsHandler != null) {
//                    clearInterval(refreshLogDetailsHandler);
//                }


                $('#showAllLogs').empty();
                $('#loadMoreBtnForAllLogs').val('Load More');
                Pagination.ALL.hasMoreData = false;
                Pagination.ALL.prev_max_id = null;
                Pagination.ALL.next_max_id = null;
                Pagination.ALL.loadMore = false;
                Pagination.ALL.processingAjax = false;


                $('#showLikesLogs').empty();
                $('#loadMoreBtnForLikeLogs').val('Load More');
                Pagination.LIKE.hasMoreData = false;
                Pagination.LIKE.prev_max_id = null;
                Pagination.LIKE.next_max_id = null;
                Pagination.LIKE.loadMore = false;
                Pagination.LIKE.processingAjax = false;


                $('#showFollowsLogs').empty();
                $('#loadMoreBtnForFollowLogs').val('Load More');
                Pagination.FOLLOW.hasMoreData = false;
                Pagination.FOLLOW.prev_max_id = null;
                Pagination.FOLLOW.next_max_id = null;
                Pagination.FOLLOW.loadMore = false;
                Pagination.FOLLOW.processingAjax = false;


                $('#showUnfollowsLogs').empty();
                $('#loadMoreBtnForUnFollowLogs').val('Load More');
                Pagination.UNFOLLOW.hasMoreData = false;
                Pagination.UNFOLLOW.prev_max_id = null;
                Pagination.UNFOLLOW.next_max_id = null;
                Pagination.UNFOLLOW.loadMore = false;
                Pagination.UNFOLLOW.processingAjax = false;


                $('#showFollowersLogs').empty();
                $('#loadMoreBtnForFollowerLogs').val('Load More');
                Pagination.FOLLOWER.hasMoreData = false;
                Pagination.FOLLOWER.prev_max_id = null;
                Pagination.FOLLOWER.next_max_id = null;
                Pagination.FOLLOWER.loadMore = false;
                Pagination.FOLLOWER.processingAjax = false;
            };

            $(document.body).on('click', '#loadMoreBtnForAllLogs,#loadMoreBtnForLikeLogs,#loadMoreBtnForFollowLogs,#loadMoreBtnForUnFollowLogs,#loadMoreBtnForFollowerLogs', function (e) {
                e.preventDefault();
                $(this).val('Loading...');

                switch (parseInt(currentActiveLogTypeId)) {
                    case 0:
                        if (Pagination.ALL.hasMoreData) {
                            Pagination.ALL.loadMore = true;
                            loadAllLogDetails();
                        }
                        break;
                    case 1:
                        if (Pagination.LIKE.hasMoreData) {
                            Pagination.LIKE.loadMore = true;
                            loadLikeLogDetails();
                        }
                        break;
                    case 2:
                        if (Pagination.FOLLOW.hasMoreData) {
                            Pagination.FOLLOW.loadMore = true;
                            loadFollowLogDetails();
                        }
                        break;
                    case 3:
                        if (Pagination.UNFOLLOW.hasMoreData) {
                            Pagination.UNFOLLOW.loadMore = true;
                            loadUnFollowLogDetails();
                        }
                        break;
                    case 4:
                        if (Pagination.FOLLOWER.hasMoreData) {
                            Pagination.FOLLOWER.loadMore = true;
                            loadFollowerLogDetails();
                        }
                        break;
                    default:
                        break;
                }

            });

            $(document).scroll(function () {
                switch (parseInt(currentActiveLogTypeId)) {
                    case 0:
                        if (Pagination.ALL.loadMore) {
                            if ($('#logPromotion').hasClass('active')) {
                                if (!Pagination.ALL.processingAjax) {
                                    if (Pagination.ALL.hasMoreData) {
                                        if ($(window).scrollTop() >= (($(document).height() - $(window).height() - 300))) {
                                            $('#loadMoreBtnLoaderForAllLogs').show();
                                            loadAllLogDetails();
                                        }
                                    }
                                }
                            }
                        }
                        ;
                        break;
                    case 1:
                        if (Pagination.LIKE.loadMore) {
                            if ($('#logPromotion').hasClass('active')) {
                                if (!Pagination.LIKE.processingAjax) {
                                    if (Pagination.LIKE.hasMoreData) {
                                        if ($(window).scrollTop() >= (($(document).height() - $(window).height() - 300))) {
                                            $('#loadMoreBtnLoaderForLikeLogs').show();
                                            loadLikeLogDetails();
                                        }
                                    }
                                }
                            }
                        }
                        ;
                        break;
                    case 2:
                        if (Pagination.FOLLOW.loadMore) {
                            if ($('#logPromotion').hasClass('active')) {
                                if (!Pagination.FOLLOW.processingAjax) {
                                    if (Pagination.FOLLOW.hasMoreData) {
                                        if ($(window).scrollTop() >= (($(document).height() - $(window).height() - 300))) {
                                            $('#loadMoreBtnLoaderForFollowLogs').show();
                                            loadFollowLogDetails();
                                        }
                                    }
                                }
                            }
                        }
                        ;
                        break;
                    case 3:
                        if (Pagination.UNFOLLOW.loadMore) {
                            if ($('#logPromotion').hasClass('active')) {
                                if (!Pagination.UNFOLLOW.processingAjax) {
                                    if (Pagination.UNFOLLOW.hasMoreData) {
                                        if ($(window).scrollTop() >= (($(document).height() - $(window).height() - 300))) {
                                            $('#loadMoreBtnLoaderForUnFollowLogs').show();
                                            loadUnFollowLogDetails();
                                        }
                                    }
                                }
                            }
                        }
                        ;
                        break;
                    case 4:
                        if (Pagination.FOLLOWER.loadMore) {
                            if ($('#logPromotion').hasClass('active')) {
                                if (!Pagination.FOLLOWER.processingAjax) {
                                    if (Pagination.FOLLOWER.hasMoreData) {
                                        if ($(window).scrollTop() >= (($(document).height() - $(window).height() - 300))) {
                                            $('#loadMoreBtnLoaderForFollowerLogs').show();
                                            loadFollowerLogDetails();
                                        }
                                    }
                                }
                            }
                        }
                        ;
                        break;
                    default:
                        break;
                }
            });

            $(document.body).on('click', '.displayLogType', function (e) {
                e.preventDefault();
                currentActiveLogTypeId = $(this).attr('data-logId');

//                $('#showAllLogs').empty();
//                $('#showLikesLogs').empty();
//                $('#showFollowsLogs').empty();
//                $('#showUnfollowsLogs').empty();
//                $('#showFollowersLogs').empty();

                resetLogDetailsPagination();
                refreshAndLoadLogDetails();
                isViewMoreStatsButtonClicked = false;
            });


            $(document.body).on('click', '#activityPromotion', function (e) {
                e.preventDefault();
                $(".navigate-tab").removeClass('active');
                $(this).addClass('active');


                $('#Top-Part-Activity').show();
                $('#Main-Part-Activity').show();

                $('#activity_toggle').show();
                $('#logs_toggle').hide();
                $('#stats_toggle').hide();
                $('#profiles_toggle').hide();

            });
            $(document.body).on('click', '#logPromotion', function (e) {
                e.preventDefault();

                $('#Top-Part-log').show();
                $('#Main-Part-Log').show();

                $('#activity_toggle').hide();
                $('#logs_toggle').show();
                $('#stats_toggle').hide();
                $('#profiles_toggle').hide();
                if (!($(this).hasClass('active'))) {
                    resetLogDetailsPagination();
                    if (!isViewMoreStatsButtonClicked) {
                        refreshAndLoadLogDetails();
                    }
                    isViewMoreStatsButtonClicked = false;

                    $(".navigate-tab").removeClass('active');
                    $(this).addClass('active');
                }

            });
            $(document.body).on('click', '#statPromotion', function (e) {
                e.preventDefault();

                $('#Top-Part-stat').show();
                $('#Main-Part-Stat').show();

                $('#activity_toggle').hide();
                $('#logs_toggle').hide();
                $('#stats_toggle').show();
                $('#profiles_toggle').hide();

                if (!($(this).hasClass('active'))) {
                    $(".navigate-tab").removeClass('active');
                    $(this).addClass('active');
                }

            });
            $(document.body).on('click', '#profilePromotion', function (e) {
                e.preventDefault();

                $('#Top-Part-Profile').show();
                $('#Main-Part-Profile').show();

                $('#activity_toggle').hide();
                $('#logs_toggle').hide();
                $('#stats_toggle').hide();
                $('#profiles_toggle').show();

                if (!($(this).hasClass('active'))) {

                    $(".navigate-tab").removeClass('active');
                    $(this).addClass('active');
                }


            });


            var getOverviewStatsDetails = function () {
                $.ajax({
                    url: '/filter/promotion/get/overview/stats',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId
                    },
                    success: function (response) {
                        if (response.status == 'success') {
                            if (response.data != null) {
                                var currentObj = $('.filter_status_button');
                                if (parseInt(currentObj.attr('data-id')) == 1 && parseInt(response.data.filter_promotion_status) == 0) {
                                    clearInterval(timer);
                                    $('.filter_timer').text('Processing...');
                                    currentObj.css({
                                        "opacity": "0.6",
                                        "pointer-events": "none"
                                    });
                                    $("#loader").show();

                                    var appendData = 'Promotion - <a href="javascript:;" title="click to start activity" ' +
                                            'class="btn btn-success filter_status_button" style="width: 135px" data-id="0">' +
                                            'Start <i class="fa fa-play"></i> </a> ' +
                                            ' <span style="padding: 10px" class="filter_timer" data-id="' + (response.data.filter_promotion_stop_time - response.data.filter_promotion_start_time) + '">' +
                                            '' + (sformat(parseInt(response.data.filter_promotion_stop_time - response.data.filter_promotion_start_time))) + '</span>' +
                                            '<a href="javascript:;" class="btn btn-danger disable" style="width: 135px;">' +
                                            'Stopped<i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a> ';
                                    $('.start_stop').html(appendData);


                                    currentObj.css({
                                        "opacity": "",
                                        "pointer-events": ""
                                    })

                                }


                                $('#overviewLikesCount').text(response.data.likes_count);
                                $('#overviewFollowsCount').text(response.data.followed_count);
                                $('#overviewUnfollowsCount').text(response.data.unfollowed_count);
                                $('#overviewFollowersCount').text(response.data.followers_count);
                                $('#overviewAccountStatus').text((response.data.status == 'A') ? 'Activated' : 'Inactivated');


                                var promotionStatusMessage = $('#promotionStatusMessage');
                                if (response.data.status == 'I') {
                                    if (promotionStatusMessage.checkEmpty()) {
                                        var messageHtml = '<div class="alert alert-warning display-hide" style="display: block;"> <button class="close" data-close="alert"></button> ' +
                                                '<p>Your Account is Inactive!!!</p></div>';

                                        promotionStatusMessage.html(messageHtml);
                                    }
                                } else {
                                    if (!promotionStatusMessage.checkEmpty()) {
                                        promotionStatusMessage.empty();
                                    }
                                }

                                $('#totalLikedCount').text(response.data.filter_likes_count);
                                $('#totalFollowedCount').text(response.data.filter_follows_count);
                                $('#totalFollowersCount').text(response.data.filter_followers_coun);
                                $('#totalUnfollowedCount').text(response.data.filter_unfollows_count);
                                $('#totalTimeUsed').text(convertShortDateTimeFormat(response.data.total_time_used, false));
                                $('#totalTimeLeft').text(convertShortDateTimeFormat(response.data.time_period_left, false));
                            }
                        }

                    },
                });
            };

            setInterval(getOverviewStatsDetails, 60000);
        })
    </script>




    <!-- FILTER ACTIVITY SETTINGS --->
    <script>
        var hashtags = [], locations = [], usernames = [], timerid = null, isDataModified = false;
        $(document).ready(function () {

            $(document.body).on('change', '#instaUserId', function (e) {
                e.preventDefault();
                if ($('#promotionType').val() == 'D')
                    window.location.href = '/default/promotion/' + $(this).val();
                else
                    window.location.href = '/filter/promotion/' + $(this).val();
            })


            $(document.body).on('change', '#promotionType', function (e) {
                e.preventDefault();
                if ($(this).val() == 'D')
                    window.location.href = '/default/promotion/' + $('#instaUserId').val();
                else
                    window.location.href = '/filter/promotion/' + $('#instaUserId').val();
            })
        });

    </script>

    <script>

        var saveConfigFilterSettings = function () {
            var obj = $('#instaUserId option:selected');
            if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                swal({
                    type: "error",
                    title: "<small style='color:red'>Your Account has been disconnected from Instaffic System!!!</small>",
                    text: " <span>Go to Account Activation  and Re-Connect your Account</span>",
                    html: true
                });
                return false;
            } else if (obj.attr('data-time_period_left') == 0) {
                var message = "";
                if (obj.attr('data-subscribe_type') == 'PU') {
                    message = "Your Private subscription period has been expired!!!";
                } else if (obj.attr('data-subscribe_type') == 'DU') {
                    message = "Your Bussiness subscription period has been expired!!!";
                } else {
                    message = "Your Demo subscription period has been expired!!!";
                }
                swal({
                    animation: true,
                    type: "warning",
                    title: "<small style='color:#F8BB86'>" + message + "</small>",
                    text: "<span>Click <a href='/user/packageList'>here</a> to Upgrade your Subscription Period</span>",
                    html: true
                });
                return false;
            }


            if ((hashtags.length == 0) && (usernames.length == 0) && (locations.length == 0)) {
                toastr.error('Add Alteast one hashtag or username or location');
                return false;
            }

            var saveData = {
                instaUserId: $('#instaUserId').val(),
                like: parseInt(($('#likesOption').is(':checked')) ? 1 : 0),
                follow: parseInt(($('#followsOption').is(':checked')) ? 1 : 0),
                unfollow: parseInt(($('#unFollowsOption').is(':checked')) ? 1 : 0),
                unfollow_option: parseInt($('input[name="unFollowsSubOption"]:checked').val()),
                hashtags: (hashtags.length > 0) ? hashtags.join(',') : null,
                usernames: (usernames.length > 0) ? JSON.stringify(usernames) : null,
                locations: (locations.length > 0) ? JSON.stringify(locations) : null,
                gender: $('#selectGender').val(),
                mediaType: $('#mediaType').val(),
                mediaAge: $('#mediaAge').val(),
            }

            $.ajax({
                url: '/filter/promotion/save/settings',
                method: 'post',
                dataType: 'JSON',
                data: saveData,
                success: function (response) {
                    if (response.status == 'success')
                        toastr.success('Data updated successfully');
                    else
                        toastr.error(response.message);
                }
            })
        }
        $(document).ready(function () {
            $(document.body).on('click', '#unFollowsOption', function (e) {
                if ($(this).is(':checked')) {
                    $('#unFollowsSubOptionDisplay').show();
                } else {
                    $('#unFollowsSubOptionDisplay').hide();
                }
            })

            $(document.body).on('change', '#likesOption, #followsOption, #unFollowsOption, #selectGender, #mediaType, #mediaAge', function (e) {
                e.preventDefault();
                saveConfigFilterSettings();
            })

            $('input[name="unFollowsSubOption"]:radio').change(function (e) {
                e.preventDefault();
                saveConfigFilterSettings();
            });

            //FUNCTIONS FOR HASHTAGS

            $(document.body).on('click', '#addHashtagsBtn', function (e) {
                e.preventDefault();
                $("#searchHashtag").val('');
                $("#hashTagId").html('');
                $('#hashTagData_error').text('');
            })

            $(document.body).on('input', '#searchHashtag', function (e) {

                var hashTagIdElementObj = $("#hashTagId");
                var currentObj = $(this);
                var searchValue = currentObj.val();

                if (searchValue.length == 0) {
                    hashTagIdElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                if (currentObj.data("lastval") != searchValue) {

                    currentObj.data("lastval", searchValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {

                        hashTagIdElementObj.html('');

                        $.ajax({
                            url: '/user/hashTagFinder',
                            type: 'post',
                            data: {'tag': searchValue},

                            beforeSend: function () {
                                $('#hashtag-search-icon').hide();
                                $('#hashtag-loading-icon').show();
                            },
                            success: function (response) {
                                var searchHagtagHtmlData = '';
                                if (response == 201) {
                                    $(currentObj).focus();
                                    searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                }
                                else if (response == 202) {
                                    $(currentObj).focus();
                                    searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                }
                                else {

                                    if (response.length > 0) {
                                        $.each(response, function (key, value) {
                                            searchHagtagHtmlData += '<a  href="javascript:;" class="unit-tag checkedHashTags-label">' +
                                                    '<i class="fa fa-tag"></i> <span>' + value.name + '</span> <span class="countrer">' + value.media_count + ' posts</span>' +
                                                    '<span class="unit-btn-x"><input class="checkedHashTags" type="checkbox" data-hashtag-value="' + value.name + '"></span>' +
                                                    '</a>';
                                        });
                                    } else {
                                        $(currentObj).focus();
                                        searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                    }
                                }

                                $("#hashTagId").html(searchHagtagHtmlData).show();
                                $('#hashtag-search-icon').show();
                                $('#hashtag-loading-icon').hide();
                            }
                        });

                    }, 500);
                }
            });

            $(document.body).on('click', '#searchHashtagBtn', function (e) {
                var hashTagIdElementObj = $("#hashTagId");
                var currentObj = $('#searchHashtag');
                var searchValue = currentObj.val();

                if (searchValue.length == 0) {
                    hashTagIdElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                if (currentObj.data("lastval") != searchValue) {

                    currentObj.data("lastval", searchValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {

                        hashTagIdElementObj.html('');

                        $.ajax({
                            url: '/user/hashTagFinder',
                            type: 'post',
                            data: {'tag': searchValue},

                            beforeSend: function () {
                                $('#hashtag-search-icon').hide();
                                $('#hashtag-loading-icon').show();
                            },

                            success: function (response) {
                                var searchHagtagHtmlData = '';
                                if (response == 201) {
                                    $(currentObj).focus();
                                    searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                }
                                else if (response == 202) {
                                    $(currentObj).focus();
                                    searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                }
                                else {

                                    if (response.length > 0) {
                                        $.each(response, function (key, value) {
                                            searchHagtagHtmlData += '<a  href="javascript:;" class="unit-tag checkedHashTags-label">' +
                                                    '<i class="fa fa-tag"></i> <span>' + value.name + '</span> <span class="countrer">' + value.media_count + ' posts</span>' +
                                                    '<span class="unit-btn-x"><input class="checkedHashTags" type="checkbox" data-hashtag-value="' + value.name + '"></span>' +
                                                    '</a>';
                                        });
                                    } else {
                                        $(currentObj).focus();
                                        searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                    }
                                }

                                $("#hashTagId").html(searchHagtagHtmlData).show();
                                $('#hashtag-search-icon').show();
                                $('#hashtag-loading-icon').hide();
                            }
                        });

                    }, 500);
                }
            });

            $(document.body).on('click', '.checkedHashTags-label', function () {
                var currentElementObj = $(this).find('.checkedHashTags');
                if ($(currentElementObj).is(":checked")) {
                    $(currentElementObj).attr('checked', false);
                } else {
                    $(currentElementObj).attr('checked', true);
                }
            });
            $(document.body).on('click', '.checkedHashTags', function () {
                if ($(this).is(":checked")) {
                    $(this).attr('checked', false);
                } else {
                    $(this).attr('checked', true);
                }
            });

            $(document.body).on('click', '#addHashTagsModalBtn', function (e) {
                e.preventDefault();
                var mainHashTagHtml = '', hashTagValue = '';

                var selectedHashags = $('.checkedHashTags:checkbox:checked');
                if (selectedHashags.length > 0) {
                    $.each(selectedHashags, function () {
                        hashTagValue = $(this).attr('data-hashtag-value');
                        hashtags.push(hashTagValue);
                        mainHashTagHtml += '<div class="btn-group btnspace remove-hashtag-btn" style="margin-right: 4px;">' +
                                '<a  class="btn btncolor" title="Check in instagram" target="_blank" href="https://www.instagram.com/explore/tags/'+hashTagValue+'/" >' + hashTagValue + '</a>' +
                                '<a  style="height: 34px;" class="btn btncolor dropdown-toggle removeTag"  data-hashtag-name="' + hashTagValue + '" title="Remove Hashtag">' +
                                '<span class="close"></span></a></div>';
                        isDataModified = true;
                    });

                    $('#mainHashTag').prepend(mainHashTagHtml);
                    $('#myModal').hide();
                    saveConfigFilterSettings();
                } else {
                    toastr.error('No Hashtag selected !!!');
                }
            });

            $(document.body).on('click', '.removeTag', function (e) {
                isDataModified = true;
                $(this).parent('.remove-hashtag-btn').remove();
                var removeItem = $(this).attr('data-hashtag-name');
                hashtags = jQuery.grep(hashtags, function (value) {
                    return value != removeItem;
                });

                if (hashtags.length > 0) {
                    $('#hashTagData_error').text('');
                }
                saveConfigFilterSettings();
            });

            $(document.body).on('click', '#delete-all-hashtags', function (e) {
                e.preventDefault();
                if (hashtags.length > 0) {
                    $('.remove-hashtag-btn').remove();
                    hashtags = [];
                    isDataModified = true;
                    saveConfigFilterSettings();
                } else {
                    toastr.error('No Hashtag Added !!!');
                }
            });


            //FUNCTIONS FOR LOCATIONS

            var GoogleMapObj = {
                infowindow: null,
                bounds: null,
                customIconBase: 'https://maps.google.com/mapfiles/kml/shapes/' + 'parking_lot_maps.png'
            };

            function markMultipleLocationOnGoogleMap(locations) {

                var map = new google.maps.Map(document.getElementById('displayMapArea'), {
                    zoom: 10,
                    center: new google.maps.LatLng(locations[0][1], locations[0][2]),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });


                var bounds = new google.maps.LatLngBounds();

                if (GoogleMapObj.infowindow == null) {
                    GoogleMapObj.infowindow = new google.maps.InfoWindow();
                }

                var marker, i;
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
//                        icon: GoogleMapObj.customIconBase

                    });

                    //extend the bounds to include each marker's position
                    bounds.extend(marker.position);
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            GoogleMapObj.infowindow.setContent(locations[i][0]);
                            GoogleMapObj.infowindow.open(map, marker);
                        }
                    })(marker, i));
                }

                //now fit the map to the newly inclusive bounds
                map.fitBounds(bounds);//       # auto-zoom
                map.panToBounds(bounds);//     # auto-center


            }

            $(document.body).on('input', '#searchLocation', function (e) {
                e.preventDefault();

                var locationDetailsElementObj = $("#searchLocationValue");
                locationDetailsElementObj.html('');

                var currentObj = $(this);
                var searchLocationValue = currentObj.val();

                if (searchLocationValue.length == 0) {
                    locationDetailsElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                if (currentObj.data("lastval") != searchLocationValue) {

                    currentObj.data("lastval", searchLocationValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {

                        $.ajax({
                            url: '/user/findLocation',
                            methos: 'post',
                            data: {
                                searchLocation: searchLocationValue
                            },
                            beforeSend: function () {
                                $('#location-search-icon').hide();
                                $('#location-loading-icon').show();
                            },
                            success: function (response) {
                                if (response.length == 0) {
                                    $('#displayMapArea').addClass('hidden');
                                    $('#locationDetails').html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                                }
                                else if (response == 201) {
                                    $('#displayMapArea').addClass('hidden');
                                    $('#locationDetails').html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                                }
                                else if (response == 202) {
                                    $('#displayMapArea').addClass('hidden');
                                    $('#locationDetails').html('<div style="text-align: center;">Error in service</div>');
                                }
                                else {

                                    var searchedLocationHtmlData = '';

                                    $("#loadnwait").css('display', 'none');
                                    if (response.length > 0) {


                                        var markerLocations = [];

                                        $.each(response, function (key, value) {
                                            searchedLocationHtmlData += '<a  href="javascript:;" class="unit-tag checkedLocations-label">' +
                                                    '<span>' + value.name + '</span><span class="unit-btn-x">' +
                                                    '<input class="checkedLocations" type="checkbox" data-name="' + value.name + '" data-id="' + value.pk + '" data-latitude="' + value.lat + '" data-longitude="' + value.lng + '"></span>' +
                                                    '</a>';

                                            markerLocations.push([value.name, value.lat, value.lng, value.pk]);
                                        });

                                        markMultipleLocationOnGoogleMap(markerLocations);

                                        $("#locationDetails").html(searchedLocationHtmlData);
                                        $('#displayMapArea').removeClass('hidden');
                                    }
                                    else {
                                        $('#searchLocation').focus();
                                        $('#displayMapArea').addClass('hidden');
                                        $("#locationDetails").html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                                    }
                                }

                                $('#locationDetails').removeClass('hidden');
                                $('#location-search-icon').show();
                                $('#location-loading-icon').hide();
                            }
                        });

                    }, 500);
                }
            });

            $(document.body).on("click", "#searchLocationBtn", function (e) {
                e.preventDefault();
                var currentObj = $(this);
                var locationDetailsObj = $('#locationDetails');
                locationDetailsObj.html('');

                var locationDetailsElementObj = $("#searchLocation");

                var searchLocationValue = locationDetailsElementObj.val();

                if (searchLocationValue.length == 0) {
                    locationDetailsElementObj.focus();
                    return false;
                }

                $.ajax({
                    url: '/user/findLocation',
                    methos: 'post',
                    data: {
                        searchLocation: searchLocationValue
                    },
                    beforeSend: function () {
                        $('#location-search-icon').hide();
                        $('#location-loading-icon').show();
                    },
                    success: function (response) {

                        if (response.length == 0) {
                            $('#displayMapArea').addClass('hidden');
                            $('#locationDetails').html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                        }
                        else if (response == 201) {
                            $('#displayMapArea').addClass('hidden');
                            $('#locationDetails').html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                        }
                        else if (response == 202) {
                            $('#displayMapArea').addClass('hidden');
                            $('#locationDetails').html('<div style="text-align: center;">Error in service</div>');
                        }
                        else {

                            var searchedLocationHtmlData = '';

                            $("#loadnwait").css('display', 'none');
                            if (response.length > 0) {


                                var markerLocations = [];

                                $.each(response, function (key, value) {
                                    searchedLocationHtmlData += '<a  href="javascript:;" class="unit-tag checkedLocations-label">' +
                                            '<span>' + value.name + '</span><span class="unit-btn-x">' +
                                            '<input class="checkedLocations" type="checkbox" data-name="' + value.name + '" data-id="' + value.pk + '" data-latitude="' + value.lat + '" data-longitude="' + value.lng + '"></span>' +
                                            '</a>';

                                    markerLocations.push([value.name, value.lat, value.lng, value.pk]);
                                });


                                markMultipleLocationOnGoogleMap(markerLocations);


                                $("#locationDetails").html(searchedLocationHtmlData);
                                $('#locationDetails').removeClass('hidden');
                                $('#displayMapArea').removeClass('hidden');
                            }
                            else {
                                locationDetailsElementObj.focus();
                                $('#displayMapArea').addClass('hidden');
                                $("#locationDetails").html('<div class="row" style="align-content: center">No Result Found !!! Please try different word</div>');
                            }
                        }
                        $('#location-search-icon').show();
                        $('#location-loading-icon').hide();
                    }
                });
            })

            $(document.body).on('click', '.checkedLocations-label', function () {
                var currentElementObj = $(this).find('.checkedLocations');
                if ($(currentElementObj).is(":checked")) {
                    $(currentElementObj).attr('checked', false);
                } else {
                    $(currentElementObj).attr('checked', true);
                }
            });
            $(document.body).on('click', '.checkedLocations', function () {
                if ($(this).is(":checked")) {
                    $(this).attr('checked', false);
                } else {
                    $(this).attr('checked', true);
                }
            });

            $(document.body).on('click', '#addLocationsModalBtn', function (e) {
                e.preventDefault();

                var mainLocationHtml = '', locationValue = '';
                var selectedLocation = $('.checkedLocations:checkbox:checked');
                if (selectedLocation.length > 0) {
                    $.each(selectedLocation, function () {
                        locationName = $(this).attr('data-name');
                        locationId = $(this).attr('data-id');

                        locations.push({id: locationId, name: locationName});

                        mainLocationHtml += '<div class="btn-group btnspace remove-location-btn" style="margin-right: 4px;">' +
                                '<a  class="btn btncolor" title="Check in instagram" target="_blank" href="https://www.instagram.com/explore/locations/'+locationId+'">' + locationName + '</a>' +
                                '<a  style="height: 34px;" class="btn btncolor dropdown-toggle removeLocation" title="Remove Location"  data-location-id="' + locationId + '" >' +
                                '<span class="close"></span></a></div>';

                        isDataModified = true;
                    });

                    $('#mainLocation').prepend(mainLocationHtml);
                    $('#myModal1').hide();
                    saveConfigFilterSettings();
                } else {
                    toastr.error('No Location selected !!!');
                }

            })

            $(document.body).on('click', '.removeLocation', function (e) {
                e.preventDefault();
                isDataModified = true;
                $(this).parent('.remove-location-btn').remove();
                var removeItem = $(this).attr('data-location-id');
                locations = jQuery.grep(locations, function (value) {
                    return value.id != removeItem;
                });

                if (locations.length > 0) {
                    $('#locationData_error').text('');
                }
                saveConfigFilterSettings();
            })

            $(document.body).on('click', '#delete-all-locations', function (e) {
                e.preventDefault();

                if (locations.length > 0) {
                    $('.remove-location-btn').remove();
                    locations = [];
                    isDataModified = true;
                    saveConfigFilterSettings();
                } else {
                    toastr.error('No Location Added !!!');
                }

            });


            //FUNCTIONS FOR USERNAMES

            $(document.body).on('input', '#searchUsername', function (e) {
                var userNameIdElementObj = $("#userNameId");
                var currentObj = $(this);
                var searchValue = currentObj.val();

                if (searchValue.length == 0) {
                    userNameIdElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                if (currentObj.data("lastval") != searchValue) {

                    currentObj.data("lastval", searchValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {
                        userNameIdElementObj.html('');

                        $.ajax({
                            url: '/user/userNameFinder',
                            type: 'post',
                            data: {'searchValue': searchValue},

                            beforeSend: function () {
                                $('#user-search-icon').hide();
                                $('#user-loading-icon').show();
                            },

                            success: function (response) {
                                if (response == 201) {
                                    $(currentObj).focus();
                                    $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                }
                                else if (response == 202) {
                                    $(currentObj).focus();
                                    $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                }
                                else {

                                    var searchUsernameHtmlData = '';

                                    if (response.length > 0) {

                                        $.each(response, function (key, value) {
                                            searchUsernameHtmlData += '<a  href="javascript:;" class="unit-tag checkedUsernames-label">' +
                                                    '<span><img src="' + value.profile_pic_url + '" height="25px" width="25px" >' +
                                                    '<span>' + value.username + '</span> <span class="countrer">Followers - ' + value.follower_count + ' </span>' +
                                                    '<span class="unit-btn-x"><input class="checkedUsernames" type="checkbox" data-username="' + value.username + '" data-profilePic="' + value.profile_pic_url + '"  data-id="' + value.pk + '" ></span>' +
                                                    '</a>';
                                        });
                                        $("#userNameId").html(searchUsernameHtmlData);
                                    }
                                    else {
                                        $(currentObj).focus();
                                        $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                    }
                                }
                                $('#user-search-icon').show();
                                $('#user-loading-icon').hide();
                            }
                        });

                    }, 500);
                }
            });

            $(document.body).on('click', '#searchUsernameBtn', function (e) {

                var userNameIdElementObj = $("#userNameId");


                var currentObj = $('#searchUsername');
                var searchValue = currentObj.val();

                if (searchValue.length == 0) {
                    userNameIdElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                if (currentObj.data("lastval") != searchValue) {

                    currentObj.data("lastval", searchValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {
                        userNameIdElementObj.html('');
                        $.ajax({
                            url: '/user/userNameFinder',
                            type: 'post',
                            data: {'searchValue': searchValue},

                            beforeSend: function () {
                                $('#user-search-icon').hide();
                                $('#user-loading-icon').show();
                            },

                            success: function (response) {
                                if (response == 201) {
                                    $(currentObj).focus();
                                    $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                }
                                else if (response == 202) {
                                    $(currentObj).focus();
                                    $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                }
                                else {

                                    var searchUsernameHtmlData = '';

                                    if (response.length > 0) {

                                        $.each(response, function (key, value) {
                                            searchUsernameHtmlData += '<a  href="javascript:;" class="unit-tag checkedUsernames-label" >' +
                                                    '<span><img src="' + value.profile_pic_url + '" height="25px" width="25px" >' +
                                                    '<span>' + value.username + '</span> <span class="countrer">Followers - ' + value.follower_count + ' </span>' +
                                                    '<span class="unit-btn-x"><input class="checkedUsernames" type="checkbox" data-username="' + value.username + '" data-profilePic="' + value.profile_pic_url + '"  data-id="' + value.pk + '" ></span>' +
                                                    '</a>';
                                        });
                                        $("#userNameId").html(searchUsernameHtmlData);
                                    }
                                    else {
                                        $(currentObj).focus();
                                        $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                    }
                                }
                                $('#user-search-icon').show();
                                $('#user-loading-icon').hide();
                            }
                        });

                    }, 500);
                }
            });

            $(document.body).on('click', '.checkedUsernames-label', function () {
                var currentElementObj = $(this).find('.checkedUsernames');
                if ($(currentElementObj).is(":checked")) {
                    $(currentElementObj).attr('checked', false);
                } else {
                    $(currentElementObj).attr('checked', true);
                }
            });
            $(document.body).on('click', '.checkedUsernames', function () {
                if ($(this).is(":checked")) {
                    $(this).attr('checked', false);
                } else {
                    $(this).attr('checked', true);
                }
            });

            $(document.body).on('click', '#addUsernamesModalBtn', function (e) {
                e.preventDefault();

                var mainUsernameHtml = '';

                var selectedUsernames = $('.checkedUsernames:checkbox:checked');
                if (selectedUsernames.length > 0) {
                    $.each(selectedUsernames, function () {
                        usernames.push({
                            id: $(this).attr('data-id'),
                            username: $(this).attr('data-username'),
                            profile_picture: $(this).attr('data-profilePic')
                        });

                        mainUsernameHtml += '<div class="btn-group btnspace remove-username-btn" style="margin-right: 4px;">' +
                                '<a style="padding: 4px 0px 3px 5px;"  class="btn btncolor" title="Check in instagram" target="_blank" href="https://instagram.com/'+$(this).attr('data-username')+'" >' +
                                '<img src="' + $(this).attr('data-profilePic') + '" height="27px" width="30px" style="border-radius: 5px;"></a>' +
                                '<a  class="btn btncolor" title="Check in instagram" target="_blank" href="https://instagram.com/'+$(this).attr('data-username')+'" >' + $(this).attr('data-username') + '</a>' +
                                '<a  style="height: 34px;" class="btn btncolor dropdown-toggle removeUsername" title="Remove Username"  data-id="' + $(this).attr('data-id') + '">' +
                                '<span class="close"></span></a></div>';

                        isDataModified = true;
                    });

                    $('#mainUsername').prepend(mainUsernameHtml);
                    $('#myModal2').hide();
                    saveConfigFilterSettings();
                } else {
                    toastr.error('No Username selected')
                }
            });

            $(document.body).on('click', '.removeUsername', function (e) {
                e.preventDefault();
                $(this).parent('.remove-username-btn').remove();
                var removeItem = $(this).attr('data-id');
                usernames = jQuery.grep(usernames, function (value) {
                    return value.id != removeItem;
                });
                isDataModified = true;
                saveConfigFilterSettings();
            });

            $(document.body).on('click', '#delete-all-usernames', function (e) {
                e.preventDefault();
                if (usernames.length > 0) {
                    $('.remove-username-btn').remove();
                    usernames = [];
                    isDataModified = true;
                    saveConfigFilterSettings();
                } else {
                    toastr.error('No Username Added !!!')
                }
            });
        })
    </script>

    <script>
        $(document).ready(function () {

            var oldHashTagData = '<?php if (isset($data['activityData']["tags"]) && !empty($data['activityData']["tags"])) echo $data['activityData']["tags"];?>' || null;
            if (oldHashTagData != null) {
                var hashTagsArray = oldHashTagData.split(',');
                var mainHashTagHtml = '';
                $.each(hashTagsArray, function (key, value) {
                    hashtags.push(value);
                    mainHashTagHtml += '<div class="btn-group btnspace remove-hashtag-btn" style="margin-right: 4px;">' +
                            '<a  class="btn btncolor" title="Check in instagram" target="_blank" href="https://www.instagram.com/explore/tags/'+value+'/" >' + value + '</a>' +
                            '<a  style="height: 34px;" title="Remove Hashtag" class="btn btncolor dropdown-toggle removeTag"  data-hashtag-name="' + value + '">' +
                            '<span class="close"></span></a></div>';

                });
                $('#mainHashTag').prepend(mainHashTagHtml);
            }


            var isDataExist = "@if( isset($data['activityData']) && !empty($data['activityData']['locations'] )) 1  @else 0 @endif";
            if (parseInt(isDataExist) === 1) {

                var oldLocationData = '@if( isset($data['activityData']) && !empty($data['activityData']['locations'] )) {{$data['activityData']['locations']}} @endif';
                var locationsArray = JSON.parse(oldLocationData.replace(/&quot;/g, '\"'));

                var mainLocationHtml = '';
                $.each(locationsArray, function (key, value) {
                    locations.push(value);
                    mainLocationHtml += '<div class="btn-group btnspace remove-location-btn" style="margin-right: 4px;">' +
                            '<a  class="btn btncolor" title="Check in instagram" target="_blank" href="https://www.instagram.com/explore/locations/'+value.id+'/" >' + value.name + '</a>' +
                            '<a  style="height: 34px;" title="Remove Location" class="btn btncolor dropdown-toggle removeLocation"  data-location-id="' + value.id + '">' +
                            '<span class="close"></span></a></div>';

                });

                $('#mainLocation').prepend(mainLocationHtml);
            }


            var oldUsernameData = '<?php if (isset($data["activityData"]) && !empty($data["activityData"]["usernames"])) echo $data["activityData"]["usernames"];?>' || null;
            if (oldUsernameData != null) {
                var usernamesArray = JSON.parse(oldUsernameData.replace(/&quot;/g, '\"'));
                var mainUsernameHtml = '';
                $.each(usernamesArray, function (key, value) {
                    usernames.push(value);
                    mainUsernameHtml += '<div class="btn-group btnspace remove-username-btn" style="margin-right: 4px;">' +
                            '<a style="padding: 4px 0px 3px 5px;"  class="btn btncolor"  title="Check in instagram" target="_blank" href="https://www.instagram.com/'+value.username+'">' +
                            '<img src="' + value.profile_picture + '" height="27px" width="30px" style="border-radius: 5px;"></a>' +
                            '<a   class="btn btncolor" title="Check in instagram" target="_blank" href="https://www.instagram.com/'+value.username+'">' + value.username + '</a>' +
                            '<a  style="height: 34px;" class="btn btncolor dropdown-toggle removeUsername"  data-id="' + value.id + '" title="Remove Username" target="_blank" href="https://www.instagram.com/'+value.username+'">' +
                            '<span class="close"></span></a></div>';
                });

                $('#mainUsername').prepend(mainUsernameHtml);
            }

        });
    </script>




    {{------------------------------------------------------setting manager--------->--}}
    <script>

        var isDataLoadSuccessfull = false;
        var getActivitySettingPreset = function () {
            $.ajax({
                url: '/get/activity/settings/preset',
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    var selectOptionHtml = '<option value=""> select Preset Name</option>';
                    if (response.code == 200 && response.status == 'success') {
                        if (response.data.length > 0) {
                            $.each(response.data, function (key, value) {
                                selectOptionHtml += '<option value="' + value.manager_settings_id + '"> ' + value.manager_settings_name + '</option>'
                            })
                        } else {
                            selectOptionHtml = '<option value=""> No Activity Settings Preset Name Found</option>';
                        }
                        isDataLoadSuccessfull = true;
                    } else {
                        selectOptionHtml = '<option value=""> No Activity Settings Preset Name Found</option>';
                    }
                    $('#selectOptionPreset').html(selectOptionHtml);
                }
            })
        }

        $(document).ready(function () {

            getActivitySettingPreset();
            $(document).on('click', '#saveActivitySettingsBtn', function (e) {
                var obj = $('#instaUserId option:selected');
                if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                    e.preventDefault();
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @" + obj.attr('data-username') + " Account has been disconnected from Instaffic System!!!</small>",
                        text: "<span>Go to Account Activation and Re-Connect this Account</span>",
                        html: true
                    });
                } else if (obj.attr('data-time_period_left') == 0) {
                    if (obj.attr('data-subscribe_type') == 'DU') {
                        e.preventDefault();
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Demo Subscription Period has been expired for this @" + obj.attr('data-username') + " account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> for Purchasing more Subscription Period</span>",
                            html: true
                        });
                    } else {
                        e.preventDefault();
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Subscription Package has been expired for this @" + obj.attr('data-username') + " account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> to upgrade your Subscription</span>",
                            html: true
                        });
                    }
                } else if (obj.attr('data-status') == 'I') {
                    e.preventDefault();
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @" + obj.attr('data-username') + " account is Inactive!!! Please active this account first</small>",
                        text: "<span>Click <a href='/user/dashboard'>here </a> to active this account</span>",
                        html: true
                    });
                } else {
                    $('#saveActivitySettingsModal').modal('show');
                    $('#presetName').val('');
                    $('#presetNameError').text('');
                    $('#presetNameSuccess').text('');
                    $('#presetNameLoader').hide();
                    $('#saveActivitySettings').removeClass('disabled', true)

                }

            });

            $(document).on('click', '#saveActivitySettings', function () {
                var currentObj = $(this);
                $('#presetNameError').text('');
                $('#presetNameSuccess').text('');

                var instaUserId = $('#instaUserId').val();
                var presetNameObj = $('#presetName');
                var presetName = presetNameObj.val();

                if (parseInt(presetName.length) == 0) {
                    presetNameObj.focus();
                    return false;
                } else if (parseInt(presetName.length) < 6 || parseInt(presetName.length) > 32) {
                    var msg = (parseInt(presetName.length) < 6) ? 'The preset name must be at least 6 characters.' : 'The preset name may not be greater than 32 characters.';
                    $('#presetNameError').text(msg);
                    presetNameObj.focus();
                    return false;
                }


                if ((hashtags.length == 0) && (usernames.length == 0) && (locations.length == 0)) {
                    toastr.error('Add Alteast one hashtag or username or location');
                    $('#saveActivitySettingsModal').modal('hide');
                    return false;
                }

                $.ajax({
                    url: '/save/activity/settings',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        instaUserId: instaUserId,
                        presetName: presetName
                    },
                    beforeSend: function () {
                        $("#presetNameLoader").show();
                        currentObj.addClass('disabled', true)
                    },
                    complete: function () {
                        $('#presetNameLoader').hide();
                        currentObj.removeClass('disabled', true)
                    },
                    success: function (response) {
                        if (response.code == 200) {
                            toastr.options.progressBar = true;
                            toastr.success('Activity Setting saved successfully.');
//                            $('#presetNameSuccess').text('Activity Setting saved successfully.');
//                            setTimeout(function () {
                            $('#saveActivitySettingsModal').modal('hide')
//                            }, 3000);
                            getActivitySettingPreset();
                        } else {
                            var errorMessageHtml = '';
                            if (response.code == 422) {
                                if (typeof response.message == 'object') {
                                    $.each(response.message, function (key, value) {
                                        errorMessageHtml += value.msg + '<br>';
                                    })
                                }
                            } else {
                                if (typeof response.message == 'object') {
                                    $.each(response.message, function (key, value) {
                                        errorMessageHtml += value[0] + '<br>';
                                    })
                                } else {
                                    errorMessageHtml += response.message + '<br>';
                                }
                            }
                            $('#presetNameError').html(errorMessageHtml);

                        }
                    }
                })
            });


            $(document).on('click', '#loadPresetSettingsBtn', function (e) {
                var obj = $('#instaUserId option:selected');
                if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                    e.preventDefault();
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @" + obj.attr('data-username') + " Account has been disconnected from Instaffic System!!!</small>",
                        text: "<span>Go to Account Activation and Re-Connect this Account</span>",
                        html: true
                    });
                } else if (obj.attr('data-time_period_left') == 0) {
                    if (obj.attr('data-subscribe_type') == 'DU') {
                        e.preventDefault();
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Demo Subscription Period has been expired for this @" + obj.attr('data-username') + " account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> for Purchasing more Subscription Period</span>",
                            html: true
                        });
                    } else {
                        e.preventDefault();
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Subscription Package has been expired for this @" + obj.attr('data-username') + " account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> to upgrade your Subscription</span>",
                            html: true
                        });
                    }
                } else if (obj.attr('data-status') == 'I') {
                    e.preventDefault();
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @" + obj.attr('data-username') + " account is Inactive!!! Please active this account first</small>",
                        text: "<span>Click <a href='/user/dashboard'>here </a> to active this account</span>",
                        html: true
                    });
                } else {

                    $('#loadActivitySettingsModal').modal('show');

                    $('#loadActivitySettingsError').text('');
                    $('#loadActivitySettingsSuccess').text('');
                    $('#loadActivitySettingsLoader').hide();

                    $("#loadActSetModalFooter *").prop('disabled', false);

                    if (!isDataLoadSuccessfull) {
                        getActivitySettingPreset();
                    }
                }


            });

            $(document).on('click', '#loadPresetSettings', function () {

                $('#loadActivitySettingsSuccess').text('');
                $('#loadActivitySettingsError').text('');

                var instaUserId = $('#instaUserId').val();
                var selectOptionPresetOjb = $('#selectOptionPreset option:selected');
                var managerSettingsId = selectOptionPresetOjb.val();

                if (parseInt(managerSettingsId.length) == 0) {
                    $('#selectOptionPreset').focus();
                    return false;
                }

                bootbox.confirm({
                    message: "Do you really want to apply preset settings to current activity settings?",
                    size: 'small',
                    buttons: {
                        confirm: {
                            label: 'Yes',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'No',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {

                        if (result) {

                            $.ajax({
                                url: '/load/activity/settings/preset',
                                type: 'post',
                                dataType: 'json',
                                data: {manager_settings_id: managerSettingsId, instaUserId: [parseInt(instaUserId)]},
                                beforeSend: function () {
                                    $("#loadActivitySettingsLoader").show();
                                    $("#loadActSetModalFooter *").prop('disabled', true);
                                },
                                complete: function () {
                                    $('#loadActivitySettingsLoader').hide();
                                    $("#loadActSetModalFooter *").prop('disabled', false);
                                },
                                success: function (response) {
                                    if (response.code == 200) {

                                        $('#loadActivitySettingsModal').hide();
                                        toastr.success('Preset Activity Settings  loading... to current Activity settings');

                                        setTimeout(function () {

                                            if ($('#promotionType').val() == 'D')
                                                window.location.href = '/default/promotion/' + $('#instaUserId').val();
                                            else
                                                window.location.href = '/filter/promotion/' + $('#instaUserId').val();

                                        }, 3000);
                                    } else {

                                        var errorMessageHtml = '';
                                        if (response.code == 422) {
                                            if (typeof response.message == 'object') {
                                                $.each(response.message, function (key, value) {
                                                    errorMessageHtml += value.msg + '<br>';
                                                })
                                            }
                                        } else {
                                            if (typeof response.message == 'object') {
                                                $.each(response.message, function (key, value) {
                                                    errorMessageHtml += value + '<br>';
                                                })
                                            } else {
                                                errorMessageHtml += response.message + '<br>';
                                            }
                                        }
                                        $('#loadActivitySettingsError').html(errorMessageHtml);
                                    }
                                }
                            });
                        }
                    }
                });
            });


            $(document).on('click', '#deletePresetSettings', function () {

                $('#loadActivitySettingsSuccess').text('');
                $('#loadActivitySettingsError').text('');

                var selectOptionPresetOjb = $('#selectOptionPreset option:selected');
                var managerSettingsId = selectOptionPresetOjb.val();

                if (parseInt(managerSettingsId.length) == 0) {
                    $('#selectOptionPreset').focus();
                    return false;
                }

                bootbox.confirm({
                    message: "Do you really want to delete this preset activity settings?",
                    size: 'small',
                    buttons: {
                        confirm: {
                            label: 'Yes',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'No',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {

                        if (result) {

                            $.ajax({
                                url: '/delete/activity/settings/preset',
                                type: 'post',
                                dataType: 'json',
                                data: {manager_settings_id: managerSettingsId},
                                beforeSend: function () {
                                    $("#loadActivitySettingsLoader").show();
                                    $("#loadActSetModalFooter *").prop('disabled', true);
                                },
                                complete: function () {
                                    $('#loadActivitySettingsLoader').hide();
                                    $("#loadActSetModalFooter *").prop('disabled', false);
                                },
                                success: function (response) {
                                    if (response.code == 200) {
                                        selectOptionPresetOjb.remove();
//                                        $('#loadActivitySettingsSuccess').text('Activity Settings preset deleted successfully');

//                                        $('#loadActivitySettingsModal').hide();
                                        $('#loadActivitySettingsModal').modal('hide');
                                        toastr.success('Activity Settings preset deleted successfully');
                                    } else {
                                        var errorMessageHtml = '';
                                        if (response.code == 422) {
                                            if (typeof response.message == 'object') {
                                                $.each(response.message, function (key, value) {
                                                    errorMessageHtml += value.msg + '<br>';
                                                })
                                            }
                                        } else {
                                            if (typeof response.message == 'object') {
                                                $.each(response.message, function (key, value) {
                                                    errorMessageHtml += value[0] + '<br>';
                                                })
                                            } else {
                                                errorMessageHtml += response.message + '<br>';
                                            }
                                        }
                                        $('#loadActivitySettingsError').html(errorMessageHtml);

                                    }
                                }
                            });
                        }
                    }
                });
            });

            $(document).on('click', '#resetPresetSettings', function () {

                $('#loadActivitySettingsSuccess').text('');
                $('#loadActivitySettingsError').text('');

                var instaUserId = $('#instaUserId').val();

                $.ajax({
                    url: '/reset/activity/settings',
                    type: 'post',
                    dataType: 'json',
                    data: {instaUserId: instaUserId},
                    beforeSend: function () {
                        $("#loadActivitySettingsLoader").show();
                        $("#loadActSetModalFooter *").prop('disabled', true);
                    },
                    complete: function () {
                        $('#loadActivitySettingsLoader').hide();
                        $("#loadActSetModalFooter *").prop('disabled', false);
                    },
                    success: function (response) {
                        if (response.code == 200 && response.status == 'success') {
                            $('#loadActivitySettingsModal').hide();
                            toastr.success('Activity Settings reset to default settings successfully');
                            setTimeout(function () {
                                if ($('#promotionType').val() == 'D')
                                    window.location.href = '/default/promotion/' + $('#instaUserId').val();
                                else
                                    window.location.href = '/filter/promotion/' + $('#instaUserId').val();

                            }, 3000);
                        } else {

                            var errorMessageHtml = '';
                            if (response.code == 422) {
                                if (typeof response.message == 'object') {
                                    $.each(response.message, function (key, value) {
                                        errorMessageHtml += value.msg + '<br>';
                                    })
                                }
                            } else {
                                errorMessageHtml += response.message + '<br>';
                            }
                            $('#loadActivitySettingsError').html(errorMessageHtml);
                        }
                    }
                });
            });
        })
    </script>




    {{-------------FILTER PTOMOTION START/ STOP---------------}}
    <script>


        function sformat(s) {
            var fm = [
                Math.floor(s / 60 / 60 / 24), // DAYS
                Math.floor(s / 60 / 60) % 24, // HOURS
                Math.floor(s / 60) % 60, // MINUTES
                s % 60 // SECONDS
            ];
            return $.map(fm, function (v, i) {
                return ((v < 10) ? '0' : '') + v;
            }).join(':');
        }
        var timer, show_time;
        var appendClock = function () {
            $('.filter_timer').text(sformat(parseInt(show_time)));
            show_time++;
        };
        $(function () {
            clearInterval(timer);
            show_time = $('.filter_timer').attr('data-id');
            @if(isset($data['activityData']) && ($data['activityData']['filter_promotion_status']==1))
                    timer = setInterval(appendClock, 1000);
            @else
            $('.filter_timer').text(sformat(parseInt(show_time)));
            @endif


        });


        var updatePromotionStatusButton = function () {
            var currentObj = $('.filter_status_button');

            var currentStatus = currentObj.attr('data-id');
            var instaUserId = $('#instaUserId').val();

            var prevTime = $('.filter_timer').attr('data-id');
            $.ajax({
                url: '/change/filter/promotion/status',
                type: 'post',
                dataType: 'json',
                data: {
                    currentStatus: currentStatus,
                    instaUserId: instaUserId
                },
                beforeSend: function () {
                    clearInterval(timer);
                    $('.filter_timer').text('Processing...');
                    currentObj.css({
                        "opacity": "0.6",
                        "pointer-events": "none"
                    })
                    $("#loader").show();
                },
                complete: function () {
                    currentObj.css({
                        "opacity": "",
                        "pointer-events": ""
                    })

                },
                success: function (response) {
                    if (response.status == 'success') {
                        var appendData = '';
                        if (currentStatus == 0) {
                            toastr.success('Promotion Started Successfully');
                            appendData = 'Promotion - <a href="javascript:;" class="btn btn-success disable" style="width: 135px;">' +
                                    'Running <i class="fa fa-refresh fa-spin"></i> </a>' +
                                    '<span style="padding: 10px" class="filter_timer" data-id="' + (Math.floor(Date.now() / 1000) - response.data.filter_promotion_start_time) + '">00:00:00:00</span>' +
                                    ' <a href="javascript:;" title="click to stop activity" ' +
                                    'class="btn btn-danger filter_status_button" style="width: 135px" data-id="1">Stop ' +
                                    '<i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a>';

                            $('.start_stop').html(appendData);
                            show_time = 1;
                            timer = setInterval(appendClock, 1000);


                            var promotionStatusMessage = $('#promotionStatusMessage');

                            if (!promotionStatusMessage.checkEmpty()) {
                                promotionStatusMessage.empty();
                            }
                            $('#overviewAccountStatus').text('Activated');


                        } else {
                            toastr.success('Promotion Stopped Successfully');
                            appendData = 'Promotion - <a href="javascript:;" title="click to start activity" ' +
                                    'class="btn btn-success filter_status_button" style="width: 135px" data-id="0">' +
                                    'Start <i class="fa fa-play"></i> </a> ' +
                                    ' <span style="padding: 10px" class="filter_timer" data-id="' + (response.data.filter_promotion_stop_time - response.data.filter_promotion_start_time) + '">' +
                                    '' + (sformat(parseInt(response.data.filter_promotion_stop_time - response.data.filter_promotion_start_time))) + '</span>' +
                                    '<a href="javascript:;" class="btn btn-danger disable" style="width: 135px;">' +
                                    'Stopped<i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a> ';
                            $('.start_stop').html(appendData);

                        }
                    }
                    else {
                        $('.filter_timer').text(sformat(parseInt(prevTime)));
                        toastr.error(response.message);
                    }


                },
                error: function (error) {
                    toastr.error('Unexpected network error has occured.')
                }

            });
        }

        $(document).ready(function () {
            $(document.body).on('click', '.filter_status_button', function () {
                updatePromotionStatusButton();
            })
        });
    </script>




    <!--For Profile Tab-->
    <script>
        $(document).ready(function () {

//            console.log('$(document).scrollTop(): ', $(document).scrollTop()); //bar top
//            console.log('$(document).height(): ', $(document).height()); //html height
//            console.log('$(window).scrollTop(): ', $(window).scrollTop()); //bar top
//            console.log('$(window).height(): ', $(window).height());  //brower view page height


            var i = 0;
            var instaUserId;
            var media_after;
            var InstaUsername;
            var j = 0;

            $(document).scroll(function () {
                if ($('#Activity-id4').hasClass('active')) {
                    if ($(window).scrollTop() >= $(document).height() - $(window).height() - 500) {
                        if (j == 0) {
                            $.ajax({
                                url: '/user/mediaPaginationDetails',
                                method: 'post',
                                dataType: 'json',
                                data: {
                                    "InstaUsername": InstaUsername,
                                    "instaUserId": instaUserId,
                                    "media_after": media_after,
                                },
                                success: function (response) {
                                    if (response.status == 'success' && response.code == 200) {
                                        var ajaxData = response.data;
                                        i++;
                                        var paginationDetails = ajaxData.data.user;
                                        media_after = paginationDetails[0].media_pagination_details.end_cursor;
                                        var has_next_page = paginationDetails[0].media_pagination_details.has_next_page;
                                        if (!has_next_page) {
                                            j++;
                                            $(".mediaPagination").hide();
                                            return true;
                                        }

                                        $.each(ajaxData.data.media, function (index, value) {
                                            var likes_count = value.likes_count;
                                            var comments_count = value.comments_count;
                                            var display_src = value.display_src;
                                            var caption = value.caption;

                                            var htmlData = '<div class="col-lg-3" style="margin-bottom: 5px;"> <div class="cuadro_intro_hover" style="background-color:#cccccc;">' +
                                                    '<p style="text-align:center;"><img src="' + display_src + '" style="width:100%;" class="img-responsive" alt=""> </p> ' +
                                                    '<div class="caption"> <div class="blur"></div> ' +
                                                    '<div class="caption-text"> ';


                                            htmlData += '<div class="hgt-fx"><a class=" btn btn-default" style="cursor:default"><span class="glyphicon glyphicon-heart">' + likes_count + '</span></a> ' +
                                                    '<a class=" btn btn-default" style="cursor:default"><span class="glyphicon glyphicon-comment">' + comments_count + '</span></a> ' +
                                                    '</div></div> </div> </div> </div>';

                                            $(".includePagination").append(htmlData)
                                        });

                                        j = 0;

                                    } else if (response.status == 'fail' && response.code == 400) {

                                        console.log('failed to load pagination media');
                                        $(".mediaPagination").hide();
                                    } else {
                                        console.log('some error has occured');
                                        $(".mediaPagination").hide();
                                    }

                                },
                                error: function (err) {
                                    $(".mediaPagination").hide();
                                    console.log('failed---->')
                                    console.log(err)

                                }

                            })
                        }
                        j++;

//                    console.log('-------more than 80%---------')
//                    console.log('$(window).scrollTop() >= $(document).height() - $(window).height() - 700')

                    }
                }
            })
            if (i == 0) {

                instaUserId = $('#hiddenclass3').attr("value");
                media_after = $('#hiddenclass1').attr("value");
                InstaUsername = $('#hiddenclass2').attr("value");

            }
//            console.log('loading more data')
        })
    </script>


@endsection

