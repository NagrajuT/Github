@extends('User::layouts.bodyLayout')

@section('title','Dashboard')
@section('active_profilePromotion','active')
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

        /*style="max-height: 34px; overflow: hidden;"*/
        /*#search-result {*/
        /*font-size: 23px;*/
        /*/!*font-weight: bold;*!/*/
        /*padding-left: 157px;*/
        /*}*/

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

        .user-name {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 190px;
        }
    </style>

    <link href="/assets/user/user-panel/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"
          rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('content')
    {{--PAGE CONTENT GOES HERE--}}


    <div class="page-content">
        <br>

        <div class="container">
            <h3 class=""><b style="color: #545456;">INSTAGRAM MATE</b>
                <i class="fa fa-twitch fa-2x" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>
            </h3>
            <br>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div id="imaginary_container">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control" id="searchInstagram" placeholder="Search"/>
                            <span class="input-group-addon" id="searchBtn">
		                        <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="text-center text-font-h4" id="search-result"></div>
        <br>

        <!--motivatinal images-->
        <div class="container" id="search_content_result"></div>

        <div class="modal"><!-- Place at bottom of page --></div>

    </div>

    <!-- Modal popup for bookmarks-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body modal-body-bookmarks">
                    <p>Added Bookmark Successfully <i class="fa fa-bookmark" aria-hidden="true"
                                                      style=" color: #ffc000; font-size: 26px; padding-left:5px;"></i>
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


    <!--modal post upload-->
    <div id="betaModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="margin: 71px auto;" id="uploadImage_modal">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">

                    <div class="modal"><!-- Place at bottom of page --></div>

                    <div class="row">
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

    <!-- Modal for displaying Custom message... Saurabh-->
    <div id="displayMessage" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(-45deg, #7b4397, #dc2430); color: #fff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="margin-left: 240px"><img id="img-upload"
                                                                            src="/assets/user/images/success.png"> <br>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="modal-body" id="contentTextUp">

                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background: linear-gradient(-45deg, #4d0000, #808080); color: #fff;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="increaseLikesModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body" style="background: #33cac2;  padding-top: 5px;">
                    <section class="content-box">
                        <div class="inline top-cross-header">
                            <h3>Likes</h3>
                            <a href="#" type="button" class="btn" data-dismiss="modal">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <div class=" panel-default panel-modal">
                                <div class="panel-body">
                                    <div class="table-container">
                                        <table class="table table-filter table-modal-image">
                                            <tbody>
                                            @if(!empty($instaUsers))
                                                @foreach($instaUsers as $instaUser)
                                                    <tr data-status="list-sec-1" data-toggle="collapse"
                                                        data-target="#demo">
                                                        <td>
                                                            <div class="ckbox">
                                                                <input type="checkbox"
                                                                       id="checkbox{{$instaUser['ins_user_id']}}"
                                                                       name="checkbox"
                                                                       value="{{$instaUser['ins_user_id']}}">
                                                                <label for="checkbox{{$instaUser['ins_user_id']}}"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a class="star">
                                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="media-box-imgae">
                                                                <a href="#" class="pull-left">
                                                                    <img src="{{$instaUser['profile_pic_url']}}"
                                                                         class="media-photo">
                                                                </a>

                                                                <div class="media-body-text">
                                                                    <h4 class="title">
                                                                        {{$instaUser['username']}}
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                There is no any active account added by you to like this pic. Please add
                                                account/activate the account.
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer modal-footer-likes">
                    <div id="spinner"
                         style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;">
                        <img src='/assets/user/images/input-spinner.gif' width="64" height="64"/><br>Liking..
                    </div>
                    <button id="likesModalBtn" type="button" class="btn btn-default pull-right">Likes
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--modal popup for comment-->
    <div id="increaseCommentsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body" style="background: #33cac2;  padding-top: 5px;">
                    <section class="content-box">
                        <div class="inline top-cross-header">
                            <h3>Comments</h3>
                            <a href="#" type="button" class="btn" data-dismiss="modal">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <div class=" panel-default panel-modal">
                                <div class="panel-body">
                                    <div class="table-container">
                                        <center>
                                            <p class="p-text-comment">Comments on Posts,
                                                <small>&nbsp; one comment from one account at a time.</small>
                                            </p>
                                        </center>
                                        <hr>
                                        <table class="table table-filter table-modal-image">
                                            <tbody>

                                            @if(!empty($instaUsers))
                                                @foreach($instaUsers as $instaUser)
                                                    {{--<tr data-status="list-sec-2" data-toggle="collapse" data-target="#commentTextBoxTr{{$instaUser->ins_user_id}}">--}}
                                                    <!-- data-target="#modal-item" -->


                                                    <a id="commentTextBoxBtn{{$instaUser['ins_user_id']}}"
                                                       data-status="list-sec-2" data-toggle="collapse"
                                                       data-target="#commentTextBoxTr{{$instaUser['ins_user_id']}}"
                                                       hidden></a>
                                                    <tr>
                                                        <td>
                                                            <div class="ckbox commentCheckbox">
                                                                <input type="checkbox"
                                                                       id="checkboxcmnts{{$instaUser['ins_user_id']}}"
                                                                       name="checkboxcmnts"
                                                                       value="{{$instaUser['ins_user_id']}}">
                                                                <label for="checkboxcmnts{{$instaUser['ins_user_id']}}"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="star">
                                                                <i class="fa fa-comment" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="media-box-imgae">
                                                                <a href="#" class="pull-left">
                                                                    <img src="{{$instaUser['profile_pic_url']}}"
                                                                         class="media-photo">
                                                                </a>

                                                                <div class="media-body-text">
                                                                    <h4 class="title">
                                                                        {{$instaUser['username'] }}
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="commentTextBoxTr{{$instaUser['ins_user_id']}}"
                                                        class="collapse">
                                                        <td colspan=3>
                                                        <textarea class="form-control active" rows="2"
                                                                  id="comment{{$instaUser['ins_user_id']}}"
                                                                  placeholder="Comments"></textarea>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                There is no any active account added by you to comment on this pic.
                                                Please add
                                                account/activate the account.
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer modal-footer-likes">
                    <button type="button" class="btn btn-default pull-right commentsModalBtn">Comments
                        <i class="fa fa-comments" aria-hidden="true"></i>
                    </button>
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
            loadInstaFinderDetails();
        });
        var loadInstaFinderDetails = function () {
            var finderType = '{{$finderType}}';
            var value = '{{$value}}';

            $.ajax({
                url: '/instaFinderDetails',
                dataType: 'json',
                method: 'post',
                data: {finderType: finderType, value: value, methodName: 'searchDetails'},
                beforeSend: function () {
                    $.LoadingOverlay("show");
                },
                complete: function (xhr, status) {
                    $.LoadingOverlay("hide");
                },

                success: function (response) {
                    if (response.status === 'success') {

                        if (response.detailsType === 'user') {

                            var pageInfo_user = response.data.media.page_info;


                            $('#searchInstagram').attr('placeholder', response.data.name);
                            $('#search-result').html('<h4>@' + response.data.username + '&nbsp; ' + response.data.media.count.toLocaleString() + ' posts &nbsp;' + response.data.followed_by.count.toLocaleString() + ' followers &nbsp; ' + response.data.follows.count.toLocaleString() + ' following</h4>');


                            var searchUserResultHtml = '<div class="row">';
                            $.each(response.data.media.nodes, function (key, value) {

                                searchUserResultHtml += ' <div class="col-sm-3"><div class="profile-header-container">' +
                                        '<div class="profile-header-img" style="padding-bottom: 20px !important;padding: 0px;"><a href="https://www.instagram.com/p/' + value.code + '/" target="_blank"><img title="' + value.caption + '" class="img-responsive" src="' + value.thumbnail_src + '"/></a>' +
                                        '<div class="rank-label-container">' +
//                                        '<span class="label label-default edit"><a href="#myModal1" data-toggle="modal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></span>' +
                                        '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" data-caption-upload="' + value.caption + '" data-img-upload="' + value.thumbnail_src + '"  class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +
                                        '<span class="label label-default download"><a  href="' + value.thumbnail_src + '" title="Download" download><i class="fa fa-download" aria-hidden="true"></i></a></span>' +
                                        '<span class="label label-default bookmark"><a href="#" data-toggle="modal" class="bookmarkPost" data-caption="' + value.caption + '" data-img="' + value.thumbnail_src + '"><i class="fa fa-bookmark" aria-hidden="true"></i></a></span>' +
                                        '</div></div>' +
                                        '<div class="user-hastag">' +
                                        '<div class="user-name"><a href="https://www.instagram.com/'+response.data.username+'">@' + response.data.username + '</a></div><p> ' + value.caption + ' </p>' +
                                        '<a class="text-center likesBtn" href="#increaseLikesModal" data-toggle="modal" data-id=' + value.id + ' style="padding-left:10px; border-right:1px solid rgba(24, 84, 75, 0.71);">' + value.likes.count.toLocaleString() + '<i class="fa fa-heart" aria-hidden="true"></i>&nbsp;</a>' +
                                        '<a href="#increaseCommentsModal" data-toggle="modal" class="text-center commentsBtn" style="padding-left:4px;" data-id=' + value.id + '>&nbsp;' + value.comments.count.toLocaleString() + '<i class="fa fa-comments" aria-hidden="true"></i></a>' +
                                        '</div></div></div>';

                                if ((key + 1) % 4 == 0) {
                                    searchUserResultHtml += '</div><div class="row">';
                                }
                            });
                            searchUserResultHtml += '</div>';

                            $('#search_content_result').html(searchUserResultHtml);


                        } else if (response.detailsType === 'tag') {

                            var pageInfo_tag = response.data.media.page_info;

                            $('#searchInstagram').attr('placeholder', response.data.name);
                            $('#search-result').html('<h4>#' + response.data.name + '&nbsp;' + response.data.media.count.toLocaleString() + ' posts</h4>');

                            var searchTagResultHtml = '';
                            if (response.data.top_posts.nodes.length == 0 && response.data.media.nodes.length == 0) {
                                searchLocationHtml = '<div class="post-caption" style="text-align:center"><h3> <strong>No Post Uploaded</strong> </h3></div>';
                            } else {
                                searchTagResultHtml = '<div class="post-caption"><h3> <strong>TOP POST</strong> </h3></div><div class="row">';
                                $.each(response.data.top_posts.nodes, function (key, value) {
                                    var post_caption=value.caption;
                                    if(value.caption==null || value.caption===''){
                                        post_caption='no caption found';

                                    }

                                    searchTagResultHtml += ' <div class="col-sm-3"><div class="profile-header-container">' +
                                            '<div class="profile-header-img" style="padding-bottom: 20px !important;padding: 0px;"><a href="https://www.instagram.com/p/' + value.code + '/" target="_blank"><img title="' + value.caption + '" class="img-responsive" src="' + value.thumbnail_src + '"/></a>' +
                                            '<div class="rank-label-container">' +
//                                        '<span class="label label-default edit"><a href="#myModal1" data-toggle="modal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></span>' +

                                            '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" data-caption-upload="' + value.caption + '" data-img-upload="' + value.thumbnail_src + '"  class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +
//                                        '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +
                                            '<span class="label label-default download"><a href="' + value.thumbnail_src + '" title="Download" download><i class="fa fa-download" aria-hidden="true"></i></a></span>' +
//                                        '<span class="label label-default bookmark"><a href="#myModal" data-toggle="modal" class="bookmarkPost"><i class="fa fa-bookmark" aria-hidden="true"></i></a></span>' +
                                            '<span class="label label-default bookmark"><a href="#" data-toggle="modal" class="bookmarkPost" data-caption="' + value.caption + '" data-img="' + value.thumbnail_src + '"><i class="fa fa-bookmark" aria-hidden="true"></i></a></span>' +
                                            '</div></div>' +
                                            '<div class="user-hastag">' +
                                            '<span><b>Caption</b></span><p > ' + post_caption + ' </p>' +
                                            '<a href="#increaseLikesModal" data-toggle="modal" class="text-center likesBtn" data-id=' + value.id + ' style="padding-left:10px; border-right:1px solid rgba(24, 84, 75, 0.71);">' + value.likes.count.toLocaleString() + '<i class="fa fa-heart" aria-hidden="true"></i>&nbsp;</a>' +
                                            '<a href="#increaseCommentsModal" data-toggle="modal" class="text-center commentsBtn" style="padding-left:4px;" data-id=' + value.id + '>&nbsp;' + value.comments.count.toLocaleString() + '<i class="fa fa-comments" aria-hidden="true"></i></a>' +
                                            '</div></div></div>';

                                    if ((key + 1) % 4 == 0) {
                                        searchTagResultHtml += '</div><div class="row">';
                                    }
                                });
                                searchTagResultHtml += '</div>';

                                searchTagResultHtml += ' <div class="post-caption"><h3><strong> MOST RECENT</strong> </h3></div><div class="row">';
                                $.each(response.data.media.nodes, function (key, value) {

                                    var post_caption=value.caption;
                                    if(value.caption==null || value.caption===''){
                                        post_caption='no caption found';

                                    }
                                    searchTagResultHtml += ' <div class="col-sm-3"><div class="profile-header-container">' +
                                            '<div class="profile-header-img" style="padding-bottom: 20px !important;padding: 0px;"><a href="https://www.instagram.com/p/' + value.code + '/" target="_blank"><img title="' + value.caption + '" class="img-responsive" src="' + value.thumbnail_src + '"/></a>' +
                                            '<div class="rank-label-container">' +
//                                        '<span class="label label-default edit"><a href="#myModal1" data-toggle="modal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></span>' +
//                                        '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +

                                            '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" data-caption-upload="' + value.caption + '" data-img-upload="' + value.thumbnail_src + '"  class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +

                                            '<span class="label label-default download"><a href="' + value.thumbnail_src + '" title="Download" download><i class="fa fa-download" aria-hidden="true"></i></a></span>' +
//                                        '<span class="label label-default bookmark"><a href="#myModal" data-toggle="modal" class="bookmarkPost" ><i class="fa fa-bookmark" aria-hidden="true"></i></a></span>' +
                                            '<span class="label label-default bookmark"><a href="#" data-toggle="modal" class="bookmarkPost" data-caption="' + value.caption + '" data-img="' + value.thumbnail_src + '"><i class="fa fa-bookmark" aria-hidden="true"></i></a></span>' +
                                            '</div></div>' +
                                            '<div class="user-hastag">' +
                                            '<span><b>Caption</b></span><p > ' + post_caption + ' </p>' +
                                            '<a href="#increaseLikesModal" data-toggle="modal" class="text-center likesBtn" data-id=' + value.id + ' style="padding-left:10px; border-right:1px solid rgba(24, 84, 75, 0.71);">' + value.likes.count.toLocaleString() + '<i class="fa fa-heart" aria-hidden="true"></i>&nbsp;</a>' +
                                            '<a href="#increaseCommentsModal" data-toggle="modal" class="text-center commentsBtn" style="padding-left:4px;" data-id=' + value.id + '>&nbsp;' + value.comments.count.toLocaleString() + '<i class="fa fa-comments" aria-hidden="true"></i></a>' +
                                            '</div></div></div>';

                                    if ((key + 1) % 4 == 0) {
                                        searchTagResultHtml += '</div><div class="row">';
                                    }
                                });
                                searchTagResultHtml += '</div>';
                            }

                            $('#search_content_result').html(searchTagResultHtml);
                        }

                        //Saurabh For Location Details
                        else if (response.detailsType === 'location') {

                            var pageInfo_location = response.data.media.page_info;

                            $('#searchInstagram').attr('placeholder', response.data.name);
                            $('#search-result').html('<h4><i class="fa fa-location-arrow"></i>  ' + response.data.name + '&nbsp;' + response.data.media.count.toLocaleString() + ' posts</h4>');

                            var searchLocationHtml = '';
                            if (response.data.top_posts.nodes.length == 0 && response.data.media.nodes.length == 0) {
                                searchLocationHtml = '<div class="post-caption" style="text-align:center"><h3> <strong>No Post Uploaded</strong> </h3></div>';
                            } else {
                                searchLocationHtml = '<div class="post-caption"><h3> <strong>TOP POST</strong> </h3></div><div class="row">';

                                $.each(response.data.top_posts.nodes, function (key, value) {
                                    var post_caption=value.caption;
                                    if(value.caption==null || value.caption===''){
                                        post_caption='no caption found';

                                    }
                                    searchLocationHtml += ' <div class="col-sm-3"><div class="profile-header-container">' +
                                            '<div class="profile-header-img" style="padding-bottom: 20px !important;padding: 0px;"><a href="https://www.instagram.com/p/' + value.code + '/" target="_blank"><img title="' + value.caption + '" class="img-responsive" src="' + value.thumbnail_src + '"/></a>' +
                                            '<div class="rank-label-container">' +
//                                        '<span class="label label-default edit"><a href="#myModal1" data-toggle="modal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></span>' +

                                            '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" data-caption-upload="' + value.caption + '" data-img-upload="' + value.thumbnail_src + '"  class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +
//                                        '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +
                                            '<span class="label label-default download"><a href="' + value.thumbnail_src + '" title="Download" download><i class="fa fa-download" aria-hidden="true"></i></a></span>' +
//                                        '<span class="label label-default bookmark"><a href="#myModal" data-toggle="modal" class="bookmarkPost"><i class="fa fa-bookmark" aria-hidden="true"></i></a></span>' +
                                            '<span class="label label-default bookmark"><a href="#" data-toggle="modal" class="bookmarkPost" data-caption="' + value.caption + '" data-img="' + value.thumbnail_src + '"><i class="fa fa-bookmark" aria-hidden="true"></i></a></span>' +
                                            '</div></div>' +
                                            '<div class="user-hastag">' +
                                            '<span><b>Caption</b></span><p > ' + post_caption + ' </p>' +
                                            '<a href="#increaseLikesModal" data-toggle="modal" class="text-center likesBtn" data-id=' + value.id + ' style="padding-left:10px; border-right:1px solid rgba(24, 84, 75, 0.71);">' + value.likes.count.toLocaleString() + '<i class="fa fa-heart" aria-hidden="true"></i>&nbsp;</a>' +
                                            '<a href="#increaseCommentsModal" data-toggle="modal" class="text-center commentsBtn" style="padding-left:4px;" data-id=' + value.id + '>&nbsp;' + value.comments.count.toLocaleString() + '<i class="fa fa-comments" aria-hidden="true"></i></a>' +
                                            '</div></div></div>';

                                    if ((key + 1) % 4 == 0) {
                                        searchLocationHtml += '</div><div class="row">';
                                    }
                                });
                                searchLocationHtml += '</div>';

                                searchLocationHtml += ' <div class="post-caption"><h3><strong> MOST RECENT</strong> </h3></div><div class="row">';
                                $.each(response.data.media.nodes, function (key, value) {
                                    var post_caption=value.caption;
                                    if(value.caption==null || value.caption===''){
                                        post_caption='no caption found';

                                    }
                                    searchLocationHtml += ' <div class="col-sm-3"><div class="profile-header-container">' +
                                            '<div class="profile-header-img" style="padding-bottom: 20px !important;padding: 0px;"><a href="https://www.instagram.com/p/' + value.code + '/" target="_blank"><img title="' + value.caption + '" class="img-responsive" src="' + value.thumbnail_src + '"/></a>' +
                                            '<div class="rank-label-container">' +
//                                        '<span class="label label-default edit"><a href="#myModal1" data-toggle="modal"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></span>' +
//                                        '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +

                                            '<span class="label label-default post"><a data-toggle="modal" href="#betaModal" data-caption-upload="' + value.caption + '" data-img-upload="' + value.thumbnail_src + '"  class="post-content"><i class="fa fa-upload" aria-hidden="true"></i></a></span>' +

                                            '<span class="label label-default download"><a href="' + value.thumbnail_src + '" title="Download" download><i class="fa fa-download" aria-hidden="true"></i></a></span>' +
//                                        '<span class="label label-default bookmark"><a href="#myModal" data-toggle="modal" class="bookmarkPost" ><i class="fa fa-bookmark" aria-hidden="true"></i></a></span>' +
                                            '<span class="label label-default bookmark"><a href="#" data-toggle="modal" class="bookmarkPost" data-caption="' + value.caption + '" data-img="' + value.thumbnail_src + '"><i class="fa fa-bookmark" aria-hidden="true"></i></a></span>' +
                                            '</div></div>' +
                                            '<div class="user-hastag">' +
                                            '<span><b>Caption</b></span><p >' + post_caption + ' </p>' +
                                            '<a href="#increaseLikesModal" data-toggle="modal" class="text-center likesBtn" data-id=' + value.id + ' style="padding-left:10px; border-right:1px solid rgba(24, 84, 75, 0.71);">' + value.likes.count.toLocaleString() + '<i class="fa fa-heart" aria-hidden="true"></i>&nbsp;</a>' +
                                            '<a href="#increaseCommentsModal" data-toggle="modal" class="text-center commentsBtn" style="padding-left:4px;" data-id=' + value.id + '>&nbsp;' + value.comments.count.toLocaleString() + '<i class="fa fa-comments" aria-hidden="true"></i></a>' +
                                            '</div></div></div>';

                                    if ((key + 1) % 4 == 0) {
                                        searchLocationHtml += '</div><div class="row">';
                                    }
                                });
                                searchLocationHtml += '</div>';
                            }
                            $('#search_content_result').html(searchLocationHtml);
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

        });


        $(document.body).on('click', '.bookmarkPost', function (e) {
            e.preventDefault();

            var img_caption = $(this).attr('data-caption');
            var img_url = $(this).attr('data-img');

            $.ajax({
                url: '/bookmark/post',
                dataType: 'json',
                method: 'post',
                data: {img_caption: img_caption, img_url: img_url},

                beforeSend: function () {
//                    $("#uploadImage_modal").LoadingOverlay("show");
                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
//                    $("#uploadImage_modal").LoadingOverlay("hide");
                    $("body").removeClass("loading");
                },
                success: function (response) {
                    console.log(response);
                    if (response.status === 'success') {
                        $('#myModal').modal('show');
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

            var file = $('#img-upload').attr('src');
            var caption = $('#caption-upload').val();

            $.ajax({
                url: '/upload/image',
                dataType: 'json',
                method: 'post',
                data: {
                    serviceType: 'FINDER',
                    caption: caption,
                    imageUrl: file
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
            var file = $('#img-upload').attr('src');
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
                    serviceType: 'FINDER',
                    scheduleTime: scheduleTime,
                    user_timezone: timezone.name(),
                    caption: caption,
                    imageUrl: file
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

    <script type="text/javascript">
        $(document.body).on('click', '#searchBtn', function (e) {
            e.preventDefault();
            var searchValue = $('#searchInstagram').val();
            if (searchValue.length == 0) {
                $('#searchInstagram').focus();
                return false;
            } else {
                window.location.href = '/instagramFinder?searchValue=' + searchValue;
            }
        });
    </script>

    <!-- Script for increase likes and comments --- Saurabh -->

    <script>
        var mediaId;
        var insUserId = [];
        // This is to take the media id of the post
        //If the likes icon is clicked
        $(document.body).on('click', '.likesBtn', function () {
            mediaId = $(this).attr('data-id');
            console.log(mediaId);
            insUserId = [];
        });

        //If the comments icon is clicked
        $(document.body).on('click', '.commentsBtn', function () {
            mediaId = $(this).attr('data-id');
            console.log('comments media id', mediaId);
            insUserId = [];
        });

        $(document.body).on('click', '#likesModalBtn', function () {
            insUserId = [];
            $.each($("input[name='checkbox']:checked"), function () {
//                var checkboxId = $(this).val();
                insUserId.push($(this).val());
                console.log(insUserId);
//                $('#checkbox' + checkboxId).prop("checked", false);
            });
            console.log(insUserId);
            console.log('mediaid------->',mediaId)
            console.log('insUserId------->',insUserId)

            if (insUserId[0] != null) {

                $.ajax({
                    'url': '/increase/media/likes',
                    'dataType': 'json',
                    'type': 'post',
                    'data': {mediaId: mediaId, insUserId: insUserId},
                    beforeSend: function () {
                        $('#spinner').show();
                        $('#likesModalBtn').attr('disabled', true);
                    },
                    complete: function () {
                        $('#spinner').hide();
                        $('#likesModalBtn').attr('disabled', false);
                    },
                    success: function (response) {
                        $('#increaseLikesModal').modal('hide');
                        $('#displayMessage').modal('show');
                        var modalHtml = '';
                        var htmlModalSuccessData = '  ';
                        $('#contentTextUp').text("");
                        $.each(response.message, function (i, o) {
                            if (o.charAt(0) == "E") {
                                var clas = "fa fa-times";
                                var color = "red";
                            } else {
                                var clas = "fa fa-check";
                                var color = "green";
                            }
                            modalHtml = '<p id="contentText"><i class="' + clas + '" aria-hidden="true" style=" color: ' + color + '; font-size: 26px; padding-left:5px;"></i>' + o + '</p>';
                            $('#contentTextUp').append(modalHtml);
                        });
                    }
                });

            } else {
                alert("Please select any account");
            }
        });

        //To open the comment text box if the checkbox is clicked
        $(document.body).on('click', '.commentCheckbox', function () {
            var cmntId = $(this).children().val();
            $('#commentTextBoxBtn' + cmntId).click();
        });

        //For Comments on Post
        $(document.body).on('click', '.commentsModalBtn', function () {
            insUserId = [];
            var commentText = [];

            $.each($("input[name='checkboxcmnts']:checked"), function () {
                var id = $(this).val();
                insUserId.push(id);
                var comments = $('#comment' + id).val();
                if (comments != '') {
                    commentText.push(comments);
                }
                else
                    alert("Please write something in the comment box");
            });

            if (insUserId[0] != null) {
                if (insUserId.length == commentText.length) {
                    console.log("entering into the ajax call");

                    $.ajax({
                        'url': '/increase/media/comments',
                        'dataType': 'json',
                        'type': 'post',
                        'data': {mediaId: mediaId, insUserId: insUserId, comments: commentText},
                        success: function (response) {
                            $('#increaseCommentsModal').modal('hide');
                            $('#displayMessage').modal('show');
                            var modalHtml = '';
                            var htmlModalSuccessData = '  ';
                            $('#contentTextUp').text("");

                            $.each(response.message, function (i, o) {
                                if (o.charAt(0) == "E") {
                                    var clas = "fa fa-times";
                                    var color = "red";
                                } else {
                                    var clas = "fa fa-check";
                                    var color = "green";
                                }
                                modalHtml = '<p id="contentText"><i class="' + clas + '" aria-hidden="true" style=" color: ' + color + '; font-size: 26px; padding-left:5px;"></i>' + o + '</p>';
                                $('#contentTextUp').append(modalHtml);
                            });
                        }
                    });
                } else {
                    console.log("YOu missed some comments to type");

                }

            } else {
                alert("Please select any account");
            }
        });
    </script>

    <!-- END PAGE LEVEL PLUGINS -->
@endsection