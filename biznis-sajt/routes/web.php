<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
USE App\Http\Controllers\AlexController;
use App\Http\Controllers\ConsultationController;


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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::get('/alex', [AlexController::class, 'index'])->name('alex');


// ── Add these two lines to your existing routes/web.php ──────────────────────
// Make sure to import the controller at the top of web.php:
// use App\Http\Controllers\ConsultationController;






Route::get('/consultation/slots', [ConsultationController::class, 'slots'])->name('consultation.slots');
Route::post('/consultation/book',  [ConsultationController::class, 'book'])->name('consultation.book');

