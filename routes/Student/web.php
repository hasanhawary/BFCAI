<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::prefix('student')->name('student.')->group(function () {
        Config::set('auth.defines', 'web');

        Route::middleware(['auth:web'])->group(function () {
            //Home Student
            Route::get('/', function () {return view('student.index');});

            //Semster Student
            Route::get('/{semster}', 'StudentController@index')->name('index');

            //Profile route
            Route::get('/profile', 'profileController@index')->name('profile');
            Route::put('/profile/update/{id}', 'profileController@update')->name('profile.update');

            //change Password route
            Route::get('/password/change', 'ChangePasswordController@index')->name('change_password');
            Route::put('/password/change/{id}', 'ChangePasswordController@update')->name('change_password.update');

            //Notifaction route
            Route::get('/notifactions', 'NotifactionController@index')->name('notifactions.index');

            //Matrials route
            Route::get('{semester}/matrials', 'MatrialController@index')->name('matrial.index');
            Route::get('{semester}/{cource}/matrials', 'MatrialController@weeks')->name('matrial.weeks');
            Route::get('{semester}/{cource}/matrials/{week}', 'MatrialController@matrial_data')->name('matrial.cource_data');
            Route::get('lecture/{lecture}/view', 'MatrialController@preview')->name('lecture.view');
            Route::get('lecture/{lecture}/download', 'MatrialController@download')->name('lecture.download');

            //Announcments route
            Route::get('{semester}/announcments', 'AnnouncementController@index')->name('announcements.index');

            //Message route
            Route::resource('{semester}/{user}/messages', 'MessageController')->except(['show']);
            Route::post('{semester}/messages/{user}/inbox', 'MessageController@inbox')->name('messages.inbox');
            Route::post('{semester}/messages/{user}/sent', 'MessageController@sent')->name('messages.sent');
            Route::post('{semester}/messages/{user}/draft', 'MessageController@draft')->name('messages.draft');
            Route::post('{semester}/messages/{user}/important', 'MessageController@important')->name('messages.important');
            Route::get('{semester}/messages/{user}/{id}/show', 'MessageController@show')->name('messages.show');
            Route::post('{semester}/messages/{user}/users/load', 'MessageController@load_users')->name('messages.load_users');
            Route::get('/messages/file/{id}/view', 'MessageController@view')->name('message.view');
            Route::post('/messages/delete/files', 'MessageController@delete_message_file')->name('messages.delete_file');
            Route::get('messages/file/{id}/download', 'MessageController@download')->name('message.download');
            Route::post('/messages/upload/files/{mid}', 'MessageController@upload_message_file')->name('messages.upload_file');
            Route::get('/messages/star/', 'MessageController@star')->name('messages.star');

            //Assignments route
            Route::get('{semester}/assignments', 'AssignmentController@index')->name('assignments.index');
            Route::post('{id}/assignments/store', 'AssignmentController@store')->name('assignments.store');
            Route::get('assignments/{fid}/view', 'AssignmentController@preview')->name('assignments.view');
            Route::get('assignments/{fid}/download', 'AssignmentController@download')->name('assignments.download');

            //weeks route
            Route::get('/students', 'StudentController@index');

            //QuetionBank route
            Route::get('QuetionBank', 'QuetionBankController@index')->name('QuetionBank.index');

        });
    });
});
