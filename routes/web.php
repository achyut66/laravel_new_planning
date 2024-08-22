<?php

use App\Http\Controllers\NagarAnugamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WardAnugamanController; // Correct namespace
use App\Http\Controllers\ExcelController; // Correct namespace


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // other controllers
    Route::get('/ward-anugamans', [WardAnugamanController::class, 'index'])->name('ward_anugamans.index');
    Route::get('/ward-anugamans/{darta_no}', [WardAnugamanController::class, 'show'])->name('ward_anugamans.show');
    Route::post('/ward-anugamans/store', [WardAnugamanController::class, 'store'])->name('ward_anugamans.store');
    Route::get('/ward-anugamans/{wardAnugaman}/edit', [WardAnugamanController::class, 'edit'])->name('ward_anugamans.edit');
    Route::put('/ward-anugamans/{wardAnugaman}', [WardAnugamanController::class, 'update'])->name('ward_anugamans.update');
    Route::delete('/ward-anugamans/{wardAnugaman}', [WardAnugamanController::class, 'destroy'])->name('ward_anugamans.destroy');
    Route::get('/ward-anugamans/getall', [WardAnugamanController::class, 'showall'])->name('ward_anugamans.showall');
    // print
    Route::get('/ward-anugamans/print/{darta_no}', [WardAnugamanController::class, 'printView'])->name('ward_anugamans.printView');

    // nagar palika anugaman
    Route::get('/nagar-anugamans', [NagarAnugamanController::class, 'index'])->name('nagar_anugamans.index');
    Route::get('/nagar-anugamans/{darta_no}', [NagarAnugamanController::class, 'show'])->name('nagar_anugamans.show');
    Route::post('/nagar-anugamans/store', [NagarAnugamanController::class, 'store'])->name('nagar_anugamans.store');
    Route::get('/nagar-anugamans/{nagarAnugaman}/edit', [NagarAnugamanController::class, 'edit'])->name('nagar_anugamans.edit');
    Route::put('/nagar-anugamans/{nagarAnugaman}', [NagarAnugamanController::class, 'update'])->name('nagar_anugamans.update');
    Route::delete('/nagar-anugamans/{nagarAnugaman}', [NagarAnugamanController::class, 'destroy'])->name('nagar_anugamans.destroy');
    Route::get('/nagar-anugamans/showall', [NagarAnugamanController::class, 'showall'])->name('nagar_anugamans.showall');
    // print
    Route::get('/nagar-anugamans/print/{darta_no}', [NagarAnugamanController::class, 'printView'])->name('nagar_anugamans.printView');

    // yojana upload route
    Route::get('/yojanauploads', [ExcelController::class, 'index'])->name('yojanaupload.index');
    Route::get('/yojanauploads/programs', [ExcelController::class, 'showallprogram'])->name('yojanaupload.showallprogram');
    Route::get('/yojanauploads/{darta_no}', [ExcelController::class, 'seeDetails'])->name('yojanaupload.seeDetails');
    Route::get('/yojanauploads/printDetails/{darta_no}', [ExcelController::class, 'printAlldetails'])->name('yojanaupload.printAlldetails');
    Route::post('/upload', [ExcelController::class, 'upload'])->name('upload');
    // Route::get('/yojana')

});

require __DIR__ . '/auth.php';
