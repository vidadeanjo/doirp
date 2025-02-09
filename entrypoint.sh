#!/bin/sh

# Aplicar permissões corretas
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Rodar migrações e seeders
php artisan migrate --seed --force

# Iniciar o Apache
apache2-foreground
