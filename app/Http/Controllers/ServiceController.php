<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Resources\ServiceResource;
use App\Models\Type;
use Illuminate\Support\Facades\Validator;

class ServiceController extends BaseController
{
    public function all_services() { 
        $services = Service::all();

        // $services = Service::with('type')->get();

        //find type of service(id:4)
        // $serviceType = Service::find(3)->type;

        //find price of service(id:1)
        // $serviceTypePrice = Service::find(1)->type->price; 

        //get service by typeid
        // $servicesByTypeId = Service::where('type_id', 2)->get();

        return $this->sendResponse(ServiceResource::collection($services), "OK");

        // return Type::find(1)->services;

    }

    public function get_service_by_id($id) { 
        $service = Service::find($id);

        if (is_null($service)) {
            return $this->sendError([], "Szolgaltatas nem talalhato.");
        }

        return $this->sendResponse( new ServiceResource($service), "A szolgaltatas adatai");

    }

    public function add_new_service(Request $request) { 
        $input = $request->all();

        $validator = Validator::make($input, [
            "name" => "required",
        ]);

        if ($validator->fails()) {
            return $this->sendError( $validator->errors());
        }

        $service = Service::create($input);

        return $this->sendResponse( new ServiceResource($service), "Szolgaltatas felveve");
    }

    public function modify_service(Request $request, $id) {
        $input = $request->all();

        $validator = Validator::make( $input, [
          "name" => "required",

        ]);
    
        if ($validator->fails()) {
          return $this->sendError( $validator->errors());
        }
    
        $service = Service::find($id);
        $service->update($input);
    
        return $this->sendResponse( new ServiceResource($service), "Szolgaltatas adatok frissitve");
      }

    
    public function remove_service($id) { 
        Service::destroy($id);

        return $this->sendResponse([], "Szolgaltatas torolve");

    }
}
