<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Booking;
use App\Http\Resources\BookingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends BaseController
{

  public function all_bookings() { 
    $bookings = Booking::all();

    return $this->sendResponse(BookingResource::collection($bookings), "OK");
  }

  public function get_booking_by_id($id) { 
    $booking = Booking::find($id);

    if ( is_null($booking)) {
      return $this->sendError("Foglalas nem talalhato.");
    }

    return $this->sendResponse( new BookingResource($booking), "A foglalas adatai");
  }

  public function add_new_booking(Request $request)  { 
    $input = $request->all();

    $validator = Validator::make($input, [
      "service_id" => "required",
      "client_id" => "required",
      "appointment_id" => "required"

    ]);

    if ($validator->fails()) {
      return $this->sendError($validator->errors());
    }

    $booking = Booking::create($input);

    return $this->sendResponse( new BookingResource($booking), "Foglalas rogzitve");
  }

  public function approve_booking(Request $request, $id) { 
    $input = $request->isApproved;

    // if ($input == 'true') {
    //   return $this->sendResponse([], "Mar jovahagyta");
    // } else {
    //   $approved = Booking::find($id)->update($input, "true");
    // }

    return $input;
  }

  public function modify_booking(Request $request, $id) { }

  public function remove_booking($id) {
    Booking::destroy($id);

    return $this->sendResponse([], "Foglalas torolve");
  }
}
