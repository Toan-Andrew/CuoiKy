<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserProfileController::class, 'index']) // Lấy phương thức 'index' trong UserProfileController
    ->middleware(['auth', 'verified']) // Dùng middleware xác thực và đã xác nhận
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('user_profiles', UserProfileController::class);

require __DIR__.'/auth.php';
