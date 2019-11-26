FROM php:7.1-fpm
COPY config.ini $PHP_INI_DIR/conf.d/
RUN docker-php-ext-install mysqli pdo_mysql
