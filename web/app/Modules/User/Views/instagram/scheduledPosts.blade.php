@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('headcontent')
        <!-- BEGIN PAGE LEVEL STYLES -->
<style>
    .error-msg {
        color: red;
    }

    .post-caption {
        color: rgba(24, 84, 75, 0.71);
        font-size: 22px;
        font-weight: 600;
        padding-left: 20px;
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

    .user-hastag p {
        height: 20px;
    }

    .programme-log-card .h3, h3{
        text-transform:none;
    }
</style>

<link href="/assets/user/user-panel/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"
      rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL STYLES -->
@endsection

@section('active_profileManagement','active')
@section('content')
    {{--PAGE CONTENT GOES HERE--}}


    <div class="page-content" style="min-height: 390px">
        <br>

        <div class="container">
            <h3 class=""><b style="color: #545456;">SMARTFFIC SCHEDULED POST</b>
                <i class="fa fa-twitch fa-2x" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>
            </h3>
            <br>
        </div>
        <br>


        <!--motivatinal images-->

        <div class="container" id="scheduledPostData"></div>
        <div class="modal"><!-- This is for loading image --></div>

    </div>


    <!-- Modal popup for Edit -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="margin: 71px auto;" id="uploadImage_modal">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal"><!-- Place at bottom of page --></div>

                    <div class="row">
                        <div class="col-sm-6">
                            <img id="img-edit" src="/assets/user/images/post-4.jpg" height="350px" width="290px">
                        </div>
                        <div class="col-sm-6">
                            <form role="form">
                                <div class="form-group">
                                    <label for="comment"
                                           style="font-size: 20px;font-weight: bold;color: #608983;">Text
                                        us:</label>
                                    <textarea class="form-control" rows="9"
                                              placeholder="message" id="caption-edit"></textarea>
                                </div>
                            </form>
                            <div class="btn-types inline">
                                <div class="input-group date form_datetime" id='datetimepicker2'>
                                    <input type="text" readonly class="form-control" id="reScheduleTime"
                                           style="font-size:13px" placeholder="Schedule Time">

                                    <span class="input-group-btn">
								<button class="btn default date-set" type="button"><i class="fa fa-calendar"></i>
                                </button>
							</span>
                                </div>
                                <br>
                                <button class="btn-post-now" onclick="postNow()">POST NOW
                                </button>
                                <button class="btn-RESCHEDULE" onclick="reSchedulePost()">RE-SCHEDULE
                                </button>
                            </div>
                        </div>

                        <div><span id="errorMessage" style="color:red; margin-left: 150px;"></span></div>
                    </div>
                </div>


                <div class="modal-footer modal-footer-bookmarks">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!--modal popup for Info-->
    <div id="infoModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" style="margin: 71px auto;">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 schedule-info">

                        </div>


                    </div>
                </div>

                <div class="modal-footer modal-footer-bookmarks">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



    <!-- Modal popup for delete scheduled post-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body modal-body-bookmarks text-center" id="deletedPostModal">
                    <p>Added Bookmark Successfully </p>
                    <i class="fa fa-bookmark" aria-hidden="true" style=" color: #ffc000; font-size: 26px;"></i>
                </div>
                <div class="modal-footer modal-footer-bookmarks">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



    <!--modal popup for edit scheduled post-->
    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <p>THIS IS FOR EDIT ICON </p>
                </div>
                <div class="modal-footer modal-footer-bookmarks">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



    <!--modal popup for displaying ajax response data-->
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

    @endsection

    @section('pagejavascripts')
            <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/assets/user/user-panel/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script src="/assets/user/js/loadingoverlay.js"></script>
    <script src="/assets/user/js/jstz.min.js"></script>
    <script src="/assets/user/js/moment.js"></script>
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
                pickerPosition: (Metronic.isRTL() ? "bottom-right" : "bottom-left")
            });
            showScheduledPost();
        });

        var showScheduledPost1 = function () {

            {{--$.ajax({--}}
            {{--url: '/show/scheduled/posts',--}}
            {{--dataType: 'json',--}}
            {{--method: 'post',--}}
            {{--beforeSend: function () {--}}
            {{--$("body").addClass("loading");--}}
            {{--},--}}
            {{--complete: function (xhr, status) {--}}
            {{--$("body").removeClass("loading");--}}
            {{--},--}}

            {{--success: function (response) {--}}

            {{--if (response.status === 'success') {--}}
            {{--if (response.data) {--}}
            {{--var scheduledPostHtml = '<div class="row">';--}}
            {{--$.each(response.data, function (key, value) {--}}

            {{--scheduledPostHtml += ' <div class="col-sm-3"><div class="profile-header-container">' +--}}
            {{--'<div class="profile-header-img" style="padding-bottom: 20px !important;padding: 0px;">' +--}}
            {{--'<a href="#" target="_blank"><img title="' + value.media_caption + '" class="img-responsive" src="' + value.media_url + '"/></a>' +--}}
            {{--'<div class="rank-label-container">' +--}}
            {{--'<span class="label label-default edit"><a href="#editModal" class="editPost" data-toggle="modal"  data-mediaId-edit="' + value.media_id + '" data-caption-edit="' + value.media_caption + ' "  data-img-edit="' + value.media_url + '"  data-scheduleTime-edit="' + moment.unix(parseInt(value.media_schedule_time)).format("D MMM, YYYY hh:mm A") + '">' +--}}
            {{--'<i class="fa fa-pencil-square" aria-hidden="true"></i></a></span>' +--}}
            {{--'<span class="label label-default post"><a  href="#infoModal" class="postInfo" data-toggle="modal"  data-caption-upload="' + value.media_caption + '" data-img-upload="' + value.media_url + '"  class="post-content"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i></a></span>' +--}}
            {{--'<span class="label label-default download"><a  href="' + value.media_url + '" title="Download" download="image.jpg"><i class="fa fa-download" aria-hidden="true"></i></a></span>' +--}}
            {{--'<span class="label label-default bookmark"><a href="#" class="delete_scheduled_post" data-toggle="myModal" data-username="' + value.for_ins_username + '" data-mediaId="' + value.media_id + '" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>' +--}}
            {{--'</div></div>' +--}}
            {{--'<div class="user-hastag">' +--}}
            {{--'<a href="https://www.instagram.com/' + value.for_ins_username + '">@ ' + value.for_ins_username + '</a>' +--}}
            {{--'<p> ' + value.media_caption + ' </p>' +--}}
            {{--'<span class="overflow-closed">' +--}}
            {{--'<i class="fa fa-clock-o" aria-hidden="true" style="padding-right:2px"></i>' +--}}
            {{--'<span>' + moment.unix(parseInt(value.media_schedule_time)).format("D MMM, YYYY hh:mm A") + '</span></span>' +--}}
            {{--'</div></div></div>';--}}

            {{--if ((key + 1) % 4 == 0) {--}}
            {{--scheduledPostHtml += '</div><div class="row">';--}}
            {{--}--}}
            {{--});--}}
            {{--scheduledPostHtml += '</div>';--}}
            {{--$('#scheduledPostData').html(scheduledPostHtml);--}}
            {{--} else {--}}
            {{--$.LoadingOverlay("hide");--}}
            {{--$('#scheduledPostData').html('<span style="text-align: center;"><h3 >No Scheduled Post Found</h3></span>');--}}
            {{--}--}}

            {{--} else if (response.status === 'failed') {--}}
            {{--console.log(response.message);--}}
            {{--$.LoadingOverlay("hide");--}}
            {{--$('#scheduledPostData').html('<span style="text-align: center;"><h3 >No Scheduled Post Found</h3></span>');--}}
            {{--}--}}
            {{--},--}}

            {{--error: function (error, response) {--}}

            {{--console.log(error);--}}
            {{--}--}}
            {{--});--}}

        };
        var showScheduledPost = function () {

            $.ajax({
                url: '/show/scheduled/posts',
                dataType: 'json',
                method: 'post',
                beforeSend: function () {
                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
                    $("body").removeClass("loading");
                },

                success: function (response) {

                    if (response.status === 'success') {
                        if (response.data) {
                            var scheduledPostHtml = '<div class="row">';
                            $.each(response.data, function (key, value) {

                                scheduledPostHtml += ' <div class="col-sm-3"><div class="profile-header-container">' +
                                        '<div class="profile-header-img" style="padding-bottom: 20px !important;padding: 0px;">' +
                                        '<a href="#" target="_blank"><img title="' + value.media_caption + '" class="img-responsive" src="' + value.media_url + '"/></a>' +
                                        '<div class="rank-label-container">' +
                                        '<span class="label label-default edit"><a href="#editModal" class="editPost" data-toggle="modal"  data-mediaId-edit="' + value.media_id + '" data-caption-edit="' + value.media_caption + ' "  data-img-edit="' + value.media_url + '"  data-scheduleTime-edit="' + moment.unix(parseInt(value.media_schedule_time)).format("D MMM, YYYY hh:mm A") + '">' +
                                        '<i class="fa fa-pencil-square" aria-hidden="true"></i></a></span>' +
                                        '<span class="label label-default post"><a class="postInfo" data-media-schedule-time="' + value.media_schedule_time + '" data-media-added-time="' + value.created_at + '" data-toggle="modal"  data-username="' + value.for_ins_username + '" data-caption-upload="' + value.media_caption + '" data-img-upload="' + value.media_url + '"  class="post-content"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i></a></span>' +
                                        '<span class="label label-default download"><a  href="' + value.media_url + '" title="Download" download="image.jpg"><i class="fa fa-download" aria-hidden="true"></i></a></span>' +
                                        '<span class="label label-default bookmark"><a href="#" class="delete_scheduled_post" data-toggle="myModal" data-username="' + value.for_ins_username + '" data-mediaId="' + value.media_id + '" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>' +
                                        '</div></div>' +
                                        '<div class="user-hastag">' +
                                        '<a href="https://www.instagram.com/' + value.for_ins_username + '">@ ' + value.for_ins_username + '</a>' +
                                        '<p> ' + value.media_caption + ' </p>' +
                                        '<span class="overflow-closed">' +
                                        '<i class="fa fa-clock-o" aria-hidden="true" style="padding-right:2px"></i>' +
                                        '<span>' + moment.unix(parseInt(value.media_schedule_time)).format("D MMM, YYYY hh:mm A") + '</span></span>' +
                                        '</div></div></div>';

                                if ((key + 1) % 4 == 0) {
                                    scheduledPostHtml += '</div><div class="row">';
                                }
                            });
                            scheduledPostHtml += '</div>';
                            $('#scheduledPostData').html(scheduledPostHtml);
                        } else {
                            $.LoadingOverlay("hide");
                            $('#scheduledPostData').html('<span style="text-align: center;"><h3 >No Scheduled Post Found</h3></span>');
                        }

                    } else if (response.status === 'failed') {
                        console.log(response.message);
                        $.LoadingOverlay("hide");
                        $('#scheduledPostData').html('<span style="text-align: center;"><h3 >No Scheduled Post Found</h3></span>');
                    }
                },

                error: function (error, response) {

                    console.log(error);
                }
            });

        };

        var oldPostedData = {
            oldScheduleTime: null,
            media_id: null,
            media_caption: null,
            username: null
        };

        $(document.body).on('click', '.editPost', function (e) {
            e.preventDefault();
            $('#img-edit').attr('src', $(this).attr('data-img-edit'));
            $('#caption-edit').text($(this).attr('data-caption-edit'));
            var reScheduleTime = $('#reScheduleTime');
            reScheduleTime.val('');
            reScheduleTime.attr('placeholder', $(this).attr('data-scheduleTime-edit'));
            $('#errorMessage').text();

            oldPostedData.oldScheduleTime = $(this).attr('data-scheduleTime-edit');
            oldPostedData.media_id = $(this).attr('data-mediaId-edit');
            oldPostedData.media_caption = $(this).attr('data-caption-edit');
        });

        var postNow = function () {
            var mediaId = parseInt(oldPostedData.media_id);
            var caption = $('#caption-edit').val();
            if (mediaId == null) {
                $('#customModal').modal('show');
                var htmlModalErrorData = '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                        '<strong style="font-size: large;">Oops!</strong>' +
                        '<h3>Error in  Uploading Post</h3>';
                $('#customModelData').html(htmlModalErrorData);
                return false;
            }

            $.ajax({
                url: '/upload/image',
                dataType: 'json',
                method: 'post',
                data: {
                    serviceType: 'SCHEDULE',
                    mediaId: mediaId,
                    caption: caption
                },
                beforeSend: function () {
                    $('.btn-post-now').attr('disabled', true);
                    $('.btn-RESCHEDULE').attr('disabled', true);
                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
//
                    $('.btn-post-now').attr('disabled', false);
                    $('.btn-RESCHEDULE').attr('disabled', false);
                    $("body").removeClass("loading");
                },

                success: function (response) {
                    $('#editModal').modal('hide');
                    $('#customModal').modal('show');

                    if (response.status === 'success') {
                        var htmlModalSuccessData = '';

                        if (response.code == 404) {
                            htmlModalSuccessData += '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                                    '<strong style="font-size: large;">Oops!</strong>';
                        } else {
                            htmlModalSuccessData = '<img id="img-upload" src="/assets/user/images/success.png"> <br>' +
                                    '<strong style="font-size: large;">Awesome!</strong>';
                        }

                        if (response.data.successArray.length != 0) {
                            htmlModalSuccessData += '<h3>Post Uploaded Successfully</h3>';
                            $.each(response.data.successArray, function (key, value) {
                                htmlModalSuccessData += '<br><i style="color: green; margin-right: 10px;" class="fa fa-check"></i>';
                                htmlModalSuccessData += '<span style="font-size: 20px;">' + value.instaUsername + '</span>';
                                htmlModalSuccessData += '<a href="' + value.media_details.insta_url + '" target="_blank">&nbsp;&nbsp;View </a>uploaded post in Instagram';
                            });
                        }

                        if (response.data.errorArray.length != 0) {
                            htmlModalSuccessData += '<br><h3>Post Uploading Failed</h3>';
                            $.each(response.data.errorArray, function (key, value) {
                                htmlModalSuccessData += '<br><i style="color: red; margin-right: 10px;" class="fa fa-times"></i>';
                                htmlModalSuccessData += '<span style="font-size: 20px;">@' + value.instaUsername + '</span> <br>  <span>Message : ' + value.message + '</span>&nbsp;';
                                htmlModalSuccessData += (value.lock != null && value.lock == true) ? '<a href="' + value.checkpoint_url + '" target="_blank"> Click here </a>to verify this account' : '';
                            });
                        }

                        $('#customModelData').html(htmlModalSuccessData);
                        showScheduledPost();

                    } else if (response.status === 'failed') {

                        var htmlModalErrorData = '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                                '<strong style="font-size: large;">Oops!</strong>';
                        $.each(response.message, function (key, value) {
                            htmlModalErrorData += '<h3>' + value + '</h3>';
                        });
                        $('#customModelData').html(htmlModalErrorData);
                    }
                },
                error: function (error, response) {
                    console.log(error);
                }
            });
        }

        var reSchedulePost = function () {

            var oldScheduleTime = oldPostedData.oldScheduleTime;
            var mediaId = oldPostedData.media_id;
            var reScheduleTime = $('#reScheduleTime').val();
            var caption = $('#caption-edit').val();

            console.log(caption);


            if (reScheduleTime.length == 0) {
                $('#reScheduleTime').focus();
                return false;
            }

            if (oldScheduleTime == reScheduleTime) {
                $('#errorMessage').text('Re-Schedule Time should be same as previous Schedule time');
                $('#reScheduleTime').focus();
                return false;
            }

            $.ajax({
                url: '/re/schedule/post',
                dataType: 'json',
                method: 'post',
                data: {
                    mediaId: mediaId,
                    caption: caption,
                    reScheduleTime: reScheduleTime,
                    user_timezone: timezone.name()
                },
                beforeSend: function () {
//
                    $('.btn-post-now').attr('disabled', true);
                    $('.btn-RESCHEDULE').attr('disabled', true);
                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
                    $('.btn-post-now').attr('disabled', false);
                    $('.btn-RESCHEDULE').attr('disabled', false);
                    $("body").removeClass("loading");
                },
                success: function (response) {
                    $('#editModal').modal('hide');
                    $('#customModal').modal('show');
                    var htmlModalData = '';
                    if (response.status === 'success') {
                        htmlModalData += '<img id="img-upload" src="/assets/user/images/success.png"> <br>' +
                                '<strong style="font-size: large;">Awesome!</strong>' +
                                '<h3>' + response.message + '</h3>';
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
                        htmlModalData += '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                                '<strong style="font-size: large;">Oops!</strong>' +
                                '<h4>' + htmlText + '</h4>';
                    }
                    $('#customModelData').html(htmlModalData);
                    showScheduledPost();
                },
                error: function (error, response) {
                    console.log(error);
                }
            });
        }

        $(document.body).on('click', '.delete_scheduled_post', function (e) {
            e.preventDefault();

            var mediaId = $(this).attr('data-mediaId');
            var username = $(this).attr('data-username');
            $.ajax({
                url: '/delete/scheduled/post',
                dataType: 'json',
                method: 'post',
                data: {mediaId: mediaId},

                beforeSend: function () {
                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
                    $("body").removeClass("loading");
                },

                success: function (response) {
                    console.log(response);
                    if (response.status === 'success') {

                        var successMyModalData = '<p>Scheduled post deleted Successfully for this user @ ' + username + '</p>' +
                                '<i class="fa fa-trash" aria-hidden="true" style=" color: #ffc000; font-size: 26px;"></i>';

                        $('#deletedPostModal').html(successMyModalData);
                        $('#myModal').modal('show');
                        showScheduledPost();

                    } else if (response.status === 'failed') {

                        $('#customModal').modal('show');
                        var errorModalData = '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                                '<strong style="font-size: large;">Oops!</strong>' +
                                '<h3>' + response.message + '</h3>';
                        $('#customModelData').html(errorModalData);
                        //TODO add toastr for displaying  error message
                    }
                },
                error: function (error, response) {
                    console.log(error);
                }
            });

        })

        $(document.body).on('click', '.postInfo', function (e) {


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

            var prefix = function (value) {
                return (value > 0) ? 's' : '';
            }

            function convertDateTimeFormat(sec) {
                var daysInMonth = moment().startOf('month').daysInMonth();
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

            var userName = $(this).attr('data-username');
            var caption = $(this).attr('data-caption-upload');
            var created_at = $(this).attr('data-media-added-time');
            var media_schedule_time = $(this).attr('data-media-schedule-time');

            var AddedDate = (moment.unix(parseInt(created_at)).format("D MMMM, YYYY"))
            var AddedTime = (moment.unix(parseInt(created_at)).format("hh:mm A"));
            var scheduleTime = (moment.unix(parseInt(media_schedule_time)).format("hh:mm A"));
            var scheduleDate = (moment.unix(parseInt(media_schedule_time)).format("D MMMM, YYYY"));
            console.log('media_schedule_time', media_schedule_time)
            console.log('Date.now()', Date.now())
            var diff = media_schedule_time - Math.floor(Date.now() / 1000);
//            var diff = moment.duration(moment(media_schedule_time).diff(moment(Date.now())));
            var days = '';
            if (diff > 0) {

                days = convertDateTimeFormat(diff);
            } else {
                days = 'Expired';
            }

            $('.schedule-info').empty();
            var htmlData = ' <div class="sched_bg"> <label class="sched_text">Added On</label> ' +
                    '<label>' + AddedDate + '</label> </div> <div class="sched_bg">' +
                    ' <label class="sched_text">Scheduled Time</label> <label>' + scheduleTime + '</label>' +
                    ' </div> <div class="sched_bg"> <label class="sched_text">Scheduled Date</label>' +
                    ' <label>' + scheduleDate + '</label> </div> <div class="sched_bg"> ' +
                    '<label class="sched_text">Time Left</label> <label>' + days + '</label> ' +
                    '</div> <h4><b>User Details:</b></h4> ' +
                    '<p style="margin-bottom:0;"><b>UserName: </b><span>' + userName + '</span></p> ';

            if (caption !== 'null' && (caption !== null || caption.length > 0 )) {
                htmlData += '<b>Caption: </b><span>' + caption + '</span>';
            }

            $('.schedule-info').append(htmlData);
            $('#infoModal').modal('show');


        });
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
@endsection