<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Exception;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Capturar possíveis exceções durante a execução do código.
        try {
            // Se não encontrar o registro com o nome, cadastra o registro no BD
            Lesson::firstOrCreate(
                ['name' => 'Apresentação do Curso', 'id' => 1],
                ['id' => 1, 'name' => 'Apresentação do Curso'],
            );
            Lesson::firstOrCreate(
                ['name' => 'Preparar o Ambiente de Desenvolvimento', 'id' => 2],
                ['id' => 2, 'name' => 'Preparar o Ambiente de Desenvolvimento'],
            );
            Lesson::firstOrCreate(
                ['name' => 'Criar a Base do Projeto', 'id' => 3],
                ['id' => 3, 'name' => 'Criar a Base do Projeto'],
            );
        } catch (Exception $e) {
            //Lidar com as exceções, se necessário. 
        }
    }
}
