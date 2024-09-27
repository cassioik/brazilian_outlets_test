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
- Para acessar o mailhog e ver os emails dos lembretes de evento acessar: `http://localhost:8025`

### Comandos uteis:
- Refresh das migrations:
    - `docker compose exec web bin/cake migrations rollback -t 0`
    - `docker compose exec web bin/cake migrations migrate`