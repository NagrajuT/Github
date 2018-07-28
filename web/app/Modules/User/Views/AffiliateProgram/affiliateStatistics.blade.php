@extends('User::layouts.bodyLayout')

@section('active_affiliateProgram','active')

@section("headcontent")

    <link rel="stylesheet" href="/assets/user/css/affiliate.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <style>
        #table-id_length {
            float: left !important;
        }

        #table-id_filter {
            float: right !important;
        }

        #table-ids_length {
            float: left !important;
        }

        #table-ids_filter {
            float: right !important;

        }
    </style>

    @endsection
    @section('content')

    {{--{{dd($msg)}}--}}

            <!-- BEGIN HEADER -->

    <!-- END HEADER MENU -->

    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-area-chart" aria-hidden="true"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Affliated Statistics</span>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <div class="pull-right">
                                <select id="statisticsType">
                                    <option class="graph_type" id="week" value="weekly" selected="selected">Weekly
                                    </option>
                                    <option class="graph_type" id="month" value="monthly">Monthly</option>
                                    <option class="graph_type" id="year" value="yearly">Yearly</option>

                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pull-left">
                                    <div class="col-md-6">

                                        <canvas id="myChart"></canvas>
                                        <!--
                                                                    <canvas id="myChartM" style="display:none;"></canvas>
                                                                    <canvas id="myChartY" style="display:none;"></canvas>
                                        -->
                                        <h3 class="text-center"><b>Users</b></h3>
                                        <center>
                                            <button id="moreStatDetails" class="btn btn-default"
                                                    style="background-color:#33cac2;color:#fff;"
                                                    data-toggle="modal" data-target="#details">Details
                                            </button>
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        <canvas id="myChart1"></canvas>
                                        <h3 class="text-center"><b>Amount</b></h3>
                                        {{--<center>--}}
                                            {{--<button id="checkBalance" class="btn btn-success"--}}
                                                    {{--style="background-color:#33cac2;color:#fff;">Check Balance--}}
                                                {{--<i class=""></i>--}}
                                            {{--</button>--}}
                                        {{--</center>--}}

                                        <center>
                                            <a  href="/affiliatePayments" class="btn btn-success"
                                                style="background-color:#33cac2;color:#fff;">Check Balance
                                                <i class=""></i>
                                            </a>
                                        </center>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>







    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
    <div class="modal fade" id="details" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->


            <div class="modal-content" style="background-color:#EFF3F8;">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center;color:white;">Your Affiliate Users</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="board">
                            <div class="board-inner">

                                <ul class="nav nav-pills" id="myTab" style="margin-left: 29px;">
                                    <li class="active" style="border:none !important;"><a href="#reg"
                                                                                          data-toggle="tab">Registered
                                            Users</a></li>
                                    <li style="border:none !important;"><a href="#sub" data-toggle="tab">Subscribed
                                            Users</a></li>

                                </ul>

                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="reg">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered table-hover dataTables-example"
                                                       id="table-id" style="width: 100% !important;">
                                                    <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Email</th>
                                                        <th>Registration Date</th>
                                                        <th>Registration Time</th>
                                                        <th>status</th>

                                                    </tr>

                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sub">

                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered table-hover dataTables-example"
                                                       id="table-ids" style="width: 100% !important;">
                                                    <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Email</th>
                                                        <th>Subscription Date</th>
                                                        <th>Subscription Time</th>
                                                        <th>Price</th>
                                                        <th>Package Type</th>

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

            </div>

        </div>
    </div>

    @endsection
    @section("pagejavascripts")
            <!-- END PAGE LEVEL SCRIPTS -->

    <script src="/assets/user/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src='/assets/user/js/Chart.min.js'></script>
    <script src='/assets/user/js/bootbox.min.js'></script>
    <script src="/assets/user/js/toastr.min.js"></script>


    <script type="text/javascript">
        var graph_type = null;
        var RegisterDatatableDataObj = null;
        var SubscribeDatatableDataObj = null;

        var loadDataTable = function () {
            setTimeout(function () {
                $('#table-id').DataTable(RegisterDatatableDataObj);
            }, 200)
            setTimeout(function () {
                $('#table-ids').DataTable(SubscribeDatatableDataObj);
            }, 500);


        }
        $(document).ready(function () {
            graph_type = $('#statisticsType').val();
            RegisterDatatableDataObj = {
                "processing": true,
                "serverSide": true,
                "destroy": true,
//                "sPaginationType": "full_numbers",
                "ajax": {
                    url: "/getRegisteredData",
                    type: 'post',
//                    graph_type: graph_type,
                },
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'time', name: 'time'},
                    {data: 'status', name: 'status'}
                ],
//                "language": { // language settings
//                    "lengthMenu": "<span class='seperator'> </span>View _MENU_ records ",
//                    "info": "<span class='seperator'> </span>Found _TOTAL_ total records ",
//                    "infoEmpty": "No records found to show",
//                    "emptyTable": "No registered user found",
//                    "zeroRecords": "No matching records found",
//                    "search": "<i class='fa fa-search'></i>",
//                    "paginate": {
//                        "previous": "Prev",
//                        "next": " Next ",
//                        "last": " Last ",
//                        "first": " First ",
//                        "page": "Page",
//                        "pageOf": "of"
//                    },
//                    "dom": "<'row'<'col-md-4 col-sm-12'<'pull-left'f>><'col-md-8 col-sm-12'<'table-group-actions pull-right'B>>r><'table-scrollable't><'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>", // datatable layout
//                    "pagingType": "bootstrap_extended",
//                    "buttons": [],
//                    "renderer": "bootstrap",
//                    "deferRender": true,
//                    "autoWidth": false, // disable fixed width and enable fluid table
//                    "pageLength": 10, // default records per page
//                }
            }

            SubscribeDatatableDataObj = {
                "processing": true,
                "serverSide": true,
                "destroy": true,
                "ajax": {
                    url: "/getSubscribedData",
                    type: 'post',
//                    graph_type: graph_type,
                },
                "columns": [
                    {data: 'user_id', name: 'user_id'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'time', name: 'time'},
                    {data: 'price', name: 'price'},
                    {data: 'package_type', name: 'package_type'}
                ]
            }


            $(document.body).on('click', '#moreStatDetails', function () {

//                var statType = $('#statisticsType option:selected').val();
//                var statType = $('#statisticsType').val();

//                RegisterDatatableDataObj.ajax=

                loadDataTable();

            });

        });


    </script>

    <script>
        $(document).ready(function () {
            var graph_type;
            graph_type = 'weekly';
            setTimeout(function () {
                $.ajax({
                    url: '/affiliateStatistics',
                    type: 'post',
                    data: {
                        'graph_type': graph_type,
                    },
                    success: function (response) {
                        console.log(response);

//                        response = JSON.parse(response);
                        registered_graph_data = response.registered_graph_data;

                        paid_graph_data = response.paid_graph_data;
                        amount_graph_data = response.amount_graph_data;

                        var elem = document.getElementById('myChart');
                        DrawChart(elem, 'line', 'Performance');

                        var elem1 = document.getElementById('myChart1');
                        DrawChartForAmount(elem1, 'line', 'Performance');
                    }
                })
            }, 1000);

            $(document.body).on('change', '#statisticsType', function (e) {
                console.log('clickeddd')
                e.preventDefault();

                console.log($('#statisticsType').val());
                var url;
                graph_type = $('#statisticsType').val();
                url = "/affiliateStatistics";
                console.log(url);
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        'graph_type': graph_type,
                    },
                    success: function (response) {
                        console.log(response);
//                        response = JSON.parse(response)
                        registered_graph_data = response.registered_graph_data
                        paid_graph_data = response.paid_graph_data
                        amount_graph_data = response.amount_graph_data
                        console.log(paid_graph_data)
                        console.log(registered_graph_data)
                        console.log(amount_graph_data)
                        var elem = document.getElementById('myChart');
                        DrawChart(elem, 'line', 'Performance');
                        console.log('draw chart is called')

                        var elem1 = document.getElementById('myChart1');
                        DrawChartForAmount(elem1, 'line', 'Performance');
                        console.log('trying to call draw chart for amount')
//                        console.log(response);


                    }
                })

            })

            var myChart;
            var myChartAmount;

            function DrawChartForAmount(e, chartType, dataSource) {

                var ctx = e.getContext('2d');

                if (graph_type == 'weekly') {
//                $('#option1 #week').attr('selected','selected')
                    var chartData = GetWeeklyChartDataForAmount(dataSource)
                } else if (graph_type == 'monthly') {
                    var chartData = GetMonthlyChartDataForAmount(dataSource)
                } else if (graph_type == 'yearly') {
                    var chartData = GetYearlyChartDataForAmount(dataSource)
                }
                console.log('qqqqqqqq', myChart);
                if (myChartAmount) {
                    console.log('going to destroy')
                    myChartAmount.destroy();
                }
                myChartAmount = new Chart(ctx, {
                    type: chartType,
                    data: chartData
                });
                console.log('myChart1==>', myChartAmount)
            }

            function DrawChart(e, chartType, dataSource) {

                var ctx = e.getContext('2d');

                if (graph_type == 'weekly') {
//                $('#option1 #week').attr('selected','selected')
                    var chartData = GetWeeklyChartData(dataSource)
                } else if (graph_type == 'monthly') {
                    var chartData = GetMonthlyChartData(dataSource)
                } else if (graph_type == 'yearly') {
                    var chartData = GetYearlyChartData(dataSource)
                }
                console.log('mycrtttt', myChart);
                if (myChart) {
                    console.log('going to destroy')
                    myChart.destroy();
                }
                myChart = new Chart(ctx, {
                    type: chartType,
                    data: chartData
                });
                console.log('myChart==>', myChart)
            }

            function GetWeeklyChartData(type) {
                // This will come from the database

                var data = {
                    labels: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
                    datasets: [{
                        label: 'Registered Users',
                        data: registered_graph_data,
                        backgroundColor: "rgba(0, 102, 204,0.6)"
                    }, {
                        label: 'Subscribed Users',
                        data: paid_graph_data,
                        backgroundColor: "rgba(0, 153, 153,0.6)"
                    }]
                }
                return (data);
            }

            function GetMonthlyChartData(type) {
                // This will come from the database
                var data = {
                    labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                    datasets: [{
                        label: 'Registered Users',
                        data: registered_graph_data,
                        backgroundColor: "rgba(0, 102, 204,0.6)"
                    }, {
                        label: 'Subscribed Users',
                        data: paid_graph_data,
                        backgroundColor: "rgba(0, 153, 153,0.6)"
                    }]
                }
                return (data);
            }

            function GetYearlyChartData(type) {
                // This will come from the database
                var data = {
                    labels: ['2015', '2016', '2017'],
                    datasets: [{
                        label: 'Registered Users',
                        data: registered_graph_data,
                        backgroundColor: "rgba(0, 102, 204,0.6)"
                    }, {
                        label: 'Subscribed Users',
                        data: paid_graph_data,
                        backgroundColor: "rgba(0, 153, 153,0.6)"
                    }]
                }

                return (data);
            }

            function GetWeeklyChartDataForAmount() {
                var data = {
                    labels: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
                    datasets: [{
                        label: 'Amount',
                        data: amount_graph_data,
                        backgroundColor: "rgba(50, 190, 193,0.6)"
                    }]
                }
                return (data);
            }

            function GetMonthlyChartDataForAmount() {
                var data = {
                    labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                    datasets: [{
                        label: 'Amount',
                        data: amount_graph_data,
                        backgroundColor: "rgba(50, 190, 193,0.6)"
                    }]
                }
                return (data);
            }

            function GetYearlyChartDataForAmount() {
                var data = {
                    labels: ['2015', '2016', '2017'],
                    datasets: [{
                        label: 'Amount',
                        data: amount_graph_data,
                        backgroundColor: "rgba(50, 190, 193,0.6)"
                    }]
                }

                return (data);
            }


        });

    </script>

    <script>
        toastr.options = {
            timeOut: 2000,
            extendedTimeOut: 100,
            tapToDismiss: true,
            debug: false,
            fadeOut: 10,
            positionClass: "toast-top-center",
            limit: 1
        };
        $(document).ready(function () {

            $(document.body).on('click', '#checkBalance', function () {
                console.log('checking your balance, please wait.....')
                $('#stopAmountLoader').remove();

                $('#checkBalance i').attr('class', 'fa fa-refresh fa-spin');
                $('#checkBalance').html('Loading...');
                $('#checkBalance').attr('disabled',true);
                $.ajax({
                    url: '/balanceCheck',
                    type: 'post',
                    success: function (response) {

                        if(response.code==200){

                            var balance=response.data;
                            var totalRegistered = balance.totalRegistered;
                            var totalSubscribed = balance.totalSubscribed;
                            var myBalance = balance.myBalance;

                            var htmlData = 'Total registered User:' + '<b>' + totalRegistered + '</b>' +
                                    '<br>Total Subscribed User:' + '<b>' + totalSubscribed + '</b>' +
                                    '<br>My Total Balance(NIS):' + '<b>' + myBalance + '</b>';

                            $('#checkBalance i').attr('class', '');
                            $('#checkBalance').html('Check Balance');
                            $('#checkBalance').attr('disabled',false);

                            bootbox.confirm({
                                title: "Affiliate Balance",
                                message: htmlData,
                                size: 'small',
                                buttons: {
                                    cancel: {
                                        label: '<i class="fa fa-times"></i> Cancel'
                                    },
                                    confirm: {
                                        label: '<i class="fa fa-check"></i> View Details'
                                    }
                                },
                                callback: function (result) {
                                    if(result){
                                        $('#moreStatDetails').click();
                                        $(this).hide();
                                        $('#myTab li').eq(1).find('a').click();
                                    }
                                }
                            });

                        }else if(response.code==400){
                            $('#checkBalance i').attr('class', '');
                            $('#checkBalance').html('Check Balance');
                            $('#checkBalance').attr('disabled',false);
                            toastr.error('Unable to Fetch your Balance, Please try after some time')

                        }else{
                            $('#checkBalance i').attr('class', '');
                            $('#checkBalance').html('Check Balance');
                            $('#checkBalance').attr('disabled',false);
                            toastr.error('failed to fetch your balance')
                        }

                        console.log('response===>',response)

                    },
                    error: function (error) {
                        console.log('error----->', error)
                    }
                })
            })

        })
    </script>

@endsection