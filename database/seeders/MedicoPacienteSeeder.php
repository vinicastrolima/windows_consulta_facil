<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;
use App\Models\Paciente;

class MedicoPacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();

        foreach ($medicos as $medico) {
            $randomPacientes = $pacientes->random(rand(1, 5));

            foreach ($randomPacientes as $paciente) {
                $medico->pacientes()->attach($paciente);
            }
        }
    }
}
