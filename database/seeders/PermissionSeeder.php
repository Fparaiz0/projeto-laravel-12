<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar o array de páginas 
        $permissions = [
            'dashboard', 

            'show-profile',
            'edit-profile',
            'edit-password-profile',

            'index-user',
            'show-user',
            'create-user',
            'edit-user',
            'edit-password-user',
            'edit-roles-user',
            'destroy-user', 

            'index-user-status',
            'show-user-status',
            'create-user-status',
            'edit-user-status',
            'destroy-user-status', 

            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course', 

            'index-course-status',
            'show-course-status',
            'create-course-status',
            'edit-course-status',
            'destroy-course-status', 

            'index-course-batch',
            'show-course-batch',
            'create-course-batch',
            'edit-course-batch',
            'destroy-course-batch',

            'index-module',
            'show-module',
            'create-module',
            'edit-module',
            'destroy-module',

            'index-lesson',
            'show-lesson',
            'create-lesson',
            'edit-lesson',
            'destroy-lesson',

            'index-role',
            'show-role',
            'create-role',
            'edit-role',
            'destroy-role',
        ]; 

        foreach ($permissions as $permission){ 
            // Se não encontrar o registro, cadastra o registro no BD 
            Permission::firstOrCreate(
                // Condição
                ['name' => $permission], 

                // Valores que devem ser cadastrado 
                ['name' => $permission, 'guard_name' => 'web'] 
            );
        }
    }
}
