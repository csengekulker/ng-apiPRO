<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Booking;
use App\Http\Resources\BookingResource;
use App\Models\Appointment;
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

    //TODO: verify if given apt_id exists and unique

    $validator = Validator::make($input, [
      "service_id" => "required",
      "type_id" => "required",
      "appointment_id" => "required"

    ]);

    if ($validator->fails()) {
      return $this->sendError($validator->errors());
    }

    $booking = Booking::create($input);

    return $this->sendResponse( new BookingResource($booking), "Foglalas rogzitve");
  }

  public function approve_booking(Request $request, $id) { 
    $booking = Booking::find($id);

    if (is_null($booking)) { 
      return $this->sendError("Nincs ilyen foglalas");
    }

    // when a booking is approved, an appointment is reserved

    // find apt on apt_id, set isOpen false

    $approved = $booking['isApproved'];

    if ($approved ) {
      return "Mar jovahagyva";
    } else { 
      $booking->update(['isApproved' => true]);

      //TODO: missing eloquent ORM
      // $apt = Appointment::find($request->appointment_id);
      // $apt->update(['isOpen' => false]);

      //call reserve_apt($apt_id)

      return $this->sendResponse( new BookingResource($booking), "foglalas jovahagyva");

    }

    return $approved;
  }

  public function modify_booking(Request $request, $id) { 
    $input = $request->all();

    $validator = Validator::make($input, [
      "service_id" => "required",
      "client_id" => "required",
      "appointment_id" => "required"
    ]);

    if ($validator->fails()) {
      return $this->sendError($validator->errors());
    }

    $booking = Booking::find($id);
    $booking->update($input);

    return $this->sendResponse( new BookingResource($booking), "Foglalas adatok modositva");

  }

  public function remove_booking($id) {
    Booking::destroy($id);

    return $this->sendResponse([], "Foglalas torolve");
  }
}
