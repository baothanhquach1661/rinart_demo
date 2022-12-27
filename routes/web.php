<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;









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
    })->name('admin.dashboard');
});



// Admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/registerr', [AdminProfileController::class, 'registerView'])->name('admin.register_view');
Route::post('/admin/storee', [AdminProfileController::class, 'createAdminn'])->name('admin.registerr');

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


// All brand routes
Route::prefix('brand')->group(function (){

    Route::get('/index', [BrandController::class, 'index'])->name('admin.brand.index');
    Route::get('/create', [BrandController::class, 'create'])->name('admin.brand.create');
    Route::post('/store', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/update', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');

});


// Category all routes
Route::prefix('category')->group(function (){

    Route::get('/index', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
});


// SubCategory all routes
Route::prefix('subcategory')->group(function (){

    Route::get('/index', [SubCategoryController::class, 'index'])->name('admin.subcategory.index');
    Route::get('/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
    Route::post('/store', [SubCategoryController::class, 'store'])->name('admin.subcategory.store');
    Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
    Route::post('/update', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
    Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('admin.subcategory.delete');
});


// Product all routes
Route::prefix('product')->group(function (){

    Route::get('/index', [ProductController::class, 'index'])->name('admin.category.index');
    Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('admin.category.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.category.edit');
    Route::post('/update', [ProductController::class, 'update'])->name('admin.category.update');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.category.delete');
});






































