# Usar imagem oficial do PHP
FROM php:8.2-cli

# Instalar extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
    && docker-php-ext-install gd pdo pdo_mysql mbstring bcmath zip

# Instalar Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY . .

# ✅ Criar diretórios necessários antes da instalação do Composer
RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# ✅ Rodar Composer como www-data para evitar problemas de permissões
USER www-data
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs || true
USER root

# Definir permissões corretas
RUN chown -R www-data:www-data /var/www/html

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
