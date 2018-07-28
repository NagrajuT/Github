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


        .portlet.light{
            background-color:#f5f1ff !important;
        }
    </style>


@endsection

@section('pagebodycontent')

    <div class="page-content">
        <div class="row" id="load_wait">
            <div class="col-md-12 col-sm-12">
            <div class="portlet light">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">All Notifications</span>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab">
                                System </a>
                        </li>
                        <li>
                            <a href="#tab_1_2" data-toggle="tab">
                                Activities </a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body">
                    <!--BEGIN TABS-->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="scroller checkScroll" style="height: 320px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                <ul class="feeds" id="addNotificationMsg">

                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_1_2">
                            <div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                <ul class="feeds">
                                    <li>
                                        <a href="#">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New user registered
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New order received
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    10 mins
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc">
                                                        Order #24DOP4 has been rejected. <span class="label label-sm label-danger ">
																			Take action <i class="fa fa-share"></i>
																			</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date">
                                                24 mins
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New user registered
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New user registered
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New user registered
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New user registered
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New user registered
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New user registered
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            New user registered
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    Just now
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--END TABS-->
                </div>
            </div>
            </div>

        </div>
        <!-- END PAGE CONTENT-->
    </div>

@endsection
@section('pagescripts')
    <script src="/assets/admin/js/jstz.min.js"></script>
    <script src="/assets/admin/js/toastr.min.js"></script>
    <script>
        jQuery(document).ready(function () {
            Metronic.init(); // init metronic core components
        });
    </script>

    <script>

        var cursor=0;
        var processing=false;
        var i=0;
        function loader() {
            $.ajax({
                url: '/view/all/notificatios',
                method: 'post',
                data:{
                    cursor:cursor
                },
                beforeSend: function () {
                    processing=true;
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


//                    console.log('response====>',response);
                    var appendHtml='';
                    var label='';
                    var iconClass='';
                    if(response.code==200 && response.status=='success'){

                            cursor=response.cursor;
                        console.log('cursor==========>',cursor);
                        $.each(response.data,function(k,v){
                            i++;
                            if(v.notification_type==0){
                                label='label-success';
                                iconClass='fa-plus'
                            }else if(v.notification_type==1){
                                label='label-info';
                                iconClass='fa-bell-o'
                            }else{
                                //chnage if new notification type need to display
                                label='label-warning';
                                iconClass='fa-plus'
                            }

                            appendHtml=' <li> <div class="col1"> <div class="cont"> <div class="cont-col1"> ' +
                                    '<div class="label label-sm '+label+'"> <i class="fa '+iconClass+'"></i> </div> </div> ' +
                                    '<div class="cont-col2"> ' +
                                    '<div class="desc">'+v.notification_message+'. ' +
                                    '<span class="label label-sm '+label+'">Take action ' +
                                    '<i class="fa fa-share"></i></span> </div> </div> </div> </div> ' +
                                    '<div class="col2"> <div class="date"> Just now'+ i+' </div> </div> </li>';
                            $('#addNotificationMsg').append(appendHtml);

//                        console.log('notification_message==>', v.notification_message);
                        });

//                    $('#addNotificationMsg').html(appendHtml);
                    }else{
                        cursor='';
                    }
                    processing=false;


                }

            });
        }
        $(document).ready(function () {
            loader();
            $('.checkScroll').scroll(function(){

                var topHiddenPart=$('.checkScroll').scrollTop();
                var divVisibleHeight=$(this).height();
                var actualDivHeight=$('.checkScroll')[0].scrollHeight;
                var bottomHiddenPart=actualDivHeight-topHiddenPart-divVisibleHeight;
                if((bottomHiddenPart<100) && (processing==false && cursor!='')){
                    console.log('you are in danger area now');
                    loader();
                }

//                console.log('topHiddenPart====>',topHiddenPart);
//                console.log('divHeight====>',divVisibleHeight);
//                console.log('actualDivHeight====>',actualDivHeight);
//                console.log('bottomHiddenPart====>',bottomHiddenPart);

            });

        });



    </script>
@endsection