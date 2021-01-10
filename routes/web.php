<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenelitianController;
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

Route::get("/skripsi", [PenelitianController::class, "index"]);
Route::get("/skripsi/show/{penelitianModel}", [PenelitianController::class, "show"]);
Route::post("/skripsi/store", [PenelitianController::class, "store"]);
Route::get("/download/{fileName}", [PenelitianController::class, "download"]);

Route::get("/aplikasi", [UserController::class, "aplikasi"]);

Route::get("/dashboard", [AdminController::class, "index"]);

Route::get("/penelitian/table", [AdminController::class, "penelitianTable"]);
Route::get("/penelitian/form", [AdminController::class, "penelitianForm"]);

Route::get("/aplikasi/table", [AdminController::class,"aplikasiTable"]);
Route::get("/aplikasi/form", [AdminController::class, "aplikasiForm"]);

