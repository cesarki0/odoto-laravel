<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return Paciente::all();

    }

    
    public function store(Request $request)
    {
        //

        $paciente = new Paciente();
        $paciente->nombre = $request->nombre;
        $paciente->direccion = $request->direccion;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->celular = $request->celular;
        
        $paciente->tratamiento_medico = $request->tratamiento_medico ?? false;
        $paciente->paciente_cardiaco = $request->paciente_cardiaco ?? false;
        $paciente->antecedentes_familiares = $request->antecedentes_familiares;
        $paciente->medicacion = $request->medicacion ?? false;
        $paciente->hemorragia = $request->hemorragia ?? false;
        $paciente->intervencion_quirurgica = $request->intervencion_quirurgica ?? false;
        $paciente->alergias = $request->alergias ?? false;
        $paciente->diabetes = $request->diabetes;
        $paciente->intolerancias = $request->intolerancias;
        $paciente->gestante = $request->gestante;
        $paciente->presion_arterial = $request->presion_arterial;
        $paciente->habitos = $request->habitos;
        $paciente->save();

        return response()->json($paciente, 201);


    }

    
    public function show($id)
    {
        //

         return Paciente::findOrFail($id);

    }

   
    public function update(Request $request, $id)
    {
        //

        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());
        return response()->json($paciente, 200);
    }

   
    public function edit(Request $request, Paciente $paciente)
    {
        //
    }

   
    public function destroy($id)
    {
        //
        Paciente::destroy($id);
        return response()->json(null, 204);

    }
}
