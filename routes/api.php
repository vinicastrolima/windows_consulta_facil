<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoPacienteController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Login
Route::post('login', [AuthController::class, 'login']);

//Rotas Públicas
Route::get('medicos', [MedicoController::class, 'index']);
Route::get('cidades', [CidadeController::class, 'index']);
Route::get('cidades/{id_cidade}/medicos', [MedicoController::class, 'medicosPorCidade']);

//Rotas Privadas
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('medicos/{id_medico}/pacientes', [PacienteController::class, 'index']);
    Route::post('medicos/{id_medico}/pacientes', [MedicoController::class, 'vincularPaciente']);
    Route::post('medicos', [MedicoController::class, 'store']);
    Route::post('pacientes', [PacienteController::class, 'store']);
    Route::put('pacientes/{id}', [PacienteController::class, 'update']);
    Route::get('users', [AuthController::class, 'login']);
});



