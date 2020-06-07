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

Route::group(['prefix' => '/student', 'as' => 'student.', 'middleware' => 'cors'], function() {
    Route::get('/all', 'ApiController@allStudents')->name('all');
    Route::get('/profile/{student_no}', 'ApiController@studentCard')->name('student_card');
    Route::get('/profile/{student_no}/works', 'ApiController@studentWorks')->name('student_works');
    Route::get('/profile/{student_no}/work/{work_no}', 'ApiController@studentWorkNote')->name('student_note');
    Route::post('/profile/{student_no}/work/{work_no}', 'ApiController@studentWorkNoteCreate')->name('student_note_create');
});

Route::group(['prefix' => '/work', 'as' => 'work.'], function() {
    Route::get('/all', 'ApiController@allWorks')->name('all');
    Route::get('/{work_no}', 'ApiController@workCards')->name('work_card');
});
