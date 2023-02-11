<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Resources\ServiceResource;

class ServiceController extends BaseController
{
    public function all_services() { 
        $services = Service::all();

        return $this->sendResponse(ServiceResource::collection($services), "OK");

    }

    public function get_service_by_id($id) { 
        $service = Service::find($id);

        if (is_null($service)) {
            return $this->sendError([], "Szolgaltatas nem talalhato.");
        }

        return $this->sendResponse( new ServiceResource($service), "A szolgaltatas adatai");

    }

    public function add_new_service(Request $request) { }

    public function modify_service(Request $request, $id) { }

    public function remove_service($id) { 
        Service::destroy($id);

        return $this->sendResponse([], "Szolgaltatas torolve");

    }
}
