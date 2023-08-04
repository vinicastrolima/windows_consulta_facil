<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Medico;



class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_medico)
    {
        $medico = Medico::findOrFail($id_medico);
        $pacientes = $medico->pacientes;

        return response()->json($pacientes);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:pacientes,cpf',
            'celular' => 'required|string|max:20',
        ]);

        $paciente = Paciente::create($data);

        return response()->json(['data' => $paciente], 201);
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
        $data = request()->validate([
            'nome' => 'sometimes|string|max:100',
            'celular' => 'sometimes|string|max:20',
        ]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($data);

        return response()->json(['paciente' => $paciente]);
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
