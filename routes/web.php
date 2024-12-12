<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return 'Cache cleared!';
});


Route::middleware('auth')->group(function () {
    Route::get('/', [BackendController::class, 'index'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::get('/usersData', [UserController::class, 'getData'])->name('users.getData');

});

require __DIR__.'/auth.php';
