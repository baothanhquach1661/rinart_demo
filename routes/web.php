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
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Backend\VideoController;


use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PriceController;


use App\Http\Controllers\User\WishlistController;









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


    // All Contact page routes
    Route::prefix('admin/contact-page')->group(function (){

        Route::get('/setting', [ContactController::class, 'contactSetting'])->name('admin.contact.setting');
        Route::post('/update', [ContactController::class, 'updateContactSite'])->name('admin.contact.update');
        
    });


    //-------------- All Pricing page routes
    Route::prefix('admin/pricing-page')->group(function (){

        Route::get('/setting', [PriceController::class, 'priceSetting'])->name('admin.pricing.setting');
        Route::get('/create', [PriceController::class, 'create'])->name('admin.pricing.create');
        Route::post('/store', [PriceController::class, 'store'])->name('price_list-store');
        Route::get('/edit/{id}', [PriceController::class, 'edit'])->name('admin.pricing.edit');
        Route::post('/update', [PriceController::class, 'update'])->name('price_list-update');
        Route::post('/updateBanner', [PriceController::class, 'updateWithBanner'])->name('price_list-update-banner');
        Route::post('/updateImage', [PriceController::class, 'updateImage'])->name('price_list-update-image');
        Route::get('/delete/{id}', [PriceController::class, 'delete'])->name('admin.pricing.delete');

        Route::get('/inactive/{id}', [PriceController::class, 'pricingInactive'])->name('admin.price_list.inactive');
        Route::get('/active/{id}', [PriceController::class, 'pricingActive'])->name('admin.price_list.active');
        
        
    });


    // All seo setting
    Route::prefix('admin/seo')->group(function (){

        Route::get('/setting', [SiteSettingController::class, 'seoSetting'])->name('admin.seo.setting');
        Route::post('/update', [SiteSettingController::class, 'seoSettingUpdate'])->name('admin.seo.update');
        
    });


    // All coupons site setting
    Route::prefix('admin/coupons')->group(function (){

        Route::get('/setting', [CouponController::class, 'setting'])->name('admin.coupon.index');
        Route::get('/create', [CouponController::class, 'create'])->name('admin.coupon.create');
        Route::post('/store', [CouponController::class, 'store'])->name('admin.coupon.store');
        Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('admin.coupon.edit');
        Route::post('/update', [CouponController::class, 'update'])->name('admin.coupon.update');
        Route::get('/delete/{id}', [CouponController::class, 'delete'])->name('admin.coupon.delete');
        
    });
    

    // ----------- All shipping area site setting ------------//
    // All shipping Division 
    Route::prefix('admin/shipping-division')->group(function (){

        Route::get('/setting', [ShippingController::class, 'setting'])->name('manage-shipping-division');
        Route::get('/create', [ShippingController::class, 'create'])->name('admin.division.create');
        Route::post('/store', [ShippingController::class, 'store'])->name('admin.division.store');
        Route::get('/edit/{id}', [ShippingController::class, 'edit'])->name('admin.division.edit');
        Route::post('/update', [ShippingController::class, 'update'])->name('admin.division.update');
        Route::get('/delete/{id}', [ShippingController::class, 'delete'])->name('admin.division.delete');

    });

    // All shipping District 
    Route::prefix('admin/shipping-district')->group(function (){

        Route::get('/setting', [ShippingController::class, 'districtIndex'])->name('manage-shipping-district');
        Route::get('/create', [ShippingController::class, 'districtCreate'])->name('admin.district.create');
        Route::post('/store', [ShippingController::class, 'districtStore'])->name('admin.district.store');
        Route::get('/edit/{id}', [ShippingController::class, 'districtEdit'])->name('admin.district.edit');
        Route::post('/update/{id}', [ShippingController::class, 'districtUpdate'])->name('admin.district.update');
        Route::get('/delete/{id}', [ShippingController::class, 'districtDelete'])->name('admin.district.delete');

    });

    // All shipping State 
    Route::prefix('admin/shipping-state')->group(function (){

        Route::get('/setting', [ShippingController::class, 'stateIndex'])->name('manage-shipping-state');
        Route::get('/create', [ShippingController::class, 'stateCreate'])->name('admin.state.create');
        Route::post('/store', [ShippingController::class, 'stateStore'])->name('admin.state.store');
        Route::get('/edit/{id}', [ShippingController::class, 'stateEdit'])->name('admin.state.edit');
        Route::post('/update/{id}', [ShippingController::class, 'statetUpdate'])->name('admin.state.update');
        Route::get('/delete/{id}', [ShippingController::class, 'stateDelete'])->name('admin.state.delete');

    });
    // ----------- end shipping area site setting ------------//


    // All Customer Messages 
    Route::prefix('admin/customer-message')->group(function (){

        Route::get('/index', [ContactController::class, 'customerMessage'])->name('message.index');
        Route::get('/delete/{id}', [ContactController::class, 'messageDelete'])->name('message.delete');

        Route::get('/inactive/{id}', [ContactController::class, 'inActive'])->name('message.inactive');
        Route::get('/active/{id}', [ContactController::class, 'active'])->name('message.active');

        Route::get('/content/{message_id}', [ContactController::class, 'messageDetail'])->name('message.detail');

        Route::get('/read', [ContactController::class, 'readMessage'])->name('message.read');
        Route::get('/not-read', [ContactController::class, 'notReadMessage'])->name('message.not_read');

    });
    // ----------- end Customer messages area site setting ------------//


    // All Video Site  
    Route::prefix('admin/video-setting')->group(function (){

        Route::get('/setting', [VideoController::class, 'setting'])->name('admin.video.setting');
        Route::post('/update', [VideoController::class, 'videoUpdate'])->name('admin.video.update');

    });
    // ----------- end Customer messages area site setting ------------//



});



Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'), 'verified'])->group(function(){
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
});





/////------------ Frontend Area ------------////////


Route::get('/language/english', [LanguageController::class, 'english'])->name('english.language');
Route::get('/language/vietnamese', [LanguageController::class, 'vietnamese'])->name('vietnamese.language');


/// Product modal view /////
Route::get('/product/view/modal/{id}', [IndexController::class, 'productViewAjax']);

/// Add to Cart ///
// Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// /// Mini Cart preview ///
// Route::get('/product/mini/cart', [CartController::class, 'miniCart']);

// // Remove item in mini cart
// Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeMiniCart']);


// /// add to wishlist ///
// Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'addToWishlist']);

// /// Wishlist page + middleware + Cart Page///
// Route::group(['prefix' => 'user', 'middleware' => ['user','auth'], 'namespace' => 'User'], 
//     function(){

//         Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
//         Route::get('/get-wishlist-product', [WishlistController::class, 'getWishlistProduct']);
//         Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

// });


// /// Cart Page   ///
// Route::get('/cart', [CartController::class, 'cartIndex'])->name('cart');
// Route::get('/user/get-cart-products', [CartController::class, 'getCartProduct']);
// Route::get('/user/cart-remove/{id}', [CartController::class, 'removeCartProduct']);
// Route::get('/cart-increment/{id}', [CartController::class, 'cartIncrement']);
// Route::get('/cart-decrement/{id}', [CartController::class, 'cartDecrement']);









// /// Coupon options ///
// Route::post('/coupon-apply', [CartController::class, 'couponApply']);
// Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
// Route::get('/coupon-remove', [CartController::class, 'couponRemove']);


// /// Home Checkout page ///
// Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');


///////----------- Frontend Product Details Page --------------//////////
Route::get('/{id}/{slug}', [IndexController::class, 'productDetails']);
Route::get('/{id}/{slug}/{name}', [IndexController::class, 'productCatPage']);


///////----------- Frontend Product Page --------------//////////
Route::get('/product/all', [IndexController::class, 'productPage'])->name('products.page');


///////----------- Frontend About Page --------------//////////
Route::get('/about-rinart', [AboutController::class, 'homeAbout'])->name('home.about');


///////----------- Frontend Contact Page --------------//////////
Route::get('/contact', [ContactController::class, 'contactPage'])->name('contact.page');
Route::post('/contact/send', [ContactController::class, 'storeMessage'])->name('store.message');


///////----------- Frontend Pricing Page --------------//////////
Route::get('/pricing', [PriceController::class, 'pricingPage'])->name('price_list');


///////----------- Frontend Pricing Detail Page --------------//////////
Route::get('/{id}/{slug}', [PriceController::class, 'priceDetail'])->name('price_list.detail');






/////------------ End Frontend Area ------------////////























































