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
    </style>


@endsection

@section('pagebodycontent')

        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                Admin Instagram Accounts
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="javascript:;">Accounts Settings</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="javascript:;">Show Instagram Accounts</a>
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
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-shopping-cart"></i>Account Listing
                            </div>
                            <div class="actions">
                                <a href="/add/insta/accounts" class="btn default yellow-stripe">
                                    <i class="fa fa-plus"></i>
								<span class="hidden-480">
								Add New Accounts </span>
                                </a>
                            </div>
                        </div>


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
                                <table class="table table-striped table-bordered table-hover" id="datatable_acc_list">
                                    <thead>
                                    <tr role="row" class="heading">

                                        <th width="15%">
                                            ID&nbsp;#
                                        </th>
                                        <th width="30%">
                                            Username
                                        </th>
                                        <th width="15%">
                                            Date
                                        </th>

                                        <th width="15%">
                                            Status
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
                                            <input type="text" class="form-control form-filter input-sm" name="username">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-filter input-sm" name="date">
                                        </td>
                                        <td>
                                            <select name="status" class="form-control form-filter input-sm">
                                                <option value="">select...</option>
                                                <option value="A">Active</option>
                                                <option value="I">Inactive</option>
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

        <div class="modal fade" id="AccDetailsModal" role="dialog">
            <div class="modal-dialog">

                <!— Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#444D58;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align:center; color:white;">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>ACCOUNT DETAILS</h4>
                    </div>
                    <div class="modal-body">
                        <div class="portlet-body form">
                            <table>
                                <tr>
                                    <td>Account Status</td>
                                    <td id="acc_status"></td>
                                </tr>
                                <tr>
                                    <td>Connected</td>
                                    <td id="is_connected"></td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td id="created_date"></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td id="username"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td id="password"></td>
                                </tr>
                                <tr>
                                    <td>Registered Email ID</td>
                                    <td id="reg_email"></td>

                                </tr>
                                <tr>
                                    <td>Register Email Password</td>
                                    <td id="reg_email_pass"></td>

                                </tr>
                                <tr>
                                    <td>Alternate Email ID</td>
                                    <td id="alt_email"></td>

                                </tr>
                                <tr>
                                    <td>Alternate Email Password</td>
                                    <td id="alt_email_pass"></td>

                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td id="gender"></td>

                                </tr>
                                <tr>
                                    <td>Registered Contact</td>
                                    <td id="reg_contact"></td>

                                </tr>
                                {{--<tr>--}}
                                    {{--<td>Set Proxy</td>--}}
                                    {{--<td id="set_proxy"></td>--}}

                                {{--</tr>--}}
                                <tr>
                                    <td>Proxy Type</td>
                                    <td id="proxy_type"></td>

                                </tr>
                                <tr>
                                    <td>Proxy IP</td>
                                    <td id="proxy_ip"></td>

                                </tr>
                                <tr>
                                    <td>Proxy Port</td>
                                    <td id="proxy_port"></td>

                                </tr>
                                <tr>
                                    <td>Proxy Username</td>
                                    <td id="proxy_username"></td>

                                </tr>
                                <tr>
                                    <td>Proxy Password</td>
                                    <td id="proxy_pass"></td>

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
    <script src="/assets/admin/js/loadingoverlay.js"></script>
    <script  src="/assets/admin/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script  src="/assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script src="/assets/admin/global/scripts/datatable.js"></script>
    <script src="/assets/admin/admin/pages/scripts/ui-confirmations.js"></script>
    <script src="/assets/admin/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js"></script>
    <script src="/assets/admin/js/jstz.min.js"></script>




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
                    src: $("#datatable_acc_list"),
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
                            [10, 20, 50, 100, 150, -1],
                            [10, 20, 50, 100, 150, "All"] // change per page values here
                        ],
                        "pageLength": 10, // default record count per page
                        "ajax": {
                            "url": "/show/insta/accounts",
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
                            {orderable: false, targets: 4}
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
            $('.acc_set').addClass('active');
            $('.acc_set .arrow').addClass('open');
            $('.show_insta').addClass('active');
        });
    </script>

    <script>


        $(document).ready(function(){



            $(document.body).on('click','.viewMore',function(){
                var viewId=$(this).attr('data-id');
                console.log(viewId);

                $.ajax({
                    url:'/get/insta/accounts/details',
                    type:'post',
                    data:{
                        viewId:viewId
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
                            alert('data not available at the moment');
                            return false;
                        }else{
                            $('#acc_status').text(response.status);
                            $('#is_connected').text(response.is_user_disconnected);
                            $('#created_date').text(response.created_at);
                            $('#username').text(response.username);
                            $('#password').text(response.password);
                            $('#reg_email').text(response.insta_reg_email_id);
                            $('#reg_email_pass').text(response.insta_reg_email_pwd);
                            $('#alt_email').text(response.alternate_reg_email_id);
                            $('#alt_email_pass').text(response.alternate_reg_email_pwd);
                            $('#gender').text(response.gender);
                            $('#reg_contact').text(response.insta_reg_contact);
                            $('#proxy_type').text(response.proxy_type);
                            $('#proxy_ip').text(response.proxy_ip);
                            $('#proxy_port').text(response.proxy_port);
                            $('#proxy_username').text(response.proxy_username);
                            $('#proxy_pass').text(response.proxy_password);
                            console.log(response.username);
                            $('#AccDetailsModal').modal('show');
                            console.log('response====>',response);
                        }



                    },
                    error:function(error){

                    }
                });
            })
            $(document.body).on('click','.delete_acc',function(){

                var currObj=$(this);
                var removeId=$(this).attr('data-id');
                console.log(removeId);
                var conf= confirm('Are you sure to delete this Account');
                if(!conf){
                    return false;
                }
                $.ajax({
                    url:'/remove/insta/account',
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
        })
    </script>
@endsection