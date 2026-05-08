<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
   
    public function index()
    {
        //

         return Pago::with('tratamiento')->get();

    }

   
 
    public function store(Request $request)
    {
        //

        $pago = new Pago();
        $pago->tratamiento_id = $request->tratamiento_id;
        $pago->fecha = $request->fecha;
        $pago->total = $request->total;
        $pago->adelanto = $request->adelanto;
        $pago->saldo = $request->saldo;
        $pago->save();

        return response()->json($pago, 201);

    }


    public function show($id)
    {
        //

           return Pago::with('tratamiento')->findOrFail($id);

    }

  
 
    public function update(Request $request, $id)
    {
        //

        $pago = Pago::findOrFail($id);
        $pago->update($request->all());
        return response()->json($pago, 200);

    }

  
    public function destroy($id)
    {
        //

         Pago::destroy($id);
        return response()->json(null, 204);

    }
}
