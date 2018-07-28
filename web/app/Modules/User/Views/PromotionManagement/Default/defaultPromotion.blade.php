@extends('User::layouts.bodyLayout')

@section('headcontent')
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/user/css/sweetalert.css">
@endsection

@section('active_profilePromotion','active')
@section('content')

    <!-- END HEADER -->
    <!-- BEGIN PAGE CONTAINER -->

    <div class="page-content">
        <div class="container">

            <div class="row">

                <!-- Begin: life time stats -->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs fa-2x font-green-sharp" aria-hidden="true"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Default Promotion Management</span>
                            <span class="caption-helper"> (Which account do you want to promote for Default Promotion...)</span>
                        </div>
                    </div>


                    <div class="portlet-body">
                        @if($status=='success')
                            @if(isset($accountList) && !empty($accountList))
                                <div class="row stat">
                                    <p style="padding-top: 5px; color: rgb(255, 255, 255);" align="center">Which account do you want to promote for Filter Promotion</p>

                                    <div class="col-md-4 col-md-offset-4">

                                        <div class="col-md-12" style="margin-top: 10px;">
                                            <select name="instaUserId" id="instaUserId" class="form-control"
                                                    style="border:1px solid #7d888e; border-radius:5px;">
                                                <option value="">-- Please select Account --</option>
                                                @if(isset($accountList) && !empty($accountList))

                                                    @foreach($accountList as $key=>$value)
                                                        <option value="{{$value['ins_user_id']}}"  data-is_logged_in="{{$value['is_logged_in']}}"
                                                                data-is_user_disconnected="{{$value['is_user_disconnected']}}"  data-has_account_locked="{{$value['has_account_locked']}}" >
                                                            <div>
                                                                <img src="{{$value['profile_pic_url']}}"
                                                                     alt="Profile Pic">
                                                                {{$value['username']}}
                                                            </div>

                                                        </option>
                                                    @endforeach

                                                @else
                                                    <option>-- No Account Found --</option>
                                                @endif

                                            </select>
                                        </div>

                                        <div class="col-md-12 text-center" style="margin-top: 10px;">
                                            <button class="btn btn-success" id="submitBtn" type="submit">Submit</button>
                                        </div>

                                    </div>

                                </div>
                                <br>

                                <div class="row text-center" id="noAccountFoundMsg" hidden>
                                    <div class="row text-center">
                                        <img src="/assets/user/images/warning_error.png" alt="" width="100">
                                        <br><br>

                                        <div style="padding:12px;color: red">This Account has been disconnected
                                            from
                                            Smartffic System !!!
                                            <br>
                                            Please Re-Connect Your Account
                                            <br>
                                            <br> <br>
                                            Go To <u><a href="/user/dashboard" style="color: red">Account
                                                    Activation </a></u> -- >
                                            Choose Account -->More -->Re-Connect Account
                                        </div>

                                        <br><br>

                                    </div>
                                </div>

                            @else
                                <div class="row text-center">
                                    <img src="/assets/user/images/warning_yellow.png" alt="" width="100">
                                    <br><br>
                                    <div style="padding:12px;">No Instagram Account Added !!!
                                        <br>
                                        Please Add Atleast one Account
                                        <br>
                                        <br> <br>
                                        Go To <a href="/user/dashboard">Account Activation </a> -- > Add Account
                                    </div>

                                    <br><br>

                                </div>
                            @endif
                        @else
                            <div class="row text-center">
                                <img src="/assets/user/images/warning_error.png" alt="" width="100">
                                <br><br>
                                <div style="padding:12px; color: red">
                                    <p>Error in API service due to this reasion</p>
                                    {{$message}}
                                </div>
                                <br><br>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('pagejavascripts')

    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>

    <script>
        $(document).ready(function () {

            $(document.body).on('click', '#submitBtn', function (e) {
                e.preventDefault();
                var obj = $('#instaUserId option:selected');

                var instaUserId = obj.val();

                if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This Account has been disconnected from Smartffic System!!!</small>",
                        text: "<span>Click <a href='/user/dashboard'>here</a> to activate this account</span>",
                        html: true
                    });
                    return false;
                }

                if (instaUserId.length == 0) {
                    toastr.options = {
                        timeOut: 2000,
                        fadeOut: 10,
                        positionClass: "toast-top-right"
                    };
                    toastr.error("Please select Account first");
                    $('#instaUserId').focus();

                    return false;
                }

                window.location.href = '/default/promotion/' + instaUserId;


            })
        })


    </script>
@endsection

