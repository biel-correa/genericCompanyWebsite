<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.home');
})->name('home');

Route::get('/sobrenos', function () {
    return view('content.sobrenos');
})->name('sobrenos');

Route::get('/contato', function () {
    return view('content.contato');
})->name('contato');