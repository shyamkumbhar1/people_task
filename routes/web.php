<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::impersonate();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/unread-notification', [App\Http\Controllers\UserController::class, 'unreadNotification'])->name('unread.notification');
    Route::get('/impersonate/{id}', [App\Http\Controllers\ImpersonateController::class, 'impersonate'])->name('users.impersonate');
    // Notification
    Route::get('/get-all-notification', [App\Http\Controllers\NotificationController::class, 'getAllNotification'])->name('get.all.notification');
    Route::get('/send-notification/{id}', [App\Http\Controllers\NotificationController::class, 'sendNotification'])->name('send.notification');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/leave-impersonate', [App\Http\Controllers\ImpersonateController::class, 'leaveImpersonate'])->name('users.leave-impersonate');
    Route::get('/edit-user-setting', [App\Http\Controllers\UserController::class, 'editUserSetting'])->name('edit.user.setting');
    Route::post('/update-user-setting', [App\Http\Controllers\UserController::class, 'updateUserSetting'])->name('update.user.setting');
    Route::get('/markasread/{id}', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('markasread');
});
