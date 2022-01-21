<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\SubAdminProfilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubAdminPondokController;
use App\Http\Controllers\SubAdminSantriController;
use App\Http\Controllers\SubAdminPelanggaranController;
use App\Http\Controllers\SubAdminOrtuController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\SantriController;


use App\Http\Controllers\AdminSantriController;
use App\Http\Controllers\AdminPondokController;
use App\Http\Controllers\AdminPelanggaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfilController;
use App\Http\Controllers\AdminPengajarController;
use App\Http\Controllers\AdminKategoriPelanggaranController;


use App\Http\Controllers\PengajarController;
use App\Http\Controllers\PengajarPrestasiController;
use App\Http\Controllers\PengajarAbsensiController;
use App\Http\Controllers\PengajarHafalanController;
use App\Http\Controllers\PengajarProfilController;
use App\Http\Controllers\PengajarPelanggaranController;


use App\Http\Controllers\OrangtuaController;
use App\Http\Controllers\OrangtuaSantriController;
use App\Http\Controllers\OrangtuaHafalanController;
use App\Http\Controllers\OrangtuaPengajarController;
use App\Http\Controllers\OrangtuaPelanggaranController;
use App\Http\Controllers\OrangtuaAbsensiController;
use App\Http\Controllers\OrangtuaPrestasiController;



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


Route::get('template', function () {
    return view('subadmin.template.base');
});


Route::get('login', [AuthController:: class, 'login'])->name('login');
Route::get('/', [AuthController:: class, 'login'])->name('login');
Route::get('logout', [AuthController:: class, 'logout']);

Route::post('login', [AuthController:: class, 'prosesLogin']);





// prefix superadmin----------------------------------------------
Route::prefix('subadmin')->middleware('auth:subadmin')->group(function(){

    Route::get('beranda', [SubAdminController:: class, 'beranda']);

        //Pondok
    Route::get('pondok', [SubAdminPondokController:: class, 'index']);
    Route::post('pondok/create', [SubAdminPondokController:: class, 'store']);
    Route::put('pondok/update/{pondok}', [SubAdminPondokController:: class, 'update']);
    Route::delete('pondok/delete/{pondok}', [SubAdminPondokController:: class, 'destroy']);

    Route::get('profil', [SubAdminProfilController:: class, 'index']);
    Route::post('profil/create', [SubAdminProfilController:: class, 'store']);
    Route::put('profil/update', [SubAdminProfilController:: class, 'update']);
     Route::put('update-profil/{subadmin}', [SubAdminProfilController:: class, 'update']);
    Route::put('update-password/{subadmin}', [SubAdminProfilController:: class, 'change']);

        //Santri
    //Route::resource('santri', SubAdminSantriController:: class);


        //pelanggaran


        //orangtua
    //Route::resource('orangtua', SubAdminOrtuController:: class);

});
// end prefix------------------------------------------





// prefix admin----------------------------------------------
Route::prefix('admin')->middleware('auth:pondok')->group(function(){

    Route::get('beranda', [AdminController:: class, 'beranda']);

        //Santri
    Route::get('santri', [AdminSantriController:: class, 'index']);

    Route::get('santri/santri/create', [AdminSantriController:: class, 'create1']);

    Route::post('santri/santri/create', [AdminSantriController:: class, 'store']);

    Route::put('santri/edit-santri/{santri}', [AdminSantriController:: class, 'updateSantri']);
    Route::get('santri/edit-santri/{santri}', [AdminSantriController:: class, 'editsantri']);
    
    Route::put('santri/edit-orangtua/{orangtua}', [AdminSantriController:: class, 'updateOrtu']);
    Route::get('santri/edit-orangtua/{orangtua}', [AdminSantriController:: class, 'editortu']);

    Route::delete('santri/delete/{santri}', [AdminSantriController:: class, 'destroy']);
    Route::get('santri/show/{santri}', [AdminSantriController:: class, 'show']);


         //Saudara
    Route::get('santri/saudara/create', [AdminSantriController:: class, 'create2']);
    Route::post('santri/saudara/create', [AdminSantriController:: class, 'store2']);

        //Profil
    Route::get('profil', [AdminProfilController:: class, 'index']);
    Route::put('update-profil/{pondok}', [AdminProfilController:: class, 'updateProfil']);
    Route::put('update-password/{pondok}', [AdminProfilController:: class, 'change']);


        //pengajar
    Route::get('pengajar', [AdminPengajarController:: class, 'index']);
    Route::post('pengajar/create', [AdminPengajarController:: class, 'store']);
    Route::delete('pengajar/delete/{pengajar}', [AdminPengajarController:: class, 'destroy']);
    Route::put('pengajar/update/{pengajar}', [AdminPengajarController:: class, 'update']);
    Route::get('pengajar/show/{pengajar}', [AdminPengajarController:: class, 'show']);


        //Kategori Pelanggaran
    Route::get('kategori', [AdminKategoriPelanggaranController:: class, 'index']);
    Route::post('kategori/create', [AdminKategoriPelanggaranController:: class, 'store']);
    Route::delete('kategori/delete/{kategori}', [AdminKategoriPelanggaranController:: class, 'destroy']);

        //Pelanggaran
    Route::get('pelanggaran', [AdminPelanggaranController:: class, 'index']);
    Route::post('pelanggaran/create', [AdminPelanggaranController:: class, 'store']);
    Route::delete('pelanggaran/delete/{pelanggaran}', [AdminPelanggaranController:: class, 'destroy']);
    Route::put('pelanggaran/update/{pelanggaran}', [AdminPelanggaranController:: class, 'update']);
    Route::get('pelanggaran/show/{pelanggaran}', [AdminPelanggaranController:: class, 'show']);


});
// end prefix------------------------------------------


// prefix pengajar----------------------------------------------
Route::prefix('pengajar')->middleware('auth:pengajar')->group(function(){

    Route::get('beranda', [PengajarController:: class, 'beranda']);

        //absensi
    Route::get('absensi', [PengajarAbsensiController:: class, 'index']);
    Route::get('absensi/history', [PengajarAbsensiController:: class, 'history']);
    Route::post('absensi/create', [PengajarAbsensiController:: class, 'store']);
    Route::put('absensi/update/{absensi}', [PengajarAbsensiController:: class, 'update']);
    Route::delete('absensi/delete/{absensi}', [PengajarAbsensiController:: class, 'destroy']);

    Route::post('absensi/cetak', [PengajarAbsensiController:: class, 'cetak']);

    // hafalan
    Route::get('hafalan', [PengajarHafalanController:: class, 'index']);
    Route::post('hafalan/create', [PengajarHafalanController:: class, 'store']);
    Route::put('hafalan/update/{hafalan}', [PengajarHafalanController:: class, 'update']);
    Route::delete('hafalan/delete/{hafalan}', [PengajarHafalanController:: class, 'destroy']);


    // Prestasi
    Route::get('prestasi', [PengajarPrestasiController:: class, 'index']);
    Route::post('prestasi/create', [PengajarPrestasiController:: class, 'store']);
    Route::put('prestasi/update/{prestasi}', [PengajarPrestasiController:: class, 'update']);
    Route::delete('prestasi/delete/{prestasi}', [PengajarPrestasiController:: class, 'destroy']);


    // Profil
    Route::get('profil', [PengajarProfilController:: class, 'index']);
    Route::put('update-profil/{pengajar}', [PengajarProfilController:: class, 'updateProfil']);
    Route::put('update-password/{pengajar}', [PengajarProfilController:: class, 'change']);


    // Pelanggaran
     Route::get('pelanggaran', [PengajarPelanggaranController:: class, 'index']);
      Route::get('pelanggaran/{pelanggaran}', [PengajarPelanggaranController:: class, 'show']);
    Route::post('pelanggaran/create', [PengajarPelanggaranController:: class, 'store']);
    Route::delete('pelanggaran/delete/{pelanggaran}', [PengajarPelanggaranController:: class, 'destroy']);
    Route::put('pelanggaran/update/{pelanggaran}', [PengajarPelanggaranController:: class, 'update']);
    Route::get('pelanggaran/show/{pelanggaran}', [PengajarPelanggaranController:: class, 'show']);

});
// end prefix------------------------------------------


// prefix orangtua santri----------------------------------------------
Route::prefix('orangtua')->middleware('auth:orangtua')->group(function(){

    Route::get('beranda', [OrangtuaController:: class, 'beranda']);
    Route::get('santri', [OrangtuaSantriController:: class, 'index']);
     Route::get('prestasi', [OrangtuaPrestasiController:: class, 'index']);
     Route::get('hafalan', [OrangtuaHafalanController:: class, 'index']);
     Route::get('pengajar', [OrangtuaPengajarController:: class, 'index']);
     Route::get('pelanggaran', [OrangtuaPelanggaranController:: class, 'index']);
     Route::get('absensi', [OrangtuaAbsensiController:: class, 'index']);


        //user
        //Route::resource('user',UserController:: class);
});
// end prefix------------------------------------------


