<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardMarketingController;
use App\Http\Controllers\DashboardPacketsController;
use App\Http\Controllers\DashboardSalesController;
use App\Models\Packets;
use App\Models\Sales;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth Controller
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login')->middleware('guest');
    Route::post('/', 'authenticate')->middleware('guest');
    Route::post('/logout', 'logout')->middleware('auth');
});

Route::get('/dashboard', function () {
    $userCount = User::where('role_id', 2)->count();
    $paketCount = Packets::count();
    $salesCount = Sales::count();
    return view('dashboard.index', [
        'user_count' => $userCount,
        'paket_count' => $paketCount,
        'sales_count' => $salesCount,
        'title' => 'Control Panel',
    ]);
})->middleware(['auth', 'only_admin']);

Route::get('/dashboard/marketing/trashed', [DashboardMarketingController::class, 'trashed'])->name('marketing.trashed')->middleware(['auth', 'only_admin']);
Route::get('/dashboard/marketing/restore/{slug}', [DashboardMarketingController::class, 'restore'])->name('marketing.restore')->middleware(['auth', 'only_admin']);
Route::resource('/dashboard/marketing', DashboardMarketingController::class)->middleware(['auth', 'only_admin']);

Route::get('/dashboard/paket/trashed', [DashboardPacketsController::class, 'trashed'])->name('paket.trashed')->middleware(['auth', 'only_admin']);
Route::get('/dashboard/paket/restore/{slug}', [DashboardPacketsController::class, 'restore'])->name('paket.restore')->middleware(['auth', 'only_admin']);
Route::resource('/dashboard/paket', DashboardPacketsController::class)->middleware(['auth', 'only_admin']);

Route::controller(DashboardSalesController::class)->group(function () {
    Route::get('/dashboard/sales', 'index')->middleware(['auth', 'only_admin']);
    Route::get('/dashboard/sales/create', 'create')->middleware(['auth']);
    Route::post('/dashboard/sales', 'store')->middleware(['auth']);
    Route::get('/dashboard/sales/list-sales', 'listSale')->middleware(['auth', 'only_marketing']);
    Route::get('/dashboard/sales/{slug}/edit', 'edit')->middleware(['auth', 'only_marketing']);
    Route::put('/dashboard/sales/{slug}', 'update')->middleware(['auth', 'only_marketing']);
    Route::get('/dashboard/sales/{slug}/verifikasi', 'verifikasi')->middleware(['auth', 'only_admin']);
    Route::put('/dashboard/sales/verified/{slug}', 'verified')->middleware(['auth', 'only_admin']);
});
