<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PacketController;
use App\Http\Controllers\Admin\StudioController;
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
    Route::get('admin/studios', [StudioController::class, 'index']);
    Route::get('admin/galleries', [GalleryController::class, 'index']);

    Route::get('admin/brands', [BrandController::class, 'index']);
    Route::get('admin/brands/{brand}/edit', [BrandController::class, 'formEditBrand']);
    Route::get('admin/brands/{brand}/edit-image', [BrandController::class, 'formEditImageBrand']);
    Route::patch('admin/brands/{brand}', [BrandController::class, 'update']);
});

Route::middleware(['auth', 'checkrole:2'])->group(function () {
});
