# docker/Dockerfile
FROM php:7.3-apache

# Instalar dependências e extensões PHP
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libicu-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd intl zip pdo pdo_mysql

# Configurações do Apache
RUN a2enmod rewrite

# Configurações do PHP (caso tenha)
# COPY ./php.ini /usr/local/etc/php/

# Defina o diretório de trabalho como a pasta de origem
WORKDIR /var/www/html

# Instalar o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar o código para o container
COPY ./src /var/www/html

# Definir permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expor a porta padrão do Apache
EXPOSE 80
