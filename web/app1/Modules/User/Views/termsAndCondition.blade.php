
        <!--Created by GLB-269 on 23-06-2016.--><!DOCTYPE html>
    <html>
    <head>
        <title>Instaffic</title>
        <meta charset="UTF-8">
        <meta name="description" content="Get real Instagram likes and followers">
        <meta name="keywords"
              content="get instagram followers, get instagram likes, instagram, istagram real likes, instgram real followers">
        <meta name="author" content="instaffic, Rajesh kumar sah,Fron-tend developer">
        <!-- CSS Files-->
        <meta name="theme-color" content="#B42F4B">
        <link rel="icon" href="/assets/user/images/fav.ico" type="image/x-icon"/>

        <link href="/assets/user/css/main.css" rel="styleSheet">
        <link href="/assets/user/css/reset.css" rel="styleSheet">
        <link href="/assets/user/css/font-ions.css" rel="styleSheet">
        <link href="/assets/user/user-panel/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/user/user-panel/global/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">

    </head>
    <body>
    <div class="body">


        <!--Header section-->
        <div class="mobile-navbar">
            @if(!Session::has('instaffic_user'))
                <ul class="navbar-list" >
                    <li><a href="/about/us">About</a></li>
                    <li><a href="/?type=system">System Services</a></li>
                    <li><a href="/?type=price">Prices</a></li>
                    <li><a href="/?type=blog">Blog</a></li>
                    <li><a href="/?type=support">Support</a></li>
                    <li><a  href="/?type=login">Log In</a></li>
                    <li><a href="/?type=signup">Sign up</a></li>
                </ul>
            @else
                <ul class="navbar-list" >
                    <li><a href="/about/us">About</a></li>
                    <li><a href="/home?type=system">System Services</a></li>
                    <li><a href="/home?type=price">Prices</a></li>
                    <li><a href="/home?type=blog">Blog</a></li>
                    <li><a href="/home?type=support">Support</a></li>
                    <li><a href="/user/dashboard">Dashboard</a></li>
                    <li ><a href="/user/dashboard">{{Session::get('instaffic_user')['email']}}</a></li>
                    <li><a  href="/user/logout" >LOG OUT</a></li>
                </ul>
            @endif
        </div>
        <header>
            <nav class="navbar-menu" style="background: #4b097d">
                <div class="container">
                    <div class="flags">
                        <ul>
                            <li><a href="#"><img src="/assets/user/images/flags/israel.svg" title="Israel" alt="Israel"></a>
                            </li>
                            <li><a href="#"><img src="/assets/user/images/flags/us.svg" alt="USA" title="English"></a></li>
                            <li><a href="#"><img src="/assets/user/images/flags/arabia.svg" alt="Arabic" title="Arabic"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="logo" style="margin-top: -45px;"><a href="/?type=instaffic"><img src="/assets/user/images/instaffic_logo.png" width="250"></a></div>

                    @if(!Session::has('instaffic_user'))
                        <ul class="navbar-list"  style="margin-bottom: 0;width: 76%;">
                            <li><a href="/about/us">About</a></li>
                            <li><a href="/?type=system">System Services</a></li>
                            <li><a href="/?type=price">Prices</a></li>
                            <li><a href="/?type=blog">Blog</a></li>
                            <li><a href="/?type=support">Support</a></li>
                        </ul>
                    @else
                        <ul class="navbar-list"  style="margin-bottom: 0;">
                            <li><a href="/about/us">About</a></li>
                            <li><a href="/home?type=system">System Services</a></li>
                            <li><a href="/home?type=price">Prices</a></li>
                            <li><a href="/home?type=blog">Blog</a></li>
                            <li><a href="/home?type=support">Support</a></li>
                            <li><a href="/user/dashboard">Dashboard</a></li>
                        </ul>
                    @endif
                    @if(!Session::has('instaffic_user'))
                        <ul class="right-navbar-list" style="margin-bottom: 0;">
                            <li><a href="/?type=login" class="pull-left"   style="background: #fff; color:#4B097D;padding: 6px 15px 3px;border-radius: 3px; margin-right:5px;">Log in</a>
                                <a href="/?type=signup" class="pull-left" style="background: #fff; color:#4B097D;padding: 6px 15px 3px;border-radius: 3px;">Sign up</a></li>
                        </ul>
                    @else
                        <ul class="right-navbar-list" style="margin-bottom: 0;">
                            <li ><a href="/user/dashboard"  style="text-transform: none;">{{Session::get('instaffic_user')['email']}}</a></li>
                            <li><a  href="/user/logout"  class="pull-left"  style="background: #fff; color:#4B097D;padding: 6px 15px 3px;border-radius: 3px; margin-right:5px;">LOG OUT</a></li>
                        </ul>
                    @endif
                    {{--<ul class="right-navbar-list" style="margin-bottom: 0;">--}}
                        {{--<li><a  href='/' class="login pull-left" data-toggle="modal" data-target="#signin1" style="background: #fff; color:#4B097D;padding: 6px 15px 3px;border-radius: 3px; margin-right:5px;">Log in</a>--}}
                            {{--<a class="pull-left" style="padding: 15px 0"> | </a>--}}
                            {{--<a   href='/' class="login pull-left" data-toggle="modal" data-target="#signup" style="background: #fff; color:#4B097D;padding: 6px 15px 3px;border-radius: 3px;">Sign up</a></li>--}}
                    {{--</ul>--}}
                </div>
            </nav>
            <div class="mobile-navbar-menu"><span></span></div>
        </header>
        <br><br><br><br><br>



        <div id="system" class="alt-section section-service">
            <div class="col-md-12" style="padding: 0px 45px;">
                <div style="text-align: center">
                    <br>
                    <h2><b>Terms of Use:</b></h2>
                </div>

                <div class="col-md-10 col-md-offset-1">


                        <h3><b>1. General:</b></h3>
                        This resembles the latest terms of the service agreement as of (dd/mm/yy). If you desire
                        to browse through and use this website, you are agreeing to comply with the following
                        terms and conditions of using our website. In case you disagree with any particular part
                        of the terms and conditions sections, stop registering and using the Instaffic website.
                        Any sort of review or modification of the existing terms of use will be solely conducted
                        by Instaffic at any point of time. Your continued usage of the website will signify your
                        consent of acceptance to the revised terms.<br><br>

                        <h3><b>2. Services:</b></h3>

                        Instaffic is primarily used for the promotional purposes of your Instagram account and
                        posts. In order to perform such activities, Instaffic requires the official Instagram
                        account credentials. With complete access to your Instagram API, Instaffic will allow
                        you to target users and drive traffic consequently to your account.

                        It follows a legitimate marketing procedure to intensify your account exposure such that
                        you gain real –time organic following using its remarkable features.<br><br>

                        <h4><b>A. Profile management</b></h4>
                        <ul>
                            <li>Managing Instagram Campaigns.</li>
                            <li>Auto-commenting and tagging.</li>
                            <li>Scheduling images with direct messaging.</li>
                            <li>Regular alerts about favorite users along with a status regarding who didn’t
                                follow you back.
                            </li>
                        </ul>
                        <br><br>
                        <h4><b>B. Promotion Management</b></h4>

                        Default promotion of your Instagram account on a 24/7 basis giving you an exposure to
                        over 15000 people
                        Filter promotion leveraging Username, hashtags, geographical location, gender etc.
                        Statistics reports depicting people who followed you, liked your pictures and which
                        particular one, your total profile likes and followings right from the time you started
                        using Instagram.<br><br>

                        <h3><b>C. Affiliate Program</b></h3>
                        <ul>
                            <li>Generating Affiliate links for sharing along with Instagram followers and
                                Facebook friends.
                            </li>
                            <li>Affiliate Statistics and how many of your friends actually subscribed to the
                                program.
                            </li>
                            <li>Balance status corresponding to the Affiliate shares.</li>
                            <br><br>
                        </ul>


                        <h3><b>3. Purchase:</b></h3>

                        <p>You agree that upon purchasing the services provided by us, you clearly understand
                            and agree to what you are purchasing and will not file any sort of fraudulent
                            dispute after purchase or in future.</p>

                        <p>Upon a fraudulent attempt to file a dispute, we hand out full rights, if necessary,
                            to reset the account and all types of liking, following, messaging etc. activities,
                            even terminate your account/block your IP on a permanent basis.</p>

                        <p>Once you have added credits to Instaffic, it is not reversible till the system or the
                            website itself encounters any form of functionality issue. All subscription based
                            services are counted based on the time of registration, thus if you don’t log in or
                            stop using the account- the time will not be adjusted or changes. And Instaffic will
                            hold no such obligations to any kind of refund procedure.</p><br><br>


                        <h3><b>4. Registration:</b></h3><br>

                        <p> By registering and accepting the terms provided in the website you affirm your age
                            being at least or over 13 years, entirely knowledgeable about the terms and
                            conditions set forth in this Terms Of Use section and confirm to abide by those.</p>

                        <p>In order to enjoy the services provided by Instaffic, it is necessary to provide your
                            credentials. On subscribing to a particular usage period of the services provided by
                            Instaffic, you are required to pay the total fee before discontinuing/canceling your
                            subscription.</p><br><br>

                        <h3><b>5. Refund:</b></h3><br>
                        <ul>
                            <li>Hereby you clearly understand and agree that any kind of refunds to PayPal will
                                never be made once the payment(s) are already processed.
                            </li>

                            <li>You also understand and agree that the price of your purchased product might be
                                cut down at any point of time without any prior notice or any form of refunding
                                based on it.
                            </li>

                            <li>As Instaffic offers non-tangible irrevocable products, you agree that once a
                                purchase is being initiated you cannot cancel/remove that purchasable action.
                                Thus it is clear once you have purchased any product from our website the
                                decision will be irreversible.
                            </li>

                            <li>Any refunds to your PayPal account(s) won’t be made once the payment process
                                through PayPal is already commenced.
                            </li>

                            <li>You clearly understand and agree to the fact that once your payment via PayPal
                                is completed and your Instaffic account is being charged, you cannot file a
                                dispute in conflict to any policies. In case such a situation might arise we
                                reserve full rights to suspend your previous and current orders as well as
                                append your account from the site permanently.
                            </li>

                            <li>In the case of your Credit Card/ PayPal account’s theft, if the payment is
                                declared as unauthorized, no refunds will be made. As it is solely your
                                responsibility to safeguard your money and Credit Card/PayPal account(s).
                            </li>

                            <li>We hold the right to cancel any order at any point of time without any form or
                                notice or justification for the cancellation process.
                            </li>

                            <li>Instaffic will not be liable to process any cancel or order refund request for
                                any motive unless it is related to complete system failure.
                            </li>
                            <br><br>

                        </ul>

                        <h3><b>6. Copyright:</b></h3> <br>

                        <p>Without any form prior written consent from an Instaffic representative, you are not
                            permitted to copy/replicate any textual content, imagery or programming used on the
                            Instaffic website.</p>

                        <p>All kinds of brand icons are the trademarks of their respective proprietors and the
                            usage of such trademarks doesn’t always specify the endorsement of trademark
                            holders.</p><br><br>

                        <h3><b> 7. Disclaimer:</b></h3> <br>

                        <p>You agree that your usage of Instaffic is absolutely at your own risk and we will not
                            be held accountable for the damage/impairment it incurs to you/your business.</p>

                        <p>Instaffic doesn’t pledge website uptime or accessibility as it depends on the
                            internet to provide its services.</p>

                        <p>Instaffic is not liable for your account suspension or any discrepancies related to
                            your account.</p><br><br>


                        <h3><b>8. Change of Terms:</b></h3>
                        <p> These terms of service are subject to change at any time. Notices of even a minor
                            change will be considered given and effective from the date it will be posted on the
                            website. No further notice by Instaffic is required upon your usage of our
                            website/software.
                        </p>

                </div>
            </div>
        </div>

        <div class="footer">
            <div class="footer-container">
                <div class="footer-wrapper">
                    <div class="desktop-footer">
                        <div class="col-3">
                            {{--<a href="#" class="logo"><img src="/assets/user/images/instaffic_logo.png" width="150"></a>--}}

                            <div class="copyright" style="padding-top:13px">&copy 2017 Instaffic, All Right Reserved </div>
                        </div>
                        <div class="col-6">
                            @if(!Session::has('instaffic_user'))
                                <ul class="footer-navoigation-list">
                                    <li><a href="/about/us">About</a></li>
                                    <li><a href="/?type=price">Prices</a></li>
                                    <li><a href="/?type=blog">Blog</a></li>
                                    <li><a href="/terms/condition">Terms of Use</a></li>
                                    <li><a href="/privacy/policy">Privacy Policy</a></li>

                                </ul>
                            @else
                                <ul class="footer-navoigation-list">
                                    <li><a href="/about/us">About</a></li>
                                    <li><a href="/home?type=price">Prices</a></li>
                                    <li><a href="/home?type=blog">Blog</a></li>
                                    <li><a href="/terms/condition">Terms of Use</a></li>
                                    <li><a href="/privacy/policy">Privacy Policy</a></li>

                                </ul>
                            @endif
                            {{--<ul class="social-list" style="margin-bottom: 0;">--}}
                            {{--<li><a href="#" target="_blank"><i class="twitter"></i></a></li>--}}
                            {{--<li><a href="#" target="_blank"><i class="facebook"></i></a></li>--}}
                            {{--<li><a href="#" target="_blank"><i class="google"></i></a></li>--}}
                            {{--</ul>--}}
                        </div>
                        <div class="col-3" style="text-align:center"><a href="mailto:support@instaffic.com" class="support">support@instaffic.com</a>
                        </div>
                    </div>
                    <div class="mobile-footer">
                        <div class="col-10 text-center">
                            <a href="mailto:support@instaffic.com" class="support">support@instaffic.com</a>

                            @if(!Session::has('instaffic_user'))
                                <ul class="footer-navoigation-list">
                                    <li><a href="/about/us">About</a></li>
                                    <li><a href="/?type=price">Prices</a></li>
                                    <li><a href="/?type=blog">Blog</a></li>
                                    <li><a href="/terms/condition">Terms of Use</a></li>
                                    <li><a href="/privacy/policy">Privacy Policy</a></li>
                                </ul>
                            @else
                                <ul class="footer-navoigation-list">
                                    <li><a href="/about/us">About</a></li>
                                    <li><a href="/home?type=price">Prices</a></li>
                                    <li><a href="/home?type=blog">Blog</a></li>
                                    <li><a href="/terms/condition">Terms of Use</a></li>
                                    <li><a href="/privacy/policy">Privacy Policy</a></li>

                                </ul>
                            @endif
                        </div>
                        <div class="col-10 text-center">
                            <div class="copyright">© 2017 Instaffic, All Right Reserved</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Model for Error in Mail Verification and REset Password-->

    </div>


    <!--Coded by Vijay Kolar--><!--Javascript Files-->

    <script src="/assets/user/js/jquery.js"></script>
    <script src="/assets/user/user-panel/global/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/user/js/function.js"></script>


    <script src="/assets/user/js/validate.min.js"></script>
    <script src="/assets/user/js/jstz.min.js"></script>



    </body>
    </html>