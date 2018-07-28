@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('active_myAccount','active')

@section('headcontent')

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css"/>

    <link href="/assets/user/css/pricing-table.css" rel="stylesheet" type="text/css"/>

    <style>

        .dataTables_wrapper{
            margin:10px;
        }
        thead{
            color:#000000;
        }
    </style>

@endsection

@section('content')
    {{--PAGE CONTENT GOES HERE--}}

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Payment History Details</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="row col-md-12 col-md-offset-0 table-responsive">

                                <table id="paymentDetails-table"
                                       class="table table-striped table-bordered table-hover dataTables-example"
                                       style="margin-top:2%;">
                                    <thead>
                                    <tr class="bg-info">
                                        <th>#</th>
                                        <th>Transaction Id</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Payment Mode</th>
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
    @endsection

    @section('pagejavascripts')
            <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
    <script src="/assets/user/js/loadingoverlay.js"></script>
    <script src="/assets/user/js/moment.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        $(document).ready(function () {
            $('#paymentDetails-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {'url':'/paymentHistory', data: { userTimezone : jstz.determine().name()},type:'post'},
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'transactionsId', name: 'transactionsId'},
                    {data: 'quantity', name: 'quantity'},
//                    {data: 'refEmail', name: 'refEmail'},
                    {data: 'amount', name: 'amount'},
                    {data: 'status', name: 'status'},
                    {data: 'date', name: 'date'},
                    {data: 'paymentMode', name: 'paymentMode'}
            ]
            });
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $('a[title]').tooltip();
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
    <!-- END PAGE LEVEL PLUGINS -->
@endsection