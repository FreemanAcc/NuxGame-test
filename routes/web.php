<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SpecialPageController;

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

Route::get('/', [RegistrationController::class, 'registerPage'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');

Route::get('/special-page/{id}', [SpecialPageController::class, 'show'])->name('special.page');
Route::post('/special-page/{id}/generate-link', [SpecialPageController::class, 'generateLink'])->name('generate.link');
Route::post('/special-page/{id}/deactivate-link', [SpecialPageController::class, 'deactivateLink'])->name('deactivate.link');
Route::post('/special-page/{id}/feeling-lucky', [SpecialPageController::class, 'feelingLucky'])->name('feeling.lucky');
Route::post('/special-page/{id}/history', [SpecialPageController::class, 'history'])->name('history');
