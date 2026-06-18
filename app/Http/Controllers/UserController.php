<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {

        $user = auth()->user();
     //   dd($user); // 👈 aquí detienes y ves qué devuelve
        
       //  return User::all();
        return User::with('clinic')
                    ->where('clinic_id', $user->clinic_id)
                    ->get();
    }

    public function store(Request $request)
    {
        //
       // $request->validate([
         //   'name' => 'required|string|max:255',
           // 'email' => 'required|string|email|unique:users',
            //'password' => 'required|string|min:6',
            //'clinic_id' => 'required|exists:clinics,id',
            //'roles' => 'array' // lista de roles
       // ]);
  
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'clinic_id' => $request->clinic_id,
        ]);

        if ($request->has('roles')) {
            $user->roles()->sync($request->roles);
        }

        return response()->json($user->load('roles'), 201);
    }


    public function show($id)
    {
        //
       
        return User::with('clinic')->findOrFail($id);
      
    }

  

    public function update(Request $request, $id)
    {
        //
         $user = User::findOrFail($id);

          // Actualiza solo los campos básicos

        $user->update($request->only(['name', 'email', 'clinic_id']));

         // Si viene la contraseña en la request, la actualiza
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        return response()->json($user);
    }

    public function destroy($id)
    {
        //
           User::destroy($id);
        return response()->json(null, 204);
    }
}
