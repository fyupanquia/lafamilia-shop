FROM php:7.0-apache
RUN apt-get update
RUN docker-php-ext-install pdo_mysql
COPY . /var/www/html
EXPOSE 80