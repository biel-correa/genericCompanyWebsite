<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users');
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

Route::get('/users', 'UserController@getUser')->name('users');

Route::resource('user', UserController::class);

Route::prefix('user')->group(function() {
    Route::post('/search', 'UserController@search')->name('users.search');
    Route::post('/edit/updateUserPassword/{id}', 'UserController@updateUserPassword')->name('users.updateUserPassword');
});

Route::get('/tasks', 'TasksController@getTasks')->name('tasks');

Route::resource('task', TasksController::class);

Route::prefix('/task')->group(function() {
    Route::post('/search', 'TasksController@search')->name('task.search');
});