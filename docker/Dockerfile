# Estágio base
FROM php:8.0.30-apache AS base

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    libicu-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install intl pdo_mysql

# Habilitar o mod_rewrite do Apache para CakePHP
RUN a2enmod rewrite

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar o projeto CakePHP para o container
COPY ./src /var/www/html

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/tmp \
    && chmod -R 755 /var/www/html/logs

# Expor a porta 80
EXPOSE 80

# Estágio para o serviço web
FROM base AS web

# Estágio para o serviço cron
FROM base AS cron

# Instalar cron
RUN apt-get update && apt-get install -y cron

# Copiar o crontab para o contêiner
COPY docker/crontab /etc/cron.d/cakephp-cron

# Dar permissão ao crontab
RUN chmod 0644 /etc/cron.d/cakephp-cron

# Aplicar o crontab
RUN crontab /etc/cron.d/cakephp-cron

# Criar o arquivo de log do cron
RUN touch /var/log/cron.log

# Definir o entrypoint para o cron
ENTRYPOINT ["/bin/sh", "-c", "cron && tail -f /var/log/cron.log"]