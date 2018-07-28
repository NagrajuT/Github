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
            <h3 class=""><b style="color: #545456;">SMARTFFIC POST BOOKMARK</b>
                <i class="fa fa-twitch fa-2x" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>
            </h3>
            <br>
        </div>
        <br>


        <!--motivatinal images-->
        <div class="container" id="bookmarkContent"></div>

        <div class="modal"><!-- This is for loading image --></div>

    </div>
    <!-- Modal popup for bookmarks-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body modal-body-bookmarks">
                    <p>Bookmark Removed Successfully
                        <i class="fa fa-check" aria-hidden="true"
                           style=" color: #ffc000; font-size: 26px; margin-top: 10px;  padding-left: 117px;"></i>
                    </p>
                </div>
                <div class="modal-footer modal-footer-bookmarks">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!--modal popup for edit-->
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

    <!--modal popup for post or upload-->
    <div id="betaModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="margin: 71px auto;" id="uploadImage_modal">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal"><!-- Place at bottom of page --></div>

                    <div class="row">
                        <input type="hidden" id="bookmarkId"/>

                        <div class="col-sm-6">
                            <img id="img-upload" src="/assets/user/images/post-4.jpg" width="290px">
                        </div>
                        <div class="col-sm-6">
                            <form role="form">
                                <div class="form-group">
                                    <label for="comment"
                                           style="font-size: 20px;font-weight: bold;color: #608983;">Text
                                        us:</label>
                                    <textarea class="form-control" rows="9"
                                              placeholder="message" id="caption-upload"></textarea>
                                </div>
                            </form>
                            <div class="btn-types inline">
                                <div class="input-group date form_datetime" id='datetimepicker2'>
                                    <input type="text" readonly class="form-control" id="scheduleTime"
                                           style="font-size:13px" placeholder="Schedule Time">
                                    <span class="input-group-btn">
								<button class="btn default date-set" type="button"><i class="fa fa-calendar"></i>
                                </button>
							</span>
                                </div>
                                <br>
                                <button class="btn-post-now" onclick="uploadPostNow()">POST NOW</button>
                                <button class="btn-SCHEDULE" onclick="schedulePost()">SCHEDULE
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer modal-footer-bookmarks">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade bs-modal-md" id="customModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
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
            showBookmarkPost();
        });

        var showBookmarkPost = function () {

            $.ajax({
                url: '/show/bookmarked/posts',
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
                            var bookmarkContentsHtml = '<div class="row">';
                            $.each(response.data, function (key, value) {

                                bookmarkContentsHtml += ' <div class="col-sm-3"><div class="profile-header-container">' +
//                                        '<div class="profile-header-img" style="padding-bottom: 20px !important;padding: 0px;"><a href="' + value.insa_post_url + '" target="_blank"><img title="' + value.post_caption + '" class="img-responsive" src="' + value.insa_post_url + '"/></a>' +
                                        '<div class="profile-header-img" style="padding-bottom: 20px !important;padding: 0px;"><a href="<?php echo(env('API_URL').'/')?>' + value.post_url + '" target="_blank"><img title="' + value.post_caption + '" class="img-responsive" src="<?php echo(env('API_URL').'/')?>' + value.post_url + '"/></a>' +
                                        '<div class="rank-label-container">' +
//                                        '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" data-caption-upload="' + value.post_caption + '" data-img-upload="' + value.insa_post_url + '"  class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +
                                        '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" data-post_bookmark_id="' + value.post_bookmark_id + '" data-caption-upload="' + value.post_caption + '" data-img-upload="<?php echo(env('API_URL').'/')?>' + value.post_url + '"  class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +
                                        '<span class="label label-default download"><a  href="' + value.insa_post_url + '" title="Download" download="image.jpg"><i class="fa fa-download" aria-hidden="true"></i></a></span>' +
                                        '<span class="label label-default bookmark"><a href="#" data-toggle="modal" class="delete_bookmarked_post" data-post_bookmark_id="' + value.post_bookmark_id + '" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>' +
                                        '</div></div>' +
                                        '<div class="user-hastag">' +
                                        '<p> ' + value.post_caption + ' </p>' +
                                        '</div></div></div>';

                                if ((key + 1) % 4 == 0) {
                                    bookmarkContentsHtml += '</div><div class="row">';
                                }
                            });
                            bookmarkContentsHtml += '</div>';

                            $('#bookmarkContent').html(bookmarkContentsHtml);
                        } else {
                            $.LoadingOverlay("hide");
                            $('#bookmarkContent').html('<span style="text-align: center;"><h3 >No Bookmark found</h3></span>');
                        }


                    } else if (response.status === 'failed') {
                        var htmlText = '';
                        $.each(response.message, function (key, value) {
                            htmlText += value;
                        });
                        $('#errorAddAccountMessage').text(htmlText);

                        //TODO add toastr for displaying  error message
                    }
                },

                error: function (error, response) {

                    console.log(error);
                }
            });

        };


        $(document.body).on('click', '.post-content', function (e) {
            e.preventDefault();
            $('#img-upload').attr('src', $(this).attr('data-img-upload'));
            $('#caption-upload').text($(this).attr('data-caption-upload'));
            $('#scheduleTime').val('');
            $('#bookmarkId').val($(this).attr('data-post_bookmark_id'));
        });

        $(document.body).on('click', '.delete_bookmarked_post', function (e) {
            e.preventDefault();

            var bookmark_id = $(this).attr('data-post_bookmark_id');

            $.ajax({
                url: '/delete/bookmarked/post',
                dataType: 'json',
                method: 'post',
                data: {bookmark_id: bookmark_id},

                beforeSend: function () {
                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
                    $("body").removeClass("loading");
                },

                success: function (response) {


                    if (response.status === 'success') {

                        $('#myModal').modal('show');
                        showBookmarkPost();


                    } else if (response.status === 'failed') {
                        var htmlText = '';
                        $.each(response.message, function (key, value) {
                            htmlText += value;
                        });

                        //$('#errorAddAccountMessage').text(htmlText);

                        //TODO add toastr for displaying  error message
                    }
                },
                error: function (error, response) {
                    console.log(error);
                }
            });

        })

        var uploadPostNow = function () {

            var bookmarkId = $('#bookmarkId').val();
            var caption = $('#caption-upload').val();


            $.ajax({
                url: '/upload/image',
                dataType: 'json',
                method: 'post',
                data: {
                    serviceType: 'BOOKMARK',
                    caption: caption,
                    bookmarkId: bookmarkId
                },
                beforeSend: function () {

                    $('.btn-post-now').attr('disabled', true);
                    $('.btn-SCHEDULE').attr('disabled', true);
                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
                    $('.btn-post-now').attr('disabled', false);
                    $('.btn-SCHEDULE').attr('disabled', false);

                    $("body").removeClass("loading");
                },

                success: function (response) {
                    console.log(response.message);
                    if (response.status === 'success') {

                        $('#betaModal').modal('hide');
                        $('#customModal').modal('show');

                        var htmlModalSuccessData = '';

                        if (response.code == 404) {
                            htmlModalSuccessData += '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                                    '<strong style="font-size: large;">Oops!</strong>';
                        }
//                            htmlModalSuccessData = '<img id="img-upload" src="/assets/user/images/success.png"> <br>' +
//                                    '<strong style="font-size: large;">Awesome!</strong>' +
//                                    '<h3>Post Uploaded in following Account(s)</h3>';


                        if (response.data.successArray.length != 0) {
                            htmlModalSuccessData += '<h3>Post Uploaded in following Account(s)</h3>';
                            $.each(response.data.successArray, function (key, value) {
                                htmlModalSuccessData += '<br><i style="color: green; margin-right: 10px;" class="fa fa-check"></i>';
                                htmlModalSuccessData += '<span style="font-size: 20px;">' + value.instaUsername + '</span>';
                                htmlModalSuccessData += '<a href="' + value.media_details.insta_url + '" target="_blank">&nbsp;&nbsp;View </a>uploaded post in Instagram';
                            });
                        }


                        if (response.data.errorArray.length != 0) {
                            htmlModalSuccessData += '<br><h3>Post Uploading failed in following Account(s)</h3>';
                            $.each(response.data.errorArray, function (key, value) {
                                htmlModalSuccessData += '<br><i style="color: red; margin-right: 10px;" class="fa fa-times"></i>';
                                htmlModalSuccessData += '<span style="font-size: 20px;">@' + value.instaUsername + '</span> <br>  <span>Message : ' + value.message + '</span>&nbsp;';
                                htmlModalSuccessData += (value.lock != null && value.lock == true) ? '<a href="' + value.checkpoint_url + '" target="_blank"> Click here </a>to verify this account' : '';
                            });
                        }
                        $('#customModelData').html(htmlModalSuccessData);
                        showBookmarkPost();
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

        var schedulePost = function () {
            var bookmarkId = $('#bookmarkId').val();
            var caption = $('#caption-upload').val();
            var scheduleObj = $('#scheduleTime');
            var scheduleTime = scheduleObj.val();

            if (scheduleTime.length == 0) {
                scheduleObj.focus();
                return false;
            }

            $.ajax({
                url: '/schedule/post',
                dataType: 'json',
                method: 'post',
                data: {
                    serviceType: 'BOOKMARK',
                    scheduleTime: scheduleTime,
                    user_timezone: timezone.name(),
                    caption: caption,
                    bookmarkId: bookmarkId
                },

                beforeSend: function () {
                    $('.btn-post-now').attr('disabled', true);
                    $('.btn-SCHEDULE').attr('disabled', true);
                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
                    $('.btn-post-now').attr('disabled', false);
                    $('.btn-SCHEDULE').attr('disabled', false);

                    $("body").removeClass("loading");
                },
                success: function (response) {
                    console.log(response.message);
                    console.log(response.data);

                    if (response.status === 'success') {

                        $('#betaModal').modal('hide');
                        $('#customModal').modal('show');


                        var htmlModalSuccessData = '';
                        htmlModalSuccessData = '<img id="img-upload" src="/assets/user/images/success.png"> <br>' +
                                '<strong style="font-size: x-large;">Awesome!</strong>' +
                                '<h4>Your post has been scheduled successfully to post at ' + scheduleTime + '(Asia/Kolkata timezone) for all activated Account(s)</h4>' +
                                '<strong style="font-size: large;">Instructions</strong><br><br>' +
                                '<span style="font-size: 18px;">Don\'t de-activate the account(s) until the post gets uploaded or else schedule will fail.</span><br>' +
                                'click <a href="/show/scheduled/posts"> here </a> to modified scheduled post time';

                        $('#customModelData').html(htmlModalSuccessData);
                        showBookmarkPost();
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
                        $('#betaModal').modal('hide');
                        $('#customModal').modal('show');
                    }
                },
                error: function (error, response) {
                    console.log(error);
                }
            });


        }

    </script>

    <!-- END PAGE LEVEL PLUGINS -->
@endsection