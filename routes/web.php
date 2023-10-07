<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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


Route::get('dailyregister', [App\Http\Controllers\DailyRegisterController::class, 'checkRegisterOpen'])->middleware('owner');
Route::get('closeregister', [App\Http\Controllers\DailyRegisterController::class, 'checkRegister'])->middleware('owner');

//Route::post('/closed_register', [App\Http\Controllers\DailyRegisterController::class, 'closeregister'])->name('closedregister');
//billing

// Route::view('billing', 'billing');

// Route::get('/dailyregister', function () {
//     return view('dailyregister');
// });

Route::get('/location', function () {
    return view('location.location');
});


Route::post('store-form', [App\Http\Controllers\LocationController::class, 'store']);
Route::post('select_register', [App\Http\Controllers\DailyRegisterController::class, 'passlocation']);
Route::post('/storeRegister', [App\Http\Controllers\DailyRegisterController::class, 'storeregister'])->name('storeRegister');

Route::post('/closeregister', [App\Http\Controllers\DailyRegisterController::class, 'closeregister'])->middleware('owner');


//register Session
 Route::get('session', [App\Http\Controllers\RegisterSessionController::class, 'index'])->middleware('owner');
//  Route::get('index', [App\Http\Controllers\RegisterSessionController::class, 'fetchSessions'])->middleware('owner');

// Route::post('session', [App\Http\Controllers\RegisterSessionController::class, 'index'])->middleware('owner');
// Route::get('/fetch-sessions', [App\Http\Controllers\RegisterSessionController::class, 'fetchSessions'])->middleware('owner');



//floor setting
Route::get('add_floor', [App\Http\Controllers\FloorSettingController::class, 'index'])->middleware('owner');
Route::post('add_floor', [App\Http\Controllers\FloorSettingController::class, 'add_floor'])->middleware('owner');

Route::get('billing', [App\Http\Controllers\FloorSettingController::class, 'show_table'])->middleware('owner');


//customer
// Route::view('customers', 'customers.index');
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index']);
// Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/create-customer', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}/edit', [App\Http\Controllers\CustomerController::class,'edit'])->name('customers.edit');
Route::put('/customers/{id}', [App\Http\Controllers\CustomerController::class,'update'])->name('customers.update');
// Route::put('/customers/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
// Route::get('/customers/{id}', [App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
Route::put('/update', [App\Http\Controllers\CustomerController::class,'update'])->name('update');
// Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
//billing


// Route::get('categories/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->middleware('owner');


//ORDER
// Route::view('orders', 'orders.index');
Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index1']);


//ITEM
// Route::view('items', 'items.index');
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index']);
Route::post('/create-item', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
Route::get('/items/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [App\Http\Controllers\ItemController::class,'update'])->name('items.update');
Route::put('/items/{id}/update-image', [App\Http\Controllers\ItemController::class,'updateImage'])->name('items.updateImage');


//CATEGORY
// Route::view('items', 'items.index');
Route::get('categories', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('owner');
Route::post('/create-category', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [App\Http\Controllers\CategoryController::class,'catupdate'])->name('categories.update');
Route::put('/categories/{id}/update-image', [App\Http\Controllers\CategoryController::class,'updateImage'])->name('categories.updateImage');

Route::view('select-item', 'catalogue.categories.select-items');
Route::get('/show-items/{id}', [App\Http\Controllers\CategoryController::class, 'showitems'])->name('categories.items');
//Route::post('/update-items/{id}', [App\Http\Controllers\CategoryController::class, 'updateItems'])->name('updateItems');
//Route::post('/update-items', [App\Http\Controllers\CategoryController::class, 'updateItems'])->name('updateItems');

Route::post('/updateitems/{catid}', [App\Http\Controllers\CategoryController::class, 'updateItems'])->name('updateItems');
//Route::post('/associate-categories/{id}', [App\Http\Controllers\CategoryTimingController::class,'associateCategories'])->name('associate.categories');

//MODIFIER-GROUP
//Route::view('modifier-groups', 'modifier-group.index');
Route::get('/modifiergroups', [App\Http\Controllers\ModifierGroupsController::class, 'index']);
Route::post('/create-modifier-group', [App\Http\Controllers\ModifierGroupsController::class, 'store'])->name('modifiergroups.store');
Route::get('/modifiergroups/edit/{id}', [App\Http\Controllers\ModifierGroupsController::class, 'edit'])->name('modifiergroups.edit');
Route::put('/modifiergroups/{id}', [App\Http\Controllers\ModifierGroupsController::class,'update'])->name('modifiergroups.update');



//category-timing
Route::get('/category-timing', [App\Http\Controllers\CategoryTimingController::class, 'index'])->middleware('owner');
Route::post('/category-timing', [App\Http\Controllers\CategoryTimingController::class, 'addCategoryTiming'])->middleware('owner');
Route::get('/category-timing/edit/{id}', [App\Http\Controllers\CategoryTimingController::class, 'edit'])->name('category-timing.edit');
Route::put('/category-timing/{id}', [App\Http\Controllers\CategoryTimingController::class,'update'])->name('category-timing.update');
Route::get('/category-timing/select_category/{id}', [App\Http\Controllers\CategoryTimingController::class, 'select_category'])->name('category-timing.select_category');
Route::post('/associate-categories/{id}', [App\Http\Controllers\CategoryTimingController::class,'associateCategories'])->name('associate.categories');

Route::get('/get-categoryid/{categoryId}', [App\Http\Controllers\OrderController::class, 'getitems']);

//discount
Route::get('/discounts', [App\Http\Controllers\DiscountController::class, 'index']);
Route::post('/discounts', [App\Http\Controllers\DiscountController::class, 'add_discount']);



//Taxes
// Route::view('taxes', 'catalogue.taxes.index');
Route::get('/taxes', [App\Http\Controllers\TaxController::class, 'index']);
Route::post('/create-taxes', [App\Http\Controllers\TaxController::class, 'store'])->name('taxes.store');
Route::get('/taxes/edit/{id}', [App\Http\Controllers\TaxController::class, 'edit'])->name('taxes.edit');
Route::put('/taxes/{id}', [App\Http\Controllers\TaxController::class,'update'])->name('taxes.update');

//charges
Route::get('/charges', [App\Http\Controllers\ChargeController::class, 'index']);
Route::post('/create-charge', [App\Http\Controllers\ChargeController::class, 'store'])->name('catalogue.store');
Route::get('/charges/edit/{id}', [App\Http\Controllers\ChargeController::class,'edit'])->name('charge.edit');
Route::put('/charges/{id}', [App\Http\Controllers\ChargeController::class,'update'])->name('charge.update');
Route::get('/charges/select_items/{id}', [App\Http\Controllers\ChargeController::class, 'select_items'])->name('charge.select_items');
Route::post('/restrict-items/{id}', [App\Http\Controllers\ChargeController::class,'restrictItems'])->name('restrict.items');


//company-admin
Route::view('settings', 'company-admin.settings');
Route::view('user-roles', 'company-admin.user-roles');
Route::view('employees', 'company-admin.employees');
Route::view('locations', 'company-admin.locations');
Route::view('brands', 'company-admin.brands');
Route::view('print_templates', 'company-admin.print_templates');
Route::view('integrations', 'company-admin.integrations');

