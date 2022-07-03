<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\IcdRepository;
use App\Http\Builder\ResponseBuilder;
use App\Http\Resources\IcdListResources;

class IcdController extends Controller
{
    public function show(Request $req, IcdRepository $icd)
    {
        if($req->keyword){
            $data = $icd->search($req->keyword);                        
            return response()->json(ResponseBuilder::build('200', true, 'Ok', IcdListResources::collection($data)), 201);
        }

        return response()->json(ResponseBuilder::build('404', false, 'Data not found'), 404);
    }
}
