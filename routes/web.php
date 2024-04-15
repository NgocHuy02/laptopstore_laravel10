<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/products', [ProductController::class, 'showProductUserPage'])->name('products');
Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('showProductDetail');




Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/orders/show/{order}', [OrderController::class, 'show'])->name('show');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::patch('/cart/update', [CartController::class, 'updateCart'])->name('updateCart');
    Route::delete('/cart/remove', [CartController::class, 'removeFromCart'])->name('removeFromCart');
    Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('placeOrder');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');

    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');

    //product
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin/products/store');
    Route::get('/admin/products/show/{id}', [ProductController::class, 'show'])->name('admin/products/show');
    Route::get('/admin/products/showProductAdmin/{id}', [ProductController::class, 'showProductAdmin'])->name('admin/products/showProductAdmin');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
    Route::delete('/admin/products/destroy/{id}', [ProductController::class, 'destroy'])->name('admin/products/destroy');
    //brand
    Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin/brands');
    Route::get('/admin/brands/create', [BrandController::class, 'create'])->name('admin/brands/create');
    Route::post('/admin/brands/store', [BrandController::class, 'store'])->name('admin/brands/store');
    Route::get('/admin/brands/show/{id}', [BrandController::class, 'show'])->name('admin/brands/show');
    Route::get('/admin/brands/edit/{id}', [BrandController::class, 'edit'])->name('admin/brands/edit');
    Route::put('/admin/brands/edit/{id}', [BrandController::class, 'update'])->name('admin/brands/update');
    Route::delete('/admin/brands/destroy/{id}', [BrandController::class, 'destroy'])->name('admin/brands/destroy');
});
