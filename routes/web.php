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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm']);
Route::get('/login/owner', [App\Http\Controllers\Auth\LoginController::class, 'showOwnerLoginForm']);
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm']);
Route::get('/register/owner', [App\Http\Controllers\Auth\RegisterController::class, 'showOwnerRegisterForm']);

Route::get('/login/cashier', [App\Http\Controllers\Auth\LoginController::class, 'showCashierLoginForm']);
Route::get('/register/cashier', [App\Http\Controllers\Auth\RegisterController::class, 'showCashierRegisterForm']);

Route::get('/login/manager', [App\Http\Controllers\Auth\LoginController::class, 'showManagerLoginForm']);
Route::get('/register/manager', [App\Http\Controllers\Auth\RegisterController::class, 'showManagerRegisterForm']);

Route::get('/login/kitchen', [App\Http\Controllers\Auth\LoginController::class, 'showKitchenLoginForm']);
Route::get('/register/kitchen', [App\Http\Controllers\Auth\RegisterController::class, 'showKitchenRegisterForm']);

Route::get('/login/waiter', [App\Http\Controllers\Auth\LoginController::class, 'showWaiterLoginForm']);
Route::get('/register/waiter', [App\Http\Controllers\Auth\RegisterController::class, 'showWaiterRegisterForm']);



Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
Route::post('/login/owner', [App\Http\Controllers\Auth\LoginController::class, 'ownerLogin']);
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'createAdmin']);
Route::post('/register/owner', [App\Http\Controllers\Auth\RegisterController::class, 'createOwner']);

Route::post('/login/cashier', [App\Http\Controllers\Auth\LoginController::class, 'cashierLogin']);
Route::post('/register/cashier', [App\Http\Controllers\Auth\RegisterController::class, 'createCashier']);

Route::post('/login/manager', [App\Http\Controllers\Auth\LoginController::class, 'managerLogin']);
Route::post('/register/manager', [App\Http\Controllers\Auth\RegisterController::class, 'createManager']);

Route::post('/login/kitchen', [App\Http\Controllers\Auth\LoginController::class, 'kitchenLogin']);
Route::post('/register/kitchen', [App\Http\Controllers\Auth\RegisterController::class, 'createKitchen']);

Route::post('/login/waiter', [App\Http\Controllers\Auth\LoginController::class, 'waiterLogin']);
Route::post('/register/waiter', [App\Http\Controllers\Auth\RegisterController::class, 'createWaiter']);




Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/owner', 'owner');

Route::view('/cashier', 'cashier');
Route::view('/manager', 'manager');
Route::view('/waiter', 'waiter');
Route::view('/kitchen', 'kitchen');
