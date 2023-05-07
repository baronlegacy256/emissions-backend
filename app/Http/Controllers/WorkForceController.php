<?php

namespace App\Http\Controllers;

use App\Models\WorkForce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WorkForceController extends Controller
{

    public function index()
    {
        $transport = WorkForce::all();
        if ($transport->count() > 0) {
            return response()->json(['status' => 200, 'data' => $transport], 200);
        } else {
            return response()->json(['status' => 404, 'data' => 'no values found'], 404);
        };
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'number' => 'required',
            'daily' => 'required',
            'monthly' => 'required',
            'quarterly' => 'required',
            'annual' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->messages()], 422);
        } else {
            $data = WorkForce::create([
                'company_id' => $request->id,
                'daily' => $request->number,
                'numbr' => $request->daily,
                'monthly' => $request->monthly,
                'quarterly' => $request->quarterly,
                'annual' => $request->annual,
            ]);
            if ($data) {
                return response()->json([
                    'status' => 200,
                    'message' => 'data inserted sucessfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'something went wrong'
                ], 500);
            }
        }
    }
}
