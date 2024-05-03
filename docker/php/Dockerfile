FROM php:8.2-fpm

COPY ./docker/php/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf
COPY . /api

WORKDIR /api

RUN apt-get update -y && apt-get install -y libzip-dev

RUN php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" && \
    php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo_mysql zip

EXPOSE 9000

ENTRYPOINT ["/bin/sh", "/api/docker/php/entrypoint.sh"]
