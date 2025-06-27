<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /******* Super Admin - Tem acesso a todas as páginas *******/
        // Se não encontrar o registro, cadastra o registro no BD
        Role::firstOrCreate(
            ['name' => 'Super Admin'], 
            ['name' => 'Super Admin'], 
        );

        /*******  Admin  *******/
        // Se não encontrar o registro, cadastra o registro no BD
        $admin = Role::firstOrCreate(
            ['name' => 'Admin'], 
            ['name' => 'Admin'], 
        );

        // Cadastrar permissão para o papel 
        $admin->givePermissionTo([
            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course'
        ]);

        /*******  Professor  *******/
        // Se não encontrar o registro, cadastra o registro no BD
        $teacher = Role::firstOrCreate(
            ['name' => 'Professor'], 
            ['name' => 'Professor'], 
        );

        // Cadastrar permissão para o papel 
        $teacher->givePermissionTo([
            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course'
        ]);

        /*******  Tutor  *******/
        // Se não encontrar o registro, cadastra o registro no BD
        $tutor = Role::firstOrCreate(
            ['name' => 'Tutor'], 
            ['name' => 'Tutor'], 
        );

        // Cadastrar permissão para o papel 
        $tutor->givePermissionTo([
            'index-course',
            'show-course',
            'edit-course',
        ]);

        /*******  Aluno  *******/
        // Se não encontrar o registro, cadastra o registro no BD
        $student = Role::firstOrCreate(
            ['name' => 'Aluno'], 
            ['name' => 'Aluno'], 
        );  
    }
}
