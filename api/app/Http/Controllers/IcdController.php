<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icd;
use App\Http\Builder\ResponseBuilder;
use App\Http\Resources\IcdListResources;

class IcdController extends Controller
{
    public function show(Request $req)
    {
        if($req->keyword){
            $icd = Icd::where('name', 'ilike', '%'.$req->keyword.'%')->orWhere('code', 'ilike', '%'.$req->keyword.'%')->get();
            
            if($icd->count() == 0){
                return response()->json(ResponseBuilder::build('404', false, 'Data not found'), 404);        
            }
            
            return response()->json(ResponseBuilder::build('200', true, 'Ok', IcdListResources::collection($icd)), 201);
        }

        return response()->json(ResponseBuilder::build('404', false, 'Data not found'), 404);
    }
}
