<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacientesTableSeeder extends Seeder
{
    public function run()
    {
        $pacientesData = [
            [
                'nome' => 'Maria da Silva',
                'cpf' => '111.222.333-44',
                'celular' => '(11) 98765-4321',
            ],
            [
                'nome' => 'José Oliveira',
                'cpf' => '555.666.777-88',
                'celular' => '(21) 99999-8888',
            ],
            [
                'nome' => 'Ana Souza',
                'cpf' => '999.888.777-66',
                'celular' => '(31) 98765-4321',
            ],
            [
                'nome' => 'Pedro Santos',
                'cpf' => '444.555.666-77',
                'celular' => '(41) 99999-8888',
            ],
            [
                'nome' => 'Luciana Almeida',
                'cpf' => '777.888.999-00',
                'celular' => '(51) 98765-4321',
            ],
        ];

        foreach ($pacientesData as $pacienteData) {
            Paciente::create($pacienteData);
        }
    }
}

