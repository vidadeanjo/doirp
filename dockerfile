# Usar imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instalar extensões e pacotes necessários
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql mbstring bcmath xml zip

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

# ✅ Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Definir permissões corretas para evitar problemas de cache
RUN chown -R www-data:www-data /var/www/html

# Expor porta do Apache
EXPOSE 80

# Copiar script de entrada e dar permissão de execução
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Comando de inicialização do contêiner
CMD ["/entrypoint.sh"]
