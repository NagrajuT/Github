@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('active_profileManagement','active')

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
    </style>
    <style>
        .dateselecter label,
        .dateselecter input,
        .dateselecter i {
            display: inline-block;
        }

        #area,
        #searchtags,
        #add {
            display: none;
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

        /*Starting block */
        /*by 10tribu */
        /** {*/
        /*transition: all .5s ease-out;*/
        /*}*/

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


        .disable {
            background: #fff !important;
            color: #5d6b7a !important;
            border: 1px solid #ccc !important;
            cursor: not-allowed !important;
        }
    </style>

@endsection

@section('content')
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">

            <div class="row">

                <!-- Begin: life time stats -->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs fa-2x font-green-sharp" aria-hidden="true"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Automatic Comments</span>
                            <span class="caption-helper"> (to top posts in specifics hash tags....)</span>
                        </div>
                    </div>


                    <div class="portlet-body">


                        @if($status=='success')
                            @if(isset($data['accountList']) && !empty($data['accountList']))
                                <form action="/automatic/comments" method="post" id="formSubmit">
                                    <div class="row">
                                        <div id="accountSelection">

                                            <div class="col-md-3">

                                            </div>
                                            <div class="col-md-6" style="margin-top: 10px;">

                                                <div class="col-md-3 text_left" style="margin-top: 10px;text-align: right;">
                                                    <label for="instaUserId">Choose Account</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select name="instaUserId" id="instaUserId" class="form-control"
                                                            value="{{old('instaUserId')}}"
                                                            style="border:1px solid #7d888e; border-radius:5px;">
                                                        @if(isset($data['accountList']) && !empty($data['accountList']))

                                                            @foreach($data['accountList'] as $key=>$value)
                                                                <option value="{{$value['ins_user_id']}}"
                                                                        data-time_period_left="{{$value['time_period_left']}}"
                                                                        data-subscribe_type="{{$value['subscribe_type']}}"
                                                                        data-is_logged_in="{{$value['is_logged_in']}}"
                                                                        data-is_user_disconnected="{{$value['is_user_disconnected']}}"
                                                                        data-has_account_locked="{{$value['has_account_locked']}}"
                                                                        data-status="{{$value['status']}}"
                                                                        data-username="{{$value['username']}}"
                                                                        @if($data['selectedUserId']==$value['ins_user_id']) selected @endif >
                                                                    <div>
                                                                        <img src="{{$value['profile_pic_url']}}"
                                                                             alt="Profile Pic">
                                                                        {{$value['username']}}
                                                                    </div>

                                                                </option>
                                                            @endforeach

                                                        @else
                                                            <option value="">-- No Account Found --</option>
                                                        @endif

                                                    </select>
                                                    <span style="color:red">{{$errors->first('instaUserId')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if(isset($data['selectedUserDetails']))

                                        @if($data['selectedUserDetails']['is_logged_in']=='Y' && $data['selectedUserDetails']['is_user_disconnected']=='N' )

                                            @if($data['selectedUserDetails']['time_period_left']==0)
                                                @if($data['selectedUserDetails']['subscribe_type']=='DU')
                                                    <div class="row text-center" style="margin-top: 20px;">
                                                        <span style="color:red">Your trail period end. Upgrade your subscription to continue.</span>
                                                    </div>
                                                @else
                                                    <div class="row text-center" style="margin-top: 20px;">
                                                        <span style="color:red">Your subscription period end. Upgrade your subscription to continue.</span>
                                                    </div>
                                                @endif

                                            @elseif($data['selectedUserDetails']['status']=='I')
                                                <div class="row text-center" style="margin-top: 20px;">
                                                    <span style="color:red">This Account is Inactive !!! Please Active this Account First </span>
                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                    <hr>
                                    @if(isset($data['selectedUserDetails']) && $data['selectedUserDetails']['is_user_disconnected']!='Y')

                                        @if(isset($data['selectedUserDetails']) && $data['selectedUserDetails']['subscribe_type']=='BU')

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-sm-12 col-md-6"
                                                     style="border:1px solid #ddd;padding:15px;margin-left:10px;">
                                                    <label><b>Profile Management Status</b> <span
                                                                style="font-size: 11px">( Manage automatic comments promotion. )</span></label><br><br>
                                                    <div class="in">
                                                        <span class="uppercase bold"
                                                              data-old_promotion_status="@if(isset($data['commentDetails'])){{$data['commentDetails']['promotion_status']}}@else{{0}}@endif"
                                                              id="promotion_change_status">

                                                            @if($data['commentDetails']['promotion_status']==1)
                                                                <a href="javascript:;" class="btn btn-success disable">
                                                                Running <i class="fa fa-refresh fa-spin"></i>
                                                                </a>
                                                                <a href="javascript:;" title="click to stop activity"
                                                                   class="btn btn-danger promotion_change_status" data-promotion_status="0">
                                                                Stop <i aria-hidden="true"
                                                                        class="glyphicon glyphicon-stop"></i>
                                                                </a>
                                                            @else
                                                                <a href="javascript:;" title="click to start activity"
                                                                   class="btn btn-success promotion_change_status" data-promotion_status="1">
                                                                    Start <i class="fa fa-play"></i>
                                                                </a>
                                                                <a href="javascript:;" class="btn btn-danger disable">Stopped<i aria-hidden="true" class="glyphicon glyphicon-stop"></i>
                                                                </a>
                                                            @endif
                                                        </span>

                                                        <span id="promotion_status_message" style="color: green;margin-left: 15px;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <label><b>Set Your Random Comments</b></label><br><br>
                                                    <div class="col-md-12 col-sm-12" style="padding: 0;">

                                                        <div id="mainComments">

                                                            <div class="btn-group" style="margin-bottom: 10px;">
                                                                <button type="button" class="btn btn-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#myModal1" id="addCommentsBtn">ADD
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
                                                                       id="delete-all-comments" href="javascript:;">Delete
                                                                        all
                                                                        comments</a>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <span style="color:red"
                                                          id="comments_error">{{$errors->first('commentsData')}}</span>
                                                </div>

                                                <input type="text" id="commentsData" name="commentsData"
                                                       value="{{old('commentsData')}}"
                                                       hidden>
                                            </div>
                                            <br><br>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <label><b>Add Tags</b></label><br><br>
                                                    <div class="col-md-12 col-sm-12" style="padding: 0;">

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

                                                <input type="text" id="hashTagData" name="hashTagData"
                                                       value="{{old('hashTagData')}}"
                                                       hidden>
                                            </div>
                                            <br><br>
                                            <div class="row text-center">
                                                <button id="saveCommentsBtn" class="btn btn-success">Save</button>
                                            </div>

                                        @else
                                            <div class="row text-center">

                                                {{--<img src="/assets/user/images/warning_purple.png" alt="" width="100">--}}
                                                <img src="/assets/user/images/warning_yellow.png" alt="" width="100">
                                                <br><br>
                                                <div style="font-size:17px;">This feature is Available for Business
                                                    Subscriber
                                                    only. <br>
                                                    Upgrade Subscription Package for this account
                                                    ( @ {{$data['selectedUserDetails']['username']}})
                                                </div>
                                                <br><br>
                                                <a href="/user/packageLists" class="btn btn-success"
                                                   style="background-color: #5cb85c">Buy subscription
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <br><br>

                                            </div>
                                        @endif
                                    @else

                                        <div class="row text-center">
                                            <div class="row text-center">

                                                <img src="/assets/user/images/warning_error.png" alt="" width="100">
                                                <br><br>

                                                <div style="padding:12px;color: red">This Account has been disconnected
                                                    from
                                                    Instaffic System !!!
                                                    <br>
                                                    Please Re-Connect Your Account
                                                    <br>
                                                    <br> <br>
                                                    Go To <u><a href="/user/dashboard" style="color: red">Account
                                                            Activation </a></u> -- >
                                                    Choose Account -->More -->Re-Connect Account
                                                </div>

                                                <br><br>

                                            </div>
                                        </div>
                                    @endif

                                </form>
                            @else
                                <div class="row text-center">

                                    {{--<img src="/assets/user/images/warning_purple.png" alt="" width="100">--}}
                                    <img src="/assets/user/images/warning_yellow.png" alt="" width="100">
                                    <br><br>
                                    <div style="padding:12px;">No Instagram Account Added !!!
                                        <br>
                                        Please Add Atleast one Account
                                        <br>
                                        <br> <br>
                                        Go To <a href="/user/dashboard">Account Activation </a> -- > Add Account
                                    </div>

                                    <br><br>

                                </div>
                            @endif
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

            <!-- -------------Modals For Add Comments-------------------->
            <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#444D58;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:center; color:white;">
                                <i class="fa fa-edit" aria-hidden="true"></i> Add Your Random Comment</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="padding: 10px 0px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <textarea class="form-control" id="new_comments"></textarea>


                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                            <button type="button" class="btn btn-info" id="addNewCommentsModalBtn">Add</button>
                        </div>

                    </div>

                </div>
            </div>

            <!-- -------------Modals For Edit Comment-------------------->
            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#444D58;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:center; color:white;">
                                <i class="fa fa-edit" aria-hidden="true"></i> Edit Your Random Comment</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="padding: 10px 0px;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <textarea class="form-control" id="edit_comment"></textarea>


                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Cancel</button>
                            <button type="button" class="btn btn-info" id="editCommentsModalBtn">Save</button>
                        </div>

                    </div>

                </div>
            </div>


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
    </div>
@endsection

@section('pagejavascripts')
    <script src="/assets/user/js/bootbox.min.js"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>

    <script type="text/javascript">
        var comments = [], hashtags = [], timerid = null, isDataModified = false;
        $(document).ready(function () {

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
                    console.log('checked')
                    $(currentElementObj).attr('checked', false);
                } else {
                    $(currentElementObj).attr('checked', true);
                    console.log('unchecked')
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
                                '<button type="button" class="btn btncolor" data-toggle="modal" data-target="#">' + hashTagValue + '</button>' +
                                '<button type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeTag"  data-hashtag-name="' + hashTagValue + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                '<span class="close"></span></button></div>';
                        isDataModified = true;
                    });

                    $('#mainHashTag').prepend(mainHashTagHtml);
                    $('#myModal').hide();
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
                } else {
                    $('#hashTagData_error').text('Atleast one hash tag is required');
                }
            });

            $(document.body).on('click', '#delete-all-hashtags', function (e) {
                e.preventDefault();

                if (hashtags.length > 0) {
                    $('.remove-hashtag-btn').remove();
                    hashtags = [];
                    isDataModified = true;
                } else {
                    toastr.error('No Hashtag Added !!!');
                }

            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function () {

            $(document.body).on('click', '#addCommentsBtn', function (e) {
                e.preventDefault();
                $("#new_comments").val('');
                $('#comments_error').text('');
            })

            $(document.body).on('click', '#addNewCommentsModalBtn', function (e) {
                e.preventDefault();

                var newCommentsObj = $('#new_comments');
                var commentTextValue = newCommentsObj.val().trim();
                if (commentTextValue.length == 0) {
                    newCommentsObj.focus();
                    return false;
                }

                var commentKey = Math.floor(Date.now() / 1000);
                comments.unshift({key: commentKey, value: commentTextValue});
                var commentTextHtml = '<div class="btn-group btnspace removeAllCommentsBtn" style="margin-right: 4px;">' +
                        '<a type="button" class="btn btncolor display-comment truncate"><span>' + commentTextValue + '</span></a>' +
                        '<a type="button" style="height: 34px;" class="btn btncolor dropdown-toggle editComment"  data-comment_key="' + commentKey + '"  data-comment_value="' + commentTextValue + '" data-toggle="modal" data-target="#myModal2">' +
                        '<span><i class="fa fa-edit"></i></span></a>' +
                        '<a type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeComment"  data-comment_key="' + commentKey + '">' +
                        '<span class="close1"><i class="fa fa-trash"></i></span></a>' +
                        '</div>';

                isDataModified = true;

                $('#mainComments').prepend(commentTextHtml);
                $('#myModal1').hide();
            })

            $(document.body).on('click', '.removeComment', function (e) {
                e.preventDefault();

                $(this).parent('.btnspace').remove();
                var removeItem = $(this).attr('data-comment_key');
                comments = jQuery.grep(comments, function (value) {
                    return value.key != removeItem;
                });
                console.log(comments);

                if (comments.length > 0) {
                    $('#comments_error').text('');
                } else {
                    $('#comments_error').text('Atleast one comments is required');
                }
                isDataModified = true;
            })

            $(document.body).on('click', '#delete-all-comments', function (e) {
                e.preventDefault();
                if (comments.length > 0) {
                    $('.removeAllCommentsBtn').remove();
                    comments = [];
                    isDataModified = true;
                } else {
                    toastr.error('No Comment Added !!!');
                }

            })

            var editCurrentCommentObj = null;
            $(document.body).on('click', '.editComment', function (e) {
                e.preventDefault();
                editCurrentCommentObj = this;
                $('#edit_comment').val($(this).attr('data-comment_value'));
            })

            $(document.body).on('click', '#editCommentsModalBtn', function (e) {
                e.preventDefault();
                var editedCommentValue = $('#edit_comment').val();

                if ($(editCurrentCommentObj).attr('data-comment_value') !== editedCommentValue) {
                    isDataModified = true;
                }

                $(editCurrentCommentObj).attr('data-comment_value', editedCommentValue);
                $(editCurrentCommentObj).siblings('.display-comment').text(editedCommentValue);

                var editItem = $(editCurrentCommentObj).attr('data-comment_key');
                comments = jQuery.grep(comments, function (comment) {
                    if (comment.key == editItem) {
                        comment.value = editedCommentValue.trim();
                    }
                    return comment;
                });
                $('#myModal2').hide();

            })


            function getCaret(el) {
                if (el.selectionStart) {
                    return el.selectionStart;
                } else if (document.selection) {
                    el.focus();

                    var r = document.selection.createRange();
                    if (r == null) {
                        return 0;
                    }

                    var re = el.createTextRange(),
                            rc = re.duplicate();
                    re.moveToBookmark(r.getBookmark());
                    rc.setEndPoint('EndToStart', re);

                    return rc.text.length;
                }
                return 0;
            }

            $('#commentsTextArea').on('change click input keyup', function (event) {

                if (event.keyCode == 13 && event.shiftKey) {
                    var content = this.value;
                    var caret = getCaret(this);
                    this.value = content.substring(0, caret);//   +"\n";//     +  content.substring(caret,content.length-1);
                    event.stopPropagation();

                } else if (event.keyCode == 13) {

                    var commentsText = $(this).val();
                    console.log(commentsText);
                    $('#commentDisplayArea').append('<div style="background-color: #eff3f8; width: 100%; padding: 10px 40px 10px 10px; margin-bottom: 3px;">' + commentsText + ' <a href="" style="float: right; position: absolute; right: 28px;">X</a> </div>')
                    $(this).val('')
                }
            });



            $(document.body).on('click', '.promotion_change_status', function (e) {
                e.preventDefault();
                var currentObj=this;
                var promotionStatus = parseInt($(currentObj).attr('data-promotion_status'));

                if ((comments.length == 0) || (hashtags.length ==0)) {
                    toastr.options.positionClass = "toast-top-center";
                    toastr.error('Please save the below settings first.');
                    return false;
                }

                var instaUserId = parseInt($('#instaUserId').val());
                $.ajax({
                    url: '/change/promotion/status',
                    dataType: 'json',
                    method: 'post',
                    data: {instaUserId: instaUserId, promotion_status: promotionStatus, method_name: 'COMMENTS'},
                    success: function (response) {
                        if (response.status === 'success') {
                            var promotionHtml = '';
                            if (promotionStatus == 1) {
                                promotionHtml = '<a href="javascript:;" class="btn btn-success disable" style="width: 135px;">' +
                                        ' Running <i class="fa fa-refresh fa-spin"></i></a>' +
                                        ' <a href="javascript:;" title="click to stop activity" data-promotion_status="0" class="btn btn-danger promotion_change_status" style="width: 135px">' +
                                        ' Stop <i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a>';

                            } else {
                                promotionHtml = '<a href="javascript:;" title="click to start activity" data-promotion_status="1" class="btn btn-success promotion_change_status" style="width: 135px" data-id="0">' +
                                        ' Start <i class="fa fa-play"></i></a>' +
                                        ' <a href="javascript:;" class="btn btn-danger disable" style="width: 135px;"> ' +
                                        ' Stopped<i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a>';
                            }

                            var promotion_change_status_obj = $(currentObj).closest('#promotion_change_status');

                            promotion_change_status_obj.html(promotionHtml);

                            $('#promotion_status_message').text(response.message).show();
                            setTimeout(function(){
                                $('#promotion_status_message').hide('slow');
                            },3000);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });


            });

            $(document.body).on('click', '#saveCommentsBtn', function (e) {
                e.preventDefault();
                var obj = $('#instaUserId option:selected');
                if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @" + obj.attr('data-username') + " Account has been disconnected from Instaffic System!!!</small>",
                        text: "<span>Click on More button for Re-Connect Account</span>",
                        html: true
                    });
                } else if (obj.attr('data-time_period_left') == 0) {
                    if (obj.attr('data-subscribe_type') == 'DU') {
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Demo Subscription Period has been expired for this @" + obj.attr('data-username') + " account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> for Purchasing more Subscription Period</span>",
                            html: true
                        });
                    } else {
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Subscription Package has been expired for this @" + obj.attr('data-username') + " account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> to upgrade your Subscription</span>",
                            html: true
                        });
                    }
                } else if (obj.attr('data-status') == 'I') {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @" + obj.attr('data-username') + " account is Inactive!!! Please active this account first</small>",
                        text: "<span>Click <a href='/user/dashboard'>here </a> to active this account</span>",
                        html: true
                    });
                } else {

                    var commentsDataObj = $('#commentsData');
                    commentsDataObj.val(JSON.stringify(comments));

                    if (comments.length == 0) {
                        $('#comments_error').text('Atleast one comment is required');
                        return false;
                    } else {
                        $('#comments_error').text('');
                    }

                    var hashTagDataObj = $('#hashTagData');
                    hashTagDataObj.val(hashtags.join(','));

                    if (hashTagDataObj.val().length == 0) {
                        $('#hashTagData_error').text('Atleast one hash tag is required');
                        return false;
                    } else {
                        $('#hashTagData_error').text('');
                    }

                    if (isDataModified) {
                        $('#formSubmit').submit();
                    } else {
                        toastr.warning('Nothing to save');
                    }
                }
            })

            $(document.body).on('change', '#instaUserId', function (e) {
                e.preventDefault();
                window.location.href = '/automatic/comments/' + $(this).val();
            })


            var oldHashTagData = '{{old('hashTagData')}}' || '<?php if (isset($data["commentDetails"]) && !empty($data["commentDetails"]["tags"])) echo $data["commentDetails"]["tags"];?>' || null;
            if (oldHashTagData != null) {
                var hashTagsArray = oldHashTagData.split(',');
                var mainHashTagHtml = '', hashTagValue = '';
                $.each(hashTagsArray, function (key, value) {
                    hashtags.push(value);
                    mainHashTagHtml += '<div class="btn-group btnspace remove-hashtag-btn" style="margin-right: 4px;">' +
                            '<button type="button" class="btn btncolor" data-toggle="modal" data-target="#">' + value + '</button>' +
                            '<button type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeTag"  data-hashtag-name="' + value + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            '<span class="close"></span></button></div>';

                });

                $('#mainHashTag').prepend(mainHashTagHtml);
            }


            var oldCommentsData = '{{old('commentsData')}}' || '<?php if (isset($data["commentDetails"]) && !empty($data["commentDetails"]["comment_text"])) echo $data["commentDetails"]["comment_text"];?>' || null;
            if (oldCommentsData != null) {
                var commentsArray = JSON.parse(oldCommentsData.replace(/&quot;/g, '\"'));
                var mainCommentsHtml = '';
                $.each(commentsArray, function (key, comment) {
                    comments.push(comment);
                    mainCommentsHtml += '<div class="btn-group btnspace removeAllCommentsBtn" style="margin-right: 4px;">' +
                            '<a type="button" class="btn btncolor display-comment truncate"><span>' + comment.value + '</span></a>' +
                            '<a type="button" style="height: 34px;" class="btn btncolor dropdown-toggle editComment"  data-comment_key="' + comment.key + '"  data-comment_value="' + comment.value + '" data-toggle="modal" data-target="#myModal2">' +
                            '<span><i class="fa fa-edit"></i></span></a>' +
                            '<a type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeComment"  data-comment_key="' + comment.key + '">' +
                            '<span class="close1"><i class="fa fa-trash"></i></span></a>' +
                            '</div>';

                });
                $('#mainComments').prepend(mainCommentsHtml);
            }


            var commentDataSavedStatus = "@if(isset($commentDataSavedMsg)) {{$commentDataSavedMsg['status']}} @endif" || null;
            if (commentDataSavedStatus != null && commentDataSavedStatus.trim().length > 0) {
                var commentDataSavedMsg = "@if(isset($commentDataSavedMsg)) {{$commentDataSavedMsg['message']}} @endif";

                var htmlModalData = '';
                if (commentDataSavedStatus.trim() == 'success') {
                    toastr.success(commentDataSavedMsg);
                } else {
                    htmlModalData = '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                            '<strong style="font-size: large;">Oops!</strong>' +
                            '<h4>' + commentDataSavedMsg + '</h4>';
                    $('#customModelData').html(htmlModalData);
                    $('#customModal').modal('show');
                }
            }

        })

    </script>


@endsection

