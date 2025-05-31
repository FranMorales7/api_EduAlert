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
    && docker-php-ext-install pdo_mysql mbstring zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar Node.js (v18 LTS, compatible con Vite 6)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos de la aplicación
COPY . .

# Instalar dependencias PHP
RUN composer install --optimize-autoloader --no-dev --no-scripts

# Instalar dependencias Node.js
RUN npm install

# Compilar assets (Vite)
RUN npm run build

# Configurar permisos
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Configuración de Nginx
COPY ./nginx.conf /etc/nginx/sites-available/default
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

# Puerto expuesto
EXPOSE 8080

# Instalar supervisord
RUN apt-get update && apt-get install -y supervisor

# Copiar archivo de configuración de supervisord
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Comando de inicio
CMD ["/usr/bin/supervisord"]
