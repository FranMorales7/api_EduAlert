# Etapa 1: Construcción
FROM composer:2 as vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

COPY . .

# Etapa 2: Producción
FROM php:8.2-fpm-alpine

# Instala dependencias del sistema
RUN apk add --no-cache \
    php-mysqli \
    php-pdo \
    php-pdo_mysql \
    php-mbstring \
    php-tokenizer \
    php-xml \
    php-curl \
    php-ctype \
    php-fileinfo \
    php-openssl \
    php-bcmath \
    php-json \
    php-phar \
    php-dom \
    php-session \
    php-simplexml \
    php-xmlwriter \
    php-zlib \
    bash \
    curl \
    libzip-dev \
    zip \
    unzip \
    mysql-client \
    git \
    supervisor

# Copia archivos desde la etapa anterior
WORKDIR /var/www
COPY --from=vendor /app /var/www

# Ajusta permisos
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Expone el puerto del servidor PHP
EXPOSE 9000

# Comando de inicio
CMD php artisan config:cache && php artisan migrate --force && php-fpm
