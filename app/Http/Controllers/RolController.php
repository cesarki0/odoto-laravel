<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
  
    public function index()
    {
        //
          return Rol::all();
    }


    public function store(Request $request)
    {
        //
         $rol = Rol::create($request->only(['nombre']));
        return response()->json($rol, 201);
    }


    public function show($id)
    {
        //
        return Rol::findOrFail($id);
    }

 
    public function update(Request $request, $id)
    {
        //
        $rol = Rol::findOrFail($id);
        $rol->update($request->only(['nombre']));
        return response()->json($rol);
    }

  
    public function destroy($id)
    {
        //

           $rol = Rol::findOrFail($id);
        $rol->delete();
        return response()->json(null, 204);
    }
}
