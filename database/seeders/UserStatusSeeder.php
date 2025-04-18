<?php

namespace Database\Seeders;

use App\Models\UserStatus;
use Exception;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Capturar possíveis exceções durante a execução do código.
        try {
            //Se não encontrar o registro com o nome, cadastra o registro no BD   
            UserStatus::firstOrCreate(
                ['name' => 'Ativo', 'id' => 1],
                ['id' => 1, 'name' => 'Ativo'],
            );
            UserStatus::firstOrCreate(
                ['name' => 'Inativo', 'id' => 2],
                ['id' => 2, 'name' => 'Inativo'],
            );
            UserStatus::firstOrCreate(
                ['name' => 'Aguardando Confirmação', 'id' => 3],
                ['id' => 3, 'name' => 'Aguardando Confirmação'],
            );
            UserStatus::firstOrCreate(
                ['name' => 'Spam', 'id' => 4],
                ['id' => 4, 'name' => 'Spam'],
            );
        } catch (Exception $e) {
            //Lidar com as exceções, se necessário.
        }
    }
}
