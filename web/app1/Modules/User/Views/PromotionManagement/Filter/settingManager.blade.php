@extends('User::layouts.bodyLayout')

@section('headcontent')
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/user/css/sweetalert.css">
    <style>

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .8) url('<?php echo env('API_URL')?>/assets/user/images/ajax-loader.gif') 50% 50% no-repeat;
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

@section('active_profilePromotion','active')
@section('content')
    <!-- END HEADER -->
    <!-- BEGIN PAGE CONTAINER -->

    <div class="page-content">
        <div class="container">

            <div class="row">

                <!-- Begin: life time stats -->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs fa-2x font-green-sharp" aria-hidden="true"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Settings Manager</span>
                            <span class="caption-helper"> (Apply or Delete preset setting on selected accounts...)</span>
                        </div>
                    </div>


                    <div class="portlet-body">

                        <div class="row">
                            @if($status=='success')
                                @if(isset($data) && !empty($data['accountList']))
                                    <div class="col-md-8 col-md-offset-2">
                                        <p>Using this tool you can apply the same saved preset of activity settings to
                                            selected
                                            accounts. Please note that
                                            <b><i>this action is irreversible</i></b> and current activity settings on
                                            selected
                                            accounts will be replaced by ones saved in the
                                            preset. If you would like to keep your settings of the selected account(s),
                                            please
                                            save them as new preset(s) before to use this tool.
                                        </p>


                                        <div class="form-group">

                                            <select class="form-control pull-left" id="selectOptionPreset" required
                                                    style="width:90%">
                                                @if(isset($data) && !empty($data['presetList']))
                                                    <option value=""> select Preset Name</option>
                                                    @foreach($data['presetList'] as $value)
                                                        <option value="{{$value['manager_settings_id']}}">{{$value['manager_settings_name']}}</option>
                                                    @endforeach
                                                @else
                                                    <option value=""> No Activity Settings Preset Name Found</option>
                                                @endif
                                            </select>

                                            <button id="deletePresetSettings" title="Delete selected Preset Settings"
                                                    class="btn btn-danger pull-right">
                                                <i class="fa fa-trash" aria-hidden="true" style="color: #fff;"></i>
                                            </button>

                                            <br>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <p class="grey"
                                                   style="padding:10px 0 10px;float:left;color:#4DB3A2 !important;">
                                                    Select
                                                    usernames: </p>
                                                <a href="javascript:;" id="selectAllInstaAccount"
                                                   style="color:#a2a2a2;float:left;padding:10px 0 10px;">
                                                    &nbsp;All&nbsp;</a>
                                                <a href="javascript:;" id="unSelectAllInstaAccount"
                                                   style="color:#a2a2a2;float:left;padding:10px 0 10px;">
                                                    &nbsp;None&nbsp;</a>
                                            </div>
                                        </div>


                                        <div class="form-group pull-left" style="width: 100%;">
                                            @if((isset($data) && !empty($data['accountList'])) && $count=1)
                                                @foreach($data['accountList'] as $key=>$value)
                                                    @if(($value['is_user_disconnected']=='N' && $value['has_account_locked']=='F') && $count++)
                                                        <div class="col-md-5 usercheck padgmrgn">
                                                            <span class="usrpic">
                                                                <img width="40" src={{$value['profile_pic_url']}}>
                                                         </span>
                                                            <a href="https://www.instagram.com/{{$value['username']}}"
                                                               target="_blank" class="usrnm"
                                                               style="color: skyblue">{{'@'.$value['username']}}
                                                            </a>

                                                            <span>
                                                             <div class="checkbox pull-right">
                                                                <label>
                                                                    <input type="checkbox" class="selectAccountList"
                                                                           data-instaUserId="{{$value['ins_user_id']}}"
                                                                           data-time_period_left="{{$value['time_period_left']}}"
                                                                           data-subscribe_type="{{$value['subscribe_type']}}"
                                                                           data-is_logged_in="{{$value['is_logged_in']}}"
                                                                           data-is_user_disconnected="{{$value['is_user_disconnected']}}"
                                                                           data-has_account_locked="{{$value['has_account_locked']}}"
                                                                           data-status="{{$value['status']}}"
                                                                           data-username="{{$value['username']}}">
                                                                    <span class="cr">
                                                                        <i class="cr-icon glyphicon glyphicon-ok"></i>
                                                                    </span>
                                                                 </label>
                                                            </div>
                                                           </span>
                                                        </div>
                                                    @endif
                                                @endforeach

                                                @if($count==1)
                                                    <div class="row text-center">
                                                        <img src="/assets/user/images/warning_error.png" alt=""
                                                             width="100">
                                                        <br><br>
                                                        <div style="padding:12px; color: red">
                                                            <p>All your Added Accounts has been disconnected from our
                                                                System <br>
                                                                Please Re-Connect your Added Account to use this
                                                                service.</p>
                                                        </div>
                                                        <br><br>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <br/>

                                        <div class="col-md-12 pull-left">
                                            <div class="text-center">
                                                <button type="button"
                                                        style="margin-top:10px;background-color:#33cac2;color:#fff;"
                                                        class="btn btn-default" id="loadPresetSettingsBtn">
                                                    Load Preset Settings
                                                </button>
                                            </div>

                                        </div>

                                    </div>

                                    <div id='loader' style='display: none; position: absolute;left: 299px;top: 129px;'>
                                        <img src='/assets/user/images/ajax-loader.gif' width='85px' height='85px'>
                                    </div>
                                @else
                                    <div class="row text-center">
                                        <h2> welcome to INSTAFFIC </h2>
                                        <span style="text-align: right">{{Session::get('instaffic_user')['email']}}</span>
                                        <br>
                                        <h3>Social media that works 24x7 on instagram profile to increase real
                                            followers, likes &
                                            comments</h3>

                                        <p>Add Atleast one Account to use instaffic services </p>
                                        <br><br>
                                    </div>
                                @endif

                            @else
                                <div class="row text-center">
                                    <img src="/assets/user/images/warning_error.png" alt="" width="100">
                                    <br><br>
                                    <div style="padding:12px; color: red">
                                        <p>Error in API service due to this reasion</p>
                                        {{$message}}
                                    </div>
                                    <br><br>
                                </div>
                            @endif

                        </div>

                    </div>

                    <div class="modal"><!— this is for loading image —></div>
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

    <script>
        var selectedInstaUserAccount = [],selectAllBtnClicked = false;
        $(document).ready(function () {

            $(document).on('click', '#deletePresetSettings', function () {

                $('#loadActivitySettingsSuccess').text('');
                $('#loadActivitySettingsError').text('');

                var selectOptionPresetOjb = $('#selectOptionPreset option:selected');
                var managerSettingsId = selectOptionPresetOjb.val();

                if (parseInt(managerSettingsId.length) == 0) {
                    $('#selectOptionPreset').focus();
                    return false;
                }

                bootbox.confirm({
                    message: "Do you really want to delete this preset activity settings?",
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

                        if (result) {

                            $.ajax({
                                url: '/delete/activity/settings/preset',
                                type: 'post',
                                dataType: 'json',
                                data: {manager_settings_id: managerSettingsId},
                                beforeSend: function () {
                                    $("body").addClass("loading");
                                },
                                complete: function () {
                                    $("body").removeClass("loading");
                                },

                                success: function (response) {
                                    if (response.code == 200) {
                                        selectOptionPresetOjb.remove();
                                        $('#loadActivitySettingsModal').hide();
                                        toastr.success('Activity Settings preset deleted successfully');
                                    } else {
                                        var errorMessageHtml = '';
                                        if (response.code == 422) {
                                            console.log(response.message);
                                            if (typeof response.message == 'object') {
                                                $.each(response.message, function (key, value) {
                                                    errorMessageHtml += value.msg + '<br>';
                                                })
                                            }
                                        } else {
                                            if (typeof response.message == 'object') {
                                                $.each(response.message, function (key, value) {
                                                    errorMessageHtml += value[0] + '<br>';
                                                })
                                            } else {
                                                errorMessageHtml += response.message + '<br>';
                                            }
                                        }
                                        $('#loadActivitySettingsError').html(errorMessageHtml);

                                    }
                                }
                            });
                        }
                    }
                });
            });

            $(document).on('click', '.selectAccountList', function (e) {

                var obj = $(this);
                if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                    e.preventDefault();
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @" + obj.attr('data-username') + " Account has been disconnected from Instaffic System!!!</small>",
                        text: "<span>Click on More button for Re-Connect Account</span>",
                        html: true
                    });
                } else if (obj.attr('data-time_period_left') == 0) {
                    if (obj.attr('data-subscribe_type') == 'DU') {
                        e.preventDefault();
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Demo Subscription Period has been expired for this @" + obj.attr('data-username') + " account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> for Purchasing more Subscription Period</span>",
                            html: true
                        });
                    } else {
                        e.preventDefault();
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Subscription Package has been expired for this @" + obj.attr('data-username') + " account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> to upgrade your Subscription</span>",
                            html: true
                        });
                    }
                } else if (obj.attr('data-status') == 'I') {
                    e.preventDefault();
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @" + obj.attr('data-username') + " account is Inactive!!! Please active this account first</small>",
                        text: "<span>Click <a href='/user/dashboard'>here </a> to active this account</span>",
                        html: true
                    });
                } else {

                    if ($(this).is(':checked')) {
                        selectedInstaUserAccount.push(obj.attr('data-instaUserId'));
                        console.log(selectedInstaUserAccount);
                    } else {
                        var instaUserId = obj.attr('data-instaUserId');
                        selectedInstaUserAccount = jQuery.grep(selectedInstaUserAccount, function (id, index) {
                            return ( id !== instaUserId );
                        });
                        console.log(selectedInstaUserAccount);
                    }

                }

            })

            $(document).on('click', '#loadPresetSettingsBtn', function (e) {
                var selectOptionPresetOjb = $('#selectOptionPreset option:selected');
                var managerSettingsId = selectOptionPresetOjb.val();

                if (parseInt(managerSettingsId.length) == 0) {
                    $('#selectOptionPreset').focus();
                    toastr.error('Please Select Preset name.');
                    return false;
                }

                if (selectedInstaUserAccount.length == 0) {
                    toastr.error('Please Select Atleast One Account');
                    return false;
                }


                bootbox.confirm({
                    message: "Do you really want to apply preset settings to selected account?",
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

                        if (result) {

                            $.ajax({
                                url: '/load/activity/settings/preset',
                                type: 'post',
                                dataType: 'json',
                                data: {manager_settings_id: managerSettingsId, instaUserId: selectedInstaUserAccount},
                                beforeSend: function () {
                                    $("body").addClass("loading");
                                },
                                complete: function () {
                                    $("body").removeClass("loading");
                                },
                                success: function (response) {
                                    if (response.code == 200) {

                                        var successMessage = '<ul>';
                                        $.each(response.message, function (key, message) {
                                            successMessage += '<li>' + message + '</li>';
                                        })
                                        successMessage += '</ul>';

                                        swal({
                                            animation: true,
                                            type: "success",
                                            title: "<small style='color: yellowgreen;'>" + successMessage + "</small>",
                                            html: true
                                        });

                                        selectedInstaUserAccount = [];
                                        selectAllBtnClicked=false;
                                        $('.selectAccountList').each(function () {
                                            if ($(this).is(':checked')) {
                                                $(this).prop('checked', false);
                                            }
                                        });

                                    } else {
                                        var errorMessageHtml = '';
                                        if (response.code == 422) {
                                            console.log(response.message);
                                            if (typeof response.message == 'object') {
                                                $.each(response.message, function (key, value) {
                                                    errorMessageHtml += value.msg + '<br>';
                                                })
                                            }
                                        } else {
                                            if (typeof response.message == 'object') {
                                                $.each(response.message, function (key, value) {
                                                    errorMessageHtml += value[0] + '<br>';
                                                })
                                            } else {
                                                errorMessageHtml += response.message + '<br>';
                                            }
                                        }
                                        toastr.error(errorMessageHtml);
                                    }
                                }
                            });
                        }
                    }
                });


            })

            $(document).on('click', '#selectAllInstaAccount', function (e) {
                e.preventDefault();
               if(!selectAllBtnClicked){
                   selectAllBtnClicked=true;
                   $('.selectAccountList').each(function () {
                       var obj = $(this)
                       if (!(obj.is(':checked'))) {
                           if ((obj.attr('data-status') == 'A') && (obj.attr('data-is_user_disconnected') == 'N') && (obj.attr('data-has_account_locked') == 'F')) {
                               selectedInstaUserAccount.push(obj.attr('data-instaUserId'));
                               obj.prop('checked', true);
                           }
                       }
                   });
                   console.log(selectedInstaUserAccount);
               }

            });

            $(document).on('click', '#unSelectAllInstaAccount', function (e) {
                e.preventDefault();
                if (selectedInstaUserAccount.length > 0) {
                    selectAllBtnClicked=false;
                    selectedInstaUserAccount = [];
                    $('.selectAccountList').each(function () {
                        var obj = $(this)
                        if (obj.is(':checked')) {
                            obj.prop('checked', false);
                        }
                    });
                    console.log(selectedInstaUserAccount);
                }


            });
        });
    </script>

@endsection

