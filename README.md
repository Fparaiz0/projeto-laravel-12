## Requisitos 

* PHP 8.2 ou superior - Conferir a versão: php -v 
* MySQL 8.0 ou superior - Conferir a versão: mysql --version
* Composer - Conferir a instalação: composer --version
* Node.js 22 ou superior - Conferir a versão: node -v 
* GIT - Conferir se está instalado o GIT: git -v 

## Como rodar o projeto baixado 

- Duplicar o arquivo ".env.example" e renomear para ".env". 
- Alterar as credenciais do banco de dados.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project
DB_USERNAME=  
DB_PASSWORD=
```

Instalar as dependências do PHP.
```
composer install
```

Instalar as dependências do Node.js.
```
npm install
```

Gerar a chave no arquivo .env.
```
php artisan key:generate
```

Executar as migration para criar as tabelas e as colunas.
```
php artisan migrate
```

Executar seed com php artisan para cadastrar registros iniciais. 
```
php artisan db:seed
```

Iniciar o projeto  criado com Laravel.
```
php artisan serve
```

Executar as bibliotecas Node.js
```
npm run dev
```

Acessar o conteúdo padrão do Laravel.
```
http://127.0.0.1:8000
```

## Sequência para criar o projeto 

Criar o projeto com laravel 
```
Composer create-project laravel/laravel . 
```

Iniciar o projeto criado com laravel
```
php artisan serve
``` 

Instalar as dependências do Node.js.
```
npm install
```

Executar as bibliotecas Node.js
```
npm run dev
```

Acessar o conteúdo padrão do Laravel 
```
http://127.0.0.1:8000
```
Criar Controller com php artisan.
```
php artisan make:controller nome-controller
```
```
php artisan make:controller ProjectController
```

Criar View com php artisan.
```
php artisan make:view nome-view
```
```
php artisan make:view project.index
```

Criar migration com php artisan. 
```
php artisan make:migration create_nome_table
```
```
php artisan make:migration create_project_table
```

Executar as migration para criar as tabelas e as colunas.
```
php artisan migrate
```

Criar seed com php artisan para cadastrar registros iniciais.
```
php artisan make:seeder NomeSeeder
```
```
php artisan make:seeder UserSeeder
```

Executar seed com php artisan para cadastrar registros iniciais. 
```
php artisan db:seed
```

Desfazer todas as migrations e executá-las novamente.
```
php artisan migrate:fresh
```

Desfar todas as migrations, executá-las novamente e rodar as seeds.
```
php artisan migrate:fresh --seed
```

## Como enviar e baixar os arquivos do GitHub

- Criar o repositório **"projeto-laravel-12"** no GitHub.
- Criar o branch **"develop"** no repositório.

Baixar os arquivos do Git.
```
git clone -b <branch_name> <repository_url>. 
```

- Colocar o código fonte do projeto do diretório que está trabalhando.

Alterar o Usuário Globalmente (para todos os repositórios). 
```
git config --global user.name "SeuNomeDeUsuario"
git config --global user.email "seuemail@exemplo.com"
```

Verificar em qual branch está. 
```
git branch
```

Baixar as atualizações do GitHub.
```
git pull
```

Adicionar todos os arquivos modificados no staging area - área de praparação. 
```
git add .
```

commit representa um conjunto de alterações e um ponto específico da história do seu projeto, registra apenas as alterações adicionadas ao índice de praparação. 
O comando -m permite que insira a mensagem de commit diretamente na linha de comando.
```
git commit -m "base projeto"
```

Enviar os commits locais, para um repositório remoto. 
```
git push <remote> <branch>
git push origin develop
```

## Autor 

Este projeto foi desenvolvido por [Felipe Paraizo](https://github.com/Fparaiz0) e está hospedado no repositório (https://github.com/Fparaiz0/projeto-laravel-12). 

## Licença 

Este projeto está licenciado sob a licença MIT - veja o arquivo [LICENSE](LICENSE.txt) para mais detalhes.