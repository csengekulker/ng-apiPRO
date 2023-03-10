<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends BaseController
{
    public function all_apts() { 
        $apts = Appointment::all();

        return $this->sendResponse(AppointmentResource::collection($apts), "OK");
    }

    public function all_open_apts() { 
        $apts = Appointment::where('isOpen', 1)->get();

        return $this->sendResponse(AppointmentResource::collection($apts), "OK");
    }

    public function get_apt_by_id($id) { 
        $apt = Appointment::find($id);

        if (is_null($apt)) {
            return $this->sendError("Idopont nem talalhato.");
        }

        return $this->sendResponse( new AppointmentResource($apt), "Idopont reszletek");
    }

    public function new_apt(Request $request) { 
        $input = $request->all();

        $validator = Validator::make( $input, [
            'date' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $apt = Appointment::create($input);

        return $this->sendResponse( new AppointmentResource($apt), "Idopont rogzitve.");

    }

    public function reserve_apt($id) { 
        $apt = Appointment::find($id);

        if (is_null($apt)) {
            return $this->sendError("Idopont nem talalhato.");
        }

        $apt->update(['isOpen' => false]);

        return $this->sendResponse( new AppointmentResource($apt), "Idopont lefoglalva.");
    }

    public function modify_apt(Request $request, $id) { 
        $input = $request->all();

        $validator = Validator::make( $input, [
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'isOpen' => 'required'
        ]);
    
        if ($validator->fails()) {
          return $this->sendError( $validator->errors());
        }
    
        $apt = Appointment::find($id);
        $apt->update($input);
    
        return $this->sendResponse( new AppointmentResource($apt), "Idopont adatok frissitve");
    }

    public function remove_apt($id) { 
        Appointment::destroy($id);

        return $this->sendResponse([], "Idopont torolve");
    }
}
