<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TampilanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware(['guest:karyawan'])->group(function(){
    // Route::get('/refreshcaptcha', [TampilanController::class,'reloadCaptcha']);
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/proseslogin',[AuthController::class,'proseslogin']);


});
Route::middleware(['guest:user'])->group(function(){
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    Route::post('/prosesloginadmin',[AuthController::class,'prosesloginadmin']);

});

// Route::get('/dashboardadmin', [DashboardController::class,'Index']);

// Route::get('/panel', function () {
//     return view('auth.loginadmin');
// })->name('loginadmin');
//khusus user karyawan
Route::middleware(['auth:karyawan'])->group(function(){

Route::get('/dashboard', [TampilanController::class,'Index']);
Route::get('/proseslogout', [AuthController::class,'proseslogout']);

//proses presensi
// Route::get('data',[DashboardController::class,'indexku']);
Route::get('/prosespresensi/create', [PresensiController::class,'create']);
Route::post('/presensi/store',[PresensiController::class,'store']);
//proses editprofilpegawai
Route::get('/editprofil',[PresensiController::class,'customprofil']);
Route::post('/presensi/{nik}/updateprofil',[PresensiController::class,'editprofil']);
//nextpage
Route::get('/presensi/izin',[PresensiController::class,'izin']);
Route::get('/presensi/histori',[PresensiController::class,'histori']);
Route::post('/gethistori',[PresensiController::class,'gethistori']);
//proses presensicuti
Route::post('/presensi/{nik}/updatecuti',[PresensiController::class,'storecuti']);
Route::get('/presensi/lihatpersetujuancuti',[PresensiController::class,'cuti']);
});

//khusus useradmin
Route::middleware(['auth:user'])->group(function(){
    Route::get('/proseslogoutadmin', [AuthController::class,'proseslogoutadmin']);
    Route::get('/panel/dashboardadmin', [DashboardController::class,'Index']);
    //proses admin kelola data karyawan
    Route::get('/halamantambahdata', [DashboardController::class,'popup']);
    Route::get('/datakaryawan', [DashboardController::class,'Datakaryawan']);
    Route::post('/tambahdata',[DashboardController::class,'tambahdata']);
    Route::get('/tampildata/{nik}/datakaryawan',[DashboardController::class,'editdatakaryawan']);
    Route::post('/update/{nik}/datakaryawan',[DashboardController::class,'updatedatakaryawan']);
    Route::get('/hapus/{nik}/datakaryawan',[DashboardController::class,'deletedatakaryawan']);
    // proses admin kelola presensi
    Route::get('/datapresensi', [DashboardController::class,'Datapresensi']);
    Route::get('/tampilmap/{id}/lokasimasuk',[DashboardController::class,'lihatmap']);
    Route::get('/tampilmap/{id}/lokasikeluar',[DashboardController::class,'lihatmapkeluar']);
    Route::get('/tampildata/{id}/datapresensi',[DashboardController::class,'tampildatapresensi']);
    Route::post('/update/{id}/datapresensi',[DashboardController::class,'updatedatapresensi']);
    Route::get('/hapus/{id}/datapresensi',[DashboardController::class,'deletedatapresensi']);
    Route::get('/datapresensi/export_excel', [DashboardController::class,'ambildata']);
    //proses admin kelola pengajuan cuti
    Route::get('/datapengajuancuti', [DashboardController::class,'datapengajuancuti']);
    Route::get('/tampilpengajuancuti/{id}/karyawan',[DashboardController::class,'tampilpengajuancuti']);
    Route::post('/updatedatapengajuancuti/{id}/cuti',[DashboardController::class,'updatedatapengajuancuti']);
    Route::get('/hapus/{id}/datacuti',[DashboardController::class,'deletedatacuti']);

    //proses admin kelola aset
    Route::get('/dataruangan', [RuangController::class,'index']);
    Route::get('/halamantambahdataruangan', [RuangController::class,'tampilruangan']);
    Route::post('/tambahdataruangan',[RuangController::class,'tambahdata']);
    Route::get('/tampildata/{noruangan}/dataruangan',[RuangController::class,'tampildataruangan']);
    Route::post('/update/{noruangan}/dataruangan',[RuangController::class,'updatedataruangan']);
    Route::get('/hapus/{noruangan}/dataruangan',[RuangController::class,'deletedataruangan']);

    //proses kelola aset barang
    Route::get('/dashboard/{noruangan}/databarang',[RuangController::class, 'detailbarang']);
    Route::get('/noruangan/{noruangan}/lihatbarang',[RuangController::class, 'halamanbarang']);
    Route::get('/noruangan/{noruangan}/tambahbarang',[RuangController::class, 'halamantambahbarang']);
    Route::post('/noruangan/{noruangan}/tambahbarangbaru',[RuangController::class, 'tambahbarang']);
    Route::get('/tampilbarang/{noruangan}/nobarang/{nomorbarang}',[RuangController::class, 'halamanupdatebarang']);
    Route::post('/noruangan/{nomorbarang}/updatebarang',[RuangController::class, 'updatebarang']);
    Route::get('/hapus/{nomorbarang}/databarang',[RuangController::class,'deletedatabarang']);
    Route::get('/noruangan/{noruangan}/excelbarang', [RuangController::class,'donwloadexcel']);



});
