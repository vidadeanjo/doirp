#!/bin/sh

# Criar diretórios de cache necessários
mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Limpar e recriar os caches do Laravel para evitar erros
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan config:cache

# Rodar migrações automaticamente
php artisan migrate --force

# Iniciar o servidor Laravel
php artisan serve --host=0.0.0.0 --port=8000
