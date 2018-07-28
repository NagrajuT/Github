@extends('User::layouts.bodyLayout')

@section('title','Dashboard')

@section('headcontent')
    <link href="/assets/user/css/pricing-table.css" rel="stylesheet" type="text/css"/>
@endsection

{{--@section('active_profilePromotions','active')--}}
@section('content')
    {{--PAGE CONTENT GOES HERE--}}
    <div class="page-content"><br>

        {{--<div class="container">--}}
            {{--<h3 class="text-left"><b style="color: #545456;">N</b>--}}
                {{--<i class="fa fa-file-text-o fa-2x" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>--}}
            {{--</h3> <br>--}}
        {{--</div>--}}
        <!--motivatinal images-->
        <div class="container">


            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-sharp"><i class="fa fa-newspaper-o font-green-sharp"></i><span class="caption-subject bold uppercase"> Notifications</span>
                        <span class="caption-helper"> Check the notifications everyday for promotions and updates</span></div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable tabbable-custom">
                        <div class="scroller" style="height: 200px; overflow-y: scroll" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                            <ul class="feeds">
                                <!--ITEM TABS-->
                                @if(!empty($allNotifications))
                                @foreach($allNotifications as $key=>$news)
                                        <!--ITEM TABS-->
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success"><i
                                                            class="fa fa-instagram"></i></div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">{{$news->notification_message}} </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">{{$news->created_at}}</div>
                                    </div>
                                </li>
                                @endforeach
                                @else
                                    <li style="color: blueviolet"> There is no any notification for you now.</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection

    @section('pagejavascripts')
            <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/assets/user/js/loadingoverlay.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script type="text/javascript">
        $(function () {
            $('a[title]').tooltip();
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
    <!-- END PAGE LEVEL PLUGINS -->
@endsection
