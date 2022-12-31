<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PermintaanDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VendorController;
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
//     return view('basetemplate.home');
// })->middleware('auth');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::post('/test-store', [TestController::class, 'store'])->name('test.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
    Route::resource('/kategori', KategoriController::class);

    Route::get('/kategori-detail/data', [KategoriController::class, 'kategori_detail_data'])->name('kategori.detail.data');
    Route::get('/kategori-detail', [KategoriController::class, 'detail'])->name('kategori.detail');
    Route::post('/kategori-detail', [KategoriController::class, 'kategori_detail_store'])->name('kategori.detail.store');

    Route::get('/barang/data', [BarangController::class, 'data'])->name('barang.data');
    Route::resource('/barang', BarangController::class);

    Route::get('/permintaan/data', [PermintaanController::class, 'data'])->name('permintaan.data');
    Route::get('/permintaan/detaildata/{id}', [PermintaanController::class, 'detaildata'])->name('permintaan.detaildata');

    Route::get('/permintaan/form-permintaan-barang', [PermintaanController::class, 'form_permintaan_barang'])->name('form.permintaan.barang');
    Route::resource('/permintaan', PermintaanController::class);
    Route::post('/store-all', [PermintaanController::class, 'store_all'])->name('store.all');

    Route::resource('/permintaan-detail', PermintaanDetailController::class);



    Route::get('/vendor/data', [VendorController::class, 'data'])->name('vendor.data');
    Route::resource('/vendor', VendorController::class);

    Route::resource('/approval', ApprovalController::class);
});

require __DIR__ . '/auth.php';


// Route::view('test', 'test');
