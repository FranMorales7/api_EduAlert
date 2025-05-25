# Etapa base: PHP + Composer + dependencias necesarias
FROM php:8.3-cli-alpine

# Instalar extensiones necesarias y Composer
RUN apk add --no-cache \
    php8-pdo php8-pdo_mysql php8-mbstring php8-openssl php8-tokenizer php8-fileinfo php8-ctype php8-curl \
    unzip curl git bash && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer el directorio de trabajo
WORKDIR /app

# Copiar todo el proyecto
COPY . .

# Instalar dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Preparar caché de configuración y rutas
RUN php artisan config:cache && php artisan route:cache

# Comando por defecto (puedes sobreescribirlo en Railway)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
