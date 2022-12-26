<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;










Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function(){
    Route::get('/admin/dashboard', function() {
        return view('admin.index');
    })->name('dashboard');
});



// Admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/register', [AdminProfileController::class, 'registerView'])->name('admin.register_view');
Route::post('/admin/store', [AdminProfileController::class, 'createAdmin'])->name('admin.register');

Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
Route::get('/admin/profile_edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('/admin/profile_store', [AdminProfileController::class, 'store'])->name('admin.profile.store');
Route::get('/admin/password_change', [AdminProfileController::class, 'passwordChange'])->name('admin.password_change');
Route::post('/admin/update_password', [AdminProfileController::class, 'updatePassword'])->name('update.password');




// User all routes
Route::get('/', [IndexController::class, 'index']);
















Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'), 'verified'])->group(function(){
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
});


















