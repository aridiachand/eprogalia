<?php

use App\Http\Controllers\ApprovalvendorController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ApprovedVendorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CekAccessController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemilihanApprovalController;
use App\Http\Controllers\PengajuanMasterBarangController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PermintaanDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VerificationVendorController;
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
    Route::get('/logout', [AuthController::class, 'logout'])->name('keluar');

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
    Route::get('/autocomplete-search', [BarangController::class, 'autocompleteSearch'])->name('autocomplete.search');
    Route::get('/autocomplete-search/dua', [BarangController::class, 'selectSearch'])->name('autocomplete.search2');
    Route::resource('/barang', BarangController::class);

    Route::get('/permintaan/data', [PermintaanController::class, 'data'])->name('permintaan.data');
    Route::get('/permintaan/detaildata/{id}', [PermintaanController::class, 'detaildata'])->name('permintaan.detaildata');
    Route::put('/permintaan/detaildata/{id}', [PermintaanController::class, 'editdetaildata'])->name('edit.permintaan.detaildata');


    Route::get('/permintaan/form-permintaan-barang', [PermintaanController::class, 'form_permintaan_barang'])->name('form.permintaan.barang');
    Route::post('/store-all', [PermintaanController::class, 'store_all'])->name('store.all');
    Route::resource('/permintaan', PermintaanController::class);

    Route::resource('/permintaan-detail', PermintaanDetailController::class);


    Route::get('/vendor/data', [VendorController::class, 'data'])->name('vendor.data');
    Route::resource('/vendor', VendorController::class);


    Route::get('/approval/detaildata/{id}', [ApprovalController::class, 'detaildata'])->name('approval.detaildata');
    Route::post('/approval/detaildata/update', [ApprovalController::class, 'detaildataupdate'])->name('approval.detaildata.update');
    Route::get('/approval/data/{approve}', [ApprovalController::class, 'approval_data'])->name('approval.data.approve');
    Route::get('/approval/data', [ApprovalController::class, 'data'])->name('approval.data');
    Route::post('/approval/approved-data-save', [ApprovalController::class, 'approved_data_save'])->name('approved.data.save');
    Route::resource('/approval', ApprovalController::class);

    Route::get('/pemilihan-approval/data', [PemilihanApprovalController::class, 'data'])->name('pemilihan-approval.data');
    Route::get('/pemilihan-approval/split', [PemilihanApprovalController::class, 'split'])->name('pemilihan-approval.split');
    Route::post('/pemilihan-approval/removevendor', [PemilihanApprovalController::class, 'removevendor'])->name('pemilihan-approval.removevendor');
    Route::post('/pemilihan-approval/split', [PemilihanApprovalController::class, 'save_split'])->name('save.split');
    Route::get('/pemilihan-approval/detaildata/{id}', [PemilihanApprovalController::class, 'detaildata'])->name('pemilihan-approval.detaildata');
    Route::get('/pemilihan-approval/select/vendor', [PemilihanApprovalController::class, 'selectvendor'])->name('selectvendor');
    Route::resource('/pemilihan-approval', PemilihanApprovalController::class);

    Route::get('/approvalvendor/data', [ApprovalvendorController::class, 'data'])->name('approvalvendor.data');
    Route::get('/approvalvendor/managementapprove/{id}', [ApprovalvendorController::class, 'managementapprove'])->name('management.approve');
    Route::post('/approvalvendor/managementapprove/updateselected', [ApprovalvendorController::class, 'updateselected'])->name('updateselected');
    Route::post('/approvalvendor/managementapprove/selected', [ApprovalvendorController::class, 'selected'])->name('management.selected');
    Route::get('/approvalvendor/managementapprove/view/selectednote', [ApprovalvendorController::class, 'viewselectednote'])->name('viewselectednote');
    Route::resource('/approvalvendor', ApprovalvendorController::class);

    Route::get('/verification-vendor/data', [VerificationVendorController::class, 'data'])->name('verification-vendor.data');
    Route::get('/verification-vendor/internal/{id}', [VerificationVendorController::class, 'internal'])->name('verification-vendor.internal');
    Route::resource('/verification-vendor', VerificationVendorController::class);

    Route::get('/pengajuan-master-barang/data', [PengajuanMasterBarangController::class, 'data'])->name('pengajuan-master-barang.data');
    Route::get('/pengajuan-master-barang/datareqinv', [PengajuanMasterBarangController::class, 'datareqinv'])->name('pengajuan-master-barang.datareqinv');
    Route::get('/pengajuan-master-barang/check', [PengajuanMasterBarangController::class, 'check'])->name('pengajuan-master-barang.check');
    Route::get('/pengajuan-master-barang/createpre', [PengajuanMasterBarangController::class, 'createpre'])->name('pembuatan-master-barang.pre');
    Route::get('/pengajuan-master-barang/to-inventory-request/listrequestinv', [PengajuanMasterBarangController::class, 'listrequestinv'])->name('pengajuan-master-barang.listrequest.inv');
    Route::post('/pengajuan-master-barang/to-inventory-request', [PengajuanMasterBarangController::class, 'toinventoryrequest'])->name('pengajuan-master-barang.toinventory.request');
    Route::post('/pengajuan-master-barang/to-inventory-request/simpan', [PengajuanMasterBarangController::class, 'toinventoryrequestsimpan'])->name('pengajuan-master-barang.toinventory.simpan');

    Route::post('/pengajuan-master-barang/to-logistik-suggest', [PengajuanMasterBarangController::class, 'tologistiksuggest'])->name('pengajuan-master-barang.tologistik.suggest');
    Route::post('/pengajuan-master-barang/to-logistik-suggest/simpan', [PengajuanMasterBarangController::class, 'tologistiksuggestsimpan'])->name('pengajuan-master-barang.tologistik.simpan');
    Route::resource('/pengajuan-master-barang', PengajuanMasterBarangController::class);
    // Route::get('/permintaan/detaildata/{id}', [PermintaanController::class, 'detaildata'])->name('permintaan.detaildata');


    Route::get('/approved-vendor/data', [ApprovedVendorController::class, 'data'])->name('approved-vendor.data');
    Route::resource('/approved-vendor', ApprovedVendorController::class);

    Route::post('/top', [TopController::class, 'show'])->name('datatop.id');
    // Route::get('/approval/detaildata/{id}', [ApprovalController::class, 'detaildata'])->name('approval.detaildata');
    // Route::post('/approval/detaildata/update', [ApprovalController::class, 'detaildataupdate'])->name('approval.detaildata.update');
    // Route::get('/approval/data/{approve}', [ApprovalController::class, 'approval_data'])->name('approval.data');
    // Route::get('/approval/data', [ApprovalController::class, 'data'])->name('approval.data');
    // Route::post('/approval/approved-data-save', [ApprovalController::class, 'approved_data_save'])->name('approved.data.save');

    Route::get('/cek/barangonproses/{idpermintaan}', [CekAccessController::class, 'barangonproses'])->name('cek.barangonproses');
});

require __DIR__ . '/auth.php';


Route::get('coba', [PermintaanController::class, 'coba'])->name('coba');

// Route::get('/upload', [FileUploadController::class, 'index']);
Route::get('/upload/{idpermintaan}', [FileUploadController::class, 'data']);
Route::get('/upload/{idpermintaan}/{idpermintaandetail}', [FileUploadController::class, 'dataitem']);
Route::post('/uploadFile', [FileUploadController::class, 'uploadFile'])->name('uploadFile');
Route::post('/uploadFileItem', [FileUploadController::class, 'uploadFileItem'])->name('uploadFileItem');


Route::view('/surat-penetapan', 'print.surat-penetapan');
