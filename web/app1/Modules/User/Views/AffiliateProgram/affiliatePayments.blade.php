@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('headcontent')

        <!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/user/css/custom.css" rel="stylesheet" type="text/css" xmlns:margin="http://www.w3.org/1999/xhtml"/>
<link rel="stylesheet" type="text/css" href="/assets/admin/css/toastr.min.css"/>

<style>

    #paypalsubmit {
        display: none;
    }

    #paypalsubmit {
        position: relative;
        transition: .5s ease;
        top: 2px;
        left: 380px;
        right: 250px;
        bottom: 100px;
    }

    .nav-tabs > li a {
        border-radius: 100%;
        height: 21px;
        margin: 20px auto;
        padding: 0;
        text-align: center;
        width: auto;
        color: #333;
        border: none;
    }
</style>
<style>

    a {
        color: #fff;
    }

    .dropdownd dd,
    .dropdownd dt {
        margin: 0px;
        padding: 0px;
    }

    .dropdownd ul {
        margin: -1px 0 0 0;
    }

    .dropdownd dd {
        position: relative;
    }

    .dropdownd a,
    .dropdownd a:visited {
        color: #fff;
        text-decoration: none;
        outline: none;
        font-size: 12px;
    }

    .dropdownd dt a {
        background-color: #444D58;
        display: block;
        padding: 8px 20px 5px 10px;
        min-height: 25px;
        line-height: 24px;
        overflow: hidden;
        border: 0;
        width: 100%;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .dropdownd dt a span,
    .multiSel span {
        cursor: pointer;
        display: inline-block;
        /*padding: 0 3px 2px 0;*/
    }

    .dropdownd dd ul {
        background-color: #444D58;
        border: 0;
        color: #fff;
        display: none;
        left: 0px;
        padding: 2px 15px 2px 5px;
        /*position: absolute;*/
        top: 2px;
        width: 100%;
        list-style: none;
        height: 300px;
        overflow: auto;
    }

    .dropdownd span.value {
        display: none;
    }

    .dropdownd dd ul li a {
        padding: 5px;
        display: block;
    }

    .dropdownd dd ul li a:hover {
        background-color: #fff;
    }

    p.multiSel {
        margin: 3px 0 0;
    }

    input.ddinput {
        float: right;
        margin: 15px 6px 0 0;
    }

    .mutliSelect span {
        float: left;
        margin: 4px 0 0 4px;
    }

    .mutliSelect img {
        float: left;
    }

    .mutliSelect ul li {
        float: left;
        width: 100%;
        border-bottom: 1px solid #2c3540;
        border-top: 1px solid #5c6570;
    }

    .instagram-share .checkbox, .radio {
        margin-top: 10px;
        position: relative;
    }

    .dataTables_filter {
        float: right !important;
    }

    .dataTables_length {
        float: left !important;
    }
</style>

<!-- END PAGE LEVEL STYLES -->
@endsection

@section('active_affiliateProgram','active')

@section('content')
    {{--PAGE CONTENT GOES HERE--}}

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cog fa-2x font-green-sharp" style="color: rgba(111, 86, 9, 0.74)"
                                   aria-hidden="true"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Affiliate Payments</span>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <div class="row">

                                {{--<div class="col-md-3">--}}
                                    {{--<a class="info-tiles tiles-inverse has-footer" href="javascript:;">--}}
                                        {{--<div class="tiles-heading">--}}
                                            {{--<div class="pull-left">Total Referals</div>--}}
                                            {{--<div class="pull-right">--}}
                                                {{--<div id="tileorders" class="sparkline-block">--}}
                                                    {{--<canvas width="39" height="13"--}}
                                                            {{--style="display: inline-block; width: 39px; height: 13px; vertical-align: top;"></canvas>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-body">--}}
                                            {{--<div class="text-center">{{$data['totalRefferedUser']}}</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="tiles-footer">--}}

                                        {{--</div>--}}

                                    {{--</a>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-3">--}}
                                    {{--<a class="info-tiles tiles-green has-footer" href="javascript:;">--}}
                                        {{--<div class="tiles-heading">--}}
                                            {{--<div class="pull-left">Paid Referals</div>--}}
                                            {{--<div class="pull-right">--}}
                                                {{--<div id="tilerevenues" class="sparkline-block">--}}
                                                    {{--<canvas width="40" height="13"--}}
                                                            {{--style="display: inline-block; width: 40px; height: 13px; vertical-align: top;"></canvas>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-body">--}}
                                            {{--<div class="text-center">{{$data['totalPaidUser']}}</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-footer">--}}

                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-3">--}}
                                    {{--<a class="info-tiles tiles-blue has-footer" href="javascript:;">--}}
                                        {{--<div class="tiles-heading">--}}
                                            {{--<div class="pull-left">UnPaid Referals</div>--}}
                                            {{--<div class="pull-right">--}}
                                                {{--<div id="tiletickets" class="sparkline-block">--}}
                                                    {{--<canvas width="13" height="13"--}}
                                                            {{--style="display: inline-block; width: 13px; height: 13px; vertical-align: top;"></canvas>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-body">--}}
                                            {{--<div class="text-center">{{$data['totalUnpaidUser']}}</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-footer">--}}

                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-3">--}}
                                    {{--<a class="info-tiles tiles-midnightblue has-footer" href="javascript:;">--}}
                                        {{--<div class="tiles-heading">--}}
                                            {{--<div class="pull-left">Total Transaction</div>--}}
                                            {{--<div class="pull-right">--}}
                                                {{--<div id="tilemembers" class="sparkline-block">--}}
                                                    {{--<canvas width="39" height="13"--}}
                                                            {{--style="display: inline-block; width: 39px; height: 13px; vertical-align: top;"></canvas>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-body">--}}
                                            {{--<div class="text-center">{{$data['totalSubscriptions']}}</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-footer">--}}

                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            </div>
                            <div class="row">

                                {{--<div class="col-md-4">--}}
                                    {{--<a class="info-tiles tiles-inverse has-footer" href="javascript:;">--}}
                                        {{--<div class="tiles-heading">--}}
                                            {{--<div class="pull-left">Your Ernings by Now</div>--}}
                                            {{--<div class="pull-right">--}}
                                                {{--<div id="tileorders" class="sparkline-block">--}}
                                                    {{--<canvas width="39" height="13"--}}
                                                            {{--style="display: inline-block; width: 39px; height: 13px; vertical-align: top;"></canvas>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-body">--}}
                                            {{--<div class="text-center">{{$data['totalEarningAmount']}} ILS</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-footer">--}}

                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-4">--}}
                                    {{--<a class="info-tiles tiles-magenta has-footer" href="javascript:;">--}}
                                        {{--<div class="tiles-heading">--}}
                                            {{--<div class="pull-left">Pending Balance</div>--}}
                                            {{--<div class="pull-right">--}}
                                                {{--<div id="tilerevenues" class="sparkline-block">--}}
                                                    {{--<canvas width="40" height="13"--}}
                                                            {{--style="display: inline-block; width: 40px; height: 13px; vertical-align: top;"></canvas>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-body">--}}
                                            {{--<div class="text-center">{{$data['totalPendingAmount']}} ILS</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-footer">--}}

                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-4">--}}
                                    {{--<a class="info-tiles tiles-blue has-footer" href="javascript:;">--}}
                                        {{--<div class="tiles-heading">--}}
                                            {{--<div class="pull-left">Current Balance</div>--}}
                                            {{--<div class="pull-right">--}}
                                                {{--<div id="tiletickets" class="sparkline-block">--}}
                                                    {{--<canvas width="13" height="13"--}}
                                                            {{--style="display: inline-block; width: 13px; height: 13px; vertical-align: top;"></canvas>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-body">--}}
                                            {{--<div class="text-center" id="mybalance"--}}
                                                 {{--data-amt="{{$data['balance']}}">{{$data['balance']}} ILS--}}
                                            {{--</div>--}}
                                            {{--<button class="btn btn-success pull-right" id="claimBal"--}}
                                                    {{--style="margin-top:-6%;">Claim--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                        {{--<div class="tiles-footer">--}}
                                            {{--<!--                        <button class="btn btn-info pull-right">Submit</button>-->--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}

                            </div>


                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-bottom: 10px">
                                    <div class="dashboard-stat blue-madison">
                                        <div class="visual">
                                            <i class="fa fa-comments"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                {{$data['totalRefferedUser']}}
                                            </div>
                                            <div class="desc">
                                                Total Referals
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-bottom: 10px">
                                    <div class="dashboard-stat red-intense">
                                        <div class="visual">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                {{$data['totalPaidUser']}}
                                            </div>
                                            <div class="desc">
                                                Paid Referals
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-bottom: 10px">
                                    <div class="dashboard-stat green-haze">
                                        <div class="visual">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                {{$data['totalUnpaidUser']}}
                                            </div>
                                            <div class="desc">
                                                UnPaid Referals
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-bottom: 10px">
                                    <div class="dashboard-stat purple-plum">
                                        <div class="visual">
                                            <i class="fa fa-globe"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                {{$data['totalSubscriptions']}}
                                            </div>
                                            <div class="desc">
                                                Total Transaction
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding-bottom: 10px">
                                    <div class="dashboard-stat blue-madison">
                                        <div class="visual">
                                            <i class="fa fa-comments"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                {{$data['totalEarningAmount']}} ILS
                                            </div>
                                            <div class="desc">
                                                Your Earnings by Now
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding-bottom: 10px">
                                    <div class="dashboard-stat red-intense">
                                        <div class="visual">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                {{$data['totalPendingAmount']}} ILS
                                            </div>
                                            <div class="desc">
                                                Pending Balance
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding-bottom: 10px">

                                    <div class="dashboard-stat green-haze">
                                        <div class="visual">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>


                                        <div class="details" style="width: 86%;">

                                            <div class="text-center number" id="mybalance"
                                                 data-amt="{{$data['balance']}}">

                                                <div>
                                                    <a class="btn btn-warning pull-left" id="claimBal">Claim Amount</a>
                                                </div>
                                                <div>
                                                {{$data['balance']}} ILS
                                                </div>
                                            </div>


                                            <div class="desc">
                                                Current Balance
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>


                            <hr>
                            <div class="row" style="padding:0 15px;">

                                <div class="row col-md-12 col-md-offset-0 table-responsive">

                                    <table id="aff_payments-table"
                                           class="table table-striped table-bordered table-hover dataTables-example"
                                           style="margin-top:2%;">
                                        <thead style="color:black;background-color: #d9edf7">
                                        <tr class="bg-info">
                                            <th>#</th>
                                            <th>Claim Amount</th>
                                            <th>Claim Status</th>
                                            <th>short info</th>
                                            {{--<th>Referal Email</th>--}}
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>






    @endsection

    @section('pagejavascripts')

            <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{--<link rel="stylesheet" charset="utf8" type="text/css" href="/assets/user/css/jquery.dataTables.css"/>--}}
    <script src="/assets/user/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/jstz.min.js"></script>
    <script src="/assets/user/js/clipboard.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('a[title]').tooltip();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#aff_payments-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {'url': '/claim/history', data: {userTimezone: jstz.determine().name()}, type: 'post'},
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'claim_amount', name: 'claim_amount'},
                    {data: 'claim_status', name: 'claim_status'},
                    {data: 'claim_status_message', name: 'claim_status_message'},
//                    {data: 'refEmail', name: 'refEmail'},
                    {data: 'claim_date', name: 'claim_date'},
                    {data: 'claim_time', name: 'claim_time'},
                ]
            });
        });
    </script>


    <script>

        $(document).ready(function () {

            toastr.options = {
                timeOut: 4000,
                extendedTimeOut: 100,
                tapToDismiss: true,
                "preventDuplicates": true,
                "preventOpenDuplicates": true,
                debug: false,
                fadeOut: 10,
                positionClass: "toast-top-right",
                limit: 1
            };
            $(document.body).on('click', '#claimBal', function () {
                var bal = $('#mybalance').attr('data-amt');
                console.log('----------------------------', bal);
                if (bal.trim() == 0) {
                    toastr.warning('you have 0 ILS amount.');
                    return false;
                }
                $.ajax({
                    url: '/claim/affiliate/amount',
                    method: 'post',
                    beforeSend: function () {
                        $('#claimBal').attr('disable', 'true');
                    },
                    complete: function () {
                        $('#claimBal').removeAttr('disable', 'true');

                    },

                    success: function (response) {
                        console.log('response==>', response);
                        if (response.code == 200 && response.status == 'success') {
                            $('#mybalance').attr('data-amt', '0');
                            $('#mybalance').text('0 ILS');
                            toastr.success(response.message);

                        } else if (response.code == 400 && response.status == 'fail') {
                            toastr.warning(response.message);
                            $('.alert-danger').show().find('ul').text('Record Not Deleted');
                        } else {
                            toastr.error('Unexpeted Error has orrured');
                        }
                    }

                });
            });
        });
    </script>

@endsection