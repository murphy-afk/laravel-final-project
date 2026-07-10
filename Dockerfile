FROM node:24-alpine AS frontend-builder
WORKDIR /app
COPY . .
RUN npm install && npm run build

FROM php:8.3-fpm-alpine
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
RUN apk add --no-cache libpng-dev libzip-dev icu-dev zlib-dev libxml2-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath gd intl zip
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts
COPY . .
COPY --from=frontend-builder /app/public/build ./public/build
RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
