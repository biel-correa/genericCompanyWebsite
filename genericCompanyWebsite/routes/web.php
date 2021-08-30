<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users.index');
})->name('home');

Route::get('/mailbox', function () {
    return view('content.mailbox');
})->name('mailbox');

Route::get('/icons', function () {
    return view('content.uiElements.icons');
})->name('icons');

Route::get('/tabs', function () {
    return view('content.uiElements.tabs');
})->name('tabs');

Route::get('/buttons', function () {
    return view('content.uiElements.buttons');
})->name('buttons');

Route::get('/panels', function () {
    return view('content.uiElements.panels');
})->name('panels');

Route::resource('users', UserController::class);

Route::prefix('users')->group(function() {
    Route::post('/search', 'UserController@search')->name('users.search');
    Route::post('/edit/updateUserPassword/{id}', 'UserController@updateUserPassword')->name('users.updateUserPassword');
});

Route::resource('tasks', TasksController::class);

Route::prefix('/tasks')->group(function() {
    Route::post('/search', 'TasksController@search')->name('tasks.search');
});

Route::prefix('/ajax')->group(function() {
    Route::get('/users', 'UserController@ajax')->name('ajax.users');
    Route::get('/tasks', 'TasksController@ajax')->name('ajax.tasks');
});