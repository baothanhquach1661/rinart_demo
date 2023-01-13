<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\AboutController;


use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;









Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});



// User all routes
Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
Route::post('/user/profile-update', [IndexController::class, 'userProfileUpdate'])->name('user.profile.store');
Route::post('/user/password-update', [IndexController::class, 'userPasswordUpdate'])->name('user.password.update');






Route::middleware(['auth:admin'])->group(function(){

    Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function(){
        Route::get('/admin/dashboard', function() {
            return view('admin.index');
        })->name('admin.dashboard')->middleware('auth:admin');
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


    // All brand routes
    Route::prefix('admin/brand')->group(function (){

        Route::get('/index', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('admin.brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('admin.brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::post('/update', [BrandController::class, 'update'])->name('admin.brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
    });


    // Category all routes
    Route::prefix('admin/category')->group(function (){

        Route::get('/index', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

        Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    });



    // SubCategory all routes
    Route::prefix('admin/subcategory')->group(function (){

        Route::get('/index', [SubCategoryController::class, 'index'])->name('admin.subcategory.index');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('admin.subcategory.store');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
        Route::post('/update', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('admin.subcategory.delete');
    });



    // Product all routes
    Route::prefix('admin/product')->group(function (){

        Route::get('/index', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product-store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update', [ProductController::class, 'updateWithoutImage'])->name('product-update');
        Route::post('/updateWithImage', [ProductController::class, 'updateWithImage'])->name('product-update-image');
        Route::post('/updateThumbnail', [ProductController::class, 'updateThumbnail'])->name('product-update-thumbnail');
        Route::get('/product-multiImg/delete/{id}', [ProductController::class, 'multiImgDelete'])->name('product.multiImg.delete');

        Route::get('/add-product-Multiimage/{id}', [ProductController::class, 'addMoreProductMultiImg'])->name('admin.product.addMoreProductMultiImg');
        Route::post('/store-product-Multiimage/{id}', [ProductController::class, 'storeMultiImage'])->name('admin.product.storeMoreProductMultiImg');

        Route::post('ck-upload', [ProductController::class, 'storeImage'])->name('ck.upload');

        Route::get('/inactive/{id}', [ProductController::class, 'productInactive'])->name('admin.product.inactive');
        Route::get('/active/{id}', [ProductController::class, 'productActive'])->name('admin.product.active');

        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    });



    // All slides routes
    Route::prefix('admin/slider')->group(function (){

        Route::get('/index', [SliderController::class, 'index'])->name('admin.slider.index');
        Route::get('/create', [SliderController::class, 'create'])->name('admin.slider.create');
        Route::post('/store', [SliderController::class, 'store'])->name('admin.slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('admin.slider.edit');
        Route::post('/update', [SliderController::class, 'update'])->name('admin.slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('admin.slider.delete');

        Route::get('/inactive/{id}', [SliderController::class, 'inActive'])->name('admin.slider.inactive');
        Route::get('/active/{id}', [SliderController::class, 'active'])->name('admin.slider.active');

    });


    // All footer site routes
    Route::prefix('admin/footer-site')->group(function (){

        Route::get('/setting', [FooterController::class, 'siteSetting'])->name('admin.footer.site');
        Route::post('/update', [FooterController::class, 'footerSiteUpdate'])->name('admin.footer.update');
        
    });


    // All About page routes
    Route::prefix('admin/about-page')->group(function (){

        Route::get('/setting', [AboutController::class, 'aboutSetting'])->name('admin.about.setting');
        Route::post('/updateWithoutImage', [AboutController::class, 'aboutUpdateWithoutImage'])->name('admin.about.updateWithoutBanner');
        Route::post('/updateBanner', [AboutController::class, 'aboutBannerUpdate'])->name('about-update-banner');
        Route::post('/updateTeamImage', [AboutController::class, 'updateTeamImage'])->name('about-update-teamImg');

        Route::get('/add-member-image', [AboutController::class, 'addMoreMemberImage'])->name('admin.about.addMoreMemberImage');
        Route::post('/store-member-image', [AboutController::class, 'storeMoreMemberImage'])->name('admin.about.storeMoreMemberImage');
        Route::get('/team-image/delete/{id}', [AboutController::class, 'teamImgDelete'])->name('about.teamImg.delete');
        
    });


    // All seo setting
    Route::prefix('admin/seo')->group(function (){

        Route::get('/setting', [SiteSettingController::class, 'seoSetting'])->name('admin.seo.setting');
        Route::post('/update', [SiteSettingController::class, 'seoSettingUpdate'])->name('admin.seo.update');
        
    });



});



Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'), 'verified'])->group(function(){
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
});





/////// Frontend Area ////////


Route::get('/language/english', [LanguageController::class, 'english'])->name('english.language');
Route::get('/language/vietnamese', [LanguageController::class, 'vietnamese'])->name('vietnamese.language');


/////// Product details page ////////
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'productDetails']);

/////// Products page ////////
Route::get('/product/all', [IndexController::class, 'productPage'])->name('products.page');

Route::get('/category/product/{id}/{slug}', [IndexController::class, 'productCatPage']);

/////// Home about page ////////
Route::get('/about-rinart', [AboutController::class, 'homeAbout'])->name('home.about');























































