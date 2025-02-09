#!/bin/sh

# Criar diretórios necessários e aplicar permissões
mkdir -p /var/www/html/storage/framework/{cache,sessions,views} /var/www/html/bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Rodar comandos Artisan necessários para evitar erros
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan config:cache

# Executar migrações automaticamente
php artisan migrate --force

# Iniciar o Apache
apache2-foreground
