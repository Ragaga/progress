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

Route::get('/groups', function(){
    return \App\Entities\Group::all('id', 'name');
});
Route::post('/student/add', 'StudentController@add');
Route::get('/student/get-list', 'StudentController@getList');
