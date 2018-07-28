@extends('User::layouts.bodyLayout')
@section('active_profileManagement','active')

@section('headcontent')
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">

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
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs"></script>
@endsection


@section('content')
    {{--body--}}
    <div class="page-content">
        <br>
        <div class="container">
            <h3 class=""><b style="color: #545456;">Direct Messages</b>
                <i class="fa fa-cogs fa-2x" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>
            </h3>
            <br>
        </div>
        <br>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <dl class="dropdownd">

                    <dt>
                        <a href="#">
                            <span class="hida1">Choose here from which account you want to send the message</span>
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
                                            <li>
                                                <img src="{{$value['profile_pic_url']}}" width="40">
                                                <span><b>{{$value['username']}}</b></span>
                                                <div class="checkbox pull-right">
                                                    {{--<input type="checkbox" value="{{$value['username']}}" id="squaredone" name="check" style="">--}}
                                                    <input type="radio" value="{{$value['username']}}"
                                                           user_id="{{$value['ins_user_id']}}" id="squaredone"
                                                           name="check" style="">

                                                    {{--<label for="squaredone"></label>--}}
                                                </div>
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
                            <ul>
                                @if(isset($created_MessageGroups_final) && !empty($created_MessageGroups_final))
                                    @foreach($created_MessageGroups_final as $val)
                                        <li>
                                            <img src="{{$val['From_user']['profile_pic_url']}}"
                                                 width="40">
                                            <span><b>Group
                                                    Name: {{$val['created_MessageGroups']['target_group_name']}}</b></span>
                                            <div class="checkbox pull-right">
                                                {{--<input type="checkbox" value="Jagpreet Kaur" id="squaredthree" name="check" style="display: none;"><label for="squaredthree"></label>--}}
                                                <input type="radio" value="{{$val['created_MessageGroups']['target_group_name']}}"
                                                       user_id="{{$val['created_MessageGroups']['target_group_id']}}" id="squaredone"
                                                       name="check" style="">
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li><strong>NO Group Found ..Create Group
                                            <buttoon class="ToCreateGroupButton">click here</buttoon>
                                        </strong></li>
                                @endif
                            </ul>
                        </div>
                    </dd>
                </dl>
                <div class="">
                    <div>
                        {{--<div id="imaginary_container ">--}}
                        <div class="input-group stylish-target-group" align="center">
                            &nbsp &nbsp &nbsp &nbsp
                            <a href="/user/DirectMessageTargetgroup" class="" data-toggle="modal">Create
                                Targeted Group</a>
                            &nbsp &nbsp &nbsp &nbsp
                            <a href="/user/DirectMessageTargetgroup" class="" data-toggle="modal">Edit
                                Targeted Group</a>
                        </div>
                    </div>
                    <br>
                    <input class="form-control input-lg" placeholder="Upload Image" type="file">

                    <br>


                    <textarea class="form-control" rows="3" placeholder="Message here..."></textarea>
                    <br>
                    <div align="center">
                        <a href="#" class="btn btn-success">Send</a>
                        <div>
                        </div>
                    </div>
                </div>

                {{--model content--}}
            </div>
        </div>
    </div>

@endsection


@section('pagejavascripts')

    <script src="/assets/user/js/toastr.min.js"></script>

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

        $('.mutliSelect1 input[type="checkbox"]').on('click', function () {

            var title = $(this).closest('.mutliSelect1').find('input[type="checkbox"]').val(),
                    title = $(this).val() + ",";

            if ($(this).is(':checked')) {
                var html = '<span title="' + title + '">' + title + '</span>';
                $('.multiSel1').append(html);
                $(".hida1").hide();
            } else {
                $('span[title="' + title + '"]').remove();
                var ret = $(".hida1");
                $('.dropdownd dt a').append(ret);

            }
        });

        $(".dropdowna dt a").on('click', function () {
            $(".dropdowna dd ul").slideToggle('fast');
        });

        $(".dropdowna dd ul li a").on('click', function () {
            $(".dropdowna dd ul").hide();
        });

        function getSelectedValue(id) {
            return $("#" + id).find("dt a span.value").html();
        }

        $(document).bind('click', function (e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("dropdowna")) $(".dropdowna dd ul").hide();
        });

        $('.mutliSelect2 input[type="checkbox"]').on('click', function () {

            var title = $(this).closest('.mutliSelect2').find('input[type="checkbox"]').val(),
                    title = $(this).val() + ",";

            if ($(this).is(':checked')) {
                var html = '<span title="' + title + '">' + title + '</span>';
                $('.multiSel2').append(html);
                $(".hida2").hide();
            } else {
                $('span[title="' + title + '"]').remove();
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



@endsection

