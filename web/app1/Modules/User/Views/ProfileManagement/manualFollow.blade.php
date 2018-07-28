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
                            <i class="fa fa-cogs fa-2x font-green-sharp" aria-hidden="true"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Who Didn't Follow me Back</span>
                            <span class="caption-helper">Manage details...</span>
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
                                        <span style="color:red">This Account has been disconnected from Instaffic System!!! </span>
                                    </div>
                                @elseif($data['selectedUser']['status']=='I')
                                    <div class="row text-center" style="margin-top: 20px;">
                                        <span style="color:red">This Account is Inactive !!! Please Active this Account First </span>
                                    </div>
                                @endif


                                <hr>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: center">
                                        <a target="_blank" href="/instagramFinder">Click Here</a>
                                        <span class="caption-helper">to Find and Follow Users</span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    @if($data['logDetails']['log_stat']['totalRecord']>0)


                                        <div class="col-md-12" style="align-items: center; margin-bottom: 30px;">
                                            <div class="col-md-3  col-md-offset-3">
                                                <div class="dashboard-stat2"
                                                     style="margin-bottom: 0px; padding: 15px; border: 1px solid #ccc;">
                                                    <div class="display">
                                                        <div class="number">
                                                            <div class="icon">
                                                                {{--<i class="icon-pie-chart"></i>--}}
                                                                <img src="/assets/user/user-panel/img/follow_back.png"
                                                                     class="img-responsive"
                                                                     style="float: left; width: 28px;">
                                                            </div>
                                                            <h3 class="font-green-sharp">
                                                        <span data-counter="counterup" id="followed_count"
                                                              data-value="7800">{{$data['logDetails']['log_stat']['followed_count']}}</span>
                                                            </h3>
                                                            <small>Who Didn't Follow Me Back</small>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="dashboard-stat2"
                                                     style="margin-bottom: 0px; padding: 15px; border: 1px solid #ccc;">
                                                    <div class="display">
                                                        <div class="number">
                                                            <div class="icon">
                                                                <img src="/assets/user/user-panel/img/followers_back.png"
                                                                     class="img-responsive"
                                                                     style="float: left; width: 28px;">
                                                            </div>
                                                            <h3 class="font-red-haze">
                                                        <span data-counter="counterup"
                                                              data-value="1349">{{$data['logDetails']['log_stat']['followers_count']}}</span>
                                                            </h3>
                                                            <small>Who Did Follow Me Back</small>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>



                                        <div class="programme-log-card container">
                                            <div class="row col-lg-12" id="manualFollowedUsers">
                                                @foreach($data['logDetails']['logs'] as $key=>$value)
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
                                                                        style="text-transform: inherit;">

                                                                <span>
                                                                    <a href="https://instagram.com/{{$value['username']}}"
                                                                       target="_blank">@ {{$value['username']}} </a>
                                                                </span><br>
                                                                        <span style="float: left; width: 100%; margin: 24px 0px 0px;">
                                                                     <p style="float: left; margin: 0px 0px 23px; font-size: 17px;">
                                                                         <i class="fa fa-user-plus"
                                                                            aria-hidden="true"></i>  &nbsp;
                                                                         Followers ({{$value['followers_count']}})
                                                                     </p>
                                                                </span>
                                                                    </h3>
                                                                    <button class="btn btn-default unfollowUser"
                                                                            type="button"
                                                                            style="background-color:#33cac2;color:#fff;"
                                                                            data-id="{{$value['manual_follow_id']}}">
                                                                        Unfollow
                                                                    </button>

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
                                                No
                                                Followed User Found !!!
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
                                    <img src="/assets/user/images/warning_yellow.png" alt="" width="100">
                                    <br><br>
                                    <div style="padding:12px;">No Instagram Account Added !!!
                                        <br>
                                        Please Add Atleast one Account
                                        <br><br> <br>
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
        <div class="modal"><!— this is for loading image —></div>
    </div>
    <!-- END PAGE CONTENT -->
    {{--{{//dd($data)}}--}}

@endsection

@section('pagejavascripts')
    <script src="/assets/user/js/bootbox.min.js"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>
    <script src="/assets/user/js/loadingoverlay.js"></script>

    <script type="text/javascript">
        var Pagination = {
            hasMoreData: false,
            offset: 1,
            limit: 20,
            next_max_id: null
        };

        var instaUserId = null;
        var loadMore = false;
        var processingAjax = false;
        $(document).ready(function () {

            var isDataPresent = ('<?php echo (isset($data['logDetails']['pagination']['has_more_data']) && $data['logDetails']['pagination']['has_more_data'] == true) ? 1 : 0?>');

            if (isDataPresent) {

                instaUserId = '<?php if (isset($data['selectedUserId'])) echo($data['selectedUserId']); ?>' || null;
                Pagination['hasMoreData'] = (parseInt('<?php echo (isset($data['logDetails']['pagination']['has_more_data']) && $data['logDetails']['pagination']['has_more_data'] == true) ? 1 : 0?>')) ? true : false;
                Pagination['offset'] = parseInt('<?php echo(isset($data['logDetails']['pagination']['offset']) ? $data['logDetails']['pagination']['offset'] : 0) ?>') + 1;
                Pagination['limit'] = parseInt('<?php echo(isset($data['logDetails']['pagination']['limit']) ? $data['logDetails']['pagination']['limit'] : 20) ?>');
                Pagination['next_max_id'] = '<?php echo(isset($data['logDetails']['pagination']['next_max_id']) ? $data['logDetails']['pagination']['next_max_id'] : "") ?>';
            }

            if (Pagination.hasMoreData) {
                $('#loadMoreBtn').show();
            } else {
                $('#loadMoreBtn').hide();
            }

            $(document.body).on('click', '#loadMoreBtn', function (e) {
                e.preventDefault();

                $(this).val('Loading...');

                if (Pagination.hasMoreData) {
                    $(this).hide();
                    loadMore = true;
                    loadMoreLogDetails();
                }
            })

            var loadMoreLogDetails = function () {
                processingAjax = true;
                $.ajax({
                    url: '/get/manual/follow',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        pagination: {
                            offset: Pagination.offset,
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
                        console.log(response);
                        if (response.status == 'success') {

                            var manualFollowedUsersHtml = '';

                            if (response.data.pagination.result_size > 0) {

                                $.each(response.data.logs, function (key, value) {

                                    manualFollowedUsersHtml += ' <div class="col-lg-3 parentDiv"><div class="cuadro_intro_hover " style="background-color:#cccccc;"> ' +
                                            '<p style="text-align:center;"><img src="' + value['profile_pic_url'] + '" class="img-responsive" alt="" style="width:100%;"></p>' +
                                            '<div class="caption"><div class="blur"></div><div class="caption-text"><h3 class="set truncate" style="text-transform: inherit;">' +
                                            '<span><a href="https://instagram.com/' + value['username'] + '"  target="_blank">@ ' + value['username'] + '</a></span><br>' +
                                            '<span style="float: left; width: 100%; margin: 24px 0px 0px;"><p style="float: left; margin: 0px 0px 23px; font-size: 17px;"><i class="fa fa-user-plus" aria-hidden="true">' +
                                            '</i>  &nbsp; Followers (' + value['followers_count'] + ')</p></span></h3>' +
                                            '<button class="btn btn-default unfollowUser" type="button" style="background-color:#33cac2;color:#fff;"  data-id="' + value['manual_follow_id'] + '">Unfollow</button>' +
                                            '<a class="btn btn-default" style="background-color:#33cac2;color:#fff;" href="https://instagram.com/' + value['username'] + '" target="_blank">More Details</a>' +
                                            '</div></div></div></div>';

                                });

                                $("#manualFollowedUsers").append(manualFollowedUsersHtml);
                            }

                            if (response.data.pagination.has_more_data) {
                                Pagination.hasMoreData = true;
                                Pagination.next_max_id = response.data.pagination.next_max_id;
                                Pagination.offset = Pagination.offset + 1;
//                            $('#loader').show();
                            } else {
                                Pagination.hasMoreData = false;
                                Pagination.next_max_id = null;
                                Pagination.offset = 1;
//                            $('#loadMoreBtn').hide();
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

            $(document).scroll(function () {
                if (loadMore) {

                    if (!processingAjax) {
                        if (Pagination.hasMoreData) {
                            if ($(window).scrollTop() >= (($(document).height() - $(window).height() - 300))) {
                                $('#loader').show();
                                loadMoreLogDetails();
                            }
                        }
                    }
                }
            });


            $(document.body).on('change', '#instaUserId', function (e) {
                e.preventDefault();
                window.location.href = '/get/manual/follow/' + $(this).val();
            })

            $(document).on('click', '.unfollowUser', function (e) {
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
                    var currentObj = $(this);
                    bootbox.confirm({
                        message: "Do you really want to unfollw this user?",
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
                                var manualFollowId = currentObj.attr('data-id');
                                $.ajax({
                                    url: '/unfollow/manual/followed/user',
                                    method: 'post',
                                    dataType: 'json',
                                    data: {followedId: manualFollowId},
                                    beforeSend: function () {
                                        $("body").addClass("loading");
                                    },
                                    complete: function () {
                                        $("body").removeClass("loading");
                                    },
                                    success: function (response) {
                                        if (response.status == 'success') {
                                            var followedCount = $('#followed_count');
                                            followedCount.text((parseInt(followedCount.text()) - 1));
                                            toastr.success('Unfollowed user successfully.')
                                            currentObj.closest('.parentDiv').hide();
                                        } else {
                                            toastr.error(response.message)
                                        }
                                    }
                                });
                            }
                        }
                    });
                }
            })
        });

    </script>


@endsection

