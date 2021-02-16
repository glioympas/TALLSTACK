<?php

use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('subscribers', [SubscriberController::class , 'index'])->name('subscribers.all');