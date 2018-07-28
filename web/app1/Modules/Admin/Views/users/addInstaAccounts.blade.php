@extends('Admin::layouts.adminLayout')
@section('pageheadcontent')
    <style>
        #addAllDetails {
            margin: -17px 0 5px 16px;
        }

        .input-icon .error {
            color: red;
            border-color: red;
        }

        .help-block {
            color: red;
        }
    </style>

@endsection

@section('pagebodycontent')
    <div class="page-content">
        <h3 class="page-title">
            Manage Instagram Accounts
        </h3>

        <!-- END PAGE HEADER-->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-cog"></i>
                    <a href="javascript:;">Account Settings</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:;">Add Instagram Accounts</a>
                </li>
            </ul>

        </div>
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- Begin:  -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title" style="padding-top:0.6%;display:inline-block;">Add Instagram Account
                                Details</h3>
                            <div class="actions pull-right">
                                <a href="/show/insta/accounts" class="btn default yellow-stripe">
                                    <i class="fa fa-eye"></i>
								<span class="hidden-480">
								See Accounts  Details</span>
                                </a>
                            </div>
                        </div>


                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="/add/insta/accounts" class="horizontal-form" method="post" id="instaAccounts">

                                <div class="form-body">
                                    <div style="display: none;"
                                         class="alert alert-danger display-hide">
                                        <button class="close"
                                                data-close="alert"></button>
                                        <ul></ul>
                                    </div>

                                    <div style="display: none;"
                                         class="alert alert-success display-hide">
                                        <button class="close"
                                                data-close="alert"></button>
                                        <ul></ul>
                                    </div>
                                    <h3 class="form-section">Account Info</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Instagram Username</label>
                                                <input id="firstName" class="form-control" placeholder="Username"
                                                       name="value[username]"
                                                       value="{{old('value')['username']}}" type="text" required>
                                                <span class="help-block">{{$errors->first('username')}}</span>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Instagram Password</label>
                                                <input id="lastName" class="form-control" placeholder="Password"
                                                       name="value[password]"
                                                       value="{{old('value')['password']}}" type="text" required>
                                                <span class="help-block">{{$errors->first('password')}}</span>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Registered Email ID</label>
                                                <input id="reg_email" class="form-control" placeholder="Email"
                                                       name="value[insta_reg_email_id]"
                                                       value="{{old('value')['insta_reg_email_id']}}" type="email"
                                                       required>
                                                <span class="help-block">{{ $errors->first('insta_reg_email_id') }}</span>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Password(Registered Email ID)</label>
                                                <input id="reg_email_pass" class="form-control" placeholder="Password"
                                                       name="value[insta_reg_email_pwd]"
                                                       value="{{old('value')['insta_reg_email_pwd']}}" type="text"
                                                       required>
                                                <span class="help-block">{{$errors->first('insta_reg_email_pwd')}}</span>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Alternate Email ID</label>
                                                <input id="alt_email" class="form-control" placeholder="Email"
                                                       name="value[alternate_reg_email_id]"
                                                       value="{{old('value')['alternate_reg_email_id']}}" type="email">
                                                <span class="help-block">{{$errors->first('alternate_reg_email_id')}}</span>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Password(Alternate Email ID)</label>
                                                <input id="alt_pass" class="form-control" placeholder="Password"
                                                       name="value[alternate_reg_email_pwd]"
                                                       value="{{old('value')['alternate_reg_email_pwd']}}" type="text">
                                                <span class="help-block">{{$errors->first('alternate_reg_email_pwd')}}</span>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Gender</label>
                                                <select class="form-control" name="value[gender]">
                                                    <option value="3" @if(old('value')['gender']==3){{'selected'}} @endif>
                                                        Unknown
                                                    </option>
                                                    <option value="1" @if(old('value')['gender']==1){{'selected'}} @endif>
                                                        Male
                                                    </option>
                                                    <option value="2" @if(old('value')['gender']==2){{'selected'}} @endif>
                                                        Female
                                                    </option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Registered Contact No.</label>
                                                <input class="form-control" placeholder="Contact"
                                                       name="value[insta_reg_contact]"
                                                       value="{{old('value')['insta_reg_contact']}}" type="text">
                                                <span class="help-block">{{$errors->first('insta_reg_contact')}}</span>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Set Proxy</label>
                                                <div class="radio-list setProxy">
                                                    <label class="radio-inline">
                                                        <input name="value[set_proxy]" value="YES"
                                                               type="radio" @if(old('value')['set_proxy']=='YES'){{'checked'}} @endif>
                                                        YES </label>
                                                    <label class="radio-inline">
                                                        <input name="value[set_proxy]" value="NO" type="radio"
                                                        @if((isset(old('value')['set_proxy'])&& old('value')['set_proxy']=='NO')||(!isset(old('value')['set_proxy']))){{'checked'}} @endif>
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 proxy"
                                             style="display: @if(old('value')['set_proxy']=='YES'){{'block'}} @else{{'none'}}@endif">
                                            <div class="form-group">
                                                <label class="control-label">Proxy Type</label>
                                                <div class="radio-list proxyType">
                                                    <label class="radio-inline">
                                                        <input name="value[proxy_type]" id="optionsRadios1" value="0"
                                                               type="radio"
                                                        @if((isset(old('value')['proxy_type'])&& old('value')['proxy_type']=='0')||(!isset(old('value')['set_proxy']))){{'checked'}} @endif>
                                                        PUBLIC </label>
                                                    <label class="radio-inline">
                                                        <input name="value[proxy_type]" id="optionsRadios2" value="1"
                                                               type="radio" @if(old('value')['proxy_type']==1){{'checked'}} @endif>
                                                        PRIVATE </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="proxy"
                                         style="display: @if(old('value')['set_proxy']=='YES'){{'block'}} @else{{'none'}}@endif">
                                        <h3 class="form-section">Proxy Details</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Proxy IP</label>
                                                    <input class="form-control" placeholder="IP" name="value[proxy_ip]"
                                                           value="{{old('value')['proxy_ip']}}" type="text">
                                                    <span class="help-block">{{$errors->first('proxy_ip')}}</span>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Proxy PORT</label>
                                                    <input class="form-control" placeholder="PORT"
                                                           name="value[proxy_port]" min="0" max="65535"
                                                           value="{{old('value')['proxy_port']}}" type="text" required>
                                                    <span class="help-block">{{$errors->first('proxy_port')}}</span>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row private"
                                             style="display: @if(old('value')['proxy_type']=='1'){{'block'}} @else{{'none'}}@endif">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Proxy Username</label>
                                                    <input class="form-control" placeholder="Username"
                                                           name="value[proxy_username]"
                                                           value="{{old('value')['proxy_username']}}" type="text"
                                                           required>
                                                    <span class="help-block">{{$errors->first('proxy_username')}}</span>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Proxy Password</label>
                                                    <input class="form-control" placeholder="Password"
                                                           name="value[proxy_password]"
                                                           value="{{old('value')['proxy_password']}}" type="text"
                                                           required>
                                                    <span class="help-block">{{$errors->first('proxy_password')}}</span>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <button type="button" class="btn default reset">Reset Data</button>
                                    <button type="submit" class="btn blue"><i class="fa fa-check"></i> verify and Add
                                    </button>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>

                    </div>
                </div>

                <!-- End:  -->
            </div>
        </div>

    </div>



@endsection
@section('pagescripts')
    <script src="/assets/admin/js/validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.acc_set').addClass('active');
            $('.acc_set .arrow').addClass('open');
            $('.add_insta').addClass('active');
        });
    </script>
    <script>


        //        toastr.options = {
        //            timeOut: 2000,
        //            extendedTimeOut: 50000,
        //            tapToDismiss: true,
        //            debug: false,
        //            fadeOut: 10,
        //            positionClass: "toast-top-center",
        //            limit: 1
        //        };
        //

        var errorData = '';
        var message = '';
        @if(Session::has('admin_success_mes'))
                message = '{{Session::get('admin_success_mes')}}';
        $('.alert-success').show().find('ul').append(message);

        @elseif(Session::has('admin_error_msg'))
                message = '{{Session::get('admin_error_msg')}}';
        $('.alert-danger').show().find('ul').append(message);

        @elseif(Session::has('admin_loc_msg'))
                message = '{{Session::get('admin_loc_msg')['message']}}';
        var checkPointUrl = '{{Session::get('admin_loc_msg')['checkPointUrl']}}';

        var url = 'https://www.instagram.com' + checkPointUrl;
        errorData = '<li>' + message + '<a href="' + url + '" style="padding:10px" target="_blank">Verify Here</a>' + 'and Add this Account Again' + '</li>';
        console.log(errorData);
        $('.alert-danger').show().find('ul').append(errorData);

                @elseif(Session::has('val_error_mes'))
                @foreach(Session::get('val_error_mes') as $key=>$value)
        var errorData = errorData + '<li>{{$value['msg']}}</li>';
        @endforeach
            $('.alert-danger').show().find('ul').append(errorData);
        @endif

            $.validator.addMethod('validIP', function (value) {
            var split = value.split('.');
            if (split.length != 4)
                return false;

            for (var i = 0; i < split.length; i++) {
                var s = split[i];
                if (s.length == 0 || isNaN(s) || s < 0 || s > 255)
                    return false;
            }
            return true;
        }, ' Invalid IP Address');

        $('#instaAccounts').validate({
            errorElement: "small",

            rules: {
                'value[proxy_ip]': {
                    validIP: true,
                    required: true
                }
            },
            messages: {
                'value[proxy_ip]': {
                    validIP: 'Please enter valid ip address.'
                }
            }
        });


        $(document.body).on('change', '.setProxy', function () {
            var setProxy = $('[name="value[set_proxy]"]:checked').val();
            if (setProxy == 'YES') {
                $('.proxy').show();
            } else {
                $('.proxy').hide();
            }

        })
        $(document.body).on('change', '.proxyType', function () {

            var proxyType = $('[name="value[proxy_type]"]:checked').val();
            if (proxyType == 1) {
                $('.private').show();
            } else {
                $('.private').hide();
            }
        })
        $(document.body).on('click', '.reset', function () {
            $('#instaAccounts').trigger("reset");
        })


    </script>


@endsection