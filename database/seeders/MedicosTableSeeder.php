<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;
use App\Models\Cidade;

class MedicosTableSeeder extends Seeder
{
    public function run()
    {
        $cidades = Cidade::all();

        $medicosData = [
            [
                'nome' => 'Dr. João da Silva',
                'especialidade' => 'Clínico Geral',
                'cidade_id' => $cidades->random()->id,
            ],
            [
                'nome' => 'Dra. Maria Souza',
                'especialidade' => 'Pediatra',
                'cidade_id' => $cidades->random()->id,
            ],
            [
                'nome' => 'Dr. Carlos Oliveira',
                'especialidade' => 'Cardiologista',
                'cidade_id' => $cidades->random()->id,
            ],
            [
                'nome' => 'Dra. Fernanda Santos',
                'especialidade' => 'Ginecologista',
                'cidade_id' => $cidades->random()->id,
            ],
            [
                'nome' => 'Dr. Roberto Almeida',
                'especialidade' => 'Ortopedista',
                'cidade_id' => $cidades->random()->id,
            ],
        ];

        foreach ($medicosData as $medicoData) {
            Medico::create($medicoData);
        }
    }
}

