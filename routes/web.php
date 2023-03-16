<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\UploadController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa',[MhsController::class,'index']);
//Route::resource('/mahasiswa',MhsController::class);
Route::get('/mahasiswa/tambah',[MhsController::class, 'tambah']);
Route::post('/mahasiswa/store',[MhsController::class, 'store']);
Route::get('/mahasiswa/edit{id}',[MhsController::class, 'edit']);
Route::post('/mahasiswa/update',[MhsController::class, 'update']);
Route::get('/mahasiswa/hapus{id}',[MhsController::class, 'hapus']);

Route::get('/upload',[UploadController::class,'upload']);
Route::post('/upload/proses',[UploadController::class,'proses_upload']);

//Route::get('/mahasiswa/matkul',[MhsController::class, 'index_matkul']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
