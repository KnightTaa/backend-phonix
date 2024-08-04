<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', function () {
        $user = Auth::user();
        $userRole = $user->roles->first();
        if ($userRole->name === 'admin') {  // Adjust this condition to fit your role logic
            return redirect()->intended('admin/dashboard');
        } else {
            return redirect()->intended('user/dashboard');
        }
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UsersController::class, 'index'])->name('users.view');
});

require __DIR__.'/auth.php';
