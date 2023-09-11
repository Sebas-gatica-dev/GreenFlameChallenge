<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiscountController;
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'showLogin')->name('login.view');

    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logoutAction')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(DiscountController::class)->prefix('discounts')->group(function () {
        Route::get('', 'index')->name('discounts');
        Route::get('create', 'create')->name('discounts.create');
        Route::post('store', 'store')->name('discounts.store');
        Route::get('show/{id}', 'show')->name('discounts.show');
        Route::get('edit/{id}', 'edit')->name('discounts.edit');
        Route::put('edit/{id}', 'update')->name('discounts.update');
        Route::delete('destroy/{id}', 'destroy')->name('discounts.destroy');
    });
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});