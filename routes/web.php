<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

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

//Route::get('/', function () {
//    $salons = \App\Models\Salon::all();
//    dd($salons);
//    return view('index', ['salons', $salons]);
//});

//admin routes
Route::prefix('admin')->name('admin.')->group(function (){
    Route::resource('/user', UserController::class);
    Route::get('/user/{id}/masters_customers', [UserController::class, 'masters_customers'])->name('user.masters_customers');
});


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

//Route::get('user/booking/{id}', [UserController::class, 'show'])->name('booking');
Route::get('city/{cityTitle}', [CityController::class, 'salonsOfCity'])->name('salonsOfCity');
Route::get('user/procedure/{procedure}', [ProcedureController::class, 'salons'])->name('salons');
Route::get('/admin/procedures/create', [ProcedureController::class, 'createProcedure'])->name('admin.procedures.create');
Route::post('/admin/procedures/', [ProcedureController::class, 'storeProcedure'])->name('admin.procedures.store');
Route::get('admin/procedures', [ProcedureController::class, 'procedures'])->name('admin.procedures');
Route::get('admin/procedures/{id}', [ProcedureController::class, 'editProcedure'])->name('admin.procedures.edit');
Route::patch('admin/procedures/{id}/update', [ProcedureController::class, 'updateProcedure'])->name('admin.procedures.update');
Route::delete('admin/procedures/{procedure}', [ProcedureController::class, 'destroyProcedure'])->name('admin.procedures.destroy');
Route::get('user/salons/{salon}', [SalonController::class, 'show'])->name('salon');

Route::get('/user/bookings', [BookingController::class, 'index'])->name('bookings');
Route::get('/user/booking/{salon_id}/{procedure_id}', [BookingController::class, 'create'])->name('booking');
Route::post('/user/booking', [BookingController::class, 'bookProcedure'])->name('store');
Route::delete('/user/booking/{id}', [BookingController::class, 'destroyBooking'])->name('destroy');
Route::get('/user/calendar', [BookingController::class, 'calendar'])->name('calendar');
Route::post('/user/savedate', [BookingController::class, 'saveDate'])->name('savedate');
Route::delete('/user/calendar/{id}', [BookingController::class, 'destroySavedDate'])->name('destroySavedDate');

Route::post('/salon/comment', [CommentController::class, 'storeComment'])->name('storeComment');








// Route::resource('/AAAAAAAAA', BookingController::class);





/*
Verb        URI                     Action  Route Name

GET         /photos                 index   photos.index
GET         /photos/create          create  photos.create
POST        /photos                 store   photos.store
GET         /photos/{photo}         show    photos.show
GET         /photos/{photo}/edit    edit    photos.edit
PUT/PATCH   /photos/{photo}         update  photos.update
DELETE      /photos/{photo}         destroy photos.destroy
*/


