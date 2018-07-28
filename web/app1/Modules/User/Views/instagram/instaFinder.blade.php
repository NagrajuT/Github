@extends('User::layouts.bodyLayout')

@section('title','Dashboard')
@section('active_profileManagement','active')

@section('headcontent')
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <!-- BEGIN PAGE LEVEL STYLES -->
    <style>
        .error-msg {
            color: red;
        }

        .profile-header-img > img.img-circle {
            width: 212px;
            height: 175px;
            border: 5px solid #33cac2;
        }

        img.img-circle {
            border-radius: 6%;
        }


    </style>

    {{--<link rel="stylesheet" href="/assets/user/css/jRoll.css">--}}
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('content')
    {{--PAGE CONTENT GOES HERE--}}
    {{--<div id="demo"></div>--}}


    <div class="page-content" style="min-height: 335px;">
        <br>

        <div class="container">
            <h3 class=""><b style="color: #545456;">INSTAGRAM FINDER</b>
                <i class="fa fa-twitch fa-2x" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>
            </h3>
            <br>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div id="imaginary_container">
                        <form>
                            <div class="input-group stylish-input-group">
                                <input type="text" class="form-control" id="searchInstagram" style="border-radius: 0px 2px !important;"
                                       placeholder=@if(isset($searchValue) && $searchValue!=null) {{$searchValue}} @else "Search" @endif>
                                <span class="input-group-addon" id="searchBtn">
		                        <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--motivatinal images-->
        <div class="container-fluid">
            <div class="row">
                <div class="board" id="search-contents">
                    <!-- <h2>Welcome to IGHALO!<sup>�</sup></h2>-->
                    <div class="board-inner">
                        <ul class="nav nav-tabs" id="myTab">
                            <div class="liner"></div>
                            <li class="active">
                                <a href="#home" data-toggle="tab" title="User">
                        			   <span class="round-tabs one">User
                        				</span>
                                </a>
                            </li>
                            <li>
                                <a href="#doner" data-toggle="tab" title="Hashtag">
                        				<span class="round-tabs five">Hashtag
                        				</span>
                                </a>
                            </li>

                            <div class="liner1"></div>
                            <li>
                                <a href="#Location" data-toggle="tab" title="Location">
                        				<span class="round-tabs five">Location
                        				</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <!--motivatinal images-->
                            <div class="container" id="userSearchResult"></div>

                            <div class="read-more-show" id="user-load-more">
                                <a class="mored" href="#">Load more
                                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="container read-more-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img ">
                                            <div class="profile-header-img">
                                                <img class="img-circle" src="/assets/user/user-panel/img/male.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-check-circle"
                                                                aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank" class="animated fadeInDown">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img">
                                            <div class="profile-header-img">
                                                <img class="img-circle" src="/assets/user/user-panel/img/male.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-user-secret" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img">
                                            <div class="profile-header-img">
                                                <img class="img-circle" src="/assets/user/user-panel/img/male.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-check-circle"
                                                                aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img">
                                            <div class="profile-header-img">
                                                <img class="img-circle" src="/assets/user/user-panel/img/male.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-user-secret" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="doner">
                            <!--motivatinal images-->
                            <div class="container" id="hashtagSearchResult"></div>

                            <div class="read-more-show" id="hashtag-load-more">
                                <a class="mored" href="#">Load more
                                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="container read-more-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img ">
                                            <div class="profile-header-img">
                                                <img class="img-circle"
                                                     src="/assets/user/user-panel/img/hashtag-tuition-bont-hd-emblem.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-check-circle"
                                                                aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank" class="animated fadeInDown">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img">
                                            <div class="profile-header-img">
                                                <img class="img-circle"
                                                     src="/assets/user/user-panel/img/hashtag-tuition-bont-hd-emblem.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-user-secret" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img">
                                            <div class="profile-header-img">
                                                <img class="img-circle"
                                                     src="/assets/user/user-panel/img/hashtag-tuition-bont-hd-emblem.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-check-circle"
                                                                aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img">
                                            <div class="profile-header-img">
                                                <img class="img-circle"
                                                     src="/assets/user/user-panel/img/hashtag-tuition-bont-hd-emblem.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-user-secret" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                        </div>

                        <!--       Location Tab            -->
                        <div class="tab-pane fade" id="Location">
                            <!--motivatinal images-->
                            <div class="container" id="locationSearchResult">

                            </div>
                            <div class="read-more-show" id="location-load-more">
                                <a class="mored" href="#">Load more
                                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="container read-more-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img ">
                                            <div class="profile-header-img">
                                                <img class="img-circle"
                                                     src="assets/user-panel/img/hashtag-tuition-bont-hd-emblem.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-check-circle"
                                                                aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank" class="animated fadeInDown">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img">
                                            <div class="profile-header-img">
                                                <img class="img-circle"
                                                     src="assets/user-panel/img/hashtag-tuition-bont-hd-emblem.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-user-secret" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img">
                                            <div class="profile-header-img">
                                                <img class="img-circle"
                                                     src="assets/user-panel/img/hashtag-tuition-bont-hd-emblem.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-check-circle"
                                                                aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="profile-header-container  hover-profile-header-img">
                                            <div class="profile-header-img">
                                                <img class="img-circle"
                                                     src="assets/user-panel/img/hashtag-tuition-bont-hd-emblem.png"/>
                                                <!-- badge -->
                                                <div class="rank-label-container">
                                                    <span class="label label-default rank-label"><i
                                                                class="fa fa-user-secret" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <div class="user-hastag hover-effect">
                                                <p>Type : User / Hastage </p>

                                                <p>Name : Rajesh Gupta</p>

                                                <p>Count : 1113</p>
                                                <a href="file:///C:/Users/admin/Dropbox/Instatraffic/Design/insta-mate.html"
                                                   target="_blank">
                                                    <i class="fa fa-paper-plane" aria-hidden="true">details</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!--    Location Tab End      -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="followAccountsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body" style="background: #33cac2;  padding-top: 5px;">
                    <section class="content-box">
                        <div class="inline top-cross-header">
                            <h3>Follow From Account</h3>
                            <a href="#" type="button" class="btn" data-dismiss="modal">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <div class=" panel-default panel-modal">
                                <div class="panel-body">
                                    <div class="table-container">
                                        <table class="table table-filter table-modal-image">
                                            <tbody id="followAccountsModalBody">
                                            <tr data-status="list-sec-1" data-toggle="collapse"
                                                data-target="#demo">
                                                <td>
                                                    <div class="ckbox">
                                                        <input type="checkbox">
                                                        <label for="checkbox"></label>
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
                                                            <img src=""
                                                                 class="media-photo">
                                                        </a>

                                                        <div class="media-body-text">
                                                            <h4 class="title">
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

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
                        <img src='/assets/user/images/input-spinner.gif' width="64" height="64"/><br>Loading..
                    </div>
                    <button id="followAccountsModalBtn" type="button" class="btn btn-default pull-right">Follow
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </button>
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

@endsection

@section('pagejavascripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/assets/user/js/bootbox.min.js"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/loadingoverlay.js"></script>

    <script type="text/javascript">
        // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
        $('.read-more-content').addClass('hide')
        $('.read-more-show, .read-more-hide').removeClass('hide')

        // Set up the toggle effect:
        $('.read-more-show').on('click', function (e) {
            $(this).next('.read-more-content').removeClass('hide');
            $(this).addClass('hide');
            e.preventDefault();
        });


    </script>

    <script type="text/javascript">
        $(function () {
            $('a[title]').tooltip();

            $('.board').addClass('hide');

            var value = '{{$searchValue}}';

            console.log(value);
            var searchValue = (value.length != 0) ? value : $('#searchInstagram').val().trim();

            if (searchValue.length != 0) {
                searchFinder(searchValue);
            }
        });
    </script>


    <script>

        var insUsersDetails, accountId; // global variable to store the instagram users and account ID //saurabh

        var searchFinder = function (searchValue) {

            $.ajax({
                url: '/instagramFinder',
                dataType: 'json',
                method: 'post',
                data: {searchValue: searchValue},

                beforeSend: function () {
                    $.LoadingOverlay("show");
                },
                complete: function (xhr, status) {
                    $.LoadingOverlay("hide");
                },

                success: function (response) {

                    if (response.status === 'success') {

                        insUsersDetails = response.instaUsers;

                        $('.board').removeClass('hide');

                        if (response.data.users.length !== 0) {
                            var searchUserResultHtml = '<div class="row">';
                            $.each(response.data.users, function (key, value) {

                                var userType = (value.is_private == true) ? 'Private User' : 'Public User';

                                searchUserResultHtml +=
                                        '<div class="col-sm-3">' +
                                        '<div class="profile-header-container  hover-profile-header-img ">' +
                                        '<div class="profile-header-img"> ' +
                                        '<img class="img-circle" src="' + value.profile_pic_url + '"/>' +
                                        '<div class="rank-label-container">' +
                                        '<a class="label label-default rank-label text-center followAccount" data-toggle="tooltip" title="Follow account"  data-is_private=' + value.is_private + ' data-id="' + value.pk + '"   data-username="' + value.username + '"  data-profile-pic="' + value.profile_pic_url + '"  data-followers="' + value.follower_count + '" >' +
                                        '<i class="fa fa-user" aria-hidden="true"></i></a>' +
                                        '<a class="label label-default rank-label" data-toggle="tooltip" title="Make it as favourite" id="star"><i class="fa fa-star favoriteList" data-is_private=' + value.is_private + '  data-username="' + value.username + '" data-profile_pic_url="' + value.profile_pic_url + '"  data-instagram_id="' + value.pk + '" aria-hidden="true"></i></a>' +
                                        '</div></div>' +
                                        '<div class="user-hastag-finder hover-effect"> <p>Type : ' + userType + ' </p> <p>Name : ' + value.username + '</p> <p>Follower Count : ' + value.follower_count + '</p>' +
                                        '<a  class="animated fadeInDown user" data-username="' + value.username + '" data-is_private=' + value.is_private + '><i class="fa fa-paper-plane" aria-hidden="true">details</i></a>' +
                                        '</div>' +
                                        '</div></div>';

                                if ((key + 1) % 4 == 0) {
                                    searchUserResultHtml += '</div><div class="row">';
                                }
                            });
                            searchUserResultHtml += '</div>';
                            $('#userSearchResult').html(searchUserResultHtml);
                            $('#user-load-more').hide();
                        } else {
                            $('#userSearchResult').html('<h3 style="text-align: center;">No user found</h3>');
                            $('#user-load-more').hide();
                        }


                        if (response.data.hashtags.length !== 0) {
                            var searchHashtagsResultHtml = '<div class="row">';
                            $.each(response.data.hashtags, function (key, value) {

                                searchHashtagsResultHtml += ' <div class="col-sm-3">' +
                                        '<div class="profile-header-container  hover-profile-header-img ">' +
                                        '<div class="profile-header-img">' +
                                        '<img class="img-circle" src="/assets/user/user-panel/img/hashtag-tuition-bont-hd-emblem.png"/>' +
                                        '<div class="rank-label-container"> <span class="label label-default rank-label"><i class="fa fa-check-circle" aria-hidden="true"></i></span>' +
                                        '</div></div>' +
                                        '<div class = "user-hastag-finder hover-effect"><p> Type : Hastage </p><p> Name  : ' + value.name + ' </p><p>Post Count : ' + value.media_count + '</p>' +
                                        '<a class="animated fadeInDown tag" data-tagname="' + value.name + '" data-mediaID="' + value.id + '"><i class="fa fa-paper-plane" aria-hidden="true">details</i></a>' +
                                        '</div></div></div>';

                                if ((key + 1) % 4 == 0) {
                                    searchHashtagsResultHtml += '</div><div class="row">';
                                }
                            });
                            searchHashtagsResultHtml += '</div>';
                            $('#hashtagSearchResult').html(searchHashtagsResultHtml);
                            $('#hashtag-load-more').hide();
                        } else {
                            $('#hashtagSearchResult').html('<h3 style="text-align: center;">No hashtag found</h3>');
                            $('#hashtag-load-more').hide();
                        }

                        if (response.data.locations.length !== 0) {
                            var searchLocationsHtml = '<div class="row">';
                            $.each(response.data.locations, function (key, value) {

                                searchLocationsHtml += ' <div class="col-sm-3">' +
                                        '<div class="profile-header-container  hover-profile-header-img ">' +
                                        '<div class="profile-header-img">' +
                                        '<img class="img-circle" src="/assets/user/images/location.png"/>' +
                                        '<div class="rank-label-container"> <span class="label label-default rank-label"><i class="fa fa-check-circle" aria-hidden="true"></i></span>' +
                                        '</div></div>' +
                                        '<div class = "user-hastag-finder hover-effect"><p> ' + value.title + ' </p><p> ' + value.subtitle + ' </p>' +
                                        '<a class="animated fadeInDown location" data-locationId="' + value.pk + '" data-locationName="' + value.name + '"><i  style="padding-top: 25px;" class="fa fa-paper-plane" aria-hidden="true">details</i></a>' +
                                        '</div></div></div>';

                                if ((key + 1) % 4 == 0) {
                                    searchLocationsHtml += '</div><div class="row">';
                                }
                            });
                            searchHashtagsResultHtml += '</div>';
                            $('#locationSearchResult').html(searchLocationsHtml);
                            $('#location-load-more').hide();
                        } else {
                            $('#locationSearchResult').html('<h3 style="text-align: center;">No Location found</h3>');
                            $('#location-load-more').hide();
                        }


                    } else if (response.status === 'failed') {

                        var htmlText = '';
                        $.each(response.message, function (key, value) {
                            htmlText += value;
                        });
                        $('#errorAddAccountMessage').text(htmlText);
                    }
                },
                error: function (error, response) {
                    console.log(error);
                }


            });
        };

        $(document.body).on('click', '#searchBtn', function (e) {
            e.preventDefault();
            var searchValue = $('#searchInstagram').val().trim();

            if (searchValue.length == 0) {
                // print the error message in dialog box (model)
                // Message OOPS! No search content provided
                $('#searchInstagram').focus();
                return false;
            }

            searchFinder(searchValue);

        });

        $(document.body).on('click', '.user', function (e) {
            e.preventDefault();
            var obj = $(this);
            if (obj.attr('data-is_private') == "true") {
                bootbox.alert({
                    message: "This Account is Private",
                    size: 'small'
                });

            } else {

                var htmlUserForm = '<form action="/instaFinderDetails" method="post"> ' +
                        '<input type="hidden" name="type" value="user"><input type="hidden" name="value" value="' + obj.attr('data-username') + '">' +
                        '<input type="submit" id="userSubmitBtn"></form>';

                $(htmlUserForm).appendTo('body').submit();
            }
        });

        $(document.body).on('click', '.tag', function (e) {
            e.preventDefault();
            var obj = $(this);

            var htmlTagForm = '<form action="/instaFinderDetails" method="post"> ' +
                    '<input type="hidden" name="type" value="tag"><input type="hidden" name="value" value="' + obj.attr('data-tagname') + '">' +
                    '<input type="submit" id="userSubmitBtn"></form>';

            $(htmlTagForm).appendTo('body').submit();

//            window.location.href = '/instaFinderDetails?type=tag&value=' + $(this).attr('data-tagname');
        });

        //Saurabh kumar
        $(document.body).on('click', '.location', function (e) {
            e.preventDefault();

            var htmlLocationForm = '<form method="post" action="/instaFinderDetails">' +
                    '<input type="hidden" name="type" value="location">' +
                    '<input type="hidden" name="keyName" value="' + $(this).attr('data-locationName') + '">' +
                    '<input type="hidden" name="value" value="' + $(this).attr('data-locationId') + '">' +
                    '</form>';
            $(htmlLocationForm).appendTo('body').submit();

        });


        $(document.body).on('click', '.followAccount', function (e) {
          var obj=$(this);
//            if (obj.attr('data-is_private') == "true") {
//                bootbox.alert({
//                    message: "This Account is Private",
//                    size: 'small'
//                });
//            }else{
                accountId = obj.attr("data-id");
                accountProfilePic = obj.attr("data-profile-pic");
                accountUsername = obj.attr("data-username");
                accountFollowers = obj.attr("data-followers");

                var modalHtml = '';
                if (insUsersDetails.length == 0) {

                    $('#followAccountsModal').modal("show");
                    $('#followAccountsModalBody').html('There is no any active account added by you to follow this account. Please add account/activate the account.');

                } else {

                    $.each(insUsersDetails, function (i, o) {
                        modalHtml += '<tr data-status="list-sec-1" data-toggle="collapse" data-target="#demo"> ' +
                                '<td> <div class="ckbox">' +
                                '<input type="checkbox" id="checkbox' + o.ins_user_id + '" name="checkbox" value="' + o.ins_user_id + '"> ' +
                                '<label for="checkbox' + o.ins_user_id + '"></label> </div> </td>' +
                                '<td> <a class="star"> <i class="fa fa-user" aria-hidden="true"></i></a></td>' +
                                '<td> <div class="media-box-imgae"> <a href="#" class="pull-left"> <img src="' + o.profile_pic_url + '" class="media-photo"></a>' +
                                '<div class="media-body-text"> <h4 class="title"> ' + o.username + ' </h4> </div> </div> </td> </tr>'
                    });
                    $('#followAccountsModalBody').html(modalHtml);
                    $('#followAccountsModal').modal("show");
                }
//            }
        });

        $(document.body).on('click', '#followAccountsModalBtn', function (e) {
            var insUserId = [];
            $.each($("input[name='checkbox']:checked"), function () {
                insUserId.push($(this).val());
                console.log(insUserId);
            });

            if (insUserId[0] != null) {

                $.ajax({
                    'url': '/insta/follow/accounts',
                    'dataType': 'json',
                    'type': 'post',
                    'data': {
                        accountId: accountId,
                        accountUsername: accountUsername,
                        accountProfilePic: accountProfilePic,
                        accountFollowers: accountFollowers,
                        insUserId: insUserId
                    },
                    beforeSend: function () {
                        $('#spinner').show();
                        $('#followAccountsModalBtn').attr('disabled', true);
                    },
                    complete: function () {
                        $('#spinner').hide();
                        $('#followAccountsModalBtn').attr('disabled', false);
                    },
                    success: function (response) {
                        $('#followAccountsModal').modal('hide');
                        $('#displayMessage').modal('show');
                        var modalHtml = '';
                        var htmlModalSuccessData = '  ';
                        $('#contentTextUp').text("");
                        $.each(response.message, function (i, o) {
//                            console.log(o);
                            if (o.charAt(0) != " ") {
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

        $(document).on('click', '.favoriteList', function (e) {
            e.preventDefault();
            var obj=$(this);
            if (obj.attr('data-is_private') == "true") {
                bootbox.alert({
                    message: "This Account is Private",
                    size: 'small'
                });
            }else{
                var val = obj.attr("data-instagram_id");
                var profile_pic_url = obj.attr("data-profile_pic_url");
                var for_user_name = obj.attr("data-username");

                $.ajax({

                    url: '/add/favorite/user',
                    dataType: 'json',
                    method: 'post',
                    data: {instagramId: val, profile_pic_url: profile_pic_url, for_user_name: for_user_name},

                    beforeSend: function () {
                        obj.addClass('disabled');
                    },
                    complete: function (xhr, status) {
                        obj.removeClass('disabled');
                    },

                    success: function (response) {
                        toastr.options = {
                            timeOut: 4000,
                            extendedTimeOut: 100,
                            tapToDismiss: true,
                            debug: false,
                            fadeOut: 10,
                            positionClass: "toast-top-center"
                        };

                        if (response.code == 200) {
                            if (response.status == 'success')
                                toastr.success('user added to your favorite list.', {timeOut: 4000});
                            else
                                toastr.warning('user already in favorite list .');
                        } else {
                            toastr.error(response.message);
                        }

                    }
                });
            }
        })


    </script>


    <!-- END PAGE LEVEL PLUGINS -->
@endsection