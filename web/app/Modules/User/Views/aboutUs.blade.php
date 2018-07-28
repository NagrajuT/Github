
<!--Created by GLB-269 on 23-06-2016.--><!DOCTYPE html>
<html>
<head>
    <title>Smartffic</title>
    <meta charset="UTF-8">
    <meta name="description" content="Get real Instagram likes and followers">
    <meta name="keywords"
          content="get instagram followers, get instagram likes, instagram, istagram real likes, instgram real followers">
    <meta name="author" content="smartffic, Rajesh kumar sah,Fron-tend developer">
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
                <div class="logo" style="margin-top: -4px;">
                    <a href="/?type=instaffic">
                        <img src="/assets/user/images/instaffic_logo.png" width="200">
                    </a>
                </div>

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
        <div class="col-md-12" style="padding: 0px 10px 0px;">
            <div style="text-align: center">
                {{--<br>--}}
                <h2><b>About Us</b></h2>
            </div>

            <div class="col-md-10 col-md-offset-1">

                <p>Smartffic from global traffic is one of the only companies in the world that has development of automated system for  promotion, management  and an unprecedented possibility to make money in Instagram.</p>
                <p>Smartffic brings together a team of professionals in the field of marketing and systems development, with more than 7 years of experience in the field, with an emphasis on securing our customers' information and developing breakthrough and advanced ideas.</p>
                <p>If we ask you to provide any information you may proceed without any hesitation as we assure you it will be used in accordance with the privacy statement.</p>
                <p>Smartffic offers a wide range of tools and methods for marketing and advertising in the Instagram  , When everything runs  on our servers 24/7 Without having to be connected to the Internet or downloading any software.</p>
                <br>
                <h3><b><u>The concept behind Smartffic</u></b></h3>
                <p>Instagram is the world's largest platform for sharing photos and videos, in advanced marketing terms, every share is considered advertising - the idea behind the system is to give a lot of exposure to anyone who wants to get the stage they deserve.
                    The more they are exposed to you, the more likely they will follow you, react, do more likes.
                </p>
                <p>More and more times we come across users who say:</p>
                <p>"If only they were exposed to me massively, I would become a leader of public opinion ..."</p>
                <p>"If I had more exposure to my business, my sales would have  been  greater…."</p>
                <p>If you ever wondered how public opinion leaders were created with a large number of followers on the media networks, then the answer is simple but quite confidential.</p>
                <p> A monthly  subscription to a system that creates massive exposure to your profile in Instagram - SMARTFFIC.</p>
                <p>The effect is completely authentic and all followers or likes or reactions are absolutely real - With a commitment!!!</p>
                <p>The same public opinion leaders did not reveal their way of promoting them, but we believe that the stage should be given to everyone.</p>
                <p>Since all the results are real, there is no commitment to the number of growth in followers or likes or reactions, but we are committed to a significant and substantial increase in relation to what you are used to - we believe in ourselves so much that we gave you five days of promotion and use of the system without any obligation or commitment!</p>
                <p>The system is designed for business owners in every field and individuals alike.</p>
                <p>We require this personal information to clearly understand your needs and provide you with a more enhanced service. Besides this we also need this information for the following purposes:</p>
                <br>

                <h3><b><u>Gossip - Profile Management</u></b></h3>
                <p>Our system provides you with extensive information and statistics about data you would like to know, but Instagram prevents you.</p>
                <p>For example, in the profile management panel, you'll know who's exposed to your profile but not following you.</p>
                <p>Who are 15-12 people who have done you the most likes in aggregate in the past two weeks …</p>
                <p>Our system will alert you to any of the people you follow that are within the range you've set up for our system, and you can even send them a chat message ..</p>
                <p>All this is just a small part of a sweeping world we prepared for you ... SMARTFFIC.</p>
                <br>

                <h3><b><u>Promotion Management</u></b></h3>
                <p>A 24/7 promotion system to expose your profile to more than 10,000 different people per month, all by targeting filters such as: people who uploaded a photo to a specific hashtag, people who have made a check in somewhere, male / female, people following a  certain  profile ...</p>
                <p>The more they are exposed to you  they  will follow you more and you'll get more likes and  responses ...</p>
                <p>The world feeds on social feedback, and research shows that the Social networking people suffer  less from symptoms of depression and anxiety.</p>
                <p>Needless to say, that over a certain amount of trackers, any advertising you upload on your profile for promotion is worth money ..</p>
                <p>We maintain a platform that connects advertisers and opinion leaders to register at SMARTFFIC.</p>
                <br>

                <h3><b><u>Affiliate Program</u></b></h3>
                <p>Needless to say how many hours of work, time, research, and resources have been invested in developing the SMARTFFIC system.</p>
                <p>Despite all this, we have developed an affiliate system for you to create a lot of money as our partner.</p>
                <p>All you need to do is enter the afiliat program - and allow our system to send messages to all your followers in Instagram and your Facebook friends.</p>
                <p>This message will be accompanied by a link through which it will be possible to download the application and use the system for free for five days trial.</p>
                <p>When the same person receives a message, he clicks on the link and makes a subscription. You will receive 30% of the subscription fee to your PayPal account every month, and this till he will stop the subscription, if any.</p>
                <p>Of course you will have an extensive statistical system in which you will be familiar with each step and process.</p>
                <p>All this, at the touch of a button, and we will generate money for you every month.</p>
                <br>

                <h3><b><u>Customer Service</u></b></h3>
                <p>We provide 24/7 customer service, consultation and even suggestions for improving and Optimization  of  the system.</p>
                <p>We provide service via chat on the site, Skype, Email, Facebook page, Facebook group, Twitter, Google Plus and more.</p>
                <br>

                <h3><b><u>In conclusion</u></b></h3>
                <p>We are Global Traffic  company , which specializes in creating traffic on social networks.</p>
                <p>Our huge advantage is a huge and real growth of followers and likes all focusing on exposure according to filters that will meet your needs.</p>
                <p>The increase in Followers / reactions / likes is completely authentic, and it's due to the connection of the follower to you only !!!!!</p>
                <p>Smartffic connects you with real accounts.</p>
                <p>Our service helps you build a brand, meet new friends, become a public opinion leader who will earn you a lot of money for every post you upload to your account.</p>
                <p>Are you ready to start getting the exposure you deserve? Do you think you deserve more? Do you want to increase your sales?</p>
                <br><br>


            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-12" style="background: url('/assets/user/images/about_button.jpg') no-repeat; width:100%; height:250px; background-size: cover;">
            <div style="text-align: center; padding-top: 109px;">
                <a class="btn btn-success btn-lg btnblue" style="white-space: normal; " href="/?type=signup"><img src="/assets/user/images/about_icon.png" width="35"> Come and try us with no obligation for 5 days free</a>
            </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-container">
            <div class="footer-wrapper">
                <div class="desktop-footer">
                    <div class="col-3">
                        {{--<a href="#" class="logo"><img src="/assets/user/images/instaffic_logo.png" width="150"></a>--}}

                        <div class="copyright" style="padding-top:13px">&copy 2017 Smartffic, All Right Reserved </div>
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
                    <div class="col-3" style="text-align:center"><a href="mailto:smartffic@gmail.com" class="support">smartffic@gmail.com</a>
                    </div>
                </div>
                <div class="mobile-footer">
                    <div class="col-10 text-center">
                        <a href="mailto:smartffic@gmail.com" class="support">smartffic@gmail.com</a>
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
                        <div class="copyright">© 2017 Smartffic, All Right Reserved</div>
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