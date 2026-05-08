<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'fecha_nacimiento',
        'celular',
        'tratamiento_medico',
        'paciente_cardiaco',
        'antecedentes_familiares',
        'medicacion',
        'hemorragia',
        'intervencion_quirurgica',
        'alergias',
        'diabetes',
        'intolerancias',
        'gestante',
        'presion_arterial',
        'habitos'
    ];
    

    // Relaciones
    
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class);
    }

    public function odontograma()
    {
        return $this->hasMany(Odontograma::class);
    }


}
