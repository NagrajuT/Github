@extends('Admin::layouts.adminLayout')

@section('pageheadcontent')
    <link rel="stylesheet" href="/assets/user/css/user-panel.css">
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <style>
        #addAllDetails {
            margin: -17px 0 5px 16px;
        }
        .input-icon .error{
            color: red;
            border-color: red;
        }
    </style>

@endsection

@section('pagebodycontent')
    <div class="page-content">
    <h3 class="page-title">
        Manage Promotion Defaults
        <small>list & statistics</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-users"></i>
                <a href="javascript:;">Account Settings</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="javascript:;">Promotion Defaults</a>
            </li>
        </ul>

    </div>
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- Begin:  -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title" style="padding-top:0.6%;">Instagram Default List</h3>
                    </div>
                    <div class="portlet-body form">

                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" id='myForm' method="post"
                              action="/promotion/defaults">
                            <div class="form-body">

                                <div class="form-group ">
                                    <label class="control-label col-md-3">Minimum Followers(Demo User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Minimum Followers Count for Demo Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="duminf"  maxlength="15"
                                                   data-old-value="{{$data['0']->app_dafault_count or 0000}}"
                                                    name="value[min_follower_du]"
                                                   value="{{$data['0']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['0']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Maximum Followers(Demo User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Maximum Followers Count for Demo Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="dumaxf" maxlength="15"
                                                   data-old-value="{{$data['1']->app_dafault_count or 0000}}"
                                                    name="value[max_follower_du]"
                                                   value="{{$data['1']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['1']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Minimum Likes(Demo User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Minimum Likes Count for Demo Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="duminl" maxlength="15"
                                                   data-old-value="{{$data['2']->app_dafault_count or 0000}}"
                                                    name="value[min_likes_du]"
                                                   value="{{$data['2']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['2']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Maximum Likes(Demo User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Maximum Likes Count for Demo Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="dumaxl" maxlength="15"
                                                   data-old-value="{{$data['3']->app_dafault_count or 0000}}"
                                                    name="value[max_likes_du]"
                                                   value="{{$data['3']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['3']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Minimum Followers(Private User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Minimum Followers Count for Private Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="puminf" maxlength="15"
                                                   data-old-value="{{$data['4']->app_dafault_count or 0000}}"
                                                    name="value[min_follower_pu]"
                                                   value="{{$data['4']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['4']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Maximum Followers(Private User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Maximum Followers Count for Private Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="pumaxf" maxlength="15"
                                                   data-old-value="{{$data['5']->app_dafault_count or 0000}}"
                                                    name="value[max_follower_pu]"
                                                   value="{{$data['5']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['5']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Minimum Likes(Private User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Minimum Likes Count for Private Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="puminl" maxlength="15"
                                                   data-old-value="{{$data['6']->app_dafault_count or 0000}}"
                                                    name="value[min_likes_pu]"
                                                   value="{{$data['6']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['6']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Maximum Likes(Private User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Maximum Likes Count for Private Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="pumaxl" maxlength="15"
                                                   data-old-value="{{$data['7']->app_dafault_count or 0000}}"
                                                    name="value[max_likes_pu]"
                                                   value="{{$data['7']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['7']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Minimum Followers(Business User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Minimum Followers Count for Business Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="buminf" maxlength="15"
                                                   data-old-value="{{$data['8']->app_dafault_count or 0000}}"
                                                    name="value[min_follower_bu]"
                                                   value="{{$data['8']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['8']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Maximum Followers(Business User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Maximum Followers Count for Business Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="bumaxf" maxlength="15"
                                                   data-old-value="{{$data['9']->app_dafault_count or 0000}}"
                                                    name="value[max_follower_bu]"
                                                   value="{{$data['9']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['9']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Minimum Likes(Business User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Minimum Likes Count for Business Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="buminl" maxlength="15"
                                                   data-old-value="{{$data['10']->app_dafault_count or 0000}}"
                                                    name="value[min_likes_bu]"
                                                   value="{{$data['10']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['10']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Maximum Likes(Business User)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Maximum Likes Count for Business Users"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="bumaxl" maxlength="15"
                                                   data-old-value="{{$data['11']->app_dafault_count or 0000}}"
                                                    name="value[max_likes_bu]"
                                                   value="{{$data['11']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['11']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Minimum Hashtag(Default Promotion)</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Minimum Hashtag Count for Default Promotion"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="minhash" maxlength="15"
                                                   data-old-value="{{$data['12']->app_dafault_count or 0000}}"
                                                    name="value[min_hashtag]"
                                                   value="{{$data['12']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['12']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Maximum Hashtag((Default Promotion))</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set Maximum Hashtag Count for Default Promotion"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="maxhash" maxlength="15"
                                                   data-old-value="{{$data['13']->app_dafault_count or 0000}}"
                                                    name="value[max_hashtag]"
                                                   value="{{$data['13']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['13']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Maximum Expose profile</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <i data-original-title="Set maximum Total Followers can be made"
                                               class="fa fa-info-circle tooltips"></i>
                                            <input type="text" class="form-control" id="maxep" maxlength="15"
                                                   data-old-value="{{$data['16']->app_dafault_count or 0000}}"
                                                    name="value[max_expose_profile]"
                                                   value="{{$data['16']->app_dafault_count or 0000}}">
                                            <input type="text"  name="id[]" value="{{$data['16']->app_dafault_value_id}}" hidden>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="text-center  col-md-6 col-md-offset-2">
                                        <button class="btn green" type="submit" id="saveSettings">Save</button>
                                        {{--<button class="btn default" type="button">Cancel</button>--}}
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>

                </div>
            </div>

            <!-- End:  -->
        </div>
    </div>

</div>



@endsection
@section('pagescripts')

    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/validate.min.js" type="text/javascript"></script>
    <script src="/assets/user/js/toastr.min.js" type="text/javascript"></script>
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>--}}

    <script>

        toastr.options = {
            timeOut: 2000,
            extendedTimeOut: 50000,
            tapToDismiss: true,
            debug: false,
            fadeOut: 10,
            positionClass: "toast-top-center",
            limit: 1
        };
        @if(Session::has('success'))
            toastr.success('Default Data Updated Successfuly');
        @elseif(Session::has('fail'))
            toastr.success('Failed, Data Not Updated');
                @endif

//        var is_valid_number = function (obj) {
//            console.log($(obj).val());
////            $('#'+$(obj).attr('id')).css('border-color','green');
//            var oldValue = $(obj).attr('data-old-value');
//
//
//            if (!$.isNumeric($(obj).val())&& $(obj).val().length!=0) {
//                console.log('is ny')
//                $(obj).val(oldValue);
//                $(obj).focus();
//                return false;
//            }
//            else{
//                return true;
//            }
//        }

        var ids=[
            '#duminf','#dumaxf','#duminl','#dumaxl',
            '#puminf','#pumaxf','#puminl','#pumaxl',
            '#buminf','#bumaxf','#buminl','#bumaxl',
                '#minhash','#maxhash','#maxep'
        ];


//        -----------------------------------------------

        $.validator.addMethod('grt', function (value, element, param) {
            return this.optional(element) || parseInt(value) > parseInt($(param).val());
        }, 'Invalid value');

        $.validator.addMethod('less',function(value, element, param){
            return this.optional(element) || parseInt(value) <= 5000;
        },'Invalid value')

        $('#myForm').validate({
            errorElement: "small",

            rules: {
                'value[min_follower_du]': {
                    required: true,
                    number: true,
                    maxlength: 4
                },
                'value[max_follower_du]': {
                    required: true,
                    number: true,
                    maxlength: 4,
                    grt: '#duminf'
                },
                'value[min_likes_du]': {
                    required: true,
                    number: true,
                    maxlength: 4,
                },
                'value[max_likes_du]': {
                    required: true,
                    number: true,
                    grt:'#duminl',
                    maxlength: 4,
                },
                'value[min_follower_pu]': {
                    required: true,
                    number: true,
                    maxlength: 4,

                },
                'value[max_follower_pu]': {
                    required: true,
                    number: true,
                    grt:'#puminf',
                    maxlength: 4,
                },
                'value[min_likes_pu]': {
                    required: true,
                    number: true,
                    maxlength: 4,
                },
                'value[max_likes_pu]': {
                    required: true,
                    number: true,
                    grt:'#puminl',
                    maxlength: 4,
                },
                'value[min_follower_bu]': {
                    required: true,
                    number: true,
                    maxlength: 4,
                },
                'value[max_follower_bu]': {
                    required: true,
                    number: true,
                    grt:'#buminf',
                    maxlength: 4,
                },
                'value[min_likes_bu]': {
                    required: true,
                    number: true,
                    maxlength: 4,
                },
                'value[max_likes_bu]': {
                    required: true,
                    number: true,
                    grt:'#buminl'
                },
                'value[min_hashtag]': {
                    required: true,
                    number: true,
                    maxlength: 4,
                },
                'value[max_hashtag]': {
                    required: true,
                    number: true,
                    grt:'#minhash',
                    maxlength: 4,
                },
                'value[max_expose_profile]': {
                    required: true,
                    number: true,
                    less:true,
                    maxlength: 4,
                },
            },
            messages: {
                'value[max_follower_du]': {
                    grt: 'Must be greater than min followers(demo user).'
                },
                'value[max_likes_du]': {
                    grt: 'Must be greater than min likes(demo user).'
                },
                'value[max_follower_pu]': {
                    grt: 'Must be greater than min followers(private user).'
                },
                'value[max_likes_pu]': {
                    grt: 'Must be greater than min likes(private user).'
                },
                'value[max_follower_bu]': {
                    grt: 'Must be greater than min followers(business user).'
                },
                'value[max_likes_bu]': {
                    grt: 'Must be greater than min likes(business user).'
                },
                'value[max_hashtag]': {
                    grt: 'Must be greater than min hashtag(Default promotion).'
                },
                'value[max_expose_profile]': {
                    less: 'Total max expose profiles exceeded its limit, must be 5000 or lesser).'
                }
            }
        });

        $('#duminf').on('change blur keyup',function(){
            $('#dumaxf').valid();
        });
        $('#duminl').on('change blur keyup',function(){
            $('#dumaxl').valid();
        });
        $('#puminf').on('change blur keyup',function(){
            $('#pumaxf').valid();
        });
        $('#puminl').on('change blur keyup',function(){
            $('#pumaxl').valid();
        });
        $('#buminf').on('change blur keyup',function(){
            $('#bumaxf').valid();
        });
        $('#buminl').on('change blur keyup',function(){
            $('#bumaxl').valid();
        });
        $('#minhash').on('change blur keyup',function(){
            $('#maxhash').valid();
        })


    </script>
    <script>
        $(document).ready(function(){
            $('.acc_set').addClass('active');
            $('.acc_set .arrow').addClass('open');
            $('.promo_def').addClass('active');
        });
    </script>


@endsection