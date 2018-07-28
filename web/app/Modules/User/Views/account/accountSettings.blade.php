@extends('User::layouts.bodyLayout')

@section('title','upload Post')

@section('headcontent')
        <!-- BEGIN PAGE LEVEL STYLES -->
<link href="/assets/user/css/pricing-table.css" rel="stylesheet" type="text/css" />
<link href="/assets/user/css/custom.css" rel="stylesheet" type="text/css" />

<link href="/assets/user/css/bootstrap-select.css" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL STYLES -->
<style>
    .error-msg {
        color: red;
    }


    .modal {
        display:    none;
        position:   fixed;
        z-index:    1000;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 255, 255, 255, .8 )
        url('<?php echo env('API_URL')?>/assets/user/images/ajax-loader.gif')
        50% 50%
        no-repeat;
    }

    /* When the body has the loading class, we turn
       the scrollbar off with overflow:hidden */
    body.loading {
        overflow: hidden;
    }

    /* Anytime the body has the loading class, our
       modal element will be visible */
    body.loading .modal {
        display: block;
    }

</style>

@endsection

@section('active_accountSetting','active')
@section('content')
    {{--PAGE CONTENT GOES HERE--}}
    {{--<div id="demo"></div>--}}


    <div class="page-content"><br>
        <br>

        <div class="container">
            <h3 class=""><b style="color: #545456;">ACCOUNT SETTINGS</b>
                <i class="fa fa-cog fa-2x" style="color: rgba(111, 86, 9, 0.74)" aria-hidden="true"></i>
            </h3>
            <br>
        </div>
        <!--motivatinal images-->
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="board">
                        <div class="board-inner">


                            <ul class="nav nav-tabs" id="myTab">
                                <div class="liner" style="width:38% !important;"></div>
                                <li class="active">
                                    <a href="#prof" data-toggle="tab" title="Profile Settings">
                        			   <span class="round-tabs one" style="font-size:12px !important;line-height:18px !important;"><br/>Profile Settings
                        				</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#insta" data-toggle="tab" title="Insta Account Settings">
                        				<span class="round-tabs five" style="font-size:12px !important;line-height:18px !important;">Insta Account Settings
                        				</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <br/>
                        <br/>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="prof">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                                <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
                                                <form class="text-center" action="" method="post" enctype="multipart/form-data">
                                                    <div class="kv-avatar center-block" style="width:200px">
                                                        <input id="avatar-1" name="avatar-1" type="file" class="file-loading">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <form role="form" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="form-control-label col-sm-4" for="name">Name</label>
                                                    <div class="col-sm-8">
                                                        <input id="name" class="form-control" type="name" required placeholder="" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label col-sm-4" for="email">E-mail id</label>
                                                    <div class="col-sm-8">
                                                        <input id="email" class="form-control" type="email" required placeholder="" name="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label col-sm-4" for="pwd">Change Password</label>
                                                    <div class="col-sm-8">
                                                        <input id="pwd" class="form-control" type="pwd" required placeholder="" name="pwd">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label col-sm-4" for="cpwd">Confirm Password</label>
                                                    <div class="col-sm-8">
                                                        <input id="cpwd" class="form-control" type="cpwd" required placeholder="" name="cpwd">
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                        <br/>
                                        <div class="form-group text-center" style="margin-bottom:10px;">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-default btn-ag pull-center next" type="submit">Save</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="insta" style="margin-left: -27px;">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-4 text-center">
                                        <div class="row">
                                            <p style="float:left;font-size:16px;">Do you want to get automatic follows?</p>
                                            <div class="ckbox">
                                                <input type="checkbox" id="checkbox1">
                                                <label for="checkbox1"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p style="float:left;font-size:16px;">Do you want to get automatic likes?</p>
                                            <div class="ckbox">
                                                <input type="checkbox" id="checkbox2">
                                                <label for="checkbox2"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p style="float:left;font-size:16px;">Do you want to get automatic unfollow after 2 days?</p>
                                            <div class="ckbox">
                                                <input type="checkbox" id="checkbox3">
                                                <label for="checkbox3"></label>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row" style="display:table !important;">

                                            <select class="selectpicker" style="float:left;display:table !important;">
                                                <option value="abc">Likes from</option>
                                                <option value="abc">abc</option>
                                                <option value="xyz">xyz</option>

                                            </select>



                                            <select class="selectpicker" style="float:left;display:table !important;">
                                                <option value="abc">Followers from</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Both</option>

                                            </select>
                                        </div>

                                        <br/>
                                        <br/>
                                        <br/>

                                        <div class="row text-center">
                                            <button class="btn btn-default btn-ag" type="button">Save</button>
                                        </div>

                                    </div>
                                </div>

                                <br/>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--modal popup for post or upload-->
    <div id="betaModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="margin: 71px auto;">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal"><!-- this is for loading image --></div>
                    <div class="row">
                        <div class="col-sm-7">
                            <img id="img-upload" src="/assets/user/images/post-4.jpg" width="290px">
                        </div>
                        <div class="col-sm-5">
                            <form role="form">
                                <div class="form-group">
                                    <label for="comment"
                                           style="font-size: 20px;font-weight: bold;color: #608983;">Text
                                        us:</label>
                                    <textarea class="form-control" rows="9"
                                              placeholder="message" id="caption-upload"></textarea>
                                </div>
                            </form>
                            <div class="btn-types inline">
                                <div class="input-group date form_datetime" id='datetimepicker2'>
                                    <input type="text" size="16" readonly="" class="form-control" id="scheduleTime"
                                           placeholder="Schedule Time">
                                    <span class="input-group-btn">
								<button class="btn default date-set" type="button"><i class="fa fa-calendar"></i>
                                </button>
							</span>
                                </div>
                                <br>
                                <button class="btn-post-now" onclick="performanceAction('post-now')">POST NOW</button>
                                <button class="btn-SCHEDULE" onclick="performanceAction('post-schedule')">SCHEDULE
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-bookmarks">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade bs-modal-md" id="customModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <div id="customModelData">

                    </div>

                    <div class="modal-footer modal-footer-bookmarks" style="margin-top: 10px;">
                        {{--<button type="button" class="btn btn-default pull-right" style="color: #ffffff; background-color: #0c212b; border-color: #0c212b;" data-dismiss="modal">Close</button>--}}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('pagejavascripts')
            <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script src="/assets/user/js/fileinput.js" type="text/javascript"></script>
    <script src="/assets/user/js/bootstrap-select.js" type="text/javascript"></script>


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


    <script>
        var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
                'onclick="alert(\'Call your custom code here.\')">' +
                '<i class="glyphicon glyphicon-tag"></i>' +
                '</button>';
        $("#avatar-1").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="/assets/user/images/default_account.png" alt="Your Avatar" style="width:160px">',
            layoutTemplates: {
                main2: '{preview} ' + btnCust + ' {remove} {browse}'
            },
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>


    <!-- END PAGE LEVEL PLUGINS -->
@endsection