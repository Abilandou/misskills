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



Route::resource('/contestants', \App\Http\Controllers\UserController::class);
Route::get('/', function () {
    return redirect()->route('contestants.index');
});

Route::get('/user/{filename}', [App\Http\Controllers\Image\ImageController::class, 'userImage'])->name('user.image');


Route::post('initialise-payment', [App\Http\Controllers\PayUnitController::class, 'pay'])->name('initialise.payment');
Route::get('verify-nuopia/{transactionId}/{userId}', [App\Http\Controllers\PayUnitController::class, 'verifyNoupiaPayment'])->name('verify.noupia.payment');

Route::get('payunit-return', [App\Http\Controllers\PayUnitController::class, 'payUnitReturnUrl'])->name('payunit.return');
Route::get('payunit-notify', [App\Http\Controllers\PayUnitController::class, 'payUnitNotifyUrl'])->name('paynit.notify');

