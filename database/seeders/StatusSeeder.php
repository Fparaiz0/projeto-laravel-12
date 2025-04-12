<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Se não encontrar o registro com o nome, cadastra o registro no BD
        Status::firstOrCreate(
            ['name' => 'Ativo', 'id' => 1],
            ['id' => 1, 'name' => 'Ativo'],
        );
        Status::firstOrCreate(
            ['name' => 'Inativo', 'id' => 2],
            ['id' => 2, 'name' => 'Inativo'],
        );
        Status::firstOrCreate(
            ['name' => 'Aguardando Confirmação', 'id' => 3],
            ['id' => 3, 'name' => 'Aguardando Confirmação'],
        );
        Status::firstOrCreate(
            ['name' => 'Spam', 'id' => 4],
            ['id' => 4, 'name' => 'Spam'],
        );
    }
}
