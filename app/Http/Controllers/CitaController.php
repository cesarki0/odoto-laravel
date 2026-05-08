<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
   
    public function index()
    {
        //
        return Cita::with('paciente')->get();
    }

 function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
            $cita = new Cita();


            $cita->paciente_id = $request->paciente_id;
            $cita->fecha_hora = $request->fecha_hora;
            $cita->motivo = $request->motivo;
            $cita->estado = $request->estado ?? 'pendiente';

            $cita->save();
            
            return response()->json($cita, 201);


    }


    public function show($id)
    {
        //
        return Cita::with('paciente')->findOrFail($id);
    }

   
    public function update(Request $request, $id)
    {
        //

        $cita = Cita::findOrFail($id);
        $cita->update($request->all());
        return response()->json($cita, 200);
    }

   
    public function destroy($id)
    {
        //

          Cita::destroy($id);
        return response()->json(null, 204);
    }
}
