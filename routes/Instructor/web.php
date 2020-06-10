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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::prefix('instructor')->name('instructor.')->group(function () {
        Config::set('auth.defines', 'instructor');
        //login Route
        Route::get('login', 'InstructorAuthController@login')->name('login');
        Route::post('login', 'InstructorAuthController@do_login');
        Route::get('register', 'InstructorAuthController@register')->name('register');
        Route::post('register', 'InstructorAuthController@do_register')->name('do_register');

        //Forgot Password Route
        Route::get('password/forgot', 'InstructorAuthController@forgot')->name('password.forgot');
        Route::post('forgot_password', 'InstructorAuthController@forgot_post');
        Route::get('reset/password/{token}', 'InstructorAuthController@reset_password');
        Route::post('reset/password/{token}', 'InstructorAuthController@reset_password_post');

        Route::middleware(['auth:instructor'])->group(function () {
            //Home Instructor
            Route::get('/', 'InstructorController@index')->name('index');

            //Profile route
            Route::get('/profile', 'profileController@index')->name('profile');
            Route::put('/profile/update/{id}', 'profileController@update')->name('profile.update');

            //change Password route
            Route::get('/password/change', 'ChangePasswordController@index')->name('change_password');
            Route::put('/password/change/{id}', 'ChangePasswordController@update')->name('change_password.update');

            //Notifaction route
            Route::get('/notifactions', 'NotifactionController@index')->name('notifactions.index');

            //Cources route
            Route::resource('/cources', 'CourceController')->except(['show']);
            Route::get('/cources/{cource}/lectures', 'Cource\LectureController@index')->name('cources.lectures.index');
            Route::get('/cources/{cource}/sections', 'Cource\SectionController@index')->name('cources.sections.index');

            //lecture route
            Route::post('/lecture/load', 'Cource\LectureController@load_lecture')->name('load_lecture');
            Route::get('{cource}/lecture/{week}/{type}/create', 'Cource\LectureController@create')->name('lecture.create');
            Route::get('lecture/{id}/edit/{type}', 'Cource\LectureController@edit')->name('lecture.edit');
            Route::post('lecture/{id}', 'Cource\LectureController@update')->name('lecture.update');
            Route::get('lecture/{lecture}/view', 'Cource\LectureController@preview')->name('lecture.view');
            Route::get('lecture/{lecture}/download', 'Cource\LectureController@download')->name('lecture.download');
            Route::delete('lecture/{lecture}/destroy', 'Cource\LectureController@destroy')->name('lecture.destroy');
            Route::post('lecture/upload/files/{id}/{type}', 'Cource\LectureController@upload_lecture_file')->name('lecture.upload_file');
            Route::post('lecture/delete/files/', 'Cource\LectureController@delete_lecture_file')->name('lecture.delete_file');

            //Section route
            Route::post('section/{id}', 'Cource\SectionController@update')->name('section.update');
            Route::post('/section/load', 'Cource\SectionController@load_section')->name('load_section');
            Route::get('section/{id}/edit', 'Cource\SectionController@edit')->name('section.edit');
            Route::get('section/{section}/view', 'Cource\SectionController@preview')->name('section.view');
            Route::get('section/{section}/download', 'Cource\SectionController@download')->name('section.download');
            Route::delete('section/{section}/destroy', 'Cource\SectionController@destroy')->name('section.destroy');
            Route::get('{cource}/section/{week}/{type}/create', 'Cource\SectionController@create')->name('section.create');
            Route::post('{cource}/section/{week}/{type}/create', 'Cource\SectionController@store')->name('section.store');
            //weeks route
            Route::get('/students', 'StudentController@index');

            //Message route
            Route::resource('messages', 'MessageController')->except(['show']);
            Route::get('/messages/sent', 'MessageController@sent')->name('messages.sent');
            Route::post('/messages/replay', 'MessageController@replay')->name('messages.replay');
            Route::get('/messages/{id}/show', 'MessageController@show')->name('messages.show');
            Route::post('/messages/users/load', 'MessageController@load_users')->name('messages.load_users');
            Route::get('messages.file/{id}/view', 'MessageController@view')->name('message.view');
            Route::post('/messages/delete/files/', 'MessageController@delete_message_file')->name('messages.delete_file');
            Route::get('messages/file/{id}/download', 'MessageController@download')->name('message.download');
            Route::post('/messages/upload/files/{mid}', 'MessageController@upload_message_file')->name('messages.upload_file');
            //Announcments route
            Route::get('announcments', 'AnnouncmentController@index')->name('announcments.index');
            Route::post('announcments', 'AnnouncmentController@store')->name('announcments.store');

            //QuetionBank route
            Route::get('QuetionBank', 'QuetionBankController@index')->name('QuetionBank.index');

            //Assignment Result route
            Route::get('{cource}/assignmentResult', 'AssignmentController@index')->name('assignmentResult.index');
            Route::post('/assignmentResult/load', 'AssignmentController@load_assignment')->name('load_assignment');
            Route::post('assignmentResult/store', 'AssignmentController@store')->name('assignmentResult.store');
            Route::get('assignmentResult/{assignmentResult}/view', 'AssignmentController@preview')->name('assignmentResult.view');
            Route::get('assignmentResult/{assignmentResult}/download', 'AssignmentController@download')->name('assignmentResult.download');
            Route::delete('assignmentResult/{assignmentResult}/destroy', 'AssignmentController@destroy')->name('assignmentResult.destroy');

        });
    });
});
