<?php

use App\TelevisionPlan;
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

Route::resource('tv_plans', PlanoController::class);

Route::prefix('/ajax')->group(function() {
    Route::get('/users', 'AjaxController@listUsers')->name('ajax.users');
    Route::prefix('/user')->group(function () {
        Route::get('/taskassined/{id}', 'AjaxController@taskassined')->name('ajax.users.taskassined');
        Route::get('/taskrequested/{id}', 'AjaxController@taskrequested')->name('ajax.users.taskrequested');
    });
    Route::get('/tasks', 'AjaxController@listTasks')->name('ajax.tasks');
    Route::get('/roles', 'AjaxController@listRoles')->name('ajax.roles');
    Route::get('/tv_plans', 'AjaxController@listTvPlans')->name('ajax.tv_plans');
});