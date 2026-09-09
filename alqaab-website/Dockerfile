FROM php:8.2-apache
RUN apt-get update && apt-get install -y --no-install-recommends libpng-dev libjpeg62-turbo-dev libfreetype6-dev libonig-dev libzip-dev unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring gd zip bcmath exif \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN sed -i 's/\r$//' deploy/start.sh
RUN composer install --no-dev --no-scripts --prefer-dist --optimize-autoloader --no-interaction \
    && mkdir -p public storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && cp deploy/index.php public/index.php \
    && cp deploy/public.htaccess public/.htaccess \
    && ln -s /var/www/html/assets public/assets \
    && cp robots.txt favicon.ico public/ \
    && chown -R www-data:www-data storage bootstrap/cache
COPY deploy/apache.conf /etc/apache2/sites-available/000-default.conf
CMD ["sh", "deploy/start.sh"]
