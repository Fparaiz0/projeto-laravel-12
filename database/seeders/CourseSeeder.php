<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Se não encontrar o registro com o nome, cadastra o registro no BD
        Course::firstOrCreate(
            ['name' => 'Curso de Laravel 10', 'id' => 1],
            ['id' => 1, 'name' => 'Curso de Laravel 10'],
        );
        Course::firstOrCreate(
            ['name' => 'Curso de Laravel 11', 'id' => 2],
            ['id' => 2, 'name' => 'Curso de Laravel 11'],
        );
        Course::firstOrCreate(
            ['name' => 'Curso de Laravel 12', 'id' => 3],
            ['id' => 3, 'name' => 'Curso de Laravel 12'],
        );
    }
}
