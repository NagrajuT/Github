@extends('User::layouts.bodyLayout')

@section('headcontent')
    {{--<link rel="stylesheet" href="/assets/user/css/toastr.min.css">--}}

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="http://www.jquery2dotnet.com/search/label/css">
    <link href="/assets/user/user-panel/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>
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
            max-height: 300px;
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

        .dropdowna dd,
        .dropdowna dt {
            margin: 0px;
            padding: 0px;
        }

        .dropdowna ul {
            margin: -1px 0 0 0;
        }

        .dropdowna dd {
            position: relative;
        }

        .dropdowna a,
        .dropdowna a:visited {
            color: #fff;
            text-decoration: none;
            outline: none;
            font-size: 12px;
        }

        .dropdowna dt a {
            background-color: #444D58;
            display: block;
            padding: 8px 20px 5px 10px;
            min-height: 25px;
            line-height: 24px;
            overflow: hidden;
            border: 0;
            width: 100%;
        }

        .dropdowna dt a span,
        .multiSel span {
            cursor: pointer;
            display: inline-block;
            /*padding: 0 3px 2px 0;*/
        }

        .dropdowna dd ul {
            background-color: #444D58;
            border: 0;
            /*color: #fff;*/
            display: none;
            left: 0px;
            padding: 2px 15px 2px 5px;
            /*position: absolute;*/
            top: 2px;
            width: 100%;
            list-style: none;
            max-height: 300px;
            overflow: auto;
        }

        .dropdowna span.value {
            display: none;
        }

        .dropdowna dd ul li a {
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
        .mutliSelect1 ul li {
            float: left;
            width: 100%;
            padding: 5px 0;
            border-bottom: 1px solid #2c3540;
            border-top: 1px solid #5c6570;
            margin-bottom: auto;
        }
        .mutliSelect2 ul li {
            float: left;
            width: 100%;
            padding: 5px 0;
            border-bottom: 1px solid #2c3540;
            border-top: 1px solid #5c6570;
            margin-bottom: auto;
        }
        .instagram-share .checkbox, .radio {
            margin-top: 10px;
            position: relative;
        }

        .checkbox, .form-horizontal .checkbox {
            margin-top: 7px;
            padding: 0;
        }

        .centered {
            margin: 0 auto;
            text-align: left;
            width: 800px;
        }

        .programme-log-card img {
            /*height: 35px !important;*/
        }

        label {
            width: 100%;
        }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs"></script>
@endsection

@section('active_profileManagement','active')
@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{--<div class="tab-content">--}}

                    {{--<div class="tab-pane active" id="home" role="tabpanel" style="padding-top: 0;">--}}

                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bell font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Direct Messaging</span>
                                <span class="caption-helper">Send Message to Target Group</span>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <div class="programme-log-card" id="favoriteUserList" style="margin-top: 10px">
                                {{--<div class="row">--}}
                                {{--<select id="account" class="form-control col-md-6 col-md-offset-3" style="border:1px solid #7d888e; border-radius:5px;">--}}
                                {{--<option selected="selected" value="">--select account</option>--}}
                                {{--@if(isset($From_user) && !empty($From_user))--}}
                                {{--@foreach($From_user as $value)--}}
                                {{--<option value="{{$value['username']}}">{{$value['username']}}</option>--}}
                                {{--@endforeach--}}
                                {{--@endif--}}
                                {{--</select>--}}

                                {{--</div>--}}
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">

                                        <dl class="dropdownd">

                                            <dt>
                                                <a href="#">
                                                    <span class="hida1">Choose here from which acoount you want to send the message</span>
                            <span class="glyphicon glyphicon-chevron-down pull-right" aria-hidden="true"
                                  style="margin-top: 9px;"></span>
                                                    <p class="multiSel1"></p>
                                                </a>
                                            </dt>

                                            <dd>
                                                <div class="mutliSelect1">
                                                    <ul>
                                                        @if(isset($From_user) && !empty($From_user))
                                                            @foreach($From_user as $value)
                                                                @if($value['subscribe_type']=="BU")
                                                                    <li><label>
                                                                            <img src="{{$value['profile_pic_url']}}"
                                                                                 width="40">
                                                                            <span><b>{{$value['username']}}</b></span>
                                                                            <div class="checkbox pull-right">
                                                                                {{--<input type="checkbox" value="{{$value['username']}}" id="squaredone" name="check" style="">--}}
                                                                                <input type="radio"
                                                                                       value="{{$value['username']}}"
                                                                                       user_id="{{$value['ins_user_id']}}"
                                                                                       id="squaredone"
                                                                                       name="account" style="">

                                                                                {{--<label for="squaredone"></label>--}}
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>

                                            </dd>

                                        </dl>
                                        <br>

                                        <dl class="dropdowna">

                                            <dt>
                                                <a href="#">
                                                    <span class="hida2">Choose to which group you want to send the message</span>
                            <span class="glyphicon glyphicon-chevron-down pull-right" aria-hidden="true"
                                  style="margin-top: 9px;"></span>
                                                    <p class="multiSel2"></p>
                                                </a>
                                            </dt>
                                            <dd>
                                                <div class="mutliSelect2">
                                                    <ul></ul>
                                                </div>
                                            </dd>
                                        </dl>
                                        <div class="">
                                            <div>
                                                {{--<div id="imaginary_container ">--}}
                                                <div class="input-group stylish-target-group" align="center" style="margin:auto">
                                                    &nbsp &nbsp &nbsp &nbsp
                                                    <a href="/user/DirectMessageTargetgroup" id="crtGrp"
                                                       class=""
                                                       data-toggle="modal">Create
                                                        Targeted Group</a>
                                                    {{--&nbsp &nbsp &nbsp &nbsp--}}
                                                    {{--<a href="/user/DirectMessageTargetgroup" class=""--}}
                                                    {{--data-toggle="modal">Edit--}}
                                                    {{--Targeted Group</a>--}}
                                                </div>
                                            </div>
                                            <br>

                                            <!-- END PERSONAL INFO TAB -->
                                            <!-- CHANGE AVATAR TAB -->
                                            <div class="tab-pane" id="tab_1_2">

                                                <form action="" name="form" role="form" method="post"
                                                      id="imgForm"
                                                      enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new"
                                                             data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail"
                                                                 style="width: 200px;  height: 150px; ">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                                     alt=""/>
                                                            </div>
                                                            <div id="GImg"
                                                                 class="fileinput-preview fileinput-exists thumbnail"
                                                                 style="max-width: 400px !important; max-height: 350px !important;">
                                                            </div>
                                                            <div>
																<span class="btn default btn-file">
																<span class="fileinput-new">Select image </span>
																<span class="fileinput-exists">Change </span>
																<input type="file" name="myFile">
																</span>
                                                                <a href="#" class="btn default fileinput-exists"
                                                                   data-dismiss="fileinput">
                                                                    Remove </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END CHANGE AVATAR TAB -->

                                            <br>

                                            <textarea class="form-control" rows="3" id="groupText"
                                                      placeholder="Message here..."></textarea>
                                            <br>
                                            <div align="center">
                                                {{--<a href="#"  class="btn btn-success">Send</a>--}}
                                                <button id="sendGM" class="btn btn-success">Send</button>
                                                <div>
                                                </div>
                                            </div>
                                        </div>

                                        {{--model content--}}
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    {{--</div>--}}
                    {{--<div class="tab-pane" id="profile" role="tabpanel">--}}


                    {{--</div>--}}
                    {{--</div>--}}


                            <!-- Begin: life time stats -->
                    <!-- End: life time stats -->
                </div>
            </div>

        </div>
    </div>

    {{--<div id="loading" style="background-color: #00a5bb;position: absolute;height: 100%;width: 100%"></div>--}}
@endsection


@section('pagejavascripts')

    {{--<script src="/assets/user/js/toastr.min.js"></script>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="/assets/user/user-panel/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
            type="text/javascript"></script>
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
    <script type="text/javascript">
        $(function () {
            $('a[title]').tooltip();
        });


        $('#myTab a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
    </script>
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

        //        $(".dropdownd dt a").on('click', function () {
        //            $(".dropdownd dd ul").slideToggle('fast');
        //        });
        //
        //        $(".dropdownd dd ul li a").on('click', function () {
        //            $(".dropdownd dd ul").hide();
        //        });
        //
        //        function getSelectedValue(id) {
        //            return $("#" + id).find("dt a span.value").html();
        //        }
        //
        //        $(document).bind('click', function (e) {
        //            var $clicked = $(e.target);
        //            if (!$clicked.parents().hasClass("dropdownd")) $(".dropdownd dd ul").hide();
        //        });
        //
        //        $('.mutliSelect1 input[type="checkbox"]').on('click', function () {
        //
        //            var title = $(this).closest('.mutliSelect1').find('input[type="checkbox"]').val(),
        //                    title = $(this).val() + ",";
        //
        //            if ($(this).is(':checked')) {
        //                var html = '<span title="' + title + '">' + title + '</span>';
        //                $('.multiSel1').append(html);
        //                $(".hida1").hide();
        //            } else {
        //                $('span[title="' + title + '"]').remove();
        //                var ret = $(".hida1");
        //                $('.dropdownd dt a').append(ret);
        //
        //            }
        //        });
        //
        //        $(".dropdowna dt a").on('click', function () {
        //            $(".dropdowna dd ul").slideToggle('fast');
        //        });
        //
        //        $(".dropdowna dd ul li a").on('click', function () {
        //            $(".dropdowna dd ul").hide();
        //        });
        //
        //        function getSelectedValue(id) {
        //            return $("#" + id).find("dt a span.value").html();
        //        }
        //
        //        $(document).bind('click', function (e) {
        //            var $clicked = $(e.target);
        //            if (!$clicked.parents().hasClass("dropdowna")) $(".dropdowna dd ul").hide();
        //        });
        //
        //        $('.mutliSelect2 input[type="checkbox"]').on('click', function () {
        //
        //            var title = $(this).closest('.mutliSelect2').find('input[type="checkbox"]').val(),
        //                    title = $(this).val() + ",";
        //
        //            if ($(this).is(':checked')) {
        //                var html = '<span title="' + title + '">' + title + '</span>';
        //                $('.multiSel2').append(html);
        //                $(".hida2").hide();
        //            } else {
        //                $('span[title="' + title + '"]').remove();
        //                var ret = $(".hida2");
        //                $('.dropdowna dt a').append(ret);
        //
        //            }
        //        });

    </script>


    <script type="text/javascript">

        $(".dropdownd dt a").on('click', function () {
            $(".dropdownd dd ul").slideToggle('fast');
        });

        $(".dropdownd dd ul li a").on('click', function () {
            $(".dropdownd dd ul").hide();
        });

        $(document).bind('click', function (e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("dropdownd")) $(".dropdownd dd ul").hide();
        });

        $('.mutliSelect1 input[type="radio"]').on('click', function () {
            console.log('mutliSelect1 type radio clicked');

            var title = $(this).closest('.mutliSelect1').find('input[type="radio"]').val();

            if ($(this).is(':checked')) {
                console.log('this is checked',title)
                var html = '<span title="' + title + '">' + title + '</span>';
                $('.multiSel1').html('');
                $('.multiSel1').append(html);
                $(".hida1").hide();
            } else {
                $('span[title="' + title + '"]').remove();
                var ret = $(".hida1");
                $('.dropdownd dt a').append(ret);

            }
        });


        $(".dropdowna dt a").on('click', function () {
            console.log('slideToggle2')
            $(".dropdowna dd ul").slideToggle('fast');
        });

        $(".dropdowna dd ul li a").on('click', function () {
            $(".dropdowna dd ul").hide();
        });

        $(document).bind('click', function (e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("dropdowna")) $(".dropdowna dd ul").hide();
        });

        $('.mutliSelect2, .rmv  input[type="radio"]').on('click', function () {
            console.log('mutliSelect2 type radio clicked');
            var title = $(this).find('input[type="radio"]:checked').parents('label').find('span:first > b').text();
            if ($(this).find('input[type="radio"]').is(':checked')) {
                console.log('this is checked')
                var html = '<span title="' + title + '">' + title + '</span>';
                $('.multiSel2').html('');
                $('.multiSel2').append(html);
                $(".hida2").hide();
            } else {
                $('span[title="' + title + '"]').remove();
                $('.multiSel2').html('');
                var ret = $(".hida2");
                $('.dropdowna dt a').append(ret);

            }
        });

    </script>

    <script>
        $(document).ready(function () {

            $('.mutliSelect2 input[type="radio"]').on('click', function () {
                console.log("mutliSelect2------")
                var title = $(this).closest('.multiSel2').find('input[type="radio"]').val(),
                        title = $(this).val() + ",";
                var group_id = $(this).attr("user_id");
                console.log("group_id-", group_id);
                $('.multiSel2').find('span').remove();
                var html = '<span title="' + title + '" group_id="' + group_id + '">' + title + '</span>';
                $('.multiSel2').append(html);
                $(".hida2").hide();
//                $(".hida2").removeTag();
            })

            $('.mutliSelect1 input[type="radio"]').on('click', function () {
                console.log("mutliSelect1------")
                var title = $(this).closest('.multiSel1').find('input[type="radio"]').val(),
                        title = $(this).val() + ",";
                var selectedUser = $(this).attr("user_id");
                $('.multiSel1').find('span').remove();
                var html = '<span title="' + title + '" selectedUser="' + selectedUser + '">' + title + '</span>';
                $('.multiSel1').append(html);
                $(".hida1").hide();
//                $(".hida1").removeTag();
            })

        })


    </script>

    <script>
        var GroupProcessing = false;
        $(document).ready(function () {
            toastr.options = {
                timeOut: 4000,
                extendedTimeOut: 100,
                tapToDismiss: true,
                debug: false,
                fadeOut: 10,
                positionClass: "toast-top-center",
                limit: 1
            };

            $(document.body).on('click', '#sendGM', function () {

                if (GroupProcessing == true) {
                    toastr.error('please wait, your request is processing on our server');
                    return true;
                }
                console.log('send Button clicked');
                var target_group_id = '';
                var account = '';
                var image = '';
                var groupText = '';
                var imageInfo = '';

                account = $('input[name="account"]:checked').attr('user_id');
                target_group_id = $('input[name="group"]:checked').val();
                image = $('#GImg').find('img').attr('src');
                groupText = $('#groupText').val().trim();

                if (typeof image != 'undefined') {
                    imageInfo = image.split(';')[0].split(':')[1];
                }
                if (typeof account == 'undefined' || account.length == 0) {
                    toastr.error('no account selected');
                    return true;
                } else if (typeof target_group_id == 'undefined' || target_group_id.length == 0) {
                    toastr.error('no group  selected');
                    return true;
                } else if (typeof image == 'undefined' || image.length == 0) {
                    toastr.error('no image selected');
                    return true;
                } else if (typeof imageInfo == 'undefined' || imageInfo != 'image/jpeg') {
                    toastr.error('only jpeg image can be allowed');
                    return true;
                } else if (typeof groupText == 'undefined' || groupText.length == 0) {
                    toastr.error('please type some text');
                    return true;
                }
                GroupProcessing = true;
                $('#stopProcessInstagram').remove();
                $('#sendGM').parent().append('<i class="fa fa-spinner fa-pulse" id="stopProcessInstagram" aria-hidden="true"></i>')

                console.log('group id==>', target_group_id);
                console.log('account ==>', account);
                console.log('groupText ==>', groupText);
                $.ajax({
                    url: '/SendGroupMessage',
                    type: 'post',
                    data: {
                        img: image,
                        target_group_id: target_group_id,
                        account: account,
                        groupText: groupText
                    },
                    success: function (response) {
                        $('#stopProcessInstagram').remove();
                        GroupProcessing = false;
                        if (response.code == 401) {
                            bootbox.alert({
                                title: "Session Expired",
                                message: "session expired or not logged in, please login to continue..!",
                                confirmButton: false,
                                closeButton: false,
                                buttons: {
                                    ok: {
                                        label: '<i class="fa fa-check"></i> Log In'
                                    }
                                },
                                callback: function (result) {
                                    window.location = "/";
                                }
                            });
                            setTimeout(function () {
                                window.location = "/";
                            }, 5000);
                        }
                        else if (response.code == 200) {
                            toastr.success('prosessing started successfully,you will notified');
                        }
                    },
                    error: function (error) {
                        console.log('error====>', error)
                    }
                })

            })
        })

    </script>


    <script>

        $(document).ready(function () {

            $('.mutliSelect1 input').on('change', function () {

                var for_insta_id = $(this).attr('user_id');
                $.ajax({
                    url: '/getGroupById',
                    data: {
                        for_insta_id: for_insta_id,
                    },
                    type: 'post',
                    beforeSend: function (xyz) {
//                    $('.page-content').css('background-color','gray');

//                    console.log('body is hidden');
//                    $('#loading').parent().append(('<i class="fa fa-spinner fa-pulse" id="stopProcess" aria-hidden="true"></i>'));

                    },
                    success: function (response) {
                        var htmlData = '';
                        $('.rmv').remove();
                        if (response.status == 'success' && response.code == 200) {

                            var data = response.data;
                            var target_group_id;
                            var target_group_name;

                            $.each(data, function (index, groupData) {
                                target_group_id = groupData.target_group_id;
                                target_group_name = groupData.target_group_name;
                                htmlData = htmlData + '<li class="rmv"><label><span><b>' + target_group_name + '</b></span><div class="checkbox pull-right"> <input type="radio" value="' + target_group_id + '" user_id="" id="group" name="group" style=""></div> </label></li>';
                            })
                        } else if (response.status == 'failed' && response.code == 400) {
                            htmlData = '<li class="rmv"><strong>NO Group Found ..Create Group <a href="#crtGrp" class="ToCreateGroupButton">click here </a> </strong></li>'

                            console.log('no target group found');
                        }
                        $('.mutliSelect2 ul').append(htmlData);
                    }
                })
            })
        })

    </script>
@endsection

