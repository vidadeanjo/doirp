#!/bin/sh

# Criar diretórios de cache necessários para evitar erro de Laravel
mkdir -p /var/www/html/storage/framework/{cache,sessions,views} /var/www/html/bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Limpar e recriar os caches do Laravel para evitar erros
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan config:cache

# Rodar migrações automaticamente
php artisan migrate --force

# Iniciar Apache
apache2-foreground
