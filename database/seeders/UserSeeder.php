<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Capturar possíveis exceções durante a execução do seeder. 
        try {
            // Verificar se o usuário está cadastrado no banco de dados
            if (!User::where('email', 'cesar@celke.com.br')->first()) {
                // Cadastrar o usuário
                $superAdmin = User::create([
                    'name' => 'Cesar',
                    'email' => 'cesar@celke.com.br',
                    'password' => '123456A#',
                ]);

                // Atribuir papel para o usuário
                $superAdmin->assignRole('Super Admin');

            }

            if (App::environment() !== 'production') {
                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                $admin = User::firstOrCreate(
                    ['email' => 'kelly@celke.com.br'],
                    ['name' => 'Kelly', 'email' => 'kelly@celke.com.br', 'password' => '123456A#'],
                );

                // Atribuir papel para o usuário
                $admin->assignRole('Admin');

                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                $teacher = User::firstOrCreate(
                    ['email' => 'jessica@celke.com.br'],
                    ['name' => 'Jessica', 'email' => 'jessica@celke.com.br', 'password' => '123456A#'],
                );

                // Atribuir papel para o usuário
                $teacher->assignRole('Professor');
                $teacher->assignRole('Aluno'); 

                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                $tutor = User::firstOrCreate(
                    ['email' => 'gabrielly@celke.com.br'],
                    ['name' => 'Gabrielly', 'email' => 'gabrielly@celke.com.br', 'password' => '123456A#'],
                );

                // Atribuir papel para o usuário
                $tutor->assignRole('Tutor');

                // Se não encontrar o registro com o e-mail, cadastra o registro no BD
                $student = User::firstOrCreate(
                    ['email' => 'fparaizo3@gmail.com'],
                    ['name' => 'Felipe', 'email' => 'fparaizo3@gmail.com', 'password' => '123456A#'],
                );

                // Atribuir papel para o usuário
                $student->assignRole('Aluno');
            }
        } catch (Exception $e) {
            Log::notice('Usuário não cadastrado.', ['error' => $e->getMessage()]);
        }
    }
}
