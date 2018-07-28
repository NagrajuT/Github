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
                    <p>Please enter your email address. We will send you password reset link to registered email.</p>
                </div>
            </div>
            <form class="subscription-form">
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Enter email address"/>
                    <span class="subscription-button">
                        <button type="submit" id="submit"><img src="/assets/user/images/right-arrow-white.png"/>
                        </button>
                    </span>
                    <br>
                    <span id="error_email_msg" style="color:red;"> </span>

                    <div class="error-message"><p><i></i>Please check your inbox.</p></div>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="/assets/user/js/jquery.js"></script>
<script type="text/javascript">
    $(document.body).on('click', '#submit', function (e) {
        e.preventDefault();

        var email = $('#email').val().trim();


        if (email.length == 0) {
            $('#error_email_msg').text('Enter a valid email');
            $('#email').focus();
            return false;
        } else {
            $('#error_email_msg').text('');
        }

        $.ajax({
            data: {email: email},
            method: 'post',
            dataType: 'json',
            url: '/forgotPassword',
            success: function (response) {

                if (response.status == 'success') {
                    console.log(response.message);

                    $('#successsMessage').html(' <p style="color: green">' + response.message + '</p><p ><i class="icon ion-email"></i>&nbsp;Please check your inbox.</p>')

                    $('.subscription-form').hide();
                } else if (response.status == 'failed') {

                    var htmlText = '';
                    if (jQuery.isArray(response.message)) {
                        $.each(response.message[0], function (key, value) {
                            htmlText += value;
                        });
                    } else {
                        htmlText += response.message;
                    }
                    $('#error_email_msg').text(htmlText);
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