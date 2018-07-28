@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('active_profileManagement','active')

@section('headcontent')
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet"
          href="/assets/user/user-panel/global/plugins/dropify-master/dropify-master/dist/css/dropify.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/user/css/sweetalert.css">
    <style>
        .truncate {

            min-width: auto !important;
            max-width: 215px;

            /*width: 250px;*/
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
    </style>
    <style>
        .dateselecter label,
        .dateselecter input,
        .dateselecter i {
            display: inline-block;
        }

        #area,
        #searchtags,
        #add {
            display: none;
        }

        .removehover a:hover {
            background-color: white !important;
            color: #33CAC2 !important;
        }

        .dropdown > .dropdown-menu,
        .dropdown-toggle > .dropdown-menu,
        .btn-group > .dropdown-menu {
            margin-top: 0px !important;
        }

        .unit-tag {
            background: #666665 none repeat scroll 0 0 !important;
            border-radius: 4px !important;
            color: #fff !important;
            display: inline-block !important;
            line-height: 34px !important;
            margin: 0 26px 20px 0 !important;
            padding: 0 22px 0 12px !important;
            position: relative !important;
            text-decoration: none !important;
            vertical-align: middle !important;
        }

        .unit-btn-x {
            cursor: pointer !important;
            display: inline-block !important;
            font-family: Verdana !important;
            font-size: 14px !important;
            height: 34px !important;
            margin-left: 10px !important;
            right: 0 !important;
            text-align: center !important;
            top: 0 !important;
            width: 15px !important;
        }

        button.accordion {
            background-color: #fff;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        button.accordion.active,
        button.accordion:hover {
            background-color: #ddd;
        }

        button.accordion:after {
            content: '+';
            font-size: 20px;
            color: red;
            float: right;
            margin-left: 5px;
        }

        button.accordion.active:after {
            content: "-";
        }

        div.panel {
            padding: 0 18px;
            background-color: #EFF3F8;
            max-height: 0;
            overflow: hidden;
            transition: 0.6s ease-in-out;
            opacity: 0;
            padding-top: 15px;
        }

        div.panel.show {
            opacity: 1;
            max-height: 500px;
        }

        /*
    button.close {
        font-size: 40px !important;
    }
*/

        .close {
            padding-bottom: 8px;
            padding-top: 12px;
        }

        /*
    .closebtn {
        margin-left: 250px !important;
        background-color: #444D58 !important;
        color: white !important;
    }
*/

        .btnspace {
            margin-bottom: 10px;
        }

        .btncolor {
            background-color: #666665 !important;
            color: white !important;
            border-right: none !important;
        }

        .unit-tag img {
            border-radius: 15px !important;
            padding-right: 5px;
        }

        /*checks*/
        /*CSS Reset*/

        body {
            line-height: 1;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: normal;
        }

        ol, ul {
            list-style: none;
        }

        blockquote, q {
            quotes: none;
        }

        blockquote:before, blockquote:after,
        *:before, *:after {
            content: '';
            content: none;
        }

        :focus {
            outline: 0;
        }

        ins {
            text-decoration: none;
        }

        del {
            text-decoration: line-through;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        address, caption, cite, code, dfn, em, strong, var {
            font-weight: normal;
            font-style: normal;
        }

        caption, th {
            text-align: left;
            font-weight: normal;
            font-style: normal;
        }

        /*Starting block */
        /*by 10tribu */
        /** {*/
        /*transition: all .5s ease-out;*/
        /*}*/

        #warp {
            margin: 0 auto;
            width: 400px;
            text-align: center;
        }

        /* contour */
        div.push {
            position: relative;
            margin: 5px auto;
            padding: 6px 8px;
            width: 172px;
            height: 60px;
            border-radius: 25px;
            background-image: linear-gradient(bottom, rgba(255, 255, 255, .17) 0%, rgba(15, 16, 16, .17) 100%);
            background-clip: padding-box;
        }

        div.minimal {
            position: relative;
            margin: 10px auto -56px;
            padding: 6px 8px;
            width: 172px;
            height: 60px;
            background-image: none;
        }

        /* contour arriere du bouton */
        div.push:after {
            position: absolute;
            top: 6px;
            left: 4px;
            padding: 4px;
            width: 170px;
            height: 54px;
            border-radius: 17px;
            background-color: #4b5461;
            background-clip: padding-box;
            box-shadow: 0 4px 6px 2px rgba(15, 16, 16, .49);
            content: "";
        }

        div.minimal:after {
            display: none;
        }

        /* Bouton */
        label.check {
            position: relative;
            z-index: 20;
            display: block;
            margin: 0px 0 0;
            padding: 14px 0px;
            width: 134px;
            height: 28px;
            border-radius: 14px;
            background-color: #b3bbc5;
            background-image: linear-gradient(bottom, rgba(0, 0, 0, .24) -2.65%, rgba(255, 255, 255, .24) 97.35%);
            background-clip: padding-box;
            box-shadow: 0 2px 6px 2px rgba(15, 16, 16, .49), inset 0 3px rgba(255, 255, 255, 0.75);
            color: #464950;
            text-align: left;
            text-indent: 34px;
            font-size: 14px;
            line-height: 0px;
            cursor: pointer;
            user-select: none;
        }

        div.push label.check:hover {
            background-color: #bbc4cf;
        }

        div.minimal label.check:hover {
            background-color: #959ca7;
        }

        div.push label.check:active {
            background-image: linear-gradient(bottom, rgba(0, 0, 0, .34) -2.65%, rgba(255, 255, 255, .14) 97.35%);
            transform: scale(0.95);
        }

        div.push label.check:active ~ div.push:after { /* no work */
            transform: scale(0.95);
        }

        div.minimal label.check {
            background-color: #959ca7;
            background-image: none;
            box-shadow: none;
            color: #d5dadf;
            cursor: default;
        }

        div.minimal label.check:active {
            margin: 2px 0 0;
            background-image: none;
            transform: scale(0.99);
        }

        /* reflet du bouton */
        label.check:after {
            position: absolute;
            top: 2px;
            left: 0px;
            width: 170px;
            height: 28px;
            border-radius: 14px 14px 0px 0px / 14px 14px 0px 0px;
            background-color: rgba(255, 255, 255, .21);
            background-clip: padding-box;
            content: "";
        }

        label.check:hover:after {
            background-color: rgba(255, 255, 255, .32);
        }

        div.minimal label.check:after {
            display: none;
        }

        /* checkbox */
        input[type="checkbox"].push-btn {
            position: absolute;
            left: 0px;
            z-index: 20;
            display: inline-block;
            float: left;
            margin: -6px 20px 0 0;
            width: 33px;

            border-radius: 4px;
            background-color: rgba(69, 75, 88, 1.000);
            background-image: linear-gradient(bottom, rgba(235, 235, 235, .27) 0%, rgba(17, 17, 18, .27) 100%);
            background-clip: padding-box;
            box-shadow: 0 0 6px rgba(245, 245, 245, .2), inset 0 0 8px rgba(15, 16, 16, .75);
            appearance: none;
        }

        div.minimal input[type="checkbox"].push-btn {
            background-color: #d5dadf;
            background-image: none;
            box-shadow: none;
        }

        /* case coché */
        input[type="checkbox"].push-btn:checked:after {
            position: absolute;
            top: -2px;
            left: 4px;
            display: block;
            color: white;
            content: "✓";
            text-shadow: 0px 1px 2px black;
            font-weight: 300;
            font-family: "Charcoal CY";
        }

        div.minimal input[type="checkbox"].push-btn:checked:after {
            position: absolute;
            top: -2px;
            left: 4px;
            display: block;
            color: #959ca7;
            content: "✓";
            text-shadow: none;
        }

        /* codepen add */
        .remarque {
            font-size: 10px;
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
                            <span class="caption-subject font-green-sharp bold uppercase">Direct Messaging </span>
                            <span class="caption-helper"> (Send Message to Target Group....)</span>
                        </div>
                    </div>


                    <div class="portlet-body">


                        @if($status=='success')
                            @if(isset($data['accountList']) && !empty($data['accountList']))
                                <form action="/direct/messages" method="post" id="formSubmit"
                                      enctype="multipart/form-data">
                                    <div class="row">
                                        <div id="accountSelection">

                                            <div class="col-md-3">

                                            </div>
                                            <div class="col-md-6" style="margin-top: 10px;">

                                                <div class="col-md-3" style="margin-top: 10px;text-align: right;">
                                                    <label for="instaUserId">Choose Account</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select name="instaUserId" id="instaUserId" class="form-control"
                                                            value="{{old('instaUserId')}}"
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
                                                            <option value="">-- No Account Found --</option>
                                                        @endif

                                                    </select>
                                                    <span style="color:red">{{$errors->first('instaUserId')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(isset($data['selectedUserDetails']))

                                        @if($data['selectedUserDetails']['is_logged_in']=='Y' && $data['selectedUserDetails']['is_user_disconnected']=='N' )

                                            @if($data['selectedUserDetails']['time_period_left']==0)
                                                @if($data['selectedUserDetails']['subscribe_type']=='DU')
                                                    <div class="row text-center" style="margin-top: 20px;">
                                                        <span style="color:red">Your trail period end. Upgrade your subscription to continue.</span>
                                                    </div>
                                                @else
                                                    <div class="row text-center" style="margin-top: 20px;">
                                                        <span style="color:red">Your subscription period end. Upgrade your subscription to continue.</span>
                                                    </div>
                                                @endif

                                            @elseif($data['selectedUserDetails']['status']=='I')
                                                <div class="row text-center" style="margin-top: 20px;">
                                                    <span style="color:red">This Account is Inactive !!! Please Active this Account First </span>
                                                </div>
                                            @endif
                                        @endif
                                    @endif

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center">
                                            <a target="_blank" href="/user/DirectMessageTargetgroup">Click Here</a>
                                            <span class="caption-helper">to Create or Edit target groups</span>
                                        </div>
                                    </div>
                                    <br><br>

                                    @if(isset($data['selectedUserDetails']) && $data['selectedUserDetails']['is_user_disconnected']!='Y')
                                        @if(isset($data['selectedUserDetails']) && $data['selectedUserDetails']['subscribe_type']=='BU')

                                            <div class="row">

                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <label for="targetGroupId">
                                                        <span></span>
                                                        <b><i><img src="/assets/user/images/group_message.png"
                                                                   width="20px"
                                                                   height="20px"></i>
                                                            Choose to which group you want to send the message</b>
                                                    </label>
                                                    <br>

                                                    <div class="col-md-12 col-sm-12" style="padding: 0;">
                                                        <div class="" style="margin-bottom: 10px;">
                                                            <select name="targetGroupId" id="targetGroupId"
                                                                    class="form-control"
                                                                    value="{{old('targetGroupId')}}"
                                                                    style="border:1px solid #7d888e; border-radius:5px;">
                                                                @if(isset($data['targetGroupDetails']) && !empty($data['targetGroupDetails']))

                                                                    @foreach($data['targetGroupDetails'] as $key=>$value)
                                                                        <option value="{{$value['target_group_id']}}">
                                                                            {{$value['target_group_name']}}
                                                                        </option>
                                                                    @endforeach

                                                                @else
                                                                    <option value="">-- No Target Group Found --
                                                                    </option>
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <br><br>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-sm-8 col-md-6">
                                                    <label for="pictureMessage"><span></span><b><i><img
                                                                        src="/assets/user/images/cloud-upload.png"
                                                                        width="20px"
                                                                        height="20px"></i> Browse picture</b></label>
                                                    <br>
                                                    <input type="file" accept="image/*" id="pictureMessage"
                                                           name="pictureMessage" class="dropify"
                                                           value="{{old('pictureMessage')}}" required="required"/>

                                                </div>
                                            </div>
                                            <br><br>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-sm-8 col-md-6">
                                                    <label for="textMessage"><span></span><b><i><img
                                                                        src="/assets/user/images/message-caption.png"
                                                                        width="20px"
                                                                        height="20px"></i> Write Message </b></label>
                                                    {{--<span style="font-size: 11px"> ( optional )</span>--}}

                                                    <textarea rows="3" id="textMessage" name="textMessage"
                                                              class="form-control">{{old('textMessage')}}</textarea>

                                                </div>
                                            </div>
                                            <br><br>

                                            <div class="row text-center">
                                                <input type="submit" id="saveBtn" class="btn btn-success" value="Send">
                                            </div>

                                        @else
                                            <div class="row text-center">

                                                {{--<img src="/assets/user/images/warning_purple.png" alt="" width="100">--}}
                                                <img src="/assets/user/images/warning_yellow.png" alt="" width="100">
                                                <br><br>
                                                <div style="font-size:17px;">This feature is Available for Business
                                                    Subscriber
                                                    only. <br>
                                                    Upgrade Subscription Package for this account
                                                    ( @ {{$data['selectedUserDetails']['username']}})
                                                </div>
                                                <br><br>
                                                <a href="/user/packageLists" class="btn btn-success"
                                                   style="background-color: #5cb85c">Buy subscription
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <br><br>

                                            </div>
                                        @endif
                                    @else

                                        <div class="row text-center">
                                            <div class="row text-center">

                                                <img src="/assets/user/images/warning_error.png" alt="" width="100">
                                                <br><br>

                                                <div style="padding:12px;color: red">This Account has been disconnected
                                                    from
                                                    Smartffic System !!!
                                                    <br>
                                                    Please Re-Connect Your Account
                                                    <br>
                                                    <br> <br>
                                                    Go To <u><a href="/user/dashboard" style="color: red">Account
                                                            Activation </a></u> -- >
                                                    Choose Account -->More -->Re-Connect Account
                                                </div>

                                                <br><br>

                                            </div>
                                        </div>
                                    @endif


                                </form>
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
            </div>
            <!-- END PAGE CONTENT -->
        </div>
    </div>

    <!-- -------------Modals For Display Success or error message------------------->
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
    <script src="/assets/user/js/bootbox.min.js"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>
    <script src="/assets/user/js/loadingoverlay.js"></script>
    <script src="/assets/user/user-panel/global/plugins/dropify-master/dropify-master/dist/js/dropify.min.js"></script>

    <script type="text/javascript">


        $(document).ready(function () {
            // Basic
            $('.dropify').dropify({
                messages: {
                    'default': 'Click to Browse file',
                    'replace': 'Click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                }
            });

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    'default': 'Click to Browse file',
                    'replace': 'Click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function (event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function (event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function (e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });

    </script>
    <script type="text/javascript">

        $(document).ready(function () {

            $(document.body).on('click', '#saveBtn', function (e) {
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

                    var targetGroupId = $('#targetGroupId option:selected').val();
                    if (targetGroupId.length == 0) {
                        toastr.error("No target group found for this @"+obj.attr('data-username')+" account. Please Create Target Group First");
                        $('#targetGroupId').focus();
                        return false;
                    }


                    var fileObj = $('#pictureMessage');
                    if (fileObj.val().length == 0) {
                        toastr.error('Select an image first');
                        fileObj.focus();
                        return false;
                    }


                    var textMessageObj = $('#textMessage');
                    var textMessage = textMessageObj.val();
                    if (textMessage.length == 0) {
                        toastr.error('Please write some text.');
                        textMessageObj.focus();
                        return false;
                    }

                    $('#formSubmit').submit();
                }
            })


            $(document.body).on('change', '#instaUserId', function (e) {
                e.preventDefault();
                window.location.href = '/direct/messages/' + $(this).val();
            });


            var directMessageDataSavedStatus = "@if(isset($directMessageDataSavedMsg)) {{$directMessageDataSavedMsg['status']}} @endif " || null;
            if (directMessageDataSavedStatus != null && directMessageDataSavedStatus.trim().length > 0) {
                var directMessageDataSavedMsg = "@if(isset($directMessageDataSavedMsg)) {{$directMessageDataSavedMsg['message']}} @endif";
                var htmlModalData = '';
                if (directMessageDataSavedStatus.trim() == 'success') {
                    htmlModalData = '<img id="img-upload" src="/assets/user/images/success.png"> <br>' +
                            '<strong style="font-size: x-large;">Awesome!</strong>' +
                            '<h4>' + directMessageDataSavedMsg + '</h4>';

                    $('#customModelData').html(htmlModalData);
                    $('#customModal').modal('show');

                } else {
                    htmlModalData = '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                            '<strong style="font-size: large;">Oops!</strong>' +
                            '<h4>' + directMessageDataSavedMsg + '</h4>';
                    $('#customModelData').html(htmlModalData);
                    $('#customModal').modal('show');
                }
            }
        });

    </script>
@endsection

