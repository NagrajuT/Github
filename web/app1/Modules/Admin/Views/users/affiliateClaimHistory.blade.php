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
            z-index: 99999;
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

        .modal-open .modal {
            overflow-x: hidden;
            overflow-y: auto;
            z-index: 99999;
        }


    </style>


@endsection

@section('pagebodycontent')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            All Affiliate Claims
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="javascript:;">Manage Affiliate Users</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:;">Affiliate Claim History</a>
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        {{--<button id="group_payment" class="btn green" data-toggle="modal" data-target="#adminpayment_modal">--}}
                                        <button id="group_payment" class="btn green">
                                            Make Group Payment <i class="fa fa-credit-card"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <table class="table table-striped table-bordered table-hover" id="datatable_show_users">
                                <thead>
                                <tr role="row" class="heading">
                                    <th class="table-checkbox">
                                        #0
                                    </th>

                                    <th width="15%">
                                        ID&nbsp;
                                    </th>
                                    <th width="30%">
                                        Referral Email
                                    </th>
                                    <th width="20%">
                                        Claim Amount
                                    </th>

                                    <th width="15%">
                                        Short INFO
                                    </th>
                                    <th width="15%">
                                        Claim Date
                                    </th>
                                    <th width="15%">
                                        Claim Time
                                    </th>
                                    <th width="15%">
                                        Claim Status
                                    </th>
                                    <th width="15%">
                                        Actions
                                    </th>
                                </tr>
                                <tr role="row" class="filter">

                                    <td>
                                        <input type="checkbox" class="group-checkable" data-set="#datatable_show_users .checkboxes"/>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="id">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="referral_email">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="claim_amount">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="short_info">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="claim_date">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="claim_time">
                                    </td>

                                    <td>
                                        <select name="status" class="form-control form-filter input-sm">
                                            <option value="">select...</option>
                                            <option value="P">Pending</option>
                                            <option value="P">Processing</option>
                                            <option value="S">Success</option>
                                            <option value="F">Failed</option>
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


    <!-- Admin Payment Modal -->
    <div class="modal fade" id="adminpayment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Payment Overview</h4>
                </div>
                <div class="modal-body">
                      <p><b>Are you sure you want to make this payment(This can not be undone later)?</b></p>
                    <div class="panel panel-default appendClaimData" style="min-height: auto; max-height: 150px; overflow-y: auto;">

                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <span id="TotalUserClaim"><b>0</b> Claims</span>

                            <span class="pull-right" id="TotalAmt">Total payable Amount: <b>0.00</b></span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirm_payment">Confirm Payment</button>
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
    <script src="/assets/admin/js/toastr.min.js"></script>


    <script>
        jQuery(document).ready(function () {
//            Metronic.init(); // init metronic core components
//            Layout.init(); // init current layout
//            QuickSidebar.init(); // init quick sidebar
//            Demo.init(); // init demo features
            EcommerceOrders.init();
            UIConfirmations.init();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.manage_aff').addClass('active');
            $('.manage_aff .arrow').addClass('open');
            $('.clm_his').addClass('active');
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
                            "url": "/affiliate/claim/history",
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
//                            {orderable: false, targets: 4},
//                            {orderable: false, targets: 5},
                            {orderable: false, targets: 7},
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
        //        var hello=function(){
        //            console.log('clicked');
        //        }

        $(document).ready(function () {

            $(document.body).on('click', '.viewMore', function () {
                var userId = $(this).attr('data-id');
                console.log(userId);

                $.ajax({
                    url: '/get/users/more/insta/details',
                    type: 'post',
                    data: {
                        userId: userId
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
                    success: function (response) {
                        if (response.length == 0) {
                            alert('More data not Found for this User');
                            return false;
                        } else {
                            $('#user_type').text(response.user_user_type);
                            $('#user_email').text(response.user_email);
                            $('#user_user_name').text(response.user_username);
                            $('#aff_link').text(response.affiliate_link);
                            $('#reff_email').text(response.reffered_email);

                            $('#total_insta_acc').text(response.total_insta_acc);
                            $('#demo_acc').text(response.total_demo_acc);
                            $('#pvt_acc').text(response.total_priavte_acc);
                            $('#bis_acc').text(response.total_business_acc);
                            $('.more_ac_details').attr('data-id', userId);

                            $('#UserDetailsModal').modal('show');
                            console.log('response====>', response);
                            var userInfo = '<div class="col-md-12"><div class="portlet light">' +
                                    '<div class="portlet-title"><div class="caption"><i class="fa fa-cubes "></i>' +
                                    '<span class="font-gray bold uppercase">Basic Account Statistics</span> ' +
                                    '</div> </div> ';

                            userInfo += '<div class="portlet-body">' +
                                    '<div class="col-md-12"> <div class="col-md-6"><span class="font-purple-plum bold ">User Email</span></div> <div class="col-md-6 bold">' + response.user_email + '</div> </div>' +
                                    '<div class="col-md-12"> <div class="col-md-6"><span class="font-purple-plum bold ">Username</div> <div class="col-md-6 bold">' + response.user_username + '</div> </div>' +
                                    '<div class="col-md-12"> <div class="col-md-6"><span class="font-purple-plum bold ">User Type</div> <div class="col-md-6 bold">' + response.user_user_type + '</div> </div>' +
                                    '<div class="col-md-12"> <div class="col-md-6"><span class="font-purple-plum bold ">Reffered By</div> <div class="col-md-6 bold">' + response.reffered_email + '</div> </div>' +
                                    '<div class="col-md-12"> <div class="col-md-6"><span class="font-purple-plum bold ">Affiliate Link</div> <div class="col-md-6 bold">' + response.affiliate_link + '</div> </div>' +
                                    '</div></div> </div> ';

                            userInfo += '<div class="col-md-12"><div class="portlet light">' +
                                    '<div class="portlet-title"><div class="caption"><i class="fa fa-cubes "></i>' +
                                    '<span class="font-gray bold uppercase">Account Details</span> ' +
                                    '</div> </div> ';

                            userInfo += '<div class="portlet-body">' +
                                    '<div class="col-md-12"> <div class="col-md-7"><span class="font-purple-plum bold ">Total Instagram Account Added</span></div> <div class="col-md-5 bold"><span class="badge badge-success">' + response.total_insta_acc + '</span></div> </div>' +
                                    '<div class="col-md-12"> <div class="col-md-7"><span class="font-purple-plum bold ">Total Demo Account(Under Trial)</span></div> <div class="col-md-5 bold"><span class="badge badge-success">' + response.total_demo_acc + '</span></div> </div>' +
                                    '<div class="col-md-12"> <div class="col-md-7"><span class="font-purple-plum bold ">Total Private Account</span></div> <div class="col-md-5 bold"><span class="badge badge-success">' + response.total_priavte_acc + '</span></div> </div>' +
                                    '<div class="col-md-12"> <div class="col-md-7"><span class="font-purple-plum bold ">Total Business Account</span></div> <div class="col-md-5 bold"><span class="badge badge-success">' + response.total_business_acc + '</span></div> </div>' +
                                    '</div></div> </div>';

                            $('#user_info_data').html(userInfo);
                            $('#UserDetailsModal').modal('show');


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

                            $('.alert-success').show().find('ul').text('Record Deleted Successfully');
                        } else {
                            currObj.parents('tr').remove();
                            $('.alert-danger').show().find('ul').text('Record Not Deleted');
                        }
                    }

                });
            })
            $(document.body).on('click', '.user_status', function () {
                console.log('------------------------------------------', $(this));

                var user_status = $(this).children('a').attr('data-status');
                console.log('user_status===>', user_status);

                var currObj = $(this);
                var user_id = $(this).parents('ul').siblings('button').attr('data-id');

                console.log('user_id====>', user_id);

                $.ajax({
                    url: '/update/user/status',
                    type: 'post',
                    data: {
                        user_id: user_id,
                        user_status: user_status
                    },
                    beforeSend: function () {
                        var xab = currObj.parents('ul').siblings('button').attr('disabled', 'true');
                    },
                    success: function (response) {

                        console.log('response====>',response);

                        if (response == 1) {

//                            $('.alert-success').show().find('ul').text('Record Updated Successfully');
                            var status = '<div class="btn-group">';
                            if (user_status == 'A') {
                                status += '<button class="btn btn-sm green-meadow  margin-bottom dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' + user_id + '">';
                                status += 'Active';
                                status += '&nbsp <i class="fa fa-angle-down"></i></button>';
                                status += '<ul class="dropdown-menu" role="menu">' +
                                        '<li class="user_status"><a href="javascript:;" data-status="I">Inactive</a></li>' +
                                        '<li class="user_status"><a href="javascript:;" data-status="D">Deleted</a></li>' +
                                        '</ul>';
                            } else if (user_status == 'I') {
                                status += '<button class="btn btn-sm yellow-casablanca  margin-bottom dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' + user_id + '">';
                                status += 'Inactive';
                                status += '&nbsp<i class="fa fa-angle-down"></i></button>';
                                status += '<ul class="dropdown-menu" role="menu">' +
                                        '<li class="user_status"><a href="javascript:;" data-status="A">Active</a></li>' +
                                        '<li class="user_status"><a href="javascript:;" data-status="D">Deleted</a></li>' +
                                        '</ul>';
                            } else if (user_status == 'D') {
                                status += '<button class="btn btn-sm red-thunderbird margin-bottom dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" data-id="' + user_id + '">';
                                status += 'Deleted';
                                status += '&nbsp<i class="fa fa-angle-down"></i></button>';
                                status += '<ul class="dropdown-menu" role="menu">' +
                                        '<li class="user_status"><a href="javascript:;" data-status="A">Active</a>' +
                                        '</li><li class="user_status"><a href="javascript:;" data-status="I">Inactive</a></li></ul>';
                            }

                            status += '</div>';
                            currObj.parents('td').html(status);
                        } else {
                            currObj.parents('ul').siblings('button').removeAttr('disabled');
//                            $('.alert-danger').show().find('ul').text('Record Not Updated');
                        }
                    }
                });
            })

            $(document.body).on('click', '.more_ac_details', function (e) {
//                console.log('user more data===>', JSON.stringify(response));
//                alert('1111111111111111');
                console.log('1111111111111111');

                e.preventDefault();
                var currObj = $(this);
                var userId = $(this).attr('data-id');
                console.log(userId);
                $.ajax({
                    url: '/get/insta/timing/details',
                    type: 'post',
                    data: {
                        userId: userId
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
                        console.log('user more data===>', JSON.stringify(response));
                    }

                });
            })

        })
    </script>

    <script>
        $(document).ready(function(){



            $(document.body).on('click','#group_payment',function(){
                var selected=$('table input:checkbox:checked:not(.group-checkable)');

                var selectedUser=selected.length;
                if(selectedUser==0){
                    toastr.warning('No affiliate user selected.please select atleast one to proceed Payment.');
                    return false;
                }

                var appendClaimData='';
                var totalClaim=0;
                var totalAmount=0.00;
                $('#datatable_show_users tbody tr').each(function(key,value){
                    var trObj=$(this);

                    if(trObj.find('input:checkbox').is(":checked")){
                        totalClaim++;
                        var userEmail=trObj.find('td').eq(2).text();

                        var userAmount=trObj.find('td .claimAmt').attr('data-amount');
                        totalAmount+=parseFloat(userAmount,10);
                        appendClaimData+= '<div class="panel-body">' +
                                '<span><b>'+totalClaim+'. </b>'+userEmail+'</span>' +
                                '<span class="pull-right"><b>'+userAmount+' ILS</b></span></div>';
                    }

                });
                $('#TotalUserClaim b').text(totalClaim);
                $('#TotalAmt b').text(totalAmount+' ILS');
//                console.log('totalAmount==>',totalAmount.toFixed(2));

                $('.appendClaimData').html(appendClaimData);
                $('#adminpayment_modal').modal('show');

            });

            $(document.body).on('click','#confirm_payment',function(e){
                $('#adminpayment_modal').modal('hide');

                console.log('working on group payment...');
                var selected=$('table input:checkbox:checked:not(.group-checkable)');
                var selectedUser=selected.length;
                console.log('selectedUser==><',selectedUser);
                var users=[];
                selected.each(function(){
                    console.log($(this).val());
                    users.push($(this).val());
                });
                $.ajax({
                    url:'/create/mass/payment',
                    type:'post',
                    data:{
                        users:users
                    },
                    beforeSend:function(){
                        $("body").addClass("loading");
                        $('#group_payment').attr('disabled', 'true')

                    },
                    complete:function(){
                        $("body").removeClass("loading");
                        $('#group_payment').removeAttr('disabled');
                    },
                    success:function(response){
                        console.log('response',response);
                        if(response.code==200 && response.status=='success'){
                            toastr.success(response.message);
                        }else if(response.code==400 && response.status=='fail'){
                            toastr.error(response.message);

                        }else{
                            toastr.error('unexpected Network Error has Occured.');
                        }

                    },
                    error:function(error){
//                        toastr.error(error);
                    }
                });
                console.log('selected==>',selected);

            });
            $(document.body).on('click','.checkboxes',function(){
                console.log('working on table checkbox...');
                var selected=$('table input:checkbox:checked:not(.group-checkable)');
                var selectedUser=selected.length;
                $('.table-checkbox').text('#'+selectedUser);
                console.log('selectedUser==><',selectedUser);






            });
            $(document.body).on('click','.group-checkable',function(){
                console.log('working on table group checkbox...');
                var count = $('#datatable_show_users tbody tr td .checker').length;
                if($('#datatable_show_users thead tr td .checker span').hasClass('checked')) {
                    $('.table-checkbox').text('#'+count);
                }else {
                    $('.table-checkbox').text('#0');
                }
            });

        });

    </script>

@endsection