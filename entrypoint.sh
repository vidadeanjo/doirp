#!/bin/bash

# Executar migrações e Seeders automaticamente
php artisan migrate --force
php artisan db:seed --force

# Iniciar o Apache
apache2-foreground
