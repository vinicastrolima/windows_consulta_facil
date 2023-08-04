<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Cidade;



class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();

        return response()->json(['medicos' => $medicos], 201);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'nome' => 'required|string|max:100',
            'especialidade' => 'required|string|max:100',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        $medico = Medico::create($data);

        return response()->json(['medico' => $medico]);
    }

    //Teste de envio


    public function medicosPorCidade($idCidade)
    {
        $cidade = Cidade::findOrFail($idCidade);
        $medicos = $cidade->medicos;

        return response()->json(['medicos' => $medicos]);
    }

    public function vincularPaciente($idMedico)
    {
        $data = request()->validate([
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
        ]);

        $medico = Medico::find($idMedico);
        if (!$medico) {
            return response()->json(['message' => 'Médico não encontrado'], 404);
        }

        $paciente = Paciente::find($data['paciente_id']);
        if (!$paciente) {
            return response()->json(['message' => 'Paciente não encontrado'], 404);
        }

        $medico->pacientes()->attach($data['paciente_id']);

        return response()->json(['medico' => $medico, 'paciente' => $paciente],200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
