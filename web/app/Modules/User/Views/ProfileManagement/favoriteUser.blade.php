@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('active_profileManagement','active')

@section('headcontent')
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/user/css/sweetalert.css">
    <style>
        .custab {
            border: 1px solid #ccc;
            padding: 5px;
            margin: 5% 0;
            box-shadow: 3px 3px 2px #ccc;
            transition: 0.5s;
        }

        .custab:hover {
            box-shadow: 3px 3px 0px transparent;
            transition: 0.5s;
        }

        tr, th, td {
            border: 1px solid black;
        }


    </style>

    <style>
        .img_text2 {
            background-color: rgba(0, 0, 0, 0.5);
            bottom: 0;
            left: 0;
            max-height: 20px;
            min-height: 46px;
            position: absolute;
            width: 100%;
        }

        .padbot {
            padding-bottom: 15px;
        }

        .truncate {
            width: 160px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #fff;
        }

        .truncate a {
            color: #fff;
            text-decoration: none;
        }

        .dateTime {
            color: rgb(255, 255, 255);
            font-family: arial !important;
            padding: 5px 10px;
            margin: 2px 0px 0px;
            /*position: absolute;*/
            width: 100%;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            background: #444d58 none repeat scroll 0 0;
        }

        .socialarea {
            color: rgb(255, 255, 255);
            font-family: arial !important;
            padding: 5px 10px;
            margin: 2px 0px 0px;
            /*position: absolute;*/
            width: 100%;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            background: #444d58 none repeat scroll 0 0;
        }

        .socialarea a {
            text-decoration: none;
            color: #fff;
        }

        .socialarea a:hover {
            color: #ccc
        }

        .modal_scroll {
            height: 400px;
            overflow-y: scroll;
        }

        .modal-open {
            overflow-y: hidden !important;
        }

        .modal-header {
            background-color: #444D58;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }

        textarea {
            border-radius: 5px !important;
        }

        textarea:focus, textarea:hover {
            border: skyblue 1px solid !important;
            box-shadow: 0 0px 5px skyblue !important;
            border-radius: 5px;
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

    <!-- BEGIN PAGE CONTENT-->



    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">

            <div class="row">

                <!-- Begin: life time stats -->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bell font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Alert About favourite users</span>
                            <span class="caption-helper">manage users...</span>
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
                                        <span style="color:red">This Account has been disconnected from Smartffic System!!! </span>
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
                                        <span class="caption-helper">to Find and Add Favourite Users</span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    @if(isset($status) && $status=='success')

                                        {{--                                @if(isset($data['users']) && !empty($data['users']))--}}
                                        @if($data['logDetails']['pagination']['total_size']>0)
                                            <div class="programme-log-card container" style="margin-top: 10px">
                                                <div class="row col-lg-12" id="favoriteUserList">
                                                    @foreach($data['logDetails']['users'] as $key=>$value)
                                                        <div class="col-md-3 padbot">
                                                            <div class="cuadro_intro_hover "
                                                                 style="background-color:#cccccc;">
                                                                <p style="text-align:center;">
                                                                    <img src="{{$value['profile_pic_url']}}"
                                                                         class="img-responsive" alt=""
                                                                         style="width: 100%;">
                                                                </p>
                                                                <div class="img_text2">
                                                                    <div class="truncate"
                                                                         style="float:left;color:#fff;font-size:16px;margin-left: 10px; margin-top: 12px;">
                                                                        <a target="_blank"
                                                                           href="https://instagram.com/{{$value['for_user_name']}}">
                                                                            @ {{$value['for_user_name']}}</a>
                                                                    </div>
                                                                    <a href="javascript:;"
                                                                       class="pull-right confirm-delete"
                                                                       data-favoriteUserId="{{$value['favorite_profile_id']}}">
                                                                        <i class="fa fa-trash" aria-hidden="true"
                                                                           style="color:#fff;margin-right: 8px; margin-top: 18px;">

                                                                        </i>
                                                                    </a>
                                                                    <a href="#"
                                                                       class="pull-right alert-media"

                                                                       data-favoriteUserId="{{$value['favorite_profile_id']}}">

                                                                        @if($value['new_post_count']>0)
                                                                            <i class="fa fa-bell" aria-hidden="true"
                                                                               style="color:lightgreen; margin: 18px 8px 0 0;">
                                                                                <span id="newPostCount">({{$value['new_post_count']}}
                                                                                    )</span>
                                                                            </i>
                                                                        @else
                                                                            <i class="fa fa-bell" aria-hidden="true"
                                                                               style="color:#fff; margin: 18px 8px 0 0;">
                                                                                <span id="newPostCount">({{$value['new_post_count']}}
                                                                                    )</span>
                                                                            </i>
                                                                        @endif

                                                                    </a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <br>
                                                <br>

                                                <div class="col-md-12" style="text-align: center;margin-top: 30px">
                                                    <input type="button" style="display: none;" class="btn btn-success"
                                                           id="loadMoreBtn"
                                                           value="Load More">

                                                    <div id='loader' style='display: none; position:unset'>
                                                        <img src='/assets/user/images/ajax-loader.gif' width='85px'
                                                             height='85px'>
                                                    </div>
                                                </div>
                                            </div>

                                        @else
                                            <div class="read-more-show" id="noAccountFound">
                                                <h3>No Favorite User Found</h3>
                                            </div>

                                        @endif


                                    @else
                                        <div class="read-more-show">
                                            <h3>{{$message}}</h3>
                                        </div>
                                    @endif

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



    <!--modal for Programme mangemnet-->
    <div class="modal fade" id="notification" role="dialog">
        <div class="modal"><!-- Place at bottom of page --></div>
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content" style="background-color:#EFF3F8;">
                <div class="modal-header" style="background-color:#444D58;">
                    <h3 class="text-center" style="color:#fff;"><b>Latest Media Uploaded by favourite user</b></h3>
                </div>
                <div class="modal-body modal_scroll">
                    <div class="row">
                        <div class="col-lg-12" id="latestMediaData">

                        </div>

                        <div class="col-md-12" style="text-align: center;margin-top: 30px">
                            <input type="button" style="display: none;" class="btn btn-success"
                                   id="loadMoreMediaBtn"
                                   value="Load More">

                            <div id='mediaLoader' style='display: block; position:unset'>
                                <img src='/assets/user/images/ajax-loader.gif' width='85px'
                                     height='85px'>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal"><!-- this is for loading image --></div>
    <!-- END PAGE CONTENT-->
@endsection

@section('pagejavascripts')

    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/bootbox.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>
    <script src="/assets/user/js/moment.js"></script>

    <script type="text/javascript">
        toastr.options = {
            timeOut: 5000,
            extendedTimeOut: 100,
            tapToDismiss: true,
            debug: false,
            fadeOut: 10,
            positionClass: "toast-top-center"
        };


        var Pagination = {
            hasMoreData: false,
            limit: 12,
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
                Pagination['next_max_id'] = '<?php echo(isset($data['logDetails']['pagination']['next_max_id']) ? $data['logDetails']['pagination']['next_max_id'] : "") ?>' || null;
            }

            if (Pagination.hasMoreData) {
                $('#loadMoreBtn').show();
            } else {
                $('#loadMoreBtn').hide();
            }


            var loadMoreFavoriteUsers = function () {
                console.log(Pagination);
                processingAjax = true;
                $.ajax({
                    url: '/alert/about/favorite/users',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        insUserId: instaUserId,
                        pagination: {
                            limit: Pagination.limit,
                            next_max_id: Pagination.next_max_id
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

                            var favoriteUsersHtml = '';

                            if (response.data.pagination.result_size > 0) {

                                $.each(response.data.users, function (key, value) {

                                            favoriteUsersHtml += '<div class="col-md-3 padbot"><div class="cuadro_intro_hover " style="background-color:#cccccc;"><p style="text-align:center;">' +
                                                    '<img src="' + value['profile_pic_url'] + '" class="img-responsive" alt="" style="width: 100%;"></p>' +
                                                    '<div class="img_text2"><div class="truncate" style="float:left;color:#fff;font-size:16px;margin-left: 10px; margin-top: 12px;">' +
                                                    '<a target="_blank" href="https://instagram.com/' + value['for_user_name'] + '"> @ ' + value['for_user_name'] + '</a></div>' +
                                                    '<a href="javascript:;" class="pull-right confirm-delete" data-favoriteUserId="' + value['favorite_profile_id'] + '">' +
                                                    '<i class="fa fa-trash" aria-hidden="true" style="color:#fff;margin-right: 8px; margin-top: 18px;"></i></a>' +
                                                    '<a href="javascript:;" class="pull-right alert-media" data-toggle="modal" data-target="#notification" data-favoriteUserId="' + value['favorite_profile_id'] + '">';


                                            if (value['new_post_count'] > 0) {
                                                favoriteUsersHtml += '<i class="fa fa-bell" aria-hidden="true" style="color:lightgreen; margin: 18px 8px 0 0;"><span id="newPostCount">(' + value['new_post_count'] + ')</span></i>';
                                            } else {
                                                favoriteUsersHtml += '<i class="fa fa-bell" aria-hidden="true" style="color:#fff; margin: 18px 8px 0 0;"><span id="newPostCount">(' + value['new_post_count'] + ')</span></i>';
                                            }

                                            favoriteUsersHtml += '</a></div></div></div>';

                                        }
                                );

                                $("#favoriteUserList").append(favoriteUsersHtml);
                            }

                            if (response.data.pagination.has_more_data) {
                                Pagination.hasMoreData = true;
                                Pagination.limit = response.data.pagination.limit;
                                Pagination.next_max_id = response.data.pagination.next_max_id;
                            } else {
                                Pagination.hasMoreData = false;
                                Pagination.next_max_id = null;
                                $('#loader').hide();
                            }
                        }
                        else {
                            toastr.error('Error in serive!!! Please try again after sometime')
                        }
                        processingAjax = false;
                    },
                    error: function (error) {
                        console.log(error);
                        processingAjax = false;
                        toastr.error('Error in Network!!! Please try again after sometime')
                    }
                })
                ;
            }

            $(document.body).on('click', '#loadMoreBtn', function (e) {
                e.preventDefault();

                $(this).val('Loading...');

                if (Pagination.hasMoreData) {
                    $(this).hide();
                    loadMore = true;
                    loadMoreFavoriteUsers();
                }
            })


            $(document).scroll(function () {
                if (loadMore) {
                    if (!processingAjax) {
                        if (Pagination.hasMoreData) {
                            if ($(window).scrollTop() >= (($(document).height() - $(window).height() - 300))) {
                                $('#loader').show();
                                loadMoreFavoriteUsers();
                            }
                        }
                    }
                }
            });

        });

    </script>



    <script>
        var PaginationForLatestMedia = {
            hasMoreData: false,
            limit: 9,
            next_max_id: null
        };
        $(document).ready(function () {

            var loadMoreLatestMedia = false;
            var favoriteUserId = null;


            $(document.body).on('change', '#instaUserId', function (e) {
                e.preventDefault();
                window.location.href = '/alert/about/favorite/users/' + $(this).val();
            })


            $(document).on('click', '.confirm-delete', function (e) {
                var currentObj = $(this);
                bootbox.confirm({
                    message: "Do you really want to remove favorite user?",
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
                        console.log('This was logged in the callback: ' + result);

                        if (result) {

                            var favoriteUserId = currentObj.attr("data-favoriteUserId");

                            $.ajax({
                                url: '/delete/favorite/user',
                                type: 'post',
                                data: {favoriteUserId: favoriteUserId},
                                success: function (response) {

                                    if (JSON.parse(response).status == 'success') {
                                        toastr.success('Favorite users removed successfully.');
                                        currentObj.closest(".padbot").remove();

                                        var favoriteUserListObj = $("#favoriteUserList");

                                        if (favoriteUserListObj.children().length == 0) {
                                            favoriteUserListObj.html('<div class="read-more-show"><h3>No Favorite User Found</h3><div>');
                                        }
                                    } else {
                                        toastr.error('Error in serive!!! Please try again after sometime');
                                    }
                                },
                                error: function (error) {
                                    console.log(error);
                                }
                            });
                        }

                    }
                });


            })


            var loadLatsetMedia = function () {
                processingAjax = true;
                $.ajax({
                    url: '/alert/get/latest/media',
                    type: 'post',
                    data: {
                        favoriteUserId: favoriteUserId,
                        pagination: {
                            limit: PaginationForLatestMedia.limit,
                            next_max_id: PaginationForLatestMedia.next_max_id
                        }
                    },

                    beforeSend: function () {
                        $("#mediaLoader").show();
                    },
                    complete: function () {
                        $('#mediaLoader').hide();
                    },
                    success: function (response) {

                        response = JSON.parse(response);
                        if (response.code == 200) {
                            var latestMediaHtmlData = '';
                            if (response.status == 'success') {


                                console.log(response.data.media);

                                if (response.data.pagination.result_size > 0) {

                                    $.each(response.data.media, function (key, value) {
                                        latestMediaHtmlData += '<div class="col-md-4 col-sm-4 padbot"> <div class="dateTime"> <i class="fa fa-clock-o" aria-hidden="true"></i> ' + moment.unix(parseInt(value['created_at'])).format("D MMM, YYYY hh:mm A") + '<span class="pull-right">';

                                        if (value['media_type'] == 'I') {
                                            latestMediaHtmlData += '<i class="fa fa-photo" aria-hidden="true"></i>';
                                        } else {
                                            latestMediaHtmlData += '<i class="fa fa-video-camera" aria-hidden="true"></i>';
                                        }

                                        latestMediaHtmlData += '</span></div><a href="https://www.instagram.com/p/' + value['media_code'] + '/" target="_blank"> ' +
                                                '<img src="' + value['media_url'] + '" class="img-responsive" alt="" style="width: 100%; height: 200px;"></a>' +
                                                '<div class="socialarea"><a class="comments" href="javascript:;" data-favorite_profile_media_id="' + value['favorite_profile_media_id'] + '"><span class="media-comments-count">' + value['media_comments_count'] + '</span> <i class="fa fa-comment" aria-hidden="true"></i></a>' +
                                                '<a class="likes pull-right" href="javascript:;" data-favorite_profile_media_id="' + value['favorite_profile_media_id'] + '"><span class="media-likes-count">' + value['media_likes_count'] + '</span>';


                                        if (value['is_manual_like'] == 'Y') {
                                            latestMediaHtmlData += ' <i data-isManualLike="Y" style="color:#ff3939" class="fa fa-heart" aria-hidden="true"></i></a>';
                                        } else {
                                            latestMediaHtmlData += ' <i data-isManualLike="N" class="fa fa-heart" aria-hidden="true"></i></a>';
                                        }

                                        latestMediaHtmlData += '</div><a class="" href="javascript:;">';


                                        latestMediaHtmlData += '</a></div>';
                                    });
                                    updateMediaViewed(favoriteUserId);
                                }

                                if (response.data.pagination.has_more_data) {
                                    PaginationForLatestMedia.hasMoreData = true;
                                    PaginationForLatestMedia.limit = response.data.pagination.limit;
                                    PaginationForLatestMedia.next_max_id = response.data.pagination.next_max_id;
                                } else {
                                    PaginationForLatestMedia.hasMoreData = false;
                                    PaginationForLatestMedia.next_max_id = null;
                                    $('#mediaLoader').hide();
                                    $('#loadMoreMediaBtn').hide();
                                }
                            } else {
                                $('#loadMoreMediaBtn').hide();
                                latestMediaHtmlData += "<span>No Latest Media Found</span>";
//                                toastr.error('Error in serive!!! Please try again after sometime')
                            }
                            $("#latestMediaData").append(latestMediaHtmlData);
                        } else {
                            $('#loadMoreMediaBtn').hide();
                            toastr.error('Error in serive!!! Please try again after sometime')
                        }
                        processingAjax = false;

                    },
                    error: function (error) {
                        console.log(error);
                        processingAjax = false;
                        toastr.error('Error in Network!!! Please try again after sometime')
                    }
                });

            }

            var currentAlertMediaObj = null;
            $(document).on('click', '.alert-media', function (e) {
                e.preventDefault();

                var obj = $('#instaUserId option:selected');
                if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @"+obj.attr('data-username')+" Account has been disconnected from Smartffic System!!!</small>",
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

                    $('#notification').modal('show');

                    currentAlertMediaObj = this;

                    $("#latestMediaData").html('');
                    $('#loadMoreMediaBtn').show().val('Load More');

                    PaginationForLatestMedia.hasMoreData = false;
                    PaginationForLatestMedia.next_max_id = null;
                    PaginationForLatestMedia.limit = 9;
                    loadMoreLatestMedia = false;

                    var currentObj = $(this);
                    favoriteUserId = currentObj.attr("data-favoriteUserId");
                    loadLatsetMedia();
                }
            })


            $(document.body).on('click', '#loadMoreMediaBtn', function (e) {
                e.preventDefault();

                $(this).val('Loading...');

                if (PaginationForLatestMedia.hasMoreData) {
                    $(this).hide();
                    loadMoreLatestMedia = true;
                    loadLatsetMedia();
                }
            })


            $(".modal-body").scroll(function () {
                var scrollHeight = $("#latestMediaData").height();
                var contentFixedHeight = parseInt($(this).height());
                var scrollPositionHeight = $(this).scrollTop();

                if (loadMoreLatestMedia) {
                    if (!processingAjax) {
                        if (PaginationForLatestMedia.hasMoreData) {
                            if (((scrollHeight - 100) < (scrollPositionHeight + contentFixedHeight))) {
                                $('#mediaLoader').show();
                                loadLatsetMedia();
                            }
                        }
                    }
                }
            });


            var updateMediaViewed = function (favoriteUserId) {
                $.ajax({
                    url: '/alert/media/view/status',
                    type: 'post',
                    data: {favoriteUserId: favoriteUserId},
                    success: function (response) {
                        $(currentAlertMediaObj).find('#newPostCount').text('(0)');
                        console.log(response);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }


            $(document.body).on('click', '.likes', function (e) {
                e.preventDefault();
                var currentElementObj = $(this);
                var favorite_profile_media_id = currentElementObj.attr('data-favorite_profile_media_id');

                var isManualLike = currentElementObj.find("i").attr('data-isManualLike');
                if (isManualLike == 'N') {
                    $.ajax({
                        url: '/alert/media/like',
                        type: 'post',
                        data: {
                            instaUserId: instaUserId,
                            favoriteUserMediaId: favorite_profile_media_id
                        },
                        beforeSend: function () {
                            $("body").addClass("loading");
                        },
                        complete: function (xhr, status) {
                            $("body").removeClass("loading");
                        },
                        success: function (response) {
                            response = JSON.parse(response);
                            if (response.status == 'success') {
                                toastr.success(response.message);
                                currentElementObj.find("i").css('color', 'red');
                                currentElementObj.find("i").attr('data-isManualLike', 'Y');
                                currentElementObj.find(".media-likes-count").text(( parseInt(currentElementObj.find(".media-likes-count").text()) + 1))
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                } else {
                    $.ajax({
                        url: '/alert/media/unlike',
                        type: 'post',
                        data: {
                            instaUserId: instaUserId,
                            favoriteUserMediaId: favorite_profile_media_id
                        },
                        beforeSend: function () {
                            $("body").addClass("loading");
                        },
                        complete: function (xhr, status) {
                            $("body").removeClass("loading");
                        },
                        success: function (response) {
                            response = JSON.parse(response);
                            if (response.status == 'success') {
                                toastr.success(response.message);
                                currentElementObj.find("i").removeAttr('style');
                                currentElementObj.find("i").attr('data-isManualLike', 'N');
                                currentElementObj.find(".media-likes-count").text(( parseInt(currentElementObj.find(".media-likes-count").text()) - 1))
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            })


            $(document.body).on('click', '.comments', function (e) {
                e.preventDefault();
                var currentElementObj = $(this);

                var favorite_profile_media_id = currentElementObj.attr('data-favorite_profile_media_id');

                bootbox.prompt({
                    title: '<div style="text-align:center; color:white;"><i class="fa fa-edit" aria-hidden="true"></i> Write your comments</div>',

                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Cancel',
                            className: 'btn-danger'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Send'
                        }
                    },
                    inputType: 'textarea',
                    callback: function (result) {
                        console.log(result);
                        if (result != null) {

                            $.ajax({
                                url: '/alert/media/comment',
                                type: 'post',
                                data: {
                                    instaUserId: instaUserId,
                                    favoriteUserMediaId: favorite_profile_media_id,
                                    commentText: result
                                },

                                success: function (response) {
                                    response = JSON.parse(response);
                                    if (response.status == 'success') {
                                        toastr.success(response.message);
                                        currentElementObj.find(".media-comments-count").text(( parseInt(currentElementObj.find(".media-comments-count").text()) + 1))
                                    } else {
                                        toastr.error(response.message);
                                    }
                                },
                                error: function (error) {
                                    console.log(error);
                                }
                            });
                        }
                    }
                });
            });


        })

    </script>




@endsection

