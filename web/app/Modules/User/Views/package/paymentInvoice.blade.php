@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('active_myAccount','active')

@section('headcontent')

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css"/>

    <link href="/assets/user/css/pricing-table.css" rel="stylesheet" type="text/css"/>

    <style>

        .dataTables_wrapper {
            margin: 10px;
        }

        thead {
            color: #000000;
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
                            <span class="caption-subject font-green-sharp bold uppercase">Payment Invoice</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="row">
                            @if($data['status']=='success')
                            <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-xs-12">
                                        <img src="/assets/user/images/instaffic_logo.png" width="160">
                                        {{--<span>Email-ID: <a href="#">sidduv@gmail.com</a></span>--}}
                                    </div>
                                    @if($data['status']=='success')
                                    <div class="col-xs-6 col-sm-6 col-md-6  col-xs-12 text-right">
                                        <p>
                                            {{--<em>Date: 24st July, 2017</em>--}}
                                            <em>Date: {{date('d/m/Y',$data['data']['payment_time'])}}</em>
                                        </p>
                                    </div>
                                        @endif
                                </div>
                                <div class="row invicesuccess">
                                    <div class="text-center" style="color: #00A000; padding:15px 0;">
                                        <h2>Thank you for package subscription.</h2>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-top:1px solid #DDDDDD;padding:5px 0;">

                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <b>Payment Status</b>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span class="pull-right" style="color:green">Completed</span>

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-top:1px solid #DDDDDD;padding:5px 0;">

                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                                            <b>Transaction ID</b>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <span class="pull-right">{{$data['data']['tranaction_id']}}</span>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-top:1px solid #DDDDDD;padding:5px 0;">

                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <b>Pakage Type</b>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            @if($data['data']['package_type']=='B')
                                                <span class="pull-right" style="color: #0b94ea;">
                                                    {{'Business Package'}}
                                                     </span>
                                            @elseif($data['data']['package_type']=='P')
                                                <span class="pull-right" style="color: #9c7c32;">
                                                    {{'Private Package'}}
                                                      </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-top:1px solid #DDDDDD;padding:5px 0;">

                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <b>Package Duration</b>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span class="pull-right">{{$data['data']['number_months']}} Months</span>

                                        </div>
                                    </div>


                                    {{--<div class="col-lg-12" style="border-top:1px solid #DDDDDD;padding:5px 0;">--}}

                                    {{--<div class="col-lg-8">--}}
                                    {{--<b>Package Discription</b>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-lg-4">--}}
                                    {{--<span class="pull-right">shccb bsdxkjasbnx</span>--}}

                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-top:1px solid #DDDDDD;padding:5px 0;">

                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <b>Package Price</b>
                                            <small>(per unit)</small>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span class="pull-right">{{$data['data']['package_price']}} ILS</span>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-top:1px solid #DDDDDD;padding:5px 0;">

                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <b>Quantity </b>
                                            <small>(no of accounts)</small>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span class="pull-right">{{$data['data']['quantity']}}</span>

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-top:1px solid #DDDDDD;padding:5px 0;">

                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 col-lg-offset-8 col-md-offset-8 col-sm-offset-8 col-xs-offset-7">
                                            <span class="pull-right"><b> Total &nbsp;:</b></span>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                            <span class="pull-right"><b>{{$data['data']['total_price']}} ILS</b></span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                                @else
                                <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                                    <div class="row invicesuccess">

                                        <div class="text-center" style="color: red; padding:15px 0;">
                                            <h2>Sorry, Payment Failed.</h2>
                                        </div>
                                        <hr>


                                    </div>
                                </div>
                                @endif
                                <div class="col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                                    <div class="row invicesuccess"><small>
                                            <span><b> Queries&nbsp;:</b></span>
                                            <p>if you have any queries concerning this invoice please contact</p>
                                            <b>Email ID:</b> &nbsp;&nbsp;<a href="mailto:smartffic@gmail.com" style="margin-right:60px">smartffic@gmail.com</a>
                                            <b>Skype ID:</b> &nbsp;&nbsp;<a href="skype:live:globaltrafficinsta?add">live:globaltrafficinsta</a>
                                        </small>

                                    </div>
                                </div>
                        </div>



                        {{--<div class="row">--}}
                            {{--<div class="col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">--}}
                                {{--<h4>Invice Error.</h4>--}}
                            {{--</div>--}}
                        {{--</div>--}}
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
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->


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