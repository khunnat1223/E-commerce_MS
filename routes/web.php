<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiscountController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BannerListController;
use App\Http\Controllers\ReportController;

use App\Http\Controllers\ProviderController;


// Route::get('/', function () {
//     return view('welcome');
// });


// Route::resource('/users', UserController::class);
Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Route::get('/dashboard', function () {
//     return Inertia::render('HpmePage/home');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

 Route::get('/history',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/language/{language}',function($language){
    Session::put('locale',$language);
    return redirect()->back();
   })->name('language');


Route::middleware(['auth', 'role:admin'])->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('/users', UserController::class);
    Route::resource('/deliverys', DeliveryController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/categorys', CategoryController::class);
    Route::resource('/staffs', StaffController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/reports', ReportController::class);
    Route::put('/orders/update-to-cancel/{id}',[OrderController::class,'updateToCancel'])->name('orders.updateToCancel');
    Route::resource('/banners', BannerController::class);
    //Product
    Route::resource('/products', ProductController::class);
    Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
    Route::put('/products/update-to-public/{id}',[ProductController::class,'updateToPublished'])->name('products.updateToPublished');
    Route::put('/products/update-to-unpublic/{id}',[ProductController::class,'updateToUnpublished'])->name('products.updateToUnpublished');

});
// Excel
Route::get('/products/download', [ProductController::class, 'export'])->name('products.export');

// Route::put('/orders/update-to-cancel/{id}', [OrderController::class, 'updateToCancel'])->name('orders.updateToCancel');
// Route::resource('/bannerlist', BannerListController::class);
//routes for products list and filter
Route::prefix('banner')->controller(BannerListController::class)->group(function ()  {
    Route::get('/','index')->name('banner.index');

});
Route::resource('/discounts', DiscountController::class);
//Supplier
Route::resource('/suppliers', SupplierController::class);





Route::delete('/products/image/{id}',[ProductController::class,'deleteImage'])->name('products.image.delete');
Route::delete('/products/destory/{id}',[ProductController::class,'destory'])->name('products.destory');
Route::put('/products/update/{id}',[ProductController::class,'update'])->name('products.update');



//add to cart

Route::prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('view','view')->name('cart.view');
    Route::post('store/{product}','store')->name('cart.store');
    Route::patch('update/{product}','update')->name('cart.update');
    Route::delete('delete/{product}','delete')->name('cart.delete');
});

//routes for products list and filter
Route::prefix('products')->controller(ProductListController::class)->group(function ()  {
    Route::get('/','index')->name('productList.index');

});


//socialite route
Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirect']);
Route::get('/auth/{provider}/callback',[ProviderController::class,'callback']);

 //chekcout
 Route::prefix('checkout')->controller(CheckoutController::class)->group((function()  {
    // Route::get('/checkout')->name('checkout.view');
    Route::get('payment','view')->name('checkout.view');
    Route::post('order','store')->name('checkout.store');
    Route::get('success','success')->name('checkout.success');
    Route::get('cancel','cancel')->name('checkout.cancel');
}));



require __DIR__.'/auth.php';
