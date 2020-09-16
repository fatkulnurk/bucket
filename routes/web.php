<?php

use App\Http\Controllers\FilesController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/files', function () {

})->name('file-explorer');
Route::get('/files/{code}', [FilesController::class, 'show'])->name('file-detail');
Route::get('/files/{code}/edit', [FilesController::class, 'edit'])->name('file-edit');
Route::post('/upload', function(Request $request) {
    return $request->all();
})->name('upload');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
