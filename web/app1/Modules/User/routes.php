<?php

//Route::group(['middleware' => 'noBrowserCache'], function () {

Route::group(array('module' => 'User', 'namespace' => 'App\Modules\User\Controllers'), function () {

    //+++++++++++++++++++++++++++++ ROUTES FOR TESTING PURPOSE ++++++++++++++++(START) +++++++++++++++//
    Route::get('/testDM', 'TestInstagramAPI@testDM');
    Route::resource('/getClientIp', 'UserController@getClientIp');
    Route::resource('/testApiRoute', 'UserController@testApiRoute');
    Route::resource('/testdbconnection', 'UserController@testdbconnection');
    Route::resource('/test', 'UserController@test');
    //+++++++++++++++++++++++++++++ ROUTES FOR TESTING PURPOSE ++++++++++++++++(END) +++++++++++++++//


    //+++++++++++++++++++++++++++++ USER BEFORE AUTHENTICATION ROUTES ++++++++++++++++(START) +++++++++++++++//
    Route::get('/', 'UserController@index');
    Route::get('/home', 'UserController@home');

    Route::get('/about/us', 'UserController@aboutUs');
    Route::get('/terms/condition', 'UserController@termsAndCondition');
    Route::get('/privacy/policy', 'UserController@privacyPolicy');

    Route::resource('/user/login', 'UserController@login');
    Route::resource('/user/register', 'UserController@register');
    Route::get('/verify_mail', 'UserController@verify_mail');
    Route::resource('/forgotPassword', 'UserController@forgotPassword');
    Route::resource('/resetPassword', 'UserController@resetPassword');
    Route::get('/m/index', 'UserController@toMobileTheme');

    //ROUTES FOR AFFILIATE PROGRAMS
    Route::get('/refferalCode/{code}', 'AffiliateProgram\AffiliateController@verifyRefferalCode');
    //+++++++++++++++++++++++++++++ USER BEFORE AUTHENTICATION ROUTES ++++++++++++++++(END) +++++++++++++++//


    //++++++++++++++++++++++++++++ USER AFTER AUTHENTICATION ROUTES  +++++++++++++(START) ++++++++++++++++++//

    Route::group(['middleware' => 'auth:user'], function () {

        //================================== MAIN ROUTES===================(START)=====================//
        Route::get('/user/logout', 'UserController@logout');
        Route::get('/user/welcome', 'UserController@welcome');
        Route::get('/user/dashboard', 'UserController@dashboard');
        //================================== MAIN ROUTES===================(START)=====================//


        //==================================ACCOUNT ACTIVATION===================(START)=====================//

        //------------------------- ADD INSTAGRAM ACCOUNT ---------------------------------------------------//
        Route::post('/add/account', 'InstagramController@addInstagramAccount');
        Route::post('/check/account/proxy', 'InstagramController@checkAccountProxy');

        //------------------------- DASHBOARD INSTAGRAM ACCOUNT DETAILS --------------------------------------//
        Route::get('/load/accounts', 'InstagramController@loadInstagramAccount');

        //------------------------- ACTIVATE AND DEACTIVATE ACCOUNT --- --------------------------------------//
        Route::post('/change/account/status', 'InstagramController@changeAccountStatus');
        Route::get('/check/account/status', 'InstagramController@checkAccountStatus');

        //------------------------- RECONNECT & VERIFY INSTAGRAM ACCOUNT ------------------------------------//
        Route::post('/reconnect/account', 'InstagramController@reconnectAccount');
        Route::post('/change/promotion/settings', 'InstagramController@changePromotionSettings');

        //==================================ACCOUNT ACTIVATION===================(END)========================//


        //================================== PROFILE MANAGEMENT ====================(START)========================//
        Route::post('/change/promotion/status', 'ProfileManagement\ProfileManagementController@changePromotionStatus');


        //-------------------------WHO DIDN'T FOLLOW ME BACK-------------------------------------------------------//
        Route::get('/get/manual/follow/{insUserId?}', 'ProfileManagement\ProfileManagementController@getManualFollow');
        Route::post('/get/manual/follow', 'ProfileManagement\ProfileManagementController@getManualFollow');
        Route::post('/unfollow/manual/followed/user', 'ProfileManagement\ProfileManagementController@unfollowManualFollowedUser');


        //------------------------- TOP 20 ADMIRE ----------------------------------------------------------//
        Route::get('/top/admire/{UserId?}', 'ProfileManagement\ProfileManagementController@myTopAdmirers');


        //-------------------------ALERT ABOUT FAVORITE USERS -----------------------------------------------------//
        Route::post('/add/favorite/user', 'ProfileManagement\ProfileManagementController@addFavoriteUser');
        Route::get('/alert/about/favorite/users/{insUserId?}', 'ProfileManagement\ProfileManagementController@getAlertAboutFavoriteUsers');
        Route::post('/alert/about/favorite/users', 'ProfileManagement\ProfileManagementController@getAlertAboutFavoriteUsers');
        Route::post('/delete/favorite/user', 'ProfileManagement\ProfileManagementController@deleteFavoriteUser');

        Route::post('/alert/get/latest/media', 'ProfileManagement\ProfileManagementController@alertGetLatestMedia');
        Route::post('/alert/media/view/status', 'ProfileManagement\ProfileManagementController@alertMediaViewStatus');
        Route::post('/alert/media/like', 'ProfileManagement\ProfileManagementController@alertMediaLike');
        Route::post('/alert/media/unlike', 'ProfileManagement\ProfileManagementController@alertMediaUnLike');
        Route::post('/alert/media/comment', 'ProfileManagement\ProfileManagementController@alertMediaComment');


        //------------------------- UPLOADING POST BY TIMER--------------------------------------------------//
//            Route::resource('/upload/post/by/timer', 'InstagramController@postOnInstagram');
        Route::post('/get/nearby/search/location', 'ProfileManagement\ProfileManagementController@getNearByLocation');
        Route::get('/upload/post/{insUserId?}', 'ProfileManagement\ProfileManagementController@uploadPost');
        Route::post('/upload/post', 'ProfileManagement\ProfileManagementController@uploadPost');


        //------------------------- SEND DIRECT MESSAGES ------------------------------------------------------//
        Route::get('/direct/messages/{insUserId?}', 'ProfileManagement\ProfileManagementController@directMessages');
        Route::post('/direct/messages', 'ProfileManagement\ProfileManagementController@directMessages');


        //------------------------- SEND AUTOMATIC COMMENTS -----------------------------------------------------//
        Route::get('/automatic/comments/{insUserId?}', 'ProfileManagement\ProfileManagementController@automaticComments');
        Route::post('/automatic/comments', 'ProfileManagement\ProfileManagementController@automaticComments');


        //------------------------- SEND AUTOMATIC TAGS -------------------------------------------------------//
        Route::get('/automatic/tags/{insUserId?}', 'ProfileManagement\ProfileManagementController@automaticTags');
        Route::post('/automatic/tags', 'ProfileManagement\ProfileManagementController@automaticTags');
        Route::post('/get/user/media', 'ProfileManagement\ProfileManagementController@getUserMedia');


        //------------------------- CATCHING PICTURE  --------------------------------------------------//
        Route::get('/catching/pictures/{insUserId?}', 'ProfileManagement\ProfileManagementController@catchingPictures');
        Route::post('/catching/pictures', 'ProfileManagement\ProfileManagementController@catchingPictures');

        //================================== PROFILE MANAGEMENT ====================(END)==========================//


        //================================== PROMOTION MANAGEMENT =================(START)========================//

        //------------------------- ROUTES FOR DEFAULT PROMOTION ----(START)---------------------------------------//
        Route::get('/default/promotion', 'PromotionManagement\DefaultPromotionManagement@defaultPromotion');
        Route::get('/default/promotion/{id}', 'PromotionManagement\DefaultPromotionManagement@defaultPromotionInstaId');
		 
		Route::post('/default/promotion/emergency/unfollow', 'PromotionManagement\DefaultPromotionManagement@saveDefaultEmergencyUnfollow');
        Route::post('/default/promotion/save/settings', 'PromotionManagement\DefaultPromotionManagement@saveDefaultPromotionSettings');
        Route::post('/default/promotion/get/logs', 'PromotionManagement\DefaultPromotionManagement@getDefaultPromotionLogs');

        Route::post('/change/default/promotion/status', 'PromotionManagement\DefaultPromotionManagement@changeDefaultPromotionStatus');

        Route::post('/default/promotion/get/log/details', 'PromotionManagement\DefaultPromotionManagement@getDefaultPromotionLogDetails');
        Route::post('/default/promotion/get/recent/log/details', 'PromotionManagement\DefaultPromotionManagement@getDefaultPromotionRecentLogDetails');
        Route::post('/default/promotion/get/overview/stats', 'PromotionManagement\DefaultPromotionManagement@getDefaultPromotionOverviewStats');
        //------------------------- ROUTES FOR DEFAULT PROMOTION ----(END)---------------------------------------//


        //------------------------- ROUTES FOR FILTER PROMOTION ----(START)---------------------------------------//
        Route::get('/filter/promotion', 'PromotionManagement\FilterPromotionManagement@filterPromotion');
        Route::get('/filter/promotion/{id}', 'PromotionManagement\FilterPromotionManagement@filterPromotionInstaId');
       
        Route::post('/filter/promotion/emergency/unfollow', 'PromotionManagement\FilterPromotionManagement@saveFilterEmergencyUnfollow');
	    Route::post('/filter/promotion/save/settings', 'PromotionManagement\FilterPromotionManagement@saveFilterPromotionSettings');
        Route::post('/filter/promotion/get/logs', 'PromotionManagement\FilterPromotionManagement@getFilterPromotionLogs');

        Route::post('/change/filter/promotion/status', 'PromotionManagement\FilterPromotionManagement@changeFilterPromotionStatus');

        Route::post('/filter/promotion/get/log/details', 'PromotionManagement\FilterPromotionManagement@getFilterPromotionLogDetails');
        Route::post('/filter/promotion/get/recent/log/details', 'PromotionManagement\FilterPromotionManagement@getFilterPromotionRecentLogDetails');
        Route::post('/filter/promotion/get/overview/stats', 'PromotionManagement\FilterPromotionManagement@getFilterPromotionOverviewStats');
        //------------------------- ROUTES FOR FILTER PROMOTION ----(END)---------------------------------------//


        //------------------------- ROUTES FOR SETTINGS MANAGER  ----(START)-------sanath--------------------------------//
        Route::post('/save/activity/settings', 'PromotionManagement\FilterPromotionManagement@saveActivitySettings'); //Service modofied by Chandrakar Ramkishan
        Route::post('/get/activity/settings/preset', 'PromotionManagement\FilterPromotionManagement@getActivitySettingsPreset'); //Service modofied by Chandrakar Ramkishan
        Route::post('/delete/activity/settings/preset', 'PromotionManagement\FilterPromotionManagement@deleteActivitySettingsPreset'); //Service modofied by Chandrakar Ramkishan
        Route::post('/load/activity/settings/preset', 'PromotionManagement\FilterPromotionManagement@loadActivitySettingsPreset'); //Service modofied by Chandrakar Ramkishan
        Route::post('/reset/activity/settings', 'PromotionManagement\FilterPromotionManagement@resetActivitySettings'); //Service modofied by Chandrakar Ramkishan
        Route::get('/settings/manager', 'PromotionManagement\FilterPromotionManagement@settingsManager'); //Service modofied by Chandrakar Ramkishan
        //------------------------- ROUTES FOR SETTINGS MANAGER  ----(END)-----------sanath----------------------------//

        //================================== PROMOTION MANAGEMENT ===================(END)========================//


        //================================== AFFILIATE PROGRAM  ===================(START)======================//
        Route::resource('/affiliate', 'AffiliateProgram\AffiliateController@affiliate');
        Route::resource('/affiliateFacebookMessage', 'AffiliateProgram\AffiliateController@affiliateFacebookMessage');
        Route::resource('/affiliateInstagramMessage', 'AffiliateProgram\AffiliateController@affiliateInstagramMessage');

        Route::post('/test/fb/proxy', 'AffiliateProgram\AffiliateController@testFacebookProxy');

        Route::resource('/affiliate', 'AffiliateProgram\AffiliateController@affiliate');
        Route::resource('/instaDirectMessageList', 'AffiliateProgram\AffiliateController@instaDirectMessageList');

        Route::resource('/affiliateStatistics', 'AffiliateProgram\AffiliateController@affiliateStatistics');
        Route::resource('/getRegisteredData', 'AffiliateProgram\AffiliateController@getRegisteredData');
        Route::resource('/getSubscribedData', 'AffiliateProgram\AffiliateController@getSubscribedData');

        Route::get('/affiliatePayments', 'AffiliateProgram\AffiliateController@affiliatePayments');
        Route::post('/claim/affiliate/amount', 'AffiliateProgram\AffiliateController@claimAffiliateAmount');
        Route::post('/claim/history', 'AffiliateProgram\AffiliateController@claimHistory');

//        Route::post('/balanceCheck', 'AffiliateProgram\AffiliateController@balanceCheck');//to be removed later

        //================================== AFFILIATE PROGRAM  ===================(END)======================//


        //================================== MY ACCOUNTS ===================(START)========================//

        //------------------------- ACCOUNT SETTINGS  -------------------------(NEW)- NITISH KUMAR---------//
        Route::get('/profileDetails', 'UserProfileController@profileDetails');
        Route::post('/changeProfileImage', 'UserProfileController@changeProfileImage');
        Route::post('/saveProfileDetails', 'UserProfileController@saveProfileDetails');
        Route::post('/changePassword', 'UserProfileController@changePassword');
        Route::post('/savePrivacySettings', 'UserProfileController@savePrivacySettings');


        //------------------------- SUBSCRIPTION PACKAGES --------------( NITISH KUMAR )---------------------//
        Route::resource('/user/packageLists', 'PaymentController@packageLists');

        //------------------------- BUY PACKAGE ----------------------------------------------------------//
        Route::post('/user/makePayment', 'PaymentController@makePayment');
        Route::get('/paymentSuccess/{payKey}', 'PaymentController@paymentSuccess');
        Route::get('/paymentError/{payKey}', 'PaymentController@paymentError');
        Route::get('/ipnResponse', 'PaymentController@ipnResponse');


        Route::post('/express/payment/request', 'PaymentController@expressPaymentRequest');
        Route::get('/express/payment/success', 'PaymentController@expressPaymentSuccess');
        Route::get('/express/payment/error', 'PaymentController@expressPaymentError');
        Route::get('/express/payment/invoice', 'PaymentController@expressPaymentInvoice');


        //------------------------- PAYMENT HISTORY ---------------------( NITISH KUMAR )-------------------//
        Route::resource('/paymentHistory', 'PaymentController@paymentHistory');

        //================================== MY ACCOUNTS ===================(END)========================//


        //ROUTES FOR INSTAGRAM FINDER AND DETAILS
        Route::resource('/instagramFinder', 'InstagramController@instagramFinder');
        Route::resource('/instaFinderDetails', 'InstagramController@instaFinderDetails');


        //ROUTES FOR INCREASE LIKES, COMMENTS AND FOLLOW FROM INSTAFINDER
        Route::post('/increase/media/likes', 'InstagramController@increaseMediaLikes');   // Saurabh Kumar
        Route::post('/increase/media/comments', 'InstagramController@increaseMediaComments'); // Saurabh Kumar
        Route::post('/insta/follow/accounts', 'InstagramController@instaFollowAccounts');   // Service Modified By Chandrakar


        //ROUTES FOR INSTAGRAM BOOKMARK POSTS
        Route::post('/bookmark/post', 'InstagramController@bookmarkPost');
        Route::resource('/show/bookmarked/posts', 'InstagramController@showBookmarkPost');
        Route::post('/delete/bookmarked/post', 'InstagramController@deleteBookmarkedPost');


        //ROUTES FOR UPLOAD IMAGE TO INSTAGRAM AND SCHEDULING POST FROM INSTAFINDER
        Route::post('/upload/image', 'InstagramController@uploadImage');
        Route::post('/schedule/post', 'InstagramController@schedulePost');
        Route::post('/re/schedule/post', 'InstagramController@reSchedulePost');
        Route::resource('/show/scheduled/posts', 'InstagramController@showScheduledPost');
        Route::post('/delete/scheduled/post', 'InstagramController@deleteScheduledPost');


        //ROUTES FOR  SEARCH MORE DETAILS BASED ON USERNAME, LOCATION AND HASHTAGS
        Route::post('/user/hashTagFinder', 'InstagramController@hashTagFinder');
        Route::resource('/user/userNameFinder', 'InstagramController@userNameFinder');
        Route::resource('/user/findLocation', 'InstagramController@findLocation');

        //ROUTES FOR PAGINATION DETAILS FOR USERNAME DETAILS  (Nitish)
        Route::post('/user/mediaPaginationDetails', 'InstagramController@mediaPaginationDetails');
        Route::get('/user/getProfileSetting/{instaId}', 'InstagramController@getProfileSetting');


        //ROUTES FOR NOTIFICATIONS
        Route::resource('/user/getNotifications', 'NotificationController@getNotifications');
        Route::resource('/user/updateViewedNotification', 'NotificationController@updateViewedNotification');
        Route::resource('/user/showNotifications', 'NotificationController@showNotifications');

        //ROUTES FOR SEND NOTIFICATION TO IOS DEVICES
        Route::resource('/user/sendNotification', 'NotificationController@sendNotification');


        //ROUTES FOR SEND DIRECT MESSAGE (sanath)
        Route::resource('/Message', 'PromotionManagement\MessageController@index');
        Route::resource('/user/DirectMessageTargetgroup', 'PromotionManagement\MessageController@DirectMessageTargetgroup');
        Route::resource('/user/GroupMessage', 'PromotionManagement\MessageController@GroupMessage');
        Route::resource('/user/filtertionDetails', 'PromotionManagement\MessageController@filtertionDetails');
        Route::resource('/user/DeleteGroupById', 'PromotionManagement\MessageController@DeleteGroupByGroupId');
        Route::resource('/SendGroupMessage', 'PromotionManagement\MessageController@SendGroupMessage');
        Route::post('/createTargetGroup', 'PromotionManagement\MessageController@createTargetGroup'); // Function modified by Chandrakar Ramkishan
        Route::resource('getGroupById', 'PromotionManagement\MessageController@getGroupById');
        Route::resource('getUniqueGroup', 'PromotionManagement\MessageController@getUniqueGroup');


        //ROUTES FOR SEND DISTRIBUTION NOTIC  (sanath) ( NOT IN USE )
        Route::get('/user/DistributionNotice', 'ProfileManagenetController@userDetails');
        Route::resource('/user/sendDistributionMessage', 'ProfileManagenetController@sendDistributionMessage');

    });

    //++++++++++++++++++++++++++++ USER AFTER AUTHENTICATION ROUTES  +++++++++++++(END) ++++++++++++++++++//
});

//});