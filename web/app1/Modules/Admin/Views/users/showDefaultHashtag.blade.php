@extends('Admin::layouts.adminLayout')
@section('pageheadcontent')
    <link rel="stylesheet" type="text/css"
          href="/assets/admin/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="/assets/admin/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="/assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
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

        .modal1 {
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

        .scroll-pos {
            min-height: 100px;
            max-height: 400px;
            overflow-y: auto;
            overflow-x: hidden;
        }


    </style>


@endsection

@section('pagebodycontent')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Default Hashatags
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="javascript:;">Manage Hashtag</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:;">Default Hashtag</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ul>
        </div>

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
        <div class="row" id="load_wait">
            <div class="col-md-12 col-sm-12">
                <div class="portlet grey-cascade box">
                    <div class="portlet-title">


                        <div class="caption">
                            <div class="input-group col-md-12">
                                <input type="text" name="search_query" placeholder="Search..." class="form-control">
                            <span class="input-group-btn">
                                <a class="btn submit" id="hash_search" href="javascript:;"
                                   style="background-color: gray;">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>

                            </div>
                        </div>
                        <div class="actions" style="padding-top:13px">
                            {{--<i class="fa fa-cogs"></i>Hashtag--}}
                            <a href="#" class="btn btn-default btn-sm search_reset">
                                <i class="fa fa-refresh"></i> Reset </a>

                            <a href="#" class="btn btn-default btn-sm" id="clr_data" data-toggle="modal"
                               data-target="#addHashTagModal">
                                <i class="fa fa-pencil"></i> Add More </a>
                        </div>
                    </div>

                    <div class="portlet-body scroll-pos">
                        {{--<button class="btn btn-sm search_reset"><i class="fa fa-refresh"></i> Reset</button>--}}
                        {{--<div class="input-group col-md-3 pull-right">--}}
                        {{--<input type="text" name="search_query" placeholder="Search..." class="form-control">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<a class="btn submit" id="hash_search" href="javascript:;" style="background-color: gray;">--}}
                        {{--<i class="icon-magnifier"></i>--}}
                        {{--</a>--}}
                        {{--</span>--}}
                        {{--</div>--}}


                        <div class="table-responsive" style="overflow: visible; min-height: 150px;">
                            <div class="portlet-body util-btn-group-margin-bottom-5">
                                <div class="clearfix paginate_data">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="dataTables_paginate paging_bootstrap_extended paginate_links">

                                </div>

                            </div>
                            <div class="col-md-4 col-sm-12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->

        <div class="modal"><!— this is for loading image —></div>
    </div>

    <div class="modal fade" id="addHashTagModal1" role="dialog">
        <div class="modal-dialog">

            <!— Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:white; font-size: 19px; font-weight: 600;">
                        Add Hashtag</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group col-md-8 col-md-offset-2">
                        <input type="text" name="hash_search" placeholder="Search Live Hashtag" class="form-control">
                            <span class="input-group-btn">
                                <a class="btn submit" id="live_hash_search" href="javascript:;"
                                   style="background-color: gray;">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>

                    </div>
                    <div id="show_live_hash" class="row" hidden=""
                         style="margin: 5px 0px 15px 5px; min-height: auto; max-height:260px; overflow-y:auto; overflow-x: hidden;"></div>
                    <br>
                    <br>

                    <div class="modal-footer" style="text-align: center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Cancel</button>
                        {{--<button type="button" class="btn btn-info" id="editCommentsModalBtn">Save</button>--}}
                        <button type="button" class="btn btn-info" data-dismiss="modal" id="close">Add</button>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="addHashTagModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#444D58;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center;color:white;">Add tags</h4>

                </div>
                <div class="modal-body">
                    <div class="row" style="margin-top: 5%;padding: 0px 10px;">
                        <div style="position: fixed; padding: 10px 0; width: 90%;">
                            <div class="col-md-8 col-md-offset-2">


                                <!-- Search Field -->
                                <div class="row">
                                    {{--<input type="text" id="area" class="form-control"/>--}}
                                    <div class="form-group">
                                        <div class="input-group" id="search">
                                            <input class="form-control" type="text" id="tagId" name="search"
                                                   placeholder="Tag" required/>

                                                    <span class="input-group-btn">
                                                                <div class="btn btn-success" type="button">
                                                                    <span id="findTag">
                                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                                     </span>
                                                                </div>
                                                     </span>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- End of Search Form -->

                    </div>

                    <div id="append_tag"
                         style="margin-top: 90px; min-height:auto; max-height:300px; overflow-y:auto;">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="AddHash">Add
                    </button>
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
    <script src="/assets/admin/admin/pages/scripts/ui-confirmations.js"></script>
    <script src="/assets/admin/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js"></script>
    <script src="/assets/admin/js/jstz.min.js"></script>
    <script src="/assets/admin/js/toastr.min.js"></script>
    <script>
        jQuery(document).ready(function () {
            Metronic.init(); // init metronic core components
//            Layout.init(); // init current layout
//            QuickSidebar.init(); // init quick sidebar
//            Demo.init(); // init demo features
//            EcommerceOrders.init();
            UIConfirmations.init();
//            UIBlockUI.init();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.hash_set').addClass('active');
            $('.hash_set .arrow').addClass('open');
            $('.default_tag').addClass('active');

        });
    </script>




    <script>
        //        var hello=function(){
        //            console.log('clicked');
        //        }

        $(document).ready(function () {

            $(document.body).on('click', '.delete_hashtag', function () {

                var currObj = $(this);
                console.log('currObj=====>', currObj);
                var removeId = $(this).children().attr('data-id');
                console.log(removeId);
                var conf = confirm('Are you sure to delete this Hashtag');
                if (!conf) {
                    return false;
                }
                $.ajax({
                    url: '/remove/default/hashtag',
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
                            currObj.parents('div .btn-group').remove();
                            toastr.success('Hashtag Deleted Successfully');
//                            $('.alert-success').show().find('ul').text('Hashtag Deleted Successfully');
                        } else {
                            toastr.success('Hashtag Not Deleted');
//                            $('.alert-danger').show().find('ul').text('Hashtag Not Deleted');
                        }
                    }

                });
            })

            $(document.body).on('click', '.change_status', function () {
                console.log('------------------------------------------', $(this));
                var currObj = $(this);
                var user_id = currObj.children('a').attr('data-id');
                var user_status = currObj.children('a').attr('data-status');
                console.log('user_id===>', user_id);
                console.log('user_status===>', user_status);

                $.ajax({
                    url: '/update/hashtag/status',
                    type: 'post',
                    data: {
                        user_id: user_id,
                        user_status: user_status
                    },
                    beforeSend: function () {
                        currObj.parents('ul').siblings('button').attr('disabled', 'true');
                    },
                    success: function (response) {
                        currObj.parents('ul').siblings('button').removeAttr('disabled');
                        if (response == 1) {

                            if (user_status == 'A') {
                                currObj.children('a').attr('data-status', 'I');
                                currObj.parents('ul').siblings('button').removeClass('hash-color');
                                currObj.parents('ul').siblings('button').addClass('yellow-casablanca');
                                currObj.children().html(' Active ');
                            } else {
                                currObj.children('a').attr('data-status', 'A');
                                currObj.parents('ul').siblings('button').removeClass('yellow-casablanca');
                                currObj.parents('ul').siblings('button').addClass('hash-color');
                                currObj.children().html(' Inactive ');
                            }

                        } else {
                            currObj.parents('ul').siblings('button').removeAttr('disabled');
//                            $('.alert-danger').show().find('ul').text('Record Not Updated');
                        }
                    }
                });
            })


        })
    </script>


    <script>

        function loader() {
            $.ajax({
                url: '/show/default/hashtag',
                method: 'post',
                beforeSend: function () {
                    Metronic.blockUI({
                        target: '#load_wait',
                        boxed: true,
//                        message:'wait..'
                    });
                },
                complete: function () {
                    Metronic.unblockUI('#load_wait');
                },
                success: function (response) {
                    if (typeof response.htmlData != 'undefined' && response.htmlData.length != 0) {
                        $('.paginate_data').html(response.htmlData);
                    } else {
                        $('.paginate_data').html('No hashtag found');
                    }
                    if (typeof response.htmlLinks != 'undefined' && response.htmlLinks.length != 0) {
                        $('.paginate_links').html(response.htmlLinks);
                    } else {
                        $('.paginate_links').html('');
                    }

                }

            });
        }
        $(document).ready(function () {
            loader();
            $(document.body).on('click', '.search_reset', function () {
                loader();
            });
            $(document.body).on('click', '#clr_data', function () {
                $("#append_tag").html('');
            });
            $(document.body).on('click', '#hash_search', function () {
                var search_query = $("input[name='search_query']").val();
                if (search_query.trim().length == 0) {
                    return false;
                }
                $.ajax({
                    url: '/show/default/hashtag?search=' + search_query,
                    method: 'POST',
//                    data:{
//                        search_query:search_query
//                    },
                    beforeSend: function () {
                        Metronic.blockUI({
                            target: '#load_wait',
                            boxed: true,
//                        message:'wait..'
                        });
                    },
                    complete: function () {
                        Metronic.unblockUI('#load_wait');
                    },
                    success: function (response) {
                        console.log('response', response);
                        if (typeof response.htmlData != 'undefined' && response.htmlData.length != 0) {
                            $('.paginate_data').html(response.htmlData);
                        } else {
                            $('.paginate_data').html('<h3>No Matching hashtag found in our system</h3>');
                        }
                        if (typeof response.htmlLinks != 'undefined' && response.htmlLinks.length != 0) {
                            $('.paginate_links').html(response.htmlLinks);
                        } else {
                            $('.paginate_links').html('');
                        }

                    }

                });
            });
            $(document.body).on('click', '.pagination a', function (e) {

                e.preventDefault();

//                $('#load a').css('color', '#dfecf6');
//                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                var url = $(this).attr('href');
                loadData(url);
//                window.history.pushState("", "", url);
//            });

                function loadData(url) {
                    $.ajax({
                        url: url,
                        method: 'POST',
                        beforeSend: function () {
                            Metronic.blockUI({
                                target: '#load_wait',
                                boxed: true,
//                        message:'wait..'
                            });
                        },
                        complete: function () {
                            Metronic.unblockUI('#load_wait');
                        },
                        success: function (response) {


                            console.log('response', response);
                            if (typeof response.htmlData != 'undefined' && response.htmlData.length != 0) {
                                $('.paginate_data').html(response.htmlData);
                            }
                            if (typeof response.htmlLinks != 'undefined' && response.htmlLinks.length != 0) {
                                $('.paginate_links').html(response.htmlLinks);
                            }
//                    $('.articles').html(data);
                        }
                    });
                }

            });
        });
    </script>
    {{------------hashTagFinder-----------(start)-------}}
    <script>
        toastr.options = {
            timeOut: 4000,
            extendedTimeOut: 100,
            tapToDismiss: true,
            debug: false,
            fadeOut: 10,
            positionClass: "toast-top-center"
        };
        $(document).ready(function (e) {

            var count = 1;
            var hash_timer, hash_delay = 750;
            $(document.body).on('input', '#tagId', function () {
                var searchTag = $(this).val().trim();
                if (searchTag) {
                    $('#findTag i').attr('class', 'fa fa-refresh fa-spin');
                }
                clearTimeout(hash_timer);
                hash_timer = setTimeout(function () {
                    if (searchTag) {
                        $.ajax({
                            url: '/hashtag/finder',
                            type: 'post',
                            data: {
                                'tag': searchTag
                            },
                            success: function (response) {

                                $('#findTag i').attr('class', 'fa fa-search');
                                $("#append_tag").html('');

                                $("#loadnwait").css('display', 'none');
                                if (response == 400) {
                                    $('#append_tag').html('No Results Found..');
                                }
                                else if (response == 402) {
                                    $('#append_tag').html('Service Unavailable at The Moment');
                                }
                                else {
                                    var append_tag = '';
                                    $.each(response, function (key, data) {

                                        append_tag += '<a  href="javascript:;"  class="unit-tag" style="padding:0px 6px 0px 6px !important">' +
                                                '<label><span>' + key + '</span>' +
                                                '<span class="countrer">' + data + ' posts</span>' +
                                                '<span class="unit-btn-x">' +
                                                '<input class="add_hashtag" type="checkbox" value="' + key + '">' +
                                                '</span></label></a>';
                                    });
                                    $('#append_tag').html(append_tag);

                                }
                            }
                        });
                    }
                    else {
                        $('#findTag i').attr('class', 'fa fa-search');
                    }

                }, hash_delay)

            })


            $(document.body).on('click', '#AddHash', function () {
                tag = [];
                var Hashflag = false;
                $.each($('.add_hashtag'), function (i, v) {
                    if ($(this).is(":checked")) {
                        Hashflag = true;
                        tag.push($(this).attr("value"));
                    }
                })
                if (tag.length == 0) {
                    toastr.warning('Please select some tag');
                    return false;
                }
                $.ajax({
                    url: '/save/new/Hashtag',
                    type: 'post',
                    data: {
                        tag: tag,
                    },
                    beforeSend: function () {
                        $('#AddHash').attr('disabled', 'true');
//                        currObj.parents('ul').siblings('button').attr('disabled', 'true');
                    },
                    success: function (response) {
                        $('#AddHash').removeAttr('disabled');
                        if (response == 200) {
                            loader();
                            toastr.success('Hashtag added successfully');
                        } else {
                            toastr.error('Error in saving Hashtag');
                        }
                    }
                });

                console.log('11111111', tag);
            });
        })


    </script>
    {{------------hashTagFinder-----------(start)-------}}

@endsection