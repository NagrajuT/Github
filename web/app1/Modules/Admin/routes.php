<?php

Route::group(array('module' => 'Admin', 'namespace' => 'App\Modules\Admin\Controllers'), function () {


    Route::resource('/admin/sendNotification', 'NotificationController@sendNotification1');
    Route::resource('/admin/login', 'AdminController@adminLogin');
    Route::resource('/ipn/listener', 'MassPaymentController@ipnListner');

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::resource('/admin/dashboard', 'AdminController@dashboard');
        Route::resource('/admin/logout', 'AdminController@logout');
        Route::resource('/admin/sendMail', 'AdminController@sendMail');
        Route::resource('/reset/password', 'AdminController@resetPassword');
        Route::post('/check/new/notification', 'AdminController@checkNewNotification');
        Route::post('update/admin/view/status', 'AdminController@updateAdminViewStatus');
        Route::resource('/view/all/notificatios', 'AdminController@viewAllNotifications');

        Route::post('/create/mass/payment', 'MassPaymentController@createMassPayment');
//        Route::resource('/admin/resetPassword', 'AdminController@resetPassword');
//        Route::resource('/admin/availableUsers', 'ManageUsersController@availableUsers');
//        Route::resource('/admin/availableUsers-ajaxHandler', 'ManageUsersController@availableUsersAjaxHandler');
//        Route::resource('/admin/changeStatusAjaxHandler', 'ManageUsersController@changeStatusAjaxHandler');

        //Routes for sending push notifications

//        Route::resource('/admin/demo/{}', 'NotificationController@demo');

        Route::resource('/show/users', 'ManageUsersController@showUsers');
        Route::post('/get/users/more/insta/details', 'ManageUsersController@getUsersMoreInstaDetails');
        Route::post('/get/insta/timing/details', 'ManageUsersController@getInstaTimingDetails');
        Route::post('/update/user/status', 'ManageUsersController@updateUserStatus');
        Route::post('/get/users/more/affliate/details', 'ManageUsersController@getUsersMoreAffiliateDetails');
        Route::resource('/user/insta/accounts', 'ManageUsersController@userInstagramAccounts');
        Route::post('/activity/stats', 'ManageUsersController@activityStats');

        Route::resource('/get/pending/users', 'ManageUsersController@getPendingUsers');
        Route::post('/remove/pending/user/account', 'ManageUsersController@deletePendingUsers');
        Route::resource('/show/affiliate/user', 'ManageUsersController@showAffiliateUsers');
        Route::resource('/users/payment/history', 'ManageUsersController@usersPaymentHistory');
        Route::post('/get/payment/list/info', 'ManageUsersController@getPaymentListInfo');

        Route::resource('/show/default/hashtag', 'HashtagController@showDefaultHashtag');
        Route::post('/update/hashtag/status', 'HashtagController@updateHashtagStatus');
        Route::post('/add/new/default/hashtag', 'HashtagController@addNewDefaultHashtag');
        Route::post('/remove/default/hashtag', 'HashtagController@removeDefaultHashtag');
        Route::post('/hashtag/finder', 'HashtagController@hashagFinder');
        Route::post('/hashtag/finder', 'HashtagController@hashagFinder');
        Route::post('/save/new/Hashtag', 'HashtagController@saveNewHashtag');

        Route::resource('/promotion/defaults', 'ManageAccountController@promotionDefaults');
        Route::resource('/show/proxies', 'ManageAccountController@showProxies');
        Route::resource('/show/gender/proxies', 'ManageAccountController@showGenderProxies');
        Route::resource('/show/insta/account/proxies', 'ManageAccountController@showInstaAccountProxies');
        Route::post('/upload/account/proxy/file', 'ManageAccountController@uploadAccountProxyFile');
        Route::post('/delete/proxy', 'ManageAccountController@deleteProxy');
        Route::post('/change/proxy/status', 'ManageAccountController@changeProxyStatus');
        Route::post('/save/proxy', 'ManageAccountController@saveProxy');
        Route::post('/upload/proxy/file', 'ManageAccountController@uploadProxyFile');
        Route::post('/upload/gender/proxy/file', 'ManageAccountController@uploadGenderProxyFile');
        Route::post('/filter/gender/proxy', 'ManageAccountController@filterGenderProxy');
        Route::get('/add/free/subscription', 'ManageAccountController@addFreeSubscription');
        Route::post('/add/free/subscription', 'ManageAccountController@addFreeSubscription');

        Route::resource('/add/insta/accounts', 'InstagramAccountController@addInstaAccounts');
        Route::get('/edit/insta/accounts/{viewId}', 'InstagramAccountController@editInstaAccounts');
        Route::post('/remove/insta/account', 'InstagramAccountController@removeInstaAccount');
        Route::post('/reconnect/insta/accounts', 'InstagramAccountController@reconnectInstaAccounts');
        Route::resource('/show/insta/accounts', 'InstagramAccountController@showInstaAccounts');
        Route::post('/get/insta/accounts/details', 'InstagramAccountController@getInstaAccountsDetails');
        Route::resource('/confirmation', 'InstagramAccountController@confirmation');

        Route::resource('/show/affiliate/subscriptions', 'ManageAffiliateController@showAffiliateSubscriptions');
        Route::resource('/affiliate/claim/history', 'ManageAffiliateController@affilateClaimHistory');

    });
});