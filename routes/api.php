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

// force-json 必須放到最前面
Route::group(['middleware' => ['force-json', 'auth:api']], function () {
    // put your router
});

Use App\Member;



//顯示通訊錄所有資料清單
Route::get('/', 'MemberController@apiindex');


// 查看單一聯絡人資料
Route::get('/{member_id?}', 'MemberController@show');


//新建通訊錄聯絡人資料
Route::post('/new', 'MemberController@store');


// 更新聯絡人資料
Route::put('/edit/{member_id}', 'MemberController@update');


// 刪除聯絡人資料
Route::delete('/delete/{member_id}', 'MemberController@destroy');
