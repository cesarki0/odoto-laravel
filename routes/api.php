<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OdontogramaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\TratamientoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});


//login
Route::post('/login', [AuthController::class, 'login'])->middleware('cors');
//Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');



//Route::get('/pacientes/test', [PacienteController::class, 'test']);
Route::apiResource('pacientes', PacienteController::class);
Route::apiResource('citas', CitaController::class);
Route::apiResource('tratamientos', TratamientoController::class);
Route::apiResource('pagos', PagoController::class);
Route::apiResource('odontogramas', OdontogramaController::class);

//pacientes con citas
Route::get('/pacientes/{id}/citas', [PacienteController::class, 'citas']);

//dashboard

Route::get('/dashboard', [DashboardController::class, 'index']);


