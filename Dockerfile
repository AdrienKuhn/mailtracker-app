FROM composer as composer
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /app
COPY . .
RUN rm -rf .env* .git* *ocker* node_modules vendor
RUN composer install

FROM krewh/hardened-php-fpm as app
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /var/www/html/
COPY --from=composer /app .
RUN chown www-data: * -R
