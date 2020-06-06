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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/student', 'as' => 'student.'], function() {
    Route::get('/all', 'ApiController@allStudents')->name('all');
    Route::get('/profil/{student_no}', 'ApiController@studentCard')->name('student_card');
    Route::match(['get', 'post'], '/note/{student_no}', 'ApiController@studentNote')->name('student_notes');
});
