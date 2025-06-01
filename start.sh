#!/bin/bash

# Espera a MySQL (muy importante en Railway)
until mysqladmin ping -h"$DB_HOST" --silent; do
  echo "⏳ Esperando a MySQL..."
  sleep 2
done

echo "✅ Base de datos disponible. Iniciando migraciones..."

# Limpiar caché
php artisan config:clear
php artisan cache:clear

# Eliminar todas las tablas y sembrar datos
php artisan migrate:fresh --seed --force

# Iniciar supervisord (Nginx + PHP-FPM)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
