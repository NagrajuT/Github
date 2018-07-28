<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('active_profileManagement','active'); ?>

<?php $__env->startSection('headcontent'); ?>
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/user/css/sweetalert.css">
    <style>
        .truncate {

            min-width: auto !important;
            max-width: 215px;

            /*width: 250px;*/
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #fff;
        }

        .set.truncate a {
            color: #fff;
            text-decoration: none;
        }

        .parentDiv {
            padding-bottom: 15px;
        }
    </style>
    <style>
        .dateselecter label,
        .dateselecter input,
        .dateselecter i {
            display: inline-block;
        }

        #area,
        #searchtags,
        #add {
            display: none;
        }

        .removehover a:hover {
            background-color: white !important;
            color: #33CAC2 !important;
        }

        .dropdown > .dropdown-menu,
        .dropdown-toggle > .dropdown-menu,
        .btn-group > .dropdown-menu {
            margin-top: 0px !important;
        }

        .unit-tag {
            background: #666665 none repeat scroll 0 0 !important;
            border-radius: 4px !important;
            color: #fff !important;
            display: inline-block !important;
            line-height: 34px !important;
            margin: 0 26px 20px 0 !important;
            padding: 0 22px 0 12px !important;
            position: relative !important;
            text-decoration: none !important;
            vertical-align: middle !important;
        }

        .unit-btn-x {
            cursor: pointer !important;
            display: inline-block !important;
            font-family: Verdana !important;
            font-size: 14px !important;
            height: 34px !important;
            margin-left: 10px !important;
            right: 0 !important;
            text-align: center !important;
            top: 0 !important;
            width: 15px !important;
        }

        button.accordion {
            background-color: #fff;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        button.accordion.active,
        button.accordion:hover {
            background-color: #ddd;
        }

        button.accordion:after {
            content: '+';
            font-size: 20px;
            color: red;
            float: right;
            margin-left: 5px;
        }

        button.accordion.active:after {
            content: "-";
        }

        div.panel {
            padding: 0 18px;
            background-color: #EFF3F8;
            max-height: 0;
            overflow: hidden;
            transition: 0.6s ease-in-out;
            opacity: 0;
            padding-top: 15px;
        }

        div.panel.show {
            opacity: 1;
            max-height: 500px;
        }

        /*
    button.close {
        font-size: 40px !important;
    }
*/

        .close {
            padding-bottom: 8px;
            padding-top: 12px;
        }

        /*
    .closebtn {
        margin-left: 250px !important;
        background-color: #444D58 !important;
        color: white !important;
    }
*/

        .btnspace {
            margin-bottom: 10px;
        }

        .btncolor {
            background-color: #666665 !important;
            color: white !important;
            border-right: none !important;
        }

        .unit-tag img {
            border-radius: 15px !important;
            padding-right: 5px;
        }

        /*checks*/
        /*CSS Reset*/

        body {
            line-height: 1;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: normal;
        }

        ol, ul {
            list-style: none;
        }

        blockquote, q {
            quotes: none;
        }

        blockquote:before, blockquote:after,
        *:before, *:after {
            content: '';
            content: none;
        }

        :focus {
            outline: 0;
        }

        ins {
            text-decoration: none;
        }

        del {
            text-decoration: line-through;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        address, caption, cite, code, dfn, em, strong, var {
            font-weight: normal;
            font-style: normal;
        }

        caption, th {
            text-align: left;
            font-weight: normal;
            font-style: normal;
        }

        /*Starting block */
        /*by 10tribu */
        /** {*/
        /*transition: all .5s ease-out;*/
        /*}*/

        #warp {
            margin: 0 auto;
            width: 400px;
            text-align: center;
        }

        /* contour */
        div.push {
            position: relative;
            margin: 5px auto;
            padding: 6px 8px;
            width: 172px;
            height: 60px;
            border-radius: 25px;
            background-image: linear-gradient(bottom, rgba(255, 255, 255, .17) 0%, rgba(15, 16, 16, .17) 100%);
            background-clip: padding-box;
        }

        div.minimal {
            position: relative;
            margin: 10px auto -56px;
            padding: 6px 8px;
            width: 172px;
            height: 60px;
            background-image: none;
        }

        /* contour arriere du bouton */
        div.push:after {
            position: absolute;
            top: 6px;
            left: 4px;
            padding: 4px;
            width: 170px;
            height: 54px;
            border-radius: 17px;
            background-color: #4b5461;
            background-clip: padding-box;
            box-shadow: 0 4px 6px 2px rgba(15, 16, 16, .49);
            content: "";
        }

        div.minimal:after {
            display: none;
        }

        /* Bouton */
        label.check {
            position: relative;
            z-index: 20;
            display: block;
            margin: 0px 0 0;
            padding: 14px 0px;
            width: 134px;
            height: 28px;
            border-radius: 14px;
            background-color: #b3bbc5;
            background-image: linear-gradient(bottom, rgba(0, 0, 0, .24) -2.65%, rgba(255, 255, 255, .24) 97.35%);
            background-clip: padding-box;
            box-shadow: 0 2px 6px 2px rgba(15, 16, 16, .49), inset 0 3px rgba(255, 255, 255, 0.75);
            color: #464950;
            text-align: left;
            text-indent: 34px;
            font-size: 14px;
            line-height: 0px;
            cursor: pointer;
            user-select: none;
        }

        div.push label.check:hover {
            background-color: #bbc4cf;
        }

        div.minimal label.check:hover {
            background-color: #959ca7;
        }

        div.push label.check:active {
            background-image: linear-gradient(bottom, rgba(0, 0, 0, .34) -2.65%, rgba(255, 255, 255, .14) 97.35%);
            transform: scale(0.95);
        }

        div.push label.check:active ~ div.push:after { /* no work */
            transform: scale(0.95);
        }

        div.minimal label.check {
            background-color: #959ca7;
            background-image: none;
            box-shadow: none;
            color: #d5dadf;
            cursor: default;
        }

        div.minimal label.check:active {
            margin: 2px 0 0;
            background-image: none;
            transform: scale(0.99);
        }

        /* reflet du bouton */
        label.check:after {
            position: absolute;
            top: 2px;
            left: 0px;
            width: 170px;
            height: 28px;
            border-radius: 14px 14px 0px 0px / 14px 14px 0px 0px;
            background-color: rgba(255, 255, 255, .21);
            background-clip: padding-box;
            content: "";
        }

        label.check:hover:after {
            background-color: rgba(255, 255, 255, .32);
        }

        div.minimal label.check:after {
            display: none;
        }

        /* checkbox */
        input[type="checkbox"].push-btn {
            position: absolute;
            left: 0px;
            z-index: 20;
            display: inline-block;
            float: left;
            margin: -6px 20px 0 0;
            width: 33px;

            border-radius: 4px;
            background-color: rgba(69, 75, 88, 1.000);
            background-image: linear-gradient(bottom, rgba(235, 235, 235, .27) 0%, rgba(17, 17, 18, .27) 100%);
            background-clip: padding-box;
            box-shadow: 0 0 6px rgba(245, 245, 245, .2), inset 0 0 8px rgba(15, 16, 16, .75);
            appearance: none;
        }

        div.minimal input[type="checkbox"].push-btn {
            background-color: #d5dadf;
            background-image: none;
            box-shadow: none;
        }

        /* case coché */
        input[type="checkbox"].push-btn:checked:after {
            position: absolute;
            top: -2px;
            left: 4px;
            display: block;
            color: white;
            content: "✓";
            text-shadow: 0px 1px 2px black;
            font-weight: 300;
            font-family: "Charcoal CY";
        }

        div.minimal input[type="checkbox"].push-btn:checked:after {
            position: absolute;
            top: -2px;
            left: 4px;
            display: block;
            color: #959ca7;
            content: "✓";
            text-shadow: none;
        }

        /* codepen add */
        .remarque {
            font-size: 10px;
        }

        a {
            color: gray;
            text-decoration: none;
        }

        textarea {
            border-radius: 5px !important;
        }

        textarea:focus, textarea:hover {
            border: skyblue 1px solid !important;
            box-shadow: 0 0px 5px skyblue !important;
            border-radius: 5px;
        }
        .disable {
            background: #fff !important;
            color: #5d6b7a !important;
            border: 1px solid #ccc !important;
            cursor: not-allowed !important;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">

            <div class="row">

                <!-- Begin: life time stats -->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs fa-2x font-green-sharp" aria-hidden="true"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Catching Picture</span>
                            <span class="caption-helper"> (Grab post from filters data and upload it to account automatically...)</span>
                        </div>
                    </div>


                    <div class="portlet-body">


                        <?php if($status=='success'): ?>
                            <?php if(isset($data['accountList']) && !empty($data['accountList'])): ?>
                                <form action="/catching/pictures" method="post" id="formSubmit">
                                    <div class="row">
                                        <div id="accountSelection">

                                            <div class="col-md-3">

                                            </div>
                                            <div class="col-md-6" style="margin-top: 10px;">

                                                <div class="col-md-3 text_left" style="margin-top: 10px;text-align: right;">
                                                    <label for="instaUserId">Choose Account</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select name="instaUserId" id="instaUserId" class="form-control"
                                                            value="<?php echo e(old('instaUserId')); ?>"
                                                            style="border:1px solid #7d888e; border-radius:5px;">
                                                        <?php if(isset($data['accountList']) && !empty($data['accountList'])): ?>

                                                            <?php foreach($data['accountList'] as $key=>$value): ?>
                                                                <option value="<?php echo e($value['ins_user_id']); ?>"
                                                                        data-time_period_left="<?php echo e($value['time_period_left']); ?>"
                                                                        data-subscribe_type="<?php echo e($value['subscribe_type']); ?>"
                                                                        data-is_logged_in="<?php echo e($value['is_logged_in']); ?>"
                                                                        data-is_user_disconnected="<?php echo e($value['is_user_disconnected']); ?>"
                                                                        data-has_account_locked="<?php echo e($value['has_account_locked']); ?>"
                                                                        data-status="<?php echo e($value['status']); ?>"
                                                                        data-username="<?php echo e($value['username']); ?>"
                                                                        <?php if($data['selectedUserId']==$value['ins_user_id']): ?> selected <?php endif; ?> >
                                                                    <div>
                                                                        <img src="<?php echo e($value['profile_pic_url']); ?>"
                                                                             alt="Profile Pic">
                                                                        <?php echo e($value['username']); ?>

                                                                    </div>

                                                                </option>
                                                            <?php endforeach; ?>

                                                        <?php else: ?>
                                                            <option value="">-- No Account Found --</option>
                                                        <?php endif; ?>

                                                    </select>
                                                    <span style="color:red"><?php echo e($errors->first('instaUserId')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if(isset($data['selectedUserDetails'])): ?>

                                        <?php if($data['selectedUserDetails']['is_logged_in']=='Y' && $data['selectedUserDetails']['is_user_disconnected']=='N' ): ?>

                                            <?php if($data['selectedUserDetails']['time_period_left']==0): ?>
                                                <?php if($data['selectedUserDetails']['subscribe_type']=='DU'): ?>
                                                    <div class="row text-center" style="margin-top: 20px;">
                                                        <span style="color:red">Your trail period end. Upgrade your subscription to continue.</span>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="row text-center" style="margin-top: 20px;">
                                                        <span style="color:red">Your subscription period end. Upgrade your subscription to continue.</span>
                                                    </div>
                                                <?php endif; ?>

                                            <?php elseif($data['selectedUserDetails']['status']=='I'): ?>
                                                <div class="row text-center" style="margin-top: 20px;">
                                                    <span style="color:red">This Account is Inactive !!! Please Active this Account First </span>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <hr>
                                    <?php if(isset($data['selectedUserDetails']) && $data['selectedUserDetails']['is_user_disconnected']!='Y'): ?>
                                        <?php if(isset($data['selectedUserDetails']) && $data['selectedUserDetails']['subscribe_type']=='BU'): ?>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-sm-12 col-md-6"
                                                     style="border:1px solid #ddd;padding:15px;margin-left:10px;">
                                                    <label><b>Profile Management Status</b> <span
                                                                style="font-size: 11px">( Manage automatic tags promotion. )</span></label><br><br>
                                                    <div class="in">
                                                        <span class="uppercase bold"
                                                              data-old_promotion_status="<?php if(isset($data['catchingPicturesDetails'])): ?><?php echo e($data['catchingPicturesDetails']['promotion_status']); ?><?php else: ?><?php echo e(0); ?><?php endif; ?>"
                                                              id="promotion_change_status">

                                                            <?php if($data['catchingPicturesDetails']['promotion_status']==1): ?>
                                                                <a href="javascript:;" class="btn btn-success disable">
                                                                Running <i class="fa fa-refresh fa-spin"></i>
                                                                </a>
                                                                <a href="javascript:;" title="click to stop activity"
                                                                   class="btn btn-danger promotion_change_status" data-promotion_status="0">
                                                                Stop <i aria-hidden="true"
                                                                        class="glyphicon glyphicon-stop"></i>
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="javascript:;" title="click to start activity"
                                                                   class="btn btn-success promotion_change_status"
                                                                   data-promotion_status="1">
                                                                    Start <i class="fa fa-play"></i>
                                                                </a>
                                                                <a href="javascript:;" class="btn btn-danger disable">
                                                                    Stopped<i aria-hidden="true"
                                                                              class="glyphicon glyphicon-stop"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                        </span>

                                                        <span id="promotion_status_message" style="color: green;margin-left: 15px;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>


                                            <div class="row">
                                                <div class="col-md-6 col-md-offset-3" style="padding:0;">
                                                    <div class="col-md-6" style="padding:0;">
                                                        <div class="col-md-12">
                                                            <label for="uploadPostCountPerDay">
                                                                <b>Upload Max No. of Posts Per Day</b>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-12" style="margin:10px 0;">
                                                            <select id="uploadPostCountPerDay"
                                                                    name="uploadPostCountPerDay"
                                                                    class="form-control"
                                                                    style="border:1px solid #7d888e; border-radius:5px; line-height:30px;">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"></div>

                                                    <div class="col-md-6" style="padding:0 20px 0 0;">
                                                        <div class="col-md-12"><label for="delayBetweenPost"><b>Delay
                                                                    Between Each Post</b></label></div>
                                                        <div class="col-md-12" style="margin:10px 0;">
                                                            <select id="delayBetweenPost" name="delayBetweenPost"
                                                                    class="form-control"
                                                                    style="border:1px solid #7d888e; border-radius:5px;">
                                                                <option value="600">10 Mins</option>
                                                                <option value="900">15 Mins</option>
                                                                <option value="1200">20 Mins</option>
                                                                <option value="1500">25 Mins</option>
                                                                <option value="1800">30 Mins</option>
                                                                <option value="2400">40 Mins</option>
                                                                <option value="3000">50 Mins</option>
                                                                <option value="3600">1 Hr</option>
                                                                <option value="7200">2 Hrs</option>
                                                                <option value="14400">4 Hrs</option>
                                                                <option value="18000">5 Hrs</option>
                                                                <option value="21600">6 Hrs</option>
                                                                <option value="43200">12 Hrs</option>
                                                                <option value="54000">15 Hrs</option>
                                                                <option value="64800">18 Hrs</option>
                                                                <option value="86400">24 Hrs</option>
                                                                <option value="172800">2 Days</option>
                                                                <option value="345600">4 Days</option>
                                                                <option value="432000">5 Days</option>
                                                                <option value="604800">1 Week</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"></div>
                                                </div>
                                            </div>
                                            <br><br>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <label>
                                                        <i><img src="/assets/user/images/hashtag-plain.png" width="20px"
                                                                height="20px"></i>
                                                        <b>&nbsp;&nbsp;Add Hashtags</b>
                                                        <span style="font-size: 12px"> (catching pictures from specific added Hashtags)</span>
                                                    </label><br><br>
                                                    <div class="col-md-12 col-sm-12" style="padding: 0;">

                                                        <div id="mainHashTag">
                                                            <div class="btn-group" style="margin-bottom: 10px;">
                                                                <button type="button" class="btn btn-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#myModal" id="addHashtagsBtn">ADD
                                                                </button>
                                                                <button type="button"
                                                                        class="btn btncolor dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                       style="margin-bottom: 10px;"
                                                                       id="delete-all-hashtags" href="javascript:;">Delete
                                                                        all
                                                                        hashtags</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <span style="color:red"
                                                          id="hashTagData_error"><?php echo e($errors->first('hashTagData')); ?></span>
                                                </div>
                                                <input type="text" id="hashTagData" name="hashTagData" hidden
                                                       value="<?php echo e(old('hashTagData')); ?>">
                                            </div>
                                            <br><br>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <label>
                                                        <i><img src="/assets/user/images/tag-user.png" width="20px"
                                                                height="20px"></i>
                                                        <b>&nbsp;&nbsp;Add Username</b>
                                                        <span style="font-size: 12px"> (catching pictures from specific added Username)</span>
                                                    </label><br><br>
                                                    <div class="col-md-12 col-sm-12" style="padding: 0;">
                                                        <div id="mainUsername">
                                                            <div class="btn-group" style="margin-bottom: 10px;">
                                                                <button type="button" class="btn btn-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#myModal2" id="addUsernamesBtn">ADD
                                                                </button>
                                                                <button type="button"
                                                                        class="btn btncolor dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                       style="margin-bottom: 10px;"
                                                                       id="delete-all-usernames" href="javascript:;">Delete
                                                                        all
                                                                        Users</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <span style="color:red"
                                                          id="usernameData_error"><?php echo e($errors->first('usernameData')); ?></span>
                                                </div>
                                                <input type="text" id="usernameData" name="usernameData" hidden
                                                       value="<?php echo e(old('usernameData')); ?>">
                                            </div>
                                            <br><br>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <label>
                                                        <i><img src="/assets/user/images/location.png" width="20px"
                                                                height="20px"></i>
                                                        <b>&nbsp;&nbsp;Add Locations</b>
                                                        <span style="font-size: 11px"> (catching pictures from specific added location)</span>
                                                    </label><br><br>
                                                    <div class="col-md-12 col-sm-12" style="padding: 0;">

                                                        <div id="mainLocation">
                                                            <div class="btn-group" style="margin-bottom: 10px;">
                                                                <button type="button" class="btn btn-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#myModal1" id="addLocationBtn">ADD
                                                                </button>
                                                                <button type="button"
                                                                        class="btn btncolor dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                       style="margin-bottom: 10px;"
                                                                       id="delete-all-locations" href="javascript:;">Delete
                                                                        all
                                                                        Locations</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <span style="color:red"
                                                          id="locationData_error"><?php echo e($errors->first('locationData')); ?></span>
                                                </div>

                                                <input type="text" id="locationData" name="locationData" hidden
                                                       value="<?php echo e(old('locationData')); ?>">
                                            </div>
                                            <br><br>

                                            <div class="row text-center">
                                                <button id="saveCapturePicturesBtn" class="btn btn-success">Save
                                                </button>
                                            </div>
                                            <br><br>

                                        <?php else: ?>
                                            <div class="row text-center">

                                                <?php /*<img src="/assets/user/images/warning_purple.png" alt="" width="100">*/ ?>
                                                <img src="/assets/user/images/warning_yellow.png" alt="" width="100">
                                                <br><br>
                                                <div style="font-size:17px;">This feature is Available for Business
                                                    Subscriber
                                                    only. <br>
                                                    Upgrade Subscription Package for this account
                                                    ( @ <?php echo e($data['selectedUserDetails']['username']); ?>)
                                                </div>
                                                <br><br>
                                                <a href="/user/packageLists" class="btn btn-success"
                                                   style="background-color: #5cb85c">Buy subscription
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </a>
                                                <br><br>

                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>

                                        <div class="row text-center">
                                            <div class="row text-center">

                                                <img src="/assets/user/images/warning_error.png" alt="" width="100">
                                                <br><br>

                                                <div style="padding:12px;color: red">This Account has been disconnected
                                                    from Smartffic System !!!
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
                                    <?php endif; ?>


                                </form>
                            <?php else: ?>
                                <div class="row text-center">

                                    <?php /*<img src="/assets/user/images/warning_purple.png" alt="" width="100">*/ ?>
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
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="row text-center">
                                <img src="/assets/user/images/warning_error.png" alt="" width="100">
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
            <!-- END PAGE CONTENT -->

            <!-- -------------Modals For Add Username-------------------->
            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#444D58;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:center; color:white;">Add People</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="padding: 0px 10px;">
                                <div class="col-md-8 col-md-offset-2">

                                    <!-- Search Field -->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="input-group" id="search5">
                                                <input class="form-control" id="searchUsername" type="text"
                                                       name="searchUsername" placeholder="Search people" required/>
                                                <div class="input-group-btn">
                                                    <div class="btn btn-success" id="searchUsernameBtn">
                                                        <span id="user-search-icon"><i class="fa fa-search"
                                                                                       aria-hidden="true"></i></span>
                                                        <span id="user-loading-icon" hidden><i
                                                                    class="fa fa-refresh fa-spin"
                                                                    aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="userNameId"
                                     style="margin: 60px 0px 15px 5px; min-height: auto; max-height:260px; overflow-y:auto; overflow-x: hidden;">
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                            <button type="button" class="btn btn-info" id="addUsernamesModalBtn">Add</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- -------------Modals For Add Hashtags-------------------->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#444D58;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:center; color:white;">Add Hashtags</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="padding: 10px 0px;">
                                <div class="col-md-8 col-md-offset-2">

                                    <!-- Search Field -->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" id="searchHashtag" type="text"
                                                       placeholder="Search Hashatag" required/>

                                                <div class="input-group-btn">
                                                    <div class="btn btn-success" id="searchHashtagBtn">
                                                        <span id="hashtag-search-icon"><i class="fa fa-search"
                                                                                          aria-hidden="true"></i></span>
                                                        <span id="hashtag-loading-icon" hidden><i
                                                                    class="fa fa-refresh fa-spin"
                                                                    aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row" id="hashTagId" hidden
                                 style="margin: 5px 0px 15px 5px; min-height: auto; max-height:260px; overflow-y:auto; overflow-x: hidden;">

                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                            <button type="button" class="btn btn-info" id="addHashTagsModalBtn">Add</button>
                        </div>

                    </div>

                </div>
            </div>


            <!-- -------------Modals For Add Locations-------------------->
            <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#444D58;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:center; color:white;">Add Location</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row" style="padding: 10px 0px;">
                                <div class="col-md-8 col-md-offset-2">
                                    <!-- Search Field -->
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" id="searchLocation" type="text"
                                                       name="search" placeholder="Search Location" required/>
                                                <div class="input-group-btn">
                                                    <div class="btn btn-success" id="searchLocationBtn">
                                                        <span id="location-search-icon"><i class="fa fa-search"
                                                                                           aria-hidden="true"></i></span>
                                                        <span id="location-loading-icon" hidden><i
                                                                    class="fa fa-refresh fa-spin"
                                                                    aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="hidden" id="displayMapArea"
                                     style="height: 250px; margin: 0px 20px 0px 20px;">
                                </div>
                            </div>


                            <div class="row hidden" id="locationDetails"
                                 style="margin: 25px 0px 15px 5px; min-height: auto; max-height:260px; overflow-y:auto; overflow-x: hidden;">

                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
                            <button type="button" class="btn btn-info" id="addLocationsModalBtn">
                                Add
                            </button>
                        </div>

                    </div>

                </div>
            </div>

            <!-- -------------Modals For Display Success or error message------------------->
            <div class="modal fade bs-modal-md" id="customModal" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-body" style="text-align: center;">
                            <div id="customModelData">

                            </div>

                            <div class="modal-footer modal-footer-bookmarks" style="margin-top: 10px;">
                                <?php /*<button type="button" class="btn btn-default pull-right" style="color: #ffffff; background-color: #0c212b; border-color: #0c212b;" data-dismiss="modal">Close</button>*/ ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal"><!-- this is for loading image --></div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagejavascripts'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs"></script>

    <script src="/assets/user/js/bootbox.min.js"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>
    <script type="text/javascript">

        var hashtags = [], usernames = [], locations = [], timerid = null, isDataModified = false;
        var post_count_per_day, delay_between_post;
        $(document).ready(function () {

            $(document.body).on('click', '.promotion_change_status', function (e) {
                e.preventDefault();
                var currentObj=this;
                var promotionStatus = parseInt($(currentObj).attr('data-promotion_status'));

                if ((hashtags.length == 0) && (usernames.length == 0) && (locations.length == 0)) {
                    toastr.options.positionClass = "toast-top-center";
                    toastr.error('Please save the below settings first.');
                    return false;
                }

                var instaUserId = parseInt($('#instaUserId').val());
                $.ajax({
                    url: '/change/promotion/status',
                    dataType: 'json',
                    method: 'post',
                    data: {instaUserId: instaUserId, promotion_status: promotionStatus, method_name: 'CATCHING_PICTURE'},
                    success: function (response) {
                        if (response.status === 'success') {
                            var promotionHtml = '';
                            if (promotionStatus == 1) {
                                promotionHtml = '<a href="javascript:;" class="btn btn-success disable" style="width: 135px;">' +
                                        ' Running <i class="fa fa-refresh fa-spin"></i></a>' +
                                        ' <a href="javascript:;" title="click to stop activity" data-promotion_status="0" class="btn btn-danger promotion_change_status" style="width: 135px">' +
                                        ' Stop <i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a>';

                            } else {
                                promotionHtml = '<a href="javascript:;" title="click to start activity" data-promotion_status="1" class="btn btn-success promotion_change_status" style="width: 135px" data-id="0">' +
                                        ' Start <i class="fa fa-play"></i></a>' +
                                        ' <a href="javascript:;" class="btn btn-danger disable" style="width: 135px;"> ' +
                                        ' Stopped<i aria-hidden="true" class="glyphicon glyphicon-stop"></i></a>';
                            }

                            var promotion_change_status_obj = $(currentObj).closest('#promotion_change_status');

                            promotion_change_status_obj.html(promotionHtml);

                            $('#promotion_status_message').text(response.message).show();
                            setTimeout(function(){
                                $('#promotion_status_message').hide('slow');
                            },3000);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });


            });

            $(document.body).on('click', '#saveCapturePicturesBtn', function (e) {
                e.preventDefault();

                var obj = $('#instaUserId option:selected');
                if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @"+obj.attr('data-username')+" Account has been disconnected from Smartffic System!!!</small>",
                        text: "<span>Click on More button for Re-Connect Account</span>",
                        html: true
                    });
                }
                else if (obj.attr('data-time_period_left') == 0) {
                    if (obj.attr('data-subscribe_type') == 'DU') {
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Demo Subscription Period has been expired for this @"+obj.attr('data-username')+" account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> for Purchasing more Subscription Period</span>",
                            html: true
                        });
                    } else {
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Subscription Package has been expired for this @"+obj.attr('data-username')+" account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> to upgrade your Subscription</span>",
                            html: true
                        });
                    }
                }
                else if (obj.attr('data-status') == 'I') {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @"+obj.attr('data-username')+" account is Inactive!!! Please active this account first</small>",
                        text: "<span>Click <a href='/user/dashboard'>here </a> to active this account</span>",
                        html: true
                    });
                }
                else {
                    if ((hashtags.length == 0) && (usernames.length == 0) && (locations.length == 0)) {
                        toastr.error('Add Alteast one hashtag or username or location');
                        return false;
                    }

                    var hashTagDataObj = $('#hashTagData');
                    hashTagDataObj.val(hashtags.join(','));

                    if (hashtags.length >= 0) {
                        $('#hashTagData').val(hashtags.join(','));
                    }

                    if (usernames.length >= 0) {
                        $('#usernameData').val(JSON.stringify(usernames));
                    }
                    if (locations.length >= 0) {
                        $('#locationData').val(JSON.stringify(locations));
                    }
                    if (isDataModified) {
                        $('#formSubmit').submit();
                    } else {
                        toastr.error('Nothing to save');
                    }
                }

            })


            $(document.body).on('change', '#instaUserId', function (e) {
                e.preventDefault();
                window.location.href = '/catching/pictures/' + $(this).val();
            })


            $(document.body).on('change', '#uploadPostCountPerDay', function (e) {
                if ($(this).val() != post_count_per_day) {
                    isDataModified = true;
                }
            })

            $(document.body).on('change', '#delayBetweenPost', function (e) {
                if ($(this).val() != delay_between_post) {
                    isDataModified = true;
                }
            })
            var isDetailsPresent = '<?php if (isset($data["catchingPicturesDetails"])) echo 1?>' || 0;

            if (parseInt(isDetailsPresent)) {
                post_count_per_day = '<?php echo e($data["catchingPicturesDetails"]["post_count_per_day"]); ?>';
                delay_between_post = '<?php echo e($data["catchingPicturesDetails"]["delay_between_post"]); ?>';
                $('#uploadPostCountPerDay').val(parseInt(post_count_per_day));
                $('#delayBetweenPost').val(parseInt(delay_between_post));

            }


            var oldHashTagData = '<?php echo e(old("hashTagData")); ?>' || '<?php if (isset($data["catchingPicturesDetails"]) && !empty($data["catchingPicturesDetails"]["tags"])) echo $data["catchingPicturesDetails"]["tags"];?>' || null;
            if (oldHashTagData != null) {
                var hashTagsArray = oldHashTagData.split(',');
                var mainHashTagHtml = '', hashTagValue = '';
                $.each(hashTagsArray, function (key, value) {
                    hashtags.push(value);
                    mainHashTagHtml += '<div class="btn-group btnspace remove-hashtag-btn" style="margin-right: 4px;">' +
                            '<a type="button" class="btn btncolor" style="cursor:default;" data-toggle="modal" data-target="#">' + value + '</a>' +
                            '<a type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeTag"  data-hashtag-name="' + value + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            '<span class="close"></span></a></div>';

                });

                $('#mainHashTag').prepend(mainHashTagHtml);
            }


            var oldUsernameData = '<?php echo e(old("usernameData")); ?>' || '<?php if (isset($data["catchingPicturesDetails"]) && !empty($data["catchingPicturesDetails"]["usernames"])) echo $data["catchingPicturesDetails"]["usernames"];?>' || null;
            if (oldUsernameData != null) {
                var usernamesArray = JSON.parse(oldUsernameData.replace(/&quot;/g, '\"'));
                var mainUsernameHtml = '';
                $.each(usernamesArray, function (key, value) {
                    usernames.push(value);
                    mainUsernameHtml += '<div class="btn-group btnspace remove-username-btn" style="margin-right: 4px;">' +
                            '<a style="padding: 4px 0px 3px 5px; cursor:default;"  class="btn btncolor" data-toggle="modal" data-target="#" >' +
                            '<img src="' + value.profile_pic + '" height="27px" width="30px" style="border-radius: 5px;"></a>' +
                            '<a style="cursor:default;"  class="btn btncolor" data-toggle="modal" data-target="#">' + value.username + '</a>' +
                            '<a type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeUsername"  data-id="' + value.id + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            '<span class="close"></span></a></div>';

                });

                $('#mainUsername').prepend(mainUsernameHtml);
            }


            var oldLocationData = '<?php echo e(old("locationData")); ?>' || '<?php if (isset($data["catchingPicturesDetails"]) && !empty($data["catchingPicturesDetails"]["locations"])) echo $data["catchingPicturesDetails"]["locations"]; ?>' || null;
            if (oldLocationData != null) {
                var locationsArray = JSON.parse(oldLocationData.replace(/&quot;/g, '\"'));
                var mainLocationHtml = '';
                $.each(locationsArray, function (key, value) {
                    locations.push(value);
                    mainLocationHtml += '<div class="btn-group btnspace remove-location-btn" style="margin-right: 4px;">' +
                            '<a  class="btn btncolor" style="cursor:default;" data-toggle="modal" data-target="#">' + value.name + '</a>' +
                            '<a  style="height: 34px;" class="btn btncolor dropdown-toggle removeLocation"  data-location-id="' + value.id + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            '<span class="close"></span></a></div>';

                });

                $('#mainLocation').prepend(mainLocationHtml);
            }


            var catchingPicturesDataSavedStatus = "<?php if(isset($catchingPicturesDataSavedMsg)): ?> <?php echo e($catchingPicturesDataSavedMsg['status']); ?> <?php endif; ?>" || null;
            if (catchingPicturesDataSavedStatus != null && catchingPicturesDataSavedStatus.trim().length > 0) {
                var catchingPicturesDataSavedMsg = "<?php if(isset($catchingPicturesDataSavedMsg)): ?> <?php echo e($catchingPicturesDataSavedMsg['message']); ?> <?php endif; ?>";

                var htmlModalData = '';
                if (catchingPicturesDataSavedStatus.trim() == 'success') {
                    toastr.success(catchingPicturesDataSavedMsg);
                } else {
                    htmlModalData = '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                            '<strong style="font-size: large;">Oops!</strong>' +
                            '<h4>' + catchingPicturesDataSavedMsg + '</h4>';
                    $('#customModelData').html(htmlModalData);
                    $('#customModal').modal('show');
                }
            }

        })

    </script>

    <script type="text/javascript">

        $(document).ready(function () {

            $(document.body).on('click', '#addHashtagsBtn', function (e) {
                e.preventDefault();
                $("#searchHashtag").val('');
                $("#hashTagId").html('');
                $('#hashTagData_error').text('');
            })

            $(document.body).on('input', '#searchHashtag', function (e) {

                var hashTagIdElementObj = $("#hashTagId");
                var currentObj = $(this);
                var searchValue = currentObj.val();

                if (searchValue.length == 0) {
                    hashTagIdElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                if (currentObj.data("lastval") != searchValue) {

                    currentObj.data("lastval", searchValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {

                        hashTagIdElementObj.html('');

                        $.ajax({
                            url: '/user/hashTagFinder',
                            type: 'post',
                            data: {'tag': searchValue},

                            beforeSend: function () {
                                $('#hashtag-search-icon').hide();
                                $('#hashtag-loading-icon').show();
                            },
                            success: function (response) {
                                var searchHagtagHtmlData = '';
                                if (response == 201) {
                                    $(currentObj).focus();
                                    searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                }
                                else if (response == 202) {
                                    $(currentObj).focus();
                                    searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                }
                                else {

                                    if (response.length > 0) {
                                        $.each(response, function (key, value) {
                                            searchHagtagHtmlData += '<a  href="javascript:;" class="unit-tag checkedHashTags-label">' +
                                                    '<i class="fa fa-tag"></i> <span>' + value.name + '</span> <span class="countrer">' + value.media_count + ' posts</span>' +
                                                    '<span class="unit-btn-x"><input class="checkedHashTags" type="checkbox" data-hashtag-value="' + value.name + '"></span>' +
                                                    '</a>';
                                        });
                                    } else {
                                        $(currentObj).focus();
                                        searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                    }
                                }

                                $("#hashTagId").html(searchHagtagHtmlData).show();
                                $('#hashtag-search-icon').show();
                                $('#hashtag-loading-icon').hide();
                            }
                        });

                    }, 500);
                }
            });

            $(document.body).on('click', '#searchHashtagBtn', function (e) {
                var hashTagIdElementObj = $("#hashTagId");
                var currentObj = $('#searchHashtag');
                var searchValue = currentObj.val();

                if (searchValue.length == 0) {
                    hashTagIdElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                if (currentObj.data("lastval") != searchValue) {

                    currentObj.data("lastval", searchValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {

                        hashTagIdElementObj.html('');

                        $.ajax({
                            url: '/user/hashTagFinder',
                            type: 'post',
                            data: {'tag': searchValue},

                            beforeSend: function () {
                                $('#hashtag-search-icon').hide();
                                $('#hashtag-loading-icon').show();
                            },

                            success: function (response) {
                                var searchHagtagHtmlData = '';
                                if (response == 201) {
                                    $(currentObj).focus();
                                    searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                }
                                else if (response == 202) {
                                    $(currentObj).focus();
                                    searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                }
                                else {

                                    if (response.length > 0) {
                                        $.each(response, function (key, value) {
                                            searchHagtagHtmlData += '<a  href="javascript:;" class="unit-tag checkedHashTags-label">' +
                                                    '<i class="fa fa-tag"></i> <span>' + value.name + '</span> <span class="countrer">' + value.media_count + ' posts</span>' +
                                                    '<span class="unit-btn-x"><input class="checkedHashTags" type="checkbox" data-hashtag-value="' + value.name + '"></span>' +
                                                    '</a>';
                                        });
                                    } else {
                                        $(currentObj).focus();
                                        searchHagtagHtmlData = '<div style="align-content: center">No results found.</div>';
                                    }
                                }

                                $("#hashTagId").html(searchHagtagHtmlData).show();
                                $('#hashtag-search-icon').show();
                                $('#hashtag-loading-icon').hide();
                            }
                        });

                    }, 500);
                }
            });

            $(document.body).on('click', '.checkedHashTags-label', function () {
                var currentElementObj = $(this).find('.checkedHashTags');
                if ($(currentElementObj).is(":checked")) {
                    console.log('checked')
                    $(currentElementObj).attr('checked', false);
                } else {
                    $(currentElementObj).attr('checked', true);
                    console.log('unchecked')
                }
            });
            $(document.body).on('click', '.checkedHashTags', function () {
                if ($(this).is(":checked")) {
                    $(this).attr('checked', false);
                } else {
                    $(this).attr('checked', true);
                }
            });

            $(document.body).on('click', '#addHashTagsModalBtn', function (e) {
                e.preventDefault();
                var mainHashTagHtml = '', hashTagValue = '';

                var selectedHashtags = $('.checkedHashTags:checkbox:checked');
                if (selectedHashtags.length > 0) {
                    $.each(selectedHashtags, function () {
                        hashTagValue = $(this).attr('data-hashtag-value');
                        hashtags.push(hashTagValue);
                        mainHashTagHtml += '<div class="btn-group btnspace remove-hashtag-btn" style="margin-right: 4px;">' +
                                '<a type="button" class="btn btncolor" style="cursor:default;" data-toggle="modal" data-target="#">' + hashTagValue + '</a>' +
                                '<a type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeTag"  data-hashtag-name="' + hashTagValue + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                '<span class="close"></span></a></div>';
                        isDataModified = true;
                    });

                    $('#mainHashTag').prepend(mainHashTagHtml);
                    $('#myModal').hide();
                } else {
                    toastr.error('No Hashtags selected')
                }

            });

            $(document.body).on('click', '.removeTag', function (e) {
                isDataModified = true;
                $(this).parent('.remove-hashtag-btn').remove();
                var removeItem = $(this).attr('data-hashtag-name');
                hashtags = jQuery.grep(hashtags, function (value) {
                    return value != removeItem;
                });

                if (hashtags.length > 0) {
                    $('#hashTagData_error').text('');
                } else {
                    $('#hashTagData_error').text('Atleast one hash tag is required');
                }
            });

            $(document.body).on('click', '#delete-all-hashtags', function (e) {
                e.preventDefault();
                if (hashtags.length > 0) {
                    $('.remove-hashtag-btn').remove();
                    hashtags = [];
                    isDataModified = true;
                } else {
                    toastr.error('No Hashtag Added !!!');
                }
            });
        });

    </script>
    <script type="text/javascript">

        $(document).ready(function () {

            $(document.body).on('input', '#searchUsername', function (e) {
                var userNameIdElementObj = $("#userNameId");
                var currentObj = $(this);
                var searchValue = currentObj.val();

                if (searchValue.length == 0) {
                    userNameIdElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                if (currentObj.data("lastval") != searchValue) {

                    currentObj.data("lastval", searchValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {
                        userNameIdElementObj.html('');

                        $.ajax({
                            url: '/user/userNameFinder',
                            type: 'post',
                            data: {'searchValue': searchValue},

                            beforeSend: function () {
                                $('#user-search-icon').hide();
                                $('#user-loading-icon').show();
                            },

                            success: function (response) {
                                if (response == 201) {
                                    $(currentObj).focus();
                                    $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                }
                                else if (response == 202) {
                                    $(currentObj).focus();
                                    $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                }
                                else {

                                    var searchUsernameHtmlData = '';

                                    if (response.length > 0) {

                                        $.each(response, function (key, value) {
                                            searchUsernameHtmlData += '<a  href="javascript:;" class="unit-tag checkedUsernames-label">' +
                                                    '<span><img src="' + value.profile_pic_url + '" height="25px" width="25px" >' +
                                                    '<span>' + value.username + '</span> <span class="countrer">Followers - ' + value.follower_count + ' </span>' +
                                                    '<span class="unit-btn-x"><input class="checkedUsernames" type="checkbox" data-username="' + value.username + '" data-profilePic="' + value.profile_pic_url + '"  data-id="' + value.pk + '" ></span>' +
                                                    '</a>';
                                        });
                                        $("#userNameId").html(searchUsernameHtmlData);
                                    }
                                    else {
                                        $(currentObj).focus();
                                        $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                    }
                                }
                                $('#user-search-icon').show();
                                $('#user-loading-icon').hide();
                            }
                        });

                    }, 500);
                }
            });

            $(document.body).on('click', '#searchUsernameBtn', function (e) {

                var userNameIdElementObj = $("#userNameId");


                var currentObj = $('#searchUsername');
                var searchValue = currentObj.val();

                if (searchValue.length == 0) {
                    userNameIdElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                if (currentObj.data("lastval") != searchValue) {

                    currentObj.data("lastval", searchValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {
                        userNameIdElementObj.html('');
                        $.ajax({
                            url: '/user/userNameFinder',
                            type: 'post',
                            data: {'searchValue': searchValue},

                            beforeSend: function () {
                                $('#user-search-icon').hide();
                                $('#user-loading-icon').show();
                            },

                            success: function (response) {
                                if (response == 201) {
                                    $(currentObj).focus();
                                    $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                }
                                else if (response == 202) {
                                    $(currentObj).focus();
                                    $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                }
                                else {

                                    var searchUsernameHtmlData = '';

                                    if (response.length > 0) {

                                        $.each(response, function (key, value) {
                                            searchUsernameHtmlData += '<a  href="javascript:;" class="unit-tag checkedUsernames-label" >' +
                                                    '<span><img src="' + value.profile_pic_url + '" height="25px" width="25px" >' +
                                                    '<span>' + value.username + '</span> <span class="countrer">Followers - ' + value.follower_count + ' </span>' +
                                                    '<span class="unit-btn-x"><input class="checkedUsernames" type="checkbox" data-username="' + value.username + '" data-profilePic="' + value.profile_pic_url + '"  data-id="' + value.pk + '" ></span>' +
                                                    '</a>';
                                        });
                                        $("#userNameId").html(searchUsernameHtmlData);
                                    }
                                    else {
                                        $(currentObj).focus();
                                        $("#userNameId").html('<div style="align-content: center">No results found.</div>');
                                    }
                                }
                                $('#user-search-icon').show();
                                $('#user-loading-icon').hide();
                            }
                        });

                    }, 500);
                }
            });

            $(document.body).on('click', '.checkedUsernames-label', function () {
                var currentElementObj = $(this).find('.checkedUsernames');
                if ($(currentElementObj).is(":checked")) {
                    console.log('checked')
                    $(currentElementObj).attr('checked', false);
                } else {
                    $(currentElementObj).attr('checked', true);
                    console.log('unchecked')
                }
            });
            $(document.body).on('click', '.checkedUsernames', function () {
                if ($(this).is(":checked")) {
                    $(this).attr('checked', false);
                } else {
                    $(this).attr('checked', true);
                }
            });

            $(document.body).on('click', '#addUsernamesModalBtn', function (e) {
                e.preventDefault();

                var mainUsernameHtml = '';

                var selectedUsernames = $('.checkedUsernames:checkbox:checked');
                if (selectedUsernames.length > 0) {
                    $.each(selectedUsernames, function () {
                        usernames.push({
                            id: $(this).attr('data-id'),
                            username: $(this).attr('data-username'),
                            profile_pic: $(this).attr('data-profilePic')
                        });

                        mainUsernameHtml += '<div class="btn-group btnspace remove-username-btn" style="margin-right: 4px;">' +
                                '<a style="padding: 4px 0px 3px 5px; cursor:default;"  class="btn btncolor" data-toggle="modal" data-target="#" >' +
                                '<img src="' + $(this).attr('data-profilePic') + '" height="27px" width="30px" style="border-radius: 5px;"></a>' +
                                '<a style="cursor:default;"  class="btn btncolor" data-toggle="modal" data-target="#">' + $(this).attr('data-username') + '</a>' +
                                '<a type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeUsername"  data-id="' + $(this).attr('data-id') + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                '<span class="close"></span></a></div>';

                        isDataModified = true;
                    });

                    $('#mainUsername').prepend(mainUsernameHtml);
                    $('#myModal2').hide();
                } else {
                    toastr.error('No Username selected')
                }
            });

            $(document.body).on('click', '.removeUsername', function (e) {
                e.preventDefault();
                $(this).parent('.remove-username-btn').remove();
                var removeItem = $(this).attr('data-id');
                usernames = jQuery.grep(usernames, function (value) {
                    return value.id != removeItem;
                });
                console.log(usernames);
                isDataModified = true;
            });

            $(document.body).on('click', '#delete-all-usernames', function (e) {
                e.preventDefault();

                if (usernames.length > 0) {
                    $('.remove-username-btn').remove();
                    usernames = [];
                    isDataModified = true;
                } else {
                    toastr.error('No Username Added !!!')
                }
            });
            
        });

    </script>
    <script type="text/javascript">

        $(document).ready(function () {


            var GoogleMapObj = {
                infowindow: null,
                bounds: null,
                customIconBase: 'https://maps.google.com/mapfiles/kml/shapes/' + 'parking_lot_maps.png'
            };

            function markMultipleLocationOnGoogleMap(locations) {

                var map = new google.maps.Map(document.getElementById('displayMapArea'), {
                    zoom: 10,
                    center: new google.maps.LatLng(locations[0][1], locations[0][2]),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });


                var bounds = new google.maps.LatLngBounds();

                if (GoogleMapObj.infowindow == null) {
                    GoogleMapObj.infowindow = new google.maps.InfoWindow();
                }

                var marker, i;
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
//                        icon: GoogleMapObj.customIconBase

                    });

                    //extend the bounds to include each marker's position
                    bounds.extend(marker.position);
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            GoogleMapObj.infowindow.setContent(locations[i][0]);
                            GoogleMapObj.infowindow.open(map, marker);
                        }
                    })(marker, i));
                }

                //now fit the map to the newly inclusive bounds
                map.fitBounds(bounds);//       # auto-zoom
                map.panToBounds(bounds);//     # auto-center


            }

            $(document.body).on('input', '#searchLocation', function (e) {
                e.preventDefault();
                var locationDetailsElementObj = $("#searchLocationValue");
                locationDetailsElementObj.html('');

                var currentObj = $(this);
                var searchLocationValue = currentObj.val();

                if (searchLocationValue.length == 0) {
                    locationDetailsElementObj.html('');
                    currentObj.focus();
                    return false;
                }

                var geocoder = geocoder = new google.maps.Geocoder();
                var address = searchLocationValue;
                geocoder.geocode({'address': address}, function (results, status) {
                    if (typeof(results[0]) != "undefined" && results[0] != null) {

                        var place = results[0].formatted_address;

                        if (~place.indexOf(",")) {
                            var country = place.split(",");
                            country = country[country.length - 1];
                            var full_address = searchLocationValue + "," + country;
                            full_address = full_address.replace(' ', '');
                        }
                        else {
                            full_address=searchLocationValue;
                        }
                        if (currentObj.data("lastval") != searchLocationValue) {

                            currentObj.data("lastval", searchLocationValue);
                            clearTimeout(timerid);

                            timerid = setTimeout(function () {

                                $.ajax({
                                    url: '/user/findLocation',
                                    methos: 'post',
                                    data: {
                                        searchLocation: full_address
                                    },
                                    beforeSend: function () {
                                        $('#location-search-icon').hide();
                                        $('#location-loading-icon').show();
                                    },
                                    success: function (response) {
                                        if (response.length == 0) {
                                            $('#displayMapArea').addClass('hidden');
                                            $('#locationDetails').html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                                        }
                                        else if (response == 201) {
                                            $('#displayMapArea').addClass('hidden');
                                            $('#locationDetails').html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                                        }
                                        else if (response == 202) {
                                            $('#displayMapArea').addClass('hidden');
                                            $('#locationDetails').html('<div style="text-align: center;">Error in service</div>');
                                        }
                                        else {

                                            var searchedLocationHtmlData = '';

                                            $("#loadnwait").css('display', 'none');
                                            if (response.length > 0) {


                                                var markerLocations = [];

                                                $.each(response, function (key, value) {
                                                    searchedLocationHtmlData += '<a  href="javascript:;" class="unit-tag checkedLocations-label">' +
                                                        '<span>' + value.name + '</span><span class="unit-btn-x">' +
                                                        '<input class="checkedLocations" type="checkbox" data-name="' + value.name + '" data-id="' + value.pk + '" data-latitude="' + value.lat + '" data-longitude="' + value.lng + '"></span>' +
                                                        '</a>';

                                                    markerLocations.push([value.name, value.lat, value.lng, value.pk]);
                                                });

                                                markMultipleLocationOnGoogleMap(markerLocations);

                                                $("#locationDetails").html(searchedLocationHtmlData);
                                                $('#displayMapArea').removeClass('hidden');
                                            }
                                            else {
                                                $('#searchLocation').focus();
                                                $('#displayMapArea').addClass('hidden');
                                                $("#locationDetails").html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                                            }
                                        }

                                        $('#locationDetails').removeClass('hidden');
                                        $('#location-search-icon').show();
                                        $('#location-loading-icon').hide();
                                    }
                                });

                            }, 500);
                        }

                    } else {
                        $('#searchLocation').focus();
                        $('#displayMapArea').addClass('hidden');
                        $('#locationDetails').html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
//                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });

            });
            $(document.body).on("click", "#searchLocationBtn", function (e) {
                e.preventDefault();
                var currentObj = $(this);
                var locationDetailsObj = $('#locationDetails');
                locationDetailsObj.html('');

                var locationDetailsElementObj = $("#searchLocation");

                var searchLocationValue = locationDetailsElementObj.val();

                if (searchLocationValue.length == 0) {
                    locationDetailsElementObj.focus();
                    return false;
                }

                var geocoder = geocoder = new google.maps.Geocoder();
                var address = searchLocationValue;
                geocoder.geocode({'address': address}, function (results, status) {
                    if (typeof(results[0]) != "undefined" && results[0] != null) {

                        var place = results[0].formatted_address;

                        if (~place.indexOf(",")) {
                            var country = place.split(",");
                            country = country[country.length - 1];
                            var full_address = searchLocationValue + "," + country;
                            full_address = full_address.replace(' ', '');
                        }
                        else {
                            full_address=searchLocationValue;
                        }
                        if (currentObj.data("lastval") != searchLocationValue) {

                            currentObj.data("lastval", searchLocationValue);
                            clearTimeout(timerid);

                            timerid = setTimeout(function () {

                                $.ajax({
                                    url: '/user/findLocation',
                                    methos: 'post',
                                    data: {
                                        searchLocation: full_address
                                    },
                                    beforeSend: function () {
                                        $('#location-search-icon').hide();
                                        $('#location-loading-icon').show();
                                    },
                                    success: function (response) {
                                        if (response.length == 0) {
                                            $('#displayMapArea').addClass('hidden');
                                            $('#locationDetails').html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                                        }
                                        else if (response == 201) {
                                            $('#displayMapArea').addClass('hidden');
                                            $('#locationDetails').html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                                        }
                                        else if (response == 202) {
                                            $('#displayMapArea').addClass('hidden');
                                            $('#locationDetails').html('<div style="text-align: center;">Error in service</div>');
                                        }
                                        else {

                                            var searchedLocationHtmlData = '';

                                            $("#loadnwait").css('display', 'none');
                                            if (response.length > 0) {


                                                var markerLocations = [];

                                                $.each(response, function (key, value) {
                                                    searchedLocationHtmlData += '<a  href="javascript:;" class="unit-tag checkedLocations-label">' +
                                                        '<span>' + value.name + '</span><span class="unit-btn-x">' +
                                                        '<input class="checkedLocations" type="checkbox" data-name="' + value.name + '" data-id="' + value.pk + '" data-latitude="' + value.lat + '" data-longitude="' + value.lng + '"></span>' +
                                                        '</a>';

                                                    markerLocations.push([value.name, value.lat, value.lng, value.pk]);
                                                });

                                                markMultipleLocationOnGoogleMap(markerLocations);

                                                $("#locationDetails").html(searchedLocationHtmlData);
                                                $('#displayMapArea').removeClass('hidden');
                                            }
                                            else {
                                                $('#searchLocation').focus();
                                                $('#displayMapArea').addClass('hidden');
                                                $("#locationDetails").html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
                                            }
                                        }

                                        $('#locationDetails').removeClass('hidden');
                                        $('#location-search-icon').show();
                                        $('#location-loading-icon').hide();
                                    }
                                });

                            }, 500);
                        }

                    } else {
                        $('#searchLocation').focus();
                        $('#displayMapArea').addClass('hidden');
                        $('#locationDetails').html('<div style="text-align: center;">No Result Found !!! Please try different word</div>');
//                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            });

            $(document.body).on('click', '.checkedLocations-label', function () {
                var currentElementObj = $(this).find('.checkedLocations');
                if ($(currentElementObj).is(":checked")) {
                    console.log('checked')
                    $(currentElementObj).attr('checked', false);
                } else {
                    $(currentElementObj).attr('checked', true);
                    console.log('unchecked')
                }
            });
            $(document.body).on('click', '.checkedLocations', function () {
                if ($(this).is(":checked")) {
                    $(this).attr('checked', false);
                } else {
                    $(this).attr('checked', true);
                }
            });

            $(document.body).on('click', '#addLocationsModalBtn', function (e) {
                e.preventDefault();
                var mainLocationHtml = '', locationValue = '';
                var selectedLocations = $('.checkedLocations:checkbox:checked');

                if (selectedLocations.length > 0) {
                    $.each(selectedLocations, function () {
                        locationName = $(this).attr('data-name');
                        locationId = $(this).attr('data-id');

                        locations.push({id: locationId, name: locationName});

                        mainLocationHtml += '<div class="btn-group btnspace remove-location-btn" style="margin-right: 4px;">' +
                                '<a  class="btn btncolor" style="cursor:default;" data-toggle="modal" data-target="#">' + locationName + '</a>' +
                                '<a  style="height: 34px;" class="btn btncolor dropdown-toggle removeLocation"  data-location-id="' + locationId + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                '<span class="close"></span></a></div>';

                        isDataModified = true;
                    });

                    $('#mainLocation').prepend(mainLocationHtml);
                    $('#myModal1').hide();
                } else {
                    toastr.error('No Location selected');
                }

            })

            $(document.body).on('click', '.removeLocation', function (e) {
                e.preventDefault();
                isDataModified = true;
                $(this).parent('.remove-location-btn').remove();
                var removeItem = $(this).attr('data-location-id');
                locations = jQuery.grep(locations, function (value) {
                    return value.id != removeItem;
                });

                if (locations.length > 0) {
                    $('#locationData_error').text('');
                } else {
                    $('#locationData_error').text('Atleast one location is required');
                }
            })

            $(document.body).on('click', '#delete-all-locations', function (e) {
                e.preventDefault();

                if (locations.length > 0) {
                    $('.remove-location-btn').remove();
                    locations = [];
                    isDataModified = true;
                } else {
                    toastr.error('No Location Added !!!');
                }

            })
        });

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('User::layouts.bodyLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>