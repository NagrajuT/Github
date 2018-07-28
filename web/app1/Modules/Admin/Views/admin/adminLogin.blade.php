<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Instaffic | Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="/assets/admin/global/plugins/jquery.min.js" type="text/javascript"></script>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="/assets/admin/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/assets/admin/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/assets/admin/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="/assets/admin/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="/assets/admin/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="javascript:;">
        <img width="200" src="/assets/user/images/instaffic_logo.png" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="/admin/login" method="post">
        <h3 class="form-title">Login to your account</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
			<span>Enter Username and Password. </span>
        </div>
        <div class="error" style="color:red"><b>{{ $errors->first('message') }}</b></div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                       value="{{old('email')}}"  name="email"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password"
                       name="password"/>
            </div>

        </div>
        <div class="form-actions">
            <button type="submit" class="btn blue pull-right">
                Login <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>

        <div class="forget-password">
            <h4>Forgot your password ?</h4>
            <p>
                no worries, click <a href="javascript:;" id="forget-password">
                    here </a>
                to reset your password.
            </p>
        </div>

    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="javascript:;" method="post">
        <h3>Forget Password ?</h3>
        <p>
            Enter your e-mail address below to reset your password.
        </p>
        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                       name="email"/>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn">
                <i class="m-icon-swapleft"></i> Back
            </button>
            <button type="submit" class="btn blue pull-right">
                Submit <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->

    <!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    2017 &copy; Instaffic - All Rights Reserved.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/assets/admin/global/plugins/respond.min.js"></script>
<script src="/assets/admin/global/plugins/excanvas.min.js"></script>
<![endif]-->

<script src="/assets/admin/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/assets/admin/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/admin/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/admin/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/admin/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/assets/admin/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();
        Demo.init();
        // init background slide images
        $.backstretch([
                    "/assets/admin/admin/pages/media/bg/1.jpg",
                    "/assets/admin/admin/pages/media/bg/2.jpg",
                    "/assets/admin/admin/pages/media/bg/3.jpg",
                    "/assets/admin/admin/pages/media/bg/4.jpg"
                ], {
                    fade: 1000,
                    duration: 8000
                }
        );
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>

