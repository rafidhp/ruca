FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . /var/www/html/

RUN mkdir -p /var/www/html/public/storage && \
    cp -r /var/www/html/storage/app/public/. /var/www/html/public/storage/

COPY ./apache.conf /etc/apache2/sites-available/000-default.conf

RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80
CMD ["/entrypoint.sh"]
