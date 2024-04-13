<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
});


// Notification
Route::get('/get-all-notification', [App\Http\Controllers\NotificationController::class, 'getAllNotification'])->name('get.all.notification');
Route::get('/send-notification/{id}', [App\Http\Controllers\NotificationController::class, 'sendNotification'])->name('send.notification');
Route::get('/markasread/{id}', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('markasread');



