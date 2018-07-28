@extends('User::layouts.bodyLayout')
@section('headcontent')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="http://www.jquery2dotnet.com/search/label/css">
    <style>
        a {
            color: #fff;
        }

        .dropdownd dd,
        .dropdownd dt {
            margin: 0px;
            padding: 0px;
        }

        .dropdownd ul {
            margin: -1px 0 0 0;
        }

        .dropdownd dd {
            position: relative;
        }

        .dropdownd a,
        .dropdownd a:visited {
            color: #fff;
            text-decoration: none;
            outline: none;
            font-size: 12px;
        }

        .dropdownd dt a {
            background-color: #444D58;
            display: block;
            padding: 8px 20px 5px 10px;
            min-height: 25px;
            line-height: 24px;
            overflow: hidden;
            border: 0;
            width: 100%;
        }

        .dropdownd dt a span,
        .multiSel span {
            cursor: pointer;
            display: inline-block;
            /*padding: 0 3px 2px 0;*/
        }

        .dropdownd dd ul {
            background-color: #444D58;
            border: 0;
            color: #fff;
            display: none;
            left: 0px;
            padding: 2px 15px 2px 5px;
            /*position: absolute;*/
            top: 2px;
            width: 100%;
            list-style: none;
            height: 300px;
            overflow: auto;
        }

        .dropdownd span.value {
            display: none;
        }

        .dropdownd dd ul li a {
            padding: 5px;
            display: block;
        }

        .dropdownd dd ul li a:hover {
            background-color: #fff;
        }

        p.multiSel {
            margin: 3px 0 0;
        }

        input.ddinput {
            float: right;
            margin: 15px 6px 0 0;
        }

        .mutliSelect span {
            float: left;
            margin: 4px 0 0 4px;
        }

        .mutliSelect img {
            float: left;
        }

        .mutliSelect ul li {
            float: left;
            width: 100%;
            padding: 5px 0;
            border-bottom: 1px solid #2c3540;
            border-top: 1px solid #5c6570;
        }

        .instagram-share .checkbox, .radio {
            margin-top: 10px;
            position: relative;
        }

        .checkbox, .form-horizontal .checkbox {
            margin-top: 7px;
            padding: 0;
        }

    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs"></script>
@endsection

@section('active_profileManagement','active')
@section('content')
    {{--{{dd($result)}}--}}
    {{--{{dd($filter_details)}}--}}
    <div class="page-content">
        <br>
        <div class="container">
            <h3 class=""><b style="color: #545456;">Distibution Notice Setting</b>
                <i class="fa fa-cogs fa-2x" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>
            </h3>
            <br>
        </div>
        <br>
        <div class="row">
            <div class="container">

                <dl class="dropdownd">
                    <dt>
                        <a href="#">
                            <span class="hida">Select</span>
                            <span class="glyphicon glyphicon-chevron-down pull-right" aria-hidden="true"
                                  style="margin-top: 9px;"></span>
                            <p class="multiSel"></p>
                        </a>
                    </dt>

                    <dd>
                        <div class="mutliSelect">
                            <ul>
                                @if(isset($result))
                                    <li>
                                        <span style="margin-top:18px;"><b>Select All</b></span>
                                        <div class="checkbox squaredTwo pull-right">
                                            <input type="checkbox" check-id="all_{{$result[0]['added_by_user_id']}}"
                                                   value="ALL" id="squaredone" name="check"
                                                   style="display: none;"><label for="squaredone"></label>
                                        </div>
                                    </li>
                                    @foreach($result as $value)
                                        <li>
                                            <img src="{{$value['profile_pic_url']}}" width="40">
                                            <span><b></b> <br> <small>{{$value['full_name']}}</small></span>
                                            <div class="pull-right">
                                                {{--checkbox squaredTwo--}}
                                                <input type="checkbox" check-id="checks_{{$value['ins_user_id']}}"
                                                       value="{{$value['full_name']}}" class="checkboxval"
                                                       id="squaredone" name="check">
                                                {{--<label for="squaredone"></label>--}}
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <p> ADD ATLEAST ONE ACCOUNT</p>
                                @endif
                            </ul>
                        </div>
                    </dd>

                </dl>

            </div>
            <div class="container">
                <div class="follersList1">
                <label>
                    <div class="checkbox squaredTwo  pull-left">
                        <input type="checkbox" value="follow" checkDetails1="222"  id="squaredc" name="check" style="display: none;">
                        <label for="squaredc"></label>
                    </div>
                    <span style="float: left;margin: 5px 45px 0 12px;padding: 5px 0 0;">All Followers</span></label></div>
                <div class="follersList2">
                <label>
                    <div class="checkbox squaredTwo pull-left">
                        <input type="checkbox" value="follow" checkDetails2="333" id="squaredd" name="check" style="display: none;"><label for="squaredd"></label>
                    </div>
                    <span style="float: left;margin: 5px 0 0 12px;padding: 5px 0 0;">All Followings</span></label></div>
                <br><br>
                </div>
            </div>
            <div class="container">
                <div class="">
                    <button class="accordion" id="hashTagHead" count=""><img
                                src="/assets/user/user-panel/img/add-label-button.png"
                                class="img-responsive;">&nbsp;&nbsp;HASH TAGS
                    </button>
                    <div class="panel pnl_bg" id="hashTagHeadContent">
                        <div class="col-md-8" style="padding:10px 10px 30px 10px;">
                            <div class="col-sm-2" style="color:black; margin-bottom:20px;">
                                <a href="#" class="btn btn-success">Tags &nbsp;<a href="#" data-toggle="tooltip"
                                                                                  data-placement="bottom"
                                                                                  title="Hooray! wfghsdaa jbxc sxaslkmx kasxmas skxnask ksnxaks ksxnaks aksxnask kasnx axsnak aksxn"><img
                                                src="/assets/user/user-panel/img/question-mark.png"></a></a>
                            </div>
                            <div class="col-lg-12">
                                <div id="mainHashTag">
                                    <div class="btn-group btnspace hastags">

                                    </div>
                                </div>
                                <div class="btn-group btnspace">
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#myModal">ADD
                                    </button>
                                    <button type="button" class="btn btncolor dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Delete all user names</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="accordion"><img src="/assets/user/user-panel/img/placeholder-for-map.png"
                                                       class="img-responsive;">&nbsp;&nbsp; USER NAMES
                        </button>
                        <div class="panel pnl_bg">
                            <div class="col-md-8" style="padding:10px 10px 30px 10px; ">
                                <div class="col-sm-3">
                                    <a href="#" class="btn btn-success">User Name &nbsp;<a href="#"
                                                                                           data-placement="bottom"
                                                                                           data-toggle="tooltip"
                                                                                           title="Hooray! wfghsdaa jbxc sxaslkmx kasxmas skxnask ksnxaks ksxnaks aksxnask kasnx axsnak aksxn"><img
                                                    src="/assets/user/user-panel/img/question-mark.png"></a></a></div>
                            </div>
                            <div class="col-sm-5">
                                <div id="unMainTag">

                                </div>
                                <div class="btn-group btnspace">
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#myModal2">ADD
                                    </button>
                                    <button type="button" class="btn btncolor dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Delete all user names</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <textarea class="form-control messageData" id="messageData" rows="3" placeholder="Message here..."></textarea>
                </div>
            </div>
            <div class="row text-center"><button id="sendmessage" class="btn btn-success">Send</button></div>
        </div>
    </div>
    <!-- -------------Modals -------------------->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="background-color:#EFF3F8;">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center;color:white;">Add tags</h4>
                    <i class="fa fa-spinner" id="loadnwait" aria-hidden="true"></i>

                </div>
                <div class="modal-body">
                    <div class="row" style="margin-top: 5%;padding: 0px 10px;">
                        <div class="col-md-8 col-md-offset-2">

                            <!-- Search Form -->
                            <form role="form">

                                <!-- Search Field -->
                                <div class="row">
                                    <input type="text" id="area" class="form-control"/>


                                    <div class="form-group">
                                        <div class="input-group" id="search">
                                            <input class="form-control" type="text" id="tagId" name="search"
                                                   placeholder="Tag" required/>

                                            <span class="input-group-btn">
                            <button class="btn btn-success" id="HashId" type="button"><span
                                        class="glyphicon glyphicon-search" aria-hidden="true"><span
                                            style="margin-left:10px;">Search</span></span></button>
                                            </span>

                                        </div>
                                        {{--<div class="input-group" id="searchmanually">--}}
                                        {{--<input class="form-control" type="text" id="tagManualId" name="search"--}}
                                        {{--placeholder="add Tag Manually" required/>--}}

                                        {{--<span class="input-group-btn">--}}
                                        {{--<button class="btn btn-success" id="HashManualId" type="button"><span--}}
                                        {{--class="glyphicon glyphicon-search" aria-hidden="true"><span--}}
                                        {{--style="margin-left:10px;">Add</span></span></button>--}}
                                        {{--</span>--}}

                                        {{--</div>--}}
                                        {{--<p3 class="noTagFound"> no result found...please enter tags manually below</p3>--}}
                                    </div>

                                </div>

                            </form>
                            <!-- End of Search Form -->

                        </div>
                        <div id="hashTagId">


                        </div>
                    </div>

                    <div class="col-md-offset-5">
                        {{--<a href="#" id="taglist" style="text-align:center;">Enter your list of Tags</a>--}}
                        {{--<a href="#" id="searchtags" style="text-align:center;">Search Tags</a>--}}
                        <br>
                        <br>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                        <button type="button" class="btn btn-info" id="AddHash">Add</button>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:white;">Add UserName</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-top: 5%;padding: 0px 10px;">
                        <div class="col-md-8 col-md-offset-2">

                            <!-- Search Form -->
                            <form role="form">

                                <!-- Search Field -->
                                <div class="row">
                                    <div class="form-group">
                                        <div class="input-group" id="search">
                                            <input id="userNameText" class="form-control" type="text" name="search"
                                                   placeholder="User Name" required/>

                                            <span class="input-group-btn">
                            <button class="btn btn-success" type="button" id="userNameId"><span
                                        class="glyphicon glyphicon-search" aria-hidden="true"><span
                                            style="margin-left:10px;">Search</span></span></button>
                                                <i class="fa fa-spinner" id="loadnwaits" aria-hidden="true"></i>

                                            </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!-- End of Search Form -->

                        </div>
                        <div id="userNameTag">

                        </div>
                    </div>
                    <div class="col-md-offset-5">
                        <button type="button" class="btn btn-info" data-dismiss="modal" id="addUserName">Add</button>
                        <button type="button" class="btn btncolor1" data-dismiss="modal" id="close">Close</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('pagejavascripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('a[title]').tooltip();
        });
    </script>
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

        // Changes contributed by @diego-rzg
    </script>

    <!--modal collapsible script-->
    <script type="text/javascript">
        $(document).on('click', '.panel-heading span.clickable', function (e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
            }
        })
    </script>

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
    <!--upload file-->
    <script type="text/javascript">
        $(document).on('click', '.browse', function () {
            var file = $(this).parent().parent().parent().find('.file');
            file.trigger('click');
        });
        $(document).on('change', '.file', function () {
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
    </script>


    <script type="text/javascript">

        $(".dropdownd dt a").on('click', function () {
            $(".dropdownd dd ul").slideToggle('fast');
        });

        $(".dropdownd dd ul li a").on('click', function () {
            $(".dropdownd dd ul").hide();
        });

        function getSelectedValue(id) {
            return $("#" + id).find("dt a span.value").html();
        }

        $(document).bind('click', function (e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("dropdownd")) $(".dropdownd dd ul").hide();
        });

        //        $('.mutliSelect input[type="checkbox"]').on('click', function () {
        //
        //            var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
        //                    title = $(this).val() + ",";
        //            var checkin_id = $(this).attr("check-id");
        //            var split = checkin_id.split('_');
        //            var user_id = split[1];
        //            console.log(user_id);
        //            if ($(this).is(':checked')) {
        //                var html = '<span title="' + title + '">' + title + '</span>';
        //                console.log("ti--", title);
        //                console.log("html--", html);
        //                $('.multiSel').append(html);
        //                $(".hida").hide();
        //                if (split[0] == "checks") {
        //                    $.ajax({
        //                        url: '/user/HashUsername',
        //                        type: 'post',
        //                        dataType: "json",
        //                        data: {
        //                            "user_id": user_id
        //                        },
        //                        success: function (response) {
        //                            console.log(response);
        //                            if (response == 201) {
        //
        //                            }
        //                            else if (response == 202) {
        //
        //                            }
        //                            else {
        //                                console.log(response.tags);
        //                                var count = 0;
        //                                if (response.tags.length > 0) {
        //                                    for (var i = 0; i < response.tags.length; i++) {
        //                                        count = response.tags.length;
        //                                        $("#hashTagHead").find("count", count);
        //                                        $(".hastags").append('<button value=' + response.tags.length + ' type="button" class="btn btncolor currrentTagClassRemove currrentTagClass' + response.tags.length + '" id="currentTag' + i + '" data-toggle="modal" data-target="#">' + response.tags[i] + '</button>');
        //                                        $(".hastags").append('<button type="button" id="removeCurrentTag' + i + '" userid="' + user_id + '" tagId="' + i + '" tagname="' + response.tags[i] + '" class="btn btncolor dropdown-toggle removeCurrentTag" value="' + response.tags.length + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="close"></span></button>');
        //                                    }
        //                                }
        //                                else {
        //                                    alert("something went wrong");
        //                                }
        //                            }
        //                        }
        //                    });
        //                }
        //
        //            } else {
        //                $('span[title="' + title + '"]').remove();
        //                var ret = $(".hida");
        //                $('.dropdownd dt a').append(ret);
        //
        //            }
        //        });

    </script>
    <script>
        $(document).ready(function (e) {

            var count = 1;

            $("#HashId").click(function () {


                $(".hashtag1").remove();
                $("#loadnwait").css('display', 'block');

                var tagId = $("#tagId").val();

                $.ajax({
                    url: '/user/hashTagFinder',
                    type: 'post',


                    data: {
                        'tag': tagId

                    },
                    success: function (response) {


                        if (response == 201) {
                            $("#loadnwait").css('display', 'none');
                            alert("no result found");
                        }
                        else if (response == 202) {
                            $("#loadnwait").css('display', 'none');
                            alert("no user found");

                        }
                        else {
                            arrayTag = [];
                            $("#loadnwait").css('display', 'none');
                            if (response.length > 0) {
                                for (var i = 0; i < response.length; i++) {

                                    $("#hashTagId").append('<a id="tagId' + i + '" href="#" value="' + response[i].name + '" class="unit-tag hashtag1"><span>' + response[i].name + '</span><span class="unit-btn-x"><input class="hashtagcheck1" type="checkbox" value="' + response[i].name + '"></span></a>');
                                    count++;
                                    arrayTag.push(response[i].name);

                                }

                            }
                            else {
                                alert("something went wrong");
                            }

                        }


                    }
                });

            })
        })


    </script>


    <script>
        $(document).ready(function (e) {

            var j = 0;
            $("#HashManualId").click(function () {
                var tagManualId = $("#tagManualId").val();
                $("#hashTagId").append('<a id="tagId' + j + '" href="#" value="' + tagManualId + '" class="unit-tag hashtag1"><span>' + tagManualId + '</span><span class="unit-btn-x"><input class="hashtagcheck1" type="checkbox" value="' + tagManualId + '"></span></a>');
                j++;

            })
        })


    </script>


    <script>
        $(document).ready(function () {
            var count = 1;
            $("#userNameId").click(function () {

                $(".hashtag2").remove();

                $("#loadnwaits").css('display', 'block');
                var userNameText = $("#userNameText").val();

                $.ajax({
                    url: '/user/userNameFinder',
                    type: 'post',


                    data: {
                        'searchValue': userNameText

                    },
                    success: function (response) {


                        if (response == 201) {
                            $("#loadnwaits").css('display', 'none');
                            alert("no result found");
                        }
                        else if (response == 202) {
                            $("#loadnwaits").css('display', 'none');
                            alert("no user found");

                        }
                        else {

                            $("#loadnwaits").css('display', 'none');
                            if (response.length > 0) {
                                for (var i = 0; i < response.length; i++) {

                                    $("#userNameTag").append('<span id="unTag' + i + '" class="unit-tag hashtag2" value="' + response[i].username + '"><img src="' + response[i].profile_pic_url + '" height="41px" width="41px" ><span>' + response[i].username + '</span><span class="unit-btn-x"><input type="checkbox" class="hashtagcheck2"  username="' + response[i].username + '" full_name="' + response[i].full_name + '" profile_picture="' + response[i].profile_pic_url + '" pk="' + response[i].pk + '" count="' + i + '"></span></span>');
                                    count++;

                                }

                            }
                            else {
                                alert("something went wrong");
                            }

                        }


                    }
                });

            })
        })

    </script>



    <script>
        $(document).ready(function () {

            var selectedUser = $(".selectedUser").attr("id");
            var tag = [];
            var countcomment = 0;
            var arrayComment = [];
            var user = [];
            var location = [];
            var like = $("#myonoffswitch1").attr("dbvalue");
            var comment = $("#myonoffswitch2").attr("dbvalue");
            var follow = $("#myonoffswitch3").attr("dbvalue");
            var unfollow = $("#myonoffswitch4").attr("dbvalue");
            var gender = $(".genderSelected").attr("value");
            var hashTagHead = $("#hashTagHead").attr("count");
            var userNameHead = $("#addUserModalData").attr("count");
            var locNameHead = $("#addLocModalData").attr("count");
            var commentsHead = $("#commentsHead").attr("count");
            var messagedata;

//            --
            var user_ids = [];
            var user_names = [];
            var allFollowers
            var allfollowings
            $('.follersList1 input[type="checkbox"]').on('click',function(){
                allFollowers=$(this).attr("checkDetails1");
                console.log("allfol-->",allFollowers);

            });
            $('.follersList2 input[type="checkbox"]').on('click',function(){
                allfollowings=$(this).attr("checkDetails2");
                console.log("allfollowings-->",allfollowings);
            });

            $('.mutliSelect input[type="checkbox"]').on('click', function () {

                var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
                        title = $(this).val() + ",";
                var checkin_id = $(this).attr("check-id");
                var split = checkin_id.split('_');
                var user_id = split[1];
                user_ids.push(user_id);
                console.log(user_id);
                console.log("insside checks push optin", user_ids);

                if ($(this).is(':checked')) {
                    var html = '<span title="' + title + '">' + title + '</span>';
                    console.log("ti--", title);
                    console.log("html--", html);
                    $('.multiSel').append(html);
                    $(".hida").hide();
                    if (split[0] == "checks") {
//                        $.ajax({
//                            url: '/user/HashUsername',
//                            type: 'post',
//                            dataType: "json",
//                            data: {
//                                "user_id": user_id
//                            },
//                            success: function (response) {
//                                console.log(response);
//                                if (response == 201) {
//
//                                }
//                                else if (response == 202) {
//
//                                }
//                                else {
//                                    console.log(response.tags);
//                                    var count = 0;
//                                    if (response.tags.length > 0) {
//                                        for (var i = 0; i < response.tags.length; i++) {
//                                            count = response.tags.length;
//                                            $("#hashTagHead").find("count", count);
//                                            $(".hastags").append('<button value=' + response.tags.length + ' type="button" class="btn btncolor currrentTagClassRemove currrentTagClass' + response.tags.length + '" id="currentTag' + i + '" data-toggle="modal" data-target="#">' + response.tags[i] + '</button>');
//                                            $(".hastags").append('<button type="button" id="removeCurrentTag' + i + '" userid="' + user_id + '" tagId="' + i + '" tagname="' + response.tags[i] + '" class="btn btncolor dropdown-toggle removeCurrentTag" value="' + response.tags.length + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="close"></span></button>');
//                                        }
//                                    }
//                                    else {
//                                        alert("something went wrong");
//                                    }
//                                }
//                            }
//                        });
                    }

                } else {
                    $('span[title="' + title + '"]').remove();
                    var ret = $(".hida");
                    $('.dropdownd dt a').append(ret);

                }
            });


            $(document).on('click', '.hashtagcheck2', function (e) {


                var username = $(this).attr("username");
                var full_name = $(this).attr("full_name");
                var profile_picture = $(this).attr("profile_picture");
                var id = $(this).attr("pk");
                //		var lastUpdate = $(this).attr("lastUpdate");
                var count = $(this).attr("count");
                if ($(this).is(":checked")) {
                    user.push({
                        'username': username,
                        'full_name': full_name,
                        'profile_picture': profile_picture,
                        'id': id,
                        'lastUpdate': Math.floor(Date.now() / 1000)
                    });

                    user = _.uniq(user, function (item, key, username) {
                        console.log("uniq");
                        user_names.push(item.username);
                        return item.username;
                    });
                }
                else {


                    user.splice(count, 1);

//                    user = jQuery.grep(user, function (e) {
//                        return e != value
//
//                    });
                }

            });


            function powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser) {

                console.log("insidejoioinoinoinoiiiiiiiiiiiiiiiiiiiiiiiiii");

                var checkin_id = $('.checkboxval').attr("check-id");
                var split = checkin_id.split('_');
                var user_id = split[1];
//                user_ids.push(user_id);
                console.log("powerssss", user_id);
                console.log("promotionSettingshastags with push", user_ids);
                console.log("username", username);
                console.log("userNameHead", userNameHead);
                console.log("user", user);
                console.log("user_names", user_names);


                $.ajax({
                    url: '/user/promotionSettingshastags',
                    type: 'post',

                    data: {
                        'user': user,
                        'tag': tag,
                        'usernames': user_names,
                        'instaUserId': user_ids,
                    },
                    success: function (response) {
                        toastr.options = {
                            timeOut: 1000,
                            extendedTimeOut: 100,
                            tapToDismiss: true,
                            debug: false,
                            fadeOut: 10,
                            positionClass: "toast-top-center",
                            limit: 1
                        };

                        if (response == 401) {
                            toastr.warning("plz add any 1 field");
                        }
                        if (response == 200) {
//                            alert("data updated successfully")
                            toastr.success('data updated successfully');
                        }
                        if (response == 404) {
                            toastr.error("something went wrong")
                        }

                    }
                });

            }
            $("#sendmessage").click(function(){

                messagedata = $("#messageData").val();

                console.log("message dataa--->",messagedata);
                $.ajax({
                    url: '/user/promotionSettingshastags',
                    type: 'post',

                    data: {
                        'user': user,
                        'tag': tag,
                        'usernames': user_names,
                        'instaUserId': user_ids,
                        'messageData': messagedata,
                        'allFollowers': allFollowers,
                        'allfollowings': allfollowings,
                        'send':'true'
                    },
                    success: function (response) {
                        toastr.options = {
                            timeOut: 1000,
                            extendedTimeOut: 100,
                            tapToDismiss: true,
                            debug: false,
                            fadeOut: 10,
                            positionClass: "toast-top-center",
                            limit: 1
                        };

                        if (response == 401) {
                            toastr.warning("plz add any 1 field");
                        }
                        if (response == 200) {
//                            alert("data updated successfully")
                            toastr.success('data updated successfully');
                        }
                        if (response == 404) {
                            toastr.error("something went wrong")
                        }

                    }
                });



            });

            $("#selectGender").change(function () {
                gender = $("#selectGender").val();
                console.log("here comes gender", gender);
                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);

            })

            $("#myonoffswitch1").click(function () {
                if ($("#myonoffswitch1").is(":checked")) {

                    like = 1;

                }
                else {
                    like = 0;
                }
                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);

            })
            $("#myonoffswitch2").click(function () {
                if ($("#myonoffswitch2").is(":checked")) {

                    comment = 1;

                }
                else {
                    comment = 0;
                }
                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);

            })
            $("#myonoffswitch3").click(function () {
                if ($("#myonoffswitch3").is(":checked")) {

                    follow = 1;

                }
                else {
                    follow = 0;
                }
                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);
            })
            $("#myonoffswitch4").click(function () {

                if ($("#myonoffswitch4").is(":checked")) {

                    unfollow = 1;

                }
                else {
                    unfollow = 0;
                }
                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);
            })

            if (hashTagHead > 0) {
                for (var i = 0; i < hashTagHead; i++) {

                    var val = $(".currrentTagClass" + i).attr("value");
                    tag.push(val);
                    $("#mainHashTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor hashTagModalDataRemove" id="currentTag' + i + '" data-toggle="modal" data-target="#">' + tag[i] + '</button><button  type="button" id="removeCurrentTag' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag removeCurrentHashTagData" value="' + tag[i] + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');

                }
                $(".currrentTagClassRemove").remove();
                $(".removeCurrentTagClass").remove();

            }

            $(document).on('click', '.hashtagcheck1', function (e) {

                var value = $(this).attr("value");
                if ($(this).is(":checked")) {

                    tag.push(value);
                    tag = tag.filter(function (item, pos) {
                        return tag.indexOf(item) == pos;
                    })

                }
                else {
                    tag = jQuery.grep(tag, function (e) {
                        return e != value;

                    });
                }


            });
            $("#AddHash").click(function () {
                $(".currrentTagClassRemove").remove();
                $(".removeCurrentTagClass").remove();
                $(".hashTagModalDataRemove").remove();
                $(".removeCurrentHashTagData").remove();

                $("#myModal").modal("hide");

                var counttagnow = tag.length;

                $("#mainHashTag").empty();

                for (var i = 0; i < counttagnow; i++) {

                    $("#mainHashTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor" id="currentTag' + i + '" data-toggle="modal" data-target="#">' + tag[i] + '</button><button  type="button" id="removeCurrentTag' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag" value="' + tag[i] + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');

                }

                if (hashTagHead == tag.length) {
                    toastr.warning('plz select 1 field atleast');

                    return true;

                }

                hashTagHead = tag.length;
                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);
//

            })

            $(document).on('click', '.removeCurrentTag', function (e) {
                var value = $(this).attr("abc");
                var addvalue = $(this).attr("value");
                $("#currentTag" + value).remove();
                $("#removeCurrentTag" + value).remove();

                tag = jQuery.grep(tag, function (e) {
                    return e != addvalue
                })
                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);

            })


            if (userNameHead > 0) {
                var username;
                var full_name;
                var profile_picture;
                var id;
                var lastUpdate;
                var count;

                for (var i = 0; i < userNameHead; i++) {

                    username = $(".usernameTagModalData" + i).attr("username");
                    full_name = $(".usernameTagModalData" + i).attr("full_name");
                    profile_picture = $(".usernameTagModalData" + i).attr("profile_picture");
                    id = $(".usernameTagModalData" + i).attr("pk");
                    lastUpdate = $(".usernameTagModalData" + i).attr("lastUpdate");
                    count = $(".usernameTagModalData" + i).attr("count");
                    var val = $(".currrentTagClass" + i).attr("value");


                    user.push({
                        'username': username,
                        'full_name': full_name,
                        'profile_picture': profile_picture,
                        'id': id,
                        'lastUpdate': lastUpdate,
                    });
                    $("#unMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor addedFromModaluser" id="currentTag2' + i + '" data-toggle="modal" data-target="#">' + user[i].username + '</button><button  type="button" id="removeCurrentTag2' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');

                }

                $(".currrentusernameClassRemove").remove();
                $(".removeCurrentusernmaeClass").remove();

            }


            $("#addUserName").click(function () {
                user = user.filter(function (e) {
                    return e
                });
                $(".currrentusernameClassRemove").remove();
                $(".removeCurrentusernmaeClass").remove();
                $(".removeCurrentTag2").remove();
                $(".addedFromModaluser").remove();

                $("#unMainTag").empty();
                var countuser = user.length;

                for (var i = 0; i < countuser; i++) {

                    $("#unMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor" id="currentTag2' + i + '" data-toggle="modal" data-target="#">' + user[i].username + '</button><button  type="button" id="removeCurrentTag2' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');
                }
                if (userNameHead == user.length) {
                    toastr.warning('plz select 1 field atleast');

                    return true;

                }

                userNameHead = user.length;

//                console.log(user);
                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);


            })

            var cnt = 0;
            $(document).on('click', '.removeCurrentTag2', function (e) {
                var value = $(this).attr("abc");
                $("#currentTag2" + value).remove();
                $("#removeCurrentTag2" + value).remove();
//                if (cnt != 0) {
//                    value = value - 1;
//                }

                delete user[value];


                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);
                cnt++;

            });

            if (locNameHead > 0) {
                var id;
                var name;
                var latitude;
                var longitude;
                var lastUpdate;
                var count;

                for (var i = 0; i < locNameHead; i++) {

                    id = $(".locTagModalData" + i).attr("id");
                    name = $(".locTagModalData" + i).attr("name");
                    latitude = $(".locTagModalData" + i).attr("latitude");
                    longitude = $(".locTagModalData" + i).attr("longitude");
                    lastUpdate = $(".locTagModalData" + i).attr("lastUpdate");
                    count = $(".locTagModalData" + i).attr("count");
//                    var val = $(".currrentTagClass" + i).attr("value");


                    location.push({
                        'id': id,
                        'name': name,
                        'latitude': latitude,
                        'longitude': longitude,
                        'lastUpdate': lastUpdate,

                    });
                    console.log(location);
                    $("#LocMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor addedFromModalLoc" id="currentTag4' + i + '" data-toggle="modal" data-target="#">' + location[i].name + '</button><button  type="button" id="removeCurrentTag4' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');

                }

                $(".currrentlocClassRemove").remove();
                $(".removeCurrentlocationClass").remove();

            }


            $(document).on('click', '.hashtagcheck4', function (e) {


                var id = $(this).attr("id");
                var name = $(this).attr("name");
                var latitude = $(this).attr("latitude");
                var longitude = $(this).attr("longitude");
                //      var lastUpdate = $(this).attr("lastUpdate");
                var count = $(this).attr("count");
                if ($(this).is(":checked")) {
                    location.push({
                        'id': id,
                        'name': name,
                        'latitude': latitude,
                        'longitude': longitude,
                        'lastUpdate': Math.floor(Date.now() / 1000)
                    });
                    location = _.uniq(location, function (item, key, id) {

                        console.log("uniq");


                        return item.id;
                    });
                    console.log(location);
                }
                else {


                    location.splice(count, 1);

//                    user = jQuery.grep(user, function (e) {
//                        return e != value
//
//                    });
                }


            });

            $("#addLocationTagModal").click(function () {
                location = location.filter(function (e) {
                    return e
                });
                $(".currrentlocClassRemove").remove();
                $(".removeCurrentlocClass").remove();
                $(".removeCurrentTag4").remove();
                $(".addedFromModalLoc").remove();

                $("#LocMainTag").empty();
                countloc = location.length;

                for (var i = 0; i < countloc; i++) {

                    $("#LocMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor" id="currentTag4' + i + '" data-toggle="modal" data-target="#">' + location[i].name + '</button><button  type="button" id="removeCurrentTag4' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');
                }
                if (locNameHead == location.length) {
                    toastr.warning('plz select 1 field atleast');

                    return true;

                }

                locNameHead = location.length;

                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);


            });

            var cnt = 0;
            $(document).on('click', '.removeCurrentTag4', function (e) {
                var value = $(this).attr("abc");
                $("#currentTag4" + value).remove();
                $("#removeCurrentTag4" + value).remove();
//                if (cnt != 0) {
//                    value = value - 1;
//                }

                delete location[value];

//                user = user.filter(function(e){return e});
                console.log(location);

                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);
//                cnt++;


            })


            //location code ends here


            if (commentsHead > 0) {
                for (var i = 0; i < commentsHead; i++) {
                    var val = $(".commentsModalData" + i).attr("value");
                    arrayComment.push(val);
                    $("#commentMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor crossComments" id="currentTagComment' + i + '" data-toggle="modal" data-target="#">' + val + '</button><button  type="button" id="removeCurrentTagComment' + i + '" abc="' + i + '" class="btn btncolor dropdown-toggle removeCurrentTag3 crossCommentsRemove" value="' + val + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');


                }
                $(".commentsModalDataCross").remove();
                $(".commentsModalDataRemoveCross").remove();


            }


            $("#addComment").click(function () {


                var value = $("#commentTextId").val();
                if (value.length === 0) {

                    return true;
                }

                $("#commentMainTag").append('<div class="btn-group btnspace"><button type="button" class="btn btncolor" id="currentTagComment' + commentsHead + '" data-toggle="modal" data-target="#">' + value + '</button><button  type="button" id="removeCurrentTagComment' + commentsHead + '" abc="' + commentsHead + '" class="btn btncolor dropdown-toggle removeCurrentTag3" value="' + value + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="close"></span></button></div>');
                commentsHead++;
                arrayComment.push(value);
                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);

                $("#commentTextId").val('');


            })

            $(document).on('click', '.removeCurrentTag3', function (e) {
                var c = $(this).attr("abc");
                var addvalue = $(this).attr("value");
                $("#currentTagComment" + c).remove();
                $("#removeCurrentTagComment" + c).remove();

                arrayComment = jQuery.grep(arrayComment, function (e) {
                    return e != addvalue
                })
                powers(user, tag, arrayComment, location, like, comment, follow, unfollow, gender, selectedUser);
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $(".userNameAddButton").click(function () {
                $(".hashtag2").remove();
            })

        })

    </script>

    <script>
        $(document).ready(function () {
            $(".hashTagModalButton").click(function () {
                $(".hashtag1").remove();
            })

        })

    </script>

    <script>
        function loc() {
            console.log("here");
            $("#getCurrentLatLongTag").empty();
            var lat = 0;
            var long = 0;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

            function showPosition(position) {
                lat = position.coords.latitude;
                long = position.coords.longitude;

                var latlng = new google.maps.LatLng(lat, long);
                var geocoder = geocoder = new google.maps.Geocoder();
                geocoder.geocode({'latLng': latlng}, function (results, status) {

//                    console.log('--===----====---===---', results[2])
                    if (status == google.maps.GeocoderStatus.OK) {
                        var place = results[3].formatted_address;
                        if (~place.indexOf(",")) {

                            var country = place.split(",");
                        }
                        console.log(country[1]);

//                            $("#getCurrentLatLong").append('<iframe id="geoLocation" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs&q='+results[2].formatted_address+'"+ width="560" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>');
                        $("#getCurrentLatLongDemo").append('<div><div id="map" style="width: 500px; height: 400px;margin: 0 0 0 33px;"></div></div>');

                        var locations = [
                            [
                                results[2].formatted_address,
                                lat,
                                long,
                                1

                            ]

                        ]

                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 12,
                            // center: new google.maps.LatLng(-33.92, 151.25),
                            center: new google.maps.LatLng(lat, long),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });

                        var infowindow = new google.maps.InfoWindow();

                        var marker, i;

                        for (i = 0; i < locations.length; i++) {
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                map: map
                            });

                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent(locations[i][0], locations[i][6]);
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                        }

                    }

                });

            }


        }


    </script>

    <script>

        $(document).ready(function () {
            var countryname;
            $(document).on("click", "#findLoc", function () {
                $("#getCurrentLatLongTag").empty();
//                $("#getCurrentLatLongDemo").empty();

                var searchLocation = $("#locTextValue").val();
                var geocoder = geocoder = new google.maps.Geocoder();
                var address = searchLocation;
                geocoder.geocode({'address': address}, function (results, status) {
                    if (typeof(results[0]) != "undefined" && results[0] != null) {


                        var place = results[0].formatted_address;

                        if (~place.indexOf(",")) {

                            var country = place.split(",");

                        }
                        else {
                            alert("please specify city name")
                            return true;
                        }
                        var country = country[country.length - 1];
                        var full_address = searchLocation + "," + country;
                        full_address = full_address.replace(' ', '');

                        $(document).ready(function () {
                            $.ajax({
                                url: '/user/findLocation',
                                type: 'post',

                                data: {
                                    searchLocation: full_address
                                },
                                success: function (response) {

                                    if (response == "") {
                                        alert("no key word found");
                                    }

                                    else if (response == 201) {
                                        alert("no data found");

                                    }
                                    else if (response == 202) {
                                        alert("something went wrong")
                                    }
                                    else {
                                        var array = [];
                                        var i = 0;
                                        $("#getCurrentLatLongDemo").empty();
                                        $("#getCurrentLatLongDemo").append('<div><div id="map" style="width: 500px; height: 400px;margin: 0 0 0 33px;"></div></div>');


                                        $.each(response, function (item, value) {
                                            $("#getCurrentLatLongTag").append('<span id="unTag' + i + '" class="unit-tag hashtag4" value="' + value.name + '"><span>' + value.name + '</span><span class="unit-btn-x"><input type="checkbox" class="hashtagcheck4"  id="' + value.pk + '" name="' + value.name + '" latitude="' + value.lat + '" longitude="' + value.lng + '" count="' + i + '"></span></span>');
                                            i++;
                                        })

                                        $.each(response, function (item, value) {
                                            array.push([value.name, value.lat, value.lng, item])
                                        })


                                        var locations = array;

                                        var map = new google.maps.Map(document.getElementById('map'), {
                                            zoom: 10,
                                            // center: new google.maps.LatLng(-33.92, 151.25),
                                            center: new google.maps.LatLng(response[0].lat, response[0].lng),
                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                        });

                                        var infowindow = new google.maps.InfoWindow();

                                        var marker, i;

                                        for (i = 0; i < locations.length; i++) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                map: map
                                            });

                                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                                return function () {
                                                    infowindow.setContent(locations[i][0], locations[i][6]);
                                                    infowindow.open(map, marker);
                                                }
                                            })(marker, i));
                                        }

                                    }
                                }
                            });
                        })


//
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });


            })

        })

    </script>
@endsection