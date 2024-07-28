<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;

Route::get('/redirect/{targetPage}', [RedirectController::class, 'trackAndRedirect'])->name('trackAndRedirect');