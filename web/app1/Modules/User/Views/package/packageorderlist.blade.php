@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('headcontent')

    <link href="/assets/user/css/pricing-table.css" rel="stylesheet" type="text/css"/>
    <style>

        .breadcrumb > li + li::before {
            display: inline;
        }
        .carousel-inner.onebyone-carosel { margin: auto; width: 90%; }
        .onebyone-carosel .active.left { left: -33.33%; }
        .onebyone-carosel .active.right { left: 33.33%; }
        .onebyone-carosel .next { left: 10.33%; }
        .onebyone-carosel .prev { left: -10.33%; }
    </style>

@endsection

@section('active_profilePromotions','active')
@section('content')
    {{--{{dd($data)}}--}}
    {{--PAGE CONTENT GOES HERE--}}
    <div class="order-list">
            <!-- BEGIN PAGE CONTENT -->
            <div class="page-content">
                <br>
                <div class="container">
                    <div class="col-md-8 col-md-offset-2" style="background:#fff;">
                        <h3 class=""><b style="color: #545456;">Order</b></h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Package</a></li>
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
                                                <div class="col-md-6">{{$data['packageDetails']['package_time_month']}}</div>
                                                <div class="col-md-6">NIS {{$data['packageDetails']['price']}}</div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default" style="border:none;">
                                            <div class="panel-body">
                                                Do you have 5 or more usernames? Get a discount based on the quantity of one-time purchase

                                                <a href="#" class="T2"><span class="glyphicon glyphicon-question-sign"></span></a>
                                                <p id="Html" class="Html" style="display:none">

                                                    <span class="tt_div">Quantity Discount</span> <br><br>

                                                    Discount based on the quantity of one-time purchase: <br><br>
                                                    5 usernames and more:5% <br>
                                                    10 usernames and more:10%<br>
                                                    15 usernames and more:15%<br>
                                                    20 usernames and more:0%<br>
                                                    25 usernames and more:25%<br>
                                                </p>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <form>
                                                <div class="col-md-12">

                                                    {{--Select usernames: <a class="noe" href="#">All</a> <a class="noe" href="#">No time</a> <a class="noe" href="#">None</a> <br><br>--}}
                                                    @if($data['userDetails'])
                                                        @foreach($data['userDetails'] as $value)
                                                            <div class="col-md-5 usercheck padgmrgn">
                                                                <span class="usrpic"><img width="40" src={{$value['profile_pic_url']}}></span>
                                                                <span class="usrnm"><a href="#">{{$value['username']}}</a></span>
                                               <span>
                                                  <div class="checkbox pull-right">
                                                      <label>
                                                          <input type="checkbox" name="checklist[]" value="">
                                                          <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                      </label>
                                                  </div>
                                               </span>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                {{--<a href="/CheckoupPackage/{{$data['packageDetails']['package_time_month']}}/{{$data['packageDetails']['price']}}/" class="btn btn-success extrpading col-md-offset-5">Next</a>--}}
                                                <p style="text-align: center;">
                                                    <input type="button" class="btn btn-success extrpading col-md-offset-5" name="btn1" value="proceed" onClick="countCheckboxes(this.form)">
                                                </p>
                                                <br>
                                                <span class="grey col-md-offset-4">Go next to view total and checkout </span>
                                            </form>
                                            {{--<form action="/user/makePayment" method="post">--}}
                                            <form action="/user/CheckoupPackage/" method="post">
                                                <div id="checkout" hidden>
                                                    <h1>
                                                        subscription id: {{$data['packageDetails']['time_package_id']}}<br>
                                                        subscription type:  @if($data['packageDetails']['package_type']=='P') Private @else Business @endif<br>

                                                        Total Quantity: <span id="totalQuantity"></span><br>

                                                        Total Price:<span id="totalAmount"></span><br>

                                                    </h1>
                                                </div>
                                                <div>
                                                    <input type="text" name="packageId" value="{{$data['packageDetails']['package_time_month']}}" hidden="true">
                                                    <input type="text" name="totalPrice" id="totalPrice" value="{{$data['packageDetails']['price']}}" hidden="true">
                                                    <input type="text" name="instaUserId" id="instauid" value="" hidden="true">

                                                    <button type="submit" >Submit</button>
                                                </div>

                                            </form>


                                        </div>

                                    </div>

                                    <!--//End Pricing -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </div>




    @endsection

    @section('pagejavascripts')
            <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script src="/assets/user/js/loadingoverlay.js"></script>
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

        // For Tolltip:
        $(document).ready(function () {

            $(".T1").Tooltip();

            $(".T2").Tooltip({
                content: function ($element, $tooltip) {
                    return $element.parent().find('.Html').html();
                }
            });


        });
        function checkbox(){
            var elemsts=$('#id').val();
            var count=0;
            for (var i=0; i<elemsts.length; i++) {
                if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) {
                    count++;
                    document.getElementById('division').innerHTML = count;
                }
            }
        }

        // JQuery
        (function ($) {

            // Tooltip
            $.fn.Tooltip = function (options) {

                var defaults = {
                    class: 'Tooltip',
                    content: '',
                    delay: [200, 200],
                    cursor: false,
                    offset: [0, 1],
                    hide: function ($element, $tooltip) {
                        $tooltip.fadeOut(200);
                    },
                    show: function ($element, $tooltip) {
                        $tooltip.fadeIn(200);
                    }
                };

                var options = $.extend({}, defaults, options);

                var identity = "Tooltip_" + Math.floor(Math.random() * (9999 - 2000 + 1) + 2000);

                var info = { ready: false, shown: false, timer: null, title: '' };

                $(this).each(function (e) {

                    var $this = $(this);
                    info.title = $this.attr('title') || '';

                    // Mouse enter
                    $this.mouseenter(function (e) {

                        if (info.ready) {

                            var $tooltip = $("#" + identity);

                        } else {

                            var $tooltip = $("<div>").attr("id", identity).attr("class", options.class).appendTo('body');

                            $tooltip.html(options.content != '' ? (typeof options.content == 'string' ? options.content : options.content($this, $tooltip)) : this.title);

                            info.ready = true;
                            $this.attr('title', '');

                        }

                        if (options.cursor) {

                            var position = [e.clientX + options.offset[0], e.clientY + options.offset[1]];

                        } else {

                            var coordinates = $this[0].getBoundingClientRect();

                            var position = [

                                (function () {

                                    if (options.offset[0] < 0)
                                        return coordinates.left - Math.abs(options.offset[0]) - $tooltip.outerWidth();
                                    else if (options.offset[0] === 0)
                                        return coordinates.left - (($tooltip.outerWidth() - $this.outerWidth()) / 2);
                                    else
                                        return coordinates.left + $this.outerWidth() + options.offset[0];

                                })(),

                                (function () {

                                    if (options.offset[1] < 0)
                                        return coordinates.top - Math.abs(options.offset[1]) - $tooltip.outerHeight();
                                    else if (options.offset[1] === 0)
                                        return coordinates.top - (($tooltip.outerHeight() - $this.outerHeight()) / 2);
                                    else
                                        return coordinates.top + $this.outerHeight() + options.offset[1];

                                })()

                            ];
                        }

                        $tooltip.css({ left: position[0] + 'px', top: position[1] + 'px' });

                        timer = window.setTimeout(function () {
                            options.show($this, $tooltip.stop(true, true));
                        }, options.delay[0] || 0);

                        $("#" + identity).mouseenter(function() {
                            window.clearTimeout(timer);
                            timer = null;
                        });

                        $("#" + identity).mouseleave(function () {
                            timer = setTimeout(function () {
                                options.hide($this, $tooltip);
                            }, options.delay[1]);
                        });

                    }), // Mouse enter

                            $this.mouseleave(function (e) {
                                window.clearTimeout(timer);
                                timer = null;
                                options.hide($this, $("#" + identity).stop(true, true));
                            }) // Mouse leave

                }); // Each

            }; // Tooltip

        })(jQuery); // JQuery

        // Changes contributed by @diego-rzg
    </script>

    <script type="text/javascript">

        function countCheckboxes(form)
        {
            var obj;
            var totalQuantity=0;
            // console.log($user['username']}})
            var arr=[];
            for (var i=0; i<form.elements.length; i++) {
                obj = form.elements[i];
                if (obj.type == "checkbox" && obj.checked) {
                    // if (obj.name == "cb0") {
                    arr.push(obj.name)
                    totalQuantity++;
                    // }
                }
                console.log(arr)
            }

            var amount="{{$data['packageDetails']['price']}}";

            var total=amount*totalQuantity




            if(totalQuantity!=0)
            {
                $('#checkout').show();
                $('#totalPrice').val(total);
                $('#totalAmount').text(total);

                $('#instauid').val(arr)
                $('#totalQuantity').text(totalQuantity);
            } else{
                window.alert('Please select atleats one username');
            }
        }

    </script>

    <!-- END PAGE LEVEL PLUGINS -->
@endsection