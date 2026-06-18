<?php
namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    
    {


        $clinic = Cliente::create([
                'nombre' => 'Demo Clinic',
                'plan' => 'premium',
        ]);

        User::create([
            'clinic_id' => $clinic->id,
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make('123456'),
        ]);
    }
}