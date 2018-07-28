<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
<head>
    <?php echo $__env->make('Admin::layouts.adminHeadContent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('pageheadcontent'); ?>

</head>
<body class="page-md page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo ">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/admin/dashboard">
                <img width="150" src="/assets/user/images/instaffic_logo.png" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a id="hovered"  href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge-default" id="addNew"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold" id="newCount" data-count="0">0 NEW</span>
                                Notifications
                            </h3>
                            <a href="/view/all/notificatios">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283" id="addMessage">
                                <?php /*<li>*/ ?>
                                <?php /*<a href="javascript:;">*/ ?>
                                <?php /*<span class="time">just now</span>*/ ?>
                                <?php /*<span class="details">*/ ?>
                                <?php /*<span class="label label-sm label-icon label-success">*/ ?>
                                <?php /*<i class="fa fa-plus"></i>*/ ?>
                                <?php /*</span>*/ ?>
                                <?php /*New user registered. </span>*/ ?>
                                <?php /*</a>*/ ?>
                                <?php /*</li>*/ ?>
                                <?php /*<li>*/ ?>
                                <?php /*<a href="javascript:;">*/ ?>
                                <?php /*<span class="time">3 mins</span>*/ ?>
                                <?php /*<span class="details">*/ ?>
                                <?php /*<span class="label label-sm label-icon label-danger">*/ ?>
                                <?php /*<i class="fa fa-bolt"></i>*/ ?>
                                <?php /*</span>*/ ?>
                                <?php /*Server #12 overloaded. </span>*/ ?>
                                <?php /*</a>*/ ?>
                                <?php /*</li>*/ ?>
                                <?php /*<li>*/ ?>
                                <?php /*<a href="javascript:;">*/ ?>
                                <?php /*<span class="time">10 mins</span>*/ ?>
                                <?php /*<span class="details">*/ ?>
                                <?php /*<span class="label label-sm label-icon label-warning">*/ ?>
                                <?php /*<i class="fa fa-bell-o"></i>*/ ?>
                                <?php /*</span>*/ ?>
                                <?php /*Server #2 not responding. </span>*/ ?>
                                <?php /*</a>*/ ?>
                                <?php /*</li>*/ ?>
                                <?php /*<li>*/ ?>
                                <?php /*<a href="javascript:;">*/ ?>
                                <?php /*<span class="time">14 hrs</span>*/ ?>
                                <?php /*<span class="details">*/ ?>
                                <?php /*<span class="label label-sm label-icon label-info">*/ ?>
                                <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                <?php /*</span>*/ ?>
                                <?php /*Application error. </span>*/ ?>
                                <?php /*</a>*/ ?>
                                <?php /*</li>*/ ?>
                                <?php /*<li>*/ ?>
                                <?php /*<a href="javascript:;">*/ ?>
                                <?php /*<span class="time">2 days</span>*/ ?>
                                <?php /*<span class="details">*/ ?>
                                <?php /*<span class="label label-sm label-icon label-danger">*/ ?>
                                <?php /*<i class="fa fa-bolt"></i>*/ ?>
                                <?php /*</span>*/ ?>
                                <?php /*Database overloaded 68%. </span>*/ ?>
                                <?php /*</a>*/ ?>
                                <?php /*</li>*/ ?>
                                <?php /*<li>*/ ?>
                                <?php /*<a href="javascript:;">*/ ?>
                                <?php /*<span class="time">3 days</span>*/ ?>
                                <?php /*<span class="details">*/ ?>
                                <?php /*<span class="label label-sm label-icon label-danger">*/ ?>
                                <?php /*<i class="fa fa-bolt"></i>*/ ?>
                                <?php /*</span>*/ ?>
                                <?php /*A user IP blocked. </span>*/ ?>
                                <?php /*</a>*/ ?>
                                <?php /*</li>*/ ?>
                                <?php /*<li>*/ ?>
                                <?php /*<a href="javascript:;">*/ ?>
                                <?php /*<span class="time">4 days</span>*/ ?>
                                <?php /*<span class="details">*/ ?>
                                <?php /*<span class="label label-sm label-icon label-warning">*/ ?>
                                <?php /*<i class="fa fa-bell-o"></i>*/ ?>
                                <?php /*</span>*/ ?>
                                <?php /*Storage Server #4 not responding dfdfdfd. </span>*/ ?>
                                <?php /*</a>*/ ?>
                                <?php /*</li>*/ ?>
                                <?php /*<li>*/ ?>
                                <?php /*<a href="javascript:;">*/ ?>
                                <?php /*<span class="time">5 days</span>*/ ?>
                                <?php /*<span class="details">*/ ?>
                                <?php /*<span class="label label-sm label-icon label-info">*/ ?>
                                <?php /*<i class="fa fa-bullhorn"></i>*/ ?>
                                <?php /*</span>*/ ?>
                                <?php /*System Error. </span>*/ ?>
                                <?php /*</a>*/ ?>
                                <?php /*</li>*/ ?>
                                <?php /*<li>*/ ?>
                                <?php /*<a href="javascript:;">*/ ?>
                                <?php /*<span class="time">9 days</span>*/ ?>
                                <?php /*<span class="details">*/ ?>
                                <?php /*<span class="label label-sm label-icon label-danger">*/ ?>
                                <?php /*<i class="fa fa-bolt"></i>*/ ?>
                                <?php /*</span>*/ ?>
                                <?php /*Storage server failed. </span>*/ ?>
                                <?php /*</a>*/ ?>
                                <?php /*</li>*/ ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <img alt="" class="img-circle" src="../../assets/admin/admin/layout/img/avatar3_small.jpg"/>
					<span class="username username-hide-on-mobile">
					Admin </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <?php /*<li>*/ ?>
                            <?php /*<a href="extra_profile.html">*/ ?>
                                <?php /*<i class="icon-user"></i> My Profile </a>*/ ?>
                        <?php /*</li>*/ ?>
                        <li>
                            <a href="/admin/logout">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <li class="dashboard">
                <?php /*<li class="start active open">*/ ?>
                    <a href="/admin/dashboard">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>

                <li class="manage_user">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span class="title">Manage Users</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="show_user">
                            <a href="/show/users">
                                <i class="fa fa-users"></i>
                                Available Users</a>
                        </li>
                        <li class="pending_user">
                            <a href="/get/pending/users">
                                <i class="fa fa-users"></i>
                                Pending Users</a>
                        </li>
                        <li class="affiliate_user">
                            <a href="/show/affiliate/user">
                                <i class="fa fa-users"></i>
                                Affiliate Users</a>
                        </li>
                        <?php /*<li>*/ ?>
                            <?php /*<a href="/show/users">*/ ?>
                                <?php /*<i class="fa fa-user-plus"></i>*/ ?>
                                <?php /*My Users</a>*/ ?>
                        <?php /*</li>*/ ?>
                        <li class="insta_acc">
                            <a href="/user/insta/accounts">
                                <i class="fa fa-users"></i>
                                Users Instagram Acc</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <?php /*<a href="javascript:;">*/ ?>
                        <?php /*<i class="icon-basket"></i>*/ ?>
                        <?php /*<span class="title">Subscription Package</span>*/ ?>
                        <?php /*<span class="arrow"></span>*/ ?>
                    <?php /*</a>*/ ?>
                    <?php /*<ul class="sub-menu">*/ ?>
                        <?php /*<li>*/ ?>
                            <?php /*<a href="#">*/ ?>
                                <?php /*<i class="icon-home"></i>*/ ?>
                                <?php /*Add Subscriptions</a>*/ ?>
                        <?php /*</li>*/ ?>
                        <?php /*<li>*/ ?>
                            <?php /*<a href="#">*/ ?>
                                <?php /*<i class="icon-basket"></i>*/ ?>
                                <?php /*Add </a>*/ ?>
                        <?php /*</li>*/ ?>
                    <?php /*</ul>*/ ?>
                </li>

                <li class="acc_set">
                    <a href="javascript:;">
                        <i class="fa fa-cog"></i>
                        <span class="title">Account Setting</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="add_insta">
                            <a href="/add/insta/accounts">
                                <i class="fa fa-plus"></i>
                                Add Instagram Account</a>
                        </li>
                        <li class="show_insta">
                            <a href="/show/insta/accounts">
                                <i class="fa fa-paper-plane-o"></i>
                                Admin Instagram A/C</a>
                        </li>
                        <li class="add_free_time">
                            <a href="/add/free/subscription">
                                <i class="fa fa-clock-o"></i>
                                Add Free Time</a>
                        </li>
                        <?php /*<li class="show_prx">*/ ?>
                            <?php /*<a href="/show/proxies">*/ ?>
                                <?php /*<i class="icon-home"></i>*/ ?>
                                <?php /*Manage Proxy</a>*/ ?>
                        <?php /*</li>*/ ?>
                        <li class="promo_def">
                            <a href="/promotion/defaults">
                                <i class="fa fa-bullhorn"></i>
                               Promotion Defaults</a>
                        </li>

                    </ul>
                </li>
                <li class="proxy_set">
                    <a href="javascript:;">
                        <i class="fa fa-cog"></i>
                        <span class="title">Manage Proxy</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">


                        <li class="sys_prx">
                            <a href="/show/proxies">
                                <i class="fa fa-paper-plane-o"></i>
                                Manage system Proxy</a>
                        </li>
                        <li class="ins_prx">
                            <a href="/show/insta/account/proxies">
                                <i class="fa fa-paper-plane-o"></i>
                                Insta Account Proxy</a>
                        </li>
                        <li class="gen_prx">
                            <a href="/show/gender/proxies">
                                <i class="fa fa-paper-plane-o"></i>
                                Manage Gender Proxy</a>
                        </li>


                    </ul>
                </li>
                <?php /*<li class="hash_set">*/ ?>
                    <?php /*<a href="javascript:;">*/ ?>
                        <?php /*<i class="fa fa-tag"></i>*/ ?>
                        <?php /*<span class="title">Manage Hashtag</span>*/ ?>
                        <?php /*<span class="arrow "></span>*/ ?>
                    <?php /*</a>*/ ?>
                    <?php /*<ul class="sub-menu">*/ ?>
                        <?php /*<li class="default_tag">*/ ?>
                            <?php /*<a href="/show/default/hashtag">*/ ?>
                                <?php /*<i class="fa fa-tag"></i>*/ ?>
                                <?php /*Default Hashtag</a>*/ ?>
                        <?php /*</li>*/ ?>
                    <?php /*</ul>*/ ?>
                <?php /*</li>*/ ?>
                <li class="pay_his">
                    <a href="javascript:;">
                        <i class="fa fa-credit-card"></i>
                        <span class="title">Manage Payments</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="pay_history">
                            <a href="/users/payment/history">
                                <i class="fa fa-credit-card"></i>
                                Payment History</a>
                        </li>
                    </ul>
                </li>
                <li class="profile_set">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span class="title">Profile Settings</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="rst_pwd">
                            <a href="/reset/password">
                                <i class="fa fa-key"></i>
                                Change Password</a>
                        </li>
                    </ul>
                </li>
                <li class="manage_aff">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span class="title">Manage Affiliate Users</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="aff_sub">
                            <a href="/show/affiliate/subscriptions">
                                <i class="fa fa-credit-card"></i>
                                affiliate payments</a>
                        </li>
                        <li class="clm_his">
                            <a href="/affiliate/claim/history">
                                <i class="fa fa-credit-card"></i>
                                affiliate Claim History</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">

            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

            <!-- END STYLE CUSTOMIZER -->
            <!-- BEGIN PAGE HEADER-->

            <?php echo $__env->yieldContent('pagebodycontent'); ?>

                    <!-- END PAGE CONTENT-->

    </div>
    <!-- END CONTENT -->
    <!-- Start Quick sidebar -->

    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        &copy; 2017 Smartffic, All Rights Reserved.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<?php echo $__env->make('Admin::layouts.adminFooterScripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('pagescripts'); ?>

<script>

    $(document).ready(function () {
        var notifyAdmin= function (){
            $.ajax({
                url:'/check/new/notification',
                method:'post',
                dataType:'json',
                success:function(response){
                    console.log('notification count===>',response.data.count);
                    if(response.data.count>0){

                        $('#addNew').addClass('badge');
                        $('#addNew').text(response.data.count);
                    }
                    var appendHtml='';
                    var label='';
                    var iconClass='';
                    $.each(response.data.data,function(k,v){
                        if(v.notification_type==0){
                            label='label-success';
                            iconClass='fa-plus'
                        }else if(v.notification_type==1){
                            label='label-info';
                            iconClass='fa-bell-o'
                        }else{
                            //chnage if new notification type need to display
                            label='label-warning';
                            iconClass='fa-plus'
                        }
                        appendHtml+=' <li> <a href="javascript:;"> ' +
                                '<span class="time">just now</span>' +
                                '<span class="details"><span class="label label-sm label-icon '+label+'">' +
                                '<i class="fa '+iconClass+'"></i></span>'+v.notification_message+'. </span> </a> </li>';

//                        console.log('notification_message==>', v.notification_message);
                    });
                    $('#addMessage').html(appendHtml);
                    $('#newCount').html(response.data.count+' NEW');
                    $('#newCount').attr('data-count',response.data.count);
                },
                error:function(error){
                    console.log('error===>',error);
                }
            });
            setTimeout(notifyAdmin,20000);
        }
        notifyAdmin();

        $('#hovered').mouseleave(function(){
            if($('#newCount').attr('data-count')>0){
                console.log('changing view status ');
                $.ajax({
                    url:'/update/admin/view/status',
                    method:'post',
                    success:function(response){
                        if(response==1){
                            $('#addNew').removeClass('badge');
                            $('#newCount').attr('data-count',0);
                            $('#newCount').html(0+' NEW');
                            $('#addNew').text('');
                        }else{
                            console.log('notification not updated!');
                        }
                    },
                    error:function(){
                        console.log('error has occured!');
                    }
                });
            }
        });

    });
</script>
        <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>