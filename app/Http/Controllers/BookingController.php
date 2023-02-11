<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

use Illuminate\Http\Request;
use Validator;

class BookingController extends BaseController
{





  public function all_bookings()
  {
  }
  public function new_booking(Request $request)
  {
    $input = $request->all();
  }
}
