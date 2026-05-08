<?php

namespace App\Http\Controllers;

use App\Models\Odontograma;
use Illuminate\Http\Request;

class OdontogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         return Odontograma::with('paciente')->get();

    }

   
    public function store(Request $request)
    {
        //

         $odontograma = new Odontograma();
        $odontograma->paciente_id = $request->paciente_id;
        $odontograma->pieza = $request->pieza;
        $odontograma->estado = $request->estado ?? 'sano';
        $odontograma->observaciones = $request->observaciones;
        $odontograma->save();

        return response()->json($odontograma, 201);

    }

   
    public function show($id)
    {
        //

        return Odontograma::with('paciente')->findOrFail($id);

    }

  
    public function update(Request $request, $id)
    {
        //

           $odontograma = Odontograma::findOrFail($id);
        $odontograma->update($request->all());
        return response()->json($odontograma, 200);

    }

    public function destroy($id)
    {
        //

             Odontograma::destroy($id);
        return response()->json(null, 204);

    }
}
