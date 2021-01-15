<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\AplikasiController;
use App\Models\PenelitianModel;
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

Route::get("/", [UserController::class, "home"]);
Route::get("/penelitian", [UserController::class, "penelitian"]);
Route::get("/aplikasi", [UserController::class, "aplikasi"]);

Route::get("/penelitian/table", [PenelitianController::class, "index"]);
Route::post("/penelitian/store", [PenelitianController::class, "store"]);
Route::get("/penelitian/form/tambah", [PenelitianController::class, "create"]);
Route::put("/penelitian/update/{penelitianModel}", [PenelitianController::class, "update"]);
Route::get("/penelitian/form/{penelitianModel}/edit", [PenelitianController::class, "edit"]);
Route::get("/penelitian/show/{penelitianModel}", [PenelitianController::class, "show"]);
Route::delete("/penelitian/delete/{penelitianModel}", [PenelitianController::class, "destroy"]);
Route::get("/penelitian/download/{fileName}", [PenelitianController::class, "download"]);

Route::get("/aplikasi/table", [AplikasiController::class, "index"]);
Route::get("/aplikasi/form/tambah", [AplikasiController::class,"create"]);
Route::post("/aplikasi/store", [AplikasiController::class,"store"]);
Route::get("/aplikasi/form/{aplikasiModel}/edit", [AplikasiController::class, "edit"]);
Route::put("/aplikasi/update/{aplikasiModel}", [AplikasiController::class, "update"]);
Route::delete("/aplikasi/delete/{aplikasiModel}", [PenelitianController::class, "destroy"]);

Route::get("/dashboard", [AdminController::class, "index"]);
Route::get("/aplikasi/form", [AdminController::class, "aplikasiForm"]);

