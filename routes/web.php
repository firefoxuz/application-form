<?php

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
// Unauthenticated user routes
Route::group(['middleware' => 'user.separate'], function () {
    Route::get('/login', ['App\Http\Controllers\Auth\LoginController', 'showPage'])->name('login');
    Route::post('/login', ['App\Http\Controllers\Auth\LoginController', 'authenticate'])->name('login');
    Route::get('/register', ['App\Http\Controllers\Register\RegisterController', 'create'])->name('register.create');
    Route::post('/register', ['App\Http\Controllers\Register\RegisterController', 'store'])->name('register.store');
});

// Authenticated user routes
Route::group([
    'middleware' => 'auth'
], function () {
    Route::resource('/', 'App\Http\Controllers\User\FormController')
        ->middleware('role:user')
        ->only(['index', 'create', 'store']);
    Route::get('/manager', 'App\Http\Controllers\Manager\FormController')
        ->middleware('role:manager')
        ->name('manager.index');
    Route::put('/form/update-status/{form}', 'App\Http\Controllers\Form\UpdateStatusController')
        ->middleware('role:manager')
        ->name('form.update-status');
    Route::post('/logout', 'App\Http\Controllers\Auth\LogoutController')->name('logout');
});
