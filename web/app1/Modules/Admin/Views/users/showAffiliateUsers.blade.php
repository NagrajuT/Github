@extends('Admin::layouts.adminLayout')
@section('pageheadcontent')
    <link rel="stylesheet" type="text/css" href="/assets/admin/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
    <link rel="stylesheet" href="/assets/user/css/user-panel.css">
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <style>
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
        .pagination-panel-input{
            padding:0px !important;
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
            padding: 10px;
        }

        tr:nth-child(even) {

        }
    </style>


@endsection

@section('pagebodycontent')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            All Affiliate Users
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="javascript:;">Manage Users</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:;">Affiliate Users</a>
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
                            {{--<i class="fa fa-shopping-cart"></i>Pending Users--}}
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
                            <table class="table table-striped table-bordered table-hover" id="datatable_affiliate_users">
                                <thead>
                                <tr role="row" class="heading">

                                    <th width="15%">
                                        ID&nbsp;#
                                    </th>
                                    <th width="20%">
                                        Email
                                    </th>
                                    <th width="15%">
                                        Registration Date
                                    </th>
                                    <th width="15%">
                                        Status
                                    </th>
                                    <th width="15%">
                                        subscription type
                                    </th>

                                    <th width="30%">
                                        Actions
                                    </th>
                                </tr>
                                <tr role="row" class="filter">
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="id">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="email">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="reg_date">
                                    </td>

                                    <td>
                                        <select name="status" class="form-control form-filter input-sm">
                                        <option value="">select...</option>
                                        <option value="A">Active</option>
                                        <option value="I">Inactive</option>
                                            <option value="D">Deleted</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="sub_type" class="form-control form-filter input-sm">
                                            <option value="">select...</option>
                                            <option value="PU">Paid User</option>
                                            <option value="DU">Demo user</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="margin-bottom-5">
                                            <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
                                            <button class="btn btn-sm filter-cancel"><i class="fa fa-refresh"></i> Reset</button>
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
    <div class="modal fade" id="AffliateDetailsModal" role="dialog">
        <div class="modal-dialog">

            <!— Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:white;">
                       AFFILIATE DETAILS</h4>
                </div>
                <div class="modal-body">
                    <div class="portlet-body form">
                        <table>
                            <tr>
                                <td>User's Affiliate Link</td>
                                <td id="aff_link"></td>
                            </tr>
                            <tr>
                                <td>Total Affiliated user</td>
                                <td id="t_count"></td>
                            </tr>
                            <tr>
                                <td>Total Registered Affiliated user</td>
                                <td id="d_count"></td>
                            </tr>
                            <tr>
                                <td>Total Subscribed Affiliated user</td>
                                <td id="p_count"></td>
                            </tr>
                        </table>

                    </div>
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
    <script  src="/assets/admin/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script  src="/assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script src="/assets/admin/global/scripts/datatable.js"></script>
    <script src="/assets/admin/js/jstz.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.manage_user').addClass('active');
            $('.manage_user .arrow').addClass('open');
            $('.affiliate_user').addClass('active');
        });
    </script>

    <script>
        jQuery(document).ready(function() {
//            Metronic.init(); // init metronic core components
//            Layout.init(); // init current layout
//            QuickSidebar.init(); // init quick sidebar
//            Demo.init(); // init demo features
            EcommerceOrders.init();
//            UIConfirmations.init();
        });
    </script>

    <script>
        var EcommerceOrders = function () {
            var id,username,date;



            var handleOrders = function () {

                $(document.body).on('click','.filter-submit',function(){
                    console.log('-----------------------------------------',id);
                    id=$(".filter input[name='id']").val();
                    username=$(".filter input[name='username']").val();
                    date=$(".filter input[name='date']").val();
                });
                var grid = new Datatable();

                grid.init({
                    src: $("#datatable_affiliate_users"),
                    onSuccess: function (grid) {
                        // execute some code after table records loaded
                    },
                    onError: function (grid) {
                        // execute some code on network or other general error
                    },
                    loadingMessage: 'Loading...',
                    dataTable: {
                        // here you can define a typical datatable settings from http://datatables.net/usage/options
                        // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                        // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js).
                        // So when dropdowns used the scrollable div should be removed.
                        //"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

                        "lengthMenu": [
                            [10, 20, 50, 100, 150, 200,500,-1],
                            [10, 20, 50, 100, 150,200,500, "All"] // change per page values here
                        ],
                        "pageLength": 10, // default record count per page
                        "ajax": {
                            "url": "/show/affiliate/user",
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
                            {orderable: false, targets: 5}
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


        $(document).ready(function(){
            $(document.body).on('click','.delete_acc',function(){

                var currObj=$(this);
                var removeId=$(this).attr('data-id');
                console.log(removeId);
                var conf= confirm('Are you sure to delete this Account');
                if(!conf){
                    return false;
                }
                $.ajax({
                    url:'/remove/pending/user/account',
                    type:'post',
                    data:{
                        removeId:removeId
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

                    success:function(response){
                        if(response==1){
                            currObj.parents('tr').remove();
                            $('.alert-success').show().find('ul').text('Record Deleted Successfully');
                        }else{
                            $('.alert-danger').show().find('ul').text('Record Not Deleted');
                        }
                    }

                });
            })
            $(document.body).on('click','.viewMoreAff',function(){
                var userId=$(this).attr('data-id');
                console.log(userId);

                $.ajax({
                    url:'/get/users/more/affliate/details',
                    type:'post',
                    data:{
                        userId:userId
                    },
                    beforeSend: function () {

                        $("body").addClass("loading");
                    },
                    complete: function () {
                        $("body").removeClass("loading");
//
                    },
//                    beforeSend:function(){
//                        console.log('------------------------------------');
//                        $('#'+viewId).prop('disabled','true');
//                        $('#'+viewId).text('Loading..');
//                    },
//                    complete: function() {
//                        console.log('........................................................');
//                        $('#'+viewId).removeAttr('disabled');
//                        $('#'+viewId).text('View More')
//                    },
                    success:function(response){
                        if(response.length==0){
                            alert('More data not Found for this User');
                            return false;
                        }else{
                            $('#aff_link').text(response.affiliate_link);
                            $('#t_count').text(response.total_aff_count);
                            $('#p_count').text(response.total_paid_count);
                            $('#d_count').text(response.total_demo_count);
                            $('#AffliateDetailsModal').modal('show');
                            console.log('response====>',response);
                        }
                    }
                });
            })
        })
    </script>
@endsection