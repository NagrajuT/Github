@extends('Admin::layouts.adminLayout')
@section('pageheadcontent')
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/toastr.min.css"/>
@endsection

@section('pagebodycontent')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Admin Password Change
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="javascript">Profile Settings</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:;">Change Password</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-9">
                @if(Session::has('errMsg'))
                    <br>
                    <div class="alert alert-danger ">{{Session::get('errMsg')}}
                        <button class="close"
                                data-close="alert"></button>
                    </div>
                @endif
                @if(Session::has('msg'))
                    <br>
                    <div class="alert alert-success ">{{Session::get('msg')}}
                        <button class="close"
                                data-close="alert"></button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <br>
                <div class="portlet box grey-cascade">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Reset Password
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <form action="/reset/password" method="post">
                                    <div class="form-group">
                                        <label class="control-label">Current Password</label>
                                        <input type="password" name="current_password"
                                               value="{{old('current_password')}}"
                                               class="form-control"/>
                                        <span class="error"
                                              style="color:red">{{ $errors->first('current_password') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">New Password</label>
                                        <input type="password" name="new_password" value="{{old('new_password')}}"
                                               class="form-control"/>
                                        <span class="error"
                                              style="color:red">{{ $errors->first('new_password') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Re-type New Password</label>
                                        <input type="password" name="confirm_password"
                                               value="{{old('confirm_password')}}"
                                               class="form-control"/>
                                        <span class="error"
                                              style="color:red">{{ $errors->first('confirm_password') }}</span>
                                    </div>
                                    <div class="margin-top-10">
                                        <button type="submit" class="btn green-haze">
                                            <i class="fa fa-check"> </i> Change Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>

        </div>
    </div>





@endsection
@section('pagescripts')

    <script>

        jQuery(document).ready(function () {
//            Metronic.init(); // init metronic core components
//            Layout.init(); // init current layout
//            QuickSidebar.init(); // init quick sidebar
//            Demo.init(); // init demo features
//            EcommerceOrders.init();
//            UIConfirmations.init();
        });
        $(function () {
            $(".wrapper1").scroll(function () {
                $(".wrapper2").scrollLeft($(".wrapper1").scrollLeft());
            });
            $(".wrapper2").scroll(function () {
                $(".wrapper1").scrollLeft($(".wrapper2").scrollLeft());
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.profile_set').addClass('active');
            $('.profile_set .arrow').addClass('open');
            $('.rst_pwd').addClass('active');
        });
    </script>
@endsection
