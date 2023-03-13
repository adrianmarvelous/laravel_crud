<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MhsController;

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

Route::get('/mahasiswa/tambah',[MhsController::class, 'tambah']);
Route::post('/mahasiswa/store',[MhsController::class, 'store']);
Route::get('/mahasiswa/edit{id}',[MhsController::class, 'edit']);
Route::post('/mahasiswa/update',[MhsController::class, 'update']);
Route::get('/mahasiswa/hapus{id}',[MhsController::class, 'hapus']);