<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [

        'clinic_id',
        
        'nombre',
        'apellido',
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

      public function clinic()
    {
        return $this->belongsTo(Cliente::class);
    }

       public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class);
    }

      public function pagos()
    {
        return $this->hasMany(Pago::class);
    }


    public function odontograma()
    {
        return $this->hasMany(Odontograma::class);
    }

     public function historiasClinicas()
    {
        return $this->hasMany(Historias_Clinicas::class);
    }


}
