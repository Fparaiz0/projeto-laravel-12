<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //Seeds que devem rodar em produção.
        if (App::environment() === 'production') {
            $this->call([
                UserSeeder::class,
                CourseStatusSeeder::class,
                StatusSeeder::class,
            ]);
        }

        //Seeds que devem rodar em qualquer ambiente.
        if (App::environment() !== 'production') {
            $this->call([
                UserSeeder::class,
                CourseSeeder::class,
                CourseBatchSeeder::class,
                CourseStatusSeeder::class,
                LessonSeeder::class,
                ModuleSeeder::class,
                StatusSeeder::class,
            ]);
        }
    }
}
