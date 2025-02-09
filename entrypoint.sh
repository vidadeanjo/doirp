#!/bin/sh

# Esperar o banco de dados estar pronto antes de rodar migrações
echo "Aguardando banco de dados..."
while ! nc -z db 3306; do   
  sleep 1
  echo "Ainda esperando o banco..."
done
echo "Banco de dados disponível! Continuando..."

# Aplicar permissões corretas
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Rodar migrações e seeders (se necessário)
php artisan migrate --seed --force || true

# Iniciar o Apache
apache2-foreground
