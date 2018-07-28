

<?php $__env->startSection('pageheadcontent'); ?>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagebodycontent'); ?>

    <?php /*<div class="page-bar">*/ ?>
        <?php /*<ul class="page-breadcrumb">*/ ?>
            <?php /*<li>*/ ?>
                <?php /*<i class="fa fa-home"></i>*/ ?>
                <?php /*<a href="javascript:;">Home</a>*/ ?>
                <?php /*<i class="fa fa-angle-right"></i>*/ ?>
            <?php /*</li>*/ ?>
            <?php /*<li>*/ ?>
                <?php /*<a href="">Dashboard</a>*/ ?>
            <?php /*</li>*/ ?>
        <?php /*</ul>*/ ?>

    <?php /*</div>*/ ?>
    <?php /*<!-- END PAGE HEADER-->*/ ?>
    <?php /*<!-- BEGIN PAGE CONTENT-->*/ ?>
    <?php /*<div class="row">*/ ?>

        <?php /*Admin Dashboard =>*/ ?>

        <?php /*Saurabh here*/ ?>
    <?php /*</div>*/ ?>




    <!-- BEGIN CONTENT -->

        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- END STYLE CUSTOMIZER -->
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                Dashboard <small>reports & statistics</small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="javascript:;">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:;">Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS -->
            <div class="row">

                <?php /*<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">*/ ?>
                    <?php /*<div class="dashboard-stat2 bordered">*/ ?>
                        <?php /*<div class="display">*/ ?>
                            <?php /*<div class="number">*/ ?>
                                <?php /*<h3 class="font-green-sharp">*/ ?>
                                    <?php /*<span class="counter" data-value="7800" data-counter="counterup">7800</span>*/ ?>
                                    <?php /*<small class="font-green-sharp">$</small>*/ ?>
                                <?php /*</h3>*/ ?>
                                <?php /*<small>TOTAL PROFIT</small>*/ ?>
                            <?php /*</div>*/ ?>
                            <?php /*<div class="icon">*/ ?>
                                <?php /*<i class="icon-pie-chart"></i>*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<div class="progress-info">*/ ?>
                            <?php /*<div class="progress">*/ ?>
                                        <?php /*<span class="progress-bar progress-bar-success green-sharp" style="width: 76%;">*/ ?>
                                            <?php /*<span class="sr-only">76% progress</span>*/ ?>
                                        <?php /*</span>*/ ?>
                            <?php /*</div>*/ ?>
                            <?php /*<div class="status">*/ ?>
                                <?php /*<div class="status-title"> progress </div>*/ ?>
                                <?php /*<div class="status-number"> 76% </div>*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                    <?php /*</div>*/ ?>
                <?php /*</div>*/ ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
                        <div class="visual">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="details">
                            <div class="number counter" data-value="<?php echo e($data->usersCount); ?>" data-counter="counterup">
                                <?php echo e($data->usersCount); ?>

                            </div>
                            <div class="desc">
                                Total Users
                            </div>
                        </div>
                        <a class="more" href="/show/users">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green-haze">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">

                            <div class="number counter" data-value="<?php echo e($data->aCount); ?>" data-counter="counterup">
                                <?php echo e($data->aCount); ?>

                            </div>
                            <div class="desc">
                                Total Active Users
                            </div>
                        </div>
                        <a class="more" href="/show/users">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red-intense">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">

                            <div class="number counter" data-value="<?php echo e($data->iCount); ?>" data-counter="counterup">
                                <?php echo e($data->iCount); ?>

                            </div>
                            <div class="desc">
                                Total Inactive Users
                            </div>
                        </div>
                        <a class="more" href="/show/users">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number counter" data-value=" <?php echo e($data->pCount); ?>" data-counter="counterup">
                                <?php echo e($data->pCount); ?>

                            </div>
                            <div class="desc">
                                Total Pending Users
                            </div>
                        </div>
                        <a class="more" href="/get/pending/users">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END DASHBOARD STATS -->
            <div class="clearfix">
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green-haze">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">

                            <div class="number counter" data-value=" <?php echo e($data->demoCount); ?>" data-counter="counterup">
                                <?php echo e($data->demoCount); ?>

                            </div>
                            <div class="desc">
                                Total Demo Users
                            </div>
                        </div>
                        <a class="more" href="#">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">

                            <div class="number counter" data-value="<?php echo e($data->paidCount); ?>" data-counter="counterup">
                                <?php echo e($data->paidCount); ?>

                            </div>
                            <div class="desc">
                                Total Paid users
                            </div>
                        </div>
                        <a class="more" href="#">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
                        <div class="visual">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="details">
                            <div class="number counter" data-value="  <?php echo e($data->affiliateCount); ?>" data-counter="counterup">
                                <?php echo e($data->affiliateCount); ?>

                            </div>
                            <div class="desc">
                                Total Affiliated Users
                            </div>
                        </div>
                        <a class="more" href="/show/affiliate/user">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red-intense">
                        <div class="visual">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="details">

                            <div class="number counter" data-value="  <?php echo e($data->paidAffiliateCount); ?>" data-counter="counterup">
                                <?php echo e($data->paidAffiliateCount); ?>

                            </div>
                            <div class="desc">
                                Total subscribed Affiliated Users
                            </div>
                        </div>
                        <a class="more" href="/show/affiliate/user">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red-intense">
                        <div class="visual">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="details">
                            <div class="number counter" data-value="  <?php echo e($data->instagramUsersCount); ?>" data-counter="counterup">
                                <?php echo e($data->instagramUsersCount); ?>

                            </div>
                            <div class="desc">
                                Total Instagram Accounts
                            </div>
                        </div>
                        <a class="more" href="/user/insta/accounts">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green-jungle">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number counter" data-value="  <?php echo e($data->duCount); ?>" data-counter="counterup">
                                <?php echo e($data->duCount); ?>

                            </div>
                            <div class="desc">
                                Total Demo Subscribers
                            </div>
                        </div>
                        <a class="more" href="/user/insta/accounts">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat yellow-casablanca ">
                        <div class="visual">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="details">

                            <div class="number counter" data-value="  <?php echo e($data->puCount); ?>" data-counter="counterup">
                                <?php echo e($data->puCount); ?>

                            </div>
                            <div class="desc">
                                Total Private Subscribers
                            </div>
                        </div>
                        <a class="more" href="/user/insta/accounts">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <?php /*<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">*/ ?>
                    <?php /*<div class="dashboard-stat" style="background:#ffd9c0 none repeat scroll 0 0 !important;color:white">*/ ?>
                    <?php /*<div class="dashboard-stat red-pink">*/ ?>
                        <?php /*<div class="visual">*/ ?>
                            <?php /*<i class="fa fa-users"></i>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<div class="details">*/ ?>
                            <?php /*<div class="number">*/ ?>
                                <?php /*<?php echo e($data->puCount); ?>*/ ?>
                            <?php /*</div>*/ ?>
                            <?php /*<div class="desc">*/ ?>
                                <?php /*Total Private Subscribers*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<a class="more yellow-gold"  href="/user/insta/accounts">*/ ?>
                        <?php /*<a class="more" style="background:#ff6501 none repeat scroll 0 0;color:white" href="/user/insta/accounts">*/ ?>
                            <?php /*View more <i class="m-icon-swapright m-icon-white"></i>*/ ?>
                        <?php /*</a>*/ ?>
                    <?php /*</div>*/ ?>
                <?php /*</div>*/ ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum ">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number counter" data-value="  <?php echo e($data->buCount); ?>" data-counter="counterup">
                                <?php echo e($data->buCount); ?>

                            </div>
                            <div class="desc">
                                Total Business Subscribers
                            </div>
                        </div>
                        <a class="more" href="/user/insta/accounts">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="clearfix">
            </div>
            <div class="row">
                <?php /*<div class="col-md-6 col-sm-6">*/ ?>
                    <?php /*<!-- BEGIN PORTLET-->*/ ?>
                    <?php /*<div class="portlet solid bordered grey-cararra">*/ ?>
                        <?php /*<div class="portlet-title">*/ ?>
                            <?php /*<div class="caption">*/ ?>
                                <?php /*<i class="fa fa-bar-chart-o"></i>Site Visits*/ ?>
                            <?php /*</div>*/ ?>
                            <?php /*<div class="actions">*/ ?>
                                <?php /*<div class="btn-group" data-toggle="buttons">*/ ?>
                                    <?php /*<label class="btn grey-steel btn-sm active">*/ ?>
                                        <?php /*<input type="radio" name="options" class="toggle" id="option1">New</label>*/ ?>
                                    <?php /*<label class="btn grey-steel btn-sm">*/ ?>
                                        <?php /*<input type="radio" name="options" class="toggle" id="option2">Returning</label>*/ ?>
                                <?php /*</div>*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<div class="portlet-body">*/ ?>
                            <?php /*<div id="site_statistics_loading">*/ ?>
                                <?php /*<img src="/assets/admin/admin/layout/img/loading.gif" alt="loading"/>*/ ?>
                            <?php /*</div>*/ ?>
                            <?php /*<div id="site_statistics_content" class="display-none">*/ ?>
                                <?php /*<div id="site_statistics" class="chart">*/ ?>
                                <?php /*</div>*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                    <?php /*</div>*/ ?>
                    <?php /*<!-- END PORTLET-->*/ ?>
                <?php /*</div>*/ ?>
                <?php /*<div class="col-md-6 col-sm-6">*/ ?>
                    <?php /*<!-- BEGIN PORTLET-->*/ ?>
                    <?php /*<div class="portlet solid grey-cararra bordered">*/ ?>
                        <?php /*<div class="portlet-title">*/ ?>
                            <?php /*<div class="caption">*/ ?>
                                <?php /*<i class="fa fa-bullhorn"></i>Revenue*/ ?>
                            <?php /*</div>*/ ?>
                            <?php /*<div class="actions">*/ ?>
                                <?php /*<div class="btn-group pull-right">*/ ?>
                                    <?php /*<a href="" class="btn grey-steel btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">*/ ?>
                                        <?php /*Filter <span class="fa fa-angle-down">*/ ?>
									<?php /*</span>*/ ?>
                                    <?php /*</a>*/ ?>
                                    <?php /*<ul class="dropdown-menu pull-right">*/ ?>
                                        <?php /*<li>*/ ?>
                                            <?php /*<a href="javascript:;">*/ ?>
                                                <?php /*Q1 2014 <span class="label label-sm label-default">*/ ?>
											<?php /*past </span>*/ ?>
                                            <?php /*</a>*/ ?>
                                        <?php /*</li>*/ ?>
                                        <?php /*<li>*/ ?>
                                            <?php /*<a href="javascript:;">*/ ?>
                                                <?php /*Q2 2014 <span class="label label-sm label-default">*/ ?>
											<?php /*past </span>*/ ?>
                                            <?php /*</a>*/ ?>
                                        <?php /*</li>*/ ?>
                                        <?php /*<li class="active">*/ ?>
                                            <?php /*<a href="javascript:;">*/ ?>
                                                <?php /*Q3 2014 <span class="label label-sm label-success">*/ ?>
											<?php /*current </span>*/ ?>
                                            <?php /*</a>*/ ?>
                                        <?php /*</li>*/ ?>
                                        <?php /*<li>*/ ?>
                                            <?php /*<a href="javascript:;">*/ ?>
                                                <?php /*Q4 2014 <span class="label label-sm label-warning">*/ ?>
											<?php /*upcoming </span>*/ ?>
                                            <?php /*</a>*/ ?>
                                        <?php /*</li>*/ ?>
                                    <?php /*</ul>*/ ?>
                                <?php /*</div>*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                        <?php /*<div class="portlet-body">*/ ?>
                            <?php /*<div id="site_activities_loading">*/ ?>
                                <?php /*<img src="/assets/admin/admin/layout/img/loading.gif" alt="loading"/>*/ ?>
                            <?php /*</div>*/ ?>
                            <?php /*<div id="site_activities_content" class="display-none">*/ ?>
                                <?php /*<div id="site_activities" style="height: 228px;">*/ ?>
                                <?php /*</div>*/ ?>
                            <?php /*</div>*/ ?>
                            <?php /*<div style="margin: 20px 0 10px 30px">*/ ?>
                                <?php /*<div class="row">*/ ?>
                                    <?php /*<div class="col-md-3 col-sm-3 col-xs-6 text-stat">*/ ?>
										<?php /*<span class="label label-sm label-success">*/ ?>
										<?php /*Revenue: </span>*/ ?>
                                        <?php /*<h3>$13,234</h3>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col-md-3 col-sm-3 col-xs-6 text-stat">*/ ?>
										<?php /*<span class="label label-sm label-info">*/ ?>
										<?php /*Tax: </span>*/ ?>
                                        <?php /*<h3>$134,900</h3>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col-md-3 col-sm-3 col-xs-6 text-stat">*/ ?>
										<?php /*<span class="label label-sm label-danger">*/ ?>
										<?php /*Shipment: </span>*/ ?>
                                        <?php /*<h3>$1,134</h3>*/ ?>
                                    <?php /*</div>*/ ?>
                                    <?php /*<div class="col-md-3 col-sm-3 col-xs-6 text-stat">*/ ?>
										<?php /*<span class="label label-sm label-warning">*/ ?>
										<?php /*Orders: </span>*/ ?>
                                        <?php /*<h3>235090</h3>*/ ?>
                                    <?php /*</div>*/ ?>
                                <?php /*</div>*/ ?>
                            <?php /*</div>*/ ?>
                        <?php /*</div>*/ ?>
                    <?php /*</div>*/ ?>
                    <?php /*<!-- END PORTLET-->*/ ?>
                <?php /*</div>*/ ?>
            </div>
            <div class="clearfix">
            </div>
        </div>

    <!-- END CONTENT -->




<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagescripts'); ?>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

    <script src="/assets/admin/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
    <script src="/assets/admin/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="/assets/admin/js/waypoints.min.js" type="text/javascript"></script>
    <script src="/assets/admin/js/counterup.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        $(document).ready(function(){
            $('.dashboard').addClass('active');

            $('.counter').counterUp({
                delay: 100, //delay per number up
                time: 2000 ,//total animation delay
//                offset: 70,
                beginAt: 0,
                formatter: function (n) {
                    return n.replace(/,/g, '.');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin::layouts.adminLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>