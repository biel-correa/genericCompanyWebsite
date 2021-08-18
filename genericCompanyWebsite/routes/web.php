<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.dashboard');
})->name('home');

Route::get('/mailbox', function () {
    return view('content.mailbox');
})->name('mailbox');