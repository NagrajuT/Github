<html>
<head><title>Instaffic</title>
    <meta charset="UTF-8"/>
    <meta name="description" content="Get real Instagram likes and followers"/>
    <meta name="keywords"
          content="get instagram followers, get instagram likes, instagram, istagram real likes, instgram real followers"/>
    <meta name="author" content="instaffic, vijaykolar, vijay kolar"/>
    <!-- CSS Files-->
    <meta name="theme-color" content="#B42F4B"/>
    <link href="/assets/user/css/main.css" rel="styleSheet"/>
    <link href="/assets/user/css/reset.css" rel="styleSheet"/>
    <link href="/assets/user/css/font-ions.css" rel="styleSheet"/>
    <link href="/assets/user/user-panel/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/user/user-panel/global/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">


    <style>
        .form-margin {
            margin: 5px 5px 5px 5px;

        }
    </style>
</head>

<body id="forgot-password">

<section class="forgot-password">
    <div class="subscription">
        <div class="subscription-container">
            <div class="subscription-wrapper">

                <div class="logo" style="margin-top: -45px;padding-bottom: 30px">
                    <a href="/"><img src="/assets/user/images/instaffic_logo.png" width="250"></a>
                </div>

                <div id="successsMessage">
                    <p>Please enter your email address..</p>
                </div>
            </div>
            @if(isset($ENABLE_ERROR_VIEW) && $ENABLE_ERROR_VIEW==true)
                <h3 style="color: red">
                    Invalid password reset token
                </h3>
            @else

                <div class="row">

                    <form class="">

                        <div class="col-md-12 text-center form-margin">
                            <div class="col-md-5 text-right" style="color:#fff;"> Email:</div>
                            <div class="col-md-7 text-left">
                                <input type="text" disabled="" value="{{$email}}" name="email"
                                       id="email">
                            </div>
                        </div>

                        <div class="col-md-12 text-center form-margin">

                            <div class="col-md-5 text-right" style="color:#fff;"> Password:</div>
                            <div class="col-md-7 text-left"><input type="password" id="password" name="password"
                                                                   placeholder="New Password" readonly
                                                                   onfocus="this.removeAttribute('readonly');"></div>
                        </div>

                        <div class="col-md-12 text-center form-margin">

                            <div class="col-md-5 text-right" style="color:#fff;"> Confirm passowrd:</div>
                            <div class="col-md-7 text-left"><input type="password" placeholder="Confirm New password"
                                                                   name="confirm_password" id="confirm_password"></div>
                        </div>
                        <br>
                        <div class="col-md-12 text-center form-margin">
                            <span style="color: red" id="password_error"></span><br>
                            <span id="successMessage" style="color: limegreen;font-size:16px"></span><br>
                        </div>

                        <div class="col-md-12 text-center form-margin">
                            <input class="btn" id="submit" type="submit">
                        </div>
                    </form>

                </div>
            @endif
        </div>
    </div>
</section>
<script src="/assets/user/js/jquery.js"></script>
<script src="/assets/user/user-panel/global/plugins/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document.body).on('click', '#submit', function (e) {
        e.preventDefault();
        console.log("KNMSAKM")

        var email = $('#email').val().trim();
        var password = $('#password').val().trim();
        var confirmPassword = $('#confirm_password').val().trim();

        if ((password.length == 0) || !(password.length > 5 && password.length < 20)) {
            $('#password_error').text('Invalid Password | Length should be between 6 to 20');
            $('#password').focus();
            return false;
        } else if (confirmPassword != password) {
            $('#password_error').text('Confirm Password should be same as password');
            $('#confirm_password').focus();
            return false;
        } else {
            $('#password_error').text('');
        }

        $.ajax({
            data: {email: email, password: password, confirmPassword: confirmPassword},
            method: 'post',
            dataType: 'json',
            url: '/resetPassword',
            success: function (response) {

                console.log(response);
                if (response.status === 'success') {
                    $('#setNewPassword').hide();
                    $('#successMessage').text(response.message);

                } else if (response.status === 'failed') {
                    var htmlText = '';
                    $.each(response.message, function (key, value) {
                        htmlText += value;
                    });
                    $('#password_error').text(htmlText);
                    $('#successMessage').text('');
                }

            },
            error: function (error, response) {
                console.log(error);
            }
        });

    });
</script>
</body>
</html>