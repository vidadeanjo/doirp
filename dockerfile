# Usando uma imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instalar extensões e dependências do Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar diretórios caso não existam
RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache

# Definir permissões corretas
RUN chmod -R 775 storage bootstrap/cache

# Configurar diretório de trabalho
WORKDIR /var/www/html


# Copiar arquivos do projeto
COPY . .

# Definir permissões para o Laravel
RUN chmod -R 775 storage bootstrap/cache

# Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Configurar Apache
RUN chown -R www-data:www-data /var/www/html

# Expor a porta padrão do Apache
EXPOSE 80

# Comando de inicialização do contêiner
CMD ["apache2-foreground"]
