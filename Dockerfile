FROM node:24-alpine AS frontend-builder
WORKDIR /app
COPY . .
RUN npm install && npm run build

FROM php:8.3-fpm-alpine
WORKDIR /var/www/html
RUN apk add --no-cache libpng-dev libzip-dev icu-dev zlib-dev libxml2-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath gd intl zip
COPY . .
COPY --from=frontend-builder /app/public/build ./public/build
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
