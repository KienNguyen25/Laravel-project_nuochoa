<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController as ProductAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Admin\OrderController as Order;
use App\Http\Controllers\User\UserController as MyAccount;
use App\Http\Controllers\User\ProductCategoryController;
use App\Http\Controllers\User\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Admin auth
Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->name('admin.login')->middleware('block.admin.login');
Route::post('/admin/login/authenticate', [LoginController::class,'login'])->name('admin.login.authenticate');
Route::get('/admin/logout', [LogoutController::class,'logoutAdmin'])->name('admin.logout');

//User auth
Route::get('/login', function () {
    if(!auth()->guard('web')->check()){
        return view('user.auth.login');
    } else {
        return back();
    }
})->name('user.login');
Route::get('/register', function () {
    return view('user.auth.register');
})->name('user.register');
Route::post('/login/authenticate', [LoginController::class,'loginUser'])->name('user.login.authenticate');
Route::get('/logout', [LogoutController::class,'logoutUser'])->name('user.logout');
Route::post('/register/authenticate', [RegisterController::class,'registerUser'])->name('user.register.authenticate');


//Admin
Route::group([
    'namespace'=>'Admin',
    'prefix'=>'admin',
    'middleware' =>['admin','preventBackHistory'],
],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::post('/fillter-by-date',[DashboardController::class,'fillterByDate'])->name('admin.dashboard.statistic.day');
    Route::post('/dashboard_fillter',[DashboardController::class,'dashboardFillter'])->name('admin.dashboard.statistic.fillter');
    //Danh mục
    Route::prefix('categories')->name('admin.categories.')->group(function () {
        Route::get('/',[CategoryController::class,'index'])->name('list');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('update');
        Route::delete('/{id}',[CategoryController::class,'delete'])->name('delete');
    });

    //Nhãn hiệu
    Route::prefix('brands')->name('admin.brands.')->group(function () {
        Route::get('/',[BrandController::class,'index'])->name('list');
        Route::get('/create',[BrandController::class,'create'])->name('create');
        Route::post('/store',[BrandController::class,'store'])->name('store');
        Route::get('/edit/{id}',[BrandController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[BrandController::class,'update'])->name('update');
        Route::delete('/{id}',[BrandController::class,'delete'])->name('delete');
    });

    //Khách hàng
    Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/',[UserController::class,'index'])->name('list');
        Route::put('/lock/{id}',[UserController::class,'lock'])->name('lock');
        Route::put('/unlock/{id}',[UserController::class,'unLock'])->name('unLock');
        Route::delete('/{id}',[UserController::class,'delete'])->name('delete');

    });

    //Đơn hàng
    Route::prefix('orders')->name('admin.orders.')->group(function () {
        Route::get('/',[Order::class,'index'])->name('list');
        Route::get('/confirmed/{id}',[Order::class, 'confirmed'])->name('confirmed');
        Route::get('/shipping/{id}',[Order::class, 'shipping'])->name('shipping');
        Route::get('/delivered/{id}', [Order::class, 'delivered'])->name('delivered');
        Route::get('/cancelled/{id}',[Order::class, 'cancelled'])->name('cancelled');
    });

    //Sản phẩm
    Route::prefix('products')->name('admin.products.')->group(function () {
        Route::get('/',[ProductAdminController::class,'index'])->name('list');
        Route::get('/create',[ProductAdminController::class,'create'])->name('create');
        Route::post('/store',[ProductAdminController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ProductAdminController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[ProductAdminController::class,'update'])->name('update');
        Route::delete('/{id}',[ProductAdminController::class,'delete'])->name('delete');
    });

});


//User
Route::group([
    'namespace'=>'User',
],function(){
    Route::get('/',[HomeController::class,'index'])->name('user.home');
    Route::get('/product-category',[ProductCategoryController::class,'index'])->name('user.category');
    Route::get('/product-detail/{id}',[ProductController::class,'detail'])->name('user.product.detail');
    Route::get('/checkout',[CheckoutController::class,'index'])->name('user.checkout');
    Route::get('/card',[CartController::class,'index'])->name('user.cart');
    Route::get('/contact',function () {
        return view('user.contact.contact');
    })->name('user.contact');

    //cart
    Route::prefix('carts')->name('user.carts.')->group(function (){
        Route::get('/', [CartController::class, 'index'])->name('list');
        Route::get('add-cart/{id}', [CartController::class, 'addCart'])->name('add');
        Route::get('update-cart', [CartController::class, 'reset'])->name('reset');
        Route::delete('remove/{rowId}', [CartController::class, 'remove'])->name('remove');
        Route::get('/carts-down/{rowId}/{qty}',[CartController::class, 'down'])->name('down');
        Route::get('/carts-up/{rowId}/{qty}/{id}',[CartController::class, 'up'])->name('up');
    });

    //checkout
    Route::prefix('checkout')->name('user.checkout.')->group(function (){
        Route::get('/', [CheckoutController::class, 'index'])->name('list');
    });

    //order
    Route::prefix('orders')->name('user.orders.')->group(function (){
        Route::post('/',[OrderController::class, 'store'])->name('store');
        Route::get('/{id}',[OrderController::class, 'index'])->name('list');
    });
});
