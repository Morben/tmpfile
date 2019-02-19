FROM php:apache

RUN docker-php-ext-install pdo pdo_mysql

COPY app/ /var/www/html/