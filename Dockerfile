FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    curl \
    unzip \
    libonig-dev \
    libzip-dev \
    zip \
    gnupg \
    ca-certificates \
    supervisor \
    && docker-php-ext-install pdo_mysql mbstring zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar Node.js (v18 LTS)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /var/www/html

# Copiar app
COPY . .

# Instalar dependencias PHP y JS
RUN composer install --optimize-autoloader --no-dev --no-scripts
RUN npm install && npm run build

# Permisos
RUN mkdir -p storage/framework/{sessions,views,cache} \
 && chown -R www-data:www-data /var/www/html \
 && chmod -R 775 storage bootstrap/cache

# Configuración de Nginx
COPY ./nginx.conf /etc/nginx/sites-available/default
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
 && ln -sf /dev/stderr /var/log/nginx/error.log

# Supervisord
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exponer puerto
EXPOSE 8080

# Comando de inicio
COPY start.sh /start.sh
RUN chmod +x /start.sh
CMD ["/start.sh"]
