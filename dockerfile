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

# Alterar dono dos arquivos para evitar problemas de permissão
RUN chown -R laraveluser:laraveluser /var/www/html

# Definir permissões corretamente
RUN chmod -R 775 storage bootstrap/cache

# Mudar para o usuário sem privilégios
USER laraveluser

# ✅ Instalar dependências do Laravel **SEM a opção --no-plugins=false**
RUN composer install --no-dev --optimize-autoloader

# Copiar arquivo .env caso não exista
RUN cp .env.example .env

# Gerar chave da aplicação
RUN php artisan key:generate

# Voltar para usuário root apenas para configuração final
USER root

# Configurar Apache
RUN chown -R www-data:www-data /var/www/html

# Expor a porta padrão do Apache
EXPOSE 80

# Copiar o script de entrada para executar migrações e seeders
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Comando de inicialização do contêiner
CMD ["/entrypoint.sh"]
