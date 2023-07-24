<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfManageController;

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

Route::get('/', [PdfManageController::class, 'index'])->name('index');
Route::post('upload', [PdfManageController::class, 'upload'])->name('upload');
Route::post('download', [PdfManageController::class, 'download'])->name('download');
