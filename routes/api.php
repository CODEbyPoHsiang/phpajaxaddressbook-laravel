<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Use App\Member;

//顯示通訊錄所有資料清單
Route::get('/', 'MemberController@apiindex');


// 編輯通訊錄聯絡人資料
Route::get('/{member_id?}', 'MemberController@show');


//新建通訊錄聯絡人資料
Route::post('', 'MemberController@store');


// 更新聯絡人資料
Route::put('/{member_id}', 'MemberController@update');


// 刪除聯絡人資料
Route::delete('/{member_id}', 'MemberController@destroy');
