@extends('User::layouts.bodyLayout')

@section('headcontent')
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/user/css/sweetalert.css">

    <style>


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

        div.panel {
            padding: 0 18px;
            background-color: #EFF3F8;
            max-height: 0;
            overflow: hidden;
            transition: 0.6s ease-in-out;
            opacity: 0;
            padding-top: 15px;
        }

        div.panel.show {
            opacity: 1;
            max-height: 500px;
        }

        .close {
            padding-bottom: 8px;
            padding-top: 12px;
        }

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

        textarea {
            border-radius: 5px !important;
        }

        textarea:focus, textarea:hover {
            border: skyblue 1px solid !important;
            box-shadow: 0 0px 5px skyblue !important;
            border-radius: 5px;
        }

        .fs {
            font-size: 18px;
        }

        .brkword {
            word-break: break-all;
        }

        .imgpad {
            padding-left: 0;
            padding-right: 0;
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
        .row.promotion-default-button{
            margin-bottom: -25px;
            padding: 0px 15px;
        }
        .disable{
            background: #fff !important;
            color:#5d6b7a !important;
            border:1px solid #ccc !important;
            cursor: not-allowed !important;
        }
    </style>
@endsection

@section('active_profilePromotion','active')
@section('content')

    <!-- END HEADER -->

    <!-- BEGIN PAGE CONTENT -->

    <div class="page-content">
        <div class="container">

            <div class="row">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs fa-2x font-green-sharp" aria-hidden="true"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Default Promotion Management</span>
                            <span class="caption-helper"> </span>
                        </div>
                    </div>

                    <div class="portlet-body">

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

                        @if(isset($data['selectedInstaDetails']))
                            @if($data['selectedInstaDetails']['subscribe_type']=='DU' && $data['selectedInstaDetails']['time_period_left']==0)
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

                            @elseif($data['selectedInstaDetails']['has_account_locked']=='T' || $data['selectedInstaDetails']['is_user_disconnected']=='Y' || $data['selectedInstaDetails']['is_logged_in']=='N')
                                <div class="alert alert-danger display-hide" style="display: block;">
                                    <button class="close" data-close="alert"></button>
                                    <p>Your Account has been disconnected from Instaffic System. </p>
                                    <span>Go to Account Activation  and Re-Connect your Account</span>
                                </div>
                            @endif
                        @endif
                    <!--Instagram User List-->
                        <div class="row stat">
                            <div class="col-md-6">
                                <div class="col-md-4" style="padding-top: 5px; color: rgb(255, 255, 255);">User Name
                                </div>
                                <div class=" col-md-8">

                                    <select name="instaUserId" id="instaUserId"
                                            data-value="{{$data['selectedInstaDetails']['ins_user_id']}}"
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
                                                        data-subscribe_type="{{$value['subscribe_type']}}">
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
                                    <select class="form-control" style="border:1px solid #7d888e; border-radius:5px;"
                                            id="promotionType">
                                        <option value="D" <?php if ($data['selectedPromotionType'] == 'D') echo "selected"; ?> >
                                            Default
                                        </option>
                                        <option value="F" <?php if ($data['selectedPromotionType'] == 'F') echo "selected"; ?> >
                                            Filteration
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>

                        <!--Profile Management Activity Details-->
                        <div class="activity-log-stat-profile">
                            <div class="row stat">
                                <div class="col-sm-5" style="padding: 0px;">
                                    <a href="https://www.instagram.com/{{$data['selectedInstaDetails']['username']}}"
                                       target="_blank">
                                        <img src="{{$data['selectedInstaDetails']['profile_pic_url']}}"
                                             class="img-circle brdsld">
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
                                               href="#javascript:;"><span>Statistics</span></a>
                                        </li>
                                        <li><a class="navigate-tab" id="profilePromotion" href="#javascript:;"><span>Profile</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <br>

                        </div>

                        {{--Activity Tab--}}
                        <div class="activity on-off" style="padding-bottom: 50px;">
                            {{--DEFAULT PROMOTION START/ STOP--}}
                            <div class="row promotion-filter-button">
                                <div class="panel panel-body"
                                     style="opacity:1; max-height: auto; padding: 9px 15px; overflow: visible; min-height: 55px;">

                                                <span class="uppercase bold start_stop">Promotion -

                                                    @if($data['activityData']['status'] == '0')
                                                        <a href="javascript:;"  class="btn btn-success disable" style="width: 135px;">Running <i class="fa fa-refresh fa-spin"></i> </a>
                                                        <span style="padding: 10px" class="default_timer" data-id="{{time()-$data['activityData']['default_promotion_start_time']}}">00:00:00:00

                                                        </span>
                                                        <a href="javascript:;"  title="click to stop activity" class="btn btn-danger default_status_button" style="width: 135px" data-id="0">Stop <i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a>


                                                    @else

                                                        <a href="javascript:;"  title="click to start activity" class="btn btn-success default_status_button" style="width: 135px" data-id="1">Start <i class="fa fa-play"></i> </a>
                                                        <span style="padding: 10px" class="default_timer" data-id=" {{$data['activityData']['default_promotion_stop_time']-$data['activityData']['default_promotion_start_time']}}">
                                                        </span>
                                                        <a href="javascript:;"  class="btn btn-danger disable" style="width: 135px;">Stopped<i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a>

                                                    @endif
                                                </span>



                                </div>
                            </div>
                            <br>
                            <button class="accordion" style="height: 75px;">
                                <img class="img-responsive;" width="38"
                                     src="/assets/user/user-panel/img/funnel.png"/>
                                <b style="margin-left:8px;">DEFAULT FILTERS SETTINGS TAGS</b>
                                <h5 style="margin-left: 50px; margin-top: -8px;color:#767676;">
                                    Expose me to all people based on gender filters</h5>
                            </button>
                            <div class="panel pnl_bg">
                                <div class="col-md-12 col-sm-12" style="padding:45px 10px 30px 10px;">
                                    <div class="row">

                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="col-md-5" style="padding-top: 10px;">Gender Filter</div>
                                            <div class=" col-md-5">
                                                <select class="form-control"
                                                        style="border:1px solid #7d888e; border-radius:5px;"
                                                        id="genderType" onchange="saveFilterSetting();">
                                                    <option value="3" <?php if ($data['activityData']['gender'] == 3) echo "selected"; ?> >
                                                        Both
                                                    </option>
                                                    <option value="1" <?php if ($data['activityData']['gender'] == 1) echo "selected"; ?> >
                                                        Male
                                                    </option>
                                                    <option value="2" <?php if ($data['activityData']['gender'] == 2) echo "selected"; ?> >
                                                        Female
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                </div>
                            </div>

                        </div>

                        {{--Log Details Tab--}}
                        <div class="log on-off " style="padding: 0px; display: none;">

                            <div class="activity-log-stat-profile">
                                <div class="row  col-sm-12 switch-on-off">
                                    <br>
                                    <ul class="likes">
                                        <li class="active mleft" id="allCount" style="margin-left:0px;">
                                            <a href="#tab1" data-toggle="tab"><span>All &nbsp;(<span
                                                            id="logAllCount"></span>)</span> </a>
                                        </li>

                                        <li class="mleft" id="likesCount">
                                            <a href="#tab2" data-toggle="tab"><span>Likes &nbsp;(<span
                                                            id="logLikesCount"></span>)</span> </a>
                                        </li>

                                        <li class="mleft" id="followedCount">
                                            <a href="#tab3" data-toggle="tab"><span>Follow &nbsp;(<span
                                                            id="logFollowsCount"></span>)</span> </a>
                                        </li>

                                        <li class="mleft" id="unfollowedCount">
                                            <a href="#tab4" data-toggle="tab"><span>Unfollow &nbsp;(<span
                                                            id="logUnfollowsCount"></span>)</span> </a>
                                        </li>

                                        <li class="mleft" id="folowersCount">
                                            <a href="#tab5" data-toggle="tab"><span>Follower &nbsp;(<span
                                                            id="logFollowersCount"></span>)</span> </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                            <div class="row programme-log-settings">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="tab-content">
                                            <!-- All Log details -->
                                            <div class="tab-pane fade in active pull-left" id="tab1" animated bounceIn>
                                                <div class="container" id="showAllLogs"></div>
                                            </div>

                                            <!-- Liks Log details -->
                                            <div class="tab-pane fade in  pull-left" id="tab2">
                                                <div class="container" id="showLikesLogs"></div>
                                            </div>

                                            <!-- Follow Log details -->
                                            <div class="tab-pane fade in  pull-left" id="tab3">
                                                <div class="container" id="showFollowsLogs"></div>
                                            </div>

                                            <!-- Unfollow Log details -->
                                            <div class="tab-pane fade in  pull-left" id="tab4">
                                                <div class="container" id="showUnfollowsLogs"></div>
                                            </div>

                                            <!-- Followers Log details -->
                                            <div class="tab-pane fade in  pull-left" id="tab5" animated fadeInRight>
                                                <div class="container" id="showFollowersLogs"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-12" style="text-align: center;margin-top: 30px">
                                        <input type="button" style="display: none;" class="btn btn-success"
                                               id="loadMoreBtn"
                                               value="Load More">

                                        <div id='loader' style='display: none; position:unset'>
                                            <img src='/assets/user/images/ajax-loader.gif' width='85px' height='85px'>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{--Stat Details Tab--}}
                        <div class="stats on-off " style="padding: 0px; display: none;">
                            <div class="row Programme-stat">
                                <div class="row">
                                    <h4><br><br></h4>
                                </div>

                                <div class="">
                                    {{--likes--}}
                                    <div class="col-md-2 smpadng">
                                        <div class="card-base">
                                            <div class="card-icon">
                                                <a href="javascript:;" title="Likers" id="widgetCardIcon"
                                                   class="imagecard" style="cursor:default;">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                </a>
                                                <div class="card-data1 widgetCardData">
                                                    <h2 class="box-title">{{$data['statData']['totalLiked']}}</h2>
                                                    <p class="card-block text-center">
                                                        Total Like actions
                                                    </p>
                                                    <a href="javascript:;" id="viewMoreLikers"
                                                       class="anchor btn btn-default">
                                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                         View More
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="space"></div>
                                        </div>
                                    </div>
                                    {{--following--}}
                                    <div class="col-md-2 smpadng">
                                        <div class="card-base">
                                            <div class="card-icon">
                                                <a href="javascript:;" title="Following" id="widgetCardIcon"
                                                   class="imagecard" style="cursor:default;">
                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                </a>
                                                <div class="card-data1 widgetCardData">
                                                    <h2 class="box-title">{{$data['statData']['totalFollowed']}}</h2>
                                                    <p class="card-block text-center">
                                                        Total Following actions</p>
                                                    <a href="javascript:;" id="viewMoreFollowings"
                                                       class="anchor btn btn-default">
                                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                        View More
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
                                                    <h2 class="box-title">{{$data['statData']['totalUnfollowed']}}</h2>
                                                    <p class="card-block text-center">
                                                        Total Unfollow actions</p>
                                                    <a href="javascript:;" id="viewMoreUnFollowers"
                                                       class="anchor btn btn-default">
                                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                        View More
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
                                                    <h2 class="box-title">{{$data['statData']['totalFollowers']}}</h2>
                                                    <p class="card-block text-center">
                                                        Total Followers gained</p>
                                                    <a href="javascript:;" id="viewMoreFollowers"
                                                       class="anchor btn btn-default">
                                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                        View More
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
                                                    <h2 class="box-title">{{$data['statData']['totalTimeUsed']}}</h2>
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
                                                <a href="javascript:;" title="Time period left" id="widgetCardIcon"
                                                   class="imagecard" style="cursor:default;">
                                                    <i class="fa fa-stack-overflow" aria-hidden="true"></i>
                                                </a>
                                                <div class="card-data1 widgetCardData">
                                                    <h2 class="box-title">{{$data['statData']['totalTimeLeft']}}</h2>
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


                        <div class="profile on-off row " style="padding: 0px; display: none;">

                            <div class="activity-log-stat-profile">


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


                            <div class="container programme-log-card">
                                <br>
                                <div class="row includePagination">

                                    @if(isset($data['profileData']['media']))

                                        @foreach($data['profileData']['media'] as $key)
                                            <div class="col-lg-3" style="margin-bottom: 20px;">
                                                <div class="cuadro_intro_hover " style="background-color:#cccccc;">
                                                    <p style="text-align:center;">
                                                        <img src="{{$key['display_src'] or 'http://static.tumblr.com/166ab215c9a0bb3ba1b98e810652c3db/pjmcbps/OHEmr2kqz/tumblr_static_dsc_0298lol.jpg'}}"
                                                             class="img-responsive" alt="" style="width:100%;">
                                                    </p>
                                                    <div class="caption">
                                                        <div class="blur"></div>
                                                        <div class="caption-text">
                                                            <h3 style="border-top:1px solid white; border-bottom:1px solid white; padding:10px;">
                                                                Details</h3>
                                                            <a href="https://www.instagram.com/p/{{$key['code']}}"
                                                               target="_blank" class="btn btn-default"
                                                               style="background-color: #33CAC2;color: white;"><span
                                                                        class=""> View more</span></a><br><br>
                                                            <a class=" btn btn-default" style="cursor: default"><span
                                                                        class="glyphicon glyphicon-heart"> {{$key['likes_count'] or 0}}</span></a>
                                                            <a class=" btn btn-default" style="cursor: default"><span
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
            </div>
        </div>
    </div>



@endsection


@section('pagejavascripts')

    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>
    <script src="/assets/user/js/moment.js"></script>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function () {
                this.classList.toggle("active");
                this.nextElementSibling.classList.toggle("show");
            }
        }


    </script>



    <script>

        var prefix = function (value) {
            return (value > 1) ? 's' : '';
        }
        function convertDateTimeFormat(unixTimeStamp) {
            var sec = moment().unix() - unixTimeStamp;
            var daysInMonth = moment().subtract('month', 1).daysInMonth();

            var fm = [
                Math.floor(sec / 60 / 60 / 24 / daysInMonth / 12),
                Math.floor(sec / 60 / 60 / 24 / daysInMonth) % 12,// MONTHS
                Math.floor(sec / 60 / 60 / 24) % daysInMonth, // DAYS
                Math.floor(sec / 60 / 60) % 24,// HOURS
                Math.floor(sec / 60) % 60, // MINUTES
                sec % 60 // SECONDS
            ];

            if (fm[0] > 0)  return fm[0] + ' Year' + prefix(fm[0]) + ' Ago';
            else if (fm[1] > 0)  return fm[1] + ' Month' + prefix(fm[0]) + ' Ago';
            else if (fm[2] > 0)  return fm[2] + ' Day' + prefix(fm[2]) + ' Ago';
            else if (fm[3] > 0)  return fm[3] + ' Hour' + prefix(fm[3]) + ' Ago';
            else if (fm[4] > 0)  return fm[4] + ' Minute' + prefix(fm[4]) + ' Ago';
            else if (fm[5] > 0)  return fm[5] + ' Second' + prefix(fm[5]) + ' Ago';

        }


        var Pagination = {
            hasMoreData: false,
            limit: 16,
            next_max_id: null
        };

        var loadLogDetails = function () {

            $.ajax({
                url: '/default/promotion/get/logs',
                method: 'post',
                dataType: 'json',
                data: {
                    insUserId: instaUserId,
                    pagination: {
                        next_max_id: Pagination.next_max_id,
                        limit: Pagination.limit
                    }
                },

                beforeSend: function () {
                    $("#loader").show();
                },
                complete: function () {
                    $('#loader').hide();
                },
                success: function (response) {
                    if (response.status == 'success') {

                        var logAllHtml = '', logLikesHtml = '', logFollowsHtml = '', logUnfollowsHtml = '', logFollowersHtml = '';
                        var logAllCount = response.data.log_stat.totalRecord, logLikesCount = response.data.log_stat.likes_count;
                        var logFollowsCount = response.data.log_stat.followed_count, logUnfollowsCount = response.data.log_stat.unfollowed_count;
                        var logFollowersCount = response.data.log_stat.followers_count;

//                        $('#loadMoreBtn').hide();
//                            $('#loader').hide();


                        if (logAllCount > 0) {
                            //1=likes;2=follows;3=unfollow;4=followers,5=comments
                            $.each(response.data.logs, function (key, value) {

                                if (value['service_type'] == 1) { //likes

                                    logLikesHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"  style="height: 200px" alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Media liked &nbsp;&nbsp;&nbsp;<i class="fa fa-heart-o fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>' + value['media_code'] + '</b></h2> ' +
                                            '<p> <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/p/' + value['media_code'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                    logAllHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174  red col-md-4 imgpad" > <img src="' + value['picture_url'] + '"  style="height: 200px" alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Media liked &nbsp;&nbsp;&nbsp;<i class="fa fa-heart-o fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>' + value['media_code'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/p/' + value['media_code'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                }
                                else if (value['service_type'] == 2) {//follows

                                    logFollowsHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '" style="height: 200px"  alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                    logAllHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '" style="height: 200px"  alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                }
                                else if (value['service_type'] == 3) { //unfollows

                                    logUnfollowsHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '" style="height: 200px"  alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Unfollowed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user-times fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p >  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                    logAllHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"  style="height: 200px" alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Unfollowed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user-times fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword" ><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';


                                }
                                else if (value['service_type'] == 4) {//followers
                                    logFollowersHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '" style="height: 200px"  alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followers &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                    logAllHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"  style="height: 200px" alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followers &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p> <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                }

                            });
                        }

                        var showAllLogs = $('#showAllLogs'), showLikesLogs = $('#showLikesLogs'), showFollowsLogs = $('#showFollowsLogs');
                        var showUnfollowsLogs = $('#showUnfollowsLogs'), showFollowersLogs = $('#showFollowersLogs');

                        (logAllCount != 0) ? showAllLogs.html(logAllHtml) : showAllLogs.html('<div><h3 style="margin-left: 40%">No Recent Activity Found !!!</h3></div>');
                        (logLikesCount != 0) ? showLikesLogs.html(logLikesHtml) : showLikesLogs.html('<div><h3 style="margin-left: 40%">No Recent Likes Activity Found !!!</h3></div>');
                        (logFollowsCount != 0) ? showFollowsLogs.html(logFollowsHtml) : showFollowsLogs.html('<div><h3 style="margin-left: 40%">No Recent Follows Activity Found !!!</h3></div>');
                        (logUnfollowsCount != 0) ? showUnfollowsLogs.html(logUnfollowsHtml) : showUnfollowsLogs.html('<div><h3 style="margin-left: 40%">No Recent Unfollows Activity Found !!!</h3></div>');
                        (logFollowersCount != 0) ? showFollowersLogs.html(logFollowersHtml) : showFollowersLogs.html('<div><h3 style="margin-left: 40%">No Recent Followers Activity Found !!!</h3></div>');


                        if (response.data.pagination.has_more_data) {
                            Pagination.hasMoreData = true;
                            Pagination.next_max_id = response.data.pagination.next_max_id;
                            $('#loadMoreBtn').show();
                        } else {
                            Pagination.hasMoreData = false;
                            Pagination.next_max_id = null;
                            $('#loadMoreBtn').hide();
                            $('#loader').hide();
                        }

                        $('#logAllCount').text(logAllCount);
                        $('#logLikesCount').text(logLikesCount);
                        $('#logFollowsCount').text(logFollowsCount);
                        $('#logUnfollowsCount').text(logUnfollowsCount);
                        $('#logFollowersCount').text(logFollowersCount);
                    } else {
                        toastr.error('Error in serive!!! Please try again after sometime')
                    }
                },
                error: function (error) {
                    console.log(error);
                    toastr.error('Error in Network!!! Please try again after sometime')
                }
            });
        }


        var processingAjax = false;
        var loadMoreLogDetails = function () {
            processingAjax = true;
            $.ajax({
                url: '/default/promotion/get/logs',
                method: 'post',
                dataType: 'json',
                data: {
                    insUserId: instaUserId,
                    pagination: {
                        next_max_id: Pagination.next_max_id,
                        limit: Pagination.limit
                    }
                },

                beforeSend: function () {
                    $("#loader").show();
                },
                complete: function () {
                    $('#loader').hide();
                },
                success: function (response) {
                    if (response.status == 'success') {

                        var logAllHtml = '', logLikesHtml = '', logFollowsHtml = '', logUnfollowsHtml = '', logFollowersHtml = '';

                        if (response.data.pagination.result_size > 0) {
                            //1=likes;2=follows;3=unfollow;4=followers,5=comments
                            $.each(response.data.logs, function (key, value) {

                                if (value['service_type'] == 1) { //likes

                                    logLikesHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"  style="height: 200px" alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Media liked &nbsp;&nbsp;&nbsp;<i class="fa fa-heart-o fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>' + value['media_code'] + '</b></h2> ' +
                                            '<p> <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/p/' + value['media_code'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                    logAllHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174  red col-md-4 imgpad" > <img src="' + value['picture_url'] + '"  style="height: 200px" alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Media liked &nbsp;&nbsp;&nbsp;<i class="fa fa-heart-o fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>' + value['media_code'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/p/' + value['media_code'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                }
                                else if (value['service_type'] == 2) {//follows

                                    logFollowsHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '" style="height: 200px"  alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                    logAllHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '" style="height: 200px"  alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                }
                                else if (value['service_type'] == 3) { //unfollows

                                    logUnfollowsHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '" style="height: 200px"  alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Unfollowed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user-times fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p >  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                    logAllHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"  style="height: 200px" alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Unfollowed User &nbsp;&nbsp;&nbsp;<i class="fa fa-user-times fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword" ><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';


                                }
                                else if (value['service_type'] == 4) {//followers
                                    logFollowersHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '" style="height: 200px"  alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followers &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p>  <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                    logAllHtml += '<div class="col-md-3"> ' +
                                            '<figure class="snip1174 red col-md-4 imgpad"> <img src="' + value['picture_url'] + '"  style="height: 200px" alt="sq-sample33" class="img-responsive" width="100%"/>' +
                                            '<figcaption><p class="fs"><b>Followers &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus fa-2x"  aria-hidden="true"></i></b></p>' +
                                            '<h2 class="brkword"><b>@' + value['username'] + '</b></h2> ' +
                                            '<p> <b>' + convertDateTimeFormat(value['created_at']) + '</b> </p>   <a href="https://www.instagram.com/' + value['username'] + '" target="_blank">View more</a></figcaption></figure></div>';

                                }

                            });
                        }

                        $('#showAllLogs').append(logAllHtml);
                        $('#showLikesLogs').append(logLikesHtml);
                        $('#showFollowsLogs').append(logFollowsHtml);
                        $('#showUnfollowsLogs').append(logUnfollowsHtml);
                        $('#showFollowersLogs').append(logFollowersHtml);

                        if (response.data.pagination.has_more_data) {
                            Pagination.hasMoreData = true;
                            Pagination.next_max_id = response.data.pagination.next_max_id;
                        } else {
                            Pagination.hasMoreData = false;
                            Pagination.next_max_id = null;
                            $('#loader').hide();
                        }
                    } else {
                        toastr.error('Error in serive!!! Please try again after sometime')
                    }
                    processingAjax = false;
                },
                error: function (error) {
                    console.log(error);
                    toastr.error('Error in Network!!! Please try again after sometime')
                }
            });
        }


        var loadMore = false;
        $(document.body).on('click', '#loadMoreBtn', function (e) {
            e.preventDefault();

            $(this).val('Loading...');

            if (Pagination.hasMoreData) {
                $(this).hide();
                loadMore = true;
                loadMoreLogDetails();
            }
        })

        $(document).scroll(function () {
            if (loadMore) {
                if ($('#logPromotion').hasClass('active')) {
                    if (!processingAjax) {
                        if (Pagination.hasMoreData) {
                            if ($(window).scrollTop() >= (($(document).height() - $(window).height() - 300))) {
                                $('#loader').show();
                                loadMoreLogDetails();
                            }
                        }
                    }
                }
            }
        });


        var refreshAndLoadLogDetails = function () {
            Pagination.hasMoreData = false;
            Pagination.limit = 16;
            Pagination.next_max_id = null;
            loadMore = false;
            $('#loadMoreBtn').val('Load More');
            loadLogDetails();
        }
    </script>
    <script>

        $(document).ready(function () {

            $(document.body).on('click', '#viewMoreLikers', function (e) {
                e.preventDefault();
                $("#logPromotion").trigger("click");
                $('mleft').removeClass('active');
                $('#likesCount').find('a').trigger("click");
            })
            $(document.body).on('click', '#viewMoreFollowings', function (e) {
                e.preventDefault();
                $("#logPromotion").trigger("click");
                $('mleft').removeClass('active');
                $('#followedCount').find('a').trigger("click");

            })
            $(document.body).on('click', '#viewMoreFollowers', function (e) {
                e.preventDefault();
                $("#logPromotion").trigger("click");
                $('mleft').removeClass('active');
                $('#folowersCount').find('a').trigger("click");
            })
            $(document.body).on('click', '#viewMoreUnFollowers', function (e) {
                e.preventDefault();
                $("#logPromotion").trigger("click");
                $('mleft').removeClass('active');
                $('#unfollowedCount').find('a').trigger("click");
            })


            $(document.body).on('change', '#instaUserId', function (e) {
                e.preventDefault();
                if ($('#promotionType').val() == 'D')
                    window.location.href = '/default/promotion/' + $(this).val();
                else
//                    window.location.href = '/user/profilePromotion/' + $(this).val();
                    window.location.href = '/filter/promotion/' + $(this).val();
            })

            $(document.body).on('change', '#promotionType', function (e) {
                e.preventDefault();
                if ($(this).val() == 'D')
                    window.location.href = '/default/promotion/' + $('#instaUserId').val();
                else
//                    window.location.href = '/user/profilePromotion/' + $('#instaUserId').val();
                    window.location.href = '/filter/promotion/' + $('#instaUserId').val();
            })


            var toggleSwitch = function (switchIndex) {
                $("div.on-off").hide();
                $($("div.on-off")[switchIndex]).show();
            }
            $(document.body).on('click', '#activityPromotion', function (e) {
                e.preventDefault();
                $(".navigate-tab").removeClass('active');
                $(this).addClass('active');
                toggleSwitch(0);
            })
            $(document.body).on('click', '#logPromotion', function (e) {
                e.preventDefault();
                $(".navigate-tab").removeClass('active');
                $(this).addClass('active');
                toggleSwitch(1);
                refreshAndLoadLogDetails();
            })
            $(document.body).on('click', '#statPromotion', function (e) {
                e.preventDefault();
                $(".navigate-tab").removeClass('active');
                $(this).addClass('active');
                $('#log').css('display', 'block');
                toggleSwitch(2);
            })
            $(document.body).on('click', '#profilePromotion', function (e) {
                e.preventDefault();
                $(".navigate-tab").removeClass('active');
                $(this).addClass('active');
                toggleSwitch(3);
            })
        });

        var instaUserId = $("#instaUserId").attr('data-value');
        toastr.options = {
            timeOut: 1000,
            fadeOut: 10,
            positionClass: "toast-top-center",
            hideEasing: 'swing',
            preventDuplicates: true
        };


        var saveFilterSetting = function (data) {
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


            var genderType = $('#genderType option:selected').val();
//            var status = $("input[class='status']:checked").val()


            $.ajax({
                url: '/default/promotion/save/settings',
                method: 'post',
                dataType: 'json',
//                data: {insUserId: instaUserId, genderType: genderType, status: status},
                data: {insUserId: instaUserId, genderType: genderType},

                success: function (response) {

                    console.log(response);
                    console.log(response.status);

                    if (response.status == 'success')
                        toastr.success('Settings Saved successfully');
                    else
                        toastr.error(response.message);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>


    {{--For Profile Tab--}}
    <script>
        var ProfilePagination = {
            hasMoreData: false,
            media_after: null
        };

        var ProfileInstaUsername = null;
        var ProfileInstaUserId = null;
        var ProfileloadMore = false;
        var ProfileProcessingAjax = false;

        $(document).ready(function () {

            var isDataPresent = ('<?php echo (isset($data['profileData']['user'][0]['media_pagination_details']['has_next_page']) && $data['profileData']['user'][0]['media_pagination_details']['has_next_page'] == true) ? 1 : 0?>');

            if (parseInt(isDataPresent)==1) {
                ProfileInstaUserId = '<?php if (isset($data['profileData']['user'][0]['id'])) echo($data['profileData']['user'][0]['id']); ?>' || null;
                ProfileInstaUsername = '<?php if (isset($data['profileData']['user'][0]['username'])) echo($data['profileData']['user'][0]['username']); ?>' || null;
                ProfilePagination['hasMoreData'] = true;
                ProfilePagination['media_after'] = '<?php echo(isset($data['profileData']['media_after']) ? $data['profileData']['media_after'] : "") ?>';
            }

            if (ProfilePagination.hasMoreData) {
                $('#ProfileLoadMoreBtn').show();
            } else {
                $('#ProfileLoadMoreBtn').hide();
            }

            var loadMoreProfileDetails = function () {
                ProfileProcessingAjax = true;
                $.ajax({
                    url: '/user/mediaPaginationDetails',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        "InstaUsername": ProfileInstaUsername,
                        "instaUserId": ProfileInstaUserId,
                        "media_after": ProfilePagination.media_after
                    },
                    beforeSend: function () {
                        $("#profile_loader").show();
                    },
                    complete: function () {
                        $('#profile_loader').hide();
                    },
                    success: function (response) {
                        console.log(response);

                        if(response.status=='success'){
                            if(response.data.media.length>0){
                                $.each(response.data.media, function (index, value) {
                                    var htmlData = '<div class="col-lg-3" style="margin-bottom: 20px;"> <div class="cuadro_intro_hover" style="background-color:#cccccc;">' +
                                            '<p style="text-align:center;"><img src="' + value.display_src + '" style="width:100%;" class="img-responsive" alt=""> </p> ' +
                                            '<div class="caption"> <div class="blur"></div> ' +
                                            '<div class="caption-text"> ' +
                                            '<h3 style="border-top:1px solid white; border-bottom:1px solid white; padding:10px;"> Details</h3>'+
                                            '<a href="https://www.instagram.com/p/' + value.code + '" target="_blank" class="btn btn-default" style="background-color: #33CAC2;color: white;">'+
                                            '<span class=""> View more</span></a><br><br>' +
                                            '<a class=" btn btn-default" style="cursor: default"><span class="glyphicon glyphicon-heart">' + value.likes_count + '</span></a> ' +
                                            '<a class=" btn btn-default" style="cursor: default"><span class="glyphicon glyphicon-comment">' + value.comments_count + '</span></a> ' +
                                            '</div> </div> </div> </div>';

                                    $(".includePagination").append(htmlData)
                                });
                            }

                            if (response.data.user[0].media_pagination_details.has_next_page) {
                                ProfilePagination.hasMoreData = true;
                                ProfilePagination.media_after = response.data.user[0].media_pagination_details.end_cursor;
                                $('#profile_loader').show();
                            }else{
                                ProfilePagination.hasMoreData = false;
                                $('#profile_loader').hide();
                            }

                            ProfileProcessingAjax = false;
                        }else {
                            toastr.error('Error in serive!!! Please try again after sometime')
                        }
                    },
                    error: function (error) {
                        console.log(error);
                        toastr.error('Error in Network!!! Please try again after sometime')
                    }
                });
            }

            $(document.body).on('click', '#ProfileLoadMoreBtn', function (e) {
                e.preventDefault();

                $(this).val('Loading...');

                if (ProfilePagination.hasMoreData) {
                    $(this).hide();
                    ProfileloadMore = true;
                    loadMoreProfileDetails();
                }
            })

            $(document).scroll(function () {
                if (ProfileloadMore) {

                    if (!ProfileProcessingAjax) {
                        if (ProfilePagination.hasMoreData) {
                            if ($(window).scrollTop() >= (($(document).height() - $(window).height() - 300))) {
                                $('#profile_loader').show();
                                loadMoreProfileDetails();
                            }
                        }
                    }

                }
            });
        })
    </script>

    {{--DEFAULT PROMOTION START / STOP--}}
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
        var timer,show_time;
        var appendClock=function(){
//            console.log('show_time appendClock',show_time);
//            console.log('qwerty');
            $('.default_timer').text(sformat(parseInt(show_time)));
            show_time++;
        };
        $(function(){
            clearInterval(timer);
            show_time=$('.default_timer').attr('data-id');
            @if($data['activityData']['status']==0)
                    timer=setInterval(appendClock,1000);
            @else
            $('.default_timer').text(sformat(parseInt(show_time)));
            @endif


        });
        $(document).ready(function(){
            $(document.body).on('click','.default_status_button',function(){

                var currentObj=$('.default_status_button');
                var currentStatus=currentObj.attr('data-id');
                var instaUserId = $('#instaUserId').val();
                console.log('currentStatus==>',currentStatus);

                var prevTime=$('.default_timer').attr('data-id');
                $.ajax({
                    url:' /change/default/promotion/status',
                    type: 'post',
                    dataType: 'json',
                    data:{
                        currentStatus:currentStatus,
                        instaUserId:instaUserId
                    },
                    beforeSend: function () {
                        clearInterval(timer);
                        $('.default_timer').text('Processing...');
                        currentObj.css({
                            "opacity":"0.6",
                            "pointer-events": "none"
                        });
                    },
                    complete: function () {
                        currentObj.css({
                            "opacity":"",
                            "pointer-events": ""
                        })

                    },
                    success:function(response){

//                        console.log('response===========>',response)
                        if(response.status=='success'){
                            var appendData='';
                            if(currentStatus==1){
                                toastr.success('Default Promotion Started Successfully');
                                appendData='Promotion - <a href="javascript:;" class="btn btn-success disable" style="width: 135px;">' +
                                        'Running <i class="fa fa-refresh fa-spin"></i> </a>' +
                                        '<span style="padding: 10px" class="default_timer" data-id="'+(Math.floor(Date.now() / 1000)-response.data.default_promotion_start_time)+'">00:00:00:00</span>' +
                                        ' <a href="javascript:;" title="click to stop activity" ' +
                                        'class="btn btn-danger default_status_button" style="width: 135px" data-id="0">Stop ' +
                                        '<i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a>';
                                $('.start_stop').html(appendData);
                                show_time=1;
                                console.log('show_time===>',show_time)
                                timer=setInterval(appendClock,1000);
                            }
                            else{
                                toastr.success('Default Promotion Stopped Successfully');
                                appendData='Promotion - <a href="javascript:;" title="click to start activity" ' +
                                        'class="btn btn-success default_status_button" style="width: 135px" data-id="1">' +
                                        'Start <i class="fa fa-play"></i> </a> ' +
                                        {{--                                        ' <span style="padding: 10px" class="default_timer" data-id=" {{$data['activityData']['default_promotion_stop_time']-$data['activityData']['default_promotion_start_time']}}"></span>' +--}}
                                                ' <span style="padding: 10px" class="default_timer" data-id="'+(response.data.default_promotion_stop_time-response.data.default_promotion_start_time)+'">' +
                                        ''+(sformat(parseInt(response.data.default_promotion_stop_time-response.data.default_promotion_start_time)))+'</span>' +
                                        '<a href="javascript:;" class="btn btn-danger disable" style="width: 135px;">' +
                                        'Stopped<i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a> ';
                                $('.start_stop').html(appendData);
                            }

                        }
                        else{
                            $('.default_timer').text(sformat(parseInt(prevTime)));
                            toastr.error(response.message);
                        }
                    },
                    error:function(error){
                        toastr.error('Unexpected network error has occured.')
                    }

                });

            })
        });
    </script>
@endsection

