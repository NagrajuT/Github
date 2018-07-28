@extends('User::layouts.bodyLayout')

@section('active_profileManagement','active')
@section("headcontent")
    <style>
        .linerClass {
            background: #33cac2 none repeat scroll 0 0;
            height: 2px;
            margin: 0 auto;
            position: absolute;
            right: 474px;
            top: 50%;
            width: 21%;
            z-index: 1;
        }

        .settings-tab > li > a {
            width: 135px;
            height: 45px

        }

        .fileinput {
            display: block !important;
            margin-bottom: 9px;
        }
        .img-load{
            opacity:0.67;
        }

    </style>
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet" href="/assets/user/css/profile.css">
    <link rel="stylesheet" href="/assets/user/css/sweetalert.css">
    <link rel="stylesheet" href="/assets/user/user-panel/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css">
@endsection

@section('content')
    {{--{{dd($userDetails)}}--}}

    <div class="page-content">
        <div class="container">
            <div class="row">

                <!-- Begin: life time stats -->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs fa-2x font-green-sharp" aria-hidden="true"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Profile Settings</span>

                        </div>
                    </div>

                    <div class="portlet-body">

                        {{--<div class="container">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                        {{--<div class="board">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}

                        {{--<form id="uploadimage" class="text-center" action="" method="post" enctype="multipart/form-data" autocomplete="off">--}}
                        {{--<div class="col-md-4 col-md-offset-1">--}}
                        {{--<div class="form-group">--}}
                        {{--<div id="kv-avatar-errors-1" class="center-block"--}}
                        {{--style="width:800px;display:none"></div>--}}
                        {{--<form class="text-center" action="" method="post" enctype="multipart/form-data">--}}
                        {{--<div class="kv-avatar center-block" style="width:200px">--}}
                        {{--<input id="avatar-1" name="avatar-1" type="file"  accept="image/*"  class="file-loading">--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--<button id="updatedimage" onclick="return false;" style="color: blue">update</button>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-md-6">--}}
                        {{--<form role="form" method="post" class="form-horizontal">--}}
                        {{--<div class="form-group">--}}
                        {{--<label class="form-control-label col-sm-4" for="name">Name</label>--}}
                        {{--<div class="col-sm-8">--}}
                        {{--<input id="name" class="name form-control" type="name" required--}}
                        {{--placeholder="{{$userDetails['username']}}"--}}
                        {{--value="{{$userDetails['username']}}" name="name">--}}
                        {{--<input type="text" value="{{$userDetails['id']}}" name="id" id="id" style="display:none">--}}
                        {{--<input type="text" value="{{$userDetails['user_id']}}" id="user_id" name="user_id" style="display:none">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<label class="disabled form-control-label col-sm-4" for="email">E-mail--}}
                        {{--id</label>--}}
                        {{--<div class="col-sm-8">--}}
                        {{--<input id="email" class="email form-control" type="email"--}}
                        {{--placeholder="{{$userDetails['email']}}"--}}
                        {{--value="{{$userDetails['email']}}" name="email" disabled>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<label class="form-control-label col-sm-4" for="pwd">Change Password</label>--}}
                        {{--<div class="col-sm-8">--}}
                        {{--<input id="pwd" class="pwd form-control" type="password" required--}}
                        {{--placeholder="Enter old password" name="pwd" readonly--}}
                        {{--onfocus="this.removeAttribute('readonly');">--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--<label class="form-control-label col-sm-4" for="cpwd">Confirm Password</label>--}}
                        {{--<div class="col-sm-8">--}}
                        {{--<input id="cpwd" class="cpwd form-control" type="password"--}}
                        {{--placeholder="" name="cpwd">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-md-12" style="margin-top:20px;">--}}
                        {{--<h4><b>PAYPAL DETAILS</b></h4>--}}
                        {{--<table class="table" style="margin-top:20px;">--}}
                        {{--<tr>--}}
                        {{--<th>Email id</th>--}}
                        {{--<td><input type="text" class="paypalemail" name="paypalemail"--}}
                        {{--value="{{$userDetails['paypal_email']}}"></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<th>Contact No.</th>--}}
                        {{--<td><input type="text" class="paypalnumber" name="paypalnumber"--}}
                        {{--value="{{$userDetails['contact_details']}}"></td>--}}
                        {{--</tr>--}}
                        {{--</table>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group text-center" style="margin-bottom:10px;">--}}
                        {{--<div class="col-md-12 text-center">--}}
                        {{--<button class="savebutton  btn btn-default btn-ag pull-center next" type="submit" style="margin-bottom:10px;" onclick="return false;">Save</button>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}


                        <div class="row margin-top-10">
                            <div class="col-md-12">
                                <!-- BEGIN PROFILE SIDEBAR -->
                                <div class="profile-sidebar"
                                     style="width: 250px;background-color: #fbfbfb; border: solid #eff3f8 1px;">
                                    <!-- PORTLET MAIN -->
                                    <div class="profile-sidebar-portlet">


                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="profile-userpic">
                                                <div class="fileinput-new"
                                                     style="">
                                                    <img src="{{env('API_URL') . '/'. $userDetails['profile_pic_url']}}"
                                                         class="img-responsive" alt="">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists text-center update"
                                                     id="srcBase64"
                                                     style="">
                                                    <img src="{{env('API_URL') . '/'. $userDetails['profile_pic_url']}}"
                                                         class="img-responsive" alt=""
                                                         style="width:150px; height:150px;">
                                                </div>
                                            </div>

                                            <div class="profile-usertitle">
                                                <div class="profile-usertitle-name" id="profileUsername">
                                                    {{$userDetails['username']}}
                                                </div>
                                            </div>
                                            <div class="profile-userbuttons">
                                                 <span class="btn default btn-file btn-circle green-haze btn-sm">
													 <span class="fileinput-new">Change Profile Pic </span>
                                                     <span class="fileinput-exists">Change Profile Pic </span>
                                                     <input type="file" onchange="changeProfileImage(this);">
											     </span>
                                            </div>
                                        </div>


                                        {{--<!-- SIDEBAR USERPIC -->--}}
                                        {{--<div class="profile-userpic">--}}
                                        {{--<img src="/assets/user/user-panel/img/avatar9.jpg"--}}
                                        {{--class="img-responsive" alt="">--}}
                                        {{--</div>--}}
                                        {{--<!-- END SIDEBAR USERPIC -->--}}
                                        {{--<!-- SIDEBAR USER TITLE -->--}}
                                        {{--<div class="profile-usertitle">--}}
                                        {{--<div class="profile-usertitle-name">--}}
                                        {{--Marcus Doe--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<!-- END SIDEBAR USER TITLE -->--}}
                                        {{--<!-- SIDEBAR BUTTONS -->--}}
                                        {{--<div class="profile-userbuttons">--}}
                                        {{--<button type="button" class="btn btn-circle green-haze btn-sm">Change--}}
                                        {{--Profile Pic--}}
                                        {{--</button>--}}
                                        {{--</div>--}}

                                        {{--<!-- END SIDEBAR BUTTONS -->--}}
                                                <!-- SIDEBAR MENU -->
                                        <div class="profile-usermenu">
                                            <ul class="nav">
                                                {{--<li class="active" id="account_overview_tab">--}}
                                                {{--<a href="javascript:;" class="liCLick">--}}
                                                {{--<i class="icon-home"></i>--}}
                                                {{--Overview </a>--}}
                                                {{--</li>--}}
                                                <li class="active" id="account_settings_tab">
                                                    <a href="javascript:;" class="liCLick">
                                                        <i class="icon-settings"></i>
                                                        Account Settings </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- END MENU -->
                                    </div>
                                    <!-- END PORTLET MAIN -->

                                </div>
                                <!-- END BEGIN PROFILE SIDEBAR -->
                                <!-- BEGIN PROFILE CONTENT -->
                                <div id="account_overview">
                                    {{--<div class="profile-content">--}}
                                    {{--<div class="row">--}}
                                    {{--<div class="col-md-6">--}}
                                    {{--<!-- BEGIN PORTLET -->--}}
                                    {{--<div class="portlet light" style="border: solid #eff3f8 1px;">--}}
                                    {{--<div class="portlet-title">--}}
                                    {{--<div class="caption caption-md">--}}
                                    {{--<i class="icon-bar-chart theme-font hide"></i>--}}
                                    {{--<span class="caption-subject font-blue-madison bold uppercase">Your Activity</span>--}}
                                    {{--<span class="caption-helper hide">weekly stats...</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="actions">--}}
                                    {{--<div class="btn-group btn-group-devided"--}}
                                    {{--data-toggle="buttons">--}}
                                    {{--<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">--}}
                                    {{--<input type="radio" name="options"--}}
                                    {{--class="toggle"--}}
                                    {{--id="option1">Today</label>--}}
                                    {{--<label class="btn btn-transparent grey-salsa btn-circle btn-sm">--}}
                                    {{--<input type="radio" name="options"--}}
                                    {{--class="toggle"--}}
                                    {{--id="option2">Week</label>--}}
                                    {{--<label class="btn btn-transparent grey-salsa btn-circle btn-sm">--}}
                                    {{--<input type="radio" name="options"--}}
                                    {{--class="toggle"--}}
                                    {{--id="option2">Month</label>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="portlet-body">--}}
                                    {{--<div class="row number-stats margin-bottom-30">--}}
                                    {{--<div class="col-md-6 col-sm-6 col-xs-6">--}}
                                    {{--<div class="stat-left">--}}
                                    {{--<div class="stat-chart">--}}
                                    {{--<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->--}}
                                    {{--<div id="sparkline_bar"></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="stat-number">--}}
                                    {{--<div class="title">--}}
                                    {{--Total--}}
                                    {{--</div>--}}
                                    {{--<div class="number">--}}
                                    {{--246--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-6 col-sm-6 col-xs-6">--}}
                                    {{--<div class="stat-right">--}}
                                    {{--<div class="stat-chart">--}}
                                    {{--<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->--}}
                                    {{--<div id="sparkline_bar2"></div>--}}
                                    {{--</div>--}}
                                    {{--<div class="stat-number">--}}
                                    {{--<div class="title">--}}
                                    {{--New--}}
                                    {{--</div>--}}
                                    {{--<div class="number">--}}
                                    {{--719--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="table-scrollable table-scrollable-borderless">--}}
                                    {{--<table class="table table-hover table-light">--}}
                                    {{--<thead style="background:none;">--}}
                                    {{--<tr class="uppercase">--}}
                                    {{--<th colspan="2">--}}
                                    {{--MEMBER--}}
                                    {{--</th>--}}
                                    {{--<th>--}}
                                    {{--Earnings--}}
                                    {{--</th>--}}
                                    {{--<th>--}}
                                    {{--CASES--}}
                                    {{--</th>--}}
                                    {{--<th>--}}
                                    {{--CLOSED--}}
                                    {{--</th>--}}
                                    {{--<th>--}}
                                    {{--RATE--}}
                                    {{--</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tr>--}}
                                    {{--<td class="fit">--}}
                                    {{--<img class="user-pic"--}}
                                    {{--src="../../assets/admin/layout3/img/avatar4.jpg">--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--<a href="javascript:;"--}}
                                    {{--class="primary-link">Brain</a>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--$345--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--45--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--124--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--<span class="bold theme-font">80%</span>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<td class="fit">--}}
                                    {{--<img class="user-pic"--}}
                                    {{--src="../../assets/admin/layout3/img/avatar5.jpg">--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--<a href="javascript:;"--}}
                                    {{--class="primary-link">Nick</a>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--$560--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--12--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--24--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--<span class="bold theme-font">67%</span>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<td class="fit">--}}
                                    {{--<img class="user-pic"--}}
                                    {{--src="../../assets/admin/layout3/img/avatar6.jpg">--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--<a href="javascript:;"--}}
                                    {{--class="primary-link">Tim</a>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--$1,345--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--450--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--46--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--<span class="bold theme-font">98%</span>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<td class="fit">--}}
                                    {{--<img class="user-pic"--}}
                                    {{--src="../../assets/admin/layout3/img/avatar7.jpg">--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--<a href="javascript:;"--}}
                                    {{--class="primary-link">Tom</a>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--$645--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--50--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--89--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--<span class="bold theme-font">58%</span>--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--</table>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<!-- END PORTLET -->--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-6">--}}
                                    {{--<!-- BEGIN PORTLET -->--}}
                                    {{--<div class="portlet light" style="border: solid #eff3f8 1px;">--}}
                                    {{--<div class="portlet-title tabbable-line">--}}
                                    {{--<div class="caption caption-md">--}}
                                    {{--<i class="icon-globe theme-font hide"></i>--}}
                                    {{--<span class="caption-subject font-blue-madison bold uppercase">Feeds</span>--}}
                                    {{--</div>--}}

                                    {{--</div>--}}
                                    {{--<div class="portlet-body">--}}
                                    {{--<!--BEGIN TABS-->--}}
                                    {{--<div class="tab-content">--}}
                                    {{--<div class="tab-pane active" id="tab_1_1"--}}
                                    {{--style="padding-top: 0px">--}}
                                    {{--<div class="scroller">--}}
                                    {{--<ul class="feeds">--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-success">--}}
                                    {{--<i class="fa fa-bell-o"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--You have 4 pending--}}
                                    {{--tasks.--}}
                                    {{--<span class="label label-sm label-info">--}}
                                    {{--Take action <i class="fa fa-share"></i>--}}
                                    {{--</span>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--Just now--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="javascript:;">--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-success">--}}
                                    {{--<i class="fa fa-bell-o"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--New version v1.4--}}
                                    {{--just--}}
                                    {{--lunched!--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--20 mins--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-danger">--}}
                                    {{--<i class="fa fa-bolt"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--Database server #12--}}
                                    {{--overloaded. Please fix--}}
                                    {{--the--}}
                                    {{--issue.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--24 mins--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-info">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--New order received and--}}
                                    {{--pending for process.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--30 mins--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-success">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--New payment refund and--}}
                                    {{--pending approval.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--40 mins--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-warning">--}}
                                    {{--<i class="fa fa-plus"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--New member registered.--}}
                                    {{--Pending approval.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--1.5 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-success">--}}
                                    {{--<i class="fa fa-bell-o"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--Web server hardware--}}
                                    {{--needs to--}}
                                    {{--be upgraded. <span--}}
                                    {{--class="label label-sm label-default ">--}}
                                    {{--Overdue </span>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--2 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-default">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--Prod01 database server--}}
                                    {{--is--}}
                                    {{--overloaded 90%.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--3 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-warning">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--New group created.--}}
                                    {{--Pending--}}
                                    {{--manager review.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--5 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-info">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--Order payment failed.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--18 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-default">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--New application--}}
                                    {{--received.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--21 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-info">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--Dev90 web server--}}
                                    {{--restarted.--}}
                                    {{--Pending overall system--}}
                                    {{--check.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--22 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-default">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--New member registered.--}}
                                    {{--Pending approval--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--21 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-info">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--L45 Network failure.--}}
                                    {{--Schedule maintenance.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--22 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-default">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--Order canceled with--}}
                                    {{--failed--}}
                                    {{--payment.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--21 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-info">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--Web-A2 clound instance--}}
                                    {{--created. Schedule full--}}
                                    {{--scan.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--22 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-default">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--Member canceled.--}}
                                    {{--Schedule--}}
                                    {{--account review.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--21 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="col1">--}}
                                    {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                    {{--<div class="label label-sm label-info">--}}
                                    {{--<i class="fa fa-bullhorn"></i>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                    {{--<div class="desc">--}}
                                    {{--New order received.--}}
                                    {{--Please--}}
                                    {{--take care of it.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col2">--}}
                                    {{--<div class="date">--}}
                                    {{--22 hours--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<!--END TABS-->--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<!-- END PORTLET -->--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>

                                {{--<div id="account_settings"hidden >--}}
                                <div id="account_settings">
                                    <div class="profile-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light" style="border: solid #eff3f8 1px;">
                                                    <div class="portlet-title tabbable-line">
                                                        <div class="caption caption-md">
                                                            <i class="icon-globe theme-font hide"></i>
                                                            <span class="caption-subject font-blue-madison bold uppercase">Basic Profile Details</span>
                                                        </div>
                                                        <ul class="nav nav-tabs  settings-tab">
                                                            <li class="active">
                                                                <a href="#personal_info" class="liCLick"
                                                                   data-toggle="tab">Personal Info</a>
                                                            </li>

                                                            <li>
                                                                <a href="#change_password" class="liCLick"
                                                                   data-toggle="tab">Change Password</a>
                                                            </li>
                                                            <li>
                                                                <a href="#privacy_settings" class="liCLick"
                                                                   data-toggle="tab">Privacy Settings</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="tab-content">
                                                            <!-- PERSONAL INFO TAB -->
                                                            <div style="display: none;"
                                                                 class="alert alert-danger display-hide">
                                                                <button class="close close-message"
                                                                        data-close="alert"></button>
                                                                <ul></ul>
                                                            </div>

                                                            <div style="display: none;"
                                                                 class="alert alert-success display-hide">
                                                                <button class="close close-message"
                                                                        data-close="alert"></button>
                                                                <ul></ul>
                                                            </div>
                                                            <div class="tab-pane active" id="personal_info"
                                                                 style="padding:0">

                                                                <form role="form" id="personalForm">
                                                                    <div class="form-group">
                                                                        <label class="control-label"><b>Full
                                                                                Name</b></label>
                                                                        <input type="text" name="full_name"
                                                                               value="{{$userDetails['full_name']}}"
                                                                               placeholder="Smartffic User"
                                                                               class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label"><b>Username</b></label>
                                                                        <input type="text" name="username"
                                                                               value="{{$userDetails['username']}}"
                                                                               placeholder="InstaUser"
                                                                               class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label"><b>Personal
                                                                                Email</b></label>
                                                                        <span class="form-control"
                                                                              style="background-color:#eff3f8">{{$userDetails['email']}}</span>
                                                                    </div>

                                                                    @if(isset($userDetails['affiliate_link']) && !empty($userDetails['affiliate_link']))
                                                                        <div class="form-group">
                                                                            <label class="control-label"><b>Paypal
                                                                                    Email</b></label>
                                                                            <input type="text"
                                                                                   data-paypal="{{$userDetails['paypal_email']}}"
                                                                                   name="paypal_email"
                                                                                   value="{{$userDetails['paypal_email']}}"
                                                                                   placeholder="abcd@paypal.com"
                                                                                   class="form-control"/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label"><b>Paypal
                                                                                    Contact
                                                                                    No.</b></label>
                                                                            <input type="text" name="contact_no"
                                                                                   value="{{$userDetails['contact_details']}}"
                                                                                   placeholder="+919988776655"
                                                                                   class="form-control"/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label"><b>Affiliate
                                                                                    Link</b></label>
                                                                            <span class="form-control"
                                                                                  style="background-color:#eff3f8">{{$userDetails['affiliate_link']}}</span>
                                                                        </div>
                                                                    @endif


                                                                    <div class="margiv-top-10">
                                                                        <a class="btn green-haze saveProfile">Save
                                                                            Changes</a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- END PERSONAL INFO TAB -->

                                                            <!-- CHANGE PASSWORD TAB -->
                                                            <div class="tab-pane" id="change_password"
                                                                 style="padding:0">
                                                                <form id="passwordForm">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Current
                                                                            Password</label>
                                                                        <input type="password" name="old_password"
                                                                               class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">New
                                                                            Password</label>
                                                                        <input type="password" name="new_password"
                                                                               class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Re-type New
                                                                            Password</label>
                                                                        <input type="password" name="re_new_password"
                                                                               class="form-control"/>
                                                                    </div>
                                                                    <div class="margin-top-10">
                                                                        <a class="btn green-haze changePassword">
                                                                            Change Password </a>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- END CHANGE PASSWORD TAB -->

                                                            <!-- PRIVACY SETTINGS TAB -->
                                                            <div class="tab-pane" id="privacy_settings"
                                                                 style="padding:0">
                                                                <form id="privacyForm">
                                                                    <table class="table table-light table-hover">
                                                                        <tr>
                                                                            <td>
                                                                                Enable Email Notification
                                                                            </td>
                                                                            <td>
                                                                                <label class="uniform-inline">
                                                                                    <input type="radio"
                                                                                           name="email_notification"
                                                                                           value="YES" @if($userDetails['email_notification']=='YES'){{'checked'}} @endif/>
                                                                                    Yes </label>
                                                                                <label class="uniform-inline">
                                                                                    <input type="radio"
                                                                                           name="email_notification"
                                                                                           value="NO" @if($userDetails['email_notification']=='NO'){{'checked'}} @endif/>
                                                                                    No </label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                Enable Web Notification
                                                                            </td>
                                                                            <td>
                                                                                <label class="uniform-inline">
                                                                                    <input type="radio"
                                                                                           name="web_notification"
                                                                                           value="YES" @if($userDetails['web_notification']=='YES'){{'checked'}} @endif/>Yes
                                                                                </label>
                                                                                <label class="uniform-inline">
                                                                                    <input type="radio"
                                                                                           name="web_notification"
                                                                                           value="NO" @if($userDetails['web_notification']=='NO'){{'checked'}} @endif/>No
                                                                                </label>
                                                                            </td>
                                                                        </tr>
                                                                        {{--<tr>--}}
                                                                        {{--<td>--}}
                                                                        {{--Enim eiusmod high life accusamus terry--}}
                                                                        {{--richardson ad squid wolf moon--}}
                                                                        {{--</td>--}}
                                                                        {{--<td>--}}
                                                                        {{--<label class="uniform-inline">--}}
                                                                        {{--<input type="checkbox" value=""/>--}}
                                                                        {{--Yes </label>--}}
                                                                        {{--</td>--}}
                                                                        {{--</tr>--}}
                                                                    </table>
                                                                    <!--end profile-settings-->
                                                                    <div class="margin-top-10">
                                                                        <a class="btn green-haze privacySettings">
                                                                            Save Changes </a>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- END PRIVACY SETTINGS TAB -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>

                        {{--</div>--}}

                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT -->

        </div>
    </div>


    @endsection
    @section('pagejavascripts')
            <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->

    <!-- END PAGE LEVEL SCRIPTS -->
    {{--<script src="/assets/user/js/slimscroll.min.js" type="text/javascript"></script>--}}
    <script src="/assets/user/user-panel/global/plugins/jquery-slimscroll/jquery.slimscroll.js"
            type="text/javascript"></script>
    <script src="/assets/user/js/profile.js" type="text/javascript"></script>
    <script src="/assets/user/js/fileinput.js" type="text/javascript"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>
    <script src="/assets/user/user-panel/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
    <script>
        jQuery(document).ready(function () {
            Profile.init(); // init page demo
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('a[title]').tooltip();

            $('.scroller').slimScroll({
                color: '#d3cfcf',
                size: '7px',
                height: '350px',
                alwaysVisible: true
            });


            $(document.body).on('click', '#account_overview_tab', function (e) {
                e.preventDefault();
                $(this).addClass('active');
                $('#account_settings_tab').removeClass('active');
                $('#account_overview').show();
                $('#account_settings').hide();
            });
            $(document.body).on('click', '#account_settings_tab', function (e) {
                e.preventDefault();
                $(this).addClass('active');
                $('#account_overview_tab').removeClass('active');
                $('#account_settings').show();
                $('#account_overview').hide();

            });
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


    {{----------------------------------------------------------------------------->functionality------------------>--}}
    <script>
        var convertImgToBase64 = function (original_img, callback) {
            var fileReader = new FileReader();
            fileReader.onload = function (fileLoadedEvent) {
                callback(fileLoadedEvent.target.result);
            };
            fileReader.onerror = function (fileLoadedEvent) {
                callback(null);
            };
            fileReader.readAsDataURL(original_img);
        };

        $(document).ready(function () {
            toastr.options = {
                timeOut: 1000,
                extendedTimeOut: 100,
                tapToDismiss: true,
                debug: false,
                fadeOut: 10,
                positionClass: "toast-top-center",
                limit: 1
            };

            $('#updatedimage').click(function () {
                var file = $('#avatar-1').prop("files")[0];
                console.log("file-->", file);
                if (file != null) {
                    convertImgToBase64(file, function (response) {
                        if (response != null) {
                            $.ajax({
                                url: '/ProfieImageUpdating',
                                dataType: 'json',
                                method: 'post',
                                data: {
                                    profieimage: response
                                },
                                beforeSend: function () {

                                },
                                complete: function (xhr, status) {

                                },
                                success: function (response) {
                                    if (response == 200) {
                                        setTimeout(function () {
                                            window.location.reload();
                                        }, 2000)
                                    } else {
                                        toastr.warning("Something went worng...&&...plese update again !!")
                                    }
                                }
                            })
                        }
                    });
                } else {
                    toastr.warning("please select file picture");
                }
            })

            $("#uploadimage").on('click', '.savebutton', function (e) {
                e.preventDefault();
                var id = $('#id').val();
                var user_id = $('#user_id').val();
                var name = $('#name').val();
                var email = $('.email').val();
                var pwd = $('#pwd').val();
                var cpwd = $('.cpwd').val();
                var paypalemail = $('.paypalemail').val();
                var paypalnumber = $('.paypalnumber').val();

                toastr.options = {
                    timeOut: 5000,
                    extendedTimeOut: 1000,
                    tapToDismiss: true,
                    debug: false,
                    fadeOut: 10,
                    positionClass: "toast-top-center",
                    limit: 1
                };
                $.ajax({
                    url: "/settingsdata",
                    type: "POST",
                    data: {
                        name: name,
                        id: id,
                        user_id: user_id,
                        pwd: pwd,
                        cpwd: cpwd,
                        email: email,
                        paypalemail: paypalemail,
                        paypalnumber: paypalnumber,
                    },
                    success: function (response) {
                        if (response['code'] == 200) {
                            console.log(response['message'])
                            toastr.success(response['message']);
                        } else {
                            toastr.error(response['message'])
                        }
                    }
                })
            })
        })

    </script>

    {{--{{<------------------------------------------------------------functionality----------------------------------}}


    <script>
        $(document).ready(function () {
            toastr.options = {
                timeOut: 1000,
                extendedTimeOut: 100,
                tapToDismiss: true,
                debug: false,
                fadeOut: 10,
                positionClass: "toast-top-center",
                limit: 1
            };

            $(document.body).on('click', '.saveProfile', function () {
                $('.alert-danger').hide();
                $('.alert-success').hide();
                var full_name = $('#personalForm input[name=full_name]').val();
                var username = $('#personalForm input[name=username]').val();
                var paypal_email = $('#personalForm input[name=paypal_email]').val();
                var contact_no = $('#personalForm input[name=contact_no]').val();

                if (username.trim().length == 0) {
                    $('.alert-danger').show().find('ul').text('Username field is required');
                    $('#personalForm input[name=username]').focus();
                    return false;
                }
//                else if (paypal_email.trim().length == 0) {
//                    $('.alert-danger').show().find('ul').text('Paypal Email field is required');
//                    $('#personalForm input[name=paypal_email]').focus();
//                    return false;
//                }
//                else if (contact_no.trim().length == 0) {
//                    $('.alert-danger').show().find('ul').text('Contact No. field is required');
//                    $('#personalForm input[name=contact_no]').focus();
//                    return false;
//                }
                var saveData = function () {
                    $.ajax({
                        url: "/saveProfileDetails",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            "full_name": full_name,
                            "username": username,
                            "paypal_email": paypal_email,
                            "contact_no": contact_no,
                        },
                        beforeSend: function () {
                            $('.alert-danger').hide();
                            $('.alert-success').hide();
                        },
                        success: function (response) {
                            console.log('response', JSON.stringify(response));
                            var errHtml = '';
                            if (response.code == 200) {
                                $('.alert-success').show().find('ul').text('Profile Details Updated Successfully');
                                $('#profileUsername').text(username);
                                $('#personalForm input[name=paypal_email]').attr('data-paypal', paypal_email);
                            } else if (response.code == 400) {
                                if (typeof response.message == 'object') {
                                    $.each(response.message, function (key, value) {
                                        errHtml = errHtml + '<li>' + value.msg + '</li>';
                                    });
                                    $('.alert-danger').show().find('ul').html(errHtml);
                                } else {
                                    $('.alert-danger').show().find('ul').text(response.message);
                                }

                            } else if (response.code == 401) {
                                $.each(response.validation_errors, function (key, value) {
                                    errHtml = errHtml + '<li>' + value + '</li>';
                                })
                                $('.alert-danger').show().find('ul').html(errHtml);
                            } else {
                                $('.alert-danger').show().find('ul').text('Unexpected Error has Occured');
                            }


                        }
                    });
                }

                        @if(isset($userDetails['affiliate_link']) && !empty($userDetails['affiliate_link']))


                var old_paypal_email = $('#personalForm input[name=paypal_email]').attr('data-paypal');
                if (old_paypal_email != paypal_email.trim()) {

                    swal({
                                title: "Are you sure?",
                                text: "This paypal Email will Receive Reffered money, Are you sure to change",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Continue",
                                closeOnConfirm: true
                            },
                            function () {
                                saveData();
                            });
                } else {
                    saveData();
                }
                @else
                saveData();
                @endif

            });
            $(document.body).on('click', '.changePassword', function () {
                $('.alert-danger').hide();
                $('.alert-success').hide();

                var old_password = $('#passwordForm input[name=old_password]').val();
                var new_password = $('#passwordForm input[name=new_password]').val();
                var re_new_password = $('#passwordForm input[name=re_new_password]').val();

//
                if (old_password.trim().length == 0) {
                    $('#passwordForm input[name=old_password]').focus();
                    $('.alert-danger').show().find('ul').text('Old Password field is required');
                    return false;
                } else if (new_password.trim().length < 6 && new_password.trim().length > 20) {
                    $('#passwordForm input[name=new_password]').focus();
                    $('.alert-danger').show().find('ul').text('New Password field is required and must be between 6 to 20');
                    console.log('password must b greater than 5');
                    return false;
                } else if (new_password.trim().length != re_new_password.trim().length) {
                    $('.alert-danger').show().find('ul').text('Re-type New Password field not Matched');
                    $('#passwordForm input[name=re_new_password]').focus();
                    console.log('password not matched');
                    return false;
                }
                $.ajax({
                    url: "/changePassword",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        "old_password": old_password,
                        "new_password": new_password,
                        "re_new_password": re_new_password,
                    },
                    beforeSend: function () {
                        $('.alert-danger').hide();
                        $('.alert-success').hide();
                    },
                    success: function (response) {

                        console.log('response', JSON.stringify(response));
                        if (response.code == 200) {
                            $('.alert-success').show().find('ul').text('Password Updated Successfully');
                        } else if (response.code == 400) {
                            $('.alert-danger').show().find('ul').text(JSON.stringify(response.message));
                        } else if (response.code == 401) {
                            var errHtml = '';
                            $.each(response.validation_errors, function (key, value) {
                                console.log(key);
                                console.log(value);
                                errHtml = errHtml + '<li>' + value + '</li>';
                            })
                            $('.alert-danger').show().find('ul').html(errHtml);
                        } else {
                            $('.alert-danger').show().find('ul').text('Unexpected Error has Occured');
                        }


                    }
                });

            });
            $(document.body).on('click', '.privacySettings', function () {
                $('.alert-danger').hide();
                $('.alert-success').hide();

                var email_notification = $('#privacyForm input[name=email_notification]:checked').val();
                var web_notification = $('#privacyForm input[name=web_notification]:checked').val();

                $.ajax({
                    url: "/savePrivacySettings",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        "email_notification": email_notification,
                        "web_notification": web_notification,
                    },
                    beforeSend: function () {
                        $('.alert-danger').hide();
                        $('.alert-success').hide();
                    },
                    success: function (response) {

                        console.log('response', JSON.stringify(response));
                        if (response.code == 200) {

                            $('.alert-success').show().find('ul').text(response.message);
                        } else if (response.code == 400) {
                            $('.alert-danger').show().find('ul').text(JSON.stringify(response.message));
                        } else if (response.code == 401) {
                            var errHtml = '';
                            $.each(response.validation_errors, function (key, value) {
                                console.log(key);
                                console.log(value);
                                errHtml = errHtml + '<li>' + value + '</li>';
                            })
                            $('.alert-danger').show().find('ul').html(errHtml);
                        } else {
                            $('.alert-danger').show().find('ul').text('Unexpected Error has Occured');
                        }


                    }
                });

            });
            $(document.body).on('click', '.close-message', function () {
                $(this).parent().hide();
            });
            $(document.body).on('click', '.liCLick', function () {
                $('.alert-success').hide();
                $('.alert-danger').hide();

            });
        });
        var ajaxProcessing=false;
        function changeProfileImage(obj) {
            if(ajaxProcessing===true){
                return false;
            }
            setTimeout(function () {
                var imageBase64 = $('#srcBase64').children('img').attr('src');
                $.ajax({
                    url: "/changeProfileImage",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        "image": imageBase64
                    },
                    beforeSend: function () {
                        ajaxProcessing=true;

                        $('.update').addClass('img-load');
                        $('.profile-userbuttons .fileinput-exists').html('Updating..');
                        $('.profile-userbuttons span').removeClass('green-haze');
                        $('.profile-userbuttons span input').prop('type','');

                    },
                    complete: function () {
                        ajaxProcessing=false;
                        $('.update').removeClass('img-load');
                        $('.profile-userbuttons span').addClass('green-haze');
                        $('.profile-userbuttons .fileinput-exists').html('Change Profile Pic');
                        $('.profile-userbuttons span input').prop('type','file');
                    },
                    success: function (response) {
                        if (response.code == 200) {
                            console.log('hi');
                            if (response.profile_image_url) {
                                $('.profile_picture').attr('src',imageBase64);
//                                $('.profile_picture').attr('src', response.profile_image_url);
                                console.log('response.profile_image_url', response.profile_image_url);
                            }
                            toastr.success('Profile Image Updated Successfully');
                        } else if (response.code == 400) {
                            toastr.error('Profile Image Not Updated');
                        } else if (response.code == 401) {
                            toastr.error('Only jpg|jpeg|png allowed');
                        } else {
                            toastr.error('Unexpected Error has Occured');
                        }

                        console.log('response', JSON.stringify(response));
                    }
                })
            }, 500);
        }
        ;
    </script>


@endsection