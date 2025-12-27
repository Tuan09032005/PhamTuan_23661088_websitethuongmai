<?php

use Illuminate\Support\Facades\Route;
// Admin routes (protected)
Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
    // Người dùng
    Route::get('admin/them-nguoi-dung',[\App\Http\Controllers\UserController::class, 'insert_form']);
    Route::post('admin/xu-ly-them-nguoi-dung',[\App\Http\Controllers\UserController::class, 'action_insert']);
    Route::get('admin/danh-sach-nguoi-dung',[\App\Http\Controllers\UserController::class, 'get_all']);
    Route::get('admin/xoa-nguoi-dung/{id}',[\App\Http\Controllers\UserController::class, 'del']);
    Route::get('admin/thong-tin-nguoi-dung/{id}',[\App\Http\Controllers\UserController::class, 'show']);
    Route::post('admin/xu-ly-cap-nhat-nguoi-dung',[\App\Http\Controllers\UserController::class, 'action_update']);

    // Sản phẩm
    Route::get('admin/them-san-pham',[\App\Http\Controllers\ProductController::class, 'insert_form']);
    Route::post('admin/xu-ly-them-san-pham',[\App\Http\Controllers\ProductController::class, 'action_insert']);
    Route::get('admin/danh-sach-san-pham',[\App\Http\Controllers\ProductController::class, 'get_all']);
    Route::get('admin/xoa-san-pham/{id}',[\App\Http\Controllers\ProductController::class, 'del']);
    Route::get('admin/thong-tin-san-pham/{id}',[\App\Http\Controllers\ProductController::class, 'show']);
    Route::post('admin/xu-ly-cap-nhat-san-pham',[\App\Http\Controllers\ProductController::class, 'action_update']);

    // Admin orders
    Route::get('admin/danh-sach-don-hang', [\App\Http\Controllers\AdminOrderController::class, 'index']);
    Route::get('admin/don-hang/{id}', [\App\Http\Controllers\AdminOrderController::class, 'show']);
    // Categories
    Route::get('admin/danh-sach-danh-muc', [\App\Http\Controllers\CategoryController::class, 'get_all']);
    Route::get('admin/xoa-danh-muc/{id}', [\App\Http\Controllers\CategoryController::class, 'del']);
    // Category CRUD
    Route::get('admin/them-danh-muc', [\App\Http\Controllers\CategoryController::class, 'create']);
    Route::post('admin/xu-ly-them-danh-muc', [\App\Http\Controllers\CategoryController::class, 'store']);
    Route::get('admin/sua-danh-muc/{id}', [\App\Http\Controllers\CategoryController::class, 'edit']);
    Route::post('admin/xu-ly-cap-nhat-danh-muc', [\App\Http\Controllers\CategoryController::class, 'update']);
    // CRUD for admin orders
    Route::get('admin/don-hang/{id}/edit', [\App\Http\Controllers\AdminOrderController::class, 'edit']);
    Route::post('admin/don-hang/{id}/update', [\App\Http\Controllers\AdminOrderController::class, 'update']);
    Route::get('admin/don-hang/{id}/delete', [\App\Http\Controllers\AdminOrderController::class, 'destroy']);
});

Route::get('/', function () {
    return view('welcome');
});
//Home
use App\Http\Controllers\HomeController;
Route::get('home', [HomeController::class, 'index']);

// Profile page for logged-in user
use App\Http\Controllers\ProfileController;
Route::get('profile', [ProfileController::class, 'show'])->name('profile');

// Frontend products
use App\Http\Controllers\ProductFrontController;
Route::get('products', [ProductFrontController::class, 'index']);
Route::get('products/{id}', [ProductFrontController::class, 'show']);

// About page
Route::get('about', function () {
    return view('about');
});

use App\Http\Controllers\ContactController;
Route::get('contact', [ContactController::class, 'show']);
Route::get('lien-he', [ContactController::class, 'show']);
Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

// Đăng nhập
use App\Http\Controllers\LoginController;
Route::get('admin/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/login', [LoginController::class, 'login']);
Route::get('admin/logout', [LoginController::class, 'logout']);   

// Public registration
Route::get('register', [LoginController::class, 'showRegister']);
Route::post('register', [LoginController::class, 'register']);



Route::prefix('greeting')->group(function () {

	// work for: /greeting/vn
    Route::get('vn', function () {
        return "Xin chào!";
    });

    // work for: /greeting/en
    Route::get('en', function () {
        return "Hello!";
    });

    // work for: /greeting/cn
    Route::get('cn', function () {
        return "你好!";
    });
});
Route::get('user/{id}/comment/{commentId}', function ($id, $commentId) {
    return "User id: $id and comment id: $commentId";
});
Route::get('laydulieu', function () {
    $data = DB::table('user')->get();
    print_r($data);
});

// Cart and checkout routes
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('order', [OrderController::class, 'placeOrder']);
Route::get('order/confirmation/{id}', [OrderController::class, 'confirmation'])->name('order.confirmation');
Route::get('order/pay-success/{id}', [OrderController::class, 'paySuccess'])->name('order.pay_success');




