@extends('Admin::layouts.adminLayout')
@section('pageheadcontent')
    <link href="/assets/admin/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
    <link href="/assets/admin/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
    <link href="/assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/toastr.min.css"/>
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

        .pagination-panel-input {
            padding: 0px !important;
        }
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
            Manage Proxies
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="javascript:;">Manage Proxy</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:;">Manage Gender Proxy</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <br>

        <div class="page-bar">
            <button class="btn btn-info default yellow-stripe" data-toggle="modal"
                    data-target="#proxyGenderModalFile">
                <i class="fa fa-plus"></i>
								<span class="hidden-480">
								Add Gender Proxy file</span>
            </button>
        </div>
        <div class="row">
            <div class="col-md-12">

                <!-- Begin: life time stats -->
                <div class="portlet light">
                    {{--<div class="portlet-title">--}}
                    {{--<div class="caption">--}}
                    {{--<i class="fa fa-shopping-cart"></i>Users--}}
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
                            <table class="table table-striped table-bordered table-hover" id="datatable_show_users">
                                <thead>
                                <tr role="row" class="heading">

                                    <th width="5%">
                                        ID&nbsp;#
                                    </th>
                                    <th width="10%">
                                        Proxy IP
                                    </th>
                                    <th width="5%">
                                        Proxy Port
                                    </th>
                                    <th width="5%">
                                        Username
                                    </th>
                                    <th width="5%">
                                        password
                                    </th>
                                    <th width="5%">
                                        Location
                                    </th>
                                    <th width="5%">
                                        Added Date
                                    </th>
                                    <th width="5%">
                                        Last Modified
                                    </th>
                                    <th width="5%">
                                       Status
                                    </th>
                                    <th width="5%">
                                        Proxy Type
                                    </th>
                                    <th width="10%">
                                        Actions
                                    </th>
                                </tr>
                                <tr role="row" class="filter">
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="p_id">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="p_ip">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="p_port">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="p_username">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="p_password">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="p_location">
                                    </td>
                                    <td>
                                        {{--<input type="text" class="form-control form-filter input-sm" name="added_date">--}}
                                    </td>
                                    <td>
                                        {{--<input type="text" class="form-control form-filter input-sm" name="modified_date">--}}
                                    </td>

                                    <td>
                                        <select name="status" class="form-control form-filter input-sm">
                                            <option value="">select...</option>
                                            <option value="P">Pending</option>
                                            <option value="A">Active</option>
                                            <option value="B">Blocked</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="p_type" class="form-control form-filter input-sm">
                                            <option value="">select...</option>
                                            <option value="0">Public</option>
                                            <option value="1">Private</option>
                                        </select>
                                    </td>

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

    <div class="modal fade" id="proxyGenderModalFile" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center;color:white;">Upload Gender proxies file here</h4>

                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5% 5%;padding: 0px 10px;">
                        <form id="genderProxyFile" enctype="multipart/form-data">
                            {{--<div class="form-group">--}}
                            {{--<div class="col-md-10">--}}
                            {{--<label class="control-label">Choose Proxy type:</label>--}}
                            {{--<select class="bs-select form-control" id="selectType" name="proxyType">--}}
                            {{--<option selected value="0">Public</option>--}}
                            {{--<option value="1">Private</option>--}}
                            {{--</select>--}}

                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-12">
                                Select File to upload:
                                <input type="file" name="genderProxyFile">
                                {{--<input type="text" name="qweqe" value="111111" hidden/>--}}
                            </div>
                            <button type="button" value="" name="submit" class="uploadGenderProxy">Upload Gender Proxy file</button>
                        </form>
                        <br>
                        <button type="button" class="btn filterGenderProxy">Validate Uploaded Proxies.
                        </button>
                    </div>
                </div>

                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-info" data-dismiss="modal" id="">OK--}}
                    {{--</button>--}}
                    <button type="button" class="btn btncolor1" data-dismiss="modal" id="close">Close
                    </button>
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
    <script src="/assets/admin/js/jstz.min.js"></script>
    <script src="/assets/admin/js/toastr.min.js"></script>


    <script>
        jQuery(document).ready(function () {
//            Metronic.init(); // init metronic core components
//            Layout.init(); // init current layout
//            QuickSidebar.init(); // init quick sidebar
//            Demo.init(); // init demo features
            EcommerceOrders.init();
//            UIConfirmations.init();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.proxy_set').addClass('active');
            $('.proxy_set .arrow').addClass('open');
            $('.gen_prx').addClass('active');
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
                    src: $("#datatable_show_users"),
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
                            [10, 20, 50, 100, 150, -1],
                            [10, 20, 50, 100, 150, "All"] // change per page values here
                        ],
                        "pageLength": 10, // default record count per page
                        "ajax": {
                            "url": "/show/gender/proxies",
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
                            {orderable: false, targets: 6},
                            {orderable: false, targets: 7},
                            {orderable: false, targets: 10}
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
        $(document).on('click', '.uploadGenderProxy', function (e) {
            e.preventDefault();
//                var pType = $('#selectType').val();

            var formData = new FormData($("#genderProxyFile")[0]);
            $.ajax({
                url: '/upload/gender/proxy/file',
                type: 'post',
                processData: false,
                dataType: 'json',
                contentType: false,
                data: formData,
                async: false,
                success: function (response) {

                    if(response==200){
                        toastr.success('proxy file uploaded successfully');
                    }else if(response==400){
                        toastr.error('OOPS!File not Uploaded.');
                    }else if(response==501){
                        toastr.error('Invalid file type,Only txt file is supported at the moment');
                    }else if(response==502){
                        toastr.error('Invalid file');
                    }else if(response==500){
                        toastr.error('Invalid data,plz check your proxy format');
                    }else{
                        toastr.error('Unexpected error has occured');
                    }
                    console.log('response===<', response);
                },
                error: function (error) {
                    console.log('error===<', error);
                }
            });

//                console.log('formData==>',formData);

        });

        $(document).on('click', '.filterGenderProxy', function (e) {
            e.preventDefault();
            var formData = new FormData($("#genderProxyFile")[0]);
            $.ajax({
                url: '/filter/gender/proxy',
                type: 'post',
                success: function (response) {
                    if(response==200){
                        toastr.success('proxy validated started successfully');
                    }else if(response==400){
                        toastr.error('OOPS!proxy validation failed');
                    }else{
                        toastr.error('Unexpected error has occured');
                    }
                    console.log('response===<', response);
                },
                error: function (error) {
                    console.log('error===<', error);
                }
            });
        });
        })
    </script>

@endsection