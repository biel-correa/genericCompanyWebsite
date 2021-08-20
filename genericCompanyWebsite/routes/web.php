<?php

use App\Http\Controllers\UserController;
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

Route::prefix('user')->group(function() {
    Route::post('/addUser', 'UserController@createNewUser')->name('users.createNewUser');
    
    Route::get('/deleteUser/{id}', 'UserController@deleteUserById')->name('users.deleteUserById');
    
    Route::get('/edit/{id}', 'UserController@editUserById')->name('users.editUserById');
    
    Route::post('/edit/saveUserData/{id}', 'UserController@saveUserData')->name('users.saveUserData');
    Route::post('/edit/updateUserPassword/{id}', 'UserController@updateUserPassword')->name('users.updateUserPassword');
});

Route::get('/tasks', 'TasksController@getTasks')->name('tasks');

Route::prefix('/task')->group(function() {
    Route::get('/add', 'TasksController@addProduct')->name('task.add');
    Route::get('/delete/{id}', 'TasksController@delete')->name('task.delete');
    Route::get('/{id}', 'TasksController@view')->name('task.view');
    Route::post('/saveNewTask', 'TasksController@saveNewProduct')->name('task.saveNewProduct');
});