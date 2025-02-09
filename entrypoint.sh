#!/bin/sh

# Criar diretórios necessários e aplicar permissões
mkdir -p /var/www/html/storage/framework/{cache,sessions,views} /var/www/html/bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Esperar o banco de dados estar pronto antes de rodar migrações
echo "Aguardando banco de dados..."
while ! nc -z db 3306; do   
  sleep 1
  echo "Ainda esperando o banco..."
done
echo "Banco de dados disponível! Continuando..."

# Limpar caches do Laravel para evitar erros
php artisan cache:clear || true
php artisan config:clear || true
php artisan view:clear || true

# Rodar migrações e seeders (se necessário)
php artisan migrate --seed --force || true

# Iniciar o Apache
apache2-foreground
