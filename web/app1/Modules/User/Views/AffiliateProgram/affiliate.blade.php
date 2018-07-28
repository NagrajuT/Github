@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('active_affiliateProgram','active')

@section('headcontent')
        <!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/user/css/custom.css" rel="stylesheet" type="text/css"/>
<style>
.error{
    color: red;
}
    #paypalsubmit {
        display: none;
    }

    #paypalsubmit {
        position: relative;
        transition: .5s ease;
        top: 2px;
        left: 380px;
        right: 250px;
        bottom: 100px;
    }
.tooltip.top > .tooltip-inner {
    background-color: #ddd;
    color: black;
    width:200px;
}
</style>
<!-- END PAGE LEVEL STYLES -->
@endsection

@section('content')
    {{--PAGE CONTENT GOES HERE--}}


    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cog fa-2x font-green-sharp" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">AFFILIATE PROGRAM</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                                @if(isset($ErrorMsg) && !empty($ErrorMsg))
                                    <div class="row agree">
                                        <div class="col-md-10 col-md-offset-1 text-center">
                                            <div class="panel panel-default" style="border-radius:8px; padding:10px;border-color:#33CAC2; opacity: 1; max-height: none;">
                                                <h3><b style="color:red">Restriction</b></h3>
                                                <p style="font-size: 18px; font-weight: 600;">{{$ErrorMsg}}</p>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                <div class="row agree">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="panel panel-default" style="border-radius:8px; padding:25px;border-color:#33CAC2; opacity: 1; max-height: none;">
                                            <h3 class="text-center" style="padding-bottom:10px"><b style="color:#4DB3A4">Make a Lot of Money Each Month</b></h3>

                                            <p>Our Affiliate Program gives you the easiest and fastest way to make money online.</p>
                                            <p>We have put a big amount of money and years of development to create Instaffic, now you have the chance to be our partner, so easy, friendly and make a lot of money.</p>
                                            <p>You will get a specific link that relates to your profile.
                                                This links gives the receiver the option to download our application to his mobile or website sign up.
                                            </p>
                                            <p>By getting your permission, we will send to all your friends in facebook and all your followers on instagram a message to try our system for 5 days free</p>
                                            <p>For any of them who will click the link added and subscribe in our system, you will be paid to your paypal account 30% of his package amount (After he pays subscription charges)</p>
                                            <p><b>Give us the permission to make you reach –</b></p>
                                            <p>By giving us the permission, Messages will be send by us to all your friends on facebook and followers in instagram, and you will be paid for each and everyone of them that subscribe (30% of the package will be transferred to your paypal account.)</p>

                                            <p><b>For example:</b></p>
                                            <p>Let’s say we sent messages to 5000 people total (Friends and Followers).
                                                In the message (you can change and write your content as well), you will recommend to download our application and use it for free during 5 days.
                                            </p>
                                            <p>Let’s say that 1000 of them push the link, download the application, and after 5 days of free use they subscribe and paid 150 nis for a particular package.</p>
                                            <p>After they pays subscription charge, you will receive to your paypal account
                                                (150 nis * 1000 people *  0.30 ) =    You will receive 45, 000 nis.
                                            </p>
                                            <p>A lot of money, very easy, very safe, no effort!!!</p>
                                            <br/>
                                            <div class="text-center">
                                                <a href="">
                                                    <button id="agree" class="btn btn-default btn-ag" type="button">Continue</button>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                    <br/>

                                <div class="row agree fill">
                                    <div class="col-md-10 col-md-offset-1 text-center">
                                        <div class="panel panel-default" style="border-radius:8px; padding:10px;border-color:#33CAC2; opacity: 1; max-height: none;">
                                            <h3 style="color:#4DB3A4;"><b>General Information</b></h3>
                                            <br/>

                                            <form role="form" action="/affiliate" method="post" id="affiliateForm"  class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="form-control-label col-sm-3" for="name">Name</label>

                                                    <div class="col-sm-8">
                                                        <input id="name" class="form-control" type="name" required placeholder=""
                                                               name="name" value="{{old('name')}}">
                                                        <div class="error">{{ $errors->first('name') }}</div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label col-sm-3" for="email">E-mail id</label>

                                                    <div class="col-sm-8">
                                                        <span id="email" style="background-color: #eee; text-align: left; cursor: not-allowed;" class="form-control">{{Session::get('instaffic_user')["email"]}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label col-sm-3" for="contact">Contact No.</label>

                                                    <div class="col-sm-8">
                                                        <input id="contact" class="form-control" type="contact" required placeholder=""
                                                               name="contact" value="{{old('contact')}}" >
                                                        <div class="error">{{ $errors->first('contact') }}</div>
                                                    </div>
                                                </div>
                                                <br/>

                                                <h3><b style="color:#4DB3A4;">PayPal Information</b></h3>
                                                <br/>

                                                <div class="form-group">
                                                    <label class="form-control-label col-sm-3" for="uname">Email id</label>

                                                    <div class="col-sm-7" style="padding-right: 0px;">
                                                        <input id="paypalEmail" class="form-control" type="email" required placeholder=""
                                                               name="paypalEmail" value="{{old('paypalEmail')}}" >
                                                        <div class="error">{{ $errors->first('paypalEmail') }}</div>
                                                    </div>
                                                    <div class="col-sm-1" style="padding: 8px 0px 0px;">
                                                        <a href="javascript:;" data-toggle="tooltip" title="Make sure Your paypal email is correct, otherwise you will not get any affiliate benefit">
                                                            <i class="fa fa-info-circle" aria-hidden="true" style="color:#A2ABB7;"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12 text-center">
                                                        <button class="btn btn-default btn-ag back" >Back</button>
                                                        <button class="btn btn-default btn-ag submit" type="submit">Submit</button>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12 text-center">

                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @endif


                        </div>
                    </div>

                </div>
            </div>
        </div>
        @if ($errors->any())
            <input type="text" value="true" hidden id="errorSet"/>
        @endif

    </div>

    @endsection

    @section('pagejavascripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript">
        $(function () {
            $('a[title]').tooltip();
            var flag= $('#errorSet').val();
            if(flag=='true' || flag==true){
            $(".agree").hide("animate");
            $(".fill").show("animate");
            }
            console.log(flag);
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
    <script>
        $(".fill").hide();
        $("#agree").click(function (event) {
            event.preventDefault();
            $(".agree").hide("animate");
            $(".fill").show("animate");
        });
        $(".back").click(function (event) {
            event.preventDefault();
            $(".agree").show("animate");
            $(".fill").hide("animate");
        });

    </script>

    <script src="/assets/user/js/validate.min.js"></script>
    <script type="text/javascript">

        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });

        $("#affiliateForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                paypalEmail: {
                    required: true,
                    email: true
                },

                contact: {
                    required: true,
//                    matches:"[0-9]+",
                    minlength:10,
                    maxlength:14
                }
            },
            messages: {
                email: {
                    required: "Enter a valid email"
                },
                paypalEmail: {
                    required: "Enter a valid Paypal Account email ",
                    email: "Enter a valid Paypal Account email "
                },

                contact: {
                    required: "Enter a valid contact number",
//                    matches: "Enter a valid contact number",
                    minlength: "Enter a valid contact number",
                    maxlength: "Enter a valid contact number"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

    </script>
    <!-- END PAGE LEVEL PLUGINS -->
@endsection