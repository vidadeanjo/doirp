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

# Criar usuário sem privilégios de root
RUN groupadd -g 1000 laraveluser && \
    useradd -u 1000 -g laraveluser -m laraveluser

# Configurar diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY . .

# Criar diretórios caso não existam
RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache

# Definir permissões corretamente
RUN chown -R laraveluser:laraveluser /var/www/html
RUN chmod -R 775 storage bootstrap/cache

# Copiar arquivo .env caso não exista (ESSENCIAL para evitar erros)
RUN cp .env.example .env

# Mudar para o usuário sem privilégios
USER laraveluser

# ✅ Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# 📌 Se der erro em package:discover, forçar um dump-autoload
RUN composer dump-autoload

# Gerar chave da aplicação
RUN php artisan key:generate

# Voltar para usuário root para configuração final
USER root

# Definir permissões do Laravel
RUN chown -R www-data:www-data /var/www/html

# Expor a porta padrão do Apache
EXPOSE 80

# Copiar o script de entrada para executar migrações e seeders
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Comando de inicialização do contêiner
CMD ["/entrypoint.sh"]
