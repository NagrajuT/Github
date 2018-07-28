@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('headcontent')

        <!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/user/css/custom.css" rel="stylesheet" type="text/css" xmlns:margin="http://www.w3.org/1999/xhtml"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<style>

    #paypalsubmit {
        display: none;
    }

    #paypalsubmit {
        position: relative;
        transition: .5s ease;
        top: 2px;
        left: 380px;
        right: 250px;
        bottom: 100px;
    }

    .nav-tabs > li a {
        border-radius: 100%;
        height: 21px;
        margin: 20px auto;
        padding: 0;
        text-align: center;
        width: auto;
        color: #333;
        border: none;
    }
</style>
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
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
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
        border-bottom: 1px solid #2c3540;
        border-top: 1px solid #5c6570;
    }

    .instagram-share .checkbox, .radio {
        margin-top: 10px;
        position: relative;
    }
</style>
<!-- END PAGE LEVEL STYLES -->
@endsection

@section('active_affiliateProgram','active')

@section('content')
    {{--PAGE CONTENT GOES HERE--}}



        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-cog fa-2x font-green-sharp" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">AFFILIATED LINK</span>
                                </div>
                            </div>
                            <div class="portlet-body">

                                <div class="row links">
                                    {{--<div class="col-md-10 col-md-offset-1 text-center">--}}
                                    <div class="col-md-12 col-md-offset-0 text-center">
                                        <div class="panel panel-default"
                                             style="border-radius: 8px; padding: 10px; border-color: rgba(51, 202, 194, 0.41); opacity: 1; max-height: none;">
                                            <div class="row bg-for-Instructions padding0" style="background: #58b8a9;">
                                                <div class="col-sm-10 col-sm-offset-1 padding0">
                                                    {{--<p>Dear partner, come be a part of our success and make a lot of money very easy.</p>--}}
                                                    <p>Dear partner, come be a part of our success.</p>
                                                    <p>By getting your permission, we will send to all your friends in facebook and all your
                                                        followers on instagram a message to try our system for 5 days free.</p>
                                                    <p>For any of them who will click the link added and subscribe, you will be paid every
                                                        month to your paypal account 30% of his package amount (until he subscribes)
                                                    <p/>
                                                </div>
                                            </div>
                                            <br>
                                            <form role="form" method="post" class="form-horizontal">
                                                <div class="form-group" style="margin-top: 15px;">
                                                    <label class="form-control-label col-sm-2" for="link">Affiliate Link</label>
                                                    <div class="col-sm-5">
                                                        <div>
                                                            <input id="link" readonly value="{{$affiliateData["affliated_link"]}}"
                                                                   class="form-control"
                                                                   type="link" required placeholder="" name="link" style="float:left;">
                                                        </div>
                                                        <br>

                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button class="btn btn-default btn-ag copyToClipboardBtn" type="button"
                                                                data-clipboard-action="copy" data-clipboard-target="#link"
                                                                style="float:left; width: 100%">Copy to Clipboard
                                                        </button>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <div class="share-with-fb-in" style="margin-top: 0;">
                                                            {{--<a href="#myModal1" class="pull-left" data-toggle="modal"><i--}}
                                                            {{--class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp; Share--}}
                                                            {{--with FB</a>--}}
                                                            <a href="#myModal2" class="pull-right" data-toggle="modal"><i
                                                                        class="fa fa-btn" aria-hidden="true"></i>&nbsp;&nbsp; send the
                                                                affiliate link to all your friends on facebook
                                                                and your followers on instagram by message</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="myModal2" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body instagram-share">
                        {{--<h4>Share with Instagram</h4><br>--}}

                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#sharewithig" aria-controls="sharewithig" role="tab" data-toggle="tab">
                                    <img class="img-responsive;" style="width: 34px;" src="/assets/user/user-panel/img/instagram.png">
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#sharewithfb" aria-controls="sharewithfb" role="tab" data-toggle="tab">
                                    <img class="img-responsive;" style="width: 34px;" src="/assets/user/user-panel/img/facebook.png">
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="sharewithig">
                                <div class="form-group">
                                    <div id="InstagramMessage"></div>
                                    <!--------------------------------------->

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
                                                    <li>
                                                        <span style="margin-top:18px;"><b>Select All</b></span>
                                                        <div class="checkbox squaredTwo pull-right">
                                                            <input type="checkbox" value="" id="selectAll" name="check"
                                                                   style="display: none;">
                                                            <label for="selectAll"></label>
                                                        </div>
                                                    </li>


                                                    @if (isset($affiliateData["Instagram_details"]))
                                                        @foreach ($affiliateData["Instagram_details"] as $value)
                                                            @if($value['status']=='A' && $value['is_logged_in']=='Y' && $value['is_user_disconnected'] =='N' && $value['has_account_locked']=='F' )
                                                                <li>
                                                                    <img src="{{$value["profile_pic_url"]}}" width="40">
                                                                    <span class="fName"><b>{{$value["full_name"] or 'instafficUser'}}</b> <br> <small>{{$value["username"]}}</small></span>
                                                                    <div class="checkbox squaredTwo pull-right">
                                                                        <input class="instaCheck" type="checkbox"
                                                                               value="{{$value["full_name"] or 'instafficUser'}}"
                                                                               id="{{$value["ins_user_id"]}}" name="check"
                                                                               style="display: none;">
                                                                        <label for="{{$value["ins_user_id"]}}"></label>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </dd>

                                    </dl>

                                    <!--************************* / ************** -->

                                    <div class="input-group">
                                        <span class="input-group-addon primary"><span
                                                    class="glyphicon glyphicon-check"></span></span>
                                <textarea type="password" id="insta_text" class="form-control"
                                          style="width: 529px; height: 200px;"
                                          placeholder="Message">Hi dear friend, I got familiar with an amazing application that expose your Instagram profile up to 15,000 people each month also by filters to target audience (gender / places / hashtags / followers of specific user).

It will increase your profile by thousands of real  followers and likes.

You have 5 days use  free of charge .. you have to try it!!

Push this link  for downloading the application.</textarea>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon primary">Affiliate Link</span>
                                        <input type="text" id="aff_link" class="form-control"
                                               placeholder="{{$affiliateData["affliated_link"]}}" disabled>
                                    </div>
                                    <br>
                                </div>
                                <div class="row">
                                    <center class="link-share-login">
                                        <button type="button" id="getInstaUser" class="btn btn-default">Share</button>
                                    </center>
                                </div>
                                <br>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="sharewithfb">
                                <div class="form-group">
                                    <div id="message"></div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary"><span
                                                    class="glyphicon glyphicon-check"></span></span>
                                        <input type="email" id="fbEmail" class="form-control" placeholder="Email Id">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><span
                                                    class="glyphicon glyphicon-check"></span></span>
                                        <input type="password" id="fbPass" class="form-control" placeholder="******">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><span
                                                    class="glyphicon glyphicon-check"></span></span>
                                <textarea type="password" id="fbText" class="form-control"
                                          style="width: 529px; height: 200px;"
                                          placeholder="Message">Hi dear friend, I got familiar with an amazing application that expose your Instagram profile up to 15,000 people each month also by filters to target audience (gender / places / hashtags / followers of specific user).

It will increase your profile by thousands of real  followers and likes.

You have 5 days use  free of charge .. you have to try it!!

Push this link  for downloading the application.</textarea>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon primary">Affiliate Link</span>
                                        <input type="text" id="aff_link" class="form-control"
                                               placeholder="{{$affiliateData["affliated_link"]}}" disabled>
                                    </div>
                                    <br>
                                </div>
                                <div class="input-group link-share-login" style="margin:auto;">
                                    <button type="button" id="fbLogin" class="btn btn-default">Login and Share</button>
                                </div>
                                <br>

                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>




    @endsection

    @section('pagejavascripts')

            <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="/assets/user/js/clipboard.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('a[title]').tooltip();
        });
    </script>

    {{--<script type="text/javascript">--}}
    {{--$(document).ready(function () {--}}

    {{--$.ajax({--}}

    {{--url: '/getUserInAffiliate',--}}
    {{--type: 'post',--}}


    {{--success: function (response) {--}}
    {{--if (response==201)--}}
    {{--{--}}
    {{--alert("no data found")--}}
    {{--}--}}
    {{--else if(response == 202)--}}
    {{--{--}}
    {{--alert("invalid request")--}}
    {{--}--}}
    {{--else{--}}
    {{--console.log(response[1]);--}}
    {{--}--}}

    {{--}--}}
    {{--});--}}

    {{--})--}}

    {{--</script>--}}

    <script>
        var clipboard = new Clipboard('.copyToClipboardBtn');


        clipboard.on('success', function (e) {
            console.log(e);

//            e.clearSelection();
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);
            showTooltip(e.trigger, 'Copied!');

        });

        clipboard.on('error', function (e) {
            console.log(e);

            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
            showTooltip(e.trigger, fallbackMessage(e.action));
        });


        function showTooltip(elem, msg) {
            //elem.setAttribute('class', 'btn tooltipped tooltipped-s');

            elem.setAttribute('class', ' btn btn-default btn-ag copyToClipboardBtn tooltipped tooltipped-s');
            elem.setAttribute('aria-label', msg);
        }


        function fallbackMessage(action) {
            var actionMsg = '';
            var actionKey = (action === 'cut' ? 'X' : 'C');
            if (/iPhone|iPad/i.test(navigator.userAgent)) {
                actionMsg = 'No support :(';
            }
            else if (/Mac/i.test(navigator.userAgent)) {
                actionMsg = 'Press ?-' + actionKey + ' to ' + action;
            }
            else {
                actionMsg = 'Press Ctrl-' + actionKey + ' to ' + action;
            }
            return actionMsg;
        }


    </script>



    {{--instagram/facebook messaging-----------------(start)----------------}}
    <script>
        toastr.options = {
            timeOut: 4000,
            extendedTimeOut: 100,
            tapToDismiss: true,
            debug: false,
            fadeOut: 10,
            positionClass: "toast-top-center",
            limit: 1
        };
        var InstagramProcessing = false;
        $(document).ready(function () {
            var insta_accounts = [];

            $("#getInstaUser").click(function () {
                console.log('instagram messaging..')
                if (InstagramProcessing == true) {
                    toastr.error('wait for process to complete');
                    return true;
                }

                var insta_text = $('#insta_text').val();
                var aff_link = $('#aff_link').attr('placeholder');

                $(".instaCheck").each(function (index) {
                    var value = $(this).attr("id");
                    if ($(this).is(":checked")) {
                        insta_accounts.push(value);

                        insta_accounts = insta_accounts.filter(function (item, pos) {
                            return insta_accounts.indexOf(item) == pos;
                        })
                    }
                    else {
                        insta_accounts = jQuery.grep(insta_accounts, function (e) {
                            return e != value
                        })
                    }
                });
                console.log(insta_accounts);
                if (insta_accounts.length == 0) {
                    toastr.error('Please select atleast one account');
                    return true;
                }
                $('#stopProcessInstagram').remove();
                $('#getInstaUser').parent().append('<i class="fa fa-spinner fa-pulse" id="stopProcessInstagram" aria-hidden="true"></i>')
                InstagramProcessing = true;
                $.ajax({
                    url: '/affiliateInstagramMessage',
                    type: 'post',
                    data: {
                        'accounts': insta_accounts,
                        'aff_link': aff_link,
                        'insta_text': insta_text
                    },
                    success: function (response) {
                        InstagramProcessing = false;
                        $('#stopProcessInstagram').remove();
                        if (response == 200) {
                            toastr.success('Affiliate link sharing prosess started, you will notified once done');
                        } else if (response == 400) {
                            toastr.error('Failed to share affiliate  link to Instagram followers');
                        } else if (response == 401) {
                            toastr.error('Invalid token, try again');
                        } else if (response == 402) {
                            toastr.error('No accounts selected');
                        }
                    }
                });

            })

        })

    </script>
    <script>

        var processing = false;
        $(document.body).on('click', '#fbLogin', function () {
            toastr.options = {
                timeOut: 4000,
                extendedTimeOut: 100,
                tapToDismiss: true,
                debug: false,
                fadeOut: 10,
                positionClass: "toast-top-center",
                limit: 1
            };

            if (processing == true) {
                toastr.error('wait for process to complete');
                //                $('#message').css('color', 'green').text('wait for process to complete').show().fadeOut(10000);
                return true;
            }

            console.log('<<--sharing to facebook friends--->>')

            var email = $('#fbEmail').val();
            var pass = $('#fbPass').val();
            var fbText = $('#fbText').val();
            if (pass.length == 0 || email.length == 0) {
                toastr.error('please provide inputs to login into facebook');
                return true;
            }
            $('#stopProcess').remove();
            $('#fbLogin').parent().append('<i class="fa fa-spinner fa-pulse" id="stopProcess" aria-hidden="true"></i>')
            processing = true;
            $.ajax({
                url: '/affiliateFacebookMessage',
                method: 'post',
                data: {
                    'email': email,
                    'pass': pass,
                    'fbText': fbText,
                },
                timeout: 60 * 60000,
                success: function (response) {

                    processing = false;
                    $('#stopProcess').remove();
                    if (response.code == 500) {
                        toastr.success(response.message);
                    } else if (response.code == 501) {
                        toastr.error(response.message);
                    } else if (response.code == 502) {
                        toastr.error(response.message);
                    } else if (response.code == 503) {
                        if (response.validation_errors[0] != null && response.validation_errors[1] != null) {
                            toastr.error(response.validation_errors[0] + '<br>' + response.validation_errors[1]);
                        } else {
                            toastr.error(response.validation_errors[0]);
                        }
                    } else if (response.code == 504) {
                        toastr.success(response.message);
                    }
                    console.log('response', response);
                },
                error: function (err) {
                    $('#stopProcess').remove();
                    toastr.error('some unknown error occured');
                    console.log('some error', err);
                }
            });


        })
    </script>
    {{--instagram/facebook----------------------------(end)-----------------}}


    <script>
        $(document).ready(function () {
            $('#selectAll').on('change', function () {
                if (this.checked) {
                    $('.insta_name').remove();
                    $('#myModal2 .checkbox.squaredTwo').find('input').prop('checked', true);
                    $(".fName").each(function (index) {
                        var title = $(this).find('b').html();
                        var html = '<span class="insta_name" title="' + title + '">' + title + ', ' + '</span>';
                        $('.multiSel').append(html);
                    });
                } else {
                    $('#myModal2 .checkbox.squaredTwo').find('input').prop('checked', false);
                    $('.insta_name').remove();

                }
            });

            $('#myModal2 .checkbox.squaredTwo').find('input').on('change', function () {
                if (!(this.checked)) {
                    $('#selectAll').prop('checked', false);


                }
            });
        });
    </script>

    <script>

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

        $('.mutliSelect input[type="checkbox"]').on('click', function () {

            var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
                    title = $(this).val();

            if ($(this).is(':checked')) {
                var html = '<span class="insta_name" title="' + title + '">' + title + ', ' + '</span>';
                $('.multiSel').append(html);
                $(".hida").hide();
            } else {
                $('span[title="' + title + '"]').remove();
                var ret = $(".hida");
                $('.dropdownd dt a').append(ret);

            }
        });

    </script>


    <!-- END PAGE LEVEL PLUGINS -->
@endsection