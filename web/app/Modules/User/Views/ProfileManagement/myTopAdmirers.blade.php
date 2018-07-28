@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('active_profileManagement','active')

@section('headcontent')
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

        .programme-log-card .cuadro_intro_hover .caption-text {
            z-index: 10;
            color: #fff;
            position: absolute;
            height: 300px;
            text-align: center;
            top: -10px;
            width: 100%;
        }

        .programme-log-card .cuadro_intro_hover .caption {
            position: absolute;
            top: 150px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            width: 100%;
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
                            <span class="caption-subject font-green-sharp bold uppercase">My Top 20 Admire</span>
                            <span class="caption-helper">Top 20 users that gives me most comments and likes...</span>
                        </div>
                    </div>


                    <div class="portlet-body">
                        @if($status=='success')
                            @if(isset($data['accountList']) && !empty($data['accountList']))

                                <div class="row">
                                    <div id="accountSelection">

                                        <div class="col-md-4" style="margin-top: 10px;text-align: right;">
                                            <label for="instaUserId">Choose Account</label>
                                        </div>
                                        <div class="col-md-6" style="margin-top: 10px;">


                                            <select name="instaUserId" id="instaUserId" class="form-control"
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
                                                                @if($data['selectedUserId']==$value['ins_user_id']) selected @endif >
                                                            <div>
                                                                <img src="{{$value['profile_pic_url']}}"
                                                                     alt="Profile Pic">
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
                                </div>

                                @if($data['selectedUser']['time_period_left']==0)
                                    @if($data['selectedUser']['subscribe_type']=='DU')
                                        <div class="row text-center" style="margin-top: 20px;">
                                            <span style="color:red">Your trail period end. Upgrade your subscription to continue.</span>
                                        </div>
                                    @else
                                        <div class="row text-center" style="margin-top: 20px;">
                                            <span style="color:red">Your subscription period end. Upgrade your subscription to continue.</span>
                                        </div>
                                    @endif

                                @elseif($data['selectedUser']['is_logged_in']=='N' && $data['selectedUser']['is_user_disconnected']=='Y' )
                                    <div class="row text-center" style="margin-top: 20px;">
                                        <span style="color:red">This Account has been disconnected from Smartffic System!!! </span>
                                    </div>
                                @elseif($data['selectedUser']['status']=='I')
                                    <div class="row text-center" style="margin-top: 20px;">
                                        <span style="color:red">This Account is Inactive !!! Please Active this Account First </span>
                                    </div>
                                @endif

                                <hr>
                                <div class="row">
                                    @if(!empty($data['admireDetails']))

                                        <div class="programme-log-card container">
                                            <div class="row col-lg-12" id="manualFollowedUsers">
                                                @foreach($data['admireDetails'] as $key=>$value)
                                                    <div class="col-md-3 parentDiv">
                                                        <div class="cuadro_intro_hover "
                                                             style="background-color:#cccccc;">
                                                            <p style="text-align:center;">
                                                                <img src="{{$value['profile_pic_url']}}"
                                                                     class="img-responsive" alt="" style="width:100%;">
                                                            </p>
                                                            <div class="caption">
                                                                <div class="blur"></div>
                                                                <div class="caption-text">
                                                                    <h3 class="set truncate"
                                                                        style="text-transform: inherit; margin: 12px 0 7px;">

                                                                <span style="margin-bottom: 5px; width: 100%; float: left;">
                                                                    <a href="https://instagram.com/{{$value['username']}}"
                                                                       target="_blank">@ {{$value['username']}} </a>
                                                                </span><br>
                                                                        <span style="float: left; width: 100%; margin: 10px 0px 0px;">
                                                                     <p style="float: left; margin: 0px 0px 0px; font-size: 14px;">
                                                                         <i class="fa fa-user-plus"
                                                                            aria-hidden="true"></i>  &nbsp;
                                                                         Followers ({{ $value['followers_count']}})
                                                                     </p>
                                                                </span>

                                                                        <span style="float: left; width: 100%; margin:10px 0px 0px;">
                                                                     <p style="float: left; margin: 0px 0px 5px; font-size: 14px;">
                                                                         <h4 class="text-center"
                                                                             style="font-weight: 500; margin: 6px auto 0px; font-size: 13px;">Gives Most Likes & Comments</h4>
                                                                         <span class="pull-left"
                                                                               style="margin-left: 20px;">
                                                                             <label>Likes</label><br>
                                                                             <i class="fa fa-heart"
                                                                                aria-hidden="true"></i>
                                                                             {{$value['likes_count']}}
                                                                         </span>
                                                                         <span class="pull-right"
                                                                               style="margin-right: 20px;">
                                                                             <label>Comments</label><br>
                                                                             <i class="fa fa-comments"
                                                                                aria-hidden="true"></i>
                                                                             {{$value['comments_count']}}
                                                                         </span>

                                                                            </p>
                                                                </span>
                                                                    </h3>


                                                                    <a class="btn btn-default"
                                                                       style="background-color:#33cac2;color:#fff;"
                                                                       href="https://instagram.com/{{$value['username']}}"
                                                                       target="_blank">
                                                                        More Details
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <div class="programme-log-card container " id="manualFollowedUsers">
                                            <div class="col-md-12" style="text-align: center; padding: 59px 0px 56px;">
                                                No User
                                                Found !!!
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-12" style="text-align: center;margin-top: 30px">
                                        <input type="button" style="display: none;" class="btn btn-success"
                                               id="loadMoreBtn"
                                               value="Load More">

                                        <div id='loader' style='display: none; position:unset'>
                                            <img src='/assets/user/images/ajax-loader.gif' width='85px' height='85px'>
                                        </div>
                                    </div>
                                </div>
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
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    {{--{{//dd($data)}}--}}

@endsection

@section('pagejavascripts')

    <script src="/assets/user/js/toastr.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $(document.body).on('change', '#instaUserId', function (e) {
                e.preventDefault();
                window.location.href = '/top/admire/' + $(this).val();
            })
        });

    </script>


@endsection

