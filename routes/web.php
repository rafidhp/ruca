<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PsikologController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('dashboard');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->middleware('guest')->name('auth.login');
    Route::post('/login/post', 'postlogin')->middleware('guest')->name('auth.postlogin');
    Route::get('/register', 'register')->middleware('guest')->name('auth.register');
    Route::post('/register/post', 'postregister')->middleware('guest')->name('auth.postregister');
    Route::get('/logout', 'logout')->middleware('auth')->name('auth.logout');
});

Route::controller(PsikologController::class)->middleware('auth')->group(function () {
    Route::get('/psi-dashboard/{psikolog_id}', 'dashboard')->name('psi.dashboard');

    // eduhub
    Route::get('/eduhub', 'eduhub')->name('eduhub');
});
