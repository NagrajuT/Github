@extends('User::layouts.bodyLayout')

@section('title','Welcome')

@section('headcontent')
        <!-- BEGIN PAGE LEVEL STYLES -->
<style>
    .error-msg {
        color: red;
    }


</style>

{{--<link rel="stylesheet" href="/assets/user/css/jRoll.css">--}}
<!-- END PAGE LEVEL STYLES -->
@endsection

@section('content')
    {{--PAGE CONTENT GOES HERE--}}
    {{--<div id="demo"></div>--}}
    <div class="container">
        <h3 class=""><b style="color: #545456;">WELCOME {{Session::get('instaffic_user')['email']}}</b>
            <i class="fa fa-twitch fa-2x" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>
        </h3>
        <br>
    </div>

    <div class="page-content" style="min-height: 335px;">
        <br>

        <div class="container-fluid">
            <div class="row">
                <div class="board">

                    <div class="board-inner">
                        <h2> welcome to SMARTFFIC </h2>
                        <span style="text-align: right">{{Session::get('instaffic_user')['email']}}</span>
                        <br>
                        <h3>Social media that works 24x7 on instagram profile to increase real followers, likes &
                            comments</h3>
                    </div>

                </div>
            </div>
        </div>
    </div>



    @endsection

    @section('pagejavascripts')
            <!-- BEGIN PAGE LEVEL PLUGINS -->

    <!-- END PAGE LEVEL PLUGINS -->
@endsection