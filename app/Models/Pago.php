<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;


     protected $fillable = [
        'tratamiento_id',
        'paciente_id',
        'fecha',
        'total',
        'adelanto',
        'saldo',
    ];

    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class);
    }

      public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

}
