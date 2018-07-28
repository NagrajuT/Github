@extends('User::layouts.bodyLayout')

@section('title','Not Found(#404)')

@section('headcontent')

@endsection

@section('content')

    <!-- END HEADER -->
    <!-- BEGIN PAGE CONTAINER -->

    <div class="page-content">
        <div class="container">

            <div class="row">

                <!-- Begin: life time stats -->
                <div class="portlet light" style="background: #eff3f8">
                    <div class="">
                        <h1><b>Not Found (#404)</b></h1>
                        <br>
                        <div class="alert alert-danger">Page not found.</div>
                        <p>The requested URL [URL] was not found on this server.
                            <br>
                            Please contact support team if you think this is an error of the system. Thank you!  </p>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT -->
        </div>
    </div>

@endsection


@section('pagejavascripts')

@endsection

