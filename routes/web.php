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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/owner', [App\Http\Controllers\OwnerController::class, 'index'])->name('owner')->middleware('owner');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/cashier', [App\Http\Controllers\CashierController::class, 'index'])->name('cashier')->middleware('cashier');
Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager')->middleware('manager');
Route::get('/waiter', [App\Http\Controllers\WaiterController::class, 'index'])->name('waiter')->middleware('waiter');
Route::get('/kitchen', [App\Http\Controllers\KitchenController::class, 'index'])->name('kitchen')->middleware('kitchen');

//register
Route::view('create_register', 'create_register');
Route::view('close_register', 'close_register');
// Route::view('closeregister', 'closeregister');
Route::post('/create_register', [App\Http\Controllers\DailyRegisterController::class, 'create']);
Route::get('dailyregister', [App\Http\Controllers\DailyRegisterController::class, 'checkRegisterOpen'])->middleware('owner');
Route::get('closeregister', [App\Http\Controllers\DailyRegisterController::class, 'checkRegister'])->middleware('owner');

//Route::post('/closed_register', [App\Http\Controllers\DailyRegisterController::class, 'closeregister'])->name('closedregister');
//billing

Route::view('billing', 'billing');

// Route::get('/dailyregister', function () {
//     return view('dailyregister');
// });

Route::get('/location', function () {
    return view('location');
});


Route::post('store-form', [App\Http\Controllers\LocationController::class, 'store']);
Route::post('select_register', [App\Http\Controllers\DailyRegisterController::class, 'passlocation']);

Route::post('/closeregister', [App\Http\Controllers\DailyRegisterController::class, 'closeregister'])->middleware('owner');


//register Session
Route::get('session', [App\Http\Controllers\RegisterSessionController::class, 'index'])->middleware('owner');

