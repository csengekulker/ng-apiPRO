<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeController;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::apiResource('products', ProductController::class)
//     ->except('index');
// });

Route::get('/clients', [ClientController::class, 'all_clients']);
Route::get('clients/{id}', [ClientController::class, 'get_client_by_id']);
Route::post('/clients', [ClientController::class, 'add_new_client']);
Route::put('/clients/{id}', [ClientController::class, 'modify_client']);
Route::delete('clients/{id}', [ClientController::class, 'remove_client']);

Route::get('/services', [ServiceController::class, 'all_services']);
Route::get('services/{id}', [ServiceController::class, 'get_service_by_id']);
Route::post('services', [ServiceController::class, 'add_new_service']);
Route::put('/services/{id}', [ServiceController::class, 'modify_service']);
Route::delete('services/{id}', [ServiceController::class, 'remove_service']);

Route::get('types', [TypeController::class, 'all_types']);
Route::get('types/{id}', [TypeController::class, 'get_type_by_id']);
Route::get('services/{id}/types', [TypeController::class, 'get_types_by_serviceid']);

Route::post('types', [TypeController::class, 'add_new_type']);
Route::put('types/{id}', [TypeController::class, 'modify_type']);
Route::delete('types/{id}', [TypeController::class, 'remove_type']);

Route::get('durations', [TypeController::class, 'get_durations']);
Route::get('prices', [TypeController::class, 'get_prices']);
Route::post('durations', [TypeController::class, 'add_duration']);
Route::post('prices', [TypeController::class, 'add_price']);

Route::get('/appointments', [AppointmentController::class, 'all_apts']);
Route::get('/appointments/open', [AppointmentController::class, 'all_open_apts']);
Route::get('appointments/{id}', [AppointmentController::class, 'get_apt_by_id']);
Route::post('appointments/add-apt', [AppointmentController::class, 'new_apt']);
Route::post('appointments/fill-calendar', [AppointmentController::class, 'fill_calendar']);
Route::put('/appointments/reserve/{id}', [AppointmentController::class, 'reserve_apt']);
Route::put('/appointments/{id}', [AppointmentController::class, 'modify_apt']);
Route::delete('appointments/{id}', [AppointmentController::class, 'remove_apt']);

Route::get('/bookings', [BookingController::class, 'all_bookings']);
Route::get('bookings/{id}', [BookingController::class, 'get_booking_by_id']);
Route::post('bookings', [BookingController::class, 'add_new_booking']);
Route::put('/bookings/approve/{id}', [BookingController::class, 'approve_booking']);
Route::put('bookings/{id}', [BookingController::class, 'modify_booking']);
Route::delete('bookings/{id}', [BookingController::class, 'remove_booking']);

Route::post('/signup', [AuthController::class, 'register']);
Route::post('/signin', [AuthController::class, 'login']);
