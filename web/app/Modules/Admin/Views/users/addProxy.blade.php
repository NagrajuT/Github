@extends('Admin::layouts.adminLayout')

@section('pageheadcontent')
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    {{--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">--}}
    <link rel="stylesheet" type="text/css"
          href="/assets/admin/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="/assets/admin/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="/assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

    <style>
        #addAllDetails {
            margin: -17px 0 5px 16px;
        }

        .valError {
            border-color: darkred;
        }
    </style>
@endsection

@section('pagebodycontent')

    <div class="page-content">
        <h3 class="page-title">
            Manage Proxies
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-users"></i>
                    <a href="javascript:;">Account Setting</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="">Add Proxy</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        {{--<button data-toggle="modal" id="addAllDetails" data-target="#addNews" class="btn btn-info">Add Proxy</button>--}}
        <div class="row">
            <div class="col-md-12">
                <!-- Begin:  -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title" style="padding-top:0.6%;display:inline-block;">Proxy Table</h3>

                            <div class="actions pull-right">
                                <button class="btn btn-info default yellow-stripe" data-toggle="modal"
                                        data-target="#proxyModal">
                                    <i class="fa fa-plus"></i>
								<span class="hidden-480">
								Add Proxy</span>
                                </button>
                                {{--<button data-toggle="modal" id="addAllDetails" data-target="#addNews" class="btn btn-info">Add Proxy</button>--}}
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="proxyTable"
                                       class="table table-striped table-bordered table-hover dataTables-example"
                                       style="margin-top:2%;">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th>id</th>
                                        <th>Proxy IP</th>
                                        <th>Proxy PORT</th>
                                        <th>Proxy Type</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>location</th>
                                        <th>Status</th>
                                        <th>Added date</th>
                                        <th>Last Modifed</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End:  -->
            </div>
        </div>


        <div id="proxyModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header"
                         style="background: linear-gradient(-45deg, #808080, #dc2430); color: #fff;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-size: 20px;text-align:center;">Add Proxies Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="addonlist scroller"
                                     style="overflow-y: auto; max-height: 500px; height: 250px;"
                                     data-handle-color="#637283">
                                    <form id="proxy_form">
                                        <table class="table table-hover" id="proxyAddTable">
                                            <thead>
                                            <th style="width: 2%">No.</th>
                                            <th style="width: 18%">proxy-ip</th>
                                            <th style="width: 10%">proxy-port</th>
                                            <th style="width: 20%">proxy-location</th>
                                            <th style="width: 14%">proxy-type</th>
                                            <th style="width: 16%">username</th>
                                            <th style="width: 16%">password</th>
                                            <th style="width: 4%">Action</th>
                                            </thead>
                                            <tbody id="tbody">
                                            <tr>
                                                <td class="p_id">1</td>
                                                <td>
                                                    <input type="text" name="proxy_ip" class="form-control p_ip"
                                                           data-validation="ip_address" value=""/>
                                                </td>
                                                <td>
                                                    <input type="text" name="proxy_port" class="form-control p_port"
                                                           required="required"
                                                           data-validation="number"
                                                           data-validation-allowing="range[0;65535]"
                                                           data-validation-error-msg="Invalid Port" value=""/>
                                                </td>
                                                <td>
                                                    <input type="text" name="proxy_location" required="required"
                                                           class="form-control p_location" value=""/>
                                                </td>
                                                <td>
                                                    <div class="radio-list">
                                                        <select class="form-control drp p_type" name="proxy_type">
                                                            <option value="1"> Private</option>
                                                            <option value="0"> Public</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control p_username" value=""
                                                           name="proxy_username"
                                                           required/>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control p_password" value=""
                                                           name="proxy_password"
                                                           required/>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm red rmv_proxy" title="delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="text-center">
                                    <a class="btn btn-sm blue" id="addMore"><i class="fa fa-plus"></i>Add
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #557386;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeModalBtn">Close
                        </button>
                        <button type="button" class="btn btn-success" id="saveProxy">Save</button>
                    </div>
                </div>
                <!— /.modal-content —>
            </div>
            <!— /.modal-dialog —>
        </div>

    </div>
@endsection
@section('pagescripts')

    <script src="/assets/admin/js/toastr.min.js"></script>
    {{--<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>--}}
    <script src="/assets/admin/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js"></script>--}}
    <script src="/assets/admin/js/jstz.min.js"></script>
    {{--<script src="/assets/admin/js/validate.min.js"></script>--}}
    <script src="/assets/admin/js/form-validator.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.proxy_set').addClass('active');
            $('.proxy_set .arrow').addClass('open');
            $('.sys_prx').addClass('active');
        });
    </script>
    {{--<script  src="/public/assets/admin/js/jstz.min.js"></script>--}}
    <script>
        //        $.validate({
        //            form: '#proxy_form'
        ////            modules : 'html5'
        ////            lang: 'es',
        ////            scrollToTopOnError : true,
        ////            errorMessagePosition : 'top'
        //        });
        //        $.formUtils.addValidator({
        //            name: 'ip_address',
        //            validatorFunction: function (value, $el, config, language, $form) {
        //                return ((value.match(/^(?!0)(?!.*\.$)((1?\d?\d|25[0-5]|2[0-4]\d)(\.|$)){4}$/)) == null) ? false : true;
        //            },
        //            errorMessage: 'Invalid IP address',
        //            errorMessageKey: 'invalidIp'
        //        });
    </script>
    <script>
        var table;
        $(document).ready(function () {
             table=$('#proxyTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {'url': '/show/proxies', data: {userTimezone: jstz.determine().name()}, type: 'post'},
                columns: [
                    {data: 'proxy_id', name: 'proxy_id'},
                    {data: 'proxy_ip', name: 'proxy_ip'},
                    {data: 'proxy_port', name: 'proxy_port'},
                    {data: 'proxy_type', name: 'proxy_type'},
                    {data: 'proxy_username', name: 'proxy_username'},
                    {data: 'proxy_password', name: 'proxy_password'},
                    {data: 'proxy_location', name: 'proxy_location'},
                    {data: 'proxy_status', name: 'proxy_status'},
                    {data: 'added_date', name: 'added_date'},
                    {data: 'last_modified', name: 'last_modified'},
                    {data: 'delete', name: 'delete', "searchable": false, "orderable": false}

                ]
            });

        })

        toastr.options = {
            timeOut: 4000,
            extendedTimeOut: 100,
            tapToDismiss: true,
            debug: false,
            fadeOut: 10,
            positionClass: "toast-top-center"
        };
        $(document).ready(function () {

            var count = 2;
            $("#addMore").click(function () {
                $("#tbody").append('<tr> <td class="p_id">' + count + '</td> <td> <input type="text" name="proxy_ip" class="form-control p_ip" data-validation="ip_address" value=""/> </td> <td> <input type="text" name="proxy_port" class="form-control p_port" required="required" data-validation="number" data-validation-allowing="range[0;65535]" data-validation-error-msg="Invalid Port" value=""/> </td> <td> <input type="text" name="proxy_location" required="required" class="form-control p_location" value=""/> </td> <td> <div class="radio-list"> <select class="form-control drp p_type" name="proxy_type"> <option value="1"> Private</option> <option value="0"> Public</option> </select> </div> </td> <td> <input type="text" class="form-control p_username" value="" name="proxy_username" required/> </td> <td> <input type="text" class="form-control p_password" value="" name="proxy_password" required/> </td> <td> <a class="btn btn-sm red rmv_proxy" title="delete"> <i class="fa fa-trash"></i> </a> </td> </tr>');
                count++;
            })

            var isValidData = function (data) {
                var validResult = {};
                console.log('data', data, parseInt(data.proxy_port.trim(), 10));
                if (data.proxy_ip.trim().length == 0) {
                    validResult.proxy_ip = 'Invalid Proxy';
                } else if ((data.proxy_ip.trim().match(/^(?!0)(?!.*\.$)((1?\d?\d|25[0-5]|2[0-4]\d)(\.|$)){4}$/)) == null) {
                    validResult.proxy_ip = 'Invalid Proxy';
                }
                if ((!$.isNumeric(data.proxy_port.trim())) || parseInt(data.proxy_port.trim(), 10) < 0 || parseInt(data.proxy_port.trim(), 10) > 65535) {
                    validResult.proxy_port = 'Invalid Port';
                }
                if (data.proxy_location.length == 0) {
                    validResult.proxy_location = 'Please fill Proxy Location';
                }

                if (!(data.proxy_type == '0' || data.proxy_type == '1')) {

                    validResult.proxy_type = 'Invalid Inputs';
                }
                if (data.proxy_type == '1' && data.proxy_username.length == 0) {
                    validResult.proxy_username = 'Please fill Username';
                }
                if (data.proxy_type == '1' && data.proxy_password.length == 0) {
                    validResult.proxy_password = 'Please fill Password';
                }
                return validResult;
            };

            $(document).on('click', '#saveProxy', function () {

                var saveObj = $(this);
                var table_id, proxy_ip, proxy_port, proxy_location, proxy_type, proxy_username, proxy_password, isValid;
                var allValidData = true;
                var proxy_collection = [];

                $('#proxyAddTable tbody tr').each(function () {
                    var curObj = $(this);
                    var data;
                    table_id = curObj.find('.p_id').html();
                    proxy_ip = curObj.find('.p_ip').val().trim();
                    proxy_port = curObj.find('.p_port').val().trim();
                    proxy_location = curObj.find('.p_location').val().trim();
                    proxy_type = curObj.find('.p_type').val();
                    proxy_username = curObj.find('.p_username').val().trim();
                    proxy_password = curObj.find('.p_password').val().trim();

                    if (proxy_type == 1) {

                        data = {
                            proxy_ip: proxy_ip,
                            proxy_port: proxy_port,
                            proxy_location: proxy_location,
                            proxy_type: proxy_type,
                            proxy_username: proxy_username,
                            proxy_password: proxy_password
                        };
                    } else {

                        data = {
                            proxy_ip: proxy_ip,
                            proxy_port: proxy_port,
                            proxy_location: proxy_location,
                            proxy_type: proxy_type
                        };
                    }

                    isValid = isValidData(data);

                    console.log('isValid===>', isValid);

                    var errorHtml = '';
                    curObj.children('td').find('.inputError').remove();
                    if (isValid.hasOwnProperty('proxy_ip')) {
                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_ip + '</small>';
                        curObj.children('td').eq(1).append(errorHtml);
                        curObj.find('.p_ip').addClass('valError');
                    }
                    else {
                        curObj.find('.p_ip').removeClass('valError');
                    }
                    if (isValid.hasOwnProperty('proxy_port')) {
                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_port + '</small>';
                        curObj.children('td').eq(2).append(errorHtml);
                        curObj.find('.p_port').addClass('valError');
                    }
                    else {
                        curObj.find('.p_port').removeClass('valError');
                    }

                    if (isValid.hasOwnProperty('proxy_location')) {
                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_location + '</small>';
                        curObj.children('td').eq(3).append(errorHtml);
                        curObj.find('.p_location').addClass('valError');
                    }
                    else {
                        curObj.find('.p_location').removeClass('valError');
                    }

                    if (isValid.hasOwnProperty('proxy_type')) {
                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_type + '</small>';
                        curObj.children('td').eq(4).append(errorHtml);
                        curObj.find('.p_type').addClass('valError');
                    }
                    else {
                        curObj.find('.p_type').removeClass('valError');
                    }

                    if (isValid.hasOwnProperty('proxy_username')) {
                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_username + '</small>';
                        curObj.children('td').eq(5).append(errorHtml);
                        curObj.find('.p_username').addClass('valError');
                    } else {
                        curObj.find('.p_username').removeClass('valError');
                    }

                    if (isValid.hasOwnProperty('proxy_password')) {
                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_password + '</small>';
                        curObj.children('td').eq(6).append(errorHtml);
                        curObj.find('.p_password').addClass('valError');
                    } else {
                        curObj.find('.p_password').removeClass('valError');
                    }
                    if ($.isEmptyObject(isValid)) {
                        proxy_collection.push(data);
                    } else {
                        allValidData = false;

                    }


                });
//                $('#saveProxy').removeAttr('disabled');

                console.log('proxy_collection', proxy_collection)
                console.log('proxy_collection.length', proxy_collection.length);
                if (allValidData == true && proxy_collection.length !== 0) {
                    $.ajax({
                        url: '/save/proxy',
                        type: 'post',
                        data: {
                            'proxy_collection': proxy_collection
                        },
                        beforeSend: function () {
                            saveObj.attr('disabled', 'true');
                            saveObj.html('Processing..');
                        },
                        complete: function () {
                            saveObj.removeAttr('disabled');
                            saveObj.html('Save');
                        },
                        success: function (response) {
                            console.log(response == 200);
                            response = JSON.parse(response);

                            if (response == 200) {
                                table.ajax.reload();
                                $('#proxy_form')[0].reset();
                                console.log('success');
                                toastr.success('Proxies stored in our database');
                            } else {
                                for (var i = 0; i < response.length; i++) {
                                    console.log(typeof response[i]);

                                    isValid = response[i];
//
                                    var appObj = $('#proxyAddTable tbody tr').eq(i);
                                    var errorHtml = '';
                                    appObj.children('td').find('.inputError').remove();
                                    if (isValid.hasOwnProperty('proxy_ip')) {
                                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_ip + '</small>';
                                        appObj.children('td').eq(1).append(errorHtml);
                                        appObj.find('.p_ip').addClass('valError');
                                    }
                                    else {
                                        appObj.find('.p_ip').removeClass('valError');
                                    }
                                    if (isValid.hasOwnProperty('proxy_port')) {
                                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_port + '</small>';
                                        appObj.children('td').eq(2).append(errorHtml);
                                        appObj.find('.p_port').addClass('valError');
                                    }
                                    else {
                                        appObj.find('.p_port').removeClass('valError');
                                    }

                                    if (isValid.hasOwnProperty('proxy_location')) {
                                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_location + '</small>';
                                        appObj.children('td').eq(3).append(errorHtml);
                                        appObj.find('.p_location').addClass('valError');
                                    }
                                    else {
                                        appObj.find('.p_location').removeClass('valError');
                                    }

                                    if (isValid.hasOwnProperty('proxy_type')) {
                                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_type + '</small>';
                                        appObj.children('td').eq(4).append(errorHtml);
                                        appObj.find('.p_type').addClass('valError');
                                    }
                                    else {
                                        appObj.find('.p_type').removeClass('valError');
                                    }

                                    if (isValid.hasOwnProperty('proxy_username')) {
                                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_username + '</small>';
                                        appObj.children('td').eq(5).append(errorHtml);
                                        appObj.find('.p_username').addClass('valError');
                                    } else {
                                        appObj.find('.p_username').removeClass('valError');
                                    }

                                    if (isValid.hasOwnProperty('proxy_password')) {
                                        errorHtml = '<small class="help-block inputError">' + isValid.proxy_password + '</small>';
                                        appObj.children('td').eq(6).append(errorHtml);
                                        appObj.find('.p_password').addClass('valError');
                                    } else {
                                        appObj.find('.p_password').removeClass('valError');
                                    }

                                }
                                console.log('fail');
                                toastr.error('Error in storing proxies data');
                            }
                            console.log('response===>', response);
                        }
                    });
                } else {
                    toastr.warning('Invalid Data');
                }


            });

            $(document.body).on('click', '.rmv_proxy', function () {
                $(this).parents('tr').remove();
            });

        })

    </script>

    <script>
        $(document).ready(function () {
            $(document).on('click','.change_proxy_status',function(){
                var currObj = $(this);
                var user_status = currObj.attr('data-status');
                var user_id = currObj.attr('data-id');

                $.ajax({
                    url: '/change/proxy/status',
                    type: 'post',
                    data: {
                        user_id: user_id,
                        user_status: user_status
                    },
                    beforeSend: function () {
                        currObj.attr('disabled', 'true');
                    },
                    complete:function(){
                        currObj.removeAttr('disabled');
                    },
                    success: function (response) {
                        if (response == 1) {
                            var status='';
                            if (user_status == 'A') {

                                status = '<div class="btn-group"><button class="btn btn-sm yellow-casablanca margin-bottom dropdown-toggle change_proxy_status" type="button" data-toggle="dropdown" aria-expanded="false" data-id="'+user_id+
                                        '" data-status="B" title="click to activate this proxy">Blocked</button></div>';
                            } else {
                                status = '<div class="btn-group"><button class="btn btn-sm green-meadow  margin-bottom dropdown-toggle change_proxy_status" type="button" data-toggle="dropdown" aria-expanded="false" data-id="'+user_id+
                                        '" data-status="A" title="click to block this proxy">Active</button></div>';
                            }
                            currObj.parents('td').html(status);
                        }
                    }
                });

            });
            $(document).on('click', '.deleteUserProxy', function (e) {
                if (!confirm('Are you sure to delete this Proxy')) {
                    return false;
                }
                var curObj = $(this);
                var id = curObj.attr("id");
                $.ajax({
                    url: '/delete/proxy',
                    type: 'post',
                    data: {
                        'id': id
                    },
                    success: function (response) {
                        if (response == 200) {
                            curObj.parents('tr').remove();
//                            toastr.success("data deleted successfully");
                        } else if (response == 202) {
                            toastr.error("opps! data Not deleted");
                        }
                        else {
                            toastr.warning("something went wrong");
                        }
                    }
                });

            });
            $(document).on('change', '.drp', function (e) {
                var curObj = $(this);
                var proxy_type = curObj.children('option:selected').val();
                if (proxy_type == 0) {
                    curObj.parents('tr').find('.p_username').val('');
                    curObj.parents('tr').find('.p_password').val('');
                    curObj.parents('tr').find('.p_username').attr('disabled', 'true');
                    curObj.parents('tr').find('.p_password').attr('disabled', 'true');
                } else {

                    curObj.parents('tr').find('.p_username').removeAttr('disabled');
                    curObj.parents('tr').find('.p_password').removeAttr('disabled');
                }
            }); //by nitish

        })

    </script>

    <script>
        $(document).ready(function () {
            $("#addAllDetails").click(function () {
                $(".tbodyText").val("");
            })
        })


    </script>

@endsection