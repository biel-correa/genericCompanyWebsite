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

Route::post('/users/addUser', 'UserController@createNewUser')->name('users.createNewUser');

Route::get('users/deleteUser/{id}', 'UserController@deleteUserById')->name('users.deleteUserById');