<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Capturar possíveis exceções durante a execução do seeder. 
        try{
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
                // Acesso Dashboard
                'dashboard',

                // Acesso Perfil
                'show-profile',
                'edit-profile',
                'edit-password-profile',

                // Acesso Cursos
                'index-course',
                'show-course',
                'create-course',
                'edit-course',
                'destroy-course',

                // Acesso Status dos Cursos
                'index-course-status',
                'show-course-status',
                'create-course-status',
                'edit-course-status',
                'destroy-course-status',

                // Acesso Turmas
                'index-course-batch',
                'show-course-batch',
                'create-course-batch',
                'edit-course-batch',
                'destroy-course-batch',

                // Acesso Usuários
                'index-user',
                'show-user',
                'create-user',
                'edit-user',
                'edit-password-user',
                'edit-roles-user',
                'destroy-user',

                // Acesso Status do Usuários
                'index-user-status',
                'show-user-status',
                'create-user-status',
                'edit-user-status',
                'destroy-user-status',

                // Acesso Módulos
                'index-module',
                'show-module',
                'create-module',
                'edit-module',
                'destroy-module',

                // Acesso Aulas
                'index-lesson',
                'show-lesson',
                'create-lesson',
                'edit-lesson',
                'destroy-lesson',

                // Acesso Papéis
                'index-role',
                'show-role',
                'create-role',
                'edit-role',
                'destroy-role',

                // Acesso Permissões do papel
                'index-role-permission',
            ]);

            /*******  Professor  *******/
            // Se não encontrar o registro, cadastra o registro no BD
            $teacher = Role::firstOrCreate(
                ['name' => 'Professor'], 
                ['name' => 'Professor'], 
            );

            // Cadastrar permissão para o papel 
            $teacher->givePermissionTo([
                // Acesso Dashboard
                'dashboard',

                // Acesso Perfil
                'show-profile',
                'edit-profile',
                'edit-password-profile',

                // Acesso Cursos
                'index-course',
                'show-course',
                'create-course',
                'edit-course',

                // Acesso Turmas
                'index-course-batch',
                'show-course-batch',
                'create-course-batch',
                'edit-course-batch',
                'destroy-course-batch',

                // Acesso Usuários
                'index-user',
                'show-user',

                // Acesso Módulos
                'index-module',
                'show-module',
                'create-module',
                'edit-module',
                'destroy-module',

                // Acesso Aulas
                'index-lesson',
                'show-lesson',
                'create-lesson',
                'edit-lesson',
                'destroy-lesson',
            ]);

            /*******  Tutor  *******/
            // Se não encontrar o registro, cadastra o registro no BD
            $tutor = Role::firstOrCreate(
                ['name' => 'Tutor'], 
                ['name' => 'Tutor'], 
            );

            // Cadastrar permissão para o papel 
            $tutor->givePermissionTo([
                // Acesso Dashboard
                'dashboard',

                // Acesso Perfil
                'show-profile',
                'edit-profile',
                'edit-password-profile',

                // Acesso Cursos
                'index-course',
                'show-course',
                'create-course',
                'edit-course',

                // Acesso Turmas
                'index-course-batch',
                'show-course-batch',
                'create-course-batch',
                'edit-course-batch',
                'destroy-course-batch',

                // Acesso Usuários
                'index-user',
                'show-user',
                'create-user', 

                // Acesso Módulos
                'index-module',
                'show-module',
                'create-module',
                'edit-module',
                'destroy-module',

                // Acesso Aulas
                'index-lesson',
                'show-lesson',
                'create-lesson',
                'edit-lesson',
                'destroy-lesson',
            ]);

            /*******  Aluno  *******/
            // Se não encontrar o registro, cadastra o registro no BD
            $student = Role::firstOrCreate(
                ['name' => 'Aluno'], 
                ['name' => 'Aluno'], 
            );  

            // Cadastrar permissão para o papel
            $student->givePermissionTo([
                // Acesso Dashboard
                'dashboard',
                
                // Acesso Perfil
                'show-profile',
                'edit-profile',
                'edit-password-profile',
            ]);
        } catch (Exception $e){
            // Salvar log
            Log::notice('Papel não cadastrado.', ['error' => $e->getMessage()]); 
        }
    }
}
