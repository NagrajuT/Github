@extends('Admin::layouts.adminLayout')
@section('pageheadcontent')
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/toastr.min.css"/>
@endsection

@section('pagebodycontent')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Add Free Subscription Time
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="javascript">Account Settings</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:;">Add Free Time</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-9">
                @if(Session::has('fail'))
                    <br>
                    <div class="alert alert-danger ">{{Session::get('fail')}}
                        <button class="close"
                                data-close="alert"></button>
                    </div>
                @endif
                @if(Session::has('success'))
                    <br>
                    <div class="alert alert-success ">{{Session::get('success')}}
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
                            <i class="fa fa-cogs"></i>Add Time
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <form action="/add/free/subscription" method="post">
                                    <div class="form-group">
                                        <label class="control-label">Add Username</label>
                                        <input type="text" name="username"
                                               value="{{old('username')}}"
                                               class="form-control"/>
                                        <span class="error"
                                              style="color:red">{{ $errors->first('username') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Package Type</label>
                                        <select name="package" class="form-control valid" aria-invalid="false">
                                            <option value="">
                                                Choose package
                                            </option>
                                            <option value="1" @if(old('package')==1){{'selected'}}@endif>
                                                Business Account
                                            </option>
                                            <option value="2" @if(old('package')==2){{'selected'}}@endif>
                                                Private Account
                                            </option>
                                        </select>
                                        <span class="error"
                                              style="color:red">{{ $errors->first('package') }}</span>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Choose Days</label>
                                        <select name="days" class="form-control valid" aria-invalid="false">
                                            <option value="">
                                               select days
                                            </option>
                                            <option value="1" @if(old('days')==1){{'selected'}}@endif>
                                                7 days
                                            </option>
                                            <option value="2" @if(old('days')==2){{'selected'}}@endif>
                                                14 days
                                            </option>
                                            <option value="3" @if(old('days')==3){{'selected'}}@endif>
                                                21 days
                                            </option>
                                            <option value="4" @if(old('days')==4){{'selected'}}@endif>
                                                28 days
                                            </option>
                                        </select>
                                        <span class="error"
                                              style="color:red">{{ $errors->first('days') }}</span>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Choose Months</label>
                                        <select name="months" class="form-control valid" aria-invalid="false">
                                            <option value="">
                                                select months
                                            </option>
                                            <option value="1" @if(old('months')==1){{'selected'}}@endif>
                                                1 month
                                            </option>
                                            <option value="2" @if(old('months')==2){{'selected'}}@endif>
                                                3 months
                                            </option>
                                            <option value="3" @if(old('months')==3){{'selected'}}@endif>
                                                6 months
                                            </option>
                                            <option value="4" @if(old('months')==4){{'selected'}}@endif>
                                                12 months
                                            </option>
                                        </select>
                                        <span class="error"
                                              style="color:red">{{ $errors->first('months') }}</span>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="margin-top-10">
                                        <button type="submit" class="btn green-haze">
                                            <i class="fa fa-check"> </i> Add Time
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

        <div class="row">
            {{--<div class="col-md-12">--}}
                {{--<!-- BEGIN VALIDATION STATES-->--}}
                {{--<div class="portlet box yellow">--}}
                    {{--<div class="portlet-title">--}}
                        {{--<div class="caption">--}}
                            {{--<i class="fa fa-gift"></i>Validation Using Icons--}}
                        {{--</div>--}}
                        {{--<div class="tools">--}}
                            {{--<a href="javascript:;" class="collapse">--}}
                            {{--</a>--}}
                            {{--<a href="#portlet-config" data-toggle="modal" class="config">--}}
                            {{--</a>--}}
                            {{--<a href="javascript:;" class="reload">--}}
                            {{--</a>--}}
                            {{--<a href="javascript:;" class="remove">--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="portlet-body form">--}}
                        {{--<!-- BEGIN FORM-->--}}
                        {{--<form action="#" id="form_sample_2" class="form-horizontal">--}}
                            {{--<div class="form-body">--}}
                                {{--<div class="alert alert-danger display-hide">--}}
                                    {{--<button class="close" data-close="alert"></button>--}}
                                    {{--You have some form errors. Please check below.--}}
                                {{--</div>--}}
                                {{--<div class="alert alert-success display-hide">--}}
                                    {{--<button class="close" data-close="alert"></button>--}}
                                    {{--Your form validation is successful!--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3">Name <span class="required">--}}
										{{--* </span>--}}
                                    {{--</label>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="input-icon right">--}}
                                            {{--<i class="fa"></i>--}}
                                            {{--<input type="text" class="form-control" name="name"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3">Email <span class="required">--}}
										{{--* </span>--}}
                                    {{--</label>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="input-icon right">--}}
                                            {{--<i class="fa"></i>--}}
                                            {{--<input type="text" class="form-control" name="email"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3">URL <span class="required">--}}
										{{--* </span>--}}
                                    {{--</label>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="input-icon right">--}}
                                            {{--<i class="fa"></i>--}}
                                            {{--<input type="text" class="form-control" name="url"/>--}}
                                        {{--</div>--}}
                                        {{--<span class="help-block">--}}
											{{--e.g: http://www.demo.com or http://demo.com </span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3">Number <span class="required">--}}
										{{--* </span>--}}
                                    {{--</label>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="input-icon right">--}}
                                            {{--<i class="fa"></i>--}}
                                            {{--<input type="text" class="form-control" name="number"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3">Digits <span class="required">--}}
										{{--* </span>--}}
                                    {{--</label>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="input-icon right">--}}
                                            {{--<i class="fa"></i>--}}
                                            {{--<input type="text" class="form-control" name="digits"/>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3">Credit Card <span class="required">--}}
										{{--* </span>--}}
                                    {{--</label>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="input-icon right">--}}
                                            {{--<i class="fa"></i>--}}
                                            {{--<input type="text" class="form-control" name="creditcard"/>--}}
                                        {{--</div>--}}
                                        {{--<span class="help-block">--}}
											{{--e.g: 5500 0000 0000 0004 </span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-actions">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-offset-3 col-md-9">--}}
                                        {{--<button type="submit" class="btn green">Submit</button>--}}
                                        {{--<button type="button" class="btn default">Cancel</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                        {{--<!-- END FORM-->--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- END VALIDATION STATES-->--}}
            {{--</div>--}}
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
            $('.acc_set').addClass('active');
            $('.acc_set .arrow').addClass('open');
            $('.add_free_time').addClass('active');
        });
    </script>
@endsection
