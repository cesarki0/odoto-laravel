<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
  
    public function index()
    {
        //
           return Tratamiento::with('paciente', 'pagos')->get();
    }

   

    public function store(Request $request)
    {
        //

         $tratamiento = new Tratamiento();
        $tratamiento->paciente_id = $request->paciente_id;
        $tratamiento->descripcion = $request->descripcion;
        $tratamiento->pieza = $request->pieza;
        $tratamiento->costo = $request->costo;
        $tratamiento->save();

        return response()->json($tratamiento, 201);

    }

  
    public function show($id)
    {
        //

        return Tratamiento::with('paciente','pagos')->findOrFail($id);

    }

  

   
    public function update(Request $request, $id)
    {
        //

          $tratamiento = Tratamiento::findOrFail($id);
        $tratamiento->update($request->all());
        return response()->json($tratamiento, 200);

    }

   
    public function destroy($id)
    {
        //

         Tratamiento::destroy($id);
        return response()->json(null, 204);

    }
}
