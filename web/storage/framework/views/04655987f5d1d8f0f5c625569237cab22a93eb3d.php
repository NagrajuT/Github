<?php $__env->startSection('active_profileManagement','active'); ?>
<?php $__env->startSection("headcontent"); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php /*<?php echo e(dd($userDetails)); ?>*/ ?>

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

                        <?php /*<div class="container">*/ ?>
                        <?php /*<div class="row">*/ ?>
                        <?php /*<div class="col-md-12">*/ ?>
                        <?php /*<div class="board">*/ ?>
                        <?php /*<div class="row">*/ ?>
                        <?php /*<div class="col-md-12">*/ ?>

                        <?php /*<form id="uploadimage" class="text-center" action="" method="post" enctype="multipart/form-data" autocomplete="off">*/ ?>
                        <?php /*<div class="col-md-4 col-md-offset-1">*/ ?>
                        <?php /*<div class="form-group">*/ ?>
                        <?php /*<div id="kv-avatar-errors-1" class="center-block"*/ ?>
                        <?php /*style="width:800px;display:none"></div>*/ ?>
                        <?php /*<form class="text-center" action="" method="post" enctype="multipart/form-data">*/ ?>
                        <?php /*<div class="kv-avatar center-block" style="width:200px">*/ ?>
                        <?php /*<input id="avatar-1" name="avatar-1" type="file"  accept="image/*"  class="file-loading">*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</form>*/ ?>
                        <?php /*<button id="updatedimage" onclick="return false;" style="color: blue">update</button>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>

                        <?php /*<div class="col-md-6">*/ ?>
                        <?php /*<form role="form" method="post" class="form-horizontal">*/ ?>
                        <?php /*<div class="form-group">*/ ?>
                        <?php /*<label class="form-control-label col-sm-4" for="name">Name</label>*/ ?>
                        <?php /*<div class="col-sm-8">*/ ?>
                        <?php /*<input id="name" class="name form-control" type="name" required*/ ?>
                        <?php /*placeholder="<?php echo e($userDetails['username']); ?>"*/ ?>
                        <?php /*value="<?php echo e($userDetails['username']); ?>" name="name">*/ ?>
                        <?php /*<input type="text" value="<?php echo e($userDetails['id']); ?>" name="id" id="id" style="display:none">*/ ?>
                        <?php /*<input type="text" value="<?php echo e($userDetails['user_id']); ?>" id="user_id" name="user_id" style="display:none">*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<div class="form-group">*/ ?>
                        <?php /*<label class="disabled form-control-label col-sm-4" for="email">E-mail*/ ?>
                        <?php /*id</label>*/ ?>
                        <?php /*<div class="col-sm-8">*/ ?>
                        <?php /*<input id="email" class="email form-control" type="email"*/ ?>
                        <?php /*placeholder="<?php echo e($userDetails['email']); ?>"*/ ?>
                        <?php /*value="<?php echo e($userDetails['email']); ?>" name="email" disabled>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<div class="form-group">*/ ?>
                        <?php /*<label class="form-control-label col-sm-4" for="pwd">Change Password</label>*/ ?>
                        <?php /*<div class="col-sm-8">*/ ?>
                        <?php /*<input id="pwd" class="pwd form-control" type="password" required*/ ?>
                        <?php /*placeholder="Enter old password" name="pwd" readonly*/ ?>
                        <?php /*onfocus="this.removeAttribute('readonly');">*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>

                        <?php /*<div class="form-group">*/ ?>
                        <?php /*<label class="form-control-label col-sm-4" for="cpwd">Confirm Password</label>*/ ?>
                        <?php /*<div class="col-sm-8">*/ ?>
                        <?php /*<input id="cpwd" class="cpwd form-control" type="password"*/ ?>
                        <?php /*placeholder="" name="cpwd">*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</form>*/ ?>
                        <?php /*<div class="row">*/ ?>
                        <?php /*<div class="col-md-12" style="margin-top:20px;">*/ ?>
                        <?php /*<h4><b>PAYPAL DETAILS</b></h4>*/ ?>
                        <?php /*<table class="table" style="margin-top:20px;">*/ ?>
                        <?php /*<tr>*/ ?>
                        <?php /*<th>Email id</th>*/ ?>
                        <?php /*<td><input type="text" class="paypalemail" name="paypalemail"*/ ?>
                        <?php /*value="<?php echo e($userDetails['paypal_email']); ?>"></td>*/ ?>
                        <?php /*</tr>*/ ?>
                        <?php /*<tr>*/ ?>
                        <?php /*<th>Contact No.</th>*/ ?>
                        <?php /*<td><input type="text" class="paypalnumber" name="paypalnumber"*/ ?>
                        <?php /*value="<?php echo e($userDetails['contact_details']); ?>"></td>*/ ?>
                        <?php /*</tr>*/ ?>
                        <?php /*</table>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<div class="form-group text-center" style="margin-bottom:10px;">*/ ?>
                        <?php /*<div class="col-md-12 text-center">*/ ?>
                        <?php /*<button class="savebutton  btn btn-default btn-ag pull-center next" type="submit" style="margin-bottom:10px;" onclick="return false;">Save</button>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</form>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>


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
                                                    <img src="<?php echo e(env('API_URL') . '/'. $userDetails['profile_pic_url']); ?>"
                                                         class="img-responsive" alt="">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists text-center update"
                                                     id="srcBase64"
                                                     style="">
                                                    <img src="<?php echo e(env('API_URL') . '/'. $userDetails['profile_pic_url']); ?>"
                                                         class="img-responsive" alt=""
                                                         style="width:150px; height:150px;">
                                                </div>
                                            </div>

                                            <div class="profile-usertitle">
                                                <div class="profile-usertitle-name" id="profileUsername">
                                                    <?php echo e($userDetails['username']); ?>

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


                                        <?php /*<!-- SIDEBAR USERPIC -->*/ ?>
                                        <?php /*<div class="profile-userpic">*/ ?>
                                        <?php /*<img src="/assets/user/user-panel/img/avatar9.jpg"*/ ?>
                                        <?php /*class="img-responsive" alt="">*/ ?>
                                        <?php /*</div>*/ ?>
                                        <?php /*<!-- END SIDEBAR USERPIC -->*/ ?>
                                        <?php /*<!-- SIDEBAR USER TITLE -->*/ ?>
                                        <?php /*<div class="profile-usertitle">*/ ?>
                                        <?php /*<div class="profile-usertitle-name">*/ ?>
                                        <?php /*Marcus Doe*/ ?>
                                        <?php /*</div>*/ ?>
                                        <?php /*</div>*/ ?>
                                        <?php /*<!-- END SIDEBAR USER TITLE -->*/ ?>
                                        <?php /*<!-- SIDEBAR BUTTONS -->*/ ?>
                                        <?php /*<div class="profile-userbuttons">*/ ?>
                                        <?php /*<button type="button" class="btn btn-circle green-haze btn-sm">Change*/ ?>
                                        <?php /*Profile Pic*/ ?>
                                        <?php /*</button>*/ ?>
                                        <?php /*</div>*/ ?>

                                        <?php /*<!-- END SIDEBAR BUTTONS -->*/ ?>
                                                <!-- SIDEBAR MENU -->
                                        <div class="profile-usermenu">
                                            <ul class="nav">
                                                <?php /*<li class="active" id="account_overview_tab">*/ ?>
                                                <?php /*<a href="javascript:;" class="liCLick">*/ ?>
                                                <?php /*<i class="icon-home"></i>*/ ?>
                                                <?php /*Overview </a>*/ ?>
                                                <?php /*</li>*/ ?>
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
                                    <?php /*<div class="profile-content">*/ ?>
                                    <?php /*<div class="row">*/ ?>
                                    <?php /*<div class="col-md-6">*/ ?>
                                    <?php /*<!-- BEGIN PORTLET -->*/ ?>
                                    <?php /*<div class="portlet light" style="border: solid #eff3f8 1px;">*/ ?>
                                    <?php /*<div class="portlet-title">*/ ?>
                                    <?php /*<div class="caption caption-md">*/ ?>
                                    <?php /*<i class="icon-bar-chart theme-font hide"></i>*/ ?>
                                    <?php /*<span class="caption-subject font-blue-madison bold uppercase">Your Activity</span>*/ ?>
                                    <?php /*<span class="caption-helper hide">weekly stats...</span>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="actions">*/ ?>
                                    <?php /*<div class="btn-group btn-group-devided"*/ ?>
                                    <?php /*data-toggle="buttons">*/ ?>
                                    <?php /*<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">*/ ?>
                                    <?php /*<input type="radio" name="options"*/ ?>
                                    <?php /*class="toggle"*/ ?>
                                    <?php /*id="option1">Today</label>*/ ?>
                                    <?php /*<label class="btn btn-transparent grey-salsa btn-circle btn-sm">*/ ?>
                                    <?php /*<input type="radio" name="options"*/ ?>
                                    <?php /*class="toggle"*/ ?>
                                    <?php /*id="option2">Week</label>*/ ?>
                                    <?php /*<label class="btn btn-transparent grey-salsa btn-circle btn-sm">*/ ?>
                                    <?php /*<input type="radio" name="options"*/ ?>
                                    <?php /*class="toggle"*/ ?>
                                    <?php /*id="option2">Month</label>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="portlet-body">*/ ?>
                                    <?php /*<div class="row number-stats margin-bottom-30">*/ ?>
                                    <?php /*<div class="col-md-6 col-sm-6 col-xs-6">*/ ?>
                                    <?php /*<div class="stat-left">*/ ?>
                                    <?php /*<div class="stat-chart">*/ ?>
                                    <?php /*<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->*/ ?>
                                    <?php /*<div id="sparkline_bar"></div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="stat-number">*/ ?>
                                    <?php /*<div class="title">*/ ?>
                                    <?php /*Total*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="number">*/ ?>
                                    <?php /*246*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col-md-6 col-sm-6 col-xs-6">*/ ?>
                                    <?php /*<div class="stat-right">*/ ?>
                                    <?php /*<div class="stat-chart">*/ ?>
                                    <?php /*<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->*/ ?>
                                    <?php /*<div id="sparkline_bar2"></div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="stat-number">*/ ?>
                                    <?php /*<div class="title">*/ ?>
                                    <?php /*New*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="number">*/ ?>
                                    <?php /*719*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="table-scrollable table-scrollable-borderless">*/ ?>
                                    <?php /*<table class="table table-hover table-light">*/ ?>
                                    <?php /*<thead style="background:none;">*/ ?>
                                    <?php /*<tr class="uppercase">*/ ?>
                                    <?php /*<th colspan="2">*/ ?>
                                    <?php /*MEMBER*/ ?>
                                    <?php /*</th>*/ ?>
                                    <?php /*<th>*/ ?>
                                    <?php /*Earnings*/ ?>
                                    <?php /*</th>*/ ?>
                                    <?php /*<th>*/ ?>
                                    <?php /*CASES*/ ?>
                                    <?php /*</th>*/ ?>
                                    <?php /*<th>*/ ?>
                                    <?php /*CLOSED*/ ?>
                                    <?php /*</th>*/ ?>
                                    <?php /*<th>*/ ?>
                                    <?php /*RATE*/ ?>
                                    <?php /*</th>*/ ?>
                                    <?php /*</tr>*/ ?>
                                    <?php /*</thead>*/ ?>
                                    <?php /*<tr>*/ ?>
                                    <?php /*<td class="fit">*/ ?>
                                    <?php /*<img class="user-pic"*/ ?>
                                    <?php /*src="../../assets/admin/layout3/img/avatar4.jpg">*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*<a href="javascript:;"*/ ?>
                                    <?php /*class="primary-link">Brain</a>*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*$345*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*45*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*124*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*<span class="bold theme-font">80%</span>*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*</tr>*/ ?>
                                    <?php /*<tr>*/ ?>
                                    <?php /*<td class="fit">*/ ?>
                                    <?php /*<img class="user-pic"*/ ?>
                                    <?php /*src="../../assets/admin/layout3/img/avatar5.jpg">*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*<a href="javascript:;"*/ ?>
                                    <?php /*class="primary-link">Nick</a>*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*$560*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*12*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*24*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*<span class="bold theme-font">67%</span>*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*</tr>*/ ?>
                                    <?php /*<tr>*/ ?>
                                    <?php /*<td class="fit">*/ ?>
                                    <?php /*<img class="user-pic"*/ ?>
                                    <?php /*src="../../assets/admin/layout3/img/avatar6.jpg">*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*<a href="javascript:;"*/ ?>
                                    <?php /*class="primary-link">Tim</a>*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*$1,345*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*450*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*46*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*<span class="bold theme-font">98%</span>*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*</tr>*/ ?>
                                    <?php /*<tr>*/ ?>
                                    <?php /*<td class="fit">*/ ?>
                                    <?php /*<img class="user-pic"*/ ?>
                                    <?php /*src="../../assets/admin/layout3/img/avatar7.jpg">*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*<a href="javascript:;"*/ ?>
                                    <?php /*class="primary-link">Tom</a>*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*$645*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*50*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*89*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*<td>*/ ?>
                                    <?php /*<span class="bold theme-font">58%</span>*/ ?>
                                    <?php /*</td>*/ ?>
                                    <?php /*</tr>*/ ?>
                                    <?php /*</table>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<!-- END PORTLET -->*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col-md-6">*/ ?>
                                    <?php /*<!-- BEGIN PORTLET -->*/ ?>
                                    <?php /*<div class="portlet light" style="border: solid #eff3f8 1px;">*/ ?>
                                    <?php /*<div class="portlet-title tabbable-line">*/ ?>
                                    <?php /*<div class="caption caption-md">*/ ?>
                                    <?php /*<i class="icon-globe theme-font hide"></i>*/ ?>
                                    <?php /*<span class="caption-subject font-blue-madison bold uppercase">Feeds</span>*/ ?>
                                    <?php /*</div>*/ ?>

                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="portlet-body">*/ ?>
                                    <?php /*<!--BEGIN TABS-->*/ ?>
                                    <?php /*<div class="tab-content">*/ ?>
                                    <?php /*<div class="tab-pane active" id="tab_1_1"*/ ?>
                                    <?php /*style="padding-top: 0px">*/ ?>
                                    <?php /*<div class="scroller">*/ ?>
                                    <?php /*<ul class="feeds">*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-success">*/ ?>
                                    <?php /*<i class="fa fa-bell-o"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*You have 4 pending*/ ?>
                                    <?php /*tasks.*/ ?>
                                    <?php /*<span class="label label-sm label-info">*/ ?>
                                    <?php /*Take action <i class="fa fa-share"></i>*/ ?>
                                    <?php /*</span>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*Just now*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<a href="javascript:;">*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-success">*/ ?>
                                    <?php /*<i class="fa fa-bell-o"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*New version v1.4*/ ?>
                                    <?php /*just*/ ?>
                                    <?php /*lunched!*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*20 mins*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</a>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-danger">*/ ?>
                                    <?php /*<i class="fa fa-bolt"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*Database server #12*/ ?>
                                    <?php /*overloaded. Please fix*/ ?>
                                    <?php /*the*/ ?>
                                    <?php /*issue.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*24 mins*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-info">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*New order received and*/ ?>
                                    <?php /*pending for process.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*30 mins*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-success">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*New payment refund and*/ ?>
                                    <?php /*pending approval.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*40 mins*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-warning">*/ ?>
                                    <?php /*<i class="fa fa-plus"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*New member registered.*/ ?>
                                    <?php /*Pending approval.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*1.5 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-success">*/ ?>
                                    <?php /*<i class="fa fa-bell-o"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*Web server hardware*/ ?>
                                    <?php /*needs to*/ ?>
                                    <?php /*be upgraded. <span*/ ?>
                                    <?php /*class="label label-sm label-default ">*/ ?>
                                    <?php /*Overdue </span>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*2 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-default">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*Prod01 database server*/ ?>
                                    <?php /*is*/ ?>
                                    <?php /*overloaded 90%.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*3 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-warning">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*New group created.*/ ?>
                                    <?php /*Pending*/ ?>
                                    <?php /*manager review.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*5 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-info">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*Order payment failed.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*18 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-default">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*New application*/ ?>
                                    <?php /*received.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*21 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-info">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*Dev90 web server*/ ?>
                                    <?php /*restarted.*/ ?>
                                    <?php /*Pending overall system*/ ?>
                                    <?php /*check.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*22 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-default">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*New member registered.*/ ?>
                                    <?php /*Pending approval*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*21 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-info">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*L45 Network failure.*/ ?>
                                    <?php /*Schedule maintenance.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*22 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-default">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*Order canceled with*/ ?>
                                    <?php /*failed*/ ?>
                                    <?php /*payment.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*21 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-info">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*Web-A2 clound instance*/ ?>
                                    <?php /*created. Schedule full*/ ?>
                                    <?php /*scan.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*22 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-default">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*Member canceled.*/ ?>
                                    <?php /*Schedule*/ ?>
                                    <?php /*account review.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*21 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*<li>*/ ?>
                                    <?php /*<div class="col1">*/ ?>
                                    <?php /*<div class="cont">*/ ?>
                                    <?php /*<div class="cont-col1">*/ ?>
                                    <?php /*<div class="label label-sm label-info">*/ ?>
                                    <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="cont-col2">*/ ?>
                                    <?php /*<div class="desc">*/ ?>
                                    <?php /*New order received.*/ ?>
                                    <?php /*Please*/ ?>
                                    <?php /*take care of it.*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col2">*/ ?>
                                    <?php /*<div class="date">*/ ?>
                                    <?php /*22 hours*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</li>*/ ?>
                                    <?php /*</ul>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<!--END TABS-->*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<!-- END PORTLET -->*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*</div>*/ ?>
                                </div>

                                <?php /*<div id="account_settings"hidden >*/ ?>
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
                                                                               value="<?php echo e($userDetails['full_name']); ?>"
                                                                               placeholder="Smartffic User"
                                                                               class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label"><b>Username</b></label>
                                                                        <input type="text" name="username"
                                                                               value="<?php echo e($userDetails['username']); ?>"
                                                                               placeholder="InstaUser"
                                                                               class="form-control"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label"><b>Personal
                                                                                Email</b></label>
                                                                        <span class="form-control"
                                                                              style="background-color:#eff3f8"><?php echo e($userDetails['email']); ?></span>
                                                                    </div>

                                                                    <?php if(isset($userDetails['affiliate_link']) && !empty($userDetails['affiliate_link'])): ?>
                                                                        <div class="form-group">
                                                                            <label class="control-label"><b>Paypal
                                                                                    Email</b></label>
                                                                            <input type="text"
                                                                                   data-paypal="<?php echo e($userDetails['paypal_email']); ?>"
                                                                                   name="paypal_email"
                                                                                   value="<?php echo e($userDetails['paypal_email']); ?>"
                                                                                   placeholder="abcd@paypal.com"
                                                                                   class="form-control"/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label"><b>Paypal
                                                                                    Contact
                                                                                    No.</b></label>
                                                                            <input type="text" name="contact_no"
                                                                                   value="<?php echo e($userDetails['contact_details']); ?>"
                                                                                   placeholder="+919988776655"
                                                                                   class="form-control"/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label"><b>Affiliate
                                                                                    Link</b></label>
                                                                            <span class="form-control"
                                                                                  style="background-color:#eff3f8"><?php echo e($userDetails['affiliate_link']); ?></span>
                                                                        </div>
                                                                    <?php endif; ?>


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
                                                                                           value="YES" <?php if($userDetails['email_notification']=='YES'): ?><?php echo e('checked'); ?> <?php endif; ?>/>
                                                                                    Yes </label>
                                                                                <label class="uniform-inline">
                                                                                    <input type="radio"
                                                                                           name="email_notification"
                                                                                           value="NO" <?php if($userDetails['email_notification']=='NO'): ?><?php echo e('checked'); ?> <?php endif; ?>/>
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
                                                                                           value="YES" <?php if($userDetails['web_notification']=='YES'): ?><?php echo e('checked'); ?> <?php endif; ?>/>Yes
                                                                                </label>
                                                                                <label class="uniform-inline">
                                                                                    <input type="radio"
                                                                                           name="web_notification"
                                                                                           value="NO" <?php if($userDetails['web_notification']=='NO'): ?><?php echo e('checked'); ?> <?php endif; ?>/>No
                                                                                </label>
                                                                            </td>
                                                                        </tr>
                                                                        <?php /*<tr>*/ ?>
                                                                        <?php /*<td>*/ ?>
                                                                        <?php /*Enim eiusmod high life accusamus terry*/ ?>
                                                                        <?php /*richardson ad squid wolf moon*/ ?>
                                                                        <?php /*</td>*/ ?>
                                                                        <?php /*<td>*/ ?>
                                                                        <?php /*<label class="uniform-inline">*/ ?>
                                                                        <?php /*<input type="checkbox" value=""/>*/ ?>
                                                                        <?php /*Yes </label>*/ ?>
                                                                        <?php /*</td>*/ ?>
                                                                        <?php /*</tr>*/ ?>
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

                        <?php /*</div>*/ ?>

                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT -->

        </div>
    </div>


    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('pagejavascripts'); ?>
            <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->

    <!-- END PAGE LEVEL SCRIPTS -->
    <?php /*<script src="/assets/user/js/slimscroll.min.js" type="text/javascript"></script>*/ ?>
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


    <?php /*--------------------------------------------------------------------------->functionality------------------>*/ ?>
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

    <?php /*{{<------------------------------------------------------------functionality--------------------------------*/ ?>


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

                        <?php if(isset($userDetails['affiliate_link']) && !empty($userDetails['affiliate_link'])): ?>


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
                <?php else: ?>
                saveData();
                <?php endif; ?>

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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('User::layouts.bodyLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>