<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Capturar possíveis exceções durante a execução do seeder. 
        try {
            // Criar o array de páginas
            $permissions = [
                
                ['title'=> 'Dashboard', 'name' => 'dashboard'],
                
                ['title'=> 'Listar os cursos', 'name' => 'index-course'],
                ['title'=> 'Visualizar o curso', 'name' => 'show-course'],
                ['title'=> 'Cadastrar o curso', 'name' => 'create-course'],
                ['title'=> 'Editar o curso', 'name' => 'edit-course'],
                ['title'=> 'Apagar o curso', 'name' => 'destroy-course'],

                ['title'=> 'Listar as turmas', 'name' => 'index-course-batch'],
                ['title'=> 'Visualizar a turma', 'name' => 'show-course-batch'],
                ['title'=> 'Cadastrar a turma', 'name' => 'create-course-batch'],
                ['title'=> 'Editar a turma', 'name' => 'edit-course-batch'],
                ['title'=> 'Apagar a turma', 'name' => 'destroy-course-batch'],
                
                ['title'=> 'Listar os módulos', 'name' => 'index-module'],
                ['title'=> 'Visualizar o módulo', 'name' => 'show-module'],
                ['title'=> 'Cadastrar o módulo', 'name' => 'create-module'],
                ['title'=> 'Editar o módulo', 'name' => 'edit-module'],
                ['title'=> 'Apagar o módulo', 'name' => 'destroy-module'],
                
                ['title'=> 'Listar as aulas', 'name' => 'index-lesson'],
                ['title'=> 'Visualizar a aula', 'name' => 'show-lesson'],
                ['title'=> 'Cadastrar a aula', 'name' => 'create-lesson'],
                ['title'=> 'Editar a aula', 'name' => 'edit-lesson'],
                ['title'=> 'Apagar a aula', 'name' => 'destroy-lesson'],

                ['title'=> 'Listar os status curso', 'name' => 'index-course-status'],
                ['title'=> 'Visualizar status curso', 'name' => 'show-course-status'],
                ['title'=> 'Cadastrar status cursos', 'name' => 'create-course-status'],
                ['title'=> 'Edtitar status cursos', 'name' => 'edit-course-status'],
                ['title'=> 'Apagar status cursos', 'name' => 'destroy-course-status'],
                
                ['title'=> 'Visualizar o perfil', 'name' => 'show-profile'],
                ['title'=> 'Editar o perfil', 'name' => 'edit-profile'],
                ['title'=> 'Editar a senha do perfil', 'name' => 'edit-password-profile'],
                
                ['title'=> 'Listar os usuários', 'name' => 'index-user'],
                ['title'=> 'Visualizar o usuário', 'name' => 'show-user'],
                ['title'=> 'Cadastrar o usuário', 'name' => 'create-user'],
                ['title'=> 'Editar o usuário', 'name' => 'edit-user'],
                ['title'=> 'Editar a senha do usuário', 'name' => 'edit-password-user'],
                ['title'=> 'Apagar o usuário', 'name' => 'destroy-user'],
                ['title'=> 'Editar papéis do usuário', 'name' => 'edit-roles-user'],

                ['title'=> 'Listar os status usuários', 'name' => 'index-user-status'],
                ['title'=> 'Visualizar o status usuário', 'name' => 'show-user-status'],
                ['title'=> 'Cadastrar o status usuário', 'name' => 'create-user-status'],
                ['title'=> 'Editar o status usuário', 'name' => 'edit-user-status'],
                ['title'=> 'Apagar o status usuário', 'name' => 'destroy-user-status'],
                
                ['title'=> 'Listar os papéis', 'name' => 'index-role'],
                ['title'=> 'Visualizar o papel', 'name' => 'show-role'],
                ['title'=> 'Cadastrar o papel', 'name' => 'create-role'],
                ['title'=> 'Editar o papel', 'name' => 'edit-role'],
                ['title'=> 'Apagar o papel', 'name' => 'destroy-role'],

                ['title'=> 'Listar as permissões do papel', 'name' => 'index-role-permission'],
                
                ['title'=> 'Listar as permissões', 'name' => 'index-permission'],
                ['title'=> 'Visualizar a permissão', 'name' => 'show-permission'],
                ['title'=> 'Cadastrar a permissão', 'name' => 'create-permission'],
                ['title'=> 'Editar a permissão', 'name' => 'edit-permission'],
                ['title'=> 'Apagar a permissão', 'name' => 'destroy-permission'],

            ];

            foreach ($permissions as $permission) {
                // Se não encontrar o registro, cadastra o registro no BD
                Permission::firstOrCreate(
                    ['title' => $permission['title'], 'name' => $permission['name']],
                    [
                        'title' => $permission['title'],
                        'name' => $permission['name'],
                        'guard_name' => 'web'
                    ],
                );
            }
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Permissão não cadastrada.', ['error' => $e->getMessage()]);
        }
    }
}
