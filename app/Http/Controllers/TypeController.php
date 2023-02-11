<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Http\Resources\DurationResource;
use App\Http\Resources\PriceResource;
use App\Models\Type;
use App\Http\Resources\TypeResource;
use App\Models\Duration;
use App\Models\Price;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends BaseController
{
    public function all_types() { 

        $types = Type::all();

        return $this->sendResponse(TypeResource::collection($types), "OK");
    }

    public function get_types_by_serviceid($serviceId) { 
        // $serviceId = 2;
        // $types = Service::find($serviceId)->type;
        // $typeDuration = Type::find(1)->price;
        // return $types;
    }


    public function add_new_type(Request $request) { 
        $input = $request->all();

        $validator = Validator::make($input, [
            "type" => "required",
            "duration_id" => "required",
            "price_id" => "required"
        ]);

        if ($validator->fails()) {
            return $this->sendError( $validator->errors());
        }

        $type = Type::create($input);

        return $this->sendResponse( new TypeResource($type), "Tipus felveve");
    }

    public function modify_type(Request $request, $id) { 
        $input = $request->all();

        $validator = Validator::make( $input, [
          "name" => "required",
          "duration_id" => "required",
          "price_id" => "required"

        ]);
    
        if ($validator->fails()) {
          return $this->sendError( $validator->errors());
        }
    
        $type = Type::find($id);
        $type->update($input);
    
        return $this->sendResponse(new TypeResource($type), "Szolgaltatas adatok frissitve");
    }

    public function remove_type($id) { 
        Type::destroy($id);

        return $this->sendResponse([], "Tipus torolve");
    }

    // duration, price endpoints

    public function add_duration(Request $request) { 
        $duration = Duration::create($request->all());

        return $this->sendResponse( new DurationResource($duration), "Idotartam felveve");
    }

    public function add_price(Request $request) { 
        $price = Price::create($request->all());

        return $this->sendResponse( new PriceResource($price), "Ar felveve");
    }

    public function get_durations() { 
        $durations = Duration::all();

        return $this->sendResponse(DurationResource::collection($durations), "OK");
    }

    public function get_prices() { 
        $prices = Price::all();

        return $this->sendResponse(PriceResource::collection($prices), "OK");
    }
} 
