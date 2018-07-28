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

        .form-control {
            padding: 6px 10px;
        }
        .img-circle {
            border: 3px solid gray;
            border-radius: 9px !important;
        }
    </style>


@endsection

@section('pagebodycontent')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Smartffic Users Instagram Accounts
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="javascript">Manage Users</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:;">Available Instagram Accounts</a>
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
                            <table class="table table-striped table-bordered table-hover" id="datatable_insta_user_acc">
                                <thead>
                                <tr role="row" class="heading">

                                    <th width="20%">
                                        ID&nbsp;#
                                    </th>
                                    <th width="15%">
                                        Instagram Username
                                    </th>
                                    <th width="10%">
                                        Smartffic User Email
                                    </th>
                                    <th width="15%">
                                        Added Date
                                    </th>
                                    <th width="15%">
                                        Connected
                                    </th>
                                    <th width="15%">
                                        Status
                                    </th>
                                    <th width="15%">
                                        Subscribe Type
                                    </th>
                                    <th width="10%">
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
                                        <input type="text" class="form-control form-filter input-sm" name="email">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="added_date">
                                    </td>

                                    <td>
                                        <select name="connected" class="form-control form-filter input-sm">
                                            <option value="">select...</option>
                                            <option value="N">YES</option>
                                            <option value="Y">NO</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="status" class="form-control form-filter input-sm">
                                            <option value="">select...</option>
                                            <option value="A">Active</option>
                                            <option value="I">Inactive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="sub_type" class="form-control form-filter input-sm">
                                            <option value="">select...</option>
                                            <option value="DU">Demo User</option>
                                            <option value="PU">Private User</option>
                                            <option value="BU">Business User</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="margin-bottom-5">
                                            <button class="btn btn-sm yellow filter-submit margin-bottom"><i
                                                        class="fa fa-search"></i>
                                            </button>
                                            <button class="btn btn-sm filter-cancel"><i class="fa fa-refresh"></i>
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




    {{--<div class="modal fade" id="AccDetailsModal" role="dialog">--}}
    <div class="modal fade" id="acc_stat" style="z-index: 999999 !important;" role="dialog">
        <div class="modal-dialog">

            <!— Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:white;">
                        </i>ACCOUNT DETAILS</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id="stat_data">
                        <div class="col-md-12">
                            <div class="profile-sidebar">
                                <div class="portlet light profile-sidebar-portlet">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md"><i class="fa fa-cubes "></i>
                                            <span class="caption-subject font-gray bold uppercase">Basic Account Settings</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile-userpic">
                                            <img id="profile_image" src="" class="img-responsive img-circle"
                                                 alt="Loading.."
                                                 onerror="this.onerror=null;this.src='{{env('WEB_URL')}}/assets/user/images/no_image.png'">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="col-md-12">
                                            <div class="col-md-6"><span class="font-purple-plum bold ">Full Name</span>
                                            </div>
                                            <div class="col-md-6 bold" id="fName"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6"><span class="caption-subject font-purple-plum bold ">Username</span>
                                            </div>
                                            <div class="col-md-6 bold" id="instaUserName"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <span class="font-purple-plum bold ">Activity</span>
                                            </div>
                                            <div class="col-md-6 bold" id="activity_status">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6"> <span class="font-purple-plum bold ">start Date</span>
                                            </div>
                                            <div class="col-md-6 bold" id="activity_start_date"> </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6"><span class="caption-subject font-purple-plum bold">Stop Date</span>
                                            </div>
                                            <div class="col-md-6 bold" id="activity_stop_date"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6"><span class="caption-subject font-purple-plum bold">Stop Reason</span>
                                            </div>
                                            <div class="col-md-6 bold" id="stop_reason"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md"><i class="icon-globe theme-font"></i> <span
                                                class="caption-subject font-gray bold uppercase">Promotion Statistics</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_1_1" data-toggle="tab">Time Uses</a></li>
                                        <li><a href="#tab_1_2" data-toggle="tab">Default</a></li>
                                        <li><a href="#tab_1_3" data-toggle="tab">Filter</a></li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_1">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <span class="caption-subject font-purple-plum bold uppercase">Total Time Used</span>
                                                </div>
                                                <div class="col-md-6 bold" id="total_time_used"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">Total Time Left</span>
                                                </div>
                                                <div class="col-md-6 bold" id="time_period_left"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">Total Subscription Time</span>
                                                </div>
                                                <div class="col-md-6 bold" id="total_subscription_time"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_1_2">
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-heart font-red"></i>&nbsp; Likes Made </span>
                                                </div>
                                                <div class="col-md-6 bold" id="default_likes_count"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-user"></i>&nbsp; Follows Made</span></div>
                                                <div class="col-md-6 bold" id="default_follows_count"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-times"></i>&nbsp; Unfollows Made</span>
                                                </div>
                                                <div class="col-md-6 bold" id="default_unfollows_count"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-plus"></i>&nbsp; Followers Gained</span>
                                                </div>
                                                <div class="col-md-6 bold" id="default_followers_count"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_1_3">
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span  class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-heart font-red"></i>&nbsp; Likes Made</span>
                                                </div>
                                                <div class="col-md-6 bold" id="filter_likes_count"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-user"></i>&nbsp; Follows Made</span></div>
                                                <div class="col-md-6 bold" id="filter_follows_count"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-times"></i>&nbsp; Unfollows Made</span>
                                                </div>
                                                <div class="col-md-6 bold" id="filter_unfollows_count"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-plus"></i>&nbsp; Followers Gained</span>
                                                </div>
                                                <div class="col-md-6 bold" id="filter_followers_count"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md"><i class="icon-globe theme-font"></i> <span
                                                class="caption-subject font-gray bold uppercase">Promotion Settings</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_2_1" data-toggle="tab">Default</a></li>
                                        <li><a href="#tab_2_2" data-toggle="tab">Filter</a></li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_2_1">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-star-half-o"></i>&nbsp; Status </span>
                                                </div>
                                                <div class="col-md-6 bold" id="default_status"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-male"></i>&nbsp; Gender</span></div>
                                                <div class="col-md-6 bold" id="default_gender"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_2_2">
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-star-half-o"></i>&nbsp; Status</span>
                                                </div>
                                                <div class="col-md-6 bold" id="filter_status"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span  class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-heart font-red"></i>&nbsp; Like</span></div>
                                                <div class="col-md-6 bold" id="like"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-user"></i>&nbsp; Follow</span></div>
                                                <div class="col-md-6 bold" id="follow"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-plus"></i>&nbsp; Unfollow</span></div>
                                                <div class="col-md-6 bold" id="unfollow"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-plus"></i>&nbsp; Unfollow Option</span>
                                                </div>
                                                <div class="col-md-6 bold" id="unfollow_option"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-male"></i>&nbsp; Gender</span></div>
                                                <div class="col-md-6 bold" id="filter_gender"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6"><span class="caption-subject font-purple-plum bold uppercase">
                                                        <i class="fa fa-video-camera"></i>&nbsp; Media Type</span></div>
                                                <div class="col-md-6 bold" id="media_type"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                        {{--<button type="button" class="btn btn-info" data-dismiss="modal" id="close">OK</button>--}}
                    </div>

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
        $(document).ready(function () {
            $('.manage_user').addClass('active');
            $('.manage_user .arrow').addClass('open');
            $('.insta_acc').addClass('active');
        });
    </script>
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
                    src: $("#datatable_insta_user_acc"),
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
                            "url": "/user/insta/accounts",
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
                            {orderable: false, targets: 7}
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
                var userId = $(this).attr('data-id');
                console.log(userId);

                $.ajax({
                    url: '/activity/stats',
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
                    success: function (response) {
                        if (response.length == 0) {
                            toastr.warning('Details not available at the moment');
                            return false;
                        } else {
                            $('#profile_image,#fName,#instaUserName,#activity_status,#activity_stop_date,#stop_reason').val('');
                            $('#default_status,#default_gender,#filter_status,#like,#follow,#unfollow,#unfollow_option,#filter_gender,#media_type').val('');
                            $('#total_time_used,#time_period_left,#total_subscription_time,#default_likes_count,#default_follows_count').val('');
                            $('#default_unfollows_count,#default_followers_count,#filter_likes_count,#filter_follows_count,#filter_unfollows_count,#filter_followers_count').val('');

                            $('#profile_image').attr('src', response.profile_pic_url);
                            $('#fName').text(response.full_name);
                            var link = "https://www.instagram.com/" + response.username;
                            var user_link = '<a href="#" onclick="window.open(\'' + link + '\');return false;">' + response.username + '</a>';
                            $('#instaUserName').html(user_link);

                            if(response.status == 'Started'){
                                $('#activity_status').html(response.status + ' <i class="fa fa-refresh fa-spin font-green"></i>');
                                $('#activity_start_date').text(response.start_date);
                                $('#stop_reason').parent('div').hide();
                                $('#activity_stop_date').parent('div').hide();
                                $('#activity_start_date').parent('div').show();
                            }else{
                                $('#activity_status').html(response.status +'<i class="glyphicon glyphicon-stop font-red"></i>');
                                $('#activity_stop_date').text(response.stop_date);
                                $('#stop_reason').text(response.stop_reason);
                                $('#activity_start_date').parent('div').hide();
                                $('#activity_stop_date').parent('div').show();
                                $('#stop_reason').parent('div').show();
                            }

                            $('#default_status').text(response.default_promotion_status);
                            $('#default_gender').text(response.default_gender_filter);
                            $('#filter_status').text(response.filter_promotion_status);
                            $('#like').text(response.like);
                            $('#follow').text(response.follow);
                            $('#unfollow').text(response.unfollow);
                            $('#unfollow_option').text(response.unfollow_option);
                            $('#filter_gender').text(response.filter_gender);
                            $('#media_type').text(response.media_type);

                            $('#total_time_used').text(response.total_time_used);
                            $('#time_period_left').text(response.time_period_left);
                            $('#total_subscription_time').text(response.total_subscription_time);
                            $('#default_likes_count').text(response.default_likes_count);
                            $('#default_follows_count').text(response.default_follows_count);
                            $('#default_unfollows_count').text(response.default_unfollows_count);
                            $('#default_followers_count').text(response.default_followers_count);
                            $('#filter_likes_count').text(response.filter_likes_count);
                            $('#filter_follows_count').text(response.filter_follows_count);
                            $('#filter_unfollows_count').text(response.filter_unfollows_count);
                            $('#filter_followers_count').text(response.filter_followers_count);

                            $('#acc_stat').modal('show');
//                            console.log('response====>', response);
                        }

                    },
                    error: function (error) {

                    }
                });
            });
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
        })
    </script>
@endsection