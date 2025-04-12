<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Se não encontrar o registro com o nome, cadastra o registro no BD
        Module::firstOrCreate(
            ['name' => 'Introdução ao Laravel', 'id' => 1],
            ['id' => 1, 'name' => 'Introdução ao Laravel'],
        );
        Module::firstOrCreate(
            ['name' => 'Criar Sistema de Login', 'id' => 2],
            ['id' => 2, 'name' => 'Criar Sistema de Login'],
        );
        Module::firstOrCreate(
            ['name' => 'Integrar o Layout', 'id' => 3],
            ['id' => 3, 'name' => 'Integrar o Layout'],
        );
    }
}
