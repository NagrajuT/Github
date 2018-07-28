@extends('User::layouts.bodyLayout')

@section('title','Dashboard')
@section('active_myAccount','active')

@section('headcontent')

    <link href="/assets/user/css/pricing-table.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <style>

        .breadcrumb > li + li::before {
            display: inline;
        }

        .carousel-inner.onebyone-carosel {
            margin: auto;
            width: 90%;
        }

        .onebyone-carosel .active.left {
            left: -33.33%;
        }

        .onebyone-carosel .active.right {
            left: 33.33%;
        }

        .onebyone-carosel .next {
            left: 10.33%;
        }

        .onebyone-carosel .prev {
            left: -10.33%;
        }

        div.panel {
            padding: 0 18px;
            background-color: #EFF3F8;
            max-height: 220px;
            overflow: hidden;
            transition: 0.6s ease-in-out;
            opacity:1;
            padding-top: 8px;
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
            background: rgba(255, 255, 255, .8) url('<?php echo env('WEB_URL')?>/assets/user/images/loading.gif') 50% 50% no-repeat;
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
    @endsection


    @section('content')
    {{--{{dd($data)}}--}}
    {{--PAGE CONTENT GOES HERE--}}
            <!-- BEGIN PAGE CONTENT -->
    <div class="package-list">
        <div class="page-content">
            <br>
            <div class="container">
                <div class="col-md-10 col-md-offset-1" style=" padding:0;">
                    <ol class="breadcrumb" style="background:#fff; margin-bottom:20px; padding:8px 15px;">
                        <li class="active">Package</li>
                        <li>Usernames</li>
                        <li>Checkout</li>
                    </ol>
                </div>
            </div>
            <div class="container">
                <div class="col-md-10 col-md-offset-1" style="background:#fff;padding:2px 0 10px 0;">
                    <h3 class="text-center"><b style="color: #545456;">Business</b></h3>
                    <div class="row">
                        <div id="myCarousel" class="carousel fdi-Carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
                                <div class="carousel-inner onebyone-carosel">
                                    {{--{{dd($packageData)}}--}}
                                    <?php $item = 0; ?>
                                    @foreach($packageData as $val)
                                        @if($val['package_type']=="B")
                                            {{--@if($val['id']=="1")--}}
                                            <?php if($item == 0) {?>
                                            <div class="item active">
                                                <div class="col-md-4">
                                                    <div class="pricing hover-effect lightpurple_business">
                                                        <div class="pricing-head">
                                                            <h4>{{$val['package_time']}}
                                                                <span>NIS {{$val['price']}}</span>
                                                                {{--<ul class="pricing-content list-unstyled">--}}
                                                                {{--<li>$0.66 per day</li>--}}
                                                                {{--</ul>--}}
                                                            </h4>
                                                        </div>
                                                        <div class="pricing-footer">
                                                            {{--<a href="/user/package/{{$val['time_package_id']}}"--}}
                                                            {{--class="btn yellow-crusta purple_business">Click here <i class="m-icon-swapright m-icon-white"></i>--}}
                                                            {{--</a>--}}
                                                            <button class="btn yellow-crusta purple_business Package-clickhere"
                                                                    data-id="{{$val['time_package_id']}}"
                                                                    data-value="{{$val['package_time']}},{{$val['price']}}">
                                                                BUY NOW<i class="m-icon-swapright m-icon-white"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $item = 1; } else{ ?>
                                            {{--@else--}}
                                            <div class="item">
                                                <div class="col-md-4">
                                                    <div class="pricing hover-effect lightpurple_business">
                                                        <div class="pricing-head">
                                                            <h4>{{$val['package_time']}}
                                                                <span>NIS {{$val['price']}}</span>
                                                                {{--<ul class="pricing-content list-unstyled">--}}
                                                                {{--<li>$0.66 per day</li>--}}
                                                                {{--</ul>--}}
                                                            </h4>
                                                        </div>
                                                        <div class="pricing-footer">
                                                            {{--<a href="/user/package/{{$val['time_package_id']}}" class="btn yellow-crusta purple_business">Click here <i class="m-icon-swapright m-icon-white"></i></a>--}}
                                                            <button class="btn yellow-crusta purple_business Package-clickhere"
                                                                    data-id="{{$val['time_package_id']}}"
                                                                    data-value="{{$val['package_time']}},{{$val['price']}}">
                                                                BUY NOW<i class="m-icon-swapright m-icon-white"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--@endif--}}
                                            <?php } ?>
                                        @endif
                                    @endforeach
                                </div>
                                <a class="left carousel-control" href="#eventCarousel" data-slide="prev">
                                    <span style="left: 20%;" class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#eventCarousel" data-slide="next">
                                    <span style="right: 20%;" class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                            <!--/carousel-inner-->
                        </div><!--/myCarousel-->
                    </div>
                </div>

            </div>
        </div>
        <div class="page-content">
            <br>
            <div class="container">
                <div class="col-md-10 col-md-offset-1" style="background:#fff;padding:2px 0 10px 0">
                    <h3 class="text-center"><b style="color: #545456;">Private</b></h3>
                    <br>
                    <div class="row">
                        <div id="myCarousel" class="carousel fdi-Carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel fdi-Carousel slide" id="eventCarousel_Private"
                                 data-interval="0">
                                <div class="carousel-inner onebyone-carosel">
                                    <?php $item = 0; ?>
                                    @foreach($packageData as $val)
                                        @if($val['package_type']=="P")
                                            {{--@if($val['id']=="1")--}}
                                            <?php if($item == 0) {?>
                                            <div class="item active">
                                                <div class="col-md-4">
                                                    <div class="pricing hover-effect light_orange">
                                                        <div class="pricing-head">
                                                            <h4>{{$val['package_time']}}
                                                                <span>NIS {{$val['price']}}</span>
                                                                {{--<ul class="pricing-content list-unstyled">--}}
                                                                {{--<li>$0.66 per day</li>--}}
                                                                {{--</ul>--}}
                                                            </h4>

                                                        </div>

                                                        {{--<div class="pricing-footer">--}}
                                                        {{--<a href="/user/package/{{$val['time_package_id']}}" class="btn yellow-crusta orange_business">--}}
                                                        {{--Click here <i class="m-icon-swapright m-icon-white"></i></a>--}}
                                                        {{--</div>--}}
                                                        <button class="btn yellow-crusta orange_business Package-clickhere"
                                                                data-id="{{$val['time_package_id']}}"
                                                                data-value="{{$val['package_time']}},{{$val['price']}}">
                                                            BUY NOW<i class="m-icon-swapright m-icon-white"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php $item = 1; } else{ ?>
                                            {{--@else--}}
                                            <div class="item">
                                                <div class="col-md-4">
                                                    <div class="pricing hover-effect light_orange">
                                                        <div class="pricing-head">
                                                            <h4>{{$val['package_time']}}
                                                                <span>NIS {{$val['price']}}</span>
                                                                {{--<ul class="pricing-content list-unstyled">--}}
                                                                {{--<li>$0.66 per day</li>--}}
                                                                {{--</ul>--}}
                                                            </h4>

                                                        </div>

                                                        <div class="pricing-footer">
                                                            {{--<a href="/user/package/{{$val['time_package_id']}}" class="btn yellow-crusta orange_business">Click here <i class="m-icon-swapright m-icon-white"></i></a>--}}
                                                            <button class="btn yellow-crusta orange_business Package-clickhere"
                                                                    data-id="{{$val['time_package_id']}}"
                                                                    data-value="{{$val['package_time']}},{{$val['price']}}">
                                                                BUY NOW<i class="m-icon-swapright m-icon-white"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            {{--@endif--}}
                                        @endif
                                    @endforeach
                                </div>
                                <a class="left carousel-control" href="#eventCarousel_Private"
                                   data-slide="prev">
                                    <span style="left: 20%;" class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#eventCarousel_Private"
                                   data-slide="next">
                                    <span style="right: 20%;" class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                            <!--/carousel-inner-->
                        </div><!--/myCarousel-->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="order-list">
        <div class="page-content">
            <br>
            <div class="container">
                <div class="col-md-8 col-md-offset-2" style="background:#fff;">
                    <h3 style="margin: 0px 0px;padding: 20px 0 0;"><b style="color: #545456;">Order</b></h3>
                    <ol class="breadcrumb">
                        <li><a href="#" onclick="return false;" class="goToPackage">Package</a></li>
                        <li class="active">Usernames</li>
                        <li>Checkout</li>
                    </ol>
                    <br>
                    <!--motivatinal images-->

                    <!-- BEGIN INLINE NOTIFICATIONS PORTLET-->
                    <div class="portlet">
                        <div class="portlet-body">
                            <div class="row"><!--margin-bottom-40-->
                                <!-- Pricing -->
                                <div class="col-md-12">

                                    <div class="panel panel-default das">
                                        <div class="panel-body">
                                            <div class="col-md-6 hedclr">Item</div>
                                            <div class="col-md-6 hedclr">Price</div>

                                            <div class="col-md-6" id="order-list-item"></div>
                                            <div class="col-md-6" id="order-list-price">NIS</div>
                                        </div>
                                    </div>

                                    {{--<div class="panel panel-default" style="border:none;">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--Do you have 5 or more usernames? Get a discount based on the quantity of--}}
                                            {{--one-time purchase--}}

                                            {{--<a href="#" class="T2"><span--}}
                                                        {{--class="glyphicon glyphicon-question-sign"></span></a>--}}
                                            {{--<p id="Html" class="Html" style="display:none">--}}

                                                {{--<span class="tt_div">Quantity Discount</span> <br><br>--}}

                                                {{--Discount based on the quantity of one-time purchase: <br><br>--}}
                                                {{--5 usernames and more:5% <br>--}}
                                                {{--10 usernames and more:10%<br>--}}
                                                {{--15 usernames and more:15%<br>--}}
                                                {{--20 usernames and more:0%<br>--}}
                                                {{--25 usernames and more:25%<br>--}}
                                            {{--</p>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="row">
                                        {{--<form>--}}
                                        <div class="col-md-12">
                                            @if(isset($userDetails) && !empty($userDetails))
                                                @foreach($userDetails as $key=>$value)
                                                    <div class="col-md-5 usercheck padgmrgn">
                                                        <span class="usrpic">
                                                        <img width="40" height="40" src={{$value['profile_pic_url']}}></span>
                                                        <span class="usrnm" style="color: skyblue">{{$value['username']}}</span>
                                               <span>
                                                  <div class="checkbox pull-right">
                                                      <label>
                                                          <input type="checkbox" class="insta-user-id"
                                                                 data-instaUserId="{{$value['ins_user_id']}}"
                                                                 name="checklist[]" value="">
                                                          <span class="cr"><i
                                                                      class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                      </label>
                                                  </div>
                                               </span>
                                                    </div>
                                                @endforeach

                                            @else
                                                <span style="color:red">No Instagram account is added!!! Please add atleast one instagram account.  </span>
                                            @endif

                                        </div>
                                        <div class="row text-center">
                                        <button class="btn btn-success extrpading goToPackage" >
                                            <i class="m-icon-swapleft m-icon-white"></i>back</button>
                                        <button class="btn btn-success extrpading" id="proceed">
                                            proceed<i class="m-icon-swapright m-icon-white"></i></button>
                                        </div>
<div class="row text-center">
                                        <span class="grey">Go next to view total and checkout </span>
</div>
                                    </div>

                                </div>

                                <!--//End Pricing -->
                            </div>
                        </div>`
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="order-checkout">
        <div class="page-content">
            <br>
            <div class="container">
                <div class="col-md-8 col-md-offset-2" style="background:#fff;">
                    <h3 class=""><b style="color: #545456;">Order</b></h3>
                    <ol class="breadcrumb">
                        <li><a href="#" onclick="return false;"  class="goToPackage">Package</a></li>
                        <li><a href="#" onclick="return false;" class="goToUserSelection">Usernames</a></li>
                        <li class="active">Checkout</li>
                    </ol>
                    <br>
                    <!--motivatinal images-->

                    <!-- BEGIN INLINE NOTIFICATIONS PORTLET-->
                    <div class="portlet">
                        <div class="portlet-body">
                            <div class="row"><!--margin-bottom-40-->
                                <!-- Pricing -->
                                <div class="col-md-12">

                                    <div class="panel panel-default das">
                                        <div class="panel-body">
                                            <div class="col-md-4 hedclr">Item</div>
                                            <div class="col-md-4 hedclr">Price</div>
                                            <div class="col-md-4 hedclr">Quantity</div>
                                            <div class="col-md-4" id="Order-Item"></div>
                                            <div class="col-md-4" id="Order-Price"></div>
                                            <div class="col-md-4" id="Order-Quantity"></div>
                                        </div>
                                    </div>

                                    {{--<div class="panel panel-default" style="border:none;">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--Do you have 5 or more usernames? Get a discount based on the quantity of--}}
                                            {{--one-time purchase--}}

                                            {{--<a href="#" class="T2"><span--}}
                                                        {{--class="glyphicon glyphicon-question-sign"></span></a>--}}
                                            {{--<p id="Html" class="Html" style="display:none">--}}

                                                {{--<span class="tt_div">Quantity Discount</span> <br><br>--}}

                                                {{--Discount based on the quantity of one-time purchase: <br><br>--}}
                                                {{--5 usernames and more:5% <br>--}}
                                                {{--10 usernames and more:10%<br>--}}
                                                {{--15 usernames and more:15%<br>--}}
                                                {{--20 usernames and more:0%<br>--}}
                                                {{--25 usernames and more:25%<br>--}}
                                            {{--</p>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="row">
                                        <div class="col-md-12 ">

                                            <h4 id="total-Amount" class="col-md-offset-5">Total&nbsp:&nbsp </h4>

                                        </div>



                                        {{--<form action="/user/makePayment" method="post" id="paypalForm">--}}
                                            <form action="/express/payment/request" method="post" id="paypalForm">

                                            <input type="text" name="packageId" id="packageId" hidden>
                                            <input type="text" name="instaUserId" id="instaUserId" hidden>
                                            <input type="text" name="qantity" id="qantity" hidden>
                                            <input type="text" name="paymentType" id="paymentType" hidden>


                                            {{--<div class="col-md-6 text-center">--}}
                                            {{--<a href="#" class="btn btn-success" style="width:100%;">--}}
                                            {{--<span class="glyphicon glyphicon-credit-card"--}}
                                            {{--aria-hidden="true"></span>--}}
                                            {{--Pay with Card--}}
                                            {{--</a>--}}
                                            {{--<br>--}}
                                            {{--<span class="grey">Secure card payments processed by <a--}}
                                            {{--href="#">Stripe</a></span>--}}
                                            {{--</div>--}}


                                            <div class="col-md-12">
                                                {{--<a href="#" class="btn btn-success" style="width:100%;">--}}
                                                {{--<span class="fa fa-paypal" aria-hidden="true"></span>--}}
                                                {{--Pay with PayPal--}}
                                                {{--</a>--}}
                                                <div class="text-center row">
                                                <span class="grey" style="padding-bottom:7px;">Secure payments processed by</span>
                                                </div>
                                                <div class="text-center row">
                                                <button class="btn btn-success goToUserSelection">
                                                    <i class="m-icon-swapleft m-icon-white" ></i>back</button>
                                                <button class="btn btn-success" id="paypalSubmit" type="submit">PayPal
                                                </button>
                                              </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                                <!--//End Pricing -->
                            </div>
                        </div>
                    </div>
                    <!-- END INLINE NOTIFICATIONS PORTLET-->
                </div>

            </div>
        </div>
    </div>

    <div class="modal"><!— this is for loading image —></div>
    @endsection

    @section('pagejavascripts')
            <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script src="/assets/user/js/loadingoverlay.js"></script>

    <script src="/assets/user/js/moment.js"></script>
    <script src="/assets/user/js/toastr.min.js"></script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">

        var now = moment();

        var currentTime = moment(now).unix();
        var nextNMonths = (moment().add(3, 'months')).unix();
        var nextNMonthsTime = nextNMonths - currentTime;

        console.log(currentTime);
        console.log(nextNMonthsTime)
        console.log(nextNMonths);

        console.log('----------------');

        var totalNumberOfDays = moment(now).daysInMonth();
        for (var i = 1; i < 3; i++) {
            totalNumberOfDays += moment(moment().add(i, 'months')).daysInMonth();
        }

        console.log(60 * 60 * 24 * totalNumberOfDays);


        $(function () {
            $('a[title]').tooltip();
        });
    </script>
    <script type="text/javascript">
        toastr.options = {
            timeOut: 4000,
            extendedTimeOut: 100,
            tapToDismiss: true,
            "preventDuplicates": true,
            "preventOpenDuplicates": true,
            debug: false,
            fadeOut: 10,
            positionClass: "toast-top-right",
            limit: 1
        };

        // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
        $('.read-more-content').addClass('hide')
        $('.read-more-show, .read-more-hide').removeClass('hide')

        // Set up the toggle effect:
        $('.read-more-show').on('click', function (e) {
            $(this).next('.read-more-content').removeClass('hide');
            $(this).addClass('hide');
            e.preventDefault();
        });

        $(document).ready(function () {

            $('#myCarousel').carousel({
                interval: 10000
            })
            $('.fdi-Carousel .item').each(function () {
                var next = $(this).next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));

                if (next.next().length > 0) {
                    next.next().children(':first-child').clone().appendTo($(this));
                }
                else {
                    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
                }
            });
            var price;      //glb
            var checked;

            $('.goToPackage').click(function(){
                $('.package-list').show();
                $('.order-list').hide();
                $('.order-checkout').hide();


                $('#order-list-item').text('');
                $('#Order-Item').text('');

                $('#order-list-price').text('');
                $('#Order-Price').text('');

                $('#Order-Quantity').text('');
                $('#total-Amount').text('');
                price=0;
                checked=0;


            })
            $('.goToUserSelection').click(function(e){
                e.preventDefault();
                $('.package-list').hide();
                $('.order-list').show();
                $('.order-checkout').hide();

//
                $('#qantity').text('');
                $('#Order-Quantity').text('');
                $('#total-Amount').text('');

            })


            $(".Package-clickhere").click(function () {
                console.log("came hereee");
                var packageid = $(this).attr("data-value");
                var id_package = $(this).attr("data-id");
                $('#packageId').val(id_package);
                console.log(packageid);
                var first = packageid.split(',');
                var package_time = first[0];
                price = first[1];
                console.log(first[0]);
                $('#order-list-item').append(package_time);
                $('#Order-Item').append(package_time);

                $('#order-list-price').append(price);
                $('#Order-Price').append(price);
                $('.package-list').hide();
                $('.order-list').show();


            });

            $('.order-list').hide();
            $('.order-checkout').hide();

            $("#proceed").click(function () {

                var instaUserId = [];

                $('input.insta-user-id:checkbox:checked').each(function () {
                    instaUserId.push($(this).attr('data-instaUserId'));
                });

                console.log(instaUserId);
                console.log(instaUserId.join(','));
                if(instaUserId.length==0){
                    toastr.error('Please Choose Instagram Accounts For Making Payment')
                    return false;
                }

                $('#instaUserId').val(instaUserId.join(','));

                $('.order-list').hide();
                $('.order-checkout').show();
               checked = $("input[type=checkbox]:checked"); //find all checked checkboxes + radio buttons
//            alert(checked.length);
//                console.log(checked.length);
                $('#Order-Quantity').append(checked.length);
                $('#qantity').val(checked.length);
//
                var totalamount = price * checked.length;
                $('#total-Amount').append(totalamount);

            });
            $('#paypalSubmit').click(function(e){
                e.preventDefault();
                isFromSubmit=true;
                $("body").addClass("loading");
                $('#paypalForm').submit();
            })
            var errMsg="{{Session::has('validationErrMessage')}}";
            if(errMsg)
            {
                toastr.error('Please Select Atleast One Instagram Account for Payment');
            }
            var serviceErrMsg="{{Session::has('message')}}";
            if(serviceErrMsg)
            {
                toastr.error('{{Session::get('message')}}');
            }
            var paymentCancel="{{Session::has('cancelMessage')}}";
            if(paymentCancel)
            {
                toastr.warning('{{Session::get('cancelMessage')}}');
            }
        });


    </script>
    <!-- END PAGE LEVEL PLUGINS -->
@endsection