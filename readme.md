## Projeto: Agenda Pessoal

### Principais funcionalidades:

*   Adicionar um evento no calendário
*   Notificações alertas de eventos
*   Alterar o registo de um evento
*   Remover/cancelar evento
*   TODO List

### Requisitos:
*   Base de dados: Mysql
*   Versão PHP:  8.0.30
*   Versão cake: Cakephp 3.8

PS: Incluir migração de base de dados

____

## Orientações para rodar o teste:

### Requisitos:
- Necessario ter o docker e docker compose instalado, desenvolvido e testado nas versões abaixo:
    - Docker version 27.3.1, build ce12230
    - Docker Compose version v2.29.7

### Rodar projeto:
- Rodar o projeto: `docker compose up -d`
- Instalar as dependencias: `docker compose exec web composer install --ignore-platform-reqs`
- Rodar migration: `docker compose exec web bin/cake migrations migrate`
- Acessar o sistema no navegador: `http://localhost:8080`
- Para acessar o mailhog e ver os emails dos lembretes de evento acessar no navegador: `http://localhost:8025`
- Para ver os logs da cron de envio de lembretes: `docker compose logs -f cron`
- Para acessar o phpmyadmin: `http://localhost:8081`
    - usuario root: root
    - senha root: rootpass
    - usuario: user
    - senha: pass

### Comandos uteis:
- Refresh das migrations:
    - `docker compose exec web bin/cake migrations rollback -t 0`
    - `docker compose exec web bin/cake migrations migrate`

### OBS:
- Pesquisei por um tempo como ajustar as versões das dependencias para rodar o cakephp 3.8 com o php 8.0.30, percebi que o problema é na dependencia do cakephp/bake, a "wyrihaximus/twig-view": "^4.3.7" requer "php": "^5.6 || ^7.0". Fiz o composer install com a opção --ignore-platform-reqs e esta funcional, acabou quebrando o DegubKit, então desativei ele, aparentemente o restante funciona corretamente.
- Depois de montar as migrations e começar a desenvolver entendi como funciona as traduções, deveria ter feito tudo em inglês para facilitar as traduções pro português, por isso decidi não adicionar tradução no teste.

### O que fiz:
- Dockerfile com 3 etapas, a base que monta todo o projeto, a web que é só uma copia da base para definir o target no docker-compose e a etapa cron que faz os envios dos lembretes;
- docker-compose com 5 serviços, a aplicação (web), o banco de dados (db), o phpmyadmin, a cron e o mailhog para testar os emails local;
- Criei as migrations para o banco de dados usando o comando do cakephp `bin/cake bake migration`;
- Criei o comando para envio de lembrete usando o comando do cake `bin/cake bake task` e `bin/cake bake shell`;
- Criei o crud usando o comando do cakephp `bin/cake bake all`;
    - Decidi usar a arquiteturra padrão do cake, estou colocando a logica de negocio no Model, validação da data de lembrete tem que ser menor que a data de inicio e data de fim tem que ser maior que data de inicio.
-