<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect/{targetPage}', [RedirectController::class, 'trackAndRedirect'])->name('trackAndRedirect');