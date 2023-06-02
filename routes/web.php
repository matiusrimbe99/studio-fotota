<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PacketController;
use App\Http\Controllers\Admin\StudioController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
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

Route::get('/', [LandingPageController::class, 'index']);

Route::get('auth/register', [AuthController::class, 'formRegister']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::get('auth/login', [AuthController::class, 'login'])->name('login');
Route::post('auth/login', [AuthController::class, 'authenticate']);

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

    Route::get('admin/contacts', [ContactController::class, 'index']);
    Route::patch('admin/contacts', [ContactController::class, 'update']);
    Route::get('admin/contacts/edit', [ContactController::class, 'edit']);

    Route::get('admin/customers', [CustomerController::class, 'index']);
    Route::get('admin/customers/{customer}', [CustomerController::class, 'show']);

    Route::get('admin/users', [UserController::class, 'index']);
    Route::get('admin/users/create', [UserController::class, 'create']);
    Route::post('admin/users', [UserController::class, 'store']);
    Route::get('admin/users/{user}', [UserController::class, 'show']);
    Route::get('admin/users/{user}/edit', [UserController::class, 'edit']);
    Route::patch('admin/users/{user}', [UserController::class, 'update']);
    Route::delete('admin/users/{user}', [UserController::class, 'destroy']);
});

Route::middleware(['auth', 'checkrole:2'])->group(function () {
});
