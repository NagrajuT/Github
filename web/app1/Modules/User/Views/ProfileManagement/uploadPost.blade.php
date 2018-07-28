@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('active_profileManagement','active')

@section('headcontent')

    <link rel="stylesheet"
          href="/assets/user/user-panel/global/plugins/dropify-master/dropify-master/dist/css/dropify.min.css">

    <link href="/assets/user/user-panel/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"
          rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/user/css/sweetalert.css">
    <style>
        .truncate {
            width: 250px;
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

        /* codepen add */
        .remarque {
            font-size: 10px;
        }

        a {
            color: gray;
            text-decoration: none;
        }

        .datetimepicker thead tr:first-child th:hover, .datetimepicker tfoot tr:first-child th:hover {
            background: transparent none;
        }
    </style>

    <style>
        /*+++++ Radio Button  ++++++*/
        .radio-in input[type="radio"] {
            display: none;
        }

        .radio-in input[type="radio"] + label {
            color: #333;
            font-family: Arial, sans-serif;
        }

        .radio-in input[type="radio"] + label span {
            display: inline-block;
            width: 19px;
            height: 19px;
            margin: -2px 10px 0 0;
            vertical-align: middle;
            background: url(/assets/user/user-panel/img/check_radio_sheet.png) -38px top no-repeat;
            cursor: pointer;
        }

        .radio-in input[type="radio"]:checked + label span {
            background: url(/assets/user/user-panel/img/check_radio_sheet.png) -57px top no-repeat;
        }

        .form-group.form-md-line-input {
            margin: -10px 0 35px;
            padding-top: 0;
        }


    </style>
    <style>
        .error-msg {
            color: red;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .8) url('/assets/user/images/ajax-loader.gif') 50% 50% no-repeat;
        }

        /* When the body has the loading class, we turn
           the scrollbar off with overflow:hidden */
        body.loading {
            overflow: hidden;
        }

        /* Anytime the body has the loading class, our
           modal element will be visible */
        body.loading .modal {
            display: block;
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
                            <i class="fa fa-cloud-upload fa-2x font-green-sharp" aria-hidden="true"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Upload Picture By Timer</span>
                            <span class="caption-helper">Uploading picture by timer...</span>
                        </div>
                    </div>

                    <div class="portlet-body">
                        @if($status=='success')
                            @if(isset($data['accountList']) && !empty($data['accountList']))
                                <form action="/upload/post" method="post" id="formSubmit" enctype="multipart/form-data">
                                    <div class="row">
                                        <div id="accountSelection">

                                            <div class="col-md-3">

                                            </div>
                                            <div class="col-md-6" style="margin-top: 10px;">

                                                <div class="col-md-3" style="margin-top: 10px;text-align: right;">
                                                    <label for="instaUserId">Choose Account</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select name="instaUserId" id="instaUserId" class="form-control"
                                                            style="border:1px solid #7d888e; border-radius:5px;">
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

                                                    </select>
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

                                    <div class="row">
                                        <div class="col-md-6" style="text-align: right">
                                            <a target="_blank" href="/show/scheduled/posts">Click Here to check
                                                Scheduled
                                                posts</a>

                                        </div>
                                        <div class="col-md-6" style="text-align: left">
                                            <a target="_blank" href="/show/bookmarked/posts">Click Here to check
                                                Bookmarked
                                                posts</a>

                                        </div>
                                    </div>
                                    <br><br>

                                    @if(isset($data['selectedUserDetails']) && $data['selectedUserDetails']['is_user_disconnected']!='Y')
                                        @if(isset($data['selectedUserDetails']) && $data['selectedUserDetails']['subscribe_type']=='BU')

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-sm-8 col-md-6">
                                                    <label><b>Browse picture</b> </label><br><br>

                                                    <input type="file" accept="image/*" id="input-file-now"
                                                           class="dropify"
                                                           required="required"/>
                                                    <span style="color: red;  margin-left: 35%;" id="error_upload_msg"
                                                          hidden>Please select a file</span>


                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="ckbox1">
                                                    <input type="checkbox" id="caption_option" name="caption_option"
                                                           class="favoriteCheckbox" value="">
                                                    <label for="caption_option"><span></span><b><i><img
                                                                        src="/assets/user/images/message-caption.png"
                                                                        width="20px"
                                                                        height="20px"></i> Write Picture
                                                            Caption</b></label><span
                                                            style="font-size: 11px"> ( optional )</span>
                                                </div>
                                            </div>
                                            <div class="row" id="captionArea" hidden>
                                                <div class="col-md-3"></div>
                                                <div class="col-sm-8 col-md-6">
                                            <textarea rows="3" id="captionData" name="captionData"
                                                      class="form-control">{{old('captionData')}}</textarea>

                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="ckbox1">
                                                    <input type="checkbox" id="location_option" name="location_option"
                                                           class="favoriteCheckbox" value="">
                                                    <label for="location_option"><span></span>
                                                        <b><i><img src="/assets/user/images/location.png" width="20px"
                                                                   height="20px"></i> Add Location</b></label><span
                                                            style="font-size: 11px"> ( optional )</span>
                                                </div>
                                            </div>
                                            <div class="row" id="locationSearchEngine" hidden>


                                                <div class="col-md-6 col-md-offset-3">

                                                    <!-- Search Field -->

                                                    <div class="form-group form-md-line-input">
                                                        <div class="input-group">
                                                            <input class="form-control" id="locationTextInput"
                                                                   name="location-text"
                                                                   data-lat="" data-lng="" data-name=""
                                                                   placeholder="click here to add location"
                                                                   type="text" readonly style="cursor:text">
                                                            <span class="input-group-addon">
                                                             <i id="remove-location" class="fa fa-close"
                                                                style="cursor:pointer"></i>
                                                        </span>
                                                        </div>
                                                    </div>


                                                </div>


                                                <input type="text" id="locationData" name="locationData" hidden
                                                       value="{{old('locationData')}}">
                                            </div>
                                            <br>


                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="ckbox1">
                                                    <input type="checkbox" id="hashtag_option" name="hashtag_option"
                                                           class="favoriteCheckbox" value="">
                                                    <label for="hashtag_option"><span></span><b><i><img
                                                                        src="/assets/user/images/hashtag-plain.png"
                                                                        width="20px"
                                                                        height="20px"></i> Add Hashtags
                                                        </b></label><span
                                                            style="font-size: 11px"> ( optional )</span>
                                                </div>
                                            </div>
                                            <div class="row" id="hashtagSearchEngine" hidden>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">

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
                                            <br>


                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="ckbox1">
                                                    <input type="checkbox" id="username_option" name="username_option"
                                                           class="favoriteCheckbox" value="">
                                                    <label for="username_option"><span></span><b> <i><img
                                                                        src="/assets/user/images/tag-user.png"
                                                                        width="20px"
                                                                        height="20px"></i> Tag People</b></label><span
                                                            style="font-size: 11px"> ( optional )</span>
                                                </div>
                                            </div>
                                            <div class="row" id="usernameSearchEngine" hidden>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <div class="col-md-12 col-sm-12" style="padding: 0;">
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

                                                <input type="text" id="usernameData" name="usernameData" hidden
                                                       value="{{old('usernameData')}}">
                                            </div>
                                            <br><br>


                                            <div class="row text-center">
                                                <button id="btn-post-now" class="btn btn-success">POST NOW</button>
                                                <button id="btn-schedule-post" class="btn btn-success">SCHEDULE POST
                                                </button>
                                            </div>


                                        @else
                                            <div class="row text-center">

                                                {{--<img src="/assets/user/images/warning_purple.png" alt="" width="100">--}}
                                                <img src="/assets/user/images/warning_yellow.png" alt="" width="100">
                                                <br><br>
                                                <div style="padding:12px;">This feature is Available for Business
                                                    Subscriber. <br>
                                                    Upgrade Your Subscription Package
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

                                {{--<img src="/assets/user/images/warning_purple.png" alt="" width="100">--}}
                                <img src="/assets/user/images/warning_error.png" alt="" width="100">
                                <br><br>

                                <div style="padding:12px; color: red">
                                    <p>Error in API service due to this reasion</p>
                                    <br>
                                    {{$message}}
                                </div>

                                <br><br>

                            </div>

                        @endif
                    </div>

                </div>
                <!-- End: life time stats -->
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
                                            <div class="input-group" id="search5">
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

                                <div id="map"
                                     style="height: 250px; margin: 0px 20px 0px 20px;">

                                </div>
                            </div>


                            <div class="row hidden radio-in" id="locationDetails"
                                 style="margin: 25px 0px 15px 5px; min-height: auto; max-height:260px; overflow-y:auto; overflow-x: hidden;">

                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
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


            <!-- -------------Modals For Display Date And Time-------------------->
            <div class="modal fade" id="myModal3" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#444D58;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:center; color:white;">Select Schedule Time</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <img class="form-control" id="modal-img-upload"
                                             src="/assets/user/images/post-4.jpg"
                                             style="height: 350px;">
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12" id="modal-caption">
                                    <div class="form-group">
                                        <label for="comment"
                                               style="font-size: 14px;"><i><img
                                                        src="/assets/user/images/message-caption.png" height="20px"
                                                        width="20px"></i>Caption Text :</label>
                                        <textarea class="form-control" rows="2"
                                                  placeholder="message" id="caption-upload"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12" id="modal-location">
                                    <div class="form-group">
                                        <label for="locationTextInputDisplay"
                                               style="font-size: 14px;"><i><img src="/assets/user/images/location.png"
                                                                                height="20px" width="20px"></i>Tag
                                            Location :</label>

                                        <input class="form-control" id="locationTextInputDisplay"
                                               placeholder="click here to add location" readonly=""
                                               style="cursor: text; background-color: #fff; border-left: none; border-top: none; border-right: none;"
                                               type="text">

                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12" id="modal-hashtag">
                                    <div class="form-group">
                                        <label for="mainHashTagDisplay"
                                               style="font-size: 14px;"><i><img
                                                        src="/assets/user/images/hashtag-plain.png" height="20px"
                                                        width="20px"></i>Hashtag :</label>

                                        <div id="mainHashTagDisplay">

                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12" id="modal-username">
                                    <div class="form-group">
                                        <label for="mainUsernameDisplay"
                                               style="font-size: 14px;"><i><img src="/assets/user/images/tag-user.png"
                                                                                height="20px" width="20px"></i>Tag
                                            People :</label>

                                        <div id="mainUsernameDisplay">

                                        </div>

                                    </div>
                                </div>
                                <br>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="scheduleTimeDisplay" style="font-size: 14px;"><i
                                                    class="fa fa-calendar"></i> Schedule time :</label>


                                        <div class="input-group date form_datetime" id='datetimepicker2'>
                                            <input type="text" readonly class="form-control" id="scheduleTime"
                                                   style="font-size:13px" placeholder="Schedule Time">
                                            <span class="input-group-btn">
                                                    <button class="btn default date-set" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Cancel</button>
                            <button type="button" class="btn btn-success" id="schedule-post">Confirm</button>

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



    <!-- END PAGE CONTENT -->


@endsection

@section('pagejavascripts')
    <script src="/assets/user/js/loadingoverlay.js"></script>
    <script src="/assets/user/user-panel/global/plugins/dropify-master/dropify-master/dist/js/dropify.min.js"></script>

    <script src="/assets/user/user-panel/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script src="/assets/user/js/jstz.min.js"></script>
    <script src="/assets/user/js/moment.js"></script>


    <script type="text/javascript">


        $(document).ready(function () {
            // Basic
            $('.dropify').dropify({
                messages: {
                    'default': 'Click to Browse file',
                    'replace': 'Click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                }
            });

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    'default': 'Click to Browse file',
                    'replace': 'Click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function (event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function (event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function (e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });

    </script>


    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs&libraries=places&callback=initMap"></script>--}}
    <script src="/assets/user/js/bootbox.min.js"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs&libraries=places"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(document.body).on('change', '#caption_option', function (e) {
                e.preventDefault();
                var captionAreaObj = $('#captionArea');
                if ($(this).is(":checked")) {
                    captionAreaObj.show("slow");
                } else if ($(this).is(":not(:checked)")) {
                    captionAreaObj.slideUp();
                }
            })


            $(document.body).on('change', '#location_option', function (e) {
                e.preventDefault();

                var locationSearchEngineObj = $('#locationSearchEngine');
                if ($(this).is(":checked")) {
                    locationSearchEngineObj.show("slow");
                } else if ($(this).is(":not(:checked)")) {
                    locationSearchEngineObj.slideUp();
                }
            })

            $(document.body).on('change', '#hashtag_option', function (e) {
                e.preventDefault();
                var hashtagSearchEngineObj = $('#hashtagSearchEngine');

                if ($(this).is(":checked")) {
                    hashtagSearchEngineObj.show("slow");
                } else if ($(this).is(":not(:checked)")) {
                    hashtagSearchEngineObj.slideUp();
                }
            })

            $(document.body).on('change', '#username_option', function (e) {
                e.preventDefault();
                var usernameSearchEngineObj = $('#usernameSearchEngine');

                if ($(this).is(":checked")) {
                    usernameSearchEngineObj.show("slow");
                } else if ($(this).is(":not(:checked)")) {
                    usernameSearchEngineObj.slideUp();
                }
            })


        });
    </script>



    <script>

        //        var customIconBase = '/assets/user/images/location-green-dot.PNG';
        var customIconBase = '/assets/user/images/place_icon.PNG';

        var mapIdName = null;
        var map;
        var infowindow;
        var bounds;
        var markedLocations = [];
        var isMapInitialized = false;

        var initializeMap = function (mapIdNameValue) {

            if (mapIdName == null) {
                if (typeof mapIdNameValue !== "undefined" && mapIdNameValue != null) {
                    mapIdName = mapIdNameValue;
                } else {
                    mapIdName = 'map';
                }
            }


            var lat = 0;
            var long = 0;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
            function showPosition(position) {
                lat = position.coords.latitude;
                lng = position.coords.longitude;

                var latlng = new google.maps.LatLng(lat, lng);
                var geocoder = geocoder = new google.maps.Geocoder();

                geocoder.geocode({'latLng': latlng}, function (results, status) {

                    if (status == google.maps.GeocoderStatus.OK) {
                        var name = results[0].formatted_address;

                        var map1 = new google.maps.Map(document.getElementById(mapIdName), {
                            zoom: 12,
                            center: new google.maps.LatLng(lat, lng),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });
                        infowindow = new google.maps.InfoWindow();
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(lat, lng),
                            map: map1
                        });

                        google.maps.event.addListener(marker, 'click', (function (marker) {
                            return function () {
                                infowindow.setContent(name);
                                infowindow.open(map1, marker);
                            }
                        })(marker));

                        isMapInitialized = true;
                    }
                });

            }

        };

        var markMap = function (data, callback) {
            if (mapIdName == null) {
                if (typeof data.mapIdName !== "undefined" && data.mapIdName != null) {
                    mapIdName = data.mapIdName;
                } else {
                    mapIdName = 'map';
                }
            }

            var geocoder = geocoder = new google.maps.Geocoder();

            geocoder.geocode({'address': data.searchValue}, function (results, status) {

                if (status == google.maps.GeocoderStatus.OK) {

                    var name = results[0].formatted_address;
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    var place_id = results[0].place_id;

                    bounds = new google.maps.LatLngBounds();

                    map = new google.maps.Map(document.getElementById(mapIdName), {
                        zoom: 20,
                        center: new google.maps.LatLng(latitude, longitude),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    infowindow = new google.maps.InfoWindow();
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(latitude, longitude),
                        map: map,
                        icon: customIconBase
                    });


                    google.maps.event.addListener(marker, 'click', (function (marker) {
                        return function () {
                            infowindow.setContent(name);
                            infowindow.open(map, marker);
                        }
                    })(marker));

                    initMap({lat: latitude, lng: longitude, name: name, place_id: place_id}, function (result, status) {
                        callback(result, status)
                    });

                } else {
                    callback({markedLocations: null, message: 'No result Found'}, 'failed')
                }
            });

        };

        function initMap1(location, callback) {
            infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch({
                location: location,
                radius: 500,
                //                type: ['store']
                types: ['bar', 'store', 'school', 'shopping_mall', 'food', 'mosque']
            }, function (results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    var resultSize = results.length;
                    markedLocations = [];

                    markedLocations.push({
                        name: location.name,
                        vicinity: '',
                        lat: location.lat,
                        lng: location.lng,
                        id: location.place_id
                    });

                    for (var i = 0; i < resultSize; i++) {
                        markedLocations.push({
                            name: results[i].name,
                            vicinity: results[i].vicinity,
                            lat: results[i].geometry.location.lat(),
                            lng: results[i].geometry.location.lng(),
                            id: results[i].place_id
                        });
                        createMarker(results[i]);
                        if (i == (resultSize - 1)) {
                            callback({markedLocations: markedLocations}, 'success')
                        }
                    }
                } else {
                    callback({markedLocations: null, message: 'Error in google Map Service'}, 'failed')
                }
            });
        }

        function initMap(location, callback) {
            infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);


            $.ajax({
                url: '/get/nearby/search/location',
                type: 'post',
                data: {instaUserId: instaUserId, lat: location.lat, lng: location.lng},

                success: function (response) {
                    var searchHagtagHtmlData = '';
                    response = JSON.parse(response);
                    if (response.status == 'success') {

                        var results = response.data.locations;
                        var resultSize = results.length;
                        if (resultSize > 0) {

                            markedLocations = [];
                            for (var i = 0; i < resultSize; i++) {
                                markedLocations.push({
                                    id: i + 1,
                                    name: results[i].name,
                                    address: results[i].address,
                                    lat: results[i].lat,
                                    lng: results[i].lng,
                                    external_id: results[i].external_id,
                                    external_id_source: results[i].external_id_source
                                });
                                createMarker(results[i]);
                                if (i == (resultSize - 1)) {
                                    callback({markedLocations: markedLocations}, 'success')
                                }
                            }

                        } else {
                            callback({markedLocations: null, message: 'No results found.'}, 'failed')
                        }
                    }
                    else {
                        callback({markedLocations: null, message: response.message[0]}, 'failed')
                    }
                }
            });
        }

        function createMarker(place) {
            var marker = new google.maps.Marker({
                map: map,
                //                position: place.geometry.location
                position: new google.maps.LatLng(place.lat, place.lng),
            });

            bounds.extend(marker.position);
            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(place.name + ', ' + place.address);
                infowindow.open(map, this);
            });

            map.fitBounds(bounds);//       # auto-zoom
            map.panToBounds(bounds);//     # auto-center
        }


    </script>

    <script type="text/javascript">
        var hashtags = [], locations = [], usernames = [], timerid, instaUserId = '@if(isset($data['selectedUserId'])){{$data['selectedUserId']}}@endif';
        var updateLocationInputField = function (obj) {
            var locationTextInputObj = $('#locationTextInput');

            var displayLocationName = $(obj).attr('data-name') + ' ,' + $(obj).attr('data-address')
            locationTextInputObj.val(displayLocationName);
            //            locationTextInputObj.attr("data-name", $(obj).attr('data-name'));
            //            locationTextInputObj.attr("data-lat", $(obj).attr('data-lat'));
            //            locationTextInputObj.attr("data-lng", $(obj).attr('data-lng'));
            $('#myModal1').modal('hide');
            locations.push({
                name: $(obj).attr('data-name'),
                address: $(obj).attr('data-address'),
                latitude: $(obj).attr('data-lat'),
                longitude: $(obj).attr('data-lng'),
                external_id: $(obj).attr('data-external_id'),
                external_id_source: $(obj).attr('data-external_id_source')
            });

        }

        $(document).ready(function () {

            $(document.body).on('click', '#locationTextInput', function (e) {
                e.preventDefault();
                if ($(this).val().length == 0) {
                    //                    $('#locationDetails').html('');
                    $('#myModal1').modal('show');
                    if (!isMapInitialized) {
                        initializeMap('map');
                    }
                }
            })

            $(document.body).on('input', '#searchLocation', function (e) {
                var locationDetailsElementObj = $("#locationDetails");
                var currentObj = $(this);
                var searchValue = currentObj.val();
                if (searchValue.length == 0) {
                    locationDetailsElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                if (currentObj.data("lastval") != searchValue) {

                    currentObj.data("lastval", searchValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {

                        locationDetailsElementObj.html('');

                        $('#location-search-icon').hide();
                        $('#location-loading-icon').show();

                        markMap({searchValue: searchValue}, function (result, status) {
                            var searchedLocationHtmlData = '';
                            if (status == 'success') {
                                if (result.markedLocations.length > 0) {

                                    $.each(result.markedLocations, function (key, value) {
                                        searchedLocationHtmlData += '<span  class="unit-tag">' +
                                                '<input  onchange="updateLocationInputField(this)" type="radio" id="' + value.id + '" data-id="' + value.id + '"  name="locationData" class="checkedLocation" ' +
                                                ' value="' + value.name + ', ' + value.address + '"  data-name="' + value.name + '"  data-address="' + value.address + '" data-lat="' + value.lat + '" data-lng="' + value.lng + '" data-external_id="' + value.external_id + '" data-external_id_source="' + value.external_id_source + '">' +
                                                '<label for="' + value.id + '" style="color:#fff"><span></span>' + value.name + ', ' + value.address + '</label>' +
                                                '</span>';
                                    });

                                } else {
                                    initializeMap('map');
                                    searchedLocationHtmlData = '<div style="text-align: center;">Location details Not Found</div>';
                                }

                            } else {
                                initializeMap('map');
                                searchedLocationHtmlData = '<div style="color:red;text-align: center;">' + result.message + '</div>';
                            }
                            $('#location-search-icon').show();
                            $('#location-loading-icon').hide();

                            $("#locationDetails").html(searchedLocationHtmlData).removeClass('hidden');
                        });

                    }, 500);
                }
            });

            $(document.body).on('click', '#searchLocationBtn', function (e) {
                e.preventDefault();
                var searchElementObj = $('#searchLocation');
                var searchValue = searchElementObj.val();
                if (searchValue.length == 0) {
                    searchElementObj.focus();
                    return false;
                }

                $('#location-search-icon').hide();
                $('#location-loading-icon').show();

                markMap({searchValue: searchValue}, function (result, status) {
                    var searchedLocationHtmlData = '';
                    if (status == 'success') {
                        if (result.markedLocations.length > 0) {
                            $.each(result.markedLocations, function (key, value) {
                                searchedLocationHtmlData += '<span  class="unit-tag">' +
                                        '<input  onchange="updateLocationInputField(this)" type="radio" id="' + value.id + '" data-id="' + value.id + '"  name="locationData" class="checkedLocation" ' +
                                        ' value="' + value.name + ', ' + value.address + '"  data-name="' + value.name + '"  data-address="' + value.address + '" data-lat="' + value.lat + '" data-lng="' + value.lng + '" data-external_id="' + value.external_id + '" data-external_id_source="' + value.external_id_source + '">' +
                                        '<label for="' + value.id + '" style="color:#fff"><span></span>' + value.name + ', ' + value.address + '</label>' +
                                        '</span>';
                            });

                        } else {
                            initializeMap('map');
                            searchedLocationHtmlData = '<div style="text-align: center;">Location details Not Found</div>';
                        }
                    } else {
                        initializeMap('map');
                        searchedLocationHtmlData = '<div style="color:red;text-align: center;">' + result.message + '</div>';
                    }
                    $('#location-search-icon').show();
                    $('#location-loading-icon').hide();

                    $("#locationDetails").html(searchedLocationHtmlData).removeClass('hidden');
                });

            });

            $(document.body).on('click', '#remove-location', function (e) {
                e.preventDefault();
                var locationTextInputObj = $('#locationTextInput');
                locationTextInputObj.val('');
                //                locationTextInputObj.attr('data-name', '');
                //                locationTextInputObj.attr('data-lat', '');
                //                locationTextInputObj.attr('data-lng', '');
                locations = [];
            })
        });
    </script>



    <script type="text/javascript">

        $(document).ready(function () {

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
                var selectedHashtags = $('.checkedHashTags:checkbox:checked');
                if (selectedHashtags.length > 0) {
                    $.each(selectedHashtags, function () {
                        hashTagValue = $(this).attr('data-hashtag-value');
                        hashtags.push(hashTagValue);
                        mainHashTagHtml += '<div class="btn-group btnspace remove-hashtag-btn" style="margin-right: 4px;">' +
                                '<button type="button" class="btn btncolor" data-toggle="modal" data-target="#">' + hashTagValue + '</button>' +
                                '<button type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeTag"  data-hashtag-name="' + hashTagValue + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                '<span class="close"></span></button></div>';
                    });

                    $('#mainHashTag').prepend(mainHashTagHtml);
                    $('#myModal').hide();
                } else {
                    toastr.error('No Hashtag selected')
                }

            });

            $(document.body).on('click', '.removeTag', function (e) {
                e.preventDefault();
                $(this).parent('.remove-hashtag-btn').remove();
                var removeItem = $(this).attr('data-hashtag-name');
                hashtags = jQuery.grep(hashtags, function (value) {
                    return value != removeItem;
                });
            });

            $(document.body).on('click', '#delete-all-hashtags', function (e) {
                e.preventDefault();
                if (hashtags.length > 0) {
                    $('.remove-hashtag-btn').remove();
                    hashtags = [];
                } else {
                    toastr.error('No Hashtag added !!!')
                }

            });


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
                            profile_pic: $(this).attr('data-profilePic')
                        });

                        mainUsernameHtml += '<div class="btn-group btnspace remove-username-btn" style="margin-right: 4px;">' +
                                '<button style="padding: 4px 0px 3px 5px; cursor:default;"  class="btn btncolor" data-toggle="modal" data-target="#" >' +
                                '<img src="' + $(this).attr('data-profilePic') + '" height="27px" width="30px" style="border-radius: 5px;"></button>' +
                                '<button style="cursor:default;"  class="btn btncolor" data-toggle="modal" data-target="#">' + $(this).attr('data-username') + '</button>' +
                                '<button type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeUsername"  data-id="' + $(this).attr('data-id') + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                '<span class="close"></span></button></div>';

                    });
                    $('#mainUsername').prepend(mainUsernameHtml);
                    $('#myModal2').hide();
                } else {
                    toastr.error('No Username selected !!!');
                }
            });

            $(document.body).on('click', '.removeUsername', function (e) {
                e.preventDefault();
                $(this).parent('.remove-username-btn').remove();
                var removeItem = $(this).attr('data-id');
                usernames = jQuery.grep(usernames, function (value) {
                    return value.id != removeItem;
                });
            });

            $(document.body).on('click', '#delete-all-usernames', function (e) {
                e.preventDefault();

                if (usernames.length) {
                    $('.remove-username-btn').remove();
                    usernames = [];
                } else {
                    toastr.error('No Username added !!!');
                }
            });


            $(document.body).on('change', '#instaUserId', function (e) {
                e.preventDefault();
                window.location.href = '/upload/post/' + $(this).val();
            });


            $(document.body).on('change', '#input-file-now', function (e) {
                e.preventDefault();
                $('#error_upload_msg').hide();
            });


            $(document.body).on('click', '#btn-post-now', function (e) {
                e.preventDefault();
                var obj = $('#instaUserId option:selected');
                if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @"+obj.attr('data-username')+" Account has been disconnected from Instaffic System!!!</small>",
                        text: "<span>Click on More button for Re-Connect Account</span>",
                        html: true
                    });
                } else if (obj.attr('data-time_period_left') == 0) {
                    if (obj.attr('data-subscribe_type') == 'DU') {
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Demo Subscription Period has been expired for this @"+obj.attr('data-username')+" account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> for Purchasing more Subscription Period</span>",
                            html: true
                        });
                    } else {
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Subscription Package has been expired for this @"+obj.attr('data-username')+" account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> to upgrade your Subscription</span>",
                            html: true
                        });
                    }
                } else if (obj.attr('data-status') == 'I') {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @"+obj.attr('data-username')+" account is Inactive!!! Please active this account first</small>",
                        text: "<span>Click <a href='/user/dashboard'>here </a> to active this account</span>",
                        html: true
                    });
                } else {

                    var fileObj = $('#input-file-now');
                    var file = fileObj.prop("files")[0];

                    if (fileObj.val().length == 0) {
                        $('#error_upload_msg').show();
                        fileObj.focus();
                        return false;
                    }

                    var instUserId = instaUserId;
                    var base64Image = $('.dropify-render').find('img').attr('src');
                    var caption = $('#captionData').val() || null;
                    var location = (locations.length > 0) ? JSON.stringify(locations) : null;
                    var hashtag = (hashtags.length > 0) ? hashtags.join(',') : null;
                    var username = (usernames.length > 0) ? JSON.stringify(usernames) : null;
                    $.ajax({
                        url: '/upload/post',
                        dataType: 'json',
                        method: 'post',
                        data: {
                            instaUserId: instUserId,
                            serviceType: 'POST',
                            base64Image: base64Image,
                            postType: 'I',
                            caption: caption,
                            location: location,
                            hashtags: hashtag,
                            usernames: username
                        },
                        beforeSend: function () {
                            $("body").addClass("loading");
                        },
                        complete: function () {
                            $("body").removeClass("loading");
                        },
                        success: function (response) {

                            if (response.status === 'success') {

                                var htmlModalSuccessData = '<h3>Post Uploaded Successfully</h3>';

                                htmlModalSuccessData += '<br><i style="color: green; margin-right: 10px;" class="fa fa-check"></i>';
                                htmlModalSuccessData += '<span style="font-size: 20px;">' + response.data.instaUsername + '</span>';
                                htmlModalSuccessData += '<a href="' + response.data.media_details.insta_url + '" target="_blank">&nbsp;&nbsp;View </a>uploaded post in Instagram';


                                $('#betaModal').modal('hide');
                                $('#customModal').modal('show');
                                $('#customModelData').html(htmlModalSuccessData);


                                $(".dropify-clear").trigger("click");
                                $('#captionData').val('');
                                $('#locationTextInput').val('');
                                locations = [];
                                $('.remove-hashtag-btn').remove();
                                hashtags = [];
                                $('.remove-username-btn').remove();
                                usernames = [];


                            } else if (response.status === 'failed') {
                                var htmlText = '';
                                $.each(response.message, function (key, value) {
                                    htmlText = htmlText + value + '<br>';
                                });

                                var htmlModalErrorData = '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                                        '<strong style="font-size: large;">Oops!</strong>' +
                                        '<h4>' + htmlText + '</h4>';


                                $('#customModelData').html(htmlModalErrorData);
                                $('#betaModal').modal('hide');
                                $('#customModal').modal('show');
                            }
                        },
                        error: function (error, response) {
                            console.log(error);
                        }
                    });
                }
            })


            $(document.body).on('click', '#btn-schedule-post', function (e) {
                e.preventDefault();

                var obj = $('#instaUserId option:selected');
                if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This Account has been disconnected from Instaffic System!!!</small>",
                        text: "<span>Click on More button for Re-Connect Account</span>",
                        html: true
                    });
                } else if (obj.attr('data-time_period_left') == 0) {
                    if (obj.attr('data-subscribe_type') == 'DU') {
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Demo Subscription Period has been expired for this Account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> for Purchasing more Subscription Period</span>",
                            html: true
                        });
                    } else {
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Subscription Package has been expired for this Account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> to upgrade your Subscription</span>",
                            html: true
                        });
                    }
                }else if (obj.attr('data-status') == 'I') {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>Your @"+obj.attr('data-username')+" account is Inactive!!! Please active this account first</small>",
                        text: "<span>Click <a href='/user/dashboard'>here </a> to active this account</span>",
                        html: true
                    });
                }else {
                    var fileObj = $('#input-file-now');
                    var file = fileObj.prop("files")[0];

                    if (fileObj.val().length == 0) {
                        $('#error_upload_msg').show();
                        fileObj.focus();
                        return false;
                    }

                    $('#modal-img-upload').attr('src', $('.dropify-render').find('img').attr('src'));


                    var ModalCaptionElementObj = $('#modal-caption');
                    var ModalHashtagElementObj = $('#modal-hashtag');
                    var ModalLocationElementObj = $('#modal-location');
                    var ModalUsernameElementObj = $('#modal-username');

                    ModalCaptionElementObj.hide();
                    ModalHashtagElementObj.hide();
                    ModalLocationElementObj.hide();
                    ModalUsernameElementObj.hide();


                    var caption = $('#captionData').val();
                    if (caption.length > 0) {
                        $('#caption-upload').val(caption);
                        ModalCaptionElementObj.show();
                    }

                    var location = $('#locationTextInput').val();
                    if (location.length > 0) {
                        $('#locationTextInputDisplay').val(location);
                        ModalLocationElementObj.show();
                    }

                    if (hashtags.length > 0) {
                        var modalMainHashTagHtml = '';
                        $.each(hashtags, function (key, hashTagValue) {

                            modalMainHashTagHtml += '<div class="btn-group btnspace " style="margin-right: 4px;">' +
                                    '<button type="button" class="btn btncolor" data-toggle="modal" data-target="#">' + hashTagValue + '</button>' +
                                    '<button type="button" style="height: 34px;" class="btn btncolor dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                    '</button></div>';
                        });

                        $('#mainHashTagDisplay').html(modalMainHashTagHtml);
                        ModalHashtagElementObj.show();
                    }

                    if (usernames.length > 0) {
                        var modalMainUsernameHtml = '';
                        $.each(usernames, function (key, value) {
                            modalMainUsernameHtml += '<div class="btn-group btnspace" style="margin-right: 4px;">' +
                                    '<button style="padding: 4px 0px 3px 5px; cursor:default;"  class="btn btncolor" data-toggle="modal" data-target="#" >' +
                                    '<img src="' + value.profile_pic + '" height="27px" width="30px" style="border-radius: 5px;"></button>' +
                                    '<button style="cursor:default;"  class="btn btncolor" data-toggle="modal" data-target="#">' + value.username + '</button>' +
                                    '<button type="button" style="height: 34px;" class="btn btncolor dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                    '</button></div>';

                        });

                        $('#mainUsernameDisplay').html(modalMainUsernameHtml);
                        ModalUsernameElementObj.show();
                    }

                    $('#scheduleTime').val('');
                    $('#myModal3').modal('show');
                }
            })

            $(document.body).on('click', '#schedule-post', function () {
                var scheduleObj = $('#scheduleTime');
                var scheduleTime = scheduleObj.val();

                if (scheduleTime.length == 0) {
                    scheduleObj.focus();
                    return false;
                }

                var instUserId = instaUserId;
                var base64Image = $('.dropify-render').find('img').attr('src');
                var caption = $('#captionData').val() || null;
                var location = (locations.length > 0) ? JSON.stringify(locations) : null;
                var hashtag = (hashtags.length > 0) ? hashtags.join(',') : null;
                var username = (usernames.length > 0) ? JSON.stringify(usernames) : null;

                $.ajax({
                    url: '/upload/post',
                    dataType: 'json',
                    method: 'post',
                    data: {
                        instaUserId: instUserId,
                        serviceType: 'SCHEDULE',
                        scheduleTime: scheduleTime,
                        user_timezone: timezone.name(),
                        base64Image: base64Image,
                        postType: 'I',
                        caption: caption,
                        location: location,
                        hashtags: hashtag,
                        usernames: username
                    },

                    beforeSend: function () {
                        $("body").addClass("loading");
                    },
                    complete: function (xhr, status) {
                        $("body").removeClass("loading");
                    },
                    success: function (response) {

                        if (response.status === 'success') {
                            $('#myModal3').modal('hide');
                            $('#customModal').modal('show');

                            var htmlModalSuccessData = '<img id="img-upload" src="/assets/user/images/success.png"> <br>' +
                                    '<strong style="font-size: x-large;">Awesome!</strong>' +
                                    '<h4>Your post has been scheduled successfully to post at ' + scheduleTime + '(Asia/Kolkata timezone)</h4>' +
                                    '<strong style="font-size: large;">Instructions</strong><br><br>' +
                                    '<span style="font-size: 18px;">Don\'t de-activate the account(s) until the post gets uploaded or else schedule will fail.</span><br>' +
                                    'click <a href="/show/scheduled/posts"> here </a> to modified scheduled post time';

                            $('#customModelData').html(htmlModalSuccessData);

                            $(".dropify-clear").trigger("click");
                            $('#captionData').val('');
                            $('#locationTextInput').val('');
                            locations = [];
                            $('.remove-hashtag-btn').remove();
                            hashtags = [];
                            $('.remove-username-btn').remove();
                            usernames = [];

                            scheduleObj.val('');

                        } else if (response.status === 'failed') {
                            var htmlText = '';
                            if (response.code == 422) {
                                $.each(response.message[0], function (key, value) {
                                    htmlText = htmlText + value['msg'] + '<br>';
                                });
                            } else {

                                $.each(response.message, function (key, value) {
                                    htmlText = htmlText + value + '<br>';
                                });
                            }

                            var htmlModalErrorData = '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                                    '<strong style="font-size: large;">Oops!</strong>' +
                                    '<h4>' + htmlText + '</h4>';

                            $('#customModelData').html(htmlModalErrorData);
                            $('#myModal3').modal('hide');
                            $('#customModal').modal('show');
                        }
                    },
                    error: function (error, response) {
                        console.log(error);
                    }
                });
            });
        });


    </script>


    <script type="text/javascript">

        var timezone = jstz.determine();
        console.log('Your timezone is: ' + timezone.name());


        $(document).ready(function () {
            $("#datetimepicker2").datetimepicker({
                format: "dd MM, yyyy HH:ii P",
                showMeridian: true,
                autoclose: true,
                todayBtn: true,
                enableOnReadonly: true,
                startDate: moment().format("YYYY-MM-DD HH:mm"),
                isRTL: Metronic.isRTL(),
                pickerPosition: (Metronic.isRTL() ? "top-right" : "top-left")
            });
        });


    </script>

@endsection

