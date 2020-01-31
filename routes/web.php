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


//Display Index Page
Route::get('/member', 'MemberController@index');


// Populate Data in Edit Modal Form
Route::get('member/{member_id?}', 'MemberController@show');


//create New Product
Route::post('member', 'MemberController@store');


// update Existing Product
Route::put('member/{member_id}', 'MemberController@update');


// delete product
Route::delete('member/{member_id}', 'MemberController@destroy');
