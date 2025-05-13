<?php

namespace Database\Seeders;

use App\Models\CourseStatus;
use Exception;
use Illuminate\Database\Seeder;

class CourseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Capturar possíveis exceções durante a execução do código.
        try {
            // Se não encontrar o registro com o nome, cadastra o registro no BD
            CourseStatus::firstOrCreate(
                ['name' => 'Ativo', 'id' => 1],
                ['id' => 1, 'name' => 'Ativo'],
            );
            CourseStatus::firstOrCreate(
                ['name' => 'Inativo', 'id' => 2],
                ['id' => 2, 'name' => 'Inativo'],
            );
            CourseStatus::firstOrCreate(
                ['name' => 'Análise', 'id' => 3],
                ['id' => 3, 'name' => 'Análise'],
            );
        } catch (Exception $e) {
            //Lidar com as exceções, se necessário.
        }
    }
}
