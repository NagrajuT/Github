@extends('Admin::layouts.adminLayout')
@section('pageheadcontent')
    <link href="/assets/admin/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
    <link href="/assets/admin/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
    <link href="/assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/toastr.min.css"/>
    <style>

        .paddin0 {
            padding: 0;;
        }

        #addAllDetails {
            margin: -17px 0 5px 16px;
        }

        .input-icon .error {
            color: red;
            border-color: red;
        }

        .help-block {
            color: red;
        }

        .pagination-panel-input {
            padding: 0px !important;
        }
    </style>
    <style>
        .error-msg {
            color: red;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .8) url('<?php echo env('WEB_URL')?>/assets/admin/js/loading.gif') 50% 50% no-repeat;
        }

        /* When the body has the loading class, we turn
           the scrollbar off with overflow:hidden */
        body.loading {
            overflow: hidden;
        }

        /* Anytime the body has the loading class, our
           modal element will be visible */
        body.loading .modal {
            display: block;
        }

    </style>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: none;
            text-align: left;
            padding: 3px;
        }

        tr:nth-child(even) {

        }

        .wrapper1, .wrapper2 {
            width: 300px;
            overflow-x: scroll;
            overflow-y: hidden;
        }

        .wrapper1 {
            height: 20px;
        }

        .wrapper2 {
            height: 200px;
        }

        .div1 {
            width: 1000px;
            height: 20px;
        }

        .div2 {
            width: 1000px;
            height: 200px;
            background-color: #88FF88;
            overflow: auto;
        }

        .table-scrollable {
            max-height: 330px;
            overflow-x: auto;
            width: 100%;
        }
    </style>


@endsection

@section('pagebodycontent')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Users Payment Details
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="javascript:;">Manage Payments</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:;">Payment History</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">

                <!-- Begin: life time stats -->
                <div class="portlet light">
                    {{--<div class="portlet-title">--}}
                    {{--<div class="caption">--}}
                    {{--<i class="fa fa-shopping-cart"></i>Account Listing--}}
                    {{--</div>--}}
                    {{--</div>--}}


                    <div class="portlet-body">
                        <div style="display: none;"
                             class="alert alert-danger display-hide">
                            <button class="close"
                                    data-close="alert"></button>
                            <ul></ul>
                        </div>
                        <div style="display: none;"
                             class="alert alert-success display-hide">
                            <button class="close"
                                    data-close="alert"></button>
                            <ul></ul>
                        </div>
                        <div class="table-container">
                            <!--<div class="table-actions-wrapper">
                                <span>
                                </span>
                                <select class="table-group-action-input form-control input-inline input-small input-sm">
                                    <option value="">Select...</option>
                                    <option value="Cancel">Cancel</option>
                                    <option value="Cancel">Hold</option>
                                    <option value="Cancel">On Hold</option>
                                    <option value="Close">Close</option>
                                </select>
                                <button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
                            </div> -->


                            <table class="table table-striped table-bordered table-hover"
                                   id="datatable_payment_history">
                                <thead>
                                <tr role="row" class="heading">

                                    <th width="10%">
                                        ID&nbsp;#
                                    </th>
                                    <th width="10%">
                                        Trnsaction Id
                                    </th>

                                    {{--<th width="10%">--}}
                                        {{--Payer Paypal Email--}}
                                    {{--</th>--}}
                                    <th width="10%">
                                        Smartffic Email
                                    </th>

                                    <th width="5%">
                                        Qunatity
                                    </th>

                                    <th width="10%">
                                        Amount
                                    </th>

                                    <th width="15%">
                                        Date
                                    </th>
                                    <th width="20%">
                                        Status
                                    </th>
                                    <th width="10%">
                                        Payment Type
                                    </th>
                                    <th width="15%">
                                        Payment Mode
                                    </th>
                                    <th width="15%">
                                        Actions
                                    </th>
                                </tr>
                                <tr role="row" class="filter">
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="id">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="t_id">
                                    </td>

                                    {{--<td>--}}
                                        {{--<input type="text" class="form-control form-filter input-sm" name="p_email">--}}
                                    {{--</td>--}}
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="i_email">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="quantity">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="amount">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="date">
                                    </td>
                                    <td>
                                        <select name="status" class="form-control form-filter input-sm">
                                            <option value="">select...</option>
                                            <option value="C">Created</option>
                                            <option value="S">Success</option>
                                            <option value="P">Pending</option>
                                            <option value="F">Failed</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="p_type" class="form-control form-filter input-sm">
                                            <option value="">select...</option>
                                            <option value="DR">Direct Payment</option>
                                            <option value="RR">Reffered Payment</option>
                                        </select>
                                    </td>

                                    <td></td>
                                    {{--<td>--}}
                                    {{--<input type="text" class="form-control form-filter input-sm" name="status">--}}
                                    {{--</td>--}}

                                    <td>
                                        <div class="margin-bottom-5" style="display: inline;">
                                            <button class="btn btn-sm yellow filter-submit margin-bottom"
                                                    title="search">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <button class="btn btn-sm filter-cancel" title="reset"><i
                                                        class="fa fa-refresh"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>
        <!-- END PAGE CONTENT-->


        <div class="modal"><!— this is for loading image —></div>
    </div>

    <div class="modal fade" id="PaymentDetailsModal" style="z-index: 999999 !important;" role="dialog">

        <div class="modal-dialog">

            <!— Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:white;">
                        TRANSACTION DETAILS</h4>
                </div>


                <div class="modal-body" id="transaction_modal">
                    No details Found
                </div>

                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Cancel</button>
                    {{--<button type="button" class="btn btn-info" id="editCommentsModalBtn">Save</button>--}}
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="close">OK</button>
                </div>

            </div>

        </div>
    </div>



@endsection
@section('pagescripts')
    <script src="/assets/admin/js/loadingoverlay.js"></script>
    <script src="/assets/admin/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script src="/assets/admin/global/scripts/datatable.js"></script>
    <script src="/assets/admin/admin/pages/scripts/ui-confirmations.js"></script>
    <script src="/assets/admin/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js"></script>
    <script src="/assets/admin/js/jstz.min.js"></script>




    <script>

        jQuery(document).ready(function () {
//            Metronic.init(); // init metronic core components
//            Layout.init(); // init current layout
//            QuickSidebar.init(); // init quick sidebar
//            Demo.init(); // init demo features
            EcommerceOrders.init();
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
            $('.pay_his').addClass('active');
            $('.pay_his .arrow').addClass('open');
            $('.pay_history').addClass('active');
        });
    </script>
    <script>
        var EcommerceOrders = function () {
            var id, username, date;


            var handleOrders = function () {

                $(document.body).on('click', '.filter-submit', function () {
                    console.log('-----------------------------------------', id);
                    id = $(".filter input[name='id']").val();
                    username = $(".filter input[name='username']").val();
                    date = $(".filter input[name='date']").val();
                });
                var grid = new Datatable();

                grid.init({
                    src: $("#datatable_payment_history"),
                    onSuccess: function (grid) {
                        // execute some code after table records loaded
                    },
                    onError: function (grid) {
                        // execute some code on network or other general error
                    },
                    loadingMessage: 'Loading...',
                    dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options
                        // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                        // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js).
                        // So when dropdowns used the scrollable div should be removed.
                        //"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

                        "lengthMenu": [
                            [5, 10, 20, 50, 100, 150, -1],
                            [5, 10, 20, 50, 100, 150, "All"] // change per page values here
                        ],
                        "pageLength": 5, // default record count per page
                        "ajax": {
                            "url": "/users/payment/history",
//                            "data":{
//                                userTimezone : jstz.determine().name(),
////                                id:id,
//                                id:'111111111111111111111111111111111111111111111111',
//                                username:username,
//                                date:date,
//
//                            }
//                            "dataSrc": "demo"
//                            "data": { userTimezone : jstz.determine().name()},// ajax source
                        },
                        "columnDefs": [
                            {orderable: true, targets: 0},
                            {orderable: false, targets: 8},
                            {orderable: false, targets: 9}
                        ],
                        "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                        "order": [
                            [0, "desc"]
                        ] // set first column as a default sort by asc
                    }
                });
            }

            return {
                //main function to initiate the module
                init: function () {
                    handleOrders();
                }

            };
        }();
    </script>


    <script>


        $(document).ready(function () {


            $(document.body).on('click', '.viewMore', function () {
                var viewId = $(this).attr('data-id');
                console.log(viewId);

                $.ajax({
                    url: '/get/payment/list/info',
                    type: 'post',
                    data: {
                        viewId: viewId
                    },
                    beforeSend: function () {

                        $("body").addClass("loading");
                    },
                    complete: function () {
                        $("body").removeClass("loading");
//
                    },

                    success: function (response) {

                        if (response.length == 0) {
                            alert('details not found');
                            return false;
                        }
//                        else {
//                            var transactionModel = '<div class="col-md-12"> <h3> Basic Transaction Details </h3> ' +
//                                    '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">PayKey</div> <div class="col-md-6 paddin0">' + response.payKey + '</div> </div>' +
//                                    ' <tr> <td>Sender Email</td> <td>' + response.senderEmail + '</td> </tr> ' +
//                                    '<tr> <td>STATUS</td> <td>' + response.status + '</td> </tr> ' +
//                                    '</div> ';
//                            if (typeof response.transactionId != 'undefined') {
//                                transactionModel += '<div> <h3> Admin Receiver </h3> ' +
//                                        '<tr> <td>Transaction Id</td> <td>' + response.transactionId + '</td> </tr> ' +
//                                        '<tr> <td>Transaction Status</td> <td>' + response.transactionStatus + '</td> </tr> ' +
//                                        '<tr> <td>Sender Transaction Id</td> <td>' + response.senderTransactionId + '</td> </tr>' +
//                                        ' <tr> <td>Sender Transaction Status</td> <td>' + response.senderTransactionStatus + '</td> </tr> ' +
//                                        '<tr> <td>Receiver Amount</td> <td>' + response.receiverAmount + '</td> </tr> ' +
//                                        '<tr> <td>Receiver Email</td> <td>' + response.receiverEmail + '</td> </tr>' +
//                                        '</div>';
//                            }
//                            if (typeof response.aff_transactionId != 'undefined') {
//                                transactionModel += ' <table> <h3> Affiliate Receiver </h3> ' +
//                                        '<tr> <td>Transaction Id</td> <td>' + response.aff_transactionId + '</td> </tr> ' +
//                                        '<tr> <td>Transaction Status</td> <td>' + response.aff_transactionStatus + '</td> </tr>' +
//                                        ' <tr> <td>Sender Transaction Id</td> <td>' + response.aff_senderTransactionId + '</td> </tr>' +
//                                        ' <tr> <td>Sender Transaction Status</td> <td>' + response.aff_senderTransactionStatus + '</td> </tr> ' +
//                                        '<tr> <td>Receiver Amount</td> <td>' + response.aff_receiverAmount + '</td> </tr> ' +
//                                        '<tr> <td>Receiver Email</td> <td>' + response.aff_receiverEmail + '</td> </tr>' +
//                                        ' </table>';
//                            }
//
//                            $('#transaction_modal').html(transactionModel);
//                            $('#PaymentDetailsModal').modal('show');
//                        }
                        else {

                            var transactionModel = '<div style="padding: 0px 30px;" class="row"><div class="col-md-12"> <h3> Basic Transaction Details </h3> ' +
                                    '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">PayKey</div> <div class="col-md-6 paddin0">' + response.payKey + '</div> </div>' +
                                    '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Sender Email</div> <div class="col-md-6 paddin0">' + response.senderEmail + '</div> </div>' +
                                    '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">STATUS</div> <div class="col-md-6 paddin0">' + response.status + '</div> </div>' +
                                    '</div> ';
                            if (typeof response.transactionId != 'undefined') {
                                transactionModel += '<div class="col-md-12"> <h3> Admin Receiver </h3> ' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Transaction Id</div> <div class="col-md-6 paddin0">' + response.transactionId + '</div> </div>' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Transaction Status</div> <div class="col-md-6 paddin0">' + response.transactionStatus + '</div> </div>' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Sender Transaction Id</div> <div class="col-md-6 paddin0">' + response.senderTransactionId + '</div> </div>' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Sender Transaction Status</div> <div class="col-md-6 paddin0">' + response.senderTransactionStatus + '</div> </div>' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Receiver Amount</div> <div class="col-md-6 paddin0">' + response.receiverAmount + '</div> </div>' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Receiver Email</div> <div class="col-md-6 paddin0">' + response.receiverEmail + '</div> </div>' +
                                        '</div> ';

                            }
                            if (typeof response.aff_transactionId != 'undefined') {
                                transactionModel += ' <div class="col-md-12"><h3> Affiliate Receiver </h3> ' +

                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Transaction Id</div> <div class="col-md-6 paddin0">' + response.aff_transactionId + '</div> </div>' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Transaction Status</div> <div class="col-md-6 paddin0">' + response.aff_transactionStatus + '</div> </div>' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Sender Transaction Id</div> <div class="col-md-6 paddin0">' + response.aff_senderTransactionId + '</div> </div>' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Sender Transaction Status</div> <div class="col-md-6 paddin0">' + response.aff_senderTransactionStatus + '</div> </div>' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Receiver Amount</div> <div class="col-md-6 paddin0">' + response.aff_receiverAmount + '</div> </div>' +
                                        '<div class="col-md-12 paddin0"> <div class="col-md-6 paddin0">Receiver Email</div> <div class="col-md-6 paddin0">' + response.aff_receiverEmail + '</div> </div>' +
                                        '</div> ';

                            }

                            transactionModel += '</div>';
                            $('#transaction_modal').html(transactionModel);
                            $('#PaymentDetailsModal').modal('show');
                        }


                    }
                });
            })
            $(document.body).on('click', '.delete_acc', function () {

                var currObj = $(this);
                var removeId = $(this).attr('data-id');
                console.log(removeId);
                var conf = confirm('Are you sure to delete this Account');
                if (!conf) {
                    return false;
                }
                $.ajax({
                    url: '/remove/insta/account',
                    type: 'post',
                    data: {
                        removeId: removeId
                    },
                    beforeSend: function () {
                        $('.alert-danger').hide();
                        $('.alert-success').hide();
                        $("body").addClass("loading");
                    },
                    complete: function () {
                        $("body").removeClass("loading");
//
                    },

                    success: function (response) {
                        if (response == 1) {

                            currObj.parents('tr').remove();
                            $('.alert-success').show().find('ul').text('Record Deleted Successfully');

                        } else {

                            $('.alert-danger').show().find('ul').text('Record Not Deleted');
                        }
                    }

                });
            })
        })
    </script>
@endsection