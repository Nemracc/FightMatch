# Imagen base con PHP y extensiones necesarias
FROM php:8.2-fpm

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    zip unzip curl git \
    libpq-dev libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Cambiar permisos de almacenamiento y caché
RUN chmod -R 777 storage bootstrap/cache

# Exponer el puerto 9000 para FPM
EXPOSE 9000

CMD ["php-fpm"]
