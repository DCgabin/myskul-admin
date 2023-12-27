<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::middleware(['auth'])->group( function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('profile/{user}' , [UserController::class, 'show'])
        ->name('profile');

    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('messages', MessageController::class)->only(['index', 'destroy', 'store']);
    Route::get('messages/send', [MessageController::class, 'create'])->name('messages.create');
    Route::resource('payments', PaymentController::class);
    Route::resource('abonnements', AbonnementController::class)->only('index', 'destroy');
    Route::resource('admins', AdminController::class)
        ->middleware("can:create-admins");

} );

require __DIR__.'/auth.php';
