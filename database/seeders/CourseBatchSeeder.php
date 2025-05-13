<?php

namespace Database\Seeders;

use App\Models\CourseBatch;
use Exception;
use Illuminate\Database\Seeder;

class CourseBatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Capturar possíveis exceções durante a execução do seeder. 
        try {
            // Se não encontrar o registro com o nome, cadastra o registro no BD
            CourseBatch::firstOrCreate(
                ['name' => 'Turma 1', 'id' => 1],
                ['id' => 1, 'name' => 'Turma 1', 'course_id' => 1],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            CourseBatch::firstOrCreate(
                ['name' => 'Turma 2', 'id' => 2],
                ['id' => 2, 'name' => 'Turma 2', 'course_id' => 1],
            );

            // Se não encontrar o registro com o nome, cadastra o registro no BD
            CourseBatch::firstOrCreate(
                ['name' => 'Turma 3', 'id' => 3],
                ['id' => 3, 'name' => 'Turma 3', 'course_id' => 1],
            );
        } catch (Exception $e) {
            // Lidar com a exceção
        }
    }
}
