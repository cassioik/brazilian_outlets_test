# Use a imagem oficial do PHP 8.0.3 com Apache
FROM php:8.0.30-apache

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