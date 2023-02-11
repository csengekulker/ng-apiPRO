<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Appointment;
use App\Http\Resources\AppointmentResource;
use Illuminate\Http\Request;
use Validator;

class BookingController extends BaseController
{

  public function all_bookings() { }

  public function get_booking_by_id($id) { 
    $appointment = Appointment::find($id);

    if ( is_null($appointment)) {
      return $this->sendError("Vendeg nem talalhato.");
    }

    return $this->sendResponse( new AppointmentResource($appointment), "A foglalas adatai");
  }

  public function add_new_booking(Request $request)  { }

  public function approve_booking() { }

  public function modify_booking(Request $request, $id) { }

  public function remove_booking($id) {
    Appointment::destroy($id);

    return $this->sendResponse([], "Foglalas torolve");
  }
}
