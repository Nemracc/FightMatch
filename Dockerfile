# Imagen base con PHP y FPM
FROM php:8.2-fpm

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    zip unzip curl git nginx \
    libpq-dev libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Cambiar permisos de almacenamiento y caché
RUN chmod -R 777 storage bootstrap/cache

# Copiar configuración de Nginx
COPY default.conf /etc/nginx/sites-available/default

# Exponer el puerto 80 para recibir tráfico HTTP
EXPOSE 80

# Iniciar Nginx y PHP-FPM
CMD service nginx start && php-fpm
