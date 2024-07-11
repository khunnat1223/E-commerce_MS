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


// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('/users', UserController::class);
Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);


Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Route::get('/home', function () {return Inertia::render('Dashboard');})->name('index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/categorys', CategoryController::class);
    //Product
    Route::resource('/products', ProductController::class);
    // Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::post('/products/store',[ProductController::class,'store'])->name('products.store');

    //Discount
    // Route::get('discounts', [DiscountController::class, 'index'])->name('discounts.index');
    // Route::get('discounts/create', [DiscountController::class, 'create'])->name('discounts.create');
    // Route::get('/discounts/edit/{discount}', [DiscountController::class, 'edit'])->name('discounts.edit');
    // Route::post('/discounts/update/{discount}', [DiscountController::class, 'update'])->name('discounts.update');
    // Route::delete('/discounts/{discount}', [DiscountController::class, 'destroy'])->name('discounts.destroy');


    // Route::get('discounts', [DiscountController::class, 'index'])->name('discounts.index');
    // Route::get('discounts/create', [DiscountController::class, 'create'])->name('discounts.create');

});

Route::resource('/discounts', DiscountController::class);
//Supplier
Route::resource('/suppliers', SupplierController::class);

// Route::post('discounts', [DiscountController::class, 'store'])->name('discounts.store');



Route::delete('/products/image/{id}',[ProductController::class,'deleteImage'])->name('products.image.delete');
Route::delete('/products/destory/{id}',[ProductController::class,'destory'])->name('products.destory');
Route::put('/products/update/{id}',[ProductController::class,'update'])->name('products.update');



//add to cart

// Route::prefix('cart')->controller(CartController::class)->group(function () {
//     Route::get('view','view')->name('cart.view');
//     Route::post('store/{product}','store')->name('cart.store');
//     Route::patch('update/{product}','update')->name('cart.update');
//     Route::delete('delete/{product}','delete')->name('cart.delete');
// });






require __DIR__.'/auth.php';
