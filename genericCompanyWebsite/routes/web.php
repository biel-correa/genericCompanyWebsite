<?php

use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('users', UserController::class);

Route::prefix('users')->group(function() {
    Route::post('/search', 'UserController@search')->name('users.search');
    Route::post('/edit/updateUserPassword/{id}', 'UserController@updateUserPassword')->name('users.updateUserPassword');
});

Route::resource('tasks', TasksController::class);

Route::prefix('/tasks')->group(function() {
    Route::post('/search', 'TasksController@search')->name('tasks.search');
});

Route::resource('roles', RoleController::class);

Route::prefix('/ajax')->group(function() {
    Route::get('/users', 'UserController@ajax')->name('ajax.users');
    Route::prefix('/user')->group(function () {
        Route::get('/taskassined/{id}', 'UserController@taskassined')->name('ajax.users.taskassined');
        Route::get('/taskrequested/{id}', 'UserController@taskrequested')->name('ajax.users.taskrequested');
    });
    Route::get('/tasks', 'TasksController@ajax')->name('ajax.tasks');
    Route::get('/roles', 'RoleController@ajax')->name('ajax.roles');
});