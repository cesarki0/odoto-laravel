<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = ['nombre', 'plan'];

    public function users()
    {
        return $this->hasMany(User::class, 'clinic_id');
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }
    
}
