<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OrderMethodController;
use App\Http\Controllers\Admin\PacketController;
use App\Http\Controllers\Admin\StudioController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [LandingPageController::class, 'index'])->name('homepage');

Route::get('auth/register', [AuthController::class, 'formRegister']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::get('auth/login', [AuthController::class, 'login'])->name('login');
Route::get('admin/login', [AuthController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('auth/login', [AuthController::class, 'authenticate']);
Route::post('admin/login', [AuthController::class, 'authenticateAdmin']);

Route::get('pdf', [PDFController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('auth/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index']);

    Route::get('admin/packets', [PacketController::class, 'index']);
    Route::post('admin/packets', [PacketController::class, 'store']);
    Route::get('admin/packets/create', [PacketController::class, 'create']);
    Route::get('admin/packets/{packet}', [PacketController::class, 'show']);
    Route::patch('admin/packets/{packet}', [PacketController::class, 'update']);
    Route::delete('admin/packets/{packet}', [PacketController::class, 'destroy']);
    Route::get('admin/packets/{packet}/edit', [PacketController::class, 'edit']);

    Route::get('admin/studios', [StudioController::class, 'index']);
    Route::post('admin/studios', [StudioController::class, 'store']);
    Route::get('admin/studios/create', [StudioController::class, 'create']);
    Route::get('admin/studios/{studio}', [StudioController::class, 'show']);
    Route::patch('admin/studios/{studio}', [StudioController::class, 'update']);
    Route::delete('admin/studios/{studio}', [StudioController::class, 'destroy']);
    Route::get('admin/studios/{studio}/edit', [StudioController::class, 'edit']);

    Route::get('admin/galleries', [GalleryController::class, 'index']);
    Route::get('admin/galleries/create', [GalleryController::class, 'create']);
    Route::get('admin/galleries/delete', [GalleryController::class, 'delete']);
    Route::post('admin/galleries', [GalleryController::class, 'store']);
    Route::delete('admin/galleries/{gallery}', [GalleryController::class, 'destroy']);
    Route::delete('admin/galleries', [GalleryController::class, 'destroyAll']);

    Route::get('admin/brands', [BrandController::class, 'index']);
    Route::get('admin/brands/{brand}/edit', [BrandController::class, 'formEditBrand']);
    Route::get('admin/brands/{brand}/edit-image', [BrandController::class, 'formEditImageBrand']);
    Route::patch('admin/brands/{brand}', [BrandController::class, 'update']);
    Route::patch('admin/brands/{brand}/update-image', [BrandController::class, 'updateImageBrand']);

    Route::get('admin/abouts', [AboutController::class, 'index']);
    Route::get('admin/abouts/{about}/edit', [AboutController::class, 'formEditAbout']);
    Route::get('admin/abouts/{about}/edit-image', [AboutController::class, 'formEditImageAbout']);
    Route::patch('admin/abouts/{about}', [AboutController::class, 'update']);
    Route::patch('admin/abouts/{about}/update-image', [AboutController::class, 'updateImageAbout']);

    Route::get('admin/contacts', [ContactController::class, 'index']);
    Route::patch('admin/contacts', [ContactController::class, 'update']);
    Route::get('admin/contacts/edit', [ContactController::class, 'edit']);

    Route::get('admin/order-methods', [OrderMethodController::class, 'index']);
    Route::patch('admin/order-methods', [OrderMethodController::class, 'update']);
    Route::get('admin/order-methods/edit', [OrderMethodController::class, 'edit']);

    Route::get('admin/customers', [CustomerController::class, 'index']);
    Route::get('admin/customers/{customer}', [CustomerController::class, 'show']);

    Route::get('admin/edit-profile', [UserController::class, 'editProfileAdmin']);
    Route::patch('admin/update-profile', [UserController::class, 'updateProfileAdmin']);
    Route::get('admin/change-password', [UserController::class, 'changePasswordAdmin']);
    Route::patch('admin/update-password', [UserController::class, 'updatePasswordAdmin']);
    Route::get('admin/users', [UserController::class, 'index']);
    Route::get('admin/users/create', [UserController::class, 'create']);
    Route::post('admin/users', [UserController::class, 'store']);
    Route::get('admin/users/{user}', [UserController::class, 'show']);
    Route::get('admin/users/{user}/edit', [UserController::class, 'edit']);
    Route::patch('admin/users/{user}', [UserController::class, 'update']);
    Route::delete('admin/users/{user}', [UserController::class, 'destroy']);

    Route::get('admin/orders', [OrderController::class, 'index']);
    Route::get('admin/orders/cetak', [OrderController::class, 'cetakLaporan']);
    Route::get('admin/orders/payments', [OrderController::class, 'listOrderPayments']);
    Route::get('admin/orders/full-payments', [OrderController::class, 'listOrderFullPayments']);
    Route::get('admin/orders/completed', [OrderController::class, 'listOrderCompleted']);
    Route::get('admin/orders/all', [OrderController::class, 'listAllOrder']);
    Route::get('admin/orders/{order}/all', [OrderController::class, 'showAllOrder']);
    Route::get('admin/orders/{order}', [OrderController::class, 'show']);
    Route::get('admin/orders/{order}/payment', [OrderController::class, 'showPayment']);
    Route::get('admin/orders/{order}/full-payment', [OrderController::class, 'showFullPayment']);
    Route::get('admin/orders/{order}/completed', [OrderController::class, 'showOrderCompleted']);
    Route::patch('admin/orders/{order}/done', [OrderController::class, 'updateOrderDone']);
    Route::patch('admin/orders/{order}/payment', [OrderController::class, 'updatePayment']);
    Route::patch('admin/orders/{order}', [OrderController::class, 'updateAcceptOrReject']);

});

Route::middleware(['auth', 'checkrole:2'])->group(function () {
    Route::get('orders/create', [OrderController::class, 'create']);
    Route::post('orders', [OrderController::class, 'store']);
    Route::get('orders/customers', [OrderController::class, 'showOrderByCustomer']);
    Route::get('orders/customers/{order}/payment', [OrderController::class, 'formCustomerPayment']);
    Route::get('orders/customers/{order}/e-tiket', [OrderController::class, 'generatePDFTiket']);
    Route::patch('orders/customers/{order}/payment', [OrderController::class, 'updateCustomerPayment']);
    // Route::post('/midtrans-callback', [OrderController::class, 'callback']);
});
