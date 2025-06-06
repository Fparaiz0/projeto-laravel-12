<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Capturar possíveis exceções durante a execução do código.
        try {
            //Verificar se o usuário já está cadastrado no banco de dados. 
            if (!User::where('email', 'fparaizo3@gmail.com')->first()) {
                //Cadastrar o usuário no banco de dados. 
                User::create([
                    'name' => 'Felipe Paraizo',
                    'email' => 'fparaizo3@gmail.com',
                    'password' => '123456A#',
                ]);
            }
            if (App::environment() !== 'production') {
                //Se não encontrar o registro com o e-mail, cadastra o registro no BD.
                User::firstOrCreate(
                    ['email' => 'byanka@gmail.com'],
                    ['name' => 'Byanka', 'email' => 'byanka@gmail.com', 'password' => '123456A#'],
                );
                User::firstOrCreate(
                    ['email' => 'gilson@gmail.com'],
                    ['name' => 'Gilson', 'email' => 'gilson@gmail.com', 'password' => '123456A#'],
                );
                User::firstOrCreate(
                    ['email' => 'delacir@gmail.com'],
                    ['name' => 'Delacir', 'email' => 'delacir@gmail.com', 'password' => '123456A#'],
                );
            }
        } catch (Exception $e) {
            //Lidar com as exceções, se necessário.
        }
    }
}
