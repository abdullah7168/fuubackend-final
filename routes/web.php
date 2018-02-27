<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type, application/json');
header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
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

Route::get('/', 'AdminController@index');

/**
 * Student Routes,
 */

Route::get('view/student/{id}','StudentController@singleStudent');



Route::post('process-request','NotificationController@processRequest');


/**
 * request watcher
 * to see if admin 
 * have received any 
 * degree verification requests
 */

Route::post('watch-for-requests','NotificationController@watchRequest');
Route::post('api/watch-for-reply','NotificationController@watchReply');





/**
 * API Interface for 
 * angular front end
 * 
 */

Route::post('/api/student/login','StudentController@apiLogin');
Route::post('/api/degree-request','StudentController@apiDegreeRequest');

Route::post('/api/get-notification','NotificationController@pluckSingleNotification');
Route::post('/api/seen-notification','NotificationController@seenByStudent');