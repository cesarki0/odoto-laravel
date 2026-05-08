<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

     protected $fillable = [
        'paciente_id',
        'descripcion',
        'pieza',
        'costo',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

}
