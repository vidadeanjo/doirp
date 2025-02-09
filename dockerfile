# Usando uma imagem oficial do PHP com Apache
FROM php:8.2-apache

# Atualizar pacotes e instalar extensões PHP necessárias
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

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar usuário sem privilégios de root
RUN groupadd -g 1000 laraveluser && \
    useradd -u 1000 -g laraveluser -m laraveluser

# Configurar diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY . .

# Criar diretórios necessários
RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache

# Definir permissões corretamente
RUN chown -R laraveluser:laraveluser /var/www/html
RUN chmod -R 775 storage bootstrap/cache

# Copiar arquivo .env caso não exista
RUN cp .env.example .env || true

# Mudar para o usuário sem privilégios
USER laraveluser

# Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs || true

# Gerar chave da aplicação (se necessário)
RUN php artisan key:generate || true

# Voltar para usuário root para configuração final
USER root

# Definir permissões finais para Laravel
RUN chown -R www-data:www-data /var/www/html

# Expor a porta padrão do Apache
EXPOSE 80

# Copiar e configurar o script de entrada
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Comando de inicialização do contêiner
CMD ["/entrypoint.sh"]
