<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function(){
        return "dashboard";
    })->name('dashboard');

});


// Notification
Route::get('/send-notification', [App\Http\Controllers\NotificationController::class, 'sendNotification'])->name('send.notification');
Route::get('/markasread/{id}', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('markasread');



