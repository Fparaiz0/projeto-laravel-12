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
            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course'
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
