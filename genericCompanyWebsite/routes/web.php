<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.home');
})->name('home');
