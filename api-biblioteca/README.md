## Projeto - Biblioteca

Este repositório contem a API de um sistema de biblioteca básico em Laravel. 

## Instruções

É necessário ter o Laravel 9 instalado e PHP 8. Ter banco mysql instalado na máquina com a database biblioteca criada.

Baixar o projeto, acessar a pasta raiz e executar os seguintes comandos.

Instalar dependencias: php artisan install

Configurar o acesso ao banco no arquivo .env e criar as tabelas: php artisan migrate

Você pode também executar o comando para popular as tabelas à fim de testes:  php artisan db:seed

Executar servidor de teste com: php artisan serve

Obs: Você pode usar php artisan route:list para exibir as rotas disponíveis caso queira testar manualmente.




## Planos de Melhorias

Ainda não foram implantados: Autenticação, Permissões de Acesso, Melhorar as Requests para validação de Dados, expandir a ideia de sistema de controle de biblioteca.
