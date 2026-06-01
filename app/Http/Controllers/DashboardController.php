<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Pago;
use App\Models\Tratamiento;

class DashboardController extends Controller
{
  
    public function index()
    {
        //
        $pacientes = Paciente::count();
        $citasHoy = Cita::whereDate('fecha_hora', now()->toDateString())->count();
        $tratamientos = Tratamiento::count();

        $ingresos = Pago::sum('adelanto');
        $saldos   = Pago::sum('saldo');

        $citasPorDia = Cita::selectRaw('DATE(fecha_hora) as dia, COUNT(*) as total')
            ->groupBy('dia')
            ->orderBy('dia')
            ->get();

           return response()->json([
            'pacientes' => $pacientes,
            'citasHoy' => $citasHoy,
            'tratamientos' => $tratamientos,
            'ingresos' => $ingresos,
            'saldos' => $saldos,
            'citasPorDia' => $citasPorDia ?? [],
        ]);
    }


}
