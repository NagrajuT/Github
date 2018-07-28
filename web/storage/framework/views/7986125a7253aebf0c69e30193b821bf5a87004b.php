<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('active_profileManagement','active'); ?>

<?php $__env->startSection('headcontent'); ?>
    <link rel="stylesheet" href="/assets/user/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/user/css/sweetalert.css">
    <style>
        .truncate {
            width: 250px;
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
    </style>

    <style>
        /*+++++ Radio Button  ++++++*/
        .in input[type="radio"] {
            display: none;
        }

        .in input[type="radio"] + label {
            color: #333;
            font-family: Arial, sans-serif;
        }

        .in input[type="radio"] + label span {
            display: inline-block;
            width: 19px;
            height: 19px;
            margin: -2px 10px 0 0;
            vertical-align: middle;
            background: url(/assets/user/images/check_radio_sheet.png) -38px top no-repeat;
            cursor: pointer;
        }

        .in input[type="radio"]:checked + label span {
            background: url(/assets/user/images/check_radio_sheet.png) -57px top no-repeat;
        }

        .img-bot {
            margin-bottom: 5px;
            width: 210px;
            height: 210px;
            float: left;
        }

        .img-bot .closediv {
            display: none;
        }

        .img-bot:hover .closediv {
            display: block;
            position: relative;
            top: 0px;
            right: 20px;
        }

        .closebtn {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 5px 10px;
            position: absolute;
            right: 0;
            top: 0;
        }

        .closebtn:hover {
            color: white;
            background: red;
            text-decoration: none;
        }

        .padbot {
            padding-bottom: 15px;
        }

        .dateTime {
            color: rgb(255, 255, 255);
            font-family: arial !important;
            padding: 5px 10px;
            margin: 2px 0px 0px;
            /*position: absolute;*/
            width: 100%;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            background: #444d58 none repeat scroll 0 0;
        }

        .socialarea {
            color: rgb(255, 255, 255);
            font-family: arial !important;
            padding: 5px 10px;
            margin: 2px 0px 0px;
            /*position: absolute;*/
            width: 100%;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            background: #444d58 none repeat scroll 0 0;
        }

        .socialarea a {
            text-decoration: none;
            color: #fff;
        }

        .socialarea a:hover {
            color: #ccc
        }

        .modal_scroll {
            height: 400px;
            overflow-y: scroll;
        }

        .padbot .tick {
            width: 100%;
            height: 100%;
            z-index: 99999;
            position: absolute;
            top: 0;
            left: 0;
            text-align: center;
            padding-top: 35%;
            display: none;
            cursor: pointer;
        }

        .padbot:hover .tick {
            display: block;
        }

        .padbot:hover {
            opacity: 0.5;
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
                            <span class="caption-subject font-green-sharp bold uppercase">Tags Automatically</span>
                            <span class="caption-helper">Manage settings...</span>
                        </div>
                    </div>


                    <div class="portlet-body">
                        <?php if($status=='success'): ?>
                            <?php if(isset($data['accountList']) && !empty($data['accountList'])): ?>
                                <form action="/automatic/tags" method="post" id="formSubmit">
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
                                                              data-old_promotion_status="<?php if(isset($data['tagDetails'])): ?><?php echo e($data['tagDetails']['promotion_status']); ?><?php else: ?><?php echo e(0); ?><?php endif; ?>"
                                                              id="promotion_change_status">

                                                            <?php if($data['tagDetails']['promotion_status']==1): ?>
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
                                                                   class="btn btn-success promotion_change_status" data-promotion_status="1">
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
                                                <div class="col-md-3"></div>
                                                <div class="col-sm-8 col-md-6">
                                                    <label><b>Select your post</b> <span style="font-size: 11px">( Choose your target posts to tag users  )</span></label><br><br>
                                                    <div class="in">

                                                        <input id="tagUserInNewPost" class="tagUserInNewPost"
                                                               value="NEW_POST"
                                                               name="tagPostsType" type="radio"
                                                               <?php if($data['tagDetails']['tag_post_type']=='NEW_POST'): ?> checked <?php endif; ?> >
                                                        <label for="tagUserInNewPost"><span></span>Tag people in your
                                                            new
                                                            posts</label><br>

                                                        <input id="tagUserInSpecificPost" class="tagUserInSpecificPost"
                                                               value="TARGET_POST"
                                                               name="tagPostsType" type="radio"
                                                               <?php if($data['tagDetails']['tag_post_type']=='TARGET_POST'): ?> checked <?php endif; ?> >
                                                        <label for="tagUserInSpecificPost"><span></span>Tag people in
                                                            target
                                                            posts</label><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row" id="displayPosts"
                                                 <?php if($data['tagDetails']['tag_post_type']!='TARGET_POST'): ?> hidden <?php endif; ?> >
                                                <div class="col-md-3"></div>
                                                <div class="col-sm-8 col-md-6" id="viewMedia">

                                                    <a href="javascript:;" data-toggle="modal" data-target="#viewmore">
                                                        <img src="/assets/user/images/view_more.jpg" width="80"
                                                             style="padding: 2px 2px 2px 2px">
                                                    </a>
                                                    <a href="javascript:;" data-toggle="modal"
                                                       data-target="#selectPosts"
                                                       id="selectPostsBtn">
                                                        <img src="/assets/user/images/add_more.jpg" width="80"
                                                             style="padding: 2px 2px 2px 2px">
                                                    </a>
                                                </div>

                                                <input type="text" id="selectedMediaData" name="selectedMediaData"
                                                       hidden
                                                       value="<?php echo e(old('selectedMediaData')); ?>">
                                                <br>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-sm-8 col-md-6">
                                        <span style="color:red"
                                              id="selectedMediaData_error"><?php echo e($errors->first('selectedMediaData')); ?></span>
                                                </div>
                                                <br>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-sm-8 col-md-6">
                                                    <label><b>Tag Users</b> <span style="font-size: 11px">( Automatically tag users in your posts )</span></label><br><br>
                                                    <div class="in">
                                                        <input type="radio" id="tagMyFollowers" class="tag_users_type"
                                                               value="followers"
                                                               name="tagUsersType"
                                                               <?php if($data['tagDetails']['tag_users_type']=='followers'): ?> checked <?php endif; ?> />
                                                        <label for="tagMyFollowers"><span></span>Tag my new
                                                            followers</label><br>
                                                        <input type="radio" id="tagHashtagUsers" class="tag_users_type"
                                                               value="hashtags"
                                                               name="tagUsersType"
                                                               <?php if($data['tagDetails']['tag_users_type']=='hashtags'): ?> checked <?php endif; ?> />
                                                        <label for="tagHashtagUsers"><span></span>Tag people who upload
                                                            picture
                                                            to
                                                            hashtag</label><br>
                                                        <input type="radio" id="tagLocationUsers" class="tag_users_type"
                                                               value="locations"
                                                               name="tagUsersType"
                                                               <?php if($data['tagDetails']['tag_users_type']=='locations'): ?> checked <?php endif; ?> />
                                                        <label for="tagLocationUsers"><span></span>Tag people who were
                                                            in
                                                            specific
                                                            location </label>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="row" id="hashtagSearchEngine"
                                                 <?php if($data['tagDetails']['tag_users_type']!='hashtags'): ?> hidden <?php endif; ?> >
                                                <br><br>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <label><b>Add Tags</b><span style="font-size: 11px">( Tag people who upload picture to added hashtag. You can add up to 30 hashtags)</span></label><br><br>
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

                                                <input type="text" id="hashTagData" name="hashTagData"
                                                       value="<?php echo e(old('hashTagData')); ?>"
                                                       hidden>
                                            </div>

                                            <div class="row" id="locationSearchEngine"
                                                 <?php if($data['tagDetails']['tag_users_type']!='locations'): ?> hidden <?php endif; ?>>
                                                <br><br>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <label><b>Add Locations</b><span style="font-size: 11px">( Tag people who were in specific added location. You can add up to 30 locations)</span></label><br><br>
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
                                                <button id="saveBtn" class="btn btn-success">Save</button>
                                            </div>

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
                                    <br>
                                    <?php echo e($message); ?>

                                </div>
                                <br><br>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
                <!-- End: life time stats -->
            </div>

            <!-------------- View More Modal ------------->
            <div class="modal fade" id="viewmore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Target Posts</h4>
                        </div>
                        <div class="modal-body" style="height: 400px; overflow-y:scroll; ">
                            <div class="row" id="viewMoreMediaData" style="padding: 20px;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------- / View More Modal ------------->

            <!--modal for Programme mangemnet-->
            <div class="modal fade" id="selectPosts" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content" style="background-color:#EFF3F8;">
                        <div class="modal-header" style="background-color:#444D58;">
                            <h3 class="text-center" style="color:#fff;"><b>Select your post for auto tag</b></h3>
                        </div>
                        <div class="modal-body modal_scroll">
                            <div class="row">
                                <div class="col-lg-12" id="latestMediaData"></div>

                                <div class="col-md-12" style="text-align: center;margin-top: 30px">
                                    <input type="button" style="display: none;" class="btn btn-success"
                                           id="loadMoreMediaBtn"
                                           value="Load More">

                                    <div id='mediaLoader' style='display: none; position:unset'>
                                        <img src='/assets/user/images/ajax-loader.gif' width='85px'
                                             height='85px'>
                                    </div>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="confirmBtn">Confirm</button>
                                </div>
                            </div>
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
    </div>
    <!-- END PAGE CONTENT -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagejavascripts'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdfxwAWQXGzVd4TfT83rILYzvgeoSIjQs"></script>
    <?php /*<script src="http://maps.googleapis.com/maps/api/js"></script>*/ ?>

    <?php /*<script src="http://maps.google.com/maps/api/js?sensor=false"*/ ?>
    <?php /*type="text/javascript"></script>*/ ?>

    <script src="/assets/user/js/bootbox.min.js"></script>
    <script src="/assets/user/js/toastr.min.js"></script>
    <script src="/assets/user/js/sweetalert.min.js"></script>
    <script src="/assets/user/js/moment.js"></script>

    <script type="text/javascript">
        var hashtags = [], locations = [], timerid, isDataModified = false, oldCheckedTagsUserType = 'off', oldCheckedTagPostsType = 'off', selectedMedia = [], maxAllowMedia = 12;

        $(document).ready(function () {
            oldCheckedTagsUserType = "<?php if(isset($data['tagDetails'])): ?><?php echo e($data['tagDetails']['tag_users_type']); ?><?php endif; ?>" || "off";
            oldCheckedTagPostsType = "<?php if(isset($data['tagDetails'])): ?><?php echo e($data['tagDetails']['tag_post_type']); ?><?php endif; ?>" || "off";


            $("input[name=tagUsersType]:radio").change(function () {

                var tagUsersType = $(this).val();

                var hashtagSearchEngineObj = $('#hashtagSearchEngine');
                var locationSearchEngineObj = $('#locationSearchEngine');

                if (tagUsersType == 'followers') {

                    if (!(hashtagSearchEngineObj.is(":hidden") )) {
                        hashtagSearchEngineObj.slideUp();
                    }

                    if (!(locationSearchEngineObj.is(":hidden") )) {
                        locationSearchEngineObj.slideUp();
                    }
                }
                else if (tagUsersType == 'hashtags') {

                    if (hashtagSearchEngineObj.is(":hidden")) {
                        hashtagSearchEngineObj.show("slow");
                    }

                    if (!(locationSearchEngineObj.is(":hidden"))) {
                        locationSearchEngineObj.slideUp();
                    }

                }
                else if (tagUsersType == 'locations') {

                    if (locationSearchEngineObj.is(":hidden")) {
                        locationSearchEngineObj.show("slow");
                    }

                    if (!(hashtagSearchEngineObj.is(":hidden"))) {
                        hashtagSearchEngineObj.slideUp();
                    }
                }
            });

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

            $(document.body).on('input', '#searchLocation111111', function (e) {
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

                if (currentObj.data("lastval") != searchLocationValue) {

                    currentObj.data("lastval", searchLocationValue);
                    clearTimeout(timerid);

                    timerid = setTimeout(function () {

                        $.ajax({
                            url: '/user/findLocation',
                            methos: 'post',
                            data: {
                                searchLocation: searchLocationValue
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
            });
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

            $(document.body).on("click", "#searchLocationBtn111111", function (e) {
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

                $.ajax({
                    url: '/user/findLocation',
                    methos: 'post',
                    data: {
                        searchLocation: searchLocationValue
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
                                $('#locationDetails').removeClass('hidden');
                                $('#displayMapArea').removeClass('hidden');
                            }
                            else {
                                locationDetailsElementObj.focus();
                                $('#displayMapArea').addClass('hidden');
                                $("#locationDetails").html('<div class="row" style="align-content: center">No Result Found !!! Please try different word</div>');
                            }


                        }
                        $('#location-search-icon').show();
                        $('#location-loading-icon').hide();
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
                var selectedLocation = $('.checkedLocations:checkbox:checked');
                if (selectedLocation.length > 0) {
                    $.each(selectedLocation, function () {
                        locationName = $(this).attr('data-name');
                        locationId = $(this).attr('data-id');


                        var isAlreadyAdded = false;
                        $.map(locations, function (prevLocation, indexInArray) {
                            if (prevLocation.id == locationId) {
                                isAlreadyAdded = true;
                            }
                        });


                        if (!isAlreadyAdded && locations.length < 30) {

                            locations.push({id: locationId, name: locationName});

                            mainLocationHtml += '<div class="btn-group btnspace remove-location-btn" style="margin-right: 4px;">' +
                                    '<a  class="btn btncolor" data-toggle="modal" data-target="#">' + locationName + '</a>' +
                                    '<a  style="height: 34px;" class="btn btncolor dropdown-toggle removeLocation"  data-location-id="' + locationId + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                    '<span class="close"></span></a></div>';

                            isDataModified = true;
                            isAlreadyAdded = true;

                        }

                    });

                    $('#mainLocation').prepend(mainLocationHtml);
                    $('#myModal1').hide();
                } else {
                    toastr.error('No Location selected !!!');
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


            $(document.body).on('click', '.promotion_change_status', function (e) {
                e.preventDefault();
                var currentObj=this;
                var promotionStatus = parseInt($(currentObj).attr('data-promotion_status'));

                if ((oldCheckedTagsUserType === 'off') || (oldCheckedTagPostsType === 'off')) {
                    toastr.options.positionClass = "toast-top-center";
                    toastr.error('Please save the below settings first.');
                    return false;
                }

                var instaUserId = parseInt($('#instaUserId').val());
                $.ajax({
                    url: '/change/promotion/status',
                    dataType: 'json',
                    method: 'post',
                    data: {instaUserId: instaUserId, promotion_status: promotionStatus, method_name: 'TAGS'},
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

            $(document.body).on('click', '#saveBtn', function (e) {
                e.preventDefault();
                toastr.options.positionClass = "toast-top-right";
                var obj = $('#instaUserId option:selected');
                if ((obj.attr('data-is_user_disconnected') == 'Y') || (obj.attr('data-has_account_locked') == 'T')) {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @" + obj.attr('data-username') + " Account has been disconnected from Smartffic System!!!</small>",
                        text: "<span>Click on More button for Re-Connect Account</span>",
                        html: true
                    });
                }
                else if (obj.attr('data-time_period_left') == 0) {
                    if (obj.attr('data-subscribe_type') == 'DU') {
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Demo Subscription Period has been expired for this @" + obj.attr('data-username') + " account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> for Purchasing more Subscription Period</span>",
                            html: true
                        });
                    } else {
                        swal({
                            animation: true,
                            type: "warning",
                            title: "<small style='color:#F8BB86'>Subscription Package has been expired for this @" + obj.attr('data-username') + " account!!!</small>",
                            text: "<span>Click <a href='/user/packageLists'>here </a> to upgrade your Subscription</span>",
                            html: true
                        });
                    }
                }
                else if (obj.attr('data-status') == 'I') {
                    swal({
                        type: "error",
                        title: "<small style='color:red'>This @" + obj.attr('data-username') + " account is Inactive!!! Please active this account first</small>",
                        text: "<span>Click <a href='/user/dashboard'>here </a> to active this account</span>",
                        html: true
                    });
                }
                else {
                    var tagUsersType = $("input[name=tagUsersType]:checked").val();
                    var tagPostsType = $("input[name=tagPostsType]:checked").val();

                    if (tagUsersType == 'hashtags') {
                        var hashTagDataObj = $('#hashTagData');
                        hashTagDataObj.val(hashtags.join(','));
                        if (hashTagDataObj.val().length == 0) {
                            $('#hashTagData_error').text('Atleast one hash tag is required');
                            return false;
                        } else {
                            $('#hashTagData_error').text('');
                        }
                    }
                    else if (tagUsersType == 'locations') {
                        $('#locationData').val(JSON.stringify(locations));
                        if (locations.length == 0) {
                            $('#locationData_error').text('Atleast one location is required');
                            return false;
                        } else {
                            $('#locationData_error').text('');
                        }
                    }

                    if (tagPostsType == 'TARGET_POST') {
                        $('#selectedMediaData').val(JSON.stringify(selectedMedia.reverse()));
                        if (selectedMedia.length == 0) {
                            $('#selectedMediaData_error').text('Select Atleast one post for auto tag.');
                            return false;
                        } else {
                            $('#selectedMediaData_error').text('');
                        }
                    }


                    if ((tagUsersType == undefined) || (tagPostsType == undefined)) {
                        toastr.error('Invalid settings');
                    } else {
                        if (oldCheckedTagsUserType.trim() == 'off') {
                            isDataModified = ((tagUsersType == 'followers') || (tagUsersType == 'hashtags') || (tagUsersType == 'locations'));
                        } else {
                            isDataModified = (oldCheckedTagsUserType.trim() != tagUsersType);
                        }

                        if (oldCheckedTagPostsType.trim() == 'off') {
                            isDataModified = ((tagPostsType == 'TARGET_POST') || (tagPostsType == 'NEW_POST')) ? (true || isDataModified) : !(!isDataModified);
                        } else {
                            isDataModified = (oldCheckedTagPostsType.trim() != tagPostsType) ? (true || isDataModified) : !(!isDataModified);
                        }


//                        if (oldCheckedTagsUserType.trim() == 'off') {
//                            if ((tagUsersType == 'followers') || (tagUsersType == 'hashtags') || (tagUsersType == 'locations')) {
//                                isDataModified = true;
//                            } else {
//                                isDataModified = false;
//                            }
//                        } else {
//                            if (oldCheckedTagsUserType.trim() != tagUsersType) {
//                                isDataModified = true;
//                            } else {
//                                isDataModified = false;
//                            }
//                        }
//
//                        if (oldCheckedTagPostsType.trim() == 'off') {
//                            if ((tagPostsType == 'TARGET_POST') || (tagPostsType == 'NEW_POST')) {
//                                isDataModified = true || isDataModified;
//                            } else {
//                                isDataModified = !(!isDataModified);
//                            }
//                        } else {
//                            if (oldCheckedTagPostsType.trim() != tagPostsType) {
//                                isDataModified = true || isDataModified;
//                            } else {
//                                isDataModified = !(!isDataModified);
//                            }
//                        }


                        if (isDataModified) {
                            $('#formSubmit').submit();
                        } else {
                            toastr.warning('Nothing to save');
                        }
                    }


                }
            })

            $(document.body).on('change', '#instaUserId', function (e) {
                e.preventDefault();
                window.location.href = '/automatic/tags/' + $(this).val();
            });


            var oldHashTagData = "<?php echo e(old('hashTagData')); ?>" || "<?php if (isset($data['tagDetails']) && !empty($data['tagDetails']['tags'])) echo $data['tagDetails']['tags']; ?>" || null;

            if (oldHashTagData != null) {
                var hashTagsArray = oldHashTagData.split(',');
                var mainHashTagHtml = '';
                $.each(hashTagsArray, function (key, value) {
                    hashtags.push(value);
                    mainHashTagHtml += '<div class="btn-group btnspace  remove-hashtag-btn" style="margin-right: 4px;">' +
                            '<button type="button" class="btn btncolor" data-toggle="modal" data-target="#">' + value + '</button>' +
                            '<button type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeTag"  data-hashtag-name="' + value + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            '<span class="close"></span></button></div>';

                });
//                console.log(hashtags);
                $('#mainHashTag').prepend(mainHashTagHtml);
            }


            var isDataExist = "<?php if( isset($data['tagDetails']) && !empty($data['tagDetails']['locations'] )): ?> 1  <?php else: ?> 0 <?php endif; ?>";
            if (parseInt(isDataExist) === 1) {

                var oldLocationData = '<?php if( isset($data['tagDetails']) && !empty($data['tagDetails']['locations'] )): ?> <?php echo e($data['tagDetails']['locations']); ?> <?php endif; ?>';
                var locationsArray = JSON.parse(oldLocationData.replace(/&quot;/g, '\"'));

                var mainLocationHtml = '';
                $.each(locationsArray, function (key, value) {
                    locations.push(value);
                    mainLocationHtml += '<div class="btn-group btnspace remove-location-btn" style="margin-right: 4px;">' +
                            '<a  class="btn btncolor" data-toggle="modal" data-target="#">' + value.name + '</a>' +
                            '<a  style="height: 34px;" class="btn btncolor dropdown-toggle removeLocation"  data-location-id="' + value.id + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            '<span class="close"></span></a></div>';

                });

                $('#mainLocation').prepend(mainLocationHtml);
            }

            var tagDataSavedStatus = "<?php if(isset($tagDataSavedMsg)): ?> <?php echo e($tagDataSavedMsg['status']); ?> <?php endif; ?> " || null;

            if (tagDataSavedStatus != null && tagDataSavedStatus.trim().length > 0) {
                var tagDataSavedMsg = "<?php if(isset($tagDataSavedMsg)): ?> <?php echo e($tagDataSavedMsg['message']); ?> <?php endif; ?>";
                var htmlModalData = '';
                if (tagDataSavedStatus.trim() == 'success') {
                    toastr.success(tagDataSavedMsg);
                } else {
                    htmlModalData = '<img id="img-upload" src="/assets/user/images/error.png"> <br>' +
                            '<strong style="font-size: large;">Oops!</strong>' +
                            '<h4>' + tagDataSavedMsg + '</h4>';
                    $('#customModelData').html(htmlModalData);
                    $('#customModal').modal('show');
                }
            }
        });
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

                var selectedHashtag = $('.checkedHashTags:checkbox:checked');
                if (selectedHashtag.length > 0) {
                    $.each(selectedHashtag, function () {
                        hashTagValue = $(this).attr('data-hashtag-value');

                        var isAlreadyAdded = false;
                        $.map(hashtags, function (prevHashtag, indexInArray) {
                            if (prevHashtag === hashTagValue) {
                                isAlreadyAdded = true;
                            }
                        });

                        if (!isAlreadyAdded && hashtags.length < 30) {
                            hashtags.push(hashTagValue);
                            mainHashTagHtml += '<div class="btn-group btnspace remove-hashtag-btn" style="margin-right: 4px;">' +
                                    '<button type="button" class="btn btncolor" data-toggle="modal" data-target="#">' + hashTagValue + '</button>' +
                                    '<button type="button" style="height: 34px;" class="btn btncolor dropdown-toggle removeTag"  data-hashtag-name="' + hashTagValue + '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                    '<span class="close"></span></button></div>';
                            isDataModified = true;
                            isAlreadyAdded = true;
                        }

                    });
                    $('#mainHashTag').prepend(mainHashTagHtml);
                    $('#myModal').hide();
                } else {
                    toastr.error('No Hashtag selected !!!');
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
                    toastr.error('No Hashtag Added !!!')
                }
            });
        });

    </script>


    <script type="text/javascript">

        var PaginationForUserPosts = {
            hasMoreData: false,
            next_max_id: null,
            pagination_id: null
        };

        var loadMorePosts = false;
        var instaUserId = null;
        var processingAjax = false;

        $(document.body).ready(function () {

            $("input[name=tagPostsType]:radio").change(function () {
                var tagPostsType = $(this).val();
                var displayPostsObj = $('#displayPosts');
                if (tagPostsType == 'NEW_POST') {

                    if (!(displayPostsObj.is(":hidden") )) {
                        displayPostsObj.slideUp();
                    }

                    $('#selectedMediaData_error').html('');
                }
                else if (tagPostsType == 'TARGET_POST') {

                    if (displayPostsObj.is(":hidden")) {
                        displayPostsObj.show("slow");
                    }
                }
            });


            var loadLatsetMedia = function () {
                processingAjax = true;
                $.ajax({
                    url: '/get/user/media',
                    type: 'post',
                    data: {
                        instaUserId: instaUserId,
                        pagination: {
//                            pagination_id: PaginationForUserPosts.pagination_id,
                            next_max_id: PaginationForUserPosts.next_max_id
                        }
                    },

                    beforeSend: function () {
                        $("#mediaLoader").show();
                    },
                    complete: function () {
                        $('#mediaLoader').hide();
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        if (response.code == 200) {
                            var latestMediaHtmlData = '';
                            if (response.status == 'success') {

                                if (response.data.pagination.result_size > 0) {

                                    $.each(response.data.media.node, function (key, value) {

                                        latestMediaHtmlData += '<div class="col-md-4 col-sm-4 padbot selectUserMedia" data-isSelected="false"  data-media_id="' + value['media_id'] + '"   data-media_code="' + value['media_code'] + '"   data-media_type="' + value['media_type'] + '"   data-media_url="' + value['media_url'] + '"    ' +
                                                ' data-media_comments_count="' + value['comments_count'] + '"   data-media_likes_count="' + value['likes_count'] + '"   data-media_date="' + value['date'] + '"  > <div class="dateTime"> <i class="fa fa-clock-o" aria-hidden="true"></i> ' + moment.unix(parseInt(value['date'])).format("D MMM, YYYY hh:mm A") + '<span class="pull-right">';

                                        if (value['media_type'] == 'I') {
                                            latestMediaHtmlData += '<i class="fa fa-photo" aria-hidden="true"></i>';
                                        } else {
                                            latestMediaHtmlData += '<i class="fa fa-video-camera" aria-hidden="true"></i>';
                                        }

                                        latestMediaHtmlData += '</span></div><a href="javascript:;"> ' +
                                                '<img src="' + value['media_url'] + '" class="img-responsive" alt="" style="width: 100%; height: 200px;"></a>' +
                                                '<div class="socialarea"><a class="comments" href="javascript:;" ><span class="media-comments-count">' + value['comments_count'] + '</span> <i class="fa fa-comment" aria-hidden="true"></i></a>' +
                                                '<a class="likes pull-right" href="javascript:;" ><span class="media-likes-count">' + value['likes_count'] + '</span>' +
                                                '<i class="fa fa-heart" aria-hidden="true"></i></a>' +
                                                '</div><a class="" href="javascript:;"></a>' +
                                                '<div class="tick" title="Select Images"><a href="javascript:;"><img src="/assets/user/images/tick.png" width="50" height="50"></a>' +
                                                '</div></div>';
                                    });
                                }

                                if (response.data.pagination.has_more_data) {
                                    PaginationForUserPosts.hasMoreData = true;
                                    PaginationForUserPosts.next_max_id = response.data.pagination.next_max_id;
//                                    PaginationForUserPosts.pagination_id = response.data.pagination.pagination_id;
                                } else {
                                    PaginationForUserPosts.hasMoreData = false;
                                    PaginationForUserPosts.next_max_id = null;
//                                    PaginationForUserPosts.pagination_id = null;
                                    $('#mediaLoader').hide();
                                    $('#loadMoreMediaBtn').hide();
                                }
                            } else {
                                $('#loadMoreMediaBtn').hide();
                                latestMediaHtmlData += '<div class="text-center" style="margin-top: 15%;font-size: 25px;color: red;"> ' + response.message + '</div>';
                            }

                        } else {
                            $('#loadMoreMediaBtn').hide();
                            var message = response.message || "Error in serive!!! Please try again after sometime";
                            latestMediaHtmlData += '<div class="text-center" style="margin-top: 15%;font-size: 25px;color: red;"> ' + message + '</div>';
                        }

                        $("#latestMediaData").append(latestMediaHtmlData);
                        processingAjax = false;
                    },
                    error: function (error) {
                        console.log(error);
                        processingAjax = false;
                        toastr.error('Error in Network!!! Please try again after sometime')
                    }
                });

            }

            $(document).on('click', '#selectPostsBtn', function (e) {
                e.preventDefault();


                var selectedObj = $('.selectUserMedia[data-isSelected="true"]');
                $.each(selectedObj, function (key, element) {
                    $(element).attr('data-isSelected', 'false');
                    $(element).css('opacity', '1');
                    $(element).find('.tick').css('display', 'none');
                });


                var latestMediaDataObj = $("#latestMediaData");
                if (latestMediaDataObj.children().length == 0) {
                    latestMediaDataObj.html('');
                    $('#loadMoreMediaBtn').show().val('Load More');

                    PaginationForUserPosts.hasMoreData = false;
                    PaginationForUserPosts.next_max_id = null;
                    PaginationForUserPosts.pagination_id = null;
                    loadMorePosts = false;
                    instaUserId = $('#instaUserId').val();
                    loadLatsetMedia();
                }
            })

            $(document.body).on('click', '#loadMoreMediaBtn', function (e) {
                e.preventDefault();
                $(this).val('Loading...');
                if (PaginationForUserPosts.hasMoreData) {
                    $(this).hide();
                    loadMorePosts = true;
                    loadLatsetMedia();
                }
            })

            $(".modal-body").scroll(function () {
                var scrollHeight = $("#latestMediaData").height();
                var contentFixedHeight = parseInt($(this).height());
                var scrollPositionHeight = $(this).scrollTop();

                if (loadMorePosts) {
                    if (!processingAjax) {
                        if (PaginationForUserPosts.hasMoreData) {
                            if (((scrollHeight - 100) < (scrollPositionHeight + contentFixedHeight))) {
                                $('#mediaLoader').show();
                                loadLatsetMedia();
                            }
                        }
                    }
                }
            });


            $(document.body).on('click', '.selectUserMedia', function (e) {
                e.preventDefault();
                var currentElementObj = this;
                if ($(currentElementObj).attr('data-isSelected') == 'true') {
                    $(currentElementObj).attr('data-isSelected', 'false');
                    $(currentElementObj).css('opacity', '0.5');
//                    $(currentElementObj).find('.tick').css('display', 'none');
                } else {
                    $(currentElementObj).attr('data-isSelected', 'true');
                    $(currentElementObj).css('opacity', '1');
                    $(currentElementObj).find('.tick').css('display', 'block');
                }
            });


            $(document.body).on('mouseleave', '.selectUserMedia', function (e) {
                e.preventDefault();
                var currentElementObj = this;
                if ($(currentElementObj).attr('data-isSelected') == 'false') {
                    $(currentElementObj).css('opacity', '1');
                    $(currentElementObj).find('.tick').css('display', 'none');
                }
            });


            $(document.body).on('mouseenter', '.selectUserMedia', function (e) {
                e.preventDefault();
                var currentElementObj = this;
                if ($(currentElementObj).attr('data-isSelected') == 'false') {
                    $(currentElementObj).css('opacity', '0.5');
                    $(currentElementObj).find('.tick').css('display', 'block');
                }
            });


            $(document.body).on('click', '.closebtn', function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                var removeMediaId = $(this).attr('data-selectedMediaId');
                selectedMedia = jQuery.grep(selectedMedia, function (value) {
                    return value.media_id != removeMediaId;
                });


                var parentDiv = $('#viewMoreMediaData .img-bot');
                var viewMediaObj = $('#viewMedia');
                viewMediaObj.html('');
                var viewMediaDatahtml = '';

                $.each(parentDiv, function (key, childDiv) {
                    if (key <= 3) {
                        viewMediaDatahtml = '<a target="_blank" href="https://www.instagram.com/p/' + $(childDiv).find('img').attr('data-media_code') + '"><img src="' + $(childDiv).find('img').attr('src') + '" width="80" style="padding: 2px 2px 2px 2px"></a>';
                        viewMediaObj.append(viewMediaDatahtml);
                    }
                });


                if (parentDiv.length == 0) {
                    $('#viewMoreMediaData').html('<div class="text-center removeNullREsult"><strong>No Record Added</strong></div>');
                }

                viewMediaDatahtml = '<a href="javascript:;" data-toggle="modal" data-target="#viewmore"><img src="/assets/user/images/view_more.jpg" width="80" style="padding: 2px 2px 2px 2px"></a>' +
                        '<a href="javascript:;" data-toggle="modal" data-target="#selectPosts" id="selectPostsBtn"><img src="/assets/user/images/add_more.jpg" width="80" style="padding: 2px 2px 2px 2px"> </a>';
                viewMediaObj.append(viewMediaDatahtml);

                isDataModified = true;

            })

            var addSelectedMedia = function (selectedObj) {
                var viewMoreMediaDatahtml = '';
                var viewMediaDatahtml = '';
                $.each(selectedObj, function (key, element) {
                    var added = false;
                    $.map(selectedMedia, function (elementOfArray, indexInArray) {
                        if (elementOfArray.media_id == $(element).attr('data-media_id')) {
                            added = true;
                        }
                    });

                    if (!added) {
                        selectedMedia.push({
                            media_id: $(element).attr('data-media_id'),
                            media_code: $(element).attr('data-media_code'),
                            media_type: $(element).attr('data-media_type'),
                            media_url: $(element).attr('data-media_url')
                        });

                        viewMoreMediaDatahtml = '<div class="img-bot" title="Click to view in Instagram"><span class="closediv"><a class="closebtn" data-selectedMediaId="' + $(element).attr('data-media_id') + '" >Remove</a></span>' +
                                '<a target="_blank" href="https://www.instagram.com/p/' + $(element).attr('data-media_code') + '"><img data-media_code="' + $(element).attr('data-media_code') + '"  src="' + $(element).attr('data-media_url') + '" width="195"></a></div>';

                        viewMediaDatahtml = '<a target="_blank" href="https://www.instagram.com/p/' + $(element).attr('data-media_code') + '"><img src="' + $(element).attr('data-media_url') + '" width="80" style="padding: 2px 2px 2px 2px"></a>';

                    }


                    if (selectedMedia.length > 12) {
                        selectedMedia.reverse().pop();
                        $('#viewMoreMediaData').children().last().remove();
                    }

                    $('#viewMoreMediaData').prepend(viewMoreMediaDatahtml);
                    $('#viewMedia').prepend(viewMediaDatahtml);
                });

                if (selectedObj.length > 0) {
                    isDataModified = true;
                }

                while (1) {
                    if ($("#viewMedia a").length > 6) {
                        $('#viewMedia a:nth-child(5)').remove();
                    } else {
                        break;
                    }
                }

                $('.removeNullREsult').remove();
                $('#selectPosts').modal('hide');
            }

            $(document.body).on('click', '#confirmBtn', function () {

                var selectedObj = $('.selectUserMedia[data-isSelected="true"]');
                var newMediaCount = selectedObj.length;
                var oldMediaCount = selectedMedia.length;


                if ((oldMediaCount + newMediaCount) > maxAllowMedia) {

                    bootbox.confirm({
                        title: "Warning",
                        message: "Only " + maxAllowMedia + " posts is allow. You have already added " + oldMediaCount + " posts and you have selected " + newMediaCount + " posts. If you click on continue you old post will be replace. ",
                        buttons: {
                            cancel: {
                                label: '<i class="fa fa-times"></i> Cancel'
                            },
                            confirm: {
                                label: '<i class="fa fa-check"></i> Continue'
                            }
                        },
                        callback: function (result) {
                            if (result) {
                                addSelectedMedia(selectedObj);
                            }
                        }
                    });

                } else {
                    addSelectedMedia(selectedObj);
                }
            })


            var isMediaDataExist = "<?php if(isset($data['tagDetails']) && (!empty($data['tagDetails']['tag_posts'])  || $data['tagDetails']['tag_posts']!=null ) ): ?> 1  <?php else: ?> 0 <?php endif; ?>";
            if (parseInt(isMediaDataExist) == 1) {

                var viewMoreMediaDatahtml = '', viewMediaDatahtml = '';
                var oldTagPostsData = '<?php if( isset($data['tagDetails']) && !empty($data['tagDetails']['tag_posts'] )): ?> <?php echo e($data['tagDetails']['tag_posts']); ?> <?php endif; ?>';
                var tagPostsArray = JSON.parse(oldTagPostsData.replace(/&quot;/g, '\"'));

                $.each(tagPostsArray, function (key, value) {
                    selectedMedia.push(value);
                    viewMoreMediaDatahtml += '<div class="img-bot" title="Click to view in Instagram" ><span class="closediv"><a class="closebtn" data-selectedMediaId="' + value.media_id + '" >Remove</a></span>' +
                            '<a target="_blank" href="https://www.instagram.com/p/' + value.media_code + '"><img data-media_code="' + value.media_code + '" src="' + value.media_url + '" width="195"></a></div>';

                    if ((key + 1) < 4) {
                        viewMediaDatahtml += '<a target="_blank" href="https://www.instagram.com/p/' + value.media_code + '"><img src="' + value.media_url + '" width="80" style="padding: 2px 2px 2px 2px"></a>';
                    }
                });


                $('#viewMoreMediaData').prepend(viewMoreMediaDatahtml);
                $('#viewMedia').prepend(viewMediaDatahtml);

            } else {
                $('#viewMoreMediaData').html('<div class="text-center removeNullREsult"><strong>No Record Added</strong></div>');
            }

        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('User::layouts.bodyLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>