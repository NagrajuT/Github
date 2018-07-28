@extends('Admin::layouts.adminLayout')

@section('pageheadcontent')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
    @endsection

    @section('pagebodycontent')

    {{--<div class="page-bar">--}}
    {{--<ul class="page-breadcrumb">--}}
    {{--<li>--}}
    {{--<i class="fa fa-home"></i>--}}
    {{--<a href="javascript:;">Home</a>--}}
    {{--<i class="fa fa-angle-right"></i>--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<a href="">Dashboard</a>--}}
    {{--</li>--}}
    {{--</ul>--}}

    {{--</div>--}}
    {{--<!-- END PAGE HEADER-->--}}
    {{--<!-- BEGIN PAGE CONTENT-->--}}
    {{--<div class="row">--}}

    {{--Admin Dashboard =>--}}

    {{--Saurabh here--}}
    {{--</div>--}}




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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div class="visual">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            {{$data->usersCount}}
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
                        <div class="number">
                            {{$data->aCount}}
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
                        <div class="number">
                            {{$data->iCount}}
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
                        <div class="number">
                            {{$data->pCount}}
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
                        <div class="number">
                            {{$data->demoCount}}
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
                        <div class="number">
                            {{$data->paidCount}}

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
                        <div class="number">
                            {{$data->affiliateCount}}
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
                        <div class="number">
                            {{$data->paidAffiliateCount}}
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
                        <div class="number">
                            {{$data->instagramUsersCount}}
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
                        <div class="number">
                            {{$data->duCount}}

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
                        <div class="number">
                            {{$data->puCount}}
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
            {{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
            {{--<div class="dashboard-stat" style="background:#ffd9c0 none repeat scroll 0 0 !important;color:white">--}}
            {{--<div class="dashboard-stat red-pink">--}}
            {{--<div class="visual">--}}
            {{--<i class="fa fa-users"></i>--}}
            {{--</div>--}}
            {{--<div class="details">--}}
            {{--<div class="number">--}}
            {{--{{$data->puCount}}--}}
            {{--</div>--}}
            {{--<div class="desc">--}}
            {{--Total Private Subscribers--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<a class="more yellow-gold"  href="/user/insta/accounts">--}}
            {{--<a class="more" style="background:#ff6501 none repeat scroll 0 0;color:white" href="/user/insta/accounts">--}}
            {{--View more <i class="m-icon-swapright m-icon-white"></i>--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple-plum ">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            {{$data->buCount}}
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
            {{--<div class="col-md-6 col-sm-6">--}}
            {{--<!-- BEGIN PORTLET-->--}}
            {{--<div class="portlet solid bordered grey-cararra">--}}
            {{--<div class="portlet-title">--}}
            {{--<div class="caption">--}}
            {{--<i class="fa fa-bar-chart-o"></i>Site Visits--}}
            {{--</div>--}}
            {{--<div class="actions">--}}
            {{--<div class="btn-group" data-toggle="buttons">--}}
            {{--<label class="btn grey-steel btn-sm active">--}}
            {{--<input type="radio" name="options" class="toggle" id="option1">New</label>--}}
            {{--<label class="btn grey-steel btn-sm">--}}
            {{--<input type="radio" name="options" class="toggle" id="option2">Returning</label>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="portlet-body">--}}
            {{--<div id="site_statistics_loading">--}}
            {{--<img src="/assets/admin/admin/layout/img/loading.gif" alt="loading"/>--}}
            {{--</div>--}}
            {{--<div id="site_statistics_content" class="display-none">--}}
            {{--<div id="site_statistics" class="chart">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<!-- END PORTLET-->--}}
            {{--</div>--}}
            {{--<div class="col-md-6 col-sm-6">--}}
            {{--<!-- BEGIN PORTLET-->--}}
            {{--<div class="portlet solid grey-cararra bordered">--}}
            {{--<div class="portlet-title">--}}
            {{--<div class="caption">--}}
            {{--<i class="fa fa-bullhorn"></i>Revenue--}}
            {{--</div>--}}
            {{--<div class="actions">--}}
            {{--<div class="btn-group pull-right">--}}
            {{--<a href="" class="btn grey-steel btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
            {{--Filter <span class="fa fa-angle-down">--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="dropdown-menu pull-right">--}}
            {{--<li>--}}
            {{--<a href="javascript:;">--}}
            {{--Q1 2014 <span class="label label-sm label-default">--}}
            {{--past </span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="javascript:;">--}}
            {{--Q2 2014 <span class="label label-sm label-default">--}}
            {{--past </span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li class="active">--}}
            {{--<a href="javascript:;">--}}
            {{--Q3 2014 <span class="label label-sm label-success">--}}
            {{--current </span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="javascript:;">--}}
            {{--Q4 2014 <span class="label label-sm label-warning">--}}
            {{--upcoming </span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="portlet-body">--}}
            {{--<div id="site_activities_loading">--}}
            {{--<img src="/assets/admin/admin/layout/img/loading.gif" alt="loading"/>--}}
            {{--</div>--}}
            {{--<div id="site_activities_content" class="display-none">--}}
            {{--<div id="site_activities" style="height: 228px;">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div style="margin: 20px 0 10px 30px">--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-3 col-sm-3 col-xs-6 text-stat">--}}
            {{--<span class="label label-sm label-success">--}}
            {{--Revenue: </span>--}}
            {{--<h3>$13,234</h3>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-3 col-xs-6 text-stat">--}}
            {{--<span class="label label-sm label-info">--}}
            {{--Tax: </span>--}}
            {{--<h3>$134,900</h3>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-3 col-xs-6 text-stat">--}}
            {{--<span class="label label-sm label-danger">--}}
            {{--Shipment: </span>--}}
            {{--<h3>$1,134</h3>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-3 col-xs-6 text-stat">--}}
            {{--<span class="label label-sm label-warning">--}}
            {{--Orders: </span>--}}
            {{--<h3>235090</h3>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<!-- END PORTLET-->--}}
            {{--</div>--}}
        </div>
        <div class="clearfix">
        </div>
    </div>

    <!-- END CONTENT -->




@endsection
@section('pagescripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

    <script src="/assets/admin/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
    <script src="/assets/admin/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        $(document).ready(function(){
            $('.dashboard').addClass('active');
        });
    </script>
@endsection