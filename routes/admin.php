<?php

use App\Http\Controllers\AdminController;

use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\NotificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" prefix and name prefix.
|
*/

// Admin Authentication Routes (guest only)
Route::prefix('admin')->name('admin.')->group(function () {
  // Admin Authenticated Routes
  Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Admin Chat Routes
    Route::prefix('chat')->name('chat.')->group(function () {
      Route::get('/', [ChatController::class, 'index'])->name('index');
      Route::get('/{session}', [ChatController::class, 'show'])->name('show');
      Route::post('/{session}/messages', [ChatController::class, 'sendMessage'])->name('send');
      Route::get('/{session}/messages', [ChatController::class, 'getMessages'])->name('messages');
    });

    // Admin Notification Routes
    Route::prefix('notifications')->name('notifications.')->group(function () {
      Route::get('/', [NotificationController::class, 'index'])->name('index');
      Route::get('/page', [NotificationController::class, 'page'])->name('page');
      Route::post('/{id}/read', [NotificationController::class, 'markAsRead'])->name('read');
      Route::post('/read-all', [NotificationController::class, 'markAllAsRead'])->name('read-all');
    });

    // Additional admin routes will be added here as needed
    // For now, the old admin routes in web.php will continue to work
    // until they are migrated to use the new admin guard
  });
});
