<?php

namespace App\Http\Controllers;

use App\Models\client;
use http\Env\Response;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {

        $clients=client::all();

        return Response()->json([$clients], \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $client = new client();
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'company_name' => ['required', 'min:1', 'string', 'max:200'],
            'number_phone' => ['required', 'string','max:30']

        ]);
        if ($validator->fails())
            return response()->json($validator->errors()->all());

        $client->name=$request->input('name');
        $client->company_name=$request->input('company_name');
        $client->number_phone=$request->input('number_phone');
        $client->save();
    }


    public function show($id)
    {
        $client=client::find($id);
        return Response()->json([$client], \Symfony\Component\HttpFoundation\Response::HTTP_OK);

    }


    public function update( Request $request, $id)
    {
        $client=client::find($id);
        $validator = Validator::make($request->all(), [
            'name' => [ 'nullable','string', 'max:100'],
            'company_name' => [ 'min:1', 'string', 'max:200'],
            'number_phone' => [ 'string','max:30']
        ]);
        if ($validator->fails())
            return response()->json($validator->errors()->all());
            $client->name =$request->input('name');
       $client->company_name=$request->input('company_name');
        $client->number_phone=$request-> input('number_phone');
    $client->update();
        return Response()->json($client);
    }
    public function destroy($id)
    {
        $clinet=client::find($id);
        $clinet->delete();
    }
}
