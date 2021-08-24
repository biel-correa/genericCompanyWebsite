<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.dashboard');
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

    // Route::get('/addUser', 'UserController@addUser')->name('users.addUser');
    // Route::get('/edit/{id}', 'UserController@editUserById')->name('users.editUserById');
    // Route::get('/{id}', 'UserController@viewUser')->name('users.view');
    // Route::post('/createNewUser', 'UserController@createNewUser')->name('users.createNewUser');    
    // Route::post('/edit/saveUserData/{id}', 'UserController@saveUserData')->name('users.saveUserData');
});

Route::get('/tasks', 'TasksController@getTasks')->name('tasks');

Route::prefix('/task')->group(function() {
    Route::get('/add', 'TasksController@addTask')->name('task.add');
    Route::get('/delete/{id}', 'TasksController@delete')->name('task.delete');
    Route::get('/{id}', 'TasksController@view')->name('task.view');
    Route::get('/edit/{id}', 'TasksController@edit')->name('task.edit');
    Route::post('/search', 'TasksController@search')->name('task.search');
    Route::post('/saveNewTask', 'TasksController@saveNewTask')->name('task.saveNewTask');
    Route::post('/saveEdit/{id}', 'TasksController@saveEdit')->name('task.saveEdit');
});