
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
                        <h2><b>Privacy Policy</b></h2>
                    </div>

                    <div class="col-md-10 col-md-offset-1">

                        <p>This policy set covers how Instaffic uses and protects any kind of information you share with us while using the site. We value your privacy and ensure to adapt all sorts of measures to safeguard your personal information.</p>
                        <p>All kinds of personal information received during ordering procedure and website usage are kept intact and we do not sell or re-distribute such information to anyone under any circumstances.
                        </p>
                        <p>If we ask you to provide any information you may proceed without any hesitation as we assure you it will be used in accordance with the privacy statement.</p>
                        <br>
                        <h3><b>What We Intend To Collect:</b></h3>
                        <p>We primarily collect these following information:</p>

                        <ul>
                            <li>Name.</li>
                            <li>Contact Information (mainly Email address).</li>
                            <li>PayPal Email (for sending affiliate share)</li>
                        </ul>
                        <br>
                        <p>We require this personal information to clearly understand your needs and provide you with a more enhanced service. Besides this we also need this information for the following purposes:</p>

                        <ul>
                            <li>Maintenance of an internal record.
                            </li>
                            <li>In order to improve our services in accordance with your needs and requirements.
                            </li>
                            <li>We periodically send special offers and promotional emails regarding our latest products which you might find interesting.</li>

                        </ul><br>


                        <h3><b>Security:</b></h3>

                        <p>We are committed to ensuring that your personal information stays safe and sound. In order to eliminate unauthorized access and disclosure of personal information, we have implemented suitable electronic, physical and managerial procedures to secure data collected online. </p>

                        <p>Your security is our priority, so we adapt the most innovative and tested measures in order to maintain the confidentiality of account details as in:</p>


                        <ul>

                            <li>Saving passwords in the encrypted format so as to avoid any form of data leakage.
                            </li>

                            <li>Performing all sorts of liking a following activities in a secured and timely manner, minimizing all possible chances of your official account from getting blocked by Instagram. Thus offering you 100% guarantee in terms of secured account usage.
                            </li>

                            <li>We never intend to sell/share/leak your personal email to the third parties without your consent. However we may use your personal information to share promotional information (optional) regarding third parties which you might be interested in.
                            </li>

                        </ul><br>
                        <p>A client’s security is undoubtedly our first priority and we do not intend to jeopardize it at any circumstances- that our commitment.  </p>

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