<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('headcontent'); ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <style>
        .error-msg {
            color: red;
        }

        .nocontent {
            /*background-image: url("../img/icon-nocontent.png?v=4");*/
            background-position: center 10px;
            background-repeat: no-repeat;
            color: #a6a6a4;
            font-size: 18px;
            padding: 36px 0 10px;
            text-align: center;
        }

        .mb30 {
            margin-bottom: 30px;
        }

        .mt90 {
            margin-top: 90px;
        }

        /*for add account model*/
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .8) url('/assets/user/images/ajax-loader.gif') 50% 50% no-repeat;
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

        .media .media-body .btn-primary {
            background-color: #1dc6bc;
            padding: 6px 8px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 0px;
        }

        .timeClass {
            margin: -3px 0 0 2px;
        }

        .tooltip.top > .tooltip-inner {
            background-color: #ddd;
            color: black;
        }

        .alert-instruction {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>


    <link rel="stylesheet" type="text/css" href="/assets/user/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/assets/user/css/bootstrap-toggle.min.css">
    <link type="text/css" href="/assets/user/css/semantic.min.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLES -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('active_dashboard','active'); ?>
<?php $__env->startSection('content'); ?>
    <?php /*PAGE CONTENT GOES HERE*/ ?>

    <div class="page-content">

        <div class="container">

            <div class="row">
                <!-- Begin: life time stats -->
                <div class="portlet light pull-left" style="width:100%;">
                    <div class="portlet-title">
                        <div class="caption">
                            <i aria-hidden="true" class="fa fa-tachometer fa-2x font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Account Activation </span>
                            <span class="caption-helper">Manage Accounts Details...</span>
                        </div>
                        <?php /*<div class="pull-right">*/ ?>
                        <?php /*<a class="btn btn-success" href="/settingManagerIndex">*/ ?>
                        <?php /*<i class="fa fa-sliders" aria-hidden="true"></i>*/ ?>
                        <?php /*Settings manager*/ ?>
                        <?php /*</a>*/ ?>
                        <?php /*</div>*/ ?>
                    </div>
                    <div class="portlet-body">
                        <div class="col-lg-12">
                            <div class="">

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class=" button-account-detail">
                                            <p>Start / Stop all account</p>
                                            <div class="col-md-12 padding0">
                                                <div class="col-md-5 col-sm-6 padding0">
                                                    <button type="submit" class="btn btn-success  btn-lg"
                                                            style="background-color:#444d58" id="active_all">Activate
                                                        all
                                                        <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-6 col-sm-6 padding0 m-t-10">
                                                    <button type="submit" class="btn btn-success  btn-lg"
                                                            style="background-color:#444d58" id="inactive_all">
                                                        Inactivate all
                                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col-md-6 col-sm-6 m-t-20 padding0 text-center text_left">
                                            <div class=" button-account-detail">
                                                <p>Add new account to your dashboard</p>

                                                <button type="submit" class="btn btn-success btn-lg"
                                                        style="background-color:#444d58" data-toggle="modal"
                                                        data-target="#myModal" id="addInstagramAccountBtn">Add account
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 m-t-20 pull-right text-right text_left pull_left  padding0">
                                            <div class=" button-account-detail">
                                                <p>Buy time package</p>
                                                <a href="/user/packageLists" class="btn btn-success  btn-lg"
                                                   style="background-color:#5cb85c">Buy subscription
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <?php if($status=='success'): ?>
                                    <?php if(isset($data) && !empty($data)): ?>
                                        <div class="row">
                                            <?php foreach($data as $key=>$value): ?>

                                                <div class="insta_account col-md-6 col-sm-6 col-xs-12 col-lg-4 user_<?php echo e($key + 1); ?>"
                                                     data-userId="<?php echo e($value['ins_user_id']); ?>">

                                                    <?php if($value['subscribe_type']== 'DU'): ?>
                                                        <div style="width: 100%; color:#fff; background: #50b948; padding: 10px;">
                                                            <h4 class="media-heading"><?php echo e($value['full_name']); ?>

                                                                <?php if($value['is_user_disconnected']== 'Y'): ?>
                                                                    <?php /*<div data-toggle="tooltip"*/ ?>
                                                                    <?php /*class="pull-right warn-hide"*/ ?>
                                                                    <?php /*data-placement="top"*/ ?>
                                                                    <?php /*title="Disconnected. Please connect it">*/ ?>
                                                                    <?php /*<i class="glyphicon glyphicon-warning-sign"*/ ?>
                                                                    <?php /*style="color: yellow;"></i>*/ ?>

                                                                    <div class="pull-right warn-hide">
                                                                        <i class="popup_icon glyphicon glyphicon-warning-sign"
                                                                           style="color: yellow;"
                                                                           data-variation="tiny"
                                                                           data-content="This account has been disconnected from our system. Please connect it."></i>

                                                                    </div>
                                                                <?php endif; ?>
                                                            </h4>
                                                        </div>

                                                    <?php elseif($value['subscribe_type']== 'BU'): ?>
                                                        <div class=""
                                                             style="width: 100%; color:#fff; background: #720AF2; padding: 10px;">
                                                            <h4 class="media-heading"><?php echo e($value['full_name']); ?>

                                                                <?php if($value['is_user_disconnected']== 'Y'): ?>
                                                                    <?php /*<div data-toggle="tooltip"*/ ?>
                                                                    <?php /*class="pull-right warn-hide"*/ ?>
                                                                    <?php /*data-placement="top"*/ ?>
                                                                    <?php /*title="Disconnected. Please connect it">*/ ?>
                                                                    <?php /*<i class="glyphicon glyphicon-warning-sign"*/ ?>
                                                                    <?php /*style="color: yellow;"></i>*/ ?>
                                                                    <div class="pull-right warn-hide">
                                                                        <i class="popup_icon glyphicon glyphicon-warning-sign"
                                                                           style="color: yellow;"
                                                                           data-variation="tiny"
                                                                           data-content="This account has been disconnected from our system. Please connect it."></i>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </h4>
                                                        </div>

                                                    <?php elseif($value['subscribe_type']== 'PU'): ?>

                                                        <div class=""
                                                             style="width: 100%; color:#fff; background: #FF6501; padding: 10px;">
                                                            <h4 class="media-heading"><?php echo e($value['full_name']); ?>

                                                                <?php if($value['is_user_disconnected']== 'Y'): ?>
                                                                    <?php /*<div data-toggle="tooltip"*/ ?>
                                                                    <?php /*class="pull-right warn-hide"*/ ?>
                                                                    <?php /*data-placement="top"*/ ?>
                                                                    <?php /*title="Disconnected. Please connect it">*/ ?>
                                                                    <?php /*<i class="glyphicon glyphicon-warning-sign"*/ ?>
                                                                    <?php /*style="color: yellow;"></i>*/ ?>

                                                                    <div class="pull-right warn-hide">
                                                                        <i class="popup_icon glyphicon glyphicon-warning-sign"
                                                                           style="color: yellow;"
                                                                           data-variation="tiny"
                                                                           data-content="This account has been disconnected from our system. Please connect it."></i>

                                                                    </div>
                                                                <?php endif; ?>
                                                            </h4>
                                                        </div>

                                                    <?php endif; ?>


                                                    <div class=" media <?php if($value['subscribe_type']== 'DU'): ?> purple_border green_border green_lighbg
<?php elseif($value['subscribe_type']== 'PU'): ?> orange_border orange_lighbg <?php elseif($value['subscribe_type']== 'BU'): ?> purple_border purple_lighbg <?php endif; ?>  "
                                                         style="overflow: visible;">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-3 col-sm-12 text_center">
                                                                    <img class="media-object"
                                                                         style="height:50px; width:50px;"
                                                                         src="<?php echo e($value['profile_pic_url']); ?>"
                                                                         alt="Image Not Found"
                                                                         onerror="this.src='/assets/user/images/no_image.png';">
                                                                </div>
                                                                <div class="col-md-8 col-sm-12 m-t-20 text_center padding0">
                                                                    <div class="media-body"
                                                                         style="overflow: visible;">
                                                                        <h5>
                                                                            <a href="http://www.instagram.com/<?php echo e($value['username']); ?>"
                                                                               target="_blank"><?php echo e($value['username']); ?></a>
                                                                            <br>
                                                                            <span class="social-side-intaffic">
                                                        <?php if($value['subscribe_type']=='PU'): ?> Private Subscriber
                                                                                <?php elseif($value['subscribe_type']=='BU'): ?>
                                                                                    Bussiness Subscriber
                                                                                <?php else: ?>  Demo Subscriber
                                                                                <?php endif; ?>
                                                    </span>
                                                                        </h5>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <hr style="margin: 15px auto;">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="mrgnbtm col-md-6 pull-left">
                                                                            <span class="grey">Activity</span>
                                                                        </div>
                                                                        <div class="mrgnbtm text-right col-md-6">
                                                                    <span class="pull-right" id="activity_status">
                                                                        <?php if($value['status']=='A'): ?>
                                                                            Started <i
                                                                                    class="fa fa-refresh fa-spin"
                                                                                    aria-hidden="true"></i>
                                                                        <?php else: ?>
                                                                            Stopped <i
                                                                                    class="glyphicon glyphicon-stop"
                                                                                    aria-hidden="true"></i>
                                                                        <?php endif; ?>
                                                                       </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="mrgnbtm col-md-6 pull-left grey">
                                                                            Time
                                                                        </div>
                                                                        <div class="mrgnbtm text-right text_left col-md-6 pull-right">
                                                                    <span class="pull-right f12"
                                                                          id="time_period_left"><?php echo e($value['time_period_left']); ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="mrgnbtm pull-left col-md-6">
                                            <span class="grey" id="avtivity_status_label">
                                                <?php if($value['status']=='A'): ?> Started <?php else: ?>
                                                    Stopped <?php endif; ?>
                                            </span>
                                                                        </div>

                                                                        <div class="mrgnbtm text-right col-md-6 text_left pull-right">
                                                                            <span class="pull-right"
                                                                                  id="avtivity_status_time"
                                                                                  style="font-size:13px"><?php if($value['status']=='A'): ?> <?php echo e($value['start_date']); ?> <?php else: ?> <?php echo e($value['stop_date']); ?> <?php endif; ?> </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="mrgnbtm pull-left col-md-6 grey">
                                                                            Time
                                                                            Used
                                                                        </div>
                                                                        <div class="mrgnbtm text-right col-md-6 text_left pull-right">
                                                                    <span class="pull-right"
                                                                          id="used_time"><?php echo e($value['used_time']); ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12" style="margin: 2px 0;">
                                                                    <div class="row">
                                                                        <div class="mrgnbtm pull-left col-md-6 grey">
                                                                            Promotion Type
                                                                        </div>
                                                                        <div class="mrgnbtm text-right col-md-6 text_left pull-right">
                                                                    <span class="pull-right"
                                                                          id="current_promotion_type">

                                                                        <?php if($value['current_promotion_type']=='F'): ?>
                                                                            Filter
                                                                        <?php else: ?>
                                                                            Default
                                                                        <?php endif; ?>
                                                                     </span>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 mrgnbtm pull-left grey">
                                                                            Promotion Status
                                                                        </div>
                                                                        <div class="col-md-6 text_left mrgnbtm text-right pull-right">
                                                                    <span class="pull-right"
                                                                          id="current_promotion_status">
                                                                        <?php if($value['current_promotion_status']==0): ?>
                                                                            Stopped <i
                                                                                    class='glyphicon glyphicon-stop'></i>
                                                                        <?php else: ?>
                                                                            Running <i class="fa fa-refresh fa-spin"
                                                                                       aria-hidden="true"></i>
                                                                        <?php endif; ?>
                                                                    </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 m-t-20 m_t_20">
                                                                    <div class="col-md-4 col-sm-4 m-t-10 btn-bg">
                                                                        <?php if($value['subscribe_type']== 'DU'): ?>
                                                                            <span class="btn btn-primary pull-left green activity_status_btn w100"
                                                                                  data-userId="<?php echo e($value['ins_user_id']); ?>"
                                                                                  data-status="<?php echo e($value['status']); ?>"
                                                                                  data-subscribe_type="<?php echo e($value['subscribe_type']); ?>"
                                                                                  data-time_period_left="<?php echo e($value['time_period_left']); ?>"
                                                                                  data-is_logged_in="<?php echo e($value['is_logged_in']); ?>"
                                                                                  data-is_user_disconnected="<?php echo e($value['is_user_disconnected']); ?>"
                                                                                  data-has_account_locked="<?php echo e($value['has_account_locked']); ?>">
                                                                       <?php if($value['status']=='I'): ?> Activate <?php else: ?>
                                                                                    Inactivate <?php endif; ?>
                                                                    </span>

                                                                        <?php elseif($value['subscribe_type']== 'BU'): ?>
                                                                            <span class="btn btn-primary pull-left purple activity_status_btn w100"
                                                                                  data-userId="<?php echo e($value['ins_user_id']); ?>"
                                                                                  data-status="<?php echo e($value['status']); ?>"
                                                                                  data-subscribe_type="<?php echo e($value['subscribe_type']); ?>"
                                                                                  data-time_period_left="<?php echo e($value['time_period_left']); ?>"
                                                                                  data-is_logged_in="<?php echo e($value['is_logged_in']); ?>"
                                                                                  data-is_user_disconnected="<?php echo e($value['is_user_disconnected']); ?>"
                                                                                  data-has_account_locked="<?php echo e($value['has_account_locked']); ?>">
                                                                       <?php if($value['status']=='I'): ?> Activate <?php else: ?>
                                                                                    Inactivate <?php endif; ?>
                                                                    </span>

                                                                        <?php elseif($value['subscribe_type']== 'PU'): ?>
                                                                            <span class="btn btn-primary pull-left orange activity_status_btn w100"
                                                                                  data-userId="<?php echo e($value['ins_user_id']); ?>"
                                                                                  data-status="<?php echo e($value['status']); ?>"
                                                                                  data-subscribe_type="<?php echo e($value['subscribe_type']); ?>"
                                                                                  data-time_period_left="<?php echo e($value['time_period_left']); ?>"
                                                                                  data-is_logged_in="<?php echo e($value['is_logged_in']); ?>"
                                                                                  data-is_user_disconnected="<?php echo e($value['is_user_disconnected']); ?>"
                                                                                  data-has_account_locked="<?php echo e($value['has_account_locked']); ?>">
                                                                       <?php if($value['status']=='I'): ?> Activate <?php else: ?>
                                                                                    Inactivate <?php endif; ?>
                                                                    </span>
                                                                        <?php endif; ?>

                                                                    </div>
                                                                    <div class="col-md-4 col-sm-4 m-t-10 btn-bg">
                                                                        <?php if($value['subscribe_type']== 'DU'): ?>
                                                                            <a href='/<?php echo(($value["current_promotion_type"] == 'F') ? "filter" : "default"); ?>/promotion/<?php echo e($value["ins_user_id"]); ?>'
                                                                               class="btn btn-primary green activity_settings_btn w100">
                                                                                Settings
                                                                            </a>
                                                                        <?php elseif($value['subscribe_type']== 'BU'): ?>
                                                                            <a href='/<?php echo(($value["current_promotion_type"] == 'F') ? "filter" : "default"); ?>/promotion/<?php echo e($value["ins_user_id"]); ?>'
                                                                               class="btn btn-primary purple activity_settings_btn w100">
                                                                                Settings
                                                                            </a>
                                                                        <?php elseif($value['subscribe_type']== 'PU'): ?>
                                                                            <a href='/<?php echo(($value["current_promotion_type"] == 'F') ? "filter" : "default"); ?>/promotion/<?php echo e($value["ins_user_id"]); ?>'
                                                                               class="btn btn-primary orange activity_settings_btn w100">
                                                                                Settings
                                                                            </a>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-4 m-t-10 btn-bg">
                                                                        <a href="javascript:;"
                                                                           class="menu-toggler w100"></a>
                                                                        <!-- END RESPONSIVE MENU TOGGLER -->
                                                                        <!-- BEGIN TOP NAVIGATION MENU -->

                                                                        <span class="top-menu">
                                                                                <ul class="nav"> <!--navbar-nav-->
                                                                                    <li class="droddown dropdown-separator">
                                                                                        <span class="separator"></span>
                                                                                    </li>
                                                                                    <li class="dropdown dropdown-user dropdown-dark dropup">
                                                                                        <?php /**/ ?>
                                                                                        <?php if($value['subscribe_type']== 'DU'): ?>
                                                                                            <span href="javascript:;"
                                                                                                  class="dropdown-toggle btn btn-primary green w100"
                                                                                                  data-toggle="dropdown"
                                                                                                  data-hover1="dropdown"
                                                                                                  data-close-others="true"
                                                                                                  style="color:white;"> More
                                                                            </span>
                                                                                        <?php elseif($value['subscribe_type']== 'BU'): ?>
                                                                                            <span href="javascript:;"
                                                                                                  class="dropdown-toggle btn btn-primary purple w100"
                                                                                                  data-toggle="dropdown"
                                                                                                  data-hover1="dropdown"
                                                                                                  data-close-others="true"
                                                                                                  style="color:white;"> More
                                                                            </span>
                                                                                        <?php elseif($value['subscribe_type']== 'PU'): ?>
                                                                                            <span href="javascript:;"
                                                                                                  class="dropdown-toggle btn btn-primary orange w100"
                                                                                                  data-toggle="dropdown"
                                                                                                  data-hover1="dropdown"
                                                                                                  data-close-others="true"
                                                                                                  style="color:white;"> More
                                                                            </span>
                                                                                        <?php endif; ?>
                                                                                        <?php /**/ ?>
                                                                                        <ul style="min-width:0px; margin-bottom:6px; margin-left:-15px"
                                                                                            class="dropdown-menu dropdown-menu-default">
                                                                                            <?php /*<li><a href="#"> <i class="fa fa-trash-o"*/ ?>
                                                                                            <?php /*aria-hidden="true"></i> Remove*/ ?>
                                                                                            <?php /*Account </a></li>*/ ?>
                                                                                            <?php /*<li class="divider"></li>*/ ?>
                                                                                            <li id="reconnectAccount">
                                                                                                <a>
                                                                                                    <i class="fa fa-user"
                                                                                                       aria-hidden="true"></i>
                                                                                                    Account
                                                                                                    Reconnect
                                                                                                </a>
                                                                                            </li>

                                                                                            <li id="changePromotionType"
                                                                                                data-userId="<?php echo e($value['ins_user_id']); ?>"
                                                                                                data-promotion_type="<?php echo e($value['current_promotion_type']); ?>"
                                                                                                data-promotion_status="<?php echo e($value['current_promotion_status']); ?>"
                                                                                                data-insta_account_div_id="<?php echo e($key + 1); ?>">
                                                                                                <a>
                                                                                                    <i class="fa fa-toggle-on"
                                                                                                       aria-hidden="true"></i>
                                                                                                    Manage Promotion
                                                                                                    Type
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            <!--                                                    <?php if(($key + 1) % 3 == 0): ?>-->
                                                <!--                                                      <?php endif; ?>-->

                                                <?php endforeach; ?>
                                        </div><br>
                                        <!--
                                                                                    <div class="row">

                                                                                    </div>
                                        -->
                                    <?php else: ?>
                                        <div class="row text-center">
                                            <span style="text-align: right"><?php echo e(Session::get('instaffic_user')['email']); ?></span>
                                            <h2> welcome to SMARTFFIC </h2>
                                            <br>
                                            <h3>Social media that works 24x7 on instagram profile to
                                                increase real
                                                followers, likes &
                                                comments</h3>

                                            <p>Add Atleast one Account to use Smartffic services </p>
                                            <br><br>
                                        </div>
                                    <?php endif; ?>

                                <?php else: ?>
                                    <div class="row text-center">
                                        <img src="/assets/user/images/warning_error.png" alt=""
                                             width="100">
                                        <br><br>
                                        <div style="padding:12px; color: red">
                                            <p>Error in API service due to this reasion</p>
                                            <?php echo e($message); ?>

                                        </div>
                                        <br><br>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>


        <div id="account_list"></div>

    </div>

    <!--modal for add account-->

    <!-- Modal for Add Instagram Account-->
    <?php /*<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"*/ ?>
    <?php /*aria-hidden="true">*/ ?>
    <?php /*<div class="modal-dialog" style="margin-top: 125px; width: 32%;">*/ ?>
    <?php /*<div class="modal-content">*/ ?>
    <?php /*<div class="modal-header modal-detail-header"*/ ?>
    <?php /*style="border-bottom: 1px solid #ffffff;border-radius: 5px;">*/ ?>
    <?php /*<button type="button" class="close" data-dismiss="modal" aria-hidden="true">*/ ?>
    <?php /*</button>*/ ?>
    <?php /*<div class="close-modal" data-dismiss="modal"*/ ?>
    <?php /*style="font-size: 15px;float: right;margin-top: -5px; cursor:pointer">X*/ ?>
    <?php /*</div>*/ ?>
    <?php /*<center>*/ ?>
    <?php /*<a class="modal-title text-center" id="myModalLabel">*/ ?>
    <?php /*<img src="/assets/user/images/Instagram_logo.svg.png"*/ ?>
    <?php /*style="width:225px;">*/ ?>
    <?php /*</a>*/ ?>
    <?php /*</center>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*<div class="modal-body" style="align-items: center">*/ ?>
    <?php /*<div class="modal"><!-- Place at bottom of page --></div>*/ ?>
    <?php /*<form class="form-horizontal" role="form"> <!--style="margin-left: 120px" -->*/ ?>
    <?php /*<div class="form-group">*/ ?>

    <?php /*<div class="col-sm-12">*/ ?>
    <?php /*<input type="text" id="insta_username"*/ ?>
    <?php /*placeholder="Instagram Username"*/ ?>
    <?php /*class="form-control"*/ ?>
    <?php /*autofocus>*/ ?>
    <?php /*</div>*/ ?>

    <?php /*<div class="col-sm-9">*/ ?>
    <?php /*<span id="insta_username_error" class="error-msg"></span>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>

    <?php /*<div class="form-group">*/ ?>

    <?php /*<div class="col-sm-12">*/ ?>
    <?php /*<input type="password" id="insta_password" autocomplete="off"*/ ?>
    <?php /*placeholder="Instagram Password"*/ ?>
    <?php /*class="form-control">*/ ?>
    <?php /*</div>*/ ?>
    <?php /*<div class="col-sm-9">*/ ?>
    <?php /*<span id="insta_password_error" class="error-msg"></span>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*<div class="form-group">*/ ?>
    <?php /*<div class="col-sm-12">*/ ?>
    <?php /*<a href="https://www.instagram.com/accounts/password/reset/"*/ ?>
    <?php /*target="_blank"*/ ?>
    <?php /*class="forget-password ">Forgot ?</a>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</form>*/ ?>
    <?php /*<div style="color: red; text-align: center">*/ ?>
    <?php /*<span id="errorAddAccountMessage"></span>*/ ?>
    <?php /*</div>*/ ?>

    <?php /*</div>*/ ?>

    <?php /*<div class="modal-footer footer-details">*/ ?>

    <?php /*<button type="button" class="btn btn-default" id="addInstagramAccount">Log In*/ ?>
    <?php /*</button>*/ ?>

    <?php /*<button type="button" class="btn btn-default hidden" id="closeModalBtn"*/ ?>
    <?php /*data-dismiss="modal">Close*/ ?>
    <?php /*</button>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-detail-header"
                     style="border-bottom: 1px solid #ffffff;border-radius: 5px;">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    </button> -->
                    <center>
                        <a class="modal-title text-center" id="myModalLabel">
                            <h1>Instagram</h1>
                        </a>
                    </center>
                </div>
                <div class="modal-body" style="align-items: center">

                    <div id="instructionForm">
                        <div class="alert alert-instruction" role="alert">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <strong>Important instructions!</strong> before you start.
                        </div>
                        <div class="row" style="padding: 10px 20px;">
                            <div class="col-xs-12 info-block">
                                <div class="media-body">

                                    <div class="media-body media-middle">
                                        <strong>Make sure that e-mail</strong>, which you used for
                                        registration in
                                        Instagram is real, and you have access to it.
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-12 info-block">
                                <div class="media-body">

                                    <div class="media-body media-middle">
                                        <b>E-mail</b>, which you used for registration in
                                        Instagram is <b>confirmed and approved</b> by Instagram.
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-12 info-block">
                                <div class="media-body">

                                    <div class="media-body media-middle">
                                        <strong>Add at least 6 photos</strong> to your account from mobile
                                        phone.
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-12 info-block">
                                <div class="media-body">

                                    <div class="media-body media-middle">
                                        <strong>Upload avatar</strong> and fill in your profile.
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-12 info-block">
                                <div class="media-body">

                                    <div class="media-body media-middle">
                                        <strong>Ensure that your content</strong> does not violate the rules
                                        of
                                        Instagram. We are not responsible for your actions and their
                                        consequences.
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 info-block">
                                <div class="media-body">

                                    <div class="media-body media-middle">
                                        <strong>Dear client,</strong> please enter to <strong>Instagram aplication by
                                            your mobile</strong> and approve the
                                        connection - then come back to our system.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer footer-details">
                            <a class="btn btn-success pull-right" id="next">Next <i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i>

                            </a>
                        </div>
                    </div>

                    <div class="nextform" id="addAccountForm" style="display:none">

                        <div class="alert alert-instruction" role="alert">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <strong>Well done!</strong> You successfully read this important instructions.
                            <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip"
                               data-placement="top" title="Content here...." style="color:#7f7f7f;"></i>

                        </div>


                        <form class="form-horizontal" role="form">

                            <div class="form-group">

                                <div class="col-sm-12">
                                    <input type="text" id="insta_username"
                                           placeholder="Instagram Username"
                                           class="form-control"
                                           autofocus>
                                </div>

                                <div class="col-sm-9">
                                    <span id="insta_username_error" class="error-msg"></span>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-sm-12">
                                    <input type="password" id="insta_password" autocomplete="off"
                                           placeholder="Instagram Password"
                                           class="form-control">
                                </div>
                                <div class="col-sm-9">
                                    <span id="insta_password_error" class="error-msg"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="https://www.instagram.com/accounts/password/reset/"
                                       target="_blank"
                                       class="forget-password ">Forgot ?</a>
                                </div>
                            </div>


                            <input checked data-toggle="toggle" type="checkbox" name="setProxy" id="setProxy">
                            <label for="setProxy"> Use proxy for this account</label>
                            <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip"
                               data-placement="top" title="Content here...." style="color:#7f7f7f;">
                            </i>

                            <div id="addProxyForm" style="display: none">
                                <div class="row" style="margin:10px 0; background: #ccc; padding: 10px 0;">
                                    <div class="col-md-12" style="margin: 5px 0px; padding: 0px;">
                                        <div class="col-md-8">
                                            <input type="text" id="proxy_ip" placeholder="Proxy IP"
                                                   class="form-control"/>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="proxy_port" placeholder="Proxy Port"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin: 5px 0px; padding: 0px;">
                                        <div class="col-md-6">
                                            <input type="text" id="proxy_username" placeholder="Proxy Username"
                                                   class="form-control"/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="proxy_password" placeholder="Proxy Password"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin: 5px 0px; padding: 0px 14px;">
                                        <div class="col-md-9 pull-left" id="proxy_display_message">
                                            <span>Test proxy connection to make sure it is working </span>
                                        </div>
                                        <div class="col-md-3 pull-right">

                                            <a href="javascript:;" id="test_proxy"
                                               class="btn btn-success pull-right">Test Proxy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>

                        <div style="color: red; text-align: center">
                            <span id="errorAddAccountMessage"></span>
                        </div>
                        <hr>

                        <div class="modal-footer footer-details">
                            <button type="button" class="btn btn-primary" id="addInstagramAccount">Add account
                            </button>
                            <button type="button" class="btn btn-secondary" id="closeModalBtn"
                                    data-dismiss="modal">Close
                            </button>
                        </div>
                        <div class="modal"><!-- Place at bottom of page --></div>
                    </div>
                    <div class="nextform" id="addSecurityCodeForm" style="display:none">

                        <div class="alert alert-instruction" role="alert">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            Please Enter Code sent to your email associated with this account

                        </div>


                        <form class="form-horizontal" role="form">


                            <div class="form-group">

                                <div class="col-sm-12">
                                    <input type="text" id="security_code" autocomplete="off"
                                           placeholder="6-digit-code" maxlength="6"
                                           class="form-control">
                                </div>
                                <div class="col-sm-9">
                                    <span id="security_code" class="error-msg"></span>
                                </div>
                            </div>
                        </form>

                        <div style="color: red; text-align: center">
                            <span id="errorCodeMessage"></span>
                        </div>
                        <hr>

                        <div class="modal-footer footer-details">
                            <button type="button" class="btn btn-primary" id="sendCode">Verify
                            </button>
                            <button type="button" class="btn btn-secondary" id="closeModalBtn"
                                    data-dismiss="modal">Close
                            </button>
                        </div>

                        <div class="modal"><!-- Place at bottom of page --></div>
                    </div>
                    <div class="nextform" id="getVerificationCode" style="display:none">

                        <div class="alert alert-instruction" role="alert">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            Please verify your account.

                        </div>
                        How do you want to receive your verification code?

                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control choice" type="radio" id="choice_email" name="choice"
                                           value="1" checked>
                                    <label for="choice_email">Email</label>
                                    <input class="form-control choice" type="radio" id="choice_phone" name="choice"
                                           value="0">
                                    <label for="choice_phone">Phone</label>

                                    <input type="text" id="device_session" value="" hidden>
                                    <input type="text" id="device_device" value="" hidden>
                                    <input type="text" id="device_checkpoint_url" value="" hidden>
                                </div>
                            </div>

                        </form>

                        <div style="color: red; text-align: center">
                            <span id="errorCodeMessage"></span>
                        </div>
                        <hr>

                        <div class="modal-footer footer-details">
                            <button type="button" class="btn btn-primary" id="sendSecurityCode">Send Security Code
                            </button>
                            <button type="button" class="btn btn-secondary" id="closeModalBtn"
                                    data-dismiss="modal">Close
                            </button>
                        </div>

                        <div class="modal"><!-- Place at bottom of page --></div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- Modal for Re-Connect Instagram Account-->
    <div class="modal fade" id="reAuthModal" tabindex="-1" role="dialog" aria-labelledby="reAuthModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 125px;">
            <div class="modal-content">
                <div class="modal-header modal-detail-header"
                     style="border-bottom: 1px solid #ffffff;border-radius: 5px;">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    </button> -->
                    <div id="close_account_reconnect_modal" class="close-modal" data-dismiss="modal"
                         style="font-size: 15px;float: right;margin-top: -5px; cursor:pointer">X
                    </div>
                    <center>
                        <a class="modal-title text-center" id="reAuthModalLabel">
                            <img src="/assets/user/images/Instagram_logo.svg.png"
                                 style="width:225px;">
                        </a>

                    </center>
                </div>

                <div class="modal-body" style="align-items: center">
                    <div class="modal"><!-- Place at bottom of page --></div>
                    <div style="display: none;" class="alert alert-danger display-hide">
                        <button class="close close-message" data-close="alert"></button>
                        <ul></ul>
                    </div>

                    <div style="display: none;" class="alert alert-success display-hide">
                        <button class="close close-message" data-close="alert"></button>
                        <ul></ul>
                    </div>

                    <form class="form-horizontal" id="reconnectForm" role="form">
                        <!--style="margin-left: 120px" -->
                        <div class="form-group">

                            <div class="col-sm-12">
                                <input type="text" id="insta_username_recconect"
                                       placeholder="Instagram Username"
                                       class="form-control"
                                       autofocus>
                            </div>

                            <div class="col-sm-9">
                                <span id="insta_username_error" class="error-msg"></span>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-sm-12">
                                <input type="password" id="insta_password_reconnect"
                                       placeholder="Instagram Password" autocomplete="off"
                                       class="form-control">
                            </div>
                            <div class="col-sm-9">
                                <span id="insta_password_error" class="error-msg"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="https://www.instagram.com/accounts/password/reset/"
                                   target="_blank"
                                   class="forget-password ">Forgot ?</a>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="modal-footer footer-details">
                    <button type="button" class="btn btn-default" id="AccountReconnect">Re-connect
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Change Promotion type -->
    <?php /*<div class="modal fade" id="managePromotionType1" tabindex="-1" role="dialog"*/ ?>
    <?php /*aria-labelledby="managePromotionTypeLabel"*/ ?>
    <?php /*aria-hidden="true">*/ ?>
    <?php /*<div class="modal-dialog" style="margin-top: 125px; width: 32%;">*/ ?>
    <?php /*<div class="modal-content">*/ ?>
    <?php /*<div class="modal-header modal-detail-header"*/ ?>
    <?php /*style="border-bottom: 1px solid #ffffff;border-radius: 5px;">*/ ?>
    <?php /*<div id="close_account_reconnect_modal" class="close-modal" data-dismiss="modal"*/ ?>
    <?php /*style="font-size: 15px;float: right;margin-top: -5px; cursor:pointer">X*/ ?>
    <?php /*</div>*/ ?>

    <?php /*<span class="text-center">*/ ?>
    <?php /*Manage Promotion Type*/ ?>
    <?php /*</span>*/ ?>

    <?php /*</div>*/ ?>

    <?php /*<div class="modal-body" style="align-items: center">*/ ?>
    <?php /*<div class="modal"><!-- Place at bottom of page --></div>*/ ?>


    <?php /*<form class="form-horizontal" id="reconnectForm" role="form">*/ ?>
    <?php /*<!--style="margin-left: 120px" -->*/ ?>
    <?php /*<div class="form-group">*/ ?>

    <?php /*<div class="col-md-12 col-sm-12" style="margin: 2px 0;">*/ ?>
    <?php /*<div class="col-md-12">*/ ?>
    <?php /*<div class="mrgnbtm pull-left grey">*/ ?>
    <?php /*<label for="promotion_type"> Promotion Type</label>*/ ?>

    <?php /*</div>*/ ?>
    <?php /*<div class="mrgnbtm text-right pull-right">*/ ?>
    <?php /*<span class="pull-right" id="current_promotion_type">*/ ?>
    <?php /*<input id="promotion_type" checked data-toggle="toggle"*/ ?>
    <?php /*data-on="FILTER"*/ ?>
    <?php /*data-off="DEFAULT "*/ ?>
    <?php /*data-size="mini" type="checkbox"*/ ?>
    <?php /*data-width="100" data-height="6px">*/ ?>
    <?php /*</span>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>

    <?php /*<div class="col-md-12">*/ ?>
    <?php /*<div class="mrgnbtm pull-left grey">*/ ?>
    <?php /*<label for="promotion_status"> Promotion Status</label>*/ ?>

    <?php /*</div>*/ ?>
    <?php /*<div class="mrgnbtm text-right pull-right">*/ ?>
    <?php /*<span class="pull-right">*/ ?>
    <?php /*<input id="promotion_status" checked data-toggle="toggle"*/ ?>
    <?php /*data-on="START"*/ ?>
    <?php /*data-off="STOP "*/ ?>
    <?php /*data-size="mini" type="checkbox"*/ ?>
    <?php /*data-width="100" data-height="6px">*/ ?>
    <?php /*</span>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>


    <?php /*</div>*/ ?>

    <?php /*<div class="form-group">*/ ?>

    <?php /*<div class="col-sm-12">*/ ?>

    <?php /*</div>*/ ?>

    <?php /*</div>*/ ?>

    <?php /*</form>*/ ?>

    <?php /*</div>*/ ?>

    <?php /*<div class="modal-footer footer-details">*/ ?>

    <?php /*<button type="button" class="btn btn-default" id="savePromotionType">Save*/ ?>
    <?php /*</button>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>

    <div class="modal fade" id="managePromotionType" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalLabel"><b>Management Promotion Type</b></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" style="padding-left:10%">

                        <div class="form-group">
                            <div class="col-md-12">
                                <label><b>Promotion Type</b> <span style="font-size: 11px">( Switch your promotion type  )</span></label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input id="promotion_filter_type" value="F" name="promotion_type"
                                               type="radio">
                                        <label for="promotion_filter_type"><span></span>Filter</label>
                                    </div>
                                    <div class="col-md-3">

                                        <input id="promotion_default_type" value="D" name="promotion_type"
                                               type="radio">
                                        <label for="promotion_default_type"><span></span>Default</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label><b>Promotion Status</b> <span style="font-size: 11px">( Start or Stop your promotion )</span></label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input id="promotion_status_start" value="1" name="promotion_status"
                                               type="radio">
                                        <label for="promotion_status_start"><span></span>Start</label>
                                    </div>

                                    <div class="col-md-3">
                                        <input id="promotion_status_stop" value="0" name="promotion_status"
                                               type="radio">
                                        <label for="promotion_status_stop"><span></span>Stop</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="savePromotionSettings">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagejavascripts'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script src="/assets/user/js/loadingoverlay.js"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/moment.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>
    <script src="/assets/user/js/bootstrap-toggle.min.js"></script>

    <script type="text/javascript">


        var globalvar = [];
        $(document).ready(function () {

            var subscription_message = '';
            subscription_message = '<?php if(isset($subscription_message) && $subscription_message!=null): ?> <?php echo e($subscription_message); ?> <?php endif; ?>';

            if (subscription_message.length != 0) {
                toastr.options.timeOut = 3000;
                toastr.success(subscription_message);
            }

            $(".insta_account").each(function () {
                globalvar.push(parseInt($(this).attr('data-userId')));
            });
            checkAccountStatus();
        });

        setInterval(function () {
            checkAccountStatus();
        }, 15000);

        function sformat(s) {
            var fm = [
                Math.floor(s / 60 / 60 / 24), // DAYS
                Math.floor(s / 60 / 60) % 24, // HOURS
                Math.floor(s / 60) % 60, // MINUTES
                s % 60 // SECONDS
            ];
            return $.map(fm, function (v, i) {
                return ((v < 10) ? '0' : '') + v;
            }).join(':');
        }

        var prefix = function (value) {
            return (value > 0) ? 's' : '';
        }

        function convertDateTimeFormat(sec) {
            var daysInMonth = 30;
            var $fm = [
                Math.floor(sec / 60 / 60 / 24 / daysInMonth / 12), // YEARS
                Math.floor(sec / 60 / 60 / 24 / daysInMonth) % 12, // MONTHS
                Math.floor(sec / 60 / 60 / 24) % daysInMonth, // DAYS
                Math.floor(sec / 60 / 60) % 24, // HOURS
                Math.floor(sec / 60) % 60, // MINUTES
                sec % 60 // SECONDS
            ];

            var $resultTimeFormat = '';

            if ($fm[0] > 0) {
                $resultTimeFormat += $fm[0] + ' Year' + prefix($fm[0]);
                if ($fm[1] > 0) {
                    $resultTimeFormat += ', ' + $fm[1] + ' Month' + prefix($fm[1]);
                }
            } else {
                if ($fm[1] > 0) {
                    $resultTimeFormat += $fm[1] + ' Month' + prefix($fm[1]);
                    if ($fm[2] > 0) {
                        $resultTimeFormat += ', ' + $fm[2] + ' Day' + prefix($fm[2]);
                    }
                } else {
                    if ($fm[2] > 0) {
                        $resultTimeFormat += $fm[2] + ' Day' + prefix($fm[2]);
                        if ($fm[3] > 0) {
                            $resultTimeFormat += ', ' + $fm[3] + ' Hour' + prefix($fm[3]);
                        }
                    } else {
                        if ($fm[3] > 0) {
                            $resultTimeFormat += $fm[3] + ' Hour' + prefix($fm[3]);
                            if ($fm[4] > 0) {
                                $resultTimeFormat += ', ' + $fm[4] + ' Minute' + prefix($fm[4]);
                            }
                        } else {
                            if ($fm[4] > 0) {
                                $resultTimeFormat += $fm[4] + ' Minute' + prefix($fm[4]);
                                if ($fm[5] > 0) {
                                    $resultTimeFormat += ', ' + $fm[5] + ' Second' + prefix($fm[5]);
                                }
                            } else {
                                $resultTimeFormat += $fm[5] + ' Second' + prefix($fm[5]);
                            }
                        }
                    }
                }
            }


            return $resultTimeFormat;
        }

        var checkAccountStatus = function () {
            $.ajax({
                url: '/check/account/status',
                dataType: 'json',
                method: 'get',
                success: function (response) {
                    if (response.status === 'success') {

                        $.each(response.data, function (key, value) {
//                            console.log(value);
                            var userRowObj = $('.user_' + (key + 1));
                            var htmlText = '';

                            if (value['is_user_disconnected'] == 'N' && value['has_account_locked'] == 'F') {
                                userRowObj.find('.warn-hide').hide();
                                userRowObj.find('.activity_status_btn').attr({
                                    "data-has_account_locked": "F",
                                    "data-is_user_disconnected": "N",
                                    "data-is_logged_in": "Y"
                                });
                            } else {
                                userRowObj.find('.warn-hide').show();
                                userRowObj.find('.activity_status_btn').attr({
                                    "data-has_account_locked": "T",
                                    "data-is_user_disconnected": "Y",
                                    "data-is_logged_in": "N"
                                });

                            }


                            if (value['status'] == 'A') {

                                htmlText = 'Started <span id="spin"><i class="fa fa-refresh fa-spin"  aria-hidden="true"></i></span>';
                                userRowObj.find('#activity_status').html(htmlText);
                                userRowObj.find('#avtivity_status_label').text('Started');
                                userRowObj.find('#avtivity_status_time').text(moment.unix(parseInt(value['start_date'])).format('lll'));
                                userRowObj.find('.activity_status_btn').text('Inactivate');
                                userRowObj.find('.activity_status_btn').attr("data-status", 'A');

                            } else {
                                htmlText = 'Stopped <i class="glyphicon glyphicon-stop"  aria-hidden="true"></i>';
                                userRowObj.find('#activity_status').html(htmlText);
                                userRowObj.find('#avtivity_status_label').text('Stopped');
                                userRowObj.find('#avtivity_status_time').text(moment.unix(parseInt(value['stop_date'])).format('lll'));
                                userRowObj.find('.activity_status_btn').text('Activate');
                                userRowObj.find('.activity_status_btn').attr("data-status", 'I');
                            }


                            if (value['time_period_left'] == 0) {
                                userRowObj.find('#time_period_left').html('<span style="color:red">Time is Over</span>');
                                userRowObj.find('.activity_status_btn').attr("data-time_period_left", 0);
                            } else {
                                userRowObj.find('#time_period_left').text(convertDateTimeFormat(value['time_period_left']));
                            }

                            userRowObj.find('#used_time').text(sformat(parseInt(value['used_time'])));

                            var hrefHtml = "";
                            if (value['current_promotion_type'] == 'F') {
                                userRowObj.find('#changePromotionType').attr('data-promotion_type', 'F');
                                userRowObj.find('#current_promotion_type').text('Filter');
                                hrefHtml = "/filter/promotion/" + value['ins_user_id'];
                            } else {
                                userRowObj.find('#changePromotionType').attr('data-promotion_type', 'D');
                                userRowObj.find('#current_promotion_type').text('Default');
                                hrefHtml = "/default/promotion/" + value['ins_user_id'];
                            }
                            userRowObj.find('.activity_settings_btn').attr('href', hrefHtml);


                            if (parseInt(value['current_promotion_status']) == 0) {
                                userRowObj.find('#changePromotionType').attr('data-promotion_status', 0);
                                userRowObj.find('#current_promotion_status').html("Stopped <i class='glyphicon glyphicon-stop'></i>");
                            } else {
                                userRowObj.find('#changePromotionType').attr('data-promotion_status', 1);
                                userRowObj.find('#current_promotion_status').html("Running <i class='fa fa-refresh fa-spin'></i>");
                            }

                        })

                    }
                },
                error: function (error, response) {
                    console.log(error);
                }
            });
        }

        $(document.body).on('click', '#next', function (e) {
            e.preventDefault();
            $('#instructionForm').hide();
            $('#addAccountForm').show();
        });
        $(document.body).on('change', '#setProxy', function () {

            if ($(this).is(':checked')) {
                $('#addProxyForm').show('slow');
            } else {
                $('#addProxyForm').hide('slow');
            }
        });

        $(document.body).on('click', '#addInstagramAccountBtn', function (e) {
            e.preventDefault();
            $('#insta_username').val('');
            $('#insta_password').val('');
            $('#security_code').val('');
            $('#insta_username_error').text('');
            $('#insta_password_error').text('');
            $('#errorAddAccountMessage').text('');
            $('#errorCodeMessage').text('');

            $('#instructionForm').show();
            $('#addAccountForm').hide();
            $("#addSecurityCodeForm").hide();


            if ($('input[name="setProxy"]').is(':checked')) {
                $('#setProxy').attr('checked', false).closest('.toggle').addClass('off');

                $('#proxy_ip').val('');
                $('#proxy_port').val('');
                $('#proxy_username').val('');
                $('#proxy_password').val('');

                $('#proxy_display_message').html('<span>Test proxy connection to make sure it is working </span>');

            }
            $('#addProxyForm').hide();
        });


        $(document.body).on('click', '#test_proxy', function (e) {
            e.preventDefault();
            $('#errorAddAccountMessage').text('');
            var setProxy = 0, proxy_ip = null, proxy_port = null, proxy_username = null, proxy_password = null;
            if ($('input[name="setProxy"]').is(':checked')) {
                setProxy = 1;
                proxy_ip = $('#proxy_ip').val().trim();
                proxy_port = $('#proxy_port').val().trim();
                proxy_username = $('#proxy_username').val().trim();
                proxy_password = $('#proxy_password').val().trim();

                var ip_regex = /^(?!0)(?!.*\.$)((1?\d?\d|25[0-5]|2[0-4]\d)(\.|$)){4}$/;
                var port_regex = /^((6553[0-5])|(655[0-2][0-9])|(65[0-4][0-9]{2})|(6[0-4][0-9]{3})|([1-5][0-9]{4})|([1-9][0-9]{1,3}))$/;

                if ((proxy_ip.length == 0) || !ip_regex.test(proxy_ip)) {
                    $('#proxy_display_message').html('<span style="color:red">Invalid proxy ip.</span>');
                    return false;
                } else if ((proxy_port.length == 0) || !port_regex.test(proxy_port)) {
                    $('#proxy_display_message').html('<span style="color:red">Invalid proxy port.</span>');
                    return false;
                } else if (proxy_username.length == 0 || proxy_password.length == 0) {
                    $('#proxy_display_message').html('<span style="color:red">Proxy Username or Password is required.</span>');
                    return false;
                } else {
                    $('#proxy_display_message').html('<span>Test proxy connection to make sure it is working </span>');
                }


                $.ajax({
                    url: '/check/account/proxy',
                    dataType: 'json',
                    method: 'post',
                    data: {
                        proxy_ip: proxy_ip,
                        proxy_port: proxy_port,
                        proxy_username: proxy_username,
                        proxy_password: proxy_password
                    },
                    beforeSend: function () {
                        $("body").addClass("loading");
                    },
                    complete: function (xhr, status) {
                        $("body").removeClass("loading");
                    },
                    success: function (response) {
                        console.log(response);

                        if (response.status === 'success') {
                            $('#proxy_display_message').html('<span style="color:green">Proxy working fine.</span>');

                        } else if (response.status === 'failed') {
                            var htmlText = '';

                            if ($.isArray(response.message)) {
                                $.each(response.message, function (key, value) {
                                    htmlText += value;
                                });
                            } else if (typeof response.message === 'object') {
                                $.each(response.message, function (key, value) {
                                    htmlText += value[0];
                                });
                            } else {
                                htmlText += response.message;
                            }

                            $('#errorAddAccountMessage').html(htmlText);
                        }
                    },
                    error: function (error, response) {
                        console.log(error);
                    }
                });
            }

        });

        $(document.body).on('click', '#addInstagramAccount', function (e) {
            //Saurabh modifying 27/12/2017
            e.preventDefault();

            var insta_username = $('#insta_username').val().trim();
            var insta_password = $('#insta_password').val().trim();
            var setProxy = 0, proxy_ip = null, proxy_port = null, proxy_username = null, proxy_password = null;

            if (insta_username.length == 0) {
                $('#insta_username_error').text('Enter a valid username');
                $('#insta_password_error').text('');
                $('#errorAddAccountMessage').text('');
                $('insta_username').focus();
                return false;
            }
            else if (insta_password.length == 0) {
                $('#insta_password_error').text('Enter a valid password');
                $('#insta_username_error').text('');
                $('#errorAddAccountMessage').text('');
                $('insta_password').focus();
                return false;
            }
            else {
                $('#insta_username_error').text('');
                $('#insta_password_error').text('');
                $('#errorAddAccountMessage').text('');

            }

            if ($('input[name="setProxy"]').is(':checked')) {
                setProxy = 1;
                proxy_ip = $('#proxy_ip').val().trim();
                proxy_port = $('#proxy_port').val().trim();
                proxy_username = $('#proxy_username').val().trim();
                proxy_password = $('#proxy_password').val().trim();

                var ip_regex = /^(?!0)(?!.*\.$)((1?\d?\d|25[0-5]|2[0-4]\d)(\.|$)){4}$/;
                var port_regex = /^((6553[0-5])|(655[0-2][0-9])|(65[0-4][0-9]{2})|(6[0-4][0-9]{3})|([1-5][0-9]{4})|([1-9][0-9]{1,3}))$/;

                if ((proxy_ip.length == 0) || !ip_regex.test(proxy_ip)) {
                    $('#proxy_display_message').html('<span style="color:red">Invalid proxy ip.</span>');
                    return false;
                } else if ((proxy_port.length == 0) || !port_regex.test(proxy_port)) {
                    $('#proxy_display_message').html('<span style="color:red">Invalid proxy port.</span>');
                    return false;
                } else if (proxy_username.length == 0 || proxy_password.length == 0) {
                    $('#proxy_display_message').html('<span style="color:red">Proxy Username or Password is required.</span>');
                    return false;
                } else {
                    $('#proxy_display_message').html('<span>Test proxy connection to make sure it is working </span>');
                }
            }


            $.ajax({
                url: '/add/account',
                dataType: 'json',
                method: 'post',
                data: {
                    username: insta_username,
                    password: insta_password,
                    setProxy: setProxy,
                    proxy_ip: proxy_ip,
                    proxy_port: proxy_port,
                    proxy_username: proxy_username,
                    proxy_password: proxy_password
                },
                beforeSend: function () {
//                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
//                    $("body").removeClass("loading");
                },
                success: function (response) {
                    console.log(response);

                    if (response.status === 'success') {
                        $('#closeModalBtn').click();
                        window.location.reload(true);
                    }
                    else if (response.status === 'failed') {
                        var htmlText = '';
                        if (response.code == "201") {
                            $("#addAccountForm").hide();
                            $("#getVerificationCode").show();
                            $('#device_session').val(response.data.session);
                            $('#device_device').val(response.data.device);
                            $('#device_checkpoint_url').val(response.data.checkpoint_url);
                        }
                        else {
                            $('#errorAddAccountMessage').html(response.message);
                        }
                    }
                },
                error: function (error, response) {
                    console.log(error);
                }
            });


        });

        $('#sendSecurityCode').click(function () {
            console.log("send security code btn is clicked");
            var session = $('#device_session').val()
            var device = $('#device_device').val();
            console.log(session);
            console.log(device);
        });

        $(document.body).on('click', '#addInstagramAccountMain', function (e) {
            e.preventDefault();

            var insta_username = $('#insta_username').val().trim();
            var insta_password = $('#insta_password').val().trim();
            var setProxy = 0, proxy_ip = null, proxy_port = null, proxy_username = null, proxy_password = null;

            if (insta_username.length == 0) {
                $('#insta_username_error').text('Enter a valid username');
                $('#insta_password_error').text('');
                $('#errorAddAccountMessage').text('');
                $('insta_username').focus();
                return false;
            }
            else if (insta_password.length == 0) {
                $('#insta_password_error').text('Enter a valid password');
                $('#insta_username_error').text('');
                $('#errorAddAccountMessage').text('');
                $('insta_password').focus();
                return false;
            }
            else {
                $('#insta_username_error').text('');
                $('#insta_password_error').text('');
                $('#errorAddAccountMessage').text('');

            }

            if ($('input[name="setProxy"]').is(':checked')) {
                setProxy = 1;
                proxy_ip = $('#proxy_ip').val().trim();
                proxy_port = $('#proxy_port').val().trim();
                proxy_username = $('#proxy_username').val().trim();
                proxy_password = $('#proxy_password').val().trim();

                var ip_regex = /^(?!0)(?!.*\.$)((1?\d?\d|25[0-5]|2[0-4]\d)(\.|$)){4}$/;
                var port_regex = /^((6553[0-5])|(655[0-2][0-9])|(65[0-4][0-9]{2})|(6[0-4][0-9]{3})|([1-5][0-9]{4})|([1-9][0-9]{1,3}))$/;

                if ((proxy_ip.length == 0) || !ip_regex.test(proxy_ip)) {
                    $('#proxy_display_message').html('<span style="color:red">Invalid proxy ip.</span>');
                    return false;
                } else if ((proxy_port.length == 0) || !port_regex.test(proxy_port)) {
                    $('#proxy_display_message').html('<span style="color:red">Invalid proxy port.</span>');
                    return false;
                } else if (proxy_username.length == 0 || proxy_password.length == 0) {
                    $('#proxy_display_message').html('<span style="color:red">Proxy Username or Password is required.</span>');
                    return false;
                } else {
                    $('#proxy_display_message').html('<span>Test proxy connection to make sure it is working </span>');
                }
            }


            $.ajax({
                url: '/add/account',
                dataType: 'json',
                method: 'post',
                data: {
                    username: insta_username,
                    password: insta_password,
                    setProxy: setProxy,
                    proxy_ip: proxy_ip,
                    proxy_port: proxy_port,
                    proxy_username: proxy_username,
                    proxy_password: proxy_password
                },
                beforeSend: function () {
                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
                    $("body").removeClass("loading");
                },
                success: function (response) {
                    console.log(response);

                    if (response.status === 'success') {
                        $('#closeModalBtn').click();
                        window.location.reload(true);
                    }
                    else if (response.status === 'failed') {
                        var htmlText = '';
                        if (response.code == "431") {
                            $("#addAccountForm").hide();
                            $("#addSecurityCodeForm").show();
                        }
                        else {
                            if ($.isArray(response.message)) {
                                $.each(response.message, function (key, value) {
                                    htmlText += value;
                                });
                            } else if (typeof response.message === 'object') {
                                $.each(response.message, function (key, value) {
                                    htmlText += value[0];
                                });
                            } else {
                                htmlText += response.message;
                            }


                            if (response.has_account_locked != undefined && response.has_account_locked == true) {
                                if (response.checkPointUrl != undefined && response.checkPointUrl.length > 0) {
                                    htmlText += '<p>click <a href="' + response.checkPointUrl + '" target="_blank"> here </a> to verify.</p>';
                                }
                            } else {
                                if (response.checkPointUrl != undefined && response.checkPointUrl.length > 0) {
                                    htmlText += '<p>click <a href="' + response.checkPointUrl + '" target="_blank"> here </a> to learn more about your account.</p>';
                                }
                            }
                            $('#errorAddAccountMessage').html(htmlText);
                        }
                    }

                },
                error: function (error, response) {
                    console.log(error);
                }
            });


        });

        $(document.body).on('click', '#sendCode', function (e) {
            e.preventDefault();

            var insta_username = $('#insta_username').val().trim();
            var insta_password = $('#insta_password').val().trim();
            var security_code = $('#security_code').val().trim();
            var setProxy = 0, proxy_ip = null, proxy_port = null, proxy_username = null, proxy_password = null;

            if (insta_username.length == 0) {
                $('#insta_username_error').text('Enter a valid username');
                $('#insta_password_error').text('');
                $('#errorAddAccountMessage').text('');
                $('insta_username').focus();
                return false;
            }
            else if (insta_password.length == 0) {
                $('#insta_password_error').text('Enter a valid password');
                $('#insta_username_error').text('');
                $('#errorAddAccountMessage').text('');
                $('insta_password').focus();
                return false;
            }
            else {
                $('#insta_username_error').text('');
                $('#insta_password_error').text('');
                $('#errorAddAccountMessage').text('');

            }

            if ($('input[name="setProxy"]').is(':checked')) {
                setProxy = 1;
                proxy_ip = $('#proxy_ip').val().trim();
                proxy_port = $('#proxy_port').val().trim();
                proxy_username = $('#proxy_username').val().trim();
                proxy_password = $('#proxy_password').val().trim();

                var ip_regex = /^(?!0)(?!.*\.$)((1?\d?\d|25[0-5]|2[0-4]\d)(\.|$)){4}$/;
                var port_regex = /^((6553[0-5])|(655[0-2][0-9])|(65[0-4][0-9]{2})|(6[0-4][0-9]{3})|([1-5][0-9]{4})|([1-9][0-9]{1,3}))$/;

                if ((proxy_ip.length == 0) || !ip_regex.test(proxy_ip)) {
                    $('#proxy_display_message').html('<span style="color:red">Invalid proxy ip.</span>');
                    return false;
                } else if ((proxy_port.length == 0) || !port_regex.test(proxy_port)) {
                    $('#proxy_display_message').html('<span style="color:red">Invalid proxy port.</span>');
                    return false;
                } else if (proxy_username.length == 0 || proxy_password.length == 0) {
                    $('#proxy_display_message').html('<span style="color:red">Proxy Username or Password is required.</span>');
                    return false;
                } else {
                    $('#proxy_display_message').html('<span>Test proxy connection to make sure it is working </span>');
                }
            }


            $.ajax({
                url: '/verify/account',
                dataType: 'json',
                method: 'post',
                data: {
                    username: insta_username,
                    password: insta_password,
                    security_code: security_code,
                    setProxy: setProxy,
                    proxy_ip: proxy_ip,
                    proxy_port: proxy_port,
                    proxy_username: proxy_username,
                    proxy_password: proxy_password
                },
                beforeSend: function () {
                    $("body").addClass("loading");
                },
                complete: function (xhr, status) {
                    $("body").removeClass("loading");
                },
                success: function (response) {
                    console.log(response);

                    if (response.status === 'success') {
                        $('#closeModalBtn').click();
                        window.location.reload(true);
                    }
                    else if (response.status === 'failed') {
                        var htmlText = '';

                        if (response.code == '402') {
                            $('#errorCodeMessage').html('<span style="color:red">' + response.message + '</span>');
                        } else {
                            $('#errorCodeMessage').html('<span style="color:red">' + response.message + '</span>');
                        }
                    }

                },
                error: function (error, response) {
                    console.log(error);
                }
            });


        });
        $(document.body).on('click', '#addInstagramAccount_old', function (e) {
            e.preventDefault();

            var insta_username = $('#insta_username').val().trim();
            var insta_password = $('#insta_password').val().trim();

            if (insta_username.length == 0) {
                $('#insta_username_error').text('Enter a valid username');
                $('#insta_password_error').text('');
                $('#errorAddAccountMessage').text('');
                $('insta_username').focus();
                return false;
            } else if (insta_password.length == 0) {
                $('#insta_password_error').text('Enter a valid password');
                $('#insta_username_error').text('');
                $('#errorAddAccountMessage').text('');
                $('insta_password').focus();
                return false;
            } else {
                $('#insta_username_error').text('');
                $('#insta_password_error').text('');
                $('#errorAddAccountMessage').text('');
                $.ajax({
                    url: '/add/account',
                    dataType: 'json',
                    method: 'post',
                    data: {username: insta_username, password: insta_password},
                    beforeSend: function () {
                        $("body").addClass("loading");
                    },
                    complete: function (xhr, status) {
                        $("body").removeClass("loading");
                    },
                    success: function (response) {
                        console.log(response);

                        if (response.status === 'success') {
                            $('#closeModalBtn').click();
                            window.location.reload(true);
                        } else if (response.status === 'failed') {
                            var htmlText = '';

                            if ($.isArray(response.message)) {
                                $.each(response.message, function (key, value) {
                                    htmlText += value;
                                });
                            } else if (typeof response.message === 'object') {
                                $.each(response.message, function (key, value) {
                                    htmlText += value[0];
                                });
                            } else {
                                htmlText += response.message;
                            }


                            if (response.has_account_locked != undefined && response.has_account_locked == true) {
                                if (response.checkPointUrl != undefined && response.checkPointUrl.length > 0) {
                                    htmlText += '<p>click <a href="' + response.checkPointUrl + '" target="_blank"> here </a> to verify.</p>';
                                }
                            } else {
                                if (response.checkPointUrl != undefined && response.checkPointUrl.length > 0) {
                                    htmlText += '<p>click <a href="' + response.checkPointUrl + '" target="_blank"> here </a> to learn more about your account.</p>';
                                }
                            }
                            $('#errorAddAccountMessage').html(htmlText);
                        }
                    },
                    error: function (error, response) {
                        console.log(error);
                    }
                });
            }


        });


        //        var removeWarning = '';
        $(document.body).on('click', '#reconnectAccount', function () {
//            removeWarning = $(this).parents('.insta_account').find('.warn-hide');

            var userName = $(this).parents('.media').find('.media-body a').text();
            $('#insta_username_recconect').attr('value', userName);
            $('#reAuthModal').modal('show');
            $('#reconnectForm').show();
            $('#AccountReconnect').show().removeAttr('disabled').text('Re-connect');

            $('#insta_password_reconnect').val('');

            $('.alert-danger').hide();
            $('.alert-success').hide();

            setTimeout(function () {
                $('#insta_password_reconnect').focus();
            }, 1000);

        })

        $(document.body).on('click', '#AccountReconnect', function () {

            var user = $('#insta_username_recconect').val();
            var pass = $('#insta_password_reconnect').val();

            if (user.trim().length == 0) {
                $('.alert-danger').show().find('ul').text('Enter a valid username.');
                return false;
            } else if (pass.trim().length == 0) {
                $('.alert-danger').show().find('ul').text('Enter a valid Password.');
                return false;
            }
            console.log('please wait, reconnecting your account........');

            var AccountReconnectObj = $('#AccountReconnect');
            $.ajax({
                url: '/reconnect/account',
                method: 'POST',
                dataType: 'json',
                data: {
                    username: user,
                    password: pass
                },
                beforeSend: function () {

                    $('.alert-danger').hide();
                    $('.alert-success').hide();

                    AccountReconnectObj.attr('disabled', 'disabled');
                    AccountReconnectObj.css('background-color', '#1dc6bc');
                    AccountReconnectObj.css('color', '#fff');
                    AccountReconnectObj.text('Reconnecting..');
                },
                complete: function () {
//                        AccountReconnectObj.removeAttr( 'style' );
                    AccountReconnectObj.removeAttr('disabled');
                    AccountReconnectObj.text('Re-connect');
                },
                success: function (response) {

                    console.log(response);

                    if (response.status === 'success') {
//                        removeWarning.hide();
                        $('#close_account_reconnect_modal').click();
                        toastr.success('Account has been Re-Connected successfully.');
                        checkAccountStatus();
                    } else if (response.status === 'failed') {
                        var htmlText = '';

                        if ($.isArray(response.message)) {
                            $.each(response.message, function (key, value) {
                                htmlText += value;
                            });
                        } else if (typeof response.message === 'object') {
                            $.each(response.message, function (key, value) {
                                htmlText += value[0];
                            });
                        } else {
                            htmlText += response.message;
                        }


                        if (response.has_account_locked != undefined && response.has_account_locked == true) {
                            if (response.checkPointUrl != undefined && response.checkPointUrl.length > 0) {
                                htmlText += '<p>click <a href="' + response.checkPointUrl + '" target="_blank"> here </a> to verify.</p>';
                            }
                        } else {
                            if (response.checkPointUrl != undefined && response.checkPointUrl.length > 0) {
                                htmlText += '<p>click <a href="' + response.checkPointUrl + '" target="_blank"> here </a> to learn more about your account.</p>';
                            }
                        }
                        $('.alert-danger').show().find('ul').html(htmlText);
                    }

                }
            })
        })

        $(document.body).on('click', '.close-message', function () {
            $(this).parent().hide();
        })


        $(document.body).on('click', '.activity_status_btn', function (e) {
            e.preventDefault();
            var obj = $(this);

            if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                swal({
                    type: "error",
                    title: "<small style='color:red'>This Account has been disconnected from Smartffic System!!!</small>",
                    text: "<span>Click on More button for Re-Connect Account</span>",
                    html: true
                });
            } else if (obj.attr('data-time_period_left') == 0) {

                if (obj.attr('data-subscribe_type') == 'DU') {
                    swal({
                        animation: true,
                        type: "warning",
                        title: "<small style='color:#F8BB86'>Demo Subscription Period has been expired for this Account!!!</small>",
                        text: "<span>Click <a href='/user/packageLists'>here </a> for Purchasing more Subscription Period</span>",
                        html: true
                    });
                } else {
                    swal({
                        animation: true,
                        type: "warning",
                        title: "<small style='color:#F8BB86'>Subscription Package has been expired for this Account!!!</small>",
                        text: "<span>Click <a href='/user/packageLists'>here </a> to upgrade your Subscription</span>",
                        html: true
                    });
                }
            } else {
                $.ajax({
                    url: '/change/account/status',
                    dataType: 'json',
                    method: 'post',
                    data: {ins_user_id: [obj.attr('data-userId')], mode: 'DEFAULT'},

                    beforeSend: function () {
                        obj.addClass('disabled');
                    },
                    complete: function (xhr, status) {
                        obj.removeClass('disabled');
                    },

                    success: function (response) {
                        if (response.status === 'success') {
                            switch (obj.attr('data-status')) {
                                case 'I':
                                    obj.html('Inctivate');
                                    obj.attr('data-status', 'A');
                                    break;
                                case 'A':
                                    obj.html('Activate');
                                    obj.attr('data-status', 'I');
                                    break;
                                default :
                                    break;
                            }
                            checkAccountStatus();
                        } else if (response.status === 'failed') {

                            var htmlText = '';
                            $.each(response.message, function (key, value) {
                                htmlText += value;
                            });
                            $('#errorAddAccountMessage').text(htmlText);
                        }
                        console.log(response.message);
                    },
                    error: function (error, response) {
                        console.log(error);
                    }
                });
            }


        });

        $(document.body).on('click', '#active_all', function (e) {
            e.preventDefault();
            console.log(globalvar);
            var currentObj = $(this);
            $.ajax({
                url: '/change/account/status',
                dataType: 'json',
                method: 'post',
                data: {ins_user_id: globalvar, mode: 'ACTIVE_ALL'},

                beforeSend: function () {
                    currentObj.addClass('disabled');
                },
                complete: function (xhr, status) {
                    currentObj.removeClass('disabled');
                },

                success: function (response) {
                    if (response.status === 'success') {

                        $(".insta_account").each(function (key, obj) {
                            var isLoggedIn = $(obj).find('.activity_status_btn').attr('data-is_logged_in');
                            var isUserDisconnected = $(obj).find('.activity_status_btn').attr('data-is_user_disconnected');
                            var hasAccountLocked = $(obj).find('.activity_status_btn').attr('data-has_account_locked');
                            var timePeriodLeft = parseInt($(obj).find('.activity_status_btn').attr('data-time_period_left'));

                            if (timePeriodLeft > 0 && isLoggedIn == 'Y' && isUserDisconnected == 'N' && hasAccountLocked == 'F') {
                                $(obj).find('.activity_status_btn').text('Inactivate').attr('data-status', 'A');
                            }
                        });

                        checkAccountStatus();
                    } else if (response.status === 'failed') {

                        var htmlText = '';
                        $.each(response.message, function (key, value) {
                            htmlText += value;
                        });
                        $('#errorAddAccountMessage').text(htmlText);
                    }
                },
                error: function (error, response) {
                    console.log(error);
                }
            });
        });

        $(document.body).on('click', '#inactive_all', function (e) {
            e.preventDefault();
            console.log(globalvar);
            var currentObj = $(this);
            $.ajax({
                url: '/change/account/status',
                dataType: 'json',
                method: 'post',
                data: {ins_user_id: globalvar, mode: 'INACTIVE_ALL'},
                beforeSend: function () {
                    currentObj.addClass('disabled');
                },
                complete: function (xhr, status) {
                    currentObj.removeClass('disabled');
                },
                success: function (response) {
                    if (response.status === 'success') {

                        $(".insta_account").each(function (key, obj) {
                            var isLoggedIn = $(obj).find('.activity_status_btn').attr('data-is_logged_in');
                            var isUserDisconnected = $(obj).find('.activity_status_btn').attr('data-is_user_disconnected');
                            var hasAccountLocked = $(obj).find('.activity_status_btn').attr('data-has_account_locked');
                            var timePeriodLeft = parseInt($(obj).find('.activity_status_btn').attr('data-time_period_left'));

                            if (timePeriodLeft > 0 && isLoggedIn == 'Y' && isUserDisconnected == 'N' && hasAccountLocked == 'F') {
                                $(obj).find('.activity_status_btn').text('Activate').attr('data-status', 'I');
                            }
                        });

                        checkAccountStatus();
                    } else if (response.status === 'failed') {

                        var htmlText = '';
                        $.each(response.message, function (key, value) {
                            htmlText += value;
                        });
                        $('#errorAddAccountMessage').text(htmlText);
                    }
                },
                error: function (error, response) {
                    console.log(error);
                }
            });
        });

        var userId = null, main_user_div_id = null, promotionType = null, promotionStatus = null;

        $(document.body).on('click', '#changePromotionType', function (e) {
            e.preventDefault();
            userId = $(this).attr('data-userId');
            main_user_div_id = $(this).attr('data-insta_account_div_id');
            promotionType = $(this).attr('data-promotion_type');
            promotionStatus = $(this).attr('data-promotion_status');

            console.log(main_user_div_id, promotionType, promotionStatus);
            if (promotionType == 'F') {
                $("#promotion_filter_type").attr('checked', 'checked');
            } else {
                $("#promotion_default_type").attr('checked', 'checked');
            }

            if (parseInt(promotionStatus) == 1) {
                $("#promotion_status_start").attr('checked', 'checked');
            } else {
                $("#promotion_status_stop").attr('checked', 'checked');
            }

            $('#managePromotionType').modal('show');
        });
        $(document.body).on('click', '#savePromotionSettings', function (e) {
            e.preventDefault();
            var currentObj = $(this);
            var promotion_type = $("input[name='promotion_type']:checked").val();
            var promotion_status = $("input[name='promotion_status']:checked").val();

            console.log(promotion_type, promotion_status);
            if ((promotion_type == promotionType) && (parseInt(promotion_status) == parseInt(promotionStatus))) {
                $('#managePromotionType').modal('hide');
                return false;
            }

            $.ajax({
                url: '/change/promotion/settings',
                method: 'post',
                dataType: 'json',
                data: {instaUserId: userId, type: promotion_type, status: promotion_status},

                beforeSend: function () {
                    currentObj.addClass('disabled');
                },
                complete: function (xhr, status) {
                    currentObj.removeClass('disabled');
                },

                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        toastr.success('Record Updated successfully');

                        var userRowObj = $('.user_' + main_user_div_id);

                        var hrefHtml = "";
                        if (promotion_type == 'F') {
                            userRowObj.find('#changePromotionType').attr('data-promotion_type', 'F');
                            userRowObj.find('#current_promotion_type').text('Filter');
                            hrefHtml = "/filter/promotion/" + userId;
                        } else {
                            userRowObj.find('#changePromotionType').attr('data-promotion_type', 'D');
                            userRowObj.find('#current_promotion_type').text('Default');
                            hrefHtml = "/default/promotion/" + userId;
                        }
                        userRowObj.find('.activity_settings_btn').attr('href', hrefHtml);


                        if (parseInt(promotion_status) == 0) {
                            userRowObj.find('#changePromotionType').attr('data-promotion_status', 0);
                            userRowObj.find('#current_promotion_status').html("Stopped <i class='glyphicon glyphicon-stop'></i>");
                        } else {
                            userRowObj.find('#changePromotionType').attr('data-promotion_status', 1);
                            userRowObj.find('#current_promotion_status').html("Running <i class='fa fa-refresh fa-spin'></i>");
                        }


                        $('#managePromotionType').modal('hide');
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            })

        })
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>


    <script src="/assets/user/js/transition.min.js"></script>
    <script src="/assets/user/js/popup.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.popup_icon')
                .popup({
                    inline: true
                });
        });
    </script>

    <script>
        $(function () {
            $('.promotion_toggle').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
        })
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('User::layouts.bodyLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>