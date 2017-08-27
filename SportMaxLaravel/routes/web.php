<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', 'LoginController@loginHandle');

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/password_edit','LoginController@getPasswordEditPage');

Route::post('/password_edit','LoginController@editPassword');

Route::get('/{username}/personal_info', 'UserInfoController@getPersonalInfoPage');

Route::get('/personal_info','UserInfoController@getSelfPersonalInfoPage');

Route::post('/edit_personal_info','UserInfoController@editSelfPersonalInfo');

Route::get('/sport_data','SportDataController@getSelfSportDataPage');

Route::get('/{name}/{type}/{year}/{month}/{day}/{miles}/{calorie}/{speed}/{time}','SportDataController@postData');

Route::get('/activity','ActivityController@getSelfActivityPage');

Route::post('/create_activity','ActivityController@createActivity');

Route::post('/end_activity','ActivityController@endActivity');

Route::post('/join_activity','ActivityController@joinActivity');

Route::post('/send_invite_request','ActivityController@sendInviteRequest');

Route::post('accept_invite','ActivityController@acceptInvite');

Route::get('/friends_info','FriendsInfoController@getFriendsInfoPage');

Route::post('/accept_friend_request','FriendsInfoController@acceptFriendRequest');

Route::post('/send_friend_request','FriendsInfoController@sendFriendRequest');

Route::post('/delete_friend','FriendsInfoController@deleteFriend');

Route::get('/dynamic','DynamicController@getDynamicPage');

Route::post('/create_dynamic','DynamicController@createDynamic');

Route::post('/delete_dynamic','DynamicController@deleteDynamic');