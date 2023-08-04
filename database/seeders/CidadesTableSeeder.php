<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Exemplo de dados de cidades
        $cidades = [
            ['nome' => 'São Paulo', 'estado' => 'São Paulo'],
            ['nome' => 'Rio de Janeiro', 'estado' => 'Rio de Janeiro'],
            ['nome' => 'Belo Horizonte', 'estado' => 'Minas Gerais'],
            ['nome' => 'Salvador', 'estado' => 'Bahia'],
            ['nome' => 'Porto Alegre', 'estado' => 'Rio Grande do Sul'],
        ];

        // Inserir os dados no banco de dados
        foreach ($cidades as $cidade) {
            Cidade::create($cidade);
        }
    }
}
