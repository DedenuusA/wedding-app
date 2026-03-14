FROM php:8.2-cli

WORKDIR /app

# install dependency system
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip

RUN docker-php-ext-install zip

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# copy project
COPY . .

# install dependency laravel
RUN composer install --no-dev --optimize-autoloader

# generate key
RUN php artisan key:generate

# permission
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000