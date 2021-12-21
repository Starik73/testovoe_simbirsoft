<?php

use App\Http\Controllers\Info\InfoController;
use Illuminate\Support\Facades\Route;

Route::get('/input/create', [InfoController::class, 'input'])
                ->middleware(['auth'])->name('input/create');

Route::get('/output', [InfoController::class, 'output'])
                ->middleware(['auth'])->name('output');

Route::post('/store', [InfoController::class, 'store'])
                ->name('store');