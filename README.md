# PD Game Database

## Resumo do projeto
Nesse projeto, podemos catalogar jogos ao qual zeramos. Nele cadastramos as seguintes informações:

- Dificuldade do jogo
- Console ao qual  o jogo foi zerado
- Genero e subgenero do jogo
- Conquistas que foram obtidas na jogatina
- Nota para o jogo
- Cadastrar o jogo zerado

Você pode cadastrar o jogo do jeito que quiser. Criando sua propria nomeclatura para a dificuldade, pontuação, genero etc. Sinta-se livre para cadastrar o jogo como quiser.

## Requisitos para rodar o projeto:

- PHP 8 ou superior
- Banco de dados instalado no computador 

## Como iniciar a aplicação
1. Abra o terminal
2. Use o comando **composer install** para instalar as bibliotecas php necessárias, criando assim a pasta **vendor**
3. Use o comando **npm install** ou **npm i** para instalar as bibliotecas Javascript nesessárias, criando assim a pasta **node_modules**. 
4. Use o comando **php artisan migrate** para fazer a migração das tabelas do banco de dados
5. Use o comando **php artisan serve** para iniciar a aplicação

## Alguns problemas que podem ocorrer ao iniciar o projeto 
### 1. No application encryption key has been specified.
Basta clicar no botão: **Generate App Key** para que o Laravel crie uma chave automaticamente
### 2. Vite manifest not found
Bata rodar o comando **npm run dev** no terminal para que o arquivo vite possa ser criado automaticamente
