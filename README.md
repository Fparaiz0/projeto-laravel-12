## Requisitos 

* PHP 8.2 ou superior - Conferir a versão: php -v 
* Composer - Conferir a instalação: composer --version
* Node.js 22 ou superior - Conferir a versão: node -v 
* GIT - Conferir se está instalado o GIT: git -v 

## Como rodar o projeto baixado 

- Duplicar o arquivo ".env.example" e renomear para ".env". 

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